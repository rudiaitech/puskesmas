<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_dokter');
		$this->db->join('tbl_poli','tbl_dokter.id_poli = tbl_poli.id_poli','inner');
		$this->db->order_by('tbl_dokter.id_dokter', 'Asc');
		$query = $this->db->get();
		return $query;
	}

	public function getdokter($id_poli)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokter');
		$this->db->join('tbl_poli','tbl_dokter.id_poli = tbl_poli.id_poli','inner');
		$this->db->order_by('tbl_dokter.id_dokter', 'Asc');
		$this->db->where('tbl_dokter.id_poli', $id_poli);
		$query = $this->db->get();
		return $query;
	}


	public function jumlah_dokter()
    {
        $this->db->select('count(id_dokter) as j_dokter');
		$this->db->from('tbl_dokter');
		$query = $this->db->get()->row();
		return $query->j_dokter;
    }

	public function detail($id_dokter)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokter');
		$this->db->join('tbl_poli','tbl_dokter.id_poli = tbl_poli.id_poli','inner');
		$this->db->where('id_dokter', $id_dokter);
		$query = $this->db->get();
		return $query;
	}

	public function cek_username($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokter');
		$this->db->where('username_dokter', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function login($username,$enpass)
	{
		$username = $this->db->escape_str($username);
		$password = $this->db->escape_str($enpass);
		$this->db->select('*');
		$this->db->from('tbl_dokter');
		$this->db->where(array(
			'username_dokter' => $username,
			'password_dokter' => sha1($password)
		));
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data)
	{
		$this->db->insert('tbl_dokter', $data);
	}

	public function update($data)
	{
		$this->db->where('id_dokter', $data['id_dokter']);
		$this->db->update('tbl_dokter', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_dokter', $data['id_dokter']);
		$this->db->delete('tbl_dokter');
	}



}
