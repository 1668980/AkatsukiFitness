-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql5.freesqldatabase.com
-- Generation Time: Feb 12, 2022 at 09:05 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql5472123`
--

-- --------------------------------------------------------

--
-- Table structure for table `poidshistorique`
--

DROP TABLE IF EXISTS `poidshistorique`;
CREATE TABLE `poidshistorique` (
  `iduser` int(11) NOT NULL,
  `idpoids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poidshistorique`
--
ALTER TABLE `poidshistorique`
  ADD KEY `Constraint_poidH_user` (`iduser`),
  ADD KEY `Constraint_poidH_poids` (`idpoids`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `poidshistorique`
--
ALTER TABLE `poidshistorique`
  ADD CONSTRAINT `Constraint_poidH_poids` FOREIGN KEY (`idpoids`) REFERENCES `poids` (`idpoids`),
  ADD CONSTRAINT `Constraint_poidH_user` FOREIGN KEY (`iduser`) REFERENCES `utilisateur` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
