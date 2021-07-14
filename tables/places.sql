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
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `place_id` int(11) UNSIGNED NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `city_code` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `place_name`, `city_code`) VALUES
(1, 'Govt. College Manavar', 2),
(2, 'Vivekanand Colony - Greena Sahni Wadhwa', 3),
(3, 'Place 1', 4),
(4, 'Place 2', 5),
(5, 'Shree Path Lab', 6),
(6, 'Shubh Atlantis', 7),
(7, 'Shashtri Nagar', 8),
(8, 'WNC Indore', 9),
(9, 'Mr. Ram Naryan Shukla - 9926420212', 10),
(10, 'Ms. Neelema Peter - 9425656556', 10),
(11, 'Mr. B. R. Naidu - 9981755619', 11),
(12, 'Mr. Himanshu Jaiswal - 9438638693', 12),
(13, 'Mr. Ram Naryan Mishra - 9826352252', 13),
(14, 'Mr. Vishwas Poorkar - 9827630438', 14),
(15, 'Mr. Praveen Damle - 9826880299', 15),
(16, 'Mr. Gopal Sharma - 9425153918', 16),
(17, 'Mr. Sanjay Madhup - 9827009291', 17),
(18, 'Mr. Nirmal Yadav - 9893473959', 18),
(19, 'Mr. Rajesh Thakur - 9300612762', 18),
(20, 'Mr. Vinod Nigam - 8989738210', 19),
(21, 'Mr. Dilip Chawrekar - 9425355621', 20),
(22, 'Mr. Shahid Pervej - 7000460094', 21),
(23, 'Dr. Hemant K Dubey - 9425034366', 22),
(24, 'Ms. Kusum Singh Chandel - 9425063957', 23),
(25, 'Ms. Swati Kardile - 7747002771', 23),
(26, 'Mr. Dilip Chouhan - 8889199111', 24),
(27, 'Mr. Anoop Shrivastava - 9425091648', 24),
(28, 'Mr. Vinod Jaiswal - 9425330772', 25),
(29, 'Mr. Aftab Jamed - 9425097732', 26),
(30, 'Boat Club Road', 27),
(31, 'Youth Hostel Association - Indore District', 9),
(32, 'Youth Hostel Association - Indore City Branch', 9),
(33, 'Youth Hostel Association - Sarvani Indore Branch', 9),
(34, 'Youth Hostel Association - BHEL Bhopal', 1),
(35, 'Youth Hostel Association - Lake City Bhopal Branch', 1),
(36, 'Youth Hostel Association - P&T Bhopal Branch', 1),
(37, 'Youth Hostel Association - Ujjain Branch', 3),
(38, 'Rohan Residency - Mr. Parag Jain and Ms. Pratima Jain', 9),
(39, 'Badlapur - Ms. Mrunal', 28),
(40, 'Zion Villa - Mr. Ravi Shukla', 29),
(41, 'Geetanjali Green City - Ms. Surbhi', 30),
(42, 'Bio Block, R.G.P.G. College', 31),
(43, 'WWF-India', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `city_code` (`city_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `city_code` FOREIGN KEY (`city_code`) REFERENCES `cities` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
