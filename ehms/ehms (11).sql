-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2016 at 10:44 පෙ.ව.
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
-- Table structure for table `backup`
--

CREATE TABLE IF NOT EXISTS `backup` (
  `backup_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ref` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backup`
--

INSERT INTO `backup` (`backup_id`, `date`, `time`, `ref`, `user_id`) VALUES
(1, '2016-09-24', '18:15:26', '1474721126', 1),
(2, '2016-09-24', '18:28:57', '1474721937', 1),
(3, '2016-09-24', '18:28:58', '1474721938', 1),
(4, '2016-10-01', '15:01:53', '1475314313', 1),
(5, '2016-10-01', '15:01:59', '1475314319', 1),
(6, '2016-10-01', '15:02:01', '1475314321', 1),
(7, '2016-10-01', '15:06:11', '1475314571', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `donation_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `donation_date` date NOT NULL,
  `donation_time` time NOT NULL,
  `donation_type` varchar(20) NOT NULL,
  `amount` float NOT NULL,
  `donation_status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `donor_id`, `donation_date`, `donation_time`, `donation_type`, `amount`, `donation_status`) VALUES
(1, 6, '2016-09-24', '15:23:32', 'Fund', 1000, 'Pending'),
(2, 8, '2016-09-24', '15:24:31', 'Fund', 1000, 'Pending'),
(3, 8, '2016-09-24', '15:29:30', 'Fund', 1000, 'Pending'),
(4, 8, '2016-09-24', '15:47:42', 'Fund', 1000, 'Pending'),
(5, 8, '2016-09-24', '17:01:11', 'Fund', 3000, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
  `donor_id` int(11) NOT NULL,
  `donor_title` varchar(10) NOT NULL,
  `donor_name` varchar(200) NOT NULL,
  `donor_add` varchar(200) NOT NULL,
  `donor_tel` varchar(20) NOT NULL,
  `donor_email` varchar(200) NOT NULL,
  `donor_status` varchar(20) NOT NULL,
  `donor_nic` varchar(200) NOT NULL,
  `passwd` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `donor_title`, `donor_name`, `donor_add`, `donor_tel`, `donor_email`, `donor_status`, `donor_nic`, `passwd`) VALUES
(1, 'Mr', 'Malith', 'Colombo', '0115553333', '', 'Active', '', ''),
(2, 'Mr', 'Rasith Ranawaka', 'Borallasgamuwa', '015555555', '', 'Active', '', ''),
(3, 'Mr', 'daminda', 'Horana', '555', 'dherath10@yahoo.com', 'Active', '801590241V', ''),
(4, 'Mr', 'ddd', 'dad', '177', 'dherath10@yahoo.com', 'Active', '123456789v', '26e7458dc56ab2830fadba7bd2c1aa10e981518d'),
(5, 'Mr', 'Rahal', 'Rathnapura', '123', 'dherath10@yahoo.com', 'Active', '123456789v', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(6, 'Mr', 'DAminda Herath', 'Horana', '0777296275', 'dherath10@gmail.com', 'Active', '801590241V', '85988304de48b7758f9ea464d8d34c29747d79f3'),
(7, 'Mr', 'Amal', 'Galle', '1000', 'dherath10@gmail.com', 'Active', '11111', 'e3cbba8883fe746c6e35783c9404b4bc0c7ee9eb'),
(8, '', 'DAMINDA', '', '1111', 'dherath1010@gmail.com', '', '', ''),
(9, 'Mr', 'Nuwan', 'Horana', '0773785292', 'dherath10@yahoo.com', 'Active', '123456789v', '3cb2bf50511eacc9ec6b0d10c20baee33020893d');

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
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `log_id` int(11) NOT NULL,
  `log_in` datetime NOT NULL,
  `log_out` datetime NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `log_status` varchar(20) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_in`, `log_out`, `ip_address`, `log_status`, `session_id`, `user_id`) VALUES
(1, '2016-09-29 15:43:37', '0000-00-00 00:00:00', '::1', 'Loggedin', '1475316817_1', 1),
(2, '2016-09-30 15:44:23', '0000-00-00 00:00:00', '192.168.0.161', 'Loggedin', '1475316863_3', 3),
(3, '2016-09-27 15:44:24', '0000-00-00 00:00:00', '192.168.0.161', 'Loggedin', '1475316864_3', 3),
(4, '2016-08-30 15:46:33', '0000-00-00 00:00:00', '192.168.0.152', 'Loggedin', '1475316993_3', 3),
(5, '2016-10-01 15:57:46', '0000-00-00 00:00:00', '::1', 'Loggedin', '1475317666_1', 1),
(6, '2016-10-01 15:58:02', '0000-00-00 00:00:00', '::1', 'Loggedin', '1475317682_1', 1),
(7, '2016-10-01 15:58:37', '2016-10-01 15:58:41', '::1', 'Loggedin', '1475317717_1', 1),
(8, '2016-10-01 16:03:18', '2016-10-01 16:03:24', '::1', 'loggedout', '1475317998_3', 3),
(9, '2016-10-01 16:11:21', '2016-10-01 16:49:38', '::1', 'loggedout', '1475318481_1', 1),
(10, '2016-10-01 16:49:49', '0000-00-00 00:00:00', '::1', 'Loggedin', '1475320789_1', 1),
(11, '2016-10-06 10:52:52', '0000-00-00 00:00:00', '::1', 'Loggedin', '1475731372_3', 3),
(12, '2016-10-15 14:08:15', '0000-00-00 00:00:00', '::1', 'Loggedin', '1476520695_3', 3);

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
('achala', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 27),
('Daminda', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 5),
('daminda1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 21),
('daminda100', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 23),
('daminda123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 28),
('daminda1235', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 29),
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
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `sch_id` int(11) NOT NULL,
  `sch_date` date NOT NULL,
  `sch_status` varchar(20) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `ts_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sch_id`, `sch_date`, `sch_status`, `donor_id`, `ts_id`) VALUES
(1, '2016-08-24', 'annualy', 1, 1),
(2, '2016-08-30', '', 1, 2),
(3, '2016-08-17', '', 1, 2),
(4, '2016-09-01', '1', 5, 1),
(5, '2016-09-02', '1', 3, 1),
(6, '2016-09-01', '1', 3, 5),
(7, '2016-09-01', '1', 4, 2),
(8, '2016-10-01', '1', 1, 1),
(9, '2016-09-02', '1', 6, 2),
(10, '2016-09-02', '1', 7, 3),
(11, '2016-09-03', '1', 7, 1),
(12, '2016-09-08', '1', 3, 2),
(13, '2016-09-13', '0', 7, 1),
(14, '2016-09-03', '1', 9, 3),
(15, '2016-09-17', '1', 9, 4),
(16, '2016-10-01', '1', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE IF NOT EXISTS `time_slot` (
  `ts_id` int(11) NOT NULL,
  `ts_slot` time NOT NULL,
  `ts_type` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`ts_id`, `ts_slot`, `ts_type`) VALUES
(1, '08:00:00', 'BreakFast'),
(2, '10:00:00', 'Morning Tea'),
(3, '12:00:00', 'Lunch'),
(4, '16:00:00', 'Evening Tea'),
(5, '19:00:00', 'Dinner');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `role_id`, `user_status`, `user_image`, `gender`, `dob`, `nic`, `tel`, `address`) VALUES
(1, 'Nuwan', 'Hema', 'n@bit.lk', 1, 'Active', '', '', '0000-00-00', '', '', ''),
(2, 'Janitha', 'Silva', 'j@bit.lk', 2, 'Active', '', '', '0000-00-00', '', '', ''),
(3, 'Shehan', 'Dabare', 's@bit.lk', 3, 'Active', '', '', '0000-00-00', '', '', ''),
(4, 'Shanaka', 'Wicra', 'ss@bit.lk', 4, 'Deactive', '', '', '0000-00-00', '', '', ''),
(5, 'Daminda', 'Herath', 'd@bit.lk', 5, 'Deactive', '', '', '0000-00-00', '', '', ''),
(6, 'daminda', 'Herath', 'dherath10@yahoo.com', 1, 'Active', '', 'M', '1980-06-28', '801590241V', '+941234567890', 'gg'),
(7, 'daminda', 'Herath', 'dherath10@yahoo.com', 1, 'Active', '', 'M', '1980-06-28', '801590241V', '+941234567890', 'gg'),
(8, 'daminda', 'Herath', 'dherath10@yahoo.com', 1, 'Active', '', 'M', '1980-06-28', '801590241V', '+941234567890', 'gg'),
(9, 'John', 'Poul', 'j@lk.lk', 3, 'Deactive', '', 'M', '1980-12-31', '801590201V', '+941234567890', 'Colombo'),
(10, 'Kenath', 'Danapala', 'ken@gmail.com', 0, 'Active', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(11, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Deactive', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(12, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Deactive', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(13, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(14, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(15, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(16, '', '', '', 0, 'Active', '', '', '0000-00-00', '', '', ''),
(19, 'Kenath', 'Danapala', 'ken@gmail.com', 3, 'Active', '1468060705_Routing.gif', 'M', '1990-12-09', '901234567V', '+941234567890', 'nE'),
(20, 'Rangana', 'Perera', 'dherath10@yahoo.com', 5, 'Active', '1468061727_2.png', 'M', '1980-12-31', '801590241V', '+941234567890', 'Galle'),
(21, 'daminda', 'Herath', 'dherath10@yahoo.com', 4, 'Deactive', '1468062882_fb.png', 'M', '1980-12-12', '801590241V', '+941234567890', 'ddd'),
(22, 'Kapila', 'Henda', 'kapi@gmail.com', 4, 'Deactive', '', 'M', '1980-12-31', '801590241V', '+941234567890', 'ggg'),
(23, 'daminda', 'Herath', 'dherath1010@yahoo.com', 1, 'Active', '1472216006_pack_card.jpg', 'M', '1980-07-05', '801590241V', '+941234567890', '  hhh'),
(24, 'gg', 'gg', 'g@hh.lk', 1, 'Active', '', 'M', '1980-12-31', '801590241V', '+941234567890', 'gg'),
(25, 'hh', 'hh', 'dherath10@yahoo.com', 1, 'Active', '', 'M', '1980-12-31', '801590241V', '+941234567890', 'ff'),
(26, 'hh', 'hh', 'dherath10@yahoo.com', 1, 'Active', '', 'M', '1980-12-31', '801590241V', '+941234567890', 'ff'),
(27, 'achala', 'Perera', 'achala@yahoo.com', 2, 'Active', '1472215986_ParkReserve.jpg', 'F', '1980-12-31', '801590241V', '+941234567890', '  AAAA'),
(28, 'daminda', 'Herath', 'dherath10@yahoo.com', 3, 'Active', '1472215976_Toyota-Madiun-HIACE-High-Grade-Commuter-MT.png', 'M', '1980-01-09', '801590241V', '+941234567890', '   hh'),
(29, 'damin', 'Herathaaa', 'dherath10@yahoo.com', 3, 'Active', '1472215967_sl_map-larg.png', 'M', '1980-01-09', '801590241V', '+941234567890', '       hh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`backup_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `jobdetail`
--
ALTER TABLE `jobdetail`
  ADD PRIMARY KEY (`jd_id`);

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
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backup`
--
ALTER TABLE `backup`
  MODIFY `backup_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jobdetail`
--
ALTER TABLE `jobdetail`
  MODIFY `jd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
