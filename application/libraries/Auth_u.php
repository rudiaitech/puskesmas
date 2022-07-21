<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_u {

	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();

		$this->CI->load->model('User_model','user');
	}

	public function login($username,$password)
	{
		$check = $this->CI->user->login($username,$password);
		if ($check)
		{
			$data = [
				'id_user'			=> $check->id_user,
				'name_user'			=> $check->name_user,
				'username'			=> $check->username,
				'password'			=> $check->password,
				'login'	=> true
			];
			$this->CI->session->set_userdata($data);
			redirect(base_url('user/dashboard'),'refresh');
		}
		else{
			$this->CI->session->set_flashdata('danger', '<i class="fa fa-info-circle"></i> Password anda salah');
			redirect(base_url('home'),'refresh');	
		}
	}

	public function cek()
	{
		if (!$this->CI->session->userdata('login')) {
			$this->CI->session->set_flashdata('danger', '<i class="fa fa-info-circle"></i> Silahkan  login terlebih dahulu!');
			redirect(base_url('home'),'refresh');
		}
	}

	public function logout()
	{
		$data = array(
			'id_user',
			'name_user',
			'username',
			'password',
			'login'
		);
		$this->CI->session->unset_userdata($data);
		$this->CI->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Anda berhasil logout!');
		redirect(base_url('home'),'refresh');
	}

}