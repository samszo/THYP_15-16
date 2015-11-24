-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- G√©n√©r√© le :  Mar 24 Novembre 2015 √† 02:59
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

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
-- Structure de la table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `latlng` point DEFAULT NULL,
  `url` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id_doc`, `nom`, `latlng`, `url`) VALUES
(1, 'Arc de Triomphe', '\0\0\0\0\0\0\0ÜWí<◊oH@)∞\0¶\\@', 'arc'),
(2, 'Tour Eiffel', '\0\0\0\0\0\0\09º{€mH@∑Ñ◊â&[@', 'eiffel'),
(3, 'Mus√©e du Louvre', '\0\0\0\0\0\0\0˜x!nH@F—Éµ@', 'louvre');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_perso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=101 ;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_perso`, `nom`) VALUES
(94, 'mehdi'),
(95, 'yagami'),
(96, 'deer'),
(100, 'john');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=270 ;

--
-- Contenu de la table `scores`
--

INSERT INTO `scores` (`id_scores`, `id_perso`, `id_doc`, `distance`, `maj`) VALUES
(235, 94, 3, 1446, '2015-11-20 19:34:23'),
(236, 94, 3, 1172, '2015-11-20 19:34:24'),
(237, 94, 3, 339, '2015-11-20 19:34:28'),
(238, 94, 3, 316, '2015-11-20 19:34:29'),
(239, 94, 3, 685, '2015-11-20 19:34:30'),
(240, 94, 2, 1624, '2015-11-20 19:35:06'),
(241, 94, 2, 67, '2015-11-20 19:35:07'),
(242, 94, 1, 71, '2015-11-20 19:35:08'),
(243, 99, 2, 4358, '2015-11-20 20:01:33'),
(244, 99, 2, 5318, '2015-11-20 20:01:33'),
(245, 99, 2, 3212, '2015-11-20 20:01:34'),
(246, 99, 2, 95, '2015-11-20 20:01:34'),
(247, 99, 3, 2500, '2015-11-20 20:01:35'),
(248, 99, 3, 1276, '2015-11-20 20:01:36'),
(249, 99, 3, 57, '2015-11-20 20:01:37'),
(250, 99, 1, 4475, '2015-11-20 20:01:37'),
(251, 99, 1, 3272, '2015-11-20 20:01:38'),
(252, 99, 1, 3702, '2015-11-20 20:01:38'),
(253, 99, 1, 1107, '2015-11-20 20:01:39'),
(254, 99, 1, 4373, '2015-11-20 20:01:39'),
(255, 100, 2, 1748, '2015-11-24 02:58:27'),
(256, 100, 2, 999, '2015-11-24 02:58:30'),
(257, 100, 2, 801, '2015-11-24 02:58:32'),
(258, 100, 2, 4429, '2015-11-24 02:58:32'),
(259, 100, 2, 5149, '2015-11-24 02:58:33'),
(260, 100, 1, 4526, '2015-11-24 02:58:34'),
(261, 100, 1, 5823, '2015-11-24 02:58:34'),
(262, 100, 1, 2916, '2015-11-24 02:58:35'),
(263, 100, 1, 3580, '2015-11-24 02:58:35'),
(264, 100, 1, 1183, '2015-11-24 02:58:36'),
(265, 100, 3, 2798, '2015-11-24 02:58:38'),
(266, 100, 3, 483, '2015-11-24 02:58:39'),
(267, 100, 3, 663, '2015-11-24 02:58:40'),
(268, 100, 3, 153, '2015-11-24 02:58:43'),
(269, 100, 3, 104, '2015-11-24 02:58:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
