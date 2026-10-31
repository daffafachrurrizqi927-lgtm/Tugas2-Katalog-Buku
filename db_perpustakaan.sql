-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2026 at 09:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `penulis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `penulis`) VALUES
(1, '002', 'Penelitian Ilmiah', 'Mr.Excel'),
(2, '001', 'Proposal Skripsi', 'Mr.Zane Valle'),
(3, '003', 'Algoritma dan Pemrograman Dasar', 'Dr.Stephen'),
(4, '004', 'Struktur Data dan Algoritma Lanjut', 'Prof. Alan Turing'),
(5, '005', 'Jaringan Komputer Modern', 'Dr. Vint Cerf'),
(6, '006', 'Kecerdasan Buatan Terapan', 'Dr. Geoffrey Hinton'),
(7, '007', 'Keamanan Siber dan Kriptografi', 'Mr. Bruce Schneier'),
(8, '008', 'Manajemen Basis Data Relasional', 'Dr. E.F. Codd'),
(9, '009', 'Desain Antarmuka dan Pengalaman Pengguna', 'Don Norman'),
(10, '010', 'Rekayasa Perangkat Lunak Pendekatan Praktis', 'Ian Sommerville'),
(11, '011', 'Konsep Sistem Operasi', 'Abraham Silberschatz'),
(12, '012', 'Pemrograman Berorientasi Objek', 'James Gosling'),
(13, '013', 'Pengantar Machine Learning', 'Mr. Andrew Ng'),
(14, '014', 'Komputasi Awan dan Layanan Web', 'Dr. Werner Vogels'),
(15, '015', 'Pengembangan Aplikasi Mobile Terintegrasi', 'Mr. John Doe'),
(16, '016', 'Metodologi Penelitian Teknik Informatika', 'Prof. Budi Santoso'),
(17, '017', 'Pengantar Jaringan Saraf Tiruan', 'Dr. Yann LeCun'),
(18, '018', 'Sistem Terdistribusi dan Komputasi Paralel', 'Dr. Leslie Lamport'),
(19, '019', 'Analisis Data dan Visualisasi Informasi', 'Mr. Edward Tufte'),
(20, '020', 'Etika Profesi dalam Teknologi Informasi', 'Dr. Richard Stallman');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
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
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
