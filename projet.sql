-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 19 août 2022 à 08:13
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `codePermanent` varchar(10) NOT NULL,
  `nomComplet` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `moyenne` double NOT NULL,
  `codeGroupe` varchar(7) NOT NULL,
  PRIMARY KEY (`codePermanent`),
  KEY `codeGroupe` (`codeGroupe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`codePermanent`, `nomComplet`, `adresse`, `telephone`, `moyenne`, `codeGroupe`) VALUES
('PRAS261188', 'Samuel Pratte', '1400 Rue Hart', '514-431-3975', 18.75, 'WEBA21L'),
('BERK110998', 'Kim Bergeron', '1300 Rue des Ursulines', '418-332-3985', 17.75, 'WEBA21L'),
('HEWD231298', 'Danny Hewitt', '22 Rue des Forges', '514-222-3475', 20, 'WEBA21L'),
('DUFS230192', 'Simon Dufour', '15 Avenue de la Liberté', '514-998-1265', 8.5, 'WEBA21L'),
('SAVA091193', 'Alain Savoie', '20 Rue Simonne-Monet-Chartrand', '438-499-9987', 13, 'WEBA21C'),
('PERG080294', 'Gilles Perrond', '20 Rue Saint-Denis', '438-599-7787', 12.25, 'WEBA21C'),
('CREF031192', 'Francis Crevier', '22 Rue Sherbrooke', '514-479-5582', 7, 'WEBA21C'),
('BOUM091193', 'Mélanie Boutin', '1400 Rue Sherbrooke', '438-500-1265', 20, 'WEBA21C'),
('TURS091193', 'Simon Turmel', '1200 Rue Papineau', '418-399-1187', 19.5, 'WEBA21H'),
('FREJ221192', 'Johanne Frechette', '1300 Rue Labrecques', '418-122-4423', 8.25, 'WEBA21H'),
('BERS031293', 'Sonia Bergeron', '500 Rue Saint-Jean', '418-999-1133', 18.5, 'WEBA21H'),
('LAMA041190', 'Alain Lamelin', '1800 Rue des Sentinelles', '418-554-1255', 11.5, 'WEBA21H'),
('ANDN190791', 'Nathalia Andrade', '17035 Boulevard Henri-Bourassa, app 305', '5819985966', 17, 'WEBA21L');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `code` varchar(7) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`code`, `nom`, `type`) VALUES
('WEBA21L', 'Techniques de développement web A21', 'En ligne'),
('WEBA21C', 'Techniques de développement web A21', 'En classe'),
('WEBA21H', 'Techniques de développement web A21', 'Hybride'),
('MM6XQH', 'PROG2', 'enligne'),
('PEJPD25', 'PROG1', 'hybride');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomComplet` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `codePostal` varchar(7) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motDePasse` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nomComplet`, `username`, `codePostal`, `email`, `motDePasse`) VALUES
(1, 'Nathalia Borges', 'nasouza', 'G1S 3S4', 'nathaliaborgesjp@gmail.com', 'Np030218.'),
(4, 'Paulo Ricardo de Paiva Serrano', 'prserrano', 'G1S4W2', 'pauloricardoserrano@hotmail.com', 'qazwsx'),
(5, 'charles machado', 'chmachado', 'g5e6e3', 'charles@hotmail.com', '987654'),
(14, 'Michel', 'Lapointe', 'G1G 4A6', 'michel@gmail.com', '123456'),
(11, 'Raphael', 'Andrade', 'G5u3R5', 'rapahel@hotmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
