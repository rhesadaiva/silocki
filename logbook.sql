-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2019 at 05:42 AM
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
  `formulaiku` varchar(1024) NOT NULL,
  `targetiku` varchar(128) NOT NULL,
  `nilaitertinggi` varchar(128) NOT NULL,
  `satuanpengukuran` enum('Persentase','Indeks','Satuan','Waktu') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `konsolidasiperiodeiku` enum('Sum','Average','Take Last Known','') NOT NULL,
  `iku_validated` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikatorkinerjautama`
--

INSERT INTO `indikatorkinerjautama` (`id_iku`, `nip`, `nomorkk`, `kodeiku`, `namaiku`, `formulaiku`, `targetiku`, `nilaitertinggi`, `satuanpengukuran`, `konsolidasiperiodeiku`, `iku_validated`) VALUES
('5cf7d44220957', 'admin', '123', '1a-N', 'IKU 1', 'IKU 1', '100', '100', 'Persentase', 'Average', 1);

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
  `is_validated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontrakkinerja`
--

INSERT INTO `kontrakkinerja` (`id`, `nip`, `kontrakkinerjake`, `nomorkk`, `tanggalmulai`, `tanggalselesai`, `is_validated`) VALUES
('5cf6f9b586cd3', 'admin', 'Pertama', '123', '2019-01-01', '2019-12-31', 1),
('5cf6f9ea65c77', '199506072015021003', 'Pertama', 'ABC/123', '2019-01-01', '2019-12-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id_logbook` varchar(225) NOT NULL,
  `id_iku` int(11) NOT NULL,
  `periode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `perhitungan` varchar(255) NOT NULL,
  `realisasibulan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `realisasiterakhir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ket` varchar(255) NOT NULL,
  `wakturekam` varchar(255) NOT NULL,
  `is_approved` int(2) NOT NULL,
  `is_sent` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id_logbook`, `id_iku`, `periode`, `perhitungan`, `realisasibulan`, `realisasiterakhir`, `ket`, `wakturekam`, `is_approved`, `is_sent`) VALUES
('5cf6fb39ba1a3', 5, 'Januari', '123', '123', '123', '123', 'Rabu, 5 Juni 2019 | Pukul 06:14 WIB', 0, 1);

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pangkat` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `level` varchar(128) NOT NULL,
  `seksi` varchar(128) NOT NULL,
  `atasan` varchar(128) NOT NULL,
  `nipatasan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nip`, `pangkat`, `password`, `role_id`, `level`, `seksi`, `atasan`, `nipatasan`) VALUES
(1, 'Administrator', 'admin', '0', '21232f297a57a5a743894a0e4a801fc3', 1, 'Admin', 'Pengolahan Data dan Administrasi Dokumen', 'Kepala Kantor', 'kakan'),
(3, 'Kepala Kantor', 'kakan', '', '57aee06784fb57b06e11b4633ceeb9c3', 2, 'Kepala Kantor', 'Kepala Kantor', 'Admin', ''),
(4, 'Rhesa Daiva Bremana', '199506072015021003', 'Pengatur Muda Tk.I /II.b', 'e10adc3949ba59abbe56e057f20f883e', 5, 'Pelaksana', 'Pengolahan Data dan Administrasi Dokumen', 'Zuhalta', '1962110101983031001');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
