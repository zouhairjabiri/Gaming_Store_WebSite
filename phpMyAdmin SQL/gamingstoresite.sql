-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 25 mai 2018 à 00:42
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gamingstoresite`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_users`, `product_id`) VALUES
(13, 10, 1),
(14, 11, 12),
(15, 11, 6),
(16, 11, 11),
(17, 10, 3),
(18, 10, 8),
(19, 12, 1),
(20, 12, 8),
(21, 12, 12),
(22, 12, 4);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_price` float NOT NULL,
  `release_date` date NOT NULL,
  `genre` varchar(20) NOT NULL,
  `platform` varchar(15) NOT NULL,
  `img` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `release_date`, `genre`, `platform`, `img`) VALUES
(1, 'AC Origins', 30.18, '2017-10-27', 'Most_Popular', 'PC', 'Produits/Most Popular/AC Origins.jpg'),
(2, 'FORTNITE', 39.99, '2017-07-25', 'Most_Popular', 'PC', 'Produits/Most Popular/Fortnite.jpg'),
(3, 'COD BOP III', 42.99, '2015-06-11', 'Most_Popular', 'PC', 'Produits/Most Popular/COD BO3.jpg'),
(4, 'PUBG', 21.99, '2017-03-23', 'Most_Popular', 'PC', 'Produits/Most Popular/PUBG.jpg'),
(5, 'God of War', 69.99, '2018-04-20', 'New_Games', 'PS4', 'Produits/New Games/God of War.jpg'),
(6, 'Far Cry 5', 44.99, '2018-03-27', 'New_Games', 'PS4', 'Produits/New Games/Far Cry 5.jpg'),
(7, 'A Way Out', 27.39, '2018-03-23', 'New_Games', 'PC', 'Produits/New Games/A Way Out.jpg'),
(8, 'SOT', 55.99, '2018-03-20', 'New_Games', 'PC', 'Produits/New Games/Sea of Thieves.jpg'),
(9, 'Vampyr', 27.99, '2018-06-05', 'Upcoming_Games', 'PC', 'Produits/Upcoming Releases/Vampyr.jpg'),
(10, 'Frost Punk', 18.99, '2018-05-24', 'Upcoming_Games', 'PC', 'Produits/Upcoming Releases/Frostpunk.jpg'),
(11, 'DEADFIRE', 33.49, '2018-05-08', 'Upcoming_Games', 'PC', 'Produits/Upcoming Releases/Deadfire.jpg'),
(12, 'METRO', 38.99, '2018-09-27', 'Upcoming_Games', 'PC', 'Produits/Upcoming Releases/Metro Exodus.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `address` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `address`, `password`) VALUES
(12, 'younes', 'younes.amhil@gmail.com', '0613741998', 'hay el farah', '123456');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
