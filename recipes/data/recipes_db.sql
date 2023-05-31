-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2023 at 12:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(2) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `descAttribText` varchar(128) NOT NULL,
  `descAttribLink` varchar(64) NOT NULL,
  `img` varchar(128) NOT NULL,
  `imgAttrib` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `descAttribText`, `descAttribLink`, `img`, `imgAttrib`) VALUES
(0, 'category_name', 'category_description', 'text_license', 'text_license_link', 'category_image', 'category_image_license');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `descr` text DEFAULT NULL,
  `keywords` varchar(256) DEFAULT NULL,
  `img` varchar(256) DEFAULT NULL,
  `license` varchar(512) DEFAULT NULL,
  `video` varchar(256) DEFAULT NULL,
  `category` varchar(64) DEFAULT NULL,
  `servings` varchar(32) DEFAULT NULL,
  `prep_time` varchar(64) DEFAULT NULL,
  `difficulty` varchar(32) DEFAULT NULL,
  `ingreds` text DEFAULT NULL,
  `steps` text DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `visible`, `title`, `descr`, `keywords`, `img`, `license`, `video`, `category`, `servings`, `prep_time`, `difficulty`, `ingreds`, `steps`, `notes`) VALUES
(0, 1, 'recipe_title', 'recipe_description', 'keywords', 'recipe_image', 'recipe_image_license', 'recipe_video_link', 'recipe_category', 'recipe_servings', 'recipe_time', 'recipe_difficulty', 'recipe_ingredients', 'recipe_steps', 'recipe_notes');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
