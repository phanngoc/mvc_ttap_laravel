-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2015 at 04:20 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thasian`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `birthday` datetime NOT NULL,
  `description` text NOT NULL,
  `linkimage` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `birthday`, `description`, `linkimage`) VALUES
(3, 'asdas', 'alibsdsds', 'asdas', '0000-00-00 00:00:00', 'saafef day ne', 'uploads/cay-co-dau.jpg'),
(5, 'asdasdsa', 'alibaba', 'asdas', '2015-05-19 00:00:00', 'saafef', 'uploads/event-thank-you-bg.png'),
(16, 'frgeth', 'fewheh', 'frhth', '2015-05-11 00:00:00', 'ewrgh', 'uploads/cay-lim-xet.jpg'),
(17, 'degrg', 'dsfsf', 'rgeth', '2015-05-19 00:00:00', 'sdfrhth hay ne', 'uploads/cay-co-dau.jpg'),
(18, 'abcsss', 'sadsad', '12345', '2015-05-19 00:00:00', 'fsrgrg', 'uploads/WP_20150511_001.jpg'),
(20, 'sdasd', 'sadasd', '1qasw2', '2015-05-25 00:00:00', 'asdsad', 'uploads/WP_20150511_002.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
