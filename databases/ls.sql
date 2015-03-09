-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 06:32 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ls`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ls_data`
--

CREATE TABLE IF NOT EXISTS `tbl_ls_data` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `lsgroup` enum('1','2','3','4','5','6','7') NOT NULL,
  `day` enum('1','2','3','4','5','6','7') NOT NULL,
  `LSData` varchar(1025) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1317 ;

--
-- Dumping data for table `tbl_ls_data`
--

INSERT INTO `tbl_ls_data` (`id`, `lsgroup`, `day`, `LSData`) VALUES
(1316, '1', '7', '5.00-8.00;11.00-14.00;17.00-20.00'),
(1315, '1', '5', '7.00-10.00;13.00-16.00;19.00-22.00'),
(1314, '1', '6', '6.00-9.00;12.00-15.00;18.00-21.00'),
(1313, '1', '4', '8.00-11.00;14.00-17.00;20.00-23.00'),
(1312, '1', '3', '9.00-12.00;15.00-18.00;21.00-24.00'),
(1311, '1', '2', '7.00-11.00;16.00-21.00'),
(1310, '1', '1', '4.00-7.00;10.00-13.00;16.0-19.0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ls_visitor_tracker`
--

CREATE TABLE IF NOT EXISTS `tbl_ls_visitor_tracker` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `visit_code` varchar(20) NOT NULL,
  `visits` int(5) NOT NULL DEFAULT '0',
  `dat` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_ls_visitor_tracker`
--

INSERT INTO `tbl_ls_visitor_tracker` (`id`, `visit_code`, `visits`, `dat`) VALUES
(1, '20130706110120710', 10, '2013-07-08 09:02:08'),
(2, '20130818063950141', 17, '2013-08-20 18:06:31'),
(3, '20131031070735964', 4, '2013-12-01 08:09:11'),
(4, '20131205081842759', 11, '2013-12-31 17:13:48'),
(5, '20131205135012983', 1, '2013-12-05 13:50:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
