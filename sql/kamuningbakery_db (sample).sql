-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2015 at 08:58 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
`audit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module` varchar(16) NOT NULL,
  `remark_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user_id`, `module`, `remark_id`, `remarks`, `date_created`) VALUES
(1, 1, 'Purchases', 1, 'Placed a purchase order', '2015-11-19 15:14:03'),
(2, 1, 'Purchases', 1, 'Updated a purchase order', '2015-11-19 15:14:09'),
(3, 1, 'Purchases', 2015065, 'Updated a purchase order', '2015-11-19 15:19:20'),
(4, 1, 'Purchases', 2015065, 'Updated a purchase order', '2015-11-19 15:20:35'),
(5, 1, 'Purchases', 2015065, 'Updated a purchase order', '2015-11-19 15:21:02'),
(6, 1, 'Purchases', 1, 'deleted a purchase order', '2015-11-19 15:21:26'),
(7, 1, 'Purchases', 2, 'Placed a purchase order', '2015-11-19 15:21:59'),
(8, 1, 'Purchases', 1, 'Added a product on a purchase order', '2015-11-19 15:22:39'),
(9, 1, 'Purchases', 2, 'Added a product on a purchase order', '2015-11-19 15:23:15'),
(10, 1, 'Purchases', 3, 'Added a product on a purchase order', '2015-11-19 15:23:46'),
(11, 1, 'Purchases', 1, 'Updated a order info', '2015-11-19 15:24:07'),
(12, 1, 'Purchases', 1, 'received product', '2015-11-19 15:53:03'),
(13, 1, 'Requests', 1, 'User created a request', '2015-11-19 15:56:12'),
(14, 1, 'Requests', 1, 'Added a Product Request', '2015-11-19 15:56:24'),
(15, 1, 'Requests', 2, 'Added a Product Request', '2015-11-19 15:58:13'),
(16, 1, 'Requests', 1, 'Approved a request', '2015-11-19 16:01:43'),
(17, 1, 'Requests', 2, 'Approved a request', '2015-11-19 16:03:54'),
(18, 1, 'Requests', 1, 'Disapproved a request', '2015-11-19 16:40:41'),
(19, 1, 'Purchases', 2, 'received product', '2015-11-19 18:11:02'),
(20, 1, 'Purchases', 3, 'received product', '2015-11-19 18:11:19'),
(21, 1, 'Purchases', 2, 'Cleared a purchase order', '2015-11-19 18:13:12'),
(22, 1, 'Purchases', 3, 'Placed a purchase order', '2015-11-19 18:20:00'),
(23, 1, 'Purchases', 4, 'Added a product on a purchase order', '2015-11-19 18:21:22'),
(24, 1, 'Purchases', 5, 'Added a product on a purchase order', '2015-11-19 18:22:05'),
(25, 1, 'Purchases', 6, 'Added a product on a purchase order', '2015-11-19 18:23:37'),
(26, 1, 'Purchases', 4, 'received product', '2015-11-19 18:29:28'),
(27, 1, 'Purchases', 5, 'received product', '2015-11-19 18:29:36'),
(28, 1, 'Purchases', 6, 'received product', '2015-11-19 18:29:41'),
(29, 1, 'Purchases', 3, 'Cleared a purchase order', '2015-11-19 18:29:48'),
(30, 1, 'Requests', 2, 'Disapproved a request', '2015-11-19 18:41:55'),
(31, 1, 'Requests', 1, 'Approved a request', '2015-11-19 18:43:30'),
(32, 1, 'Requests', 2, 'Disapproved a request', '2015-11-19 18:44:58'),
(33, 1, 'Requests', 19089, 'Updated a Request Order', '2015-11-19 18:49:44'),
(34, 1, 'Production', 1, 'Created a Production Batch', '2015-11-19 18:51:23'),
(35, 1, 'Purchases', 4, 'Placed a purchase order', '2015-11-19 18:54:15'),
(36, 1, 'Purchases', 7, 'Added a product on a purchase order', '2015-11-19 19:01:50'),
(37, 1, 'Purchases', 7, 'received product', '2015-11-19 19:02:07'),
(38, 1, 'Purchases', 4, 'Cleared a purchase order', '2015-11-19 19:02:58'),
(39, 1, 'Production', 8, 'Produced a new product', '2015-11-19 19:06:00'),
(40, 1, 'Products', 8, 'Updated a Product', '2015-11-19 19:26:56'),
(41, 1, 'Production', 2, 'Created a Production Batch', '2015-11-20 01:01:36'),
(42, 1, 'Production', 8, 'Produced a product', '2015-11-20 01:03:06'),
(43, 1, 'Production', 8, 'Produced a product', '2015-11-20 01:19:38'),
(44, 1, 'Production', 3, 'Created a Production Batch', '2015-11-20 01:35:38'),
(45, 1, 'Production', 8, 'Produced a product', '2015-11-20 01:35:46'),
(46, 1, 'Sales', 1, 'Created a Sales', '2015-11-20 01:36:49'),
(47, 1, 'Sales', 0, 'Sold a Product', '2015-11-20 01:36:59'),
(48, 1, 'Sales', 0, 'Sold a Product', '2015-11-20 01:37:09'),
(49, 1, 'Sales', 0, 'Sold a Product', '2015-11-20 01:37:43'),
(50, 1, 'Sales', 1, 'Updated a Sales Info', '2015-11-20 01:57:59'),
(51, 1, 'Sales', 202015000, 'Updated a Sales Info', '2015-11-20 02:00:08'),
(52, 1, 'Sales', 202015000, 'Updated a Sales Info', '2015-11-20 02:01:26'),
(53, 1, 'Sales', 202015000, 'Updated a Sales Info', '2015-11-20 02:03:24'),
(54, 1, 'Sales', 202015000, 'Updated a Sales Info', '2015-11-20 02:03:31'),
(55, 1, 'Purchases', 5, 'Placed a purchase order', '2015-11-20 03:13:44'),
(56, 1, 'Suppliers', 2, 'updated supplier', '2015-11-20 03:48:00'),
(57, 1, 'Suppliers', 3, 'updated supplier', '2015-11-20 03:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
`ingredient_id` int(11) NOT NULL,
  `pb_Id` int(11) NOT NULL,
  `id_for` int(11) NOT NULL,
  `ingredient_ctr` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ingredient_qty` varchar(108) NOT NULL,
  `qty_can_produce` decimal(25,3) NOT NULL,
  `initial_ingredient` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `pb_Id`, `id_for`, `ingredient_ctr`, `product_id`, `ingredient_qty`, `qty_can_produce`, `initial_ingredient`) VALUES
(1, 1, 8, 0, 1, '544', '24.000', 1),
(2, 1, 8, 1, 2, '100', '24.000', 1),
(3, 1, 8, 2, 4, '120', '24.000', 1),
(4, 1, 8, 3, 5, '1', '24.000', 1),
(5, 1, 8, 4, 6, '70.88', '24.000', 1),
(6, 1, 8, 5, 7, '10', '24.000', 1),
(19, 4, 8, 0, 1, '1088', '48.000', 0),
(20, 4, 8, 1, 2, '200', '48.000', 0),
(21, 4, 8, 2, 4, '240', '48.000', 0),
(22, 4, 8, 3, 5, '2', '48.000', 0),
(23, 4, 8, 4, 6, '141.76', '48.000', 0),
(24, 4, 8, 5, 7, '20', '48.000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE IF NOT EXISTS `production` (
`production_id` int(11) NOT NULL,
  `batch_id` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `net_produced_qty` varchar(108) NOT NULL,
  `net_production_cost` decimal(25,2) NOT NULL,
  `date_produced` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `batch_id`, `user_id`, `net_produced_qty`, `net_production_cost`, `date_produced`) VALUES
(1, '11192015pcP', 1, '24', '49.85', '2015-11-19 18:51:23'),
(3, '11202015mWr', 1, '48', '99.70', '2015-11-20 01:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `production_batch`
--

CREATE TABLE IF NOT EXISTS `production_batch` (
`pb_id` int(11) NOT NULL,
  `batch_reference` varchar(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `previous_count` varchar(108) NOT NULL,
  `units_produced` varchar(108) NOT NULL,
  `production_cpu` decimal(25,2) NOT NULL,
  `total_production_cost` decimal(25,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_batch`
--

INSERT INTO `production_batch` (`pb_id`, `batch_reference`, `product_id`, `previous_count`, `units_produced`, `production_cpu`, `total_production_cost`) VALUES
(1, '11192015pcP', 8, '0', '24', '2.08', '49.85'),
(4, '11202015mWr', 8, '120.000', '48', '0.11', '99.70');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` int(11) NOT NULL,
  `product_Name` varchar(64) NOT NULL,
  `current_count` decimal(25,3) NOT NULL,
  `category_ID` tinyint(1) NOT NULL,
  `class_ID` int(11) NOT NULL,
  `description` varchar(108) DEFAULT NULL,
  `um` varchar(6) NOT NULL,
  `price` decimal(25,3) NOT NULL,
  `sale_Price` decimal(25,2) DEFAULT NULL,
  `holding_cost` decimal(25,2) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `product_status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_Name`, `current_count`, `category_ID`, `class_ID`, `description`, `um`, `price`, `sale_Price`, `holding_cost`, `date_created`, `date_updated`, `product_status`) VALUES
(1, 'Flour', '96192.000', 2, 1, 'high quality bread flour', 'g', '0.042', '0.00', '0.02', '2015-11-19 15:22:39', '2015-11-19 17:35:45', 1),
(2, 'White Sugar', '99300.000', 2, 1, 'high quality granulated white sugar', 'g', '0.039', '0.00', '0.02', '2015-11-19 15:23:14', '2015-11-19 17:35:45', 1),
(3, 'Brown Sugar', '100000.000', 2, 1, 'high uality brown sugar', 'g', '0.037', '0.00', '0.01', '2015-11-19 15:23:46', '2015-11-19 10:11:18', 1),
(4, 'Milk', '49160.000', 2, 1, 'high quality fresh milk', 'ml', '0.072', '0.00', '0.20', '2015-11-19 18:21:22', '2015-11-19 17:35:45', 1),
(5, 'Eggs', '993.000', 2, 1, 'high quality fresh eggs', 'pc', '5.000', '0.00', '0.20', '2015-11-19 18:22:05', '2015-11-19 17:35:45', 1),
(6, 'Butter', '9503.840', 2, 1, 'high quality unsalted butter', 'g', '0.130', '0.00', '0.10', '2015-11-19 18:23:37', '2015-11-19 17:35:45', 1),
(7, 'Salt', '99930.000', 2, 1, 'high quality iodized salt', 'g', '0.025', '0.00', '0.02', '2015-11-19 19:01:50', '2015-11-19 18:12:26', 1),
(8, 'Pandesal', '143.000', 1, 2, 'pandesal', 'pc', '0.221', '2.00', '0.00', '2015-11-19 19:26:56', '2015-11-19 17:37:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
`category_id` int(11) NOT NULL,
  `category_name` varchar(32) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
`class_id` int(11) NOT NULL,
  `class_Name` varchar(64) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
`purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_reference` varchar(11) NOT NULL,
  `total_cost` decimal(25,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `date_ordered` datetime NOT NULL,
  `date_received` datetime NOT NULL,
  `po_status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `supplier_id`, `purchase_reference`, `total_cost`, `discount`, `date_ordered`, `date_received`, `po_status`) VALUES
(2, 1, 3, '20150lfdU61', '11700.00', 0, '2015-11-19 15:21:59', '2015-11-19 18:13:12', 1),
(3, 1, 4, '20150QaNgW7', '9900.00', 0, '2015-11-19 18:19:59', '2015-11-19 18:29:48', 1),
(4, 1, 3, '20150b7od6P', '2500.00', 0, '2015-11-19 18:54:15', '2015-11-19 19:02:58', 1),
(5, 1, 4, '20150Mgk5Xs', '0.00', 0, '2015-11-20 03:13:44', '2015-11-22 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE IF NOT EXISTS `purchase_orders` (
`order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_reference` varchar(11) NOT NULL,
  `qty_before_order` decimal(25,3) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `ppu` decimal(25,3) NOT NULL,
  `ordering_cost` decimal(25,2) NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`order_id`, `product_id`, `order_reference`, `qty_before_order`, `order_quantity`, `ppu`, `ordering_cost`, `order_status`) VALUES
(1, 1, '20150lfdU61', '0.000', 100000, '0.041', '4100.00', 1),
(2, 2, '20150lfdU61', '0.000', 100000, '0.039', '3900.00', 1),
(3, 3, '20150lfdU61', '0.000', 100000, '0.037', '3700.00', 1),
(4, 4, '20150QaNgW7', '0.000', 50000, '0.072', '3600.00', 1),
(5, 5, '20150QaNgW7', '0.000', 1000, '5.000', '5000.00', 1),
(6, 6, '20150QaNgW7', '0.000', 10000, '0.130', '1300.00', 1),
(7, 7, '20150b7od6P', '0.000', 100000, '0.025', '2500.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
`request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ro_reference` varchar(11) NOT NULL,
  `request_date` datetime NOT NULL,
  `request_status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `user_id`, `ro_reference`, `request_date`, `request_status`) VALUES
(1, 1, '19089tsfxIL', '2015-11-19 15:56:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_orders`
--

CREATE TABLE IF NOT EXISTS `request_orders` (
`ro_id` int(11) NOT NULL,
  `request_reference` varchar(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `request_qty` varchar(108) NOT NULL,
  `ro_status` tinyint(1) NOT NULL,
  `is_reviewed` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_orders`
--

INSERT INTO `request_orders` (`ro_id`, `request_reference`, `product_id`, `request_qty`, `ro_status`, `is_reviewed`) VALUES
(1, '19089tsfxIL', 1, '676', 1, 1),
(2, '19089tsfxIL', 1, '123', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`sales_id` int(11) NOT NULL,
  `invoice_code` varchar(11) NOT NULL,
  `user_ID` tinyint(1) NOT NULL,
  `sales_date` datetime NOT NULL,
  `total_qty_sold` varchar(108) NOT NULL,
  `total_sales` decimal(25,2) NOT NULL,
  `sales_status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `invoice_code`, `user_ID`, `sales_date`, `total_qty_sold`, `total_sales`, `sales_status`) VALUES
(1, '202015E3YBU', 1, '2015-11-20 01:36:49', '25', '50.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices`
--

CREATE TABLE IF NOT EXISTS `sales_invoices` (
`siv_id` int(11) NOT NULL,
  `invoice_id` varchar(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `qty_sold` int(11) NOT NULL,
  `total_sale` decimal(25,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`siv_id`, `invoice_id`, `product_ID`, `qty_sold`, `total_sale`) VALUES
(1, '202015E3YBU', 8, 9, '18.00'),
(2, '202015E3YBU', 8, 10, '20.00'),
(3, '202015E3YBU', 8, 6, '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
`supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(64) NOT NULL,
  `contact_Person` varchar(64) NOT NULL,
  `st_Address` varchar(108) NOT NULL,
  `city` varchar(64) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `lead_time` varchar(16) NOT NULL,
  `contact` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `contact_Person`, `st_Address`, `city`, `terms`, `lead_time`, `contact`, `created_at`, `is_active`) VALUES
(1, 'Kamuning Bakery', 'Pastry Chef A', '#A A St. Address A', 'Quezon City', 'Some terms related information here.', '', '09097421212', '2015-10-13 05:50:45', 1),
(2, 'Grocery', 'Contact Person A', '#B B St. Address B', 'Valenzuela CIty', 'B', '1', 'B', '2015-10-15 15:00:31', 1),
(3, 'Supplier C', 'Contact Person B', '#C C st. Address C', 'Bulacan City', 'C', '3', 'C', '2015-10-15 16:09:12', 1),
(4, 'Supplier D', 'Contact Person D', '#D D St. D Address', 'Pampanga', 'D terms', '3', 'D', '2015-10-19 00:18:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `user_type` int(1) unsigned NOT NULL DEFAULT '0',
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
`type_id` int(11) NOT NULL,
  `type_name` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
 ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
 ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
 ADD PRIMARY KEY (`production_id`);

--
-- Indexes for table `production_batch`
--
ALTER TABLE `production_batch`
 ADD PRIMARY KEY (`pb_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_class`
--
ALTER TABLE `product_class`
 ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
 ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
 ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `request_orders`
--
ALTER TABLE `request_orders`
 ADD PRIMARY KEY (`ro_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
 ADD PRIMARY KEY (`siv_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
 ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
 ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
MODIFY `production_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `production_batch`
--
ALTER TABLE `production_batch`
MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_class`
--
ALTER TABLE `product_class`
MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `request_orders`
--
ALTER TABLE `request_orders`
MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
MODIFY `siv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
