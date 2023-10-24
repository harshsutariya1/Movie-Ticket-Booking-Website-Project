-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 22, 2023 at 10:00 PM
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
-- Database: `theaters`
--

-- --------------------------------------------------------

--
-- Table structure for table `city gold: bopal`
--

DROP TABLE IF EXISTS `city gold: bopal`;
CREATE TABLE IF NOT EXISTS `city gold: bopal` (
  `t_id` int NOT NULL DEFAULT '1',
  `m_id` int NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(100) NOT NULL,
  `price_per_seat` int NOT NULL,
  `show_time` varchar(50) NOT NULL,
  `show_date` varchar(50) NOT NULL,
  `screen_num` int NOT NULL,
  `already_booked_seats` longtext NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `city gold: bopal`
--

INSERT INTO `city gold: bopal` (`t_id`, `m_id`, `movie_name`, `price_per_seat`, `show_time`, `show_date`, `screen_num`, `already_booked_seats`) VALUES
(1, 1, 'Ganapath - A Hero Is Born', 110, '09:00 AM', '20/10/2023', 0, 'A1, G3, F4, C6, C7, C8, A3, A5, A6, A7'),
(1, 2, 'Ganapath - A Hero Is Born', 130, '10:00 AM', '20/10/2023', 0, ''),
(1, 3, 'Ganapath - A Hero Is Born', 200, '4:10 PM', '20/10/2023', 0, ''),
(1, 4, 'Ganapath - A Hero Is Born', 230, '9:50 PM', '20/10/2023', 0, ''),
(1, 5, 'Ganapath - A Hero Is Born', 230, '10:50 PM', '20/10/2023', 0, ''),
(1, 6, 'Yaariyan 2', 110, '9:30 AM', '20/10/2023', 0, ''),
(1, 7, 'Yaariyan 2', 240, '6:45 PM', '20/10/2023', 0, ''),
(1, 8, 'Jawan', 110, '10:10 AM', '20/10/2023', 4, 'B5, C4'),
(1, 9, 'Jawan', 112, '6:40 PM', '20/10/2023', 3, 'A1, G3, F4, C6, C7, C8, A3, A5, A6, A7'),
(1, 10, 'Jawan', 150, '10:10 AM', '21/10/2023', 2, 'A1, G3, F4, C6, C7, C8, A3, A5, A6, A7, D9'),
(1, 11, 'Jawan', 150, '6:40 PM', '21/10/2023', 5, ''),
(1, 12, 'Yaariyan 2', 110, '9:30 AM', '21/10/2023', 0, ''),
(1, 13, 'Yaariyan 2', 130, '12:35 PM', '21/10/2023', 0, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
