-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 21 oct. 2019 à 10:54
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bug`
--

-- --------------------------------------------------------

--
-- Structure de la table `bug`
--

CREATE TABLE `bug` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descript` text COLLATE utf8_unicode_ci NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `datecrea` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `bug`
--

INSERT INTO `bug` (`id`, `title`, `descript`, `statut`, `datecrea`) VALUES
(1, 'Affichage', 'L\'affichage de la page principale ne s\'effectue pas correctement', 0, '2019-10-01'),
(2, 'Facture', 'Il est impossible de supprimer une facture de l\'application', 0, '2019-10-02'),
(3, 'Planning', 'Il est impossible de revenir a la ligne sur une entree dans le planning.', 1, '2019-10-03'),
(4, 'Dossier', 'Le dossier de mon client n°123456 est trouvable via les modifications de dossier mais pas en consultation simple', 0, '2019-10-04'),
(5, 'Test', 'Test', 1, '2019-10-05'),
(6, 'Repas', 'Il faudrait un micro onde et un frigo', 0, '2019-10-06'),
(7, 'Steven', 'Mon aide a domicile', 0, '2019-10-07'),
(8, 'a', 'azerty', 0, '2019-10-08'),
(9, 'test', 'test2', 0, '2019-10-09'),
(10, 'test', 'azerty', 0, '2019-10-10'),
(11, 'testY', 'test Y', 0, '2019-10-21'),
(12, 'test injection', '<script text=\"text/javascript\">Alert(\'Hacked\')</script>', 0, '2019-10-21'),
(13, 'test injection2', '<script text=\"text/javascript\">Alert(\'Hacked\')</script>', 0, '2019-10-21'),
(14, 'test injection3', '<script text=\"text/javascript\">Alert(\'Hacked\')</script>', 0, '2019-10-21'),
(15, 'test injection4', '<script text=\"text/javascript\">Alert(\'Hacked\')</script>', 0, '2019-10-21'),
(16, 'test injection5', '<script text=\"text/javascript\">Alert(\'Hacked\')</script>', 0, '2019-10-21'),
(17, 'test injection6', '<script text=\"text/javascript\">Alert(\'Hacked\')</script>', 0, '2019-10-21'),
(18, 't', 't', 0, '2019-10-21'),
(19, 'f', 'f', 0, '2019-10-21'),
(20, 't', 't', 0, '2019-10-21'),
(21, 'test10', '&lt;script text=&quot;text/javascript&quot;&gt;Alert(\'Hacked\')&lt;/script&gt;', 0, '2019-10-21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bug`
--
ALTER TABLE `bug`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bug`
--
ALTER TABLE `bug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
