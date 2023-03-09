-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2023 at 08:22 AM
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
  `item_cost` decimal(8,2) NOT NULL,
  `items_left` int(4) NOT NULL DEFAULT 0,
  `image_url` varchar(64) NOT NULL,
  `keywords` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `item_cost`, `items_left`, `image_url`, `keywords`) VALUES
(1, 1, 'jumper cables', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '19.99', 50, 'jumper-cables.jpg', 'auto,battery,cables,car'),
(2, 1, 'car battery', 'Mauris commodo quis imperdiet massa tincidunt nunc pulvinar.', '49.99', 50, 'lead-accumulator.png', 'auto,battery,car,lead'),
(3, 1, 'car battery rechargeable', 'Est lorem ipsum dolor sit amet consectetur.', '54.99', 25, 'rechargeable-battery.png', 'auto,battery,car,rechargeable'),
(4, 1, 'car battery electric', 'Erat velit scelerisque in dictum non consectetur a erat nam.', '59.99', 10, 'battery-electric.jpg', 'auto,battery,car,electric'),
(5, 2, 'racing bicycle blue', 'Aliquam sem fringilla ut morbi tincidunt augue.', '499.99', 25, 'racing-bicycle-blue.png', 'bicycle,bike,blue,racing,sport'),
(6, 2, 'bicycle vintage black', 'Sed enim ut sem viverra aliquet eget sit amet.', '449.99', 0, 'bicycle-vintage-black.png', 'bicycle,bike,black,cycling,sport'),
(7, 2, 'bicycle with basket', 'Aliquet nec ullamcorper sit amet risus.', '174.99', 25, 'bicycle-basket-green.png', 'bicycle,bike,basket,green'),
(8, 2, 'bicycle with basket', 'Ac turpis egestas sed tempus urna et pharetra pharetra massa.', '149.99', 25, 'bicycle-basket-black.jpg', 'bicycle,bike,basket,black'),
(9, 3, 'tea', 'Netus et malesuada fames ac turpis egestas maecenas pharetra.', '1.49', 100, 'drink-tea.jpg', 'diet,drink,tea'),
(10, 3, 'cocktail', 'Etiam tempor orci eu lobortis elementum nibh tellus.', '4.99', 50, 'drink-cocktail.jpg', 'cocktail,drink,summer'),
(11, 3, 'coffe', 'Donec enim diam vulputate ut pharetra sit amet.', '2.99', 100, 'drink-coffe.jpg', 'coffe,drink,summer'),
(12, 3, 'lime', 'Netus et malesuada fames ac turpis egestas maecenas pharetra. Etiam tempor orci eu lobortis elementum nibh tellus. Donec enim diam vulputate ut pharetra sit amet. Amet consectetur adipiscing elit ut aliquam purus sit.', '1.99', 50, 'drink-lime.jpg', 'diet,drink,lime,summer'),
(13, 4, 'chrysanthemum', 'Eu consequat ac felis donec et odio.', '4.99', 50, 'chrysanthemum.jpg', 'chrysanthemum,garden,home,plant'),
(14, 4, 'marguerite', 'Velit scelerisque in dictum non consectetur.', '4.49', 50, 'marguerite.jpg', 'garden,home,marguerite,plant'),
(15, 4, 'lavender', 'Faucibus in ornare quam viverra orci sagittis eu.', '9.99', 25, 'lavender.jpg', 'lavender,garden,home,plant'),
(16, 4, 'roses', 'Sed augue lacus viverra vitae congue eu consequat.', '7.49', 100, 'roses.png', 'garden,home,plant,roses'),
(17, 5, 'dumbbell black', 'Congue nisi vitae suscipit tellus mauris a diam.', '15.49', 50, 'dumbbell.jpg', 'athletics,dumbbell,gym,sports'),
(18, 5, 'pilates-ball', 'In ornare quam viverra orci sagittis eu volutpat.', '34.99', 10, 'pilates-ball.jpg', 'athletics,ball,gym,pilates'),
(19, 5, 'treadmill', 'Amet est placerat in egestas.', '399.99', 0, 'treadmill.jpg', 'athletics,gym,sports,treadmill'),
(20, 5, 'kettlebell', 'Euismod lacinia at quis risus sed vulputate odio ut.', '19.49', 10, 'kettlebell.jpg', 'athletics,gym,kettlebell,sports'),
(21, 6, 'camera', 'Ac tortor dignissim convallis aenean et.', '59.99', 10, 'camera.png', 'camera,technology'),
(22, 6, 'laptop', 'Non nisi est sit amet.', '499.99', 25, 'laptop.jpg', 'computer,laptop,technology'),
(23, 6, 'computer screen', 'Sit amet dictum sit amet justo donec enim diam vulputate.', '99.99', 5, 'lcd.png', 'computer,LCD,screen,technology'),
(24, 6, 'desktop server', 'Id velit ut tortor pretium viverra suspendisse.', '599.99', 5, 'desktop-server.jpg', 'computer,desktop,technology');

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
