-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2016 at 03:52 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `account_id` int(11) NOT NULL,
  `account_client_id` int(11) NOT NULL,
  `account_balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`account_id`, `account_client_id`, `account_balance`) VALUES
(1, 9, 20000),
(2, 10, 20000),
(3, 11, 20000),
(4, 12, 20000),
(5, 13, 20000),
(6, 14, 20000),
(7, 15, 20000),
(8, 16, 20000),
(9, 17, 20000),
(10, 18, 20000),
(11, 19, 20000),
(12, 20, 20000),
(13, 21, 20000),
(14, 22, 20000),
(15, 23, 20000),
(16, 24, 20000),
(17, 25, 20000),
(18, 26, 20000),
(19, 27, 20000),
(20, 28, 20000),
(21, 29, 20000),
(22, 30, 20000),
(23, 31, 20000),
(24, 32, 20000),
(25, 33, 20000),
(26, 34, 20000),
(27, 35, 20000),
(28, 36, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `client_id` int(11) NOT NULL,
  `client_ip` varchar(16) NOT NULL,
  `client_port` int(11) NOT NULL,
  `client_domain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`client_id`, `client_ip`, `client_port`, `client_domain`) VALUES
(1, '127.0.0.1', 12345, 'Domain'),
(2, '/127.0.0.1', 64057, 'Domain'),
(3, '/127.0.0.1', 64735, 'Domain'),
(4, '/127.0.0.1', 64741, 'Domain'),
(5, '/127.0.0.1', 64744, 'Domain'),
(6, '/127.0.0.1', 64747, 'Domain'),
(7, '/127.0.0.1', 64750, 'Domain'),
(8, '/127.0.0.1', 64771, 'Domain'),
(9, '/127.0.0.1', 64783, 'Domain'),
(10, '/127.0.0.1', 64953, 'fff'),
(11, '/127.0.0.1', 64963, 'Domain'),
(12, '/127.0.0.1', 64979, 'Domain'),
(13, '/127.0.0.1', 64982, 'Domain'),
(14, '/127.0.0.1', 64987, 'Domain'),
(15, '/127.0.0.1', 65158, 'Domain'),
(16, '/127.0.0.1', 65233, 'Domain'),
(17, '/127.0.0.1', 49261, 'Domain'),
(18, '/127.0.0.1', 49480, 'Domain'),
(19, '/127.0.0.1', 49486, 'Domain'),
(20, '/127.0.0.1', 49492, 'Domain'),
(21, '/127.0.0.1', 49545, 'Domain'),
(22, '/127.0.0.1', 49558, 'Domain'),
(23, '/127.0.0.1', 49617, 'Domain'),
(24, '/127.0.0.1', 49626, 'Domain'),
(25, '/127.0.0.1', 49631, 'Domain'),
(26, '/127.0.0.1', 49780, 'Domain'),
(27, '/127.0.0.1', 49786, 'Domain'),
(28, '/127.0.0.1', 49965, 'Domain'),
(29, '/127.0.0.1', 50259, 'Domain'),
(30, '/127.0.0.1', 51156, 'Domain'),
(31, '/127.0.0.1', 51508, 'Domain'),
(32, '/127.0.0.1', 51515, 'Domain'),
(33, '/127.0.0.1', 51527, 'Domain'),
(34, '/127.0.0.1', 51538, 'Domain'),
(35, '/127.0.0.1', 51546, 'Domain'),
(36, '/127.0.0.1', 51771, 'Domain');

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE `Transaction` (
  `trans_id` int(11) NOT NULL,
  `account_from` int(11) NOT NULL,
  `account_to` int(11) NOT NULL,
  `trans_ammount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_client_id_2` (`account_client_id`),
  ADD KEY `account_client_id` (`account_client_id`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `account_from` (`account_from`),
  ADD KEY `account_to` (`account_to`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `Transaction`
--
ALTER TABLE `Transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Account`
--
ALTER TABLE `Account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`account_client_id`) REFERENCES `Client` (`client_id`);

--
-- Constraints for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`account_from`) REFERENCES `Account` (`account_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`account_to`) REFERENCES `Account` (`account_id`);
