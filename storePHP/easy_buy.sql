-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2024 at 01:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easy_buy`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `order_pic` varchar(100) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendings`
--

CREATE TABLE `pendings` (
  `order_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendings`
--

INSERT INTO `pendings` (`order_id`, `name`, `date`, `status`) VALUES
(1, 'Ahmedd', '2024-05-22', 'Processing'),
(2, 'Ahmedd', '2024-05-22', 'acknowledged'),
(3, 'Ahmedd', '2024-05-22', 'acknowledged'),
(4, 'Ahmedd', '2024-05-22', 'Delivered'),
(5, 'staff-1', '2024-05-22', 'Pending'),
(6, 'Ahmedd', '2024-05-22', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `catagory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `qty`, `pic`, `catagory`) VALUES
(0, 'Samsung Refrigerator', 329.99, 0, 'images\\fridge.jpeg', 'electronics'),
(1, 'iphone 15 pro max', 521.999, 4, 'images\\iphone15.jpg', 'electronics'),
(2, 'MacBookPro', 1300.99, 1, 'images\\MacBookPro.jpeg', 'electronics'),
(3, 'Apple AirPods Pro ', 125.704, 2, 'images\\airpods.jpeg', 'electronics'),
(4, 'Microsoft Xbox Series X', 240, 0, 'images\\xbox.jpeg', 'electronics'),
(5, 'LG 4K Smart TV', 169.99, 2, 'images\\tv.jpeg', 'electronics'),
(6, 'Zatar Croissant', 0.25, 7, 'images\\ZatarCroissant.jpg', 'food'),
(7, 'Tanmiah Fresh Whole Chicken 1 kg', 1.725, 3, 'images\\Alyoum-Fresh-Chicken-2-x-700-g.jpg', 'food'),
(8, 'Alyoum Fresh Chicken', 3.15, 3, 'images\\Chicken-1kg.jpg ', 'food'),
(10, 'Scooter', 50, 0, 'images\\scooter.jpg', 'electronics'),
(11, 'Tomato 1kg', 0.54, 3, 'images\\Tomato.jpg', 'food');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`) VALUES
(1, 'admin', 'admin@123.com', 'abc123', 'admin'),
(30, 'test', 'test@gmail.com', '$2y$10$8TMffM4wT8wm/FlY.ID7LOHGDBW06Fikoa2W3QMnGmQenISrxGbMS', 'user'),
(31, 'staff-1', 'staff@gmail.com', '$2y$10$bRqXuZSmn9pVOX5Y6J.kvOHjnxMVnYldOVvUSrXbn3/TxOYW4rp.O', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendings`
--
ALTER TABLE `pendings`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `pendings`
--
ALTER TABLE `pendings`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
