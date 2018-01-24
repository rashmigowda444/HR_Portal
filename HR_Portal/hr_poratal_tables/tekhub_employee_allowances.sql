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
-- Table structure for table `tekhub_employee_allowances`
--

CREATE TABLE IF NOT EXISTS `tekhub_employee_allowances` (
  `allowance_id` int(10) NOT NULL AUTO_INCREMENT,
  `conveyance` double(14,10) NOT NULL,
  `house_rent` double(14,10) NOT NULL,
  `medical` double(14,10) NOT NULL,
  `special` double(14,10) NOT NULL,
  `professional_tax` double(14,10) NOT NULL,
  `bs_from_range` double NOT NULL,
  `bs_to_range` double NOT NULL,
  PRIMARY KEY (`allowance_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tekhub_employee_allowances`
--

INSERT INTO `tekhub_employee_allowances` (`allowance_id`, `conveyance`, `house_rent`, `medical`, `special`, `professional_tax`, `bs_from_range`, `bs_to_range`) VALUES
(1, 33.3333333333, 40.0000000000, 26.0416666667, 133.9583333330, 200.0000000000, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
