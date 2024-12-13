-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 13 déc. 2024 à 15:36
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `abi`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `IDCLIENT` int NOT NULL AUTO_INCREMENT,
  `IDSECT` int NOT NULL,
  `RAISONSOCIALE` char(50) NOT NULL,
  `ADRESSECLIENT` char(32) DEFAULT NULL,
  `CODEPOSTALCLIENT` char(5) DEFAULT NULL,
  `VILLECLIENT` char(25) DEFAULT NULL,
  `CA` int DEFAULT NULL,
  `EFFECTIF` int DEFAULT NULL,
  `TELEPHONECLIENT` char(15) DEFAULT NULL,
  `TYPECLIENT` char(10) NOT NULL,
  `NATURECLIENT` char(15) NOT NULL,
  `COMMENTAIRECLIENT` longtext,
  PRIMARY KEY (`IDCLIENT`),
  KEY `FK_AVOIRPOURSECTEUR` (`IDSECT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

DROP TABLE IF EXISTS `commander`;
CREATE TABLE IF NOT EXISTS `commander` (
  `IDCLIENT` int NOT NULL,
  `CODEPROJET` int NOT NULL,
  PRIMARY KEY (`IDCLIENT`,`CODEPROJET`),
  KEY `FK_COMMANDER2` (`CODEPROJET`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `IDCONTACT` int NOT NULL AUTO_INCREMENT,
  `IDCLIENT` int NOT NULL,
  `IDFONC` int NOT NULL,
  `NOMCONTACT` char(32) NOT NULL,
  `PRENOMCONTACT` char(32) NOT NULL,
  `TELCONTACT` char(15) NOT NULL,
  `EMAILCONTACT` char(50) DEFAULT NULL,
  `PHOTO` char(255) DEFAULT NULL,
  `DUREE` int DEFAULT NULL,
  PRIMARY KEY (`IDCONTACT`),
  KEY `FK_ASSOCIATION_5` (`IDFONC`),
  KEY `FK_TRAVAILLERPOUR` (`IDCLIENT`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `IDDOC` int NOT NULL AUTO_INCREMENT,
  `IDCONTACT` int DEFAULT NULL,
  `TITRE` char(255) NOT NULL,
  `RESUME` char(255) DEFAULT NULL,
  `DATEEDITION` date DEFAULT NULL,
  PRIMARY KEY (`IDDOC`),
  KEY `FK_PUBLIER` (`IDCONTACT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE IF NOT EXISTS `fonction` (
  `IDFONC` int NOT NULL AUTO_INCREMENT,
  `FONCTION` char(25) NOT NULL,
  PRIMARY KEY (`IDFONC`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fonction`
--

INSERT INTO `fonction` (`IDFONC`, `FONCTION`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `CODEPROJET` int NOT NULL AUTO_INCREMENT,
  `ABREGEPROJET` char(10) NOT NULL,
  `NOMPROJET` char(32) NOT NULL,
  `TYPEPROJET` char(25) NOT NULL,
  PRIMARY KEY (`CODEPROJET`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `secteur_activite`
--

DROP TABLE IF EXISTS `secteur_activite`;
CREATE TABLE IF NOT EXISTS `secteur_activite` (
  `IDSECT` int NOT NULL AUTO_INCREMENT,
  `ACTIVITE` char(25) NOT NULL,
  PRIMARY KEY (`IDSECT`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `secteur_activite`
--

INSERT INTO `secteur_activite` (`IDSECT`, `ACTIVITE`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `IDUSER` int NOT NULL AUTO_INCREMENT,
  `LOGINUSER` char(50) NOT NULL,
  `PASSUSER` char(15) NOT NULL,
  PRIMARY KEY (`IDUSER`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`IDUSER`, `LOGINUSER`, `PASSUSER`) VALUES
(1, 'test', 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
