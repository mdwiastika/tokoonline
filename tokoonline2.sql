-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 09:54 AM
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga` int(15) NOT NULL,
  `kategori_id` varchar(20) NOT NULL,
  `image` varchar(500) NOT NULL,
  `detail` varchar(300) NOT NULL,
  `berat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `stok`, `harga`, `kategori_id`, `image`, `detail`, `berat`) VALUES
(30, 'Pocophone X3 NFC', 38, 4000000, '2', '61f7543fcaa7b.png', 'ditawarkan oleh prosesor baru. Prosesor Qualcomm® Snapdragon™ 732G menawarkan kapasitas pemrosesan grafis yang kuat dan kemampuan komputasi AI yang canggih. Teknologi proses 8nm dan chip octa-core yang membantu mencapai kecepatan jam 2,3GHz.', 2500),
(31, 'Mi Band 5', 56, 400000, '9', '61f78aa6876ef.png', 'Baterai 500 mAh, tahan air. Bisa tahan 10 hari pemakaian normal. Tersedia berbagai warna', 1200),
(32, 'Canon', 52, 3500000, '7', '61f78c64beb65.png', 'Sensor APS-C CMOS 24,1 megapiksel+ perekaman video 4K 45 titik AF semua tipe silang (jendela bidik) dan Dual Pixel CMOS AF (Live View)', 3000),
(34, 'Lenovo Legion 5', 42, 19000000, '3', '61fa1ee09b2fa.png', 'Engineered to deliver devastation in and out of the arena, the Legion 5 Pro deploys AMD Ryzen™ processing and NVIDIA® GeForce RTX™ graphics to dish out high-resolution gaming. The world’s first 16&amp;quot; QHD gaming laptop with up to 165Hz refresh sets up a “winning zone” that gives you an extra e', 1500),
(35, 'Pop It', 114, 20000, '6', '61fccbe0b0ec4.png', 'Ini adalah mainan yang viral pada masanya', 200),
(36, 'Televisi Panasonic', 40, 3500000, '3', '61fcead9bd166.png', 'Mulai dari gambar yang semarak hingga gambar yang jernih - Anda akan menikmati detail dan tekstur yang halus, bahkan dalam area gambar yang datar. Clear Resolution Enhancer menskala gambar resolusi rendah hingga resolusi Full HD tanpa memperkenalkan noise gambar tambahan. Melakukannya dengan mengura', 2100),
(37, 'Panci Annons', 78, 99900, '10', '61fdeb89a87ef.png', 'Panci dengan penutup, kaca/baja tahan karat, 2.8 l', 2100);

-- --------------------------------------------------------

--
-- Table structure for table `buktipembayaran`
--

CREATE TABLE `buktipembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal_bayar` varchar(50) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buktipembayaran`
--

INSERT INTO `buktipembayaran` (`id_pembayaran`, `gambar`, `tanggal_bayar`, `id_transaksi`) VALUES
(170, '6215f07cd640a.png', 'Wed Feb 2022', '2302221528006'),
(172, '6215f26bcb08f.png', 'Wed Feb 2022', '2302221537206'),
(173, '6215f344eee55.png', 'Wed Feb 2022', '2302221540556');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(15) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `name`) VALUES
(2, 'Gadget'),
(3, 'Elektronik'),
(4, 'Pakaian'),
(6, 'Mainan'),
(7, 'Kamera'),
(9, 'Aksesoris'),
(10, 'Alat Dapur');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(30) NOT NULL,
  `estimasi` varchar(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(64, 6, '2302221528006', 30, 'Wed Feb 2022', 5500000, 300000, 1, 'proses pengisisan data', 'Banjarmlati Lengkong'),
(65, 6, '2302221528006', 31, 'Wed Feb 2022', 5500000, 300000, 3, 'proses pengisisan data', 'Banjarmlati Lengkong'),
(69, 6, '2302221537206', 30, 'Wed Feb 2022', 18879800, 180000, 2, 'proses pengisisan data', 'jln pahlawan'),
(70, 6, '2302221537206', 32, 'Wed Feb 2022', 18879800, 180000, 3, 'proses pengisisan data', 'jln pahlawan'),
(71, 6, '2302221537206', 37, 'Wed Feb 2022', 18879800, 180000, 2, 'proses pengisisan data', 'jln pahlawan'),
(72, 6, '2302221540556', 36, 'Wed Feb 2022', 16823900, 924000, 2, 'proses pengisisan data', 'jln sumpah pemuda'),
(73, 6, '2302221540556', 37, 'Wed Feb 2022', 16823900, 924000, 1, 'proses pengisisan data', 'jln sumpah pemuda'),
(74, 6, '2302221540556', 30, 'Wed Feb 2022', 16823900, 924000, 2, 'proses pengisisan data', 'jln sumpah pemuda'),
(75, 6, '2302221540556', 31, 'Wed Feb 2022', 16823900, 924000, 2, 'proses pengisisan data', 'jln sumpah pemuda');

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(40) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `stok_sebelum` int(11) NOT NULL,
  `stok_sesudah` int(11) NOT NULL,
  `stok_ditambahkan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `stok_sebelum`, `stok_sesudah`, `stok_ditambahkan`, `id_barang`, `tanggal`) VALUES
(8, 26, 30, 4, 8, '2022-01-26'),
(9, 26, 46, 20, 10, '2022-01-28'),
(10, 67, 123, 56, 22, '2022-01-28'),
(11, 8, 17, 9, 25, '2022-01-29'),
(12, 12, 37, 25, 29, '2022-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(6, 'singiki', 'singiki18@gmail.com', '$2y$10$r.tk.2Fw/kl46AA5gjuL2eRjHDRD04.xhUf0HJ4UZlMQ9aACxqubC', 'user'),
(7, 'hai', 'hai', '$2y$10$JMrgOdl2mDpCXhpdFUZ1x.H3YMviZWjDDrDveuGu2texI.pYr/7eS', 'user'),
(8, 'hi', 'hiasas', '$2y$10$tqIwKpgo5Nixo/677RltJOhJwtQTzyMWOwS8H4TKzf5.TSsPTFBEK', 'user'),
(10, 'mdwiastika', 'marceldwias@gmail.com', '$2y$10$hzeYxB0HGFh6Jvd1wc5npu7YhU46cPlBLpL3U1yWobPsmB5Iy74Ba', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buktipembayaran`
--
ALTER TABLE `buktipembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `buktipembayaran`
--
ALTER TABLE `buktipembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
