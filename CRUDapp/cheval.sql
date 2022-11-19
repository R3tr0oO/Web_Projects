-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 05 mai 2022 à 13:58
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `d1ramos_herque`
--

-- --------------------------------------------------------

--
-- Structure de la table `cheval`
--

CREATE TABLE IF NOT EXISTS `cheval` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `race` varchar(20) NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `centre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cheval`
--

INSERT INTO `cheval` (`id`, `nom`, `race`, `couleur`, `centre`) VALUES
(1, 'maxou', 'dvqdvq', 'qfvfvV', 'QVQV'),
(4, 'theo', 'haras', 'marron', 'bts'),
(5, 'nico', 'trait', 'gris', 'aurillac'),
(6, 'ethan', 'trait', 'noir', 'tulle'),
(7, 'ethan', 'trait', 'noir', 'tulle'),
(8, 'jean', 'course', 'blanc', 'aubusson'),
(9, 'victor', 'trait', 'blanc', 'aubusson'),
(10, 'malek', 'pursang', 'gris', 'paris'),
(11, 'mathis', 'pursang', 'gris', 'maroc'),
(12, 'mateo', 'course', 'noir', 'bts'),
(13, 'rohan', 'trait', 'orange', 'aubusson'),
(14, 'cristophe', 'puresang', 'gris', 'aubusson');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
