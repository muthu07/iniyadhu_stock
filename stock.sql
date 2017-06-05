-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 02:40 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT '0',
  `brand_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'Gap', 1, 2),
(2, 'Forever 21', 1, 2),
(3, 'Gap', 1, 2),
(4, 'Forever 21', 1, 2),
(5, 'Adidas', 1, 2),
(6, 'Gap', 1, 2),
(7, 'Forever 21', 1, 2),
(8, 'Adidas', 1, 2),
(9, 'Gap', 1, 2),
(10, 'Forever 21', 1, 2),
(11, 'Adidas', 1, 2),
(12, 'Gap', 1, 2),
(13, 'Forever 21', 1, 2),
(14, 'Iniyathu', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'Sports ', 1, 2),
(2, 'Casual', 1, 2),
(3, 'Casual', 1, 2),
(4, 'Sport', 1, 2),
(5, 'Casual', 1, 2),
(6, 'Sport wear', 1, 2),
(7, 'Casual wear', 1, 2),
(8, 'Sports ', 1, 2),
(9, 'Oil', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `client_id` varchar(30) NOT NULL,
  `client_name` varchar(20) NOT NULL,
  `phone_number` varchar(17) NOT NULL,
  `secondary_number` varchar(17) NOT NULL,
  `address` varchar(80) NOT NULL,
  `Landmark` varchar(30) NOT NULL,
  `family_type` varchar(15) NOT NULL,
  `family_count` int(2) NOT NULL,
  `google_map` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`client_id`, `client_name`, `phone_number`, `secondary_number`, `address`, `Landmark`, `family_type`, `family_count`, `google_map`) VALUES
('6454', 'madura', '9884500746', '9884500746', 'poda', 'vada', 'family', 7, '98856868'),
('cust00001', 'Muthu', '9884500746', '', 'djodiojdihjidjdjdoj', 'Near Thanni thotti', '1', 7, '42.333373, -83.167342'),
('cust31May2017746', 'Muthu', '9884500747', '9884500749', 'Muthuaaa ', 'Madurai', 'bach', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_id` varchar(30) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_id`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `order_status`) VALUES
(1, '2016-07-15', '', 'John Doe', '9807867564', '2700.00', '351.00', '3051.00', '1000.00', '2051.00', '1000.00', '1051.00', 2, 2, 2),
(2, '2016-07-15', '', 'John Doe', '9808746573', '3400.00', '442.00', '3842.00', '500.00', '3342.00', '3342', '0', 2, 1, 2),
(3, '2016-07-16', '', 'John Doe', '9809876758', '3600.00', '468.00', '4068.00', '568.00', '3500.00', '3500', '0', 2, 1, 2),
(4, '2016-08-01', '', 'Indra', '19208130', '1200.00', '156.00', '1356.00', '1000.00', '356.00', '356', '0.00', 2, 1, 2),
(5, '2016-07-16', '', 'John Doe', '9808767689', '920.00', '119.60', '1039.60', '0', '1039.60', '0', '1039.60', 2, 1, 1),
(6, '2017-06-02', '', 'madura', '9884500746', '150.00', '19.50', '169.50', '19.50', '150.00', '100', '50.00', 2, 2, 1),
(7, '2017-06-02', 'cust31May2017746', 'Muthu malai', '9884500747', '300.00', '39.00', '339.00', '0', '339.00', '100', '239.00', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(1, 1, 1, '1', '1500', '1500.00', 2),
(2, 1, 2, '1', '1200', '1200.00', 2),
(3, 2, 3, '2', '1200', '2400.00', 2),
(4, 2, 4, '1', '1000', '1000.00', 2),
(5, 3, 5, '2', '1200', '2400.00', 2),
(6, 3, 6, '1', '1200', '1200.00', 2),
(7, 4, 5, '1', '1200', '1200.00', 2),
(16, 5, 9, '3', '150', '450.00', 1),
(17, 5, 10, '2', '235', '470.00', 1),
(18, 6, 9, '1', '150', '150.00', 1),
(20, 7, 9, '2', '150', '300.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `skuid` varchar(12) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_cost` int(8) NOT NULL,
  `transport_cost` int(4) NOT NULL,
  `bottel_cost` int(4) NOT NULL,
  `margin_cost` int(5) NOT NULL,
  `product_desc` varchar(40) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `skuid`, `product_name`, `product_cost`, `transport_cost`, `bottel_cost`, `margin_cost`, `product_desc`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(9, 'gnut01042017', 'Groundnut Oil -1 liter', 0, 0, 0, 0, '', '../assests/images/stock/1454858dfb9f882fc9.png', 14, 9, '14', '150', 1, 1),
(10, 'same01042017', 'Sesame Oil - 1 liter', 0, 0, 0, 0, '', '../assests/images/stock/586358df0e5d1d647.jpg', 14, 9, '15', '240', 1, 1),
(12, NULL, 'Coconut', 5600, 7, 5, 35, '', '../assests/images/stock/1181558dfb9e1e8b74.png', 14, 9, '32', '200', 1, 1),
(13, NULL, '$productName', 6, 6, 7, 8, '', '$url', 5, 6, '$quantity', '$rate', 2, 2),
(14, NULL, 'ghhh', 6, 6, 7, 8, '', '../assests/images/stock/1935927d94b717fa.jpg', 5, 6, '5', '56', 2, 2),
(15, NULL, '$productName', 8, 9, 9, 8, 'ooropr', '$url', 3, 4, '$quantity', '$rate', 2, 2),
(16, NULL, 'muthu', 3, 3, 3, 3, ' ', '../assests/images/stock/1392592d59e75429b.jpg', 14, 9, '3', '10', 2, 2),
(17, NULL, 'Korila', 34, 34, 2, 53, ' ', '../assests/images/stock/823159301c4023deb.jpg', 14, 9, '55', '96', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_id` (`client_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `skuid` (`skuid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
