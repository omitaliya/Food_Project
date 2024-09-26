-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 09:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`, `role`) VALUES
(2, 'om', 'om123@gmail.com', '8320873338', 'a4cf035f48901bfc20db7f118fdeb13d988f294b', 'm-404, suvas caspia, nikol, Ahmedabad, Ahmedabad, Gujarat, India - 364505', 'user'),
(3, 'dhaval', 'dhaval12@gmail.com', '9098923432', '9e8a88f272eaf8af1eb7757146d1fb3d7f128182', 's404, malabar prime, shimada, femina town, surat, l h road, india - 395010', 'user'),
(4, 'meetbhai', 'meetbhai90@gmail.com', '6354269098', 'c3c58411fb1eb4c466b689ce040f0d487921bcc6', 'k, sa, shimada, gariadhar, bhavnagar, h l, India - 364505', 'user'),
(5, 'jaymin', 'jaymin@gmail.com', '9313402408', 'cd9c01167a4204adf33a741ddfba58d3ad20ba7b', '', 'admin'),
(20, 'niraj', 'niraj1@gmail.com', '9090909090', '32975acf24f3adc306397a4eab46f83ee3390eec', '', 'user');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
