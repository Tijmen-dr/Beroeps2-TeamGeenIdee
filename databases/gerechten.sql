-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2026 at 09:49 AM
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
-- Table structure for table `gerechten`
--

CREATE TABLE `gerechten` (
  `id` int(11) NOT NULL,
  `receptNaam` text NOT NULL,
  `receptFoto` text NOT NULL,
  `receptIngredientenNEW` text NOT NULL,
  `bereidingswijze` text NOT NULL,
  `type` text NOT NULL,
  `bereidingstijd` text NOT NULL,
  `receptIngredienten` text NOT NULL,
  `temperatuur` text NOT NULL,
  `moeilijkheid` text NOT NULL,
  `beschrijving` text NOT NULL,
  `auteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `gerechten`
--

INSERT INTO `gerechten` (`id`, `receptNaam`, `receptFoto`, `receptIngredientenNEW`, `bereidingswijze`, `type`, `bereidingstijd`, `receptIngredienten`, `temperatuur`, `moeilijkheid`, `beschrijving`, `auteur_id`) VALUES
(1, '', '', '', '', 'Voorafjes', '15', '0', '0', 'Categorie I', '', 37),
(2, '', '', '', '', 'Hoofdgerechten', '30', '0', '0', 'Categorie II', '', 37),
(3, '', '', '', '', 'Nagerechten', '15', '0', '0', 'Categorie I', '', 37),
(4, '', '', '', '', 'Drankjes', '15', '0', '0', 'Categorie I', '', 37),
(5, '', '', '', '', 'Snacks', '15', '0', '0', 'Categorie II', '', 37),
(6, '', '', '', '', 'Desserts', '30', '0', '0', 'Categorie III', '', 37),
(7, '', '', '', '', 'Hoofdgerechten', '0', '0', '0', 'Categorie IV', '', 37),
(8, '', '', '', '', 'Voorafjes', '15', '0', '0', 'Categorie II', '', 37),
(9, '', '', '', '', 'Voorafjes', '15', '5', '0', 'Categorie I', '', 37),
(10, '', '', '', '', 'Hoofdgerechten', '30', '5', '0', 'Categorie II', '', 37),
(11, '', '', '', '', 'Nagerechten', '15', '0', '0', 'Categorie I', '', 37),
(12, '', '', '', '', 'Drankjes', '15', '0', '0', 'Categorie I', '', 37),
(13, '', '', '', '', 'Snacks', '15', '5', '0', 'Categorie II', '', 37),
(14, '', '', '', '', 'Desserts', '30', '10', '0', 'Categorie III', '', 37),
(15, '', '', '', '', 'Hoofdgerechten', '0', '10', '0', 'Categorie IV', '', 37),
(16, '', '', '', '', 'Voorafjes', '15', '5', '0', 'Categorie II', '', 37),
(17, '', '', '', '', 'Voorafjes', '15', '0', '0', 'Categorie I', '', 37),
(18, '', '', '', '', 'Hoofdgerechten', '15', '5', '0', 'Categorie II', '', 37),
(19, '', '', '', '', 'Nagerechten', '15', '0', '0', 'Categorie I', '', 37),
(20, '', '', '', '', 'Drankjes', '15', '0', '0', 'Categorie I', '', 37),
(21, '', '', '', '', 'Snacks', '15', '5', '0', 'Categorie II', '', 37),
(22, '', '', '', '', 'Desserts', '30', '10', '0', 'Categorie III', '', 37),
(23, '', '', '', '', 'Hoofdgerechten', '0', '10', '0', 'Categorie IV', '', 37),
(24, '', '', '', '', 'Voorafjes', '15', '5', '0', 'Categorie II', '', 37),
(25, '', '', '', '', 'Hoofdgerechten', '15', '0', '0', 'Categorie I', '', 37),
(26, '', '', '', '', 'Nagerechten', '30', '5', '0', 'Categorie II', '', 37),
(27, '', '', '', '', 'Snacks', '15', '0', '0', 'Categorie I', '', 37),
(28, '', '', '', '', 'Drankjes', '15', '0', '0', 'Categorie I', '', 37),
(29, '', '', '', '', 'Voorafjes', '15', '5', '0', 'Categorie I', '', 37),
(30, '', '', '', '', 'Hoofdgerechten', '30', '10', '0', 'Categorie III', '', 37),
(31, '', '', '', '', 'Nagerechten', '15', '0', '0', 'Categorie I', '', 37),
(32, '', '', '', '', 'Snacks', '15', '0', '0', 'Categorie I', '', 37),
(33, '', '', '', '', 'Desserts', '15', '5', '0', 'Categorie II', '', 37),
(34, '', '', '', '', 'Hoofdgerechten', '15', '5', '0', 'Categorie II', '', 37),
(35, '', '', '', '', 'Voorafjes', '15', '0', '0', 'Categorie I', '', 37),
(36, '', '', '', '', 'Drankjes', '15', '0', '0', 'Categorie I', '', 37),
(37, '', '', '', '', 'Snacks', '30', '10', '0', 'Categorie III', '', 37),
(38, '', '', '', '', 'Desserts', '15', '0', '0', 'Categorie I', '', 37),
(39, '', '', '', '', 'Hoofdgerechten', '0', '10', '0', 'Categorie IV', '', 37),
(40, '', '', '', '', 'Voorafjes', '15', '5', '0', 'Categorie I', '', 37),
(41, '', '', '', '', 'Nagerechten', '30', '5', '0', 'Categorie II', '', 37),
(42, '', '', '', '', 'Drankjes', '15', '0', '0', 'Categorie I', '', 37),
(43, '', '', '', '', 'Snacks', '15', '5', '0', 'Categorie II', '', 37),
(44, '', '', '', '', 'Hoofdgerechten', '30', '5', '0', 'Categorie II', '', 37),
(45, '', '', '', '', 'Voorafjes', '15', '0', '0', 'Categorie I', '', 37),
(46, '', '', '', '', 'Desserts', '15', '5', '0', 'Categorie II', '', 37),
(47, '', '', '', '', 'Hoofdgerechten', '15', '0', '0', 'Categorie I', '', 37),
(48, '', '', '', '', 'Snacks', '15', '0', '0', 'Categorie I', '', 37),
(49, '', '', '', '', 'Nagerechten', '15', '0', '0', 'Categorie I', '', 37),
(50, '', '', '', '', 'Drankjes', '15', '0', '0', 'Categorie I', '', 37),
(51, '', '', '', '', 'Voorafjes', '15', '5', '0', 'Categorie I', '', 37),
(52, '', '', '', '', 'Hoofdgerechten', '0', '10', '0', 'Categorie IV', '', 37),
(53, '', '', '', '', 'Desserts', '30', '10', '0', 'Categorie III', '', 37),
(54, '', '', '', '', 'Snacks', '15', '5', '0', 'Categorie II', '', 37),
(55, '', '', '', '', 'Voorafjes', '15', '5', '0', 'Categorie II', '', 37),
(56, '', '', '', '', 'Hoofdgerechten', '30', '5', '0', 'Categorie II', '', 37),
(57, '', '', '', '', 'Nagerechten', '15', '0', '0', 'Categorie I', '', 37),
(58, '', '', '', '', 'Drankjes', '15', '0', '0', 'Categorie I', '', 37),
(59, '', '', '', '', 'Snacks', '15', '0', '0', 'Categorie I', '', 37),
(60, '', '', '', '', 'Desserts', '15', '5', '0', 'Categorie II', '', 37),
(61, '', '', '', '', 'Hoofdgerechten', '15', '5', '0', 'Categorie II', '', 37),
(62, '', '', '', '', 'Voorafjes', '15', '0', '0', 'Categorie I', '', 37),
(63, '', '', '', '', 'Snacks', '30', '10', '0', 'Categorie III', '', 37),
(64, '', '', '', '', 'Nagerechten', '30', '5', '0', 'Categorie II', '', 37),
(65, '', '', '', '', 'Drankjes', '15', '0', '0', 'Categorie I', '', 37),
(66, '', '', '', '', 'Hoofdgerechten', '30', '5', '0', 'Categorie II', '', 37),
(69, 'Broodje kaas', '67b92499c82504a36885df40c18b11ca.jpg', 'Brood, Kaas, Boter', '', 'Voorafjes', '1-15 min', '1-5', 'Koud', 'Categorie I', 'Een simpel broodje voor ontbijt of lunch. Heel eenvoudig om te maken', 37),
(70, 'kaas', 'e9b9226fc31b081c6bc88e548740d109.jpg', 'Blok Kaas', '', 'Voorafjes', '15-30min', '10+', 'Warm', 'Categorie I', 'lekker', 37),
(71, 'Tosti Ham Kaas', 'f527fd0809139ebf0422f4102539d3df.jpg', 'Brood, Ham, Kaas', '<ol class=\"bereidingswijze\"><li>Pak 2 boterhammen en doe kaas op een, en ham op de andere.</li><li>Doe nu de boterhammen op elkaar, met de kaas en ham op elkaar.</li><li>Daarna doe je de boterhammen op het tosti ijzer.</li><li>Klap hem dicht en wacht 5 tot 10 minuten.</li><li>Check dan of het brood bruin is en de kaas gesmolten is.</li><li>Dan doe je de klap weer open, en tada! Een heerlijke Tosti Ham Kaas</li></ol>', 'Snacks', '1-15 min', '1-5', 'Warm', 'Categorie I', 'Lekker tostitje', 37),
(72, 'Blokje kaas', '57ed841b4d873e8824da39a15f1601ba.png', 'Kaas', '<ol class=\"bereidingswijze\"><li>Pak het stukje kaas erbij dat je hebt</li><li>Sneid er zo veel mogelijk blokjes vanaf</li><li>Voillá! Blokje kaas</li></ol>', 'Snacks', '60+ min', '10+', 'Warm', 'Categorie V', 'Kaas is lekker', 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gerechten`
--
ALTER TABLE `gerechten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recept_auteur` (`auteur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gerechten`
--
ALTER TABLE `gerechten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gerechten`
--
ALTER TABLE `gerechten`
  ADD CONSTRAINT `fk_recept_auteur` FOREIGN KEY (`auteur_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
