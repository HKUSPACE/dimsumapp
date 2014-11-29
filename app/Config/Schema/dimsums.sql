-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2014 at 05:30 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dimsumapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dimsums`
--

CREATE TABLE IF NOT EXISTS `dimsums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dimsums`
--

INSERT INTO `dimsums` (`id`, `name`, `stock`, `type_id`, `created`, `modified`) VALUES
(1, '馬拉糕', 10, 1, '2014-11-29 04:43:57', NULL),
(2, '叉燒包', 15, 1, '2014-11-29 04:44:11', NULL),
(3, '腸粉', 20, 3, '2014-11-29 04:44:26', NULL),
(4, '蝦餃', 8, 5, '2014-11-29 04:44:51', NULL),
(5, '燒賣', 30, 2, '2014-11-29 04:45:03', NULL),
(6, '小籠包', 4, 4, '2014-11-29 04:45:16', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
