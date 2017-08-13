-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2016 at 05:57 ප.ව.
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
