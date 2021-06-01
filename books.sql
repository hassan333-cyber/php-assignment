-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2021 at 02:07 PM
-- Server version: 8.0.24-cluster
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int UNSIGNED NOT NULL,
  `bookName` varchar(30) NOT NULL,
  `publisher` varchar(30) NOT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `thumbnail` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookName`, `publisher`, `isbn`, `thumbnail`) VALUES
(1, 'demo', 'abc', '1234567', 'uploads/PicsArt_01-11-08.34.35.jpg'),
(3, 'asd', 'ada', '234234', 'uploads/Screenshot from 2021-04-28 23-36-33.png'),
(4, 'sasa', 'ada', '234234', 'uploads/Screenshot from 2021-04-27 15-34-10.png'),
(5, 'sasa', 'ada', '234234', 'uploads/Screenshot from 2021-04-22 14-26-03.png'),
(6, 'asd', 'ada', '234234', 'uploads/profile.jpeg'),
(7, 'sasa', 'ada', '234234', 'uploads/PicsArt_01-11-08.34.35.jpg'),
(8, 'sasa', 'ada', '234234', 'uploads/phpQuiz.png'),
(9, 'sasa', 'ada', '234234', 'uploads/M.Hassan.jpg'),
(10, 'sasa', 'ada', '432', 'uploads/phpQuiz.png'),
(13, 'Test Demo', 'ada', '234234', 'uploads/profile.jpeg'),
(14, 'test 2', 'test 2', '1234567', 'uploads/Screenshot from 2021-04-27 15-34-10.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
