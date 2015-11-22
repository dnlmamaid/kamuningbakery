-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2015 at 12:00 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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
(21, 1, 'Purchases', 3, 'Cleared a purchase order', '2015-11-22 18:59:55');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, '11222015Ybi', 1, '0', '0.00', '2015-11-22 18:23:39');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_Name`, `current_count`, `category_ID`, `class_ID`, `description`, `um`, `price`, `sale_Price`, `holding_cost`, `ro_lvl`, `eoq`, `date_created`, `date_updated`, `product_status`) VALUES
(1, 'Flour', '100000.000', 2, 1, 'high quality bread flour', 'g', '0.042', '0.00', '0.02', '0.000', '0.000', '2015-11-22 18:41:41', '2015-11-22 10:45:17', 1),
(2, 'White Sugar', '100000.000', 2, 1, 'high quality granulated sugar', 'g', '0.039', '0.00', '0.04', '0.000', '0.000', '2015-11-22 18:42:51', '2015-11-22 10:45:23', 1),
(3, 'Brown Sugar', '100000.000', 2, 1, 'high quality brown sugar', 'g', '0.038', '0.00', '0.02', '0.000', '0.000', '2015-11-22 18:43:18', '2015-11-22 10:45:30', 1),
(4, 'Salt', '100000.000', 2, 1, 'high quality iodized salt', 'g', '0.025', '0.00', '0.02', '0.000', '0.000', '2015-11-22 18:43:47', '2015-11-22 10:45:37', 1),
(5, 'Eggs', '1000.000', 2, 1, 'high quality fresh eggs', 'pc', '5.000', '0.00', '0.04', '0.000', '0.000', '2015-11-22 18:50:40', '2015-11-22 10:53:06', 1),
(6, 'Milk', '10000.000', 2, 1, 'high quality fresh milk', 'ml', '0.078', '0.00', '0.05', '0.000', '0.000', '2015-11-22 18:51:22', '2015-11-22 10:51:33', 1),
(7, 'Butter', '10000.000', 2, 1, 'high quality unsalted butter', 'g', '0.300', '0.00', '0.05', '0.000', '0.000', '2015-11-22 18:59:46', '2015-11-22 10:59:52', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `supplier_id`, `purchase_reference`, `total_cost`, `discount`, `date_ordered`, `date_received`, `po_status`) VALUES
(1, 1, 4, '20150Ffpn2P', '14400.00', 0, '2015-11-22 18:41:03', '2015-11-22 18:45:52', 1),
(2, 1, 3, '20150dI81wG', '12800.00', 0, '2015-11-22 18:47:13', '2015-11-22 18:53:09', 1),
(3, 1, 3, '20150RXLPls', '3000.00', 0, '2015-11-22 18:59:16', '2015-11-22 18:59:55', 1);

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
  `ppu` decimal(25,3) NOT NULL,
  `ordering_cost` decimal(25,2) NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`order_id`, `product_id`, `order_reference`, `qty_before_order`, `order_quantity`, `ppu`, `ordering_cost`, `order_status`) VALUES
(1, 1, '20150Ffpn2P', '0.000', 100000, '0.042', '4200.00', 1),
(2, 2, '20150Ffpn2P', '0.000', 100000, '0.039', '3900.00', 1),
(3, 3, '20150Ffpn2P', '0.000', 100000, '0.038', '3800.00', 1),
(4, 4, '20150Ffpn2P', '0.000', 100000, '0.025', '2500.00', 1),
(5, 5, '20150dI81wG', '0.000', 1000, '5.000', '5000.00', 1),
(6, 6, '20150dI81wG', '0.000', 10000, '0.780', '7800.00', 1),
(7, 7, '20150RXLPls', '0.000', 10000, '0.300', '3000.00', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `contact` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `contact_Person`, `st_Address`, `city`, `terms`, `lead_time`, `contact`, `created_at`, `is_active`) VALUES
(1, 'Kamuning Bakery', 'Pastry Chef A', '#A A St. Address A', 'Quezon City', 'Some terms related information here.', '', '09097421212', '2015-10-13 05:50:45', 1),
(2, 'Grocery', 'Contact Person A', '#B B St. Address B', 'Valenzuela CIty', 'B', '', 'B', '2015-10-15 15:00:31', 1),
(3, 'Supplier C', 'Contact Person B', '#C C st. Address C', 'Bulacan City', 'C', '', 'C', '2015-10-15 16:09:12', 1),
(4, 'Supplier D', 'Contact Person D', '#D D St. D Address', 'Pampanga', 'D terms', '3', 'D', '2015-10-19 00:18:19', 1);

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
