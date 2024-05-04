-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 12:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgameshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_name`, `price`, `quantity`, `image`) VALUES
(28, 2, 'Controller PlayStation5', 2390, 1, 'Controller-PlayStation5.jpg'),
(29, 2, 'Xbox Series X', 18990, 1, 'Microsoft-XBox-Series-X.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'PlayStation'),
(2, 'Xbox'),
(3, 'Nintendo Switch');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_amount` int(6) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pattern`
--

CREATE TABLE `pattern` (
  `pattern_id` int(11) NOT NULL,
  `pattern_name` varchar(255) DEFAULT NULL,
  `pattern_media` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `type_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pattern`
--

INSERT INTO `pattern` (`pattern_id`, `pattern_name`, `pattern_media`, `category_id`, `type_id`) VALUES
(5, 'dragon ball', 'dragonball.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `type_id` int(3) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `added_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `quantity`, `category_id`, `type_id`, `image_url`, `status`, `added_date`) VALUES
(3, 'Sony PlayStation 5 Slim Disc Edition', 'CPU: มี CPU ที่มาพร้อมกับเทคโนโลยี AMD Zen 2 แบบ 8-core\r\nGPU: มี GPU ที่ใช้งานร่วมกับ AMD RDNA 2 ที่สามารถสร้างกราฟิกที่คมชัดและรายละเอียดสูงได้\r\nRAM: มี RAM ขนาด 16GB GDDR6\r\nStorage: มี SSD ความจุในตัวเครื่องที่อยู่ในช่วง 825GB ที่มีความเร็วการอ่านและเขียนข้อมูลที่เร็วมาก\r\nResolution: รองรับการแสดงผลความละเอียดสูงสุด 4K\r\nBackward Compatibility: PS5 ยังสามารถเล่นเกม PS4 ได้\r\nRay Tracing: มีการสนับสนุนเทคโนโลยี Ray Tracing สำหรับกราฟิกที่มีความสวยงามและเรียบเนียนมากขึ้น\r\nเทคโนโลยีเสียง: มีเทคโนโลยีเสียง 3D Audio ที่ช่วยสร้างประสบการณ์เสียงรอบทิศทางที่สมจริง', 18900.00, 14, 1, 2, 'Sony-PlayStation-5-Slim-Disc-Edition.jpg', 'In stock', '2024-03-18'),
(4, 'Controller PlayStation5', 'ค้นพบประสบการณ์การเล่นเกมที่ล้ําลึกขึ้น ด้วยคอนโทรลเลอร์ PS5 ที่ปรับปรุงใหม่, คอนโทรลเลอร์ไร้สาย DualSense สําหรับคอนโซล PS5 มอบการตอบสนองแบบสัมผัส อย่างสมจริง? ทั้งยังมีเอฟเฟกต์ทริกเกอร์แบบไดนามิก? และไมโครโฟนในตัว ทั้งหมด รวมอยู่ในการออกแบบอันเป็นเอกลักษณ์', 2390.00, 30, 1, 1, 'Controller-PlayStation5.jpg', 'In stock', '2024-03-18'),
(10, 'Sony PlayStation 5 Slim Digital Edition', '', 17900.00, 5, 1, 2, 'Sony-PlayStation-5-Slim-Digital-Edition.jpg', 'In stock', '2024-04-07'),
(11, 'Xbox Series X', 'เครื่องเล่นเกม Xbox Series X\r\nเป็นเครื่องเล่นเกมรุ่นใหม่ที่มีประสิทธิภาพสูงและความเร็วสูง มีดีไซน์ที่สวยงาม, ความจุขนาดใหญ่, และสามารถเล่นเกมในความละเอียด 4K', 18990.00, 30, 2, 2, 'Microsoft-XBox-Series-X.jpg', 'In stock', '2024-04-10'),
(15, 'Animal Crossing New Horizons', 'Game nintendo switch', 1890.00, 5, 3, 3, 'Animal-Crossing-New_Horizons.jpg', 'In stock', '2024-04-16'),
(17, 'Ring Fit adventure', 'เกมออกกำลังกาย', 2590.00, 10, 3, 3, 'Ring-Fit.jpg', 'In stock', '2024-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(10) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'Controller'),
(2, 'Console'),
(3, 'Game');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_type` varchar(15) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `gender`, `email`, `tel`, `address`, `user_type`) VALUES
(1, 'admin', 'admin123', 'Admin', 'Tester', 'men', 'admin@gmail.com', '0123456789', 'LA', 'admin'),
(2, 'tester', 'test123', 'tester', 'user', 'men', 'tester@gmail.com', '025746986', 'LA', 'user'),
(10, 'xxx', 'xxxxxxxx', 'xxx', 'xxx', 'men', 'xxx@gmail.com', '0258741369', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pattern`
--
ALTER TABLE `pattern`
  ADD PRIMARY KEY (`pattern_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `fk_type_id` (`type_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pattern`
--
ALTER TABLE `pattern`
  MODIFY `pattern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `pattern`
--
ALTER TABLE `pattern`
  ADD CONSTRAINT `fk_type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`),
  ADD CONSTRAINT `pattern_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
