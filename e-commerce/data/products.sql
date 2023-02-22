-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2023 at 04:13 PM
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
(1, 1, 'auto_01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'car-g391e22a16_640.png', 'auto,car,vehicle'),
(2, 1, 'auto_02', 'Mauris commodo quis imperdiet massa tincidunt nunc pulvinar.', 'passenger-car-g22eec9eb5_640.png', 'auto,car,vehicle'),
(3, 1, 'auto_03', 'Est lorem ipsum dolor sit amet consectetur.', 'auto-gfbe3aff37_640.jpg', 'auto,car,vehicle'),
(4, 1, 'auto_04', 'Erat velit scelerisque in dictum non consectetur a erat nam.', 'car-ge7b4774c7_640.jpg', 'auto,car,vehicle'),
(5, 2, 'bike_01', 'Aliquam sem fringilla ut morbi tincidunt augue.', 'bicycle-g9c9671453_640.jpg', 'bike,bicycle,sport'),
(6, 2, 'bike_02', 'Sed enim ut sem viverra aliquet eget sit amet.', 'bicycle-gd875b6b36_640.png', 'bike,bicycle,sport'),
(7, 2, 'bike_03', 'Aliquet nec ullamcorper sit amet risus.', 'bike-g243be8424_640.jpg', 'bike,bicycle,sport'),
(8, 2, 'bike_04', 'Ac turpis egestas sed tempus urna et pharetra pharetra massa.', 'racing-bicycle-g61b49f5c6_640.png', 'bike,bicycle,sport'),
(9, 3, 'drink_01', 'Netus et malesuada fames ac turpis egestas maecenas pharetra.', 'cup-gb68c2b37d_640.jpg', 'coffe,drink,tea'),
(10, 3, 'drink_02', 'Etiam tempor orci eu lobortis elementum nibh tellus.', 'drink-gbb46f3646_640.jpg', 'coffe,drink,tea'),
(11, 3, 'drink_03', 'Donec enim diam vulputate ut pharetra sit amet.', 'hd-wallpaper-g6d69d158c_640.jpg', 'coffe,drink,tea'),
(12, 3, 'drink_04', 'Netus et malesuada fames ac turpis egestas maecenas pharetra. Etiam tempor orci eu lobortis elementum nibh tellus. Donec enim diam vulputate ut pharetra sit amet. Amet consectetur adipiscing elit ut aliquam purus sit.', 'lime-gb9554dbf9_640.jpg', 'coffe,drink,tea'),
(13, 4, 'garden_01', 'Eu consequat ac felis donec et odio.', 'chrysanthemum-g07f5f145e_640.jpg', 'garden,home,plant'),
(14, 4, 'garden_02', 'Velit scelerisque in dictum non consectetur.', 'flowers-g8524d017a_640.jpg', 'garden,home,plant'),
(15, 4, 'garden_03', 'Faucibus in ornare quam viverra orci sagittis eu.', 'lavenders-g419766c35_640.jpg', 'garden,home,plant'),
(16, 4, 'garden_04', 'Sed augue lacus viverra vitae congue eu consequat.', 'summer-gec69af7d8_640.jpg', 'garden,home,plant'),
(17, 5, 'gym_01', 'Congue nisi vitae suscipit tellus mauris a diam.', 'black-ga8d5276ef_640.png', 'athletics,gym,sports'),
(18, 5, 'gym_02', 'In ornare quam viverra orci sagittis eu volutpat.', 'fitness-g5b41011b5_640.jpg', 'athletics,gym,sports'),
(19, 5, 'gym_03', 'Amet est placerat in egestas.', 'gym-g324d13c1a_640.jpg', 'athletics,gym,sports'),
(20, 5, 'gym_04', 'Euismod lacinia at quis risus sed vulputate odio ut.', 'kettlebell-gfacd6bdbb_640.jpg', 'athletics,gym,sports'),
(21, 6, 'tech_01', 'Ac tortor dignissim convallis aenean et.', 'background-gdba917afc_640.png', 'computer,mobile,technology'),
(22, 6, 'tech_02', 'Non nisi est sit amet.', 'computer-gcd1bc3704_640.jpg', 'computer,mobile,technology'),
(23, 6, 'tech_03', 'Sit amet dictum sit amet justo donec enim diam vulputate.', 'lcd-g84275a465_640.png', 'computer,mobile,technology'),
(24, 6, 'tech_04', 'Id velit ut tortor pretium viverra suspendisse.', 'server-gb9ea7e210_640.jpg', 'computer,mobile,technology');

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
