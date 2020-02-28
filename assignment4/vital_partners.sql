-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2020 at 05:35 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vital_partners`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `parent_id`) VALUES
(163, 'clothes', NULL),
(174, 'electronics', NULL),
(175, 'LED', 174),
(176, 'mens wear', 163),
(177, 'shirt', 176);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `image`, `price`, `category_id`) VALUES
(24, 'shirt blue color', 'download (1)_1580463052.jpeg', '999.00', 169),
(25, 'shirt', 'download_1580463090.jpeg', '699.00', 167),
(28, 'shirt blue color', 'download (1)_1580463052.jpeg', '999.00', 169),
(29, 'shirt', 'download_1580463090.jpeg', '699.00', 167),
(32, 'shirt blue color', 'download (1)_1580463052.jpeg', '999.00', 169),
(33, 'shirt', 'download_1580463090.jpeg', '699.00', 167),
(36, 'shirt blue color', 'download (1)_1580463052.jpeg', '999.00', 169),
(37, 'shirt', 'download_1580463090.jpeg', '699.00', 167),
(40, 'shirt blue color', 'download (1)_1580463052.jpeg', '999.00', 169),
(41, 'shirt', 'download_1580463090.jpeg', '699.00', 167),
(42, 'jeans', 'download (2)_1580463190.jpeg', '2999.00', 164),
(43, 'kurti', '', '809.00', 165),
(44, 'shirt blue color', 'download (1)_1580463052.jpeg', '999.00', 169),
(45, 'shirt', 'download_1580463090.jpeg', '699.00', 167),
(46, 'jeans', 'download (2)_1580463190.jpeg', '2999.00', 164),
(47, 'kurti', '', '809.00', 165),
(48, 'shirt blue color', 'download (1)_1580463052.jpeg', '999.00', 169),
(49, 'shirt', 'download_1580463090.jpeg', '699.00', 167),
(50, 'jeans', 'download (2)_1580463190.jpeg', '2999.00', 164),
(51, 'kurti', '', '809.00', 165),
(52, 'shirt blue color', 'download (1)_1580463052.jpeg', '999.00', 169),
(53, 'shirt', 'download_1580463090.jpeg', '699.00', 167),
(54, 'jeans', 'download (2)_1580463190.jpeg', '2999.00', 164),
(55, 'kurti', '', '809.00', 165),
(56, 'shirt blue color', 'download (1)_1580463052.jpeg', '999.00', 169),
(57, 'shirt', 'download_1580463090.jpeg', '699.00', 167),
(58, 'jeans', 'download (2)_1580463190.jpeg', '2999.00', 164),
(59, 'kurti', '', '809.00', 165),
(60, 'shirt blue color', 'download (1)_1580463052.jpeg', '999.00', 169),
(61, 'shirt', 'download_1580463090.jpeg', '699.00', 167),
(62, 'jeans', 'download (2)_1580463190.jpeg', '2999.00', 164),
(63, 'kurti', '', '809.00', 165),
(64, 'shirt blue color', 'download (1)_1580463052.jpeg', '999.00', 169),
(65, 'shirt', 'ab1_1580476501.png', '699.00', 163),
(66, 'jeans', 'download (2)_1580463190.jpeg', '2999.00', 164),
(67, 'kurti', '', '809.00', 165);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
