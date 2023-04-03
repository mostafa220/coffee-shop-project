-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 01:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` char(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `email`, `password`, `image`) VALUES
(1, 'mohamed dawood', 'mm@m.com', '123456Mm', 'pic.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(3, 'cola22'),
(2, 'cool drinks'),
(1, 'hot drinks');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `totalPrice` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('proccessing','out to deliver','deliver','canseld') DEFAULT 'proccessing',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `totalPrice`, `user_id`, `status`, `created_at`) VALUES
(13, 116, 1, 'deliver', '2023-02-16 15:30:24'),
(14, 33, 1, 'canseld', '2023-02-17 12:09:03'),
(15, 152, 1, 'canseld', '2023-02-18 09:32:26'),
(16, 66, 1, 'canseld', '2023-02-18 12:41:19'),
(17, 33, 8, 'proccessing', '2023-02-18 12:54:57'),
(18, 172, 8, 'proccessing', '2023-02-18 12:56:54'),
(19, 75, 8, 'deliver', '2023-02-18 12:58:14'),
(20, 15, 8, 'canseld', '2023-02-18 12:58:38'),
(21, 30, 1, 'canseld', '2023-02-19 15:13:18'),
(22, 174, 1, 'proccessing', '2023-04-03 23:34:18'),
(23, 60, 1, 'proccessing', '2023-04-03 23:35:20'),
(24, 102, 1, 'proccessing', '2023-04-03 23:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `image` text NOT NULL,
  `status` enum('available','un available') DEFAULT 'available',
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `image`, `status`, `category_id`, `created_at`) VALUES
(6, 'cofee', 18, 'cofee.jpg', 'available', 1, '2023-02-08 15:11:58'),
(7, 'tea', 15, 'tea.jpg', 'available', 1, '2023-02-08 15:15:53'),
(8, 'Nescafee', 25, 'Nescafee.jpg', 'available', 1, '2023-02-08 15:17:16'),
(24, 'php', 88, 'sss.png.jpg', 'un available', 3, '2023-02-19 15:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `products_orders`
--

CREATE TABLE `products_orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_orders`
--

INSERT INTO `products_orders` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(13, 6, 2, 18),
(13, 7, 2, 15),
(13, 8, 2, 25),
(14, 6, 1, 18),
(14, 7, 1, 15),
(15, 6, 4, 18),
(15, 7, 2, 15),
(15, 8, 2, 25),
(16, 6, 2, 18),
(16, 7, 2, 15),
(17, 6, 1, 18),
(17, 7, 1, 15),
(18, 6, 4, 18),
(18, 8, 4, 25),
(19, 7, 5, 15),
(20, 7, 1, 15),
(21, 7, 2, 15),
(22, 6, 8, 18),
(22, 7, 2, 15),
(23, 7, 4, 15),
(24, 6, 4, 18),
(24, 7, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `room`, `image`, `created_at`) VALUES
(1, 'mohamed dawood', 'v@v.com', '123456Vv', '01146724903', 'aplication2', 'img_girl.jpg', '2023-01-17 20:00:00'),
(7, 'ali ali', 'ali@a.com', '123456mM', '01245876325', 'room3', 'cellphone.jpg', '2023-02-17 16:11:01'),
(8, 'sara ali', 's@s.com', '123456mM', '01245789652', 'room2', 'sanfran.jpg', '2023-02-17 16:12:10'),
(10, 'marium hesham', 'd@d.com', '$2y$10$CVBqx4.jcmTLNIH1qMXu2e0inXWcxwFJNxn2S/3CntFIw1D9zDp1u', '01123456782', 'room1', 'sss.png.jpg', '2023-02-18 21:45:38'),
(16, 'marium hesham', 'g@f.com', '1212121212Kk', '01123456723', 'room1', 'sss.png.jpg', '2023-02-19 15:51:04'),
(18, 'mostafa', 'g@f1.com', '$2y$10$C2mdsOqbmAR7Y.it5fOMHu88z0C0dEdMIfTbj6YVQsEg/KvV8..ly', '01123456732', 'room1', 'sss.png.jpg', '2023-02-19 15:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `users_card`
--

CREATE TABLE `users_card` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_card`
--

INSERT INTO `users_card` (`user_id`, `product_id`) VALUES
(8, 8),
(8, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `users_card`
--
ALTER TABLE `users_card`
  ADD KEY `users_card_ibfk_1` (`user_id`),
  ADD KEY `users_card_ibfk_2` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD CONSTRAINT `products_orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_card`
--
ALTER TABLE `users_card`
  ADD CONSTRAINT `users_card_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_card_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
