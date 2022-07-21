<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Poli_model', 'poli');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Poli',
			'judul'			=> 'Master Data Poli',
			'data' 			=> $this->poli->tabel()->result(),
			'content'		=> 'poli/v_content',
			'ajax'	 		=> 'poli/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Tambah Poli',
			'judul'			=> 'Tambah Data Poli',
			'content'		=> 'poli/v_add',
			'ajax'	 		=> 'poli/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->poli->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('poli'),'refresh');
		}else{

			$data = array(
				'title'			=> $this->session->userdata('level').' - Edit Poli',
				'judul'			=> 'Edit Data Poli',
				'data' 			=> 	$this->poli->detail($id)->row_array(),
				'content'		=> 'poli/v_edit',
				'ajax'	 		=> 'poli/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{
		$this->form_validation->set_rules('nama_poli', 'Nama Poli', 'required',
			array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'nama_poli'			=> $this->input->post('nama_poli')
			);

			$q = $this->poli->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('poli'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Anda tidak mempunyai akses untuk ini');
			redirect(base_url('poli/add'),'refresh');
		}

		
	}

	public function update()
	{
		$id = $this->input->post('id_poli');

		$cek = $this->poli->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('poli'),'refresh');
		}else{


			$data = array(
				'id_poli'	=> $this->input->post('id_poli'),
				'nama_poli'		=> $this->input->post('nama_poli')
			);
				
			$this->poli->update($data);
	
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
			redirect(base_url('poli'),'refresh');
		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->poli->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('poli'),'refresh');
		}else{

			$data = array(
				'id_poli'	=> $id
			);
			
			$this->poli->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('poli'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */