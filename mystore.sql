-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 04:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(5, '::1', 2),
(10, '::1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'flower Plants'),
(2, 'Indoor plants'),
(3, 'medicinal plants'),
(4, 'Outdoor plants'),
(5, 'Vegetable Plants'),
(6, 'Others'),
(7, 'pool');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 1213957686, 8, 1, 'pending'),
(2, 1, 1701501338, 8, 1, 'pending'),
(3, 1, 567883717, 6, 1, 'pending'),
(4, 1, 160098790, 8, 1, 'pending'),
(5, 1, 307271439, 6, 1, 'pending'),
(6, 1, 1201194354, 8, 1, 'pending'),
(7, 1, 1009426210, 7, 1, 'pending'),
(8, 2, 1042244018, 7, 1, 'pending'),
(9, 3, 1625623107, 8, 1, 'pending'),
(10, 3, 484933134, 6, 1, 'pending'),
(11, 3, 163125423, 5, 1, 'pending'),
(12, 1, 277845770, 8, 1, 'pending'),
(13, 1, 1616254360, 3, 1, 'pending'),
(14, 2, 19353197, 8, 1, 'pending'),
(15, 2, 1516177699, 8, 1, 'pending'),
(16, 2, 1865966362, 7, 1, 'pending'),
(17, 2, 445927308, 8, 1, 'pending'),
(18, 2, 2064398982, 4, 1, 'pending'),
(19, 2, 247768598, 5, 1, 'pending'),
(20, 2, 2019450026, 7, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `category_id`, `services_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(2, 'Mint', 'fragrant and versatile herb known for its flavor', 'mint, medicinal plant, healthy plants, medicinal', 3, 1, 'mint2.jpg', 'mint1.webp', 'mint3.jpg', '150', '2024-03-14 15:08:56', 'true'),
(3, 'Fertilizers', 'Nutrient-rich compounds enhancing soil fertility', 'fertilizer, urin, soil fertility, fertility', 6, 4, 'fertilizer1.webp', 'fetilizer2.jpg', 'fertilizer3.jpg', '220', '2024-03-14 15:10:08', 'true'),
(4, 'Soil', 'complex ecosystem supporting plant life ', 'soil, plant soil', 6, 3, 'soil1.jpg', 'soil2.jpg', 'soil3.webp', '240', '2024-03-14 15:12:17', 'true'),
(5, 'Pots ', 'Versatile containers for cultivating plants ', ' pot, pots, plants pot, designer pots, decorated pots ', 6, 3, 'pot1.jpg', 'pot2.jpg', 'pot3.jpg', '300', '2024-03-14 15:13:56', 'true'),
(6, 'vegitable', 'Juicy and versatile fruit, rich in antioxidants', 'tomato, vegetable plant, low price, healthy plant', 6, 6, 'tomato1.jpg', 'tomato2.jpg', 'tomato3.jpeg', '240', '2024-03-21 16:04:17', 'true'),
(7, 'Rose', 'Rose is a fragrant , symbolizing love and beauty', 'rose, red rose, flower, fragrant flowers', 1, 1, 'rose3.jpeg', 'rose2.jpg', 'rose1.webp', '220', '2024-03-14 15:17:11', 'true'),
(8, 'Tulips', 'Vibrant spring-blooming flowers with cup-shaped petals in a variety of colors.', 'tulips, colorful tulips, flowers, cup-shape flower, english flowers', 1, 1, 'tulip1.jpg', 'tulip2.avif', 'tulip3.webp', '360', '2024-03-14 15:20:14', 'true'),
(9, 'garden tool', 'kjsjk', 'garden tool', 6, 6, 'too1.jpg', 'tool2.jpg', 'tool3.webp', '350', '2024-03-22 03:17:43', 'true'),
(10, 'spre', 'ajjnsxjk ', 'perfum', 1, 6, 'admin1.jpg', 'profile2.jpeg', 'pot3.jpg', '420', '2024-03-22 04:57:09', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `services_id` int(11) NOT NULL,
  `services_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_id`, `services_title`) VALUES
(1, 'Plants'),
(2, 'Seeds'),
(3, 'Pots & Soil'),
(4, 'Fertilizers'),
(5, 'Informations'),
(6, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 820, 277845770, 3, '2024-03-18 18:15:15', 'Complete'),
(2, 1, 370, 1616254360, 2, '2024-03-18 15:19:40', 'pending'),
(3, 2, 360, 19353197, 1, '2024-03-19 15:19:29', 'pending'),
(4, 2, 600, 1516177699, 2, '2024-03-22 03:04:50', 'pending'),
(5, 2, 220, 1865966362, 1, '2024-03-22 03:05:17', 'pending'),
(6, 2, 360, 445927308, 1, '2024-03-22 03:15:20', 'pending'),
(7, 2, 460, 2064398982, 2, '2024-03-22 03:21:34', 'pending'),
(8, 2, 0, 1131252870, 0, '2024-03-22 03:21:44', 'pending'),
(9, 2, 520, 247768598, 2, '2024-03-22 03:29:14', 'pending'),
(10, 2, 220, 2019450026, 1, '2024-03-22 04:54:29', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 277845770, 820, 'Netbanking', '2024-03-18 18:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, '', '', '$2y$10$ruhObL4Zl1TC1DfHnzwYUeqEqmNy9dyD03YtunIJkhpA83WDwHCLK', '', '::1', '', ''),
(3, 'shivani', 'shivani12@gmail.com', '$2y$10$HIX1AyVjS4q.H0AhTevuM.unAjmlD/j351R/fWMpTxq.DI5PyDM2C', '', '::1', 'aarey', '1258479632'),
(4, 'riya', 'riya123@gmail.com', '$2y$10$wp3/sPpa8ftPaLOwIkaCZe.mdvXZ/94IzUrv/qUV3fhq5g3z21PHO', '', '::1', 'goregaon', '1236547899');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
