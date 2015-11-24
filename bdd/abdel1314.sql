-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- G√©n√©r√© le :  Mar 24 Novembre 2015 √† 11:00
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

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
  `id_doc` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `latlng` point DEFAULT NULL,
  `url` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id_doc`, `nom`, `latlng`, `url`) VALUES
(1, 'tour eiffel', '\0\0\0\0\0\0\0”.¶ôÓmH@Ú[t≤‘Z@', 'doc1.png'),
(2, 'notre dame de paris', '\0\0\0\0\0\0\0ÀLi˝-mH@†pvkôÃ@', 'doc3.png'),
(3, 'sacre coeur', '\0\0\0\0\0\0\0sñ£}qH@BÓ"LQæ@', 'doc2.png');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id_perso` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_perso`, `nom`) VALUES
(104, 'abdel'),
(106, 'bast'),
(107, 'abdou'),
(108, 'samszo');

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id_scores` int(11) NOT NULL,
  `id_perso` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `distance` int(11) DEFAULT NULL,
  `maj` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=563 DEFAULT CHARSET=latin1;

--
-- Index pour les tables export√©es
--

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id_doc`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id_perso`);

--
-- Index pour la table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id_scores`),
  ADD KEY `fk_scores_personnes_idx` (`id_perso`),
  ADD KEY `fk_scores_documents1_idx` (`id_doc`);

--
-- AUTO_INCREMENT pour les tables export√©es
--

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id_perso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT pour la table `scores`
--
ALTER TABLE `scores`
  MODIFY `id_scores` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=563;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
