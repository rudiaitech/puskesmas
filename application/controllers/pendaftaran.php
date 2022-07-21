<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelayanan_model', 'pelayanan');
		$this->load->model('Pasien_model', 'pasien');
		$this->load->model('Dokter_model', 'dokter');
		$this->load->model('Poli_model', 'poli');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Pendaftaran',
			'judul'			=> 'Pendaftaran',
			'data' 			=> $this->pelayanan->tabel()->result(),
			'content'		=> 'pendaftaran/v_content',
			'ajax'	 		=> 'pendaftaran/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Tambah Pendaftaran',
			'judul'			=> 'Tambah Pendaftaran',
			'poli' 			=> 	$this->poli->tabel()->result(),
			'dokter' 		=> 	$this->dokter->tabel()->result(),
			'pasien' 		=> 	$this->pasien->tabel()->result(),
			'tgl_sekarang' 	=> date('Y-m-d'),
			'content'		=> 'pendaftaran/v_add',
			'ajax'	 		=> 'pendaftaran/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function rekammedis($id)
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Rekam Medis',
			'judul'			=> 'Rekam Medis',
			'data' 			=> 	$this->pelayanan->detail($id)->row_array(),
			'poli' 			=> 	$this->poli->tabel()->result(),
			'dokter' 		=> 	$this->dokter->tabel()->result(),
			'pasien' 		=> 	$this->pasien->tabel()->result(),
			'content'		=> 'rekammedis/v_rekam',
			'ajax'	 		=> 'rekammedis/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->pelayanan->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('pendaftaran'),'refresh');
		}else{

			$data = array(
				'title'			=> $this->session->userdata('level').' - Edit Pendaftaran',
				'judul'			=> 'Edit Data Pendaftaran',
				'data' 			=> 	$this->pelayanan->detail($id)->row_array(),
				'poli' 			=> 	$this->poli->tabel()->result(),
				'dokter' 		=> 	$this->dokter->tabel()->result(),
				'pasien' 		=> 	$this->pasien->tabel()->result(),
				'content'		=> 'pendaftaran/v_edit',
				'ajax'	 		=> 'pendaftaran/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{
			$this->form_validation->set_rules('tgl_pendaftaran', 'Tanggal Daftar', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('id_dokter', 'Nama dokter', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('no_pendaftaran', 'Nomor Pendaftaran', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('id_pasien', 'Nama Pasien', 'required',
			array( 'required'  => '%s harus diisi!'));
			$this->form_validation->set_rules('keluhan_pasien', 'Keluhan Pasien', 'required',
			array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{
			$id_pasien = $this->input->post('id_pasien');
			$cek_kedatangan = $this->pelayanan->cek_statuskedatangan($id_pasien)->row_array();

			if($cek_kedatangan == null){

				$data = array(
					'tgl_pendaftaran'		=> $this->input->post('tgl_pendaftaran'),
					'no_pendaftaran'		=> $this->input->post('no_pendaftaran'),
					'id_pasien'				=> $this->input->post('id_pasien'),
					'id_dokter'				=> $this->input->post('id_dokter'),
					'keluhan_pasien'		=> $this->input->post('keluhan_pasien'),
					'status_pelayanan'		=> 'Antri',
					'status_Kunjungan'		=> 'Baru'
				);

			}else{

				$data = array(
					'tgl_pendaftaran'		=> $this->input->post('tgl_pendaftaran'),
					'no_pendaftaran'		=> $this->input->post('no_pendaftaran'),
					'id_pasien'				=> $this->input->post('id_pasien'),
					'id_dokter'				=> $this->input->post('id_dokter'),
					'keluhan_pasien'		=> $this->input->post('keluhan_pasien'),
					'status_pelayanan'		=> 'Antri',
					'status_Kunjungan'		=> 'Lama'
				);

			}


			$q = $this->pelayanan->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('pendaftaran'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Pastikan Semua Sudah Diisi Dengan Benar');
			redirect(base_url('pendaftaran/add'),'refresh');
		}

		
	}

	public function update()
	{
		$this->form_validation->set_rules('id_pelayanan', 'Tanggal Daftar', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('tgl_pendaftaran', 'Tanggal Daftar', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('id_dokter', 'Nama dokter', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('no_pendaftaran', 'Nomor Pendaftaran', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('id_pasien', 'Nama Pasien', 'required',
		array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('keluhan_pasien', 'Keluhan Pasien', 'required',
		array( 'required'  => '%s harus diisi!'));

		if (!$this->form_validation->run()) 
		{
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Pastikan Data Sudah Diisi Dengan Benar');
			redirect(base_url('pendaftaran/edit'),'refresh');
		}

		$id = $this->input->post('id_pelayanan');

		$cek = $this->pelayanan->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('pelayanan'),'refresh');
		}else{

				$data = array(
					'id_pelayanan'			=> $this->input->post('id_pelayanan'),
					'no_pendaftaran'		=> $this->input->post('no_pendaftaran'),
					'id_pasien'				=> $this->input->post('id_pasien'),
					'id_dokter'				=> $this->input->post('id_dokter'),
					'keluhan_pasien'		=> $this->input->post('keluhan_pasien')
				);
			
				
			$this->pelayanan->update($data);
	
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
			redirect(base_url('pendaftaran'),'refresh');
		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->pelayanan->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('pendaftaran'),'refresh');
		}else{

			$data = array(
				'id_pelayanan'	=> $id
			);
			
			$this->pelayanan->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('pendaftaran'),'refresh');
		}
	}

	public function getdokter($id)
	{
		$dokter = $this->dokter->getdokter($id)->result();
		
		echo "<label class='col-form-label col-md-4 col-sm-12 label-align' for='first-name'>Dokter<span class='required'>*</span>
				</label>
				<div class='col-md-8 col-sm-12 '>
					<select id='id_dokter' name='id_dokter' required='required' class='form-control ' onChange='get_pendaftaran(this.value)'>
						<option value=''>- Pilih Dokter -</option>";
						foreach($dokter as $row){
							echo "<option value='$row->id_dokter'>$row->nama_dokter</option>";
						}
						
			echo "</select>
				</div>";
	}

	public function getpendaftaran()
	{
		if($this->input->post('id') == ''){
			$kode_baru = '';
		}else{

			$id = $this->input->post('id');
			$dokter = $this->dokter->detail($id)->row_array();
	
	
			$id_dokter 		= $dokter['id_dokter'];
			$inisial_dokter = $dokter['inisial_dokter'];
			$nama_poli 		= $dokter['nama_poli'];
	
			$tanggal = date('Y-m-d');
			$dariDB = $this->pelayanan->cek_urut_terkahir($tanggal,$id_dokter)->row_array();
			$nourut = substr($dariDB['no_pendaftaran'], 9, 3);
			$urut = $nourut + 1;
			$kode_baru = $nama_poli.'-'.$inisial_dokter.'-'.sprintf("%03s", $urut);
		}
		
		echo "<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>No. Pendaftaran<span class='required'>*</span>
				</label>
				<div class='col-md-4 col-sm-12 '>
					<input type='text' id='no_pendaftaran' name='no_pendaftaran' required='required' class='form-control' readonly value='$kode_baru'>
			</div>";
	}

	public function setpasien(){
		$id = $this->input->post('id');
		$pasien = $this->pasien->detail($id)->row_array();
		echo "
			<div class='item form-group'>
				<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>No Reg. Pasien<span class='required'>*</span>
				</label>
				<div class='col-md-6 col-sm-12 '>
					<input type='text' id='noreg_pasien' name='noreg_pasien' required='required' class='form-control' readonly value='$pasien[noreg_pasien]'>
					<input type='hidden' id='id_pasien' name='id_pasien' required='required' class='form-control' readonly value='$pasien[id_pasien]'>
				</div>
				<div class='col-md-3 col-sm-12 '>
					<button type='button' class='btn btn-sm btn-info pull-left btncaripasien'><i class='fa fa-fw fa-lg fa-search'></i> Cari</button>
				</div>
			</div>

			<div class='item form-group'>
				<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>NIK KTP<span class='required'>*</span>
				</label>
				<div class='col-md-6 col-sm-12 '>
					<input type='text' id='nikktp_pasien' name='nikktp_pasien' required='required' class='form-control ' value='$pasien[nikktp_pasien]' readonly>
				</div>
			</div>

			<div class='item form-group'>
				<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Nama<span class='required'>*</span>
				</label>
				<div class='col-md-6 col-sm-12 '>
					<input type='text' id='nama_pasien' name='nama_pasien' required='required' class='form-control' value='$pasien[nama_pasien]' readonly>
				</div>
			</div>

			<div class='item form-group'>
				<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Alamat<span class='required'>*</span>
				</label>
				<div class='col-md-8 col-sm-12 '>
					<input type='text' id='alamat_pasien' name='alamat_pasien' required='required' class='form-control ' value='$pasien[alamat_pasien]' readonly>
				</div>
			</div>

			<div class='item form-group'>
				<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Desa<span class='required'>*</span>
				</label>
				<div class='col-md-8 col-sm-12 '>
					<input type='text' id='desa_pasien' name='desa_pasien' required='required' class='form-control ' value='$pasien[desa_pasien]' readonly>
				</div>
			</div>

			<div class='item form-group'>
				<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Jenis Kelamin<span class='required'>*</span>
				</label>
				<div class='col-md-6 col-sm-12 '>
					<input type='text' id='jeniskelamin_pasien' name='jeniskelamin_pasien' required='required' class='form-control ' value='$pasien[jeniskelamin_pasien]' readonly>
				</div>
			</div>

			<div class='item form-group'>
				<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Tgl. Lahir<span class='required'>*</span>
				</label>
				<div class='col-md-4 col-sm-12 '>
					<input type='date' id='tanggallahir_pasien' name='tanggallahir_pasien' required='required' class='form-control ' value='$pasien[tanggallahir_pasien]' readonly>
				</div>
			</div>

			<div class='item form-group'>
				<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Tempat Lahir<span class='required'>*</span>
				</label>
				<div class='col-md-4 col-sm-12 '>
					<input type='text' id='tempatlahir_pasien' name='tempatlahir_pasien' required='required' class='form-control ' value='$pasien[tempatlahir_pasien]' readonly>
				</div>
			</div>

			<div class='item form-group'>
				<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>No. Telp<span class='required'>*</span>
				</label>
				<div class='col-md-4 col-sm-12 '>
					<input type='text' id='notlp_pasien' name='notlp_pasien' required='required' class='form-control ' value='$pasien[notlp_pasien]' readonly>
				</div>
			</div>

			<div class='item form-group'>
				<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Jenis Jaminan Kesehatan<span class='required'>*</span>
				</label>
				<div class='col-md-8 col-sm-12 '>
					<input type='text' id='jenisjamkes_pasien' name='jenisjamkes_pasien' required='required' class='form-control ' value='$pasien[jenisjamkes_pasien]' readonly>
				</div>
			</div>

			<div class='item form-group'>
				<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>No. Jaminan Kesehatan<span class='required'>*</span>
				</label>
				<div class='col-md-6 col-sm-12 '>
					<input type='text' id='nojamkes_pasien' name='nojamkes_pasien'  class='form-control ' value='$pasien[nojamkes_pasien]' readonly>
				</div>
			</div>
		";
	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */