<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin');
		$this->load->model('Dokter_model', 'dokter');
		$this->load->model('Pelayanan_model', 'pelayanan');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$tglsekarang = date('Y-m-d');
		if($this->session->userdata('level') == 'Admin'){

			$data = array(
				'title'					=> $this->session->userdata('level').' - Dashboard',
				'total_dokter'			=> $this->dokter->jumlah_dokter(),
				'total_pasien'			=> $this->pelayanan->total_pasien($tglsekarang),
				'total_antri'			=> $this->pelayanan->total_antri($tglsekarang),
				'total_selesai'			=> $this->pelayanan->total_selesai($tglsekarang),
				'user'					=> $this->session->userdata('nama'),
				'content'	 			=> 'dashboard/v_content',
				'ajax'	 				=> 'dashboard/v_ajax'
			);

		}else{

			$data = array(
				'title'					=> $this->session->userdata('level').' - Dashboard',
				'total_dokter'			=> $this->dokter->jumlah_dokter(),
				'total_pasien'			=> $this->pelayanan->total_pasien_bydokter($tglsekarang),
				'total_antri'			=> $this->pelayanan->total_antri_bydokter($tglsekarang),
				'total_selesai'			=> $this->pelayanan->total_selesai_bydokter($tglsekarang),
				'user'					=> $this->session->userdata('nama'),
				'content'	 			=> 'dashboard/v_content',
				'ajax'	 				=> 'dashboard/v_ajax'
			);
			
		}
		
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */