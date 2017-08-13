-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2016 at 09:36 පෙ.ව.
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehms`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobdetail`
--

CREATE TABLE IF NOT EXISTS `jobdetail` (
  `jd_id` int(11) NOT NULL,
  `jtitle` varchar(200) NOT NULL,
  `jfield` varchar(200) NOT NULL,
  `jfrom` date NOT NULL,
  `jto` date NOT NULL,
  `oname` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobdetail`
--

INSERT INTO `jobdetail` (`jd_id`, `jtitle`, `jfield`, `jfrom`, `jto`, `oname`, `user_id`) VALUES
(1, 'Accountant', 'IT', '2016-12-31', '2015-12-30', 'eSOFT', 22),
(2, '', '', '0000-00-00', '0000-00-00', '', 23),
(3, 'fafaf', 'fafa', '2016-12-31', '2016-12-31', 'qqq', 23),
(4, 'gg', 'ggg', '2016-07-01', '0000-00-00', 'hh', 24),
(5, 'hh', 'hh', '2016-07-14', '2016-07-21', 'hh', 24),
(6, 'hh', 'hh', '2016-07-03', '2016-07-21', 'gg', 24),
(7, 'tt', 'tt', '2016-07-01', '2016-07-22', 'hhh', 26),
(8, 'hh', 'hh', '2016-07-04', '2016-07-19', 'uuu', 26),
(9, 'hh', 'hhh', '2016-07-04', '2016-07-22', 'hh', 26);

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
('', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 16),
('Daminda', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 5),
('daminda1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 21),
('daminda100', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 23),
('ddd', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 24),
('fftT', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 8),
('hh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 25),
('hhh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 26),
('Janitha', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
('john', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 9),
('kapila', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 22),
('ken', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 10),
('kenn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 11),
('kenna', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 12),
('kennat', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 17),
('kennath', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 18),
('Nuwan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
('rangana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 20),
('Shanaka', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4),
('Shehan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3);

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
(1, 'Web Admin'),
(2, 'Matron'),
(3, 'Staff'),
(4, 'Officer'),
(5, 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `user_image` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `nic` varchar(15) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `role_id`, `user_status`, `user_image`, `gender`, `dob`, `nic`, `tel`, `address`) VALUES
(1, 'Nuwan', 'Hema', 'n@bit.lk', 1, 'Active', '', '', '0000-00-00', '', '', ''),
(2, 'Janitha', 'Silva', 'j@bit.lk', 2, 'Active', '', '', '0000-00-00', '', '', ''),
(3, 'Shehan', 'Dabare', 's@bit.lk', 3, 'Active', '', '', '0000-00-00', '', '', ''),
(4, 'Shanaka', 'Wicra', 'ss@bit.lk', 4, 'Active', '', '', '0000-00-00', '', '', ''),
(5, 'Daminda', 'Herath', 'd@bit.lk', 5, 'Active', '', '', '0000-00-00', '', '', ''),
(6, 'daminda', 'Herath', 'dherath10@yahoo.com', 1, 'Active', '', 'M', '1980-06-28', '801590241V', '+941234567890', 'gg'),
(7, 'daminda', 'Herath', 'dherath10@yahoo.com', 1, 'Active', '', 'M', '1980-06-28', '801590241V', '+941234567890', 'gg'),
(8, 'daminda', 'Herath', 'dherath10@yahoo.com', 1, 'Active', '', 'M', '1980-06-28', '801590241V', '+941234567890', 'gg'),
(9, 'John', 'Poul', 'j@lk.lk', 3, 'Active', '', 'M', '1980-12-31', '801590201V', '+941234567890', 'Colombo'),
(10, 'Kenath', 'Danapala', 'ken@gmail.com', 0, 'Active', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(11, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(12, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(13, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(14, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(15, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(16, '', '', '', 0, 'Active', '', '', '0000-00-00', '', '', ''),
(17, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(18, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '1468057796_Routing.gif', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(19, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '1468060705_Routing.gif', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(20, 'Rangana', 'Perera', 'dherath10@yahoo.com', 5, 'Active', '1468061727_2.png', 'M', '1980-12-31', '801590241V', '+941234567890', 'Galle'),
(21, 'daminda', 'Herath', 'dherath10@yahoo.com', 4, 'Active', '1468062882_fb.png', 'M', '1980-12-12', '801590241V', '+941234567890', 'ddd'),
(22, 'Kapila', 'Henda', 'kapi@gmail.com', 4, 'Active', '', 'M', '1980-12-31', '801590241V', '+941234567890', 'ggg'),
(23, 'daminda', 'Herath', 'dherath1010@yahoo.com', 1, 'Active', '1469261950_trip.jpg', 'M', '1980-07-05', '801590241V', '+941234567890', 'hhh'),
(24, 'gg', 'gg', 'g@hh.lk', 1, 'Active', '', 'M', '1980-12-31', '801590241V', '+941234567890', 'gg'),
(25, 'hh', 'hh', 'dherath10@yahoo.com', 1, 'Active', '', 'M', '1980-12-31', '801590241V', '+941234567890', 'ff'),
(26, 'hh', 'hh', 'dherath10@yahoo.com', 1, 'Active', '', 'M', '1980-12-31', '801590241V', '+941234567890', 'ff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobdetail`
--
ALTER TABLE `jobdetail`
  ADD PRIMARY KEY (`jd_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobdetail`
--
ALTER TABLE `jobdetail`
  MODIFY `jd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
