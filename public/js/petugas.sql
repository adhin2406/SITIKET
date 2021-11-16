-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2021 at 03:53 PM
-- Server version: 8.0.26-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usk_adhinugroho`
--

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `alamat_petugas` varchar(255) NOT NULL,
  `TTL` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `nomerhp` char(12) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_level` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `email`, `slug`, `alamat_petugas`, `TTL`, `jenis_kelamin`, `nama_petugas`, `nomerhp`, `gambar`, `id_level`, `created_at`, `updated_at`) VALUES
(1, 'adhinugroho', '$2y$10$QH1MYun9yMrIiZimAW/31.oK92MrHDj0lCsfF0KSt1AxmrRuBlkmu', 'adhin@Gmail.com', 'adhinugroho', '', '0000-00-00', '', '', '', 'user.png', 1, '2021-10-10 23:26:19', '2021-10-10 23:26:19'),
(2, 'singgihtri', '$2y$10$JL.ibarKiGS/c0H8lthooOaVxTKrLr75WfMqqQH1uZKFW1VHP5zT.', 'singgih@gmail.com', 'singgihtri', 'bawang rt 3 rw 4', '2001-06-11', 'laki-laki', 'singgih trini', '087848790081', 'user.png', 2, '2021-10-10 23:29:52', '2021-10-11 03:45:06'),
(3, 'sabil', '$2y$10$xcOQ3UWYiABAgF35ofgjQuLnqCPEbOpigh5WqTdrEgXKjFQOAV5ou', 'sabil@gmail.com', 'sabil', '', '0000-00-00', '', '', '', 'user.png', 3, '2021-10-10 23:30:47', '2021-10-10 23:30:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
