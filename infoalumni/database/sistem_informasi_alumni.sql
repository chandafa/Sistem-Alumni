-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 10:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `kerja`
--

CREATE TABLE `kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `nama_perusahaan` varchar(225) NOT NULL,
  `jabatan` varchar(225) NOT NULL,
  `tahun_kerja` year(4) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kerjakuliah`
--

CREATE TABLE `kerjakuliah` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `nama_perusahaan` varchar(225) NOT NULL,
  `jabatan` varchar(225) NOT NULL,
  `tahun_kerja` year(4) NOT NULL,
  `uni_ver` varchar(225) NOT NULL,
  `jurusan` varchar(225) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuliah`
--

CREATE TABLE `kuliah` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `uni_ver` varchar(225) NOT NULL,
  `jurusan` varchar(225) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mencari_kerja`
--

CREATE TABLE `mencari_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `alasan_cari_kerja` varchar(225) NOT NULL,
  `kontak` varchar(225) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `jenis_table` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `nama_perusahaan` varchar(225) DEFAULT NULL,
  `jabatan` varchar(225) DEFAULT NULL,
  `tahun_kerja` year(4) DEFAULT NULL,
  `nama_univer` varchar(225) DEFAULT NULL,
  `jurusan` varchar(225) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `kontak` varchar(225) DEFAULT NULL,
  `alasan` varchar(225) DEFAULT NULL,
  `jenis_usaha` varchar(225) DEFAULT NULL,
  `alamat_usaha` varchar(225) DEFAULT NULL,
  `tahun_usaha` year(4) DEFAULT NULL,
  `requested_by` varchar(225) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requestedit`
--

CREATE TABLE `requestedit` (
  `id` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `jenis_table` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `nama_perusahaan` varchar(225) DEFAULT NULL,
  `jabatan` varchar(225) DEFAULT NULL,
  `tahun_kerja` year(4) DEFAULT NULL,
  `nama_univer` varchar(225) DEFAULT NULL,
  `jurusan` varchar(225) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `kontak` varchar(225) DEFAULT NULL,
  `alasan` varchar(225) DEFAULT NULL,
  `jenis_usaha` varchar(225) DEFAULT NULL,
  `alamat_usaha` varchar(225) DEFAULT NULL,
  `tahun_usaha` year(4) DEFAULT NULL,
  `request_by` varchar(225) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usaha`
--

CREATE TABLE `usaha` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `jenis_usaha` varchar(225) NOT NULL,
  `alamat_usaha` varchar(225) NOT NULL,
  `tahun_usaha` year(4) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(20) NOT NULL,
  `permissions` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`, `permissions`) VALUES
(1, 'Sang Admin', 'admin', '$2y$10$f4YfqFAfis9ZqAzjyTVODOqqSsq6zxBNhGLxtCjiB2nGapxx61gzi', 'admin', NULL),
(2, 'ahmad', 'ahmad', '$2y$10$RbngD/XTzGCtR3lbL.BhpuHxvAlXTHOdQMGBylMSOSwZFvLOYRNK2', 'user', NULL),
(3, 'yudha', 'yudha', '$2y$10$3YfSOzj.CTTINu8V5hvcH.PuZQyr8P3HUW5H217/Vy8o6xM893Nte', 'newuser', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kerja`
--
ALTER TABLE `kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerjakuliah`
--
ALTER TABLE `kerjakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuliah`
--
ALTER TABLE `kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mencari_kerja`
--
ALTER TABLE `mencari_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestedit`
--
ALTER TABLE `requestedit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kerja`
--
ALTER TABLE `kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kerjakuliah`
--
ALTER TABLE `kerjakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuliah`
--
ALTER TABLE `kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mencari_kerja`
--
ALTER TABLE `mencari_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestedit`
--
ALTER TABLE `requestedit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
