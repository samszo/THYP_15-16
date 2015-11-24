-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- G√©n√©r√© le :  Mar 17 Novembre 2015 √† 06:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de donn√©es :  `db_gmaps_game`
--

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latlng` point NOT NULL,
  `url` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_doc`),
  KEY `latlng` (`latlng`(25))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id_doc`, `nom`, `latlng`, `url`) VALUES
(2, 'Quel est le pays d''origine de Facebook?', '\0\0\0\0\0\0\01zn°+„C@ÙﬁÄ≤X¿', 'http://icons.iconarchive.com/icons/danleech/simple/512/facebook-icon.png'),
(4, 'Quel est le pays d''origine de ce club ?', '\0\0\0\0\0\0\0âÍ≠Å≠pD@èå’Êˇı¿', 'http://media1.fcbarcelona.com/media/asset_publics/resources/000/004/670/original_rgb/FCB.v1319559431.png'),
(6, 'O√π se trouve ce monument ? ', '\0\0\0\0\0\0\0µ®Orá9¿úS…\0PSa@', 'http://sydney.site-touristique.com/images/sydney/photo/photo-opera-de-sydney-39.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_perso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_perso`, `nom`) VALUES
(1, 'herrhilmi'),
(3, 'visite'),
(4, 'ettanass'),
(5, 'elyaagoubi'),
(6, 'thypbast'),
(7, 'kesraoui'),
(8, 'Elalami90'),
(9, 'YannM75'),
(10, 'mkrayem'),
(11, 'babachir'),
(12, 'darkmido'),
(13, 'elmounjide'),
(14, 'abdel1314'),
(15, 'elmiloudi'),
(16, 'taoufik072'),
(17, 'KalmouniNada'),
(19, 'samiaMALKI'),
(20, 'brenda23'),
(21, 'samszo'),
(22, 'herrhilmi'),
(24, 'visite'),
(25, 'ettanass'),
(26, 'elyaagoubi'),
(27, 'thypbast'),
(28, 'kesraoui'),
(29, 'Elalami90'),
(30, 'YannM75'),
(31, 'mkrayem'),
(32, 'babachir'),
(33, 'darkmido'),
(34, 'elmounjide'),
(35, 'abdel1314'),
(36, 'elmiloudi'),
(37, 'taoufik072'),
(38, 'KalmouniNada'),
(39, ''),
(40, 'samiaMALKI'),
(41, 'brenda23'),
(42, 'samszo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `scores`
--

INSERT INTO `scores` (`id_scores`, `id_perso`, `id_doc`, `distance`, `maj`) VALUES
(2, 1, 1, 0, '2015-11-13 13:48:15'),
(3, 1, 1, 0, '2015-11-13 18:12:04'),
(4, 1, 1, 0, '2015-11-13 18:13:25'),
(5, 1, 1, 0, '2015-11-13 18:34:08'),
(6, 1, 1, 0, '2015-11-17 04:40:56'),
(7, 1, 1, 0, '2015-11-17 04:41:03'),
(8, 1, 2, 364, '2015-11-17 06:38:21'),
(9, 1, 4, 165, '2015-11-17 06:38:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
