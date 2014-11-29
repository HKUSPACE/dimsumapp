-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2014 at 07:03 AM
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
(1, '馬拉糕', 10, 1, '2014-11-29 07:01:41', '2014-11-29 07:01:41'),
(2, '叉燒包', 12, 1, '2014-11-29 07:01:50', '2014-11-29 07:01:50'),
(3, '蝦餃', 20, 4, '2014-11-29 07:02:04', '2014-11-29 07:02:04'),
(4, '燒賣', 15, 3, '2014-11-29 07:02:14', '2014-11-29 07:02:14'),
(5, '小籠包', 6, 5, '2014-11-29 07:02:24', '2014-11-29 07:02:24'),
(6, '腸粉', 7, 2, '2014-11-29 07:02:59', '2014-11-29 07:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `dimsums_orders`
--

CREATE TABLE IF NOT EXISTS `dimsums_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `dimsum_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`,`dimsum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_id` int(11) NOT NULL,
  `price` decimal(6,2) unsigned NOT NULL,
  `pic` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_completed` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(5,2) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `price`, `created`, `modified`) VALUES
(1, '小點', '10.00', '2014-11-29 07:00:47', '2014-11-29 07:00:47'),
(2, '中點', '13.50', '2014-11-29 07:00:55', '2014-11-29 07:00:55'),
(3, '大點', '16.70', '2014-11-29 07:01:03', '2014-11-29 07:01:03'),
(4, '特點', '19.40', '2014-11-29 07:01:13', '2014-11-29 07:01:13'),
(5, '頂點', '22.30', '2014-11-29 07:01:21', '2014-11-29 07:01:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
