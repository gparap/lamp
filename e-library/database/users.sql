-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2025 at 02:31 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `name` varchar(64) NOT NULL,
  `avatar` varchar(64) NOT NULL DEFAULT 'person-circle.svg',
  `username` varchar(16) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` int(16) NOT NULL,
  `address` varchar(64) NOT NULL,
  `role` varchar(16) NOT NULL DEFAULT 'pending',
  `status` varchar(16) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `username`, `password`, `email`, `phone`, `address`, `role`, `status`) VALUES
(1, 'administrator', 'person-circle.svg', 'admin', '$2y$10$BpAo38DwWqMq46pqsFS9Me/wG8qCkkOsuREpCnDQjfttJhEwQCsze', 'admin@dot.com', 1234567890, 'remote', 'admin', 'approved'),
(2, 'librarian', 'person-circle.svg', 'lib', '$2y$10$BpAo38DwWqMq46pqsFS9Me/wG8qCkkOsuREpCnDQjfttJhEwQCsze', 'lib@dot.com', 1234567890, 'remote', 'lib', 'approved'),
(3, 'user', 'person-circle.svg', 'user', '$2y$10$BpAo38DwWqMq46pqsFS9Me/wG8qCkkOsuREpCnDQjfttJhEwQCsze', 'user@dot.com', 1234567890, 'remote', 'user', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
