-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 02:54 AM
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
DROP DATABASE IF EXISTS `akatsuki_db`;
CREATE DATABASE IF NOT EXISTS `akatsuki_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `akatsuki_db`;
-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `idcategorie` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`idcategorie`, `nom`) VALUES
(1, 'pectoraux'),
(2, 'triceps'),
(3, 'biceps');

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
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
(1, 1, 'test@gmail.com', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `contenu`
--

DROP TABLE IF EXISTS `contenu`;
CREATE TABLE `contenu` (
  `idcontenu` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contenu`
--

INSERT INTO `contenu` (`idcontenu`, `iduser`, `nom`) VALUES
(1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entrainement`
--

DROP TABLE IF EXISTS `entrainement`;
CREATE TABLE `entrainement` (
  `identrainement` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entrainement`
--

INSERT INTO `entrainement` (`identrainement`, `nom`) VALUES
(1, 'Entrainemnt du lundi'),
(2, 'Entrainemnt du lundi');

-- --------------------------------------------------------

--
-- Table structure for table `entrainementcontenu`
--

DROP TABLE IF EXISTS `entrainementcontenu`;
CREATE TABLE `entrainementcontenu` (
  `idcontenu` int(11) NOT NULL,
  `identrainement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entrainementcontenu`
--

INSERT INTO `entrainementcontenu` (`idcontenu`, `identrainement`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `entrainementexercice`
--

DROP TABLE IF EXISTS `entrainementexercice`;
CREATE TABLE `entrainementexercice` (
  `identrainement` int(11) NOT NULL,
  `idexercice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entrainementexercice`
--

INSERT INTO `entrainementexercice` (`identrainement`, `idexercice`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `exercice`
--

DROP TABLE IF EXISTS `exercice`;
CREATE TABLE `exercice` (
  `idexercice` int(11) NOT NULL,
  `idexercicecatalogue` int(11) NOT NULL,
  `poids` float NOT NULL,
  `repetitions` int(11) NOT NULL,
  `sets` int(11) NOT NULL,
  `duree` int(11) NOT NULL,
  `dureepause` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercice`
--

INSERT INTO `exercice` (`idexercice`, `idexercicecatalogue`, `poids`, `repetitions`, `sets`, `duree`, `dureepause`) VALUES
(1, 1, 100, 6, 3, 0, 60),
(2, 2, 100, 6, 3, 0, 60);

-- --------------------------------------------------------

--
-- Table structure for table `exercicecatalogue`
--

DROP TABLE IF EXISTS `exercicecatalogue`;
CREATE TABLE `exercicecatalogue` (
  `idexercicecatalogue` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `image` varchar(150) NOT NULL,
  `idcategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercicecatalogue`
--

INSERT INTO `exercicecatalogue` (`idexercicecatalogue`, `nom`, `image`, `idcategorie`) VALUES
(1, 'tirage à la poulie vertical', '', 3),
(2, 'exercise pec', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `poids` float DEFAULT NULL,
  `datedebutabonnement` date DEFAULT NULL,
  `datefinabonnement` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `nom`, `prenom`, `email`, `date_de_naissance`, `poids`, `datedebutabonnement`, `datefinabonnement`) VALUES
(1, 'test', 'test', 'test@gmail.com', '2011-01-01', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idcategorie`);

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Indexes for table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`idcontenu`),
  ADD KEY `Constrain_idcontUser` (`iduser`);

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
  ADD PRIMARY KEY (`idexercicecatalogue`),
  ADD KEY `Constraint_exerciceCat_categorie` (`idcategorie`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `idcontenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `entrainement`
--
ALTER TABLE `entrainement`
  MODIFY `identrainement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exercice`
--
ALTER TABLE `exercice`
  MODIFY `idexercice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exercicecatalogue`
--
ALTER TABLE `exercicecatalogue`
  MODIFY `idexercicecatalogue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `Constrain_iduser` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`iduser`);

--
-- Constraints for table `contenu`
--
ALTER TABLE `contenu`
  ADD CONSTRAINT `Constrain_idcontUser` FOREIGN KEY (`iduser`) REFERENCES `utilisateur` (`iduser`);

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
-- Constraints for table `exercicecatalogue`
--
ALTER TABLE `exercicecatalogue`
  ADD CONSTRAINT `Constraint_exerciceCat_categorie` FOREIGN KEY (`idcategorie`) REFERENCES `categories` (`idcategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
