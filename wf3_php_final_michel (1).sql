-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 sep. 2023 à 09:06
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wf3_php_final_michel`
--

-- --------------------------------------------------------

--
-- Structure de la table `contest`
--

CREATE TABLE `contest` (
  `id_contest` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `winner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contest`
--

INSERT INTO `contest` (`id_contest`, `game_id`, `start_date`, `winner_id`) VALUES
(1, 23, '0000-00-00', 2),
(2, 25, '0000-00-00', NULL),
(3, 1, '2023-09-22', 1),
(4, 2, '2023-09-23', 2);

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `min_players` int(11) NOT NULL,
  `max_players` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id_game`, `title`, `min_players`, `max_players`) VALUES
(23, '7Wonder', 2, 7),
(24, 'Ticket to Ride', 2, 5),
(25, 'Pandemic', 2, 4),
(26, 'Munchkin', 3, 6),
(27, 'le cochon volant', 1, 50),
(28, 'le cochon plongeur', 1, 4),
(29, 'le cochon volant ', 2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE `player` (
  `id_player` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id_player`, `email`, `nickname`) VALUES
(1, 'luke.skywalker@rogue.sw', 'Luke\r\n'),
(2, 'amidala.padme@naboo.gov', 'Padme\r\n'),
(3, 'han.solo@millenium-falcon.com ', 'HanSolo\r\n'),
(4, 'chewbacca@wook.ie', 'Chewbie\r\n'),
(5, 'rey@jakku.planet', 'Rey\r\n'),
(7, 'lololo@gmail.com', 'lololo'),
(8, 'moi@gmail.com', 'moi');

-- --------------------------------------------------------

--
-- Structure de la table `player_contest`
--

CREATE TABLE `player_contest` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `player_contest`
--

INSERT INTO `player_contest` (`id`, `player_id`, `contest_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 2, 2),
(7, 3, 2),
(8, 5, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`id_contest`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id_player`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- Index pour la table `player_contest`
--
ALTER TABLE `player_contest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contest`
--
ALTER TABLE `contest`
  MODIFY `id_contest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `player`
--
ALTER TABLE `player`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `player_contest`
--
ALTER TABLE `player_contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
