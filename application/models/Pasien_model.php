<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_pasien');
		$this->db->order_by('id_pasien', 'Asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($id_pasien)
	{
		$this->db->select('*');
		$this->db->from('tbl_pasien');
		$this->db->where('id_pasien', $id_pasien);
		$query = $this->db->get();
		return $query;
	}

	public function detail_front($id_pasien)
	{
		$this->db->select('*');
		$this->db->from('tbl_pasien');
		$this->db->where('slug_pasien', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_pasien');
		$this->db->where('slug_pasien', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_pasien', $data);
	}

	public function update($data)
	{
		$this->db->where('id_pasien', $data['id_pasien']);
		$this->db->update('tbl_pasien', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_pasien', $data['id_pasien']);
		$this->db->delete('tbl_pasien');
	}



}
