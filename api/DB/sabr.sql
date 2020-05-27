-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2020 at 05:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sabr`
--

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `email_content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `sender`, `email_content`, `created_at`) VALUES
(1, 'rahimi.diallo@224tech.com', 'this is the first test for smsSummary.', '2020-05-27 01:22:29'),
(2, 'rahimi.diallo@224tech.com', 'this is the first test for smsSummary.', '2020-05-27 01:22:36'),
(3, 'rahimi.diallo@224tech.com', 'this is the first test for smsSummary.', '2020-05-27 01:22:39'),
(4, 'rahimi.diallo@224tech.com', 'this is the first test for smsSummary.', '2020-05-27 01:22:41'),
(5, 'rahimi.diallo@224tech.com', 'this is the first test for smsSummary.', '2020-05-27 01:22:43'),
(6, 'rahimi.diallo@224tech.com', 'this is the first test for smsSummary.', '2020-05-27 01:22:45'),
(7, 'rahimi.diallo@224tech.com', 'this is the first test for smsSummary.', '2020-05-27 01:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(10) NOT NULL,
  `sender` int(20) NOT NULL,
  `sms_content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `sender`, `sms_content`, `created_at`) VALUES
(2, 178819454, 'this is the 2 test for smsSummary.', '2020-05-26 22:22:11'),
(3, 178819454, 'this is the 3 test for smsSummary.', '2020-05-26 22:22:11'),
(4, 178819454, 'this is the 4 test for smsSummary.', '2020-05-26 22:24:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
