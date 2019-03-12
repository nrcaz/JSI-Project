-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 30, 2019 at 01:53 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `jsi_partners`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `equipement` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surface` int(11) DEFAULT NULL,
  `loyer` int(11) DEFAULT NULL,
  `charges` int(11) DEFAULT NULL,
  `disponibilite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bureaux` int(11) DEFAULT NULL,
  `open_space` int(11) DEFAULT NULL,
  `salle_reunion` int(11) DEFAULT NULL,
  `espace_detente` int(11) DEFAULT NULL,
  `accueil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `description`, `equipement`, `type`, `lieu`, `surface`, `loyer`, `charges`, `disponibilite`, `bureaux`, `open_space`, `salle_reunion`, `espace_detente`, `accueil`, `date_creation`, `note`, `image1`, `image2`, `image3`, `image4`, `image5`) VALUES
(2, 'Bureaux à louer | 565m² dans le 12ème arrondissement', 'Dans un immeuble ancien situé à proximité immédiate de la place de la Bastille, nous vous proposons à la location, des bureaux lumineux et atypiques', '• Bonne flexibilité d’aménagement \r\n• Terrasse \r\n• Chauffage électrique \r\n• Câblage informatique \r\n• Faux plancher \r\n• Double accès', 'non divisibles', '34 rue du Faubourg Saint Antoine', 565, 520, 27, 'Oui', 0, 0, 0, 1, 'Non', NULL, NULL, 'assets/upload/Capture d’écran 2019-01-28 à 14.08.40.png', 'assets/upload/Capture d’écran 2019-01-28 à 14.07.56.png', 'assets/upload/Capture d’écran 2019-01-28 à 14.08.22.png', 'assets/upload/Capture d’écran 2019-01-28 à 14.08.54.png', 'assets/upload/Capture d’écran 2019-01-28 à 14.09.12.png'),
(3, 'Sous-location | 170 m non divisibles dans le 9ème arrondissement', 'GRANDS BOULEVARDS : Plateau fonctionnel entièrement rénové, dans un bel immeuble avec hôtesse d’accueil.', 'Accès indépendant \r\n• Accès une cuisine et à des salles de réunion \r\n• Climatisation \r\n• Moquette/Faux plafond \r\n• Fibre optique \r\n• Câblage \r\n• Plug & Play', 'immeuble', '10 rue du faubourg Montmartre, 75009 Paris', 170, 500, 120, 'Oui', 30, 1, 1, 1, 'Oui', '2019-01-26 16:53:38', NULL, 'assets/upload/Capture d’écran 2019-01-28 à 14.05.13.png', 'assets/upload/Capture d’écran 2019-01-28 à 14.04.39.png', 'assets/upload/Capture d’écran 2019-01-28 à 14.04.21.png', NULL, NULL),
(4, 'Bureau à louer | Paris 10, 87m² non divisibles', 'Dans un environnement très calme, en plein cœur du 10e arrondissement, nous vous proposons une surface de bureaux atypique, style loft, prêt à l’emploi. ESPACE IDEAL POUR AGENCE DE COMMUNICATION, SHOWROOM, CABINET D’ARCHITECTES.', 'Verrière\r\nChauffage individuel au gaz\r\nGardienne\r\nDigicode', 'Loft', '14 rue Taylor, 75010 Paris', 87, 33930, 35, 'Oui', 1, 1, 0, 1, 'Oui', '2019-01-29 15:44:11', NULL, 'assets/upload/Capture d’écran 2019-01-28 à 14.01.10.png', 'assets/upload/Capture d’écran 2019-01-28 à 14.00.29.png', 'assets/upload/Capture d’écran 2019-01-28 à 14.01.40.png', 'assets/upload/Capture d’écran 2019-01-28 à 14.00.51.png', NULL),
(5, 'Bureau à louer | Paris 10, 200m² non divisibles', 'Il s’agit d’un lot indépendant de type loft sur deux niveaux et donnant sur une très belle cour pavée (grandes potentialités, hauteur 4 mètres).', 'Cours privée', 'Loft', '10 rue du faubourg St-Honorés, 75009 Paris', 230, 2000, 100, 'Oui', 30, 3, 4, 2, 'Non', '2019-01-30 09:32:47', NULL, 'assets/upload/republique.jpg', 'assets/upload/republique1.jpg', 'assets/upload/chairs-coworking-desks-7071.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidature`
--

CREATE TABLE `candidature` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_reception` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `societe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `demande` longtext COLLATE utf8mb4_unicode_ci,
  `date_reception` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `societe`, `email`, `telephone`, `message`, `demande`, `date_reception`) VALUES
(1, 'Kenny JAMES', 'Saint-James', 'Kenny-james@hotmail.com', '0768277008', 'coucou', NULL, '2019-01-26 17:06:38'),
(2, 'Junior', 'juniorCO', 'sssssss@gmil.caca', '0898989898', 'celfdcgouefbvf', 'Surface 0 - 201111\r\n			| 12+ Bureaux\r\n			| 1+ Open Space\r\n			| 2+ Salles de Reunion\r\n			| 1+ Cuisine / Espace detente', '2019-01-28 16:51:49'),
(3, 'Moi', 'MOI et Compagnie', 'plusieurs-moi@gmail.com', '0606060606', 'Nous allons beaucoup mieux.', NULL, '2019-01-29 16:49:10'),
(4, 'EncoreNOUS', 'NOUS pas seul', 'nous@mail.me', NULL, 'J\'ai remplis ce formulaire nous attendons beaucoup de vous', 'Surface 0 - 2011 m² \r\n| 8+ Bureaux \r\n| 1+ Open Space \r\n| 3+ Salles de Reunion \r\n| 0+ Cuisine / Espace detente', '2019-01-29 16:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20190117155201'),
('20190122101300'),
('20190126164851');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_key_forget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_key_forget_expiration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `password_key_forget`, `password_key_forget_expiration`) VALUES
(3, 'steph', 'srouek@gmail.com', '$2y$13$aZn7FyaEnVRxZTwrAPW/POhDX2NSDbq7o/FJfzuYq5A9.yOw2CA2m', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
