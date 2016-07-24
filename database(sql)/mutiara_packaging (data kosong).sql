-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2016 at 03:57 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mutiara_packaging`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

DROP TABLE IF EXISTS `bahan_baku`;
CREATE TABLE IF NOT EXISTS `bahan_baku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(60) NOT NULL,
  `harga_beli` int(11) DEFAULT '0',
  `harga_jual` int(11) DEFAULT '0',
  `stok` int(11) DEFAULT '0',
  `minimal_quantity` int(11) DEFAULT NULL,
  `maksimal_quantity` int(11) DEFAULT NULL,
  `waktu_tunggu` int(11) DEFAULT NULL,
  `lokasi_penyimpanan` int(11) DEFAULT NULL,
  `status_hapus` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `lokasi_penyimpanan` (`lokasi_penyimpanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

DROP TABLE IF EXISTS `costumer`;
CREATE TABLE IF NOT EXISTS `costumer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `website` varchar(60) DEFAULT NULL,
  `alamat` text,
  `status_hapus` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

DROP TABLE IF EXISTS `detail_pembelian`;
CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id_pembelian` int(11) DEFAULT NULL,
  `id_bahan_baku` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  KEY `id_pembelian` (`id_pembelian`),
  KEY `id_bahan_baku` (`id_bahan_baku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

DROP TABLE IF EXISTS `detail_produk`;
CREATE TABLE IF NOT EXISTS `detail_produk` (
  `id_produk` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  KEY `id_produk` (`id_produk`),
  KEY `id_bahan_baku` (`id_bahan_baku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

DROP TABLE IF EXISTS `ekspedisi`;
CREATE TABLE IF NOT EXISTS `ekspedisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `status_hapus` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

DROP TABLE IF EXISTS `gudang`;
CREATE TABLE IF NOT EXISTS `gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_gudang` varchar(30) NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text,
  `status_hapus` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_order` int(11) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `tanggal_barang_datang` date DEFAULT NULL,
  `gudang` int(11) DEFAULT NULL,
  `total_pembelian` int(11) DEFAULT '0',
  `status_pembelian` char(1) DEFAULT '0',
  `arsipkan` char(1) DEFAULT '0',
  `status_hapus` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `supplier` (`supplier`),
  KEY `gudang` (`gudang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(60) NOT NULL,
  `harga_jual` int(11) DEFAULT '0',
  `stok` int(11) DEFAULT '0',
  `minimal_quantity` int(11) DEFAULT NULL,
  `maksimal_quantity` int(11) DEFAULT NULL,
  `lokasi_penyimpanan` int(11) DEFAULT NULL,
  `status_hapus` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `lokasi_penyimpanan` (`lokasi_penyimpanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

DROP TABLE IF EXISTS `produksi`;
CREATE TABLE IF NOT EXISTS `produksi` (
  `id_produksi` int(11) NOT NULL AUTO_INCREMENT,
  `produk` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `tanggal_produksi` date DEFAULT NULL,
  `status_produksi` char(1) DEFAULT '0',
  `arsipkan` char(1) DEFAULT '0',
  `status_hapus` char(1) DEFAULT '0',
  PRIMARY KEY (`id_produksi`),
  KEY `bahan_baku` (`produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `website` varchar(60) DEFAULT NULL,
  `alamat` text,
  `status_hapus` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`lokasi_penyimpanan`) REFERENCES `gudang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD CONSTRAINT `detail_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_produk_ibfk_2` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`gudang`) REFERENCES `gudang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`lokasi_penyimpanan`) REFERENCES `gudang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
