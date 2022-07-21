<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();

		$this->CI->load->model('Admin_model','admin');
		$this->CI->load->model('Dokter_model','dokter');
	}

	public function login_admin($username,$password)
	{
		$check = $this->CI->admin->login($username,$password);
		if ($check)
		{
			$data = [
				'id'				=> $check->id_admin,
				'nama'				=> $check->nama_admin,
				'level'				=> 'Admin',
				'nik'				=> '',
				'login'				=> true
			];
			
			$this->CI->session->set_userdata($data);
			redirect(base_url('dashboard'),'refresh');
		}
		else{
			$this->session->set_flashdata('danger', '<i class="fa fa-warning"></i> Maaf, Username dan password tidak sesuai.');
			redirect(base_url('login'),'refresh');
		}
	}

	public function login_dokter($username,$password)
	{
		$check = $this->CI->dokter->login($username,$password);
		if ($check)
		{
			$data = [
				'id'				=> $check->id_dokter,
				'nama'				=> $check->nama_dokter,
				'level'				=> 'Dokter',
				'nik'				=> '',
				'login'				=> true
			];
			
			$this->CI->session->set_userdata($data);
			redirect(base_url('dashboard'),'refresh');
		}
		else{
			$this->session->set_flashdata('danger', '<i class="fa fa-warning"></i> Maaf, Username dan password tidak sesuai.');
			redirect(base_url('login'),'refresh');
		}
	}

	public function cek()
	{
		if ($this->CI->session->userdata('login') == '') {
			redirect(base_url('login'),'refresh');
		}
	}

	public function logout()
	{
		$data = array(
			'id',
			'nama',
			'level',
			'nik',
			'login'
		);
		$this->CI->session->unset_userdata($data);
		$this->CI->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Anda berhasil logout!');
		redirect(base_url('login'),'refresh');
	}

}