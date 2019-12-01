-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 01 Décembre 2019 à 12:15
-- Version du serveur :  5.7.28-0ubuntu0.18.04.4
-- Version de PHP :  7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `modula`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imgPath` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `imgPath`) VALUES
(1, '221163', '221163', '221163.jpeg'),
(2, 'bazaar', 'Bazaar', 'bazaar.jpeg'),
(3, 'carrie', 'Carrie', 'carrie.jpeg'),
(4, 'christine', 'Christine', 'christine.jpeg'),
(5, 'cujo', 'Cujo', 'cujo.jpeg'),
(6, 'Docteur sleep', 'DrSleep', 'drsleep.jpeg'),
(7, 'La tour sombre', 'La tour sombre', 'dt.jpeg'),
(8, 'Dead Zone', 'Dead Zone', 'dz.jpeg'),
(9, 'La ligne verte', 'Un innocent condamné à mort', 'greenmile.jpeg'),
(10, 'L\'institut', 'pas lu encore', 'institute.jpeg'),
(11, 'ça', 'Meilleur roman de tous les temps', 'it.jpeg'),
(12, 'Jessie', 'Quand ton mari claque au mauvais moment...', 'jessie.jpeg'),
(13, 'Mr mercedes', 'des pouvoirs magiques..', 'mercedes.jpeg'),
(14, 'Misery', 'Quand une femme vous dit qu\'elle est fan de vous, fuyez.', 'misery.jpeg'),
(15, 'Simetierre', 'Ramener des kikis à la vie trop cool', 'petsemetary.jpeg'),
(16, 'Salem', 'Des vampires', 'salem.jpeg'),
(17, 'Shining', 'Hotel paisible', 'shining.jpeg'),
(18, 'Le fléau', 'Fin du monde vivement le remake', 'stand.jpeg'),
(19, 'Under the dome', 'Nul', 'utd.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rgpd` tinyint(1) NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `contacts`
--

INSERT INTO `contacts` (`id`, `fname`, `lname`, `mail`, `content`, `created_at`, `rgpd`, `ip`) VALUES
(35, 'Souly', 'Léo', 'leosouly@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed cursus orci. Donec ut volutpat justo, sed suscipit sem. Nullam molestie, arcu id congue maximus, eros urna fermentum lectus, accumsan molestie diam nisl eget mauris. Nunc sed iaculis sem. In eros dolor, dapibus vel interdum eu, varius ut leo. Etiam tellus risus, porta at sem vel, varius porta elit. Donec consequat aliquet dui, a tincidunt orci hendrerit at. Fusce sit amet malesuada eros. Ut ut est nec orci congue pulvinar vitae eu nibh.', '2019-12-01 11:41:14', 1, '127.0.0.1'),
(36, 'Doe', 'John', 'johndoe@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed cursus orci. Donec ut volutpat justo, sed suscipit sem. Nullam molestie, arcu id congue maximus, eros urna fermentum lectus, accumsan molestie diam nisl eget mauris. Nunc sed iaculis sem. In eros dolor, dapibus vel interdum eu, varius ut leo. Etiam tellus risus, porta at sem vel, varius porta elit. Donec consequat aliquet dui, a tincidunt orci hendrerit at. Fusce sit amet malesuada eros. Ut ut est nec orci congue pulvinar vitae eu nibh.', '2019-12-01 11:42:16', 1, '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
