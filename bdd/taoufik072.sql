-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 17 Novembre 2015 à 00:12
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `thyp_kr`
--

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_doc` varchar(50) NOT NULL,
  `lating` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `date_crea` datetime NOT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id_doc`, `nom_doc`, `lating`, `url`, `date_crea`) VALUES
(1, 'doc', '00000', 'test', '2015-11-16 23:04:29'),
(2, 'doc', '00000', 'test', '2015-11-16 23:04:32');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `date_crea` datetime NOT NULL,
  PRIMARY KEY (`id_perso`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_perso`, `prenom`, `nom`, `date_crea`) VALUES
(1, 'taoufik', 'benguiza', '2015-11-17 00:11:33');

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `id_perso` int(11) NOT NULL,
  `distance` varchar(100) NOT NULL,
  `maj` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `scores`
--

INSERT INTO `scores` (`id`, `id_doc`, `id_perso`, `distance`, `maj`) VALUES
(1, 3, 1, '1', '2015-11-16 23:25:07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
