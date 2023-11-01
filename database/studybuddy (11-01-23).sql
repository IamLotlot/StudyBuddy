-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 08:49 AM
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
-- Database: `studybuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `yearSection` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `studentid` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `profile` blob NOT NULL,
  `studFront` blob NOT NULL,
  `studBack` blob NOT NULL,
  `studycoin` int(11) DEFAULT NULL,
  `subscriber` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `role`, `state`, `email`, `fullname`, `address`, `yearSection`, `age`, `studentid`, `sex`, `contact`, `profile`, `studFront`, `studBack`, `studycoin`, `subscriber`, `date`) VALUES
('admin', 'admin', 'admin', 'verified', 'admin@gmail.com', 'admin', 'admin house', 'BSIT 3B WAN', '21', '01201265', 'Male', '09087451933', 0x61646d696e5f50726f66696c652d506963747572652e6a7067, '', '', NULL, '', ''),
('user1', 'user1', 'user', 'verified', 'user1@gmail.com', 'user1', 'user1 house', 'BSIT 3A WAM', '23', '01291290', 'Maalin', '09812382342', 0x75736572315f50726f66696c652d506963747572652e6a7067, '', '', -9501, 'true', '10-03-23'),
('user2', 'user2', 'user', 'verified', 'user2@gmail.com', 'user2', 'user2 house', 'BSIT 3A WAM', '19', '01291232', 'Medyo baliko', '092831273621', 0x75736572325f50726f66696c652d506963747572652e6a7067, '', '', 10000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `name` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `conversation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `example`
--

CREATE TABLE `example` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `example`
--

INSERT INTO `example` (`name`) VALUES
('test');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `username` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`username`, `event`, `date`, `time`) VALUES
('admin', 'logged in', '2023-09-11', '13:46:19'),
('admin', 'logged out', '2023-09-11', '13:59:42'),
('admin', 'logged in', '2023-09-11', '14:03:06'),
('admin', 'logged out', '2023-09-11', '14:24:44'),
('user1', 'logged in', '2023-09-12', '01:00:17'),
('', 'logged out', '2023-09-12', '13:54:53'),
('user1', 'logged in', '2023-09-12', '13:55:01'),
('user1', 'logged out', '2023-09-12', '13:57:57'),
('admin', 'logged in', '2023-09-17', '11:39:27'),
('admin', 'logged out', '2023-09-17', '11:58:31'),
('user1', 'logged in', '2023-09-17', '12:00:32'),
('', 'logged out', '2023-09-17', '19:33:20'),
('user1', 'logged in', '2023-09-17', '23:44:30'),
('', 'logged out', '2023-09-18', '12:59:30'),
('user1', 'logged in', '2023-09-18', '13:01:26'),
('', 'logged out', '2023-09-23', '10:50:02'),
('user2', 'logged in', '2023-09-23', '10:50:15'),
('', 'logged out', '2023-09-25', '23:57:36'),
('user2', 'logged in', '2023-09-25', '23:57:43'),
('', 'logged out', '2023-09-26', '16:52:27'),
('user2', 'logged in', '2023-09-26', '16:52:33'),
('user2', 'logged out', '2023-09-26', '16:54:30'),
('admin', 'logged in', '2023-09-26', '16:54:36'),
('admin', 'logged out', '2023-09-26', '17:45:05'),
('user2', 'logged in', '2023-09-26', '19:09:21'),
('user2', 'logged out', '2023-09-26', '19:50:27'),
('user2', 'logged in', '2023-09-26', '19:50:31'),
('user2', 'logged in', '2023-09-27', '17:10:01'),
('', 'logged out', '2023-09-29', '10:26:18'),
('user2', 'logged in', '2023-09-29', '10:27:07'),
('user2', 'logged out', '2023-09-30', '11:47:51'),
('user2', 'logged in', '2023-09-30', '11:48:01'),
('user2', 'logged out', '2023-09-30', '12:16:00'),
('user1', 'logged in', '2023-09-30', '12:16:07'),
('user1', 'logged out', '2023-09-30', '15:01:51'),
('admin', 'logged in', '2023-09-30', '15:01:56'),
('admin', 'logged out', '2023-10-01', '17:18:37'),
('user1', 'logged in', '2023-10-01', '17:18:48'),
('user1', 'logged out', '2023-10-01', '17:27:39'),
('admin', 'logged in', '2023-10-01', '17:27:45'),
('admin', 'logged out', '2023-10-02', '11:41:21'),
('user1', 'logged in', '2023-10-02', '11:41:31'),
('user1', 'logged out', '2023-10-03', '01:35:34'),
('user1', 'logged in', '2023-10-03', '01:35:40'),
('admin', 'logged in', '2023-10-03', '18:33:57'),
('admin', 'logged out', '2023-10-03', '18:34:34'),
('user1', 'logged in', '2023-10-03', '18:41:59'),
('user1', 'logged out', '2023-10-04', '14:19:06'),
('user1', 'logged in', '2023-10-04', '14:19:10'),
('user1', 'logged out', '2023-10-04', '22:22:04'),
('admin', 'logged in', '2023-10-08', '19:10:35'),
('admin', 'logged out', '2023-10-09', '20:48:03'),
('user1', 'logged in', '2023-10-09', '22:59:21'),
('user1', 'logged out', '2023-10-09', '23:03:05'),
('admin', 'logged in', '2023-10-09', '23:03:09'),
('admin', 'logged out', '2023-10-16', '22:29:37'),
('user1', 'logged in', '2023-10-16', '22:29:44'),
('user1', 'logged in', '2023-10-22', '20:03:44'),
('user1', 'logged in', '2023-10-22', '20:17:08'),
('user1', 'logged in', '2023-10-22', '20:18:17'),
('user1', 'logged in', '2023-10-22', '21:08:08'),
('admin', 'logged in', '2023-10-22', '21:09:05'),
('admin', 'logged out', '2023-10-22', '21:09:17'),
('user1', 'logged in', '2023-10-22', '21:09:22'),
('user1', 'logged in', '2023-10-22', '21:09:48'),
('user1', 'logged in', '2023-10-22', '21:10:42'),
('user1', 'logged in', '2023-10-22', '21:12:32'),
('user1', 'logged out', '2023-10-22', '22:31:12'),
('user1', 'logged in', '2023-10-22', '22:38:39'),
('user1', 'logged out', '2023-10-25', '12:22:01'),
('admin', 'logged in', '2023-10-25', '12:22:05'),
('admin', 'logged out', '2023-10-25', '12:23:21'),
('user1', 'logged in', '2023-10-25', '12:23:25'),
('user1', 'logged out', '2023-10-25', '23:59:46'),
('admin', 'logged in', '2023-10-25', '23:59:49'),
('admin', 'logged out', '2023-10-26', '15:44:18'),
('user1', 'logged in', '2023-10-26', '16:20:21'),
('user1', 'logged out', '2023-10-31', '00:12:00'),
('user1', 'logged in', '2023-10-31', '00:12:05'),
('user1', 'logged out', '2023-10-31', '00:12:23'),
('user2', 'logged in', '2023-10-31', '00:12:36'),
('user2', 'logged out', '2023-10-31', '00:13:00'),
('user1', 'logged in', '2023-10-31', '00:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `productid` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `seller` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `file` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`productid`, `rate`, `name`, `description`, `price`, `seller`, `date`, `category`, `image`, `file`) VALUES
(11, 0, 'Exploring Andruino', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia urna sit amet tortor pellentesque feugiat. Proin iaculis enim sit amet erat rutrum, non efficitur risus pharetra. Aliquam sed turpis sit amet nibh tempor molestie vel eu lacus.', 299, 'user1', '2023-05-16', 'Computer', 0x4578706c6f72696e67416e647275696e6f5f757365722e6a7067, 0x4578706c6f72696e67416e647275696e6f5f757365722e706466),
(12, 0, 'Grobs Basic Electronics', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia urna sit amet tortor pellentesque feugiat. Proin iaculis enim sit amet erat rutrum, non efficitur risus pharetra. Aliquam sed turpis sit amet nibh tempor molestie vel eu lacus.', 499, 'user2', '2023-05-16', 'Computer', 0x47726f62734261736963456c656374726f6e6963735f757365722e706e67, 0x47726f62734261736963456c656374726f6e6963735f757365722e706466),
(13, 0, 'Computer Science Illuminated', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia urna sit amet tortor pellentesque feugiat. Proin iaculis enim sit amet erat rutrum, non efficitur risus pharetra. Aliquam sed turpis sit amet nibh tempor molestie vel eu lacus.', 523, 'user2', '2023-05-16', 'qweqwe', 0x436f6d7075746572536369656e6365496c6c756d696e617465645f50726f66696c652d506963747572652e6a7067, 0x436f6d7075746572536369656e6365496c6c756d696e617465645f5044462e706466),
(16, 0, 'Testing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia urna sit amet tortor pellentesque feugiat. Proin iaculis enim sit amet erat rutrum, non efficitur risus pharetra. Aliquam sed turpis sit amet nibh tempor molestie vel eu lacus.', 13, 'user1', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `market_log`
--

CREATE TABLE `market_log` (
  `event` varchar(255) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `book` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `sc` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `market_log`
--

INSERT INTO `market_log` (`event`, `buyer`, `book`, `seller`, `price`, `sc`, `date`, `time`) VALUES
('bought', '.user2.', '.ExploringAndruino.', '.by user1.', 299, 10000, '0000-00-00', '00:00:00'),
('bought', '.user1.', '.Exploring Andruino.', '.user1.', 299, 10000, '0000-00-00', '00:00:00'),
('bought', 'user1', 'Grobs Basic Electronics', 'user2', 499, 10000, '2023-10-30', '17:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `content`, `sender`, `user`, `status`, `date`, `time`) VALUES
(2, 'ITEC106 Tips', 'Wag ka makinig matulog ka para lahat ng sasabihin ng teacher mo papasok sa panaginip mo at makikita mo ang visual presentation at mabilis mo maiintindihan', '', 'user1', 'created', '2023-07-19', '17:34:30'),
(17, 'jake', 'qweqweqwe', '', 'user1', 'created', '2023-10-04', '14:19:18'),
(18, 'finn', 'asdasdasdsadsdas', '', 'user1', 'created', '2023-10-04', '14:19:44'),
(19, 'marceline', 'sadsadsaasdas', '', 'user1', 'created', '2023-10-04', '14:23:40'),
(20, 'SOR Done', 'Verification through ID\nRemember me function\nAJAX migration\nJquery migration\nHash password\nGuest and restricted view\nActivity log\nFace capture\nView Products\nBuy a product\nSetting userOnline session everytime the browser opens\nAdd notes', '', 'admin', 'created', '2023-10-09', '23:03:45'),
(21, 'SOR To Do', 'Report system\nRating system\nChat system\nChat mini tool\nSubscription\nNote sharing\nPoint system (contribrutory)\nResponsive\nDelete confirmation\nCopyright alert\nOnly ban accounts not delete\nDeduct the purchase from the buyer and add to the seller\nDebug the da', '', 'admin', 'created', '2023-10-09', '23:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `name` varchar(255) NOT NULL,
  `book` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_favorite`
--

CREATE TABLE `product_favorite` (
  `product` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_favorite`
--

INSERT INTO `product_favorite` (`product`, `user`, `seller`, `date`, `time`) VALUES
('ExploringAndruino', 'user1', 'user1', '2023-10-26', '16:20:48'),
('Grobs Basic Electronics', 'user1', 'user2', '2023-10-31', '00:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `product` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`product`, `user`, `seller`, `rate`, `comment`, `date`, `time`) VALUES
('testing', '', 'testing', '4', 'qwe', 'ngayon', 'kanina'),
('ExploringAndruino', 'user1', 'by user1', '4', 'N/A', '2023-10-22', '20:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_report`
--

CREATE TABLE `product_report` (
  `product` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `statement` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_report`
--

INSERT INTO `product_report` (`product`, `user`, `seller`, `issue`, `statement`, `date`, `time`) VALUES
('ExploringAndruino', 'user1', 'by user1', 'Billing Problems', 'eh', '2023-10-25', '12:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `item_number` varchar(50) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_price` float(10,2) DEFAULT NULL,
  `item_price_currency` varchar(10) DEFAULT NULL,
  `payer_id` varchar(50) DEFAULT NULL,
  `payer_name` varchar(50) DEFAULT NULL,
  `payer_email` varchar(50) DEFAULT NULL,
  `payer_country` varchar(20) DEFAULT NULL,
  `merchant_id` varchar(255) DEFAULT NULL,
  `merchant_email` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) NOT NULL,
  `payment_source` varchar(50) DEFAULT NULL,
  `payment_status` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `productid` (`productid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
