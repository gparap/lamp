-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2023 at 02:21 PM
-- Server version: 5.7.42-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(4) NOT NULL,
  `link` varchar(64) NOT NULL,
  `title` varchar(64) NOT NULL,
  `image` varchar(128) NOT NULL,
  `cast` varchar(256) NOT NULL,
  `director` varchar(64) NOT NULL,
  `script` varchar(128) NOT NULL,
  `producer` varchar(64) NOT NULL,
  `photo` varchar(64) NOT NULL,
  `editor` varchar(64) NOT NULL,
  `music` varchar(128) NOT NULL,
  `publisher` varchar(64) NOT NULL,
  `year` varchar(4) NOT NULL,
  `duration` varchar(4) NOT NULL,
  `country` varchar(32) NOT NULL,
  `lang` varchar(32) NOT NULL,
  `plot` text NOT NULL,
  `article_id` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movies_articles`
--

CREATE TABLE `movies_articles` (
  `id` int(4) NOT NULL,
  `link` varchar(64) NOT NULL,
  `title` varchar(64) NOT NULL,
  `license` varchar(64) NOT NULL,
  `authors` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_id` (`article_id`);

--
-- Indexes for table `movies_articles`
--
ALTER TABLE `movies_articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies_articles`
--
ALTER TABLE `movies_articles`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
