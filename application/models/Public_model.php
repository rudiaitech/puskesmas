<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function get_admin($id_admin)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('id_admin', $id_admin);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_dokter($id_dokter)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokter');
		$this->db->where('id_dokter', $id_dokter);
		$query = $this->db->get();
		return $query->row();
	}

	

}

/* End of file Public_model.php */
/* Location: ./application/models/Public_model.php */