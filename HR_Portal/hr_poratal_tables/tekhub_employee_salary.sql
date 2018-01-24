-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2018 at 02:25 AM
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
-- Table structure for table `tekhub_employee_salary`
--

CREATE TABLE IF NOT EXISTS `tekhub_employee_salary` (
  `emp_id` int(10) NOT NULL,
  `basic_salary` double NOT NULL,
  `full_salary` double NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  UNIQUE KEY `emp_id` (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tekhub_employee_salary`
--

INSERT INTO `tekhub_employee_salary` (`emp_id`, `basic_salary`, `full_salary`, `from_date`, `to_date`) VALUES
(911, 4800, 0, '0000-00-00', '0000-00-00'),
(912, 4800, 0, '0000-00-00', '0000-00-00'),
(913, 4800, 0, '0000-00-00', '0000-00-00'),
(914, 4800, 0, '0000-00-00', '0000-00-00'),
(915, 4800, 0, '0000-00-00', '0000-00-00'),
(916, 4800, 0, '0000-00-00', '0000-00-00'),
(917, 4800, 0, '0000-00-00', '0000-00-00'),
(918, 4800, 0, '0000-00-00', '0000-00-00'),
(919, 4800, 0, '0000-00-00', '0000-00-00'),
(921, 4800, 0, '0000-00-00', '0000-00-00'),
(925, 4800, 0, '0000-00-00', '0000-00-00'),
(901, 37500, 0, '0000-00-00', '0000-00-00'),
(888, 4500, 0, '0000-00-00', '0000-00-00'),
(976, 546, 0, '0000-00-00', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
