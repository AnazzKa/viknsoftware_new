-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2017 at 12:15 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viknsoftware_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `vikn_accounts`
--

CREATE TABLE `vikn_accounts` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_type` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vikn_accounts`
--

INSERT INTO `vikn_accounts` (`account_id`, `account_name`, `account_type`, `date`) VALUES
(1, 'Anas', 1, '2017-10-20 12:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `vikn_account_type`
--

CREATE TABLE `vikn_account_type` (
  `account_type_id` int(11) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vikn_account_type`
--

INSERT INTO `vikn_account_type` (`account_type_id`, `account_type`, `date`) VALUES
(1, 'Cash in Hand', '2017-10-20 12:10:41'),
(2, 'Agent', '2017-10-20 12:10:02'),
(3, 'Customer', '2017-10-20 12:10:10'),
(4, 'Current Liability', '2017-10-20 12:10:36'),
(5, 'Income', '2017-10-20 12:10:47'),
(6, 'Expense', '2017-10-20 12:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `vikn_users`
--

CREATE TABLE `vikn_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vikn_users`
--

INSERT INTO `vikn_users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vikn_accounts`
--
ALTER TABLE `vikn_accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `vikn_account_type`
--
ALTER TABLE `vikn_account_type`
  ADD PRIMARY KEY (`account_type_id`);

--
-- Indexes for table `vikn_users`
--
ALTER TABLE `vikn_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vikn_accounts`
--
ALTER TABLE `vikn_accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vikn_account_type`
--
ALTER TABLE `vikn_account_type`
  MODIFY `account_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vikn_users`
--
ALTER TABLE `vikn_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
