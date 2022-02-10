-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2021 at 08:49 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_orginizer`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(1, 'Catering'),
(2, 'Dekorasi'),
(3, 'Gaun Pengantin'),
(4, 'Souvenir');

-- --------------------------------------------------------

--
-- Table structure for table `detail_gambar`
--

CREATE TABLE `detail_gambar` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kuantiti` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `rekening_dp` varchar(30) DEFAULT NULL,
  `rekening_lunas` varchar(30) DEFAULT NULL,
  `tgl_pembayaran_dp` date DEFAULT NULL,
  `tgl_pembayaran_lunas` date DEFAULT NULL,
  `bayar` int(11) NOT NULL,
  `foto_dp` varchar(255) DEFAULT NULL,
  `foto_lunas` varchar(255) DEFAULT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `order_number` varchar(30) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_gambar` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rekening` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `nama_bank`, `no_rekening`) VALUES
(1, 'BNI', 1234567890),
(2, 'BCA', 2147483647),
(3, 'BRI', 2147483647),
(4, 'MANDIRI', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `role` enum('Admin','Owner','Customer') NOT NULL,
  `is_active` enum('1','2') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `no`, `alamat`, `gender`, `role`, `is_active`, `created_at`) VALUES
(2, 'admin1', 'admin@gmail.com', '$2y$10$t5TJo2TaRGc0qd1Dz5nzrefFK1d/7tNa98M3H0wYWIJy/S0BGxfpW', '081234567890', 'Kober', 'L', 'Admin', '1', NULL),
(5, 'customer', 'customer@gmail.com', '$2y$10$UtcQN9HpVs6OFah4MTg1q.hLySNK6xi.IMRqJAyk27UDOLfcJYFHm', '081234567890', 'Bandung', 'L', 'Customer', '1', NULL),
(6, 'Owner', 'owner@gmail.com', '$2y$10$G/W5qEQ8w4FoX/0kTB5lEua0XnMAudaKVtKzbVSNiGtbNwhpiDaxi', '', '', '', 'Owner', '1', NULL),
(7, 'Abi Baskara', 'abibaskara211@gmail.com', '$2y$10$NXaS4AfqXsUnAKLvBYw/FuKYo169SPZZpZO/GiB..Qox52KIN0cwK', '0812345678901', 'Kober', 'L', 'Customer', '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `detail_gambar`
--
ALTER TABLE `detail_gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_gambar`
--
ALTER TABLE `detail_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
