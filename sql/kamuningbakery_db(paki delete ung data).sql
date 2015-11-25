-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2015 at 08:17 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

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
(57, 1, 'Suppliers', 3, 'updated supplier', '2015-11-20 03:48:07'),
(58, 1, 'Production', 4, 'Created a Production Batch', '2015-11-21 05:10:39'),
(59, 1, 'Production', 8, 'Produced a product', '2015-11-21 05:59:25'),
(60, 1, 'Production', 8, 'Produced a product', '2015-11-21 05:59:52'),
(61, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:01:50'),
(62, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:02:50'),
(63, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:05:56'),
(64, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:06:53'),
(65, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:13:52'),
(66, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:14:25'),
(67, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:19:03'),
(68, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:30:37'),
(69, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:35:34'),
(70, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:54:42'),
(71, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:56:23'),
(72, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:56:28'),
(73, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:56:36'),
(74, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:57:15'),
(75, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:57:19'),
(76, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:57:36'),
(77, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:58:45'),
(78, 1, 'Production', 8, 'Produced a product', '2015-11-21 06:59:07'),
(79, 5, 'Purchases', 1, 'Added a product on a purchase order', '2015-11-24 16:46:29'),
(80, 4, 'Production', 5, 'Created a Production Batch', '2015-11-24 17:33:56'),
(81, 4, 'Requests', 2, 'User created a request', '2015-11-24 18:07:13'),
(82, 4, 'Requests', 3, 'Added a Product Request', '2015-11-24 18:30:23'),
(83, 4, 'Requests', 4, 'Added a Product Request', '2015-11-24 18:31:57'),
(84, 5, 'Requests', 3, 'Approved a request', '2015-11-24 18:32:23'),
(85, 5, 'Requests', 4, 'Disapproved a request', '2015-11-24 18:32:39'),
(86, 5, 'Purchases', 6, 'Placed a purchase order', '2015-11-25 19:35:41'),
(87, 5, 'Purchases', 1, 'Added a product on a purchase order', '2015-11-25 19:36:00'),
(88, 5, 'Purchases', 4, 'Added a product on a purchase order', '2015-11-25 19:36:27'),
(89, 1, 'Purchases', 9, 'received product', '2015-11-25 20:23:13'),
(90, 1, 'Purchases', 9, 'received product', '2015-11-25 20:35:42'),
(91, 1, 'Purchases', 9, 'received product', '2015-11-25 20:38:17'),
(92, 1, 'Purchases', 9, 'received product', '2015-11-25 20:38:25'),
(93, 1, 'Purchases', 9, 'received product', '2015-11-25 20:40:47'),
(94, 1, 'Purchases', 9, 'received product', '2015-11-25 20:44:56'),
(95, 1, 'Purchases', 9, 'received product', '2015-11-25 20:47:25'),
(96, 1, 'Purchases', 9, 'received product', '2015-11-25 21:10:49'),
(97, 1, 'Purchases', 10, 'received product', '2015-11-25 21:11:12'),
(98, 1, 'Purchases', 10, 'received product', '2015-11-25 21:16:02'),
(99, 1, 'Purchases', 10, 'received product', '2015-11-25 21:16:23'),
(100, 1, 'Purchases', 6, 'Cleared a purchase order', '2015-11-25 21:16:36'),
(101, 5, 'Purchases', 7, 'Placed a purchase order', '2015-11-26 00:11:01'),
(102, 5, 'Purchases', 5, 'Added a product on a purchase order', '2015-11-26 00:11:16'),
(103, 5, 'Purchases', 4, 'Added a product on a purchase order', '2015-11-26 00:11:30'),
(104, 6, 'Purchases', 11, 'received product', '2015-11-26 00:15:39'),
(105, 6, 'Purchases', 12, 'received product', '2015-11-26 00:15:59'),
(106, 6, 'Purchases', 11, 'received product', '2015-11-26 00:19:23'),
(107, 6, 'Purchases', 7, 'Cleared a purchase order', '2015-11-26 00:19:30'),
(108, 5, 'Purchases', 8, 'Placed a purchase order', '2015-11-26 00:26:58'),
(109, 5, 'Purchases', 5, 'Added a product on a purchase order', '2015-11-26 00:50:14'),
(110, 6, 'Purchases', 13, 'received product', '2015-11-26 01:01:29'),
(111, 6, 'Purchases', 8, 'Cleared a purchase order', '2015-11-26 01:05:05'),
(112, 5, 'Purchases', 9, 'Placed a purchase order', '2015-11-26 01:14:22'),
(113, 5, 'Purchases', 10, 'Placed a purchase order', '2015-11-26 01:14:23'),
(114, 5, 'Purchases', 7, 'Added a product on a purchase order', '2015-11-26 01:14:40'),
(115, 5, 'Purchases', 14, 'Updated a order info', '2015-11-26 01:15:06'),
(116, 6, 'Purchases', 14, 'received product', '2015-11-26 01:16:04'),
(117, 5, 'Purchases', 11, 'Placed a purchase order', '2015-11-26 01:20:27'),
(118, 5, 'Purchases', 7, 'Added a product on a purchase order', '2015-11-26 01:20:38'),
(119, 6, 'Purchases', 15, 'received product', '2015-11-26 01:22:24'),
(120, 6, 'Purchases', 11, 'Cleared a purchase order', '2015-11-26 01:22:27'),
(121, 6, 'Purchases', 9, 'Cleared a purchase order', '2015-11-26 01:22:49'),
(122, 5, 'Purchases', 4, 'Added a product on a purchase order', '2015-11-26 01:25:04'),
(123, 6, 'Purchases', 16, 'received product', '2015-11-26 01:25:26'),
(124, 6, 'Purchases', 10, 'Cleared a purchase order', '2015-11-26 01:25:39'),
(125, 1, 'Suppliers', 4, 'updated supplier', '2015-11-26 02:04:02'),
(126, 1, 'Suppliers', 4, 'updated supplier', '2015-11-26 02:04:44'),
(127, 1, 'Suppliers', 2, 'updated supplier', '2015-11-26 02:04:57'),
(128, 4, 'Production', 6, 'Created a Production Batch', '2015-11-26 03:05:51'),
(129, 4, 'Production', 8, 'Produced a product', '2015-11-26 03:06:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

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
(24, 4, 8, 5, 7, '20', '48.000', 0),
(25, 5, 8, 0, 1, '2176', '96.000', 0),
(26, 6, 8, 0, 1, '544', '24.000', 0),
(27, 7, 8, 0, 1, '544', '24.000', 0),
(28, 8, 8, 0, 1, '544', '24.000', 0),
(29, 9, 8, 0, 1, '1088', '48.000', 0),
(30, 10, 8, 0, 1, '544', '24.000', 0),
(31, 11, 8, 0, 1, '544', '24.000', 0),
(32, 12, 8, 0, 1, '544', '24.000', 0),
(33, 13, 8, 0, 1, '544', '24.000', 0),
(34, 14, 8, 0, 1, '544', '24.000', 0),
(35, 15, 8, 0, 1, '544', '24.000', 0),
(36, 16, 8, 0, 1, '1088', '48.000', 0),
(37, 17, 8, 0, 1, '544', '24.000', 0),
(38, 17, 8, 1, 2, '100', '24.000', 0),
(39, 17, 8, 2, 4, '120', '24.000', 0),
(40, 17, 8, 3, 5, '1', '24.000', 0),
(41, 17, 8, 4, 6, '70.88', '24.000', 0),
(42, 17, 8, 5, 7, '10', '24.000', 0),
(43, 18, 8, 0, 1, '544', '24.000', 0),
(44, 18, 8, 1, 2, '100', '24.000', 0),
(45, 18, 8, 2, 4, '120', '24.000', 0),
(46, 18, 8, 3, 5, '1', '24.000', 0),
(47, 18, 8, 4, 6, '70.88', '24.000', 0),
(48, 18, 8, 5, 7, '10', '24.000', 0),
(49, 19, 8, 0, 1, '1088', '48.000', 0),
(50, 19, 8, 1, 2, '200', '48.000', 0),
(51, 19, 8, 2, 4, '240', '48.000', 0),
(52, 19, 8, 3, 5, '2', '48.000', 0),
(53, 19, 8, 4, 6, '141.76', '48.000', 0),
(54, 19, 8, 5, 7, '20', '48.000', 0),
(55, 20, 8, 0, 1, '1088', '48.000', 0),
(56, 20, 8, 1, 2, '200', '48.000', 0),
(57, 20, 8, 2, 4, '240', '48.000', 0),
(58, 20, 8, 3, 5, '2', '48.000', 0),
(59, 20, 8, 4, 6, '141.76', '48.000', 0),
(60, 20, 8, 5, 7, '20', '48.000', 0),
(61, 21, 8, 0, 1, '544', '24.000', 0),
(62, 22, 8, 0, 1, '544', '24.000', 0),
(63, 23, 8, 0, 1, '544', '24.000', 0),
(64, 23, 8, 1, 2, '100', '24.000', 0),
(65, 23, 8, 2, 4, '120', '24.000', 0),
(66, 23, 8, 3, 5, '1', '24.000', 0),
(67, 23, 8, 4, 6, '70.88', '24.000', 0),
(68, 23, 8, 5, 7, '10', '24.000', 0),
(69, 24, 8, 0, 1, '544', '24.000', 0),
(70, 24, 8, 1, 2, '100', '24.000', 0),
(71, 24, 8, 2, 4, '120', '24.000', 0),
(72, 24, 8, 3, 5, '1', '24.000', 0),
(73, 24, 8, 4, 6, '70.88', '24.000', 0),
(74, 24, 8, 5, 7, '10', '24.000', 0),
(75, 25, 8, 0, 1, '544', '24.000', 0),
(76, 25, 8, 1, 2, '100', '24.000', 0),
(77, 25, 8, 2, 4, '120', '24.000', 0),
(78, 25, 8, 3, 5, '1', '24.000', 0),
(79, 25, 8, 4, 6, '70.88', '24.000', 0),
(80, 25, 8, 5, 7, '10', '24.000', 0),
(81, 26, 8, 0, 1, '544', '24.000', 0),
(82, 26, 8, 1, 2, '100', '24.000', 0),
(83, 26, 8, 2, 4, '120', '24.000', 0),
(84, 26, 8, 3, 5, '1', '24.000', 0),
(85, 26, 8, 4, 6, '70.88', '24.000', 0),
(86, 26, 8, 5, 7, '10', '24.000', 0),
(87, 27, 8, 0, 1, '544', '24.000', 0),
(88, 27, 8, 1, 2, '100', '24.000', 0),
(89, 27, 8, 2, 4, '120', '24.000', 0),
(90, 27, 8, 3, 5, '1', '24.000', 0),
(91, 27, 8, 4, 6, '70.88', '24.000', 0),
(92, 27, 8, 5, 7, '10', '24.000', 0),
(93, 28, 8, 0, 1, '544', '24.000', 0),
(94, 28, 8, 1, 2, '100', '24.000', 0),
(95, 28, 8, 2, 4, '120', '24.000', 0),
(96, 28, 8, 3, 5, '1', '24.000', 0),
(97, 28, 8, 4, 6, '70.88', '24.000', 0),
(98, 28, 8, 5, 7, '10', '24.000', 0),
(99, 29, 8, 0, 1, '544', '24.000', 0),
(100, 29, 8, 1, 2, '100', '24.000', 0),
(101, 29, 8, 2, 4, '120', '24.000', 0),
(102, 29, 8, 3, 5, '1', '24.000', 0),
(103, 29, 8, 4, 6, '70.88', '24.000', 0),
(104, 29, 8, 5, 7, '10', '24.000', 0),
(105, 30, 8, 0, 1, '544', '24.000', 0),
(106, 30, 8, 1, 2, '100', '24.000', 0),
(107, 30, 8, 2, 4, '120', '24.000', 0),
(108, 30, 8, 3, 5, '1', '24.000', 0),
(109, 30, 8, 4, 6, '70.88', '24.000', 0),
(110, 30, 8, 5, 7, '10', '24.000', 0),
(111, 31, 8, 0, 1, '544', '24.000', 0),
(112, 31, 8, 1, 2, '100', '24.000', 0),
(113, 31, 8, 2, 4, '120', '24.000', 0),
(114, 31, 8, 3, 5, '1', '24.000', 0),
(115, 31, 8, 4, 6, '70.88', '24.000', 0),
(116, 31, 8, 5, 7, '10', '24.000', 0),
(117, 32, 8, 0, 1, '544', '24.000', 0),
(118, 32, 8, 1, 2, '100', '24.000', 0),
(119, 32, 8, 2, 4, '120', '24.000', 0),
(120, 32, 8, 3, 5, '1', '24.000', 0),
(121, 32, 8, 4, 6, '70.88', '24.000', 0),
(122, 32, 8, 5, 7, '10', '24.000', 0),
(123, 33, 8, 0, 1, '544', '24.000', 0),
(124, 33, 8, 1, 2, '100', '24.000', 0),
(125, 33, 8, 2, 4, '120', '24.000', 0),
(126, 33, 8, 3, 5, '1', '24.000', 0),
(127, 33, 8, 4, 6, '70.88', '24.000', 0),
(128, 33, 8, 5, 7, '10', '24.000', 0),
(129, 34, 8, 0, 1, '544', '24.000', 0),
(130, 34, 8, 1, 2, '100', '24.000', 0),
(131, 34, 8, 2, 4, '120', '24.000', 0),
(132, 34, 8, 3, 5, '1', '24.000', 0),
(133, 34, 8, 4, 6, '70.88', '24.000', 0),
(134, 34, 8, 5, 7, '10', '24.000', 0),
(135, 35, 8, 0, 1, '544', '24.000', 0),
(136, 35, 8, 1, 2, '100', '24.000', 0),
(137, 35, 8, 2, 4, '120', '24.000', 0),
(138, 35, 8, 3, 5, '1', '24.000', 0),
(139, 35, 8, 4, 6, '70.88', '24.000', 0),
(140, 35, 8, 5, 7, '10', '24.000', 0),
(141, 36, 8, 0, 1, '544', '24.000', 0),
(142, 36, 8, 1, 2, '100', '24.000', 0),
(143, 36, 8, 2, 4, '120', '24.000', 0),
(144, 36, 8, 3, 5, '1', '24.000', 0),
(145, 36, 8, 4, 6, '70.88', '24.000', 0),
(146, 36, 8, 5, 7, '10', '24.000', 0),
(147, 37, 8, 0, 1, '544', '24.000', 0),
(148, 37, 8, 1, 2, '100', '24.000', 0),
(149, 37, 8, 2, 4, '120', '24.000', 0),
(150, 37, 8, 3, 5, '1', '24.000', 0),
(151, 37, 8, 4, 6, '70.88', '24.000', 0),
(152, 37, 8, 5, 7, '10', '24.000', 0),
(153, 38, 8, 0, 1, '544', '24.000', 0),
(154, 38, 8, 1, 2, '100', '24.000', 0),
(155, 38, 8, 2, 4, '120', '24.000', 0),
(156, 38, 8, 3, 5, '1', '24.000', 0),
(157, 38, 8, 4, 6, '70.88', '24.000', 0),
(158, 38, 8, 5, 7, '10', '24.000', 0),
(159, 39, 8, 0, 1, '544', '24.000', 0),
(160, 39, 8, 1, 2, '100', '24.000', 0),
(161, 39, 8, 2, 4, '120', '24.000', 0),
(162, 39, 8, 3, 5, '1', '24.000', 0),
(163, 39, 8, 4, 6, '70.88', '24.000', 0),
(164, 39, 8, 5, 7, '10', '24.000', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `batch_id`, `user_id`, `net_produced_qty`, `net_production_cost`, `date_produced`) VALUES
(1, '11192015pcP', 1, '24', '49.85', '2015-11-19 18:51:23'),
(3, '11202015mWr', 1, '48', '99.70', '2015-11-20 01:35:38'),
(4, '11212015BpA', 1, '528', '1096.70', '2015-11-21 05:10:39'),
(5, '11242015vPy', 4, '0', '0.00', '2015-11-24 17:33:56'),
(6, '11262015x9Q', 4, '24', '45.40', '2015-11-26 03:05:50');

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_batch`
--

INSERT INTO `production_batch` (`pb_id`, `batch_reference`, `product_id`, `previous_count`, `units_produced`, `production_cpu`, `total_production_cost`) VALUES
(1, '11192015pcP', 8, '0', '24', '2.08', '49.85'),
(4, '11202015mWr', 8, '120.000', '48', '0.11', '99.70'),
(17, '11212015BpA', 8, '719.000', '24', '0.22', '49.85'),
(18, '11212015BpA', 8, '743.000', '24', '0.22', '49.85'),
(19, '11212015BpA', 8, '767.000', '48', '0.11', '99.70'),
(20, '11212015BpA', 8, '815.000', '48', '0.11', '99.70'),
(21, '11212015BpA', 8, '863.000', '24', '0.22', '49.85'),
(22, '11212015BpA', 8, '887.000', '24', '0.22', '49.85'),
(23, '11212015BpA', 8, '911.000', '24', '0.22', '49.85'),
(24, '11212015BpA', 8, '935.000', '24', '0.22', '49.85'),
(25, '11212015BpA', 8, '959.000', '24', '0.22', '49.85'),
(26, '11212015BpA', 8, '983.000', '24', '0.22', '49.85'),
(27, '11212015BpA', 8, '1007.000', '24', '0.22', '49.85'),
(28, '11212015BpA', 8, '1031.000', '24', '0.22', '49.85'),
(29, '11212015BpA', 8, '1055.000', '24', '0.22', '49.85'),
(30, '11212015BpA', 8, '1079.000', '24', '0.22', '49.85'),
(31, '11212015BpA', 8, '1103.000', '24', '0.22', '49.85'),
(32, '11212015BpA', 8, '1127.000', '24', '0.22', '49.85'),
(33, '11212015BpA', 8, '1151.000', '24', '0.22', '49.85'),
(34, '11212015BpA', 8, '1175.000', '24', '0.22', '49.85'),
(35, '11212015BpA', 8, '1199.000', '24', '0.22', '49.85'),
(36, '11212015BpA', 8, '1223.000', '24', '0.22', '49.85'),
(37, '11212015BpA', 8, '1247.000', '24', '0.22', '49.85'),
(38, '11212015BpA', 8, '1271.000', '24', '0.22', '49.85'),
(39, '11262015x9Q', 8, '1295.000', '24', '10.42', '45.40');

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
  `ro_lvl` decimal(25,3) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `product_status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_Name`, `current_count`, `category_ID`, `class_ID`, `description`, `um`, `price`, `sale_Price`, `holding_cost`, `ro_lvl`, `date_created`, `date_updated`, `product_status`) VALUES
(1, 'Flour', '465728.000', 2, 1, 'high quality bread flour', 'g', '0.042', '0.00', '0.02', '1468.800', '2015-11-19 15:22:39', '2015-11-25 19:06:10', 1),
(2, 'White Sugar', '94100.000', 2, 1, 'high quality granulated white sugar', 'g', '0.039', '0.00', '0.02', '250.000', '2015-11-19 15:23:14', '2015-11-25 19:06:10', 1),
(3, 'Brown Sugar', '100000.000', 2, 1, 'high uality brown sugar', 'g', '0.037', '0.00', '0.01', '0.000', '2015-11-19 15:23:46', '2015-11-19 10:11:18', 1),
(4, 'Milk', '74920.000', 2, 1, 'high quality fresh milk', 'ml', '0.039', '0.00', '0.20', '300.000', '2015-11-19 18:21:22', '2015-11-25 19:06:10', 1),
(5, 'Eggs', '991.000', 2, 1, 'high quality fresh eggs', 'pc', '4.625', '0.00', '0.20', '2.500', '2015-11-19 18:22:05', '2015-11-25 19:06:10', 1),
(6, 'Butter', '5818.080', 2, 1, 'high quality unsalted butter', 'g', '0.130', '0.00', '0.10', '177.200', '2015-11-19 18:23:37', '2015-11-25 19:06:10', 1),
(7, 'Salt', '109410.000', 2, 1, 'high quality iodized salt', 'g', '0.013', '0.00', '0.02', '25.000', '2015-11-19 19:01:50', '2015-11-25 19:06:10', 1),
(8, 'Pandesal', '1319.000', 1, 2, 'pandesal', 'pc', '0.221', '2.00', '0.00', '0.000', '2015-11-19 19:26:56', '2015-11-25 19:06:10', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `supplier_id`, `purchase_reference`, `total_cost`, `discount`, `date_ordered`, `date_received`, `po_status`) VALUES
(2, 1, 3, '20150lfdU61', '11700.00', 0, '2015-11-19 15:21:59', '2015-11-19 18:13:12', 1),
(3, 1, 4, '20150QaNgW7', '9900.00', 0, '2015-11-19 18:19:59', '2015-11-19 18:29:48', 1),
(4, 1, 3, '20150b7od6P', '2500.00', 0, '2015-11-19 18:54:15', '2015-11-19 19:02:58', 1),
(5, 1, 4, '20150Mgk5Xs', '0.00', 0, '2015-11-20 03:13:44', '2015-11-22 00:00:00', 0),
(6, 5, 4, '20150cursao', '4880.00', 0, '2015-11-25 19:35:41', '2015-11-25 21:16:36', 1),
(7, 5, 3, '20150eVgpAR', '1005.00', 0, '2015-11-26 00:11:01', '2015-11-26 00:19:29', 1),
(8, 5, 4, '20150L9ZBo1', '0.00', 0, '2015-11-26 00:26:58', '2015-11-26 01:05:05', 1),
(9, 5, 3, '20150O7sTyz', '0.00', 0, '2015-11-26 01:14:22', '2015-11-26 01:22:49', 1),
(10, 5, 3, '20150EDLv5e', '780.00', 0, '2015-11-26 01:14:23', '2015-11-26 01:25:39', 1),
(11, 5, 3, '20150e271yi', '0.00', 0, '2015-11-26 01:20:27', '2015-11-26 01:22:27', 1);

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
  `qty_received` int(11) NOT NULL,
  `ppu` decimal(25,3) NOT NULL,
  `ordering_cost` decimal(25,2) NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`order_id`, `product_id`, `order_reference`, `qty_before_order`, `order_quantity`, `qty_received`, `ppu`, `ordering_cost`, `order_status`) VALUES
(1, 1, '20150lfdU61', '0.000', 100000, 0, '0.041', '4100.00', 1),
(2, 2, '20150lfdU61', '0.000', 100000, 0, '0.039', '3900.00', 1),
(3, 3, '20150lfdU61', '0.000', 100000, 0, '0.037', '3700.00', 1),
(4, 4, '20150QaNgW7', '0.000', 50000, 0, '0.072', '3600.00', 1),
(5, 5, '20150QaNgW7', '0.000', 1000, 0, '5.000', '5000.00', 1),
(6, 6, '20150QaNgW7', '0.000', 10000, 0, '0.130', '1300.00', 1),
(7, 7, '20150b7od6P', '0.000', 100000, 0, '0.025', '2500.00', 1),
(8, 1, '20150Mgk5Xs', '66272.000', 100000, 0, '0.041', '4100.00', 0),
(9, 1, '20150cursao', '66272.000', 100000, 100000, '0.041', '4100.00', 1),
(10, 4, '20150cursao', '43040.000', 10000, 10000, '0.078', '780.00', 1),
(11, 5, '20150eVgpAR', '942.000', 50, 50, '4.500', '225.00', 1),
(12, 4, '20150eVgpAR', '60040.000', 10000, 10000, '0.078', '780.00', 1),
(13, 5, '20150L9ZBo1', '992.000', 50, 25, '4.500', '225.00', 1),
(14, 7, '20150O7sTyz', '99420.000', 10001, 10000, '0.022', '220.02', 1),
(15, 7, '20150e271yi', '99420.000', 10001, 10000, '0.022', '220.02', 1),
(16, 4, '20150EDLv5e', '70040.000', 10000, 5000, '0.078', '780.00', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `user_id`, `ro_reference`, `request_date`, `request_status`) VALUES
(1, 1, '19089tsfxIL', '2015-11-19 15:56:12', 1),
(2, 4, '240okMdOSru', '2015-11-24 18:07:13', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_orders`
--

INSERT INTO `request_orders` (`ro_id`, `request_reference`, `product_id`, `request_qty`, `ro_status`, `is_reviewed`) VALUES
(1, '19089tsfxIL', 1, '676', 1, 1),
(2, '19089tsfxIL', 1, '123', 0, 1),
(3, '240okMdOSru', 1, 'isang kilo', 1, 1),
(4, '240okMdOSru', 4, 'madaming gatas', 0, 1);

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
  `supplier_email` varchar(64) NOT NULL,
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

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `contact_Person`, `supplier_email`, `st_Address`, `city`, `terms`, `lead_time`, `contact`, `created_at`, `is_active`) VALUES
(1, 'Kamuning Bakery', 'Pastry Chef A', '', '#A A St. Address A', 'Quezon City', 'Some terms related information here.', '', '09097421212', '2015-10-13 05:50:45', 1),
(2, 'Grocery', 'Contact Person A', 'nomail@grocery.com', '#B B St. Address B', 'Valenzuela CIty', 'B', '1', 'B', '2015-10-15 15:00:31', 1),
(3, 'Supplier C', 'Contact Person B', 'supplierc@mail.com', '#C C st. Address C', 'Bulacan City', 'C', '3', 'C', '2015-10-15 16:09:12', 1),
(4, 'Supplier D', 'Contact Person D', 'supplierd@mail.com', '#D D St. D Address', 'Pampanga', 'D terms', '3', 'D', '2015-10-19 00:18:19', 1);

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
MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
MODIFY `production_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `production_batch`
--
ALTER TABLE `production_batch`
MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
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
MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `request_orders`
--
ALTER TABLE `request_orders`
MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
