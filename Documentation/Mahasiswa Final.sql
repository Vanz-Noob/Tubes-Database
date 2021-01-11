-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 02:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` bigint(20) NOT NULL,
  `ID_PROGRAM_STUDI` varchar(2) DEFAULT NULL,
  `KODE_DOSEN` varchar(3) DEFAULT NULL,
  `NAMA_MAHASISWA` varchar(50) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(20) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `ID_PROGRAM_STUDI`, `KODE_DOSEN`, `NAMA_MAHASISWA`, `JENIS_KELAMIN`, `STATUS`) VALUES
(110314040, 'TE', 'RJO', 'Asuna', 'Perempuan', 'DO'),
(110314142, 'TK', 'REN', 'Kirito', 'Laki-Laki', 'Aktif'),
(1103913741, 'TK', 'REN', 'santuy man', 'Laki-Laki', 'DO');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `ID_MATKUL` int(11) NOT NULL,
  `NAMA_MATKUL` varchar(50) DEFAULT NULL,
  `SKS_MATKUL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`ID_MATKUL`, `NAMA_MATKUL`, `SKS_MATKUL`) VALUES
(1001, 'Kalkulus', 3),
(1002, 'Fisika Dasar', 3);

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `ID_PROGRAM_STUDI` varchar(2) NOT NULL,
  `NAMA_PROGRAM_STUDI` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`ID_PROGRAM_STUDI`, `NAMA_PROGRAM_STUDI`) VALUES
('BM', 'Biomedis'),
('TE', 'Teknik Elektro'),
('TF', 'Teknik Fisika'),
('TK', 'Teknik Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `photo`) VALUES
(4, 'renaldivanza', 'openscoure2@gmail.com', '$2y$10$ekJfyq22tv.OYBdo2X6QY.86EsrHrLeZWi126v0QlBnMNjtow.uku', 'Renaldi', 'default.svg'),
(5, 'Kirito48', 'kirito@hotmail.com', '$2y$10$S7/R9XeAIqAS/HeES8ojc.9BWhwtSMenKhHx6nga57AUOK7sMkGAq', 'Kirito Asugana', 'default.svg');

-- --------------------------------------------------------

--
-- Table structure for table `wali_dosen`
--

CREATE TABLE `wali_dosen` (
  `KODE_DOSEN` varchar(3) NOT NULL,
  `ID_MATKUL` int(11) DEFAULT NULL,
  `ID_PROGRAM_STUDI` varchar(2) DEFAULT NULL,
  `NAMA_DOSEN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wali_dosen`
--

INSERT INTO `wali_dosen` (`KODE_DOSEN`, `ID_MATKUL`, `ID_PROGRAM_STUDI`, `NAMA_DOSEN`) VALUES
('REN', 1001, 'TK', 'Renaldo'),
('RJO', 1002, 'TE', 'Raharjo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `FK_REFERENCE_1` (`ID_PROGRAM_STUDI`),
  ADD KEY `FK_REFERENCE_2` (`KODE_DOSEN`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`ID_MATKUL`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`ID_PROGRAM_STUDI`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wali_dosen`
--
ALTER TABLE `wali_dosen`
  ADD PRIMARY KEY (`KODE_DOSEN`),
  ADD KEY `FK_REFERENCE_3` (`ID_MATKUL`),
  ADD KEY `FK_REFERENCE_4` (`ID_PROGRAM_STUDI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`ID_PROGRAM_STUDI`) REFERENCES `program_studi` (`ID_PROGRAM_STUDI`),
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`KODE_DOSEN`) REFERENCES `wali_dosen` (`KODE_DOSEN`);

--
-- Constraints for table `wali_dosen`
--
ALTER TABLE `wali_dosen`
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ID_MATKUL`) REFERENCES `mata_kuliah` (`ID_MATKUL`),
  ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`ID_PROGRAM_STUDI`) REFERENCES `program_studi` (`ID_PROGRAM_STUDI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
