-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 10:44 PM
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
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verify_email` tinyint(1) NOT NULL,
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
  `face_capture` blob NOT NULL,
  `studycoin` double DEFAULT NULL,
  `subscriber` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `copyright` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userid`, `username`, `password`, `role`, `state`, `email`, `verify_email`, `fullname`, `address`, `yearSection`, `age`, `studentid`, `sex`, `contact`, `profile`, `studFront`, `studBack`, `face_capture`, `studycoin`, `subscriber`, `date`, `copyright`) VALUES
(1, 'admin', 'admin', 'admin', 'verified', 'admin@gmail.com', 0, 'admin', 'admin house', 'BSIT 3B WAN', '21', '01201265', 'Male', '09087451933', 0x61646d696e5f50726f66696c652d506963747572652e6a7067, '', '', '', 15, '', '', 0),
(2, 'user1', 'user1', 'user', 'verified', 'user1@gmail.com', 0, 'carlos navea', 'tabe tabe lng po', 'BSIT 3A WAM', '23', '01291290', 'Maalin', '09812382342', 0x75736572315f50726f66696c652d506963747572652e6a7067, '', '', '', 1299, 'true', '2023-12-21', 0),
(3, 'user2', 'user2', 'user', 'verified', 'user2@gmail.com', 0, 'danielle zotomayor', 'tabe tabe lng', 'BSIT 3A WAM', '19', '01291232', 'Medyo baliko', '092831273621', 0x75736572325f50726f66696c652d506963747572652e6a7067, '', '', '', 1882, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int(11) NOT NULL,
  `badge` varchar(255) NOT NULL,
  `image` longblob NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('user1', 'logged in', '2023-10-31', '00:13:05'),
('user1', 'logged out', '2023-11-04', '10:09:55'),
('user2', 'logged in', '2023-11-04', '10:10:15'),
('user2', 'logged out', '2023-11-04', '11:27:15'),
('admin', 'logged in', '2023-11-04', '11:27:21'),
('admin', 'logged out', '2023-11-04', '11:44:14'),
('user1', 'logged in', '2023-11-05', '20:42:04'),
('user1', 'logged out', '2023-11-06', '16:25:11'),
('admin', 'logged in', '2023-11-06', '16:25:22'),
('admin', 'logged out', '2023-11-07', '18:56:48'),
('user1', 'logged in', '2023-11-07', '18:56:52'),
('user1', 'logged out', '2023-11-12', '13:51:10'),
('user1', 'logged in', '2023-11-12', '13:51:47'),
('user1', 'logged out', '2023-11-12', '13:52:53'),
('user2', 'logged in', '2023-11-12', '13:52:58'),
('user2', 'logged out', '2023-11-12', '13:54:58'),
('user1', 'logged in', '2023-11-12', '13:55:04'),
('user1', 'logged out', '2023-11-12', '19:08:09'),
('user1', 'logged in', '2023-11-12', '19:13:12'),
('user1', 'logged out', '2023-11-12', '19:26:12'),
('user2', 'logged in', '2023-11-12', '19:33:01'),
('user2', 'logged out', '2023-11-12', '21:34:42'),
('user1', 'logged in', '2023-11-12', '21:34:46'),
('user1', 'logged out', '2023-11-12', '21:38:05'),
('user2', 'logged in', '2023-11-12', '21:38:10'),
('user2', 'logged out', '2023-11-13', '00:08:08'),
('user2', 'logged in', '2023-11-13', '00:08:14'),
('user2', 'logged out', '2023-11-13', '00:08:32'),
('user1', 'logged in', '2023-11-13', '00:08:36'),
('user1', 'logged out', '2023-11-13', '00:11:49'),
('user2', 'logged in', '2023-11-13', '00:11:54'),
('user2', 'logged out', '2023-11-13', '00:13:27'),
('user1', 'logged in', '2023-11-13', '00:13:37'),
('user1', 'logged out', '2023-11-13', '09:33:34'),
('user2', 'logged in', '2023-11-13', '09:33:40'),
('user2', 'logged out', '2023-11-13', '09:42:11'),
('user1', 'logged in', '2023-11-13', '09:42:17'),
('user1', 'logged out', '2023-11-13', '09:53:46'),
('user2', 'logged in', '2023-11-13', '09:53:56'),
('user2', 'logged out', '2023-11-13', '09:58:17'),
('user1', 'logged in', '2023-11-13', '09:59:08'),
('user1', 'logged out', '2023-11-13', '10:06:59'),
('user2', 'logged in', '2023-11-13', '10:07:04'),
('user2', 'logged out', '2023-11-13', '15:53:39'),
('user1', 'logged in', '2023-11-13', '15:53:48'),
('user1', 'logged out', '2023-11-13', '16:02:11'),
('admin', 'logged in', '2023-11-13', '16:02:15'),
('admin', 'logged out', '2023-11-13', '16:03:49'),
('user1', 'logged in', '2023-11-13', '16:03:54'),
('user1', 'logged out', '2023-11-13', '16:26:23'),
('user2', 'logged in', '2023-11-13', '16:26:31'),
('user2', 'logged out', '2023-11-13', '16:28:47'),
('user1', 'logged in', '2023-11-13', '16:28:52'),
('user1', 'logged out', '2023-11-14', '00:25:47'),
('user2', 'logged in', '2023-11-14', '00:25:52'),
('user2', 'logged out', '2023-11-14', '10:41:54'),
('user1', 'logged in', '2023-11-14', '10:42:00'),
('user1', 'logged out', '2023-11-14', '10:43:03'),
('user2', 'logged in', '2023-11-14', '10:43:09'),
('user2', 'logged out', '2023-11-14', '11:02:55'),
('user1', 'logged in', '2023-11-14', '11:16:32'),
('user1', 'logged out', '2023-11-14', '11:54:16'),
('user2', 'logged in', '2023-11-14', '11:54:20'),
('user2', 'logged out', '2023-11-14', '17:23:11'),
('user1', 'logged in', '2023-11-14', '17:23:16'),
('user1', 'logged out', '2023-11-14', '17:27:56'),
('user2', 'logged in', '2023-11-14', '17:28:00'),
('user2', 'logged out', '2023-11-14', '19:00:00'),
('user1', 'logged in', '2023-11-14', '19:00:05'),
('user1', 'logged out', '2023-11-14', '19:48:01'),
('user2', 'logged in', '2023-11-14', '19:48:06'),
('user2', 'logged out', '2023-11-14', '20:04:45'),
('user1', 'logged in', '2023-11-14', '20:04:49'),
('user1', 'logged out', '2023-11-14', '20:54:46'),
('user2', 'logged in', '2023-11-14', '20:54:51'),
('user2', 'logged out', '2023-11-14', '20:55:07'),
('user1', 'logged in', '2023-11-14', '20:55:12'),
('user1', 'logged out', '2023-11-15', '01:59:24'),
('admin', 'logged in', '2023-11-15', '02:01:10'),
('admin', 'logged out', '2023-11-15', '02:01:38'),
('user1', 'logged in', '2023-11-15', '02:02:55'),
('user1', 'logged out', '2023-11-15', '02:03:05'),
('admin', 'logged in', '2023-11-15', '02:03:09'),
('admin', 'logged out', '2023-11-15', '02:04:00'),
('user1', 'logged in', '2023-11-15', '02:05:04'),
('user1', 'logged out', '2023-11-15', '11:22:49'),
('user1', 'logged in', '2023-11-15', '12:44:26'),
('user1', 'logged out', '2023-11-16', '17:44:36'),
('user2', 'logged in', '2023-11-16', '17:44:50'),
('user2', 'logged out', '2023-11-16', '19:03:45'),
('user1', 'logged in', '2023-11-16', '19:03:49'),
('user1', 'logged out', '2023-11-16', '20:59:20'),
('user1', 'logged in', '2023-11-16', '20:59:26'),
('user1', 'logged out', '2023-11-16', '21:01:01'),
('user2', 'logged in', '2023-11-16', '21:01:05'),
('user2', 'logged out', '2023-11-16', '21:01:13'),
('user1', 'logged in', '2023-11-16', '21:01:17'),
('user1', 'logged out', '2023-11-16', '21:17:06'),
('user2', 'logged in', '2023-11-16', '21:17:11'),
('user2', 'logged out', '2023-11-16', '21:26:21'),
('user1', 'logged in', '2023-11-16', '21:30:05'),
('user1', 'logged out', '2023-11-16', '21:30:32'),
('user2', 'logged in', '2023-11-16', '21:32:23'),
('user2', 'logged out', '2023-11-16', '21:32:40'),
('user1', 'logged in', '2023-11-16', '21:32:44'),
('user1', 'logged out', '2023-11-16', '21:36:31'),
('user1', 'logged in', '2023-11-16', '21:49:27'),
('user2', 'logged in', '2023-11-16', '21:49:39'),
('user1', 'logged out', '2023-11-16', '23:40:46'),
('user1', 'logged in', '2023-11-16', '23:46:05'),
('user1', 'logged out', '2023-11-17', '00:57:16'),
('user1', 'logged in', '2023-11-17', '00:57:21'),
('user1', 'logged out', '2023-11-17', '01:07:08'),
('test', 'logged in', '2023-11-17', '11:10:33'),
('test', 'logged out', '2023-11-17', '11:18:23'),
('test', 'logged in', '2023-11-17', '11:18:40'),
('test', 'logged out', '2023-11-17', '11:18:45'),
('test', 'logged in', '2023-11-17', '11:18:49'),
('test', 'logged out', '2023-11-17', '11:18:52'),
('test', 'logged in', '2023-11-17', '11:19:09'),
('test', 'logged out', '2023-11-17', '11:19:33'),
('test', 'logged in', '2023-11-17', '11:26:06'),
('test', 'logged out', '2023-11-17', '11:27:58'),
('user1', 'logged in', '2023-11-17', '11:28:38'),
('user1', 'logged out', '2023-11-17', '11:44:40'),
('admin', 'logged in', '2023-11-17', '11:44:43'),
('admin', 'logged out', '2023-11-17', '11:46:36'),
('user1', 'logged in', '2023-11-17', '11:46:52'),
('user1', 'logged out', '2023-11-17', '11:47:02'),
('admin', 'logged in', '2023-11-17', '11:47:05'),
('admin', 'logged out', '2023-11-17', '11:47:26'),
('user1', 'logged in', '2023-11-17', '13:19:25'),
('user1', 'logged out', '2023-11-17', '13:20:55'),
('user2', 'logged in', '2023-11-17', '13:20:59'),
('user2', 'logged out', '2023-11-17', '13:24:38'),
('user1', 'logged in', '2023-11-17', '13:24:42'),
('user1', 'logged out', '2023-11-17', '13:25:16'),
('user2', 'logged in', '2023-11-17', '13:25:21'),
('user2', 'logged out', '2023-11-17', '13:25:52'),
('ygot', 'logged in', '2023-11-17', '13:27:28'),
('ygot', 'logged out', '2023-11-17', '13:28:51'),
('user1', 'logged in', '2023-11-17', '13:28:57'),
('user1', 'logged out', '2023-11-17', '13:29:45'),
('admin', 'logged in', '2023-11-17', '13:29:49'),
('admin', 'logged out', '2023-11-17', '13:31:24'),
('user1', 'logged in', '2023-11-17', '13:34:25'),
('user1', 'logged out', '2023-11-17', '13:36:05'),
('user2', 'logged in', '2023-11-17', '13:36:09'),
('user2', 'logged out', '2023-11-17', '17:43:38'),
('user1', 'logged in', '2023-11-17', '17:43:43'),
('user1', 'logged out', '2023-11-17', '17:46:39'),
('user2', 'logged in', '2023-11-17', '17:46:44'),
('user2', 'logged out', '2023-11-17', '18:16:26'),
('user2', 'logged in', '2023-11-17', '18:16:31'),
('user2', 'logged out', '2023-11-17', '18:16:43'),
('user1', 'logged in', '2023-11-17', '18:16:47'),
('user1', 'logged out', '2023-11-17', '18:28:22'),
('user3', 'logged in', '2023-11-17', '18:32:27'),
('user3', 'logged out', '2023-11-17', '18:33:25'),
('user1', 'logged in', '2023-11-17', '18:33:33'),
('user1', 'logged out', '2023-11-17', '18:54:07'),
('admin', 'logged in', '2023-11-17', '18:54:12'),
('admin', 'logged out', '2023-11-18', '08:57:30'),
('user1', 'logged in', '2023-11-18', '08:57:35'),
('user1', 'logged out', '2023-11-18', '08:59:02'),
('admin', 'logged in', '2023-11-18', '08:59:07'),
('admin', 'logged out', '2023-11-18', '11:17:20'),
('user1', 'logged in', '2023-11-18', '11:17:30'),
('user1', 'logged out', '2023-11-18', '11:17:55'),
('user2', 'logged in', '2023-11-18', '11:18:03'),
('user2', 'logged out', '2023-11-18', '11:27:31'),
('admin', 'logged in', '2023-11-18', '11:27:38'),
('admin', 'logged out', '2023-11-18', '11:31:58'),
('user2', 'logged in', '2023-11-18', '11:32:05'),
('user2', 'logged out', '2023-11-18', '11:32:49'),
('admin', 'logged in', '2023-11-18', '11:32:54'),
('admin', 'logged out', '2023-11-18', '12:44:18'),
('qweqwe', 'logged in', '2023-11-18', '12:58:10'),
('qweqwe', 'logged out', '2023-11-18', '13:00:19'),
('user1', 'logged in', '2023-11-18', '13:00:25'),
('user1', 'logged out', '2023-11-18', '13:04:06'),
('user2', 'logged in', '2023-11-18', '13:04:13'),
('user2', 'logged out', '2023-11-18', '13:05:38'),
('user1', 'logged in', '2023-11-18', '13:05:46'),
('user1', 'logged out', '2023-11-18', '13:10:00'),
('admin', 'logged in', '2023-11-18', '13:10:04'),
('admin', 'logged out', '2023-11-18', '18:40:18'),
('user3', 'logged in', '2023-11-18', '18:40:23'),
('user3', 'logged out', '2023-11-18', '18:41:41'),
('admin', 'logged in', '2023-11-18', '18:41:45'),
('admin', 'logged out', '2023-11-18', '21:00:09'),
('user1', 'logged in', '2023-11-18', '21:00:24'),
('user1', 'logged out', '2023-11-18', '21:03:11'),
('admin', 'logged in', '2023-11-18', '21:03:19'),
('admin', 'logged out', '2023-11-19', '11:14:40'),
('user1', 'logged in', '2023-11-19', '11:14:45'),
('user1', 'logged out', '2023-11-19', '11:30:50'),
('user1', 'logged in', '2023-11-19', '11:33:52'),
('user1', 'logged out', '2023-11-19', '11:47:20'),
('admin', 'logged in', '2023-11-19', '11:47:24'),
('admin', 'logged out', '2023-11-19', '11:51:04'),
('user2', 'logged in', '2023-11-19', '11:51:13'),
('user2', 'logged out', '2023-11-19', '11:51:24'),
('admin', 'logged in', '2023-11-19', '11:51:29'),
('admin', 'logged out', '2023-11-19', '11:54:26'),
('user1', 'logged in', '2023-11-19', '11:55:11'),
('user1', 'logged out', '2023-11-19', '12:01:28'),
('user2', 'logged in', '2023-11-19', '12:01:33'),
('user2', 'logged out', '2023-11-19', '12:25:32'),
('user1', 'logged in', '2023-11-19', '12:26:37'),
('user1', 'logged out', '2023-11-19', '14:47:08'),
('user1', 'logged in', '2023-11-19', '14:58:30'),
('user1', 'logged out', '2023-11-19', '17:11:51'),
('user1', 'logged in', '2023-11-19', '17:12:00'),
('user1', 'logged out', '2023-11-19', '17:36:10'),
('karlerom', 'logged in', '2023-11-19', '17:43:05'),
('karlerom', 'logged out', '2023-11-19', '19:05:38'),
('user1', 'logged in', '2023-11-19', '20:57:03'),
('user1', 'logged out', '2023-11-19', '20:58:11'),
('user2', 'logged in', '2023-11-19', '20:58:15'),
('user2', 'logged out', '2023-11-19', '20:59:12'),
('user1', 'logged in', '2023-11-19', '20:59:16'),
('user1', 'logged out', '2023-11-19', '21:00:39'),
('karlerom', 'logged in', '2023-11-19', '21:00:46'),
('karlerom', 'logged out', '2023-11-19', '21:03:37'),
('admin', 'logged in', '2023-11-19', '21:03:50'),
('admin', 'logged out', '2023-11-19', '21:05:47'),
('admin', 'logged in', '2023-11-19', '21:15:37'),
('admin', 'logged out', '2023-11-19', '21:30:38'),
('user1', 'logged in', '2023-11-19', '21:30:42'),
('user1', 'logged out', '2023-11-19', '21:33:05'),
('user1', 'logged in', '2023-11-19', '21:37:06'),
('user1', 'logged out', '2023-11-20', '01:15:58'),
('user2', 'logged in', '2023-11-20', '01:16:01'),
('user2', 'logged out', '2023-11-20', '02:05:18'),
('karlerom', 'logged in', '2023-11-20', '14:34:43'),
('karlerom', 'logged out', '2023-11-20', '14:36:40'),
('user1', 'logged in', '2023-11-20', '14:47:39'),
('user1', 'logged out', '2023-11-20', '16:06:26'),
('admin', 'logged in', '2023-11-20', '16:06:31'),
('admin', 'logged out', '2023-11-20', '16:45:54'),
('user2', 'logged in', '2023-11-20', '16:47:50'),
('user2', 'logged out', '2023-11-20', '16:52:59'),
('user2', 'logged in', '2023-11-20', '16:53:03'),
('user2', 'logged in', '2023-11-20', '16:53:05'),
('user2', 'logged in', '2023-11-20', '16:57:01'),
('user2', 'logged in', '2023-11-20', '16:57:06'),
('user1', 'logged in', '2023-11-20', '16:57:33'),
('user1', 'logged out', '2023-11-20', '16:57:36'),
('admin', 'logged in', '2023-11-20', '16:57:40'),
('admin', 'logged out', '2023-11-20', '17:01:04'),
('wilson', 'logged in', '2023-11-20', '17:08:46'),
('wilson', 'logged in', '2023-11-20', '17:08:52'),
('admin', 'logged in', '2023-11-20', '17:09:02'),
('admin', 'logged out', '2023-11-20', '17:09:34'),
('wilson', 'logged in', '2023-11-20', '17:09:42'),
('wilson', 'logged out', '2023-11-20', '17:10:58'),
('wilson', 'logged in', '2023-11-20', '17:12:36'),
('wilson', 'logged out', '2023-11-20', '17:15:02'),
('user1', 'logged in', '2023-11-20', '17:15:07'),
('user1', 'logged out', '2023-11-20', '17:15:50'),
('wilson', 'logged in', '2023-11-20', '17:15:55'),
('wilson', 'logged out', '2023-11-20', '17:18:26'),
('user1', 'logged in', '2023-11-20', '17:18:29'),
('user1', 'logged out', '2023-11-20', '17:19:42'),
('admin', 'logged in', '2023-11-20', '17:19:46'),
('admin', 'logged out', '2023-11-20', '17:21:41'),
('user1', 'logged in', '2023-11-20', '17:23:26'),
('user1', 'logged out', '2023-11-20', '17:27:22'),
('user1', 'logged in', '2023-11-20', '17:30:32'),
('user1', 'logged out', '2023-11-20', '17:30:41'),
('admin', 'logged in', '2023-11-20', '17:30:44'),
('admin', 'logged out', '2023-11-20', '17:32:06'),
('wilson', 'logged in', '2023-11-20', '17:32:13'),
('wilson', 'logged out', '2023-11-20', '17:35:48'),
('user1', 'logged in', '2023-11-20', '17:35:54'),
('user1', 'logged out', '2023-11-20', '17:48:40'),
('admin', 'logged in', '2023-11-20', '18:08:45'),
('admin', 'logged out', '2023-11-20', '18:36:34'),
('admin', 'logged in', '2023-11-20', '18:36:39'),
('admin', 'logged out', '2023-11-20', '18:36:44'),
('user1', 'logged in', '2023-11-20', '18:36:51'),
('user1', 'logged out', '2023-11-20', '19:14:38'),
('admin', 'logged in', '2023-11-20', '19:14:45'),
('admin', 'logged out', '2023-11-20', '19:32:12'),
('user1', 'logged in', '2023-11-20', '19:32:22'),
('user1', 'logged out', '2023-11-20', '20:30:51'),
('admin', 'logged in', '2023-11-20', '20:30:55'),
('admin', 'logged out', '2023-11-20', '20:32:25'),
('user1', 'logged in', '2023-11-20', '20:33:37'),
('user1', 'logged out', '2023-11-20', '22:41:33'),
('user2', 'logged in', '2023-11-20', '22:41:36'),
('user2', 'logged out', '2023-11-20', '22:41:47'),
('user1', 'logged in', '2023-11-20', '22:41:52'),
('user1', 'logged out', '2023-11-20', '23:07:55'),
('user2', 'logged in', '2023-11-20', '23:07:59'),
('user2', 'logged out', '2023-11-21', '00:22:29'),
('user1', 'logged in', '2023-11-21', '00:22:34'),
('user1', 'logged out', '2023-11-21', '00:36:12'),
('user1', 'logged in', '2023-11-21', '01:12:17'),
('user1', 'logged out', '2023-11-21', '03:50:51'),
('admin', 'logged in', '2023-11-21', '04:15:21'),
('admin', 'logged out', '2023-11-21', '04:38:57'),
('ygot', 'logged in', '2023-11-21', '04:39:10'),
('admin', 'logged in', '2023-11-21', '04:39:16'),
('admin', 'logged out', '2023-11-21', '04:39:25'),
('ygot', 'logged in', '2023-11-21', '04:39:29'),
('ygot', 'logged out', '2023-11-21', '04:45:17'),
('admin', 'logged in', '2023-11-21', '04:45:23'),
('admin', 'logged out', '2023-11-21', '04:46:30'),
('ygot', 'logged in', '2023-11-21', '04:46:35'),
('ygot', 'logged out', '2023-11-21', '04:47:53'),
('admin', 'logged in', '2023-11-21', '04:48:03'),
('admin', 'logged out', '2023-11-21', '05:15:16'),
('ygot', 'logged in', '2023-11-21', '05:15:20'),
('ygot', 'logged out', '2023-11-21', '05:18:04'),
('admin', 'logged in', '2023-11-21', '05:18:10'),
('admin', 'logged out', '2023-11-21', '05:18:29'),
('ygot', 'logged in', '2023-11-21', '05:18:34'),
('ygot', 'logged out', '2023-11-21', '05:20:45'),
('admin', 'logged in', '2023-11-21', '05:20:49'),
('admin', 'logged out', '2023-11-21', '05:21:01'),
('ygot', 'logged in', '2023-11-21', '05:21:06'),
('ygot', 'logged out', '2023-11-21', '05:23:19'),
('admin', 'logged in', '2023-11-21', '05:23:24'),
('admin', 'logged out', '2023-11-21', '05:25:22'),
('user1', 'logged in', '2023-11-21', '05:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `productid` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
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

INSERT INTO `market` (`productid`, `rate`, `state`, `name`, `description`, `price`, `seller`, `date`, `category`, `image`, `file`) VALUES
(11, 0, 'verified', 'Exploring Andruino', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia urna sit amet tortor pellentesque feugiat. Proin iaculis enim sit amet erat rutrum, non efficitur risus pharetra. Aliquam sed turpis sit amet nibh tempor molestie vel eu lacus.', 299, 'user1', '2023-05-16', 'Computer', 0x4578706c6f72696e67416e647275696e6f5f757365722e6a7067, 0x4578706c6f72696e67416e647275696e6f5f757365722e706466),
(12, 0, 'verified', 'Grobs Basic Electronics', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia urna sit amet tortor pellentesque feugiat. Proin iaculis enim sit amet erat rutrum, non efficitur risus pharetra. Aliquam sed turpis sit amet nibh tempor molestie vel eu lacus.', 499, 'user2', '2023-05-16', 'Computer', 0x47726f62734261736963456c656374726f6e6963735f757365722e706e67, 0x47726f62734261736963456c656374726f6e6963735f757365722e706466),
(13, 0, 'not-verified', 'Computer Science Illuminated', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia urna sit amet tortor pellentesque feugiat. Proin iaculis enim sit amet erat rutrum, non efficitur risus pharetra. Aliquam sed turpis sit amet nibh tempor molestie vel eu lacus.', 523, 'user2', '2023-05-16', 'qweqwe', 0x436f6d7075746572536369656e6365496c6c756d696e617465645f50726f66696c652d506963747572652e6a7067, 0x436f6d7075746572536369656e6365496c6c756d696e617465645f5044462e706466);

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
('bought', 'user1', 'Grobs Basic Electronics', 'user2', 499, 10000, '2023-10-30', '17:23:46'),
('bought', 'user1', 'Exploring Andruino', 'user1', 299, 10000, '2023-11-04', '03:03:19'),
('bought', 'user2', 'Exploring Andruino', 'user1', 299, 10000, '2023-11-04', '03:12:02'),
('bought', 'user2', 'Exploring Andruino', 'user1', 299, 1000, '2023-11-04', '03:13:46'),
('bought', 'user2', 'Exploring Andruino', 'user1', 299, 701, '2023-11-14', '03:44:44'),
('bought', 'user1', 'Computer Science Illuminated', 'user2', 523, 1000, '2023-11-15', '05:46:01'),
('bought', 'user2', 'Exploring Andruino', 'user1', 299, 1523, '2023-11-17', '06:21:09'),
('bought', 'user2', 'JavaProgramming', 'user1', 159, 1224, '2023-11-18', '06:05:08'),
('bought', 'user1', 'Grobs Basic Electronics', 'user2', 499, 1383, '2023-11-18', '06:08:43'),
('bought', 'user3', 'Exploring Andruino', 'user1', 299, 1000, '2023-11-18', '11:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `senderid`, `receiverid`, `groupid`, `message`, `timestamp`) VALUES
(49, 2, 11, 306372, 'Hallo', '17:15:43'),
(50, 11, 2, 306372, 'Hi', '17:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `message_groups`
--

CREATE TABLE `message_groups` (
  `groupid` int(11) NOT NULL,
  `groupname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message_groups`
--

INSERT INTO `message_groups` (`groupid`, `groupname`) VALUES
(306372, 'Buddy');

-- --------------------------------------------------------

--
-- Table structure for table `message_members`
--

CREATE TABLE `message_members` (
  `groupid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message_members`
--

INSERT INTO `message_members` (`groupid`, `userid`) VALUES
(306372, 2),
(306372, 11);

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
(17, 'jake', 'qweqweqwe', '', 'user1', 'created', '2023-10-04', '14:19:18'),
(18, 'finn', 'asdasdasdsadsdas', '', 'user1', 'created', '2023-10-04', '14:19:44'),
(19, 'marceline', 'sadsadsaasdas', '', 'user1', 'created', '2023-10-04', '14:23:40'),
(20, 'SOR Done', 'Verification through ID\nRemember me function\nAJAX migration\nJquery migration\nHash password\nGuest and restricted view\nActivity log\nFace capture\nView Products\nBuy a product\nSetting userOnline session everytime the browser opens\nAdd notes', '', 'admin', 'created', '2023-10-09', '23:03:45'),
(21, 'SOR To Do', 'Report system\nRating system\nChat system\nChat mini tool\nSubscription\nNote sharing\nPoint system (contribrutory)\nResponsive\nDelete confirmation\nCopyright alert\nOnly ban accounts not delete\nDeduct the purchase from the buyer and add to the seller\nDebug the da', '', 'admin', 'created', '2023-10-09', '23:07:10'),
(25, 'jake', 'qweqweqwe', 'user1', '3', 'received', '2023-11-19', '11:28:32'),
(26, 'jake', 'qweqweqwe', 'user1', '3', 'received', '2023-11-19', '21:00:13'),
(28, 'Reviewer', 'asdsajdbaskdbas', 'user1', '11', 'received', '2023-11-20', '17:19:19');

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

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`name`, `book`, `seller`, `date`, `time`) VALUES
('user2', 'Exploring Andruino', 'user1', '2023-11-17', '06:21:09'),
('user2', 'JavaProgramming', 'user1', '2023-11-18', '06:05:08'),
('user1', 'Grobs Basic Electronics', 'user2', '2023-11-18', '06:08:43'),
('user3', 'Exploring Andruino', 'user1', '2023-11-18', '11:40:32');

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
('Grobs Basic Electronics', 'user1', 'user2', '2023-11-17', '13:20:15'),
('Exploring Andruino', 'qweqwe', 'user1', '2023-11-18', '12:59:04'),
('Exploring Andruino', 'user2', 'user1', '2023-11-19', '12:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `product_log`
--

CREATE TABLE `product_log` (
  `productid` int(11) NOT NULL,
  `event` varchar(64) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `product` varchar(64) NOT NULL,
  `user` varchar(32) NOT NULL,
  `seller` varchar(32) NOT NULL,
  `issue` varchar(64) NOT NULL,
  `statement` varchar(255) NOT NULL,
  `date` varchar(16) NOT NULL,
  `time` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_log`
--

INSERT INTO `product_log` (`productid`, `event`, `reason`, `product`, `user`, `seller`, `issue`, `statement`, `date`, `time`) VALUES
(0, 'asdsad', 'asd', 'sadsdasd', 'adsda', 'asd', 'adasd', 'asdsada', 'sadas', 'asdsada'),
(0, 'asdsadsadas', 'dad', 'asdsadadsad', 'dasdad', 'asdsadsa', 'asdsadadsad', 'asdsadsad', 'asdasdsad', 'asdsadsa'),
(11, 'accepted', 'reason', 'Exploring Andruino', 'user2', 'user1', 'Billing Problems', 'test', '2023-11-20', '16:45:09'),
(11, 'accepted', 'reason', 'Exploring Andruino', 'wilson', 'user1', 'Inappropriate Content', 'Ayaw', '2023-11-20', '17:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `productid` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `rate` int(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`productid`, `user`, `seller`, `rate`, `comment`, `date`, `time`) VALUES
(11, 'user2', 'user1', 4, 'Awesome!', '2023-11-20', '23:35:00'),
(11, 'testing', 'user1', 1, '', '', ''),
(11, 'zxc', 'user1', 1, '', '', ''),
(12, 'user1', 'user2', 4, 'Cool', '2023-11-21', '00:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_report`
--

CREATE TABLE `product_report` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `statement` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `buddy` varchar(100) NOT NULL,
  `relation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`id`, `user`, `buddy`, `relation`) VALUES
(306372, '2', '11', 'buddy');

-- --------------------------------------------------------

--
-- Table structure for table `search_data`
--

CREATE TABLE `search_data` (
  `course` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `search_data`
--

INSERT INTO `search_data` (`course`, `category`) VALUES
('Bachelor of Science in Civil Engineering', 'Programming'),
('Bachelor of Science in Computer Engineering', 'Music'),
('Bachelor of Science in Electrical Engineering', 'Science'),
('Bachelor of Science in Electronics Engineering', 'Technology'),
('Bachelor of Science in Mechanical Engineering', 'Art'),
('Bachelor of Science in Nursing', 'Sports'),
('Bachelor of Elementary Education', 'Food'),
('Bachelor of Physical Education', 'Finance'),
('Bachelor of Secondary Education', 'Health'),
('Bachelor of Technology and Livelihood Education', 'Education'),
('Bachelor of Technical Vocational Teacher Education', 'Photography'),
('Bachelor of Science in Criminology', 'History'),
('Bachelor of Science in Accountancy', 'Cars'),
('Bachelor of Science in Business Administration', 'Politics'),
('Bachelor of Science in Entrepreneurship', 'Astronomy'),
('Bachelor of Science in Office Administration', 'Medication'),
('Bachelor of Science in Industrial Technology', 'Architecture'),
('Bachelor of Science in Hospitality Management', 'Gardening'),
('Bachelor of Science in Tourism Management', ''),
('Bachelor of Science in Computer Science', ''),
('Bachelor of Science in Information Technology', ''),
('Bachelor of Arts in Broadcasting', ''),
('Bachelor of Science in Biology', ''),
('Bachelor of Science in Chemistry', ''),
('Bachelor of Science in Mathematics', ''),
('Bachelor of Science in Psychology', '');

-- --------------------------------------------------------

--
-- Table structure for table `search_queue`
--

CREATE TABLE `search_queue` (
  `queueId` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search_queue_con`
--

CREATE TABLE `search_queue_con` (
  `matchId` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_log`
--

CREATE TABLE `transaction_log` (
  `id` varchar(32) NOT NULL,
  `product` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `given_name` varchar(64) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `payer_email` varchar(64) NOT NULL,
  `value` double NOT NULL,
  `payee_email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_log`
--

INSERT INTO `transaction_log` (`id`, `product`, `username`, `given_name`, `surname`, `payer_email`, `value`, `payee_email`) VALUES
('00M56743FN088615M', '1 Month Subscription', 'user1', 'Danielle', 'Zotomayor', 'sb-baj6i28265153@personal.example.com', 59.99, 'sb-6ush428263015@business.example.com'),
('30547826W91009409', '1 Month Subscription', 'user1', 'Danielle', 'Zotomayor', 'sb-baj6i28265153@personal.example.com', 59.99, 'sb-6ush428263015@business.example.com'),
('0GW64654RF372804D', '1 Month Subscription', 'user1', 'Danielle', 'Zotomayor', 'sb-baj6i28265153@personal.example.com', 59.99, 'sb-6ush428263015@business.example.com'),
('3TA61805WA864911L', '1 Month Subscription', 'ygot', 'Danielle', 'Zotomayor', 'sb-baj6i28265153@personal.example.com', 59.99, 'sb-6ush428263015@business.example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `productid` (`productid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_groups`
--
ALTER TABLE `message_groups`
  ADD PRIMARY KEY (`groupid`);

--
-- Indexes for table `message_members`
--
ALTER TABLE `message_members`
  ADD PRIMARY KEY (`groupid`,`userid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product_report`
--
ALTER TABLE `product_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_queue`
--
ALTER TABLE `search_queue`
  ADD PRIMARY KEY (`queueId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `message_groups`
--
ALTER TABLE `message_groups`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=813862;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_report`
--
ALTER TABLE `product_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `search_queue`
--
ALTER TABLE `search_queue`
  MODIFY `queueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
