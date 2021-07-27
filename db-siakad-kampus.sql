-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 04:36 AM
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
-- Database: `db-siakad-kampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `kode_dosen` varchar(11) DEFAULT NULL,
  `nidn` varchar(11) DEFAULT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `foto_dosen` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `kode_dosen`, `nidn`, `nama_dosen`, `foto_dosen`, `password`) VALUES
(1, 'dsn001', '1111', 'Moh Nurul Huda M Kom', 'dosen.jpg', '1234'),
(2, 'dsn002', '1112', 'Hanif Alkulbi M Kom', 'dosen.jpg', '1234'),
(3, 'dsn003', '1113', 'Budi waseso M Kom', 'dosen.jpg', '1234'),
(4, 'dsn004', '1114', 'Hendra bayaw M Kom MT', NULL, '1234'),
(5, 'dsn005', '1115', 'Malikhah Zuhri M AG', NULL, '1234'),
(6, 'dsn006', '1116', 'Osvaldo MT', NULL, '1234'),
(7, 'dsn007', '1117', 'Handoko Budi MT WKWk', NULL, '1234'),
(8, 'dsn008', '1118', 'Slamet William, KTK', NULL, '1234'),
(9, 'dsn009', '1119', 'Agus Budi, KTK', NULL, '1234'),
(10, 'dsn010', '1120', 'Ngadenin M Kom MT', NULL, '1234'),
(11, 'dsn011', '1121', 'Muji Prio WGS', 'dosen.jpg', '1234'),
(12, '1', '1', 'k', '1614618815_e6f61df84d6d21844206.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `fakultas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fakultas`
--

INSERT INTO `tbl_fakultas` (`id_fakultas`, `fakultas`) VALUES
(1, 'ilmu komputer'),
(2, 'ekonomi'),
(3, 'ilmu pendidikan'),
(6, 'Sastra Dan Budaya'),
(7, 'kuwil ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gedung`
--

CREATE TABLE `tbl_gedung` (
  `id_gedung` int(11) NOT NULL,
  `gedung` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gedung`
--

INSERT INTO `tbl_gedung` (`id_gedung`, `gedung`) VALUES
(1, 'Gedung A'),
(2, 'Gedung B'),
(4, 'Gedung C'),
(5, 'Gedung E'),
(6, 'Gedung D');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matkul`
--

CREATE TABLE `tbl_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(15) DEFAULT NULL,
  `matkul` varchar(255) DEFAULT NULL,
  `sks` int(2) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `smt` int(2) DEFAULT NULL,
  `semester` varchar(15) DEFAULT NULL,
  `id_prodi` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_matkul`
--

INSERT INTO `tbl_matkul` (`id_matkul`, `kode_matkul`, `matkul`, `sks`, `kategori`, `smt`, `semester`, `id_prodi`) VALUES
(1, 'SKPK101', 'Pendidikan Agama', 2, 'Wajib', 1, 'Ganjil', 2),
(2, 'SKKB102', 'Pengantar Teknologi Informasi', 2, 'Wajib', 1, 'Ganjil', 2),
(3, 'SKPK103', 'Pendidikan Kewarganegaraan', 2, 'Wajib', 1, 'Ganjil', 2),
(4, 'SKPK104', 'Bahasa Inggris', 2, 'Wajib', 1, 'Ganjil', 2),
(5, 'SKKK105', 'Fisika Dasar', 2, 'Wajib', 1, 'Ganjil', 2),
(6, 'SKKK105', 'Fisika Dasar', 2, 'Wajib', 1, 'Ganjil', 1),
(8, '1', '1', 1, 'Wajib', 1, 'Ganjil', 1),
(9, '2', '2', 1, 'Pilihan', 2, 'Genap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(100) DEFAULT NULL,
  `nama_mhs` varchar(200) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `foto_mhs` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mhs`
--

INSERT INTO `tbl_mhs` (`id_mhs`, `nim`, `nama_mhs`, `id_prodi`, `password`, `foto_mhs`) VALUES
(1, 'A11.2016.0989', 'Budi Waluyo', 2, 'budi', 'foto1.png'),
(2, 'A11.2016.0990', 'Bejo Sutar', 2, 'bejo', 'foto1.png'),
(3, '1', '1', 5, '1', '1614786736_88fe2443a35b90608e44.jpg'),
(4, '2', '2', 5, '2', '1614787093_c6739fba9999dd300b18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  `kode_prodi` varchar(25) DEFAULT NULL,
  `prodi` varchar(25) DEFAULT NULL,
  `jenjang` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `id_fakultas`, `kode_prodi`, `prodi`, `jenjang`) VALUES
(1, 1, 'SI', 'Sistem Informasi', 'S1'),
(2, 1, 'SK', 'Sistem Komputer', 'S1'),
(4, 1, 'TI', 'Teknik Informatika', 'S1'),
(5, 1, 'DKV', 'Desain Komunikasi Visuals', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `id_gedung` int(11) DEFAULT NULL,
  `ruangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruangan`, `id_gedung`, `ruangan`) VALUES
(2, 1, 'A2'),
(3, 1, 'A3'),
(5, 1, 'A5'),
(6, 1, 'A6'),
(7, 1, 'A1'),
(8, 1, 'Lab A1'),
(9, 1, 'Lab A2'),
(10, 4, 'as');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ta`
--

CREATE TABLE `tbl_ta` (
  `id_ta` int(5) NOT NULL,
  `ta` varchar(15) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ta`
--

INSERT INTO `tbl_ta` (`id_ta`, `ta`, `semester`) VALUES
(1, '2020/2021', 'Ganjil'),
(2, '2020/2021', 'Genap'),
(4, '2021/2022', 'Ganjil'),
(5, '2021/2022', 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level` varchar(25) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '1612771261_8e9afd6b8c6507b07c42.png'),
(2, 'budi', 'budi', 'budi', 'mahasiswa', 'user.png'),
(5, 'Ashari Eria F, ST', 'eri', 'eri12345', NULL, '1612768206_adaa17503f02842a4e7d.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tbl_ta`
--
ALTER TABLE `tbl_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_ta`
--
ALTER TABLE `tbl_ta`
  MODIFY `id_ta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
