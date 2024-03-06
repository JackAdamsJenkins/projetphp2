-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 06 mars 2024 à 14:27
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `booklaplateforme`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id_book` int NOT NULL AUTO_INCREMENT,
  `title_book` varchar(50) NOT NULL,
  `author_book` varchar(50) NOT NULL,
  `year_book` int NOT NULL,
  `genre_book` varchar(50) NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` VALUES(1, 'Le Grand Meaulnes', 'Alain-Fournier2', 1913, 'Roman');
INSERT INTO `books` VALUES(4, '1234', 'sdqdsjkqsdhjk', 8522, 'lskdfjdslkf lds ');
INSERT INTO `books` VALUES(5, 'sdlkfdjf', 'lfdkjgldfgjlkj', 12345, 'dlkjlkjdsf');
INSERT INTO `books` VALUES(6, 'dfgdfg', 'dfgdfg', 25252, 'fdgdfg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
