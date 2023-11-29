-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2023 at 04:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(4) NOT NULL,
  `title` varchar(128) NOT NULL,
  `author` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(64) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `keywords` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `content`, `image`, `date`, `keywords`) VALUES
(1, 'Lorem Ipsum', 'Cicero', 'Dolore alias molestiae nobis sit. Temporibus eum suscipit ex est delectus necessitatibus quis id. Et nihil excepturi et.\r\n\r\nPerferendis eligendi nesciunt corrupti facilis. At quia aut necessitatibus corrupti sapiente distinctio eaque eos. Porro aperiam molestiae temporibus incidunt. Vero adipisci in animi. Ut ut eveniet possimus. Vitae fuga molestiae maiores dolorem ratione debitis.\r\n\r\nEt sunt iusto temporibus mollitia ipsa eum inventore similique. Ad ea tenetur saepe eos totam iste dolores. Reiciendis laboriosam hic dolores odit. Reiciendis nulla unde inventore. Qui corporis eius odio nesciunt est.\r\n\r\nVoluptatum sint et quia. Mollitia fugit in ab voluptatum et soluta. Eveniet magnam quaerat eius. Maxime maiores corporis ea aspernatur perspiciatis. Enim modi officia molestiae omnis architecto nihil. Consequatur sed et amet qui repellendus.\r\n\r\nQuo voluptatem delectus aut quis quis sapiente. Ad ad est sapiente quam. Quasi repellendus officiis minus.', '', '2023-11-27', 'lorem, ipsum'),
(5, 'Perferendis eligendi', 'author #1', 'Perferendis eligendi nesciunt corrupti facilis. At quia aut necessitatibus corrupti sapiente distinctio eaque eos. Porro aperiam molestiae temporibus incidunt. Vero adipisci in animi. Ut ut eveniet possimus. Vitae fuga molestiae maiores dolorem ratione debitis.', NULL, NULL, 'lorem, ipsum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
