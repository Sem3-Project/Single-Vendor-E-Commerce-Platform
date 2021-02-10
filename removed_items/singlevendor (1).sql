-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 06:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Stand-in structure for view `address`
-- (See below for the actual view)
--
CREATE TABLE `address` (
`customer_id` int(10)
,`zip_code` varchar(100)
,`address_line_1` varchar(100)
,`address_line_2` varchar(100)
,`city` varchar(100)
,`state` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_id`, `quantity`) VALUES
(1, 11, 0),
(3, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `cart_product_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `varient_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`cart_product_id`, `cart_id`, `varient_id`, `product_id`, `quantity`) VALUES
(3, 1, 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(3, 'color');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `address_line_1` varchar(100) NOT NULL,
  `address_line_2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `email`, `password`, `first_name`, `last_name`, `zip_code`, `address_line_1`, `address_line_2`, `city`, `state`) VALUES
(11, 'dfghj', '', '', '', '', '', '', '', ''),
(12, 'sdfg', '', '', '', '', '', '', '', '');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `cart_id_add` AFTER INSERT ON `customer` FOR EACH ROW INSERT INTO cart (customer_id)
    VALUES (NEW.customer_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `delivery_status` enum('yes','no','in_transit','') NOT NULL,
  `delivery_method` enum('Postal','Courier','In-store_pickup','') NOT NULL,
  `delivery_estimate` datetime NOT NULL,
  `additional_notes` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `order_id`, `delivery_status`, `delivery_method`, `delivery_estimate`, `additional_notes`) VALUES
(3, 5, 'yes', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_cart`
-- (See below for the actual view)
--
CREATE TABLE `display_cart` (
`product_name` varchar(60)
,`varient_name` varchar(20)
,`price` float(10,2)
,`image` blob
,`quantity` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `payment_method` enum('CashONDelivery','VISA','Paypal','') NOT NULL,
  `total_payment` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `payment_method`, `total_payment`) VALUES
(5, 11, 'CashONDelivery', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_offer` float(5,2) NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `product_id`, `quantity`, `product_price`, `product_offer`, `order_id`) VALUES
(2, 3, 2, 0.00, 0.00, 5);

-- --------------------------------------------------------

--
-- Table structure for table `phone_number`
--

CREATE TABLE `phone_number` (
  `customer_id` int(10) NOT NULL,
  `phone_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone_number`
--

INSERT INTO `phone_number` (`customer_id`, `phone_number`) VALUES
(12, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `category_id` int(10) NOT NULL,
  `subcat_id` int(10) NOT NULL,
  `description` text NOT NULL,
  `weight` varchar(5) NOT NULL,
  `dimension` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category_id`, `subcat_id`, `description`, `weight`, `dimension`, `brand`) VALUES
(3, 'asdfg', 3, 3, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcat_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `subcat_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `category_id`, `subcat_name`) VALUES
(3, 3, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `varient`
--

CREATE TABLE `varient` (
  `varient_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `SKU` varchar(30) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` blob NOT NULL,
  `varient_name` varchar(20) NOT NULL,
  `no_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `varient`
--

INSERT INTO `varient` (`varient_id`, `product_id`, `SKU`, `price`, `image`, `varient_name`, `no_stock`) VALUES
(3, 3, '', 0.00, '', '', 0);

-- --------------------------------------------------------

--
-- Structure for view `address`
--
DROP TABLE IF EXISTS `address`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `address`  AS  select `customer`.`customer_id` AS `customer_id`,`customer`.`zip_code` AS `zip_code`,`customer`.`address_line_1` AS `address_line_1`,`customer`.`address_line_2` AS `address_line_2`,`customer`.`city` AS `city`,`customer`.`state` AS `state` from `customer` ;

-- --------------------------------------------------------

--
-- Structure for view `display_cart`
--
DROP TABLE IF EXISTS `display_cart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_cart`  AS  select `product`.`product_name` AS `product_name`,`varient`.`varient_name` AS `varient_name`,`varient`.`price` AS `price`,`varient`.`image` AS `image`,`cart_product`.`quantity` AS `quantity` from ((`cart_product` join `varient`) join `product`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_ibfk_1` (`customer_id`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`cart_product_id`),
  ADD KEY `cart_product_ibfk_1` (`cart_id`),
  ADD KEY `cart_product_ibfk_2` (`varient_id`),
  ADD KEY `cart_product_ibfk_3` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `delivery_ibfk_1` (`order_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_ibfk_1` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `order_product_ibfk_1` (`product_id`),
  ADD KEY `order_product_ibfk_2` (`order_id`);

--
-- Indexes for table `phone_number`
--
ALTER TABLE `phone_number`
  ADD KEY `phone_number_ibfk_1` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_ibfk_1` (`category_id`),
  ADD KEY `product_ibfk_2` (`subcat_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `subcategory_ibfk_1` (`category_id`);

--
-- Indexes for table `varient`
--
ALTER TABLE `varient`
  ADD PRIMARY KEY (`varient_id`),
  ADD KEY `varient_ibfk_1` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `cart_product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `varient`
--
ALTER TABLE `varient`
  MODIFY `varient_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`varient_id`) REFERENCES `varient` (`varient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone_number`
--
ALTER TABLE `phone_number`
  ADD CONSTRAINT `phone_number_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`subcat_id`) REFERENCES `subcategory` (`subcat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `varient`
--
ALTER TABLE `varient`
  ADD CONSTRAINT `varient_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
