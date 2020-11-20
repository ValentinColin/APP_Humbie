-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 20 nov. 2020 à 09:43
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
-- Structure de la table `FAQ`
--

CREATE TABLE `FAQ` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL COMMENT 'Question de la FAQ',
  `answer` varchar(255) NOT NULL COMMENT 'Réponse de la FAQ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `FAQ`
--

INSERT INTO `FAQ` (`id`, `question`, `answer`) VALUES
(1, 'Combien de temps puis-je visionner mes résultats de tests ?', 'Vos résultats de tests n\'ont pas de date d\'expiration, vous pouvez donc les visionner dés que vous le souhaitez.'),
(2, 'Est-il possible d\'afficher les résultats de tests sous forme de graphique ou de tableau ?', 'Oui, ces deux modes d\'affichages sont disponible. Vous pouvez modifier le mode d\'affichage en cliquant sur le bouton [Mode d\'affichage]'),
(3, 'Quelle est la fonction principale de ce site ?', 'Ce site permet des recueillir et de stocker des données sur l\'état psychomoteur des différents pilotes afin de limiter les accidents de travail.'),
(4, 'Est-il possible de visionner les résultats d\'autres pilotes ?', 'Non, seuls les managers pourront avoir accès a l\'ensemble des données. Ces données sont bien  sûr sécurisées et personne ne peut les exploiter, excepté vous et votre manager.'),
(5, 'Puis-je modifier mon profil ? si oui, où ça ?', 'Oui, c\'est possible en allant sur votre profil et cliquant sur sur le bouton [Modifié mon profil], puis de suivre les instructions.');

-- --------------------------------------------------------

--
-- Structure de la table `Members`
--

CREATE TABLE `Members` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '(NE PAS REMPLIR)',
  `id_manager` int(11) DEFAULT NULL COMMENT '(À remplir automatique via php)',
  `access` set('ADMIN','MANAGER','USER','') DEFAULT NULL COMMENT 'Détermine le rôle (et donc les droit d''accès) du compte suivant',
  `pseudo` varchar(255) NOT NULL COMMENT 'À remplir',
  `password` varchar(255) NOT NULL DEFAULT 'password' COMMENT 'À remplir',
  `email` varchar(255) NOT NULL COMMENT 'À remplir',
  `prenom` varchar(255) NOT NULL DEFAULT 'FIRST_NAME_UNDEFINED' COMMENT 'À remplir',
  `nom` varchar(255) NOT NULL DEFAULT 'LAST_NAME_UNDEFINED' COMMENT 'À remplir',
  `birthday_date` date DEFAULT NULL COMMENT 'À remplir',
  `aviation_licence_date` date DEFAULT NULL COMMENT 'À remplir',
  `inscription_date` date DEFAULT NULL COMMENT 'À compléter automatiquement via PHP',
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'À compléter automatiquement via PHP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Members`
--

INSERT INTO `Members` (`id`, `id_manager`, `access`, `pseudo`, `password`, `email`, `prenom`, `nom`, `birthday_date`, `aviation_licence_date`, `inscription_date`, `last_login`) VALUES
(1, NULL, 'ADMIN', 'ADMIN', '$2y$09$Oitk3bZZBbUl5TjEYfm75uJOgai5lJhCXxysmfWaV9dh2fTytU0tS', 'valentin.colin78@gmail.com', 'Valentin', 'Colin', '2000-03-14', NULL, '2020-10-13', '2020-10-13 01:22:36'),
(2, NULL, 'MANAGER', 'MANAGER', '$2y$09$Oitk3bZZBbUl5TjEYfm75uJOgai5lJhCXxysmfWaV9dh2fTytU0tS', 'valentin.colin78@gmail.com', 'Etienne', 'Favière', '2000-10-02', NULL, '2020-10-13', '2020-10-13 01:25:40'),
(3, 2, 'USER', 'USER', '$2y$09$Oitk3bZZBbUl5TjEYfm75uJOgai5lJhCXxysmfWaV9dh2fTytU0tS', 'valentin.colin78@gmail.com', 'Alexandre', 'Lin', '2001-01-10', NULL, '2020-10-13', '2020-10-13 01:27:40');

-- --------------------------------------------------------

--
-- Structure de la table `Test_Board`
--

CREATE TABLE `Test_Board` (
  `id_test` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL COMMENT 'Utilisateur qui a passé l''examen',
  `type` set('LIGHT_REACT_EXPECTED','SOUND_REACT_UNEXPECTED','SOUND_RANGE','OTHER') NOT NULL DEFAULT 'OTHER' COMMENT 'Type de l''examen passé',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de l''examen',
  `result` json DEFAULT NULL COMMENT 'Résultats de l''examen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Test_Board`
--

INSERT INTO `Test_Board` (`id_test`, `id_user`, `type`, `date`, `result`) VALUES
(1, 1, 'OTHER', '2020-10-17 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Tickets`
--

CREATE TABLE `Tickets` (
  `id_ticket` int(11) NOT NULL,
  `topic` set('login','test','private_information','') NOT NULL COMMENT 'Catégorie du ticket (parmis une liste proposer)',
  `subject` varchar(64) NOT NULL COMMENT 'sujet du ticket (texte libre)',
  `id_member` int(11) NOT NULL,
  `date_request` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date de la soumission du ticket',
  `msg_request` varchar(1024) NOT NULL COMMENT 'message descriptif du ticket',
  `id_admin` int(11) NOT NULL,
  `date_reply` timestamp NULL DEFAULT NULL COMMENT 'date de la réponse du ticket par un admin',
  `msg_reply` varchar(1024) NOT NULL DEFAULT '"NULL"' COMMENT 'réponse de l''admin au ticket',
  `status` set('on_standby','in_process','validated','') NOT NULL COMMENT 'état du ticket (en attente, en cours de traitement, validé)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `FAQ`
--
ALTER TABLE `FAQ`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Members`
--
ALTER TABLE `Members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_manager` (`id_manager`);

--
-- Index pour la table `Test_Board`
--
ALTER TABLE `Test_Board`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `Tickets`
--
ALTER TABLE `Tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `id_member` (`id_member`,`id_admin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `FAQ`
--
ALTER TABLE `FAQ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Members`
--
ALTER TABLE `Members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '(NE PAS REMPLIR)', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Test_Board`
--
ALTER TABLE `Test_Board`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Tickets`
--
ALTER TABLE `Tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
