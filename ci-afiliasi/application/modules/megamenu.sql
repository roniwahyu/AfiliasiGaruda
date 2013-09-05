-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2013 at 01:30 PM
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
INSERT INTO `megamenu` VALUES(2, 'main', 'main', 'Home', 'main', '0', 1, '2013-06-13 14:30:38');
INSERT INTO `megamenu` VALUES(3, 'admin', 'admin', 'Home', 'admin', '0', 1, '0000-00-00 00:00:00');
INSERT INTO `megamenu` VALUES(4, 'profile', 'profile', 'Profile', 'profile', '0', 1, '2013-06-10 13:39:08');
INSERT INTO `megamenu` VALUES(5, 'edit profile', 'edit profile', 'Edit Profile', 'pengaturan', '4', 1, '2013-06-13 15:22:07');
INSERT INTO `megamenu` VALUES(6, 'ubahpassword', 'ubah password', 'Ubah Password', 'profile/changepass', '4', 1, '2013-06-13 14:31:20');
INSERT INTO `megamenu` VALUES(7, 'logout', 'logout', 'Logout', 'memberarea/logout', '4', 1, '2013-06-13 09:23:17');
INSERT INTO `megamenu` VALUES(8, 'Login', 'login', 'login', 'login', '0', 1, '0000-00-00 00:00:00');
INSERT INTO `megamenu` VALUES(9, 'registrasi', 'registrasi', 'Registrasi', 'registrasi', '0', 1, '0000-00-00 00:00:00');
