-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 14 Juin 2018 à 10:20
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `crm_api`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `phone` int(14) NOT NULL,
  `id_eCommerce` int(11) NOT NULL,
  `age` int(3) NOT NULL,
  `dateBirth` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `firstname`, `lastname`, `email`, `phone`, `id_eCommerce`, `age`, `dateBirth`) VALUES
(22, 'John', 'DOE', 'pub@prestashop.com', 0, 1, 0, '1970-01-15'),
(23, 'Cedric', 'IBOR', 'cedric.ibor@gmail.com', 0, 2, 0, '1999-04-30'),
(24, 'Stephanie', 'Demontis', 's.demontis@gmail.com', 0, 3, 0, '1971-12-12'),
(25, 'Daniel', 'IBOR', 'd.ibor@gmail.com', 0, 4, 0, '1969-08-18');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `titre` text NOT NULL,
  `status` varchar(5) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `date_limit` date NOT NULL,
  `details` text NOT NULL,
  `reference` varchar(50) NOT NULL,
  `client_id` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tickets`
--

INSERT INTO `tickets` (`id_ticket`, `userId`, `titre`, `status`, `owner`, `date`, `date_limit`, `details`, `reference`, `client_id`) VALUES
(1, 1, 'ticket ticket', '0', 'owner', '2018-06-11', '2018-06-13', 'azertyazertyazertyazertyazertyazerty', '#ref003', '22'),
(3, 2, 'Ceci est un ticket', '0', 'Jonathan', '2018-06-13', '2018-06-14', 'Ceci est le detail du ticket', '#ref002', '22'),
(4, 2, 'Deuxième ticket', '10', 'Jonathan', '2018-06-13', '2018-06-14', 'Dueixème', '#ref001', '23'),
(5, 2, 'blabla', '10', 'Jonathan', '2018-06-07', '2018-06-14', 'blabla', '#ref004', '24'),
(6, 2, 'Blablablabla le PHP', '20', 'Jonathan', '2018-06-08', '2018-06-16', 'Ceci est un blabla de ouf', '#ref005', '25');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'alexis', 'leleu', 'test@test.fr', 'azerty'),
(2, 'Jonathan', 'ibor', 'jonathan.ibor@gmail.com', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `userOder`
--

CREATE TABLE `userOder` (
  `id_order` int(11) NOT NULL,
  `product` text NOT NULL,
  `user_Id` int(11) NOT NULL,
  `delivery` text NOT NULL,
  `expedition` text NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `userOder`
--

INSERT INTO `userOder` (`id_order`, `product`, `user_Id`, `delivery`, `expedition`, `date`, `price`, `reference`, `status`) VALUES
(254, 'Hummingbird printed t-shirt - Color : White, Size : S', 22, '0000-00-00 00:00:00', '', '2018-06-12', 24, 'XKBKNABJK', 'Payment by check'),
(255, 'Hummingbird printed sweater - Color : White, Size : S', 22, '0000-00-00 00:00:00', '', '2018-06-12', 36, 'XKBKNABJK', 'Payment by check'),
(256, 'The adventure begins Framed poster - Size : 80x120cm', 22, '0000-00-00 00:00:00', '', '2018-06-12', 29, 'OHSATSERP', 'Payment by check'),
(257, 'Mug Today is a good day', 22, '0000-00-00 00:00:00', '', '2018-06-12', 12, 'OHSATSERP', 'Payment by check'),
(258, 'Mountain fox notebook Style : Ruled', 22, '0000-00-00 00:00:00', '', '2018-06-12', 13, 'UOYEVOLI', 'Payment by check'),
(259, 'Mountain fox notebook Style : Plain', 22, '0000-00-00 00:00:00', '', '2018-06-12', 13, 'FFATNOMMJ', 'Payment by check'),
(260, 'Brown bear cushion Color : Black', 22, '0000-00-00 00:00:00', '', '2018-06-12', 19, 'KHWLILZLL', 'Bank wire');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `userOder`
--
ALTER TABLE `userOder`
  ADD PRIMARY KEY (`id_order`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `userOder`
--
ALTER TABLE `userOder`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=261;