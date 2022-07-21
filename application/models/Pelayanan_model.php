<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_pelayanan');
		$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
		$this->db->join('tbl_dokter','tbl_pelayanan.id_dokter = tbl_dokter.id_dokter','inner');
		$this->db->join('tbl_poli','tbl_dokter.id_poli = tbl_poli.id_poli','inner');
		$this->db->order_by('tbl_pelayanan.id_pelayanan', 'Desc');
		$query = $this->db->get();
		return $query;
	}

	public function tabel_bydokter()
	{
		$this->db->select('*');
		$this->db->from('tbl_pelayanan');
		$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
		$this->db->join('tbl_dokter','tbl_pelayanan.id_dokter = tbl_dokter.id_dokter','inner');
		$this->db->join('tbl_poli','tbl_dokter.id_poli = tbl_poli.id_poli','inner');
		$this->db->where('tbl_pelayanan.id_dokter', $this->session->userdata('id'));
		$this->db->order_by('tbl_pelayanan.status_pelayanan', 'Asc');
		$this->db->order_by('tbl_pelayanan.id_pelayanan', 'Asc');
		$query = $this->db->get();
		return $query;
	}

	public function total_pasien($tglsekarang)
    {
        $this->db->select('count(*) as j_dokter');
		$this->db->from('tbl_pelayanan');
		$this->db->where('tgl_pendaftaran', $tglsekarang);
		$query = $this->db->get()->row();
		return $query->j_dokter;
    }

	public function total_antri($tglsekarang)
    {
        $this->db->select('count(*) as j_dokter');
		$this->db->from('tbl_pelayanan');
		$this->db->where('tgl_pendaftaran', $tglsekarang);
		$this->db->where('status_pelayanan', 'Antri');
		$query = $this->db->get()->row();
		return $query->j_dokter;
    }

	public function total_selesai($tglsekarang)
    {
        $this->db->select('count(*) as j_dokter');
		$this->db->from('tbl_pelayanan');
		$this->db->where('tgl_pendaftaran', $tglsekarang);
		$this->db->where('status_pelayanan', 'Selesai');
		$query = $this->db->get()->row();
		return $query->j_dokter;
    }


	public function total_pasien_bydokter($tglsekarang)
    {
        $this->db->select('count(*) as j_dokter');
		$this->db->from('tbl_pelayanan');
		$this->db->where('tgl_pendaftaran', $tglsekarang);
		$this->db->where('id_dokter', $this->session->userdata('id'));
		$query = $this->db->get()->row();
		return $query->j_dokter;
    }

	public function total_antri_bydokter($tglsekarang)
    {
        $this->db->select('count(*) as j_dokter');
		$this->db->from('tbl_pelayanan');
		$this->db->where('tgl_pendaftaran', $tglsekarang);
		$this->db->where('id_dokter', $this->session->userdata('id'));
		$this->db->where('status_pelayanan', 'Antri');
		$query = $this->db->get()->row();
		return $query->j_dokter;
    }

	public function total_selesai_bydokter($tglsekarang)
    {
        $this->db->select('count(*) as j_dokter');
		$this->db->from('tbl_pelayanan');
		$this->db->where('tgl_pendaftaran', $tglsekarang);
		$this->db->where('id_dokter', $this->session->userdata('id'));
		$this->db->where('status_pelayanan', 'Selesai');
		$query = $this->db->get()->row();
		return $query->j_dokter;
    }

	public function detail($id_pelayanan)
	{
		$this->db->select('*');
		$this->db->from('tbl_pelayanan');
		$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
		$this->db->join('tbl_dokter','tbl_pelayanan.id_dokter = tbl_dokter.id_dokter','inner');
		$this->db->join('tbl_poli','tbl_dokter.id_poli = tbl_poli.id_poli','inner');
		$this->db->where('tbl_pelayanan.id_pelayanan', $id_pelayanan);
		$query = $this->db->get();
		return $query;
	}

	public function cek_statuskedatangan($id_pasien)
	{
		$this->db->select('*');
		$this->db->from('tbl_pelayanan');
		$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
		$this->db->where('tbl_pelayanan.id_pasien', $id_pasien);
		$query = $this->db->get();
		return $query;
	}

	public function cek_urut_terkahir($tanggal,$id_dokter)
	{
		$this->db->select('no_pendaftaran');
		$this->db->from('tbl_pelayanan');
		$this->db->where('tgl_pendaftaran', $tanggal);
		$this->db->where('id_dokter', $id_dokter);
		$query = $this->db->get();
		return $query;
	}

	public function ttl_jenispembayaran($tahun,$bulan,$kelamin,$pembayaran)
	{
		if($kelamin == '' and $pembayaran !== ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pasien.jenisjamkes_pasien', $pembayaran);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}elseif($kelamin !== '' and $pembayaran == ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pasien.jeniskelamin_pasien', $kelamin);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);
		}elseif($kelamin == '' and $pembayaran == ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);
		}else{

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pasien.jeniskelamin_pasien', $kelamin);
			$this->db->where('tbl_pasien.jenisjamkes_pasien', $pembayaran);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);
		}
			$query = $this->db->get()->row();
			return $query->total;
	}


	public function ttl_jeniskunjungan($tahun,$bulan,$kelamin,$kunjungan)
	{
		if($kelamin == '' and $kunjungan !== ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pelayanan.status_kunjungan', $kunjungan);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}elseif($kelamin !== '' and $kunjungan == ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pasien.jeniskelamin_pasien', $kelamin);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}elseif($kelamin == '' and $kunjungan == ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}else{

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pasien.jeniskelamin_pasien', $kelamin);
			$this->db->where('tbl_pelayanan.status_kunjungan', $kunjungan);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);
		}
			$query = $this->db->get()->row();
			return $query->total;
	}

	public function ttl_jenispoli($tahun,$bulan,$kelamin,$poli)
	{
		if($kelamin == '' and $poli !== ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->join('tbl_dokter','tbl_pelayanan.id_dokter = tbl_dokter.id_dokter','inner');
			$this->db->join('tbl_poli','tbl_dokter.id_poli = tbl_poli.id_poli','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_dokter.id_poli', $poli);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}elseif($kelamin !== '' and $poli == ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->join('tbl_dokter','tbl_pelayanan.id_dokter = tbl_dokter.id_dokter','inner');
			$this->db->join('tbl_poli','tbl_dokter.id_poli = tbl_poli.id_poli','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pasien.jeniskelamin_pasien', $kelamin);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}elseif($kelamin == '' and $poli == ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->join('tbl_dokter','tbl_pelayanan.id_dokter = tbl_dokter.id_dokter','inner');
			$this->db->join('tbl_poli','tbl_dokter.id_poli = tbl_poli.id_poli','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}else{

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->join('tbl_dokter','tbl_pelayanan.id_dokter = tbl_dokter.id_dokter','inner');
			$this->db->join('tbl_poli','tbl_dokter.id_poli = tbl_poli.id_poli','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pasien.jeniskelamin_pasien', $kelamin);
			$this->db->where('tbl_dokter.id_poli', $poli);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);
		}
			$query = $this->db->get()->row();
			return $query->total;
	}

	public function ttl_jeniskunjunganbayar($tahun,$bulan,$kunjungan,$pembayaran)
	{
		if($pembayaran == '' and $kunjungan !== ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pelayanan.status_kunjungan', $kunjungan);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}elseif($pembayaran !== '' and $kunjungan == ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pasien.jenisjamkes_pasien', $pembayaran);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}elseif($pembayaran == '' and $kunjungan == ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}else{

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pasien.jenisjamkes_pasien', $pembayaran);
			$this->db->where('tbl_pelayanan.status_kunjungan', $kunjungan);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}
			$query = $this->db->get()->row();
			return $query->total;
	}

	public function ttl_jenisdesa($tahun,$bulan,$desa)
	{
		if($desa !== ''){

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('tbl_pasien.desa_pasien', $desa);
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}else{

			$this->db->select('count(*) as total');
			$this->db->from('tbl_pelayanan');
			$this->db->join('tbl_pasien','tbl_pelayanan.id_pasien = tbl_pasien.id_pasien','inner');
			$this->db->where('tbl_pelayanan.status_pelayanan', 'Selesai');
			$this->db->where('year(tbl_pelayanan.tgl_pendaftaran)', $tahun);
			$this->db->where('month(tbl_pelayanan.tgl_pendaftaran)', $bulan);

		}
			$query = $this->db->get()->row();
			return $query->total;
	}





	public function insert($data)
	{
		$this->db->insert('tbl_pelayanan', $data);
	}

	public function update($data)
	{
		$this->db->where('id_pelayanan', $data['id_pelayanan']);
		$this->db->update('tbl_pelayanan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_pelayanan', $data['id_pelayanan']);
		$this->db->delete('tbl_pelayanan');
	}



}
