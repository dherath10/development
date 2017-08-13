-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2014 at 10:04 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wblms`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `Author_ID` int(12) NOT NULL AUTO_INCREMENT,
  `Author_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Author_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Author_ID`, `Author_Name`) VALUES
(1, 'Waris Dirie'),
(2, 'Agatha Christie'),
(3, 'Douglas Kramer '),
(4, 'Barry Sutton'),
(5, 'Mark Lutz'),
(6, 'Nalin De Silva'),
(7, 'Jemes Gosling'),
(8, 'Rajini Thiranagama'),
(9, 'Sidney Sheldon'),
(10, 'Sean D. Murphy'),
(11, 'Stephen King'),
(12, 'Edsger W. Dijkstra'),
(13, 'Argon Peter'),
(14, 'Tim Berners-Lee'),
(15, 'Ian Sommerville'),
(16, 'Evan R Prey'),
(17, 'Marlan Lamb'),
(18, 'Richard Stallman'),
(19, 'Sarath Siyabalapitiya'),
(20, 'Ian Thope'),
(21, 'Sarath Gunapala'),
(22, 'Andy Rathbone'),
(23, 'Arthur C. Clarke'),
(24, 'Nihal De Silva'),
(25, 'Christopher J. Date'),
(26, 'Uyless D. Black'),
(27, 'Tanenbaum, Andrew S. '),
(28, 'Edward Clodd'),
(29, 'Arthur Conan Doyle'),
(30, 'Burden L Richard '),
(31, 'gan'),
(32, 'Philp Heller'),
(33, 'Dr. Bankim Patel'),
(34, 'Burden'),
(35, ' Richard '),
(36, ' Daminda Herath'),
(37, ' Argon Peter'),
(38, ' Agatha Christie'),
(39, ' '),
(40, ' Nalin De Silva'),
(41, ' Rajini Thiranagama');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `Item_ID` int(12) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `Author_ID` int(12) NOT NULL,
  `Pages` varchar(50) NOT NULL,
  PRIMARY KEY (`Item_ID`,`Author_ID`),
  KEY `Author_ID` (`Author_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Item_ID`, `ISBN`, `Author_ID`, `Pages`) VALUES
(191, ' 0321197844', 25, '546'),
(192, '0131756052', 26, '448'),
(193, '0130661023', 27, '467'),
(194, '0486653633', 28, '428'),
(194, '0486653633', 29, '450'),
(196, '0538735635', 30, '498'),
(197, '0314262687', 10, '344'),
(198, '8176560774', 3, '450'),
(200, '1234567891', 6, '456'),
(200, '1234567891', 29, '456'),
(201, '8888888888888', 36, '200'),
(201, '8888888888888', 39, '200'),
(202, '6666666666666', 37, '300'),
(202, '6666666666666', 38, '300'),
(202, '6666666666666', 39, '300'),
(203, '3333333333333', 36, '230'),
(203, '3333333333333', 39, '230'),
(203, '3333333333333', 40, '230'),
(203, '3333333333333', 41, '230'),
(204, '2222222222222', 37, '123'),
(204, '2222222222222', 39, '123'),
(205, '2222444444444', 38, '44'),
(205, '2222444444444', 39, '44');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
  `Borrow_ID` int(12) NOT NULL AUTO_INCREMENT,
  `Accession_No` int(12) NOT NULL,
  `User_ID` int(12) NOT NULL,
  `Borrow_Date` date NOT NULL,
  `Return_Date` date NOT NULL,
  `Actual_Return_Date` date NOT NULL,
  `Rstatus` varchar(100) NOT NULL,
  `reminder` varchar(1) NOT NULL,
  PRIMARY KEY (`Borrow_ID`),
  KEY `Accession_No` (`Accession_No`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`Borrow_ID`, `Accession_No`, `User_ID`, `Borrow_Date`, `Return_Date`, `Actual_Return_Date`, `Rstatus`, `reminder`) VALUES
(1, 623, 32, '2014-02-13', '2014-02-27', '2014-02-14', 'Yes', '1'),
(2, 659, 32, '2014-02-13', '2014-02-27', '2014-03-01', 'Yes', '1'),
(3, 614, 32, '2014-02-13', '2014-02-27', '2014-02-14', 'Yes', '1'),
(4, 612, 32, '2014-02-13', '2014-02-27', '2014-02-14', 'Yes', '1'),
(5, 616, 32, '2014-02-13', '2014-02-27', '2014-02-14', 'Yes', '1'),
(6, 632, 32, '2014-02-13', '2014-02-27', '2014-02-13', 'Yes', '1'),
(7, 638, 39, '2014-02-13', '2014-02-27', '2014-02-14', 'Yes', '1'),
(8, 614, 73, '2014-02-14', '2014-02-28', '2014-02-14', 'Yes', '0'),
(9, 659, 73, '2014-02-14', '2014-02-28', '2014-02-14', 'Yes', '0'),
(10, 612, 73, '2014-02-14', '2014-02-28', '2014-02-14', 'Yes', '0'),
(11, 632, 73, '2014-02-14', '2014-02-28', '2014-02-14', 'Yes', '0'),
(12, 626, 42, '2014-02-14', '2014-02-28', '2014-02-14', 'Yes', '0'),
(13, 625, 42, '2014-02-14', '2014-02-28', '2014-02-14', 'Yes', '0'),
(14, 613, 42, '2014-02-14', '2014-02-28', '2014-02-14', 'Yes', '0'),
(15, 615, 42, '2014-02-14', '2014-02-28', '0000-00-00', 'No', '0'),
(16, 653, 39, '2014-02-14', '2014-02-28', '2014-02-16', 'Yes', '0'),
(17, 632, 39, '2014-02-14', '2014-02-28', '0000-00-00', 'No', '0'),
(18, 612, 43, '2014-02-14', '2014-02-28', '2014-03-05', 'Yes', '0'),
(19, 624, 31, '2014-02-14', '2014-02-28', '0000-00-00', 'No', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory` text NOT NULL,
  `mid` int(11) NOT NULL,
  `shelf` text NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `mid` (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `subcategory`, `mid`, `shelf`) VALUES
(1, 'SCIENCE AND KNOWLEDGE', 0, '0'),
(2, 'ORGANIZATION', 0, '0'),
(3, 'COMPUTER SCIENCE', 0, '0'),
(4, 'INFORMATION', 0, '0'),
(5, 'DOCUMENTATION', 0, '0'),
(6, 'LIBRARIANSHIP', 0, '0'),
(7, 'INSTITUTIONS', 0, '0'),
(8, 'PUBLICATIONS', 0, '0'),
(9, 'PHILOSOPHY', 1, '1'),
(10, 'PSYCHOLOGY', 1, '1'),
(11, 'RELIGION', 2, '2'),
(12, 'THEOLOGY', 2, '2'),
(13, 'SOCIAL SCIENCES', 3, '3'),
(14, 'MATHEMATICS', 5, '5'),
(15, 'NATURAL SCIENCES', 5, '5'),
(16, 'APPLIED SCIENCES', 6, '6'),
(17, 'MEDICINE', 6, '6'),
(18, 'TECHNOLOGY', 6, '6'),
(19, 'THE ARTS', 7, '7'),
(20, 'RECREATION', 7, '7'),
(21, 'ENTERTAINMENT', 7, '7'),
(22, 'SPORT', 7, '7'),
(23, 'LANGUAGE', 8, '8'),
(24, 'LINGUISTICS', 8, '8'),
(25, 'LITERATURE', 8, '8'),
(26, 'GEOGRAPHY', 9, '9'),
(27, 'BIOGRAPHY', 9, '9'),
(28, 'HISTORY', 9, '9');

-- --------------------------------------------------------

--
-- Table structure for table `cd/dvd`
--

CREATE TABLE IF NOT EXISTS `cd/dvd` (
  `Item_ID` int(12) NOT NULL,
  `Size` varchar(50) NOT NULL,
  PRIMARY KEY (`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `copy`
--

CREATE TABLE IF NOT EXISTS `copy` (
  `Accession_No` int(12) NOT NULL AUTO_INCREMENT,
  `Item_ID` int(12) NOT NULL,
  `State_ID` int(12) NOT NULL,
  `Purchased_Date` date NOT NULL,
  `Date_Added` date NOT NULL,
  `Price` varchar(200) NOT NULL,
  `Shelf_No` varchar(50) NOT NULL,
  `Availability` varchar(50) NOT NULL,
  PRIMARY KEY (`Accession_No`),
  KEY `State_ID` (`State_ID`),
  KEY `Item_ID` (`Item_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=673 ;

--
-- Dumping data for table `copy`
--

INSERT INTO `copy` (`Accession_No`, `Item_ID`, `State_ID`, `Purchased_Date`, `Date_Added`, `Price`, `Shelf_No`, `Availability`) VALUES
(612, 191, 1, '2013-01-01', '2013-12-01', 'Rs 1000', '1234', 'Available'),
(613, 191, 1, '2013-01-01', '2013-12-01', 'Rs 1000', '1234', 'Available'),
(614, 191, 1, '2013-01-01', '2013-12-01', '$ 172', '1234', 'Available'),
(615, 191, 1, '2013-01-01', '2013-12-01', '$ 172', '1234', 'Borrowed'),
(616, 191, 2, '2013-01-01', '2013-12-01', '$ 172', '1234', 'Available'),
(623, 192, 1, '2013-04-09', '2013-12-01', '$ 107.69', '1234', 'Reserved'),
(624, 192, 1, '2013-04-09', '2013-12-01', '$ 107.69', '1234', 'Borrowed'),
(625, 192, 1, '2013-04-09', '2013-12-01', '$ 107.69', '1234', 'Reserved'),
(626, 191, 1, '2013-05-06', '2013-12-02', 'Rs 777', '1234', 'Available'),
(632, 193, 1, '2012-02-18', '2013-12-01', 'Rs 1000', '1234', 'Borrowed'),
(634, 194, 1, '2013-03-07', '2013-12-01', 'Rs 4000', '123', 'Available'),
(637, 196, 2, '2013-12-01', '2013-12-01', 'Rs 1000', '', 'Available'),
(638, 197, 1, '2012-02-18', '2013-12-01', 'Rs 1300', '', 'Available'),
(653, 198, 1, '2007-03-04', '2013-12-03', 'Rs 950', '10', 'Available'),
(654, 198, 1, '2013-06-10', '2013-12-03', 'Rs 1400', '10', 'Available'),
(655, 199, 2, '2013-04-13', '2013-12-04', 'Rs 800', '', 'Available'),
(656, 199, 2, '2013-04-13', '2013-12-04', 'Rs 2000', '', 'Available'),
(657, 199, 2, '2013-04-13', '2013-12-04', 'Rs 900', '', 'Available'),
(658, 199, 2, '2013-04-13', '2013-12-04', 'Rs 580', '', 'Available'),
(659, 200, 1, '1996-02-18', '2013-12-10', 'Rs 700', '', 'Reserved'),
(663, 201, 1, '2013-02-01', '2014-02-16', 'd d', '2', 'Available'),
(664, 201, 1, '2013-02-01', '2014-02-16', 'd d', '', 'Available'),
(665, 201, 1, '2013-02-01', '2014-02-16', 'd d', '', 'Available'),
(666, 202, 1, '2013-03-04', '2014-02-16', 'Rs 1000', '', 'Available'),
(667, 202, 1, '2013-03-04', '2014-02-16', 'Rs 1000', '', 'Available'),
(668, 202, 1, '2013-03-04', '2014-02-16', 'Rs 1000', '', 'Available'),
(669, 203, 1, '2013-03-17', '2014-02-16', 'd d', '', 'Available'),
(670, 203, 1, '2013-03-17', '2014-02-16', 'd d', '', 'Available'),
(671, 204, 1, '2014-01-17', '2014-02-16', 'd d', '', 'Available'),
(672, 205, 1, '2012-10-08', '2014-02-16', 'd d', '', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `current_borrow`
--

CREATE TABLE IF NOT EXISTS `current_borrow` (
  `Lib_Ses_ID` varchar(255) NOT NULL,
  `Item_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Accession_No` int(11) NOT NULL,
  `Item_Type_Name` varchar(10) NOT NULL,
  `Call_No` varchar(100) NOT NULL,
  `Borrow_Status` varchar(20) NOT NULL,
  `Time_ID` int(11) NOT NULL,
  PRIMARY KEY (`Lib_Ses_ID`,`Item_ID`,`Accession_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_borrow`
--

INSERT INTO `current_borrow` (`Lib_Ses_ID`, `Item_ID`, `U_ID`, `Title`, `Image`, `Accession_No`, `Item_Type_Name`, `Call_No`, `Borrow_Status`, `Time_ID`) VALUES
('S00391393263225', 191, 39, 'An introduction to database systems ', '191.jpg', 614, 'Book', '004.65.DJ', 'No', 1393263237),
('S00441392418223', 191, 44, 'An introduction to database systems ', '191.jpg', 613, 'Book', '004.65.DJ', 'No', 1392418249),
('S00441392418223', 197, 44, 'Principles of International Law', '197.jpg', 638, 'Book', '341.6 SD', 'No', 1392418293),
('S00441392418223', 198, 44, 'Java 2 complete', '198.jpg', 654, 'Book', '004.432.42 DK', 'No', 1392418272);

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE IF NOT EXISTS `fine` (
  `Fine_ID` int(11) NOT NULL,
  `Borrow_ID` int(11) NOT NULL,
  `User_ID` int(12) NOT NULL,
  `Fine` int(11) NOT NULL,
  `Actual_Return_Date` date NOT NULL,
  `Fstatus` varchar(10) NOT NULL,
  PRIMARY KEY (`Fine_ID`,`Borrow_ID`,`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`Fine_ID`, `Borrow_ID`, `User_ID`, `Fine`, `Actual_Return_Date`, `Fstatus`) VALUES
(1392370219, 9, 73, 0, '2014-02-14', 'No Fine'),
(1392370231, 10, 73, 0, '2014-02-14', 'No Fine'),
(1392370264, 4, 32, 0, '2014-02-14', 'No Fine'),
(1392370460, 11, 73, 0, '2014-02-14', 'No Fine'),
(1392370494, 14, 42, 0, '2014-02-14', 'No Fine'),
(1392370525, 1, 32, 0, '2014-02-14', 'No Fine'),
(1392370525, 3, 32, 0, '2014-02-14', 'No Fine'),
(1392370525, 7, 39, 0, '2014-02-14', 'No Fine'),
(1392380701, 8, 73, 0, '2014-02-14', 'No Fine'),
(1392396922, 13, 42, 0, '2014-02-14', 'No Fine'),
(1392418051, 5, 32, 0, '2014-02-14', 'No Fine'),
(1392418051, 12, 42, 0, '2014-02-14', 'No Fine'),
(1392556428, 16, 39, 0, '2014-02-16', 'No Fine'),
(1394038948, 18, 43, 25, '2014-03-05', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_pwd`
--

CREATE TABLE IF NOT EXISTS `forgot_pwd` (
  `Email` text NOT NULL,
  `Date_Changed` date NOT NULL,
  `Time_Changed` time NOT NULL,
  `Changed_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(12) NOT NULL,
  `Status` varchar(200) NOT NULL,
  PRIMARY KEY (`Changed_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `forgot_pwd`
--

INSERT INTO `forgot_pwd` (`Email`, `Date_Changed`, `Time_Changed`, `Changed_ID`, `User_ID`, `Status`) VALUES
('nishan@esoft.lk', '2013-12-04', '15:06:59', 14, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2013-12-04', '15:30:38', 15, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2013-12-04', '15:31:11', 16, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2013-12-04', '15:33:43', 17, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2013-12-04', '15:47:29', 18, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2013-12-04', '15:53:08', 19, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2013-12-04', '15:54:26', 20, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2013-12-04', '15:57:08', 21, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2013-12-04', '15:57:41', 22, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2013-12-05', '09:54:38', 23, 0, 'NotApproved'),
('dherath10@yahoo.com', '2013-12-10', '15:41:36', 24, 0, 'NotApproved'),
('ss1@gg.lk', '2013-12-10', '15:44:11', 25, 0, 'NotApproved'),
('ss1@gg.lk', '2013-12-10', '15:44:51', 26, 0, 'NotApproved'),
('ss1@gg.lk', '2013-12-10', '15:48:10', 27, 0, 'NotApproved'),
('dherath10@yahoo.com', '2013-12-10', '15:54:38', 28, 0, 'NotApproved'),
('dherath10@yahoo.com', '2013-12-10', '16:00:47', 29, 0, 'NotApproved'),
('dherath10@yahoo.com', '2013-12-10', '16:03:43', 30, 0, 'NotApproved'),
('dherath10@yahoo.com', '2013-12-10', '16:04:14', 31, 0, 'NotApproved'),
('dherath10@yahoo.com', '2013-12-10', '16:10:41', 32, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2013-12-19', '23:26:55', 33, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2014-01-24', '12:47:27', 34, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2014-01-24', '12:54:06', 35, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2014-01-24', '12:56:25', 36, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2014-01-24', '12:57:59', 37, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2014-01-24', '12:59:19', 38, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2014-01-27', '23:03:37', 39, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2014-02-08', '15:44:53', 40, 0, 'NotApproved'),
('nishan@esoft.lk', '2014-02-08', '16:00:09', 41, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2014-02-08', '16:01:35', 42, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2014-02-08', '16:04:01', 43, 0, 'NotApproved'),
('dul.ayesha@gmail.com', '2014-02-08', '16:14:23', 44, 0, 'NotApproved'),
('dul.ayesha@gmail.com', '2014-02-08', '16:19:30', 45, 0, 'NotApproved'),
('dul.ayesha@gmail.com', '2014-02-08', '16:26:44', 46, 0, 'NotApproved'),
('dul.ayesha@gmail.com', '2014-02-08', '16:41:25', 47, 0, 'NotApproved'),
('samadhis.87@gmail.com', '2014-02-08', '16:42:22', 48, 0, 'NotApproved'),
('bahee20@yahoo.com', '2014-02-08', '16:48:24', 49, 0, 'NotApproved'),
('bahee20@yahoo.com', '2014-02-08', '16:49:07', 50, 0, 'NotApproved'),
('bahee20@yahoo.com', '2014-02-08', '16:49:51', 51, 0, 'NotApproved'),
('shlncooray@gmail.com', '2014-02-08', '16:51:41', 52, 0, 'NotApproved'),
('shlncooray@gmail.com', '2014-02-08', '16:52:50', 53, 0, 'NotApproved'),
('da@da.lk', '2014-02-08', '16:55:56', 54, 0, 'NotApproved'),
('da@da.lk', '2014-02-08', '16:57:45', 55, 0, 'NotApproved');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `Item_ID` int(12) NOT NULL AUTO_INCREMENT,
  `Publisher_ID` int(12) NOT NULL,
  `Call_No` varchar(200) NOT NULL,
  `Item_Type_ID` int(12) NOT NULL,
  `Title` text NOT NULL,
  `cid` int(11) NOT NULL,
  `Publ_Date` date NOT NULL,
  `Publ_Place` varchar(50) NOT NULL,
  `Edition` varchar(50) NOT NULL,
  `Remarks` text NOT NULL,
  `Item_Image` varchar(255) NOT NULL,
  PRIMARY KEY (`Item_ID`),
  KEY `Item_Type_ID` (`Item_Type_ID`),
  KEY `Publisher_ID` (`Publisher_ID`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=206 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_ID`, `Publisher_ID`, `Call_No`, `Item_Type_ID`, `Title`, `cid`, `Publ_Date`, `Publ_Place`, `Edition`, `Remarks`, `Item_Image`) VALUES
(191, 10, '004.65.DJ', 1, 'An introduction to database systems ', 0, '2003-07-01', 'India', '8th Edition', 'An Introduction to Database Systems provides a comprehensive introduction to the now very large field of database systems by providing a solid grounding in the foundations of database technology while shedding some light on how the field is likely to develop in the future. This new edition has been rewritten and expanded to stay current with database system trends.provides a comprehensive introduction to the now very large field of database systems by providing a solid grounding in the foundations of database technology while shedding some light on how the field is likely to develop in the future. This new edition has been rewritten and expanded to stay current with database system trends.', '191.jpg'),
(192, 14, '004.6 BLA', 1, 'Computer Networks: Protocols, Standards and Interfaces', 0, '1993-02-18', 'New York', '2nd Edition', 'Reflecting the advances made since the first edition was published, this new edition offers a succinct and concise tutorial on the major types of networks in use today. Each modular chapter provides a complete description of a major computer network technology, covering Frame Relay, SMDS, FDDI, and SONET technology. This volume will be a valuable working tool for computer programmers, project managers, team leaders, computer engineers, and anyone responsible for recommending, purchasing, installing, or maintaining computer network communications systems', '192.jpg'),
(193, 14, '004.6 TAN ', 1, 'Computer Networks', 0, '2007-08-07', 'Englewoodc', '5th Edition', 'Computer Networks, Fifth Edition is the ideal introduction to today''s networks - and tomorrow''s. This classic best seller has been thoroughly updated to reflect the newest and most important networking technologies with a special emphasis on wireless networking, including 802.11, Bluetooth, broadband wireless, ad hoc networks, i-mode, and WAP. But fixed networks have not been ignored either with coverage of ADSL, gigabit Ethernet, peer-to-peer networks, NAT, and MPLS. And there is lots of new material on applications, including over 60 pages on the Web, plus Internet radio, voice over IP, and video on demand.Finally, the coverage of network security has been revised and expanded to fill an entire chapter. The book gives detailed descriptions of the principles associated with each layer and presents many examples drawn from the Internet and wireless networks.', '193.jpg'),
(194, 16, '200.6 CL', 1, 'Jesus of Nazareth Embracing a Sketch of Jewish History to the Time of His Birth', 2, '2012-07-31', 'London', '2nd Edition', '1880. This book presents in compendious form a sketch of the life and teaching of Jesus of Nazareth, viewed from a purely historical standpoint. Contents: A Sketch of Jewish History to the Birth of Jesus. Jesus of Nazareth. Sources of Knowledge About Jesus. Public Ministry of Jesus. His Mode of Teaching. His Religion. Jesus and the Parties of His time. Miracles. Jesus Asserts His Messiahship. Jesus in Jerusalem. His Arrest, Trial and Crucifixion. Maps. ', '194.jpg'),
(196, 19, '519.4 BUR', 1, 'Numerical analysis', 5, '2010-08-18', 'India', '2nd Edition', 'The Student Solutions Manual and Study Guide contains worked-out solutions to selected exercises from the text. The solved exercises cover all of the techniques discussed in the text, and include step-by-step instruction on working through the algorithms.', '196.jpg'),
(197, 18, '341.6 SD', 1, 'Principles of International Law', 3, '2007-01-18', 'New York', '2nd Edition', 'This fully-updated second edition provides a comprehensive survey of public international law, with useful references throughout to current events, classic and contemporary cases and scholarship. It is designed as a stand-alone text or as a complement to all the major casebooks on the topic. The first section of the book addresses the fundamental structure, actors, and history of international law; the second section focuses on the interface of international law and national law; and the final section covers key subject matter areas: human rights, the law of the sea, international environmental law, international criminal law, and the use of force.', '197.jpg'),
(198, 21, '004.432.42 DK', 1, 'Java 2 complete', 3, '1999-03-18', 'New Delhi', '5th Edition', 'Java 2, J2SE 1.4 Complete is a one-of-a-kind book--valuable both for its broad content and its low price. Whether you are new to Java or are upgrading to J2SE 1.4, you''ll get the skills you need to become proficient with the world''s most popular programming language.\nWith Java 2, J2SE 1.4 Complete, you''ll learn everything you need to know for Java language programming. You''ll learn basic programming concepts, such as exception handling, file I/O, and threading, and move on to creating basic Java components. You''ll also learn how to create the elements of a graphical user interface, including adding buttons and scrollbars. You''ll get an introduction to advanced GUIs, such as Swing and the 2D API. Finally, you''ll learn the essentials of JavaBeans programming to create reusable software components.\nJava 2, J2SE 1.4 Complete introduces you to the work of some of Sybex''s finest authors, so you''ll know where to go to learn even more about Java.', '198.jpg'),
(199, 22, '004.4 ML', 3, 'Learning Python', 0, '2013-02-17', 'India', 'Volume 21', 'Get a comprehensive, in-depth introduction to the core Python language with this hands-on book. Based on author Mark Lutz’s popular training course, this updated fifth edition will help you quickly write efficient, high-quality code with Python. It’s an ideal way to begin, whether you’re new to programming or a professional developer versed in other languages.is a peer-reviewed bi-annual journal of Shrimad Rajchandra Institute of Management and Computer Application', '199.jpg'),
(200, 23, '82.3 NS', 1, 'The Road from Elephant Pass', 27, '2012-02-01', 'New Delhi', '3', 'The Road From Elephant Pass is a novel by Nihal De Silva. It won the 2003 Gratiaen Prize for creative writing in English. This novel is nominated as a selection for the Sri Lankan Advanced Level Literature examinations. It has been given the themes of war and survival. The book is a great resource for the learning of survival techniques and for handling situations in a complicated relationship. The characters Wasantha and Kamala fall in love even though they belong to completely different races and liberation organisations. The novel was subsequently made into a film:The Road from Elephant Pass (film).', '200.jpg'),
(201, 24, '007.9 DH', 1, 'Network programming', 26, '2012-02-02', 'London', '2nd', 'Good', '201.jpg'),
(202, 14, '007.9 DH', 1, 'Jesus of Nazareth Embracing a Sketch of Jewish History to the Time of His Birth', 17, '2010-03-02', '', '2nd', '', '202.jpg'),
(203, 25, '007.9 DH', 1, 'Jesus of Nazareth Embracing a Sketch of Jewish History to the Time of His Birth', 26, '2011-04-03', 'London', '2nd', 'dd', '203.jpg'),
(204, 7, '007.9 DH', 1, 'Computer Networks', 2, '2002-10-17', '', '2nd', 'sss', '204.jpg'),
(205, 7, '007.9 DH', 1, 'Chemestry', 4, '2012-06-04', 'London', '2nd', '', '205.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE IF NOT EXISTS `item_type` (
  `Item_Type_ID` int(12) NOT NULL AUTO_INCREMENT,
  `Item_Type_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Item_Type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`Item_Type_ID`, `Item_Type_Name`) VALUES
(1, 'Book'),
(2, 'CD/DVD'),
(3, 'Serial');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE IF NOT EXISTS `librarian` (
  `User_ID` int(12) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE IF NOT EXISTS `main_category` (
  `mcid` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`mcid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`mcid`, `description`) VALUES
(0, 'SCIENCE AND KNOWLEDGE. ORGANIZATION. COMPUTER SCIENCE. INFORMATION. DOCUMENTATION. LIBRARIANSHIP. INSTITUTIONS. PUBLICATIONS'),
(1, 'PHILOSOPHY. PSYCHOLOGY'),
(2, 'RELIGION. THEOLOGY'),
(3, 'SOCIAL SCIENCES'),
(5, 'MATHEMATICS. NATURAL SCIENCES'),
(6, 'APPLIED SCIENCES. MEDICINE. TECHNOLOGY'),
(7, 'THE ARTS. RECREATION. ENTERTAINMENT. SPORT'),
(8, 'LANGUAGE. LINGUISTICS. LITERATURE'),
(9, 'GEOGRAPHY. BIOGRAPHY. HISTORY');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE IF NOT EXISTS `policy` (
  `Policy_No` int(12) NOT NULL AUTO_INCREMENT,
  `Item_Type_ID` int(12) NOT NULL,
  `User_Type_ID` int(12) NOT NULL,
  `State_ID` int(12) NOT NULL,
  `Fine_Per_Day` decimal(8,2) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `Fine_Per_Day_After_Duration` decimal(8,2) NOT NULL,
  PRIMARY KEY (`Policy_No`),
  KEY `Item_Type_ID` (`Item_Type_ID`),
  KEY `User_Type_ID` (`User_Type_ID`),
  KEY `State_ID` (`State_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`Policy_No`, `Item_Type_ID`, `User_Type_ID`, `State_ID`, `Fine_Per_Day`, `Duration`, `Fine_Per_Day_After_Duration`) VALUES
(1, 1, 5, 1, 5.00, '14 days', 10.00),
(2, 2, 5, 1, 10.00, '14 days', 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `Publisher_ID` int(12) NOT NULL AUTO_INCREMENT,
  `Publisher_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Publisher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`Publisher_ID`, `Publisher_Name`) VALUES
(1, 'Europa Press'),
(2, 'Virago Press Ltd'),
(3, 'Lowell House'),
(4, 'Adobe'),
(5, 'McGraw-Hill'),
(6, 'Uralia Press'),
(7, 'Penguine Publications'),
(8, 'Pearson Education Inc.'),
(9, 'Sarasavi Publications'),
(10, 'International Universities Press'),
(11, 'Thomas Nelson'),
(12, 'Springer Science'),
(13, 'Sams Publishing'),
(14, 'Prentice Hall'),
(15, 'Kegan Paul'),
(16, 'Kessinger Publishing'),
(17, 'O''Reilly Media'),
(18, 'West Publishing Compan'),
(19, 'BROOKS COLE Publishing'),
(20, 'Cisco Press'),
(21, 'John Wiley & Sons'),
(22, 'Cambridge University Press'),
(23, 'Vijitha Yapa Publications'),
(24, 'Mc'),
(25, 'Mordern Printing');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `Reserve_ID` int(12) NOT NULL AUTO_INCREMENT,
  `Accession_No` int(11) NOT NULL,
  `User_ID` int(12) NOT NULL,
  `Res_Date` date NOT NULL,
  `Res_Time` varchar(45) NOT NULL,
  `Notification_Date` date NOT NULL,
  `Fulfilled` varchar(50) NOT NULL,
  PRIMARY KEY (`Reserve_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Reserve_ID`, `Accession_No`, `User_ID`, `Res_Date`, `Res_Time`, `Notification_Date`, `Fulfilled`) VALUES
(1, 623, 40, '2014-02-17', '14:16:16', '0000-00-00', 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE IF NOT EXISTS `serial` (
  `Item_ID` int(12) NOT NULL,
  `Author_ID` int(12) NOT NULL,
  `ISSN` varchar(50) NOT NULL,
  `Volume` int(11) NOT NULL,
  `Issue` int(11) NOT NULL,
  `Pages` varchar(50) NOT NULL,
  PRIMARY KEY (`Item_ID`,`Author_ID`),
  KEY `Author_ID` (`Author_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serial`
--

INSERT INTO `serial` (`Item_ID`, `Author_ID`, `ISSN`, `Volume`, `Issue`, `Pages`) VALUES
(199, 20, '09743308', 5, 2, '50');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `State_ID` int(12) NOT NULL AUTO_INCREMENT,
  `PR/Lending` varchar(50) NOT NULL,
  PRIMARY KEY (`State_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`State_ID`, `PR/Lending`) VALUES
(1, 'Lending'),
(2, 'PR');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `User_ID` int(12) NOT NULL,
  `Class` varchar(50) NOT NULL,
  `Lib_Card_No` varchar(50) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`User_ID`, `Class`, `Lib_Card_No`) VALUES
(37, '12A', 'S0037'),
(39, '12A', 'S0039'),
(40, '1D', 'S0040'),
(42, '10A', 'S0042'),
(43, '1A', 'S0043'),
(44, '13B', 'S0044'),
(52, '4E', 'S0052'),
(53, '1A', 'S0053'),
(54, '4B', 'S0054'),
(58, '4E', 'S0058'),
(59, '4C', 'S0059'),
(73, '13B', 'S0073'),
(79, '4C', 'S0079'),
(86, '10D', 'S0086'),
(87, '7A', 'S0087'),
(88, '8B', 'S0088'),
(89, '11E', 'S0089'),
(90, '6D', 'S0090'),
(91, '1A', 'S0091'),
(92, '3C', 'S0092');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `User_ID` int(12) NOT NULL,
  `Lib_Card_No` varchar(50) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`User_ID`, `Lib_Card_No`) VALUES
(31, 'T0031'),
(32, 'T0032'),
(33, 'T0033'),
(49, 'T0049'),
(55, 'T0055'),
(61, 'T0061'),
(69, 'T0069'),
(75, 'T0075'),
(82, 'T0082'),
(93, 'T0093'),
(94, 'T0094');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(12) NOT NULL AUTO_INCREMENT,
  `User_Type_ID` int(12) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone_No` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Reg_Date` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Status` varchar(20) NOT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `User_Type_ID` (`User_Type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Type_ID`, `First_Name`, `Last_Name`, `Address`, `Phone_No`, `Gender`, `Date_of_Birth`, `Reg_Date`, `Email`, `Password`, `Status`) VALUES
(28, 1, 'Samadhi', 'Saram', 'Negombo', '0771112244', 'Female', '1989-12-25', '2013-10-16', 'samadhis.87@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active'),
(29, 2, 'Dinesha', 'Perera', 'Negombo', '0771232344', 'Female', '1982-06-05', '2013-09-17', 'samadhis@yahoo.com', '362fa73b1257c598b8341b7bb0bd5a91', 'Active'),
(30, 3, 'Udari', 'Maheshika', 'Katunayaka', '0713456744', 'Female', '1983-10-12', '2013-09-17', 'udarimwh@gmail.com', 'dbb40d222edf6ea6f4bde45d27b447e2', 'Active'),
(31, 4, 'Shelan', 'Cooray', 'Colombo', '2345678901', 'Male', '1987-08-03', '2013-09-17', 'shlncooray@gmail.com', '55939c79c310cb1c4726ccf30e468b92', 'Active'),
(32, 4, 'Ayesha', 'Dulanjali', 'Ja-Ela', '0771269866', 'Female', '1986-09-15', '2014-02-13', 'dul.ayesha@gmail.com', 'f8941715fa174746b1252a59d7e8da76', 'Active'),
(33, 4, 'Bahee', 'Rajendran', 'Wattala', '0771232345', 'Female', '1983-12-05', '2013-10-03', 'bahee20@yahoo.com', 'ea0d8bc6340e7446b1ae4c33b35b140e', 'Active'),
(37, 5, 'Thusha', 'Perera', 'Negombo', '0781232445', 'Male', '1984-10-04', '2013-10-10', 'mthushareni@yahoo.com', '9fc5a83c1659a13fe0773ff3c4631249', 'Deactive'),
(39, 5, 'Nishan', 'Perera', 'negombo\r\n\r\n', '0772345678', 'Male', '1987-06-04', '2013-09-18', 'nishan@esoft.lk', 'd928e863574a24700232b39fc1c5f5c8', 'Active'),
(40, 5, 'Aruni', 'Saram', 'Kadana', '0776986647', 'Female', '1985-08-17', '2013-09-25', 'aruni10@gmail.com', '17462700fa105b5fc2b0d7670da81f6d', 'Active'),
(42, 5, 'Tharaka', 'Saram', 'Colombo', '0776986644', 'Male', '1982-02-02', '2013-09-25', 'tharaka2@gmail.com', '63ed7f18048136e0fde3e99e9c43e0bd', 'Active'),
(43, 5, 'Thiwanka', 'Perera', 'Colombo', '0776986644', 'Male', '1982-02-02', '2013-10-03', 'ta@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(44, 5, 'Dinesh', 'Silva', 'Colombo', '0776986644', 'Male', '1982-02-02', '2013-09-25', 'samadhidinesh@yahoo.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(49, 4, 'Kasun', 'Herath', 'Colombo', '0776986644', 'Male', '1982-02-02', '2013-09-25', 'sama@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(51, 2, 'Kalpa', 'Liyanage', 'Colombo', '0776986644', 'Male', '1982-02-02', '2013-09-25', 'samadhis55@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(52, 5, 'charmara', 'palliyaguru', 'Colombo', '0776986646', 'Male', '1988-11-19', '2013-09-25', 'chamara@yahoo.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(53, 5, 'Daminda', 'Herath', 'Horana', '0776986643', 'Male', '1980-06-07', '2013-09-25', 'dherath10@yahoo.com', 'c343be06ade68ba83520a3e3f56ad9f2', 'Active'),
(54, 5, 'Ranga', 'Rodrigo', 'Colombo', '0713456784', 'Male', '1983-06-04', '2013-09-25', 'ranga@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(55, 4, 'Susi', 'Siva', 'Jaffna', '0776986642', 'Male', '1977-10-09', '2013-09-25', 'siva@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(58, 5, 'kumara', 'Sangakkara', 'Kandy', '0777296254', 'Male', '1978-09-18', '2013-09-27', 'sanga@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(59, 5, 'mahela', 'Jayawardane', 'Colombo', '0777243243', 'Male', '1977-11-18', '2013-09-27', 'mahela@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(61, 4, 'Rangana', 'Herath', 'Karunagala', '0777123248', 'Male', '1980-10-16', '2013-09-27', 'ranga2@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(62, 2, 'Rangana', 'Silva', 'Colombo', '0713456745', 'Male', '1989-08-09', '2013-09-27', 'rangana@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(69, 4, 'udari', 'perera', 'colombo', '0777123248', 'Female', '1988-04-03', '2013-10-10', 'sam@gg.lk', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(73, 5, 'Arunika', 'Silva', 'Negombo\n', '0771269864', 'Female', '1985-06-06', '2013-10-14', 'aruni@gmail.co', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(75, 4, 'Aruni', 'Jayawardana', 'Katunayaka', '0771234567', 'Female', '1977-03-02', '2014-02-13', 'aruni@gmail.com', '17462700fa105b5fc2b0d7670da81f6d', 'Active'),
(78, 3, 'Anusha', 'Dasanayake', 'Negombo', '0776986642', 'Female', '1987-04-18', '2013-10-16', 'sam1@ggq.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(79, 5, 'Hiranth', 'Pahalagedara', 'Negombo', '0776986642', 'Female', '1987-04-18', '2013-10-16', 'sam1@grr.com', '25d55ad283aa400af464c76d713c07ad', 'Active'),
(80, 3, 'anne', 'sumudu', 'Negombo', '0776986642', 'Female', '1987-04-18', '2013-10-16', 'sam1@grr.biz', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(81, 1, 'Rashimila', 'Mawalage', 'Kotte', '0776986642', 'Male', '0000-00-00', '2013-10-16', 'raza@yahoo.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(82, 4, 'sam', 'silva', 'negombo\r\n', '0777123248', 'Male', '1977-03-04', '2013-10-16', 'sam2@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(84, 2, 'Arundaka', 'Perera', 'Colombo', '0777123248', 'Female', '1987-12-19', '2013-10-16', 'samadhis.88@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(85, 1, 'Lahiru', 'Herath', 'Galle', '0713456745', 'Male', '1988-12-18', '2013-10-16', 'sam123@yahoo.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Deactive'),
(86, 5, 'Shehara', 'Perera', 'Negombo', '0777123234', 'Female', '1993-02-04', '2013-10-21', 'shehara@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(87, 5, 'Hashini', 'Fernando', 'Colombo', '0771123248', 'Female', '1996-07-18', '2013-11-01', 'hashini@gmail.com', '1439ed24721cba808224131e2f74929c', 'Active'),
(88, 5, 'shehara', 'Silva', 'colombo', '0776986642', 'Female', '1987-06-19', '2013-11-01', 'shehara1@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(89, 5, 'Koshila', 'Fernando', 'Negombo', '0771882445', 'Female', '1990-05-16', '2013-12-04', 'koshila@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(90, 5, 'Ashini', 'Perera', 'Negombo', '0776986634', 'Female', '1996-04-15', '2013-12-04', 'ashinip@yahoo.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(91, 5, 'Samadhi', 'Saram', 'dd', '9477698664', 'Female', '1990-12-19', '2013-12-04', 'samadhis34@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Active'),
(92, 5, 'Saranya', 'VijeKumar', 'Wallawaththa', '1111111111', 'Female', '1987-02-02', '2014-01-26', 'sara@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Active'),
(93, 4, 'Shanil', 'Jayawardana', 'Colombo\r\n', '0771234568', 'Male', '1970-04-17', '2014-02-15', 'shanil@uom.lk', 'f7f8e44d799020131c2fb9a8cb027677', 'Active'),
(94, 4, 'Gayan', 'Fernando', 'Ja-Ela', '0772233440', 'Male', '1970-10-31', '2014-02-15', 'gayan@gmail.com', '4dda9f5fddf9da4805eecb435a4971c5', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `User_Type_ID` int(12) NOT NULL AUTO_INCREMENT,
  `User_Type_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`User_Type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`User_Type_ID`, `User_Type_Name`) VALUES
(1, 'Admin'),
(2, 'Librarian'),
(3, 'Library Assistant'),
(4, 'Teacher'),
(5, 'Student');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`Item_ID`) REFERENCES `item` (`Item_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`Author_ID`) REFERENCES `author` (`Author_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`Accession_No`) REFERENCES `copy` (`Accession_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `main_category` (`mcid`) ON UPDATE CASCADE;

--
-- Constraints for table `cd/dvd`
--
ALTER TABLE `cd/dvd`
  ADD CONSTRAINT `cd@002fdvd_ibfk_1` FOREIGN KEY (`Item_ID`) REFERENCES `item` (`Item_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_4` FOREIGN KEY (`Publisher_ID`) REFERENCES `publisher` (`Publisher_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_5` FOREIGN KEY (`Item_Type_ID`) REFERENCES `item_type` (`Item_Type_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `librarian`
--
ALTER TABLE `librarian`
  ADD CONSTRAINT `librarian_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `policy_ibfk_4` FOREIGN KEY (`Item_Type_ID`) REFERENCES `item_type` (`Item_Type_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `policy_ibfk_5` FOREIGN KEY (`User_Type_ID`) REFERENCES `user_type` (`User_Type_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `policy_ibfk_6` FOREIGN KEY (`State_ID`) REFERENCES `state` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`User_Type_ID`) REFERENCES `user_type` (`User_Type_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
