-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 22 Mars 2016 à 23:23
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `proverbdb`
--
CREATE DATABASE IF NOT EXISTS `proverbdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `proverbdb`;

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `idPage` int(11) NOT NULL AUTO_INCREMENT,
  `urlPage` varchar(255) NOT NULL,
  PRIMARY KEY (`idPage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `proverbes`
--

CREATE TABLE IF NOT EXISTS `proverbes` (
  `idProverbe` int(11) NOT NULL AUTO_INCREMENT,
  `proverbeContent` varchar(255) NOT NULL,
  `idPage` int(11) NOT NULL,
  `lngProverbe` text NOT NULL,
  `idProverbeTraduction` int(11) NOT NULL,
  PRIMARY KEY (`idProverbe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
