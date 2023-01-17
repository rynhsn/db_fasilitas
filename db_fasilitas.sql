-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 06:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fasilitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_fasilitas`, `nim`, `waktu_mulai`, `waktu_selesai`, `status`) VALUES
(1, 1, '123456789', '2022-01-01 09:00:00', '2022-01-01 12:00:00', 'Dipesan'),
(2, 2, '987654321', '2022-01-02 14:00:00', '2022-01-02 18:00:00', 'Selesai'),
(3, 3, '111111111', '2022-01-03 08:00:00', '2022-01-03 11:00:00', 'Dipesan'),
(4, 4, '222222222', '2022-01-04 15:00:00', '2022-01-04 18:00:00', 'Dipesan'),
(5, 5, '333333333', '2022-01-05 09:00:00', '2022-01-05 12:00:00', 'Dipesan'),
(6, 1, '1101181101', '2023-01-17 17:32:00', '2023-01-17 19:32:00', 'Dipesan'),
(11, 1, '987654321', '2023-01-17 17:42:00', '2023-01-17 17:42:00', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `kategori`, `kapasitas`, `lokasi`, `status`) VALUES
(1, 'Ruang Kelas A', 'Ruang Kelas', 50, 'Gedung A Lantai 2', 'Tersedia'),
(2, 'Ruang Kelas B', 'Ruang Kelas', 30, 'Gedung B Lantai 3', 'Tersedia'),
(3, 'Ruang Kelas C', 'Ruang Kelas', 40, 'Gedung C Lantai 4', 'Tersedia'),
(4, 'Laboratorium Komputer', 'Laboratorium', 20, 'Gedung D Lantai 5', 'Tersedia'),
(5, 'Ruang Rapat', 'Ruang Rapat', 10, 'Gedung E Lantai 6', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`, `fakultas`, `angkatan`, `jenis_kelamin`) VALUES
('1101181101', 'Riyan Husen', 'Teknik Informatika', 'Ilmu Komputer', 2018, 'Laki-laki'),
('111111111', 'Bob Smith', 'Sastra Inggris', 'Sastra', 2021, 'Laki-laki'),
('123456789', 'John Doe', 'Teknik Informatika', 'Teknik', 2020, 'Laki-laki'),
('222222222', 'Alice Johnson', 'Ilmu Politik', 'Ilmu Sosial', 2022, 'Perempuan'),
('333333333', 'Charlie Brown', 'Matematika', 'Matematika dan Ilmu Pengetahuan Alam', 2022, 'Laki-laki'),
('987654321', 'Jane Doe', 'Manajemen', 'Ekonomi', 2022, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `id_ukm` int(11) NOT NULL,
  `nama_ukm` varchar(255) NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id_ukm`, `nama_ukm`, `ketua`, `jumlah_anggota`, `kategori`) VALUES
(1, 'UKM Seni Musik', 'Sophia Johnson', 30, 'Seni'),
(2, 'UKM Olahraga', 'Jack Smith', 50, 'Olahraga'),
(3, 'UKM Ilmu Pengetahuan Alam', 'Emily Brown', 40, 'Ilmu Pengetahuan'),
(4, 'UKM Komunitas', 'James Johnson', 25, 'Komunitas'),
(5, 'UKM Sastra', 'Emily Davis', 20, 'Sastra'),
(7, 'UKM Gempa', 'Roy Kiyoshi', 50, 'Pelestari Alam');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit`, `nama_unit`, `kategori`, `lokasi`) VALUES
(1, 'Departemen Teknik Informatika', 'Departemen', 'Gedung A Lantai 2'),
(2, 'Departemen Ekonomi', 'Departemen', 'Gedung B Lantai 3'),
(3, 'Departemen Sastra', 'Departemen', 'Gedung C Lantai 4'),
(4, 'Departemen Matematika', 'Departemen', 'Gedung D Lantai 5'),
(5, 'Divisi Keuangan', 'Divisi', 'Gedung E Lantai 6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1, 'John Doel', 'johndoe', 'password', 'admin'),
(2, 'Jane Doe', 'janedoe', 'password', 'user'),
(3, 'Bob Smith', 'bobsmith', 'password', 'user'),
(4, 'Alice Johnson', 'alicejohnson', 'password', 'user'),
(5, 'Charlie Brown', 'charliebrown', 'password', 'user'),
(7, 'Riyan', 'riyan', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_fasilitas` (`id_fasilitas`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id_ukm`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id_ukm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
