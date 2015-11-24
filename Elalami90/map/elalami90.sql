-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Novembre 2015 à 17:45
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `elalami90`
--

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf32_bin DEFAULT NULL,
  `pays` varchar(30) COLLATE utf32_bin NOT NULL,
  `url` varchar(2048) COLLATE utf32_bin DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_bin AUTO_INCREMENT=17 ;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id_doc`, `nom`, `pays`, `url`) VALUES
(15, 'Barca', 'Espagne', 'http://assets4.fcbarcelona.com/images/og-logo.cb6aeb6cb.png'),
(16, 'Mercedes', 'Allemagne', 'http://www.logodesignlove.com/images/evolution/mercedes-benz-logo-design.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf32_bin DEFAULT NULL,
  PRIMARY KEY (`id_perso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_bin AUTO_INCREMENT=62 ;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_perso`, `nom`) VALUES
(61, 'mouad');

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id_scores` int(11) NOT NULL AUTO_INCREMENT,
  `id_perso` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `pays` varchar(30) COLLATE utf32_bin NOT NULL,
  `maj` datetime DEFAULT NULL,
  PRIMARY KEY (`id_scores`),
  KEY `fk_scores_personnes_idx` (`id_perso`),
  KEY `fk_scores_documents1_idx` (`id_doc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_bin AUTO_INCREMENT=157 ;

--
-- Contenu de la table `scores`
--

INSERT INTO `scores` (`id_scores`, `id_perso`, `id_doc`, `pays`, `maj`) VALUES
(143, 61, 15, 'Allemagne', '2015-11-23 17:21:27'),
(144, 61, 15, 'France', '2015-11-23 17:21:29'),
(145, 61, 15, 'Espagne', '2015-11-23 17:21:31'),
(146, 61, 15, 'Espagne', '2015-11-23 17:36:42'),
(147, 61, 15, 'France', '2015-11-23 17:38:43'),
(148, 61, 15, 'France', '2015-11-23 17:39:49'),
(149, 61, 15, 'Turquie', '2015-11-23 17:39:52'),
(150, 61, 15, 'Espagne', '2015-11-23 17:39:54'),
(151, 61, 15, 'Espagne', '2015-11-23 17:41:24'),
(152, 61, 15, 'Russie', '2015-11-23 17:43:09'),
(153, 61, 15, 'Espagne', '2015-11-23 17:43:14'),
(154, 61, 16, 'Allemagne', '2015-11-23 17:43:21'),
(155, 61, 15, 'France', '2015-11-23 17:44:35'),
(156, 61, 15, 'Espagne', '2015-11-23 17:44:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
