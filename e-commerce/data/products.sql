-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2023 at 02:28 PM
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
-- Database: `e_commerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `category_id` int(4) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(64) NOT NULL,
  `keywords` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `image_url`, `keywords`) VALUES
(1, 1, 'auto_01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://via.placeholder.com/192', 'auto,car,vehicle'),
(2, 1, 'auto_02', 'Mauris commodo quis imperdiet massa tincidunt nunc pulvinar.', 'https://via.placeholder.com/192', 'auto,car,vehicle'),
(3, 1, 'auto_03', 'Est lorem ipsum dolor sit amet consectetur.', 'https://via.placeholder.com/192', 'auto,car,vehicle'),
(4, 1, 'auto_04', 'Erat velit scelerisque in dictum non consectetur a erat nam.', 'https://via.placeholder.com/192', 'auto,car,vehicle'),
(5, 2, 'bike_01', 'Aliquam sem fringilla ut morbi tincidunt augue.', 'https://via.placeholder.com/192', 'bike,bicycle,sport'),
(6, 2, 'bike_02', 'Sed enim ut sem viverra aliquet eget sit amet.', 'https://via.placeholder.com/192', 'bike,bicycle,sport'),
(7, 2, 'bike_03', 'Aliquet nec ullamcorper sit amet risus.', 'https://via.placeholder.com/192', 'bike,bicycle,sport'),
(8, 2, 'bike_04', 'Ac turpis egestas sed tempus urna et pharetra pharetra massa.', 'https://via.placeholder.com/192', 'bike,bicycle,sport'),
(9, 3, 'drink_01', 'Netus et malesuada fames ac turpis egestas maecenas pharetra.', 'https://via.placeholder.com/192', 'coffe,drink,tea'),
(10, 3, 'drink_02', 'Etiam tempor orci eu lobortis elementum nibh tellus.', 'https://via.placeholder.com/192', 'coffe,drink,tea'),
(11, 3, 'drink_03', 'Donec enim diam vulputate ut pharetra sit amet.', 'https://via.placeholder.com/192', 'coffe,drink,tea'),
(12, 3, 'drink_04', 'Netus et malesuada fames ac turpis egestas maecenas pharetra. Etiam tempor orci eu lobortis elementum nibh tellus. Donec enim diam vulputate ut pharetra sit amet. Amet consectetur adipiscing elit ut aliquam purus sit.', 'https://via.placeholder.com/192', 'coffe,drink,tea'),
(13, 4, 'garden_01', 'Eu consequat ac felis donec et odio.', 'https://via.placeholder.com/192', 'garden,home,plant'),
(14, 4, 'garden_02', 'Velit scelerisque in dictum non consectetur.', 'https://via.placeholder.com/192', 'garden,home,plant'),
(15, 4, 'garden_03', 'Faucibus in ornare quam viverra orci sagittis eu.', 'https://via.placeholder.com/192', 'garden,home,plant'),
(16, 4, 'garden_04', 'Sed augue lacus viverra vitae congue eu consequat.', 'https://via.placeholder.com/192', 'garden,home,plant'),
(17, 5, 'gym_01', 'Congue nisi vitae suscipit tellus mauris a diam.', 'https://via.placeholder.com/192', 'athletics,gym,sports'),
(18, 5, 'gym_02', 'In ornare quam viverra orci sagittis eu volutpat.', 'https://via.placeholder.com/192', 'athletics,gym,sports'),
(19, 5, 'gym_03', 'Amet est placerat in egestas.', 'https://via.placeholder.com/192', 'athletics,gym,sports'),
(20, 5, 'gym_04', 'Euismod lacinia at quis risus sed vulputate odio ut.', 'https://via.placeholder.com/192', 'athletics,gym,sports'),
(21, 6, 'tech_01', 'Ac tortor dignissim convallis aenean et.', 'https://via.placeholder.com/192', 'computer,mobile,technology'),
(22, 6, 'tech_02', 'Non nisi est sit amet.', 'https://via.placeholder.com/192', 'computer,mobile,technology'),
(23, 6, 'tech_03', 'Sit amet dictum sit amet justo donec enim diam vulputate.', 'https://via.placeholder.com/192', 'computer,mobile,technology'),
(24, 6, 'tech_04', 'Id velit ut tortor pretium viverra suspendisse.', 'https://via.placeholder.com/192', 'computer,mobile,technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
