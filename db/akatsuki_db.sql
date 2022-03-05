-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 04 mars 2022 à 03:35
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `akatsuki_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--
DROP DATABASE IF EXISTS `akatsuki_db`;
CREATE DATABASE IF NOT EXISTS `akatsuki_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `akatsuki_db`;

CREATE TABLE `blog` (
  `idblog` int(11) NOT NULL,
  `idcategorie` int(11) NOT NULL,
  `imageID` int(11) DEFAULT NULL,
  `titre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `auteur` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `couleur` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`idblog`, `idcategorie`, `imageID`, `titre`, `description`, `date`, `auteur`, `couleur`) VALUES
(1, 1, 1, 'Combien de fois par semaine s\'entrainné?', 'La question que tout le monde se pose et dont la réponse qui demotive. Voici quelques astuces et rappels pour commencer ses entrainements', '2022-02-16', 'Jorgen Klopp', '#c9c859'),
(2, 1, 2, 'Comment bien s\'entrainer ?', 'Plusieurs se lancent à l\'entrainement sans vraiment savoir quoi faire, et cela suffit pour perdre sa motivation', '2022-03-16', 'Cristiano Ronaldo', '#b80f0f'),
(3, 4, 3, 'Bien performer en gymnase', 'Comment se trouver une routine pour instaurer de bonnes habitudes et une bonne éthique de travail dans le gymnase', '2022-03-01', 'Karim Benzema', '#110bd6'),
(4, 3, 4, 'Comment ne pas tomber en dépression à cause de la covid', 'La covid tue des vies mais tues aussi notre motivation. Ce texte vous motivera à passer outre les difficultés que la COVID vous impose.', '2022-01-13', 'Bojan Krkic', '#110bd6'),
(5, 6, 5, 'Le GOAT de tout les temps ?', 'Ronaldo et Messi sont sur les lévres de tout amateur de football dans le monde. Mais qui est vraiment le meilleur des deux ?', '2021-12-22', 'Angel Di Maria', '#59a2c9');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idcategorie` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idcategorie`, `nom`) VALUES
(1, 'pectoraux'),
(2, 'triceps'),
(3, 'biceps'),
(4, 'abs'),
(5, 'quads'),
(6, 'lats'),
(7, 'calves'),
(8, 'pectorals'),
(9, 'glutes'),
(10, 'hamstrings'),
(11, 'adductors'),
(12, 'cardiovascular system'),
(13, 'spine'),
(14, 'upper back'),
(15, 'delts'),
(16, 'forearms'),
(17, 'traps'),
(18, 'serratus anterior'),
(19, 'abductors'),
(20, 'levator scapulae');

-- --------------------------------------------------------

--
-- Structure de la table `categoriesblog`
--

CREATE TABLE `categoriesblog` (
  `idcategorie` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categoriesblog`
--

INSERT INTO `categoriesblog` (`idcategorie`, `nom`) VALUES
(1, 'Entrainement'),
(2, 'Cardio'),
(3, 'COVID'),
(4, 'Gymnase'),
(5, 'Santé'),
(6, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `categoriesproduit`
--

CREATE TABLE `categoriesproduit` (
  `idcategorie` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categoriesproduit`
--

INSERT INTO `categoriesproduit` (`idcategorie`, `nom`) VALUES
(1, 'Bar'),
(2, 'Protéine');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `idutilisateur` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`idutilisateur`, `status`, `email`, `password`) VALUES
(1, 1, 'test@gmail.com', '0123456789'),
(2, 1, 'a@a', '0123456789');

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `idcontenu` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contenu`
--

INSERT INTO `contenu` (`idcontenu`, `iduser`, `nom`) VALUES
(1, 1, NULL),
(2, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

CREATE TABLE `entrainement` (
  `identrainement` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `difficulte` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entrainement`
--

INSERT INTO `entrainement` (`identrainement`, `nom`, `status`, `type`, `difficulte`) VALUES
(1, 'Par defaut01', 0, 'Bas du corp', '1'),
(2, 'Par defaut02', 0, 'haut1 du corp', '1'),
(3, 'Par defaut01', 0, 'Bas du corp', '1'),
(4, 'Par defaut02', 0, 'haut1 du corp', '1'),
(5, 'Entrainement Lundi', 1, 'haut1 du corp', 'dificile'),
(6, 'Entrainement Mardi', 2, 'haut1 du corp', 'dificile'),
(7, 'Entrainement Mercredi', 0, 'haut1 du corp', 'dificile');

-- --------------------------------------------------------

--
-- Structure de la table `entrainementcontenu`
--

CREATE TABLE `entrainementcontenu` (
  `idcontenu` int(11) NOT NULL,
  `identrainement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entrainementcontenu`
--

INSERT INTO `entrainementcontenu` (`idcontenu`, `identrainement`) VALUES
(1, 1),
(1, 2),
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `entrainementexercice`
--

CREATE TABLE `entrainementexercice` (
  `identrainement` int(11) NOT NULL,
  `idexercice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entrainementexercice`
--

INSERT INTO `entrainementexercice` (`identrainement`, `idexercice`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `exercice`
--

CREATE TABLE `exercice` (
  `idexercice` int(11) NOT NULL,
  `idexercicecatalogue` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `poids` float NOT NULL,
  `repetitions` int(11) NOT NULL,
  `sets` int(11) NOT NULL,
  `duree` int(11) NOT NULL,
  `dureepause` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `exercice`
--

INSERT INTO `exercice` (`idexercice`, `idexercicecatalogue`, `status`, `poids`, `repetitions`, `sets`, `duree`, `dureepause`) VALUES
(1, 2, 0, 50, 5, 2, 0, 60),
(2, 2, 0, 50, 5, 2, 0, 60),
(3, 2, 0, 50, 5, 2, 0, 60),
(4, 2, 0, 50, 5, 2, 0, 60);

-- --------------------------------------------------------

--
-- Structure de la table `exercicecatalogue`
--

CREATE TABLE `exercicecatalogue` (
  `idexercicecatalogue` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `image` varchar(150) NOT NULL,
  `idcategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `exercicecatalogue`
--

INSERT INTO `exercicecatalogue` (`idexercicecatalogue`, `nom`, `image`, `idcategorie`) VALUES
(1, 'tirage à la poulie vertical', '', 3),
(2, 'exercise pec', '', 1),
(3, '3/4 sit-up', 'http://d205bpvrqc9yn1.cloudfront.net/0001.gif', 4),
(4, '45° side bend', 'http://d205bpvrqc9yn1.cloudfront.net/0002.gif', 4),
(5, 'air bike', 'http://d205bpvrqc9yn1.cloudfront.net/0003.gif', 4),
(6, 'all fours squad stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1512.gif', 5),
(7, 'alternate heel touchers', 'http://d205bpvrqc9yn1.cloudfront.net/0006.gif', 4),
(8, 'alternate lateral pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0007.gif', 6),
(9, 'ankle circles', 'http://d205bpvrqc9yn1.cloudfront.net/1368.gif', 7),
(10, 'archer pull up', 'http://d205bpvrqc9yn1.cloudfront.net/3293.gif', 6),
(11, 'archer push up', 'http://d205bpvrqc9yn1.cloudfront.net/3294.gif', 8),
(12, 'arm slingers hanging bent knee legs', 'http://d205bpvrqc9yn1.cloudfront.net/2355.gif', 4),
(13, 'arm slingers hanging straight legs', 'http://d205bpvrqc9yn1.cloudfront.net/2333.gif', 4),
(14, 'arms apart circular toe touch (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3214.gif', 9),
(15, 'arms overhead full sit-up (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3204.gif', 4),
(16, 'assisted chest dip (kneeling)', 'http://d205bpvrqc9yn1.cloudfront.net/0009.gif', 8),
(17, 'assisted hanging knee raise', 'http://d205bpvrqc9yn1.cloudfront.net/0011.gif', 4),
(18, 'assisted hanging knee raise with throw down', 'http://d205bpvrqc9yn1.cloudfront.net/0010.gif', 4),
(19, 'assisted lying calves stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1708.gif', 7),
(20, 'assisted lying glutes stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1709.gif', 9),
(21, 'assisted lying gluteus and piriformis stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1710.gif', 9),
(22, 'assisted lying leg raise with lateral throw down', 'http://d205bpvrqc9yn1.cloudfront.net/0012.gif', 4),
(23, 'assisted lying leg raise with throw down', 'http://d205bpvrqc9yn1.cloudfront.net/0013.gif', 4),
(24, 'assisted motion russian twist', 'http://d205bpvrqc9yn1.cloudfront.net/0014.gif', 4),
(25, 'assisted parallel close grip pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/0015.gif', 6),
(26, 'assisted prone hamstring', 'http://d205bpvrqc9yn1.cloudfront.net/0016.gif', 10),
(27, 'assisted prone lying quads stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1713.gif', 5),
(28, 'assisted prone rectus femoris stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1714.gif', 4),
(29, 'assisted pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/0017.gif', 6),
(30, 'assisted seated pectoralis major stretch with stab', 'http://d205bpvrqc9yn1.cloudfront.net/1716.gif', 8),
(31, 'assisted side lying adductor stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1712.gif', 11),
(32, 'assisted sit-up', 'http://d205bpvrqc9yn1.cloudfront.net/1758.gif', 4),
(33, 'assisted standing chin-up', 'http://d205bpvrqc9yn1.cloudfront.net/1431.gif', 6),
(34, 'assisted standing pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/1432.gif', 6),
(35, 'assisted standing triceps extension (with towel)', 'http://d205bpvrqc9yn1.cloudfront.net/0018.gif', 2),
(36, 'assisted triceps dip (kneeling)', 'http://d205bpvrqc9yn1.cloudfront.net/0019.gif', 2),
(37, 'assisted wide-grip chest dip (kneeling)', 'http://d205bpvrqc9yn1.cloudfront.net/2364.gif', 8),
(38, 'astride jumps (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3220.gif', 12),
(39, 'back and forth step', 'http://d205bpvrqc9yn1.cloudfront.net/3672.gif', 12),
(40, 'back extension on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1314.gif', 13),
(41, 'back lever', 'http://d205bpvrqc9yn1.cloudfront.net/3297.gif', 14),
(42, 'back pec stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1405.gif', 6),
(43, 'backward jump', 'http://d205bpvrqc9yn1.cloudfront.net/1473.gif', 5),
(44, 'balance board', 'http://d205bpvrqc9yn1.cloudfront.net/0020.gif', 5),
(45, 'band alternating biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/0968.gif', 3),
(46, 'band alternating v-up', 'http://d205bpvrqc9yn1.cloudfront.net/0969.gif', 4),
(47, 'band assisted pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/0970.gif', 6),
(48, 'band assisted wheel rollerout', 'http://d205bpvrqc9yn1.cloudfront.net/0971.gif', 4),
(49, 'band bench press', 'http://d205bpvrqc9yn1.cloudfront.net/1254.gif', 8),
(50, 'band bent-over hip extension', 'http://d205bpvrqc9yn1.cloudfront.net/0980.gif', 9),
(51, 'band bicycle crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0972.gif', 4),
(52, 'band close-grip pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0974.gif', 6),
(53, 'band close-grip push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0975.gif', 2),
(54, 'band concentration curl', 'http://d205bpvrqc9yn1.cloudfront.net/0976.gif', 3),
(55, 'band fixed back close grip pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/3117.gif', 6),
(56, 'band fixed back underhand pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/3116.gif', 6),
(57, 'band front lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0977.gif', 15),
(58, 'band front raise', 'http://d205bpvrqc9yn1.cloudfront.net/0978.gif', 15),
(59, 'band hip lift', 'http://d205bpvrqc9yn1.cloudfront.net/1408.gif', 9),
(60, 'band horizontal pallof press', 'http://d205bpvrqc9yn1.cloudfront.net/0979.gif', 4),
(61, 'band jack knife sit-up', 'http://d205bpvrqc9yn1.cloudfront.net/0981.gif', 4),
(62, 'band kneeling one arm pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0983.gif', 6),
(63, 'band kneeling twisting crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0985.gif', 4),
(64, 'band lying hip internal rotation', 'http://d205bpvrqc9yn1.cloudfront.net/0984.gif', 9),
(65, 'band lying straight leg raise', 'http://d205bpvrqc9yn1.cloudfront.net/1002.gif', 4),
(66, 'band one arm overhead biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/0986.gif', 3),
(67, 'band one arm single leg split squat', 'http://d205bpvrqc9yn1.cloudfront.net/0987.gif', 5),
(68, 'band one arm standing low row', 'http://d205bpvrqc9yn1.cloudfront.net/0988.gif', 14),
(69, 'band one arm twisting chest press', 'http://d205bpvrqc9yn1.cloudfront.net/0989.gif', 8),
(70, 'band one arm twisting seated row', 'http://d205bpvrqc9yn1.cloudfront.net/0990.gif', 14),
(71, 'band pull through', 'http://d205bpvrqc9yn1.cloudfront.net/0991.gif', 9),
(72, 'band push sit-up', 'http://d205bpvrqc9yn1.cloudfront.net/0992.gif', 4),
(73, 'band reverse fly', 'http://d205bpvrqc9yn1.cloudfront.net/0993.gif', 15),
(74, 'band reverse wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0994.gif', 16),
(75, 'band seated hip internal rotation', 'http://d205bpvrqc9yn1.cloudfront.net/0996.gif', 9),
(76, 'band seated twist', 'http://d205bpvrqc9yn1.cloudfront.net/1011.gif', 4),
(77, 'band shoulder press', 'http://d205bpvrqc9yn1.cloudfront.net/0997.gif', 15),
(78, 'band shrug', 'http://d205bpvrqc9yn1.cloudfront.net/1018.gif', 17),
(79, 'band side triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0998.gif', 2),
(80, 'band single leg calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0999.gif', 7),
(81, 'band single leg reverse calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1000.gif', 7),
(82, 'band single leg split squat', 'http://d205bpvrqc9yn1.cloudfront.net/1001.gif', 5),
(83, 'band squat', 'http://d205bpvrqc9yn1.cloudfront.net/1004.gif', 9),
(84, 'band squat row', 'http://d205bpvrqc9yn1.cloudfront.net/1003.gif', 9),
(85, 'band standing crunch', 'http://d205bpvrqc9yn1.cloudfront.net/1005.gif', 4),
(86, 'band standing rear delt row', 'http://d205bpvrqc9yn1.cloudfront.net/1022.gif', 15),
(87, 'band standing twisting crunch', 'http://d205bpvrqc9yn1.cloudfront.net/1007.gif', 4),
(88, 'band step-up', 'http://d205bpvrqc9yn1.cloudfront.net/1008.gif', 9),
(89, 'band stiff leg deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/1009.gif', 9),
(90, 'band straight back stiff leg deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/1023.gif', 9),
(91, 'band straight leg deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/1010.gif', 13),
(92, 'band twisting overhead press', 'http://d205bpvrqc9yn1.cloudfront.net/1012.gif', 15),
(93, 'band two legs calf raise - (band under both legs) ', 'http://d205bpvrqc9yn1.cloudfront.net/1369.gif', 7),
(94, 'band underhand pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/1013.gif', 6),
(95, 'band v-up', 'http://d205bpvrqc9yn1.cloudfront.net/1014.gif', 4),
(96, 'band vertical pallof press', 'http://d205bpvrqc9yn1.cloudfront.net/1015.gif', 4),
(97, 'band wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/1016.gif', 16),
(98, 'band y-raise', 'http://d205bpvrqc9yn1.cloudfront.net/1017.gif', 15),
(99, 'barbell alternate biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/0023.gif', 3),
(100, 'barbell bench front squat', 'http://d205bpvrqc9yn1.cloudfront.net/0024.gif', 5),
(101, 'barbell bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0025.gif', 8),
(102, 'barbell bench squat', 'http://d205bpvrqc9yn1.cloudfront.net/0026.gif', 5),
(103, 'barbell bent arm pullover', 'http://d205bpvrqc9yn1.cloudfront.net/1316.gif', 6),
(104, 'barbell bent over row', 'http://d205bpvrqc9yn1.cloudfront.net/0027.gif', 14),
(105, 'barbell biceps curl (with arm blaster)', 'http://d205bpvrqc9yn1.cloudfront.net/2407.gif', 3),
(106, 'barbell clean and press', 'http://d205bpvrqc9yn1.cloudfront.net/0028.gif', 5),
(107, 'barbell clean-grip front squat', 'http://d205bpvrqc9yn1.cloudfront.net/0029.gif', 9),
(108, 'barbell close-grip bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0030.gif', 2),
(109, 'barbell curl', 'http://d205bpvrqc9yn1.cloudfront.net/0031.gif', 3),
(110, 'barbell deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/0032.gif', 9),
(111, 'barbell decline bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0033.gif', 8),
(112, 'barbell decline bent arm pullover', 'http://d205bpvrqc9yn1.cloudfront.net/0034.gif', 6),
(113, 'barbell decline close grip to skull press', 'http://d205bpvrqc9yn1.cloudfront.net/0035.gif', 2),
(114, 'barbell decline pullover', 'http://d205bpvrqc9yn1.cloudfront.net/1255.gif', 8),
(115, 'barbell decline wide-grip press', 'http://d205bpvrqc9yn1.cloudfront.net/0036.gif', 8),
(116, 'barbell decline wide-grip pullover', 'http://d205bpvrqc9yn1.cloudfront.net/0037.gif', 6),
(117, 'barbell drag curl', 'http://d205bpvrqc9yn1.cloudfront.net/0038.gif', 3),
(118, 'barbell floor calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1370.gif', 7),
(119, 'barbell front chest squat', 'http://d205bpvrqc9yn1.cloudfront.net/0039.gif', 9),
(120, 'barbell front raise', 'http://d205bpvrqc9yn1.cloudfront.net/0041.gif', 15),
(121, 'barbell front raise and pullover', 'http://d205bpvrqc9yn1.cloudfront.net/0040.gif', 8),
(122, 'barbell front squat', 'http://d205bpvrqc9yn1.cloudfront.net/0042.gif', 9),
(123, 'barbell full squat', 'http://d205bpvrqc9yn1.cloudfront.net/0043.gif', 9),
(124, 'barbell full squat (back pov)', 'http://d205bpvrqc9yn1.cloudfront.net/1461.gif', 9),
(125, 'barbell full squat (side pov)', 'http://d205bpvrqc9yn1.cloudfront.net/1462.gif', 9),
(126, 'barbell full zercher squat', 'http://d205bpvrqc9yn1.cloudfront.net/1545.gif', 9),
(127, 'barbell glute bridge', 'http://d205bpvrqc9yn1.cloudfront.net/1409.gif', 9),
(128, 'barbell glute bridge two legs on bench (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3562.gif', 9),
(129, 'barbell good morning', 'http://d205bpvrqc9yn1.cloudfront.net/0044.gif', 10),
(130, 'barbell guillotine bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0045.gif', 8),
(131, 'barbell hack squat', 'http://d205bpvrqc9yn1.cloudfront.net/0046.gif', 9),
(132, 'barbell high bar squat', 'http://d205bpvrqc9yn1.cloudfront.net/1436.gif', 9),
(133, 'barbell incline bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0047.gif', 8),
(134, 'barbell incline close grip bench press', 'http://d205bpvrqc9yn1.cloudfront.net/1719.gif', 2),
(135, 'barbell incline reverse-grip press', 'http://d205bpvrqc9yn1.cloudfront.net/0048.gif', 2),
(136, 'barbell incline row', 'http://d205bpvrqc9yn1.cloudfront.net/0049.gif', 14),
(137, 'barbell incline shoulder raise', 'http://d205bpvrqc9yn1.cloudfront.net/0050.gif', 18),
(138, 'barbell jefferson squat', 'http://d205bpvrqc9yn1.cloudfront.net/0051.gif', 9),
(139, 'barbell jm bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0052.gif', 2),
(140, 'barbell jump squat', 'http://d205bpvrqc9yn1.cloudfront.net/0053.gif', 9),
(141, 'barbell lateral lunge', 'http://d205bpvrqc9yn1.cloudfront.net/1410.gif', 9),
(142, 'barbell low bar squat', 'http://d205bpvrqc9yn1.cloudfront.net/1435.gif', 9),
(143, 'barbell lunge', 'http://d205bpvrqc9yn1.cloudfront.net/0054.gif', 9),
(144, 'barbell lying back of the head tricep extension', 'http://d205bpvrqc9yn1.cloudfront.net/1720.gif', 2),
(145, 'barbell lying close-grip press', 'http://d205bpvrqc9yn1.cloudfront.net/0055.gif', 2),
(146, 'barbell lying close-grip triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0056.gif', 2),
(147, 'barbell lying extension', 'http://d205bpvrqc9yn1.cloudfront.net/0057.gif', 2),
(148, 'barbell lying lifting (on hip)', 'http://d205bpvrqc9yn1.cloudfront.net/0058.gif', 9),
(149, 'barbell lying preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/0059.gif', 3),
(150, 'barbell lying triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0061.gif', 2),
(151, 'barbell lying triceps extension skull crusher', 'http://d205bpvrqc9yn1.cloudfront.net/0060.gif', 2),
(152, 'barbell narrow stance squat', 'http://d205bpvrqc9yn1.cloudfront.net/0063.gif', 9),
(153, 'barbell one arm bent over row', 'http://d205bpvrqc9yn1.cloudfront.net/0064.gif', 14),
(154, 'barbell one arm floor press', 'http://d205bpvrqc9yn1.cloudfront.net/0065.gif', 2),
(155, 'barbell one arm side deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/0066.gif', 9),
(156, 'barbell one arm snatch', 'http://d205bpvrqc9yn1.cloudfront.net/0067.gif', 15),
(157, 'barbell one leg squat', 'http://d205bpvrqc9yn1.cloudfront.net/0068.gif', 5),
(158, 'barbell overhead squat', 'http://d205bpvrqc9yn1.cloudfront.net/0069.gif', 5),
(159, 'barbell palms down wrist curl over a bench', 'http://d205bpvrqc9yn1.cloudfront.net/1411.gif', 16),
(160, 'barbell palms up wrist curl over a bench', 'http://d205bpvrqc9yn1.cloudfront.net/1412.gif', 16),
(161, 'barbell pendlay row', 'http://d205bpvrqc9yn1.cloudfront.net/3017.gif', 14),
(162, 'barbell pin presses', 'http://d205bpvrqc9yn1.cloudfront.net/1751.gif', 2),
(163, 'barbell preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/0070.gif', 3),
(164, 'barbell press sit-up', 'http://d205bpvrqc9yn1.cloudfront.net/0071.gif', 4),
(165, 'barbell prone incline curl', 'http://d205bpvrqc9yn1.cloudfront.net/0072.gif', 3),
(166, 'barbell pullover', 'http://d205bpvrqc9yn1.cloudfront.net/0073.gif', 6),
(167, 'barbell pullover to press', 'http://d205bpvrqc9yn1.cloudfront.net/0022.gif', 6),
(168, 'barbell rack pull', 'http://d205bpvrqc9yn1.cloudfront.net/0074.gif', 9),
(169, 'barbell rear delt raise', 'http://d205bpvrqc9yn1.cloudfront.net/0075.gif', 15),
(170, 'barbell rear delt row', 'http://d205bpvrqc9yn1.cloudfront.net/0076.gif', 15),
(171, 'barbell rear lunge', 'http://d205bpvrqc9yn1.cloudfront.net/0078.gif', 9),
(172, 'barbell rear lunge v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0077.gif', 9),
(173, 'barbell revers wrist curl v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0079.gif', 16),
(174, 'barbell reverse close-grip bench press', 'http://d205bpvrqc9yn1.cloudfront.net/2187.gif', 2),
(175, 'barbell reverse curl', 'http://d205bpvrqc9yn1.cloudfront.net/0080.gif', 3),
(176, 'barbell reverse grip bent over row', 'http://d205bpvrqc9yn1.cloudfront.net/0118.gif', 14),
(177, 'barbell reverse grip decline bench press', 'http://d205bpvrqc9yn1.cloudfront.net/1256.gif', 8),
(178, 'barbell reverse grip incline bench press', 'http://d205bpvrqc9yn1.cloudfront.net/1257.gif', 8),
(179, 'barbell reverse grip incline bench row', 'http://d205bpvrqc9yn1.cloudfront.net/1317.gif', 14),
(180, 'barbell reverse grip skullcrusher', 'http://d205bpvrqc9yn1.cloudfront.net/1721.gif', 2),
(181, 'barbell reverse preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/0081.gif', 3),
(182, 'barbell reverse wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0082.gif', 16),
(183, 'barbell rollerout', 'http://d205bpvrqc9yn1.cloudfront.net/0084.gif', 4),
(184, 'barbell rollerout from bench', 'http://d205bpvrqc9yn1.cloudfront.net/0083.gif', 4),
(185, 'barbell romanian deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/0085.gif', 9),
(186, 'barbell seated behind head military press', 'http://d205bpvrqc9yn1.cloudfront.net/0086.gif', 15),
(187, 'barbell seated bradford rocky press', 'http://d205bpvrqc9yn1.cloudfront.net/0087.gif', 15),
(188, 'barbell seated calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0088.gif', 7),
(189, 'barbell seated calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1371.gif', 7),
(190, 'barbell seated close grip behind neck triceps exte', 'http://d205bpvrqc9yn1.cloudfront.net/1718.gif', 2),
(191, 'barbell seated close-grip concentration curl', 'http://d205bpvrqc9yn1.cloudfront.net/0089.gif', 3),
(192, 'barbell seated good morning', 'http://d205bpvrqc9yn1.cloudfront.net/0090.gif', 9),
(193, 'barbell seated overhead press', 'http://d205bpvrqc9yn1.cloudfront.net/0091.gif', 15),
(194, 'barbell seated overhead triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0092.gif', 2),
(195, 'barbell seated twist', 'http://d205bpvrqc9yn1.cloudfront.net/0094.gif', 4),
(196, 'barbell shrug', 'http://d205bpvrqc9yn1.cloudfront.net/0095.gif', 17),
(197, 'barbell side bent v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0096.gif', 4),
(198, 'barbell side split squat', 'http://d205bpvrqc9yn1.cloudfront.net/0098.gif', 5),
(199, 'barbell side split squat v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0097.gif', 5),
(200, 'barbell single leg deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/1756.gif', 9),
(201, 'barbell single leg split squat', 'http://d205bpvrqc9yn1.cloudfront.net/0099.gif', 5),
(202, 'barbell sitted alternate leg raise', 'http://d205bpvrqc9yn1.cloudfront.net/2799.gif', 4),
(203, 'barbell sitted alternate leg raise (female)', 'http://d205bpvrqc9yn1.cloudfront.net/2800.gif', 4),
(204, 'barbell skier', 'http://d205bpvrqc9yn1.cloudfront.net/0100.gif', 15),
(205, 'barbell speed squat', 'http://d205bpvrqc9yn1.cloudfront.net/0101.gif', 9),
(206, 'barbell split squat v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/2810.gif', 5),
(207, 'barbell squat (on knees)', 'http://d205bpvrqc9yn1.cloudfront.net/0102.gif', 5),
(208, 'barbell squat jump step rear lunge', 'http://d205bpvrqc9yn1.cloudfront.net/2798.gif', 5),
(209, 'barbell standing ab rollerout', 'http://d205bpvrqc9yn1.cloudfront.net/0103.gif', 4),
(210, 'barbell standing back wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0104.gif', 16),
(211, 'barbell standing bradford press', 'http://d205bpvrqc9yn1.cloudfront.net/0105.gif', 15),
(212, 'barbell standing calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1372.gif', 7),
(213, 'barbell standing close grip curl', 'http://d205bpvrqc9yn1.cloudfront.net/0106.gif', 3),
(214, 'barbell standing close grip military press', 'http://d205bpvrqc9yn1.cloudfront.net/1456.gif', 15),
(215, 'barbell standing concentration curl', 'http://d205bpvrqc9yn1.cloudfront.net/2414.gif', 3),
(216, 'barbell standing front raise over head', 'http://d205bpvrqc9yn1.cloudfront.net/0107.gif', 15),
(217, 'barbell standing leg calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0108.gif', 7),
(218, 'barbell standing overhead triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0109.gif', 2),
(219, 'barbell standing reverse grip curl', 'http://d205bpvrqc9yn1.cloudfront.net/0110.gif', 3),
(220, 'barbell standing rocking leg calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0111.gif', 7),
(221, 'barbell standing twist', 'http://d205bpvrqc9yn1.cloudfront.net/0112.gif', 4),
(222, 'barbell standing wide grip biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/1629.gif', 3),
(223, 'barbell standing wide military press', 'http://d205bpvrqc9yn1.cloudfront.net/1457.gif', 15),
(224, 'barbell standing wide-grip curl', 'http://d205bpvrqc9yn1.cloudfront.net/0113.gif', 3),
(225, 'barbell step-up', 'http://d205bpvrqc9yn1.cloudfront.net/0114.gif', 9),
(226, 'barbell stiff leg good morning', 'http://d205bpvrqc9yn1.cloudfront.net/0115.gif', 9),
(227, 'barbell straight leg deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/0116.gif', 10),
(228, 'barbell sumo deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/0117.gif', 9),
(229, 'barbell thruster', 'http://d205bpvrqc9yn1.cloudfront.net/3305.gif', 15),
(230, 'barbell upright row', 'http://d205bpvrqc9yn1.cloudfront.net/0120.gif', 15),
(231, 'barbell upright row v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0119.gif', 15),
(232, 'barbell upright row v. 3', 'http://d205bpvrqc9yn1.cloudfront.net/0121.gif', 15),
(233, 'barbell wide bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0122.gif', 8),
(234, 'barbell wide reverse grip bench press', 'http://d205bpvrqc9yn1.cloudfront.net/1258.gif', 8),
(235, 'barbell wide squat', 'http://d205bpvrqc9yn1.cloudfront.net/0124.gif', 5),
(236, 'barbell wide-grip upright row', 'http://d205bpvrqc9yn1.cloudfront.net/0123.gif', 15),
(237, 'barbell wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0126.gif', 16),
(238, 'barbell wrist curl v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0125.gif', 16),
(239, 'barbell zercher squat', 'http://d205bpvrqc9yn1.cloudfront.net/0127.gif', 9),
(240, 'basic toe touch (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3212.gif', 9),
(241, 'battling ropes', 'http://d205bpvrqc9yn1.cloudfront.net/0128.gif', 15),
(242, 'bear crawl', 'http://d205bpvrqc9yn1.cloudfront.net/3360.gif', 12),
(243, 'behind head chest stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1259.gif', 8),
(244, 'bench dip (knees bent)', 'http://d205bpvrqc9yn1.cloudfront.net/0129.gif', 2),
(245, 'bench dip on floor', 'http://d205bpvrqc9yn1.cloudfront.net/1399.gif', 2),
(246, 'bench hip extension', 'http://d205bpvrqc9yn1.cloudfront.net/0130.gif', 9),
(247, 'bench pull-ups', 'http://d205bpvrqc9yn1.cloudfront.net/3019.gif', 6),
(248, 'bent knee lying twist (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3639.gif', 9),
(249, 'biceps leg concentration curl', 'http://d205bpvrqc9yn1.cloudfront.net/1770.gif', 3),
(250, 'biceps narrow pull-ups', 'http://d205bpvrqc9yn1.cloudfront.net/0139.gif', 3),
(251, 'biceps pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/0140.gif', 3),
(252, 'body-up', 'http://d205bpvrqc9yn1.cloudfront.net/0137.gif', 2),
(253, 'bodyweight drop jump squat', 'http://d205bpvrqc9yn1.cloudfront.net/3543.gif', 9),
(254, 'bodyweight incline side plank', 'http://d205bpvrqc9yn1.cloudfront.net/3544.gif', 4),
(255, 'bodyweight kneeling triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/1771.gif', 2),
(256, 'bodyweight side lying biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/1769.gif', 3),
(257, 'bodyweight squatting row', 'http://d205bpvrqc9yn1.cloudfront.net/3168.gif', 14),
(258, 'bodyweight squatting row (with towel)', 'http://d205bpvrqc9yn1.cloudfront.net/3167.gif', 14),
(259, 'bodyweight standing calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1373.gif', 7),
(260, 'bodyweight standing close-grip one arm row', 'http://d205bpvrqc9yn1.cloudfront.net/3156.gif', 14),
(261, 'bodyweight standing close-grip row', 'http://d205bpvrqc9yn1.cloudfront.net/3158.gif', 14),
(262, 'bodyweight standing one arm row', 'http://d205bpvrqc9yn1.cloudfront.net/3162.gif', 14),
(263, 'bodyweight standing one arm row (with towel)', 'http://d205bpvrqc9yn1.cloudfront.net/3161.gif', 14),
(264, 'bodyweight standing row', 'http://d205bpvrqc9yn1.cloudfront.net/3166.gif', 14),
(265, 'bodyweight standing row (with towel)', 'http://d205bpvrqc9yn1.cloudfront.net/3165.gif', 14),
(266, 'bottoms-up', 'http://d205bpvrqc9yn1.cloudfront.net/0138.gif', 4),
(267, 'box jump down with one leg stabilization', 'http://d205bpvrqc9yn1.cloudfront.net/1374.gif', 7),
(268, 'bridge - mountain climber (cross body)', 'http://d205bpvrqc9yn1.cloudfront.net/2466.gif', 4),
(269, 'burpee', 'http://d205bpvrqc9yn1.cloudfront.net/1160.gif', 12),
(270, 'butt-ups', 'http://d205bpvrqc9yn1.cloudfront.net/0870.gif', 4),
(271, 'butterfly yoga pose', 'http://d205bpvrqc9yn1.cloudfront.net/1494.gif', 11),
(272, 'cable alternate shoulder press', 'http://d205bpvrqc9yn1.cloudfront.net/0148.gif', 15),
(273, 'cable alternate triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0149.gif', 2),
(274, 'cable assisted inverse leg curl', 'http://d205bpvrqc9yn1.cloudfront.net/3235.gif', 10),
(275, 'cable bar lateral pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0150.gif', 6),
(276, 'cable bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0151.gif', 8),
(277, 'cable close grip curl', 'http://d205bpvrqc9yn1.cloudfront.net/1630.gif', 3),
(278, 'cable concentration curl', 'http://d205bpvrqc9yn1.cloudfront.net/1631.gif', 3),
(279, 'cable concentration extension (on knee)', 'http://d205bpvrqc9yn1.cloudfront.net/0152.gif', 2),
(280, 'cable cross-over lateral pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0153.gif', 6),
(281, 'cable cross-over revers fly', 'http://d205bpvrqc9yn1.cloudfront.net/0154.gif', 15),
(282, 'cable cross-over variation', 'http://d205bpvrqc9yn1.cloudfront.net/0155.gif', 8),
(283, 'cable curl', 'http://d205bpvrqc9yn1.cloudfront.net/0868.gif', 3),
(284, 'cable deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/0157.gif', 9),
(285, 'cable decline fly', 'http://d205bpvrqc9yn1.cloudfront.net/0158.gif', 8),
(286, 'cable decline one arm press', 'http://d205bpvrqc9yn1.cloudfront.net/1260.gif', 8),
(287, 'cable decline press', 'http://d205bpvrqc9yn1.cloudfront.net/1261.gif', 8),
(288, 'cable decline seated wide-grip row', 'http://d205bpvrqc9yn1.cloudfront.net/0159.gif', 14),
(289, 'cable drag curl', 'http://d205bpvrqc9yn1.cloudfront.net/1632.gif', 3),
(290, 'cable floor seated wide-grip row', 'http://d205bpvrqc9yn1.cloudfront.net/0160.gif', 14),
(291, 'cable forward raise', 'http://d205bpvrqc9yn1.cloudfront.net/0161.gif', 15),
(292, 'cable front raise', 'http://d205bpvrqc9yn1.cloudfront.net/0162.gif', 15),
(293, 'cable front shoulder raise', 'http://d205bpvrqc9yn1.cloudfront.net/0164.gif', 15),
(294, 'cable hammer curl (with rope)', 'http://d205bpvrqc9yn1.cloudfront.net/0165.gif', 3),
(295, 'cable high pulley overhead tricep extension', 'http://d205bpvrqc9yn1.cloudfront.net/1722.gif', 2),
(296, 'cable high row (kneeling)', 'http://d205bpvrqc9yn1.cloudfront.net/0167.gif', 14),
(297, 'cable hip adduction', 'http://d205bpvrqc9yn1.cloudfront.net/0168.gif', 11),
(298, 'cable incline bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0169.gif', 8),
(299, 'cable incline bench row', 'http://d205bpvrqc9yn1.cloudfront.net/1318.gif', 14),
(300, 'cable incline fly', 'http://d205bpvrqc9yn1.cloudfront.net/0171.gif', 8),
(301, 'cable incline fly (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0170.gif', 8),
(302, 'cable incline pushdown', 'http://d205bpvrqc9yn1.cloudfront.net/0172.gif', 6),
(303, 'cable incline triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0173.gif', 2),
(304, 'cable judo flip', 'http://d205bpvrqc9yn1.cloudfront.net/0174.gif', 4),
(305, 'cable kickback', 'http://d205bpvrqc9yn1.cloudfront.net/0860.gif', 2),
(306, 'cable kneeling crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0175.gif', 4),
(307, 'cable kneeling rear delt row (with rope) (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3697.gif', 15),
(308, 'cable kneeling triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0176.gif', 2),
(309, 'cable lat pulldown full range of motion', 'http://d205bpvrqc9yn1.cloudfront.net/2330.gif', 6),
(310, 'cable lateral pulldown (with rope attachment)', 'http://d205bpvrqc9yn1.cloudfront.net/0177.gif', 6),
(311, 'cable lateral pulldown with v-bar', 'http://d205bpvrqc9yn1.cloudfront.net/2616.gif', 6),
(312, 'cable lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0178.gif', 15),
(313, 'cable low fly', 'http://d205bpvrqc9yn1.cloudfront.net/0179.gif', 8),
(314, 'cable low seated row', 'http://d205bpvrqc9yn1.cloudfront.net/0180.gif', 14),
(315, 'cable lying bicep curl', 'http://d205bpvrqc9yn1.cloudfront.net/1634.gif', 3),
(316, 'cable lying close-grip curl', 'http://d205bpvrqc9yn1.cloudfront.net/0182.gif', 3),
(317, 'cable lying extension pullover (with rope attachme', 'http://d205bpvrqc9yn1.cloudfront.net/0184.gif', 6),
(318, 'cable lying fly', 'http://d205bpvrqc9yn1.cloudfront.net/0185.gif', 8),
(319, 'cable lying triceps extension v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0186.gif', 2),
(320, 'cable middle fly', 'http://d205bpvrqc9yn1.cloudfront.net/0188.gif', 8),
(321, 'cable one arm bent over row', 'http://d205bpvrqc9yn1.cloudfront.net/0189.gif', 14),
(322, 'cable one arm curl', 'http://d205bpvrqc9yn1.cloudfront.net/0190.gif', 3),
(323, 'cable one arm decline chest fly', 'http://d205bpvrqc9yn1.cloudfront.net/1262.gif', 8),
(324, 'cable one arm fly on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1263.gif', 8),
(325, 'cable one arm incline fly on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1264.gif', 8),
(326, 'cable one arm incline press', 'http://d205bpvrqc9yn1.cloudfront.net/1265.gif', 8),
(327, 'cable one arm incline press on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1266.gif', 8),
(328, 'cable one arm lateral bent-over', 'http://d205bpvrqc9yn1.cloudfront.net/0191.gif', 8),
(329, 'cable one arm lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0192.gif', 15),
(330, 'cable one arm preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1633.gif', 3),
(331, 'cable one arm press on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1267.gif', 8),
(332, 'cable one arm pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/3563.gif', 6),
(333, 'cable one arm reverse preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1635.gif', 3),
(334, 'cable one arm straight back high row (kneeling)', 'http://d205bpvrqc9yn1.cloudfront.net/0193.gif', 14),
(335, 'cable one arm tricep pushdown', 'http://d205bpvrqc9yn1.cloudfront.net/1723.gif', 2),
(336, 'cable overhead curl', 'http://d205bpvrqc9yn1.cloudfront.net/1636.gif', 3),
(337, 'cable overhead curl on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1637.gif', 3),
(338, 'cable overhead triceps extension (rope attachment)', 'http://d205bpvrqc9yn1.cloudfront.net/0194.gif', 2),
(339, 'cable palm rotational row', 'http://d205bpvrqc9yn1.cloudfront.net/1319.gif', 14),
(340, 'cable preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/0195.gif', 3),
(341, 'cable press on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1268.gif', 8),
(342, 'cable pull through (with rope)', 'http://d205bpvrqc9yn1.cloudfront.net/0196.gif', 9),
(343, 'cable pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0198.gif', 6),
(344, 'cable pulldown (pro lat bar)', 'http://d205bpvrqc9yn1.cloudfront.net/0197.gif', 6),
(345, 'cable pulldown bicep curl', 'http://d205bpvrqc9yn1.cloudfront.net/1638.gif', 3),
(346, 'cable pushdown', 'http://d205bpvrqc9yn1.cloudfront.net/0201.gif', 2),
(347, 'cable pushdown (straight arm) v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0199.gif', 6),
(348, 'cable pushdown (with rope attachment)', 'http://d205bpvrqc9yn1.cloudfront.net/0200.gif', 2),
(349, 'cable rear delt row (stirrups)', 'http://d205bpvrqc9yn1.cloudfront.net/0202.gif', 15),
(350, 'cable rear delt row (with rope)', 'http://d205bpvrqc9yn1.cloudfront.net/0203.gif', 15),
(351, 'cable rear drive', 'http://d205bpvrqc9yn1.cloudfront.net/0204.gif', 2),
(352, 'cable rear pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0205.gif', 6),
(353, 'cable reverse crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0873.gif', 4),
(354, 'cable reverse curl', 'http://d205bpvrqc9yn1.cloudfront.net/0206.gif', 3),
(355, 'cable reverse grip triceps pushdown (sz-bar) (with', 'http://d205bpvrqc9yn1.cloudfront.net/2406.gif', 2),
(356, 'cable reverse one arm curl', 'http://d205bpvrqc9yn1.cloudfront.net/1413.gif', 3),
(357, 'cable reverse preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/0209.gif', 3),
(358, 'cable reverse wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0210.gif', 16),
(359, 'cable reverse-grip pushdown', 'http://d205bpvrqc9yn1.cloudfront.net/0207.gif', 2),
(360, 'cable reverse-grip straight back seated high row', 'http://d205bpvrqc9yn1.cloudfront.net/0208.gif', 14),
(361, 'cable rope crossover seated row', 'http://d205bpvrqc9yn1.cloudfront.net/1320.gif', 14),
(362, 'cable rope elevated seated row', 'http://d205bpvrqc9yn1.cloudfront.net/1321.gif', 14),
(363, 'cable rope extension incline bench row', 'http://d205bpvrqc9yn1.cloudfront.net/1322.gif', 14),
(364, 'cable rope hammer preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1639.gif', 3),
(365, 'cable rope high pulley overhead tricep extension', 'http://d205bpvrqc9yn1.cloudfront.net/1724.gif', 2),
(366, 'cable rope incline tricep extension', 'http://d205bpvrqc9yn1.cloudfront.net/1725.gif', 2),
(367, 'cable rope lying on floor tricep extension', 'http://d205bpvrqc9yn1.cloudfront.net/1726.gif', 2),
(368, 'cable rope one arm hammer preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1640.gif', 3),
(369, 'cable rope seated row', 'http://d205bpvrqc9yn1.cloudfront.net/1323.gif', 14),
(370, 'cable russian twists (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0211.gif', 4),
(371, 'cable seated chest press', 'http://d205bpvrqc9yn1.cloudfront.net/2144.gif', 8),
(372, 'cable seated crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0212.gif', 4),
(373, 'cable seated curl', 'http://d205bpvrqc9yn1.cloudfront.net/1641.gif', 3),
(374, 'cable seated high row (v-bar)', 'http://d205bpvrqc9yn1.cloudfront.net/0213.gif', 6),
(375, 'cable seated one arm alternate row', 'http://d205bpvrqc9yn1.cloudfront.net/0214.gif', 14),
(376, 'cable seated one arm concentration curl', 'http://d205bpvrqc9yn1.cloudfront.net/1642.gif', 3),
(377, 'cable seated overhead curl', 'http://d205bpvrqc9yn1.cloudfront.net/1643.gif', 3),
(378, 'cable seated rear lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0215.gif', 15),
(379, 'cable seated row', 'http://d205bpvrqc9yn1.cloudfront.net/0861.gif', 14),
(380, 'cable seated shoulder internal rotation', 'http://d205bpvrqc9yn1.cloudfront.net/0216.gif', 15),
(381, 'cable seated twist', 'http://d205bpvrqc9yn1.cloudfront.net/2399.gif', 4),
(382, 'cable seated wide-grip row', 'http://d205bpvrqc9yn1.cloudfront.net/0218.gif', 14),
(383, 'cable shoulder press', 'http://d205bpvrqc9yn1.cloudfront.net/0219.gif', 15),
(384, 'cable shrug', 'http://d205bpvrqc9yn1.cloudfront.net/0220.gif', 17),
(385, 'cable side bend', 'http://d205bpvrqc9yn1.cloudfront.net/0222.gif', 4),
(386, 'cable side bend crunch (bosu ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0221.gif', 4),
(387, 'cable side crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0223.gif', 4),
(388, 'cable squat row (with rope attachment)', 'http://d205bpvrqc9yn1.cloudfront.net/1717.gif', 6),
(389, 'cable squatting curl', 'http://d205bpvrqc9yn1.cloudfront.net/1644.gif', 3),
(390, 'cable standing back wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0224.gif', 16),
(391, 'cable standing calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1375.gif', 7),
(392, 'cable standing cross-over high reverse fly', 'http://d205bpvrqc9yn1.cloudfront.net/0225.gif', 15),
(393, 'cable standing crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0226.gif', 4),
(394, 'cable standing crunch (with rope attachment)', 'http://d205bpvrqc9yn1.cloudfront.net/0874.gif', 4),
(395, 'cable standing fly', 'http://d205bpvrqc9yn1.cloudfront.net/0227.gif', 8),
(396, 'cable standing hip extension', 'http://d205bpvrqc9yn1.cloudfront.net/0228.gif', 9),
(397, 'cable standing inner curl', 'http://d205bpvrqc9yn1.cloudfront.net/0229.gif', 3),
(398, 'cable standing lift', 'http://d205bpvrqc9yn1.cloudfront.net/0230.gif', 4),
(399, 'cable standing one arm triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0231.gif', 2),
(400, 'cable standing one leg calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1376.gif', 7),
(401, 'cable standing pulldown (with rope)', 'http://d205bpvrqc9yn1.cloudfront.net/0232.gif', 3),
(402, 'cable standing rear delt row (with rope)', 'http://d205bpvrqc9yn1.cloudfront.net/0233.gif', 15),
(403, 'cable standing reverse grip one arm overhead trice', 'http://d205bpvrqc9yn1.cloudfront.net/1727.gif', 2),
(404, 'cable standing row (v-bar)', 'http://d205bpvrqc9yn1.cloudfront.net/0234.gif', 14),
(405, 'cable standing shoulder external rotation', 'http://d205bpvrqc9yn1.cloudfront.net/0235.gif', 15),
(406, 'cable standing twist row (v-bar)', 'http://d205bpvrqc9yn1.cloudfront.net/0236.gif', 14),
(407, 'cable standing up straight crossovers', 'http://d205bpvrqc9yn1.cloudfront.net/1269.gif', 8),
(408, 'cable straight arm pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0238.gif', 6),
(409, 'cable straight arm pulldown (with rope)', 'http://d205bpvrqc9yn1.cloudfront.net/0237.gif', 6),
(410, 'cable straight back seated row', 'http://d205bpvrqc9yn1.cloudfront.net/0239.gif', 14),
(411, 'cable supine reverse fly', 'http://d205bpvrqc9yn1.cloudfront.net/0240.gif', 15),
(412, 'cable thibaudeau kayak row', 'http://d205bpvrqc9yn1.cloudfront.net/2464.gif', 6),
(413, 'cable triceps pushdown (v-bar)', 'http://d205bpvrqc9yn1.cloudfront.net/0241.gif', 2),
(414, 'cable triceps pushdown (v-bar) (with arm blaster)', 'http://d205bpvrqc9yn1.cloudfront.net/2405.gif', 2),
(415, 'cable tuck reverse crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0242.gif', 4),
(416, 'cable twist', 'http://d205bpvrqc9yn1.cloudfront.net/0243.gif', 4),
(417, 'cable twist (up-down)', 'http://d205bpvrqc9yn1.cloudfront.net/0862.gif', 4),
(418, 'cable twisting pull', 'http://d205bpvrqc9yn1.cloudfront.net/0244.gif', 6),
(419, 'cable two arm curl on incline bench', 'http://d205bpvrqc9yn1.cloudfront.net/1645.gif', 3),
(420, 'cable two arm tricep kickback', 'http://d205bpvrqc9yn1.cloudfront.net/1728.gif', 2),
(421, 'cable underhand pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0245.gif', 6),
(422, 'cable upper chest crossovers', 'http://d205bpvrqc9yn1.cloudfront.net/1270.gif', 8),
(423, 'cable upper row', 'http://d205bpvrqc9yn1.cloudfront.net/1324.gif', 14),
(424, 'cable upright row', 'http://d205bpvrqc9yn1.cloudfront.net/0246.gif', 15),
(425, 'cable wide grip rear pulldown behind neck', 'http://d205bpvrqc9yn1.cloudfront.net/1325.gif', 6),
(426, 'cable wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0247.gif', 16),
(427, 'calf push stretch with hands against wall', 'http://d205bpvrqc9yn1.cloudfront.net/1407.gif', 7),
(428, 'calf stretch with hands against wall', 'http://d205bpvrqc9yn1.cloudfront.net/1377.gif', 7),
(429, 'calf stretch with rope', 'http://d205bpvrqc9yn1.cloudfront.net/1378.gif', 7),
(430, 'cambered bar lying row', 'http://d205bpvrqc9yn1.cloudfront.net/0248.gif', 14),
(431, 'captains chair straight leg raise', 'http://d205bpvrqc9yn1.cloudfront.net/2963.gif', 4),
(432, 'chair leg extended stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1548.gif', 5),
(433, 'chest and front of shoulder stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1271.gif', 8),
(434, 'chest dip', 'http://d205bpvrqc9yn1.cloudfront.net/0251.gif', 8),
(435, 'chest dip (on dip-pull-up cage)', 'http://d205bpvrqc9yn1.cloudfront.net/1430.gif', 8),
(436, 'chest dip on straight bar', 'http://d205bpvrqc9yn1.cloudfront.net/2462.gif', 8),
(437, 'chest stretch with exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1272.gif', 8),
(438, 'chest tap push-up (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3216.gif', 8),
(439, 'chin-up', 'http://d205bpvrqc9yn1.cloudfront.net/1326.gif', 6),
(440, 'chin-ups (narrow parallel grip)', 'http://d205bpvrqc9yn1.cloudfront.net/0253.gif', 14),
(441, 'circles knee stretch', 'http://d205bpvrqc9yn1.cloudfront.net/0257.gif', 7),
(442, 'clap push up', 'http://d205bpvrqc9yn1.cloudfront.net/1273.gif', 8),
(443, 'clock push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0258.gif', 8),
(444, 'close grip chin-up', 'http://d205bpvrqc9yn1.cloudfront.net/1327.gif', 6),
(445, 'close-grip push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0259.gif', 2),
(446, 'close-grip push-up (on knees)', 'http://d205bpvrqc9yn1.cloudfront.net/2398.gif', 2),
(447, 'cocoons', 'http://d205bpvrqc9yn1.cloudfront.net/0260.gif', 4),
(448, 'crab twist toe touch', 'http://d205bpvrqc9yn1.cloudfront.net/1468.gif', 4),
(449, 'cross body crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0262.gif', 4),
(450, 'crunch (hands overhead)', 'http://d205bpvrqc9yn1.cloudfront.net/0267.gif', 4),
(451, 'crunch (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0271.gif', 4),
(452, 'crunch (on stability ball, arms straight)', 'http://d205bpvrqc9yn1.cloudfront.net/0272.gif', 4),
(453, 'crunch floor', 'http://d205bpvrqc9yn1.cloudfront.net/0274.gif', 4),
(454, 'curl-up', 'http://d205bpvrqc9yn1.cloudfront.net/3016.gif', 4),
(455, 'curtsey squat', 'http://d205bpvrqc9yn1.cloudfront.net/3769.gif', 9),
(456, 'cycle cross trainer', 'http://d205bpvrqc9yn1.cloudfront.net/2331.gif', 12),
(457, 'dead bug', 'http://d205bpvrqc9yn1.cloudfront.net/0276.gif', 4),
(458, 'decline crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0277.gif', 4),
(459, 'decline push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0279.gif', 8),
(460, 'decline sit-up', 'http://d205bpvrqc9yn1.cloudfront.net/0282.gif', 4),
(461, 'deep push up', 'http://d205bpvrqc9yn1.cloudfront.net/1274.gif', 8),
(462, 'diamond push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0283.gif', 2),
(463, 'donkey calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0284.gif', 7),
(464, 'drop push up', 'http://d205bpvrqc9yn1.cloudfront.net/1275.gif', 8),
(465, 'dumbbell alternate biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/0285.gif', 3),
(466, 'dumbbell alternate biceps curl (with arm blaster)', 'http://d205bpvrqc9yn1.cloudfront.net/2403.gif', 3),
(467, 'dumbbell alternate hammer preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1646.gif', 3),
(468, 'dumbbell alternate preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1647.gif', 3),
(469, 'dumbbell alternate seated hammer curl', 'http://d205bpvrqc9yn1.cloudfront.net/1648.gif', 3),
(470, 'dumbbell alternate side press', 'http://d205bpvrqc9yn1.cloudfront.net/0286.gif', 15),
(471, 'dumbbell alternating bicep curl with leg raised on', 'http://d205bpvrqc9yn1.cloudfront.net/1649.gif', 3),
(472, 'dumbbell alternating seated bicep curl on exercise', 'http://d205bpvrqc9yn1.cloudfront.net/1650.gif', 3),
(473, 'dumbbell arnold press', 'http://d205bpvrqc9yn1.cloudfront.net/2137.gif', 15),
(474, 'dumbbell arnold press v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0287.gif', 15),
(475, 'dumbbell around pullover', 'http://d205bpvrqc9yn1.cloudfront.net/0288.gif', 8),
(476, 'dumbbell bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0289.gif', 8),
(477, 'dumbbell bench seated press', 'http://d205bpvrqc9yn1.cloudfront.net/0290.gif', 15),
(478, 'dumbbell bench squat', 'http://d205bpvrqc9yn1.cloudfront.net/0291.gif', 9),
(479, 'dumbbell bent over row', 'http://d205bpvrqc9yn1.cloudfront.net/0293.gif', 14),
(480, 'dumbbell bicep curl lunge with bowling motion', 'http://d205bpvrqc9yn1.cloudfront.net/1651.gif', 3),
(481, 'dumbbell bicep curl on exercise ball with leg rais', 'http://d205bpvrqc9yn1.cloudfront.net/1652.gif', 3),
(482, 'dumbbell bicep curl with stork stance', 'http://d205bpvrqc9yn1.cloudfront.net/1653.gif', 3),
(483, 'dumbbell biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/0294.gif', 3),
(484, 'dumbbell biceps curl (with arm blaster)', 'http://d205bpvrqc9yn1.cloudfront.net/2401.gif', 3),
(485, 'dumbbell biceps curl reverse', 'http://d205bpvrqc9yn1.cloudfront.net/1654.gif', 3),
(486, 'dumbbell biceps curl squat', 'http://d205bpvrqc9yn1.cloudfront.net/1655.gif', 3),
(487, 'dumbbell biceps curl v sit on bosu ball', 'http://d205bpvrqc9yn1.cloudfront.net/1656.gif', 3),
(488, 'dumbbell burpee', 'http://d205bpvrqc9yn1.cloudfront.net/1201.gif', 12),
(489, 'dumbbell clean', 'http://d205bpvrqc9yn1.cloudfront.net/0295.gif', 9),
(490, 'dumbbell close grip press', 'http://d205bpvrqc9yn1.cloudfront.net/1731.gif', 2),
(491, 'dumbbell close-grip press', 'http://d205bpvrqc9yn1.cloudfront.net/0296.gif', 2),
(492, 'dumbbell concentration curl', 'http://d205bpvrqc9yn1.cloudfront.net/0297.gif', 3),
(493, 'dumbbell contralateral forward lunge', 'http://d205bpvrqc9yn1.cloudfront.net/3635.gif', 9),
(494, 'dumbbell cross body hammer curl', 'http://d205bpvrqc9yn1.cloudfront.net/0298.gif', 3),
(495, 'dumbbell cross body hammer curl v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/1657.gif', 3),
(496, 'dumbbell cuban press', 'http://d205bpvrqc9yn1.cloudfront.net/0299.gif', 15),
(497, 'dumbbell cuban press v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/2136.gif', 15),
(498, 'dumbbell deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/0300.gif', 9),
(499, 'dumbbell decline bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0301.gif', 8),
(500, 'dumbbell decline fly', 'http://d205bpvrqc9yn1.cloudfront.net/0302.gif', 8),
(501, 'dumbbell decline hammer press', 'http://d205bpvrqc9yn1.cloudfront.net/0303.gif', 8),
(502, 'dumbbell decline one arm fly', 'http://d205bpvrqc9yn1.cloudfront.net/1276.gif', 8),
(503, 'dumbbell decline one arm hammer press', 'http://d205bpvrqc9yn1.cloudfront.net/1617.gif', 2),
(504, 'dumbbell decline shrug', 'http://d205bpvrqc9yn1.cloudfront.net/0305.gif', 17),
(505, 'dumbbell decline shrug v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0304.gif', 17),
(506, 'dumbbell decline triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0306.gif', 2),
(507, 'dumbbell decline twist fly', 'http://d205bpvrqc9yn1.cloudfront.net/0307.gif', 8),
(508, 'dumbbell finger curls', 'http://d205bpvrqc9yn1.cloudfront.net/1437.gif', 16),
(509, 'dumbbell fly', 'http://d205bpvrqc9yn1.cloudfront.net/0308.gif', 8),
(510, 'dumbbell fly on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1277.gif', 8),
(511, 'dumbbell forward lunge triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/1732.gif', 2),
(512, 'dumbbell front raise', 'http://d205bpvrqc9yn1.cloudfront.net/0310.gif', 15),
(513, 'dumbbell front raise v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0309.gif', 15),
(514, 'dumbbell full can lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0311.gif', 15),
(515, 'dumbbell goblet squat', 'http://d205bpvrqc9yn1.cloudfront.net/1760.gif', 5),
(516, 'dumbbell hammer curl', 'http://d205bpvrqc9yn1.cloudfront.net/0313.gif', 3),
(517, 'dumbbell hammer curl on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1659.gif', 3),
(518, 'dumbbell hammer curl v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0312.gif', 3),
(519, 'dumbbell hammer curls (with arm blaster)', 'http://d205bpvrqc9yn1.cloudfront.net/2402.gif', 3),
(520, 'dumbbell high curl', 'http://d205bpvrqc9yn1.cloudfront.net/1664.gif', 3),
(521, 'dumbbell incline alternate press', 'http://d205bpvrqc9yn1.cloudfront.net/3545.gif', 8),
(522, 'dumbbell incline bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0314.gif', 8),
(523, 'dumbbell incline biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/0315.gif', 3),
(524, 'dumbbell incline breeding', 'http://d205bpvrqc9yn1.cloudfront.net/0316.gif', 8),
(525, 'dumbbell incline curl', 'http://d205bpvrqc9yn1.cloudfront.net/0318.gif', 3),
(526, 'dumbbell incline curl v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0317.gif', 3),
(527, 'dumbbell incline fly', 'http://d205bpvrqc9yn1.cloudfront.net/0319.gif', 8),
(528, 'dumbbell incline fly on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1278.gif', 8),
(529, 'dumbbell incline hammer curl', 'http://d205bpvrqc9yn1.cloudfront.net/0320.gif', 3),
(530, 'dumbbell incline hammer press', 'http://d205bpvrqc9yn1.cloudfront.net/0321.gif', 8),
(531, 'dumbbell incline hammer press on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1618.gif', 2),
(532, 'dumbbell incline inner biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/0322.gif', 3),
(533, 'dumbbell incline one arm fly', 'http://d205bpvrqc9yn1.cloudfront.net/1279.gif', 8),
(534, 'dumbbell incline one arm fly on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1280.gif', 8),
(535, 'dumbbell incline one arm hammer press', 'http://d205bpvrqc9yn1.cloudfront.net/1619.gif', 2),
(536, 'dumbbell incline one arm hammer press on exercise ', 'http://d205bpvrqc9yn1.cloudfront.net/1620.gif', 2),
(537, 'dumbbell incline one arm lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0323.gif', 15),
(538, 'dumbbell incline one arm press', 'http://d205bpvrqc9yn1.cloudfront.net/1281.gif', 8),
(539, 'dumbbell incline one arm press on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1282.gif', 8),
(540, 'dumbbell incline palm-in press', 'http://d205bpvrqc9yn1.cloudfront.net/0324.gif', 8),
(541, 'dumbbell incline press on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1283.gif', 8),
(542, 'dumbbell incline raise', 'http://d205bpvrqc9yn1.cloudfront.net/0325.gif', 15),
(543, 'dumbbell incline rear lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0326.gif', 15),
(544, 'dumbbell incline row', 'http://d205bpvrqc9yn1.cloudfront.net/0327.gif', 14),
(545, 'dumbbell incline shoulder raise', 'http://d205bpvrqc9yn1.cloudfront.net/0328.gif', 18),
(546, 'dumbbell incline shrug', 'http://d205bpvrqc9yn1.cloudfront.net/0329.gif', 17),
(547, 'dumbbell incline t-raise', 'http://d205bpvrqc9yn1.cloudfront.net/3542.gif', 15),
(548, 'dumbbell incline triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0330.gif', 2),
(549, 'dumbbell incline twisted flyes', 'http://d205bpvrqc9yn1.cloudfront.net/0331.gif', 8),
(550, 'dumbbell incline two arm extension', 'http://d205bpvrqc9yn1.cloudfront.net/1733.gif', 2),
(551, 'dumbbell incline y-raise', 'http://d205bpvrqc9yn1.cloudfront.net/3541.gif', 14),
(552, 'dumbbell iron cross', 'http://d205bpvrqc9yn1.cloudfront.net/0332.gif', 15),
(553, 'dumbbell kickback', 'http://d205bpvrqc9yn1.cloudfront.net/0333.gif', 2),
(554, 'dumbbell kickbacks on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1734.gif', 2),
(555, 'dumbbell kneeling bicep curl exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1660.gif', 3),
(556, 'dumbbell lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0334.gif', 15),
(557, 'dumbbell lateral to front raise', 'http://d205bpvrqc9yn1.cloudfront.net/0335.gif', 15),
(558, 'dumbbell lunge', 'http://d205bpvrqc9yn1.cloudfront.net/0336.gif', 9),
(559, 'dumbbell lunge with bicep curl', 'http://d205bpvrqc9yn1.cloudfront.net/1658.gif', 3),
(560, 'dumbbell lying extension (across face)', 'http://d205bpvrqc9yn1.cloudfront.net/0337.gif', 2),
(561, 'dumbbell lying alternate extension', 'http://d205bpvrqc9yn1.cloudfront.net/1729.gif', 2),
(562, 'dumbbell lying elbow press', 'http://d205bpvrqc9yn1.cloudfront.net/0338.gif', 2),
(563, 'dumbbell lying external shoulder rotation', 'http://d205bpvrqc9yn1.cloudfront.net/0863.gif', 15),
(564, 'dumbbell lying femoral', 'http://d205bpvrqc9yn1.cloudfront.net/0339.gif', 10),
(565, 'dumbbell lying hammer press', 'http://d205bpvrqc9yn1.cloudfront.net/0340.gif', 8),
(566, 'dumbbell lying on floor rear delt raise', 'http://d205bpvrqc9yn1.cloudfront.net/2470.gif', 15),
(567, 'dumbbell lying one arm deltoid rear', 'http://d205bpvrqc9yn1.cloudfront.net/0341.gif', 15);
INSERT INTO `exercicecatalogue` (`idexercicecatalogue`, `nom`, `image`, `idcategorie`) VALUES
(568, 'dumbbell lying one arm press', 'http://d205bpvrqc9yn1.cloudfront.net/0343.gif', 8),
(569, 'dumbbell lying one arm press v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0342.gif', 8),
(570, 'dumbbell lying one arm pronated triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0344.gif', 2),
(571, 'dumbbell lying one arm rear lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0345.gif', 15),
(572, 'dumbbell lying one arm supinated triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0346.gif', 2),
(573, 'dumbbell lying pronation', 'http://d205bpvrqc9yn1.cloudfront.net/0347.gif', 16),
(574, 'dumbbell lying pronation on floor', 'http://d205bpvrqc9yn1.cloudfront.net/2705.gif', 16),
(575, 'dumbbell lying pullover on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1284.gif', 8),
(576, 'dumbbell lying rear delt row', 'http://d205bpvrqc9yn1.cloudfront.net/1328.gif', 14),
(577, 'dumbbell lying rear lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0348.gif', 15),
(578, 'dumbbell lying single extension', 'http://d205bpvrqc9yn1.cloudfront.net/1735.gif', 2),
(579, 'dumbbell lying supination', 'http://d205bpvrqc9yn1.cloudfront.net/0349.gif', 16),
(580, 'dumbbell lying supination on floor', 'http://d205bpvrqc9yn1.cloudfront.net/2706.gif', 16),
(581, 'dumbbell lying supine biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/1661.gif', 3),
(582, 'dumbbell lying supine curl', 'http://d205bpvrqc9yn1.cloudfront.net/0350.gif', 3),
(583, 'dumbbell lying triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0351.gif', 2),
(584, 'dumbbell lying wide curl', 'http://d205bpvrqc9yn1.cloudfront.net/1662.gif', 3),
(585, 'dumbbell neutral grip bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0352.gif', 2),
(586, 'dumbbell one arm bench fly', 'http://d205bpvrqc9yn1.cloudfront.net/1285.gif', 8),
(587, 'dumbbell one arm bent-over row', 'http://d205bpvrqc9yn1.cloudfront.net/0292.gif', 14),
(588, 'dumbbell one arm chest fly on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1286.gif', 8),
(589, 'dumbbell one arm concetration curl (on stability b', 'http://d205bpvrqc9yn1.cloudfront.net/0353.gif', 3),
(590, 'dumbbell one arm decline chest press', 'http://d205bpvrqc9yn1.cloudfront.net/1287.gif', 8),
(591, 'dumbbell one arm fly on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1288.gif', 8),
(592, 'dumbbell one arm french press on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1736.gif', 2),
(593, 'dumbbell one arm hammer preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1663.gif', 3),
(594, 'dumbbell one arm hammer press on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1621.gif', 2),
(595, 'dumbbell one arm incline chest press', 'http://d205bpvrqc9yn1.cloudfront.net/1289.gif', 8),
(596, 'dumbbell one arm kickback', 'http://d205bpvrqc9yn1.cloudfront.net/0354.gif', 2),
(597, 'dumbbell one arm lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0355.gif', 15),
(598, 'dumbbell one arm lateral raise with support', 'http://d205bpvrqc9yn1.cloudfront.net/0356.gif', 15),
(599, 'dumbbell one arm press on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1290.gif', 8),
(600, 'dumbbell one arm prone curl', 'http://d205bpvrqc9yn1.cloudfront.net/1665.gif', 3),
(601, 'dumbbell one arm prone hammer curl', 'http://d205bpvrqc9yn1.cloudfront.net/1666.gif', 3),
(602, 'dumbbell one arm pullover on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1291.gif', 8),
(603, 'dumbbell one arm revers wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0358.gif', 16),
(604, 'dumbbell one arm reverse fly (with support)', 'http://d205bpvrqc9yn1.cloudfront.net/0359.gif', 15),
(605, 'dumbbell one arm reverse grip press', 'http://d205bpvrqc9yn1.cloudfront.net/1622.gif', 8),
(606, 'dumbbell one arm reverse preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1414.gif', 3),
(607, 'dumbbell one arm reverse spider curl', 'http://d205bpvrqc9yn1.cloudfront.net/1667.gif', 3),
(608, 'dumbbell one arm seated bicep curl on exercise bal', 'http://d205bpvrqc9yn1.cloudfront.net/1668.gif', 3),
(609, 'dumbbell one arm seated hammer curl', 'http://d205bpvrqc9yn1.cloudfront.net/1669.gif', 3),
(610, 'dumbbell one arm seated neutral wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/1415.gif', 16),
(611, 'dumbbell one arm shoulder press', 'http://d205bpvrqc9yn1.cloudfront.net/0361.gif', 15),
(612, 'dumbbell one arm shoulder press v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0360.gif', 15),
(613, 'dumbbell one arm snatch', 'http://d205bpvrqc9yn1.cloudfront.net/3888.gif', 9),
(614, 'dumbbell one arm standing curl', 'http://d205bpvrqc9yn1.cloudfront.net/1670.gif', 3),
(615, 'dumbbell one arm standing hammer curl', 'http://d205bpvrqc9yn1.cloudfront.net/1671.gif', 3),
(616, 'dumbbell one arm triceps extension (on bench)', 'http://d205bpvrqc9yn1.cloudfront.net/0362.gif', 2),
(617, 'dumbbell one arm upright row', 'http://d205bpvrqc9yn1.cloudfront.net/0363.gif', 15),
(618, 'dumbbell one arm wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0364.gif', 16),
(619, 'dumbbell one arm zottman preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1672.gif', 3),
(620, 'dumbbell one leg fly on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1292.gif', 8),
(621, 'dumbbell over bench neutral wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0365.gif', 3),
(622, 'dumbbell over bench one arm neutral wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0366.gif', 3),
(623, 'dumbbell over bench one arm reverse wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/1441.gif', 16),
(624, 'dumbbell over bench one arm wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0367.gif', 16),
(625, 'dumbbell over bench revers wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0368.gif', 16),
(626, 'dumbbell over bench wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0369.gif', 16),
(627, 'dumbbell palm rotational bent over row', 'http://d205bpvrqc9yn1.cloudfront.net/1329.gif', 14),
(628, 'dumbbell palms in incline bench press', 'http://d205bpvrqc9yn1.cloudfront.net/1623.gif', 2),
(629, 'dumbbell peacher hammer curl', 'http://d205bpvrqc9yn1.cloudfront.net/0370.gif', 3),
(630, 'dumbbell plyo squat', 'http://d205bpvrqc9yn1.cloudfront.net/0371.gif', 9),
(631, 'dumbbell preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/0372.gif', 3),
(632, 'dumbbell preacher curl over exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1673.gif', 3),
(633, 'dumbbell press on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1293.gif', 8),
(634, 'dumbbell pronate-grip triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0373.gif', 2),
(635, 'dumbbell prone incline curl', 'http://d205bpvrqc9yn1.cloudfront.net/0374.gif', 3),
(636, 'dumbbell prone incline hammer curl', 'http://d205bpvrqc9yn1.cloudfront.net/1674.gif', 3),
(637, 'dumbbell pullover', 'http://d205bpvrqc9yn1.cloudfront.net/0375.gif', 8),
(638, 'dumbbell pullover hip extension on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1294.gif', 8),
(639, 'dumbbell pullover on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1295.gif', 8),
(640, 'dumbbell push press', 'http://d205bpvrqc9yn1.cloudfront.net/1700.gif', 15),
(641, 'dumbbell raise', 'http://d205bpvrqc9yn1.cloudfront.net/0376.gif', 15),
(642, 'dumbbell rear delt raise', 'http://d205bpvrqc9yn1.cloudfront.net/2292.gif', 15),
(643, 'dumbbell rear delt row_shoulder', 'http://d205bpvrqc9yn1.cloudfront.net/0377.gif', 15),
(644, 'dumbbell rear fly', 'http://d205bpvrqc9yn1.cloudfront.net/0378.gif', 15),
(645, 'dumbbell rear lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0380.gif', 15),
(646, 'dumbbell rear lateral raise (support head)', 'http://d205bpvrqc9yn1.cloudfront.net/0379.gif', 15),
(647, 'dumbbell rear lunge', 'http://d205bpvrqc9yn1.cloudfront.net/0381.gif', 9),
(648, 'dumbbell revers grip biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/0382.gif', 3),
(649, 'dumbbell reverse bench press', 'http://d205bpvrqc9yn1.cloudfront.net/1624.gif', 8),
(650, 'dumbbell reverse fly', 'http://d205bpvrqc9yn1.cloudfront.net/0383.gif', 15),
(651, 'dumbbell reverse grip incline bench one arm row', 'http://d205bpvrqc9yn1.cloudfront.net/1330.gif', 14),
(652, 'dumbbell reverse grip incline bench two arm row', 'http://d205bpvrqc9yn1.cloudfront.net/1331.gif', 14),
(653, 'dumbbell reverse grip row (female)', 'http://d205bpvrqc9yn1.cloudfront.net/2327.gif', 14),
(654, 'dumbbell reverse preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/0384.gif', 3),
(655, 'dumbbell reverse spider curl', 'http://d205bpvrqc9yn1.cloudfront.net/1675.gif', 3),
(656, 'dumbbell reverse wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0385.gif', 16),
(657, 'dumbbell romanian deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/1459.gif', 9),
(658, 'dumbbell rotation reverse fly', 'http://d205bpvrqc9yn1.cloudfront.net/0386.gif', 15),
(659, 'dumbbell scott press', 'http://d205bpvrqc9yn1.cloudfront.net/2397.gif', 15),
(660, 'dumbbell seated alternate front raise', 'http://d205bpvrqc9yn1.cloudfront.net/0387.gif', 15),
(661, 'dumbbell seated alternate hammer curl on exercise ', 'http://d205bpvrqc9yn1.cloudfront.net/1676.gif', 3),
(662, 'dumbbell seated alternate press', 'http://d205bpvrqc9yn1.cloudfront.net/0388.gif', 15),
(663, 'dumbbell seated alternate shoulder', 'http://d205bpvrqc9yn1.cloudfront.net/3546.gif', 15),
(664, 'dumbbell seated bench extension', 'http://d205bpvrqc9yn1.cloudfront.net/0389.gif', 2),
(665, 'dumbbell seated bent arm lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/2317.gif', 15),
(666, 'dumbbell seated bent over alternate kickback', 'http://d205bpvrqc9yn1.cloudfront.net/1730.gif', 2),
(667, 'dumbbell seated bent over triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/1737.gif', 2),
(668, 'dumbbell seated bicep curl', 'http://d205bpvrqc9yn1.cloudfront.net/1677.gif', 3),
(669, 'dumbbell seated biceps curl (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0390.gif', 3),
(670, 'dumbbell seated biceps curl to shoulder press', 'http://d205bpvrqc9yn1.cloudfront.net/3547.gif', 3),
(671, 'dumbbell seated calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1379.gif', 7),
(672, 'dumbbell seated curl', 'http://d205bpvrqc9yn1.cloudfront.net/0391.gif', 3),
(673, 'dumbbell seated front raise', 'http://d205bpvrqc9yn1.cloudfront.net/0392.gif', 15),
(674, 'dumbbell seated hammer curl', 'http://d205bpvrqc9yn1.cloudfront.net/1678.gif', 3),
(675, 'dumbbell seated inner biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/0393.gif', 3),
(676, 'dumbbell seated kickback', 'http://d205bpvrqc9yn1.cloudfront.net/0394.gif', 2),
(677, 'dumbbell seated lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0396.gif', 15),
(678, 'dumbbell seated lateral raise v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0395.gif', 15),
(679, 'dumbbell seated neutral wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0397.gif', 3),
(680, 'dumbbell seated one arm bicep curl on exercise bal', 'http://d205bpvrqc9yn1.cloudfront.net/1679.gif', 3),
(681, 'dumbbell seated one arm kickback', 'http://d205bpvrqc9yn1.cloudfront.net/0398.gif', 2),
(682, 'dumbbell seated one arm rotate', 'http://d205bpvrqc9yn1.cloudfront.net/0399.gif', 16),
(683, 'dumbbell seated one leg calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0400.gif', 7),
(684, 'dumbbell seated one leg calf raise - hammer grip', 'http://d205bpvrqc9yn1.cloudfront.net/1380.gif', 7),
(685, 'dumbbell seated one leg calf raise - palm up', 'http://d205bpvrqc9yn1.cloudfront.net/1381.gif', 7),
(686, 'dumbbell seated palms up wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0401.gif', 16),
(687, 'dumbbell seated preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/0402.gif', 3),
(688, 'dumbbell seated revers grip concentration curl', 'http://d205bpvrqc9yn1.cloudfront.net/0403.gif', 3),
(689, 'dumbbell seated reverse grip one arm overhead tric', 'http://d205bpvrqc9yn1.cloudfront.net/1738.gif', 2),
(690, 'dumbbell seated shoulder press', 'http://d205bpvrqc9yn1.cloudfront.net/0405.gif', 15),
(691, 'dumbbell seated shoulder press (parallel grip)', 'http://d205bpvrqc9yn1.cloudfront.net/0404.gif', 15),
(692, 'dumbbell seated triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/2188.gif', 2),
(693, 'dumbbell shrug', 'http://d205bpvrqc9yn1.cloudfront.net/0406.gif', 17),
(694, 'dumbbell side bend', 'http://d205bpvrqc9yn1.cloudfront.net/0407.gif', 4),
(695, 'dumbbell side lying one hand raise', 'http://d205bpvrqc9yn1.cloudfront.net/0408.gif', 15),
(696, 'dumbbell side plank with rear fly', 'http://d205bpvrqc9yn1.cloudfront.net/3664.gif', 14),
(697, 'dumbbell single arm overhead carry', 'http://d205bpvrqc9yn1.cloudfront.net/3548.gif', 15),
(698, 'dumbbell single leg calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0409.gif', 7),
(699, 'dumbbell single leg deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/1757.gif', 9),
(700, 'dumbbell single leg deadlift with stepbox support', 'http://d205bpvrqc9yn1.cloudfront.net/2805.gif', 9),
(701, 'dumbbell single leg split squat', 'http://d205bpvrqc9yn1.cloudfront.net/0410.gif', 5),
(702, 'dumbbell single leg squat', 'http://d205bpvrqc9yn1.cloudfront.net/0411.gif', 9),
(703, 'dumbbell squat', 'http://d205bpvrqc9yn1.cloudfront.net/0413.gif', 9),
(704, 'dumbbell standing alternate hammer curl and press', 'http://d205bpvrqc9yn1.cloudfront.net/3560.gif', 3),
(705, 'dumbbell standing alternate overhead press', 'http://d205bpvrqc9yn1.cloudfront.net/0414.gif', 15),
(706, 'dumbbell standing alternate raise', 'http://d205bpvrqc9yn1.cloudfront.net/0415.gif', 15),
(707, 'dumbbell standing alternating tricep kickback', 'http://d205bpvrqc9yn1.cloudfront.net/1739.gif', 2),
(708, 'dumbbell standing around world', 'http://d205bpvrqc9yn1.cloudfront.net/2143.gif', 15),
(709, 'dumbbell standing bent over one arm triceps extens', 'http://d205bpvrqc9yn1.cloudfront.net/1740.gif', 2),
(710, 'dumbbell standing bent over two arm triceps extens', 'http://d205bpvrqc9yn1.cloudfront.net/1741.gif', 2),
(711, 'dumbbell standing biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/0416.gif', 3),
(712, 'dumbbell standing calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0417.gif', 7),
(713, 'dumbbell standing concentration curl', 'http://d205bpvrqc9yn1.cloudfront.net/0418.gif', 3),
(714, 'dumbbell standing front raise above head', 'http://d205bpvrqc9yn1.cloudfront.net/0419.gif', 15),
(715, 'dumbbell standing inner biceps curl v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/2321.gif', 3),
(716, 'dumbbell standing kickback', 'http://d205bpvrqc9yn1.cloudfront.net/0420.gif', 2),
(717, 'dumbbell standing one arm concentration curl', 'http://d205bpvrqc9yn1.cloudfront.net/0421.gif', 3),
(718, 'dumbbell standing one arm curl (over incline bench', 'http://d205bpvrqc9yn1.cloudfront.net/0422.gif', 3),
(719, 'dumbbell standing one arm curl over incline bench', 'http://d205bpvrqc9yn1.cloudfront.net/1680.gif', 3),
(720, 'dumbbell standing one arm extension', 'http://d205bpvrqc9yn1.cloudfront.net/0423.gif', 2),
(721, 'dumbbell standing one arm palm in press', 'http://d205bpvrqc9yn1.cloudfront.net/0424.gif', 15),
(722, 'dumbbell standing one arm reverse curl', 'http://d205bpvrqc9yn1.cloudfront.net/0425.gif', 3),
(723, 'dumbbell standing overhead press', 'http://d205bpvrqc9yn1.cloudfront.net/0426.gif', 15),
(724, 'dumbbell standing palms in press', 'http://d205bpvrqc9yn1.cloudfront.net/0427.gif', 15),
(725, 'dumbbell standing preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/0428.gif', 3),
(726, 'dumbbell standing reverse curl', 'http://d205bpvrqc9yn1.cloudfront.net/0429.gif', 3),
(727, 'dumbbell standing triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0430.gif', 2),
(728, 'dumbbell standing zottman preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/2293.gif', 3),
(729, 'dumbbell step up single leg balance with bicep cur', 'http://d205bpvrqc9yn1.cloudfront.net/1684.gif', 3),
(730, 'dumbbell step-up', 'http://d205bpvrqc9yn1.cloudfront.net/0431.gif', 9),
(731, 'dumbbell step-up lunge', 'http://d205bpvrqc9yn1.cloudfront.net/2796.gif', 5),
(732, 'dumbbell step-up split squat', 'http://d205bpvrqc9yn1.cloudfront.net/2812.gif', 5),
(733, 'dumbbell stiff leg deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/0432.gif', 9),
(734, 'dumbbell straight arm pullover', 'http://d205bpvrqc9yn1.cloudfront.net/0433.gif', 8),
(735, 'dumbbell straight leg deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/0434.gif', 9),
(736, 'dumbbell sumo pull through', 'http://d205bpvrqc9yn1.cloudfront.net/2808.gif', 9),
(737, 'dumbbell supported squat', 'http://d205bpvrqc9yn1.cloudfront.net/2803.gif', 5),
(738, 'dumbbell tate press', 'http://d205bpvrqc9yn1.cloudfront.net/0436.gif', 2),
(739, 'dumbbell tricep kickback with stork stance', 'http://d205bpvrqc9yn1.cloudfront.net/1742.gif', 2),
(740, 'dumbbell twisting bench press', 'http://d205bpvrqc9yn1.cloudfront.net/1743.gif', 2),
(741, 'dumbbell upright row', 'http://d205bpvrqc9yn1.cloudfront.net/0437.gif', 15),
(742, 'dumbbell upright row (back pov)', 'http://d205bpvrqc9yn1.cloudfront.net/1765.gif', 15),
(743, 'dumbbell upright shoulder external rotation', 'http://d205bpvrqc9yn1.cloudfront.net/0864.gif', 15),
(744, 'dumbbell waiter biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/5201.gif', 3),
(745, 'dumbbell w-press', 'http://d205bpvrqc9yn1.cloudfront.net/0438.gif', 15),
(746, 'dumbbell zottman curl', 'http://d205bpvrqc9yn1.cloudfront.net/0439.gif', 3),
(747, 'dumbbell zottman preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/2294.gif', 3),
(748, 'dumbbells seated triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/2189.gif', 2),
(749, 'dynamic chest stretch (male)', 'http://d205bpvrqc9yn1.cloudfront.net/1167.gif', 8),
(750, 'elbow dips', 'http://d205bpvrqc9yn1.cloudfront.net/3287.gif', 2),
(751, 'elbow lift - reverse push-up', 'http://d205bpvrqc9yn1.cloudfront.net/1772.gif', 14),
(752, 'elbow-to-knee', 'http://d205bpvrqc9yn1.cloudfront.net/0443.gif', 4),
(753, 'elevator', 'http://d205bpvrqc9yn1.cloudfront.net/3292.gif', 14),
(754, 'exercise ball alternating arm ups', 'http://d205bpvrqc9yn1.cloudfront.net/1332.gif', 6),
(755, 'exercise ball back extension with arms extended', 'http://d205bpvrqc9yn1.cloudfront.net/1333.gif', 13),
(756, 'exercise ball back extension with hands behind hea', 'http://d205bpvrqc9yn1.cloudfront.net/1334.gif', 13),
(757, 'exercise ball back extension with knees off ground', 'http://d205bpvrqc9yn1.cloudfront.net/1335.gif', 13),
(758, 'exercise ball back extension with rotation', 'http://d205bpvrqc9yn1.cloudfront.net/1336.gif', 13),
(759, 'exercise ball dip', 'http://d205bpvrqc9yn1.cloudfront.net/1744.gif', 2),
(760, 'exercise ball hip flexor stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1559.gif', 9),
(761, 'exercise ball hug', 'http://d205bpvrqc9yn1.cloudfront.net/1338.gif', 13),
(762, 'exercise ball lat stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1339.gif', 6),
(763, 'exercise ball lower back stretch (pyramid)', 'http://d205bpvrqc9yn1.cloudfront.net/1341.gif', 6),
(764, 'exercise ball lying side lat stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1342.gif', 6),
(765, 'exercise ball on the wall calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1382.gif', 7),
(766, 'exercise ball on the wall calf raise (tennis ball ', 'http://d205bpvrqc9yn1.cloudfront.net/3241.gif', 7),
(767, 'exercise ball on the wall calf raise (tennis ball ', 'http://d205bpvrqc9yn1.cloudfront.net/3240.gif', 7),
(768, 'exercise ball one leg prone lower body rotation', 'http://d205bpvrqc9yn1.cloudfront.net/1416.gif', 9),
(769, 'exercise ball one legged diagonal kick hamstring c', 'http://d205bpvrqc9yn1.cloudfront.net/1417.gif', 9),
(770, 'exercise ball pike push up', 'http://d205bpvrqc9yn1.cloudfront.net/1296.gif', 8),
(771, 'exercise ball prone leg raise', 'http://d205bpvrqc9yn1.cloudfront.net/1343.gif', 13),
(772, 'exercise ball seated hamstring stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1560.gif', 10),
(773, 'exercise ball seated triceps stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1745.gif', 2),
(774, 'exercise ball supine triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/1746.gif', 2),
(775, 'ez bar french press on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/1747.gif', 2),
(776, 'ez bar lying bent arms pullover', 'http://d205bpvrqc9yn1.cloudfront.net/3010.gif', 6),
(777, 'ez bar lying close grip triceps extension behind h', 'http://d205bpvrqc9yn1.cloudfront.net/1748.gif', 2),
(778, 'ez bar reverse grip bent over row', 'http://d205bpvrqc9yn1.cloudfront.net/1344.gif', 14),
(779, 'ez bar seated close grip concentration curl', 'http://d205bpvrqc9yn1.cloudfront.net/1682.gif', 3),
(780, 'ez bar standing french press', 'http://d205bpvrqc9yn1.cloudfront.net/1749.gif', 2),
(781, 'ez barbell anti gravity press', 'http://d205bpvrqc9yn1.cloudfront.net/0445.gif', 15),
(782, 'ez barbell close grip preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1627.gif', 3),
(783, 'ez barbell close-grip curl', 'http://d205bpvrqc9yn1.cloudfront.net/0446.gif', 3),
(784, 'ez barbell curl', 'http://d205bpvrqc9yn1.cloudfront.net/0447.gif', 3),
(785, 'ez barbell decline close grip face press', 'http://d205bpvrqc9yn1.cloudfront.net/0448.gif', 2),
(786, 'ez barbell decline triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/2186.gif', 2),
(787, 'ez barbell incline triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0449.gif', 2),
(788, 'ez barbell jm bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0450.gif', 2),
(789, 'ez barbell reverse grip curl', 'http://d205bpvrqc9yn1.cloudfront.net/0451.gif', 3),
(790, 'ez barbell reverse grip preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/0452.gif', 3),
(791, 'ez barbell seated curls', 'http://d205bpvrqc9yn1.cloudfront.net/1458.gif', 3),
(792, 'ez barbell seated triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0453.gif', 2),
(793, 'ez barbell spider curl', 'http://d205bpvrqc9yn1.cloudfront.net/0454.gif', 3),
(794, 'ez barbell spider curl', 'http://d205bpvrqc9yn1.cloudfront.net/1628.gif', 3),
(795, 'ez-bar biceps curl (with arm blaster)', 'http://d205bpvrqc9yn1.cloudfront.net/2404.gif', 3),
(796, 'ez-bar close-grip bench press', 'http://d205bpvrqc9yn1.cloudfront.net/2432.gif', 2),
(797, 'ez-barbell standing wide grip biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/2741.gif', 3),
(798, 'farmers walk', 'http://d205bpvrqc9yn1.cloudfront.net/2133.gif', 5),
(799, 'finger curls', 'http://d205bpvrqc9yn1.cloudfront.net/0455.gif', 16),
(800, 'flag', 'http://d205bpvrqc9yn1.cloudfront.net/3303.gif', 4),
(801, 'flexion leg sit up (bent knee)', 'http://d205bpvrqc9yn1.cloudfront.net/0456.gif', 4),
(802, 'flexion leg sit up (straight arm)', 'http://d205bpvrqc9yn1.cloudfront.net/0457.gif', 4),
(803, 'floor fly (with barbell)', 'http://d205bpvrqc9yn1.cloudfront.net/0458.gif', 8),
(804, 'flutter kicks', 'http://d205bpvrqc9yn1.cloudfront.net/0459.gif', 9),
(805, 'forward jump', 'http://d205bpvrqc9yn1.cloudfront.net/1472.gif', 5),
(806, 'forward lunge (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3470.gif', 9),
(807, 'frankenstein squat', 'http://d205bpvrqc9yn1.cloudfront.net/3194.gif', 9),
(808, 'frog crunch', 'http://d205bpvrqc9yn1.cloudfront.net/2429.gif', 4),
(809, 'frog planche', 'http://d205bpvrqc9yn1.cloudfront.net/3301.gif', 4),
(810, 'front lever', 'http://d205bpvrqc9yn1.cloudfront.net/3296.gif', 4),
(811, 'front lever reps', 'http://d205bpvrqc9yn1.cloudfront.net/3295.gif', 14),
(812, 'front plank with twist', 'http://d205bpvrqc9yn1.cloudfront.net/0464.gif', 4),
(813, 'full maltese', 'http://d205bpvrqc9yn1.cloudfront.net/3315.gif', 4),
(814, 'full planche', 'http://d205bpvrqc9yn1.cloudfront.net/3299.gif', 4),
(815, 'full planche push-up', 'http://d205bpvrqc9yn1.cloudfront.net/3327.gif', 8),
(816, 'gironda sternum chin', 'http://d205bpvrqc9yn1.cloudfront.net/0466.gif', 6),
(817, 'glute bridge march', 'http://d205bpvrqc9yn1.cloudfront.net/3561.gif', 9),
(818, 'glute bridge two legs on bench (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3523.gif', 9),
(819, 'glute-ham raise', 'http://d205bpvrqc9yn1.cloudfront.net/3193.gif', 10),
(820, 'gorilla chin', 'http://d205bpvrqc9yn1.cloudfront.net/0467.gif', 4),
(821, 'groin crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0469.gif', 4),
(822, 'hack calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1383.gif', 7),
(823, 'hack one leg calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1384.gif', 7),
(824, 'half knee bends (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3221.gif', 12),
(825, 'half sit-up (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3202.gif', 4),
(826, 'hamstring stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1511.gif', 10),
(827, 'hands bike', 'http://d205bpvrqc9yn1.cloudfront.net/2139.gif', 8),
(828, 'hands clasped circular toe touch (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3218.gif', 9),
(829, 'hands reversed clasped circular toe touch (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3215.gif', 9),
(830, 'handstand', 'http://d205bpvrqc9yn1.cloudfront.net/3302.gif', 2),
(831, 'handstand push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0471.gif', 2),
(832, 'hanging leg hip raise', 'http://d205bpvrqc9yn1.cloudfront.net/1764.gif', 4),
(833, 'hanging leg raise', 'http://d205bpvrqc9yn1.cloudfront.net/0472.gif', 4),
(834, 'hanging oblique knee raise', 'http://d205bpvrqc9yn1.cloudfront.net/1761.gif', 4),
(835, 'hanging pike', 'http://d205bpvrqc9yn1.cloudfront.net/0473.gif', 4),
(836, 'hanging straight leg hip raise', 'http://d205bpvrqc9yn1.cloudfront.net/0474.gif', 4),
(837, 'hanging straight leg raise', 'http://d205bpvrqc9yn1.cloudfront.net/0475.gif', 4),
(838, 'hanging straight twisting leg hip raise', 'http://d205bpvrqc9yn1.cloudfront.net/0476.gif', 4),
(839, 'high knee against wall', 'http://d205bpvrqc9yn1.cloudfront.net/3636.gif', 12),
(840, 'hip raise (bent knee)', 'http://d205bpvrqc9yn1.cloudfront.net/0484.gif', 4),
(841, 'hug keens to chest', 'http://d205bpvrqc9yn1.cloudfront.net/1418.gif', 9),
(842, 'hyght dumbbell fly', 'http://d205bpvrqc9yn1.cloudfront.net/3234.gif', 8),
(843, 'hyperextension', 'http://d205bpvrqc9yn1.cloudfront.net/0489.gif', 13),
(844, 'hyperextension (on bench)', 'http://d205bpvrqc9yn1.cloudfront.net/0488.gif', 13),
(845, 'impossible dips', 'http://d205bpvrqc9yn1.cloudfront.net/3289.gif', 2),
(846, 'inchworm', 'http://d205bpvrqc9yn1.cloudfront.net/1471.gif', 4),
(847, 'inchworm v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/3698.gif', 4),
(848, 'incline close-grip push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0490.gif', 2),
(849, 'incline leg hip raise (leg straight)', 'http://d205bpvrqc9yn1.cloudfront.net/0491.gif', 4),
(850, 'incline push up depth jump', 'http://d205bpvrqc9yn1.cloudfront.net/0492.gif', 8),
(851, 'incline push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0493.gif', 8),
(852, 'incline push-up (on box)', 'http://d205bpvrqc9yn1.cloudfront.net/3785.gif', 8),
(853, 'incline reverse grip push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0494.gif', 8),
(854, 'incline scapula push up', 'http://d205bpvrqc9yn1.cloudfront.net/3011.gif', 18),
(855, 'incline twisting sit-up', 'http://d205bpvrqc9yn1.cloudfront.net/0495.gif', 4),
(856, 'intermediate hip flexor and quad stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1564.gif', 5),
(857, 'inverse leg curl (bench support)', 'http://d205bpvrqc9yn1.cloudfront.net/0496.gif', 10),
(858, 'inverse leg curl (on pull-up cable machine)', 'http://d205bpvrqc9yn1.cloudfront.net/2400.gif', 10),
(859, 'inverted row', 'http://d205bpvrqc9yn1.cloudfront.net/0499.gif', 14),
(860, 'inverted row bent knees', 'http://d205bpvrqc9yn1.cloudfront.net/2300.gif', 14),
(861, 'inverted row on bench', 'http://d205bpvrqc9yn1.cloudfront.net/2298.gif', 14),
(862, 'inverted row v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0497.gif', 14),
(863, 'inverted row with straps', 'http://d205bpvrqc9yn1.cloudfront.net/0498.gif', 14),
(864, 'iron cross stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1419.gif', 9),
(865, 'isometric chest squeeze', 'http://d205bpvrqc9yn1.cloudfront.net/1297.gif', 8),
(866, 'isometric wipers', 'http://d205bpvrqc9yn1.cloudfront.net/0500.gif', 8),
(867, 'jack burpee', 'http://d205bpvrqc9yn1.cloudfront.net/0501.gif', 12),
(868, 'jack jump (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3224.gif', 12),
(869, 'jackknife sit-up', 'http://d205bpvrqc9yn1.cloudfront.net/0507.gif', 4),
(870, 'janda sit-up', 'http://d205bpvrqc9yn1.cloudfront.net/0508.gif', 4),
(871, 'jump rope', 'http://d205bpvrqc9yn1.cloudfront.net/2612.gif', 12),
(872, 'jump squat', 'http://d205bpvrqc9yn1.cloudfront.net/0514.gif', 9),
(873, 'jump squat v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0513.gif', 9),
(874, 'kettlebell advanced windmill', 'http://d205bpvrqc9yn1.cloudfront.net/0517.gif', 4),
(875, 'kettlebell alternating hang clean', 'http://d205bpvrqc9yn1.cloudfront.net/0518.gif', 16),
(876, 'kettlebell alternating press', 'http://d205bpvrqc9yn1.cloudfront.net/0520.gif', 15),
(877, 'kettlebell alternating press on floor', 'http://d205bpvrqc9yn1.cloudfront.net/0519.gif', 8),
(878, 'kettlebell alternating renegade row', 'http://d205bpvrqc9yn1.cloudfront.net/0521.gif', 14),
(879, 'kettlebell alternating row', 'http://d205bpvrqc9yn1.cloudfront.net/0522.gif', 14),
(880, 'kettlebell arnold press', 'http://d205bpvrqc9yn1.cloudfront.net/0523.gif', 15),
(881, 'kettlebell bent press', 'http://d205bpvrqc9yn1.cloudfront.net/0524.gif', 4),
(882, 'kettlebell bottoms up clean from the hang position', 'http://d205bpvrqc9yn1.cloudfront.net/0525.gif', 3),
(883, 'kettlebell double alternating hang clean', 'http://d205bpvrqc9yn1.cloudfront.net/0526.gif', 3),
(884, 'kettlebell double jerk', 'http://d205bpvrqc9yn1.cloudfront.net/0527.gif', 15),
(885, 'kettlebell double push press', 'http://d205bpvrqc9yn1.cloudfront.net/0528.gif', 15),
(886, 'kettlebell double snatch', 'http://d205bpvrqc9yn1.cloudfront.net/0529.gif', 15),
(887, 'kettlebell double windmill', 'http://d205bpvrqc9yn1.cloudfront.net/0530.gif', 4),
(888, 'kettlebell extended range one arm press on floor', 'http://d205bpvrqc9yn1.cloudfront.net/0531.gif', 8),
(889, 'kettlebell figure 8', 'http://d205bpvrqc9yn1.cloudfront.net/0532.gif', 4),
(890, 'kettlebell front squat', 'http://d205bpvrqc9yn1.cloudfront.net/0533.gif', 9),
(891, 'kettlebell goblet squat', 'http://d205bpvrqc9yn1.cloudfront.net/0534.gif', 9),
(892, 'kettlebell hang clean', 'http://d205bpvrqc9yn1.cloudfront.net/0535.gif', 10),
(893, 'kettlebell lunge pass through', 'http://d205bpvrqc9yn1.cloudfront.net/0536.gif', 9),
(894, 'kettlebell one arm clean and jerk', 'http://d205bpvrqc9yn1.cloudfront.net/0537.gif', 15),
(895, 'kettlebell one arm floor press', 'http://d205bpvrqc9yn1.cloudfront.net/1298.gif', 8),
(896, 'kettlebell one arm jerk', 'http://d205bpvrqc9yn1.cloudfront.net/0538.gif', 15),
(897, 'kettlebell one arm military press to the side', 'http://d205bpvrqc9yn1.cloudfront.net/0539.gif', 15),
(898, 'kettlebell one arm push press', 'http://d205bpvrqc9yn1.cloudfront.net/0540.gif', 15),
(899, 'kettlebell one arm row', 'http://d205bpvrqc9yn1.cloudfront.net/0541.gif', 14),
(900, 'kettlebell one arm snatch', 'http://d205bpvrqc9yn1.cloudfront.net/0542.gif', 15),
(901, 'kettlebell pirate supper legs', 'http://d205bpvrqc9yn1.cloudfront.net/0543.gif', 15),
(902, 'kettlebell pistol squat', 'http://d205bpvrqc9yn1.cloudfront.net/0544.gif', 9),
(903, 'kettlebell plyo push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0545.gif', 8),
(904, 'kettlebell seated press', 'http://d205bpvrqc9yn1.cloudfront.net/0546.gif', 15),
(905, 'kettlebell seated two arm military press', 'http://d205bpvrqc9yn1.cloudfront.net/1438.gif', 15),
(906, 'kettlebell seesaw press', 'http://d205bpvrqc9yn1.cloudfront.net/0547.gif', 15),
(907, 'kettlebell sumo high pull', 'http://d205bpvrqc9yn1.cloudfront.net/0548.gif', 17),
(908, 'kettlebell swing', 'http://d205bpvrqc9yn1.cloudfront.net/0549.gif', 9),
(909, 'kettlebell thruster', 'http://d205bpvrqc9yn1.cloudfront.net/0550.gif', 15),
(910, 'kettlebell turkish get up (squat style)', 'http://d205bpvrqc9yn1.cloudfront.net/0551.gif', 9),
(911, 'kettlebell two arm clean', 'http://d205bpvrqc9yn1.cloudfront.net/0552.gif', 15),
(912, 'kettlebell two arm military press', 'http://d205bpvrqc9yn1.cloudfront.net/0553.gif', 15),
(913, 'kettlebell two arm row', 'http://d205bpvrqc9yn1.cloudfront.net/1345.gif', 14),
(914, 'kettlebell windmill', 'http://d205bpvrqc9yn1.cloudfront.net/0554.gif', 4),
(915, 'kick out sit', 'http://d205bpvrqc9yn1.cloudfront.net/0555.gif', 10),
(916, 'kipping muscle up', 'http://d205bpvrqc9yn1.cloudfront.net/0558.gif', 6),
(917, 'knee touch crunch', 'http://d205bpvrqc9yn1.cloudfront.net/3640.gif', 4),
(918, 'kneeling jump squat', 'http://d205bpvrqc9yn1.cloudfront.net/1420.gif', 9),
(919, 'kneeling lat stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1346.gif', 6),
(920, 'kneeling plank tap shoulder (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3239.gif', 4),
(921, 'kneeling push-up (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3211.gif', 8),
(922, 'korean dips', 'http://d205bpvrqc9yn1.cloudfront.net/3288.gif', 8),
(923, 'l-pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/3418.gif', 6),
(924, 'l-sit on floor', 'http://d205bpvrqc9yn1.cloudfront.net/3419.gif', 4),
(925, 'landmine 180', 'http://d205bpvrqc9yn1.cloudfront.net/0562.gif', 4),
(926, 'landmine lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/3237.gif', 15),
(927, 'lean planche', 'http://d205bpvrqc9yn1.cloudfront.net/3300.gif', 4),
(928, 'left hook. boxing', 'http://d205bpvrqc9yn1.cloudfront.net/2271.gif', 15),
(929, 'leg pull in flat bench', 'http://d205bpvrqc9yn1.cloudfront.net/0570.gif', 4),
(930, 'leg up hamstring stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1576.gif', 10),
(931, 'lever alternate leg press ', 'http://d205bpvrqc9yn1.cloudfront.net/2287.gif', 5),
(932, 'lever alternating narrow grip seated row ', 'http://d205bpvrqc9yn1.cloudfront.net/0571.gif', 14),
(933, 'lever assisted chin-up', 'http://d205bpvrqc9yn1.cloudfront.net/0572.gif', 6),
(934, 'lever back extension', 'http://d205bpvrqc9yn1.cloudfront.net/0573.gif', 13),
(935, 'lever bent over row ', 'http://d205bpvrqc9yn1.cloudfront.net/0574.gif', 14),
(936, 'lever bent-over row with v-bar ', 'http://d205bpvrqc9yn1.cloudfront.net/3200.gif', 14),
(937, 'lever bicep curl', 'http://d205bpvrqc9yn1.cloudfront.net/0575.gif', 3),
(938, 'lever calf press ', 'http://d205bpvrqc9yn1.cloudfront.net/2289.gif', 7),
(939, 'lever chest press', 'http://d205bpvrqc9yn1.cloudfront.net/0577.gif', 8),
(940, 'lever chest press ', 'http://d205bpvrqc9yn1.cloudfront.net/0576.gif', 8),
(941, 'lever chest press v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/1455.gif', 8),
(942, 'lever deadlift ', 'http://d205bpvrqc9yn1.cloudfront.net/0578.gif', 9),
(943, 'lever decline chest press', 'http://d205bpvrqc9yn1.cloudfront.net/1300.gif', 8),
(944, 'lever donkey calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1253.gif', 7),
(945, 'lever front pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0579.gif', 6),
(946, 'lever gripless shrug', 'http://d205bpvrqc9yn1.cloudfront.net/0580.gif', 17),
(947, 'lever gripless shrug v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/1439.gif', 17),
(948, 'lever gripper hands ', 'http://d205bpvrqc9yn1.cloudfront.net/2288.gif', 16),
(949, 'lever hammer grip preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1615.gif', 3),
(950, 'lever high row ', 'http://d205bpvrqc9yn1.cloudfront.net/0581.gif', 14),
(951, 'lever hip extension v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/2286.gif', 9),
(952, 'lever horizontal one leg press', 'http://d205bpvrqc9yn1.cloudfront.net/2611.gif', 9),
(953, 'lever incline chest press', 'http://d205bpvrqc9yn1.cloudfront.net/1299.gif', 8),
(954, 'lever incline chest press v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/1479.gif', 8),
(955, 'lever kneeling leg curl ', 'http://d205bpvrqc9yn1.cloudfront.net/0582.gif', 10),
(956, 'lever kneeling twist', 'http://d205bpvrqc9yn1.cloudfront.net/0583.gif', 4),
(957, 'lever lateral raise', 'http://d205bpvrqc9yn1.cloudfront.net/0584.gif', 15),
(958, 'lever leg extension', 'http://d205bpvrqc9yn1.cloudfront.net/0585.gif', 5),
(959, 'lever lying leg curl', 'http://d205bpvrqc9yn1.cloudfront.net/0586.gif', 10),
(960, 'lever lying two-one leg curl', 'http://d205bpvrqc9yn1.cloudfront.net/3195.gif', 10),
(961, 'lever military press ', 'http://d205bpvrqc9yn1.cloudfront.net/0587.gif', 15),
(962, 'lever narrow grip seated row ', 'http://d205bpvrqc9yn1.cloudfront.net/0588.gif', 14),
(963, 'lever one arm bent over row ', 'http://d205bpvrqc9yn1.cloudfront.net/0589.gif', 14),
(964, 'lever one arm lateral high row', 'http://d205bpvrqc9yn1.cloudfront.net/1356.gif', 14),
(965, 'lever one arm lateral wide pulldown ', 'http://d205bpvrqc9yn1.cloudfront.net/1347.gif', 6),
(966, 'lever one arm shoulder press ', 'http://d205bpvrqc9yn1.cloudfront.net/0590.gif', 15),
(967, 'lever overhand triceps dip', 'http://d205bpvrqc9yn1.cloudfront.net/0591.gif', 2),
(968, 'lever preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/0592.gif', 3),
(969, 'lever preacher curl v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/1614.gif', 3),
(970, 'lever pullover ', 'http://d205bpvrqc9yn1.cloudfront.net/2285.gif', 6),
(971, 'lever reverse grip lateral pulldown ', 'http://d205bpvrqc9yn1.cloudfront.net/2736.gif', 6),
(972, 'lever reverse grip preacher curl', 'http://d205bpvrqc9yn1.cloudfront.net/1616.gif', 3),
(973, 'lever reverse grip vertical row', 'http://d205bpvrqc9yn1.cloudfront.net/1348.gif', 14),
(974, 'lever reverse hyperextension ', 'http://d205bpvrqc9yn1.cloudfront.net/0593.gif', 9),
(975, 'lever reverse t-bar row', 'http://d205bpvrqc9yn1.cloudfront.net/1349.gif', 14),
(976, 'lever rotary calf', 'http://d205bpvrqc9yn1.cloudfront.net/2315.gif', 7),
(977, 'lever seated calf press', 'http://d205bpvrqc9yn1.cloudfront.net/2335.gif', 7),
(978, 'lever seated calf raise ', 'http://d205bpvrqc9yn1.cloudfront.net/0594.gif', 7),
(979, 'lever seated crunch', 'http://d205bpvrqc9yn1.cloudfront.net/1452.gif', 4),
(980, 'lever seated crunch (chest pad)', 'http://d205bpvrqc9yn1.cloudfront.net/0595.gif', 4),
(981, 'lever seated crunch v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/3760.gif', 4),
(982, 'lever seated dip', 'http://d205bpvrqc9yn1.cloudfront.net/1451.gif', 2),
(983, 'lever seated fly', 'http://d205bpvrqc9yn1.cloudfront.net/0596.gif', 8),
(984, 'lever seated good morning', 'http://d205bpvrqc9yn1.cloudfront.net/3759.gif', 9),
(985, 'lever seated hip abduction', 'http://d205bpvrqc9yn1.cloudfront.net/0597.gif', 19),
(986, 'lever seated hip adduction', 'http://d205bpvrqc9yn1.cloudfront.net/0598.gif', 11),
(987, 'lever seated leg curl', 'http://d205bpvrqc9yn1.cloudfront.net/0599.gif', 10),
(988, 'lever seated leg raise crunch ', 'http://d205bpvrqc9yn1.cloudfront.net/0600.gif', 4),
(989, 'lever seated reverse fly', 'http://d205bpvrqc9yn1.cloudfront.net/0602.gif', 15),
(990, 'lever seated reverse fly (parallel grip)', 'http://d205bpvrqc9yn1.cloudfront.net/0601.gif', 15),
(991, 'lever seated row', 'http://d205bpvrqc9yn1.cloudfront.net/1350.gif', 14),
(992, 'lever seated shoulder press', 'http://d205bpvrqc9yn1.cloudfront.net/1454.gif', 15),
(993, 'lever seated squat calf raise on leg press machine', 'http://d205bpvrqc9yn1.cloudfront.net/1385.gif', 7),
(994, 'lever seated twist', 'http://d205bpvrqc9yn1.cloudfront.net/1453.gif', 4),
(995, 'lever shoulder press ', 'http://d205bpvrqc9yn1.cloudfront.net/0603.gif', 15),
(996, 'lever shoulder press v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0869.gif', 15),
(997, 'lever shoulder press v. 3', 'http://d205bpvrqc9yn1.cloudfront.net/2318.gif', 15),
(998, 'lever shrug ', 'http://d205bpvrqc9yn1.cloudfront.net/0604.gif', 17),
(999, 'lever standing calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0605.gif', 7),
(1000, 'lever standing chest press', 'http://d205bpvrqc9yn1.cloudfront.net/3758.gif', 8),
(1001, 'lever t bar row ', 'http://d205bpvrqc9yn1.cloudfront.net/0606.gif', 14),
(1002, 'lever t-bar reverse grip row', 'http://d205bpvrqc9yn1.cloudfront.net/1351.gif', 14),
(1003, 'lever triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0607.gif', 2),
(1004, 'lever unilateral row', 'http://d205bpvrqc9yn1.cloudfront.net/1313.gif', 14),
(1005, 'london bridge', 'http://d205bpvrqc9yn1.cloudfront.net/0609.gif', 14),
(1006, 'low glute bridge on floor', 'http://d205bpvrqc9yn1.cloudfront.net/3013.gif', 9),
(1007, 'lower back curl', 'http://d205bpvrqc9yn1.cloudfront.net/1352.gif', 13),
(1008, 'lunge with jump', 'http://d205bpvrqc9yn1.cloudfront.net/3582.gif', 9),
(1009, 'lunge with twist', 'http://d205bpvrqc9yn1.cloudfront.net/1688.gif', 4),
(1010, 'lying (side) quads stretch', 'http://d205bpvrqc9yn1.cloudfront.net/0613.gif', 5),
(1011, 'lying elbow to knee', 'http://d205bpvrqc9yn1.cloudfront.net/2312.gif', 4),
(1012, 'lying leg raise flat bench', 'http://d205bpvrqc9yn1.cloudfront.net/0620.gif', 4),
(1013, 'lying leg-hip raise', 'http://d205bpvrqc9yn1.cloudfront.net/0865.gif', 4),
(1014, 'machine inner chest press', 'http://d205bpvrqc9yn1.cloudfront.net/1301.gif', 8),
(1015, 'march sit (wall)', 'http://d205bpvrqc9yn1.cloudfront.net/0624.gif', 9),
(1016, 'medicine ball catch and overhead throw', 'http://d205bpvrqc9yn1.cloudfront.net/1353.gif', 6),
(1017, 'medicine ball chest pass', 'http://d205bpvrqc9yn1.cloudfront.net/1302.gif', 8),
(1018, 'medicine ball chest push from 3 point stance', 'http://d205bpvrqc9yn1.cloudfront.net/1303.gif', 8),
(1019, 'medicine ball chest push multiple response', 'http://d205bpvrqc9yn1.cloudfront.net/1304.gif', 8),
(1020, 'medicine ball chest push single response', 'http://d205bpvrqc9yn1.cloudfront.net/1305.gif', 8),
(1021, 'medicine ball chest push with run release', 'http://d205bpvrqc9yn1.cloudfront.net/1312.gif', 8),
(1022, 'medicine ball close grip push up', 'http://d205bpvrqc9yn1.cloudfront.net/1701.gif', 2),
(1023, 'medicine ball overhead slam', 'http://d205bpvrqc9yn1.cloudfront.net/1354.gif', 14),
(1024, 'medicine ball supine chest throw', 'http://d205bpvrqc9yn1.cloudfront.net/1750.gif', 2),
(1025, 'mixed grip chin-up', 'http://d205bpvrqc9yn1.cloudfront.net/0627.gif', 6),
(1026, 'modified hindu push-up (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3217.gif', 8),
(1027, 'modified push up to lower arms', 'http://d205bpvrqc9yn1.cloudfront.net/1421.gif', 16),
(1028, 'monster walk', 'http://d205bpvrqc9yn1.cloudfront.net/0628.gif', 9),
(1029, 'mountain climber', 'http://d205bpvrqc9yn1.cloudfront.net/0630.gif', 12),
(1030, 'muscle up', 'http://d205bpvrqc9yn1.cloudfront.net/0631.gif', 6),
(1031, 'muscle-up (on vertical bar)', 'http://d205bpvrqc9yn1.cloudfront.net/1401.gif', 6),
(1032, 'narrow push-up on exercise ball', 'http://d205bpvrqc9yn1.cloudfront.net/2328.gif', 2),
(1033, 'neck side stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1403.gif', 20),
(1034, 'negative crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0634.gif', 4),
(1035, 'oblique crunch v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/1495.gif', 4),
(1036, 'oblique crunches floor', 'http://d205bpvrqc9yn1.cloudfront.net/0635.gif', 4),
(1037, 'olympic barbell hammer curl', 'http://d205bpvrqc9yn1.cloudfront.net/0636.gif', 3),
(1038, 'olympic barbell triceps extension', 'http://d205bpvrqc9yn1.cloudfront.net/0637.gif', 2),
(1039, 'one arm against wall', 'http://d205bpvrqc9yn1.cloudfront.net/1355.gif', 6),
(1040, 'one arm chin-up', 'http://d205bpvrqc9yn1.cloudfront.net/0638.gif', 6),
(1041, 'one arm dip', 'http://d205bpvrqc9yn1.cloudfront.net/0639.gif', 2),
(1042, 'one arm slam (with medicine ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0640.gif', 4),
(1043, 'one arm towel row', 'http://d205bpvrqc9yn1.cloudfront.net/1773.gif', 14),
(1044, 'one leg donkey calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1386.gif', 7),
(1045, 'one leg floor calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1387.gif', 7),
(1046, 'one leg squat', 'http://d205bpvrqc9yn1.cloudfront.net/1476.gif', 9),
(1047, 'otis up', 'http://d205bpvrqc9yn1.cloudfront.net/0641.gif', 4),
(1048, 'outside leg kick push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0642.gif', 9),
(1049, 'overhead triceps stretch', 'http://d205bpvrqc9yn1.cloudfront.net/0643.gif', 2),
(1050, 'pelvic tilt', 'http://d205bpvrqc9yn1.cloudfront.net/3147.gif', 4),
(1051, 'pelvic tilt into bridge', 'http://d205bpvrqc9yn1.cloudfront.net/1422.gif', 9),
(1052, 'peroneals stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1388.gif', 7),
(1053, 'pike-to-cobra push-up', 'http://d205bpvrqc9yn1.cloudfront.net/3662.gif', 9),
(1054, 'plyo push up', 'http://d205bpvrqc9yn1.cloudfront.net/1306.gif', 8),
(1055, 'posterior step to overhead reach', 'http://d205bpvrqc9yn1.cloudfront.net/1687.gif', 4),
(1056, 'posterior tibialis stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1389.gif', 7),
(1057, 'potty squat', 'http://d205bpvrqc9yn1.cloudfront.net/3119.gif', 4),
(1058, 'potty squat with support', 'http://d205bpvrqc9yn1.cloudfront.net/3132.gif', 9),
(1059, 'power clean', 'http://d205bpvrqc9yn1.cloudfront.net/0648.gif', 10),
(1060, 'power point plank', 'http://d205bpvrqc9yn1.cloudfront.net/3665.gif', 4),
(1061, 'prisoner half sit-up (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3203.gif', 4),
(1062, 'prone twist on stability ball', 'http://d205bpvrqc9yn1.cloudfront.net/1707.gif', 4),
(1063, 'pull up (neutral grip)', 'http://d205bpvrqc9yn1.cloudfront.net/0651.gif', 6),
(1064, 'pull-in (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0650.gif', 4),
(1065, 'pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/0652.gif', 6),
(1066, 'push and pull bodyweight', 'http://d205bpvrqc9yn1.cloudfront.net/1689.gif', 8),
(1067, 'push to run', 'http://d205bpvrqc9yn1.cloudfront.net/3638.gif', 12),
(1068, 'push up on bosu ball', 'http://d205bpvrqc9yn1.cloudfront.net/1307.gif', 8),
(1069, 'push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0662.gif', 8),
(1070, 'push-up (bosu ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0653.gif', 8),
(1071, 'push-up (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0655.gif', 8),
(1072, 'push-up (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0656.gif', 8),
(1073, 'push-up (wall)', 'http://d205bpvrqc9yn1.cloudfront.net/0659.gif', 8),
(1074, 'push-up (wall) v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0658.gif', 8),
(1075, 'push-up close-grip off dumbbell', 'http://d205bpvrqc9yn1.cloudfront.net/0660.gif', 2),
(1076, 'push-up inside leg kick', 'http://d205bpvrqc9yn1.cloudfront.net/0661.gif', 9),
(1077, 'push-up medicine ball', 'http://d205bpvrqc9yn1.cloudfront.net/0663.gif', 8),
(1078, 'push-up on lower arms', 'http://d205bpvrqc9yn1.cloudfront.net/1467.gif', 2),
(1079, 'push-up plus', 'http://d205bpvrqc9yn1.cloudfront.net/3145.gif', 8),
(1080, 'push-up to side plank', 'http://d205bpvrqc9yn1.cloudfront.net/0664.gif', 4),
(1081, 'quads', 'http://d205bpvrqc9yn1.cloudfront.net/3533.gif', 5),
(1082, 'quarter sit-up', 'http://d205bpvrqc9yn1.cloudfront.net/3201.gif', 4),
(1083, 'quick feet v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/3552.gif', 5),
(1084, 'raise single arm push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0666.gif', 8),
(1085, 'rear decline bridge', 'http://d205bpvrqc9yn1.cloudfront.net/0668.gif', 9),
(1086, 'rear deltoid stretch', 'http://d205bpvrqc9yn1.cloudfront.net/0669.gif', 15),
(1087, 'rear pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/0670.gif', 6),
(1088, 'reclining big toe pose with rope', 'http://d205bpvrqc9yn1.cloudfront.net/1582.gif', 10),
(1089, 'resistance band hip thrusts on knees (female)', 'http://d205bpvrqc9yn1.cloudfront.net/3236.gif', 9),
(1090, 'resistance band leg extension', 'http://d205bpvrqc9yn1.cloudfront.net/3007.gif', 5),
(1091, 'resistance band seated biceps curl', 'http://d205bpvrqc9yn1.cloudfront.net/3123.gif', 3),
(1092, 'resistance band seated chest press', 'http://d205bpvrqc9yn1.cloudfront.net/3124.gif', 8),
(1093, 'resistance band seated hip abduction', 'http://d205bpvrqc9yn1.cloudfront.net/3006.gif', 19),
(1094, 'resistance band seated shoulder press', 'http://d205bpvrqc9yn1.cloudfront.net/3122.gif', 15),
(1095, 'resistance band seated straight back row', 'http://d205bpvrqc9yn1.cloudfront.net/3144.gif', 14),
(1096, 'reverse crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0872.gif', 4),
(1097, 'reverse dip', 'http://d205bpvrqc9yn1.cloudfront.net/0672.gif', 2),
(1098, 'reverse grip machine lat pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0673.gif', 6),
(1099, 'reverse grip pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/0674.gif', 6),
(1100, 'reverse hyper extension (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0675.gif', 9),
(1101, 'reverse hyper on flat bench', 'http://d205bpvrqc9yn1.cloudfront.net/1423.gif', 9),
(1102, 'reverse plank with leg lift', 'http://d205bpvrqc9yn1.cloudfront.net/3663.gif', 4),
(1103, 'ring dips', 'http://d205bpvrqc9yn1.cloudfront.net/0677.gif', 2),
(1104, 'rocking frog stretch', 'http://d205bpvrqc9yn1.cloudfront.net/2571.gif', 9),
(1105, 'rocky pull-up pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0678.gif', 6),
(1106, 'roller back stretch', 'http://d205bpvrqc9yn1.cloudfront.net/2208.gif', 13),
(1107, 'roller body saw', 'http://d205bpvrqc9yn1.cloudfront.net/2204.gif', 4),
(1108, 'roller hip lat stretch', 'http://d205bpvrqc9yn1.cloudfront.net/2205.gif', 9),
(1109, 'roller hip stretch', 'http://d205bpvrqc9yn1.cloudfront.net/2202.gif', 9),
(1110, 'roller reverse crunch', 'http://d205bpvrqc9yn1.cloudfront.net/2206.gif', 4),
(1111, 'roller seated shoulder flexor depresor retractor', 'http://d205bpvrqc9yn1.cloudfront.net/2203.gif', 8),
(1112, 'roller seated single leg shoulder flexor depresor ', 'http://d205bpvrqc9yn1.cloudfront.net/2209.gif', 8),
(1113, 'roller side lat stretch', 'http://d205bpvrqc9yn1.cloudfront.net/2207.gif', 6),
(1114, 'rope climb', 'http://d205bpvrqc9yn1.cloudfront.net/0680.gif', 14),
(1115, 'run', 'http://d205bpvrqc9yn1.cloudfront.net/0685.gif', 12),
(1116, 'run (equipment)', 'http://d205bpvrqc9yn1.cloudfront.net/0684.gif', 12),
(1117, 'runners stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1585.gif', 10),
(1118, 'russian twist', 'http://d205bpvrqc9yn1.cloudfront.net/0687.gif', 4),
(1119, 'scapula dips', 'http://d205bpvrqc9yn1.cloudfront.net/3012.gif', 17),
(1120, 'scapula push-up', 'http://d205bpvrqc9yn1.cloudfront.net/3021.gif', 18),
(1121, 'scapular pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/0688.gif', 17),
(1122, 'scissor jumps (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3219.gif', 12),
(1123, 'seated calf stretch (male)', 'http://d205bpvrqc9yn1.cloudfront.net/1390.gif', 7),
(1124, 'seated glute stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1424.gif', 9),
(1125, 'seated leg raise', 'http://d205bpvrqc9yn1.cloudfront.net/0689.gif', 4),
(1126, 'seated lower back stretch', 'http://d205bpvrqc9yn1.cloudfront.net/0690.gif', 6),
(1127, 'seated piriformis stretch', 'http://d205bpvrqc9yn1.cloudfront.net/2567.gif', 9),
(1128, 'seated side crunch (wall)', 'http://d205bpvrqc9yn1.cloudfront.net/0691.gif', 4),
(1129, 'seated wide angle pose sequence', 'http://d205bpvrqc9yn1.cloudfront.net/1587.gif', 10);
INSERT INTO `exercicecatalogue` (`idexercicecatalogue`, `nom`, `image`, `idcategorie`) VALUES
(1130, 'self assisted inverse leg curl', 'http://d205bpvrqc9yn1.cloudfront.net/0697.gif', 10),
(1131, 'self assisted inverse leg curl', 'http://d205bpvrqc9yn1.cloudfront.net/1766.gif', 10),
(1132, 'self assisted inverse leg curl (on floor)', 'http://d205bpvrqc9yn1.cloudfront.net/0696.gif', 10),
(1133, 'semi squat jump (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3222.gif', 12),
(1134, 'short stride run', 'http://d205bpvrqc9yn1.cloudfront.net/3656.gif', 12),
(1135, 'shoulder grip pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/1763.gif', 6),
(1136, 'shoulder tap', 'http://d205bpvrqc9yn1.cloudfront.net/3699.gif', 4),
(1137, 'shoulder tap push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0699.gif', 8),
(1138, 'side bridge hip abduction', 'http://d205bpvrqc9yn1.cloudfront.net/1774.gif', 19),
(1139, 'side bridge v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0705.gif', 4),
(1140, 'side hip (on parallel bars)', 'http://d205bpvrqc9yn1.cloudfront.net/0709.gif', 4),
(1141, 'side hip abduction', 'http://d205bpvrqc9yn1.cloudfront.net/0710.gif', 19),
(1142, 'side lying floor stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1358.gif', 6),
(1143, 'side lying hip adduction (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3667.gif', 11),
(1144, 'side plank hip adduction', 'http://d205bpvrqc9yn1.cloudfront.net/1775.gif', 11),
(1145, 'side push neck stretch', 'http://d205bpvrqc9yn1.cloudfront.net/0716.gif', 20),
(1146, 'side push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0717.gif', 2),
(1147, 'side wrist pull stretch', 'http://d205bpvrqc9yn1.cloudfront.net/0721.gif', 16),
(1148, 'side-to-side chin', 'http://d205bpvrqc9yn1.cloudfront.net/0720.gif', 6),
(1149, 'side-to-side toe touch (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3213.gif', 4),
(1150, 'single arm push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0725.gif', 8),
(1151, 'single leg bridge with outstretched leg', 'http://d205bpvrqc9yn1.cloudfront.net/3645.gif', 9),
(1152, 'single leg calf raise (on a dumbbell)', 'http://d205bpvrqc9yn1.cloudfront.net/0727.gif', 7),
(1153, 'single leg platform slide', 'http://d205bpvrqc9yn1.cloudfront.net/0730.gif', 10),
(1154, 'single leg squat (pistol) male', 'http://d205bpvrqc9yn1.cloudfront.net/1759.gif', 9),
(1155, 'sissy squat', 'http://d205bpvrqc9yn1.cloudfront.net/1489.gif', 5),
(1156, 'sit-up v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/0735.gif', 4),
(1157, 'sit-up with arms on chest', 'http://d205bpvrqc9yn1.cloudfront.net/3679.gif', 4),
(1158, 'skater hops', 'http://d205bpvrqc9yn1.cloudfront.net/3361.gif', 12),
(1159, 'ski ergometer', 'http://d205bpvrqc9yn1.cloudfront.net/2142.gif', 2),
(1160, 'ski step', 'http://d205bpvrqc9yn1.cloudfront.net/3671.gif', 12),
(1161, 'skin the cat', 'http://d205bpvrqc9yn1.cloudfront.net/3304.gif', 14),
(1162, 'sled 45 degrees one leg press', 'http://d205bpvrqc9yn1.cloudfront.net/1425.gif', 9),
(1163, 'sled 45в° calf press', 'http://d205bpvrqc9yn1.cloudfront.net/0738.gif', 7),
(1164, 'sled 45в° leg press', 'http://d205bpvrqc9yn1.cloudfront.net/0739.gif', 9),
(1165, 'sled 45в° leg press (back pov)', 'http://d205bpvrqc9yn1.cloudfront.net/1464.gif', 9),
(1166, 'sled 45в° leg press (side pov)', 'http://d205bpvrqc9yn1.cloudfront.net/1463.gif', 9),
(1167, 'sled 45в° leg wide press', 'http://d205bpvrqc9yn1.cloudfront.net/0740.gif', 9),
(1168, 'sled calf press on leg press', 'http://d205bpvrqc9yn1.cloudfront.net/1391.gif', 7),
(1169, 'sled closer hack squat', 'http://d205bpvrqc9yn1.cloudfront.net/0741.gif', 9),
(1170, 'sled forward angled calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0742.gif', 7),
(1171, 'sled hack squat', 'http://d205bpvrqc9yn1.cloudfront.net/0743.gif', 9),
(1172, 'sled lying calf press', 'http://d205bpvrqc9yn1.cloudfront.net/2334.gif', 7),
(1173, 'sled lying squat', 'http://d205bpvrqc9yn1.cloudfront.net/0744.gif', 9),
(1174, 'sled one leg calf press on leg press', 'http://d205bpvrqc9yn1.cloudfront.net/1392.gif', 7),
(1175, 'sledge hammer', 'http://d205bpvrqc9yn1.cloudfront.net/1496.gif', 4),
(1176, 'smith back shrug', 'http://d205bpvrqc9yn1.cloudfront.net/0746.gif', 17),
(1177, 'smith behind neck press', 'http://d205bpvrqc9yn1.cloudfront.net/0747.gif', 15),
(1178, 'smith bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0748.gif', 8),
(1179, 'smith bent knee good morning', 'http://d205bpvrqc9yn1.cloudfront.net/0749.gif', 9),
(1180, 'smith bent over row', 'http://d205bpvrqc9yn1.cloudfront.net/1359.gif', 14),
(1181, 'smith chair squat', 'http://d205bpvrqc9yn1.cloudfront.net/0750.gif', 5),
(1182, 'smith close-grip bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0751.gif', 2),
(1183, 'smith deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/0752.gif', 9),
(1184, 'smith decline bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0753.gif', 8),
(1185, 'smith decline reverse-grip press', 'http://d205bpvrqc9yn1.cloudfront.net/0754.gif', 8),
(1186, 'smith front squat (clean grip)', 'http://d205bpvrqc9yn1.cloudfront.net/1433.gif', 9),
(1187, 'smith full squat', 'http://d205bpvrqc9yn1.cloudfront.net/3281.gif', 9),
(1188, 'smith hack squat', 'http://d205bpvrqc9yn1.cloudfront.net/0755.gif', 9),
(1189, 'smith hip raise', 'http://d205bpvrqc9yn1.cloudfront.net/0756.gif', 4),
(1190, 'smith incline bench press', 'http://d205bpvrqc9yn1.cloudfront.net/0757.gif', 8),
(1191, 'smith incline reverse-grip press', 'http://d205bpvrqc9yn1.cloudfront.net/0758.gif', 8),
(1192, 'smith incline shoulder raises', 'http://d205bpvrqc9yn1.cloudfront.net/0759.gif', 18),
(1193, 'smith leg press', 'http://d205bpvrqc9yn1.cloudfront.net/0760.gif', 9),
(1194, 'smith low bar squat', 'http://d205bpvrqc9yn1.cloudfront.net/1434.gif', 9),
(1195, 'smith machine bicep curl', 'http://d205bpvrqc9yn1.cloudfront.net/1683.gif', 3),
(1196, 'smith machine decline close grip bench press', 'http://d205bpvrqc9yn1.cloudfront.net/1625.gif', 2),
(1197, 'smith machine incline tricep extension', 'http://d205bpvrqc9yn1.cloudfront.net/1752.gif', 2),
(1198, 'smith machine reverse decline close grip bench pre', 'http://d205bpvrqc9yn1.cloudfront.net/1626.gif', 8),
(1199, 'smith narrow row', 'http://d205bpvrqc9yn1.cloudfront.net/0761.gif', 14),
(1200, 'smith one arm row', 'http://d205bpvrqc9yn1.cloudfront.net/1360.gif', 14),
(1201, 'smith one leg floor calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1393.gif', 7),
(1202, 'smith rear delt row', 'http://d205bpvrqc9yn1.cloudfront.net/0762.gif', 15),
(1203, 'smith reverse calf raises', 'http://d205bpvrqc9yn1.cloudfront.net/0763.gif', 7),
(1204, 'smith reverse calf raises', 'http://d205bpvrqc9yn1.cloudfront.net/1394.gif', 7),
(1205, 'smith reverse grip bent over row', 'http://d205bpvrqc9yn1.cloudfront.net/1361.gif', 14),
(1206, 'smith reverse-grip press', 'http://d205bpvrqc9yn1.cloudfront.net/0764.gif', 8),
(1207, 'smith seated one leg calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/1395.gif', 7),
(1208, 'smith seated shoulder press', 'http://d205bpvrqc9yn1.cloudfront.net/0765.gif', 15),
(1209, 'smith seated wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/1426.gif', 16),
(1210, 'smith shoulder press', 'http://d205bpvrqc9yn1.cloudfront.net/0766.gif', 15),
(1211, 'smith shrug', 'http://d205bpvrqc9yn1.cloudfront.net/0767.gif', 17),
(1212, 'smith single leg split squat', 'http://d205bpvrqc9yn1.cloudfront.net/0768.gif', 5),
(1213, 'smith sprint lunge', 'http://d205bpvrqc9yn1.cloudfront.net/0769.gif', 9),
(1214, 'smith squat', 'http://d205bpvrqc9yn1.cloudfront.net/0770.gif', 9),
(1215, 'smith standing back wrist curl', 'http://d205bpvrqc9yn1.cloudfront.net/0771.gif', 16),
(1216, 'smith standing behind head military press', 'http://d205bpvrqc9yn1.cloudfront.net/0772.gif', 15),
(1217, 'smith standing leg calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0773.gif', 7),
(1218, 'smith standing military press', 'http://d205bpvrqc9yn1.cloudfront.net/0774.gif', 15),
(1219, 'smith sumo squat', 'http://d205bpvrqc9yn1.cloudfront.net/3142.gif', 9),
(1220, 'smith toe raise', 'http://d205bpvrqc9yn1.cloudfront.net/1396.gif', 7),
(1221, 'smith upright row', 'http://d205bpvrqc9yn1.cloudfront.net/0775.gif', 15),
(1222, 'smith wide grip bench press', 'http://d205bpvrqc9yn1.cloudfront.net/1308.gif', 8),
(1223, 'smith wide grip decline bench press', 'http://d205bpvrqc9yn1.cloudfront.net/1309.gif', 8),
(1224, 'snatch pull', 'http://d205bpvrqc9yn1.cloudfront.net/0776.gif', 5),
(1225, 'spell caster', 'http://d205bpvrqc9yn1.cloudfront.net/0777.gif', 4),
(1226, 'sphinx', 'http://d205bpvrqc9yn1.cloudfront.net/1362.gif', 13),
(1227, 'spider crawl push up', 'http://d205bpvrqc9yn1.cloudfront.net/0778.gif', 9),
(1228, 'spine stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1363.gif', 13),
(1229, 'spine twist', 'http://d205bpvrqc9yn1.cloudfront.net/2329.gif', 4),
(1230, 'split squats', 'http://d205bpvrqc9yn1.cloudfront.net/2368.gif', 5),
(1231, 'squat jerk', 'http://d205bpvrqc9yn1.cloudfront.net/0786.gif', 5),
(1232, 'squat on bosu ball', 'http://d205bpvrqc9yn1.cloudfront.net/1705.gif', 5),
(1233, 'squat to overhead reach', 'http://d205bpvrqc9yn1.cloudfront.net/1685.gif', 5),
(1234, 'squat to overhead reach with twist', 'http://d205bpvrqc9yn1.cloudfront.net/1686.gif', 5),
(1235, 'stability ball crunch (full range hands behind hea', 'http://d205bpvrqc9yn1.cloudfront.net/2297.gif', 4),
(1236, 'stalder press', 'http://d205bpvrqc9yn1.cloudfront.net/3291.gif', 2),
(1237, 'standing archer', 'http://d205bpvrqc9yn1.cloudfront.net/3669.gif', 14),
(1238, 'standing behind neck press', 'http://d205bpvrqc9yn1.cloudfront.net/0788.gif', 15),
(1239, 'standing calf raise (on a staircase)', 'http://d205bpvrqc9yn1.cloudfront.net/1490.gif', 7),
(1240, 'standing calves', 'http://d205bpvrqc9yn1.cloudfront.net/1397.gif', 7),
(1241, 'standing calves calf stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1398.gif', 7),
(1242, 'standing hamstring and calf stretch with strap', 'http://d205bpvrqc9yn1.cloudfront.net/1599.gif', 10),
(1243, 'standing lateral stretch', 'http://d205bpvrqc9yn1.cloudfront.net/0794.gif', 6),
(1244, 'standing pelvic tilt', 'http://d205bpvrqc9yn1.cloudfront.net/1364.gif', 13),
(1245, 'standing single leg curl', 'http://d205bpvrqc9yn1.cloudfront.net/0795.gif', 10),
(1246, 'standing wheel rollerout', 'http://d205bpvrqc9yn1.cloudfront.net/0796.gif', 4),
(1247, 'star jump (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3223.gif', 12),
(1248, 'stationary bike run v. 3', 'http://d205bpvrqc9yn1.cloudfront.net/2138.gif', 12),
(1249, 'stationary bike walk', 'http://d205bpvrqc9yn1.cloudfront.net/0798.gif', 12),
(1250, 'straddle maltese', 'http://d205bpvrqc9yn1.cloudfront.net/3314.gif', 4),
(1251, 'straddle planche', 'http://d205bpvrqc9yn1.cloudfront.net/3298.gif', 4),
(1252, 'straight leg outer hip abductor', 'http://d205bpvrqc9yn1.cloudfront.net/1427.gif', 19),
(1253, 'superman push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0803.gif', 8),
(1254, 'suspended abdominal fallout', 'http://d205bpvrqc9yn1.cloudfront.net/0805.gif', 4),
(1255, 'suspended push-up', 'http://d205bpvrqc9yn1.cloudfront.net/0806.gif', 8),
(1256, 'suspended reverse crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0807.gif', 4),
(1257, 'suspended row', 'http://d205bpvrqc9yn1.cloudfront.net/0808.gif', 14),
(1258, 'suspended split squat', 'http://d205bpvrqc9yn1.cloudfront.net/0809.gif', 5),
(1259, 'swimmer kicks v. 2 (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3433.gif', 9),
(1260, 'swing 360', 'http://d205bpvrqc9yn1.cloudfront.net/3318.gif', 12),
(1261, 'three bench dip', 'http://d205bpvrqc9yn1.cloudfront.net/1753.gif', 2),
(1262, 'tire flip', 'http://d205bpvrqc9yn1.cloudfront.net/2459.gif', 9),
(1263, 'trap bar deadlift', 'http://d205bpvrqc9yn1.cloudfront.net/0811.gif', 9),
(1264, 'triceps dip', 'http://d205bpvrqc9yn1.cloudfront.net/0814.gif', 2),
(1265, 'triceps dip (bench leg)', 'http://d205bpvrqc9yn1.cloudfront.net/0812.gif', 2),
(1266, 'triceps dip (between benches)', 'http://d205bpvrqc9yn1.cloudfront.net/0813.gif', 2),
(1267, 'triceps dips floor', 'http://d205bpvrqc9yn1.cloudfront.net/0815.gif', 2),
(1268, 'triceps press', 'http://d205bpvrqc9yn1.cloudfront.net/0816.gif', 2),
(1269, 'triceps stretch', 'http://d205bpvrqc9yn1.cloudfront.net/0817.gif', 2),
(1270, 'tuck crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0871.gif', 4),
(1271, 'twin handle parallel grip lat pulldown', 'http://d205bpvrqc9yn1.cloudfront.net/0818.gif', 6),
(1272, 'twist hip lift', 'http://d205bpvrqc9yn1.cloudfront.net/1466.gif', 9),
(1273, 'twisted leg raise', 'http://d205bpvrqc9yn1.cloudfront.net/2802.gif', 4),
(1274, 'twisted leg raise (female)', 'http://d205bpvrqc9yn1.cloudfront.net/2801.gif', 4),
(1275, 'two toe touch (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3231.gif', 13),
(1276, 'upper back stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1365.gif', 14),
(1277, 'upward facing dog', 'http://d205bpvrqc9yn1.cloudfront.net/1366.gif', 13),
(1278, 'v-sit on floor', 'http://d205bpvrqc9yn1.cloudfront.net/3420.gif', 4),
(1279, 'vertical leg raise (on parallel bars)', 'http://d205bpvrqc9yn1.cloudfront.net/0826.gif', 4),
(1280, 'walk elliptical cross trainer', 'http://d205bpvrqc9yn1.cloudfront.net/2141.gif', 12),
(1281, 'walking high knees lunge', 'http://d205bpvrqc9yn1.cloudfront.net/3655.gif', 12),
(1282, 'walking lunge', 'http://d205bpvrqc9yn1.cloudfront.net/1460.gif', 9),
(1283, 'walking on incline treadmill', 'http://d205bpvrqc9yn1.cloudfront.net/3666.gif', 12),
(1284, 'walking on stepmill', 'http://d205bpvrqc9yn1.cloudfront.net/2311.gif', 12),
(1285, 'weighted bench dip', 'http://d205bpvrqc9yn1.cloudfront.net/0830.gif', 2),
(1286, 'weighted close grip chin-up on dip cage', 'http://d205bpvrqc9yn1.cloudfront.net/2987.gif', 6),
(1287, 'weighted cossack squats (male)', 'http://d205bpvrqc9yn1.cloudfront.net/3643.gif', 9),
(1288, 'weighted crunch', 'http://d205bpvrqc9yn1.cloudfront.net/0832.gif', 4),
(1289, 'weighted decline sit-up', 'http://d205bpvrqc9yn1.cloudfront.net/3670.gif', 4),
(1290, 'weighted donkey calf raise', 'http://d205bpvrqc9yn1.cloudfront.net/0833.gif', 7),
(1291, 'weighted drop push up', 'http://d205bpvrqc9yn1.cloudfront.net/1310.gif', 8),
(1292, 'weighted front plank', 'http://d205bpvrqc9yn1.cloudfront.net/2135.gif', 4),
(1293, 'weighted front raise', 'http://d205bpvrqc9yn1.cloudfront.net/0834.gif', 15),
(1294, 'weighted hanging leg-hip raise', 'http://d205bpvrqc9yn1.cloudfront.net/0866.gif', 4),
(1295, 'weighted hyperextension (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0835.gif', 13),
(1296, 'weighted kneeling step with swing', 'http://d205bpvrqc9yn1.cloudfront.net/3641.gif', 15),
(1297, 'weighted lunge with swing', 'http://d205bpvrqc9yn1.cloudfront.net/3644.gif', 9),
(1298, 'weighted muscle up', 'http://d205bpvrqc9yn1.cloudfront.net/3286.gif', 6),
(1299, 'weighted muscle up (on bar)', 'http://d205bpvrqc9yn1.cloudfront.net/3312.gif', 6),
(1300, 'weighted one hand pull up', 'http://d205bpvrqc9yn1.cloudfront.net/3290.gif', 6),
(1301, 'weighted overhead crunch (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0840.gif', 4),
(1302, 'weighted pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/0841.gif', 6),
(1303, 'weighted round arm', 'http://d205bpvrqc9yn1.cloudfront.net/0844.gif', 15),
(1304, 'weighted russian twist', 'http://d205bpvrqc9yn1.cloudfront.net/0846.gif', 4),
(1305, 'weighted russian twist (legs up)', 'http://d205bpvrqc9yn1.cloudfront.net/0845.gif', 4),
(1306, 'weighted russian twist v. 2', 'http://d205bpvrqc9yn1.cloudfront.net/2371.gif', 4),
(1307, 'weighted seated bicep curl (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0847.gif', 3),
(1308, 'weighted seated twist (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0849.gif', 4),
(1309, 'weighted side bend (on stability ball)', 'http://d205bpvrqc9yn1.cloudfront.net/0850.gif', 4),
(1310, 'weighted sissy squat', 'http://d205bpvrqc9yn1.cloudfront.net/0851.gif', 5),
(1311, 'weighted squat', 'http://d205bpvrqc9yn1.cloudfront.net/0852.gif', 9),
(1312, 'weighted standing curl', 'http://d205bpvrqc9yn1.cloudfront.net/0853.gif', 3),
(1313, 'weighted standing hand squeeze', 'http://d205bpvrqc9yn1.cloudfront.net/0854.gif', 16),
(1314, 'weighted straight bar dip', 'http://d205bpvrqc9yn1.cloudfront.net/3313.gif', 8),
(1315, 'weighted stretch lunge', 'http://d205bpvrqc9yn1.cloudfront.net/3642.gif', 9),
(1316, 'weighted svend press', 'http://d205bpvrqc9yn1.cloudfront.net/0856.gif', 8),
(1317, 'weighted three bench dips', 'http://d205bpvrqc9yn1.cloudfront.net/1754.gif', 2),
(1318, 'weighted tricep dips', 'http://d205bpvrqc9yn1.cloudfront.net/1755.gif', 2),
(1319, 'weighted triceps dip on high parallel bars', 'http://d205bpvrqc9yn1.cloudfront.net/1767.gif', 2),
(1320, 'wheel rollerout', 'http://d205bpvrqc9yn1.cloudfront.net/0857.gif', 4),
(1321, 'wheel run', 'http://d205bpvrqc9yn1.cloudfront.net/3637.gif', 12),
(1322, 'wide grip pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/1429.gif', 6),
(1323, 'wide grip rear pull-up', 'http://d205bpvrqc9yn1.cloudfront.net/1367.gif', 6),
(1324, 'wide hand push up', 'http://d205bpvrqc9yn1.cloudfront.net/1311.gif', 8),
(1325, 'wide-grip chest dip on high parallel bars', 'http://d205bpvrqc9yn1.cloudfront.net/2363.gif', 8),
(1326, 'wind sprints', 'http://d205bpvrqc9yn1.cloudfront.net/0858.gif', 4),
(1327, 'world greatest stretch', 'http://d205bpvrqc9yn1.cloudfront.net/1604.gif', 10),
(1328, 'wrist circles', 'http://d205bpvrqc9yn1.cloudfront.net/1428.gif', 16),
(1329, 'wrist rollerer', 'http://d205bpvrqc9yn1.cloudfront.net/0859.gif', 16);

-- --------------------------------------------------------

--
-- Structure de la table `historiquedexercice`
--

CREATE TABLE `historiquedexercice` (
  `idexercice` int(11) NOT NULL,
  `idhistorique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historiqueexerciceprecedent`
--

CREATE TABLE `historiqueexerciceprecedent` (
  `idhistorique` int(11) NOT NULL,
  `date` date NOT NULL,
  `poids` float NOT NULL,
  `repetitions` int(11) NOT NULL,
  `sets` int(11) NOT NULL,
  `duree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lienimage`
--

CREATE TABLE `lienimage` (
  `imageID` int(11) NOT NULL,
  `lien` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `lienimage`
--

INSERT INTO `lienimage` (`imageID`, `lien`) VALUES
(1, 'https://www.newsbtc.com/wp-content/uploads/2020/06/mesut-kaya-LcCdl__-kO0-unsplash-scaled.jpg'),
(2, 'https://i.cbc.ca/1.5923173.1614019979!/fileImage/httpImage/econofitness-gym-covid-coromavirus-quebec-gatineau-rules-opening.jpeg'),
(3, 'https://media.lactualite.com/2021/09/jdp_sante_durable-1200x675.jpg'),
(4, 'https://sonovision.com/wp-content/uploads/sites/2/2019/07/TC1_OLTV001.jpeg'),
(5, 'https://www.gsph24.com/sites/default/files/styles/content_illustration/public/leicester.jpg?itok=ryf9HVLJ');

-- --------------------------------------------------------

--
-- Structure de la table `poids`
--

CREATE TABLE `poids` (
  `idpoids` int(11) NOT NULL,
  `date` date NOT NULL,
  `poids` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `poidshistorique`
--

CREATE TABLE `poidshistorique` (
  `iduser` int(11) NOT NULL,
  `idpoids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `idproduit` int(11) NOT NULL,
  `idcategorie` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `marque` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `info` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idproduit`, `idcategorie`, `nom`, `marque`, `prix`, `info`, `description`, `image`) VALUES
(1, 2, 'Whey à la vanille', 'AkatsukiFitness', 20, '1kg', 'AkatsukiFitness Whey ™ est une formule protéinée qui satisfait tous vos besoins en protéines. Les protéines jouent un rôle clé dans toute alimentation équilibrée en contribuant au maintien des fonctions du système immunitaire et de la masse musculaire maigre.', 'WheyProteinVanille.jpg'),
(2, 2, 'Whey au chocolat', 'AkatsukiFitness', 20, '1kg', 'AkatsukiFitness Whey ™ est une formule protéinée qui satisfait tous vos besoins en protéines. Les protéines jouent un rôle clé dans toute alimentation équilibrée en contribuant au maintien des fonctions du système immunitaire et de la masse musculaire maigre.', 'WheyProteinVanille.jpg'),
(3, 2, 'Whey à la fraise', 'AkatsukiFitness', 20, '1kg', 'AkatsukiFitness Whey ™ est une formule protéinée qui satisfait tous vos besoins en protéines. Les protéines jouent un rôle clé dans toute alimentation équilibrée en contribuant au maintien des fonctions du système immunitaire et de la masse musculaire maigre.', 'WheyProteinVanille.jpg'),
(4, 2, 'Whey sans arome', 'AkatsukiFitness', 20, '1kg', 'AkatsukiFitness Whey ™ est une formule protéinée qui satisfait tous vos besoins en protéines. Les protéines jouent un rôle clé dans toute alimentation équilibrée en contribuant au maintien des fonctions du système immunitaire et de la masse musculaire maigre.', 'WheyProteinVanille.jpg'),
(5, 1, 'Bar au chocolat', 'AkatsukiSupplement', 1, '1 bar', 'bar', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` int(11) NOT NULL,
  `poids` float DEFAULT NULL,
  `datedebutabonnement` date DEFAULT NULL,
  `datefinabonnement` date DEFAULT NULL,
  `poids_desire` float DEFAULT NULL,
  `avatar` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `nom`, `prenom`, `email`, `date_de_naissance`, `sexe`, `poids`, `datedebutabonnement`, `datefinabonnement`, `poids_desire`, `avatar`) VALUES
(1, 'test', 'test', 'test@gmail.com', '2022-02-08', 0, NULL, '2022-02-23', '2022-03-23', NULL, 1),
(2, 'a', 'a', 'a@a', '2022-02-07', 0, NULL, '2022-02-23', '2022-04-23', NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idblog`),
  ADD KEY `Constraint_blog_cat` (`idcategorie`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idcategorie`);

--
-- Index pour la table `categoriesblog`
--
ALTER TABLE `categoriesblog`
  ADD PRIMARY KEY (`idcategorie`);

--
-- Index pour la table `categoriesproduit`
--
ALTER TABLE `categoriesproduit`
  ADD PRIMARY KEY (`idcategorie`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`idcontenu`),
  ADD KEY `Constrain_idcontUser` (`iduser`);

--
-- Index pour la table `entrainement`
--
ALTER TABLE `entrainement`
  ADD PRIMARY KEY (`identrainement`);

--
-- Index pour la table `entrainementcontenu`
--
ALTER TABLE `entrainementcontenu`
  ADD KEY `Constrain_idcontenu` (`idcontenu`),
  ADD KEY `Constrain_identrainement` (`identrainement`);

--
-- Index pour la table `entrainementexercice`
--
ALTER TABLE `entrainementexercice`
  ADD KEY `Constrain_idexercise` (`idexercice`),
  ADD KEY `Constrain_identrainement2` (`identrainement`);

--
-- Index pour la table `exercice`
--
ALTER TABLE `exercice`
  ADD PRIMARY KEY (`idexercice`);

--
-- Index pour la table `exercicecatalogue`
--
ALTER TABLE `exercicecatalogue`
  ADD PRIMARY KEY (`idexercicecatalogue`),
  ADD KEY `Constraint_exerciceCat_categorie` (`idcategorie`);

--
-- Index pour la table `historiquedexercice`
--
ALTER TABLE `historiquedexercice`
  ADD KEY `Constraint_ExeHis_idexercice` (`idexercice`),
  ADD KEY `Constraint_ExeHis_idhistorique` (`idhistorique`);

--
-- Index pour la table `historiqueexerciceprecedent`
--
ALTER TABLE `historiqueexerciceprecedent`
  ADD PRIMARY KEY (`idhistorique`);

--
-- Index pour la table `lienimage`
--
ALTER TABLE `lienimage`
  ADD PRIMARY KEY (`imageID`);

--
-- Index pour la table `poids`
--
ALTER TABLE `poids`
  ADD PRIMARY KEY (`idpoids`);

--
-- Index pour la table `poidshistorique`
--
ALTER TABLE `poidshistorique`
  ADD KEY `Constraint_poidH_user` (`iduser`),
  ADD KEY `Constraint_poidH_poids` (`idpoids`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idproduit`),
  ADD KEY `Constraint_produits_cat` (`idcategorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `idblog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `categoriesblog`
--
ALTER TABLE `categoriesblog`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `categoriesproduit`
--
ALTER TABLE `categoriesproduit`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `idcontenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `entrainement`
--
ALTER TABLE `entrainement`
  MODIFY `identrainement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `exercice`
--
ALTER TABLE `exercice`
  MODIFY `idexercice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `exercicecatalogue`
--
ALTER TABLE `exercicecatalogue`
  MODIFY `idexercicecatalogue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1330;
--
-- AUTO_INCREMENT pour la table `historiqueexerciceprecedent`
--
ALTER TABLE `historiqueexerciceprecedent`
  MODIFY `idhistorique` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `poids`
--
ALTER TABLE `poids`
  MODIFY `idpoids` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `idproduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `Constraint_blog_cat` FOREIGN KEY (`idcategorie`) REFERENCES `categoriesblog` (`idcategorie`);

--
-- Contraintes pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `Constrain_iduser` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`iduser`);

--
-- Contraintes pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD CONSTRAINT `Constrain_idcontUser` FOREIGN KEY (`iduser`) REFERENCES `utilisateur` (`iduser`);

--
-- Contraintes pour la table `entrainementcontenu`
--
ALTER TABLE `entrainementcontenu`
  ADD CONSTRAINT `Constrain_idcontenu` FOREIGN KEY (`idcontenu`) REFERENCES `contenu` (`idcontenu`) ON DELETE CASCADE,
  ADD CONSTRAINT `Constrain_identrainement` FOREIGN KEY (`identrainement`) REFERENCES `entrainement` (`identrainement`) ON DELETE CASCADE;

--
-- Contraintes pour la table `entrainementexercice`
--
ALTER TABLE `entrainementexercice`
  ADD CONSTRAINT `Constrain_identrainement2` FOREIGN KEY (`identrainement`) REFERENCES `entrainement` (`identrainement`) ON DELETE CASCADE,
  ADD CONSTRAINT `Constrain_idexercise` FOREIGN KEY (`idexercice`) REFERENCES `exercice` (`idexercice`) ON DELETE CASCADE;

--
-- Contraintes pour la table `exercicecatalogue`
--
ALTER TABLE `exercicecatalogue`
  ADD CONSTRAINT `Constraint_exerciceCat_categorie` FOREIGN KEY (`idcategorie`) REFERENCES `categories` (`idcategorie`);

--
-- Contraintes pour la table `historiquedexercice`
--
ALTER TABLE `historiquedexercice`
  ADD CONSTRAINT `Constraint_ExeHis_idexercice` FOREIGN KEY (`idexercice`) REFERENCES `exercice` (`idexercice`),
  ADD CONSTRAINT `Constraint_ExeHis_idhistorique` FOREIGN KEY (`idhistorique`) REFERENCES `historiqueexerciceprecedent` (`idhistorique`);

--
-- Contraintes pour la table `poidshistorique`
--
ALTER TABLE `poidshistorique`
  ADD CONSTRAINT `Constraint_poidsHistorique_poids` FOREIGN KEY (`idpoids`) REFERENCES `poids` (`idpoids`),
  ADD CONSTRAINT `Constraint_poidsHistorique_user` FOREIGN KEY (`iduser`) REFERENCES `utilisateur` (`iduser`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `Constraint_produits_cat` FOREIGN KEY (`idcategorie`) REFERENCES `categoriesproduit` (`idcategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
