-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2025 at 03:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(4) NOT NULL,
  `title` varchar(64) NOT NULL,
  `author` varchar(32) NOT NULL,
  `image` varchar(64) NOT NULL,
  `file` varchar(128) NOT NULL,
  `genre` varchar(32) NOT NULL,
  `pages` int(4) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `image`, `file`, `genre`, `pages`, `year`) VALUES
(1, 'The Mystery of Cabin Island', 'Franklin W. Dixon', 'The_Mystery_of_Cabin_Island.jpg', 'The_Mystery_of_Cabin_Island.pdf', 'mystery', 178, 1929),
(2, 'The Giant Raft', 'Jules Verne', 'The_Giant_Raft.jpg', 'The_Giant_Raft.pdf', 'adventure', 286, 1881),
(3, 'Demian', 'Hermann Hesse', 'Demian.jpg', 'Demian.pdf', 'novel', 390, 1919),
(4, 'The First Men in the Moon', 'H. G. Wells', 'The_First_Men_in_the_Moon.jpg', 'The_First_Men_in_the_Moon.pdf', 'science_fiction', 342, 1901),
(5, 'Looking Backward', 'Edward Bellamy', 'Looking_Backward.jpg', 'Looking_Backward.pdf', 'science_fiction', 470, 1887);

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
