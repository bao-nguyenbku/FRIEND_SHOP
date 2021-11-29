-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 07:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
create database if not exists friend_shop;
use friend_shop;
set foreign_key_checks=0;
--
-- Database: `friend_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sex` char(1) NOT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `date_of_birth` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `last_name`, `first_name`, `user_name`, `password`, `sex`, `phone_number`, `date_of_birth`) VALUES
(1, 'Nguyễn Thiên', 'Bảo', 'nguyenthienbao@gmail.com', 'encrypted', 'M', 936010095, '2001-04-02 00:00:00'),
(2, 'Nguyễn Hoàng', 'Lâm', 'lamnguyen@gmail.com', 'encrypted', 'M', 898205611, '2001-10-09 00:00:00'),
(3, 'Nguyễn Hoàng Minh', 'Châu', 'chaunguyen@gmail.com', 'encrypted', 'M', 983684352, '2001-08-18 00:00:00'),
(4, 'Lê Minh', 'Chuẩn', 'lechuan@gmail.com', 'encrypted', 'M', 908112233, '2001-02-01 00:00:00'),
(5, 'Nguyễn Thái', 'Linh', 'linhthai@gmail.com', 'encrypted', 'M', 918003421, '2001-06-09 00:00:00'),
(6, 'Nguyễn Văn', 'An', 'nguyenvanan@gmail.com', 'encrypted', 'M', 834125678, '1991-09-12 00:00:00'),
(7, 'Nguyễn Thị', 'Bê', 'benguyen@gmail.com', 'encrypted', 'F', 909776688, '1990-10-02 00:00:00'),
(8, 'Nguyễn Hoàng', 'Long', 'longnguyen@gmail.com', 'encrypted', 'M', 123456700, '1989-10-04 00:00:00'),
(9, 'Trần Thị', 'Na', 'natran@gmail.com', 'encrypted', 'F', 912345678, '1995-12-19 00:00:00'),
(10, 'Trần Văn', 'Tài', 'taitran@gmail.com', 'encrypted', 'M', 914567890, '1994-12-10 00:00:00'),
(11, 'Lê Văn', 'Thường', 'levanthuong@gmail.com', 'encrypted', 'M', 134189675, '2002-04-13 00:00:00'),
(12, 'Trần Hoàng', 'Công', 'conghoang@gmail.com', 'encrypted', 'M', 134189657, '2001-04-14 00:00:00'),
(13, 'Trần Văn', 'Thống', 'thongtran@gmail.com', 'encrypted', 'M', 914567899, '1992-12-10 00:00:00'),
(14, 'Nguyễn Thiên', 'Ân', 'nguyenthienan@gmail.com', 'encrypted', 'F', 914567999, '1987-05-11 00:00:00'),
(15, 'Nguyễn Lê', 'Hoàng', 'hoangnguyen@gmail.com', 'encrypted', 'M', 91456783, '1992-12-26 00:00:00'),
(16, 'Trần Đình', 'Mai', 'maitran@gmail.com', 'encrypted', 'F', 912789452, '1992-09-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `belong`
--

CREATE TABLE `belong` (
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `belong`
--

INSERT INTO `belong` (`order_id`, `product_id`, `price`) VALUES
(1, 'DT01', 0),
(2, 'DT03', 0),
(3, 'DT06', 0),
(4, 'DT07', 0),
(1, 'LT01', 0),
(7, 'LT03', 0),
(6, 'LT04', 0),
(7, 'LT05', 0),
(5, 'PKH01', 0),
(4, 'PKL01', 0),
(4, 'PKP01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contain`
--

CREATE TABLE `contain` (
  `product_id` varchar(255) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contain`
--

INSERT INTO `contain` (`product_id`, `store_id`) VALUES
('DT01', 1),
('DT02', 1),
('DT03', 2),
('DT04', 2),
('DT05', 3),
('DT06', 3),
('DT07', 1),
('DT08', 2),
('LT01', 1),
('LT02', 1),
('LT03', 2),
('LT04', 2),
('LT05', 3),
('LT06', 3),
('PKH01', 2),
('PKH02', 3),
('PKL01', 2),
('PKL02', 3),
('PKL03', 3),
('PKL04', 2),
('PKL05', 1),
('PKL06', 1),
('PKP01', 3),
('PKP02', 2),
('PKP03', 1),
('PKP04', 3),
('PKP05', 2),
('PKP06', 1),
('PKP07', 1),
('PKS01', 2),
('PKS02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `account_id` int(11) NOT NULL,
  `is_customer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`account_id`, `is_customer`) VALUES
(7, 1),
(8, 1),
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dependent`
--

CREATE TABLE `dependent` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` char(1) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `relationship` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dependent`
--

INSERT INTO `dependent` (`staff_id`, `name`, `sex`, `date_of_birth`, `relationship`) VALUES
(1, 'Minh ', 'M', '1976-09-16 00:00:00', 'Cha'),
(2, 'Nam', 'M', '1979-09-17 00:00:00', 'Chú'),
(3, 'Lan', 'F', '1986-10-18 00:00:00', 'Mẹ'),
(5, 'Hồng', 'F', '1981-12-02 00:00:00', 'Mẹ');

-- --------------------------------------------------------

--
-- Table structure for table `exports`
--

CREATE TABLE `exports` (
  `order_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exports`
--

INSERT INTO `exports` (`order_id`, `staff_id`) VALUES
(1, 3),
(1, 5),
(3, 2),
(5, 1),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `has`
--

CREATE TABLE `has` (
  `order_id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `has`
--

INSERT INTO `has` (`order_id`, `promotion_id`) VALUES
(1, 7),
(3, 2),
(4, 3),
(6, 5),
(7, 8),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `staff_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`staff_id`, `store_id`, `start_date`) VALUES
(4, 1, '2021-11-09 05:35:19'),
(10, 2, '2021-11-09 05:35:47'),
(13, 3, '2021-11-09 05:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `payment_type`, `create_date`, `cost`) VALUES
(1, 'Paid', 'Credit Cards', '2021-04-05 11:12:53', 1200000),
(2, 'UnPaid', 'Cash', '2021-10-25 12:22:52', 690000),
(3, 'Paid', 'E-Wallets', '2021-05-03 22:21:34', 350000),
(4, 'Paid', 'E-Wallets', '2021-02-28 11:11:11', 2500000),
(5, 'UnPaid', 'Cash', '2021-01-04 12:32:45', 34000000),
(6, 'Paid', 'Credit Cards', '2021-01-04 04:40:10', 43000),
(7, 'Paid', 'E-Wallets', '2021-05-05 15:10:10', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`order_id`, `customer_id`) VALUES
(1, 7),
(3, 9),
(5, 10),
(6, 8),
(8, 11);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `specs` varchar(1000) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `price`, `specs`, `name`, `category`) VALUES
('DT01', 44990000, 'Bộ nhớ trong: 512GB', 'Samsung Galaxy Z', 'Điện thoại'),
('DT02', 20490000, 'Bộ nhớ trong: 128GB', 'Iphone 12', 'Điện thoại'),
('DT03', 29990000, 'Bộ nhớ trong: 1TB', 'Iphone 13 Pro', 'Điện thoại'),
('DT04', 9490000, 'Bộ nhớ trong: 128GB', 'Oppo Reno6', 'Điện thoại'),
('DT05', 6690000, 'Bộ nhớ trong: 128GB', 'Oppo A74', 'Điện thoại'),
('DT06', 3990000, 'Bộ nhớ trong: 64GB', 'Realme C21Y', 'Điện thoại'),
('DT07', 9490000, 'Bộ nhớ trong: 128GB', 'Xiaomi 11 Lite 5G', 'Điện thoại'),
('DT08', 4290000, 'Bộ nhớ trong: 128GB', 'Vivo Y21', 'Điện thoại'),
('LT01', 42990000, 'CPU: Apple M1', 'Macbook Pro', 'Laptop'),
('LT02', 29690000, 'CPU: i7, 11800H, 2.30 GHz', 'Acer Nitro', 'Laptop'),
('LT03', 44990000, 'CPU: Ryzen 9, 5900HS, 3GHz', 'Asus ROG', 'Laptop'),
('LT04', 25990000, 'CPU: i7, 10750H, 2.6GHz', 'Lenovo Ideapad', 'Laptop'),
('LT05', 31990000, 'CPU: i7, 10750H, 2.6GHz', 'Dell Gaming', 'Laptop'),
('LT06', 29490000, 'CPU: i5, 10500H, 2.5GHz', 'MSI Gaming', 'Laptop'),
('PKH01', 600000, 'Âm trầm mạnh mẽ, âm thanh chất lượng cao', 'Tai nghe', 'Phụ kiện âm thanh'),
('PKH02', 1290000, 'Âm thanh JBL Pro Sound, tổng công suất 40 W sinh động', 'Loa', 'Phụ kiện âm thanh'),
('PKL01', 300000, 'Công suất tối đa: 150W', 'Bộ sạc pin Laptop', 'Phụ kiện Laptop'),
('PKL02', 500000, '2 cổng USB 3.0HDMIUSB Type-C', 'Adapter chuyển đổi', 'Phụ kiện Laptop'),
('PKL03', 200000, 'Không dây\r\nTrọng lượng: 61g', 'Chuột máy tính', 'Phụ kiện Laptop'),
('PKL04', 349000, 'Fullkey\r\nĐộ dài: 43.5cm', 'Bàn phím', 'Phụ kiện Laptop'),
('PKL05', 390000, 'Kích thước màn hình 13.3 inch đến 15.6 inch', 'Túi chống sốc', 'Phụ kiện Laptop'),
('PKL06', 590000, 'Trên các bề mặt tiếp xúc có miếng silicon chống trượt tốt', 'Giá đỡ laptop', 'Phụ kiện Laptop'),
('PKP01', 170000, 'Độ dài: 1m\r\nCông suất tối đa: 18W', 'Bộ sạc pin', 'Phụ kiện di động'),
('PKP02', 50000, 'Độ dày: 30 micromet', 'Dán màn hình', 'Phụ kiện di động'),
('PKP03', 750000, 'Công suất tối đa: 30W', 'Pin sạc dự phòng', 'Phụ kiện di động'),
('PKP04', 70000, 'Kiểu dáng thời trang và đẹp mắt', 'Ốp lưng điện thoại', 'Phụ kiện di động'),
('PKP05', 40000, 'Thấm nước tốt', 'Túi chống nước', 'Phụ kiện di động'),
('PKP06', 240000, 'Độ dài: 19,5cm', 'Gậy tự sướng', 'Phụ kiện di động'),
('PKP07', 96000, 'Bền', 'Giá đỡ điện thoại', 'Phụ kiện di động'),
('PKS01', 360000, 'Tốc độ đọc 100 MB/s.\r\nTốc độ ghi 30 MB/s.', 'Thẻ nhớ', 'Phụ kiện lưu trữ'),
('PKS02', 690000, 'Ổ đĩa USB 3.1 Gen 1 cho hiệu năng ấn tượng với tốc độ đọc 150 MB/s', 'USB', 'Phụ kiện lưu trữ');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `sale_off` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `start_date`, `end_date`, `sale_off`) VALUES
(1, '2021-01-01 00:00:00', '2021-01-31 00:00:00', 30),
(2, '2021-04-01 00:00:00', '2021-04-14 00:00:00', 20),
(3, '2021-07-15 00:00:00', '2021-07-31 00:00:00', 25),
(4, '2021-10-01 00:00:00', '2021-10-14 00:00:00', 15),
(5, '2021-12-12 00:00:00', '2021-12-24 00:00:00', 30);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `account_id` int(11) NOT NULL,
  `is_staff` int(1) NOT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`account_id`, `is_staff`, `supervisor_id`, `salary`) VALUES
(1, 1, 4, 35000000),
(2, 1, 4, 15000000),
(3, 1, 4, 20000000),
(4, 1, NULL, 40000000),
(5, 1, 10, 18000000),
(6, 1, 10, 22000000),
(10, 1, NULL, 42000000),
(11, 1, 13, 17000000),
(12, 1, 13, 35000000),
(13, 1, NULL, 43000000),
(14, 1, 13, 35000000),
(15, 1, 13, 17000000),
(16, 1, 13, 23000000);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `location`) VALUES
(1, '214 Xa Lộ Hà Nội, TP Thủ Đức, TP Hồ Chí Minh'),
(2, '23 Lý Công Uẩn, quận Bình Kiến, TP Hồ Chí Minh'),
(3, '65 Lý Thường Kiệt, quận 10, TP Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `supervise`
--

CREATE TABLE `supervise` (
  `staff_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervise`
--

INSERT INTO `supervise` (`staff_id`, `supervisor_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(5, 10),
(6, 10),
(11, 13),
(12, 13),
(14, 13),
(15, 13),
(16, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `account_id` int(11) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`account_id`, `user_address`) VALUES
(1, '123, đường số 4, quận 5, TP Hồ Chí Minh'),
(2, '23, đường Lý Thường Kiệt, quận 5, TP Hồ Chí Minh'),
(3, '58, Xa Lộ Hà Nội, quận Thủ Đức, TP Hồ Chí Minh'),
(4, '145, đường Nguyễn Thái Sơn, quận Gò Vấp, TP Hồ Chí Minh'),
(5, '35, đường Tô Ngọc Vân, quận 12, TP Hồ Chí Minh'),
(6, '78, đường Tân Thái An, quận 12, TP Hồ Chí Minh'),
(7, '65, đường Bùi Văn Ngữ, quận Hóc Môn, TP Hồ Chí Minh'),
(8, '161, đường Trần Huy Liệu, quận Phú Nhuận, TP Hồ Chí Minh'),
(9, '58, đường Sơn Kì, quận Tân Phú, TP Hồ Chí Minh'),
(10, '103, đường số 4, quận Bình Tân, TP Hồ Chí Minh'),
(11, '107, đường Khuông Việt, quận Tân Phú, TP Hồ Chí Minh'),
(12, '99, đường Lý Chiêu Hoàng, quận 6, TP Hồ Chí Minh'),
(13, '120, đường Tân Phú, quận 7, TP Hồ Chí Minh'),
(14, '138, đường số 1, quận Bình Chánh, TP Hồ Chí Minh'),
(15, '218, đường Tân Quý, quận Tân Phú, TP Hồ Chí Minh'),
(16, '359, đường số 8, quận Bình Tân, TP Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `works_for`
--

CREATE TABLE `works_for` (
  `staff_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `work_hours` float(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works_for`
--

INSERT INTO `works_for` (`staff_id`, `store_id`, `work_hours`) VALUES
(1, 1, 35.4),
(2, 1, 37.9),
(3, 1, 33.5),
(4, 1, 38.8),
(5, 1, 35.4),
(6, 2, 36.7),
(10, 2, 33.2),
(11, 2, 36.3),
(12, 2, 35.9),
(13, 3, 37.6),
(14, 3, 36.2),
(15, 3, 34.0),
(16, 3, 34.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `belong`
--
ALTER TABLE `belong`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `contain`
--
ALTER TABLE `contain`
  ADD PRIMARY KEY (`product_id`,`store_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `dependent`
--
ALTER TABLE `dependent`
  ADD PRIMARY KEY (`staff_id`,`name`);

--
-- Indexes for table `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`order_id`,`staff_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`order_id`,`promotion_id`),
  ADD KEY `promotion_id` (`promotion_id`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`order_id`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervise`
--
ALTER TABLE `supervise`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`account_id`,`user_address`);

--
-- Indexes for table `works_for`
--
ALTER TABLE `works_for`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belong`
--
ALTER TABLE `belong`
  ADD CONSTRAINT `belong_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `belong_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contain`
--
ALTER TABLE `contain`
  ADD CONSTRAINT `contain_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `contain_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dependent`
--
ALTER TABLE `dependent`
  ADD CONSTRAINT `dependent_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exports`
--
ALTER TABLE `exports`
  ADD CONSTRAINT `exports_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `exports_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `has_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `has_ibfk_2` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `manage_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`account_id`),
  ADD CONSTRAINT `manage_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pay`
--
ALTER TABLE `pay`
  ADD CONSTRAINT `pay_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `pay_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `staff` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervise`
--
ALTER TABLE `supervise`
  ADD CONSTRAINT `supervise_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supervise_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `staff` (`supervisor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `works_for`
--
ALTER TABLE `works_for`
  ADD CONSTRAINT `works_for_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`account_id`),
  ADD CONSTRAINT `works_for_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
set foreign_key_checks=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
