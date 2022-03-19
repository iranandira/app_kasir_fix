-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 11:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `pk_barang_id` int(3) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `fk_kategori_id` int(2) NOT NULL,
  `fk_satuan_id` int(2) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`pk_barang_id`, `nama_barang`, `harga`, `fk_kategori_id`, `fk_satuan_id`, `stok`) VALUES
(2, 'ciki tarop', 2000, 1, 9, 9),
(3, 'Beras', 12000, 1, 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori`
--

CREATE TABLE `data_kategori` (
  `pk_kategori_id` int(2) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kategori`
--

INSERT INTO `data_kategori` (`pk_kategori_id`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Alat Dapur'),
(3, 'Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `data_login`
--

CREATE TABLE `data_login` (
  `pk_login_id` int(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('kasir','manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_login`
--

INSERT INTO `data_login` (`pk_login_id`, `username`, `password`, `level`) VALUES
(1, 'lulu ', '827ccb0eea8a706c4c34a16891f84e7b', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `data_member`
--

CREATE TABLE `data_member` (
  `pk_member_id` int(6) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tipe_member` enum('clasic','premium') NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_member`
--

INSERT INTO `data_member` (`pk_member_id`, `nama_member`, `alamat`, `no_hp`, `tipe_member`, `dibuat_pada`) VALUES
(3, 'azis', 'jln.bantar', '0094839', 'clasic', '2022-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `data_satuan`
--

CREATE TABLE `data_satuan` (
  `pk_satuan_id` int(2) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_satuan`
--

INSERT INTO `data_satuan` (`pk_satuan_id`, `nama_satuan`) VALUES
(6, 'Saschet'),
(7, 'KG'),
(9, 'PCS'),
(10, 'cup');

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `pk_transaksi_id` int(11) NOT NULL,
  `tipe_konsumen` enum('member','umum') NOT NULL,
  `fk_member_id` int(11) DEFAULT NULL,
  `tanggal_transaksi` date NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`pk_transaksi_id`, `tipe_konsumen`, `fk_member_id`, `tanggal_transaksi`, `bayar`) VALUES
(11, 'umum', 0, '2021-06-06', 15000),
(20, 'umum', 0, '2021-07-01', 10000),
(26, 'member', 1, '2021-07-12', 50000),
(27, 'umum', 0, '2022-01-13', 20000),
(30, 'umum', 0, '2022-03-17', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `pk_detail_transaksi_id` int(11) NOT NULL,
  `fk_transaksi_id` int(11) NOT NULL,
  `fk_barang_id` int(3) NOT NULL,
  `kuantitas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`pk_detail_transaksi_id`, `fk_transaksi_id`, `fk_barang_id`, `kuantitas`) VALUES
(5, 9, 2, 3),
(6, 9, 3, 2),
(7, 9, 2, 1),
(8, 9, 3, 250),
(9, 10, 4, 3),
(10, 11, 2, 4),
(11, 11, 4, 2),
(12, 11, 3, 2),
(13, 19, 2, 1),
(14, 20, 2, 3),
(15, 21, 2, 1),
(16, 21, 3, 2),
(17, 23, 2, 3),
(18, 24, 2, 1),
(19, 24, 3, 2),
(20, 25, 2, 10),
(21, 26, 2, 20),
(22, 27, 2, 2),
(23, 27, 3, 1),
(24, 30, 2, 2),
(25, 30, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`pk_barang_id`),
  ADD KEY `fk_kategori_id` (`fk_kategori_id`,`fk_satuan_id`),
  ADD KEY `fk_satuan_id` (`fk_satuan_id`);

--
-- Indexes for table `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`pk_kategori_id`);

--
-- Indexes for table `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`pk_login_id`);

--
-- Indexes for table `data_member`
--
ALTER TABLE `data_member`
  ADD PRIMARY KEY (`pk_member_id`);

--
-- Indexes for table `data_satuan`
--
ALTER TABLE `data_satuan`
  ADD PRIMARY KEY (`pk_satuan_id`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`pk_transaksi_id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`pk_detail_transaksi_id`),
  ADD KEY `fk_transaksi_id` (`fk_transaksi_id`),
  ADD KEY `fk_barang_id` (`fk_barang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `pk_barang_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_kategori`
--
ALTER TABLE `data_kategori`
  MODIFY `pk_kategori_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_login`
--
ALTER TABLE `data_login`
  MODIFY `pk_login_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_member`
--
ALTER TABLE `data_member`
  MODIFY `pk_member_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_satuan`
--
ALTER TABLE `data_satuan`
  MODIFY `pk_satuan_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `pk_transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `pk_detail_transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD CONSTRAINT `data_barang_ibfk_1` FOREIGN KEY (`fk_satuan_id`) REFERENCES `data_satuan` (`pk_satuan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `data_barang_ibfk_2` FOREIGN KEY (`fk_kategori_id`) REFERENCES `data_kategori` (`pk_kategori_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
