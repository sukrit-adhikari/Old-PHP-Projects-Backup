-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 06:34 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chatroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `cr_name` varchar(100) NOT NULL,
  `dat` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender`, `message`, `cr_name`, `dat`) VALUES
(1, 'shanta', 'sukrittimrokhabarkechha', '', '2014-03-02 11:48:57'),
(2, 'sukrit', 'k ho', '', '2014-03-02 11:49:15'),
(3, 'sukrit', 'chito type chito', '', '2014-03-02 11:49:51'),
(4, 'shanta', 'khabar sodhe ko', '', '2014-03-02 11:49:58'),
(5, 'sukrit', 'halo', '', '2014-03-06 15:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cr_names`
--

CREATE TABLE IF NOT EXISTS `tbl_cr_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cr_name` varchar(100) NOT NULL,
  `no_of_members` int(4) NOT NULL,
  `last_used` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ots`
--

CREATE TABLE IF NOT EXISTS `tbl_ots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `ots` int(11) NOT NULL,
  `cr_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_ots`
--

INSERT INTO `tbl_ots` (`id`, `username`, `ots`, `cr_name`) VALUES
(1, 'sukrit', 1394116094, ''),
(2, 'beta', 1389405371, ''),
(3, 'theta', 1334643709, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tts`
--

CREATE TABLE IF NOT EXISTS `tbl_tts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `tts` int(11) NOT NULL,
  `cr_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_tts`
--

INSERT INTO `tbl_tts` (`id`, `username`, `tts`, `cr_name`) VALUES
(1, 'sukrit', 1334750551, ''),
(2, 'beta', 1389405347, ''),
(3, 'theta', 1332993665, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_user_profile`
--

INSERT INTO `tbl_user_profile` (`id`, `username`, `password`) VALUES
(1, 'sukrit', '111'),
(2, 'beta', '111'),
(3, 'theta', '111'),
(4, 'shanta', 'shanta');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
