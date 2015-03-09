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
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_likes`
--

CREATE TABLE IF NOT EXISTS `tbl_likes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `liker` varchar(50) NOT NULL,
  `questionorreplyid` int(11) NOT NULL,
  `questionorreply` enum('question','reply') NOT NULL,
  `vacant2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE IF NOT EXISTS `tbl_messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `message` mediumtext NOT NULL,
  `sender` varchar(25) NOT NULL,
  `receiver` varchar(25) NOT NULL,
  `dateandtime` datetime NOT NULL,
  `delivered` enum('yes','no') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`id`, `message`, `sender`, `receiver`, `dateandtime`, `delivered`) VALUES
(1, 'Message...Press TAB then enter for fast reply', 'sukrit_gmail', 'sukrit', '2012-01-27 03:12:02', 'yes'),
(2, 'Message...Press TAB then enter for fast reply', 'sukrit_gmail', 'sukrit', '2012-01-27 03:17:14', 'yes'),
(3, 'WikiWikiWeb was the first wiki.[6] Ward Cunningham started developing WikiWikiWeb in Portland, Oregon, in 1994, and installed it on the Internet domain c2.com [7] on March 25, 1995. It was named by Cunningham, who remembered a Honolulu International Airport counter employee telling him to take the Wiki Wiki Shuttle bus that runs between the airports terminals. According to Cunningham "I chose wiki-wiki as an alliterative substitute for quick and thereby avoided naming this stuff quick-web.[8][9]', 'sukrit_gmail', 'sukrit', '2012-01-27 03:18:30', 'yes'),
(4, 'Message...Press TAB then enter for fast reply', 'sukrit_gmail', 'sukrit', '2012-01-27 03:26:48', 'yes'),
(5, 'hehaha', 'sukrit', 'sukrit_gmail', '2012-01-27 03:34:40', 'yes'),
(6, 'TEsting', 'sukrit', 'sukrit_gmail', '2012-01-27 03:34:46', 'yes'),
(7, 'So what', 'sukrit_gmail', 'sukrit', '2012-01-27 03:38:56', 'yes'),
(8, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:45:37', 'yes'),
(9, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:51', 'yes'),
(10, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:51', 'yes'),
(11, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:52', 'yes'),
(12, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:53', 'yes'),
(13, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:53', 'yes'),
(14, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:54', 'yes'),
(15, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:54', 'yes'),
(16, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:54', 'yes'),
(17, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:54', 'yes'),
(18, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:54', 'yes'),
(19, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:55', 'yes'),
(20, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:55', 'yes'),
(21, 'TESTING', 'sukrit_gmail', 'sukrit', '2012-01-27 03:47:55', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notfns`
--

CREATE TABLE IF NOT EXISTS `tbl_notfns` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `question_got_replied` enum('yes','no') NOT NULL DEFAULT 'no',
  `question_got_liked` enum('yes','no') NOT NULL DEFAULT 'no',
  `reply_got_replied` enum('yes','no') NOT NULL DEFAULT 'no',
  `reply_got_liked` enum('yes','no') NOT NULL DEFAULT 'no',
  `messages` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_notfns`
--

INSERT INTO `tbl_notfns` (`id`, `username`, `question_got_replied`, `question_got_liked`, `reply_got_replied`, `reply_got_liked`, `messages`) VALUES
(1, 'sukrit', 'no', 'no', 'no', 'no', 'no'),
(2, 'sukrit_gmail', 'no', 'no', 'no', 'no', 'no'),
(3, 'mnknlknlk', 'no', 'no', 'no', 'no', 'no'),
(4, 'mnknlknlkm', 'no', 'no', 'no', 'no', 'no'),
(5, 'sukrit_456', 'no', 'no', 'no', 'no', 'no'),
(6, 'sukrit_45632', 'no', 'no', 'no', 'no', 'no'),
(7, 'sukrit_45632qe', 'no', 'no', 'no', 'no', 'no'),
(8, 'sukrit_45632qea', 'no', 'no', 'no', 'no', 'no'),
(9, 'sukrit_45632qeaasd', 'no', 'no', 'no', 'no', 'no'),
(10, 'sukrit', 'no', 'no', 'no', 'no', 'no'),
(11, 'sukrit', 'no', 'no', 'no', 'no', 'no'),
(12, 'sukrit243', 'no', 'no', 'no', 'no', 'no'),
(13, 'sukrit', 'no', 'no', 'no', 'no', 'no'),
(14, 'sukrit', 'no', 'no', 'no', 'no', 'no'),
(15, 'sukrit_gmail', 'no', 'no', 'no', 'no', 'no'),
(16, 'sukrit', 'no', 'no', 'no', 'no', 'no'),
(17, 'sukrit_gmail', 'no', 'no', 'no', 'no', 'no'),
(18, 'kjlhn', 'no', 'no', 'no', 'no', 'no'),
(19, 'slghdl', 'no', 'no', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qs`
--

CREATE TABLE IF NOT EXISTS `tbl_qs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `publish` enum('yes','no') NOT NULL DEFAULT 'yes',
  `category` varchar(50) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `haveimage` enum('yes','no') NOT NULL DEFAULT 'no',
  `dateandtime` datetime NOT NULL,
  `asker` varchar(50) NOT NULL,
  `likes` int(10) NOT NULL DEFAULT '0',
  `replies` int(10) NOT NULL DEFAULT '0',
  `solved` enum('yes','no') NOT NULL DEFAULT 'no',
  `notify_asker_likes` enum('yes','no') NOT NULL DEFAULT 'no',
  `notify_asker_replies` enum('yes','no') NOT NULL DEFAULT 'no',
  `net_likes_for_notify` int(10) NOT NULL DEFAULT '0',
  `net_replies_for_notify` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tbl_qs`
--

INSERT INTO `tbl_qs` (`id`, `question`, `publish`, `category`, `topic`, `image`, `haveimage`, `dateandtime`, `asker`, `likes`, `replies`, `solved`, `notify_asker_likes`, `notify_asker_replies`, `net_likes_for_notify`, `net_replies_for_notify`) VALUES
(3, 'TESTIN', 'no', 'school', 'Unspecified', '', 'no', '2012-01-22 16:52:27', 'sukrit', 0, 2, 'no', 'no', 'no', 0, 0),
(4, 'test', 'no', 'Unspecified', 'Unspecified', '', 'no', '2012-01-23 02:55:45', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(5, 'test', 'no', 'Unspecified', 'Unspecified', '', 'no', '2012-01-23 02:56:10', 'sukrit', 0, 2, 'no', 'no', 'no', 0, 0),
(6, 'test2', 'no', 'school', 'Unspecified', '', 'no', '2012-01-23 03:14:18', 'sukrit', 0, 1, 'no', 'no', 'no', 0, 0),
(7, 'test', 'no', 'Unspecified', 'Unspecified', '', 'no', '2012-01-23 07:58:15', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(8, 'etst', 'no', 'Unspecified', 'Unspecified', '', 'no', '2012-01-23 12:17:14', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(9, 'test', 'no', 'engineering', 'Electronics', '', 'no', '2012-01-23 12:17:43', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(10, 'skaj hfk j sh dfks askldj hfklsah dflkjs ahf sakldfh', 'no', 'engineering', 'Electronics', '', 'no', '2012-01-23 12:18:18', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(11, 'asfdka', 'no', 'Unspecified', 'Unspecified', '', 'no', '2012-01-23 12:22:08', 'sukrit', 0, 1, 'no', 'no', 'no', 0, 0),
(12, 'What if the force exerted on the planets were directed outwards and non conservative with respect to the.?', 'no', 'bachelors', 'Mechanics', '', 'no', '2012-01-23 13:06:16', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(13, 'test', 'no', 'Unspecified', 'Unspecified', '', 'no', '2012-01-23 15:59:38', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(14, 'B.Sc 1', 'no', 'bachelors', 'Electrostatics and Electricity', '', 'no', '2012-01-23 16:00:09', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(15, 'B.Sc 2', 'no', 'bachelors', 'Light', '', 'no', '2012-01-23 16:00:17', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(16, 'B.Sc 3', 'no', 'bachelors', 'Mechanics', '', 'no', '2012-01-23 16:00:31', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(17, 'B.Sc 4', 'no', 'bachelors', 'Quantum/Modern Physics', '', 'no', '2012-01-23 16:00:47', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(18, 'B.Sc 5', 'no', 'bachelors', 'Mechanics', '', 'no', '2012-01-23 16:01:00', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(19, 'last', 'no', 'bachelors', 'Unspecified', '', 'no', '2012-01-23 16:01:27', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(20, 'sadgf', 'no', 'Unspecified', 'Unspecified', '', 'no', '2012-01-24 02:27:22', 'sukrit', 0, 1, 'no', 'no', 'no', 0, 0),
(21, 'tEst', 'no', 'school', 'Unspecified', '', 'no', '2012-01-24 07:23:06', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(22, 'test', 'no', 'Unspecified', 'Unspecified', '', 'no', '2012-01-26 19:48:44', 'sukrit', 0, 1, 'no', 'no', 'no', 0, 0),
(23, 'Testing thataa', 'no', 'Unspecified', 'Unspecified', '', 'no', '2012-01-26 00:00:00', 'sukrit', 1000, 0, 'no', 'no', 'no', 0, 0),
(24, '', 'no', 'discussion', 'discussion', '', 'no', '2012-01-27 12:11:04', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(25, 'testing?', 'no', 'discussion', 'discussion', '', 'no', '2012-01-27 12:11:28', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(26, 'What is the formula foe the center of mass of a loaded spring?', 'no', 'plus2', 'Mechanics', '', 'no', '2012-01-27 12:17:29', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(27, 'Condition of College in Nepal?', 'no', 'discussion', 'discussion', '', 'no', '2012-01-27 12:18:01', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(28, 'Latest...', 'no', 'Unspecified', 'Unspecified', '', 'no', '2012-01-30 03:28:17', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(29, 'Quantum', 'no', 'bachelors', 'Quantum/Modern Physics', '', 'no', '2012-01-30 14:25:33', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(30, 'TEsting Discussion', 'no', 'discussion', 'discussion', '', 'no', '2012-01-30 14:30:43', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(31, 'F=ma', 'no', 'school', 'Mechanics', '', 'no', '2012-01-30 15:05:08', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(32, 'test''s question', 'no', 'Unspecified', 'Unspecified', '', 'no', '2012-01-31 12:37:03', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(33, 'TEsting for Bachelors?', 'yes', 'bachelors', 'Heat and Thermodynamics', '', 'no', '2012-02-02 13:49:11', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(34, 'Masters optoelectronics?', 'no', 'masters', 'Quantum/Modern Physics', '', 'no', '2012-02-02 13:49:29', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(35, 'school gravity force is called?', 'yes', 'school', 'Mechanics', '', 'no', '2012-02-02 13:49:53', 'sukrit', 0, 0, 'no', 'no', 'no', 0, 0),
(36, 'ke chha?', 'yes', 'engineering', 'Software', '', 'no', '2012-04-18 14:37:12', 'sukrit', 0, 1, 'no', 'no', 'no', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replies`
--

CREATE TABLE IF NOT EXISTS `tbl_replies` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `reply` text NOT NULL,
  `publish` enum('yes','no') NOT NULL DEFAULT 'yes',
  `replier` varchar(50) NOT NULL,
  `dateandtime` datetime NOT NULL,
  `questionid` int(5) NOT NULL,
  `reply_likes` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_replies`
--

INSERT INTO `tbl_replies` (`id`, `reply`, `publish`, `replier`, `dateandtime`, `questionid`, `reply_likes`) VALUES
(8, 'Reply Here...', 'no', 'sukrit', '2012-01-22 16:52:50', 3, 0),
(9, 'test', 'no', 'sukrit_gmail', '2012-01-23 01:32:03', 3, 0),
(10, 'Reply Here...', 'no', 'sukrit', '2012-01-23 03:14:04', 5, 0),
(11, 'Reply Here...', 'no', 'sukrit', '2012-01-23 03:14:34', 6, 0),
(12, 'Reply Here...ddd', 'no', 'sukrit', '2012-01-23 03:14:59', 5, 0),
(13, 'Reply Here...', 'no', 'sukrit_gmail', '2012-01-23 12:22:23', 11, 0),
(14, 'testing', 'no', 'sukrit', '2012-01-24 02:27:48', 20, 0),
(15, 'Reply Here...', 'no', 'sukrit', '2012-01-26 19:54:26', 22, 0),
(16, 'Yestai ho solta', 'no', 'sukrit', '2012-01-27 12:26:43', 27, 0),
(17, 'Hahahah', 'yes', 'sukrit', '2013-10-31 03:35:41', 36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_counter`
--

CREATE TABLE IF NOT EXISTS `tbl_site_counter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hits` int(10) NOT NULL DEFAULT '1',
  `ip` varchar(25) NOT NULL,
  `dateandtime` datetime NOT NULL DEFAULT '2010-10-10 10:10:10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_site_counter`
--

INSERT INTO `tbl_site_counter` (`id`, `hits`, `ip`, `dateandtime`) VALUES
(10, 324, '127.0.0.1', '2013-12-05 06:02:24'),
(11, 1, '49.244.52.128', '2012-09-06 04:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_userinfo` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` enum('new','active','blocked') NOT NULL,
  `signupdateandtime` datetime NOT NULL,
  `profile` enum('public','private') NOT NULL DEFAULT 'public',
  `code` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_userinfo`
--

INSERT INTO `tbl_userinfo` (`user_id`, `firstname`, `lastname`, `email`, `username`, `password`, `status`, `signupdateandtime`, `profile`, `code`) VALUES
(20, 'Sukrit', 'Adhikari', 'sukrit03@hotmaail.com', 'sukrit', '5141 5600 6213 5250 5280', 'active', '2012-02-04 01:34:50', 'public', '589261');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
