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
-- Table structure for table `tekhub_user_holiday`
--

CREATE TABLE IF NOT EXISTS `tekhub_user_holiday` (
  `holiday_id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `year` varchar(10) NOT NULL,
  `holiday_type_id` int(10) NOT NULL,
  PRIMARY KEY (`holiday_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tekhub_user_holiday`
--

INSERT INTO `tekhub_user_holiday` (`holiday_id`, `date`, `year`, `holiday_type_id`) VALUES
(1, '2018-01-03', '2018', 1),
(2, '2018-01-11', '2018', 1),
(3, '2018-01-12', '2018', 1),
(4, '2018-01-24', '2018', 1),
(5, '2017-12-20', '2018', 2),
(6, '2017-12-28', '2018', 2),
(7, '2017-12-08', '2018', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
