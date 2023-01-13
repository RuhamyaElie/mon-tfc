-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 18 oct. 2021 à 04:26
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tfc`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `idS` int(11) DEFAULT NULL,
  `idM` int(11) DEFAULT NULL,
  KEY `idM` (`idM`),
  KEY `idS` (`idS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `delegue`
--

DROP TABLE IF EXISTS `delegue`;
CREATE TABLE IF NOT EXISTS `delegue` (
  `idD` int(11) NOT NULL AUTO_INCREMENT,
  `nomD` varchar(40) NOT NULL,
  `prenomD` varchar(40) NOT NULL,
  `idSo` int(11) DEFAULT NULL,
  `idS` int(11) DEFAULT NULL,
  PRIMARY KEY (`idD`),
  KEY `delegue_ibfk_1` (`idSo`),
  KEY `idS` (`idS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
CREATE TABLE IF NOT EXISTS `medicament` (
  `idM` int(11) NOT NULL AUTO_INCREMENT,
  `produit` varchar(40) NOT NULL,
  `forme` varchar(40) NOT NULL,
  `dose` varchar(40) NOT NULL,
  `cond` varchar(40) NOT NULL,
  `numL` varchar(20) NOT NULL,
  `dateE` date NOT NULL,
  `dateP` date NOT NULL,
  `socD` varchar(40) NOT NULL,
  `qtteMedi` int(11) NOT NULL,
  PRIMARY KEY (`idM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `requisition`
--

DROP TABLE IF EXISTS `requisition`;
CREATE TABLE IF NOT EXISTS `requisition` (
  `idRec` int(11) NOT NULL AUTO_INCREMENT,
  `produitRequis` varchar(40) NOT NULL,
  `numLRec` varchar(40) NOT NULL,
  `dateERec` date NOT NULL,
  `datePRec` date NOT NULL,
  `socDRec` varchar(40) NOT NULL,
  `qtteRec` int(11) DEFAULT NULL,
  `idM` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRec`),
  KEY `idM` (`idM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `idS` int(11) NOT NULL AUTO_INCREMENT,
  `nomS` varchar(40) NOT NULL,
  PRIMARY KEY (`idS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

DROP TABLE IF EXISTS `sortie`;
CREATE TABLE IF NOT EXISTS `sortie` (
  `idSo` int(11) NOT NULL AUTO_INCREMENT,
  `dele` varchar(40) NOT NULL,
  `desi` varchar(40) NOT NULL,
  `dateS` date NOT NULL,
  `qtteSort` int(11) NOT NULL,
  `qtteRest` int(11) NOT NULL,
  PRIMARY KEY (`idSo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nomU` varchar(50) NOT NULL,
  `preU` varchar(50) NOT NULL,
  `adMU` varchar(50) NOT NULL,
  `mdpU` varchar(60) NOT NULL,
  `idSo` int(11) DEFAULT NULL,
  `idM` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idSo` (`idSo`),
  KEY `idM` (`idM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`idM`) REFERENCES `medicament` (`idM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`idS`) REFERENCES `service` (`idS`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `delegue`
--
ALTER TABLE `delegue`
  ADD CONSTRAINT `delegue_ibfk_1` FOREIGN KEY (`idSo`) REFERENCES `sortie` (`idSo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `delegue_ibfk_2` FOREIGN KEY (`idS`) REFERENCES `service` (`idS`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `requisition`
--
ALTER TABLE `requisition`
  ADD CONSTRAINT `requisition_ibfk_1` FOREIGN KEY (`idM`) REFERENCES `medicament` (`idM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idSo`) REFERENCES `sortie` (`idSo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`idM`) REFERENCES `medicament` (`idM`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
