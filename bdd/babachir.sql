-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Novembre 2015 à 06:29
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `thyp_cartogame`
--

-- --------------------------------------------------------

--
-- Structure de la table `coords`
--

CREATE TABLE IF NOT EXISTS `coords` (
  `id_coords` int(11) NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  PRIMARY KEY (`id_coords`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `coords`
--

INSERT INTO `coords` (`id_coords`, `id_doc`, `latitude`, `longitude`) VALUES
(16, 1, 42.0656, -124.541),
(17, 1, 42.1308, -119.971),
(18, 1, 33.2846, -113.818),
(19, 2, 48.9117, 2.24121),
(20, 2, 48.927, 2.42729),
(21, 2, 48.8078, 2.44514),
(22, 2, 48.8078, 2.24533),
(23, 3, 35.7682, -0.701065),
(24, 3, 35.7705, -0.541077),
(25, 3, 35.6517, -0.54863),
(26, 3, 35.6539, -0.696259),
(27, 1, 32.3243, -119.487);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `url` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id_doc`, `nom`, `url`) VALUES
(1, 'Californie', 'https://le-coin-coin.fr/wp-content/uploads/2015/03/californie.jpg'),
(2, 'Paris', 'http://prodigy.umbrella.al/travel1/wp-content/uploads/sites/9/2014/05/immobilier-paris.jpg'),
(3, 'Oran', 'http://aaec-oran.com/uploads/images/Oran.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_perso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_perso`, `nom`) VALUES
(1, 'bachir'),
(3, 'bachbach');

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id_scores` int(11) NOT NULL AUTO_INCREMENT,
  `id_perso` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `distance` int(11) DEFAULT NULL,
  `maj` datetime DEFAULT NULL,
  PRIMARY KEY (`id_scores`),
  KEY `fk_scores_personnes_idx` (`id_perso`),
  KEY `fk_scores_documents1_idx` (`id_doc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Contenu de la table `scores`
--

INSERT INTO `scores` (`id_scores`, `id_perso`, `id_doc`, `distance`, `maj`) VALUES
(22, 2, 2, 4268, '2015-11-16 23:51:07'),
(23, 2, 2, 5187, '2015-11-16 23:51:48'),
(24, 2, 2, 5874, '2015-11-16 23:57:31'),
(25, 2, 2, 5045, '2015-11-16 23:57:46'),
(26, 2, 2, 6832, '2015-11-16 23:57:54'),
(27, 2, 2, 6301, '2015-11-17 00:20:12'),
(28, 2, 2, 6142, '2015-11-17 01:53:08'),
(29, 2, 2, 5817, '2015-11-17 02:01:50'),
(30, 2, 2, 6455, '2015-11-17 03:03:26'),
(31, 2, 2, 5745, '2015-11-17 03:06:31'),
(32, 2, 2, 5690, '2015-11-17 03:08:05'),
(33, 2, 2, 5038, '2015-11-17 03:19:02'),
(34, 2, 2, 0, '2015-11-22 02:23:50'),
(35, 2, 2, 0, '2015-11-22 02:23:56'),
(36, 2, 2, 7888, '2015-11-22 02:23:58'),
(37, 2, 2, 0, '2015-11-22 02:24:08'),
(38, 2, 2, 391, '2015-11-22 02:30:30'),
(39, 2, 2, 1280, '2015-11-22 02:30:32'),
(40, 2, 2, 3042, '2015-11-22 02:30:39'),
(41, 2, 2, 3590, '2015-11-22 02:30:42'),
(42, 2, 2, 2171, '2015-11-22 02:30:45'),
(43, 2, 2, 0, '2015-11-22 02:30:51'),
(44, 2, 2, 1691, '2015-11-22 02:30:54'),
(45, 2, 2, 788, '2015-11-22 02:30:57'),
(46, 2, 2, 0, '2015-11-22 02:31:00'),
(47, 2, 2, 1648, '2015-11-22 03:02:54'),
(48, 2, 2, 769, '2015-11-22 03:14:54'),
(49, 2, 2, 306, '2015-11-22 03:14:56'),
(50, 2, 2, 0, '2015-11-22 03:15:03'),
(51, 2, 2, 0, '2015-11-22 03:16:45'),
(52, 2, 2, 0, '2015-11-22 03:16:58'),
(53, 2, 2, 5296, '2015-11-22 03:17:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
