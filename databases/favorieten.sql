-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2026 at 09:51 AM
-- Server version: 10.6.23-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.3.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `104081_programm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorieten`
--

CREATE TABLE `favorieten` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `favorieten`
--

INSERT INTO `favorieten` (`id`, `user_id`, `recept_id`) VALUES
(13, 37, 70),
(12, 37, 71),
(16, 37, 72),
(15, 39, 72),
(17, 40, 71);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorieten`
--
ALTER TABLE `favorieten`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`recept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorieten`
--
ALTER TABLE `favorieten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
