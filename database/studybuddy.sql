-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 08:17 AM
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
  `studBack` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `role`, `state`, `email`, `fullname`, `address`, `yearSection`, `age`, `studentid`, `sex`, `contact`, `profile`, `studFront`, `studBack`) VALUES
('admin', 'admin', 'admin', 'verified', 'admin@gmail.com', 'admin', 'admin house', 'BSIT 3B WAN', '21', '01201265', 'Male', '09087451933', 0x61646d696e5f50726f66696c652d506963747572652e6a7067, '', ''),
('user1', 'user1', 'user', 'verified', 'user1@gmail.com', 'user1', 'user1 house', 'BSIT 3A WAM', '23', '01291290', 'Maalin', '09812382342', 0x75736572315f50726f66696c652d506963747572652e6a7067, '', ''),
('user2', 'user2', 'user', 'verified', 'user2@gmail.com', 'user2', 'user2 house', 'BSIT 3A WAM', '19', '01291232', 'Medyo baliko', '092831273621', 0x75736572325f50726f66696c652d506963747572652e6a7067, '', '');

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
  `date` date NOT NULL,
  `loginTime` time NOT NULL,
  `logoutTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `productid` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
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

INSERT INTO `market` (`productid`, `rate`, `name`, `price`, `seller`, `date`, `category`, `image`, `file`) VALUES
(11, 0, 'ExploringAndruino', 299, 'user1', '2023-05-16', 'Computer', 0x4578706c6f72696e67416e647275696e6f5f757365722e6a7067, 0x4578706c6f72696e67416e647275696e6f5f757365722e706466),
(12, 0, 'GrobsBasicElectronics', 499, 'user2', '2023-05-16', 'Computer', 0x47726f62734261736963456c656374726f6e6963735f757365722e706e67, 0x47726f62734261736963456c656374726f6e6963735f757365722e706466),
(13, 0, 'ComputerScienceIlluminated', 523, 'user2', '2023-05-16', 'qweqwe', 0x436f6d7075746572536369656e6365496c6c756d696e617465645f50726f66696c652d506963747572652e6a7067, 0x436f6d7075746572536369656e6365496c6c756d696e617465645f5044462e706466),
(16, 0, 'Testing', 13, 'user1', '0000-00-00', '', '', '');

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
  `user` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `content`, `user`, `date`, `time`) VALUES
(1, 'testing', 'testing testing testing testing testingsingdsigndisgnsdignsdigsn', 'user1', '2023-07-17', '18:46:09'),
(2, 'ITEC106 Tips', 'Wag ka makinig matulog ka para lahat ng sasabihin ng teacher mo papasok sa panaginip mo at makikita mo ang visual presentation at mabilis mo maiintindihan', 'user1', '2023-07-19', '17:34:30'),
(3, 'qweqw', 'qewqeeqewe', 'user1', '0000-00-00', '00:00:00'),
(4, 'dasdasd', 'asdavdadwada', 'user1', '0000-00-00', '00:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
