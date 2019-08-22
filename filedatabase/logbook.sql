-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2019 at 01:39 PM
-- Server version: 8.0.15
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `indikatorkinerjautama`
--

CREATE TABLE `indikatorkinerjautama` (
  `id_iku` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `nomorkk` varchar(128) NOT NULL,
  `kodeiku` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `namaiku` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `formulaiku` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `targetiku` varchar(128) NOT NULL,
  `nilaitertinggi` varchar(128) NOT NULL,
  `satuanpengukuran` enum('Persentase','Indeks','Satuan','Waktu') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `aspektarget` enum('Kuantitas','Kualitas','Waktu','Biaya') NOT NULL,
  `penanggungjawab` varchar(256) NOT NULL,
  `penyediadata` varchar(256) NOT NULL,
  `sumberdata` varchar(100) NOT NULL,
  `periodepelaporan` enum('Bulanan','Triwulanan','Semesteran','Tahunan') NOT NULL,
  `konsolidasiperiodeiku` enum('Sum','Average','Take Last Known','') NOT NULL,
  `konversi120` enum('Ya','Tidak') NOT NULL,
  `iku_validated` int(12) NOT NULL,
  `nama_validated` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kontrakkinerja`
--

CREATE TABLE `kontrakkinerja` (
  `id` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `kontrakkinerjake` varchar(128) NOT NULL,
  `nomorkk` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggalmulai` date NOT NULL,
  `tanggalselesai` date NOT NULL,
  `is_validated` int(11) NOT NULL,
  `tgl_validated` varchar(128) NOT NULL,
  `nama_validated` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id_logbook` varchar(225) NOT NULL,
  `id_iku` varchar(128) NOT NULL,
  `nippegawai` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `periode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `perhitungan` varchar(255) NOT NULL,
  `realisasibulan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `realisasiterakhir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `wakturekam` datetime NOT NULL,
  `is_approved` int(2) NOT NULL,
  `is_sent` int(2) NOT NULL,
  `tgl_approve` datetime NOT NULL,
  `tgl_batalapprove` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_validated` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id` int(11) NOT NULL,
  `pangkat/golongan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id`, `pangkat/golongan`) VALUES
(1, 'Pengatur Muda/II.a'),
(2, 'Pengatur Muda Tk.I/II.b'),
(3, 'Pengatur/II.c'),
(4, 'Pengatur Tk.I/II.d'),
(5, 'Penata Muda/III.a'),
(6, 'Penata Muda Tk.I/III.b\r\n'),
(7, 'Penata/III.c'),
(8, 'Penata Tk.I/III.d'),
(9, 'Pembina/IV.a'),
(10, 'Pembina Tk.I/IV.b'),
(11, 'Pembina Utama Muda/IV.c'),
(12, 'Pembina Utama Madya/IV.d'),
(13, 'Pembina Utama/IV.e');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `content` varchar(512) NOT NULL,
  `tglrekam` date NOT NULL,
  `is_sent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seksi/subseksi`
--

CREATE TABLE `seksi/subseksi` (
  `id` int(11) NOT NULL,
  `seksi/subseksi` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seksi/subseksi`
--

INSERT INTO `seksi/subseksi` (`id`, `seksi/subseksi`) VALUES
(1, 'Subbagian Umum'),
(2, 'Urusan Tata Usaha dan Kepegawaian'),
(3, 'Urusan Rumah Tangga'),
(4, 'Urusan Keuangan'),
(5, 'Seksi Penindakan dan Penyidikan'),
(6, 'Subseksi Penindakan dan Sarana Operasi'),
(7, 'Subseksi Intelijen'),
(8, 'Subseksi Penyidikan dan Barang Hasil Penindakan'),
(9, 'Seksi Kepatuhan Internal'),
(10, 'Subseksi Kepatuhan Pelaksanaan Tugas Pengawasan'),
(11, 'Subseksi Kepatuhan Pelaksanaan Tugas Administrasi'),
(12, 'Seksi Pengolahan Data dan Administrasi Dokumen'),
(13, 'Seksi Pelayanan Kepabeanan dan Cukai I'),
(14, 'Seksi Pelayanan Kepabeanan dan Cukai II'),
(15, 'Seksi Pelayanan Kepabeanan dan Cukai III'),
(16, 'Seksi Pelayanan Kepabeanan dan Cukai IV'),
(17, 'Seksi Pelayanan Kepabeanan dan Cukai V'),
(18, 'Seksi Pelayanan Kepabeanan dan Cukai VI'),
(19, 'Subseksi Hanggar Pabean dan Cukai I'),
(20, 'Subseksi Hanggar Pabean dan Cukai II'),
(21, 'Subseksi Hanggar Pabean dan Cukai III'),
(22, 'Subseksi Hanggar Pabean dan Cukai IV'),
(23, 'Subseksi Hanggar Pabean dan Cukai V'),
(24, 'Subseksi Hanggar Pabean dan Cukai VI'),
(25, 'Subseksi Hanggar Pabean dan Cukai VII'),
(26, 'Subseksi Hanggar Pabean dan Cukai VIII'),
(27, 'Subseksi Hanggar Pabean dan Cukai IX'),
(28, 'Subseksi Hanggar Pabean dan Cukai X'),
(29, 'Subseksi Hanggar Pabean dan Cukai XI'),
(30, 'Subseksi Hanggar Pabean dan Cukai XII'),
(31, 'Subseksi Hanggar Pabean dan Cukai XIII'),
(32, 'Subseksi Hanggar Pabean dan Cukai XIV'),
(33, 'Subseksi Hanggar Pabean dan Cukai XV'),
(34, 'Seksi Perbendaharaan'),
(35, 'Subseksi Administrasi Manifest'),
(36, 'Subseksi Administrasi Penerimaan dan Jaminan'),
(37, 'Subseksi Penagihan dan Pengembalian'),
(38, 'Seksi Penyuluhan dan Layanan Informasi'),
(39, 'Subseksi Penyuluhan'),
(40, 'Subseksi Layanan Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_log`
--

CREATE TABLE `tabel_log` (
  `log_id` int(11) NOT NULL,
  `log_time` varchar(100) NOT NULL,
  `log_user` varchar(255) DEFAULT NULL,
  `log_tipe` int(11) DEFAULT NULL,
  `log_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pangkat` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `seksi` varchar(128) NOT NULL,
  `atasan` varchar(128) NOT NULL,
  `telegram` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nip`, `pangkat`, `password`, `role_id`, `seksi`, `atasan`, `telegram`) VALUES
(1, 'Administrator', 'admin', 'Pengatur Muda Tk.I/II.b', '21232f297a57a5a743894a0e4a801fc3', 1, 'Seksi Pengolahan Data dan Administrasi Dokumen', 'Zuhalta', '287035103'),
(3, 'Kepala Kantor', 'kakan', 'Pembina/IV.a', '57aee06784fb57b06e11b4633ceeb9c3', 1, 'Kepala Kantor', 'Kepala Kantor', ''),
(4, 'Rhesa Daiva Bremana', '199506072015021003', 'Pengatur Muda/II.a', '0ca4503d3a2257ea26cbbcc2651ecb4c', 5, 'Seksi Pengolahan Data dan Administrasi Dokumen', 'Zuhalta', '287035103'),
(9, 'Zuhalta', '196212241983031001', 'Penata Tk.I/III.d', 'e10adc3949ba59abbe56e057f20f883e', 3, 'Seksi Pengolahan Data dan Administrasi Dokumen', 'Kepala Kantor', ''),
(10, 'Sukardi', '196510102005011001', 'Pengatur Tk.I/II.d', 'e10adc3949ba59abbe56e057f20f883e', 5, 'Seksi Pengolahan Data dan Administrasi Dokumen', 'Zuhalta', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `level`) VALUES
(1, 'Admin'),
(2, 'Kepala Kantor'),
(3, 'Kepala Seksi'),
(4, 'Kepala Sub Seksi'),
(5, 'Pelaksana');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `is_used` int(2) NOT NULL,
  `is_sent` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indikatorkinerjautama`
--
ALTER TABLE `indikatorkinerjautama`
  ADD PRIMARY KEY (`id_iku`);

--
-- Indexes for table `kontrakkinerja`
--
ALTER TABLE `kontrakkinerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id_logbook`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seksi/subseksi`
--
ALTER TABLE `seksi/subseksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_log`
--
ALTER TABLE `tabel_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seksi/subseksi`
--
ALTER TABLE `seksi/subseksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tabel_log`
--
ALTER TABLE `tabel_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
