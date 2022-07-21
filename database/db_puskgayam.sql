-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Jul 2021 pada 19.28
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puskgayam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(3) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(3) NOT NULL,
  `nik_dokter` varchar(30) NOT NULL,
  `nama_dokter` varchar(70) NOT NULL,
  `inisial_dokter` varchar(5) NOT NULL,
  `alamat_dokter` varchar(100) NOT NULL,
  `notlp_dokter` varchar(20) NOT NULL,
  `id_poli` int(3) NOT NULL,
  `username_dokter` varchar(50) NOT NULL,
  `password_dokter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `nik_dokter`, `nama_dokter`, `inisial_dokter`, `alamat_dokter`, `notlp_dokter`, `id_poli`, `username_dokter`, `password_dokter`) VALUES
(2, '113232', 'dr. Murni', 'DMR', 'Jl. Perjuangan', '08283236', 1, 'murni', '917f7acd85535acd532c373b24856bccaacbab16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(11) NOT NULL,
  `noreg_pasien` varchar(20) NOT NULL,
  `nikktp_pasien` varchar(30) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `desa_pasien` varchar(50) NOT NULL,
  `alamat_pasien` varchar(100) NOT NULL,
  `notlp_pasien` varchar(20) NOT NULL,
  `jeniskelamin_pasien` varchar(50) NOT NULL,
  `tempatlahir_pasien` varchar(30) NOT NULL,
  `tanggallahir_pasien` date NOT NULL,
  `jenisjamkes_pasien` varchar(50) NOT NULL,
  `nojamkes_pasien` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `noreg_pasien`, `nikktp_pasien`, `nama_pasien`, `desa_pasien`, `alamat_pasien`, `notlp_pasien`, `jeniskelamin_pasien`, `tempatlahir_pasien`, `tanggallahir_pasien`, `jenisjamkes_pasien`, `nojamkes_pasien`) VALUES
(2, '2323', '327866565', 'Kamandanu Sugiarto', 'Gendang Barat', 'Puri Indah Residence', '0823236', 'Laki-Laki', 'Cirebon', '1991-07-27', 'Umum', ''),
(3, '72733', '32788', 'Gibran', 'Jambuir', 'Puri ndah Residence', '082637263', 'Laki-Laki', 'Cirebon', '2006-10-10', 'BPJS', '6256323');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelayanan`
--

CREATE TABLE `tbl_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `no_pendaftaran` varchar(50) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `keluhan_pasien` text NOT NULL,
  `pemeriksaan_dokter` text NOT NULL,
  `diagnosa_dokter` text NOT NULL,
  `tindakan_dokter` text NOT NULL,
  `status_pelayanan` varchar(20) NOT NULL,
  `status_kunjungan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelayanan`
--

INSERT INTO `tbl_pelayanan` (`id_pelayanan`, `tgl_pendaftaran`, `no_pendaftaran`, `id_pasien`, `id_dokter`, `keluhan_pasien`, `pemeriksaan_dokter`, `diagnosa_dokter`, `tindakan_dokter`, `status_pelayanan`, `status_kunjungan`) VALUES
(8, '2021-07-11', 'Umum-DMR-001', 2, 2, 'Sakit Kepala', '-', '-', '-', 'Selesai', 'Baru'),
(9, '2021-07-11', 'Umum-DMR-002', 3, 2, '-', '-', '-', '-', 'Selesai', 'Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poli`
--

CREATE TABLE `tbl_poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_poli`
--

INSERT INTO `tbl_poli` (`id_poli`, `nama_poli`) VALUES
(1, 'Umum'),
(2, 'Kia'),
(3, 'Gigi'),
(4, 'Hatiku'),
(5, 'UGD'),
(6, 'RANAP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tbl_pelayanan`
--
ALTER TABLE `tbl_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id_dokter` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pelayanan`
--
ALTER TABLE `tbl_pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
