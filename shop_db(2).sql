-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2024 at 10:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `image`, `price`, `quantity`, `user_id`) VALUES
(6, 'Golden Earings', 'e.jpg', 450, 1, 3),
(7, 'Bows Set', 'bow.jpg', 500, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int NOT NULL,
  `Username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Number` int NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(190) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `Username`, `Number`, `Email`, `Password`) VALUES
(1, 'sushmita', 2147483647, 'sushmitachan44@gmail.com', '12345'),
(2, 'Benjamin', 2147483647, 'benjamin@gmail.com', '12345'),
(3, 'alixjodan@gmail.com', 12, 'gggg@gmail.com', '$2y$10$K60EYr.LfQs.9RjvFjAvX.nPro9asCWCzeH87eChw7COQhpxCtjji'),
(4, 'hello', 12, 'hello@gmail.com', '$2y$10$sTuhSnMhuw1HEG/yg/oLt.M4nM/h83iC42GJV/7eds194T5BQo5gu');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `nam` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `num` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `flat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `stat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `pin_code` int NOT NULL,
  `total_products` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` int NOT NULL,
  `order_date` date DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `nam`, `user_id`, `num`, `email`, `method`, `flat`, `street`, `city`, `stat`, `country`, `pin_code`, `total_products`, `total_price`, `order_date`, `state`) VALUES
(75, '123', 3, 12, 'gggg@gmail.com', 'Cash on delivery', '12312', '12312', '1231', '1231', 'Nepal', 1234, 'Golden Earings (1) , Bows Set (1) ', 950, NULL, 'pending'),
(76, '9999', 3, 19, 'gggg@gmail.com', 'Cash on delivery', '9', '9', '9', '9', 'nn', 12, 'Golden Earings (1) , Bows Set (1) ', 950, '2024-08-16', 'pending'),
(77, 'ee', 4, 1, 'hello@gmail.com', 'Cash on delivery', 'e', 'e', 'e', 'e', 'e', 22, 'Golden Earings (1) , Bows Set (1) ', 950, '2024-08-16', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Golden Earings', 450, 'e.jpg'),
(2, 'Bows Set', 500, 'bow.jpg'),
(3, 'Beads Necklace', 600, 'bcd.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
