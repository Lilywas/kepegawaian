-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 12:55 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi_bidang`
--

CREATE TABLE `kompetensi_bidang` (
  `id_kompetensi` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `kompetensi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kompetensi_bidang`
--

INSERT INTO `kompetensi_bidang` (`id_kompetensi`, `id_pegawai`, `kompetensi`, `keterangan`) VALUES
(23, 1, 'Sertifikat MOT', ''),
(24, 1, 'Sertifikat TOC', ''),
(25, 4, 'Kompetensi IT', '');

-- --------------------------------------------------------

--
-- Table structure for table `pns_local`
--

CREATE TABLE `pns_local` (
  `id_pegawai` int(5) NOT NULL,
  `status` enum('p','n') NOT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text NOT NULL,
  `pend_terakhir` varchar(50) NOT NULL,
  `jurusan` varchar(40) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `jabatan` varchar(45) NOT NULL,
  `unit_kerja_pegawai` int(3) DEFAULT NULL,
  `sub_pegawai` int(3) DEFAULT NULL,
  `jenis_jabatan` varchar(255) NOT NULL,
  `tanggal_mulai_kerja` date NOT NULL,
  `pensiun` int(3) NOT NULL,
  `status_kerja` int(1) NOT NULL DEFAULT '1',
  `keterangan_status_kerja` varchar(250) NOT NULL,
  `tanggal_selesai_kerja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pns_local`
--

INSERT INTO `pns_local` (`id_pegawai`, `status`, `nip`, `nama`, `jk`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `pend_terakhir`, `jurusan`, `no_telp`, `email`, `pangkat`, `jabatan`, `unit_kerja_pegawai`, `sub_pegawai`, `jenis_jabatan`, `tanggal_mulai_kerja`, `pensiun`, `status_kerja`, `keterangan_status_kerja`, `tanggal_selesai_kerja`) VALUES
(1, 'p', '196212242005011017', 'M. Sholeh,SE', 'Laki-laki', 'Islam', 'JAKARTA', '1976-02-24', 'JL. PEMUDA KOTA SEMARANG', 'S1', 'EKONOMI', '0812290829', 'msholeh@gmail.com', 'Penata Muda (III/A)', 'umum', 3, 3, 'Administrasi', '0000-00-00', 58, 1, '', '0000-00-00'),
(2, 'p', '197105262009091034', 'Sukiman', 'Laki-laki', 'Kristen', 'SEMARANG', '1961-05-06', 'BANYUBIRU KAB. SEMARANG', 'SMA/K', '', '', '', 'Pengatur Tingkat I (II/D)', 'umum', 4, 4, 'Kepala Sub Bidang I A', '0000-00-00', 58, 1, '', '0000-00-00'),
(3, 'p', '196612032010041044', 'Mirna,S.H', 'Perempuan', 'Kristen', 'PALEMBANG', '1961-04-03', 'SLEMAN YOGYAKARTA', 'S1', 'HUKUM', '08783102227', 'mirnapalembang@gmail.com', 'Pengatur Tingkat I (II/D)', 'umum', 3, 1, 'Pengadministrasi umum', '0000-00-00', 58, 1, '', '0000-00-00'),
(4, 'n', '', 'Kamiran,S.H', 'Laki-laki', 'Islam', 'PURWOREJO ', '1961-04-12', 'JL. PEMUDA KOTA SEMARANG', 'S1', '  HUKUM', '08179526597', '', '', 'non', 3, 3, 'Administrasi', '0000-00-00', 0, 1, '', '0000-00-00'),
(5, 'p', '198505191999031094', 'Sri Wahyuni,S.H', 'Perempuan', 'Islam', 'KLATEN', '1965-05-15', 'BANYUMANIK SEMARANG', 'S1', 'HUKUM', '081392629709', '', 'Penata Tingkat I (III/D)', 'umum', 4, 5, 'Pengelola Data', '0000-00-00', 58, 0, 'Pensiun', '0000-00-00'),
(6, 'p', '196011191999031079', 'Heru,S.H', 'Laki-laki', 'Islam', 'TEGAL', '1965-12-29', 'UNGARAN KAB. SEMARAGNG ', 'S1', 'HUKUM DAGANG', '08586537710', '', 'Penata Tingkat I (III/D)', 'umum', 4, 5, 'Pengelola Data', '0000-00-00', 58, 0, 'Mutasi ke Pemkot', '0000-00-00'),
(7, 'n', '', 'Toni Wiranto,SE.', 'Laki-laki', 'Islam', 'BLORA', '1985-07-10', 'SAMBONG KAB BLORA', 'S1', 'Ekonomi Pembangunan', '08139034008', 'toni.w@gmail.com', '', 'non', 3, 1, 'Administrasi', '2015-01-02', 0, 0, 'Lainnya', '0000-00-00'),
(8, 'n', '', 'Rahima', 'Perempuan', 'Islam', 'PATI', '1987-07-31', 'SLEMAN YOGYAKARTA', 'SMA/K', 'IPS', '', '', '', 'non', 3, 3, 'Front Office', '2019-01-02', 0, 1, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_unit_kerja`
--

CREATE TABLE `riwayat_unit_kerja` (
  `id_riwayat_unit_kerja` int(11) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `unit_kerja` varchar(100) NOT NULL,
  `sub_unit_kerja` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_unit_kerja`
--

INSERT INTO `riwayat_unit_kerja` (`id_riwayat_unit_kerja`, `id_pegawai`, `unit_kerja`, `sub_unit_kerja`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 6, 'Sekretariat WI', 'Administrasi', '2019-05-28', '2019-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `sub_unit_kerja`
--

CREATE TABLE `sub_unit_kerja` (
  `id_sub_unit` int(3) NOT NULL,
  `id_unit` int(3) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_unit_kerja`
--

INSERT INTO `sub_unit_kerja` (`id_sub_unit`, `id_unit`, `keterangan`) VALUES
(1, 3, 'Sub Program'),
(3, 3, 'Sub Kepegawaian'),
(4, 4, 'Sub Bidang I A'),
(5, 4, 'Sub Bidang I B'),
(6, 4, 'Sub Bidang I C'),
(7, 5, 'Sub Bidang II A'),
(8, 5, 'Sub Bidang II B');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit` int(3) NOT NULL,
  `nama_unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit`, `nama_unit`) VALUES
(3, 'Sekretariat'),
(4, 'Bidang I '),
(5, 'Bidang II');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kompetensi_bidang`
--
ALTER TABLE `kompetensi_bidang`
  ADD PRIMARY KEY (`id_kompetensi`);

--
-- Indexes for table `pns_local`
--
ALTER TABLE `pns_local`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `riwayat_unit_kerja`
--
ALTER TABLE `riwayat_unit_kerja`
  ADD PRIMARY KEY (`id_riwayat_unit_kerja`);

--
-- Indexes for table `sub_unit_kerja`
--
ALTER TABLE `sub_unit_kerja`
  ADD PRIMARY KEY (`id_sub_unit`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kompetensi_bidang`
--
ALTER TABLE `kompetensi_bidang`
  MODIFY `id_kompetensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pns_local`
--
ALTER TABLE `pns_local`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `riwayat_unit_kerja`
--
ALTER TABLE `riwayat_unit_kerja`
  MODIFY `id_riwayat_unit_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_unit_kerja`
--
ALTER TABLE `sub_unit_kerja`
  MODIFY `id_sub_unit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
