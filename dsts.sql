-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2014 at 07:01 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dsts`
--

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE IF NOT EXISTS `receiver` (
  `receiver_id` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` int(30) NOT NULL,
  `address1` int(30) NOT NULL,
  `address2` int(30) NOT NULL,
  PRIMARY KEY (`receiver_id`),
  KEY `receiver_id` (`receiver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `username` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `street_address` varchar(30) NOT NULL,
  `block_address` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `zone` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`username`, `firstname`, `lastname`, `email`, `telephone`, `password`, `street_address`, `block_address`, `district`, `zone`) VALUES
('arttuladhar', 'Aaayush', 'Tuladhar', 'aayush.tuladhar@gmail.com', '014250269', 'Clock124', '294 Chittadharmarg', 'Ason, Nhaikantala', 'Two', 'Bagmati'),
('tulad005', 'Aayush', 'Tuladhar', 'tulad005@umn.edu', '3204691231', 'Tuladhar', '3035 Eagandale Place', 'Eagan, MN', 'Bagmati', 'Bagmati');

-- --------------------------------------------------------

--
-- Table structure for table `user_shipment`
--

CREATE TABLE IF NOT EXISTS `user_shipment` (
  `shipmentid` int(10) NOT NULL AUTO_INCREMENT,
  `confirmation_num` int(8) unsigned NOT NULL,
  `tracking_num` int(8) unsigned NOT NULL,
  `sender_username` varchar(20) NOT NULL,
  `receiver_id` int(5) NOT NULL,
  `type` varchar(20) NOT NULL,
  `weight` int(10) NOT NULL,
  `cost` int(10) NOT NULL,
  PRIMARY KEY (`shipmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
