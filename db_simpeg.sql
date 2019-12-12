-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 06:51 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `judul_berita` varchar(30) NOT NULL,
  `nama_gambar_berita` text NOT NULL,
  `tanggal` date NOT NULL,
  `isi_berita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_pegawai`, `judul_berita`, `nama_gambar_berita`, `tanggal`, `isi_berita`) VALUES
(25, 13, 'Kenaikan Gaji', 'Kenaikan_Gaji.jpg', '2019-12-10', 'Apa Aja Boleh Mul');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `jenis_cuti` varchar(30) NOT NULL,
  `jumlah_cuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `jenis_cuti`, `jumlah_cuti`) VALUES
(1, 'Cuti Bulanan', 12),
(2, 'Cuti Penting', 8),
(3, 'Cuti Bersalin', 60);

-- --------------------------------------------------------

--
-- Table structure for table `cutipegawai`
--

CREATE TABLE `cutipegawai` (
  `id_cuti` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_cutipegawai` int(11) NOT NULL,
  `awal_cuti` date NOT NULL,
  `akhir_cuti` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id_pegawai` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `pendidikan` varchar(3) NOT NULL,
  `status` varchar(15) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `nama_gambar_profile` text NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id_pegawai`, `alamat`, `agama`, `jenis_kelamin`, `pendidikan`, `status`, `no_telp`, `nama_gambar_profile`, `tanggal_masuk`) VALUES
(13, 'Buaran, Tangerang Selatan', 'Islam', 'L', 'S2', 'Belum Menikah', '0896771869623', '70711300746074108a68ad48d33671b9.jpeg', '2018-08-17'),
(46, 'Serang, Banten', 'Islam', 'L', 'D4', 'Menikah', '089977889901', 'Aris_Indrawan.jpeg', '2019-12-09'),
(47, 'Sawah Baru, Tanngerang Selatan', 'Islam', 'L', 'SMA', 'Menikah', '087788991121', 'd20df993237ee2e5bc8a67a515d3c641.jpeg', '2019-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `nama_jabatan` varchar(30) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`nama_jabatan`, `id_jabatan`) VALUES
('Admin', 1),
('Pegawai', 2),
('Manager', 3);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id_logs` int(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `waktu` datetime NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id_logs`, `kegiatan`, `waktu`, `id_pegawai`) VALUES
(60, 'User maelakukan Login Akun', '2019-12-10 02:34:18', 13),
(61, 'User maelakukan Login Akun', '2019-12-10 07:43:41', 13),
(62, 'User maelakukan Login Akun', '2019-12-10 20:10:17', 13),
(63, 'User melakukan Logout Akun', '2019-12-10 20:12:26', 13),
(64, 'User maelakukan Login Akun', '2019-12-10 20:12:42', 46),
(65, 'User melakukan Logout Akun', '2019-12-10 20:24:19', 46),
(66, 'User maelakukan Login Akun', '2019-12-10 20:24:27', 13),
(67, 'User melakukan Logout Akun', '2019-12-10 21:28:50', 13),
(68, 'User maelakukan Login Akun', '2019-12-10 21:29:20', 46),
(69, 'User melakukan Logout Akun', '2019-12-10 21:41:12', 46),
(70, 'User maelakukan Login Akun', '2019-12-10 21:41:22', 46),
(71, 'User melakukan Logout Akun', '2019-12-10 21:58:58', 46),
(72, 'User maelakukan Login Akun', '2019-12-10 22:00:32', 13),
(73, 'User maelakukan Login Akun', '2019-12-11 08:56:26', 13),
(74, 'User melakukan Logout Akun', '2019-12-11 09:19:05', 13),
(75, 'User maelakukan Login Akun', '2019-12-11 09:19:14', 46),
(76, 'User melakukan Logout Akun', '2019-12-11 09:43:44', 46),
(77, 'User maelakukan Login Akun', '2019-12-11 09:43:56', 47),
(78, 'User melakukan Logout Akun', '2019-12-11 09:58:15', 47),
(79, 'User maelakukan Login Akun', '2019-12-11 09:58:38', 47),
(80, 'User melakukan Logout Akun', '2019-12-11 10:01:35', 47),
(81, 'User maelakukan Login Akun', '2019-12-11 10:02:06', 47),
(82, 'User melakukan Logout Akun', '2019-12-11 10:23:17', 47),
(83, 'User maelakukan Login Akun', '2019-12-11 10:23:26', 46),
(84, 'User melakukan Logout Akun', '2019-12-11 10:24:01', 46),
(85, 'User maelakukan Login Akun', '2019-12-11 20:58:51', 13),
(86, 'User melakukan Logout Akun', '2019-12-11 21:00:42', 13),
(87, 'User maelakukan Login Akun', '2019-12-11 21:01:11', 47),
(88, 'User melakukan Logout Akun', '2019-12-11 22:50:43', 47),
(89, 'User maelakukan Login Akun', '2019-12-11 22:50:50', 13),
(90, 'User melakukan Logout Akun', '2019-12-11 23:04:27', 13),
(91, 'User maelakukan Login Akun', '2019-12-11 23:04:39', 47),
(92, 'User melakukan Logout Akun', '2019-12-11 23:43:00', 47),
(93, 'User maelakukan Login Akun', '2019-12-11 23:43:09', 46),
(94, 'User melakukan Logout Akun', '2019-12-11 23:48:56', 46),
(95, 'User maelakukan Login Akun', '2019-12-11 23:49:05', 13),
(96, 'User melakukan Logout Akun', '2019-12-11 23:58:19', 13),
(97, 'User maelakukan Login Akun', '2019-12-11 23:58:29', 46),
(98, 'User melakukan Logout Akun', '2019-12-12 00:00:57', 46),
(99, 'User maelakukan Login Akun', '2019-12-12 00:01:06', 47),
(100, 'User melakukan Logout Akun', '2019-12-12 00:01:17', 47),
(101, 'User maelakukan Login Akun', '2019-12-12 11:31:44', 46),
(102, 'User melakukan Logout Akun', '2019-12-12 12:01:17', 46),
(103, 'User maelakukan Login Akun', '2019-12-12 12:01:25', 13),
(104, 'User melakukan Logout Akun', '2019-12-12 12:34:33', 13),
(105, 'User maelakukan Login Akun', '2019-12-12 12:34:52', 46),
(106, 'User melakukan Logout Akun', '2019-12-12 12:46:11', 46),
(107, 'User maelakukan Login Akun', '2019-12-12 12:46:19', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_pegawai`, `nik`, `nama`, `email`, `password`, `id_jabatan`, `id_divisi`) VALUES
(13, '3674010801990005', 'Muhammad Ilham Fhadilah', 'admin-ilham@simpeg.com', '$2y$10$1mKpyn22vnB9j3kW.P4Bx.C2vKUOdpSZG0MScErIk7EaREUJ92eqa', 1, 1),
(46, '3674000101990006', 'Aris Indrawan', 'pegawai-aris@simpeg.com', '$2y$10$.Rp9Y6PNeFAC7XoEmlPHNert.VUPWiMAC/kzvidMkSvNeq22ifMty', 2, 1),
(47, '3674000101990007', 'Bagas Kurniawan', 'manager-bagas@simpeg.com', '$2y$10$y3HPlq1TrMPAouLe94TU.u7VJLHx3KgH04PIv8FhCQoN3CnIqDHgS', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`) USING HASH,
  ADD KEY `id_pegawai` (`id_pegawai`) USING HASH;

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `cutipegawai`
--
ALTER TABLE `cutipegawai`
  ADD PRIMARY KEY (`id_cutipegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_cuti` (`id_cuti`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_logs`),
  ADD KEY `nik` (`id_pegawai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cutipegawai`
--
ALTER TABLE `cutipegawai`
  MODIFY `id_cutipegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cutipegawai`
--
ALTER TABLE `cutipegawai`
  ADD CONSTRAINT `cutipegawai_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id_pegawai`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cutipegawai_ibfk_2` FOREIGN KEY (`id_cuti`) REFERENCES `cuti` (`id_cuti`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `detail_user_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
