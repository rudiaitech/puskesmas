<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function detail($id_admin)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('id_admin', $id_admin);
		$query = $this->db->get();
		return $query->row();
	}

	public function ubahpassword($data)
	{
		$this->db->where('id_admin', $data['id_admin']);
		$this->db->update('admin', $data);
	}

	public function cek_username($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('username_admin', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	public function username($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->row();
	}

	public function login($username,$enpass)
	{
		$username = $this->db->escape_str($username);
		$password = $this->db->escape_str($enpass);
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where(array(
			'username_admin' => $username,
			'password_admin' => sha1($password)
		));
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */