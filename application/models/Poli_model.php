<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_poli');
		$this->db->order_by('id_poli', 'Asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($id_poli)
	{
		$this->db->select('*');
		$this->db->from('tbl_poli');
		$this->db->where('id_poli', $id_poli);
		$query = $this->db->get();
		return $query;
	}

	public function detail_front($id_poli)
	{
		$this->db->select('*');
		$this->db->from('tbl_poli');
		$this->db->where('slug_poli', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_poli');
		$this->db->where('slug_poli', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_poli', $data);
	}

	public function update($data)
	{
		$this->db->where('id_poli', $data['id_poli']);
		$this->db->update('tbl_poli', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_poli', $data['id_poli']);
		$this->db->delete('tbl_poli');
	}



}
