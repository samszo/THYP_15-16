-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 10:05 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thyp_cartogame`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `latlng` point DEFAULT NULL,
  `url` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id_doc`, `nom`, `latlng`, `url`) VALUES
(1, 'trouvez la ville de ce document', '\0\0\0\0\0\0\0Ü øñWÄC@Àd8ûœö^¿', 'http://googlediscovery.com/wp-content/uploads/google-logo1.jpg'),
(2, 'trouvez la ville de ce document', '\0\0\0\0\0\0\0l	˘†gcH@óˇê~˚Z"@', 'http://www.karinatours.com/ftp/MERCEDES_LOGO.png');

-- --------------------------------------------------------

--
-- Table structure for table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_perso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `personnes`
--

INSERT INTO `personnes` (`id_perso`, `nom`) VALUES
(1, 'kesraoui'),
(2, 'ettouhami'),
(3, 'cao'),
(4, 'kalmouni'),
(5, 'elmoufid'),
(6, 'elmiloudi'),
(7, 'elyaagoubi'),
(8, 'hilmi'),
(9, 'bentaher'),
(10, 'mpm'),
(11, 'mll'),
(12, 'bastos'),
(13, 'bas'),
(14, 'anass'),
(15, 'ferme'),
(16, 'mehdi'),
(17, 'kersraoui'),
(18, 'mp'),
(19, 'azer'),
(20, 'baba'),
(21, 'ok'),
(22, 'mama'),
(23, 'api'),
(24, 'az'),
(25, 'po'),
(26, 'a'),
(27, 'bast'),
(28, 'v'),
(29, 'saber'),
(30, 'b');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
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
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id_scores`, `id_perso`, `id_doc`, `distance`, `maj`) VALUES
(1, 7, 2, 200, '2015-11-11 00:00:00'),
(2, 3, 4, 125, '2015-11-18 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
