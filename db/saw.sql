-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 11:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteriasaw`
--

CREATE TABLE `tb_kriteriasaw` (
  `no` int(11) NOT NULL,
  `pendapatan_ortu` float NOT NULL,
  `tanggungan_ortu` float NOT NULL,
  `pengeluaran_ortu` float NOT NULL,
  `ipk` float NOT NULL,
  `semester` float NOT NULL,
  `tingkahlaku` float NOT NULL,
  `keaktifanorganisasi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteriasaw`
--

INSERT INTO `tb_kriteriasaw` (`no`, `pendapatan_ortu`, `tanggungan_ortu`, `pengeluaran_ortu`, `ipk`, `semester`, `tingkahlaku`, `keaktifanorganisasi`) VALUES
(4, 0.15, 0.15, 0.15, 0.15, 0.15, 0.15, 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `stambuk` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`stambuk`, `nama`, `jenis_kelamin`, `jurusan`) VALUES
('F55117009', 'Tes', 'Perempuan', 'Sipil'),
('F55117010', 'Audy Ruslan', 'Laki-laki', 'Teknologi Informasi');

--
-- Triggers `tb_mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `update` AFTER UPDATE ON `tb_mahasiswa` FOR EACH ROW UPDATE tb_penilaian SET stambuk=new.stambuk,nama=new.nama WHERE stambuk=old.stambuk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `stambuk` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `pendapatan_ortu` float NOT NULL,
  `tanggungan_ortu` float NOT NULL,
  `pengeluaran_ortu` float NOT NULL,
  `ipk` float NOT NULL,
  `semester` float NOT NULL,
  `tingkahlaku` float NOT NULL,
  `keaktifanorganisasi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`stambuk`, `nama`, `pendapatan_ortu`, `tanggungan_ortu`, `pengeluaran_ortu`, `ipk`, `semester`, `tingkahlaku`, `keaktifanorganisasi`) VALUES
('F55117009', 'Tes', 1, 1, 2, 3.21, 4, 3, 3),
('F55117010', 'Audy Ruslan', 3, 3, 2, 2.75, 5, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ranking`
--

CREATE TABLE `tb_ranking` (
  `no` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ranking`
--

INSERT INTO `tb_ranking` (`no`, `nama`, `nilai_akhir`) VALUES
(1, 'Tes', 0.808),
(2, 'Audy Ruslan', 0.879);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kriteriasaw`
--
ALTER TABLE `tb_kriteriasaw`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`stambuk`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`stambuk`);

--
-- Indexes for table `tb_ranking`
--
ALTER TABLE `tb_ranking`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kriteriasaw`
--
ALTER TABLE `tb_kriteriasaw`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_ranking`
--
ALTER TABLE `tb_ranking`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
