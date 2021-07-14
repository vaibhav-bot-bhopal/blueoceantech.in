-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 08:06 AM
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
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `name`, `email`, `address`, `phone`, `answer`, `city`, `place`, `date`, `slot`) VALUES
(1, 'Vaibhav', 'vaibhavblueocean@gmail.com', 'Bhopal', '9876543210', 'Yes', 1, 34, '2021-07-14', 36),
(2, 'Test', 'vaibhavblueocean@gmail.com', 'Indore', '0123456789', 'No', 1, 35, '2021-07-14', 37),
(3, 'Test user', 'vaibhavblueocean@gmail.com', 'Indore', '0123456789', 'No', 9, 38, '2021-07-10', 44),
(4, 'Test Record', 'vaibhavblueocean@gmail.com', 'Jabalpur', '9876543210', 'Yes', 9, 38, '2021-07-09', 41),
(5, 'User', 'vaibhavblueocean@gmail.com', 'Bhopal', '4561237890', 'No', 27, 30, '2021-07-07', 31),
(6, 'Test Admin', 'vaibhavblueocean@gmail.com', 'Dewas', '1237896540', 'Yes', 25, 28, '2021-07-14', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
