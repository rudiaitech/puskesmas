<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pasien_model', 'pasien');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Pasien',
			'judul'			=> 'Master Data Pasien',
			'data' 			=> $this->pasien->tabel()->result(),
			'content'		=> 'pasien/v_content',
			'ajax'	 		=> 'pasien/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Tambah Pasien',
			'judul'			=> 'Tambah Data Pasien',
			'data' 			=> $this->pasien->tabel(),
			'content'		=> 'pasien/v_add',
			'ajax'	 		=> 'pasien/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->pasien->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('pasien'),'refresh');
		}else{

			$data = array(
				'title'			=> $this->session->userdata('level').' - Edit Pasien',
				'judul'			=> 'Edit Data Pasien',
				'data' 			=> 	$this->pasien->detail($id)->row_array(),
				'content'		=> 'pasien/v_edit',
				'ajax'	 		=> 'pasien/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{
			$this->form_validation->set_rules('noreg_pasien', 'noreg pasien', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('nikktp_pasien', 'nikktp pasien', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('nama_pasien', 'nama pasien', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('alamat_pasien', 'alamat pasien', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('desa_pasien', 'desa pasien', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('notlp_pasien', 'notlp pasien', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('jeniskelamin_pasien', 'jeniskelamin pasien', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('tempatlahir_pasien', 'tempatlahir pasien', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('tanggallahir_pasien', 'tgllahir pasien', 'required',
			array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'noreg_pasien'			=> $this->input->post('noreg_pasien'),
				'nikktp_pasien'			=> $this->input->post('nikktp_pasien'),
				'nama_pasien'			=> $this->input->post('nama_pasien'),
				'desa_pasien'			=> $this->input->post('desa_pasien'),
				'alamat_pasien'			=> $this->input->post('alamat_pasien'),
				'notlp_pasien'			=> $this->input->post('notlp_pasien'),
				'jeniskelamin_pasien'		=> $this->input->post('jeniskelamin_pasien'),
				'tempatlahir_pasien'		=> $this->input->post('tempatlahir_pasien'),
				'tanggallahir_pasien'			=> $this->input->post('tanggallahir_pasien'),
				'jenisjamkes_pasien'		=> $this->input->post('jenisjamkes_pasien'),
				'nojamkes_pasien'			=> $this->input->post('nojamkes_pasien')
			);

			$q = $this->pasien->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('pasien'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Anda tidak mempunyai akses untuk ini');
			redirect(base_url('pasien/add'),'refresh');
		}

		
	}

	public function update()
	{
		$this->form_validation->set_rules('noreg_pasien', 'noreg pasien', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('nikktp_pasien', 'nikktp pasien', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('id_pasien', 'id pasien', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('nama_pasien', 'nama pasien', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('alamat_pasien', 'alamat pasien', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('desa_pasien', 'desa pasien', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('notlp_pasien', 'notlp pasien', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('jeniskelamin_pasien', 'jeniskelamin pasien', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('tempatlahir_pasien', 'tempatlahir pasien', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('tanggallahir_pasien', 'tgllahir pasien', 'required',
		array( 'required'  => '%s harus diisi!'));

		if (!$this->form_validation->run()) 
		{
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Anda tidak mempunyai akses untuk ini');
			redirect(base_url('pasien/edit'),'refresh');
		}

		$id = $this->input->post('id_pasien');

		$cek = $this->pasien->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('pasien'),'refresh');
		}else{

				$data = array(
					'id_pasien'				=> $this->input->post('id_pasien'),
					'noreg_pasien'			=> $this->input->post('noreg_pasien'),
					'nikktp_pasien'			=> $this->input->post('nikktp_pasien'),
					'nama_pasien'			=> $this->input->post('nama_pasien'),
					'desa_pasien'			=> $this->input->post('desa_pasien'),
					'alamat_pasien'			=> $this->input->post('alamat_pasien'),
					'notlp_pasien'			=> $this->input->post('notlp_pasien'),
					'jeniskelamin_pasien'		=> $this->input->post('jeniskelamin_pasien'),
					'tempatlahir_pasien'		=> $this->input->post('tempatlahir_pasien'),
					'tanggallahir_pasien'			=> $this->input->post('tanggallahir_pasien'),
					'jenisjamkes_pasien'		=> $this->input->post('jenisjamkes_pasien'),
					'nojamkes_pasien'			=> $this->input->post('nojamkes_pasien')
				);
				
			$this->pasien->update($data);
	
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
			redirect(base_url('pasien'),'refresh');
		}
			
	}

	public function delete($id)
	{
		$cek = $this->pasien->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('pasien'),'refresh');
		}else{

			$data = array(
				'id_pasien'	=> $id
			);
			
			$this->pasien->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('pasien'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */