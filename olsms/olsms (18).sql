-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2016 at 05:59 පෙ.ව.
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qua` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `order_id`, `p_id`, `qua`, `size_id`) VALUES
(4, 2, 11, 1, 8),
(5, 2, 10, 0, 8),
(6, 2, 9, 2, 9),
(7, 3, 9, 2, 9),
(8, 3, 10, 0, 8),
(9, 4, 9, 2, 9),
(10, 4, 11, 1, 8),
(11, 4, 9, 1, 9),
(12, 4, 9, 1, 9),
(13, 4, 11, 1, 8),
(14, 5, 11, 2, 8),
(15, 5, 9, 2, 9),
(16, 5, 11, 1, 8),
(27, 6, 9, 2, 9),
(28, 7, 9, 2, 9),
(29, 7, 11, 1, 8),
(30, 9, 11, 2, 8),
(31, 10, 11, 2, 8),
(32, 10, 11, 2, 8),
(33, 10, 9, 3, 9),
(34, 10, 9, 3, 9),
(37, 11, 9, 10, 9),
(38, 11, 9, 1, 9),
(39, 11, 9, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_des` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_des`) VALUES
(1, 'BLOUSES', ''),
(2, 'TOPS', ''),
(3, 'SKIRTS', ''),
(4, 'SHIRTS', ''),
(5, 'T-SHIRTS', ''),
(6, 'TROUSERS', ''),
(7, 'JEANS', ''),
(8, 'DRESSES', '');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(200) NOT NULL,
  `color_image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`, `color_image`) VALUES
(1, 'Black', ''),
(2, 'White', ''),
(3, 'Blue', ''),
(4, 'Red', ''),
(5, 'Yellow', ''),
(6, 'Black and White', ''),
(7, 'Navy Blue', ''),
(8, 'LightPink ', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_email` varchar(200) NOT NULL,
  `cus_name` varchar(200) NOT NULL,
  `cus_tel` varchar(20) NOT NULL,
  `cus_add` varchar(200) NOT NULL,
  `cus_image` varchar(200) NOT NULL,
  `cus_status` varchar(20) NOT NULL,
  `cus_pass` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_email`, `cus_name`, `cus_tel`, `cus_add`, `cus_image`, `cus_status`, `cus_pass`) VALUES
(1, 'dherath10@gmail.com', 'Daminda', '', '', '', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'dherath10@yahoo.com', 'Herath', '', '', '', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `log_id` int(200) NOT NULL,
  `log_date` date NOT NULL,
  `log_time` time NOT NULL,
  `username` varchar(200) NOT NULL,
  `session_id` text NOT NULL,
  `ip` varchar(200) NOT NULL,
  `outdate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_date`, `log_time`, `username`, `session_id`, `ip`, `outdate`) VALUES
(1, '2016-04-03', '12:15:26', 'Rahal', '1459678526_2', '', '0000-00-00 00:00:00'),
(2, '2016-05-29', '10:05:43', 'Rahal', '1464509143_2', '', '0000-00-00 00:00:00'),
(3, '2016-05-29', '10:13:48', 'Rahal', '1464509628_2', '', '0000-00-00 00:00:00'),
(4, '2016-05-29', '10:19:05', 'Rahal', '1464509945_2', '', '0000-00-00 00:00:00'),
(5, '2016-05-29', '11:39:36', 'Rahal', '1464514776_2', '', '0000-00-00 00:00:00'),
(6, '2016-05-29', '12:01:16', 'Tamara', '1464516076_1', '', '0000-00-00 00:00:00'),
(7, '2016-05-29', '12:01:35', 'Rumesha', '1464516095_5', '', '0000-00-00 00:00:00'),
(8, '2016-05-29', '12:11:34', 'Rahal', '1464516694_2', '', '0000-00-00 00:00:00'),
(9, '2016-06-12', '10:51:16', 'Rahal', '1465721476_2', '', '0000-00-00 00:00:00'),
(10, '2016-06-12', '11:24:50', 'Tamara', '1465723490_1', '', '0000-00-00 00:00:00'),
(11, '2016-06-12', '12:29:13', 'Rahal', '1465727353_2', '', '0000-00-00 00:00:00'),
(12, '2016-06-12', '12:30:39', 'Yusra', '1465727439_4', '', '0000-00-00 00:00:00'),
(13, '2016-06-18', '08:11:36', 'Yusra', '1466230296_4', '', '0000-00-00 00:00:00'),
(14, '2016-06-18', '08:19:07', 'Tamara', '1466230747_1', '', '0000-00-00 00:00:00'),
(15, '2016-06-18', '08:36:43', 'Rahal', '1466231803_2', '', '0000-00-00 00:00:00'),
(16, '2016-06-18', '09:16:38', 'Rumesha', '1466234198_5', '', '0000-00-00 00:00:00'),
(17, '2016-06-18', '09:21:29', 'Randeer', '1466234489_3', '', '0000-00-00 00:00:00'),
(18, '2016-06-18', '09:27:17', 'Tamara', '1466234837_1', '', '0000-00-00 00:00:00'),
(19, '2016-06-25', '07:26:51', 'Tamara', '1466832411_1', '', '0000-00-00 00:00:00'),
(20, '2016-06-25', '07:43:43', 'Rahal', '1466833423_2', '', '0000-00-00 00:00:00'),
(21, '2016-06-25', '07:44:06', 'Tamara', '1466833446_1', '', '0000-00-00 00:00:00'),
(22, '2016-06-25', '07:44:17', 'Randeer', '1466833457_3', '', '0000-00-00 00:00:00'),
(23, '2016-06-25', '07:44:32', 'Rumesha', '1466833472_5', '', '0000-00-00 00:00:00'),
(24, '2016-06-25', '07:44:47', 'Tamara', '1466833487_1', '', '0000-00-00 00:00:00'),
(25, '2016-06-25', '09:40:33', 'Rahal', '1466840433_2', '', '0000-00-00 00:00:00'),
(26, '2016-06-25', '09:40:43', 'Rumesha', '1466840443_5', '', '0000-00-00 00:00:00'),
(27, '2016-06-25', '09:41:03', 'Randeer', '1466840463_3', '', '0000-00-00 00:00:00'),
(28, '2016-06-25', '09:41:15', 'Tamara', '1466840475_1', '', '0000-00-00 00:00:00'),
(29, '2016-06-25', '09:41:48', 'Yusra', '1466840508_4', '', '0000-00-00 00:00:00'),
(30, '2016-06-28', '14:38:49', 'Tamara', '1467117529_1', '', '0000-00-00 00:00:00'),
(31, '2016-06-28', '14:39:32', 'Rahal', '1467117572_2', '', '0000-00-00 00:00:00'),
(32, '2016-06-28', '14:47:20', 'Tamara', '1467118040_1', '', '0000-00-00 00:00:00'),
(33, '2016-06-28', '14:47:50', 'Rahal', '1467118070_2', '', '0000-00-00 00:00:00'),
(34, '2016-06-29', '06:47:17', 'Rahal', '1467175637_2', '', '0000-00-00 00:00:00'),
(35, '2016-07-02', '07:35:46', 'Rahal', '1467437746_2', '', '0000-00-00 00:00:00'),
(36, '2016-07-02', '07:36:29', 'Tamara', '1467437789_1', '', '0000-00-00 00:00:00'),
(37, '2016-07-03', '10:54:46', 'Tamara', '1467536086_1', '', '0000-00-00 00:00:00'),
(38, '2016-07-03', '10:57:04', 'Rumesha', '1467536224_5', '', '0000-00-00 00:00:00'),
(39, '2016-07-03', '10:58:21', 'Rahal', '1467536301_2', '', '0000-00-00 00:00:00'),
(40, '2016-07-03', '11:11:33', 'Tamara', '1467537093_1', '', '0000-00-00 00:00:00'),
(41, '2016-07-03', '11:12:00', 'Rahal', '1467537120_2', '', '0000-00-00 00:00:00'),
(42, '2016-07-03', '11:12:15', 'Yusra', '1467537135_4', '', '0000-00-00 00:00:00'),
(43, '2016-07-03', '11:12:34', 'Rumesha', '1467537154_5', '', '0000-00-00 00:00:00'),
(44, '2016-07-03', '11:14:11', 'Tamara', '1467537251_1', '', '0000-00-00 00:00:00'),
(45, '2016-07-09', '05:46:01', 'Tamara', '1468035961_1', '', '0000-00-00 00:00:00'),
(46, '2016-07-09', '07:35:27', 'Tamara', '1468042527_1', '', '0000-00-00 00:00:00'),
(47, '2016-07-16', '05:23:42', 'Tamara', '1468639422_1', '', '0000-00-00 00:00:00'),
(48, '2016-07-16', '05:45:18', 'Rahal', '1468640718_2', '', '0000-00-00 00:00:00'),
(49, '2016-07-16', '05:45:53', 'Randeer', '1468640753_3', '', '0000-00-00 00:00:00'),
(50, '2016-07-16', '05:56:20', 'Tamara', '1468641380_1', '', '0000-00-00 00:00:00'),
(51, '2016-07-17', '10:43:50', 'Tamara', '1468745030_1', '', '0000-00-00 00:00:00'),
(52, '2016-07-17', '10:55:09', 'Rahal', '1468745709_2', '', '0000-00-00 00:00:00'),
(53, '2016-07-17', '11:01:09', 'Tamara', '1468746069_1', '', '0000-00-00 00:00:00'),
(54, '2016-07-23', '05:40:00', 'Tamara', '1469245200_1', '', '0000-00-00 00:00:00'),
(55, '2016-07-24', '09:36:57', 'Tamara', '1469345817_1', '', '0000-00-00 00:00:00'),
(56, '2016-07-28', '08:18:37', 'Tamara', '1469686717_1', '', '0000-00-00 00:00:00'),
(57, '2016-07-28', '08:18:58', 'Rahal', '1469686738_2', '', '0000-00-00 00:00:00'),
(58, '2016-07-28', '14:14:23', 'Tamara', '1469708063_1', '', '0000-00-00 00:00:00'),
(59, '2016-07-30', '05:47:42', 'Tamara', '1469850462_1', '', '0000-00-00 00:00:00'),
(60, '2016-08-06', '05:46:17', 'Tamara', '1470455177_1', '', '0000-00-00 00:00:00'),
(61, '2016-08-06', '06:03:28', 'Tamara', '1470456208_1', '', '0000-00-00 00:00:00'),
(62, '2016-08-06', '06:07:50', 'Tamara', '1470456470_1', '', '0000-00-00 00:00:00'),
(63, '2016-08-13', '05:37:49', 'Tamara', '1471059469_1', '', '0000-00-00 00:00:00'),
(64, '2016-08-19', '21:01:29', 'Tamara', '1471633289_1', '', '0000-00-00 00:00:00'),
(65, '2016-08-20', '05:25:10', 'Tamara', '1471663510_1', '', '0000-00-00 00:00:00'),
(66, '2016-08-27', '05:38:19', 'Tamara', '1472269099_1', '', '0000-00-00 00:00:00'),
(67, '2016-08-27', '08:25:04', 'Tamara', '1472279104_1', '', '0000-00-00 00:00:00'),
(68, '2016-08-27', '08:30:43', 'Tamara', '1472279443_1', '::1', '0000-00-00 00:00:00'),
(69, '2016-09-02', '11:24:23', 'Tamara', '1472808263_1', '::1', '0000-00-00 00:00:00'),
(70, '2016-09-02', '11:25:01', 'Rumesha', '1472808301_5', '::1', '0000-00-00 00:00:00'),
(71, '2016-09-02', '11:34:58', 'Tamara', '1472808898_1', '::1', '0000-00-00 00:00:00'),
(72, '2016-09-02', '11:43:08', 'Rumesha', '1472809388_5', '::1', '0000-00-00 00:00:00'),
(73, '2016-09-02', '15:54:36', 'Randeer', '1472824476_3', '::1', '0000-00-00 00:00:00'),
(74, '2016-09-02', '15:55:48', 'Rahal', '1472824548_2', '::1', '0000-00-00 00:00:00'),
(75, '2016-09-03', '05:50:06', 'Rahal', '1472874606_2', '::1', '0000-00-00 00:00:00'),
(76, '2016-09-04', '14:04:43', 'Tamara', '1472990683_1', '::1', '0000-00-00 00:00:00'),
(77, '2016-09-16', '05:32:33', 'Rahal', '1473996753_2', '::1', '0000-00-00 00:00:00'),
(78, '2016-09-21', '11:49:48', 'Tamara', '1474451388_1', '::1', '0000-00-00 00:00:00'),
(79, '2016-09-30', '07:28:51', 'Tamara', '1475213331_1', '::1', '0000-00-00 00:00:00'),
(80, '2016-09-30', '07:29:07', 'Rahal', '1475213347_2', '::1', '0000-00-00 00:00:00'),
(81, '2016-10-15', '07:22:09', 'Tamara', '1476508929_1', '::1', '0000-00-00 00:00:00'),
(82, '2016-10-15', '07:22:24', 'Rahal', '1476508944_2', '::1', '0000-00-00 00:00:00'),
(83, '2016-10-22', '05:32:32', 'Rahal', '1477107152_2', '::1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_id`) VALUES
('', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 17),
('aaaaaaaggg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 8),
('bb', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 16),
('da', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 14),
('dada', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 15),
('dddddd', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 10),
('dddddd555', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 11),
('dddddd5557', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 12),
('dddddd55578', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 13),
('ddddddd', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 19),
('fffff', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 18),
('Rahal', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
('Randeer', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3),
('Rumesha', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 5),
('Tamara', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
('Yusra', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`) VALUES
(1, 'Product'),
(2, 'Customer'),
(3, 'Order'),
(4, 'Payment'),
(5, 'Report'),
(6, 'Supplier'),
(7, 'Stock'),
(8, 'User'),
(9, 'Feedback'),
(10, 'Delivery'),
(11, 'Tracking');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `cus_id` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `cus_id`, `session_id`, `shipping_id`, `order_status`) VALUES
(2, '2016-09-17 00:00:00', 1, '1474088572::1', 0, 'Success'),
(3, '2016-09-23 00:00:00', 1, '1474616192::1', 0, 'Success'),
(4, '2016-09-24 00:00:00', 1, '1474688533::1', 0, 'Success'),
(5, '2016-09-26 00:00:00', 0, '1474865256::1', 0, 'Pending'),
(6, '2016-09-30 00:00:00', 0, '1475213385::1', 0, 'Pending'),
(7, '2016-10-01 00:00:00', 1, '1475295988::1', 0, 'Success'),
(8, '2016-10-06 00:00:00', 0, '1475729196::1', 0, 'Pending'),
(9, '2016-10-15 00:00:00', 1, '1476503298::1', 0, 'Success'),
(10, '2016-10-15 00:00:00', 0, '1476503576::1', 0, 'Pending'),
(11, '2016-10-15 00:00:00', 0, '1476507677::1', 0, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pay_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `order_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `pay_status` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `amount`, `order_id`, `cus_id`, `pdate`, `pay_status`) VALUES
(1, 0, 4, 1, '2016-09-24', 'Paid'),
(2, 3790, 7, 1, '2016-10-01', 'Paid'),
(3, 2420, 9, 1, '2016-10-15', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_type` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_color` int(11) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_image` varchar(200) NOT NULL,
  `p_status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_type`, `cat_id`, `p_color`, `p_price`, `p_image`, `p_status`) VALUES
(9, 'Georgette Mix High Neck Dress', 'Women', 8, 6, 1290, '9_Screenshot from 2016-09-02 20:05:31.png', 'Active'),
(10, 'Dotted Neck Lace Top', 'Women', 2, 2, 800, '10_1.png', 'Active'),
(11, 'Georgette Pleat Blouse', 'Women', 1, 7, 1210, '11_2.png', 'Active'),
(12, 'Blue T-Shirt for Men', 'Men', 5, 3, 990, '12_other-1640-8578991-1-zoom.jpg', 'Active'),
(13, 'Lace Side Open Skirt', 'Women', 3, 8, 1390, '13_3.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE IF NOT EXISTS `product_size` (
  `p_id` int(11) NOT NULL,
  `size_id` varchar(200) NOT NULL,
  `p_status` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`p_id`, `size_id`, `p_status`) VALUES
(1, '11', ''),
(2, '1', ''),
(3, '1', ''),
(4, '1', ''),
(5, '1', ''),
(6, '2', ''),
(9, '9', ''),
(10, '7', ''),
(10, '8', ''),
(11, '7', ''),
(11, '8', ''),
(12, '10', ''),
(12, '7', ''),
(12, '8', ''),
(12, '9', ''),
(13, '10', ''),
(13, '7', ''),
(13, '8', ''),
(13, '9', '');

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(200) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`r_id`, `r_name`, `module_id`) VALUES
(1, 'Add Product', 1),
(2, 'Edit Product', 1),
(3, 'Delete Product', 1),
(4, 'View Product', 1),
(5, 'View Customer', 2),
(6, 'Activate/Deactivate Customer', 2),
(7, 'View Order', 3),
(8, 'Add Order', 3),
(9, 'Delete Order', 3),
(10, 'Add Payment', 4),
(11, 'View Payment', 4),
(12, 'View Report', 5),
(13, 'Add Supplier', 6),
(14, 'Edit Supplier', 6),
(15, 'Delete Supplier', 6),
(16, 'View Supplier', 6),
(17, 'Add Stock', 7),
(18, 'Edit Stock', 7),
(19, 'View Stock', 7),
(20, 'Delete Stock', 7),
(21, 'Add User', 8),
(22, 'Edit User', 8),
(23, 'Deactivate/Activate User ', 8),
(24, 'View Feedback', 9),
(25, 'Add Delivery', 10),
(26, 'View Delivery', 10),
(27, 'View Tracking', 11);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Stock Officer'),
(3, 'Accountant'),
(4, 'Manager'),
(5, 'Sale Ref');

-- --------------------------------------------------------

--
-- Table structure for table `role_rights`
--

CREATE TABLE IF NOT EXISTS `role_rights` (
  `role_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_rights`
--

INSERT INTO `role_rights` (`role_id`, `r_id`) VALUES
(1, 12),
(1, 21),
(1, 22),
(1, 23),
(1, 27),
(3, 5),
(3, 7),
(3, 10),
(3, 11),
(3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `size_id` int(11) NOT NULL,
  `size_code` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_code`) VALUES
(1, '30'),
(2, '31'),
(3, '32'),
(4, '33'),
(5, '34'),
(6, '35'),
(7, 'S'),
(8, 'M'),
(9, 'L'),
(10, 'XL'),
(11, '14.5'),
(12, '15'),
(13, '15.5'),
(14, '16');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_qua` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `stock_price` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `stock_status` varchar(200) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `s_id` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_qua`, `stock_date`, `stock_price`, `p_id`, `size_id`, `stock_status`, `sup_id`, `s_id`, `user_id`) VALUES
(9, 20, '2016-10-15', 1000, 9, 9, 'Active', 3, '', 2),
(10, 10, '2016-10-15', 1200, 10, 7, 'Active', 2, '', 2),
(11, 40, '2016-10-15', 1200, 10, 8, 'Active', 2, '', 2),
(12, 12, '2016-10-15', 1000, 10, 7, 'Active', 2, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stock_balance`
--

CREATE TABLE IF NOT EXISTS `stock_balance` (
  `p_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_balance`
--

INSERT INTO `stock_balance` (`p_id`, `balance`, `size_id`) VALUES
(9, 5, 9),
(10, 22, 7),
(10, 40, 8);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(200) NOT NULL,
  `sup_email` varchar(200) NOT NULL,
  `sup_tel` varchar(20) NOT NULL,
  `sup_address` varchar(200) NOT NULL,
  `sup_logo` text NOT NULL,
  `sup_status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `sup_email`, `sup_tel`, `sup_address`, `sup_logo`, `sup_status`) VALUES
(1, 'LUV SL', '', '', '', '', ''),
(2, 'CLOSET', '', '', '', '', ''),
(3, 'Tara', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `u_fname` varchar(200) NOT NULL,
  `u_lname` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_image` text NOT NULL,
  `u_gender` varchar(10) NOT NULL,
  `u_dob` date NOT NULL,
  `u_status` varchar(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `u_telno` varchar(20) NOT NULL,
  `u_nic` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `u_fname`, `u_lname`, `u_email`, `u_image`, `u_gender`, `u_dob`, `u_status`, `role_id`, `u_telno`, `u_nic`) VALUES
(1, ' Tamara', 'Sugandi', 'ta@gmail.com', '1_ught-iron-house-letter-m-LET-M-2.jpg', 'Female', '0000-00-00', 'Active', 1, '', ''),
(2, 'Rahal', 'Ranasinghe', 'ra@gmail.com', '', '', '0000-00-00', 'Active', 2, '', ''),
(3, 'Randeer', 'Kapoor', 'rk@gmail.com', '', 'male', '0000-00-00', 'Active', 3, '', ''),
(4, ' Yusra', 'Yusura', 'yu@gmail.com', '', 'Female', '0000-00-00', 'Active', 4, '', '188888'),
(5, 'Rumesha', 'Shalani', 'ru@gmail.com', '', 'female', '0000-00-00', 'Active', 5, '', ''),
(6, 'aaa', 'aaa', 'aa', '', 'Male', '2016-12-31', 'Active', 1, '111111', '111'),
(7, 'aaa', 'aaa', 'aa', '', 'Male', '2016-12-31', 'Deactive', 1, '111111', '111'),
(8, 'aaa', 'aaa', 'aa', '', 'Male', '2016-12-31', 'Deactive', 1, '111111', '111'),
(9, 'aaa', 'aaa', 'aa', '', 'Male', '2016-12-31', 'Active', 1, '111111', '111'),
(10, 'ddd', 'ddd', 'ddd', '', 'Male', '2016-12-31', 'Active', 3, '66', '111'),
(11, 'ddd', 'ddd', 'ddd', '', 'Male', '2016-12-31', 'Deactive', 3, '66', '111'),
(12, 'ddd', 'ddd', 'ddd', '', 'Male', '2016-12-31', 'Deactive', 3, '66', '111'),
(13, 'ddd', 'ddd', 'ddd', '', 'Male', '2016-12-31', 'Deactive', 3, '66', '111'),
(14, 'Daminda', 'Herath', 'd', '', 'Male', '2016-12-31', 'Deactive', 1, '6666', '1233'),
(15, 'Daminda', 'Herath', 'd', '', 'Male', '2016-12-31', 'Deactive', 1, '6666', '1233'),
(16, '     amaljjj', 'ab', 'd@herath', '16_ught-iron-house-letter-m-LET-M-2.jpg', 'Female', '2014-12-31', 'Deactive', 3, '222', '222'),
(17, 'gg', '', '', '', '', '0000-00-00', 'Active', 0, '', ''),
(18, 'ff', 'ff', 'aa@jj.lk', '', '', '1990-12-06', 'Active', 0, '', ''),
(19, 'dd', 'aaa', 'aa@jj.lk', '', '', '1998-12-10', 'Active', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE IF NOT EXISTS `user_rights` (
  `user_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`user_id`, `r_id`) VALUES
(4, 7),
(4, 8),
(4, 9),
(4, 17),
(11, 5),
(12, 5),
(13, 5),
(13, 6),
(13, 7),
(13, 8),
(13, 9),
(13, 10),
(13, 11),
(13, 12),
(13, 13),
(14, 12),
(14, 21),
(14, 22),
(14, 23),
(14, 27),
(15, 12),
(15, 21),
(15, 22),
(15, 23),
(15, 27),
(16, 1),
(16, 5),
(16, 6),
(16, 7),
(16, 8),
(16, 9),
(16, 10),
(16, 11),
(16, 12),
(16, 13),
(16, 17),
(16, 18),
(16, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`p_id`,`size_id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_rights`
--
ALTER TABLE `role_rights`
  ADD PRIMARY KEY (`role_id`,`r_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `stock_balance`
--
ALTER TABLE `stock_balance`
  ADD PRIMARY KEY (`p_id`,`size_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`user_id`,`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
