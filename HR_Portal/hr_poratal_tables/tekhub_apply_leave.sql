-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2018 at 02:24 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shoppercrux`
--

-- --------------------------------------------------------

--
-- Table structure for table `tekhub_apply_leave`
--

CREATE TABLE IF NOT EXISTS `tekhub_apply_leave` (
  `apply_leave_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `leave_id` int(10) NOT NULL,
  `from_date` varchar(50) NOT NULL,
  `to_date` varchar(50) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `comment` longtext NOT NULL,
  `no_of_days` int(10) NOT NULL,
  `leave_balance` int(10) NOT NULL,
  `leave_status_id` int(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`apply_leave_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tekhub_apply_leave`
--

INSERT INTO `tekhub_apply_leave` (`apply_leave_id`, `emp_id`, `leave_id`, `from_date`, `to_date`, `duration`, `comment`, `no_of_days`, `leave_balance`, `leave_status_id`, `date_created`) VALUES
(1, 914, 1, '12/20/2017', '12/22/2017', '0', 'dfdd', 2, 2, 0, '2017-12-20 07:09:48'),
(2, 914, 2, '12/20/2017', '12/21/2017', '0', 'saa', 1, 1, 0, '2017-12-20 09:11:15'),
(3, 914, 3, '12/20/2017', '12/22/2017', '0', 'gfdf', 2, 1, 0, '2017-11-20 09:12:24'),
(4, 914, 2, '12/21/2017', '12/21/2017', '1', 'marriage', 1, 1, 0, '2017-12-20 12:07:56'),
(5, 914, 3, '12/13/2017', '12/13/2017', '0.5', 'gg', 1, 1, 0, '2017-12-21 06:32:06'),
(6, 888, 3, '12/11/2017', '12/13/2017', '0', 'fgh', 2, 2, 0, '2017-12-22 11:16:04'),
(7, 914, 3, '', '', '0', 'hello', 0, 1, 0, '2017-12-27 05:18:02'),
(8, 914, 3, '', '', '0', 'hello', 0, 1, 0, '2017-12-27 05:18:54'),
(9, 914, 2, '', '', '0', 'kkk', 0, 1, 0, '2017-12-27 05:24:23'),
(10, 914, 3, '', '', '0', 'hello', 0, 1, 0, '2017-12-27 05:40:40'),
(11, 914, 1, '', '', '0', 'dd', 0, 2, 0, '2017-12-27 05:50:43'),
(12, 914, 2, '', '', '0', 'gtr', 0, 1, 0, '2017-12-27 05:55:08'),
(13, 914, 2, '', '', '0', 'ghghg', 0, 1, 0, '2017-12-27 05:55:26'),
(14, 914, 2, '', '', '0', 'dd', 0, 1, 0, '2017-12-27 05:58:44'),
(15, 914, 3, '', '', '0', 'hello', 0, 1, 0, '2017-12-27 06:00:37'),
(16, 914, 3, '', '', '0', 'hh', 0, 1, 0, '2017-12-27 06:02:10'),
(17, 914, 2, '', '', '0', 'ffd', 0, 1, 0, '2017-12-27 06:12:15'),
(18, 914, 1, '12/27/2017', '12/28/2017', '0', 'tfhf', 1, 1, 0, '2017-12-27 06:33:31'),
(19, 914, 1, '12/27/2017', '12/27/2017', '1', 'ghj', 1, 1, 0, '2017-12-27 06:33:47'),
(20, 888, 1, '12/27/2017', '12/28/2017', '0', 'jjk', 1, 3, 0, '2017-12-27 07:26:29'),
(21, 888, 1, '12/20/2017', '12/22/2017', '0', 'gg', 2, 1, 0, '2017-12-28 06:23:20'),
(22, 914, 2, '01/02/2018', '01/04/2018', '0', 'gdfg', 2, 2, 0, '2018-01-02 10:25:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
