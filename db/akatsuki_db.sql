-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 03:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akatsuki_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--
DROP DATABASE IF EXISTS `akatsuki_db`;
CREATE DATABASE IF NOT EXISTS `akatsuki_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `akatsuki_db`;


CREATE TABLE `catalogue` (
  `idCatalogue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cataloguelist`
--

CREATE TABLE `cataloguelist` (
  `idcatalogue` int(11) NOT NULL,
  `idexercicecatalogue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE `connexion` (
  `idutilisateur` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`idutilisateur`, `status`, `email`, `password`) VALUES
(1, 1, 'test@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `contenu`
--

CREATE TABLE `contenu` (
  `idcontenu` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `entrainement`
--

CREATE TABLE `entrainement` (
  `identrainement` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `entrainementcontenu`
--

CREATE TABLE `entrainementcontenu` (
  `idcontenu` int(11) NOT NULL,
  `identrainement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `entrainementexercice`
--

CREATE TABLE `entrainementexercice` (
  `identrainement` int(11) NOT NULL,
  `idexercice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exercice`
--

CREATE TABLE `exercice` (
  `idexercice` int(11) NOT NULL,
  `idExerciceLibreAcces` int(11) NOT NULL,
  `poids` float NOT NULL,
  `repetitions` int(11) NOT NULL,
  `sets` int(11) NOT NULL,
  `duree` int(11) NOT NULL,
  `dureepause` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exercicecatalogue`
--

CREATE TABLE `exercicecatalogue` (
  `idexercicecatalogue` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `image` varchar(150) NOT NULL,
  `categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `idcontenu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `nom`, `prenom`, `email`, `date_de_naissance`, `idcontenu`) VALUES
(1, 'test1', 'test', 'test@gmail.com', '2022-01-04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`idCatalogue`);

--
-- Indexes for table `cataloguelist`
--
ALTER TABLE `cataloguelist`
  ADD KEY `Constrain_idexercicecatalogue` (`idexercicecatalogue`),
  ADD KEY `Constrain_idcatalogue` (`idcatalogue`);

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Indexes for table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`idcontenu`);

--
-- Indexes for table `entrainement`
--
ALTER TABLE `entrainement`
  ADD PRIMARY KEY (`identrainement`);

--
-- Indexes for table `entrainementcontenu`
--
ALTER TABLE `entrainementcontenu`
  ADD KEY `Constrain_idcontenu` (`idcontenu`),
  ADD KEY `Constrain_identrainement` (`identrainement`);

--
-- Indexes for table `entrainementexercice`
--
ALTER TABLE `entrainementexercice`
  ADD KEY `Constrain_idexercise` (`idexercice`),
  ADD KEY `Constrain_identrainement2` (`identrainement`);

--
-- Indexes for table `exercice`
--
ALTER TABLE `exercice`
  ADD PRIMARY KEY (`idexercice`);

--
-- Indexes for table `exercicecatalogue`
--
ALTER TABLE `exercicecatalogue`
  ADD PRIMARY KEY (`idexercicecatalogue`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `Constrain_idcontenu2` (`idcontenu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `idCatalogue` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `idcontenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `entrainement`
--
ALTER TABLE `entrainement`
  MODIFY `identrainement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exercice`
--
ALTER TABLE `exercice`
  MODIFY `idexercice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exercicecatalogue`
--
ALTER TABLE `exercicecatalogue`
  MODIFY `idexercicecatalogue` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cataloguelist`
--
ALTER TABLE `cataloguelist`
  ADD CONSTRAINT `Constrain_idcatalogue` FOREIGN KEY (`idcatalogue`) REFERENCES `catalogue` (`idCatalogue`),
  ADD CONSTRAINT `Constrain_idexercicecatalogue` FOREIGN KEY (`idexercicecatalogue`) REFERENCES `exercicecatalogue` (`idexercicecatalogue`);

--
-- Constraints for table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `Constrain_iduser` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`iduser`);

--
-- Constraints for table `entrainementcontenu`
--
ALTER TABLE `entrainementcontenu`
  ADD CONSTRAINT `Constrain_idcontenu` FOREIGN KEY (`idcontenu`) REFERENCES `contenu` (`idcontenu`),
  ADD CONSTRAINT `Constrain_identrainement` FOREIGN KEY (`identrainement`) REFERENCES `entrainement` (`identrainement`);

--
-- Constraints for table `entrainementexercice`
--
ALTER TABLE `entrainementexercice`
  ADD CONSTRAINT `Constrain_identrainement2` FOREIGN KEY (`identrainement`) REFERENCES `entrainement` (`identrainement`),
  ADD CONSTRAINT `Constrain_idexercise` FOREIGN KEY (`idexercice`) REFERENCES `exercice` (`idexercice`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `Constrain_idcontenu2` FOREIGN KEY (`idcontenu`) REFERENCES `contenu` (`idcontenu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
