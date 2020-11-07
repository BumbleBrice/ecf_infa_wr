-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 07 nov. 2020 à 12:19
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web_radio`
--

-- --------------------------------------------------------

--
-- Structure de la table `podcasts`
--

CREATE TABLE `podcasts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_add` datetime NOT NULL DEFAULT current_timestamp(),
  `picture_file` varchar(255) NOT NULL DEFAULT 'default_picture.jpg',
  `sound_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `podcasts`
--

INSERT INTO `podcasts` (`id`, `title`, `content`, `date_add`, `picture_file`, `sound_file`) VALUES
(1, 'Donald Trump Président !', 'Donald Trump, né le 14 juin 1946 à New York, est un homme d\'affaires, animateur de télévision et homme d\'État américain. Il est le 45ᵉ président des États-Unis, depuis le 20 janvier 2017', '2020-11-04 14:09:26', '', ''),
(2, 'Joe Biden', 'Joseph Biden, dit Joe Biden, né le 20 novembre 1942 à Scranton, est un homme d\'État américain. Il est notamment vice-président des États-Unis de 2009 à 2017', '2020-11-04 14:09:26', '', ''),
(3, 'Brice', 'SUper président du monde et de la galaxie et de l\'au de la de la violacé ! !', '2020-11-04 16:41:47', '', ''),
(4, 'mon titre', 'mon contenu super hyper mega top', '2020-11-05 11:50:04', '', ''),
(5, 'Un autre super  titre', 'Hop hop je change de mon contenu super hyper mega top', '2020-11-05 11:54:44', '', ''),
(6, 'fsqdf', 'fdfsd', '2020-11-05 14:38:41', '', ''),
(7, 'Hello la news', 'hohoho la super news', '2020-11-05 14:39:09', '', ''),
(8, 'hjgjh', 'jhgjh', '2020-11-05 15:06:51', '', ''),
(9, 'cgvsgfXC', 'sqcxv', '2020-11-05 15:23:52', '', ''),
(10, 'cwxxcw', 'xwcxwc', '2020-11-05 15:34:55', '', ''),
(11, 'cxvxc', 'gxgvd', '2020-11-05 15:37:12', '', ''),
(12, 'sdffs', 'ddfs', '2020-11-05 15:44:00', '', ''),
(13, 'cxvv', 'xccwx', '2020-11-05 15:45:56', '', ''),
(14, 'fdsfsx', 'dssdf', '2020-11-05 15:50:18', '', ''),
(15, 'MA super nouvelle news', 'Qu\'elle est belle', '2020-11-05 15:53:13', '', ''),
(16, 'Joe !', 'Président !', '2020-11-05 15:53:52', '', ''),
(17, 'lkjj', 'tj', '2020-11-05 22:22:28', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cityZIp` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.png',
  `role` enum('peon','moderateur','admin') NOT NULL DEFAULT 'peon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `phone`, `address`, `cityZIp`, `city`, `password`, `avatar`, `role`) VALUES
(1, 'Brice', 'Collilieux', 'collilieux.brice@mail.com', '0636772614', 'ici et là', '33700', 'Mérignac', 'lkjghkjgkjhg', 'default.png', 'peon'),
(2, 'Brice', 'Collilieux', 'collilieux.brice@mail.com', '0636772614', 'ici et là', '33700', 'Mérignac', 'lkjghkjgkjhg', 'default.png', 'peon'),
(3, 'fdgs+', 'gfaa', 'gqdfs@ggqd.fr', '0123456789', 'frefr', '12345', 'frfr', '123', 'default.png', 'peon'),
(4, 'dsfds', 'dffs', 'fds@gr.fr', '0123456789', 'ffr', '12345', 'fds', '$2y$10$/skcIvTCn2G3CWryTB1upuMRCjQqAJ5otP3OijXtUUNiuzqRH3Bdu', 'default.png', 'peon'),
(5, 'fdsf', 'dsf', 'dfsdfq@frf.fr', '0123456789', 'fsfqs', '01234', 'fdfq', '$2y$10$JcSATyh3wxnY8PVKcTT5O.sVFGAy0hNBLpwZI9en1M6a4pt0jL996', 'default.png', 'peon'),
(6, 'dfsq', 'dsfas', 'fdfsq@frfr.fr', '0123456789', 'frfra', '12345', 'frfr', '$2y$10$ITtcIxJyJoC3qGpOU.j5hO/EMk.pCZK/btiqk0ZJkE68NyKeqWSue', 'default.png', 'peon'),
(7, 'mfdsqljfqd', 'fdlkkj', 'dsfmjkhfqsd@fd.fr', '0123456789', 'fdsqfs', '12345', 'qfsdf', '$2y$10$XNX2C7Hl3xZR90UukOB57uUtd1gzmNRFXcsoEB1TqRrnU7MvNu9ie', 'default.png', 'peon'),
(8, 'fdsq', 'dqf', 'fff@fff.fr', '0123456789', 'dvsfd', '12345', 'fsdfq', '$2y$10$7f0zZHJ0KbxMoPTXVXWD2ehTBgYsgkg9wf0ld3xBIqJl.SnDCxbXe', 'default.png', 'peon'),
(9, 'gffd', 'fsdfdg', 'aaa@aaa.aa', '0123456789', 'dsffsq', '12345', 'fqdsfd', '$2y$10$mJXxNZ12ER0/bQ0rVoc2C./cdpeHcuIuGjQ9ew3AvS1s/Z5gOwCcm', 'default.png', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
