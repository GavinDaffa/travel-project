-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2022 at 04:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jeniskelamin` enum('pria','wanita') NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `nama_lengkap`, `jeniskelamin`, `telepon`, `email`, `id_rute`, `jumlah_orang`, `tgl_berangkat`, `tgl_kembali`, `biaya`) VALUES
(12, 'Dzikri', 'pria', '08912892', 'dz@mail.com', 9, 5, '2022-06-25', '2022-06-26', 50000),
(13, 'Alif', 'pria', '18212', 'al@mail.com', 10, 7, '2022-06-27', '2022-06-29', 140000),
(14, 'Denia', 'wanita', '9819281', 'den@mail.com', 12, 5, '2022-06-27', '2022-06-28', 200000),
(15, 'asdsad', 'pria', '2112', 'asd', 11, 5, '2022-06-29', '2022-06-30', 150000),
(16, 'xaxa', 'wanita', '12121', 'axaxa', 9, 4, '2022-06-29', '2022-06-30', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `nama_rute` varchar(50) NOT NULL,
  `harga_rute` int(11) NOT NULL,
  `foto` blob DEFAULT NULL,
  `kapasitas` int(11) NOT NULL,
  `status` enum('ada','tidak') NOT NULL DEFAULT 'ada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `nama_rute`, `harga_rute`, `foto`, `kapasitas`, `status`) VALUES
(9, 'Surabaya - Dieng', 10000, 0x6469656e672e6a7067, 20, 'ada'),
(10, 'Surabaya - Karimun Jawa', 20000, 0x6b6172696d756e6a6177612e6a7067, 30, 'tidak'),
(11, 'Surabaya - Malang (Bromo)', 30000, 0x62726f6d6f2e6a7067, 30, 'ada'),
(12, 'Surabaya - Yogyakarta', 40000, 0x63616e64692e6a706567, 15, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'dzik', '9910d8f19888ed59886e66ea94665917', 'admin'),
(2, 'iniuser', 'ec0c80296ec22a06b4fcd8ae06112112', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `FK_RUTE_RESERVASI` (`id_rute`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `FK_RUTE_RESERVASI` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
