-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2026 at 02:46 PM
-- Server version: 12.1.2-MariaDB
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `member_id` int(99) NOT NULL,
  `member_name` varchar(99) NOT NULL,
  `member_password` varchar(99) NOT NULL,
  `member_fullname` varchar(99) NOT NULL,
  `member_email` varchar(99) NOT NULL,
  `member_role` enum('member','admin') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`member_id`, `member_name`, `member_password`, `member_fullname`, `member_email`, `member_role`) VALUES
(4, 'aec', '1234', 'aeczy', 'aeczy1236@gmail.com', 'member'),
(5, 'asw', '1234', 'aeczy', 'aeczy1236@gmail.com', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tb_point_lots`
--

CREATE TABLE `tb_point_lots` (
  `point_lot_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `remaining_points` int(11) NOT NULL,
  `earned_at` datetime NOT NULL,
  `expired_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_point_lots`
--

INSERT INTO `tb_point_lots` (`point_lot_id`, `member_id`, `points`, `remaining_points`, `earned_at`, `expired_at`, `created_at`) VALUES
(19, 4, 20, 20, '2026-10-28 16:57:10', '2026-10-31 16:57:10', '2026-10-28 16:57:10'),
(20, 4, 20, 20, '2026-10-28 17:01:48', '2026-10-31 17:01:48', '2026-10-28 17:01:48'),
(21, 4, 20, 20, '2026-10-28 17:02:12', '2026-10-31 17:02:12', '2026-10-28 17:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_point_transactions`
--

CREATE TABLE `tb_point_transactions` (
  `point_transaction_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `point_type` enum('earn','use','expire') DEFAULT NULL,
  `points` int(11) NOT NULL,
  `remaining_points` int(11) DEFAULT 0,
  `transaction_id` int(11) DEFAULT NULL,
  `earned_at` datetime DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_point_transactions`
--

INSERT INTO `tb_point_transactions` (`point_transaction_id`, `member_id`, `point_type`, `points`, `remaining_points`, `transaction_id`, `earned_at`, `expired_at`, `used_at`, `created_at`) VALUES
(2, 4, 'earn', 10, 10, 32, '2026-10-27 16:32:10', '2026-10-30 16:32:10', NULL, '2026-10-27 16:32:10'),
(4, 4, 'earn', 10, 10, 44, '2026-10-27 21:08:23', '2026-10-30 21:08:23', NULL, '2026-10-27 21:08:23'),
(5, 4, 'use', 200000, 200000, 58, NULL, NULL, '2026-10-28 12:05:15', '2026-10-28 12:05:15'),
(6, 4, 'use', 200000, 0, 59, NULL, NULL, '2026-10-28 12:38:29', '2026-10-28 12:38:29'),
(7, 4, 'use', 200000, 200, 60, NULL, NULL, '2026-10-28 12:39:16', '2026-10-28 12:39:16'),
(8, 4, 'use', 200000, 200, 61, NULL, NULL, '2026-10-28 12:40:51', '2026-10-28 12:40:51'),
(9, 4, 'use', 40000, 0, 64, NULL, NULL, '2026-10-28 13:01:47', '2026-10-28 13:01:47'),
(10, 4, 'earn', 100, 100, 67, '2026-10-28 13:19:35', '2026-10-31 13:19:35', NULL, '2026-10-28 13:19:35'),
(11, 4, 'use', 1000, 0, 71, NULL, NULL, '2026-10-28 13:21:46', '2026-10-28 13:21:46'),
(12, 4, 'earn', 100, 100, 73, '2026-10-28 13:26:59', '2026-10-31 13:26:59', NULL, '2026-10-28 13:26:59'),
(13, 4, 'earn', 20, 20, 75, '2026-10-28 16:35:27', '2026-10-31 16:35:27', NULL, '2026-10-28 16:35:27'),
(14, 4, 'earn', 20, 20, 77, '2026-10-28 16:39:12', '2026-10-31 16:39:12', NULL, '2026-10-28 16:39:12'),
(15, 4, 'earn', 20, 20, 79, '2026-10-28 16:40:24', '2026-10-31 16:40:24', NULL, '2026-10-28 16:40:24'),
(16, 4, 'earn', 20, 20, 81, '2026-10-28 16:41:51', '2026-10-31 16:41:51', NULL, '2026-10-28 16:41:51'),
(17, 4, 'earn', 20, 20, 83, '2026-10-28 16:43:28', '2026-10-31 16:43:28', NULL, '2026-10-28 16:43:28'),
(18, 4, 'earn', 20, 20, 85, '2026-10-28 16:44:11', '2026-10-31 16:44:11', NULL, '2026-10-28 16:44:11'),
(21, 4, 'earn', 20, 20, 91, '2026-10-28 16:49:18', '2026-10-31 16:49:18', NULL, '2026-10-28 16:49:18'),
(22, 4, 'earn', 20, 20, 93, '2026-10-28 16:50:43', '2026-10-31 16:50:43', NULL, '2026-10-28 16:50:43'),
(23, 4, 'earn', 20, 20, 95, '2026-10-28 16:55:31', '2026-10-31 16:55:31', NULL, '2026-10-28 16:55:31'),
(24, 4, 'earn', 20, 20, 99, '2026-10-28 16:57:10', '2026-10-31 16:57:10', NULL, '2026-10-28 16:57:10'),
(25, 4, 'earn', 20, 20, 102, '2026-10-28 17:01:48', '2026-10-31 17:01:48', NULL, '2026-10-28 17:01:48'),
(26, 4, 'earn', 20, 20, 104, '2026-10-28 17:02:12', '2026-10-31 17:02:12', NULL, '2026-10-28 17:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transactions`
--

CREATE TABLE `tb_transactions` (
  `transaction_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `transaction_type` enum('deposit','withdraw','transfer_out','transfer_in') DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL,
  `fee` decimal(12,2) DEFAULT 0.00,
  `discount` decimal(6,0) NOT NULL,
  `total_amount` decimal(12,2) DEFAULT 0.00,
  `related_user_id` int(11) DEFAULT NULL,
  `status` enum('success','failed') DEFAULT 'success',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_transactions`
--

INSERT INTO `tb_transactions` (`transaction_id`, `member_id`, `transaction_type`, `amount`, `fee`, `discount`, `total_amount`, `related_user_id`, `status`, `created_at`) VALUES
(1, 4, 'deposit', 5000.00, 150.00, 0, 5150.00, 4, 'success', '2026-09-29 12:26:49'),
(2, 4, 'deposit', 5000.00, 150.00, 0, 5150.00, 4, 'success', '2026-09-29 16:04:53'),
(3, 4, 'deposit', 5000.00, 150.00, 0, 4850.00, 4, 'success', '2026-09-29 16:21:35'),
(4, 4, 'withdraw', 1.00, 0.00, 0, 1.00, 4, 'success', '2026-09-29 17:05:59'),
(5, 4, 'withdraw', 100.00, 0.00, 0, 100.00, 4, 'success', '2026-09-29 17:15:58'),
(6, 4, 'withdraw', 100.00, 0.00, 0, 100.00, 4, 'success', '2026-09-29 17:16:36'),
(7, 4, 'deposit', 4850.00, 150.00, 0, 4850.00, 4, 'success', '2026-09-29 17:26:40'),
(8, 4, 'deposit', 5000.00, 150.00, 0, 4850.00, 4, 'success', '2026-09-29 17:27:26'),
(9, 4, 'transfer_out', 120.00, 1.20, 0, 121.20, 5, 'success', '2026-09-29 20:47:16'),
(10, 5, 'transfer_in', 120.00, 0.00, 0, 120.00, 4, 'success', '2026-09-29 20:47:16'),
(11, 4, 'transfer_out', 150.00, 1.50, 0, 151.50, 5, 'success', '2026-10-04 15:45:41'),
(12, 5, 'transfer_in', 150.00, 0.00, 0, 150.00, 4, 'success', '2026-10-04 15:45:41'),
(13, 5, 'transfer_out', 123.00, 1.23, 0, 124.23, 4, 'success', '2026-10-04 16:22:11'),
(14, 4, 'transfer_in', 123.00, 0.00, 0, 123.00, 5, 'success', '2026-10-04 16:22:11'),
(20, 4, 'transfer_out', 1000.00, 10.00, 10, 1010.00, 5, 'success', '2026-10-26 12:38:40'),
(21, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-26 12:38:40'),
(22, 4, 'transfer_out', 1000.00, 10.00, 10, 1010.00, 5, 'success', '2026-10-26 12:51:42'),
(23, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-26 12:51:42'),
(24, 4, 'transfer_out', 1000.00, 10.00, 10, 1010.00, 5, 'success', '2026-10-26 12:53:37'),
(25, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-26 12:53:37'),
(26, 4, 'transfer_out', 1000.00, 10.00, 10, 1010.00, 5, 'success', '2026-10-27 12:08:57'),
(27, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-27 12:08:57'),
(32, 4, 'transfer_out', 1000.00, 10.00, 10, 1010.00, 5, 'success', '2026-10-27 16:32:10'),
(33, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-27 16:32:10'),
(34, 4, 'withdraw', 100.00, 0.00, 0, 100.00, 4, 'success', '2026-10-27 16:42:21'),
(35, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-27 17:31:30'),
(36, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-27 17:32:17'),
(37, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-27 20:12:26'),
(38, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-27 20:14:14'),
(39, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-27 20:14:19'),
(40, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-27 20:14:49'),
(41, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-27 20:15:14'),
(44, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-27 21:08:23'),
(45, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-27 21:08:23'),
(46, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-27 21:44:44'),
(47, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-27 22:04:47'),
(48, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-28 11:42:02'),
(49, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-28 11:42:56'),
(50, 4, 'deposit', 1000.00, 40.00, 0, 960.00, 4, 'success', '2026-10-28 11:43:10'),
(51, 4, 'deposit', 1000.00, 40.00, 0, 1000.00, 4, 'success', '2026-10-28 11:44:32'),
(52, 4, 'deposit', 1000.00, 40.00, 0, 1040.00, 4, 'success', '2026-10-28 11:45:35'),
(53, 4, 'deposit', 1000.00, 40.00, 0, 1040.00, 4, 'success', '2026-10-28 11:47:58'),
(58, 4, 'deposit', 1000.00, 0.00, 200, 1040.00, 4, 'success', '2026-10-28 12:05:15'),
(59, 4, 'deposit', 1000.00, -160.00, 200, 840.00, 4, 'success', '2026-10-28 12:38:29'),
(60, 4, 'deposit', 1000.00, 0.00, 200, 1000.00, 4, 'success', '2026-10-28 12:39:16'),
(61, 4, 'deposit', 1000.00, 0.00, 200, 1000.00, 4, 'success', '2026-10-28 12:40:51'),
(62, 4, 'deposit', 1000.00, 40.00, 0, 1040.00, 4, 'success', '2026-10-28 12:57:47'),
(63, 4, 'deposit', 1000.00, 40.00, 0, 1040.00, 4, 'success', '2026-10-28 13:01:07'),
(64, 4, 'deposit', 1000.00, 0.00, 40, 1000.00, 4, 'success', '2026-10-28 13:01:47'),
(65, 4, 'deposit', 1000.00, 40.00, 0, 1040.00, 4, 'success', '2026-10-28 13:05:33'),
(66, 4, 'deposit', 1000.00, 40.00, 0, 1040.00, 4, 'success', '2026-10-28 13:13:18'),
(67, 4, 'transfer_out', 5000.00, 50.00, 0, 5050.00, 5, 'success', '2026-10-28 13:19:35'),
(68, 5, 'transfer_in', 5000.00, 0.00, 0, 5000.00, 4, 'success', '2026-10-28 13:19:35'),
(71, 4, 'deposit', 1000.00, 39.00, 1, 1039.00, 4, 'success', '2026-10-28 13:21:46'),
(72, 4, 'deposit', 5000.00, 150.00, 0, 5150.00, 4, 'success', '2026-10-28 13:22:13'),
(73, 4, 'transfer_out', 5000.00, 50.00, 0, 5050.00, 5, 'success', '2026-10-28 13:26:59'),
(74, 5, 'transfer_in', 5000.00, 0.00, 0, 5000.00, 4, 'success', '2026-10-28 13:26:59'),
(75, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 16:35:27'),
(76, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 16:35:27'),
(77, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 16:39:12'),
(78, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 16:39:12'),
(79, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 16:40:24'),
(80, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 16:40:24'),
(81, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 16:41:51'),
(82, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 16:41:51'),
(83, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 16:43:28'),
(84, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 16:43:28'),
(85, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 16:44:11'),
(86, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 16:44:11'),
(91, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 16:49:18'),
(92, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 16:49:18'),
(93, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 16:50:43'),
(94, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 16:50:43'),
(95, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 16:55:31'),
(96, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 16:55:31'),
(97, 4, 'transfer_out', 100.00, 1.00, 0, 101.00, 5, 'success', '2026-10-28 16:56:56'),
(98, 5, 'transfer_in', 100.00, 0.00, 0, 100.00, 4, 'success', '2026-10-28 16:56:56'),
(99, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 16:57:10'),
(100, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 16:57:10'),
(101, 4, 'deposit', 1000.00, 40.00, 0, 1040.00, 4, 'success', '2026-10-28 16:58:59'),
(102, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 17:01:48'),
(103, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 17:01:48'),
(104, 4, 'transfer_out', 1000.00, 10.00, 0, 1010.00, 5, 'success', '2026-10-28 17:02:12'),
(105, 5, 'transfer_in', 1000.00, 0.00, 0, 1000.00, 4, 'success', '2026-10-28 17:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wallet`
--

CREATE TABLE `tb_wallet` (
  `wallet_id` int(99) NOT NULL,
  `money` decimal(10,2) NOT NULL DEFAULT 0.00,
  `point_balance` int(99) NOT NULL,
  `member_id` int(99) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_wallet`
--

INSERT INTO `tb_wallet` (`wallet_id`, `money`, `point_balance`, `member_id`, `created_at`) VALUES
(1, 54918.30, 80, 4, '2026-09-29 10:53:05.291360'),
(2, 28245.77, 0, 5, '2026-09-29 17:32:26.404446');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tb_point_lots`
--
ALTER TABLE `tb_point_lots`
  ADD PRIMARY KEY (`point_lot_id`),
  ADD KEY `1` (`member_id`);

--
-- Indexes for table `tb_point_transactions`
--
ALTER TABLE `tb_point_transactions`
  ADD PRIMARY KEY (`point_transaction_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `tb_transactions`
--
ALTER TABLE `tb_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `tb_wallet`
--
ALTER TABLE `tb_wallet`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `member_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_point_lots`
--
ALTER TABLE `tb_point_lots`
  MODIFY `point_lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_point_transactions`
--
ALTER TABLE `tb_point_transactions`
  MODIFY `point_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_transactions`
--
ALTER TABLE `tb_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tb_wallet`
--
ALTER TABLE `tb_wallet`
  MODIFY `wallet_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_point_lots`
--
ALTER TABLE `tb_point_lots`
  ADD CONSTRAINT `1` FOREIGN KEY (`member_id`) REFERENCES `tb_member` (`member_id`);

--
-- Constraints for table `tb_point_transactions`
--
ALTER TABLE `tb_point_transactions`
  ADD CONSTRAINT `1` FOREIGN KEY (`member_id`) REFERENCES `tb_member` (`member_id`),
  ADD CONSTRAINT `2` FOREIGN KEY (`transaction_id`) REFERENCES `tb_transactions` (`transaction_id`);

--
-- Constraints for table `tb_transactions`
--
ALTER TABLE `tb_transactions`
  ADD CONSTRAINT `1` FOREIGN KEY (`member_id`) REFERENCES `tb_member` (`member_id`);

--
-- Constraints for table `tb_wallet`
--
ALTER TABLE `tb_wallet`
  ADD CONSTRAINT `1` FOREIGN KEY (`member_id`) REFERENCES `tb_member` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
