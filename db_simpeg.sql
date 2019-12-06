-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 03:59 PM
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
(19, 1, 'Kenaikan Gaji', 'Kenaikan_Gaji.jpg', '2019-12-05', 'ajjdadjkada'),
(24, 1, 'Kenaikan Jabatan', 'Kenaikan_Jabatan.jpg', '2019-12-05', 'Mantab Mul');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `awal_cuti` date NOT NULL,
  `akhir_cuti` date NOT NULL,
  `jenis_cuti` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cutipegawai`
--

CREATE TABLE `cutipegawai` (
  `id_cuti` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_cutipegawai` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(11) NOT NULL,
  `akses` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `akses`) VALUES
(1, 'Admin'),
(2, 'Pegawai'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `nama_jabatan` varchar(30) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`nama_jabatan`, `id_jabatan`, `id_akses`) VALUES
('Admin L', 1, 1),
('Pegawai M', 2, 2),
('Manager N', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_keluarga` varchar(30) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id_logs` int(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `waktu` date NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id_logs`, `kegiatan`, `waktu`, `id_pegawai`) VALUES
(2, 'Loggin', '2019-12-03', 1),
(3, 'Loggin', '2019-12-03', 1),
(4, 'Loggin', '2019-12-03', 1),
(5, 'Loggin', '2019-12-04', 1),
(6, 'Loggin', '2019-12-04', 1),
(7, 'Loggin', '2019-12-04', 1),
(8, 'Loggin', '2019-12-04', 1),
(9, 'Loggin', '2019-12-05', 5),
(10, 'Loggin', '2019-12-05', 3),
(11, 'Loggin', '2019-12-05', 5),
(12, 'Loggin', '2019-12-05', 5),
(13, 'Loggin', '2019-12-05', 5),
(14, 'Loggin', '2019-12-05', 1),
(15, 'Loggin', '2019-12-05', 5),
(16, 'Loggin', '2019-12-05', 3),
(17, 'Loggin', '2019-12-05', 1),
(18, 'Loggin', '2019-12-05', 5),
(19, 'Loggin', '2019-12-05', 3),
(20, 'Loggin', '2019-12-05', 1),
(21, 'Loggin', '2019-12-05', 1),
(22, 'Loggin', '2019-12-05', 1),
(23, 'Loggin', '2019-12-06', 1),
(24, 'Loggin', '2019-12-06', 5),
(25, 'Loggin', '2019-12-06', 1),
(26, 'Loggin', '2019-12-06', 1),
(27, 'Loggin', '2019-12-06', 1),
(28, 'Loggin', '2019-12-06', 1),
(29, 'Loggin', '2019-12-06', 1),
(30, 'Loggin', '2019-12-06', 1),
(31, 'Loggin', '2019-12-06', 1),
(32, 'Loggin', '2019-12-06', 1),
(33, 'Loggin', '2019-12-06', 1),
(34, 'Loggin', '2019-12-06', 1),
(35, 'Loggin', '2019-12-06', 1),
(36, 'Loggin', '2019-12-06', 1),
(37, 'Loggin', '2019-12-06', 1),
(38, 'Loggin', '2019-12-06', 1),
(39, 'Loggin', '2019-12-06', 1),
(40, 'Loggin', '2019-12-06', 5),
(41, 'Loggin', '2019-12-06', 1),
(42, 'Loggin', '2019-12-06', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `pendidikan` varchar(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `nama_gambar_profile` text NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_pegawai`, `nik`, `nama`, `alamat`, `agama`, `jenis_kelamin`, `pendidikan`, `email`, `status`, `password`, `no_telp`, `nama_gambar_profile`, `id_jabatan`, `tanggal_masuk`) VALUES
(1, '3674010801990005', 'Muhammad Ilham Fhadilah', 'Kp. Setu Rt. 02/01 No. 53 Kel. Buaran, Kec. Serpong', 'Islam', 'L', 'S2', 'admin-ilham@simpeg.com', 'Belum Menikah', '$2y$10$rsmjcMVWpuxC.huS7qDy/uvjvhNYr0jcfZUUg9sYYFzVBA2JS86GK', '089677186962', '7facc91d3dbe2da8a2bae9f5ad974cb3.jpeg', 1, '2019-11-04'),
(3, '3674000101990005', 'Bagas Kurniawan', 'Sawah Baru', 'Islam', 'L', 'S1', 'manager-bagas@simpeg.com', 'Menikah', '$2y$10$WaMwVp8xzE4r3E3Yhe.HKuqIefxNcBGdBkv3xMqdW3wHpMRDUXkGa', '089677186964', 'default.svg', 3, '2019-11-28'),
(5, '3674000101990006', 'Aris Indrawan', 'Cikande, Serang, Banten', 'Islam', 'L', 'SMA', 'pegawai-aris@simpeg.com', 'Menikah', '$2y$10$gUa9xuB5USOtuT.ob98j5exeeLQxRy83.uu3b2l.3jMybM97nUh/C', '089677186967', 'default.svg', 2, '2019-11-28');

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
  ADD PRIMARY KEY (`id_cuti`),
  ADD UNIQUE KEY `id` (`id_cuti`),
  ADD UNIQUE KEY `id_pegawai_2` (`id_pegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `cutipegawai`
--
ALTER TABLE `cutipegawai`
  ADD PRIMARY KEY (`id_cutipegawai`),
  ADD UNIQUE KEY `id_pegawai` (`id_pegawai`),
  ADD UNIQUE KEY `id_cuti` (`id_cuti`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD UNIQUE KEY `id` (`id_keluarga`),
  ADD UNIQUE KEY `nik` (`id_pegawai`);

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
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cutipegawai`
--
ALTER TABLE `cutipegawai`
  MODIFY `id_cutipegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id_pegawai`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `cutipegawai`
--
ALTER TABLE `cutipegawai`
  ADD CONSTRAINT `cutipegawai_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id_pegawai`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cutipegawai_ibfk_2` FOREIGN KEY (`id_cuti`) REFERENCES `cuti` (`id_cuti`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id_pegawai`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id_pegawai`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
