-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 15, 2026 at 11:05 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_action`
--

CREATE TABLE `tb_action` (
  `action_id` int(99) NOT NULL,
  `action_name` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_action`
--

INSERT INTO `tb_action` (`action_id`, `action_name`) VALUES
(1, 'edit'),
(2, 'delelt');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `member_id` int(99) NOT NULL,
  `member_name` varchar(99) NOT NULL,
  `member_password` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`member_id`, `member_name`, `member_password`) VALUES
(1, 'aw', '1234'),
(2, 'aec', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member_action`
--

CREATE TABLE `tb_member_action` (
  `member_action_id` int(99) NOT NULL,
  `member_id` int(99) NOT NULL,
  `movies_id` int(99) NOT NULL,
  `action_id` int(11) NOT NULL,
  `action_where` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_member_action`
--

INSERT INTO `tb_member_action` (`member_action_id`, `member_id`, `movies_id`, `action_id`, `action_where`) VALUES
(1, 1, 1, 1, 'movies');

-- --------------------------------------------------------

--
-- Table structure for table `tb_movies`
--

CREATE TABLE `tb_movies` (
  `movies_id` int(99) NOT NULL,
  `movies_name` varchar(99) NOT NULL,
  `movies_director` varchar(99) NOT NULL,
  `movies_release_year` date NOT NULL,
  `movies_time` time(6) NOT NULL,
  `movies_point` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_movies`
--

INSERT INTO `tb_movies` (`movies_id`, `movies_name`, `movies_director`, `movies_release_year`, `movies_time`, `movies_point`) VALUES
(1, 'aec', 'aeczy', '2026-02-03', '00:01:25.000000', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_movies_type`
--

CREATE TABLE `tb_movies_type` (
  `movies_type_id` int(99) NOT NULL,
  `movies_id` int(99) NOT NULL,
  `type_id` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_movies_type`
--

INSERT INTO `tb_movies_type` (`movies_type_id`, `movies_id`, `type_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `type_id` int(99) NOT NULL,
  `type_name` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`type_id`, `type_name`) VALUES
(1, 'action'),
(2, 'comedy'),
(3, 'horror');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_action`
--
ALTER TABLE `tb_action`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tb_member_action`
--
ALTER TABLE `tb_member_action`
  ADD PRIMARY KEY (`member_action_id`),
  ADD KEY `action_id` (`action_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `movies_id` (`movies_id`);

--
-- Indexes for table `tb_movies`
--
ALTER TABLE `tb_movies`
  ADD PRIMARY KEY (`movies_id`);

--
-- Indexes for table `tb_movies_type`
--
ALTER TABLE `tb_movies_type`
  ADD PRIMARY KEY (`movies_type_id`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_action`
--
ALTER TABLE `tb_action`
  MODIFY `action_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `member_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_member_action`
--
ALTER TABLE `tb_member_action`
  MODIFY `member_action_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_movies`
--
ALTER TABLE `tb_movies`
  MODIFY `movies_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_movies_type`
--
ALTER TABLE `tb_movies_type`
  MODIFY `movies_type_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `type_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_member_action`
--
ALTER TABLE `tb_member_action`
  ADD CONSTRAINT `1` FOREIGN KEY (`action_id`) REFERENCES `tb_action` (`action_id`),
  ADD CONSTRAINT `2` FOREIGN KEY (`member_id`) REFERENCES `tb_member` (`member_id`),
  ADD CONSTRAINT `3` FOREIGN KEY (`movies_id`) REFERENCES `tb_movies` (`movies_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
