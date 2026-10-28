-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2026 at 08:03 AM
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
-- Database: `film`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_movies`
--

CREATE TABLE `tb_movies` (
  `movie_id` int(99) NOT NULL,
  `movie_name` varchar(99) NOT NULL,
  `movie_director` varchar(99) NOT NULL,
  `movie_year` date NOT NULL,
  `movie_time` time(6) NOT NULL,
  `movie_score` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_movies`
--

INSERT INTO `tb_movies` (`movie_id`, `movie_name`, `movie_director`, `movie_year`, `movie_time`, `movie_score`) VALUES
(2, 'aecty', 'aeczy', '2026-08-27', '01:20:00.000000', 5),
(3, 'aec', 'aeczy', '2031-07-25', '01:20:00.000000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_movies_type`
--

CREATE TABLE `tb_movies_type` (
  `movies_type_id` int(99) NOT NULL,
  `type_id` int(99) DEFAULT NULL,
  `movies_id` int(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_movies_type`
--

INSERT INTO `tb_movies_type` (`movies_type_id`, `type_id`, `movies_id`) VALUES
(3, 3, 2),
(4, 4, 2),
(9, 1, 3),
(10, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_name`
--

CREATE TABLE `tb_name` (
  `id_name` int(100) NOT NULL,
  `name` varchar(99) NOT NULL,
  `password` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tb_name`
--

INSERT INTO `tb_name` (`id_name`, `name`, `password`) VALUES
(3, 'aeczy', 1),
(5, 'act', 0),
(6, 'acc', 123);

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
(1, 'Action'),
(2, 'Comedy'),
(3, 'Drama'),
(4, 'Horror'),
(5, 'Romance'),
(6, 'Sci-Fi'),
(7, 'Adventure'),
(8, 'Documentary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_movies`
--
ALTER TABLE `tb_movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `tb_movies_type`
--
ALTER TABLE `tb_movies_type`
  ADD PRIMARY KEY (`movies_type_id`),
  ADD KEY `1` (`movies_id`),
  ADD KEY `id_type` (`type_id`);

--
-- Indexes for table `tb_name`
--
ALTER TABLE `tb_name`
  ADD PRIMARY KEY (`id_name`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_movies`
--
ALTER TABLE `tb_movies`
  MODIFY `movie_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_movies_type`
--
ALTER TABLE `tb_movies_type`
  MODIFY `movies_type_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_name`
--
ALTER TABLE `tb_name`
  MODIFY `id_name` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `type_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_movies_type`
--
ALTER TABLE `tb_movies_type`
  ADD CONSTRAINT `2` FOREIGN KEY (`type_id`) REFERENCES `tb_type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
