-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 12:48 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fatncurious`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kartu_kredit`
--

CREATE TABLE IF NOT EXISTS `jenis_kartu_kredit` (
  `KODE_JENIS_KARTUKREDIT` varchar(5) NOT NULL,
  `NAMA_JENIS_KARTUKREDIT` varchar(20) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_JENIS_KARTUKREDIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kartu_kredit`
--

INSERT INTO `jenis_kartu_kredit` (`KODE_JENIS_KARTUKREDIT`, `NAMA_JENIS_KARTUKREDIT`, `STATUS`) VALUES
('JKK01', 'BRONZE', '1'),
('JKK02', 'SILVER', '1'),
('JKK03', 'GOLD', '1'),
('JKK04', 'PLATINUM', '1'),
('JKK05', 'DIAMOND', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_menu`
--

CREATE TABLE IF NOT EXISTS `jenis_menu` (
  `KODE_JENISMENU` varchar(5) NOT NULL,
  `NAMA_JENISMENU` varchar(20) NOT NULL,
  `KETERANGAN_JENISMENU` varchar(50) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_JENISMENU`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_menu`
--

INSERT INTO `jenis_menu` (`KODE_JENISMENU`, `NAMA_JENISMENU`, `KETERANGAN_JENISMENU`, `STATUS`) VALUES
('JM001', 'MAKANAN', 'HIDANGAN UTAMA', '1'),
('JM002', 'MINUMAN', 'MINUMAN PANAS/DINGIN', '1'),
('JM003', 'SNACK', 'MAKANAN RINGAN', '1'),
('JM004', 'DESSERT', 'HIDANGAN PENCUCI MULUT', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_user`
--

CREATE TABLE IF NOT EXISTS `jenis_user` (
  `KODE_JENISUSER` varchar(5) NOT NULL,
  `NAMA_JENISUSER` varchar(20) NOT NULL,
  `KETERANGAN_JENISUSER` varchar(50) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_JENISUSER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_user`
--

INSERT INTO `jenis_user` (`KODE_JENISUSER`, `NAMA_JENISUSER`, `KETERANGAN_JENISUSER`, `STATUS`) VALUES
('JU001', 'ADMIN', '', '1'),
('JU002', 'MEMBER', '', '1'),
('JU003', 'PEMILIK', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_kredit`
--

CREATE TABLE IF NOT EXISTS `kartu_kredit` (
  `KODE_KARTU_KREDIT` varchar(5) NOT NULL,
  `NAMA_KARTU_KREDIT` varchar(50) NOT NULL,
  `ALAMAT_KARTU_KREDIT` varchar(100) NOT NULL,
  `NOMOR_TELEPON_KARTU_KREDIT` varchar(12) NOT NULL,
  `WEBSITE_KARTU_KREDIT` varchar(50) NOT NULL,
  `KETERANGAN_KARTU_KREDIT` varchar(100) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_KARTU_KREDIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_kredit`
--

INSERT INTO `kartu_kredit` (`KODE_KARTU_KREDIT`, `NAMA_KARTU_KREDIT`, `ALAMAT_KARTU_KREDIT`, `NOMOR_TELEPON_KARTU_KREDIT`, `WEBSITE_KARTU_KREDIT`, `KETERANGAN_KARTU_KREDIT`, `STATUS`) VALUES
('KKK01', 'BCA', 'JALAN VETERAN NO1 SURABAYA', '031123123', 'www.bca.co.id', '', '1'),
('KKK02', 'MANDIRI', 'JALAN DHARMAHUSADA 3/IV SURABAYA', '031123456', 'www.mandiri.co.id', '', '1'),
('KKK03', 'BNI', 'JALAN PUCANG ANOM SURABAYA', '0315055018', 'ibank.bni.co.id', '', '1'),
('KKK04', 'DANAMON', 'JALAN KERTAJAYA 10 141A SURABAYA', '0315031411', 'danamon.co.id', '', '1'),
('KKK05', 'BRI', 'JALAN DHARMAWANGSA 3A  SURABAYA', '0315016477', 'bri.co.id', '', '1'),
('KKK06', 'MEGA', 'JALAN KIRI KANAN 22C/II SURABAYA', '031530511', 'megabank.co.id', '', '1'),
('KKK07', 'BERSAMA', 'JALAN SUKOHARJO 22C/II SURABAYA', '0313890535', 'bersamapastibisa.co.id', '', '1'),
('KKK08', 'CIMB', 'JALAN PASAR BUNGA VA SURABAYA', '0313679870', 'cimbniaga.com', '', '1'),
('KKK09', 'SINARMAS', 'JALAN GATOT SUBROTO 5F/III SURABAYA', '031709780', 'sinarmas.co.id', '', '1'),
('KKK10', 'BUKOPIN', 'JALAN BIKINI UP SURABAYA', '031777666', 'untungbukopin.co.id', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_kredit_user`
--

CREATE TABLE IF NOT EXISTS `kartu_kredit_user` (
  `Kode_Kartu_Kredit` varchar(5) NOT NULL,
  `KODE_USER` varchar(5) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`Kode_Kartu_Kredit`,`KODE_USER`),
  KEY `KODE_USER` (`KODE_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_kredit_user`
--

INSERT INTO `kartu_kredit_user` (`Kode_Kartu_Kredit`, `KODE_USER`, `STATUS`) VALUES
('KKK01', 'US002', '1'),
('KKK02', 'US006', '1'),
('KKK03', 'US002', '1'),
('KKK04', 'US002', '1'),
('KKK05', 'US003', '1'),
('KKK06', 'US004', '1'),
('KKK07', 'US005', '1'),
('KKK08', 'US007', '1'),
('KKK09', 'US008', '1'),
('KKK10', 'US010', '1');

-- --------------------------------------------------------

--
-- Table structure for table `like_review_user`
--

CREATE TABLE IF NOT EXISTS `like_review_user` (
  `KODE_USER` varchar(5) NOT NULL,
  `KODE_REVIEW` varchar(5) NOT NULL,
  `STATUS` int(1) NOT NULL,
  PRIMARY KEY (`KODE_USER`,`KODE_REVIEW`),
  KEY `KODE_REVIEW` (`KODE_REVIEW`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_review_user`
--

INSERT INTO `like_review_user` (`KODE_USER`, `KODE_REVIEW`, `STATUS`) VALUES
('US001', 'RE001', 1),
('US002', 'RE001', -1),
('US008', 'RE003', -1),
('US008', 'RE004', 1),
('US010', 'RE002', 1),
('US010', 'RE005', 0),
('US012', 'RE002', 1),
('US012', 'RE006', -1),
('US012', 'RE010', 1),
('US012', 'RE011', 1),
('US012', 'RE012', 1),
('US013', 'RE006', 1),
('US013', 'RE011', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `KODE_MENU` varchar(5) NOT NULL,
  `KODE_JENIS_MENU` varchar(5) NOT NULL,
  `KODE_RESTORAN` varchar(5) NOT NULL,
  `NAMA_MENU` varchar(20) NOT NULL,
  `DESKRIPSI_MENU` varchar(100) NOT NULL,
  `HARGA_MENU` int(6) NOT NULL,
  `URL_FOTO` varchar(255) NOT NULL,
  `KETERANGAN_MENU` varchar(50) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_MENU`),
  KEY `KODE_JENIS_MENU` (`KODE_JENIS_MENU`),
  KEY `KODE_RESTORAN` (`KODE_RESTORAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`KODE_MENU`, `KODE_JENIS_MENU`, `KODE_RESTORAN`, `NAMA_MENU`, `DESKRIPSI_MENU`, `HARGA_MENU`, `URL_FOTO`, `KETERANGAN_MENU`, `STATUS`) VALUES
('ME001', 'JM001', 'RS001', 'NACHOS', 'KRIPIK KENTANG RENYAH', 20000, '1.jpg', '', '1'),
('ME002', 'JM001', 'RS001', 'MIE GORENG', 'MIE TELUR AYAM SAYUR BUMBU', 25000, '1.jpg', '', '1'),
('ME003', 'JM003', 'RS001', 'KENTANG GORENG', 'KENTANG YANG GURIH ', 12000, '1.jpg', 'SNACK', '1'),
('ME004', 'JM001', 'RS002', 'SIRLOIN STEAK', 'STEAK DENGAN KENTANG DAN SAYUR', 90000, '1.jpg', 'HIDANGAN UTAMA', '1'),
('ME005', 'JM002', 'RS002', 'ORANGE JUICE', 'JUS JERUK DINGIN DAN SEGAR ', 10000, '', 'MINUMAN', '1'),
('ME006', 'JM004', 'RS002', 'VANILLA CHEESSCAKE', 'CHEESSCAKE RASA VANILLA', 26000, '1.jpg', 'HIDANGAN PENCUCI MULUT', '1'),
('ME007', 'JM001', 'RS003', 'NASI AYAM LEMON', 'NASI DENGAN AYAM SAOS LEMON', 20000, '1.jpg', 'HIDANGAN UTAMA', '1'),
('ME008', 'JM002', 'RS003', 'CHRYSANTHIUM TEA', 'MINUM DARI SARI BUNGA KRISANTIUM', 9000, '1.jpg', 'MINUMAN', '1'),
('ME009', 'JM001', 'RS001', 'BURITOS', 'BURRITOS ENAK', 25000, '1.jpg', '', '0'),
('ME010', 'JM001', 'RS003', 'TAMI CAP CAY', 'TAMI DENGAN ISI SAYUR DAN KUAH CAP CAY', 17000, '1.jpg', 'HIDANGAN UTAMA', '1'),
('ME011', 'JM001', 'RS002', 'TENDERLOIN STEAK', 'STEAK TENDERLOIN DENGAN KENTANG ', 120000, '1.jpg', 'HIDANGAN UTAMA', '1'),
('ME012', 'JM002', 'RS002', 'WATERMELON JUICE', 'JUS SEMANGKA YANG SEGAR', 12000, '1.jpg', 'MINUMAN', '1'),
('ME013', 'JM001', 'RS001', 'NASI GORENG ', 'NASI DENGAN AYAM , TELUR , SERTA SOSIS', 22000, '1.jpg', 'HIDANGAN UTAMA', '1'),
('ME014', 'JM002', 'RS005', 'BLUE SEA COCKTAIL ', 'COCKTAIL RASA BLUE PUNCH', 20000, '1.jpg', 'MINUMAN', '1'),
('ME015', 'JM002', 'RS006', 'RADDLER', 'BIR BINTANG RASA LEMON', 18000, '1.jpg', 'MINUMAN BERALKOHOL', '1'),
('ME016', 'JM003', 'RS007', 'TAHU POP CORN', 'TAHU BULAT GORENG', 13000, '1.jpg', 'MAKANAN RINGAN', '1'),
('ME017', 'JM004', 'RS008', 'CARAMEL PUDDING', 'PUDDING DENGAN SAOS CARAMEL', 20000, '1.jpg', 'DESSERT', '1'),
('ME018', 'JM001', 'RS009', 'ROTI CANAI', 'ROTI KHAS TIMUR TENGAH', 15000, '1.jpg', 'MAKANAN', '1');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `KODE_PROMO` varchar(5) NOT NULL,
  `NAMA_PROMO` varchar(20) NOT NULL,
  `DESKRIPSI_PROMO` varchar(50) NOT NULL,
  `MASABERLAKU_PROMO` date NOT NULL,
  `FOTO_PROMO` varchar(50) NOT NULL,
  `PERSENTASE_PROMO` int(3) NOT NULL,
  `KETERANGAN_PROMO` varchar(100) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_PROMO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`KODE_PROMO`, `NAMA_PROMO`, `DESKRIPSI_PROMO`, `MASABERLAKU_PROMO`, `FOTO_PROMO`, `PERSENTASE_PROMO`, `KETERANGAN_PROMO`, `STATUS`) VALUES
('PR001', 'GRAND OPENING X.O', 'UNTUK PENGGUNA KARTU KREDIT BCA BATMAN', '2016-09-30', '2.JPG', 25, '', '1'),
('PR002', 'MAKAN HEMAT ', 'DISKON 50% UNTUK PENGGUNA KARTU KREDIT BRI', '2016-10-20', '3.JPG', 50, '', '1'),
('PR003', 'PAKET UNTUNG KFC', 'KARTU KREDIT BANK MEGA', '2016-11-22', '4.JPG', 40, 'BELI 1 AYAM UNTUNG 1 AYAM', '1'),
('PR004', 'PROMO BRI', 'KARTU KREDIT BANK BRI', '2016-11-22', '5.JPG', 25, 'MAKAN DI RESTO PILIHAN DENGAN DISKON TERBAIK', '1'),
('PR005', 'FOOD MANIA', 'DISKON MAKANAN DENGAN KARTU KREDIT BUKOPIN', '2016-11-22', '6.JPG', 20, 'MAKAN DI RESTO PILIHAN DENGAN DISKON TERBAIK', '1'),
('PR006', 'LUNCH BREAK', 'DISKON MAKANAN DENGAN KARTU KREDIT SINARMAS', '2016-11-22', '7.JPG', 30, 'MAKAN DI RESTO PILIHAN DENGAN DISKON TERBAIK', '1'),
('PR007', 'MAKAN KENYANG', 'DISKON MAKANAN DENGAN KARTU KREDIT BERSAMA', '2016-11-30', '8.JPG', 30, 'MAKAN BERSAMA LEBIH ENAK DENGAN DISKON', '1'),
('PR008', 'PARTY PARTY YEAH', 'DISKON MINUMAN ', '2016-11-30', '9.JPG', 15, 'BIAR PARTY LEBIH MANTAP', '1');

-- --------------------------------------------------------

--
-- Table structure for table `promo_restoran`
--

CREATE TABLE IF NOT EXISTS `promo_restoran` (
  `KODE_RESTORAN` varchar(5) NOT NULL,
  `KODE_PROMO` varchar(5) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_RESTORAN`,`KODE_PROMO`),
  KEY `KODE_PROMO` (`KODE_PROMO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo_restoran`
--

INSERT INTO `promo_restoran` (`KODE_RESTORAN`, `KODE_PROMO`, `STATUS`) VALUES
('RS001', 'PR001', '1'),
('RS001', 'PR002', '1'),
('RS003', 'PR005', '1'),
('RS005', 'PR004', '1'),
('RS006', 'PR005', '1'),
('RS007', 'PR006', '1'),
('RS008', 'PR007', '1'),
('RS009', 'PR008', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rating_menu`
--

CREATE TABLE IF NOT EXISTS `rating_menu` (
  `KODE_MENU` varchar(5) NOT NULL,
  `KODE_USER` varchar(5) NOT NULL,
  `JUMLAH_RATING` int(3) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_MENU`,`KODE_USER`),
  KEY `KODE_USER` (`KODE_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_menu`
--

INSERT INTO `rating_menu` (`KODE_MENU`, `KODE_USER`, `JUMLAH_RATING`, `STATUS`) VALUES
('ME001', 'US003', 1, '1'),
('ME002', 'US003', 1, '1'),
('ME003', 'US003', 3, '1'),
('ME004', 'US003', 3, '1'),
('ME005', 'US003', 2, '1'),
('ME006', 'US003', 2, '1'),
('ME007', 'US003', 2, '1'),
('ME010', 'US003', 3, '1'),
('ME011', 'US003', 1, '1'),
('ME012', 'US003', 2, '1'),
('ME013', 'US003', 1, '1'),
('ME014', 'US004', 3, '1'),
('ME014', 'US005', 2, '1'),
('ME015', 'US006', 3, '1'),
('ME016', 'US007', 3, '1'),
('ME017', 'US008', 2, '1'),
('ME018', 'US009', 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `rating_restoran`
--

CREATE TABLE IF NOT EXISTS `rating_restoran` (
  `KODE_USER` varchar(5) NOT NULL,
  `KODE_RESTORAN` varchar(5) NOT NULL,
  `TANGGAL` date NOT NULL,
  `JUDUL` varchar(255) NOT NULL,
  `DESKRIPSI` varchar(150) NOT NULL,
  `JUMLAH_LIKE` int(3) NOT NULL,
  `JUMLAH_RATING` int(3) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_USER`,`KODE_RESTORAN`),
  KEY `KODE_RESTORAN` (`KODE_RESTORAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_restoran`
--

INSERT INTO `rating_restoran` (`KODE_USER`, `KODE_RESTORAN`, `TANGGAL`, `JUDUL`, `DESKRIPSI`, `JUMLAH_LIKE`, `JUMLAH_RATING`, `STATUS`) VALUES
('US002', 'RS006', '2016-11-14', 'Jason', 'Elian', 0, 3, '1'),
('US002', 'RS009', '2016-11-14', 'haha', 'baru 3', 0, 3, '1'),
('US003', 'RS001', '2016-11-14', '', '', 0, 5, '1'),
('US003', 'RS002', '2016-11-14', 'Mantap gan!', 'Mantap restorannya, dingin pula hehe', 0, 3, '1'),
('US003', 'RS003', '2016-11-14', '', '', 0, 2, '1'),
('US004', 'RS004', '2016-11-14', '', '', 0, 5, '1'),
('US005', 'RS005', '2016-11-14', '', '', 0, 5, '1'),
('US006', 'RS006', '2016-11-14', '', '', 0, 5, '1'),
('US007', 'RS007', '2016-11-14', '', '', 0, 5, '1'),
('US008', 'RS008', '2016-11-14', '', '', 0, 5, '1'),
('US009', 'RS009', '2016-11-14', '', '', 0, 5, '1'),
('US011', 'RS009', '2016-11-14', '', '', 0, 5, '1'),
('US012', 'RS002', '2016-11-23', 'Boncafe emang tidak usah diragukan lagi!', 'Saya biasanya makan sih biasa, biasa aja. Tapi semenjak saya makan disini, saya jadi sadar akan pentingnya kehidupan di dunia dan akhirat.', 0, 5, '1'),
('US012', 'RS009', '2016-11-15', 'Halo', 'Ini comment Hendy ganteng ', 0, 3, '1'),
('US013', 'RS009', '2016-11-14', 'teststs', 'hahaha', 0, 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `report_foto_menu`
--

CREATE TABLE IF NOT EXISTS `report_foto_menu` (
  `KODE_REPORT_FOTO_MENU` varchar(5) NOT NULL,
  `KODE_USER_YANG_MEREPORT` varchar(5) NOT NULL,
  `KODE_UPLOAD_FOTO_MENU` varchar(5) NOT NULL,
  `TANGGAL_REPORT` date NOT NULL,
  `WAKTU_REPORT` time NOT NULL,
  `ALASAN` varchar(200) NOT NULL,
  `KETERANGAN` varchar(200) NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_foto_menu`
--

INSERT INTO `report_foto_menu` (`KODE_REPORT_FOTO_MENU`, `KODE_USER_YANG_MEREPORT`, `KODE_UPLOAD_FOTO_MENU`, `TANGGAL_REPORT`, `WAKTU_REPORT`, `ALASAN`, `KETERANGAN`, `STATUS`) VALUES
('RF001', 'US003', 'UF001', '2016-08-11', '08:34:00', 'Foto tidak sesuai aslinya', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report_restoran`
--

CREATE TABLE IF NOT EXISTS `report_restoran` (
  `KODE_REPORT_RESTORAN` varchar(5) NOT NULL,
  `TANGGAL_REPORT` date NOT NULL,
  `WAKTU_REPORT` time NOT NULL,
  `KODE_USER` varchar(5) NOT NULL,
  `KODE_RESTORAN` varchar(5) NOT NULL,
  `ALASAN` varchar(200) NOT NULL,
  `KETERANGAN` varchar(200) NOT NULL,
  `STATUS` int(1) NOT NULL,
  PRIMARY KEY (`KODE_REPORT_RESTORAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_restoran`
--

INSERT INTO `report_restoran` (`KODE_REPORT_RESTORAN`, `TANGGAL_REPORT`, `WAKTU_REPORT`, `KODE_USER`, `KODE_RESTORAN`, `ALASAN`, `KETERANGAN`, `STATUS`) VALUES
('TR001', '2016-10-18', '00:00:00', 'US003', 'RS001', 'PELAYANAN MINIM SEKALI', '', 1),
('TR002', '2016-10-18', '00:00:00', 'US001', 'RS002', 'PESANAN DICANCEL TANPA PERSETUJUHAN', '', 1),
('TR003', '2016-10-18', '00:00:00', 'US001', 'RS003', 'PLAGIAT JADE IMPERIAL', '', 1),
('TR004', '2016-10-18', '00:00:00', 'US001', 'RS004', 'PESAN BURGER DELUXE YANG DATENG BIG MAC', '', 1),
('TR005', '2016-10-21', '11:00:00', 'US006', 'RS009', 'HATI HATI YANG JUALAN TERORIS', '', 1),
('TR006', '2016-10-22', '12:00:00', 'US008', 'RS007', 'RESTORAN MACAM APA INI KOK GELAP BANGET', '', 1),
('TR007', '2016-10-23', '12:00:00', 'US009', 'RS001', 'TERNYATA RESTORANNYA GUA BENERAN', '', 1),
('TR008', '2016-10-24', '11:00:00', 'US002', 'RS002', 'TIDAK ADA MENU CAFE SAMA SEKALI', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report_review_menu`
--

CREATE TABLE IF NOT EXISTS `report_review_menu` (
  `KODE_REVIEW` varchar(5) NOT NULL,
  `KODE_USER` varchar(5) NOT NULL,
  `DESKRIPSI` varchar(100) NOT NULL,
  `TANGGAL` date NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_REVIEW`,`KODE_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_review_menu`
--

INSERT INTO `report_review_menu` (`KODE_REVIEW`, `KODE_USER`, `DESKRIPSI`, `TANGGAL`, `STATUS`) VALUES
('RE002', 'US012', 'asdsad', '2016-11-23', '1'),
('RE010', 'US012', 'test', '2016-11-23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `report_user`
--

CREATE TABLE IF NOT EXISTS `report_user` (
  `KODE_REPORT_USER` varchar(5) NOT NULL,
  `KODE_USER_REPORTING` varchar(5) NOT NULL,
  `KODE_USER_REPORTED` varchar(5) NOT NULL,
  `ALASAN` varchar(200) NOT NULL,
  `KETERANGAN` varchar(200) NOT NULL,
  `STATUS` int(1) NOT NULL,
  PRIMARY KEY (`KODE_REPORT_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_user`
--

INSERT INTO `report_user` (`KODE_REPORT_USER`, `KODE_USER_REPORTING`, `KODE_USER_REPORTED`, `ALASAN`, `KETERANGAN`, `STATUS`) VALUES
('TU001', 'US001', 'US002', 'REVIEW YANG KURANG BERMUTU', '', 1),
('TU002', 'US002', 'US001', 'MENGGUNAKAN KATA-KATA KASAR PADA REVIEW MENU', '', 1),
('TU003', 'US003', 'US001', 'ISENG', '', 1),
('TU004', 'US002', 'US003', 'MENGUPLOAD FOTO YANG TIDAK SESUAI', '', 1),
('TU005', 'US004', 'US005', 'SPAM REVIEW', '', 1),
('TU006', 'US005', 'US006', 'BAD WORDS', '', 1),
('TU007', 'US006', 'US007', 'REVIEW YANG TIDAK BERMUTU', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE IF NOT EXISTS `restoran` (
  `KODE_RESTORAN` varchar(5) NOT NULL,
  `KODE_USER` varchar(5) NOT NULL,
  `NAMA_RESTORAN` varchar(20) NOT NULL,
  `ALAMAT_RESTORAN` varchar(50) NOT NULL,
  `NO_TELEPON_RESTORAN` int(9) NOT NULL,
  `JAM_BUKA_RESTORAN` time NOT NULL,
  `HARI_BUKA_RESTORAN` varchar(20) NOT NULL,
  `STATUS_RESTORAN` int(1) NOT NULL,
  `DESKRIPSI_RESTORAN` varchar(50) NOT NULL,
  `JUMLAH_PERINGATAN_RESTORAN` int(4) NOT NULL,
  `URL_FOTO_RESTORAN` varchar(255) NOT NULL,
  `KETERANGAN_RESTORAN` varchar(50) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_RESTORAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`KODE_RESTORAN`, `KODE_USER`, `NAMA_RESTORAN`, `ALAMAT_RESTORAN`, `NO_TELEPON_RESTORAN`, `JAM_BUKA_RESTORAN`, `HARI_BUKA_RESTORAN`, `STATUS_RESTORAN`, `DESKRIPSI_RESTORAN`, `JUMLAH_PERINGATAN_RESTORAN`, `URL_FOTO_RESTORAN`, `KETERANGAN_RESTORAN`, `STATUS`) VALUES
('RS001', 'US003', 'RESTOGUA', 'JALAN NGAGEL JAYA UTARA NO 23 SURABAYA', 31223453, '10:00:00', 'SENIN-SABTU', 0, 'RESTOGUA LENGKAP ENAK DAN HARGA TERJANGKAU', 0, '', '', '1'),
('RS002', 'US003', 'BONKAFE', 'JALAN KERTAJAYA NO 40 SURABAYA', 31493775, '09:30:00', 'SENIN-SABTU', 0, 'BONKAFE RESTORANT DENGAN MENU WESTERN ', 0, 'RS002.jpg', 'RESTORANT WESTERN ', '1'),
('RS003', 'US003', 'MING IMPERIAL', 'JALAN JEMURSARI I NO 12', 34463478, '09:00:00', 'SENIN-MINGGU', 0, 'MAKANAN CHINESE YANG ENAK', 0, '', 'CHINESE FOOD', '1'),
('RS004', 'US003', 'KFC', 'BONNET SURABAYA', 3114022, '08:00:00', 'SENIN-MINGGU', 1, 'JAGONYA AYAM!!', 0, '', '', '1'),
('RS005', 'US010', 'MADAGASCAR', 'JALAN MADAGASCAR 11/AC', 87855421, '10:00:00', 'SENIN-SABTU', 1, 'MAKANAN KHAS HUTAN', 0, '', '', '1'),
('RS006', 'US010', 'BORN FREE', 'JALAN JONBOVI 22/CA', 87855422, '10:30:00', 'SENIN-SABTU', 1, 'LET YOUR DREAM BE DREAMS', 0, '', '', '1'),
('RS007', 'US010', 'THE DARK SIDE', 'JALAN AEROSMILTH 100/BA', 78913255, '18:00:00', 'SENIN-MINGGU', 1, 'RESTORAN UNIK', 0, '', '', '1'),
('RS008', 'US010', 'SUSHI TEH', 'JALAN GALAKSI BUMI 6', 81991774, '10:00:00', 'SENIN-MINGGU', 1, 'SUSHI CUISINE', 0, '', '', '1'),
('RS009', 'US010', 'BABARAFI', 'JALAN TEGALSARI 88', 81551531, '10:00:00', 'SENIN-SABTU', 1, 'MAKANAN KHAS TIMUR TENGAH', 0, '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `review_menu`
--

CREATE TABLE IF NOT EXISTS `review_menu` (
  `KODE_REVIEW` varchar(5) NOT NULL,
  `KODE_USER` varchar(5) NOT NULL,
  `KODE_MENU` varchar(5) NOT NULL,
  `DESKRIPSI_REVIEW` varchar(100) NOT NULL,
  `TANGGAL_REVIEW` date NOT NULL,
  `JUMLAH_LIKE_REVIEW` int(4) NOT NULL,
  `KETERANGAN_REVIEW` varchar(100) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_REVIEW`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_menu`
--

INSERT INTO `review_menu` (`KODE_REVIEW`, `KODE_USER`, `KODE_MENU`, `DESKRIPSI_REVIEW`, `TANGGAL_REVIEW`, `JUMLAH_LIKE_REVIEW`, `KETERANGAN_REVIEW`, `STATUS`) VALUES
('RE001', 'US002', 'ME001', 'WENAKKKK!!!', '2016-10-12', 12, '', '1'),
('RE002', 'US002', 'ME004', 'STEAKNYA ENAK !!! DAGINGNYA EMPUK', '2016-09-07', 17, '', '1'),
('RE003', 'US002', 'ME007', 'SAOS LEMONNYA ENAK , AYAMNYA EMPUK', '2016-09-11', 14, '', '1'),
('RE004', 'US004', 'ME010', 'RASANYA MENGGUGAH SELERA', '2016-09-28', 14, '', '1'),
('RE005', 'US006', 'ME012', 'RASANYA DETAIL BANGET, BIJINYA AJA SAMPE KERASA', '2016-09-30', 2, '', '1'),
('RE006', 'US003', 'ME018', 'asd', '2016-11-08', 0, '', '1'),
('RE007', 'US001', 'ME001', 'asd', '2016-11-08', 0, '', '1'),
('RE008', 'US001', 'ME002', 'asd', '2016-11-08', 0, '', '1'),
('RE009', 'US002', 'ME015', '', '2016-11-14', 0, '', '1'),
('RE010', 'US012', 'ME004', 'sirloinnya mantap jaya gan. Sumpah enaksssssss', '2016-11-16', 0, '', '1'),
('RE011', 'US012', 'ME018', 'haha goood then brosss', '2016-11-17', 0, '', '1'),
('RE012', 'US012', 'ME005', 'wew kok ngeri geney', '2016-11-20', 0, '', '1'),
('RE013', 'US012', 'ME011', 'cct', '2016-11-23', 0, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `review_restoran`
--

CREATE TABLE IF NOT EXISTS `review_restoran` (
  `KODE_REVIEW_RESTORAN` varchar(5) NOT NULL,
  `KODE_RESTORAN` varchar(5) NOT NULL,
  `KODE_USER` varchar(5) NOT NULL,
  `DESKRIPSI_REVIEW_RESTORAN` varchar(200) NOT NULL,
  `TANGGAL_REVIEW_RESTORAN` date NOT NULL,
  `JUMLAH_LIKE_REVIEW_RESTORAN` int(3) NOT NULL,
  `KETERANGAN_REVIEW_RESTORAN` varchar(100) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_REVIEW_RESTORAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_restoran`
--

INSERT INTO `review_restoran` (`KODE_REVIEW_RESTORAN`, `KODE_RESTORAN`, `KODE_USER`, `DESKRIPSI_REVIEW_RESTORAN`, `TANGGAL_REVIEW_RESTORAN`, `JUMLAH_LIKE_REVIEW_RESTORAN`, `KETERANGAN_REVIEW_RESTORAN`, `STATUS`) VALUES
('RR001', 'RS001', 'US002', 'NYAMAN DINGIN', '2016-10-12', 12, '0', '1'),
('RR002', 'RS002', 'US002', 'TEMPATNYA NYAMAN , FASILITASNYA BAGUS', '2016-09-08', 42, '', '1'),
('RR003', 'RS003', 'US002', 'TEMPATNYA BAGUS , PELAYANANNYA MAKSIMAL , NUANSANYA ORIENTAL DAN MEWAH', '2016-09-11', 46, '', '1'),
('RR004', 'RS007', 'US005', 'TEMPATNYA GELAP, SAYA MENDAPATKAN PRIVASI LEBIH', '2016-10-10', 46, '', '1'),
('RR005', 'RS010', 'US006', 'TEMPATNYA STRATEGIS, HARGA NYAMAN DI KANTONG', '2016-10-06', 11, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_promo`
--

CREATE TABLE IF NOT EXISTS `sponsor_promo` (
  `KODE_PROMO` varchar(5) NOT NULL,
  `KODE_KARTU_KREDIT` varchar(5) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_PROMO`,`KODE_KARTU_KREDIT`),
  KEY `KODE_KARTU_KREDIT` (`KODE_KARTU_KREDIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor_promo`
--

INSERT INTO `sponsor_promo` (`KODE_PROMO`, `KODE_KARTU_KREDIT`, `STATUS`) VALUES
('PR001', 'KKK01', '1'),
('PR001', 'KKK02', '1'),
('PR002', 'KKK03', '1'),
('PR002', 'KKK04', '1'),
('PR004', 'KKK05', '1'),
('PR005', 'KKK10', '1'),
('PR006', 'KKK09', '1'),
('PR007', 'KKK07', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kartu`
--

CREATE TABLE IF NOT EXISTS `tipe_kartu` (
  `KODE_JENIS_KARTUKREDIT` varchar(5) NOT NULL,
  `KODE_KARTU_KREDIT` varchar(5) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_JENIS_KARTUKREDIT`,`KODE_KARTU_KREDIT`),
  KEY `KODE_KARTU_KREDIT` (`KODE_KARTU_KREDIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_kartu`
--

INSERT INTO `tipe_kartu` (`KODE_JENIS_KARTUKREDIT`, `KODE_KARTU_KREDIT`, `STATUS`) VALUES
('JKK01', 'KKK01', '1'),
('JKK01', 'KKK07', '1'),
('JKK02', 'KKK02', '1'),
('JKK02', 'KKK04', '1'),
('JKK02', 'KKK10', '1'),
('JKK03', 'KKK03', '1'),
('JKK04', 'KKK04', '1'),
('JKK05', 'KKK05', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_promo`
--

CREATE TABLE IF NOT EXISTS `tipe_promo` (
  `KODE_JENISMENU` varchar(5) NOT NULL,
  `KODE_PROMO` varchar(5) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_JENISMENU`,`KODE_PROMO`),
  KEY `KODE_PROMO` (`KODE_PROMO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_promo`
--

INSERT INTO `tipe_promo` (`KODE_JENISMENU`, `KODE_PROMO`, `STATUS`) VALUES
('JM001', 'PR001', '1'),
('JM001', 'PR002', '1'),
('JM001', 'PR006', '1'),
('JM002', 'PR006', '1'),
('JM002', 'PR008', '1'),
('JM004', 'PR007', '1');

-- --------------------------------------------------------

--
-- Table structure for table `upload_foto_menu`
--

CREATE TABLE IF NOT EXISTS `upload_foto_menu` (
  `KODE_UPLOAD` varchar(5) NOT NULL,
  `KODE_USER` varchar(5) NOT NULL,
  `KODE_MENU` varchar(5) NOT NULL,
  `URL_UPLOAD` varchar(200) NOT NULL,
  `KETERANGAN` varchar(200) NOT NULL,
  `STATUS` int(1) NOT NULL,
  PRIMARY KEY (`KODE_UPLOAD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_foto_menu`
--

INSERT INTO `upload_foto_menu` (`KODE_UPLOAD`, `KODE_USER`, `KODE_MENU`, `URL_UPLOAD`, `KETERANGAN`, `STATUS`) VALUES
('UF001', 'US012', 'ME004', '11.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `KODE_USER` varchar(5) NOT NULL,
  `KODE_JENISUSER` varchar(5) NOT NULL,
  `NAMA_USER` varchar(20) NOT NULL,
  `ALAMAT_USER` varchar(50) NOT NULL,
  `NOR_TELEPON_USER` varchar(12) NOT NULL,
  `TANGGAL_LAHIR_USER` date NOT NULL,
  `TANGGAL_REGISTER_USER` date NOT NULL,
  `TANGGAL_LOGIN_USER` date NOT NULL,
  `KODE_POS_USER` int(5) NOT NULL,
  `EMAIL_USER` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `JUMLAH_REPORT_USER` int(4) NOT NULL,
  `URL_FOTO` varchar(255) NOT NULL,
  `KETERANGAN_USER` varchar(50) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  PRIMARY KEY (`KODE_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`KODE_USER`, `KODE_JENISUSER`, `NAMA_USER`, `ALAMAT_USER`, `NOR_TELEPON_USER`, `TANGGAL_LAHIR_USER`, `TANGGAL_REGISTER_USER`, `TANGGAL_LOGIN_USER`, `KODE_POS_USER`, `EMAIL_USER`, `PASSWORD`, `JUMLAH_REPORT_USER`, `URL_FOTO`, `KETERANGAN_USER`, `STATUS`) VALUES
('US001', 'JU002', 'ARDI UNTUNG', 'JL. KEPALA GADING 20', '891113641', '1996-04-11', '2016-10-14', '2016-10-18', 60115, 'untungsayaardi@gmail', '0', 0, '', '', '1'),
('US002', 'JU002', 'HENDY ZAG', 'JL. PANTAI GADING NOMOR 99', '87851333', '1995-04-11', '2016-10-15', '2016-10-18', 78001, 'zipzap@gmail.com', '1', 0, '', '', '1'),
('US003', 'JU003', 'Jason Elian', 'jl Kepanjen no 108', '1111', '2016-10-12', '2016-10-16', '2016-10-18', 874651, 'jason.alien@gmail.com', '0', 0, '', '', '1'),
('US004', 'JU001', 'ADMINISTRATOR', '', '', '0000-00-00', '2016-10-16', '2016-11-15', 0, 'administrator', 'administrator', 0, '', '', '1'),
('US005', 'JU002', 'HENDY ZAGG', 'JL. PANTAI GADING NOMOR 99', '87851333', '1995-04-11', '2016-10-17', '0000-00-00', 78001, 'zipzapa@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0, '', 'test', '1'),
('US006', 'JU004', 'GREGORIAN', 'JL. KALIJUDAN 144', '08785300', '1996-01-30', '2016-10-25', '0000-00-00', 60113, 'gregorian@gmail.com', '123', 0, '', '', '1'),
('US007', 'JU005', 'KELVIANTO', 'JL. DR SOETOMO IIIA', '08155049', '1996-11-11', '2016-10-17', '0000-00-00', 60112, 'kelvianto@yahoo.com', '321', 0, '', '', '1'),
('US008', 'JU004', 'MICHAEL RUSADI', 'JL. DR ARIFRAHMAND 74C', '08149931', '1996-08-01', '2016-10-22', '0000-00-00', 60116, 'mican@yahoo.com', '333', 0, '', '', '1'),
('US009', 'JU001', 'DAVID', 'JL. PLOSO TIMUR IVA/3', '3895301', '1995-12-10', '2016-10-19', '0000-00-00', 60115, 'david555@gmail.com', '222', 0, '', '', '1'),
('US010', 'JU003', 'KING JULIAN', 'JL. MADAGASCAR 96', '7783540', '1996-07-09', '2016-05-16', '0000-00-00', 60119, 'iliketomoveit@gmail.com', '111', 0, '', '', '1'),
('US011', 'JU002', 'cobacoba', ' ', '0123123123', '2016-11-22', '0000-00-00', '0000-00-00', 0, 'a@a.com', '1', 0, '', '', '1'),
('US012', 'JU002', 'Hendy Lukas', ' ', '082332515552', '2016-11-16', '0000-00-00', '0000-00-00', 0, 'hendylukas68@gmail.com', 'lukas123', 0, 'US012.jpg', '', '1'),
('US013', 'JU002', 'hendy lukassssse', ' ', '082332515552', '2016-11-11', '0000-00-00', '0000-00-00', 0, 'hendylukas69@gmail.com', 'lukas123', 0, '', '', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kartu_kredit_user`
--
ALTER TABLE `kartu_kredit_user`
  ADD CONSTRAINT `kartu_kredit_user_ibfk_1` FOREIGN KEY (`Kode_Kartu_Kredit`) REFERENCES `kartu_kredit` (`KODE_KARTU_KREDIT`),
  ADD CONSTRAINT `kartu_kredit_user_ibfk_2` FOREIGN KEY (`KODE_USER`) REFERENCES `user` (`KODE_USER`);

--
-- Constraints for table `like_review_user`
--
ALTER TABLE `like_review_user`
  ADD CONSTRAINT `like_review_user_ibfk_1` FOREIGN KEY (`KODE_USER`) REFERENCES `user` (`KODE_USER`),
  ADD CONSTRAINT `like_review_user_ibfk_2` FOREIGN KEY (`KODE_REVIEW`) REFERENCES `review_menu` (`KODE_REVIEW`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`KODE_JENIS_MENU`) REFERENCES `jenis_menu` (`KODE_JENISMENU`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`KODE_RESTORAN`) REFERENCES `restoran` (`KODE_RESTORAN`);

--
-- Constraints for table `promo_restoran`
--
ALTER TABLE `promo_restoran`
  ADD CONSTRAINT `promo_restoran_ibfk_1` FOREIGN KEY (`KODE_RESTORAN`) REFERENCES `restoran` (`KODE_RESTORAN`),
  ADD CONSTRAINT `promo_restoran_ibfk_2` FOREIGN KEY (`KODE_PROMO`) REFERENCES `promo` (`KODE_PROMO`);

--
-- Constraints for table `rating_menu`
--
ALTER TABLE `rating_menu`
  ADD CONSTRAINT `rating_menu_ibfk_1` FOREIGN KEY (`KODE_MENU`) REFERENCES `menu` (`KODE_MENU`),
  ADD CONSTRAINT `rating_menu_ibfk_2` FOREIGN KEY (`KODE_USER`) REFERENCES `user` (`KODE_USER`);

--
-- Constraints for table `rating_restoran`
--
ALTER TABLE `rating_restoran`
  ADD CONSTRAINT `rating_restoran_ibfk_1` FOREIGN KEY (`KODE_USER`) REFERENCES `user` (`KODE_USER`),
  ADD CONSTRAINT `rating_restoran_ibfk_2` FOREIGN KEY (`KODE_RESTORAN`) REFERENCES `restoran` (`KODE_RESTORAN`);

--
-- Constraints for table `sponsor_promo`
--
ALTER TABLE `sponsor_promo`
  ADD CONSTRAINT `sponsor_promo_ibfk_1` FOREIGN KEY (`KODE_PROMO`) REFERENCES `promo` (`KODE_PROMO`),
  ADD CONSTRAINT `sponsor_promo_ibfk_2` FOREIGN KEY (`KODE_KARTU_KREDIT`) REFERENCES `kartu_kredit` (`KODE_KARTU_KREDIT`);

--
-- Constraints for table `tipe_kartu`
--
ALTER TABLE `tipe_kartu`
  ADD CONSTRAINT `tipe_kartu_ibfk_1` FOREIGN KEY (`KODE_JENIS_KARTUKREDIT`) REFERENCES `jenis_kartu_kredit` (`KODE_JENIS_KARTUKREDIT`),
  ADD CONSTRAINT `tipe_kartu_ibfk_2` FOREIGN KEY (`KODE_KARTU_KREDIT`) REFERENCES `kartu_kredit` (`KODE_KARTU_KREDIT`);

--
-- Constraints for table `tipe_promo`
--
ALTER TABLE `tipe_promo`
  ADD CONSTRAINT `tipe_promo_ibfk_1` FOREIGN KEY (`KODE_JENISMENU`) REFERENCES `jenis_menu` (`KODE_JENISMENU`),
  ADD CONSTRAINT `tipe_promo_ibfk_2` FOREIGN KEY (`KODE_PROMO`) REFERENCES `promo` (`KODE_PROMO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
