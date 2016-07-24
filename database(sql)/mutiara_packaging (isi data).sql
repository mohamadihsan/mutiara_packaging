-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2016 at 05:56 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `kode`, `nama`, `harga_beli`, `harga_jual`, `stok`, `minimal_quantity`, `maksimal_quantity`, `waktu_tunggu`, `lokasi_penyimpanan`, `status_hapus`) VALUES
(1, 'PPP15GL', 'POT PP 15GR GOLD - PUTIH', 1300, 1900, 71, 20, 250, NULL, NULL, '1'),
(2, 'P5GRACDGL', 'POT 5GR ACD GOLD', 950, 1500, 674, NULL, NULL, NULL, NULL, '1'),
(3, 'P5GRACDHP', 'POT 5GR ACD HIJAU PERLIZE', 950, 1500, 1827, NULL, NULL, NULL, NULL, '1'),
(4, 'PUFO10GRGL', 'POT UFO 10GR GOLD', 7300, 9000, 287, NULL, NULL, NULL, NULL, '1'),
(5, 'PACI15GRP', 'POT ACI 15GR PINK', 2850, 3400, 998, NULL, NULL, NULL, NULL, '1'),
(6, 'AIRLESSEBSLR', 'AIRLESS ELIPS BENING SILVER', 10000, 12500, 1100, NULL, NULL, NULL, NULL, '1'),
(7, 'AIRLESSEMGLD', 'AIRLESS ELIPS MOZZA GOLD', 11000, 13500, 0, NULL, NULL, NULL, NULL, '1'),
(8, 'AIRLESSSLDRBS', 'AIRLESS SILINDER BENING SILVER', 10000, 12500, 0, NULL, NULL, NULL, NULL, '1'),
(9, 'AIRLESSP30ML', 'AIRLESS PLASTIK 30ML', 6000, 7500, 2404, NULL, NULL, NULL, NULL, '1'),
(10, 'AIRLESSPL15ML', 'AIRLESS PLASTIK 15ML', 5500, 6500, 1412, NULL, NULL, NULL, NULL, '1'),
(11, 'BTLA50MLHJ', 'BOTOL AMAMI 50ML HIJAU', 1400, 1900, 0, NULL, NULL, NULL, NULL, '1'),
(12, 'BTLA90MLP', 'BOTOL AMAMI 90ML PUTIH', 1500, 1900, 0, NULL, NULL, NULL, NULL, '1'),
(13, 'POTAGLD12GR', 'POT APEL GOLD-GOLD 12GR', 1250, 1800, 1659, NULL, NULL, NULL, NULL, '1'),
(14, 'BELGLD', 'BELLA  GOLD', 2400, 3200, 473, NULL, NULL, NULL, NULL, '1'),
(15, 'POTBKHXGN', 'POT BEDAK HEXAGONE', 4000, 6000, 188, NULL, NULL, NULL, NULL, '1'),
(16, 'BTLFT250MLN', 'BOTOL FLIPTOP 250ML NATURAL', 2750, 4000, 0, NULL, NULL, NULL, NULL, '1'),
(17, 'TTPFTBSRHTM', 'TUTUP FLIPTOP BESAR HITAM', 850, 1300, 1015, NULL, NULL, NULL, NULL, '1'),
(18, 'BTLSPRY25MLGP', 'BOTOL SPRAY 25ML GRADASI PINK', 2000, 3000, 43, NULL, NULL, NULL, NULL, '1'),
(19, 'PUMPKCFZ20ML', 'PUMP KACA FROZEN 20ML', 3000, 3500, 0, NULL, NULL, NULL, NULL, '1'),
(20, 'TTPFLPBSRN', 'TUTUP FLIPTOP BESAR NATURAL', 850, 1300, 1643, NULL, NULL, NULL, NULL, '1'),
(21, 'TBRDDTTPB60ML', 'TUBULAR DISKTOP DOVE TUTUP BENING 60ML', 2000, 2800, 0, NULL, NULL, NULL, NULL, '1'),
(22, 'BTLYDY100MLN', 'BOTOL YADLEY 100ML NATURAL', 1100, 1600, 0, NULL, NULL, NULL, NULL, '1'),
(23, 'BTLFLP100MLDTP', 'BOTOL FLIPTOP 100ML DOVE TUTUP PUTIH', 1900, 2500, 0, NULL, NULL, NULL, NULL, '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`id`, `nama`, `no_telp`, `fax`, `email`, `website`, `alamat`, `status_hapus`) VALUES
(1, 'MOHAMAD IHSAN', '+6285720054204', '85720054204', 'mohamad_ihsan100@yahoo.co.id', '', 'Jl.Simpay Asih 2, Cijambe Ujung Berung', '1');

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

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_pembelian`, `id_bahan_baku`, `quantity`) VALUES
(1, 1, 20);

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

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id_produk`, `id_bahan_baku`) VALUES
(1, 1),
(1, 6),
(2, 4),
(2, 14),
(2, 19);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id`, `nama_gudang`, `no_telp`, `alamat`, `status_hapus`) VALUES
(1, 'Gudang Besar', '', 'Rancaekek, Bandung', '1'),
(2, 'Gudang Kecil', '', 'Ciwastra, Bandung', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `no_order`, `supplier`, `tanggal_pembelian`, `tanggal_barang_datang`, `gudang`, `total_pembelian`, `status_pembelian`, `arsipkan`, `status_hapus`) VALUES
(1, NULL, 1, '2015-09-20', NULL, 1, 0, '0', '0', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `harga_jual`, `stok`, `minimal_quantity`, `maksimal_quantity`, `lokasi_penyimpanan`, `status_hapus`) VALUES
(1, 'BTLSPY100MLDTN', 'BOTOL SPRAY 100ML DOVE TUTUP NATURAL', 2900, 0, NULL, NULL, NULL, '1'),
(2, 'BTLDKTP100MLDTN', 'BOTOL DISKTOP 100ML DOVE TUTUP NATURAL', 2800, 0, NULL, NULL, NULL, '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `produk`, `quantity`, `tanggal_produksi`, `status_produksi`, `arsipkan`, `status_hapus`) VALUES
(1, 1, 25, '2015-09-30', '0', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `no_telp`, `fax`, `email`, `website`, `alamat`, `status_hapus`) VALUES
(1, 'CV. DHYAN DHANY PLASTIK', '082131901686', '082131901686', '', '', 'SURABAYA', '1'),
(2, 'PT. ALBEA RIGID ', '081231474076', '081231474076', '', '', 'TANGERANG', '1'),
(3, 'PT. SINAR DILA PLAST', '081573001555', '081573001555', '', '', 'TANGERANG', '1'),
(4, 'CV. SURYA PERMATA', '08112135503', '', '', '', 'BANDUNG', '1'),
(5, 'CV. LISABOY GAYA CANTIKA ', '081298043321', '', '', '', 'JAKARTA', '1'),
(6, 'CV. IHSAN PLAST', '081555716123', '', '', '', 'MALANG', '1'),
(7, 'CV. TIGA BERSAUDARA ', '0315249335', '', '', '', 'SURABAYA', '1');

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
