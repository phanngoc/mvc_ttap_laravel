-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2015 at 01:56 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baitap`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`) VALUES
(1, 'Hoa canh dep', 12000, 'Day la san pham rat tot nhe'),
(2, 'May tinh samsung day', 140002, 'Day la may tinh hieu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `address`, `email`) VALUES
(1, 'baitap_1', 21, 'city_1', 'example_1@gmail.com'),
(2, 'baitap_2', 22, 'city_2', 'example_2@gmail.com'),
(3, 'baitap_3', 23, 'city_3', 'example_3@gmail.com'),
(4, 'baitap_4', 24, 'city_4', 'example_4@gmail.com'),
(5, 'baitap_5', 25, 'city_5', 'example_5@gmail.com'),
(6, 'baitap_6', 26, 'city_6', 'example_6@gmail.com'),
(7, 'baitap_7', 27, 'city_7', 'example_7@gmail.com'),
(8, 'baitap_8', 28, 'city_844', 'example_8@gmail.com'),
(9, 'baitap_9', 29, 'city_9', 'example_9@gmail.com'),
(10, 'baitap_10', 30, 'city_10', 'example_10@gmail.com'),
(11, 'baitap_11', 31, 'city_11', 'example_11@gmail.com'),
(12, 'baitap_12', 32, 'city_12', 'example_12@gmail.com'),
(13, 'baitap_13', 33, 'city_13', 'example_13@gmail.com'),
(14, 'baitap_14', 34, 'city_14', 'example_14@gmail.com'),
(15, 'baitap_15', 35, 'city_15', 'example_15@gmail.com'),
(16, 'baitap_16', 36, 'city_16', 'example_16@gmail.com'),
(17, 'baitap_17', 37, 'city_17', 'example_17@gmail.com'),
(18, 'baitap_18', 38, 'city_18', 'example_18@gmail.com'),
(19, 'baitap_19', 39, 'city_19', 'example_19@gmail.com'),
(20, 'baitap_20', 40, 'city_20', 'example_20@gmail.com'),
(21, 'baitap_21', 41, 'city_21', 'example_21@gmail.com'),
(22, 'baitap_22', 42, 'city_22', 'example_22@gmail.com'),
(23, 'baitap_23', 43, 'city_23', 'example_23@gmail.com'),
(24, 'baitap_24', 44, 'city_24', 'example_24@gmail.com'),
(25, 'baitap_25', 45, 'city_25', 'example_25@gmail.com'),
(26, 'baitap_26', 46, 'city_26', 'example_26@gmail.com'),
(27, 'baitap_27', 47, 'city_27', 'example_27@gmail.com'),
(28, 'baitap_28', 48, 'city_28', 'example_28@gmail.com'),
(29, 'baitap_29', 49, 'city_29', 'example_29@gmail.com'),
(30, 'baitap_30', 50, 'city_30', 'example_30@gmail.com'),
(31, 'baitap_31', 51, 'city_31', 'example_31@gmail.com'),
(32, 'baitap_32', 52, 'city_32', 'example_32@gmail.com'),
(33, 'baitap_33', 53, 'city_33', 'example_33@gmail.com'),
(34, 'baitap_34', 54, 'city_34', 'example_34@gmail.com'),
(35, 'baitap_35', 55, 'city_35', 'example_35@gmail.com'),
(36, 'baitap_36', 56, 'city_36', 'example_36@gmail.com'),
(37, 'baitap_37', 57, 'city_37', 'example_37@gmail.com'),
(38, 'baitap_38', 58, 'city_38', 'example_38@gmail.com'),
(39, 'baitap_39', 59, 'city_39', 'example_39@gmail.com'),
(40, 'baitap_40', 60, 'city_40', 'example_40@gmail.com'),
(41, 'baitap_41', 61, 'city_41', 'example_41@gmail.com'),
(42, 'baitap_42', 62, 'city_42', 'example_42@gmail.com'),
(43, 'baitap_43', 63, 'city_43', 'example_43@gmail.com'),
(44, 'baitap_44', 64, 'city_44', 'example_44@gmail.com'),
(45, 'baitap_45', 65, 'city_45', 'example_45@gmail.com'),
(46, 'baitap_46', 66, 'city_46', 'example_46@gmail.com'),
(47, 'baitap_47', 67, 'city_47', 'example_47@gmail.com'),
(48, 'baitap_48', 68, 'city_48', 'example_48@gmail.com'),
(49, 'baitap_49', 69, 'city_49', 'example_49@gmail.com'),
(50, 'baitap_50', 70, 'city_50', 'example_50@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
