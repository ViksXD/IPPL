-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2024 at 07:07 AM
-- Server version: 8.0.40
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `profile_pict` varchar(255) DEFAULT NULL
) 

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `email`, `password`, `role`, `profile_pict`) VALUES
('pembeliSetia', '305muhammadibrahim@gmail.com', '$2y$10$sWeN8GhPcz/.u1yh/k3os.kJYHIrOSBUqBMwYNkAQAuigERQcvpB6', 'customer', NULL),
('teukuibrahim', '305muhammadibrahim@gmail.com', '$2y$10$9nHcPAxoGIfP48Lcb3pQZOUPXBru5.pvfzlHK/GwtondoSDOU1U62', 'karyawan', NULL),
('teukuibrahim12', '305muhammadibrahim@gmail.com', '$2y$10$j66vVosinng4cwIv2zHMbez3P4jUC6i3FCINC28QAP1.aq.Crh/dK', 'customer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int NOT NULL,
  `rating` decimal(3,2) DEFAULT NULL,
  `jenis` varchar(50) NOT NULL
) 

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `rating`, `jenis`) VALUES
(1, NULL, 'oneday'),
(2, NULL, 'regular'),
(3, NULL, 'bedcover'),
(4, NULL, 'shoes');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `id_katalog` int DEFAULT NULL,
  `stat_pembayaran` tinyint(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `proses` tinyint DEFAULT '0'
) 

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `username`, `id_katalog`, `stat_pembayaran`, `tanggal`, `total_harga`, `proses`) VALUES
(11, 'teukuibrahim', 2, 1, '2024-12-18', 60000.00, 1),
(19, 'pembeliSetia', 1, 1, '2024-12-26', 50000.00, 4),
(20, 'pembeliSetia', 2, 1, '2024-12-26', 60000.00, 0),
(21, 'teukuibrahim12', 1, 1, '2024-12-27', 140000.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int NOT NULL,
  `rating` tinyint NOT NULL
) 

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `rating`) VALUES
(1, 5),
(2, 3),
(3, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `username` (`username`),
  ADD KEY `id_katalog` (`id_katalog`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_katalog`) REFERENCES `katalog` (`id_katalog`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
