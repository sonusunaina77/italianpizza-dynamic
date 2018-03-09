-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 06:05 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Table structure for table `order`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL auto_increment primary key,
  `oname` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `id` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` int(30) NOT NULL,
  `order_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
