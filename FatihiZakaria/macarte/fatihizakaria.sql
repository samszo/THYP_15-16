-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Novembre 2015 à 00:51
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `fatihizakaria`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_bin AUTO_INCREMENT=15 ;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id_doc`, `nom`, `pays`, `url`) VALUES
(13, 'Document 1', 'Maroc', 'http://www.larousse.fr/encyclopedie/data/images/1009544-Drapeau_du_Maroc.jpg'),
(14, 'Document 2', 'France', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Flag_of_France.svg/langfr-225px-Flag_of_France.svg.png');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf32_bin DEFAULT NULL,
  PRIMARY KEY (`id_perso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_bin AUTO_INCREMENT=68 ;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_perso`, `nom`) VALUES
(67, 'zakaria');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_bin AUTO_INCREMENT=164 ;

--
-- Contenu de la table `scores`
--

INSERT INTO `scores` (`id_scores`, `id_perso`, `id_doc`, `pays`, `maj`) VALUES
(163, 67, 13, 'Pologne', '2015-11-24 00:51:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
