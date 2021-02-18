-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 05:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `singlevendor`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `payment_number` varchar(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `address_line_1` varchar(100) NOT NULL,
  `address_line_2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `mobile_num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `email`, `password`, `payment_number`, `first_name`, `last_name`, `zip_code`, `address_line_1`, `address_line_2`, `city`, `state`, `mobile_num`) VALUES
(14, 'kdr@gmail.com', '', '1234567', 'Krishalika', 'Rathnayake', '11000', 'Gampaha', 'Gampaha', 'Gampaha', 'Gampaha', 702359567),
(15, 'dilani@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'KRISHALIKA', 'RATHNAYAKE', '11000', '', '', '', '', 0),
(17, '', '81dc9bdb52d04dc20036dbd8313ed055', '', 'Dilani', 'Rathnayake', '', '', '', '', '', 0),
(22, 'dil@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 'DBMS', 'Rathnayake', '', '', '', '', '', 0),
(23, 'pup@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 'puppy', 'Rathnayake', '', '', '', '', '', 0),
(24, 'aloka@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 'Aloka', 'Rathnayake', '', '', '', '', '', 0),
(25, 'lassy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 'Lassy', 'Rathnayake', '', '', '', '', '', 0);

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `cart_id_add` AFTER INSERT ON `customer` FOR EACH ROW INSERT INTO cart (customer_id)
    VALUES (NEW.customer_id)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
