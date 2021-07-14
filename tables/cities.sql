-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 08:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blueolz8_blueocean`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) UNSIGNED NOT NULL,
  `city_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Bhopal'),
(2, 'Manavar'),
(3, 'Ujjain'),
(4, 'Kaanpur'),
(5, 'Mandlaa'),
(6, 'Ajmer'),
(7, 'Kota'),
(8, 'Bikaner'),
(9, 'Indore'),
(10, 'YHAI - Betul'),
(11, 'YHAI - BHEL, Bhopal'),
(12, 'YHAI - Chhindwara'),
(13, 'YHAI - Gwalior'),
(14, 'YHAI - Indore District'),
(15, 'YHAI - Indore City'),
(16, 'YHAI - Katni'),
(17, 'YHAI - Lake City Bhopal'),
(18, 'YHAI - Mandideep'),
(19, 'YHAI - P&T Bhopal'),
(20, 'YHAI - Ratlam'),
(21, 'YHAI - Rewa'),
(22, 'YHAI - Shajapur'),
(23, 'YHAI - Sarvani Indore'),
(24, 'YHAI - Ujjain'),
(25, 'YHAI - Satna'),
(26, 'YHAI - Rajgarh'),
(27, 'Pune'),
(28, 'Thane'),
(29, 'Shahdol'),
(30, 'Sagar'),
(31, 'Mandsaur'),
(32, 'Nagpur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
