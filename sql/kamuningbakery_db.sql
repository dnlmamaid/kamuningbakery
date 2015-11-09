-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 07:39 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user_id`, `module`, `remark_id`, `remarks`, `date_created`) VALUES
(1, 1, 'Purchases', 1, 'Placed a purchase order', '2015-11-09 10:58:09'),
(2, 1, 'Purchases', 1, 'Added a product on a purchase order', '2015-11-09 11:47:09'),
(3, 1, 'Purchases', 2, 'Added a product on a purchase order', '2015-11-09 11:49:39'),
(4, 1, 'Purchases', 1, 'Updated a purchase order', '2015-11-09 11:49:45'),
(5, 1, 'Purchases', 3, 'Added a product on a purchase order', '2015-11-09 11:50:26'),
(6, 1, 'Purchases', 4, 'Added a product on a purchase order', '2015-11-09 11:56:14'),
(7, 1, 'Products', 2, 'Updated a Product', '2015-11-09 11:56:40'),
(8, 1, 'Purchases', 1, 'received product', '2015-11-09 11:57:35'),
(9, 1, 'Purchases', 2, 'received product', '2015-11-09 11:57:42'),
(10, 1, 'Purchases', 3, 'received product', '2015-11-09 12:11:49'),
(11, 1, 'Purchases', 4, 'received product', '2015-11-09 12:11:54'),
(12, 1, 'Purchases', 1, 'Cleared a purchase order', '2015-11-09 12:12:00'),
(13, 1, 'Purchases', 2, 'Placed a purchase order', '2015-11-09 12:58:44'),
(14, 1, 'Purchases', 5, 'Added a product on a purchase order', '2015-11-09 12:59:36'),
(15, 1, 'Purchases', 6, 'Added a product on a purchase order', '2015-11-09 13:01:20'),
(16, 1, 'Purchases', 7, 'Added a product on a purchase order', '2015-11-09 13:19:28'),
(17, 1, 'Purchases', 7, 'Updated a order info', '2015-11-09 13:39:08'),
(18, 1, 'Purchases', 7, 'Updated a order info', '2015-11-09 16:28:56'),
(19, 1, 'Purchases', 7, 'Updated a order info', '2015-11-09 16:29:14'),
(20, 1, 'Purchases', 7, 'Updated a order info', '2015-11-09 16:29:44'),
(21, 1, 'Purchases', 7, 'Updated a order info', '2015-11-09 16:29:50'),
(22, 1, 'Purchases', 7, 'received product', '2015-11-09 16:47:58'),
(23, 1, 'Purchases', 6, 'received product', '2015-11-09 16:48:21'),
(24, 1, 'Purchases', 5, 'received product', '2015-11-09 16:48:26'),
(25, 1, 'Purchases', 2, 'Cleared a purchase order', '2015-11-09 16:54:02'),
(26, 1, 'Purchases', 3, 'Placed a purchase order', '2015-11-09 16:59:02'),
(27, 1, 'Production', 1, 'Created a Production Batch', '2015-11-09 17:06:44'),
(28, 1, 'Production', 8, 'Produced a new product', '2015-11-09 20:26:25'),
(29, 1, 'Products', 8, 'Updated a Product', '2015-11-09 20:34:42'),
(30, 1, 'Production', 9, 'Produced a new product', '2015-11-09 21:09:59'),
(31, 1, 'Production', 10, 'Produced a new product', '2015-11-09 21:17:42'),
(32, 1, 'Production', 11, 'Produced a new product', '2015-11-09 21:22:19'),
(33, 1, 'Production', 12, 'Produced a new product', '2015-11-09 21:26:22'),
(34, 1, 'Production', 13, 'Produced a new product', '2015-11-09 21:35:47'),
(35, 1, 'Production', 14, 'Produced a new product', '2015-11-09 21:41:49'),
(36, 1, 'Production', 15, 'Produced a new product', '2015-11-09 21:45:38'),
(37, 1, 'Production', 16, 'Produced a new product', '2015-11-09 22:37:44'),
(38, 1, 'Production', 17, 'Produced a new product', '2015-11-09 22:56:20'),
(39, 1, 'Production', 2, 'Created a Production Batch', '2015-11-10 00:06:13'),
(40, 1, 'Production', 18, 'Produced a new product', '2015-11-10 00:06:43'),
(41, 1, 'Production', 19, 'Produced a new product', '2015-11-10 00:08:26'),
(42, 1, 'Production', 20, 'Produced a new product', '2015-11-10 00:27:05'),
(43, 1, 'Production', 21, 'Produced a new product', '2015-11-10 00:28:10'),
(44, 1, 'Purchases', 5, 'Added a product on a purchase order', '2015-11-10 00:53:02'),
(45, 1, 'Purchases', 5, 'Added a product on a purchase order', '2015-11-10 01:03:51'),
(46, 1, 'Purchases', 10, 'received product', '2015-11-10 01:04:00'),
(47, 1, 'Purchases', 3, 'Cleared a purchase order', '2015-11-10 01:04:17'),
(48, 1, 'Purchases', 4, 'Placed a purchase order', '2015-11-10 01:08:03'),
(49, 1, 'Purchases', 5, 'Added a product on a purchase order', '2015-11-10 01:08:18'),
(50, 1, 'Purchases', 11, 'received product', '2015-11-10 01:08:29'),
(51, 1, 'Purchases', 4, 'Cleared a purchase order', '2015-11-10 01:08:40'),
(52, 1, 'Purchases', 5, 'Placed a purchase order', '2015-11-10 01:18:53'),
(53, 1, 'Purchases', 5, 'Added a product on a purchase order', '2015-11-10 01:19:54'),
(54, 1, 'Purchases', 12, 'received product', '2015-11-10 01:20:27'),
(55, 1, 'Purchases', 5, 'Cleared a purchase order', '2015-11-10 01:20:30'),
(56, 1, 'Production', 3, 'Created a Production Batch', '2015-11-10 01:25:25'),
(57, 1, 'Production', 22, 'Produced a new product', '2015-11-10 01:51:26'),
(58, 1, 'Sales', 1, 'Created a Sales', '2015-11-10 02:03:19'),
(59, 1, 'Sales', 0, 'Sold a Product', '2015-11-10 02:03:30'),
(60, 1, 'Sales', 0, 'Sold a Product', '2015-11-10 02:06:27'),
(61, 1, 'Sales', 0, 'Sold a Product', '2015-11-10 02:11:36'),
(62, 1, 'Sales', 0, 'Sold a Product', '2015-11-10 02:11:44'),
(63, 1, 'Sales', 1, 'Updated a Sales Info', '2015-11-10 02:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `ingredient_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_for` int(11) NOT NULL,
  `ingredient_ctr` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ingredient_qty` varchar(108) NOT NULL,
  `qty_can_produce` decimal(25,3) NOT NULL,
  PRIMARY KEY (`ingredient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `id_for`, `ingredient_ctr`, `product_id`, `ingredient_qty`, `qty_can_produce`) VALUES
(1, 8, 0, 1, '544', '24.000'),
(2, 8, 1, 2, '100', '24.000'),
(3, 8, 2, 4, '10', '24.000'),
(4, 8, 3, 5, '1', '24.000'),
(5, 8, 4, 6, '5', '24.000'),
(6, 9, 0, 5, '10', '10.000'),
(7, 9, 1, 4, '10', '10.000'),
(8, 10, 0, 5, '10', '10.000'),
(9, 10, 1, 4, '1', '10.000'),
(10, 11, 0, 5, '5', '10.000'),
(11, 11, 1, 4, '1', '10.000'),
(12, 12, 0, 5, '123', '500.000'),
(13, 12, 1, 4, '99999999999999999999', '500.000'),
(14, 13, 0, 1, '5', '1236.000'),
(15, 13, 1, 5, '5', '1236.000'),
(16, 13, 2, 6, '123', '1236.000'),
(17, 14, 0, 1, '1', '123.000'),
(18, 14, 1, 5, '2', '123.000'),
(19, 14, 2, 2, '3', '123.000'),
(20, 15, 0, 5, '5', '123.000'),
(21, 15, 1, 1, '1', '123.000'),
(22, 15, 2, 3, '1', '123.000'),
(23, 15, 3, 7, '1', '123.000'),
(24, 16, 0, 5, '5', '123.000'),
(25, 17, 0, 1, '1', '12.000'),
(26, 17, 1, 2, '1', '12.000'),
(27, 17, 2, 3, '1', '12.000'),
(28, 17, 3, 5, '2', '12.000'),
(29, 18, 0, 5, '2', '10.000'),
(30, 19, 0, 1, '1', '8.000'),
(31, 19, 1, 5, '2', '8.000'),
(32, 19, 2, 2, '1', '8.000'),
(33, 20, 0, 1, '01', '10.000'),
(34, 20, 1, 2, '1', '10.000'),
(35, 20, 2, 3, '1', '10.000'),
(36, 21, 0, 1, '1', '5.000'),
(37, 21, 1, 2, '1', '5.000'),
(38, 21, 2, 3, '1', '5.000'),
(39, 21, 3, 5, '2', '5.000'),
(40, 22, 0, 5, '1', '5.000'),
(41, 22, 1, 1, '1', '5.000');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `batch_id`, `user_id`, `net_produced_qty`, `net_production_cost`, `date_produced`) VALUES
(1, '11092015qAs', 1, '2171', '46.62', '2015-11-09 17:06:44'),
(2, '111020158yU', 1, '33', '13.82', '2015-11-10 00:06:13'),
(3, '111020157iA', 1, '5', '7.29', '2015-11-10 01:25:25');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `production_batch`
--

INSERT INTO `production_batch` (`pb_id`, `batch_reference`, `product_id`, `previous_count`, `units_produced`, `production_cpu`, `total_production_cost`) VALUES
(1, '11092015qAs', 8, '0', '24', '0.20', '4.68'),
(2, '11092015qAs', 9, '0', '10', '0.45', '4.52'),
(3, '11092015qAs', 10, '0', '10', '0.45', '4.52'),
(4, '11092015qAs', 11, '0', '10', '0.45', '4.52'),
(5, '11092015qAs', 12, '0', '500', '0.01', '4.52'),
(6, '11092015qAs', 13, '0', '1236', '0.00', '4.62'),
(7, '11092015qAs', 14, '0', '123', '0.04', '4.58'),
(8, '11092015qAs', 15, '0', '123', '0.05', '5.54'),
(9, '11092015qAs', 16, '0', '123', '0.04', '4.50'),
(10, '11092015qAs', 17, '0', '12', '0.38', '4.62'),
(11, '111020158yU', 18, '0', '10', '0.45', '4.50'),
(12, '111020158yU', 19, '0', '8', '0.57', '4.58'),
(13, '111020158yU', 20, '0', '10', '0.01', '0.12'),
(14, '111020158yU', 21, '0', '5', '0.92', '4.62'),
(15, '111020157iA', 22, '0', '5', '1.46', '7.29');

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
  `eoq` decimal(25,3) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `product_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_Name`, `current_count`, `category_ID`, `class_ID`, `description`, `um`, `price`, `sale_Price`, `holding_cost`, `ro_lvl`, `eoq`, `date_created`, `date_updated`, `product_status`) VALUES
(1, 'Flour', '98900.000', 2, 1, 'high quality bread flour', 'g', '0.042', '0.00', '0.00', '40000.000', '0.000', '2015-11-09 11:47:09', '2015-11-09 17:51:24', 1),
(2, 'White Sugar', '99793.000', 2, 1, 'high quality granulated white sugar', 'g', '0.038', '0.00', '0.00', '35000.000', '0.000', '2015-11-09 11:56:40', '2015-11-09 16:28:09', 1),
(3, 'Brown Sugar', '99996.000', 2, 1, 'high quality brown sugar\r\n', 'g', '0.038', '0.00', '0.00', '30000.000', '0.000', '2015-11-09 11:50:26', '2015-11-09 16:28:09', 1),
(4, 'Salt', '99968.000', 2, 1, 'high quality iodized salt', 'g', '0.024', '0.00', '0.00', '25000.000', '0.000', '2015-11-09 11:56:14', '2015-11-09 13:22:18', 1),
(5, 'Egg', '10.000', 2, 1, 'high quality fresh eggs', 'pc', '7.250', '0.00', '0.00', '100.000', '0.000', '2015-11-09 12:59:36', '2015-11-09 17:51:24', 1),
(6, 'Milk', '99867.000', 2, 1, 'high quality fresh milk', 'ml', '0.076', '0.00', '0.00', '50000.000', '0.000', '2015-11-09 13:01:20', '2015-11-09 13:35:46', 1),
(7, 'Vanilla', '499.000', 2, 1, 'high quality vanilla ', 'ml', '0.960', '0.00', '0.00', '75.000', '0.000', '2015-11-09 13:19:28', '2015-11-09 13:45:38', 1),
(8, 'Pandesal', '14.000', 1, 2, 'high quality kamuning pandesal', 'pc', '0.200', '1.00', '0.00', '0.000', '0.000', '2015-11-09 20:34:42', '2015-11-09 18:03:29', 1),
(9, 'Salted Egg', '0.000', 1, 3, 'slkdjaskldn', 'pc', '0.452', '0.90', '0.00', '0.000', '0.000', '2015-11-09 21:09:59', '2015-11-09 18:06:27', 1),
(10, 'Salted Egg V2.0', '0.000', 1, 3, 'd', 'pc', '0.452', '0.90', '0.00', '0.000', '0.000', '2015-11-09 21:17:41', '2015-11-09 18:11:36', 1),
(11, 'Salted V3', '0.000', 1, 3, '123', 'pc', '0.452', '0.90', '0.00', '0.000', '0.000', '2015-11-09 21:22:18', '2015-11-09 18:11:44', 1),
(12, 'Salt vasdasd', '500.000', 1, 3, '123kjghkjb', 'pc', '0.009', '0.02', '0.00', '0.000', '0.000', '2015-11-09 21:26:22', '0000-00-00 00:00:00', 1),
(13, 'ASKJDHGASJ K', '1236.000', 1, 3, 'asdjkhasdjh', 'pc', '0.004', '0.01', '0.00', '0.000', '0.000', '2015-11-09 21:35:46', '0000-00-00 00:00:00', 1),
(14, 'wlkejsaklhd', '123.000', 1, 3, 'sdkj', 'osd', '0.037', '0.07', '0.00', '0.000', '0.000', '2015-11-09 21:41:49', '0000-00-00 00:00:00', 1),
(15, 'asdad', '123.000', 1, 3, 'asd', 'g', '0.045', '0.09', '0.00', '0.000', '0.000', '2015-11-09 21:45:38', '0000-00-00 00:00:00', 1),
(16, 'Egsayting', '123.000', 1, 3, 'sad', 'pc', '0.037', '0.07', '0.00', '0.000', '0.000', '2015-11-09 22:37:43', '0000-00-00 00:00:00', 1),
(17, '12312lojusnaf', '12.000', 1, 3, 'asdxzv', 'asd', '0.385', '0.77', '0.00', '0.000', '0.000', '2015-11-09 22:56:19', '0000-00-00 00:00:00', 1),
(18, 'Slasd', '10.000', 1, 3, 'adkj', 'pc', '0.450', '0.90', '0.00', '0.000', '0.000', '2015-11-10 00:06:43', '0000-00-00 00:00:00', 1),
(19, 'Skii', '8.000', 1, 3, 'lkjbhgb ', 'c', '0.573', '1.15', '0.00', '0.000', '0.000', '2015-11-10 00:08:26', '0000-00-00 00:00:00', 1),
(20, 'kkk', '10.000', 1, 3, 'kkk12', 'k', '0.012', '0.02', '0.00', '0.000', '0.000', '2015-11-10 00:27:04', '0000-00-00 00:00:00', 1),
(21, 'pangarap', '5.000', 1, 3, 'pangarap lang kita', 'pn', '0.924', '1.85', '0.00', '0.000', '0.000', '2015-11-10 00:28:09', '0000-00-00 00:00:00', 1),
(22, 'MJJJ', '5.000', 1, 3, 'puygeo', 'pc', '1.458', '2.92', '0.00', '0.000', '0.000', '2015-11-10 01:51:24', '0000-00-00 00:00:00', 1);

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
(1, 1, 4, '20150jumvFD', '14200.00', 0, '2015-11-09 00:00:00', '2015-11-09 12:12:00', 1),
(2, 1, 3, '20150aJf5op', '10330.00', 0, '2015-11-09 12:58:44', '2015-11-09 16:54:02', 1),
(5, 1, 2, '20150J2k1lV', '100.00', 0, '2015-11-10 01:18:53', '2015-11-10 01:20:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE IF NOT EXISTS `purchase_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_reference` varchar(11) NOT NULL,
  `qty_before_order` varchar(108) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `ppu` decimal(25,3) NOT NULL,
  `ordering_cost` decimal(25,2) NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`order_id`, `product_id`, `order_reference`, `qty_before_order`, `order_quantity`, `ppu`, `ordering_cost`, `order_status`) VALUES
(1, 1, '20150jumvFD', '0', 100000, '0.042', '4200.00', 1),
(2, 2, '20150jumvFD', '0', 100000, '0.038', '3800.00', 1),
(3, 3, '20150jumvFD', '0', 100000, '0.038', '3800.00', 1),
(4, 4, '20150jumvFD', '0', 100000, '0.024', '2400.00', 1),
(5, 5, '20150aJf5op', '0', 500, '4.500', '2250.00', 1),
(6, 6, '20150aJf5op', '0', 100000, '0.076', '7600.00', 1),
(7, 7, '20150aJf5op', '0', 500, '0.960', '480.00', 1),
(12, 5, '20150J2k1lV', '1.000', 10, '10.000', '100.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ro_id` varchar(11) NOT NULL,
  `request_date` datetime NOT NULL,
  `request_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `request_orders`
--

CREATE TABLE IF NOT EXISTS `request_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_reference` varchar(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `request_qty` varchar(108) NOT NULL,
  `ro_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`order_id`)
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
(1, '102015v0mle', 1, '2015-11-10 02:03:19', '40', '56.30', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`siv_id`, `invoice_id`, `product_ID`, `qty_sold`, `total_sale`) VALUES
(1, '102015v0mle', 8, 10, '29.30'),
(2, '102015v0mle', 9, 10, '9.00'),
(3, '102015v0mle', 10, 10, '9.00'),
(4, '102015v0mle', 11, 10, '9.00');

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
  `contact` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `contact_Person`, `st_Address`, `city`, `terms`, `contact`, `created_at`, `is_active`) VALUES
(1, 'Kamuning Bakery', 'Pastry Chef A', '#A A St. Address A', 'Quezon City', 'Some terms related information here.', '09097421212', '2015-10-13 05:50:45', 1),
(2, 'Grocery', 'Contact Person A', '#B B St. Address B', 'Valenzuela CIty', 'B', 'B', '2015-10-15 15:00:31', 1),
(3, 'Supplier C', 'Contact Person B', '#C C st. Address C', 'Bulacan City', 'C', 'C', '2015-10-15 16:09:12', 1),
(4, 'Supplier D', 'Contact Person D', '#D D St. D Address', 'Pampanga', 'D terms', 'D', '2015-10-19 00:18:19', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `lastName`, `created_at`, `user_type`, `is_active`) VALUES
(1, 'administrator@kb', '$2y$10$/ICTGxVMHzOApzjGL/YG..X/mJsFizT8h..RENn.Rs5gqNTzgxLzK', 'Istrator', 'Admin', '2015-10-12 15:40:29', 1, 1),
(2, 'amanager@kb', '$2y$10$Kfpi6NQPTEC5urNHcMn6O.EcJyqPwjstDHMqpYxgDZPOI2dQFDdeK', 'Manager', 'A', '2015-10-12 15:46:29', 2, 1),
(3, 'aaccountant@kb', '$2y$10$Q5C8IScdiEGIVa62Xz4Vj.lWIab7Q1/rqBlQzOHRbIRwpXVQLtqQW', 'Accountant', 'A', '2015-10-12 15:50:32', 3, 1),
(4, 'bakerking@kb', '$2y$10$cazG../qovM.2WTNslJDM.t3RYun/lb2JXKUwpoPJYTt4wbeXRNHm', 'King', 'Baker', '2015-10-12 15:51:00', 4, 1);

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
