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
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `m_id` int NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(100) NOT NULL,
  `release_date` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` mediumtext NOT NULL,
  `language` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `imdb_ratings` float NOT NULL,
  `poster_img` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `duration` varchar(50) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`m_id`, `movie_name`, `release_date`, `description`, `language`, `genre`, `imdb_ratings`, `poster_img`, `duration`) VALUES
(1, 'Jawan', '7 Sep, 2023', 'A high-octane action thriller that outlines the emotional journey of a man who is set to rectify the wrongs in society.', 'Hindi, Tamil, Talugu', 'Action, Thriller', 7.5, 'https://assets-in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/jawan-et00330424-1693892482.jpg', '2h 49m'),
(2, 'Gadar 2: The Katha Continues', '11 Aug, 2023', 'Gadar 2 brings back India`s most loved family of Tara, Sakeena and Jeete, 22 years after its predecessor. Set against the backdrop of Indo-Pakistan war of 1971, Tara Singh, once again, will face every enemy to protect the honor of country and family.', 'Hindi', 'Action , Drama', 5.4, 'https://assets-in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/gadar-2-et00338629-1688724591.jpg', '2h 50m'),
(3, 'Leo', '19 Oct, 2023', 'A cafe owner becomes a local hero but his actions being forth consequences from a dangerous world that can shake his carefully constructed life.', 'Tamil, Hindi, Telugu, Kannada', 'Action, Thriller', 8.6, 'https://assets-in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/leo-et00351731-1675663884.jpg', '2h 39m'),
(4, 'Ghost', '19 Oct, 2023', 'Ghost tells the story of one man`s quest for justice.', 'Kannada, Malayalam, Tamil, Hindi, Telugu', 'Mystery, Adventure, Action', 9, 'https://assets-in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/ghost-et00334196-1696485105.jpg', '2h 14m'),
(5, 'Mission Raniganj', '6 Oct, 2023', 'Mining engineer Jaswant Singh Gill leads a challenging rescue mission to save 65 miners trapped in a flooded coal mine.', 'Hindi', 'Drama , Thriller', 7.7, 'https://assets-in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/mission-raniganj-et00362090-1696831881.jpg', '2h 18m'),
(6, 'Fukrey 3', '28 Sep, 2023', 'Iss baar hoga chamatkaar, straight from Jamnapaar! The Fukras are back with 3X more fukrapanti.', 'Hindi', 'Comedy', 7.7, 'https://assets-in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/fukrey-3-et00350845-1694780597.jpg', '2h 30m'),
(7, 'The Exorcist: Believer', '6 Oct, 2023', 'When his daughter, Angela, and her friend Katherine, show signs of demonic possession, it unleashes a chain of events that forces single father Victor Fielding to confront the nadir of evil. Terrified and desperate, he seeks out Chris MacNeil, the only person alive who\'s witnessed anything like it before.', 'English , Hindi , Telugu , Tamil', 'Horror , Thriller', 5.1, 'https://assets-in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/the-exorcist-believer-et00365534-1696398220.jpg', '1h 59m'),
(8, '3 EKKA', '25 Aug, 2023', 'Three friends stuck in financial crises, come up with an idiotic plan to transform a simple middle-class house into a secret gambling den. A series of mishaps inside and outside the gambling den keep piling up. Will they win or lose?', 'Gujarati', 'Comedy , Crime', 7.5, 'https://assets-in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/3-ekka-et00350981-1689320228.jpg', '2h 26m'),
(9, 'Thank You For Coming', '6 Oct, 2023', 'Kanika Kapoor, a die-hard romantic, seeks an arranged marriage after a series of unsuccessful relationships. At her engagement she invites her ex-lovers, triggering a mysterious gift - her first orgasm. A comedic yet introspective journey unfolds, exploring love, society and the essence of female pleasure in 2023.', 'Hindi', 'Comedy , Drama', 6.3, 'https://assets-in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/thank-you-for-coming-et00366905-1693823692.jpg', '1h 58m'),
(10, 'A Haunting in Venice', '15 Sep, 2023', 'Now retired and living in self-imposed exile in the world\'s most glamorous city, Poirot reluctantly attends a seance at a decaying, haunted palazzo. He soons gets thrust into a sinister world of shadows and secrets when one of the guests is murdered.', 'English', 'Crime , Horror , Mystery', 6.8, 'https://assets-in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/a-haunting-in-venice-et00363853-1688646632.jpg', '1h 43m'),
(11, 'Ganapath - A Hero Is Born', '20 Oct, 2023', 'Ganapath is a futuristic action thriller film that is set in the year 2070, where the world is divided between Silver City and Gareebon Ki Duniya, Ganapath rises as a beacon of hope, to bridge the gap between the unjust division of society.', 'Hindi , Kannada , Malayalam , Telugu , Tamil', 'Action , Romantic , Sci-Fi , Thriller', 0, 'https://assets-in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/ganapath--a-hero-is-born-et00300918-1697549981.jpg', '2h 16m');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
