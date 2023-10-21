-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2023 at 06:21 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_bookings`
--

DROP TABLE IF EXISTS `user_bookings`;
CREATE TABLE IF NOT EXISTS `user_bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `show_date` varchar(30) NOT NULL,
  `time` time NOT NULL,
  `theater` varchar(250) NOT NULL,
  `seat_num` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_of_seats` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_bookings`
--

INSERT INTO `user_bookings` (`id`, `username`, `m_name`, `show_date`, `time`, `theater`, `seat_num`, `no_of_seats`) VALUES
(1, 'harsh', 'Jawan', '7-10-2023', '00:00:00', 'trp', 'A0,A1,A2', 5),
(2, 'yash', 'Jawan', '9-10-2023', '00:00:00', 'pvr', 'A0,A1', 2),
(3, 'harsh', 'Jawan', '20-10-2023', '00:00:00', 'pvr', 'C5,C6,C7', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
