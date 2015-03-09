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
-- Database: `lstest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main`
--

CREATE TABLE IF NOT EXISTS `tbl_main` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `samuha` enum('1','2','3','4','5','6','7') NOT NULL,
  `day` enum('1','2','3','4','5','6','7') NOT NULL,
  `fll` float NOT NULL,
  `ful` float NOT NULL,
  `sll` float NOT NULL,
  `sul` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=470 ;

--
-- Dumping data for table `tbl_main`
--

INSERT INTO `tbl_main` (`id`, `samuha`, `day`, `fll`, `ful`, `sll`, `sul`) VALUES
(1, '1', '1', 3, 9, 13, 19),
(2, '1', '2', 10, 17, 20, 1),
(3, '1', '3', 8, 14, 18, 24),
(4, '1', '4', 9, 15, 19, 1),
(5, '1', '5', 6, 13, 17, 22),
(6, '1', '6', 4, 11, 15, 20),
(7, '1', '7', 4, 10, 14, 20),
(469, '7', '7', 3, 9, 13, 19),
(468, '7', '6', 4, 10, 14, 20),
(467, '7', '5', 4, 11, 15, 20),
(466, '7', '4', 6, 13, 17, 22),
(465, '7', '3', 9, 15, 19, 1),
(464, '7', '2', 8, 14, 18, 24),
(463, '7', '1', 10, 17, 20, 1),
(462, '6', '7', 10, 17, 20, 1),
(461, '6', '6', 3, 9, 13, 19),
(460, '6', '5', 4, 10, 14, 20),
(459, '6', '4', 4, 11, 15, 20),
(458, '6', '3', 6, 13, 17, 22),
(457, '6', '2', 9, 15, 19, 1),
(456, '6', '1', 8, 14, 18, 24),
(455, '5', '7', 8, 14, 18, 24),
(454, '5', '6', 10, 17, 20, 1),
(453, '5', '5', 3, 9, 13, 19),
(452, '5', '4', 4, 10, 14, 20),
(451, '5', '3', 4, 11, 15, 20),
(450, '5', '2', 6, 13, 17, 22),
(449, '5', '1', 9, 15, 19, 1),
(448, '4', '7', 9, 15, 19, 1),
(447, '4', '6', 8, 14, 18, 24),
(446, '4', '5', 10, 17, 20, 1),
(445, '4', '4', 3, 9, 13, 19),
(444, '4', '3', 4, 10, 14, 20),
(443, '4', '2', 4, 11, 15, 20),
(442, '4', '1', 6, 13, 17, 22),
(441, '3', '7', 6, 13, 17, 22),
(440, '3', '6', 9, 15, 19, 1),
(439, '3', '5', 8, 14, 18, 24),
(438, '3', '4', 10, 17, 20, 1),
(437, '3', '3', 3, 9, 13, 19),
(436, '3', '2', 4, 10, 14, 20),
(435, '3', '1', 4, 11, 15, 20),
(434, '2', '7', 4, 11, 15, 20),
(433, '2', '6', 6, 13, 17, 22),
(432, '2', '5', 9, 15, 19, 1),
(431, '2', '4', 8, 14, 18, 24),
(430, '2', '3', 10, 17, 20, 1),
(429, '2', '2', 3, 9, 13, 19),
(428, '2', '1', 4, 10, 14, 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
