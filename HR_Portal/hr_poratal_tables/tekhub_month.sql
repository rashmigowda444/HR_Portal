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
-- Table structure for table `tekhub_month`
--

CREATE TABLE IF NOT EXISTS `tekhub_month` (
  `month_id` int(10) NOT NULL AUTO_INCREMENT,
  `month_name` varchar(20) NOT NULL,
  `month_value` int(10) NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tekhub_month`
--

INSERT INTO `tekhub_month` (`month_id`, `month_name`, `month_value`) VALUES
(1, 'January', 1),
(2, 'February', 2),
(3, 'March', 3),
(4, 'April', 4),
(5, 'May', 5),
(6, 'June', 6),
(7, 'July', 7),
(8, 'August', 8),
(9, 'September', 9),
(10, 'October', 10),
(11, 'November', 11),
(12, 'December', 12);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
