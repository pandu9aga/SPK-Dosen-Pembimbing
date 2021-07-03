-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 01:04 PM
-- Server version: 10.4.11-MariaDB
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
-- Database: `dbdospem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `NIP` varchar(30) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`NIP`, `nama`, `jabatan`, `password`) VALUES
('111', 'pandu', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIP` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `kuota` int(2) NOT NULL,
  `pendidikan` varchar(300) NOT NULL,
  `penelitian` varchar(1000) NOT NULL,
  `keahlian` varchar(300) NOT NULL,
  `pengalaman` varchar(1000) NOT NULL,
  `riwayat_bimbingan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIP`, `nama`, `golongan`, `status`, `kelamin`, `no_telpon`, `kuota`, `pendidikan`, `penelitian`, `keahlian`, `pengalaman`, `riwayat_bimbingan`) VALUES
('1111111', 'qwerty', '2d', 'Aktif', 'Laki-laki', '09876543', 10, 's3', 'pengaruh penggunaan android pada anak', 'Game', '> 10 tahun', 'sistem informasi akademik jti, sistem informasi perpustakaan, sistem informasi poliklinik'),
('19710408 200112 1 003', 'ciauosp', '3d', 'Aktif', 'Laki-laki', '06545', 1, 's3', '', 'Web', '> 10 tahun', ''),
('19710408 200112 1 004', 'ciauosp111', '3d', 'Aktif', 'Laki-laki', '06545', 1, 's3', 'as', 'Game', '> 5 tahun', 'sa'),
('19710408 200112 1 007', 'agata', '3d', 'Aktif', 'Perempuan', '08331312', 10, 's2', 'vwvwvw', 'Mobile', '> 1 tahun', 'vwvvwwwv'),
('21212', 'pp', '2d', 'Aktif', 'Laki-laki', '321', 10, 's3', '', 'Web', '> 5 tahun', '');

-- --------------------------------------------------------

--
-- Table structure for table `judul_ta`
--

CREATE TABLE `judul_ta` (
  `id_judul` int(5) NOT NULL,
  `nama_judul` varchar(300) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `NIM` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `judul_ta`
--

INSERT INTO `judul_ta` (`id_judul`, `nama_judul`, `kategori`, `NIM`) VALUES
(1, 'spk dospem', 'Game', 'E31181965'),
(2, 'sistem pakar penyakit domba', 'Game', 'E31181957');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(10) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `semester` int(2) NOT NULL,
  `golongan` varchar(5) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `nama`, `alamat`, `no_hp`, `prodi`, `semester`, `golongan`, `password`) VALUES
('E31181953', 'pp', 'aasasa', '0812', 'tkk', 5, 'a', 'tt'),
('E31181957', 'aga', '4', '4', 'tif', 4, 'inter', '4'),
('E31181965', 'aga', 'jbr', '812', 'mif', 6, 'c', 'aga'),
('E31181966', 'aga', 'bbb', '9876', 'tif', 6, 'inter', 'aga');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(10) NOT NULL,
  `id_judul` int(5) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_judul`, `NIP`, `status`) VALUES
(4, 1, '19710408 200112 1 003', 'menunggu'),
(8, 2, '19710408 200112 1 003', 'menunggu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `judul_ta`
--
ALTER TABLE `judul_ta`
  ADD PRIMARY KEY (`id_judul`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `judul_ta`
--
ALTER TABLE `judul_ta`
  MODIFY `id_judul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
