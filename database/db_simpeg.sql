-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 08:57 PM
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
  `status` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cutipegawai`
--

INSERT INTO `cutipegawai` (`id_cuti`, `id_pegawai`, `id_cutipegawai`, `awal_cuti`, `akhir_cuti`, `status`, `keterangan`, `alasan`) VALUES
(2, 13, 13, '2019-12-14', '2019-12-22', 'Diterima', 'Coba Aja', ''),
(2, 50, 14, '2020-01-01', '2020-01-09', 'Pending', '', ''),
(3, 53, 15, '2019-12-14', '2020-02-12', 'Diterima', 'Ingin lahiran', 'Selamat Menikmati Liburan'),
(2, 13, 18, '2020-01-10', '2020-01-18', 'Diterima', 'Coba Ah', 'Selamat Menikmati Liburan'),
(2, 13, 19, '2020-02-12', '2020-02-20', 'Pending', 'Pending', ''),
(2, 53, 20, '2020-03-18', '2020-03-26', 'Ditolak', 'Coba', 'PC saya kalo ada yang penting siapa tau saya bisa temani');

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
(47, 'Sawah Baru, Tanngerang Selatan', 'Islam', 'L', 'SMA', 'Menikah', '087788991121', 'd20df993237ee2e5bc8a67a515d3c641.jpeg', '2019-12-10'),
(48, '', '', '', '', '', '', 'default.svg', '2019-12-12'),
(49, '', '', '', '', '', '', 'default.svg', '2019-12-12'),
(50, '', 'Islam', 'L', 'SMA', 'Belum Menikah', '', 'default.svg', '2019-12-12'),
(51, '', 'Islam', 'P', 'SMA', 'Belum Menikah', '', 'default.svg', '2019-12-12'),
(52, '', 'Islam', 'L', 'SMA', 'Menikah', '', 'default.svg', '2019-12-12'),
(53, '', 'Islam', 'P', 'SMA', 'Belum Menikah', '', 'default.svg', '2019-12-12');

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
(1, 'Penyedia Makanan'),
(3, 'Enginnering'),
(5, 'Apalah'),
(6, 'Design');

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
(66, 'User maelakukan Login Akun', '2019-12-10 20:24:27', 13),
(67, 'User melakukan Logout Akun', '2019-12-10 21:28:50', 13),
(72, 'User maelakukan Login Akun', '2019-12-10 22:00:32', 13),
(73, 'User maelakukan Login Akun', '2019-12-11 08:56:26', 13),
(74, 'User melakukan Logout Akun', '2019-12-11 09:19:05', 13),
(77, 'User maelakukan Login Akun', '2019-12-11 09:43:56', 47),
(78, 'User melakukan Logout Akun', '2019-12-11 09:58:15', 47),
(79, 'User maelakukan Login Akun', '2019-12-11 09:58:38', 47),
(80, 'User melakukan Logout Akun', '2019-12-11 10:01:35', 47),
(81, 'User maelakukan Login Akun', '2019-12-11 10:02:06', 47),
(82, 'User melakukan Logout Akun', '2019-12-11 10:23:17', 47),
(85, 'User maelakukan Login Akun', '2019-12-11 20:58:51', 13),
(86, 'User melakukan Logout Akun', '2019-12-11 21:00:42', 13),
(87, 'User maelakukan Login Akun', '2019-12-11 21:01:11', 47),
(88, 'User melakukan Logout Akun', '2019-12-11 22:50:43', 47),
(89, 'User maelakukan Login Akun', '2019-12-11 22:50:50', 13),
(90, 'User melakukan Logout Akun', '2019-12-11 23:04:27', 13),
(91, 'User maelakukan Login Akun', '2019-12-11 23:04:39', 47),
(92, 'User melakukan Logout Akun', '2019-12-11 23:43:00', 47),
(95, 'User maelakukan Login Akun', '2019-12-11 23:49:05', 13),
(96, 'User melakukan Logout Akun', '2019-12-11 23:58:19', 13),
(99, 'User maelakukan Login Akun', '2019-12-12 00:01:06', 47),
(100, 'User melakukan Logout Akun', '2019-12-12 00:01:17', 47),
(103, 'User maelakukan Login Akun', '2019-12-12 12:01:25', 13),
(104, 'User melakukan Logout Akun', '2019-12-12 12:34:33', 13),
(107, 'User maelakukan Login Akun', '2019-12-12 12:46:19', 13),
(108, 'User melakukan Logout Akun', '2019-12-12 14:37:20', 13),
(111, 'User maelakukan Login Akun', '2019-12-12 14:47:55', 47),
(112, 'User melakukan Logout Akun', '2019-12-12 14:50:40', 47),
(115, 'User maelakukan Login Akun', '2019-12-12 16:12:19', 13),
(116, 'User melakukan Logout Akun', '2019-12-12 16:44:03', 13),
(117, 'User maelakukan Login Akun', '2019-12-12 16:44:15', 47),
(118, 'User melakukan Logout Akun', '2019-12-12 17:13:25', 47),
(119, 'User maelakukan Login Akun', '2019-12-12 17:13:33', 13),
(120, 'User melakukan Logout Akun', '2019-12-12 17:24:38', 13),
(121, 'User maelakukan Login Akun', '2019-12-12 17:24:46', 47),
(122, 'User melakukan Logout Akun', '2019-12-12 17:26:35', 47),
(123, 'User maelakukan Login Akun', '2019-12-12 17:26:42', 13),
(124, 'User melakukan Logout Akun', '2019-12-12 17:34:23', 13),
(125, 'User maelakukan Login Akun', '2019-12-12 17:36:07', 48),
(126, 'User melakukan Logout Akun', '2019-12-12 17:37:45', 48),
(127, 'User maelakukan Login Akun', '2019-12-12 17:38:05', 49),
(128, 'User melakukan Logout Akun', '2019-12-12 17:41:41', 49),
(129, 'User maelakukan Login Akun', '2019-12-12 17:41:49', 13),
(130, 'User melakukan Logout Akun', '2019-12-12 17:47:00', 13),
(131, 'User maelakukan Login Akun', '2019-12-12 17:47:27', 48),
(132, 'User melakukan Logout Akun', '2019-12-12 17:48:33', 48),
(133, 'User maelakukan Login Akun', '2019-12-12 17:48:50', 49),
(134, 'User melakukan Logout Akun', '2019-12-12 17:50:03', 49),
(135, 'User maelakukan Login Akun', '2019-12-12 20:19:51', 13),
(136, 'User melakukan Logout Akun', '2019-12-12 20:36:17', 13),
(137, 'User maelakukan Login Akun', '2019-12-12 20:36:35', 48),
(138, 'User melakukan Logout Akun', '2019-12-12 20:37:17', 48),
(139, 'User maelakukan Login Akun', '2019-12-12 20:37:30', 47),
(140, 'User melakukan Logout Akun', '2019-12-12 20:50:37', 47),
(143, 'User maelakukan Login Akun', '2019-12-12 21:04:05', 48),
(144, 'User melakukan Logout Akun', '2019-12-12 21:27:21', 48),
(145, 'User maelakukan Login Akun', '2019-12-12 21:27:42', 51),
(146, 'User melakukan Logout Akun', '2019-12-12 21:33:15', 51),
(147, 'User maelakukan Login Akun', '2019-12-12 21:33:34', 47),
(148, 'User melakukan Logout Akun', '2019-12-12 21:39:33', 47),
(149, 'User maelakukan Login Akun', '2019-12-12 21:39:55', 49),
(150, 'User melakukan Logout Akun', '2019-12-12 21:45:21', 49),
(155, 'User maelakukan Login Akun', '2019-12-13 19:27:14', 13),
(156, 'User melakukan Logout Akun', '2019-12-13 22:25:52', 13),
(157, 'User maelakukan Login Akun', '2019-12-13 22:28:00', 48),
(158, 'User melakukan Logout Akun', '2019-12-13 22:28:07', 48),
(159, 'User maelakukan Login Akun', '2019-12-13 22:33:35', 13),
(160, 'User melakukan Logout Akun', '2019-12-13 22:33:49', 13),
(161, 'User maelakukan Login Akun', '2019-12-14 02:46:03', 13),
(163, 'User maelakukan Login Akun', '2019-12-14 02:46:52', 47),
(164, 'User maelakukan Login Akun', '2019-12-14 05:09:21', 13),
(165, 'User melakukan Logout Akun', '2019-12-14 05:38:04', 13),
(166, 'User maelakukan Login Akun', '2019-12-14 05:39:00', 50),
(167, 'User melakukan Logout Akun', '2019-12-14 05:49:08', 50),
(168, 'User maelakukan Login Akun', '2019-12-14 05:49:51', 48),
(169, 'User melakukan Logout Akun', '2019-12-14 05:50:59', 48),
(170, 'User maelakukan Login Akun', '2019-12-14 05:51:26', 51),
(171, 'User melakukan Logout Akun', '2019-12-14 05:57:22', 51),
(172, 'User maelakukan Login Akun', '2019-12-14 09:25:24', 53),
(173, 'User melakukan Logout Akun', '2019-12-14 09:30:18', 53),
(174, 'User maelakukan Login Akun', '2019-12-14 09:30:32', 47),
(175, 'User maelakukan Login Akun', '2019-12-14 11:13:41', 47),
(176, 'User melakukan Logout Akun', '2019-12-14 11:41:11', 47),
(178, 'User maelakukan Login Akun', '2019-12-14 11:41:27', 13),
(179, 'User melakukan Logout Akun', '2019-12-14 12:06:33', 47),
(180, 'User maelakukan Login Akun', '2019-12-14 12:06:42', 47),
(182, 'User maelakukan Login Akun', '2019-12-14 12:38:46', 53),
(183, 'User melakukan Logout Akun', '2019-12-14 12:40:18', 47),
(184, 'User maelakukan Login Akun', '2019-12-14 12:40:53', 52),
(185, 'User melakukan Logout Akun', '2019-12-14 12:42:24', 53),
(188, 'User maelakukan Login Akun', '2019-12-14 12:43:58', 53),
(189, 'User melakukan Logout Akun', '2019-12-14 13:29:21', 52),
(190, 'User maelakukan Login Akun', '2019-12-14 13:29:36', 47),
(191, 'User melakukan Logout Akun', '2019-12-14 14:02:47', 47);

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
(13, '3674010801990005', 'Muhammad Ilham Fhadilah', 'admin-ilham@simpeg.com', '$2y$10$27BrHgS4BlOXqDmqkgAEOOFZ0DX7btZJrTPODP4VtYXlXUen6PMSu', 1, 1),
(47, '3674000101990007', 'Bagas Kurniawan', 'manager-bagas@simpeg.com', '$2y$10$iPSs0TO8iTZy3BKJ6vXCWuwXFSo6txGssa9Noc5cCIHiGlTvqUH92', 3, 1),
(48, '3674000101990008', 'Rian Hadi Dwi Cahya', 'admin-rian@simpeg.com', '$2y$10$2xQLu9pumcufXM82DGtyru7HYMp068SNneHHGNVT5At6e5bo.TqDa', 1, 3),
(49, '3674000101990009', 'Indra Riftiansyah', 'manager-indra@simpeg.com', '$2y$10$bvviztoJGNwVzSxSN2LYo.dYi1prdleESZkYJH3BYPJ342.n8Tn4y', 3, 3),
(50, '3674000101990010', 'Andhar Permana', 'pegawai-andhar@simpeg.com', '$2y$10$GRdWWRZwx/7jneTBSzop6.GxGrGggjO8HtUp68q1wY6MNCkLyotNS', 2, 3),
(51, '3674000101990011', 'Adinda', 'admin-adinda@simpeg.com', '$2y$10$azSNEN.5sqAGxYOGvT59zO4DQBrpYGoWQ9BKcaxoveaGEFiGaIImG', 1, 5),
(52, '3674000101990012', 'Gisella', 'manager-gisella@simpeg.com', '$2y$10$GUvfbIBLozL3enB0cWmphern4JHkFOGn9x8oVyYvTqpraQ7HF3IjC', 3, 5),
(53, '3674000101990013', 'Putri', 'pegawai-putri@simpeg.com', '$2y$10$AOQBaU0T3hoj9NqhjSYCge.InCp5CcuMUXtq09ougTPizQiB0TjvC', 2, 5);

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
  MODIFY `id_cutipegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
