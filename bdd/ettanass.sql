-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- G√©n√©r√© le :  Mar 24 Novembre 2015 √† 09:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de donn√©es :  `ettanass`
--

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `latlng` point DEFAULT NULL,
  `url` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id_doc`, `nom`, `latlng`, `url`) VALUES
(1, 'le Taj Mahal', '\0\0\0\0\0\0\0ôﬁÑ,;@R\r˚=±ÇS@', 'http://img0.svstatic.com/wallpapers/c7fe8842d48d39706ca39caf07e86b07_large.jpeg'),
(2, 'musee de sydney\r\n', '\0\0\0\0\0\0\0âñ<ûñÌ@¿íç`„Êb@', 'http://australie-a-la-carte.com/thumb/?q=92&zc=1&w=640&h=423&src=%2Fhome%2Fclients%2Fwww%2Fodyssee%2Fsearch%2Fpubl_images%2Fproductimage%2Faustralie_sydney_iventure_pass_soh.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_perso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_perso`, `nom`) VALUES
(1, 'ettouhami'),
(2, 'hilmi'),
(3, 'kesraoui'),
(4, 'zeroual'),
(5, 'bouloujour'),
(6, 'cao'),
(7, 'kalmouni'),
(8, 'elmoufid'),
(9, 'elmiloudi'),
(10, 'bentaher'),
(11, 'krayem'),
(12, 'elalami'),
(13, 'elmounjide'),
(14, 'fatihi'),
(15, 'mahuet'),
(16, 'mokdad'),
(17, 'boumessaoud'),
(18, 'malki'),
(19, 'benguiza'),
(20, 'bouhaddane'),
(21, 'babou'),
(22, 'elyaagoubi'),
(24, 'test');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `scores`
--

INSERT INTO `scores` (`id_scores`, `id_perso`, `id_doc`, `distance`, `maj`) VALUES
(11, 1, 2, 11303395, '2015-11-24 02:46:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
