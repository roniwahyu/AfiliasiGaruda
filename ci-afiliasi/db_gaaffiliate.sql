-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2013 at 01:21 PM
-- Server version: 5.5.9
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_gaaffiliate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `idbank` int(11) NOT NULL AUTO_INCREMENT,
  `namabank` varchar(255) NOT NULL,
  `kodebank` varchar(10) NOT NULL,
  `isactive` varchar(10) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idbank`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` VALUES(1, 'BANK INDONESIA', '001', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(2, 'PT. BANK RAKYAT INDONESIA (Persero) Tbk', '002', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(3, 'PT. BANK EKSPOR INDONESIA (PERSERO)', '003', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(4, 'PT. BANK MANDIRI (PERSERO) Tbk.', '008', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(5, 'PT. BANK NEGARA INDONESIA 1946 (Persero) Tbk.', '009', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(6, 'BNI SYARIAH', '009', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(7, 'PT. BANK DANAMON INDONESIA INDONESIA Tbk', '011', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(8, 'PT. BANK PERMATA Tbk.', '013', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(9, 'PT. BANK CENTRAL ASIA Tbk.', '014', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(10, 'PT. BANK INTERNATIONAL INDONESIA Tbk.', '016', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(11, 'PT. BANK PAN INDONESIA Tbk. / PT. PANIN BANK Tbk.', '019', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(12, 'PT. BANK NIAGA Tbk.', '022', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(13, 'PT. BANK UOB BUANA, Tbk', '023', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(14, 'PT. LIPPO BANK', '026', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(15, 'PT. BANK NILAI INTI SARI PENJIMPAN Tbk.', '028', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(16, 'AMERICAN EXPRESS BANK LTD.', '030', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(17, 'CITIBANK NA', '031', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(18, 'JPMORGAN CHASE BANK, NA', '032', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(19, 'BANK OF AMERICA , NA', '033', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(20, 'PT. BANK MULTICOR / PT. BANK WINDU KENTJANA INTERNASIONAL', '036', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(21, 'PT. BANK ARTHA GRAHA INTERNASIONAL, Tbk', '037', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(22, 'THE BANGKOK BANK PCL', '040', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(23, 'THE HONGKONG and SHANGHAI BANKING CORP', '041', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(24, 'THE BANK OF TOKYO MITSUBISHI UFJ LTD.', '042', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(25, 'PT. BANK SUMITOMO MITSUI INDONESIA', '045', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(26, 'PT. BANK DBS INDONESIA', '046', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(27, 'PT. BANK RESONA PERDANIA', '047', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(28, 'PT. BANK MIZUHO INDONESIA', '048', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(29, 'STANDARD CHARTERED BANK', '050', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(30, 'ALGEMENE BANK NEDERLAND AMRO BANK N.V. / ABN AMRO BANK NV.', '052', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(31, 'PT. BANK CAPITAL INDONESIA', '054', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(32, 'PT. BANK BNP PARIBAS INDONESIA', '057', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(33, 'PT. BANK UOB INDONESIA', '058', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(34, 'KOREA EXCHANGE BANK DANAMON / PT. BANK KEB INDONESIA', '059', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(35, 'PT. BANK RABOBANK INTERNATIONAL INDONESIA', '060', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(36, 'PT. ANZ PANIN BANK', '061', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(37, 'DEUTSCHE BANK AG', '067', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(38, 'PT. BANK WOORI INDONESIA', '068', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(39, 'BANK OF CHINA LIMITED', '069', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(40, 'PT. BANK BUMI ARTA', '076', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(41, 'PT. BANK EKONOMI RAHARJA', '087', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(42, 'PT. BANK ANTAR DAERAH', '088', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(43, 'PT. HAGABANK INDONESIA / PT. BANK HAGA', '089', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(44, 'PT. BANK IFI', '093', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(45, 'PT. BANK CENTURY Tbk.', '095', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(46, 'BANK MAYAPADA INTERNATIONAL / PT. BANK MAYAPADA Tbk.', '097', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(47, 'PT. BANK PEMBANGUNAN DAERAH JAWA BARAT / PT. BANK PEMBANGUNAN DAERAH JABAR DAN BANTEN', '110', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(48, 'PT. BANK PEMBANGUNAN DAERAH DKI JAKARTA / BANK DKI', '111', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(49, 'PT. BANK PEMBANGUNAN DAERAH DIY / YOGYAKARTA', '112', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(50, 'PT. BANK PEMBANGUNAN DAERAH JAWA TENGAH', '113', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(51, 'PT. BANK PEMBANGUNAN DAERAH JATIM', '114', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(52, 'PT. BANK PEMBANGUNAN DAERAH JAMBI', '115', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(53, 'PT. BPD ISTIMEWA ACEH', '116', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(54, 'PT. BANK PEMBANGUNAN DAERAH SUMUT', '117', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(55, 'PT. BANK PEMBANGUNAN DAERAH SUMATERA BARAT / PT. BANK NAGARI', '118', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(56, 'PT. BANK PEMBANGUNAN DAERAH RIAU', '119', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(57, 'PT. BANK PEMBANGUNAN DAERAH SUMATERA SELATAN', '120', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(58, 'PT. BANK PEMBANGUNAN DAERAH LAMPUNG', '121', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(59, 'PT. BANK PEMBANGUNAN DAERAH KALIMANTAN SELATAN', '122', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(60, 'PT. BANK PEMBANGUNAN DAERAH KALIMANTAN BARAT', '123', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(61, 'PT. BANK PEMBANGUNAN DAERAH KALIMANTAN TIMUR', '124', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(62, 'PT. BANK PEMBANGUNAN DAERAH KALTENG', '125', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(63, 'PT. BANK PEMBANGUNAN DAERAH SULAWESI SELATAN', '126', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(64, 'PT. BANK PEMBANGUNAN DAERAH SULAWESI UTARA', '127', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(65, 'PT. BANK PEMBANGUNAN DAERAH NTB / NUSA TENGGARA BARAT', '128', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(66, 'PT. BANK PEMBANGUNAN DAERAH BALI', '129', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(67, 'BANK PEMBANGUNAN DAERAH NUSA TENGGARA TIMUR', '130', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(68, 'PT. BANK PEMBANGUNAN DAERAH MALUKU', '131', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(69, 'PT. BANK PEMBANGUNAN DAERAH PAPUA', '132', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(70, 'PT. BPD BENGKULU', '133', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(71, 'PT. BANK PEMBANGUNAN DAERAH SULAWESI TENGAH', '134', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(72, 'PT. BANK PEMBANGUNAN DAERAH SULAWESI TENGGARA', '135', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(73, 'PT. BANK NUSANTARA PARAHYANGAN', '145', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(74, 'PT. BANK SWADESI Tbk.', '146', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(75, 'BANK MUAMALAT INDONESIA / PT. BANK MUAMALAT INDONESIA', '147', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(76, 'PT. BANK MESTIKA DHARMA', '151', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(77, 'PT. BANK METRO EKSPRESS', '152', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(78, 'PT. BANK SINARMAS', '153', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(79, 'PT. BANK MASPION INDONESIA', '157', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(80, 'PT. BANK HAGAKITA', '159', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(81, 'PT. BANK GANESHA', '161', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(82, 'PT.HALIM INDONESIA BANK / PT. BANK HALIM INDONESIA / PT. BANK ICBC INDONESIA', '164', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(83, 'PT. BANK HARMONI INTERNASIONAL', '166', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(84, 'PT. BANK KESAWAN', '167', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(85, 'PT. BANK TABUNGAN NEGARA (Persero) / PT. BANK TABUNGAN NEGARA (PERSERO) SYARIAH', '200', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(86, 'PT. BANK HS 1906 / PT. Bank Himpunan Saudara', '212', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(87, 'B.T. PENSIUNAN NASIONAL / PT. BANK BTPN / PT. BANK TABUNGAN PENSIUNAN NASIONAL', '213', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(88, 'PT. BANK SWAGUNA', '405', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(89, 'PT. BANK JASA ARTA', '422', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(90, 'PT. BANK MEGA Tbk.', '426', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(91, 'PT. BANK UMUM KOPERASI INDONESIA (BUKOPIN) / PT. BANK BUKOPIN Tbk.', '441', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(92, 'PT. BANK SYARIAH MANDIRI Tbk.', '451', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(93, 'PT. BANK BISNIS INTERNATIONAL', '459', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(94, 'PT. BANK SRI PARTHA', '466', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(95, 'PT. BANK JASA JAKARTA', '472', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(96, 'PT. BANK BINTANG MANUNGGAL / PT. BANK HANA', '484', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(97, 'PT. BANK BUMI PUTERA Tbk.', '485', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(98, 'PT. BANK YUDHA BHAKTI', '490', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(99, 'PT. BANK MITRANIAGA', '491', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(100, 'PT. AGRONIAGA BANK', '494', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(101, 'PT. BANK INDOMONEX', '498', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(102, 'PT. BANK ROYAL INDONESIA', '501', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(103, 'ALFINDO SEJAHTERA BANK / PT. BANK ALFINDO', '503', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(104, 'PT. BANK SYARIAH MEGA INDONESIA', '506', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(105, 'PT. BANK INA PERDANA', '513', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(106, 'PT. BANK HARFA', '517', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(107, 'PT. PRIMA MASTER BANK', '520', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(108, 'PT. BANK PERSYARIKATAN INDONESIA', '521', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(109, 'PT. BANK DIPO INTERNATIONAL', '523', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(110, 'PT. BANK AKITA', '525', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(111, 'PT. BANK LIMAN INTERNATIONAL', '526', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(112, 'PT. ANGLOMAS INTERNATIONAL BANK', '531', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(113, 'PT. BANK KESEJAHTERAAN EKONOMI', '535', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(114, 'PT. BANK UIB', '536', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(115, 'PT. BANK ARTOS INDONESIA', '542', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(116, 'PT. BANK PURBA DANARTA', '547', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(117, 'PT. BANK MULTIARTA SENTOSA', '548', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(118, 'PT. BANK MAYORA INDONESIA', '553', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(119, 'PT. BANK INDEX SELINDO', '555', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(120, 'PT. BANK EKSEKUTIF INTERNASIONAL', '558', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(121, 'PT. CENTRATAMA NASIONAL BANK', '559', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(122, 'PT. BANK FAMA INTERNATIONAL', '562', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(123, 'PT. BANK SINAR HARAPAN BALI', '564', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(124, 'PT. BANK VICTORIA INTERNATIONAL', '566', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(125, 'PT. BANK HARDA INTERNASIONAL', '567', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(126, 'PT. BANK FINCONESIA', '945', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(127, 'PT. BANK MAYBANK INDOCORP', '947', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(128, 'PT. BANK OCBC INDONESIA', '948', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(129, 'PT. BANK CHINATRUST INDONESIA', '949', '1', '0000-00-00 00:00:00');
INSERT INTO `bank` VALUES(130, 'PT. BANK COMMONWEALTH', '950', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `idbankacc` int(11) NOT NULL AUTO_INCREMENT,
  `idbank` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `isactive` varchar(10) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idbankacc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bank_account`
--


-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` VALUES(1, 1371104497, '::1', '278616');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `levelid` int(10) NOT NULL AUTO_INCREMENT,
  `levelname` varchar(150) DEFAULT NULL,
  `leveldesc` varchar(200) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`levelid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` VALUES(1, 'Petugas', 'Petugas', '2012-07-11 13:36:48');
INSERT INTO `level` VALUES(2, 'Kabag', 'Kepala Bagian', '2012-07-11 13:38:23');
INSERT INTO `level` VALUES(3, 'Kasubag', 'Kepala Sub Bagian', '2012-07-11 13:38:32');
INSERT INTO `level` VALUES(4, 'Askesra', 'Asisten Kesra', '2012-07-11 13:39:53');
INSERT INTO `level` VALUES(5, 'Setda', 'Sekretaris Daerah', '2012-07-11 13:39:26');
INSERT INTO `level` VALUES(6, 'Wabup', 'Wakil Bupati', '2012-07-11 13:40:00');
INSERT INTO `level` VALUES(7, 'Bupati', 'Bupati', '2012-07-11 13:40:12');
INSERT INTO `level` VALUES(8, 'Admin', 'Administrator', '2012-07-11 13:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `megamenu`
--

CREATE TABLE `megamenu` (
  `menuid` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(255) DEFAULT NULL,
  `menudesc` varchar(255) DEFAULT NULL,
  `menutitle` varchar(255) DEFAULT NULL,
  `menuurl` varchar(255) DEFAULT NULL,
  `parent` varchar(10) DEFAULT NULL,
  `isactive` int(11) DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`menuid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `megamenu`
--

INSERT INTO `megamenu` VALUES(1, 'home', 'home', 'Home', 'home', '0', 1, '0000-00-00 00:00:00');
INSERT INTO `megamenu` VALUES(2, 'main', 'main', 'Home', 'memberarea', '0', 1, '2013-06-13 09:24:28');
INSERT INTO `megamenu` VALUES(3, 'admin', 'admin', 'Home', 'admin', '0', 1, '0000-00-00 00:00:00');
INSERT INTO `megamenu` VALUES(4, 'profile', 'profile', 'Profile', 'profile', '0', 1, '2013-06-10 13:39:08');
INSERT INTO `megamenu` VALUES(5, 'edit profile', 'edit profile', 'Edit Profile', 'memberarea/pengaturan', '4', 1, '2013-06-13 09:23:31');
INSERT INTO `megamenu` VALUES(6, 'ubahpassword', 'ubah password', 'Ubah Password', 'memberarea/ubahpassword', '4', 1, '2013-06-13 09:23:24');
INSERT INTO `megamenu` VALUES(7, 'logout', 'logout', 'Logout', 'memberarea/logout', '4', 1, '2013-06-13 09:23:17');
INSERT INTO `megamenu` VALUES(8, 'Login', 'login', 'login', 'login', '0', 1, '0000-00-00 00:00:00');
INSERT INTO `megamenu` VALUES(9, 'registrasi', 'registrasi', 'Registrasi', 'registrasi', '0', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `nomorrekening` varchar(50) NOT NULL,
  `terakhirlogin` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `emailalternatif` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `hak` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` VALUES(25, '  unta', 'fdc8f5f7a0fd775b23c5da20e8899f208a65105a', '', '', '', '', '', '', '', 'unta@gmail.com', '', '203409234', 'ee33894b868b215c3457866526988643', '0', '');
INSERT INTO `member` VALUES(26, 'member', '70163be8b5a402454a0f57909e87d10bafbbd8e0', '', '', '', '', '', '', '', 'member@gmail.com', '', '0928340934', '', '1', 'member');
INSERT INTO `member` VALUES(47, 'imran', 'dd994c1afbfcf162a1c4d26e1c32ea1ae4cfd72c', 'aaaa', '', '', 'Photo0067c6a1e7ce56d3d6fa748ab6d9af3fd7.jpg', 'BRI', '', '', 'imran@gmail.com', '', '8000000', '0675716f985ac67fdb81049fdd0fed36', '1', 'member');
INSERT INTO `member` VALUES(48, 'eka', 'fdc8f5f7a0fd775b23c5da20e8899f208a65105a', '', '', '', 'Photo00642e92efb79421734881b53e1e1b18b6.jpg', '', '', '', 'ekanur@gmail.com', '', '080998098', '736dad83094607f42f3f63e6d5d799b9', '1', 'member');
INSERT INTO `member` VALUES(49, 'usro', '72e90c5e3f233277062700e6f4baec54fe9fe5a2', 'Usro bin Mail', 'Jl. Simpang Balapan 20', 'Malang', 'Photo00f457c545a9ded88f18ecee47145a72c0.png', 'BCA', '090998349837434', '', 'usro@yahoo.com', 'usro@gmail.com', '085867777888', 'ba3f10caa49d3fde8191a9697927d48e', '1', 'member');
INSERT INTO `member` VALUES(50, 'kiki', '95752f86c99f1055feba64e03924cb71f0c08315', '', '', '', 'default.jpg', '', '', '', 'kiki@gmail.com', '', '08788663773', 'edbd7b486b0f389af43fed78228942ae', '1', 'member');
INSERT INTO `member` VALUES(51, 'umar', '885c14c8838990420dee31863f52968cbcdd0996', '', '', '', 'default.jpg', '', '', '', 'umar@gmail.com', '', '32490328409', '850afc75cdc3cf55c7987607141e264a', '0', 'member');
INSERT INTO `member` VALUES(52, 'syafak', 'ce3baf8a3ffcab053646ce5f1e38ad761b8f709c', '', '', '', 'default.jpg', '', '', '', 'syafak@gmail.com', '', '0898769734', '7a4621361a3d35e09b8de30caf6b9633', '0', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `menulevel`
--

CREATE TABLE `menulevel` (
  `menulevelid` int(10) NOT NULL AUTO_INCREMENT,
  `menuid` int(10) NOT NULL,
  `roleid` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`menulevelid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `menulevel`
--

INSERT INTO `menulevel` VALUES(1, 1, 3, 'Home page', '2013-06-11 06:17:10');
INSERT INTO `menulevel` VALUES(2, 2, 2, 'Member page', '2013-06-10 13:40:07');
INSERT INTO `menulevel` VALUES(3, 3, 1, 'Admin page', '2013-06-10 13:40:27');
INSERT INTO `menulevel` VALUES(4, 4, 2, 'Edit Profile', '2013-06-10 13:40:46');
INSERT INTO `menulevel` VALUES(5, 5, 2, 'Logout member', '2013-06-10 13:41:09');
INSERT INTO `menulevel` VALUES(6, 6, 2, 'Edit Profile', '2013-06-10 14:20:08');
INSERT INTO `menulevel` VALUES(7, 7, 2, 'Change Password', '2013-06-10 14:20:04');
INSERT INTO `menulevel` VALUES(8, 9, 3, 'Registrasi', '2013-06-13 10:08:35');
INSERT INTO `menulevel` VALUES(9, 8, 3, 'Login', '2013-06-13 10:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `parent` tinyint(4) DEFAULT NULL,
  `rolename` varchar(100) NOT NULL,
  `roledesc` varchar(200) DEFAULT NULL,
  `isactive` varchar(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` VALUES(1, 0, 'administrator', 'Admininstrator', '1', '2013-06-03 08:00:58');
INSERT INTO `role` VALUES(2, 0, 'member', 'Member Affilasi', '1', '2013-06-03 08:01:30');
INSERT INTO `role` VALUES(3, 0, 'guest', 'Guest', '1', '2013-06-11 06:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `roleuserid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `parent` int(5) NOT NULL DEFAULT '0',
  `isactive` varchar(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`roleuserid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` VALUES(1, 1, 1, 0, '1', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES(2, 2, 2, 0, '1', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES(3, 3, 2, 2, '1', '2013-06-11 15:36:24');
INSERT INTO `role_user` VALUES(4, 4, 2, 2, '1', '2013-06-12 14:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_x`
--

CREATE TABLE `role_x` (
  `roleid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `parent` tinyint(4) DEFAULT NULL,
  `rolename` varchar(100) NOT NULL,
  `roledesc` varchar(200) DEFAULT NULL,
  `isactive` varchar(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `role_x`
--


-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  `datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `status`
--


-- --------------------------------------------------------

--
-- Table structure for table `trackreferal`
--

CREATE TABLE `trackreferal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `ipaddress` varchar(70) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `trackreferal`
--

INSERT INTO `trackreferal` VALUES(1, '2', 'http://localhost/ci/memberarea', '', 'desktop', 'Safari', 'Mac OS X', '2013-06-05');
INSERT INTO `trackreferal` VALUES(2, '2', 'http://localhost/ci/memberarea', '', 'Desktop', 'Safari', 'Mac OS X', '2013-06-05');
INSERT INTO `trackreferal` VALUES(3, '3', 'http://localhost/ci/memberarea', '', 'Desktop', 'Firefox', 'Mac OS X', '2013-06-05');
INSERT INTO `trackreferal` VALUES(4, '2', 'http://localhost/ci/memberarea', '', 'Desktop', 'Safari', 'Mac OS X', '2013-06-05');
INSERT INTO `trackreferal` VALUES(5, '4', 'http://localhost/ci/memberarea', '', 'Mobile', 'Safari', 'Mac OS X', '2013-06-05');
INSERT INTO `trackreferal` VALUES(6, '2', 'http://localhost/ci/memberarea', '', 'Mobile', 'Safari', 'Mac OS X', '2013-06-07');
INSERT INTO `trackreferal` VALUES(7, '3', 'http://localhost/ci/memberarea', '', 'Desktop', 'Safari', 'Mac OS X', '2013-06-08');
INSERT INTO `trackreferal` VALUES(8, '4', 'http://localhost/ci/memberarea', '', 'Desktop', 'Safari', 'Mac OS X', '2013-06-08');
INSERT INTO `trackreferal` VALUES(9, '3', 'http://localhost/ci/memberarea', '', 'Desktop', 'Safari', 'Mac OS X', '2013-06-08');
INSERT INTO `trackreferal` VALUES(10, '2', 'http://192.168.0.88/ci/memberarea', '', 'Desktop', 'Firefox', 'Windows XP', '2013-06-08');
INSERT INTO `trackreferal` VALUES(11, '2', 'http://localhost/testing/testing.php', '', 'Desktop', 'Firefox', 'Windows XP', '2013-06-08');
INSERT INTO `trackreferal` VALUES(12, '4', 'http://localhost/testing/testing.php', '', 'Desktop', 'Firefox', 'Windows XP', '2013-06-08');
INSERT INTO `trackreferal` VALUES(13, '2', 'http://localhost/testing/testing.php', '', 'Desktop', 'Firefox', 'Windows XP', '2013-06-08');
INSERT INTO `trackreferal` VALUES(14, '2', 'http://localhost/latihan/HTML%20File/', '', 'Desktop', 'Firefox', 'Windows XP', '2013-06-08');
INSERT INTO `trackreferal` VALUES(15, '2', 'http://localhost/ci/memberarea', '::1', 'Desktop', 'Safari', 'Mac OS X', '2013-06-11');
INSERT INTO `trackreferal` VALUES(16, '2', 'http://localhost/garudaaffiliate/main', '::1', 'Desktop', 'Chrome', 'Unknown Windows OS', '2013-06-13');
INSERT INTO `trackreferal` VALUES(17, '4', 'http://localhost/garudaaffiliate/main', '::1', 'Desktop', 'Internet Explorer', 'Unknown Windows OS', '2013-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `midname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `address2` varchar(150) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `postal` varchar(10) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `userlevel` tinyint(4) DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `isactive` varchar(5) NOT NULL,
  `photo` varchar(255) DEFAULT 'default.jpg',
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Administrator', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2013-06-10 09:48:32');
INSERT INTO `users` VALUES(2, 'petugas', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Afilasi', 'Garuda', 'Media', '098545', 'member@garudamedia.com', 'member@garudamedia.com', 'Jl. Watu Gong ', 'Jl.galunggung', 'Malang', 'Jatim', '64555', 'Indonesia', '2012-12-04', 0, '0', '1', 'Photo00c81e728d9d4c2f636f067f89cc14862c.png', '2013-06-13 11:59:25');
INSERT INTO `users` VALUES(3, 'faiz', '202cb962ac59075b964b07152d234b70', 'Faiz', '', 'AlQurni', '3459488', 'faiz@gmail.com', 'faizalqurni@yahoo.com', 'Sukun', '', '', '', '', '', '0000-00-00', 0, '0', '1', 'Photo00eccbc87e4b5ce2fe28308fd9f2a7baf3.png', '2013-06-13 09:09:02');
INSERT INTO `users` VALUES(4, 'ekanur', '202cb962ac59075b964b07152d234b70', 'Eka Nur', NULL, 'Ahmad Romadhoni', '09843', 'eka@gmail.com', NULL, 'Ponorogo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2013-06-13 08:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `levelid` int(10) NOT NULL AUTO_INCREMENT,
  `levelname` varchar(150) DEFAULT NULL,
  `leveldesc` varchar(200) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`levelid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_level`
--

