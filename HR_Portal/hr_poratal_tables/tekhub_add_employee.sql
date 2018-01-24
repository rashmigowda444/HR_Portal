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
-- Table structure for table `tekhub_add_employee`
--

CREATE TABLE IF NOT EXISTS `tekhub_add_employee` (
  `emp_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(50) NOT NULL,
  `emp_pass` varchar(50) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_holiday_id` int(10) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2147483648 ;

--
-- Dumping data for table `tekhub_add_employee`
--

INSERT INTO `tekhub_add_employee` (`emp_id`, `emp_name`, `emp_pass`, `emp_email`, `emp_holiday_id`) VALUES
(911, 'Archana L', '42df8cdcc296b59444352e24eb82b666', 'archanal@tekvity.com', 0),
(912, 'Hemanth Kalyan A', '42df8cdcc296b59444352e24eb82b666', 'kalyana@tekvity.com', 0),
(913, 'Lakshitha S M', '42df8cdcc296b59444352e24eb82b666', 'lakshithas@tekvity.com', 0),
(915, 'Rashmi S', '42df8cdcc296b59444352e24eb82b666', 'rashmis@tekvity.com', 2),
(916, 'Shiva Kumar K', '42df8cdcc296b59444352e24eb82b666', 'shivak@tekvity.com', 0),
(917, 'Shwethashree N', '42df8cdcc296b59444352e24eb82b666', 'shwethan@tekvity.com', 0),
(918, 'Sunil Kumar P', '42df8cdcc296b59444352e24eb82b666', 'sunil@tekvity.com', 0),
(919, 'Veda Murthy N', '42df8cdcc296b59444352e24eb82b666', 'vedan@tekvity.com', 0),
(920, 'Shyam Sunil K S', '42df8cdcc296b59444352e24eb82b666', 'shyamsunil@tekvity.com', 0),
(921, 'Swetha G', '42df8cdcc296b59444352e24eb82b666', 'swetha@tekvity.com', 0),
(924, 'Raghuram Bhat', '42df8cdcc296b59444352e24eb82b666', 'raghuram@tekvity.com', 0),
(925, 'Jyoti Patil', '42df8cdcc296b59444352e24eb82b666', 'jyotip@tekvity.com', 0),
(926, 'Geetha B L', '42df8cdcc296b59444352e24eb82b666', 'geethabl@tekvity.com', 0),
(928, 'Gopinath G', '42df8cdcc296b59444352e24eb82b666', 'gopinathg@tekvity.com', 0),
(929, 'Manoj B', '42df8cdcc296b59444352e24eb82b666', 'manojb@tekvity.com', 0),
(930, 'Mithila R Rao', '42df8cdcc296b59444352e24eb82b666', 'mithilar@tekvity.com', 0),
(931, 'Pooja N', '42df8cdcc296b59444352e24eb82b666', 'poojan@tekvity.com', 0),
(933, 'Parashuram Jumanal', '42df8cdcc296b59444352e24eb82b666', 'parashuramj@tekvity.com', 0),
(934, 'Prabhu Alamkere', '42df8cdcc296b59444352e24eb82b666', 'prabhua@tekvity.com', 0),
(976, 'shoppercrux', '1ab8e4c6ad1c9b63947420f224fe0c15', 'shopp@tekvity.com', 0),
(888, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com', 0),
(914, 'Ramya S', '42df8cdcc296b59444352e24eb82b666', 'ramyas@tekvity.com', 1),
(901, 'Murthy Chitlur', '42df8cdcc296b59444352e24eb82b666', 'murthycn@tekvity.com', 0),
(788, 'qqq', '098f6bcd4621d373cade4e832627b4f6', 'test@tekvity.com', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
