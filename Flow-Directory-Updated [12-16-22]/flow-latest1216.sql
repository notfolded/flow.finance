-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2022 at 07:14 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flow`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
CREATE TABLE IF NOT EXISTS `credentials` (
  `u_id` int(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`u_id`, `email`, `password`) VALUES
(7, 'abebayquen@yahoo.com', 'zxcv'),
(8, 'abebayquen@yahoo.com', 'sssss'),
(15, 'asdf@qwerty.com', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `linked_accounts`
--

DROP TABLE IF EXISTS `linked_accounts`;
CREATE TABLE IF NOT EXISTS `linked_accounts` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(32) NOT NULL,
  `acc_num` int(11) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `linked_accounts`
--

INSERT INTO `linked_accounts` (`account_id`, `bank_name`, `acc_num`, `balance`, `u_id`) VALUES
(1, 'Banco de Baguio', 123456789, 1500, 7),
(2, 'National Bank of Paris', 1029384756, 50000, 7),
(3, 'Bank of the World', 908123765, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `transaction_ID` int(6) NOT NULL AUTO_INCREMENT,
  `u_ID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(32) NOT NULL,
  `acc_num` int(11) NOT NULL,
  PRIMARY KEY (`transaction_ID`),
  KEY `u_ID` (`u_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_ID`, `u_ID`, `amount`, `date`, `type`, `acc_num`) VALUES
(9, 7, 1000, '2022-12-09', 'income', 123456789),
(13, 7, 500, '2022-12-14', 'income', 123456789),
(15, 7, 50000, '2022-12-09', 'income', 1029384756);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
CREATE TABLE IF NOT EXISTS `user_data` (
  `u_ID` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  KEY `u_ID` (`u_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`u_ID`, `transaction_id`, `balance`, `account_ID`) VALUES
(7, 9, 1000, 123456789),
(7, 10, 1500, 123456789),
(7, 11, 1200, 123456789),
(7, 12, 1700, 123456789),
(7, 13, 1200, 123456789),
(7, 14, 1400, 123456789),
(7, 15, 50000, 1029384756);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `u_ID` int(8) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(32) NOT NULL,
  `contact_num` varchar(24) NOT NULL,
  PRIMARY KEY (`u_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`u_ID`, `first_name`, `last_name`, `birthdate`, `email`, `contact_num`) VALUES
(7, 'Sebastian', 'Bach', '2004-01-08', 'abebayquen@yahoo.com', '999 321 4567'),
(8, 'Abe', 'Bayquen', '2011-06-30', 'abebayquen@yahoo.com', '959 490 2212'),
(15, 'James ', 'Hetfield', '2010-07-22', 'asdf@qwerty.com', '1213444444');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`u_ID`) REFERENCES `user_info` (`u_ID`);

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`u_ID`) REFERENCES `user_info` (`u_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
