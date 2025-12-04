-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 04:07 PM
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
-- Database: `kpop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `agensi`
--

CREATE TABLE `agensi` (
  `id_agensi` int(11) NOT NULL,
  `nama_agensi` varchar(100) NOT NULL,
  `tahun_berdiri` year(4) DEFAULT NULL,
  `lokasi_kantor` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agensi`
--

INSERT INTO `agensi` (`id_agensi`, `nama_agensi`, `tahun_berdiri`, `lokasi_kantor`) VALUES
(1, 'SM Entertainment', '1995', 'Gangnam, Seoul'),
(2, 'YG Entertainment', '1996', 'Mapo-gu, Seoul'),
(3, 'JYP Entertainment', '1997', 'Gangdong-gu, Seoul'),
(5, 'Fantagio', '2008', 'Seoul');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `id_grup` int(11) NOT NULL,
  `judul_album` varchar(100) NOT NULL,
  `tanggal_rilis` date DEFAULT NULL,
  `format` enum('LP','EP','Single') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `id_grup`, `judul_album`, `tanggal_rilis`, `format`) VALUES
(301, 101, 'The ReVe Festival 2.0', '2019-08-20', 'EP'),
(302, 102, 'THE ALBUM', '2020-10-02', 'LP'),
(303, 103, 'ODDINARY', '2022-03-18', 'EP');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_grup` int(11) NOT NULL,
  `nama_panggung` varchar(50) NOT NULL,
  `nama_asli` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `posisi_utama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_grup`, `nama_panggung`, `nama_asli`, `tanggal_lahir`, `posisi_utama`) VALUES
(201, 102, 'Jennie', 'Kim Jennie', '1996-01-16', 'Main Rapper'),
(202, 102, 'Lisa', 'Lalisa Manobal', '1997-03-27', 'Main Dancer'),
(203, 101, 'Joy', 'Park Soo-young', '1996-09-03', 'Lead Vocalist'),
(204, 103, 'Felix', 'Lee Felix', '2000-09-15', 'Lead Dancer');

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

CREATE TABLE `grup` (
  `id_grup` int(11) NOT NULL,
  `id_agensi` int(11) NOT NULL,
  `nama_grup` varchar(100) NOT NULL,
  `tanggal_debut` date DEFAULT NULL,
  `tipe` enum('Boy','Girl') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grup`
--

INSERT INTO `grup` (`id_grup`, `id_agensi`, `nama_grup`, `tanggal_debut`, `tipe`) VALUES
(101, 1, 'Red Velvet', '2014-08-01', 'Girl'),
(102, 2, 'BLACKPINK', '2016-08-08', 'Girl'),
(103, 3, 'Stray Kids', '2018-03-25', 'Boy'),
(104, 1, 'EXO', '2014-12-08', 'Boy'),
(105, 1, 'NCT DREAM', '2016-08-11', 'Boy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agensi`
--
ALTER TABLE `agensi`
  ADD PRIMARY KEY (`id_agensi`),
  ADD UNIQUE KEY `nama_agensi` (`nama_agensi`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_grup` (`id_grup`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_grup` (`id_grup`);

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id_grup`),
  ADD KEY `id_agensi` (`id_agensi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agensi`
--
ALTER TABLE `agensi`
  MODIFY `id_agensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id_grup`);

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id_grup`);

--
-- Constraints for table `grup`
--
ALTER TABLE `grup`
  ADD CONSTRAINT `grup_ibfk_1` FOREIGN KEY (`id_agensi`) REFERENCES `agensi` (`id_agensi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
