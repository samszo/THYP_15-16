-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- G√©n√©r√© le :  Mar 24 Novembre 2015 √† 10:00
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de donn√©es :  `ddbasmaa`
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
(1, 'paris', '\0\0\0\0\0\0\0òˆÕ˝’mH@êû"áà[@', 'http://www.expiris.fr/wp-content/uploads/2014/12/TourEiffel.png'),
(2, 'Rome', '\0\0\0\0\0\0\0 )"√*ÚD@gÌ∂Õ)@', 'http://www.wmag-voyage.fr/wp-content/uploads/2011/11/Rome-3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_perso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_perso`, `nom`) VALUES
(1, 'asmaa'),
(2, 'anass'),
(3, 'abdel1314'),
(4, 'babachir'),
(5, 'darkmido'),
(6, 'BDalila'),
(7, 'bouhaddane'),
(8, 'brenda23'),
(9, 'Elalami90'),
(10, 'elmiloudi'),
(11, 'elmounjide'),
(12, 'elyaagoubi'),
(13, 'ettanass'),
(14, 'FatihiZakaria'),
(15, 'herrhilmi'),
(16, 'KalmouniNada'),
(17, 'Kesraoui'),
(18, 'mkrayem'),
(19, 'samiaMalki'),
(20, 'taoufik072'),
(21, 'YannM75');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `scores`
--

INSERT INTO `scores` (`id_scores`, `id_perso`, `id_doc`, `distance`, `maj`) VALUES
(1, 1, 1, 1, '2015-11-16 14:33:09'),
(2, 1, 1, 1, '2015-11-16 15:22:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
