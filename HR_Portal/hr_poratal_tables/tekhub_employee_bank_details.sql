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
-- Table structure for table `tekhub_employee_bank_details`
--

CREATE TABLE IF NOT EXISTS `tekhub_employee_bank_details` (
  `emp_bank_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `bank_name` varchar(30) NOT NULL DEFAULT 'IndusInd Bank',
  `account_number` varchar(30) NOT NULL,
  `ifsc_code` varchar(30) NOT NULL DEFAULT 'INDB0000575',
  `bank_branch` varchar(30) NOT NULL,
  `pan_number` varchar(30) NOT NULL,
  `esi_number` varchar(30) NOT NULL,
  `pf_number` varchar(30) NOT NULL,
  PRIMARY KEY (`emp_bank_id`),
  UNIQUE KEY `emp_id` (`emp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tekhub_employee_bank_details`
--

INSERT INTO `tekhub_employee_bank_details` (`emp_bank_id`, `emp_id`, `bank_name`, `account_number`, `ifsc_code`, `bank_branch`, `pan_number`, `esi_number`, `pf_number`) VALUES
(1, 911, 'IndusInd Bank', '100043478597', 'INDB0000575', '', 'ANEPL8347G', '', ''),
(2, 912, 'IndusInd Bank', '100045512345', 'INDB0000575', '', 'AYGPA9403P', '', ''),
(3, 913, 'IndusInd Bank', '100045512354', 'INDB0000575', '', 'AOQPL2345R', '', ''),
(4, 914, 'IndusInd Bank', '100043478603', 'INDB0000575', '', 'BXYPR1492M', '', ''),
(5, 915, 'IndusInd Bank', '100043478612', 'INDB0000575', '', 'CATPR7475M', '', ''),
(6, 916, 'IndusInd Bank', '100043478676', 'INDB0000575', '', 'DTCPS4771L', '', ''),
(7, 917, 'IndusInd Bank', '100043478621', 'INDB0000575', '', 'HALPS2158K', '', ''),
(8, 918, 'IndusInd Bank', '100043478658', 'INDB0000575', '', 'GKMPS1066N', '', ''),
(9, 919, 'IndusInd Bank', '100043478630', 'INDB0000575', '', 'AWIPN3462D', '', ''),
(10, 921, 'IndusInd Bank', '100045512327', 'INDB0000575', '', 'BPLPG8295N', '', ''),
(11, 925, 'IndusInd Bank', '100052692348', 'INDB0000575', '', 'BWRPP1247C', '', ''),
(12, 901, 'IndusInd Bank', '100045512372', 'INDB0000575', '', 'AELPM6336C', '', ''),
(13, 888, 'IndusInd Bank', '234567654324', 'INDB0000575', '', '2345677fgg', '', '345476576'),
(14, 976, 'IndusInd Bank', '4546', 'INDB0000575', '', '4356', '', '345464');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
