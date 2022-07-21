<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dokter_model', 'dokter');
		$this->load->model('Poli_model', 'poli');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Dokter',
			'judul'			=> 'Master Data Dokter',
			'data' 			=> $this->dokter->tabel()->result(),
			'content'		=> 'dokter/v_content',
			'ajax'	 		=> 'dokter/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Tambah Dokter',
			'judul'			=> 'Tambah Data Dokter',
			'data' 			=> $this->dokter->tabel(),
			'poli' 			=> 	$this->poli->tabel()->result(),
			'content'		=> 'dokter/v_add',
			'ajax'	 		=> 'dokter/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->dokter->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('dokter'),'refresh');
		}else{

			$data = array(
				'title'			=> $this->session->userdata('level').' - Edit Dokter',
				'judul'			=> 'Edit Data Dokter',
				'data' 			=> 	$this->dokter->detail($id)->row_array(),
				'poli' 			=> 	$this->poli->tabel()->result(),
				'content'		=> 'dokter/v_edit',
				'ajax'	 		=> 'dokter/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{
			$this->form_validation->set_rules('nik_dokter', 'NIK dokter', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('nama_dokter', 'Nama dokter', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('inisial_dokter', 'Inisial dokter', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('inisial_dokter', 'Text Field Three', 'required|max_length[3]');
			$this->form_validation->set_rules('alamat_dokter', 'alamat dokter', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('notlp_dokter', 'notlp dokter', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('id_poli', 'Nama Poli', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('username_dokter', 'username dokter', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('password_dokter', 'password dokter', 'required',
			array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'nik_dokter'			=> $this->input->post('nik_dokter'),
				'nama_dokter'			=> $this->input->post('nama_dokter'),
				'inisial_dokter'		=> $this->input->post('inisial_dokter'),
				'alamat_dokter'			=> $this->input->post('alamat_dokter'),
				'notlp_dokter'			=> $this->input->post('notlp_dokter'),
				'id_poli'				=> $this->input->post('id_poli'),
				'username_dokter'		=> $this->input->post('username_dokter'),
				'password_dokter'		=> sha1($this->input->post('password_dokter'))
			);

			$q = $this->dokter->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('dokter'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Anda tidak mempunyai akses untuk ini');
			redirect(base_url('dokter/add'),'refresh');
		}

		
	}

	public function update()
	{
		$this->form_validation->set_rules('nik_dokter', 'NIK dokter', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('nama_dokter', 'Nama dokter', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('inisial_dokter', 'Inisial dokter', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('inisial_dokter', 'Text Field Three', 'required|max_length[3]');
		$this->form_validation->set_rules('alamat_dokter', 'alamat dokter', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('notlp_dokter', 'notlp dokter', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('id_poli', 'Nama Poli', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('username_dokter', 'username dokter', 'required',
		array( 'required'  => '%s harus diisi!'));

		if (!$this->form_validation->run()) 
		{
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Anda tidak mempunyai akses untuk ini');
			redirect(base_url('dokter/edit'),'refresh');
		}

		$id = $this->input->post('id_dokter');

		$cek = $this->dokter->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('dokter'),'refresh');
		}else{

			if($this->input->post('password_dokter') == ''){
				$data = array(
					'nik_dokter'			=> $this->input->post('nik_dokter'),
					'id_dokter'				=> $this->input->post('id_dokter'),
					'nama_dokter'			=> $this->input->post('nama_dokter'),
					'inisial_dokter'		=> $this->input->post('inisial_dokter'),
					'alamat_dokter'			=> $this->input->post('alamat_dokter'),
					'notlp_dokter'			=> $this->input->post('notlp_dokter'),
					'id_poli'				=> $this->input->post('id_poli'),
					'username_dokter'		=> $this->input->post('username_dokter')
				);
			}else{

				$data = array(
					'id_dokter'				=> $this->input->post('id_dokter'),
					'nik_dokter'			=> $this->input->post('nik_dokter'),
					'nama_dokter'			=> $this->input->post('nama_dokter'),
					'inisial_dokter'		=> $this->input->post('inisial_dokter'),
					'alamat_dokter'			=> $this->input->post('alamat_dokter'),
					'notlp_dokter'			=> $this->input->post('notlp_dokter'),
					'id_poli'				=> $this->input->post('id_poli'),
					'username_dokter'		=> $this->input->post('username_dokter'),
					'password_dokter'		=> sha1($this->input->post('password_dokter'))
				);
			}
				
			$this->dokter->update($data);
	
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
			redirect(base_url('dokter'),'refresh');
		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->dokter->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('dokter'),'refresh');
		}else{

			$data = array(
				'id_dokter'	=> $id
			);
			
			$this->dokter->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('dokter'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */