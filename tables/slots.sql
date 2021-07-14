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
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slot_id` bigint(20) UNSIGNED NOT NULL,
  `slot_name` varchar(255) DEFAULT NULL,
  `slot_date` date DEFAULT NULL,
  `slot_state` bigint(20) DEFAULT 0,
  `free_slot` bigint(20) DEFAULT NULL,
  `city_code` int(11) UNSIGNED DEFAULT NULL,
  `place_code` int(11) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slot_id`, `slot_name`, `slot_date`, `slot_state`, `free_slot`, `city_code`, `place_code`, `status`) VALUES
(1, 'Morning Slot 10 am to 12 noon', '2021-04-13', 90, 90, 3, 2, 1),
(2, 'Evening Slot 5pm to 7pm', '2021-04-13', 94, 94, 3, 2, 1),
(3, 'Jogging Park', '2021-04-15', 9, 25, 4, 3, 1),
(4, 'Walk n Run', '2021-04-24', 2, 2, 5, 4, 1),
(5, 'Run n Walk', '2021-04-20', 2, 2, 5, 4, 1),
(6, 'Day 1', '2021-06-13', 4, 65, 7, 6, 1),
(7, 'Slot 1', '2021-06-20', 120, 200, 8, 7, 1),
(8, '27 June Slot 1', '2021-06-27', 31, 50, 6, 5, 1),
(9, 'WNC Indore Group 1', '2021-06-28', 100, 100, 9, 8, 1),
(10, 'Full Day - Mr. Ram Naryan Shukla - 9926420212', '2021-07-14', 17, 100, 10, 9, 0),
(11, 'Full Day - Ms. Neelema Peter - 9425656566', '2021-07-14', 2, 100, 10, 10, 0),
(12, 'Full Day - Mr. B. R. Naidu - 9981755619', '2021-07-14', 8, 100, 11, 11, 0),
(13, 'Full Day - Mr. Himanshu Jaiswal - 9438638693', '2021-07-14', 23, 100, 12, 12, 0),
(14, 'Full Day - Mr. Ram Naryan Mishra - 9826352252', '2021-07-14', 30, 500, 13, 13, 0),
(15, 'Full Day - Mr. Vishwas Poorkar - 9827630438', '2021-07-14', 3, 500, 14, 14, 0),
(16, 'Full Day - Mr. Praveen Damle - 9826880299', '2021-07-14', 49, 100, 15, 15, 0),
(17, 'Full Day - Mr. Gopal Sharma - 9425153918', '2021-07-14', 45, 100, 16, 16, 0),
(18, 'Full Day - Mr. Sanjay Madhup - 9827009291', '2021-07-14', 3, 100, 17, 17, 0),
(19, 'Full Day - Mr. Nirmal Yadav - 9893473959', '2021-07-14', 5, 500, 18, 18, 0),
(20, 'Full Day - Mr. Rajesh Thakur - 9300612762', '2021-07-14', 13, 500, 18, 19, 0),
(21, 'Full Day - Mr. Vinod Nigam - 8989738210', '2021-07-14', 27, 500, 19, 20, 0),
(22, 'Full Day - Mr. Dilip Chawrekar - 9425355621', '2021-07-14', 76, 500, 20, 21, 0),
(23, 'Full Day - Mr. Shahid Pervej - 7000460094', '2021-07-14', 148, 148, 21, 22, 0),
(24, 'Full Day - Dr. Hemant K Dubey - 9425034366', '2021-07-14', 0, 500, 22, 23, 0),
(25, 'Full Day - Ms. Kusum Singh Chandel - 9425063957', '2021-07-14', 6, 500, 23, 24, 0),
(26, 'Full Day - Ms. Swati Kardile - 7747002771', '2021-07-14', 0, 500, 23, 25, 0),
(27, 'Full Day - Mr. Dilip Chouhan - 8889199111', '2021-07-14', 15, 500, 24, 26, 0),
(28, 'Full Day - Mr. Anoop Shrivastaba - 9425091548', '2021-07-14', 33, 100, 24, 27, 0),
(29, 'Full Day - Mr. Vinod Jaiswal - 9425330772', '2021-07-14', 4, 500, 25, 28, 0),
(30, 'Full Day - Mr. Aftab Jamed - 9425097732', '2021-07-14', 0, 500, 26, 29, 0),
(31, 'Full Day (9am - 6pm)', '2021-07-07', 15, 60, 27, 30, 0),
(32, 'Full Day - Mr. Vishwas Poorkar 9827630438', '2021-07-14', 4, 200, 9, 31, 0),
(33, 'Full Day - Mr. Praveen Damle 9826880299', '2021-07-14', 4, 200, 9, 32, 0),
(34, 'Full Day - Ms. Kusum Singh Chandel 9425063957', '2021-07-14', 3, 200, 9, 33, 0),
(35, 'Full Day - Ms. Swati Kardile 7747002771', '2021-07-14', 0, 200, 9, 33, 0),
(36, 'Full Day - Mr. B.R. Naidu 9981755619', '2021-07-14', 11, 200, 1, 34, 0),
(37, 'Full Day - Mr. Sanjay Madhup 9827009291', '2021-07-14', 16, 200, 1, 35, 0),
(38, 'Full Day - Mr. Vinod Nigam 8989738210', '2021-07-14', 18, 200, 1, 36, 0),
(39, 'Full Day - Mr. Dilip Chouhan 8889199111', '2021-07-14', 10, 200, 3, 37, 0),
(40, 'Full Day - Mr. Anoop Shrivastava 9425091648', '2021-07-14', 9, 200, 3, 37, 0),
(41, '9 am to 11 am', '2021-07-09', 3, 8, 9, 38, 0),
(42, '2 pm to 9 pm', '2021-07-09', 14, 20, 9, 38, 0),
(43, '9 am - 11 am', '2021-07-10', 0, 5, 9, 38, 0),
(44, '2 pm - 9 pm', '2021-07-10', 5, 8, 9, 38, 0),
(45, 'Full Day 9 am to 6 pm', '2021-07-10', 37, 45, 28, 39, 0),
(46, '1 pm - 7 pm', '2021-07-09', 99, 100, 29, 40, 0),
(47, '1 pm to 7 pm', '2021-07-10', 65, 100, 29, 40, 0),
(48, '3 pm to 6 pm', '2021-07-10', 10, 20, 30, 41, 0),
(49, '12 noon to 4 pm', '2021-07-14', 43, 100, 31, 42, 0),
(50, '10am - 4pm WWF India Pratap Nagar', '2021-07-11', 74, 145, 32, 43, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slot_id`),
  ADD KEY `place_code` (`place_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `slot_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `slots`
--
ALTER TABLE `slots`
  ADD CONSTRAINT `place_code` FOREIGN KEY (`place_code`) REFERENCES `places` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
