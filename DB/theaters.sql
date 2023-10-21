-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2023 at 06:16 PM
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
-- Table structure for table `all_theaters`
--

DROP TABLE IF EXISTS `all_theaters`;
CREATE TABLE IF NOT EXISTS `all_theaters` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `theater_name` text NOT NULL,
  `address` text NOT NULL,
  `movies_showing` longtext NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `all_theaters`
--

INSERT INTO `all_theaters` (`t_id`, `theater_name`, `address`, `movies_showing`) VALUES
(1, 'Cinepolis: Nexus Ahmedabad One', '3rd Floor, Alpha One Mall, Opp Vastrapur Lake, Ahmedabad, Gujarat 380015, India', 'Yaariyan 2,Ganapath - A Hero Is Born, Jawan, Mission Raniganj, Thank You For Coming, Ghost, Bhagavanth Kesari, Fukrey 3, The Exorcist: Believer'),
(2, 'PVR: Acropolis', '2nd Floor, Acropolis Mall, Thaltej Cross Road, Near Gurudwara, Ahmedabad, Gujarat 380052, India.', 'Yaariyan 2 (UA),Ganapath - A Hero Is Born, Fukrey 3 (UA), Paw Patrol: The Mighty Movie (U), Mission Raniganj (UA), Thank You For Coming (A), Bagha Jatin (Hindi) (UA), '),
(3, 'City Gold: Bopal', 'Behind Amrapali Shopping Complex, Bopal Junction,Sardar Patel Ring Road, Near Bharat Petroleum Petrol Pump, Ahmedabad, Gujarat 380058, India.', 'Jawan (UA),Ganapath - A Hero Is Born, Yaariyan 2 (UA),  Leo (UA), Fukrey 3 (UA), Mission Raniganj (UA), Tiger Nageswara Rao (UA), 3 EKKA (UA)');

-- --------------------------------------------------------

--
-- Table structure for table `cinepolis: nexus ahmedabad one`
--

DROP TABLE IF EXISTS `cinepolis: nexus ahmedabad one`;
CREATE TABLE IF NOT EXISTS `cinepolis: nexus ahmedabad one` (
  `t_id` int NOT NULL DEFAULT '1',
  `m_id` int NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(100) NOT NULL,
  `price_per_seat` int NOT NULL,
  `show_time` varchar(50) NOT NULL,
  `show_date` varchar(50) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cinepolis: nexus ahmedabad one`
--

INSERT INTO `cinepolis: nexus ahmedabad one` (`t_id`, `m_id`, `movie_name`, `price_per_seat`, `show_time`, `show_date`) VALUES
(1, 1, 'Ganapath - A Hero Is Born', 110, '09:00 AM', '20/10/2023'),
(1, 2, 'Ganapath - A Hero Is Born', 130, '10:00 AM', '20/10/2023'),
(1, 3, 'Ganapath - A Hero Is Born', 200, '4:10 PM', '20/10/2023'),
(1, 4, 'Ganapath - A Hero Is Born', 230, '9:50 PM', '20/10/2023'),
(1, 5, 'Ganapath - A Hero Is Born', 230, '10:50 PM', '20/10/2023'),
(1, 6, 'Yaariyan 2', 110, '9:30 AM', '20/10/2023'),
(1, 7, 'Yaariyan 2', 240, '6:45 PM', '20/10/2023'),
(1, 8, 'Jawan', 110, '10:10 AM', '20/10/2023'),
(1, 9, 'Jawan', 112, '6:40 PM', '20/10/2023'),
(1, 10, 'Jawan', 150, '10:10 AM', '21/10/2023'),
(1, 11, 'Jawan', 150, '6:40 PM', '21/10/2023'),
(1, 12, 'Yaariyan 2', 110, '9:30 AM', '21/10/2023'),
(1, 13, 'Yaariyan 2', 130, '12:35 PM', '21/10/2023');

-- --------------------------------------------------------

--
-- Table structure for table `city gold: bopal`
--

DROP TABLE IF EXISTS `city gold: bopal`;
CREATE TABLE IF NOT EXISTS `city gold: bopal` (
  `t_id` int NOT NULL DEFAULT '3',
  `m_id` int NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(100) NOT NULL,
  `price_per_seat` int NOT NULL,
  `show_time` varchar(50) NOT NULL,
  `show_date` varchar(50) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `city gold: bopal`
--

INSERT INTO `city gold: bopal` (`t_id`, `m_id`, `movie_name`, `price_per_seat`, `show_time`, `show_date`) VALUES
(3, 1, 'Jawan', 100, '9:00 AM', '20/10/2023'),
(3, 2, 'Jawan', 100, '11:00 AM', '21/10/2023'),
(3, 3, 'Jawan', 100, '6:00 PM', '22/10/2023');

-- --------------------------------------------------------

--
-- Table structure for table `pvr: acropolis`
--

DROP TABLE IF EXISTS `pvr: acropolis`;
CREATE TABLE IF NOT EXISTS `pvr: acropolis` (
  `t_id` int NOT NULL DEFAULT '2',
  `m_id` int NOT NULL,
  `movie_name` text NOT NULL,
  `price_per_seat` int NOT NULL,
  `show_time` varchar(50) NOT NULL,
  `show_date` varchar(30) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
