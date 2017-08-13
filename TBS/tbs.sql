-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 09:26 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `province_id`) VALUES
(3, 'Colombo', 1),
(4, 'Kaluthara', 1),
(5, 'Gampaha', 1),
(6, 'Galle', 2),
(7, 'Mathara', 2),
(8, 'Hambanthota', 2),
(9, 'Jaffna', 3),
(10, 'Vanni', 3),
(11, 'Anuradhapura', 4),
(12, 'Polannaruwa', 4);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_date` date NOT NULL,
  `log_time` time NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_date`, `log_time`, `ip_address`, `session_id`, `user_name`) VALUES
(1, '2016-07-27', '12:21:22', '::1', '1_1469602282', 'rasith'),
(2, '2016-08-02', '19:41:07', '::1', '1_1470147067', 'rasith'),
(3, '2016-08-02', '19:41:32', '::1', '2_1470147092', 'tharindu'),
(4, '2016-08-02', '19:47:32', '::1', '2_1470147452', 'tharindu'),
(5, '2016-08-02', '20:11:42', '::1', '2_1470148902', 'tharindu'),
(6, '2016-08-02', '20:17:23', '::1', '2_1470149243', 'tharindu'),
(7, '2016-08-02', '20:35:30', '::1', '1_1470150330', 'rasith'),
(8, '2016-08-04', '09:41:07', '::1', '1_1470283867', 'rasith'),
(9, '2016-08-04', '09:43:11', '::1', '2_1470283991', 'tharindu'),
(10, '2016-08-04', '10:00:12', '::1', '2_1470285012', 'tharindu'),
(11, '2016-08-04', '11:45:17', '::1', '1_1470291317', 'rasith'),
(12, '2016-08-04', '11:46:31', '::1', '2_1470291391', 'tharindu'),
(13, '2016-08-04', '11:47:10', '::1', '4_1470291430', 'Fazlyn'),
(14, '2016-08-04', '12:01:29', '::1', '1_1470292289', 'rasith'),
(15, '2016-08-04', '12:07:00', '::1', '4_1470292620', 'Fazlyn'),
(16, '2016-08-04', '12:14:45', '::1', '2_1470293085', 'tharindu'),
(17, '2016-08-04', '12:26:08', '::1', '3_1470293768', 'rilwan'),
(18, '2016-08-04', '12:26:28', '::1', '3_1470293788', 'rilwan'),
(19, '2016-08-04', '12:26:43', '::1', '1_1470293803', 'rasith'),
(20, '2016-08-04', '12:26:52', '::1', '2_1470293812', 'tharindu'),
(21, '2016-08-04', '12:32:09', '::1', '2_1470294129', 'tharindu'),
(22, '2016-08-04', '12:32:36', '::1', '2_1470294156', 'tharindu'),
(23, '2016-08-04', '12:57:10', '::1', '3_1470295630', 'rilwan'),
(24, '2016-08-04', '12:57:24', '::1', '2_1470295644', 'tharindu'),
(25, '2016-08-04', '19:55:04', '::1', '1_1470320704', 'rasith'),
(26, '2016-08-04', '20:30:17', '::1', '2_1470322817', 'tharindu'),
(27, '2016-08-11', '09:11:13', '::1', '2_1470886873', 'tharindu'),
(28, '2016-08-15', '09:19:49', '::1', '2_1471232989', 'tharindu'),
(29, '2016-08-15', '10:07:20', '::1', '2_1471235840', 'tharindu');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_name` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_name`, `password`, `user_id`) VALUES
('bla', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 15),
('Fazlyn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4),
('hello', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 13),
('la', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 14),
('ma', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 16),
('man', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 15),
('mm', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 10),
('Rasith', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
('Rilwan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3),
('SV', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 9),
('Tharindu', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2);

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE `make` (
  `make_id` int(11) NOT NULL,
  `make_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`make_id`, `make_name`) VALUES
(1, 'Nissan'),
(2, 'Toyota'),
(3, 'Mazda'),
(4, 'Honda');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(200) NOT NULL,
  `make_id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `model_name`, `make_id`, `class`) VALUES
(1, 'Sunny N16', 1, 'Car'),
(2, 'Sunny FB15', 1, 'Car'),
(3, 'Bluebird SU12', 1, 'Car'),
(4, 'Vanette', 1, 'Van'),
(5, 'Vios', 2, 'Car'),
(6, 'Yaris', 2, 'Car'),
(7, 'Regius', 2, 'Van');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(11) NOT NULL,
  `owner_fname` varchar(200) NOT NULL,
  `owner_address` varchar(200) NOT NULL,
  `owner_nic` varchar(200) NOT NULL,
  `owner_gender` varchar(10) NOT NULL,
  `owner_image` text NOT NULL,
  `owner_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `owner_fname`, `owner_address`, `owner_nic`, `owner_gender`, `owner_image`, `owner_status`) VALUES
(1, 'Amal Silva', 'Moratuwa', '', '', '', ''),
(2, 'Rumesh Rathnayaka', 'Kandy', '', '', '', ''),
(4, 'Roshan Mahanama', 'Colombo', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'Western'),
(2, 'Southern'),
(3, 'Northern'),
(4, 'North Central');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'MD'),
(2, 'System Admin'),
(3, 'Manager'),
(4, 'Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(200) NOT NULL,
  `user_lname` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_tel_no` varchar(15) NOT NULL,
  `user_image` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_nic` varchar(20) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_tel_no`, `user_image`, `role_id`, `user_nic`, `user_status`, `dob`, `gender`, `district_id`) VALUES
(1, 'Rasith', 'Ranawaka', 'ra@gmail.com', '', '', 1, '', 'Active', '0000-00-00', 'Male', 3),
(2, 'Tharindu', 'Rangana', 'ran@gmail.com', '', '', 2, '', 'Active', '0000-00-00', 'Male', 3),
(3, 'Rilwan', 'Mohamed', 'ril@gmail.com', '+94771212121', '1468229884_malecostume-256.png', 3, '941010100V', 'Active', '1994-01-01', 'Male', 3),
(4, 'Fazlyn', 'Cader', 'faz@gmail.com', '', '', 4, '', 'Active', '0000-00-00', 'Male', 3),
(8, 'Ranbir', 'Kapoor', 'ranbir@yahoo.com', '+94774848489', '', 3, '901010101V', 'Active', '1990-02-02', 'Male', 3),
(9, 'XC', 'zxc', 'g@gmail.com', '+94774848489', 'WWW.YTS.AG.jpg', 1, '901010201V', 'Active', '1990-02-02', 'Male', 2),
(12, 'Man', 'Machine', 'm@gmail.com', '+94778899874', '1466068708_male3-256.png', 3, '943214569V', 'Active', '1994-02-12', 'Male', 1),
(14, 'Lam', 'Sal', 'la@yahoo.cm', '+94771212131', '1470287638_1468232799_finance_-56-256.png', 4, '941010122V', 'Active', '1994-01-01', 'Male', 5),
(15, 'blaa', 'caa', 'bla@yahoo.com', '+94774374877', '', 1, '943040210V', 'Active', '1994-10-31', 'Male', 3),
(16, 'mm', 'aaa', 'ma@yahoo.com', '+9476458795', '', 3, '941010143V', 'Active', '1994-10-29', 'Male', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`make_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

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
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `make`
--
ALTER TABLE `make`
  MODIFY `make_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
