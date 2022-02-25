-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 04:59 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonline2`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `total` int(20) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `alamat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `user_id`, `id_transaksi`, `id_barang`, `tanggal`, `total`, `ongkir`, `qty`, `status`, `alamat`) VALUES
(83, 6, '2502220903546', 30, 'Fri Feb 2022', 24408000, 1408000, 4, 'proses pengisisan data', 'i'),
(84, 6, '2502220903546', 32, 'Fri Feb 2022', 24408000, 1408000, 2, 'proses pengisisan data', 'i'),
(85, 6, '2502220905306', 32, 'Fri Feb 2022', 7371900, 272000, 2, 'proses pengisisan data', 'i'),
(86, 6, '2502220905306', 37, 'Fri Feb 2022', 7371900, 272000, 1, 'proses pengisisan data', 'i'),
(87, 8, '2502220908318', 30, 'Fri Feb 2022', 7590000, 90000, 1, 'proses pengisisan data', 'i'),
(88, 8, '2502220908318', 32, 'Fri Feb 2022', 7590000, 90000, 1, 'proses pengisisan data', 'i'),
(89, 6, '2502220908296', 31, 'Fri Feb 2022', 3981000, 81000, 1, 'proses pengisisan data', 'i'),
(90, 6, '2502220908296', 36, 'Fri Feb 2022', 3981000, 81000, 1, 'proses pengisisan data', 'i'),
(91, 6, '2502221008006', 30, 'Fri Feb 2022', 8631800, 432000, 2, 'proses pengisisan data', 'i'),
(92, 6, '2502221008006', 37, 'Fri Feb 2022', 8631800, 432000, 2, 'proses pengisisan data', 'i'),
(93, 6, '2502221048546', 32, 'Fri Feb 2022', 7323900, 224000, 1, 'proses pengisisan data', 'i'),
(94, 6, '2502221048546', 36, 'Fri Feb 2022', 7323900, 224000, 1, 'proses pengisisan data', 'i'),
(95, 6, '2502221048546', 37, 'Fri Feb 2022', 7323900, 224000, 1, 'proses pengisisan data', 'i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
