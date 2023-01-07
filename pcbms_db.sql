-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 07:53 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcbms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `dh_code` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `expiry_date` date NOT NULL,
  `supplier_selling_unit_price` float NOT NULL,
  `pc_selling_unit_price` float NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_delivery`
--

CREATE TABLE `product_delivery` (
  `delivery_code` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_delivery`
--

INSERT INTO `product_delivery` (`delivery_code`, `supplier_id`, `delivery_date`) VALUES
(1, 15, '2022-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(100) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `contact_person` varchar(30) NOT NULL,
  `gender` enum('Male','Female','LGBTQ') NOT NULL,
  `address` varchar(30) NOT NULL,
  `contact_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `company_name`, `contact_person`, `gender`, `address`, `contact_no`) VALUES
(15, 'marvin', 'gwapo', 'Male', 'Brgy.Gacat Lower siong', '0965 624 86');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `prefix` varchar(20) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `user_type` enum('POS','Store manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `prefix`, `position`, `user_type`) VALUES
(1, 'marvin', '*4C8D466CE3D0F1D20CC', 'Marvin', 'Bedio', 'Caintic', NULL, 'Part timer', 'Store manager'),
(2, '', '*4C8D466CE3D0F1D20CC', '', '', '', NULL, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD KEY `dh_code` (`dh_code`);

--
-- Indexes for table `product_delivery`
--
ALTER TABLE `product_delivery`
  ADD PRIMARY KEY (`delivery_code`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`dh_code`) REFERENCES `product_delivery` (`delivery_code`);

--
-- Constraints for table `product_delivery`
--
ALTER TABLE `product_delivery`
  ADD CONSTRAINT `product_delivery_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
