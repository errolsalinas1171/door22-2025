-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2016 at 11:28 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `door22_kiosk`
--

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `headerID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date_inputted` datetime NOT NULL,
  `enable` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`headerID`, `title`, `date_inputted`, `enable`) VALUES
(1, 'This is Header 1', '2016-02-13 15:02:08', 'no'),
(2, 'This is Header 2', '2016-02-13 15:10:01', 'no'),
(3, 'This is Header 3', '2016-02-13 15:10:11', 'no'),
(4, 'Door 22 Residence', '2016-02-13 15:10:22', 'yes'),
(5, 'add', '2016-02-19 17:44:00', 'no'),
(6, 'This is Header 4', '2016-02-19 17:44:27', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` int(6) unsigned zerofill NOT NULL,
  `userID` int(6) unsigned zerofill NOT NULL,
  `amount` int(50) NOT NULL,
  `transaction` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `cheque_number` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL,
  `account_number` int(6) unsigned zerofill NOT NULL,
  `note` varchar(500) NOT NULL,
  `print` varchar(10) NOT NULL,
  `view` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `userID`, `amount`, `transaction`, `payment_type`, `cheque_number`, `date_time`, `account_number`, `note`, `print`, `view`, `status`) VALUES
(000001, 000003, 1000, 'billing', 'cash', '', '2016-02-13 13:58:14', 000003, 'not okay\r\n', 'yes', 'yes', 'not_ok'),
(000002, 000003, 15000, 'billing', 'cash', '', '2016-02-13 14:16:43', 000003, 'kulang', 'yes', 'yes', 'not_ok'),
(000003, 000003, 10000, 'billing', 'cheque', '22222222', '2016-02-13 14:20:49', 000003, '', 'yes', 'yes', 'ok'),
(000004, 000003, 5000, 'billing', 'cash', '', '2016-02-13 15:57:54', 000003, '', 'yes', 'yes', 'not_ok'),
(000005, 000003, 12000, 'billing', 'cheque', '12333333', '2016-02-13 15:58:44', 000003, '', 'yes', 'yes', 'ok'),
(000006, 000003, 1234, 'billing', 'cheque', '123456', '2016-02-13 17:29:24', 000003, '', 'yes', 'yes', 'ok'),
(000007, 000003, 1200, 'billing', 'cash', '', '2016-02-13 18:28:19', 000003, '', 'yes', 'yes', 'ok'),
(000008, 000003, 1300, 'billing', 'cash', '', '2016-02-13 18:34:26', 000003, '', 'yes', 'yes', 'ok'),
(000009, 000003, 59000, 'billing', 'cheque', '987', '2016-02-13 18:35:50', 000003, '', 'yes', 'yes', 'ok'),
(000010, 000003, 1200, 'billing', 'cash', '', '2016-02-16 08:48:55', 000003, 'kulang kwarta niya.. 600', 'yes', 'yes', 'ok'),
(000011, 000003, 11110, 'billing', 'cash', '', '2016-02-18 15:09:16', 000003, '', 'yes', 'yes', 'ok'),
(000012, 000003, 10000, 'billing', 'cash', '', '2016-02-18 15:10:01', 000003, '', 'yes', 'yes', 'ok'),
(000013, 000003, 10000, 'billing', 'cash', '', '2016-02-18 15:11:10', 000003, '', 'yes', 'yes', 'ok'),
(000014, 000003, 12000, 'billing', 'cash', '', '2016-02-18 16:49:48', 000003, '', 'yes', 'yes', 'ok'),
(000015, 000003, 1200, 'billing', 'cash', '', '2016-02-18 17:22:17', 000003, '', 'yes', 'yes', 'ok'),
(000016, 000003, 500, 'billing', 'cash', '', '2016-02-18 17:24:40', 000003, '', 'yes', 'yes', 'ok'),
(000017, 000003, 200, 'billing', 'cash', '', '2016-02-18 18:14:37', 000003, '', 'yes', 'yes', 'ok'),
(000018, 000003, 300, 'billing', 'cash', '', '2016-02-18 18:18:50', 000003, '', 'yes', 'yes', 'ok'),
(000019, 000003, 100, 'billing', 'cash', '', '2016-02-18 18:19:29', 000003, '', 'yes', 'yes', 'ok'),
(000020, 000003, 100, 'billing', 'cash', '', '2016-02-18 18:21:56', 000003, '', 'yes', 'yes', 'ok'),
(000021, 000003, 100, 'billing', 'cash', '', '2016-02-18 18:22:37', 000003, '', 'yes', 'yes', 'ok'),
(000022, 000003, 100, 'billing', 'cash', '', '2016-02-18 18:50:01', 000003, '', 'yes', 'yes', 'ok'),
(000023, 000003, 100, 'billing', 'cash', '', '2016-02-18 18:53:10', 000003, '', 'yes', 'yes', 'ok'),
(000024, 000003, 100, 'billing', 'cash', '', '2016-02-18 18:55:44', 000003, '', 'yes', 'yes', 'ok'),
(000025, 000003, 100, 'billing', 'cash', '', '2016-02-18 18:56:16', 000003, '', 'yes', 'yes', 'ok'),
(000026, 000003, 100, 'billing', 'cash', '', '2016-02-18 18:56:33', 000003, '', 'yes', 'yes', 'ok'),
(000027, 000003, 123, 'billing', 'cash', '', '2016-02-18 18:58:10', 000003, '', 'yes', 'yes', 'ok'),
(000028, 000003, 123, 'billing', 'cash', '', '2016-02-18 18:58:34', 000003, '', 'yes', 'yes', 'ok'),
(000029, 000003, 123, 'billing', 'cash', '', '2016-02-18 18:59:04', 000003, '', 'yes', 'yes', 'ok'),
(000030, 000003, 123, 'billing', 'cash', '', '2016-02-18 18:59:40', 000003, '', 'yes', 'yes', 'ok'),
(000031, 000003, 123, 'billing', 'cash', '', '2016-02-18 19:00:03', 000003, '', 'yes', 'yes', 'ok'),
(000032, 000003, 1, 'billing', 'cash', '', '2016-02-18 19:12:32', 000003, '', 'yes', 'yes', 'ok'),
(000033, 000003, 12, 'billing', 'cash', '', '2016-02-18 19:14:20', 000003, '', 'yes', 'yes', 'ok'),
(000034, 000003, 111, 'billing', 'cash', '', '2016-02-18 19:17:37', 000003, '', 'yes', 'yes', 'ok'),
(000035, 000003, 1111, 'billing', 'cash', '', '2016-02-18 19:28:57', 000003, '', 'yes', 'yes', 'ok'),
(000036, 000003, 11111, 'billing', 'cash', '', '2016-02-18 19:29:36', 000003, '', 'yes', 'yes', 'ok'),
(000037, 000003, 1111, 'billing', 'cash', '', '2016-02-18 19:29:59', 000003, '', 'yes', 'yes', 'ok'),
(000038, 000003, 1111, 'billing', 'cash', '', '2016-02-18 19:30:14', 000003, '', 'yes', 'yes', 'ok'),
(000039, 000003, 1111, 'billing', 'cash', '', '2016-02-18 19:33:01', 000003, '', 'yes', 'yes', 'ok'),
(000040, 000003, 1111, 'billing', 'cash', '', '2016-02-18 19:33:46', 000003, '', 'yes', 'yes', 'ok'),
(000041, 000003, 11111, 'billing', 'cash', '', '2016-02-18 19:35:16', 000003, '', 'yes', 'yes', 'not_ok'),
(000042, 000003, 123456, 'billing', 'cash', '', '2016-02-19 08:44:00', 000003, '', 'yes', 'yes', 'not_ok'),
(000043, 000003, 1111, 'billing', 'cash', '', '2016-02-19 08:55:01', 000003, '', 'yes', 'yes', 'not_ok'),
(000044, 000003, 1, 'billing', 'cash', '', '2016-02-19 09:22:37', 000003, '', 'yes', 'yes', 'not_ok'),
(000045, 000003, 1200, 'billing', 'cash', '', '2016-02-19 09:24:32', 000003, '', 'yes', 'yes', 'ok'),
(000046, 000003, 1000, 'billing', 'cash', '', '2016-02-19 09:25:03', 000003, '', 'yes', 'yes', 'ok'),
(000047, 000003, 1100, 'billing', 'cash', '', '2016-02-19 09:26:17', 000003, '', 'yes', 'yes', 'ok'),
(000048, 000003, 1300, 'billing', 'cash', '', '2016-02-19 09:30:14', 000003, '', 'yes', 'yes', 'ok'),
(000049, 000003, 1250, 'billing', 'cash', '', '2016-02-19 09:37:29', 000003, '', 'yes', 'yes', 'ok'),
(000050, 000003, 10000, 'billing', 'cheque', '11111111111', '2016-02-19 09:43:03', 000003, '', 'yes', 'yes', 'ok'),
(000051, 000003, 15000, 'billing', 'cheque', '11111112', '2016-02-19 09:50:22', 000003, '', 'yes', 'yes', 'ok'),
(000052, 000003, 14000, 'billing', 'cheque', '111111112', '2016-02-19 09:52:42', 000003, '', 'yes', 'yes', 'ok'),
(000053, 000003, 5000, 'billing', 'cash', '', '2016-02-19 09:53:17', 000003, '', 'yes', 'yes', 'ok'),
(000054, 000003, 3000, 'billing', 'cash', '', '2016-02-19 10:24:18', 000003, '', 'yes', 'yes', 'not_ok'),
(000055, 000003, 12000, 'billing', 'cash', '', '2016-02-19 13:20:53', 000003, '', 'yes', 'yes', 'ok'),
(000056, 000003, 1200, 'billing', 'cash', '', '2016-02-19 13:57:25', 000003, '', 'yes', 'no', 'pending'),
(000057, 000003, 1200, 'billing', 'cash', '', '2016-02-19 13:58:51', 000003, '', 'yes', 'no', 'pending'),
(000058, 000003, 10000, 'billing', 'cash', '', '2016-02-19 14:15:18', 000003, '', 'yes', 'no', 'pending'),
(000059, 000003, 15500, 'billing', 'cheque', '1324465870', '2016-02-19 16:10:19', 000003, '', 'yes', 'no', 'pending'),
(000060, 000003, 1500, 'billing', 'cash', '', '2016-02-22 13:59:33', 000003, '', 'yes', 'no', 'pending'),
(000061, 000003, 12300, 'billing', 'cheque', '123456', '2016-02-22 14:03:06', 000003, '', 'yes', 'no', 'pending'),
(000062, 000003, 1300, 'billing', 'cash', '', '2016-02-22 14:44:25', 000003, '', 'yes', 'no', 'pending'),
(000063, 000003, 1200, 'billing', 'cash', '', '2016-02-22 14:45:52', 000003, '', 'yes', 'no', 'pending'),
(000064, 000003, 23000, 'billing', 'cheque', '123456', '2016-02-22 14:54:32', 000003, '', 'yes', 'no', 'pending'),
(000065, 000003, 12300, 'billing', 'cash', '', '2016-02-22 15:31:32', 000003, '', 'yes', 'no', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_header`
--

CREATE TABLE IF NOT EXISTS `receipt_header` (
  `receipt_headerID` int(11) NOT NULL,
  `header1` varchar(500) NOT NULL,
  `header2` varchar(500) NOT NULL,
  `header3` varchar(500) NOT NULL,
  `header4` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_header`
--

INSERT INTO `receipt_header` (`receipt_headerID`, `header1`, `header2`, `header3`, `header4`) VALUES
(1, 'This is Header 1', 'This is Header 2', 'This is Header 3', 'This is Header 4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(6) unsigned zerofill NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `in_use` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `edit` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `first_name`, `middle_name`, `last_name`, `contact_number`, `email`, `address`, `username`, `password`, `date_added`, `date_updated`, `user_type`, `in_use`, `active`, `edit`) VALUES
(000001, 'admin', 'admin', 'admin', '123456789', 'admin@wiredsystems.com', 'admin', 'admin', 'admin', '2016-02-03 11:15:00', '2016-02-19 13:08:42', 'admin', 'yes', 'yes', 'yes'),
(000002, 'John', 'Smith', 'Jordan', '123456781', 'user@yahoo.com', 'Cebu City', '000002', '123456', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'user', 'no', 'yes', 'no'),
(000003, 'Lloyd', 'Almario', 'Salinas', '09776216378', 'errol@wiredsystems.com', 'Ipil,', '123456', '123456', '2016-02-06 17:20:09', '2016-02-17 16:36:46', 'user', 'no', 'yes', 'yes'),
(000004, 'Errol', 'Almario', 'Salinas', '09776216378', 'errol@wiredsystems.com', 'Cebu', '000004', '123', '2016-02-06 17:28:09', '2016-02-09 14:58:01', 'user', 'no', 'yes', 'yes'),
(000005, 'This', 'Is', 'User', '09151234567', 'user@yahoo.com', 'Cebu', '000005', '111111', '2016-02-06 17:31:47', '2016-02-16 14:03:59', 'user', 'no', 'no', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`headerID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `receipt_header`
--
ALTER TABLE `receipt_header`
  ADD PRIMARY KEY (`receipt_headerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `headerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `receipt_header`
--
ALTER TABLE `receipt_header`
  MODIFY `receipt_headerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
