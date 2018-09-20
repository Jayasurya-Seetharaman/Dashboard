-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 05:15 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` text NOT NULL,
  `fdr` text NOT NULL,
  `amt` text NOT NULL,
  `frm` text NOT NULL,
  `tod` text NOT NULL,
  `roi` text NOT NULL,
  `name` text NOT NULL,
  `maturity` int(11) NOT NULL,
  `int_frequent` int(11) NOT NULL,
  `amt_of_interest` int(11) NOT NULL,
  `status` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `bank`, `fdr`, `amt`, `frm`, `tod`, `roi`, `name`, `maturity`, `int_frequent`, `amt_of_interest`, `status`, `type`) VALUES
(30, 'SBA C', '1451', '75000', '2017-12-24', '2018-01-20', '15000', 'Keerthiii K', 52000, 40, 45000, '', 'open'),
(31, 'SBA V', '14515', '75000', '2017-12-16', '2018-01-28', '15000', 'Keerthiii K', 52000, 45, 45000, '', 'open'),
(33, 'SBA V', '14515', '75000', '2017-12-16', '2018-01-20', '15000', 'Priyanka', 52000, 45, 45000, '', 'open'),
(34, 'SBI', '1234', '52000', '2018-01-15', '2018-01-26', '25', 'Preethi', 55000, 20, 52, '', 'open'),
(35, 'SBA', '14515', '52000', '2018-01-16', '2018-01-15', '12000', 'Deepika', 5000, 40, 15000, '156000000', 'closed'),
(36, 'SBA ', '1451', '75000', '2017-12-24', '2018-01-20', '15000', 'Jessi', 82000, 40, 45000, '', 'open'),
(37, 'SBA', '7686', '52000', '2018-01-15', '2018-01-25', '25', 'Sayyesha', 52000, 40, 15000, '325000', 'open'),
(38, 'IOB', '143', '75000', '2017-12-24', '2018-01-20', '15000', 'Jessi', 82000, 40, 45000, 'C', 'open'),
(43, 'AXIS', '14515', '75000', '2017-12-16', '2018-01-28', '15000', 'Keerthiii K', 52000, 45, 45000, '281250000', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `password`) VALUES
(1, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
