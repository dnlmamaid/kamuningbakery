-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2015 at 10:29 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user_id`, `module`, `remark_id`, `remarks`, `date_created`) VALUES
(1, 1, 'Products', 1, 'created/purchased product', '2015-10-24 00:23:44'),
(2, 1, 'Products', 2, 'created/produced product', '2015-10-24 00:24:52'),
(3, 1, 'Products', 3, 'created/purchased product', '2015-10-24 05:08:01'),
(4, 1, 'Products', 4, 'created/produced product', '2015-10-24 06:14:21'),
(5, 1, 'Products', 4, 'disabled product', '2015-10-25 00:34:16'),
(6, 1, 'products', 4, 'enabled product', '2015-10-25 00:34:29'),
(7, 1, 'Products', 4, 'updated product', '2015-10-25 15:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_Name` varchar(64) NOT NULL,
  `quantity` varchar(108) NOT NULL,
  `current_count` int(11) NOT NULL,
  `category_ID` tinyint(1) NOT NULL,
  `class_ID` int(11) NOT NULL,
  `supplier_ID` int(11) NOT NULL,
  `rm_ID` varchar(108) DEFAULT NULL,
  `qty` varchar(108) NOT NULL,
  `description` varchar(108) DEFAULT NULL,
  `um` varchar(6) NOT NULL,
  `price` decimal(25,3) NOT NULL,
  `sale_Price` decimal(25,2) DEFAULT NULL,
  `holding_cost` decimal(25,2) NOT NULL,
  `eoq` varchar(108) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `product_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_Name`, `quantity`, `current_count`, `category_ID`, `class_ID`, `supplier_ID`, `rm_ID`, `qty`, `description`, `um`, `price`, `sale_Price`, `holding_cost`, `eoq`, `date_created`, `date_updated`, `product_status`) VALUES
(1, 'Bread Flour', '50000', 49983, 2, 1, 3, '0', '', 'high quality bread flour', 'g', '0.035', NULL, '0.00', '', '2015-10-24 00:23:44', '2015-10-25 11:48:52', 1),
(2, 'Sample Bread', '20', 20, 1, 2, 1, '1', '0.35', 'sample bread', 'pc', '0.035', '0.04', '1.00', '', '2015-10-24 00:24:52', '2015-10-25 11:48:38', 1),
(3, 'Sugar', '10000', 9994, 2, 1, 4, '0', '', 'high quality sugar', 'g', '0.035', NULL, '0.00', '', '2015-10-24 05:08:00', '2015-10-25 11:48:58', 1),
(4, 'Bread #2', '20', 20, 1, 2, 0, '1 3', '0.50 0.30', 'Sweet bread #2', 'pc', '0.070', '0.07', '1.00', '', '2015-10-25 15:41:53', '2015-10-25 11:48:47', 1);

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
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `reference` varchar(11) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `ppu` decimal(25,3) NOT NULL,
  `ordering_cost` decimal(25,2) NOT NULL,
  `purchase_date` datetime NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `product_id`, `supplier_id`, `reference`, `purchase_quantity`, `ppu`, `ordering_cost`, `purchase_date`) VALUES
(1, 1, 1, 3, 'ltOP7hq09WX', 50000, '0.035', '1750.00', '2015-10-24 00:23:44'),
(2, 1, 3, 4, 'zyfprPmEZgj', 10000, '0.035', '350.00', '2015-10-24 05:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL,
  `invoice_code` varchar(11) NOT NULL,
  `product_ID` tinyint(1) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_sales` decimal(25,2) NOT NULL,
  `user_ID` tinyint(1) NOT NULL,
  `sales_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
