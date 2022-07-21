<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Poli_model', 'poli');
		$this->load->model('Pelayanan_model', 'pelayanan');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
        $this->load->library('Pdf');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Laporan',
			'judul'			=> 'Laporan Pelayanan Puskesmas',
			'content'		=> 'laporan/v_content',
			'ajax'	 		=> 'laporan/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function cetak()
	{
		$tahun = $this->input->post('tahun');
		$bulan = $this->input->post('bulan');

		switch ($bulan) {
			case '01':
				$bulan_format = 'Januari';
				break;
			case '02':
				$bulan_format = 'Februari';
				break;
			case '03':
				$bulan_format = 'Maret';
				break;
			case '04':
				$bulan_format = 'April';
				break;
			case '05':
				$bulan_format = 'Mei';
				break;
			case '06':
				$bulan_format = 'Juni';
				break;
			case '07':
				$bulan_format = 'Juli';
				break;
			case '08':
				$bulan_format = 'Agustus';
				break;
			case '09':
				$bulan_format = 'September';
				break;
			case '10':
				$bulan_format = 'Oktober';
				break;
			case '11':
				$bulan_format = 'November';
				break;
			case '12':
				$bulan_format = 'Desember';
				break;

			default:
				$bulan_format = '';
				break;
		}

		

		$poli =  	$this->poli->tabel()->result();

		echo $ttl_perempuan_jenispembayaran = $this->pelayanan->ttl_jenispembayaran($tahun,$bulan,'Laki-Laki','Umum');
		echo $ttl_lakilaki_jenispembayaran = $this->pelayanan->ttl_jenispembayaran($tahun,$bulan,'Laki-Laki','BPJS');

		$isi = '
		
			<style>
				h5{
					text-align: center;
					text-font: 11px;
					padding: 0px;
					font-weight: reguler;
				}
			</style>
			
			<table style="font-size: 14px;">
				<tbody>
					<tr style="text-align: center;">
						<td><b>LAPORAN PELAYANAN PUSKESMAS GAYAM</b></td>
					</tr>
					<tr style="text-align: center;">
						<td>Bulan '.$bulan_format.' Tahun '.$tahun.'</td>
					</tr>
					<tr style="text-align: center;">
						<td></td>
					</tr>
					<tr style="text-align: center;">
						<td></td>
					</tr>
				</tbody>
			</table>

			<table style="font-size: 11px; width: 1200px;">
				<tbody>
					<tr style="text-align: center;">
						<td>
							<table border="1" style="font-size: 11px; padding:5; width: 350px;">
								<tbody>
								<tr style="text-align: center;">
									<th><b>Jenis Pembayaran</b></th>
									<th><b>Perempuan</b></th>
									<th><b>Laki-Laki</b></th>
									<th><b>JML</b></th>
								</tr>
				
								<tr style="text-align: center;">
									<th>Umum</th>
									<th>'.$this->pelayanan->ttl_jenispembayaran($tahun,$bulan,'Perempuan','Umum').'</th>
									<th>'.$this->pelayanan->ttl_jenispembayaran($tahun,$bulan,'Laki-Laki','Umum').'</th>
									<th>'.$this->pelayanan->ttl_jenispembayaran($tahun,$bulan,'','Umum').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>BPJS</th>
									<th>'.$this->pelayanan->ttl_jenispembayaran($tahun,$bulan,'Perempuan','BPJS').'</th>
									<th>'.$this->pelayanan->ttl_jenispembayaran($tahun,$bulan,'Laki-Laki','BPJS').'</th>
									<th>'.$this->pelayanan->ttl_jenispembayaran($tahun,$bulan,'','BPJS').'</th>
								</tr>

								<tr style="text-align: center;">
									<th colspan="3">Total</th>
									<th>'.$this->pelayanan->ttl_jenispembayaran($tahun,$bulan,'','').'</th>
								</tr>
								
								</tbody>
							</table>

							<br>

							<table border="0" style="font-size: 11px; padding:10; width: 350px;">
								<tbody>
								<tr style="text-align: center;">
									<th></th>
								</tr>
								
								</tbody>
							</table>

							<table border="1" style="font-size: 11px; padding:5; width: 350px;">
								<tbody>
								<tr style="text-align: center;">
									<th><b>Jenis Kunjungan</b></th>
									<th><b>Perempuan</b></th>
									<th><b>Laki-Laki</b></th>
									<th><b>JML</b></th>
								</tr>
				
								<tr style="text-align: center;">
									<th>Baru</th>
									<th>'.$this->pelayanan->ttl_jeniskunjungan($tahun,$bulan,'Perempuan','Baru').'</th>
									<th>'.$this->pelayanan->ttl_jeniskunjungan($tahun,$bulan,'Laki-Laki','Baru').'</th>
									<th>'.$this->pelayanan->ttl_jeniskunjungan($tahun,$bulan,'','Baru').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Lama</th>
									<th>'.$this->pelayanan->ttl_jeniskunjungan($tahun,$bulan,'Perempuan','Lama').'</th>
									<th>'.$this->pelayanan->ttl_jeniskunjungan($tahun,$bulan,'Laki-Laki','Lama').'</th>
									<th>'.$this->pelayanan->ttl_jeniskunjungan($tahun,$bulan,'','Lama').'</th>
								</tr>

								<tr style="text-align: center;">
									<th colspan="3">Total</th>
									<th>'.$this->pelayanan->ttl_jeniskunjungan($tahun,$bulan,'','').'</th>
								</tr>
								
								</tbody>
							</table>

							<table border="0" style="font-size: 11px; padding:10; width: 350px;">
								<tbody>
								<tr style="text-align: center;">
									<th></th>
								</tr>
								
								</tbody>
							</table>

							<table border="1" style="font-size: 11px; padding:5; width: 350px;">
								<tbody>
								<tr style="text-align: center;">
									<th><b>Poli Tujuan</b></th>
									<th><b>Perempuan</b></th>
									<th><b>Laki-Laki</b></th>
									<th><b>JML</b></th>
								</tr>';

								foreach($poli as $row_poli){
									$isi .= '
									<tr style="text-align: center;">
										<th>'.$row_poli->nama_poli.'</th>
										<th>'.$this->pelayanan->ttl_jenispoli($tahun,$bulan,'Perempuan',$row_poli->id_poli).'</th>
										<th>'.$this->pelayanan->ttl_jenispoli($tahun,$bulan,'Laki-Laki',$row_poli->id_poli).'</th>
										<th>'.$this->pelayanan->ttl_jenispoli($tahun,$bulan,'',$row_poli->id_poli).'</th>
									</tr>
									';
								}
								
								
							$isi .=	'<tr style="text-align: center;">
									<th colspan="3">Total</th>
									<th>'.$this->pelayanan->ttl_jenispoli($tahun,$bulan,'','').'</th>
								</tr>
								</tbody>
							</table>

						</td>
						<td>
							<table border="1" style="font-size: 11px; padding:5; width: 350px;">
								<tbody>
								<tr style="text-align: center;">
									<th><b>Jenis Kunjungan</b></th>
									<th><b>BPJS</b></th>
									<th><b>UMUM</b></th>
									<th><b>JML</b></th>
								</tr>
				
								<tr style="text-align: center;">
									<th>Baru</th>
									<th>'.$this->pelayanan->ttl_jeniskunjunganbayar($tahun,$bulan,'Baru','BPJS').'</th>
									<th>'.$this->pelayanan->ttl_jeniskunjunganbayar($tahun,$bulan,'Baru','Umum').'</th>
									<th>'.$this->pelayanan->ttl_jeniskunjunganbayar($tahun,$bulan,'Baru','').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Lama</th>
									<th>'.$this->pelayanan->ttl_jeniskunjunganbayar($tahun,$bulan,'Lama','BPJS').'</th>
									<th>'.$this->pelayanan->ttl_jeniskunjunganbayar($tahun,$bulan,'Lama','Umum').'</th>
									<th>'.$this->pelayanan->ttl_jeniskunjunganbayar($tahun,$bulan,'Lama','').'</th>
								</tr>

								<tr style="text-align: center;">
									<th colspan="3">Total</th>
									<th>'.$this->pelayanan->ttl_jeniskunjunganbayar($tahun,$bulan,'','').'</th>
								</tr>

								
								
								</tbody>
							</table>
						</td>

						<td>
							<table border="1" style="font-size: 11px; padding:5; width: 200px;">
								<tbody>
								<tr style="text-align: center;">
									<th colspan="2"><b>Alamat</b></th>
								</tr>
				
								<tr style="text-align: center;">
									<th>Gayam</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'Gayam').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Gendang Barat</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'Gendang Barat').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Gendang Timur</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'Gendang Timur').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Jambuir</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'Jambuir').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Kalowang</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'Kalowang').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Karang Tengah</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'Karang Tengah').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Nyamplong</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'Nyamplong').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Pancor</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'Pancor').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Prambanan</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'Prambanan').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Tarebung</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'Tarebung').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Lainya</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'Lainya').'</th>
								</tr>

								<tr style="text-align: center;">
									<th>Total</th>
									<th>'.$this->pelayanan->ttl_jenisdesa($tahun,$bulan,'').'</th>
								</tr>

								
								
								</tbody>
							</table>
						</td>

					</tr>
				</tbody>
			</table>


		';
	
			
			
		$data = array(
			'isi'			=> $isi
		);
		
		$this->load->view('laporan/v_cetak', $data, FALSE);
	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */