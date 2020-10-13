-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 13 oct. 2020 à 14:47
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Humbie`
--

-- --------------------------------------------------------

--
-- Structure de la table `Members`
--

CREATE TABLE `Members` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '(NE PAS REMPLIR)',
  `access` set('ADMIN','MANAGER','USER','') DEFAULT NULL COMMENT 'Détermine le rôle (et donc les droit d''accès) du compte suivant',
  `pseudo` varchar(255) NOT NULL COMMENT 'À remplir',
  `password` varchar(255) NOT NULL DEFAULT 'password' COMMENT 'À remplir',
  `email` varchar(255) NOT NULL COMMENT 'À remplir',
  `id_manager` int(11) UNSIGNED DEFAULT NULL COMMENT '(Facultatif)',
  `prenom` varchar(255) NOT NULL DEFAULT 'FIRST_NAME_UNDEFINED' COMMENT 'À remplir',
  `nom` varchar(255) NOT NULL DEFAULT 'LAST_NAME_UNDEFINED' COMMENT 'À remplir',
  `birthday_date` date DEFAULT NULL COMMENT 'À remplir',
  `aviation_licence_date` date DEFAULT NULL COMMENT 'À remplir',
  `inscription_date` date DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Members`
--

INSERT INTO `Members` (`id`, `access`, `pseudo`, `password`, `email`, `id_manager`, `prenom`, `nom`, `birthday_date`, `aviation_licence_date`, `inscription_date`, `last_login`) VALUES
(1, 'ADMIN', 'ADMIN', 'password', 'valentin.colin78@gmail.com', NULL, 'Valentin', 'Colin', '2000-03-14', NULL, '2020-10-13', '2020-10-13 01:22:36'),
(2, 'MANAGER', 'MANAGER', 'password', 'valentin.colin78@gmail.com', NULL, 'Etienne', 'Favière', '2000-10-02', NULL, '2020-10-13', '2020-10-13 01:25:40'),
(3, 'USER', 'USER', 'password', 'valentin.colin78@gmail.com', 2, 'Alexandre', 'Lin', '2001-01-10', NULL, '2020-10-13', '2020-10-13 01:27:40');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Members`
--
ALTER TABLE `Members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Members`
--
ALTER TABLE `Members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '(NE PAS REMPLIR)', AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
