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
-- Table structure for table `tekhub_employee_personal_details`
--

CREATE TABLE IF NOT EXISTS `tekhub_employee_personal_details` (
  `emp_id` int(10) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `martial_status` varchar(30) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(10) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `alternative_number` varchar(15) NOT NULL,
  `date_of_joining` date NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tekhub_employee_personal_details`
--

INSERT INTO `tekhub_employee_personal_details` (`emp_id`, `emp_name`, `gender`, `martial_status`, `nationality`, `dob`, `address`, `city`, `state`, `country`, `mobile_number`, `email_id`, `qualification`, `alternative_number`, `date_of_joining`, `department`, `designation`) VALUES
(911, 'Archana L', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2016-08-17', '', 'Software Engineer'),
(912, 'Hemanth Kalyan A', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2016-08-17', '', 'Software Engineer'),
(913, 'Lakshitha S M', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2016-08-17', '', 'Software Engineer'),
(914, 'Ramya S', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2016-08-17', '', 'Software Engineer'),
(915, 'Rashmi S', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2016-08-17', '', 'Software Engineer'),
(916, 'Shiva Kumar K', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2016-08-17', '', 'Software Engineer'),
(917, 'Shwethashree N', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2016-08-17', '', 'Software Engineer'),
(918, 'Sunil Kumar P', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2016-08-17', '', 'Software Engineer'),
(919, 'Veda Murthy N', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2016-08-17', '', 'Software Engineer'),
(921, 'Swetha G', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2016-08-17', '', 'Software Engineer'),
(925, 'Jyoti Patil', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2017-03-01', '', 'Software Engineer'),
(901, 'Murthy Chitlur', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2016-07-01', '', 'CEO'),
(888, 'test', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2017-11-09', 'test', 'test'),
(976, 'shoppercrux', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2017-12-20', 'developer', 'developer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
