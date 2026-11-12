-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2026 at 09:50 AM
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `username`, `password`) VALUES
(6, 'zcz', 'zczc', '$2y$10$3UQ8qo7AWjKUnfAPEEFwcuopNTzKFsdm.MYXh0rZbxXCGrgVnpERq'),
(7, '104081@glr.nl', 'arda', '$2y$10$YiIgtT5wPNjJ01Ys4k5bEeXbr8/3DmEA4NTC92krQvk1oBsPbSSF2'),
(9, 'dsfvdsvh', 'dsjdsvkds', '$2y$10$.z9Zk.cqNhUl7you7FKgQu//1WlquSgh7aDP4cdD9IZV/E8LoxnQS'),
(12, 'cdscaf', 'dasd', '$2y$10$BbCOoWaH2QT2AV1qKqeu3.Jw.HPauMnBXwOzb5AcVDEVoxytl19ca'),
(13, 'w', 'tr3443t4tt', '$2y$10$R4OHynqJcUzokytr2oUHBeCTPTEXl/ATe9lO0rxCq1orV1DmA4HI2'),
(14, 'asasdasd', 'dasdsa', '$2y$10$tq5n28.AjwFKXHvT77u4TuzomtDliW9GVO5jgqVlrkvGHDHOOUgBK'),
(29, 'kaan@gmail.com', 'kaan', '$2y$10$JXTXbaSlhcbrHLmEj7cCpegHSDq0co4YAiBaasCS1K8c8vD.8NF1y'),
(30, '434244@gmail.com', '1111', '$2y$10$y.7/UYtzBpr81L.F5HqNCe20OOTq7bOTDDk/eoN.vQfmLBpBGLMLi'),
(33, '1111@1111', 'hallo', '$2y$10$e.wkEldh.Fz8lKIY8iI9ve6IWUZjZnHiVQnZkPaLNkE5BaaI03pT6'),
(34, 'arda@glr.nl', 'kaas', '$2y$10$Q9QHpR5/mU.SwBGCyfOsbOlBX/8juVXUdx/I0tkddu6n0lW9x5eXC'),
(35, 'piet@glr.nl', 'piet', '$2y$10$ysbftldos2sobgnDHsMwtOX9HRXLyQO7LOks54DvfDlUxC31LO6cO'),
(36, 'rayhan@glr.nl', 'rayhan', '$2y$10$ndaHUecWHe8sPDqYU.TRqe3wyyagiAXegjEu86E9jtgRgsRPwMc5W'),
(37, '103494@glr.nl', 'Tijmxn', '$2y$10$KFoVhnggGXogdQPCJO.8ee0JYO30gpKkMs7Qrn6VQ0wV82qPSoEWC'),
(39, 'blep@blep', 'blepMAN', '$2y$10$y14W4cOs380CGbcNXKjfgupRUnDHuyN4CJg8vZtWLbYana/1n2c0W'),
(40, 'tariq@gmail.com', 'tariq', '$2y$10$/H4XZeIMLr91.cjDVKvGle2f4yGAGzOM7oV0d7CZxwqFVXO7poAXK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
