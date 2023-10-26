-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 25, 2023 at 11:05 AM
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `mobile_num` bigint NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `mobile_num`, `password`, `created_at`) VALUES
(1, 'harsh', 'Harsh Sutariya', 9754214587, '$2y$10$6jq30XUG7H2o.IUt9dhx.eJBpVzBsfv4rpUYaTkDxM2jRZYdhlfv2', '2023-10-16 21:47:24'),
(2, 'yash', 'Yash Sutariya', 8545785452, '$2y$10$7YY9N48nOs0o0Av6dG5egOtx0P3lojHyVxk1TZsfdr1kdV0dLLuJq', '2023-10-16 21:56:12'),
(7, 'vishesh', 'Vishesh Bhatt', 4578451245, '$2y$10$.Ox.t2l7elIvDZ63.rDuFeft274wmUH92dplNIgfiWpuRPegoQD.u', '2023-10-21 04:05:35'),
(6, 'ferinyo', 'Ferin Patel', 8745814235, '$2y$10$5jzqEbxL6Ma399hKLYASXe5Ui5JVfna6yb3h.Zyxz/c3/S9VwXXLa', '2023-10-21 04:01:37'),
(10, 'gunjan', 'Gunjan Savaliya', 4578457845, '$2y$10$DwJ82JhFw6dD4v46mmrmWeuyylAZEKYLlxHW.V4Cp4aErSqkF.MTy', '2023-10-25 01:59:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
