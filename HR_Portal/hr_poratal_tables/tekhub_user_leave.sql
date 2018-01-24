-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2018 at 02:26 AM
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
-- Table structure for table `tekhub_user_leave`
--

CREATE TABLE IF NOT EXISTS `tekhub_user_leave` (
  `user_leave_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `leave_id` int(10) NOT NULL,
  `leave_balance` int(10) NOT NULL,
  `leave_taken` int(10) NOT NULL,
  PRIMARY KEY (`user_leave_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tekhub_user_leave`
--

INSERT INTO `tekhub_user_leave` (`user_leave_id`, `emp_id`, `leave_id`, `leave_balance`, `leave_taken`) VALUES
(6, 915, 1, 4, 0),
(1, 914, 1, 1, 0),
(2, 914, 2, 2, 0),
(3, 914, 3, 4, 0),
(4, 914, 4, 0, 0),
(7, 915, 2, 2, 0),
(8, 915, 3, 4, 0),
(9, 915, 4, 0, 0),
(10, 888, 1, 1, 0),
(11, 888, 2, 2, 0),
(12, 888, 3, 2, 0),
(13, 888, 4, 0, 0),
(14, 976, 1, 4, 0),
(15, 976, 2, 2, 0),
(16, 976, 3, 4, 0),
(17, 976, 4, 0, 0),
(18, 566, 1, 4, 0),
(19, 566, 2, 2, 0),
(20, 566, 3, 4, 0),
(21, 566, 4, 0, 0),
(22, 788, 1, 4, 0),
(23, 788, 2, 2, 0),
(24, 788, 3, 4, 0),
(25, 788, 4, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
