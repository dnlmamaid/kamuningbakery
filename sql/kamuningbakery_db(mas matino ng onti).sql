-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 07:48 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kamuningbakery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE IF NOT EXISTS `audit_trail` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `module` varchar(16) NOT NULL,
  `remark_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`audit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user_id`, `module`, `remark_id`, `remarks`, `date_created`) VALUES
(1, 1, 'Production', 1, 'Created a Production Batch', '2015-11-22 18:23:39'),
(2, 1, 'Purchases', 1, 'Placed a purchase order', '2015-11-22 18:41:03'),
(3, 1, 'Purchases', 1, 'Added a product on a purchase order', '2015-11-22 18:41:42'),
(4, 1, 'Purchases', 2, 'Added a product on a purchase order', '2015-11-22 18:42:51'),
(5, 1, 'Purchases', 3, 'Added a product on a purchase order', '2015-11-22 18:43:18'),
(6, 1, 'Purchases', 4, 'Added a product on a purchase order', '2015-11-22 18:43:47'),
(7, 1, 'Purchases', 1, 'received product', '2015-11-22 18:45:17'),
(8, 1, 'Purchases', 2, 'received product', '2015-11-22 18:45:23'),
(9, 1, 'Purchases', 3, 'received product', '2015-11-22 18:45:30'),
(10, 1, 'Purchases', 4, 'received product', '2015-11-22 18:45:38'),
(11, 1, 'Purchases', 1, 'Cleared a purchase order', '2015-11-22 18:45:52'),
(12, 1, 'Purchases', 2, 'Placed a purchase order', '2015-11-22 18:47:13'),
(13, 1, 'Purchases', 5, 'Added a product on a purchase order', '2015-11-22 18:50:40'),
(14, 1, 'Purchases', 6, 'Added a product on a purchase order', '2015-11-22 18:51:22'),
(15, 1, 'Purchases', 6, 'received product', '2015-11-22 18:51:33'),
(16, 1, 'Purchases', 5, 'received product', '2015-11-22 18:53:06'),
(17, 1, 'Purchases', 2, 'Cleared a purchase order', '2015-11-22 18:53:09'),
(18, 1, 'Purchases', 3, 'Placed a purchase order', '2015-11-22 18:59:16'),
(19, 1, 'Purchases', 7, 'Added a product on a purchase order', '2015-11-22 18:59:46'),
(20, 1, 'Purchases', 7, 'received product', '2015-11-22 18:59:52'),
(21, 1, 'Purchases', 3, 'Cleared a purchase order', '2015-11-22 18:59:55'),
(22, 1, 'Production', 8, 'Produced a new product', '2015-11-22 19:05:59'),
(23, 1, 'Products', 8, 'Updated a Product', '2015-11-22 19:07:55'),
(24, 1, 'Production', 9, 'Produced a new product', '2015-11-22 19:11:27'),
(25, 1, 'Production', 9, 'Produced a product', '2015-11-22 19:19:30'),
(26, 1, 'Production', 9, 'Produced a product', '2015-11-22 19:19:40'),
(27, 1, 'Production', 8, 'Produced a product', '2015-11-22 19:20:35'),
(28, 1, 'Production', 8, 'Produced a product', '2015-11-22 19:21:02'),
(29, 1, 'Production', 9, 'Produced a product', '2015-11-22 19:38:38'),
(30, 1, 'Production', 8, 'Produced a product', '2015-11-22 19:39:39'),
(31, 1, 'Production', 9, 'Produced a product', '2015-11-22 19:44:42'),
(32, 1, 'Production', 9, 'Produced a product', '2015-11-22 19:52:40'),
(33, 1, 'Production', 9, 'Produced a product', '2015-11-22 19:53:39'),
(34, 1, 'Production', 9, 'Produced a product', '2015-11-22 19:54:24'),
(35, 1, 'Production', 8, 'Produced a product', '2015-11-22 19:55:18'),
(36, 1, 'Production', 8, 'Produced a product', '2015-11-22 19:55:52'),
(37, 1, 'Production', 9, 'Produced a product', '2015-11-22 19:56:31'),
(38, 1, 'Production', 9, 'Produced a product', '2015-11-22 19:56:52'),
(39, 1, 'Production', 9, 'Produced a product', '2015-11-22 19:57:39'),
(40, 1, 'Production', 9, 'Produced a product', '2015-11-22 20:00:10'),
(41, 1, 'Production', 9, 'Produced a product', '2015-11-22 20:00:12'),
(42, 1, 'Production', 9, 'Produced a product', '2015-11-22 20:06:13'),
(43, 1, 'Production', 9, 'Produced a product', '2015-11-22 20:06:26'),
(44, 1, 'Sales', 1, 'Created a Sales', '2015-11-22 20:20:09'),
(45, 1, 'Sales', 0, 'Sold a Product', '2015-11-22 20:20:20'),
(46, 1, 'Sales', 0, 'Sold a Product', '2015-11-22 20:20:28'),
(47, 1, 'Sales', 0, 'Sold a Product', '2015-11-22 20:20:32'),
(48, 1, 'Sales', 0, 'Sold a Product', '2015-11-22 20:20:38'),
(49, 1, 'Sales', 0, 'Sold a Product', '2015-11-22 20:20:44'),
(50, 1, 'Sales', 0, 'Sold a Product', '2015-11-22 20:20:54'),
(51, 1, 'Purchases', 4, 'Placed a purchase order', '2015-11-23 03:35:07'),
(52, 1, 'Purchases', 1, 'Added a product on a purchase order', '2015-11-24 13:21:44'),
(53, 5, 'Purchases', 5, 'Placed a purchase order', '2015-11-26 14:28:27'),
(54, 5, 'Purchases', 1, 'Added a product on a purchase order', '2015-11-26 14:39:43'),
(55, 1, 'Purchases', 9, 'received product', '2015-11-26 14:44:29'),
(56, 1, 'Purchases', 5, 'Cleared a purchase order', '2015-11-26 14:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `ingredient_id` int(11) NOT NULL AUTO_INCREMENT,
  `pb_Id` int(11) NOT NULL,
  `id_for` int(11) NOT NULL,
  `ingredient_ctr` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ingredient_qty` varchar(108) NOT NULL,
  `qty_can_produce` decimal(25,3) NOT NULL,
  `initial_ingredient` tinyint(1) NOT NULL,
  PRIMARY KEY (`ingredient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `pb_Id`, `id_for`, `ingredient_ctr`, `product_id`, `ingredient_qty`, `qty_can_produce`, `initial_ingredient`) VALUES
(1, 1, 8, 0, 1, '544', '24.000', 1),
(2, 1, 8, 1, 2, '100', '24.000', 1),
(3, 1, 8, 2, 4, '10', '24.000', 1),
(4, 1, 8, 3, 5, '1', '24.000', 1),
(5, 1, 8, 4, 6, '120', '24.000', 1),
(6, 1, 8, 5, 7, '70.22', '24.000', 1),
(7, 2, 9, 0, 1, '544', '24.000', 1),
(8, 2, 9, 1, 2, '100', '24.000', 1),
(9, 2, 9, 2, 4, '10', '24.000', 1),
(10, 2, 9, 3, 5, '1', '24.000', 1),
(11, 2, 9, 4, 6, '120', '24.000', 1),
(12, 2, 9, 5, 7, '70.22', '24.000', 1),
(13, 3, 9, 0, 1, '1088', '48.000', 0),
(14, 3, 9, 1, 2, '200', '48.000', 0),
(15, 3, 9, 2, 4, '20', '48.000', 0),
(16, 3, 9, 3, 5, '2', '48.000', 0),
(17, 3, 9, 4, 6, '240', '48.000', 0),
(18, 3, 9, 5, 7, '140.44', '48.000', 0),
(19, 4, 9, 0, 1, '2720', '120.000', 0),
(20, 4, 9, 1, 2, '500', '120.000', 0),
(21, 4, 9, 2, 4, '50', '120.000', 0),
(22, 4, 9, 3, 5, '5', '120.000', 0),
(23, 4, 9, 4, 6, '600', '120.000', 0),
(24, 4, 9, 5, 7, '351.1', '120.000', 0),
(25, 5, 8, 0, 1, '2720', '120.000', 0),
(26, 5, 8, 1, 2, '500', '120.000', 0),
(27, 5, 8, 2, 4, '50', '120.000', 0),
(28, 5, 8, 3, 5, '5', '120.000', 0),
(29, 5, 8, 4, 6, '600', '120.000', 0),
(30, 5, 8, 5, 7, '351.1', '120.000', 0),
(31, 6, 8, 0, 1, '544', '24.000', 0),
(32, 6, 8, 1, 2, '100', '24.000', 0),
(33, 6, 8, 2, 4, '10', '24.000', 0),
(34, 6, 8, 3, 5, '1', '24.000', 0),
(35, 6, 8, 4, 6, '120', '24.000', 0),
(36, 6, 8, 5, 7, '70.22', '24.000', 0),
(37, 7, 9, 0, 1, '544', '24.000', 0),
(38, 7, 9, 1, 2, '100', '24.000', 0),
(39, 7, 9, 2, 4, '10', '24.000', 0),
(40, 7, 9, 3, 5, '1', '24.000', 0),
(41, 7, 9, 4, 6, '120', '24.000', 0),
(42, 7, 9, 5, 7, '70.22', '24.000', 0),
(43, 8, 8, 0, 1, '544', '24.000', 0),
(44, 8, 8, 1, 2, '100', '24.000', 0),
(45, 8, 8, 2, 4, '10', '24.000', 0),
(46, 8, 8, 3, 5, '1', '24.000', 0),
(47, 8, 8, 4, 6, '120', '24.000', 0),
(48, 8, 8, 5, 7, '70.22', '24.000', 0),
(49, 9, 9, 0, 1, '544', '24.000', 0),
(50, 9, 9, 1, 2, '100', '24.000', 0),
(51, 9, 9, 2, 4, '10', '24.000', 0),
(52, 9, 9, 3, 5, '1', '24.000', 0),
(53, 9, 9, 4, 6, '120', '24.000', 0),
(54, 9, 9, 5, 7, '70.22', '24.000', 0),
(55, 10, 9, 0, 1, '544', '24.000', 0),
(56, 10, 9, 1, 2, '100', '24.000', 0),
(57, 10, 9, 2, 4, '10', '24.000', 0),
(58, 10, 9, 3, 5, '1', '24.000', 0),
(59, 10, 9, 4, 6, '120', '24.000', 0),
(60, 10, 9, 5, 7, '70.22', '24.000', 0),
(61, 11, 9, 0, 1, '544', '24.000', 0),
(62, 11, 9, 1, 2, '100', '24.000', 0),
(63, 11, 9, 2, 4, '10', '24.000', 0),
(64, 11, 9, 3, 5, '1', '24.000', 0),
(65, 11, 9, 4, 6, '120', '24.000', 0),
(66, 11, 9, 5, 7, '70.22', '24.000', 0),
(67, 12, 9, 0, 1, '544', '24.000', 0),
(68, 12, 9, 1, 2, '100', '24.000', 0),
(69, 12, 9, 2, 4, '10', '24.000', 0),
(70, 12, 9, 3, 5, '1', '24.000', 0),
(71, 12, 9, 4, 6, '120', '24.000', 0),
(72, 12, 9, 5, 7, '70.22', '24.000', 0),
(73, 13, 8, 0, 1, '544', '24.000', 0),
(74, 13, 8, 1, 2, '100', '24.000', 0),
(75, 13, 8, 2, 4, '10', '24.000', 0),
(76, 13, 8, 3, 5, '1', '24.000', 0),
(77, 13, 8, 4, 6, '120', '24.000', 0),
(78, 13, 8, 5, 7, '70.22', '24.000', 0),
(79, 14, 8, 0, 1, '544', '24.000', 0),
(80, 14, 8, 1, 2, '100', '24.000', 0),
(81, 14, 8, 2, 4, '10', '24.000', 0),
(82, 14, 8, 3, 5, '1', '24.000', 0),
(83, 14, 8, 4, 6, '120', '24.000', 0),
(84, 14, 8, 5, 7, '70.22', '24.000', 0),
(85, 15, 9, 0, 1, '544', '24.000', 0),
(86, 15, 9, 1, 2, '100', '24.000', 0),
(87, 15, 9, 2, 4, '10', '24.000', 0),
(88, 15, 9, 3, 5, '1', '24.000', 0),
(89, 15, 9, 4, 6, '120', '24.000', 0),
(90, 15, 9, 5, 7, '70.22', '24.000', 0),
(91, 16, 9, 0, 1, '544', '24.000', 0),
(92, 16, 9, 1, 2, '100', '24.000', 0),
(93, 16, 9, 2, 4, '10', '24.000', 0),
(94, 16, 9, 3, 5, '1', '24.000', 0),
(95, 16, 9, 4, 6, '120', '24.000', 0),
(96, 16, 9, 5, 7, '70.22', '24.000', 0),
(97, 17, 9, 0, 1, '544', '24.000', 0),
(98, 17, 9, 1, 2, '100', '24.000', 0),
(99, 17, 9, 2, 4, '10', '24.000', 0),
(100, 17, 9, 3, 5, '1', '24.000', 0),
(101, 17, 9, 4, 6, '120', '24.000', 0),
(102, 17, 9, 5, 7, '70.22', '24.000', 0),
(103, 18, 9, 0, 1, '544', '24.000', 0),
(104, 18, 9, 1, 2, '100', '24.000', 0),
(105, 18, 9, 2, 4, '10', '24.000', 0),
(106, 18, 9, 3, 5, '1', '24.000', 0),
(107, 18, 9, 4, 6, '120', '24.000', 0),
(108, 18, 9, 5, 7, '70.22', '24.000', 0),
(109, 19, 9, 0, 1, '544', '24.000', 0),
(110, 19, 9, 1, 2, '100', '24.000', 0),
(111, 19, 9, 2, 4, '10', '24.000', 0),
(112, 19, 9, 3, 5, '1', '24.000', 0),
(113, 19, 9, 4, 6, '120', '24.000', 0),
(114, 19, 9, 5, 7, '70.22', '24.000', 0),
(115, 20, 9, 0, 1, '544', '24.000', 0),
(116, 20, 9, 1, 2, '100', '24.000', 0),
(117, 20, 9, 2, 4, '10', '24.000', 0),
(118, 20, 9, 3, 5, '1', '24.000', 0),
(119, 20, 9, 4, 6, '120', '24.000', 0),
(120, 20, 9, 5, 7, '70.22', '24.000', 0),
(121, 21, 9, 0, 1, '544', '24.000', 0),
(122, 21, 9, 1, 2, '100', '24.000', 0),
(123, 21, 9, 2, 4, '10', '24.000', 0),
(124, 21, 9, 3, 5, '1', '24.000', 0),
(125, 21, 9, 4, 6, '120', '24.000', 0),
(126, 21, 9, 5, 7, '70.22', '24.000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE IF NOT EXISTS `production` (
  `production_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_id` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `net_produced_qty` varchar(108) NOT NULL,
  `net_production_cost` decimal(25,2) NOT NULL,
  `date_produced` datetime NOT NULL,
  PRIMARY KEY (`production_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `batch_id`, `user_id`, `net_produced_qty`, `net_production_cost`, `date_produced`) VALUES
(1, '11222015Ybi', 1, '720', '1872.65', '2015-11-22 18:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `production_batch`
--

CREATE TABLE IF NOT EXISTS `production_batch` (
  `pb_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_reference` varchar(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `previous_count` varchar(108) NOT NULL,
  `units_produced` varchar(108) NOT NULL,
  `production_cpu` decimal(25,2) NOT NULL,
  `total_production_cost` decimal(25,2) NOT NULL,
  PRIMARY KEY (`pb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `production_batch`
--

INSERT INTO `production_batch` (`pb_id`, `batch_reference`, `product_id`, `previous_count`, `units_produced`, `production_cpu`, `total_production_cost`) VALUES
(1, '11222015Ybi', 8, '0', '24', '2.60', '62.42'),
(2, '11222015Ybi', 9, '0', '24', '2.60', '62.42'),
(3, '11222015Ybi', 9, '24.000', '48', '0.11', '124.85'),
(4, '11222015Ybi', 9, '72.000', '120', '0.05', '312.12'),
(5, '11222015Ybi', 8, '24.000', '120', '0.05', '312.12'),
(6, '11222015Ybi', 8, '144.000', '24', '0.23', '62.42'),
(7, '11222015Ybi', 9, '192.000', '24', '0.23', '62.42'),
(8, '11222015Ybi', 8, '168.000', '24', '0.23', '62.42'),
(9, '11222015Ybi', 9, '216.000', '24', '0.23', '62.42'),
(10, '11222015Ybi', 9, '240.000', '24', '52.67', '62.42'),
(11, '11222015Ybi', 9, '264.000', '24', '55.59', '62.42'),
(12, '11222015Ybi', 9, '288.000', '24', '58.52', '62.42'),
(13, '11222015Ybi', 8, '192.000', '24', '61.44', '62.42'),
(14, '11222015Ybi', 8, '216.000', '24', '64.37', '62.42'),
(15, '11222015Ybi', 9, '312.000', '24', '67.29', '62.42'),
(16, '11222015Ybi', 9, '336.000', '24', '70.22', '62.42'),
(17, '11222015Ybi', 9, '360.000', '24', '73.15', '62.42'),
(18, '11222015Ybi', 9, '384.000', '24', '76.07', '62.42'),
(19, '11222015Ybi', 9, '408.000', '24', '79.00', '62.42'),
(20, '11222015Ybi', 9, '432.000', '24', '81.92', '62.42'),
(21, '11222015Ybi', 9, '456.000', '24', '84.85', '62.42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_Name` varchar(64) NOT NULL,
  `current_count` decimal(25,3) NOT NULL,
  `category_ID` tinyint(1) NOT NULL,
  `class_ID` int(11) NOT NULL,
  `description` varchar(108) DEFAULT NULL,
  `um` varchar(6) NOT NULL,
  `price` decimal(25,3) NOT NULL,
  `sale_Price` decimal(25,2) DEFAULT NULL,
  `holding_cost` decimal(25,2) NOT NULL,
  `ro_lvl` decimal(25,3) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `product_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_Name`, `current_count`, `category_ID`, `class_ID`, `description`, `um`, `price`, `sale_Price`, `holding_cost`, `ro_lvl`, `date_created`, `date_updated`, `product_status`) VALUES
(1, 'Flour', '133680.000', 2, 1, 'high quality bread flour', 'g', '0.042', '0.00', '0.02', '1577.600', '2015-11-22 18:41:41', '2015-11-26 06:44:24', 1),
(2, 'White Sugar', '97000.000', 2, 1, 'high quality granulated sugar', 'g', '0.039', '0.00', '0.04', '290.000', '2015-11-22 18:42:51', '2015-11-22 12:06:26', 1),
(3, 'Brown Sugar', '100000.000', 2, 1, 'high quality brown sugar', 'g', '0.038', '0.00', '0.02', '0.000', '2015-11-22 18:43:18', '2015-11-22 10:45:30', 1),
(4, 'Salt', '99700.000', 2, 1, 'high quality iodized salt', 'g', '0.025', '0.00', '0.02', '29.000', '2015-11-22 18:43:47', '2015-11-22 12:06:26', 1),
(5, 'Eggs', '970.000', 2, 1, 'high quality fresh eggs', 'pc', '5.000', '0.00', '0.04', '2.900', '2015-11-22 18:50:40', '2015-11-22 12:06:26', 1),
(6, 'Milk', '6400.000', 2, 1, 'high quality fresh milk', 'ml', '0.078', '0.00', '0.05', '348.000', '2015-11-22 18:51:22', '2015-11-22 12:06:26', 1),
(7, 'Butter', '7893.400', 2, 1, 'high quality unsalted butter', 'g', '0.300', '0.00', '0.05', '203.600', '2015-11-22 18:59:46', '2015-11-22 12:06:26', 1),
(8, 'Pandesal', '175.000', 1, 2, 'high quality pandesal', 'pc', '0.229', '2.00', '0.00', '0.000', '2015-11-22 19:07:55', '2015-11-22 12:20:44', 1),
(9, 'Pandesal v 2.0', '440.000', 1, 2, 'lkhjkfb', 'pc', '0.229', '0.46', '0.00', '0.000', '2015-11-22 19:11:27', '2015-11-22 12:20:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(32) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`, `is_active`) VALUES
(1, 'Finished Goods', 1),
(2, 'Raw Materials', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_class`
--

CREATE TABLE IF NOT EXISTS `product_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_Name` varchar(64) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_class`
--

INSERT INTO `product_class` (`class_id`, `class_Name`, `is_active`) VALUES
(1, 'Ingredient', 1),
(2, 'Bread', 1),
(3, 'Improved Product', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_reference` varchar(11) NOT NULL,
  `total_cost` decimal(25,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `date_ordered` datetime NOT NULL,
  `date_received` datetime NOT NULL,
  `po_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `supplier_id`, `purchase_reference`, `total_cost`, `discount`, `date_ordered`, `date_received`, `po_status`) VALUES
(1, 1, 4, '20150Ffpn2P', '14400.00', 0, '2015-11-22 18:41:03', '2015-11-22 18:45:52', 1),
(2, 1, 3, '20150dI81wG', '12800.00', 0, '2015-11-22 18:47:13', '2015-11-22 18:53:09', 1),
(3, 1, 3, '20150RXLPls', '3000.00', 0, '2015-11-22 18:59:16', '2015-11-22 18:59:55', 1),
(4, 1, 2, '20150xEgXIC', '0.00', 0, '2015-11-23 03:35:07', '2015-11-23 00:00:00', 0),
(5, 5, 4, '20150XeL8fD', '2100.00', 0, '2015-11-26 14:28:27', '2015-11-26 14:44:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE IF NOT EXISTS `purchase_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_reference` varchar(11) NOT NULL,
  `qty_before_order` decimal(25,3) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `qty_received` int(11) NOT NULL,
  `ppu` decimal(25,3) NOT NULL,
  `ordering_cost` decimal(25,2) NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`order_id`, `product_id`, `order_reference`, `qty_before_order`, `order_quantity`, `qty_received`, `ppu`, `ordering_cost`, `order_status`) VALUES
(1, 1, '20150Ffpn2P', '0.000', 100000, 0, '0.042', '4200.00', 1),
(2, 2, '20150Ffpn2P', '0.000', 100000, 0, '0.039', '3900.00', 1),
(3, 3, '20150Ffpn2P', '0.000', 100000, 0, '0.038', '3800.00', 1),
(4, 4, '20150Ffpn2P', '0.000', 100000, 0, '0.025', '2500.00', 1),
(5, 5, '20150dI81wG', '0.000', 1000, 0, '5.000', '5000.00', 1),
(6, 6, '20150dI81wG', '0.000', 10000, 0, '0.780', '7800.00', 1),
(7, 7, '20150RXLPls', '0.000', 10000, 0, '0.300', '3000.00', 1),
(8, 1, '20150xEgXIC', '83680.000', 0, 0, '0.410', '0.00', 0),
(9, 1, '20150XeL8fD', '83680.000', 100000, 50000, '0.042', '4200.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ro_reference` varchar(11) NOT NULL,
  `request_date` datetime NOT NULL,
  `request_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `request_orders`
--

CREATE TABLE IF NOT EXISTS `request_orders` (
  `ro_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_reference` varchar(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `request_qty` varchar(108) NOT NULL,
  `ro_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_code` varchar(11) NOT NULL,
  `user_ID` tinyint(1) NOT NULL,
  `sales_date` datetime NOT NULL,
  `total_qty_sold` varchar(108) NOT NULL,
  `total_sales` decimal(25,2) NOT NULL,
  `sales_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `invoice_code`, `user_ID`, `sales_date`, `total_qty_sold`, `total_sales`, `sales_status`) VALUES
(1, '222015Gi5xk', 1, '2015-11-22 20:20:09', '105', '148.40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices`
--

CREATE TABLE IF NOT EXISTS `sales_invoices` (
  `siv_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `qty_sold` int(11) NOT NULL,
  `total_sale` decimal(25,2) NOT NULL,
  PRIMARY KEY (`siv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`siv_id`, `invoice_id`, `product_ID`, `qty_sold`, `total_sale`) VALUES
(1, '222015Gi5xk', 8, 20, '40.00'),
(2, '222015Gi5xk', 9, 20, '9.20'),
(3, '222015Gi5xk', 8, 20, '40.00'),
(4, '222015Gi5xk', 8, 20, '40.00'),
(5, '222015Gi5xk', 8, 5, '10.00'),
(6, '222015Gi5xk', 9, 20, '9.20');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(64) NOT NULL,
  `contact_Person` varchar(64) NOT NULL,
  `st_Address` varchar(108) NOT NULL,
  `city` varchar(64) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `lead_time` varchar(16) NOT NULL,
  `supplier_email` varchar(64) NOT NULL,
  `contact` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `contact_Person`, `st_Address`, `city`, `terms`, `lead_time`, `supplier_email`, `contact`, `created_at`, `is_active`) VALUES
(1, 'Kamuning Bakery', 'Pastry Chef A', '#A A St. Address A', 'Quezon City', 'Some terms related information here.', '0', '', '09097421212', '2015-10-13 05:50:45', 1),
(2, 'Grocery', 'Contact Person A', '#B B St. Address B', 'Valenzuela CIty', 'B', '1', 'grocery@mail.com', 'B', '2015-10-15 15:00:31', 1),
(3, 'Supplier C', 'Contact Person B', '#C C st. Address C', 'Bulacan City', 'C', '3', 'ralphterrel@gmail.com', 'C', '2015-10-15 16:09:12', 1),
(4, 'Supplier D', 'Contact Person D', '#D D St. D Address', 'Pampanga', 'D terms', '3', 'Hipolitojoren@yahoo.com', 'D', '2015-10-19 00:18:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `user_type` int(1) unsigned NOT NULL DEFAULT '0',
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `lastName`, `created_at`, `user_type`, `is_active`) VALUES
(1, 'administrator@kb', '$2y$10$/ICTGxVMHzOApzjGL/YG..X/mJsFizT8h..RENn.Rs5gqNTzgxLzK', 'Istrator', 'Admin', '2015-10-12 15:40:29', 1, 1),
(2, 'amanager@kb', '$2y$10$Kfpi6NQPTEC5urNHcMn6O.EcJyqPwjstDHMqpYxgDZPOI2dQFDdeK', 'Manager', 'A', '2015-10-12 15:46:29', 2, 1),
(3, 'aaccountant@kb', '$2y$10$Q5C8IScdiEGIVa62Xz4Vj.lWIab7Q1/rqBlQzOHRbIRwpXVQLtqQW', 'Accountant', 'A', '2015-10-12 15:50:32', 3, 1),
(4, 'bakerking@kb', '$2y$10$cazG../qovM.2WTNslJDM.t3RYun/lb2JXKUwpoPJYTt4wbeXRNHm', 'King', 'Baker', '2015-10-12 15:51:00', 4, 1),
(5, 'apurchaser@kb', '$2y$10$N6TV60X6t03aGJTPI3Jynu0wuJJidBMUrW/SREkLIaTcwbllkxUnq', 'Purchaser', 'A', '2015-11-07 14:50:14', 5, 1),
(6, 'astockkeeper@kb', '$2y$10$Du5HHotbHK4.sEbX3Oi9/eLk9CWs95Z3A3zr5/t.DrxKNEodfgUJ.', 'Stock Keeper', 'A', '2015-11-07 14:50:49', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(16) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_id`, `type_name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Accountant'),
(4, 'Baker'),
(5, 'Purchaser'),
(6, 'Stock Keeper');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
