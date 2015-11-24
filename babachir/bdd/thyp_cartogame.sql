-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- G√©n√©r√© le :  Mar 17 Novembre 2015 √† 03:30
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de donn√©es :  `thyp_cartogame`
--

-- --------------------------------------------------------

--
-- Structure de la table `coords`
--

CREATE TABLE IF NOT EXISTS `coords` (
  `id_coords` int(11) NOT NULL AUTO_INCREMENT,
  `latlng` point NOT NULL,
  `id_doc` int(11) NOT NULL,
  PRIMARY KEY (`id_coords`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `coords`
--

INSERT INTO `coords` (`id_coords`, `latlng`, `id_doc`) VALUES
(1, '\0\0\0\0\0\0\0îÜ\ZÖ$Î9@Ω7Ü\0‡\ZT¿', 1),
(2, '\0\0\0\0\0\0\0-_ó·?A@@d¨6ˇØ?P¿', 1),
(3, '\0\0\0\0\0\0\0ÍîG7¬Z2@\0\0\0\0\0ÜP¿', 1),
(4, '\0\0\0\0\0\0\0î¢ï{	:@d¨6ˇØT¿', 1),
(5, '\0\0\0\0\0\0\0¢`∆lH@Mjh∞@', 2),
(6, '\0\0\0\0\0\0\0.;ƒ?lsH@6ÜÂœw@', 2),
(7, '\0\0\0\0\0\0\00Û¸ƒsH@ÿÒ_ 0@', 2),
(8, '\0\0\0\0\0\0\0EøïÏjH@èå’ÊˇU@', 2),
(9, '\0\0\0\0\0\0\0ˆ\nÓhH@•ı∑‡ﬂ@', 2),
(10, '\0\0\0\0\0\0\0≥`‚è¢jH@ä;ﬁ‰∑@', 2),
(11, '\0\0\0\0\0\0\0!∫ˆlH@ç`„˙w˝@', 2),
(12, '\0\0\0\0\0\0\0‹-…ª‡A@X˛|[∞‘·ø', 3),
(13, '\0\0\0\0\0\0\0wˆïÈﬂA@¸®Ü˝ûXÊø', 3),
(14, '\0\0\0\0\0\0\0AùÚËF“A@îΩ•ú/ˆÂø', 3),
(15, '\0\0\0\0\0\0\0ã‡+Ÿ”A@iUMu·ø', 3);

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
(1, 'Triangle des Bermudes ', 'http://lesobservateurs.ch/wp-content/uploads/2015/07/triangle-bermudes-2.jpg'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

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
(33, 2, 2, 5038, '2015-11-17 03:19:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
