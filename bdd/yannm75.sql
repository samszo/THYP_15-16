-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- G√©n√©r√© le :  Mar 17 Novembre 2015 √† 09:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de donn√©es :  `yannm75`
--

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) DEFAULT NULL,
  `LatLng` point DEFAULT NULL,
  `URL` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id`, `Nom`, `LatLng`, `URL`) VALUES
(1, 'RC TOULON', '\0\0\0\0\0\0\0ª∏çéE@]m≈˛≤ª@', '/img/TOULON.png'),
(2, 'RACING METRO 92', '\0\0\0\0\0\0\0â´x#wH@,∑¥\Z˜@', '/img/RACING.png');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `ID_PERSO` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_PERSO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`ID_PERSO`, `NOM`) VALUES
(1, 'Yann MAHUET'),
(2, 'TEST');

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `ID_SCORE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSO` int(11) NOT NULL,
  `ID_DOC` int(11) NOT NULL,
  `DISTANCE` int(11) NOT NULL,
  `MAJ` datetime NOT NULL,
  PRIMARY KEY (`ID_SCORE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `score`
--

INSERT INTO `score` (`ID_SCORE`, `ID_PERSO`, `ID_DOC`, `DISTANCE`, `MAJ`) VALUES
(1, 1, 1, 25, '2015-11-16 00:00:00'),
(2, 1, 2, 35, '2015-11-16 00:00:00'),
(3, 2, 2, 305, '2015-11-16 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
