-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 mai 2023 à 12:36
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `onlinevitrine`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `nom`, `description`) VALUES
(1, 'T_shirt', 'T_shirt category'),
(2, 'Pantalon', 'Pantalon category');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `Marque` varchar(200) DEFAULT NULL,
  `prix` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `category_id`, `nom`, `description`, `Marque`, `prix`, `photo`, `quantity`) VALUES
(1, 1, 'T-shirt Zara', 'T-shirt Zara pour homme', 'ZARA', 4500, 't-shirt_zara_homme.jpg', 50),
(2, 2, 'Jean Levis', 'Levis jeans pour homme', 'Levis', 9500, 'Pantalon_homme.jpg', 30);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(7) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `sexe` char(1) NOT NULL COMMENT '-- contains \r\n''F'' for Female or\r\n''M'' for Male',
  `birthdate` date DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` char(1) NOT NULL COMMENT '-- contains the role \r\n''U'' for simple users or\r\n''A'' for Admins',
  `address` text DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '-- contains\r\n0 for offline status or \r\n1 for online status\r\n',
  `created_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `sexe`, `birthdate`, `email`, `password`, `role`, `address`, `phone`, `photo`, `status`, `created_on`) VALUES
(1, 'admin', 'admin', 'M', '2000-05-17', 'admin_admin@gmail.com', '123456', 'A', 'Alger', NULL, NULL, NULL, NULL),
(2, 'Mahrez', 'Riyad', 'M', '1991-02-21', 'mahrez_riyad@gmail.com', '123456', 'U', 'London, GB', NULL, 'mahrez.jpg', NULL, '2023-05-17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
