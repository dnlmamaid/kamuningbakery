-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2015 at 09:20 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=191 ;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user_id`, `module`, `remark_id`, `remarks`, `date_created`) VALUES
(1, 1, 'Purchases', 1, 'Placed a purchase order', '2015-10-31 12:23:25'),
(2, 1, 'Purchases', 1, 'Added a product on a purchase order', '2015-10-31 12:24:00'),
(3, 1, 'Purchases', 2, 'Added a product on a purchase order', '2015-10-31 12:24:58'),
(4, 1, 'Purchases', 3, 'Added a product on a purchase order', '2015-10-31 12:26:31'),
(5, 1, 'Purchases', 2, 'Placed a purchase order', '2015-10-31 12:27:37'),
(6, 1, 'Purchases', 4, 'Added a product on a purchase order', '2015-10-31 12:28:52'),
(7, 1, 'Purchases', 5, 'Added a product on a purchase order', '2015-10-31 12:29:42'),
(8, 1, 'Purchases', 6, 'Added a product on a purchase order', '2015-10-31 12:30:11'),
(9, 1, 'Purchases', 3, 'Placed a purchase order', '2015-10-31 12:31:53'),
(10, 1, 'Purchases', 7, 'Added a product on a purchase order', '2015-10-31 12:32:22'),
(11, 1, 'products', 7, 'enabled product', '2015-10-31 12:34:12'),
(12, 1, 'Products', 7, 'disabled product', '2015-10-31 12:34:14'),
(13, 1, 'Purchases', 6, 'received product', '2015-11-01 10:51:25'),
(14, 1, 'Purchases', 5, 'received product', '2015-11-01 10:54:51'),
(15, 1, 'Purchases', 4, 'received product', '2015-11-01 10:55:02'),
(16, 1, 'Purchases', 2, 'Cleared a purchase order', '2015-11-01 10:55:08'),
(17, 1, 'Suppliers', 4, 'disabled supplier', '2015-11-01 11:04:03'),
(18, 1, 'Suppliers', 4, 'enabled supplier', '2015-11-01 11:04:14'),
(19, 1, 'Suppliers', 4, 'disabled supplier', '2015-11-01 11:05:34'),
(20, 1, 'Suppliers', 4, 'enabled supplier', '2015-11-01 11:05:39'),
(21, 1, 'Purchases', 7, 'received product', '2015-11-02 17:50:13'),
(22, 1, 'Purchases', 8, 'received product', '2015-11-02 17:50:22'),
(23, 1, 'Purchases', 3, 'Cleared a purchase order', '2015-11-02 17:50:28'),
(24, 1, 'Purchases', 1, 'received product', '2015-11-02 17:50:41'),
(25, 1, 'Purchases', 2, 'received product', '2015-11-02 17:50:52'),
(26, 1, 'Purchases', 3, 'received product', '2015-11-02 17:50:58'),
(27, 1, 'Purchases', 1, 'Cleared a purchase order', '2015-11-02 17:51:07'),
(28, 1, 'Purchases', 4, 'Placed a purchase order', '2015-11-02 17:51:31'),
(29, 1, 'requests', 3, 'Placed a purchase order', '2015-11-02 18:25:07'),
(30, 1, 'requests', 1, 'Placed a purchase order', '2015-11-02 18:45:59'),
(31, 1, 'requests', 2, 'Placed a purchase order', '2015-11-02 18:53:29'),
(32, 1, 'Purchases', 4, 'deleted a purchase order', '2015-11-02 20:03:38'),
(33, 1, 'Production', 8, 'Produced a new product', '2015-11-02 20:21:34'),
(34, 1, 'Sales', 1, 'sold a product', '2015-11-02 20:33:21'),
(35, 1, 'Production', 8, 'produced a product', '2015-11-02 22:31:59'),
(36, 1, 'Production', 8, 'produced a product', '2015-11-02 22:33:37'),
(37, 1, 'Production', 9, 'Produced a new product', '2015-11-02 22:38:05'),
(38, 1, 'Sales', 2, 'sold a product', '2015-11-03 02:38:23'),
(39, 1, 'Production', 9, 'produced a product', '2015-11-03 02:38:39'),
(40, 1, 'Production', 10, 'Produced a new product', '2015-11-03 03:30:13'),
(41, 1, 'Products', 10, 'updated product', '2015-11-03 03:42:58'),
(42, 1, 'Sales', 3, 'sold a product', '2015-11-03 03:43:22'),
(43, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:34:31'),
(44, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:36:16'),
(45, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:38:00'),
(46, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:42:11'),
(47, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:43:42'),
(48, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:44:07'),
(49, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:45:06'),
(50, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:46:25'),
(51, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:48:51'),
(52, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:51:58'),
(53, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:56:32'),
(54, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:57:01'),
(55, 1, 'Products', 10, 'Updated a Product', '2015-11-03 04:59:09'),
(56, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:00:02'),
(57, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:00:39'),
(58, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:00:56'),
(59, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:01:55'),
(60, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:02:13'),
(61, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:02:30'),
(62, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:02:52'),
(63, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:03:16'),
(64, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:04:20'),
(65, 1, 'Sales', 4, 'sold a product', '2015-11-03 05:05:43'),
(66, 1, 'Sales', 5, 'sold a product', '2015-11-03 05:06:33'),
(67, 1, 'Sales', 6, 'sold a product', '2015-11-03 05:07:00'),
(68, 1, 'Sales', 7, 'sold a product', '2015-11-03 05:07:00'),
(69, 1, 'Sales', 8, 'sold a product', '2015-11-03 05:07:18'),
(70, 1, 'Sales', 9, 'sold a product', '2015-11-03 05:07:18'),
(71, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:12:09'),
(72, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:14:34'),
(73, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:15:03'),
(74, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:15:07'),
(75, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:15:28'),
(76, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:15:38'),
(77, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:17:14'),
(78, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:17:42'),
(79, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:18:16'),
(80, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:19:46'),
(81, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:20:36'),
(82, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:26:22'),
(83, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:26:50'),
(84, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:27:13'),
(85, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:29:46'),
(86, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:32:14'),
(87, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:33:02'),
(88, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:33:35'),
(89, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:33:52'),
(90, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:34:18'),
(91, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:34:18'),
(92, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:34:26'),
(93, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:34:31'),
(94, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:34:42'),
(95, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:34:46'),
(96, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:35:01'),
(97, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:35:05'),
(98, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:35:09'),
(99, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:35:22'),
(100, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:35:29'),
(101, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:35:39'),
(102, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:35:50'),
(103, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:36:39'),
(104, 1, 'Products', 10, 'Updated a Product', '2015-11-03 05:36:44'),
(105, 1, 'Products', 7, 'Updated a Product', '2015-11-03 05:38:01'),
(106, 1, 'Products', 9, 'Updated a Product', '2015-11-03 05:49:27'),
(107, 1, 'Products', 9, 'Updated a Product', '2015-11-03 05:51:10'),
(108, 1, 'Products', 9, 'Updated a Product', '2015-11-03 05:51:17'),
(109, 1, 'Products', 9, 'Updated a Product', '2015-11-03 05:51:21'),
(110, 1, 'Products', 9, 'Updated a Product', '2015-11-03 05:51:36'),
(111, 1, 'Products', 9, 'Updated a Product', '2015-11-03 05:54:50'),
(112, 1, 'Products', 9, 'Updated a Product', '2015-11-03 05:57:16'),
(113, 1, 'Products', 9, 'Updated a Product', '2015-11-03 05:57:53'),
(114, 1, 'Products', 9, 'Updated a Product', '2015-11-03 05:58:31'),
(115, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:00:15'),
(116, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:00:25'),
(117, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:00:29'),
(118, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:00:33'),
(119, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:11:32'),
(120, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:12:16'),
(121, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:13:33'),
(122, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:16:34'),
(123, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:16:45'),
(124, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:16:52'),
(125, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:16:58'),
(126, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:17:04'),
(127, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:18:58'),
(128, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:19:18'),
(129, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:21:33'),
(130, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:22:45'),
(131, 1, 'Products', 9, 'Updated a Product', '2015-11-03 06:31:48'),
(132, 1, 'Production', 11, 'Produced a new product', '2015-11-03 06:34:36'),
(133, 1, 'Products', 11, 'Updated a Product', '2015-11-03 06:34:57'),
(134, 1, 'Products', 11, 'Updated a Product', '2015-11-03 06:35:03'),
(135, 1, 'Products', 11, 'Updated a Product', '2015-11-03 06:35:19'),
(136, 1, 'Sales', 10, 'sold a product', '2015-11-03 06:35:36'),
(137, 1, 'Sales', 11, 'sold a product', '2015-11-03 06:35:47'),
(138, 1, 'Products', 7, 'Updated a Product', '2015-11-03 08:54:20'),
(139, 1, 'Products', 7, 'Updated a Product', '2015-11-03 08:56:28'),
(140, 1, 'Products', 7, 'Updated a Product', '2015-11-03 09:02:06'),
(141, 1, 'Products', 7, 'Updated a Product', '2015-11-03 09:02:38'),
(142, 1, 'Purchases', 5, 'Placed a purchase order', '2015-11-03 09:11:40'),
(143, 1, 'Purchases', 5, 'deleted a purchase order', '2015-11-03 09:11:58'),
(144, 1, 'Purchases', 1, 'Placed a purchase order', '2015-11-04 15:49:42'),
(145, 1, 'Purchases', 1, 'Added a product on a purchase order', '2015-11-04 15:57:04'),
(146, 1, 'Purchases', 2, 'Added a product on a purchase order', '2015-11-04 15:57:43'),
(147, 1, 'Purchases', 3, 'Added a product on a purchase order', '2015-11-04 15:58:07'),
(148, 1, 'Purchases', 2, 'Placed a purchase order', '2015-11-04 16:21:39'),
(149, 1, 'Purchases', 4, 'Added a product on a purchase order', '2015-11-04 16:22:51'),
(150, 1, 'Purchases', 5, 'Added a product on a purchase order', '2015-11-04 16:23:29'),
(151, 1, 'Purchases', 6, 'Added a product on a purchase order', '2015-11-04 16:26:59'),
(152, 1, 'Purchases', 7, 'Added a product on a purchase order', '2015-11-04 16:30:18'),
(153, 1, 'Purchases', 8, 'Added a product on a purchase order', '2015-11-04 16:39:22'),
(154, 1, 'Sales', 1, 'Created a Sales', '2015-11-04 18:02:20'),
(155, 1, 'Sales', 2, 'Created a Sales', '2015-11-04 18:16:42'),
(156, 1, 'Sales', 3, 'Created a Sales', '2015-11-04 18:16:52'),
(157, 1, 'Production', 1, 'Created a Production Batch', '2015-11-04 18:47:21'),
(158, 1, 'Purchases', 1, 'received product', '2015-11-04 19:47:30'),
(159, 1, 'Purchases', 2, 'received product', '2015-11-04 19:47:44'),
(160, 1, 'Purchases', 3, 'received product', '2015-11-04 19:47:52'),
(161, 1, 'Purchases', 8, 'received product', '2015-11-04 19:48:42'),
(162, 1, 'Purchases', 1, 'Cleared a purchase order', '2015-11-04 19:48:53'),
(163, 1, 'Purchases', 4, 'received product', '2015-11-04 19:49:06'),
(164, 1, 'Purchases', 5, 'received product', '2015-11-04 19:51:38'),
(165, 1, 'Purchases', 6, 'received product', '2015-11-04 19:51:44'),
(166, 1, 'Purchases', 7, 'received product', '2015-11-04 19:51:50'),
(167, 1, 'Purchases', 2, 'Cleared a purchase order', '2015-11-04 19:52:00'),
(168, 1, 'Production', 10, 'Produced a new product', '2015-11-05 06:39:10'),
(169, 1, 'Production', 2, 'Created a Production Batch', '2015-11-05 08:09:27'),
(170, 1, 'requests', 1, 'Placed a purchase order', '2015-11-05 09:34:11'),
(171, 1, 'Requests', 1, 'Added a Product Request', '2015-11-05 09:34:25'),
(172, 1, 'Production', 1, 'Created a Production Batch', '2015-11-05 09:35:27'),
(173, 1, 'Production', 11, 'Produced a new product', '2015-11-05 09:36:15'),
(174, 1, 'Production', 12, 'Produced a new product', '2015-11-05 09:43:28'),
(175, 1, 'Production', 13, 'Produced a new product', '2015-11-05 09:54:53'),
(176, 1, 'Production', 14, 'Produced a new product', '2015-11-05 10:00:38'),
(177, 1, 'Production', 15, 'Produced a new product', '2015-11-05 10:25:31'),
(178, 1, 'Sales', 4, 'Created a Sales', '2015-11-05 10:54:09'),
(179, 1, 'Sales', 1, 'Sold a Product', '2015-11-05 12:52:15'),
(180, 1, 'Sales', 2, 'Sold a Product', '2015-11-05 13:05:50'),
(181, 1, 'Sales', 0, 'Sold a Product', '2015-11-05 13:26:52'),
(182, 1, 'Sales', 0, 'Sold a Product', '2015-11-05 13:32:10'),
(183, 1, 'Sales', 0, 'Sold a Product', '2015-11-05 13:32:36'),
(184, 1, 'Users', 4, 'enabled account', '2015-11-05 14:15:47'),
(185, 1, 'Users', 4, 'disabled account', '2015-11-05 14:15:56'),
(186, 1, 'Users', 4, 'enabled account', '2015-11-05 14:16:33'),
(187, 4, 'Production', 2, 'Created a Production Batch', '2015-11-05 14:43:40'),
(188, 4, 'requests', 2, 'Placed a purchase order', '2015-11-05 15:05:06'),
(189, 4, 'Requests', 2, 'Added a Product Request', '2015-11-05 15:07:01'),
(190, 4, 'Production', 16, 'Produced a new product', '2015-11-05 15:54:13');

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
  `ingredient_cost` decimal(25,2) NOT NULL,
  PRIMARY KEY (`ingredient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `id_for`, `ingredient_ctr`, `product_id`, `ingredient_qty`, `ingredient_cost`) VALUES
(1, 12, 0, 1, '544', '0.00'),
(2, 12, 1, 2, '100', '0.00'),
(3, 12, 2, 4, '1', '0.00'),
(4, 12, 3, 5, '5', '0.00'),
(5, 12, 4, 6, '25', '0.00'),
(6, 12, 5, 8, '10', '0.00'),
(7, 13, 0, 1, '544', '0.00'),
(8, 13, 1, 2, '120', '0.00'),
(9, 13, 2, 6, '40', '0.00'),
(10, 13, 3, 4, '1', '0.00'),
(11, 13, 4, 5, '5', '0.00'),
(12, 14, 0, 1, '544', '0.00'),
(13, 14, 1, 2, '120', '0.00'),
(14, 14, 2, 4, '1', '0.00'),
(15, 14, 3, 5, '5', '0.00'),
(16, 14, 4, 6, '35', '0.00'),
(17, 14, 5, 7, '2', '0.00'),
(18, 14, 6, 8, '5', '0.00'),
(19, 15, 0, 1, '100', '0.00'),
(20, 15, 1, 2, '50', '0.00'),
(21, 15, 2, 3, '30', '0.00'),
(22, 15, 3, 4, '1', '0.00'),
(23, 15, 4, 5, '5', '0.00'),
(24, 16, 0, 1, '1000', '0.00'),
(25, 16, 1, 3, '300', '0.00'),
(26, 16, 2, 7, '10', '0.00'),
(27, 16, 3, 4, '2', '0.00'),
(28, 16, 4, 8, '5', '0.00'),
(29, 16, 5, 5, '8', '0.00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `batch_id`, `user_id`, `net_produced_qty`, `net_production_cost`, `date_produced`) VALUES
(1, '11052015ZvU', 1, '128', '22.46', '2015-11-05 09:35:27'),
(2, '11052015p3N', 4, '50', '6.24', '2015-11-05 14:43:40');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `production_batch`
--

INSERT INTO `production_batch` (`pb_id`, `batch_reference`, `product_id`, `previous_count`, `units_produced`, `production_cpu`, `total_production_cost`) VALUES
(1, '11052015ZvU', 12, '0', '24', '0.22', '5.40'),
(2, '11052015ZvU', 13, '0', '24', '0.22', '5.39'),
(3, '11052015ZvU', 14, '0', '30', '0.21', '6.28'),
(4, '11052015ZvU', 15, '0', '50', '0.11', '5.39'),
(5, '11052015p3N', 16, '0', '50', '0.12', '6.24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_Name` varchar(64) NOT NULL,
  `current_count` varchar(108) NOT NULL,
  `category_ID` tinyint(1) NOT NULL,
  `class_ID` int(11) NOT NULL,
  `supplier_ID` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_Name`, `current_count`, `category_ID`, `class_ID`, `supplier_ID`, `description`, `um`, `price`, `sale_Price`, `holding_cost`, `eoq`, `date_created`, `date_updated`, `product_status`) VALUES
(1, 'Bread Flour', '70612', 2, 1, 4, 'High Quality Bread Flour', 'g', '0.038', '0.00', '0.00', '', '2015-11-04 15:57:04', '2015-11-05 07:54:09', 1),
(2, 'White Sugar', '94710', 2, 1, 4, 'High Quality White Sugar', 'g', '0.036', '0.00', '0.00', '', '2015-11-04 15:57:42', '2015-11-05 02:25:28', 1),
(3, 'Brown Sugar', '99670', 2, 1, 4, 'High Quality Brown Sugar', 'g', '0.035', '0.00', '0.00', '', '2015-11-04 15:58:07', '2015-11-05 07:54:10', 1),
(4, 'Eggs', '945', 2, 1, 3, 'High quality chicken eggs', 'pc', '4.500', '0.00', '0.00', '', '2015-11-04 16:22:50', '2015-11-05 07:54:11', 1),
(5, 'Milk', '9799', 2, 1, 3, 'high quality milk', 'ml', '0.780', '0.00', '0.00', '', '2015-11-04 16:23:29', '2015-11-05 07:54:11', 1),
(6, 'Butter', '8675', 2, 1, 3, 'unsalted butter', 'g', '0.034', '0.00', '0.00', '', '2015-11-04 16:26:59', '2015-11-05 02:00:37', 1),
(7, 'Vanilla', '88', 2, 1, 3, 'vanilla', 'ml', '0.880', '0.00', '0.00', '', '2015-11-04 16:30:17', '2015-11-05 07:54:10', 1),
(8, 'Salt', '99490', 2, 1, 4, 'high quality salt', 'g', '0.010', '0.00', '0.00', '', '2015-11-04 16:39:22', '2015-11-05 07:54:11', 1),
(12, 'Pandesal', '14', 1, 2, 1, 'wewm', 'pc', '0.225', '0.45', '0.00', '', '2015-11-05 09:43:27', '2015-11-05 05:05:50', 1),
(13, 'Ensaymada', '14', 1, 2, 1, 'weea', 'pc', '0.225', '0.45', '0.00', '', '2015-11-05 09:54:53', '2015-11-05 05:26:52', 1),
(14, 'Spanish Bread', '20', 1, 2, 1, 'nbm bv', 'pc', '0.209', '0.42', '0.00', '', '2015-11-05 10:00:37', '2015-11-05 05:32:09', 1),
(15, 'Shit', '30', 1, 2, 1, 'asdmnasmf', 'g', '0.108', '0.22', '0.00', '', '2015-11-05 10:25:29', '2015-11-05 05:32:35', 1),
(16, 'Sapatos', '50', 1, 2, 1, 'sapatos', 'pc', '0.125', '0.25', '0.00', '', '2015-11-05 15:54:11', '0000-00-00 00:00:00', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `supplier_id`, `purchase_reference`, `total_cost`, `discount`, `date_ordered`, `date_received`, `po_status`) VALUES
(1, 1, 4, '20150pUjL08', '11900.00', 0, '2015-11-04 15:49:42', '2015-11-04 19:48:53', 1),
(2, 1, 3, '20150z7xWfS', '12728.00', 0, '2015-11-04 16:21:39', '2015-11-04 19:52:00', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`order_id`, `product_id`, `order_reference`, `qty_before_order`, `order_quantity`, `ppu`, `ordering_cost`, `order_status`) VALUES
(1, 1, '20150pUjL08', '', 100000, '0.038', '3800.00', 1),
(2, 2, '20150pUjL08', '', 100000, '0.036', '3600.00', 1),
(3, 3, '20150pUjL08', '', 100000, '0.035', '3500.00', 1),
(4, 4, '20150z7xWfS', '', 1000, '4.500', '4500.00', 1),
(5, 5, '20150z7xWfS', '', 10000, '0.780', '7800.00', 1),
(6, 6, '20150z7xWfS', '', 10000, '0.034', '340.00', 1),
(7, 7, '20150z7xWfS', '', 100, '0.880', '88.00', 1),
(8, 8, '20150pUjL08', '', 100000, '0.010', '1000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ro_id` varchar(11) NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `request_date` datetime NOT NULL,
  `request_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `user_id`, `ro_id`, `is_new`, `request_date`, `request_status`) VALUES
(1, 1, '050cCTv6wps', 1, '2015-11-05 09:34:11', 0),
(2, 4, '050VUCQoxjc', 1, '2015-11-05 15:05:06', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `request_orders`
--

INSERT INTO `request_orders` (`order_id`, `order_reference`, `product_id`, `request_qty`, `ro_status`) VALUES
(1, '050cCTv6wps', 1, '50000', 0),
(2, '050VUCQoxjc', 1, '50000000', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `invoice_code`, `user_ID`, `sales_date`, `total_qty_sold`, `total_sales`, `sales_status`) VALUES
(4, '052015ltOP7', 1, '2015-11-05 10:54:09', '50', '114.10', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`siv_id`, `invoice_id`, `product_ID`, `qty_sold`, `total_sale`) VALUES
(2, '052015ltOP7', 12, 10, '23.80'),
(3, '052015ltOP7', 13, 10, '23.80'),
(4, '052015ltOP7', 14, 10, '23.50'),
(5, '052015ltOP7', 15, 20, '43.00');

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
