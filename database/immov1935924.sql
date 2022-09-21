-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 08 sep. 2022 à 19:31
-- Version du serveur : 10.3.34-MariaDB-0+deb10u1
-- Version de PHP : 7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immover`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `idadmin` int(11) NOT NULL,
  `pass` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`idadmin`, `pass`, `created_at`, `updated_at`) VALUES
(1, '2345', '2022-02-23 09:27:31', '2022-02-23 09:27:31');

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `idagents` int(11) NOT NULL,
  `nomagent` text NOT NULL,
  `phone` text NOT NULL,
  `mail` text NOT NULL,
  `codeagent` text NOT NULL,
  `statut` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`idagents`, `nomagent`, `phone`, `mail`, `codeagent`, `statut`, `created_at`, `updated_at`) VALUES
(1, 'Tan Gogbeu Hervé', '0759718977', 'gogbeuherve@gmail.com', '420', 'Démarcheur', '2022-08-30 05:38:16', '2022-08-30 05:38:16');

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

CREATE TABLE `alerte` (
  `alerteid` int(11) NOT NULL,
  `typopera` int(11) NOT NULL,
  `pays` int(11) NOT NULL,
  `ville` int(11) NOT NULL,
  `quartier` int(11) NOT NULL,
  `typebien` int(11) NOT NULL,
  `email` text NOT NULL,
  `stat` int(11) NOT NULL DEFAULT 0 COMMENT '0 = actif | 1 = desacti',
  `tel` text DEFAULT NULL,
  `budget` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `alerte`
--

INSERT INTO `alerte` (`alerteid`, `typopera`, `pays`, `ville`, `quartier`, `typebien`, `email`, `stat`, `tel`, `budget`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 1, 1, 7, 'devdodo225@gmail.com', 1, NULL, NULL, '2022-08-15 15:24:58', '2022-08-15 15:24:58'),
(2, 9, 1, 1, 15, 12, 'brikapanan239@gmail.com', 0, NULL, NULL, '2022-08-15 18:00:40', '2022-08-15 18:00:40'),
(3, 8, 1, 1, 8, 13, 'moussaa14@yahoo.fr', 0, NULL, NULL, '2022-08-16 21:15:24', '2022-08-16 21:15:24'),
(4, 8, 1, 1, 4, 13, 'moussaa14@yahoo.fr', 0, NULL, NULL, '2022-08-16 21:16:08', '2022-08-16 21:16:08'),
(5, 8, 1, 1, 2, 8, 'boghug@gmail.com', 0, NULL, NULL, '2022-08-16 21:30:48', '2022-08-16 21:30:48'),
(6, 8, 1, 1, 2, 8, 'mayokadbadji@gmail.com', 1, NULL, NULL, '2022-08-16 21:31:54', '2022-08-16 21:31:54'),
(7, 9, 1, 4, 27, 12, 'ehu.manuela@gmail.com', 0, NULL, NULL, '2022-08-16 23:30:57', '2022-08-16 23:30:57'),
(8, 8, 1, 1, 2, 13, 'souleymanefrance2022@gmail.com', 0, NULL, NULL, '2022-08-17 07:00:40', '2022-08-17 07:00:40'),
(9, 8, 1, 1, 2, 8, 'dionmakadoflorent@gmail.com', 0, NULL, NULL, '2022-08-17 07:37:44', '2022-08-17 07:37:44'),
(10, 8, 1, 1, 3, 7, 'Juliakass05@gmail.com', 0, NULL, NULL, '2022-08-17 07:45:03', '2022-08-17 07:45:03'),
(11, 9, 1, 1, 2, 14, 'ehu.manuela@gmail.com', 0, NULL, NULL, '2022-08-17 10:53:54', '2022-08-17 10:53:54'),
(12, 9, 1, 44, 81, 12, 'angekoffi280@gmail.com', 0, NULL, NULL, '2022-08-17 12:22:51', '2022-08-17 12:22:51'),
(13, 9, 1, 2, 40, 12, 'angekoffi280@gmail.com', 0, NULL, NULL, '2022-08-17 12:24:03', '2022-08-17 12:24:03'),
(14, 9, 1, 39, 63, 12, 'angekoffi280@gmail.com', 0, NULL, NULL, '2022-08-17 12:24:31', '2022-08-17 12:24:31'),
(15, 9, 1, 6, 20, 12, 'angekoffi280@gmail.com', 0, NULL, NULL, '2022-08-17 12:25:09', '2022-08-17 12:25:09'),
(16, 9, 1, 1, 2, 7, 'Soul2soul1er@gmail.com', 0, NULL, NULL, '2022-08-18 12:35:50', '2022-08-18 12:35:50'),
(17, 9, 1, 1, 15, 14, 'somobat.immo@gmail.com', 0, NULL, NULL, '2022-08-18 13:29:59', '2022-08-18 13:29:59'),
(18, 9, 1, 1, 23, 14, 'somobat.immo@gmail.com', 0, NULL, NULL, '2022-08-18 13:30:13', '2022-08-18 13:30:13'),
(19, 8, 1, 1, 23, 14, 'somobat.immo@gmail.com', 0, NULL, NULL, '2022-08-18 13:39:25', '2022-08-18 13:39:25'),
(20, 9, 1, 1, 2, 12, 'Yhvk@gmail.com', 0, NULL, NULL, '2022-08-18 13:39:45', '2022-08-18 13:39:45'),
(21, 8, 1, 1, 3, 8, 'proautovitrage@yahoo.fr', 0, NULL, NULL, '2022-08-18 15:49:31', '2022-08-18 15:49:31'),
(22, 8, 1, 1, 3, 7, 'proautovitrage@yahoo.fr', 0, NULL, NULL, '2022-08-18 15:49:51', '2022-08-18 15:49:51'),
(23, 8, 1, 1, 2, 8, 'eulogepatrick4385@gmail.com', 0, NULL, NULL, '2022-08-19 12:45:18', '2022-08-19 12:45:18'),
(24, 8, 1, 1, 2, 10, 'hebergementscotedivoire@gmail.com', 0, NULL, NULL, '2022-08-21 12:39:49', '2022-08-21 12:39:49'),
(25, 8, 1, 1, 4, 8, 'joellame3@gmail.com', 0, NULL, NULL, '2022-08-22 08:52:28', '2022-08-22 08:52:28'),
(26, 8, 1, 1, 7, 13, 'kikouseverin2018@gmail.com', 0, NULL, NULL, '2022-08-22 09:37:39', '2022-08-22 09:37:39'),
(27, 8, 1, 1, 2, 7, 'Joelhoba@gmail.com', 0, NULL, NULL, '2022-08-22 12:42:50', '2022-08-22 12:42:50'),
(28, 8, 1, 2, 42, 8, 'Akakoua64@gmail.com', 0, NULL, NULL, '2022-08-22 13:51:30', '2022-08-22 13:51:30'),
(29, 8, 1, 1, 7, 8, 'Josephabidjan@gmail.com', 0, NULL, NULL, '2022-08-22 15:50:46', '2022-08-22 15:50:46'),
(30, 8, 1, 1, 7, 13, 'adjoumanipaulin6@gmail.com', 0, NULL, NULL, '2022-08-22 15:51:52', '2022-08-22 15:51:52'),
(31, 8, 1, 1, 7, 8, 'bamorykamat@yahoo.fr', 0, NULL, NULL, '2022-08-22 16:14:37', '2022-08-22 16:14:37'),
(32, 8, 1, 1, 3, 13, 'eaugustinezechiel21@gmail.com', 0, NULL, NULL, '2022-08-22 16:17:48', '2022-08-22 16:17:48'),
(33, 8, 1, 1, 14, 13, 'eaugustinezechiel21@gmail.com', 0, NULL, NULL, '2022-08-22 16:18:09', '2022-08-22 16:18:09'),
(34, 8, 1, 1, 4, 13, 'eaugustinezechiel21@gmail.com', 0, NULL, NULL, '2022-08-22 16:18:30', '2022-08-22 16:18:30'),
(35, 8, 1, 1, 21, 13, 'eaugustinezechiel21@gmail.com', 0, NULL, NULL, '2022-08-22 16:18:37', '2022-08-22 16:18:37'),
(36, 8, 1, 1, 6, 13, 'Romaricaffo@gmail.com', 0, NULL, NULL, '2022-08-22 16:19:57', '2022-08-22 16:19:57'),
(37, 8, 1, 1, 4, 7, 'genedossou@gmail.com', 0, NULL, NULL, '2022-08-22 16:28:22', '2022-08-22 16:28:22'),
(38, 8, 1, 1, 7, 10, 'bonygoma7@gmail.com', 0, NULL, NULL, '2022-08-22 16:36:20', '2022-08-22 16:36:20'),
(39, 8, 1, 1, 21, 7, 'anisettekouassi95@gmail.com', 0, NULL, NULL, '2022-08-22 16:42:12', '2022-08-22 16:42:12'),
(40, 8, 1, 1, 1, 7, 'anisettekouassi95@gmail.com', 0, NULL, NULL, '2022-08-22 16:42:24', '2022-08-22 16:42:24'),
(41, 8, 1, 1, 6, 7, 'Djakwme@gmail.com', 0, NULL, NULL, '2022-08-22 16:42:32', '2022-08-22 16:42:32'),
(42, 8, 1, 2, 33, 13, 'djipidesouza@gmail.com', 0, NULL, NULL, '2022-08-22 16:48:01', '2022-08-22 16:48:01'),
(43, 8, 1, 1, 2, 8, 'nicoleyao1983@gmail.com', 0, NULL, NULL, '2022-08-22 16:49:34', '2022-08-22 16:49:34'),
(44, 8, 1, 1, 11, 8, 'Kady.coul07@gmail.com', 0, NULL, NULL, '2022-08-22 16:53:26', '2022-08-22 16:53:26'),
(45, 8, 1, 1, 15, 8, 'Kady.coul07@gmail.com', 0, NULL, NULL, '2022-08-22 16:53:42', '2022-08-22 16:53:42'),
(46, 8, 1, 1, 5, 8, 'Kady.coul07@gmail.com', 0, NULL, NULL, '2022-08-22 16:53:58', '2022-08-22 16:53:58'),
(47, 9, 1, 1, 4, 7, 'Reginadjereye.2018@gmail.com', 0, NULL, NULL, '2022-08-22 16:58:24', '2022-08-22 16:58:24'),
(48, 8, 1, 1, 2, 11, 'Kiasangare25@gmail.com', 0, NULL, NULL, '2022-08-22 17:56:50', '2022-08-22 17:56:50'),
(49, 8, 1, 1, 2, 8, 'kbeg.kbd@gmail.com', 1, NULL, NULL, '2022-08-22 18:10:34', '2022-08-22 18:10:34'),
(50, 8, 1, 1, 23, 7, 'Fleursess@gmail.com', 0, NULL, NULL, '2022-08-22 18:14:00', '2022-08-22 18:14:00'),
(51, 8, 1, 1, 1, 7, 'Anicet.kien@sgci.ci', 0, NULL, NULL, '2022-08-22 21:01:26', '2022-08-22 21:01:26'),
(52, 8, 1, 1, 2, 7, 'paulmariek05@gmail.com', 0, NULL, NULL, '2022-08-22 21:15:29', '2022-08-22 21:15:29'),
(53, 8, 1, 1, 7, 8, 'Daniellahouian@gmail.com', 0, NULL, NULL, '2022-08-22 22:15:11', '2022-08-22 22:15:11'),
(54, 8, 1, 1, 7, 13, 'bieuvevra@gmail.com', 0, NULL, NULL, '2022-08-22 23:58:36', '2022-08-22 23:58:36'),
(55, 8, 1, 1, 3, 7, 'cisseverges@gmail.com', 0, NULL, NULL, '2022-08-23 00:18:23', '2022-08-23 00:18:23'),
(56, 8, 1, 1, 3, 8, 'cisseverges@gmail.com', 0, NULL, NULL, '2022-08-23 00:18:39', '2022-08-23 00:18:39'),
(57, 8, 1, 1, 2, 8, 'Kouadioyeman@live.fr', 0, NULL, NULL, '2022-08-23 00:22:02', '2022-08-23 00:22:02'),
(58, 8, 1, 1, 21, 13, 'borismangre@gmail.com', 0, NULL, NULL, '2022-08-23 00:51:56', '2022-08-23 00:51:56'),
(59, 8, 1, 1, 7, 7, 'cynthialehi47221187@gmail.com', 0, NULL, NULL, '2022-08-23 05:52:22', '2022-08-23 05:52:22'),
(60, 8, 1, 1, 4, 10, 'Toure.joa1@gmail.com', 0, NULL, NULL, '2022-08-23 07:14:33', '2022-08-23 07:14:33'),
(61, 8, 1, 1, 1, 13, 'leministredurire@gmail.com', 0, NULL, NULL, '2022-08-23 07:46:12', '2022-08-23 07:46:12'),
(62, 9, 1, 1, 2, 7, 'mauryfofana@yahoo.com', 0, NULL, NULL, '2022-08-23 08:25:18', '2022-08-23 08:25:18'),
(63, 9, 1, 1, 7, 7, 'mauryfofana@yahoo.com', 0, NULL, NULL, '2022-08-23 08:25:31', '2022-08-23 08:25:31'),
(64, 8, 1, 1, 2, 13, 'Hyannokouadio@gmail.com', 0, NULL, NULL, '2022-08-23 10:00:49', '2022-08-23 10:00:49'),
(65, 8, 1, 1, 6, 7, 'boguiemmanuel55@gmail.com', 0, NULL, NULL, '2022-08-23 11:21:26', '2022-08-23 11:21:26'),
(66, 8, 1, 1, 2, 13, 'talinganoshalom@gmail.com', 0, NULL, NULL, '2022-08-23 12:17:17', '2022-08-23 12:17:17'),
(67, 8, 1, 1, 2, 13, 'nguessaj2010@gmail.com', 0, NULL, NULL, '2022-08-23 12:32:29', '2022-08-23 12:32:29'),
(68, 8, 1, 1, 2, 8, 'coralliekouame4@gmail.com', 0, NULL, NULL, '2022-08-23 13:30:40', '2022-08-23 13:30:40'),
(69, 8, 1, 1, 167, 8, 'yonahabe@gmail.com', 0, NULL, NULL, '2022-08-23 13:46:07', '2022-08-23 13:46:07'),
(70, 8, 1, 6, 184, 7, 'kpandjifranck@gmail.com', 0, NULL, NULL, '2022-08-23 16:01:57', '2022-08-23 16:01:57'),
(71, 8, 1, 6, 180, 7, 'kpandjifranck@gmail.com', 0, NULL, NULL, '2022-08-23 16:02:11', '2022-08-23 16:02:11'),
(72, 8, 1, 6, 22, 7, 'kpandjifranck@gmail.com', 0, NULL, NULL, '2022-08-23 16:02:45', '2022-08-23 16:02:45'),
(73, 9, 1, 3, 26, 11, 'soromohamed703@gmail.com', 0, NULL, NULL, '2022-08-23 17:00:05', '2022-08-23 17:00:05'),
(74, 8, 1, 1, 2, 8, 'katykone@gmail.com', 0, NULL, NULL, '2022-08-23 20:30:51', '2022-08-23 20:30:51'),
(75, 9, 1, 1, 2, 14, 'anomaguyro@gmail.com', 0, NULL, NULL, '2022-08-23 21:51:48', '2022-08-23 21:51:48'),
(76, 8, 1, 1, 2, 8, 'amorofikanga@gmail.com', 0, NULL, NULL, '2022-08-24 03:29:17', '2022-08-24 03:29:17'),
(77, 8, 1, 1, 176, 11, 'Mireille.diby@apave.com', 0, NULL, NULL, '2022-08-24 06:28:49', '2022-08-24 06:28:49'),
(78, 8, 1, 1, 161, 8, 'isabellebleguya@gmail.com', 0, NULL, NULL, '2022-08-24 16:12:12', '2022-08-24 16:12:12'),
(79, 8, 1, 1, 7, 8, 'gonahiravel@gmail.com', 0, NULL, NULL, '2022-08-25 16:17:27', '2022-08-25 16:17:27'),
(80, 8, 1, 1, 21, 11, 'parfaitkano08@gmail.com', 0, NULL, NULL, '2022-08-25 21:15:13', '2022-08-25 21:15:13'),
(81, 9, 1, 1, 2, 11, 'parfaitkano08@gmail.com', 0, NULL, NULL, '2022-08-25 21:15:35', '2022-08-25 21:15:35'),
(82, 8, 1, 1, 7, 9, 'kambirepascal48@gmail.com', 0, NULL, NULL, '2022-08-26 01:17:15', '2022-08-26 01:17:15'),
(83, 8, 1, 1, 172, 9, 'kambirepascal48@gmail.com', 0, NULL, NULL, '2022-08-26 01:17:55', '2022-08-26 01:17:55'),
(84, 8, 1, 1, 2, 13, 'aimemichael8@gmail.com', 0, NULL, NULL, '2022-08-26 11:16:42', '2022-08-26 11:16:42'),
(86, 8, 1, 1, 2, 8, 'Youuriellechardenniamba@gmail.com', 0, '0758606987', '200000', '2022-08-29 10:23:53', '2022-08-29 10:23:53'),
(87, 8, 1, 1, 2, 11, 'sodraconstructionetservice@gmail.com', 0, '0749769354', '500000', '2022-08-30 17:44:43', '2022-08-30 17:44:43'),
(88, 8, 1, 1, 161, 8, 'paulolatte225@gmail.com', 0, '0141368530', '200000', '2022-08-30 18:55:45', '2022-08-30 18:55:45'),
(89, 8, 1, 1, 15, 7, 'amagouasonia@live.fr', 0, '0757792932', '200000', '2022-08-31 12:35:19', '2022-08-31 12:35:19'),
(90, 8, 1, 1, 171, 7, 'amangouasonia@live.fr', 0, '0757792932', '180000', '2022-08-31 13:28:43', '2022-08-31 13:28:43'),
(91, 8, 1, 1, 2, 11, 'annemichelekouame@gmail.com', 0, '0171877639', '150000', '2022-09-02 19:05:03', '2022-09-02 19:05:03');

-- --------------------------------------------------------

--
-- Structure de la table `alertebiens`
--

CREATE TABLE `alertebiens` (
  `alertebiensid` int(11) NOT NULL,
  `debut` text NOT NULL,
  `fin` text NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `alertebiens`
--

INSERT INTO `alertebiens` (`alertebiensid`, `debut`, `fin`, `statut`, `created_at`, `updated_at`) VALUES
(1, '2022-08-10', '2022-08-14', 1, '2022-08-11 16:13:55', '2022-08-11 16:13:55'),
(3, '2022-08-14', '2022-08-16', 1, '2022-08-14 00:34:01', '2022-08-14 00:34:01'),
(4, '2022-08-14', '2022-08-16', 1, '2022-08-14 00:34:03', '2022-08-14 00:34:03'),
(5, '2022-08-16', '2022-08-18', 1, '2022-08-16 03:01:16', '2022-08-16 03:01:16'),
(6, '2022-08-16', '2022-08-18', 1, '2022-08-16 03:03:50', '2022-08-16 03:03:50'),
(7, '2022-08-18', '2022-08-20', 1, '2022-08-18 00:25:23', '2022-08-18 00:25:23'),
(8, '2022-08-18', '2022-08-20', 1, '2022-08-18 00:25:23', '2022-08-18 00:25:23'),
(9, '2022-08-18', '2022-08-20', 1, '2022-08-18 00:25:29', '2022-08-18 00:25:29'),
(10, '2022-08-20', '2022-08-22', 1, '2022-08-20 00:18:12', '2022-08-20 00:18:12'),
(11, '2022-08-20', '2022-08-22', 1, '2022-08-20 00:18:30', '2022-08-20 00:18:30'),
(12, '2022-08-20', '2022-08-22', 1, '2022-08-20 00:18:31', '2022-08-20 00:18:31'),
(13, '2022-08-22', '2022-08-24', 1, '2022-08-22 00:01:51', '2022-08-22 00:01:51'),
(14, '2022-08-22', '2022-08-24', 1, '2022-08-22 00:02:06', '2022-08-22 00:02:06'),
(15, '2022-08-22', '2022-08-24', 1, '2022-08-22 00:02:06', '2022-08-22 00:02:06'),
(16, '2022-08-24', '2022-08-26', 1, '2022-08-24 00:20:02', '2022-08-24 00:20:02'),
(17, '2022-08-24', '2022-08-26', 1, '2022-08-24 00:20:04', '2022-08-24 00:20:04'),
(18, '2022-08-24', '2022-08-26', 1, '2022-08-24 00:20:04', '2022-08-24 00:20:04'),
(19, '2022-08-24', '2022-08-26', 1, '2022-08-24 00:20:04', '2022-08-24 00:20:04'),
(20, '2022-08-24', '2022-08-26', 1, '2022-08-24 00:20:10', '2022-08-24 00:20:10'),
(21, '2022-08-24', '2022-08-26', 1, '2022-08-24 00:20:44', '2022-08-24 00:20:44'),
(22, '2022-08-26', '2022-08-28', 1, '2022-08-26 00:52:38', '2022-08-26 00:52:38'),
(23, '2022-08-26', '2022-08-28', 1, '2022-08-26 01:05:58', '2022-08-26 01:05:58'),
(24, '2022-08-26', '2022-08-28', 1, '2022-08-26 01:12:52', '2022-08-26 01:12:52'),
(25, '2022-08-26', '2022-08-28', 1, '2022-08-26 01:13:23', '2022-08-26 01:13:23'),
(26, '2022-08-26', '2022-08-28', 1, '2022-08-26 01:14:18', '2022-08-26 01:14:18'),
(27, '2022-08-26', '2022-08-28', 1, '2022-08-26 01:14:32', '2022-08-26 01:14:32'),
(28, '2022-08-28', '2022-08-30', 1, '2022-08-28 00:07:12', '2022-08-28 00:07:12'),
(29, '2022-08-28', '2022-08-30', 1, '2022-08-28 00:07:14', '2022-08-28 00:07:14'),
(30, '2022-08-28', '2022-08-30', 1, '2022-08-28 00:07:27', '2022-08-28 00:07:27'),
(31, '2022-08-28', '2022-08-30', 1, '2022-08-28 00:08:09', '2022-08-28 00:08:09'),
(32, '2022-08-28', '2022-08-30', 1, '2022-08-28 00:08:09', '2022-08-28 00:08:09'),
(33, '2022-08-28', '2022-08-30', 1, '2022-08-28 00:09:58', '2022-08-28 00:09:58'),
(34, '2022-08-28', '2022-08-30', 1, '2022-08-28 00:12:46', '2022-08-28 00:12:46'),
(35, '2022-08-30', '2022-09-01', 1, '2022-08-30 00:07:20', '2022-08-30 00:07:20'),
(36, '2022-08-30', '2022-09-01', 1, '2022-08-30 00:07:20', '2022-08-30 00:07:20'),
(37, '2022-08-30', '2022-09-01', 1, '2022-08-30 00:07:20', '2022-08-30 00:07:20'),
(38, '2022-08-30', '2022-09-01', 1, '2022-08-30 00:07:21', '2022-08-30 00:07:21'),
(39, '2022-08-30', '2022-09-01', 1, '2022-08-30 00:07:21', '2022-08-30 00:07:21'),
(40, '2022-08-30', '2022-09-01', 1, '2022-08-30 00:07:21', '2022-08-30 00:07:21'),
(41, '2022-08-30', '2022-09-01', 1, '2022-08-30 00:07:21', '2022-08-30 00:07:21'),
(42, '2022-09-01', '2022-09-03', 1, '2022-09-01 00:06:50', '2022-09-01 00:06:50'),
(43, '2022-09-01', '2022-09-03', 1, '2022-09-01 03:27:47', '2022-09-01 03:27:47'),
(44, '2022-09-01', '2022-09-03', 1, '2022-09-01 03:30:24', '2022-09-01 03:30:24'),
(45, '2022-09-01', '2022-09-03', 1, '2022-09-01 05:54:48', '2022-09-01 05:54:48'),
(46, '2022-09-01', '2022-09-03', 1, '2022-09-01 07:21:37', '2022-09-01 07:21:37'),
(47, '2022-09-01', '2022-09-03', 1, '2022-09-01 07:22:15', '2022-09-01 07:22:15'),
(48, '2022-09-01', '2022-09-03', 1, '2022-09-01 07:22:35', '2022-09-01 07:22:35'),
(49, '2022-09-03', '2022-09-05', 1, '2022-09-03 00:19:07', '2022-09-03 00:19:07'),
(50, '2022-09-03', '2022-09-05', 1, '2022-09-03 00:19:08', '2022-09-03 00:19:08'),
(51, '2022-09-03', '2022-09-05', 1, '2022-09-03 00:19:41', '2022-09-03 00:19:41'),
(52, '2022-09-03', '2022-09-05', 1, '2022-09-03 00:22:31', '2022-09-03 00:22:31'),
(53, '2022-09-03', '2022-09-05', 1, '2022-09-03 00:25:07', '2022-09-03 00:25:07'),
(54, '2022-09-03', '2022-09-05', 1, '2022-09-03 01:40:34', '2022-09-03 01:40:34'),
(55, '2022-09-03', '2022-09-05', 1, '2022-09-03 01:40:51', '2022-09-03 01:40:51'),
(56, '2022-09-03', '2022-09-05', 1, '2022-09-03 01:41:21', '2022-09-03 01:41:21'),
(57, '2022-09-05', '2022-09-07', 1, '2022-09-05 00:03:27', '2022-09-05 00:03:27'),
(58, '2022-09-05', '2022-09-07', 1, '2022-09-05 00:06:45', '2022-09-05 00:06:45'),
(59, '2022-09-05', '2022-09-07', 1, '2022-09-05 00:55:53', '2022-09-05 00:55:53'),
(60, '2022-09-05', '2022-09-07', 1, '2022-09-05 00:56:09', '2022-09-05 00:56:09'),
(61, '2022-09-05', '2022-09-07', 1, '2022-09-05 00:56:15', '2022-09-05 00:56:15'),
(62, '2022-09-05', '2022-09-07', 1, '2022-09-05 00:56:46', '2022-09-05 00:56:46'),
(63, '2022-09-05', '2022-09-07', 1, '2022-09-05 00:56:58', '2022-09-05 00:56:58'),
(64, '2022-09-05', '2022-09-07', 1, '2022-09-05 00:57:01', '2022-09-05 00:57:01'),
(65, '2022-09-07', '2022-09-09', 0, '2022-09-07 00:22:13', '2022-09-07 00:22:13'),
(66, '2022-09-07', '2022-09-09', 0, '2022-09-07 01:14:49', '2022-09-07 01:14:49'),
(67, '2022-09-07', '2022-09-09', 0, '2022-09-07 01:15:30', '2022-09-07 01:15:30'),
(68, '2022-09-07', '2022-09-09', 0, '2022-09-07 01:51:04', '2022-09-07 01:51:04'),
(69, '2022-09-07', '2022-09-09', 0, '2022-09-07 06:13:45', '2022-09-07 06:13:45'),
(70, '2022-09-07', '2022-09-09', 0, '2022-09-07 06:14:33', '2022-09-07 06:14:33'),
(71, '2022-09-07', '2022-09-09', 0, '2022-09-07 06:15:38', '2022-09-07 06:15:38'),
(72, '2022-09-07', '2022-09-09', 0, '2022-09-07 06:15:56', '2022-09-07 06:15:56');

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

CREATE TABLE `biens` (
  `idbiens` int(11) NOT NULL,
  `gerants_idgerant` int(11) NOT NULL,
  `typesbiens_idtypes` int(11) NOT NULL,
  `typesoperations_idtypesoperations` int(11) NOT NULL,
  `pays` text NOT NULL,
  `villes` text NOT NULL,
  `quartier` text NOT NULL,
  `libele` text NOT NULL,
  `prix` text NOT NULL,
  `resume` text NOT NULL,
  `descript` text NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `img4` text NOT NULL,
  `img5` text DEFAULT NULL,
  `img6` text DEFAULT NULL,
  `img7` text DEFAULT NULL,
  `img8` text DEFAULT NULL,
  `statut` int(11) NOT NULL DEFAULT 0 COMMENT '0 => actif | 1 => annule ou solde| ',
  `codebiens` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `biens`
--

INSERT INTO `biens` (`idbiens`, `gerants_idgerant`, `typesbiens_idtypes`, `typesoperations_idtypesoperations`, `pays`, `villes`, `quartier`, `libele`, `prix`, `resume`, `descript`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `statut`, `codebiens`, `created_at`, `updated_at`) VALUES
(26, 87, 8, 9, '1', '3', '16', 'Sublime Résidence 2x 3pièces et 4 studios à Bassam 411m2', '120000000', '120.000.000 Fcfa', 'Doc: ACD global \r\n\r\nNouvelle construction\r\nprêt à  être habiter \r\nil reste que les abonnements eau et électricité \r\nConstruite avec une dalle, donc possibilité de reproduire les mêmes bâtiments en hauteur avec un permis de construire', 'myapp/storage/app/public/biensphoto/CMUahNVSLInbHWDTrK24nZVAnx8Lqv8iFzeoUBFb.jpg', 'myapp/storage/app/public/biensphoto/6QfMnxRfI6AnxyE1DYoTAGsEQuYB4IjfrJ7KgKsR.jpg', 'myapp/storage/app/public/biensphoto/T6dQb4ZupJxJj4m6s2SBCsa6P8e9rAb3brQKv1Hl.jpg', 'myapp/storage/app/public/biensphoto/7ZeZaJHNTF9NiGsEwd4X2RUZTj6JQ16iyGlZqbmG.jpg', 'myapp/storage/app/public/biensphoto/oqMSSNVmRqDwCLMT1QDiElMigBfHC3KiyRxXXRjJ.jpg', 'myapp/storage/app/public/biensphoto/gNbBRXSTz8UgejSew0Q0xrI4e4GVDW4GUo9Hm5gb.jpg', 'myapp/storage/app/public/biensphoto/6TQTiXWQ41HdLPgiKo3vMT9y2XHaILKLih9yjbq7.jpg', 'myapp/storage/app/public/biensphoto/U2w5fnTSN5krin8tGXK49jO8j5rNtmTqia8z7wyd.jpg', 0, '4626', '2022-08-12 15:57:18', '2022-08-12 15:57:18'),
(28, 6, 8, 8, '1', '1', '15', 'Super appartement 3 pièces à Cocody angré', '220000', '220000 Fcfa /mois - 5 mois conditions', '1 salon\r\n2 chambres\r\n2 douches\r\n\r\nplacé au rez de chaussée \r\ndans une zone accessible', 'myapp/storage/app/public/biensphoto/sbiZliQCVyuBEz1jKXnsqTClGUDhp1shQt48Ww7Y.jpg', 'myapp/storage/app/public/biensphoto/t6IBIxaV3SKYHzXRJVlXOHqw2fyP4Of16Nv9JplF.jpg', 'myapp/storage/app/public/biensphoto/UD3ElS2wLrlE8bjUuzp1uEYqEP1XDgz42XuDwvgE.jpg', 'myapp/storage/app/public/biensphoto/TQvsn179Jk5xVrgSJvjRAk1oRJ9qUcp8mPZIAtsA.jpg', 'myapp/storage/app/public/biensphoto/H4X7Ylem1kKtdgewqnIZ2JQsWAQtPNq8HPKZ6uY1.jpg', 'myapp/storage/app/public/biensphoto/cBGHnMeJ6CR07PDGsfllX00MQ9uieAVAYZMxhd7T.jpg', 'myapp/storage/app/public/biensphoto/rnTqvoULzmZnCv02I0tWD0n6YFKaqyOKw0gBstQS.jpg', 'myapp/storage/app/public/biensphoto/fGa6QxCDU7fhrdj6VPCQd09phoymoTQsU4Kfe6RH.jpg', 1, '2260', '2022-08-12 18:14:53', '2022-08-12 18:14:53'),
(29, 6, 11, 8, '1', '3', '16', 'Villa duplex 8 pièces à Grand-Bassam', '750000', '750.000 Fcfa/mois - 5 mois conditions', 'Au 1er étage \r\n4 chambres spacieuses,  aérés et autonomes avec des balcons et des terrasses.\r\n\r\nAu rez-de-chaussée\r\n2 salons \r\nUne chambre visiteur autonome. \r\nUne chambre indépendante autonome. \r\n1 bureau\r\n\r\nUn garage de 3 véhicules. \r\nUne terrasse avant et une cour arrière.\r\n1 forage.\r\n1 régulateur de tension.', 'myapp/storage/app/public/biensphoto/a0zPAjDhOC33oMYRrTsrJvG8QUByuOikkYPzGv62.jpg', 'myapp/storage/app/public/biensphoto/MYwSGsGXSlvuZoSeBWj7IzqDvQSpKDazlihY1leJ.jpg', 'myapp/storage/app/public/biensphoto/MfE3Rkp7tYRP4S0dKu90W1poS0GRQsoKpQNfQNUL.jpg', 'myapp/storage/app/public/biensphoto/MnCYh8XC6Admvm7LVTEM4ZmDLFOYWx6KKqaED60g.jpg', 'myapp/storage/app/public/biensphoto/XWFbviMsEbBlyufqii3Dovx1Zz96wwTFSAXpJoOe.jpg', 'myapp/storage/app/public/biensphoto/Bq3kbukeyGTSfJBExC1jLf451AvzI6jhTIb4ytmD.jpg', 'myapp/storage/app/public/biensphoto/m7SwmMQi50IdBWCLCl9a70vMEznpr4Pd1nQNztwS.jpg', 'myapp/storage/app/public/biensphoto/k93ijRDXgseg0gJCo5hIPheOBu74mkl6owr6hKJM.jpg', 1, '3464', '2022-08-12 18:28:34', '2022-08-12 18:28:34'),
(30, 6, 11, 8, '1', '1', '23', 'Somptueuse  Villa duplex à la Riviera Palmeraie', '2000000', '2.000.000 Fcfa/mois', 'une somptueuse villa duplex de type 8 pièces à la Rivera palmeraie non loin du centre des impôts, à côté de la polyclinique de saint Viateur.\r\nLa villa a les caractéristiques suivantes :\r\n\r\nAu rez-de-jardin\r\nUn garage de 2 véhicules\r\nUne buanderie\r\nAu rez-de-chaussée\r\nUne cour arrière et avant\r\nUn parking\r\nUn grand jardin\r\nun très grand salon\r\nUne grande terrasse\r\n2 chambres autonomes\r\nUne cuisine très accessible\r\n\r\nAu premier\r\nun grand salon\r\n4 chambres dont 2 autonomes\r\n Toilette visiteur \r\n 2 Dressing dans la chambre principale\r\nUn grand balcon donnant une très belle vue\r\nTrès aérée\r\nTrès accessible', 'myapp/storage/app/public/biensphoto/EH9WHuorcV3cOkFlGh9w4ObugSPDBUS7ssk50eYm.jpg', 'myapp/storage/app/public/biensphoto/b0W4Ad4fUwZwl89jijNG1EB7pCSqhuAwWPsBVzjI.jpg', 'myapp/storage/app/public/biensphoto/Ukp33hEipyG619PsqFQKJCtuhdkFo3bcbrdxiJmh.jpg', 'myapp/storage/app/public/biensphoto/KqXuL4UcmqMO8ETP1GZMiDB3o1QY6kbCM4Zbc84r.jpg', 'myapp/storage/app/public/biensphoto/GNdOUZ7PledOJLv9XR6CUJN4Kb49FOrsNdrGZ14l.jpg', 'myapp/storage/app/public/biensphoto/AfnyV3OVr5D89yF86KVopVqb5ZEvmqSdmYrfpBX5.jpg', 'myapp/storage/app/public/biensphoto/OC36UoS6eFoqTA15itHsljwhm1DIVIB4caDBc8Sb.jpg', 'myapp/storage/app/public/biensphoto/7xRsTcJMS4ZesgekVe9USfdonRq7d0UHATEklOWl.jpg', 1, '302', '2022-08-12 18:43:01', '2022-08-12 18:43:01'),
(31, 6, 8, 8, '1', '3', '13', 'Bel appartement de 3pièces à Bassam', '250000', '250.000', '1er étage\r\nChambre principale autonome\r\n2 balcons: 1 balcon terrasse, 1 balcon arrière. \r\n1 salon spacieux et aéré.\r\nUne toilette', 'myapp/storage/app/public/biensphoto/3i7O3xla5H6JF4GYOWM6ydXagd7bJ9TVD3lnoKFA.jpg', 'myapp/storage/app/public/biensphoto/EUasyBpZdu4Lf6Ckbrfx9bsqK0OqRK1hH3mdCyGx.jpg', 'myapp/storage/app/public/biensphoto/J21dztv1ue6awuTWaIwOm48tzMVCTLj7N4q3W800.jpg', 'myapp/storage/app/public/biensphoto/TFfr78N80g7zIgpnsF4zXGNB2qvWbdGR8KoqpEOg.jpg', 'myapp/storage/app/public/biensphoto/xsVrpjJev1xECrvVhgZJeneHcIDubamARK2ufenH.jpg', 'myapp/storage/app/public/biensphoto/Rulq8hccuoj811UNTBaeKTlQIsK1ZHWf7FdhuSfm.jpg', 'myapp/storage/app/public/biensphoto/nwpnnE0DsJKkyC2pGiPuqxBLhDFzu8uX9nJeAgsD.jpg', 'myapp/storage/app/public/biensphoto/vk5KNcEGMPWSlhjA5yKuz6FrFbPg03cB3Ojl6sDA.jpg', 1, '202', '2022-08-12 19:26:23', '2022-08-12 19:26:23'),
(32, 87, 12, 9, '1', '2', '18', 'Terrain libre à Yakro agbakro 500m2', '1500000', '1.500.000 Fcfa + frais annexe 150.000 Fcfa', 'document approuvé\r\nattestation villageoise', 'myapp/storage/app/public/biensphoto/XSpfRF9HH65HlQ4sUU6hwLv0mKfpBtEbjLY0yKkE.jpg', 'myapp/storage/app/public/biensphoto/q2a5vnwzqhxhh0fgQm4lhFi0WrIoG5MCU56HM771.jpg', 'myapp/storage/app/public/biensphoto/NRdcxBEjhHcUqAlPt2mAhLYYx0M4enpFMraG81Z4.jpg', 'myapp/storage/app/public/biensphoto/3tvPxCKNmeGS8e0T7Ud5zorq8j6vPUPkzeGNj7eE.jpg', 'myapp/storage/app/public/biensphoto/OH6aVkVcys44teLWDOVDThKQqwxNuz02kOiWosV0.jpg', 'myapp/storage/app/public/biensphoto/OH6aVkVcys44teLWDOVDThKQqwxNuz02kOiWosV0.jpg', 'myapp/storage/app/public/biensphoto/ZD8a5O7C6JL1emDPKjz9lPkPcusTpeOCnqEaptbb.jpg', 'myapp/storage/app/public/biensphoto/ZD8a5O7C6JL1emDPKjz9lPkPcusTpeOCnqEaptbb.jpg', 0, '3055', '2022-08-12 19:54:51', '2022-08-12 19:54:51'),
(33, 87, 12, 9, '1', '2', '12', 'Nouveau terrain à Subiakro 500 mèttres carré', '1500000', '1.500.000 sans frais annexe', 'Document approuvé\r\nattestation villageoise\r\n50 lot', 'myapp/storage/app/public/biensphoto/tuvPwnTPwiBDYWzCbtxuo1bnTfC8pB5fIWJYHkhl.jpg', 'myapp/storage/app/public/biensphoto/dDUEAdHcPBS0Rzv9fIAxcVC8C5q6vngWdjzbgkfi.jpg', 'myapp/storage/app/public/biensphoto/gKBy3mBLzs89rBXoVkn8D0UrezEUj8SiU0bg7Xl5.jpg', 'myapp/storage/app/public/biensphoto/6vOii0aRHnr6H1WhiebmUJchspcE5W7fbzybdnM1.jpg', 'myapp/storage/app/public/biensphoto/WjRp0E353oIuTmQmnVylTeYE4awmoK2uoQ4wj1lw.jpg', 'myapp/storage/app/public/biensphoto/WjRp0E353oIuTmQmnVylTeYE4awmoK2uoQ4wj1lw.jpg', 'myapp/storage/app/public/biensphoto/MTCUJHjYtI7WIWRyLXJ2l7S4RQSvsebbAxKkiUyV.jpg', 'myapp/storage/app/public/biensphoto/MTCUJHjYtI7WIWRyLXJ2l7S4RQSvsebbAxKkiUyV.jpg', 0, '3101', '2022-08-12 19:58:12', '2022-08-12 19:58:12'),
(34, 87, 12, 9, '1', '2', '12', 'Terrain 600m2 à yakro subiakro', '1500000', '1.500.000 Fcfa ans frais annexe', 'Document\r\nlettre d\'attribution\r\n20 lots', 'myapp/storage/app/public/biensphoto/cYZ82bL7pz11odNU2kNkdQ9U0k2VaLi61aZ4RAsJ.jpg', 'myapp/storage/app/public/biensphoto/tqrwHjyTwBsAm15eVZUZXiE2DGm0PxC5yWW4V2lq.jpg', 'myapp/storage/app/public/biensphoto/fugNispQxb2kynWfQ8wleHM41MjCy3MzSYCQzEAP.jpg', 'myapp/storage/app/public/biensphoto/6NxkAbMjZ9fR4q4zHQ8L87OkL1JHUpc6GpwTmToC.jpg', 'myapp/storage/app/public/biensphoto/lDynqrPiG0M5somWt1OCMkgIz8VMeGXFoyHio2Zx.jpg', 'myapp/storage/app/public/biensphoto/lDynqrPiG0M5somWt1OCMkgIz8VMeGXFoyHio2Zx.jpg', 'myapp/storage/app/public/biensphoto/weoid0FTFneaXCqaIFYjjiVBVuaElQflWMqWY73f.jpg', 'myapp/storage/app/public/biensphoto/weoid0FTFneaXCqaIFYjjiVBVuaElQflWMqWY73f.jpg', 0, '1637', '2022-08-12 20:02:24', '2022-08-12 20:02:24'),
(35, 87, 12, 9, '1', '5', '19', 'Terrain 600m2 à Toumodi', '1500000', '1500000 Fcfa Cash', 'Document approuvé\r\n10 lots', 'myapp/storage/app/public/biensphoto/4zoSMCgEteJ19H6I0Ip0jKEc8USJAnycN6jC29BS.jpg', 'myapp/storage/app/public/biensphoto/CWZITFVflK6A19Tm488wAQDRgC4eBIY3QxLhO6oW.jpg', 'myapp/storage/app/public/biensphoto/B9Vt6okGrx1pvQ8tIYlEiwByEFRQSdVi6sFDuGh2.jpg', 'myapp/storage/app/public/biensphoto/MH0tlyzJt4kYoBvR61PQMxxCzSUuT0tPUKvvib40.jpg', 'myapp/storage/app/public/biensphoto/yMmah0VUs4sLKzDC5XKAiCg4s31yTt7J1jAc4tOs.jpg', 'myapp/storage/app/public/biensphoto/yMmah0VUs4sLKzDC5XKAiCg4s31yTt7J1jAc4tOs.jpg', 'myapp/storage/app/public/biensphoto/CD98PeYdp8TNsgvuOPOiOZuqy05cWumTfeoSHRTB.jpg', 'myapp/storage/app/public/biensphoto/CD98PeYdp8TNsgvuOPOiOZuqy05cWumTfeoSHRTB.jpg', 0, '2584', '2022-08-12 20:05:08', '2022-08-12 20:05:08'),
(36, 87, 12, 9, '1', '6', '22', 'Terrain 2500m2 à Bouaké', '150000000', '150.000.000 Fcfa', 'Document \r\nTF\r\n1 lot', 'myapp/storage/app/public/biensphoto/yJKWYNwHlYiDfPEjpZHXdJzXe6hrmudacX0aemX8.jpg', 'myapp/storage/app/public/biensphoto/WaJJE7JXYCEv14ARVjOevFx3QMTdPcPRLkcIaW4e.jpg', 'myapp/storage/app/public/biensphoto/WfWzKz3ppCscjTfBvpe2uniz3w09oZtg5BXLhMQU.jpg', 'myapp/storage/app/public/biensphoto/NCI04ZD1A6xf1qNaUzOslXIeyplN6DcKetV25ZD5.jpg', 'myapp/storage/app/public/biensphoto/TCXmZrxJsplI9DMCRm3QaqWU8TrCKTHbm1wbQ7HT.jpg', 'myapp/storage/app/public/biensphoto/TCXmZrxJsplI9DMCRm3QaqWU8TrCKTHbm1wbQ7HT.jpg', 'myapp/storage/app/public/biensphoto/il1jZx4Y9EDYPEtjN1nXxya5i30PKCELCFP8oS1I.jpg', 'myapp/storage/app/public/biensphoto/il1jZx4Y9EDYPEtjN1nXxya5i30PKCELCFP8oS1I.jpg', 0, '4478', '2022-08-12 20:13:37', '2022-08-12 20:13:37'),
(37, 87, 12, 9, '1', '6', '20', 'Terrain 700 m2 à Bouaké', '4000000', '4.000.000 Fcfa Cash', 'Document \r\nattestation villageoise\r\n1 lot', 'myapp/storage/app/public/biensphoto/xyjpIzJuQBz1iTUEBLeNMEyF6QcYY1h1kqZ5rybl.jpg', 'myapp/storage/app/public/biensphoto/hk5fxGNgh5r0RuRgj9xlgQkEfQsvi2ClmVEEKfMH.jpg', 'myapp/storage/app/public/biensphoto/yOO4TkAf3GZ1GsGUEKEeETP9TKjqAUUEegUHtYOu.jpg', 'myapp/storage/app/public/biensphoto/2hzsskaxo9xH81MT5NWEtbjKtUIqmxVI1OmxW6S4.jpg', 'myapp/storage/app/public/biensphoto/FzlO18w4WqkwsuwfbJ4CS9AJJJkJuV0ezKjABjhI.jpg', 'myapp/storage/app/public/biensphoto/FzlO18w4WqkwsuwfbJ4CS9AJJJkJuV0ezKjABjhI.jpg', 'myapp/storage/app/public/biensphoto/iLW3uvZFQnf8YFavJGcytaTFqJFhYh8Sa2joB5V6.jpg', 'myapp/storage/app/public/biensphoto/iLW3uvZFQnf8YFavJGcytaTFqJFhYh8Sa2joB5V6.jpg', 0, '66', '2022-08-12 20:17:48', '2022-08-12 20:17:48'),
(38, 87, 12, 9, '1', '1', '21', 'Terrain 500m2 Angré château', '60000000', '60.000.000 Fcfa sans Frais annexe', 'document \r\nTF\r\n1 lot', 'myapp/storage/app/public/biensphoto/N0LnXe3gTPAFzdeP6EDwU9kBP3IkLaiIJZ05iWoS.jpg', 'myapp/storage/app/public/biensphoto/XVBkYaEzPfk01wCCFBTv9ow1B6kvzQk2qUTEMxCg.jpg', 'myapp/storage/app/public/biensphoto/ayVRf2RLzFtmCAgVlfATWGKg14RrNxGXJVhgUfDp.jpg', 'myapp/storage/app/public/biensphoto/yO07BzPCWPLohdEkTwW6Ab48juXNmAjOofuRfBf2.jpg', 'myapp/storage/app/public/biensphoto/VzKU2C4pVMoIzaemTOlgqvBy6oE41ulaibroVske.jpg', 'myapp/storage/app/public/biensphoto/VzKU2C4pVMoIzaemTOlgqvBy6oE41ulaibroVske.jpg', 'myapp/storage/app/public/biensphoto/had09bLlmLCKoNUAOT0sR3eeFGZ76uMfXnpzDJxU.jpg', 'myapp/storage/app/public/biensphoto/had09bLlmLCKoNUAOT0sR3eeFGZ76uMfXnpzDJxU.jpg', 0, '4172', '2022-08-12 20:25:37', '2022-08-12 20:25:37'),
(39, 87, 12, 9, '1', '4', '17', 'Terrain à Jacqueville 500m2', '6000000', '6.000.000 Fcfa', 'Document approuvé\r\nattestation villageoise', 'myapp/storage/app/public/biensphoto/vfAzxVrufh5MQjfgEDiISREu4mAkA1BNniGpTQzg.jpg', 'myapp/storage/app/public/biensphoto/bDwNj1vs91gZRfzQuB6WGAKdzwGYoLCGgkcwU8H2.jpg', 'myapp/storage/app/public/biensphoto/o7HnGySjXZlCwdII8pxbu5eyuhUWnrhtgDzQIlFJ.jpg', 'myapp/storage/app/public/biensphoto/AzrMgesXLjBmKvY1QaKRM8b0EH3vhfGybryVhzau.jpg', 'myapp/storage/app/public/biensphoto/D0quPhEISc9p2oBbt6j5HV7byKVpIaK2bTMExdt2.jpg', 'myapp/storage/app/public/biensphoto/D0quPhEISc9p2oBbt6j5HV7byKVpIaK2bTMExdt2.jpg', 'myapp/storage/app/public/biensphoto/xF983pkgrVWHBEAjxx3sNXmLgNfehz3zSF0vgh7O.jpg', 'myapp/storage/app/public/biensphoto/xF983pkgrVWHBEAjxx3sNXmLgNfehz3zSF0vgh7O.jpg', 0, '4999', '2022-08-12 20:33:47', '2022-08-12 20:33:47'),
(40, 87, 12, 9, '1', '1', '2', 'Terrain 400m2 à Angré Chateau', '40000000', '40.000.000 Fcfa', 'Document\r\nAGD GLOBAL', 'myapp/storage/app/public/biensphoto/6k8hu33ckgt6cNSvZMP22FEHTqmYGZDSeauYzIhs.jpg', 'myapp/storage/app/public/biensphoto/o0dLQyD0R9iVxY7DouLLQ25vlBQ5AQv7k9YhM5oV.jpg', 'myapp/storage/app/public/biensphoto/rRf4ApWkeVWp6em6ThQEbqBWf3ZHZ6NQgSfP8kPx.jpg', 'myapp/storage/app/public/biensphoto/W7u3JIZBGjIm5iOsQwvjixnB4L7m73JoRtpS8UaK.jpg', 'myapp/storage/app/public/biensphoto/zyC35Z4UWzkDVSqjWkgvPYRyV481M08DEK7EhG8Q.jpg', 'myapp/storage/app/public/biensphoto/zyC35Z4UWzkDVSqjWkgvPYRyV481M08DEK7EhG8Q.jpg', 'myapp/storage/app/public/biensphoto/wq6uAXh81JkDnTtoPHyVC72DTPFhirV0HJ7pl4g4.jpg', 'myapp/storage/app/public/biensphoto/wq6uAXh81JkDnTtoPHyVC72DTPFhirV0HJ7pl4g4.jpg', 0, '1133', '2022-08-12 21:24:03', '2022-08-12 21:24:03'),
(41, 87, 12, 9, '1', '1', '4', 'Terrain 1800m2 à Marcory Zone 4', '2000000000', '2.000.000.000 Fcfa', '1 lot\r\nTF', 'myapp/storage/app/public/biensphoto/5VBPwRyscXwdAe74bqJJmwi7ZIgPdprE3FAwvscv.jpg', 'myapp/storage/app/public/biensphoto/9HHXjg5plOgsxx4HDrpa4gQayWL3AQWaU8euR9f3.jpg', 'myapp/storage/app/public/biensphoto/ntsfX1zAfkxnAdTIMoFrn3otlTuY7lemvE8JnI36.jpg', 'myapp/storage/app/public/biensphoto/SReHsjOQRzU2j2jnvSLiTSTUWh7BrcmigZcnzq3o.jpg', 'myapp/storage/app/public/biensphoto/QasNhiirAJQAQ8iYinh517ib8AxVqaOom3J5tclk.jpg', 'myapp/storage/app/public/biensphoto/QasNhiirAJQAQ8iYinh517ib8AxVqaOom3J5tclk.jpg', 'myapp/storage/app/public/biensphoto/CmxNl9E1c8tnyMDTIVu2DxtQWaHqXvxnXQlHGyOe.jpg', 'myapp/storage/app/public/biensphoto/dhgSA9r6d7ovQ67QMNAVucAT3rreaKglYNn1POyD.jpg', 0, '1446', '2022-08-13 11:22:52', '2022-08-13 11:22:52'),
(42, 6, 8, 8, '1', '1', '3', 'Bel appartement 3 pièces à Koumassi cité adoha', '180000', '180.000 Fcfa/mois - 5 mois conditions', 'Un salon \r\nUne cuisine \r\n2 chambres dont la principale autonome\r\nUne toilette', 'myapp/storage/app/public/biensphoto/a9aMG3oURQodLaKjK7FojimotWJIsZu07JA5daXs.jpg', 'myapp/storage/app/public/biensphoto/quLdeRXOMqRX45NatvnSkaGXcNz4R33m53jtvyzf.jpg', 'myapp/storage/app/public/biensphoto/QJgBRS0LFuY2z7tdO3TRSI0qOGXlkKpjkzT36cwc.jpg', 'myapp/storage/app/public/biensphoto/NA0E5wjpejBseqQ49oSmxMpMUGecaV2NdSiGT9Dp.jpg', 'myapp/storage/app/public/biensphoto/KSaQGd9D1zQD8dBNQWv72K8c2Gwu3iKvraQcEhOm.jpg', 'myapp/storage/app/public/biensphoto/yz4Uf1lUXOb0Z9CmkhxCj9nXIdIP1MqUH1lZkf2f.jpg', 'myapp/storage/app/public/biensphoto/9duMzQmlJY82e3kAebVPnTqWfswNTwp92kZR82Na.jpg', 'myapp/storage/app/public/biensphoto/3Ncn1vXe3AxJTVdDc60uvDYxj4BHXmN3c5WfOHFe.jpg', 1, '1346', '2022-08-13 11:38:11', '2022-08-13 11:38:11'),
(43, 6, 12, 8, '1', '7', '25', 'Terrain à Assinie Soumalekro 500m2', '6000000', '6.000.000', 'Document\r\nApprobation + lettre d\'attribution', 'myapp/storage/app/public/biensphoto/6Payd9kycRo9bDQeebBRjHf1Vq0ulnXKMYaq8wl6.jpg', 'myapp/storage/app/public/biensphoto/kDIq4kwMH06sjk0zpDr38hH1CBBMdsvNsPeu5hhy.jpg', 'myapp/storage/app/public/biensphoto/QTGAwsAAWWH36BopfejIxU7iAVsVPjdT4E8moGcG.jpg', 'myapp/storage/app/public/biensphoto/xn5CTCJfmOhkUPITueRJlCSPEWWSxEZEWw3K28Dk.jpg', 'myapp/storage/app/public/biensphoto/VgrefUBz2GvhoSjadfZk3uCjfsW5pPBErMRV6qrg.jpg', 'myapp/storage/app/public/biensphoto/VgrefUBz2GvhoSjadfZk3uCjfsW5pPBErMRV6qrg.jpg', 'myapp/storage/app/public/biensphoto/LdIOKugcljwPKfD9FOAChV0dn4yhLMjaZ01dENxW.jpg', 'myapp/storage/app/public/biensphoto/LdIOKugcljwPKfD9FOAChV0dn4yhLMjaZ01dENxW.jpg', 1, '3720', '2022-08-13 11:53:19', '2022-08-13 11:53:19'),
(44, 87, 12, 9, '1', '4', '27', 'Terrain à Jacqueville 500m2', '4000000', '4.000.000 Fcfa Cash', 'Disponibilité \r\nattestation villageoise\r\n1 lot', 'myapp/storage/app/public/biensphoto/6U5CatOffmnmPHtWAjY4Ljc7ei8TJ78iBR3eCh8m.jpg', 'myapp/storage/app/public/biensphoto/uIK2rc6rs2tfeHWgj75NnRgBd8Xig8ww3DPCIuiw.jpg', 'myapp/storage/app/public/biensphoto/1VUTHGbAhLAcIiBqILHbq9wfT7vCWIydjImfMJwW.jpg', 'myapp/storage/app/public/biensphoto/FAiK5Q045iicrp7TSSbUshwaZAlR1oEU3oVYppHl.jpg', 'myapp/storage/app/public/biensphoto/VDuaJn1n4Ast82QenlPiLsdJ0XoResTtE0YrD5eN.jpg', 'myapp/storage/app/public/biensphoto/VDuaJn1n4Ast82QenlPiLsdJ0XoResTtE0YrD5eN.jpg', 'myapp/storage/app/public/biensphoto/8n4yvuisJQlgSc5UiUrh2iOkG06Qi0YoLDySIh4m.jpg', 'myapp/storage/app/public/biensphoto/8n4yvuisJQlgSc5UiUrh2iOkG06Qi0YoLDySIh4m.jpg', 0, '1625', '2022-08-15 10:50:36', '2022-08-15 10:50:36'),
(45, 87, 12, 9, '1', '3', '28', 'Terrain 500m2 à Bassam Baie des sirènes', '3500000', '3.500.000 Fcfa - Cash', '35 lots\r\nApprouvé', 'myapp/storage/app/public/biensphoto/y2YpZbnTC1OrarTVEcTk7SrdL5VOI61pWPcA11ey.jpg', 'myapp/storage/app/public/biensphoto/GKzyM5iZlGFPgYVIDrCurB9pj9ZG0zD0Vy37pupm.jpg', 'myapp/storage/app/public/biensphoto/avBjpYjUKikwBfAwVhlOQmThUQ57rjsQKIOCeuAj.jpg', 'myapp/storage/app/public/biensphoto/m9MB15yZ2CdroDm7pHQGQ1R0B5xBYC6AFyY3asCo.jpg', 'myapp/storage/app/public/biensphoto/3NHKWzxIF8hI0YxjXlPSGGju2MHs65HwBYymwEwA.jpg', 'myapp/storage/app/public/biensphoto/3NHKWzxIF8hI0YxjXlPSGGju2MHs65HwBYymwEwA.jpg', 'myapp/storage/app/public/biensphoto/2pKjeZMjeEAWyjxZUUVM7zgpxheAq6YXhiT27NNH.jpg', 'myapp/storage/app/public/biensphoto/2pKjeZMjeEAWyjxZUUVM7zgpxheAq6YXhiT27NNH.jpg', 0, '1276', '2022-08-15 11:16:40', '2022-08-15 11:16:40'),
(46, 87, 12, 9, '1', '8', '29', 'Terrain 4HA à Bingerville', '60000', '60.000 Fcfa/m2 - Cash', 'Disponibilité ACD Global', 'myapp/storage/app/public/biensphoto/cDB0Fa8DlIzn54lSowME89kYw8PEN9LfROkfGSVP.jpg', 'myapp/storage/app/public/biensphoto/0LXd7d49sRIrFm8pjg5L8QFLd4LOUtFehYDkrPdZ.jpg', 'myapp/storage/app/public/biensphoto/ibtI8qmOzBcyqgqdofPX4mVs0oddurLXZckNbjiQ.jpg', 'myapp/storage/app/public/biensphoto/s7jVHGPCFXEKyjSHhC6zjUlv7ISEnckCku7CzWY1.jpg', 'myapp/storage/app/public/biensphoto/EJq9c17hMdF0sfz2I00uE5Ipp04D8psKQhibhx0v.jpg', 'myapp/storage/app/public/biensphoto/EJq9c17hMdF0sfz2I00uE5Ipp04D8psKQhibhx0v.jpg', 'myapp/storage/app/public/biensphoto/9txuDE7ENDcjwaUQaZKnX3YePMLBJDk8LZVUzgr9.jpg', 'myapp/storage/app/public/biensphoto/9txuDE7ENDcjwaUQaZKnX3YePMLBJDk8LZVUzgr9.jpg', 0, '582', '2022-08-15 11:29:13', '2022-08-15 11:29:13'),
(55, 30, 12, 9, '1', '8', '29', 'Terrain de 4 hectares', '70000', 'Payement cash', 'Bingerville cité fekesse a 50 mètre du goudron un très beau site de 4 hectares 75 avec électricité et eau pour vos projets immobiliers, surtout avec l\'ouverture prochaine de la Y4.', 'myapp/storage/app/public/biensphoto/T3uaB6inpx1tWrxAR5TqE8LoRIJpe8F0tnb8Canf.jpg', 'myapp/storage/app/public/biensphoto/wW6jzQKm5YEreKfeupfNKDcKSQTLFoXs2awhpOUm.jpg', 'myapp/storage/app/public/biensphoto/EELGj8LshHMgKWRV7SV6RrctjLuqK8WmseMPlPuk.jpg', 'myapp/storage/app/public/biensphoto/iCtEE2AZ2wGLeiWqHW7Buv3OfODQ6rz8Szzjcj2R.jpg', 'myapp/storage/app/public/biensphoto/yvwzuCRSWBHafOqXOMawz2ynj7cpyRvIPLdnzclI.jpg', 'myapp/storage/app/public/biensphoto/9pmUZH22ybfaGlGiLDMW38CMIkPfoWa5MqW8U7W9.jpg', 'myapp/storage/app/public/biensphoto/dueF0QhIGWpzWNyP1zlTgs9g33wvK2nQGx7a9LvY.jpg', 'myapp/storage/app/public/biensphoto/LNU8UXJijgZfDvrHLX0STOiEJPcX1i8YwqVQWdgC.jpg', 1, '2141', '2022-08-16 22:47:19', '2022-08-16 22:47:19'),
(56, 19, 14, 9, '1', '1', '11', 'Duplex à Bingerville', '46000000', '46000000', 'somptueux duplex', 'myapp/storage/app/public/biensphoto/YD6ZdLIKuzq3r1QBYviKbTBWCxnQEMdukfeOKEQa.jpg', 'myapp/storage/app/public/biensphoto/5Z4P3Nlc5UaYU2w8dEDVmdGyvxOIAtRyEbfkwB72.jpg', 'myapp/storage/app/public/biensphoto/lD3ahDNe1cgKE2gLwlBhw4kD8zj5la2ekb9sKhvn.jpg', 'myapp/storage/app/public/biensphoto/tl9JGrhOJ43gUDTBmgagGABwodAjSAyvbnsHC7xz.jpg', 'myapp/storage/app/public/biensphoto/BkZk2Iy99Vw0SwdSsO2FRlrWpT4LFRzJBMv6A0zr.jpg', 'myapp/storage/app/public/biensphoto/W8NzCIKjl4eeBgEBiVaczob61olbh6PXx5lzrAGP.jpg', 'myapp/storage/app/public/biensphoto/6KQUXBOSaJdPFZujrKCQwbF6W39MDCFHNxS5dCYU.jpg', 'myapp/storage/app/public/biensphoto/FghVQSKOIwkteuFXZtAdd65cSqYYaos8ylFIb9gi.jpg', 1, '21', '2022-08-16 22:51:07', '2022-08-16 22:51:07'),
(57, 6, 8, 8, '1', '1', '2', 'nouvel appartement 3pièces à Cocody angré', '210000', '210.000 Fcfa/ mois - 5 mois conditions', 'Situé au 3ème étage Cocody Angré nouveau chu Pharmacie Ste Clémentine avec \r\nparking interne et 2 balcons\r\nUne très grande cuisine et grand salon \r\nCocody Angré nouveau chu Pharmacie Ste Clémentine..', 'myapp/storage/app/public/biensphoto/27oaVCbr4JkBLkO9WgqWPe2IRKJmshK2NvwcvmGK.jpg', 'myapp/storage/app/public/biensphoto/KvlBE02V5FwQNj1gwrIZjRxv768laIAonLEPqDnW.jpg', 'myapp/storage/app/public/biensphoto/ciI2IBPtQWylWsGhV8GapmsBbAS7B2zqnE29mXIv.jpg', 'myapp/storage/app/public/biensphoto/InIyWXlTn7UK821InYElLorSN99lIPFVCxS0VjTy.jpg', 'myapp/storage/app/public/biensphoto/EZnH9mwGYRU4oZtjnCthV1ePghFdSCKbAZuW0LYB.jpg', 'myapp/storage/app/public/biensphoto/aRNS50yHwKNjWgryxpViVuAWjhnDUyk067cmxmk1.jpg', 'myapp/storage/app/public/biensphoto/JpPSHvZG80BesDE3xu5hlqbMSoNQPa2amgs6tbph.jpg', 'myapp/storage/app/public/biensphoto/wXtEqnPumsfrN3fxeEwBEVSm1X9mSXUVJgEEFVC0.jpg', 1, '86', '2022-08-17 14:30:42', '2022-08-17 14:30:42'),
(58, 43, 8, 8, '1', '1', '2', 'Appartement à Cocody Angré CHU derrière la pharmacie Val d\'Oise', '230000', '5 mois', 'A louer \r\nAngré CHU derrière la pharmacie Val d\'Oise\r\n\r\n2 pièces au rez-de-chaussée\r\nChambre autonome avec placard\r\nWC visiteur\r\nCour arrière\r\nCuisine moderne avec placard\r\nParking externe surveillé par caméra et vigile\r\nChauffe-eau', 'myapp/storage/app/public/biensphoto/JaBhqveLxSWvwHVR9ImQ5rFQv0uNeBjiO39AEDK0.jpg', 'myapp/storage/app/public/biensphoto/aluiRP66I5qLIOANxPHI8Jz0QuOkpoD9FjMknVAI.jpg', 'myapp/storage/app/public/biensphoto/ikhkSYDI22ka908OwX3dgcV8yLabvNr1QKXWfTu4.jpg', 'myapp/storage/app/public/biensphoto/jgNNcI4ZnLLOTWCBt3ma5ZxYm8DdWQLfO8YKrshq.jpg', 'myapp/storage/app/public/biensphoto/q9Dct6LNy40Z97VqJiRHnTJYpSmjAX0G8mMu2vS9.jpg', 'myapp/storage/app/public/biensphoto/tdNKgyD15KCAxcp9iCMPbGuTm3k3q5knJZHvfysu.jpg', 'myapp/storage/app/public/biensphoto/cRJWNGSROptBolYnTg0BOoUVVRn8DIfTQ315ks6P.jpg', 'myapp/storage/app/public/biensphoto/GV2DZ4ugjCXS4EJBOXjvlQGrZdxvlgnvawWa9HHs.jpg', 1, '959', '2022-08-17 23:10:22', '2022-08-17 23:10:22'),
(59, 35, 12, 9, '1', '1', '7', 'Terrain Yopougon niangon centre social', '17000000', 'Payement cash', '500m2\r\nBien situé\r\nDéjà près pour l\'utilisation', 'myapp/storage/app/public/biensphoto/eP2S694bvjD37ON6A0w2lN8dPbWHqDERQ0fKPCys.jpg', 'myapp/storage/app/public/biensphoto/mCje2n7l6J1aGLj5uEhWCkSzV0r0beMRiz60uPR7.jpg', 'myapp/storage/app/public/biensphoto/bgeJ9dgNV5OguYMG3hXPuYY6wn0IzAgjfDyQ3530.jpg', 'myapp/storage/app/public/biensphoto/Ye8rPImOpDsZu7k97CE6AUtrqgaNz440uWY0faUQ.jpg', 'myapp/storage/app/public/biensphoto/8IyJiHo5RaqtV08a97RTWr0tSBForibmdqa3n6as.jpg', 'myapp/storage/app/public/biensphoto/08Q9oNYwXYyitMJSEpEGQaGrUGjY8rF0uZEIudcX.jpg', 'myapp/storage/app/public/biensphoto/3aiwVsMCpao89hHJUlNW0RmqBks7vZXI2mUwFtsH.jpg', 'myapp/storage/app/public/biensphoto/v5F1l7qUYy344alczcrNue3zz973SrUpfqxb8t3G.jpg', 0, '4760', '2022-08-18 09:19:00', '2022-08-18 09:19:00'),
(60, 44, 11, 9, '1', '1', '5', 'Villa duplex avec sous sol', '140000000', 'NB: Bien expertisée par un cabinet d expertise agree à une valeur de 214 000 000 FR \r\nPRIX DE VENTE 140 MILLIONS à revoir', 'Villa de 10 PIECES située au paillet derrière le HMA bâtie sur prêt de 500m2 achevée à 70 %\r\nIdeal pour clinique, grande école ou même bureaux.', 'myapp/storage/app/public/biensphoto/EehiK6KYmSbjB1E3gRwzKBwzJCGuzzQ3TgF37Raj.jpg', 'myapp/storage/app/public/biensphoto/9RIdTXocUkUbSAog67nYpTB6KSLkojr9mCQmuGJB.jpg', 'myapp/storage/app/public/biensphoto/vuIlK1wIfo6wisuC0TmVAjhnE4Uk1wK2RaqPxB1x.jpg', 'myapp/storage/app/public/biensphoto/BcbSfXq5MNELCbM5njcwmURWS9mNDMfodj8H9H31.jpg', 'myapp/storage/app/public/biensphoto/28RUKbOn0bX3IpAZxlSkQrb08Vz9WOx2JWfX9wtw.jpg', 'myapp/storage/app/public/biensphoto/JcexBAb48fDdPW54LW9hwSvw5u2XxQzt9d8guMHc.jpg', 'myapp/storage/app/public/biensphoto/yllHyr1btHzis8bmHk56GH8sM57zoZGoyI6HbaWb.jpg', 'myapp/storage/app/public/biensphoto/swsGpU6rx38UlY24Gb9QMrJUglDA2w2M7e0eVYAP.jpg', 1, '3416', '2022-08-18 12:32:55', '2022-08-18 12:32:55'),
(61, 31, 12, 9, '1', '3', '26', 'DEUX TERRAINS COLLES A BASSAM', '45000000', '45.000.000  A DEBATTRE LES DEUX.', 'ACD DISPONIBLE SUR LES DEUX TERRAINS\r\nPOSSIBILITE DE PAYER LES TERRAINS SEPAREMENT', 'myapp/storage/app/public/biensphoto/JIxui1IGcUhG1BnDC151S3UFpqRz06Irc4NEYBom.jpg', 'myapp/storage/app/public/biensphoto/PnRGgAdzbg5zwyRcDA3LaAobLpJbiRN6it44eyHW.jpg', 'myapp/storage/app/public/biensphoto/la3JwKXzduf1mcl2Kv3bvk8in27ovO71vUGLkUQh.jpg', 'myapp/storage/app/public/biensphoto/VTVIqxI9grhSX50l4PPOIvZgghLFjkVgYCnx11Gp.jpg', 'myapp/storage/app/public/biensphoto/tBP8eBPWbrFNGbFltJKGYvZvs1I6e2Z22rK6wYZ8.jpg', 'myapp/storage/app/public/biensphoto/ls3jlfXRBcKAxwZSkmwsLHJMTQyMt69IIk2VJiUM.jpg', 'myapp/storage/app/public/biensphoto/VWm6PA6C0kf7QEnHIzfmTOWZjlNfAL5TM8yXHVdZ.jpg', 'myapp/storage/app/public/biensphoto/LlelSMg9S4QARpSJ2hbRfq9ZGgnXX4moPBjhNSx2.jpg', 1, '1382', '2022-08-18 12:38:22', '2022-08-18 12:38:22'),
(62, 47, 12, 9, '1', '1', '2', 'Terrain avec APPROBATION + ATTESTATION VILLAGEOISE à vendre à Cocody Bahouakoi', '15000000', 'CASH ou Comptant', 'Situé derrière le Nouveau CHU d\'ANGRE', 'myapp/storage/app/public/biensphoto/nmpsMkbeSxZ08KAGQAIImA2ocRNnSBBgfVvJhJ5s.jpg', 'myapp/storage/app/public/biensphoto/lNc5W8JivutWErAL3QPew52QQ1SjWgMbgOlwzjtT.jpg', 'myapp/storage/app/public/biensphoto/9MFFEs46Fe41DfVigeuL2bQDq0x6lboWZyoI9TMq.jpg', 'myapp/storage/app/public/biensphoto/fnLhKou0jaMc69Leg8XM8ByGBFGSCCriUTuLodAP.jpg', 'myapp/storage/app/public/biensphoto/dFBsxGbqNCI2jTecL40wAdZZv0DLlxmWg6lzTQUZ.jpg', 'myapp/storage/app/public/biensphoto/AcjIdzYbk8NKOUlvEWp1HXvpwF1dktnbnuWKmHNs.jpg', 'myapp/storage/app/public/biensphoto/CkmW0w81ajtkfzsexnM8wuVVdkzJ4yAdLJJPGTye.jpg', 'myapp/storage/app/public/biensphoto/nkPgRYlj04ZmcFSlElpKWO98IcvvPnUbKJ2NqQ2h.jpg', 1, '994', '2022-08-18 13:36:58', '2022-08-18 13:36:58'),
(63, 56, 8, 8, '1', '1', '15', '2 Appartements de 2 pièces à Béssikoi', '220000', '220.000 fr/ mois - 2 mois d\'avance et 2 mois de caution', '- une cuisinière à four\r\n- Un chauffe-eau moderne\r\n- La climatisation au salon et dans la chambre \r\n- des meubles de rangement dans la cuisine\r\n- Appartements staffé avec des luminaires\r\n- Salle d\'eau visiteurs\r\n- Balcon\r\n- Interphone\r\n- caméras externes\r\n+ Parking surveillé \r\n+ Terrasse pour activités de loisirs', 'myapp/storage/app/public/biensphoto/3wq9CaxmK8Zn4cA5PQG4efPDboQWy0ZNJzMgBgJS.jpg', 'myapp/storage/app/public/biensphoto/yOxXImlh0UFVyvDuWGcAVD3omDIunyZXBTDilSK9.jpg', 'myapp/storage/app/public/biensphoto/xhtD8UGDzZ6wE5RiqVhbusRd6YUcxhbk0AQW95p6.jpg', 'myapp/storage/app/public/biensphoto/2VaqGCCYv7BjnNe7L54ABcAfZ5ljDltrTggyx4zh.jpg', 'myapp/storage/app/public/biensphoto/mBQit2E73Vn8BK4OaAZ3zniB8HyFVteXDaiTCesb.jpg', 'myapp/storage/app/public/biensphoto/4TNkiDedBbKweb7XcM5zSdeBWvC15ASl2KwV80sA.jpg', 'myapp/storage/app/public/biensphoto/XXdxPpwXvL36gXbRC6ivLRCrADaAXUv2gkm9l0Cv.jpg', 'myapp/storage/app/public/biensphoto/kf2GNPxgZsMkvC5Dd021SYehc7KJISw85OnFwQRs.mp4', 1, '469', '2022-08-18 14:11:36', '2022-08-18 14:11:36'),
(64, 56, 8, 8, '1', '1', '2', '2 Appartements de 2 pièces à Béssikoi', '200000', '200.000 frs/mois - 2 mois de caution- 2 mois d\'avance - 1 mois d\'agence', '- Un chauffe-eau moderne\r\n- La climatisation au salon et dans la chambre \r\n- des meubles de rangement dans la cuisine\r\n- Appartements staffé avec des luminaires\r\n- Salle d\'eau visiteurs\r\n- Balcon\r\n- Interphone\r\n- caméras externes\r\n+ Parking surveillé \r\n+ Terrasse pour activités de loisirs', 'myapp/storage/app/public/biensphoto/wJcm8B1kiCUt17ltXBX69vbjQhwyrpsJz6yyrI2V.jpg', 'myapp/storage/app/public/biensphoto/zR7n0A8cI9WFs4otFhuwkUO7EJHY5XBkHgqtTj5o.jpg', 'myapp/storage/app/public/biensphoto/g4NArVpZgipDzPIMAGs2g3CeXKzZ4D4dymshSWId.jpg', 'myapp/storage/app/public/biensphoto/3Wc5e6A7UCUlmaqcNjX5ZFVUjscyVWQnXIELZ4oc.jpg', 'myapp/storage/app/public/biensphoto/hYjNgfkz1tMZV1QouI2TtWJLuKRlEYIALSyoy4Zm.jpg', 'myapp/storage/app/public/biensphoto/tCQpkOGnP79uDsBAaQjrmIdeZO0QE3SHzH4GEUvw.jpg', 'myapp/storage/app/public/biensphoto/dmmiLehjIQwchUc7xcXu2Y5DEEWYLCwqhy0VYZVc.jpg', 'myapp/storage/app/public/biensphoto/HvAfnKyGcctAMsmlQAHd85ggDlNPpPH9FSbANgDy.bin', 1, '1585', '2022-08-18 14:16:20', '2022-08-18 14:16:20'),
(65, 21, 8, 8, '2', '65', '89', 'Appartement au Plateau de 15 ans', '350000', '350.000 F/mois - 3 mois de caution', '2 chambres indépendantes (douches), cuisine, salon, climatisation, chauffe eau, bâche à eau, surpresseur, gardiennage, parking.\r\n\r\nLoyer : 350.000 FCFA/mois\r\nCaution : 3 mois\r\n+ 1 mois de frais d\'agence.', 'myapp/storage/app/public/biensphoto/w30FlwPEzMK8qgbr91ypcQteXPlE7g3kkqdZVNP3.jpg', 'myapp/storage/app/public/biensphoto/rrN8ZNVWyzkZP0oi9BKoafyMlbJt3gCNDABs39Dq.jpg', 'myapp/storage/app/public/biensphoto/tW6qagZSqOAX0254FTdEeioKVhcm31JIFrvWio7X.jpg', 'myapp/storage/app/public/biensphoto/8PVtm4RZzxlr7zHH6yYxFVLZWmPedb380NPlV5T1.jpg', 'myapp/storage/app/public/biensphoto/79zLtOt1o9kcOJtnf32xw5XjoTAaASLRvVV7gQxE.jpg', 'myapp/storage/app/public/biensphoto/kZGc4SygFMkVg15WAFFyxhviBFUOooTJVieAzzJZ.jpg', 'myapp/storage/app/public/biensphoto/4vTRrg9BcHMTzWC1QuR4wOm4ieeZ1zaz7NqSRVj5.jpg', 'myapp/storage/app/public/biensphoto/1qZUgRkJmFx5D5I0qto6RARcAF5aQQ2m56tUPGnw.jpg', 1, '1668', '2022-08-18 14:36:56', '2022-08-18 14:36:56'),
(66, 21, 12, 9, '2', '65', '100', 'Trois (3) parcelles à vendre, à Nkombo', '120000000', '120.000.000 FCFA - négociable', 'Trois (3) parcelles jumelées à vendre, à Nkombo (secteur : la Télé, vers bas-prix).', 'myapp/storage/app/public/biensphoto/YMk7ttChy6E5GbCtlqyo85LaAPnVsDODPRFcNxtz.jpg', 'myapp/storage/app/public/biensphoto/iZL8Zlws7MGFGzNQlr4SGg6WExO5fx7IVWKafSzc.jpg', 'myapp/storage/app/public/biensphoto/1yI3BsXAHfF4RTrvECpEYwLZDhScqQDCCWpmjVTw.jpg', 'myapp/storage/app/public/biensphoto/RQMO34PjWyHjpIXr09bXibQTRs1EPVO3oJBm4VBz.jpg', 'myapp/storage/app/public/biensphoto/i0XRHMq9EnM1Cp4brIryeec3kG1yOyXnJWfwmoKu.jpg', 'myapp/storage/app/public/biensphoto/bByv2AGPIfArbiM1YWbnzPgJdZNWwk3kc4GMQfvr.jpg', 'myapp/storage/app/public/biensphoto/ypgc7Dt3WnP5c7gG8ELw7pTY5SdsuljZz7MufmYy.jpg', 'myapp/storage/app/public/biensphoto/U3q6u6WHHlAy8oj7DkSD5rHFa1FalsB8KO00FDki.jpg', 1, '3803', '2022-08-18 15:18:33', '2022-08-18 15:18:33'),
(67, 21, 9, 8, '2', '65', '93', 'Espace commercial à Poto - Poto', '600000', '600.000 FCFA/mois - 3 mois de caution', 'Espace commercial à louer, à Poto - Poto (vers le rond-point de la gare), Brazzaville.\r\n\r\nLoyer : 600.000 FCFA/mois\r\nCaution : 3 mois ;\r\n+ 1 mois de frais d\'agence', 'myapp/storage/app/public/biensphoto/R15jceLQ1wbziqn2vv3mUuwZ6iL0HXrF0YV80osL.jpg', 'myapp/storage/app/public/biensphoto/glTrXAs8wCFgAkyLk1JHY026ywcho7rxItNmk3is.jpg', 'myapp/storage/app/public/biensphoto/eZjKRSTiLI8I1ynHdUu6bMVzgG88qdXIieyTTLow.jpg', 'myapp/storage/app/public/biensphoto/ZLZ7exy6RyZ0T8h44akwOCMdskARI3ZIixFbRTcm.jpg', 'myapp/storage/app/public/biensphoto/KuGOcEU8ISrnGS0ZqQOYVgbfAB2Zu4eb7lLEnDdv.jpg', 'myapp/storage/app/public/biensphoto/rPzEGkFfe70TDAPahBvMKYvKgGnFOaqgxPfa0sBH.jpg', 'myapp/storage/app/public/biensphoto/IXq5DRHwVbnoJJelGOgTLfKEJr0rGiBQwyHf4NuS.jpg', 'myapp/storage/app/public/biensphoto/qLQ4xDctzNeEkRTsSbNOGfSUgxi1aFWyuuuVYETy.jpg', 1, '3627', '2022-08-18 15:33:26', '2022-08-18 15:33:26'),
(68, 21, 14, 8, '2', '65', '89', 'Villa (duplex) au Plateau de 15 ans', '1500000', '1.500.000 FCFA/mois - 3 mois de caution', '4 chambres indépendantes (douches/toilettes), salon, cuisine, salle à manger, toilette interne des visiteurs, balcons, véranda, climatisation, chauffe eau, bâche à eau, surpresseur, parking.\r\n\r\nLoyer : 1.500.000 FCFA/mois\r\nCaution : 3 mois\r\n+ 1 mois des frais d\'agence.', 'myapp/storage/app/public/biensphoto/C9ptHJcFhAoDgsazKtdPPsjywlsJOEtvs6aYTbRp.jpg', 'myapp/storage/app/public/biensphoto/bbzBxaHfvU91xd3ftH4Wfl5mNgrKy3qOPACmOxyc.jpg', 'myapp/storage/app/public/biensphoto/xW64N9aThcBM01Let8spHnzj4XoLYcFdK1ffLc57.jpg', 'myapp/storage/app/public/biensphoto/wOOI4iM4Wcx24VsIcXCQ7nDIGhvwI3V5bt1sbu04.jpg', 'myapp/storage/app/public/biensphoto/HUMisy2CbJMHRmznwLL41Al2bNv14iFVg7IqSxbO.jpg', 'myapp/storage/app/public/biensphoto/5Ykz0HykaLvhX0IV5fPGshlPFjHDbJf9ge6VC59v.jpg', 'myapp/storage/app/public/biensphoto/T7yQshOb7ZIXrwlPbwYVOLIzfDmDGUON6Q1uKmce.jpg', 'myapp/storage/app/public/biensphoto/UASyufm1HACSEIxzfaNaS6q6eBD1Suhnjfyzjj8Y.jpg', 1, '3751', '2022-08-18 15:55:46', '2022-08-18 15:55:46'),
(70, 19, 12, 9, '1', '46', '64', 'Terrain disponible à Motobé 14 km de Bassam', '1100000', '1.100.000 / lot', 'Opportunitée IMMOBILIERE\r\n\r\n✅️Opération 1: Bassam Motobé\r\n60 lots de 500 m2 disponibles. \r\nPapier : Titre foncier global a la fin de l\'opération. Contrat de souscription . Attestation villageoise \r\nFrais de dossier: 100.000 Fcfa\r\nPromoteur : KGS Groupe Immobilier', 'myapp/storage/app/public/biensphoto/agUYmjtwUzF7XNBpbRw1MFhqh1kWSI3O6VfkbQRP.jpg', 'myapp/storage/app/public/biensphoto/WqDSXFPFObDZHdLB2Ead0fM5HL456NpDhe313U0W.jpg', 'myapp/storage/app/public/biensphoto/urtPlFJPr2gBqTJW4Fjv374r1mC8DAht3E7uuAnr.jpg', 'myapp/storage/app/public/biensphoto/6SdTwqh4fktlDvO8l0oqRygFUil7frpwI4OtqPCj.jpg', 'myapp/storage/app/public/biensphoto/pYNelSFy1ZmOYpnp8YPsscVqdU2bNJpPhi7qEdP3.jpg', 'myapp/storage/app/public/biensphoto/ehL2CnRUtev4KkokM967IfV2HX9krXosNeCZpdit.jpg', 'myapp/storage/app/public/biensphoto/kM13lGrD0BGQf1oi5u0CReHwnIsDFL2yvsKEL47a.jpg', 'myapp/storage/app/public/biensphoto/ELAPCQpgfjTHC0Ofsjb2KqbiVomyrPDhxHnlRTfj.jpg', 1, '2470', '2022-08-18 23:39:45', '2022-08-18 23:39:45'),
(71, 60, 12, 9, '1', '1', '11', 'TERRAIN DE 700M² EN VENTE', '35000000', 'Terrain DE 700M²  à vendre AVEC ACD ABIDJAN\r\nprix :35 MILLIONS FCFA', 'Terrain DE 700M²  à vendre AVEC ACD ABIDJAN\r\nprix :35 MILLIONS FCFA\r\nNumero : 01 41 95 44 09', 'myapp/storage/app/public/biensphoto/3iNyDvU2aLhTMblqbV7MW0N9vkXzgcHcQ8QlE8Yg.jpg', 'myapp/storage/app/public/biensphoto/XFDOlh2Wit3p0CCGyQpw5ap11dzFIcZk388ymYeM.jpg', 'myapp/storage/app/public/biensphoto/XSFsr6DxDq7G5nMQfnllyfJy9z68maxEfP6ej7y4.jpg', 'myapp/storage/app/public/biensphoto/YKaW0qzsqkWzFooSURGC13FjSpwdcJX8ziSBD5wA.jpg', 'myapp/storage/app/public/biensphoto/tV8A5si4T2mjLMWqRwx8IcMsqb3VvQuRxbKM6a2I.jpg', 'myapp/storage/app/public/biensphoto/LuFbDD8RwsZ3XZapOBimFMgcNOakpso568hKZhRT.jpg', 'myapp/storage/app/public/biensphoto/YFelohQjNsZvbukHGt0pJ4sm0tdlXdxtHttAdoOG.jpg', 'myapp/storage/app/public/biensphoto/K4xWiHEObqujHIusOmtWhxxqsEtTBERuGRxZmPfO.jpg', 1, '4078', '2022-08-19 02:41:22', '2022-08-19 02:41:22'),
(72, 19, 12, 9, '1', '1', '11', 'Terrain disponible à bingerville ADjaba', '3650000.65', '3650000/ lot', 'Bingerville Adjaba\r\n43 lots de 500 m2 disponibles.\r\nPapier : Acd globale à la fin de l\'opération. Avis favorable lotissement deja disponible. Contrat de souscription individuel \r\nPrix: 3.650.000 Fcfa/ Lot.\r\nFrais de dossier:  100.000 Fcfa', 'myapp/storage/app/public/biensphoto/1fPzFafTVncrVs1QrAceKzXGIESKLv9kp4rrr7M2.jpg', 'myapp/storage/app/public/biensphoto/0nmXt2YRzDeV23X9Qeyr5J765S9ZsEtsos0Ya1Lh.jpg', 'myapp/storage/app/public/biensphoto/Un63NKVWCbAvU4H8N4NFtz9BBygEQkKGIymMhHzM.jpg', 'myapp/storage/app/public/biensphoto/t1DRcW6Ol9C7cD9cmo7Ddn0ca2vhjPR4hSXDAlGL.jpg', 'myapp/storage/app/public/biensphoto/tMwZamnjgPLAbfmeN70AIYYqh9NPpZvPiJIiCP4h.jpg', 'myapp/storage/app/public/biensphoto/y7dudHDXkvPb1P7L0T01r2nOVnl8WDWF3wKiuw4u.jpg', 'myapp/storage/app/public/biensphoto/AHv8rvdoYjfKuwirmQ5CkCGvluRp6ixjqVz0q5w5.jpg', 'myapp/storage/app/public/biensphoto/kvWNv28UoWncvSOiaK0CrOYhvClE34h7THuYGiGW.jpg', 1, '120', '2022-08-19 08:51:49', '2022-08-19 08:51:49'),
(73, 21, 14, 8, '2', '65', '92', 'Duplex à Moungali', '400000', '400.000 FCFA/mois - 3 mois de caution', '4 chambres, salon, cuisine, salle à manger, 2 salles de bains, véranda, climatisation, chauffe eau, bâche à eau, suppresseur, parking.\r\n\r\nLoyer : 400.000 FCFA/mois\r\nCaution : 3 mois\r\n+ 1 mois des frais d\'agence.', 'myapp/storage/app/public/biensphoto/56ftR8aL69uxi7vXBuqbbl5WUE6IMEslLqNb6XLy.jpg', 'myapp/storage/app/public/biensphoto/wKKbJbNQbZ6EKWzYd7eQjvI6B3jmqeHOIDfptjnD.jpg', 'myapp/storage/app/public/biensphoto/S8UFc7BuduQ0zk4mX0wNvR36Tn2oFq2P2cGuL0Ri.jpg', 'myapp/storage/app/public/biensphoto/Xk2CHPeWD7Y3oER6ww81pfDJb24TqTVDsP0okFQb.jpg', 'myapp/storage/app/public/biensphoto/nbLXp02yPtitOoDYuuSdu0tI1otgYzRfFY9IpU9D.jpg', 'myapp/storage/app/public/biensphoto/6iWvSZXrP96tEx2NdbtWP24gf22G6GckBo28Wmla.jpg', 'myapp/storage/app/public/biensphoto/7A6jgDC74b5v5IsxC7rIzK9VJTxrkXokvqxqzFFe.jpg', 'myapp/storage/app/public/biensphoto/vI9Ay5XPthibaAWoFsdEnKhO2GFqfnDAumOl3Wtv.jpg', 1, '2529', '2022-08-19 09:29:46', '2022-08-19 09:29:46'),
(74, 21, 12, 9, '2', '65', '114', 'Terrain à Manianga', '8000000', '8.000.000 FCFA - négociable', 'Demi terrain à vendre, à Manianga, Brazzaville.\r\n\r\nDimensions : 200m²\r\nType de vente : gré à gré\r\nDocuments : tous les documents y afférents\r\nPrix : 8.000.000 FCFA - négociable', 'myapp/storage/app/public/biensphoto/dlAO5hGzLyLn1TMSefElESfZ1RpbOEkabrtLqmsN.jpg', 'myapp/storage/app/public/biensphoto/urnjLjTejbBbv7oHLX6PeAiCxT0wWVJLUmY1T2xN.jpg', 'myapp/storage/app/public/biensphoto/LEOTE2Gwlsi0pvmYYp6Am11UCwdnKCyHa632ert6.jpg', 'myapp/storage/app/public/biensphoto/tRXCG2GDbnmvcaDvs6R06C8MzBhnevb6yaAvR8q7.jpg', 'myapp/storage/app/public/biensphoto/OH5Tkd5q8upZHgoOoWbDgQ8srO7qqeDL1YHfGPLI.jpg', 'myapp/storage/app/public/biensphoto/zWYyzzvtMO9Qlq6UHosNFcTCuHaLQHBlIYZCDsQy.jpg', 'myapp/storage/app/public/biensphoto/EaioRSx1HBZ4wCgkRHJwLiUCOpNYq9ptYAF6rwPR.jpg', 'myapp/storage/app/public/biensphoto/c7SHJRl2CU66TxRsb67NxPArlw2ZULITddu4SM8S.jpg', 1, '3377', '2022-08-19 09:34:45', '2022-08-19 09:34:45'),
(76, 6, 11, 8, '1', '1', '2', 'Superbe villa duplex à Cocody angré cité arcade 4', '600000', '600.000 Fcfa / mois', '4 pièces et une indépendante', 'myapp/storage/app/public/biensphoto/fxlqM5iITdfBrTDOqzMmwItL0t6AjZlUtHdmjFYW.jpg', 'myapp/storage/app/public/biensphoto/l554nVSEfEzlFf8C0jdF93OG8Giqnk2MDODxL1jD.jpg', 'myapp/storage/app/public/biensphoto/57rBUj5y8c4L6Jd1WUwinpacKBy9Hz8NYPmmv0VD.jpg', 'myapp/storage/app/public/biensphoto/UOmpgi9CVcgrUOVrKtM8WAIGplkcnYkgsH7mgB4t.jpg', 'myapp/storage/app/public/biensphoto/QUPll7yHPUkh97moOkJThix41DzuQLmGNEAiQH4w.jpg', 'myapp/storage/app/public/biensphoto/bR7ApxEje3uPDPwY2lcxVxbropRQfmc2gmXyVIv2.jpg', 'myapp/storage/app/public/biensphoto/rXkPh0uiqnGKL1XW0r7vwiyu2b1GGMSsJkeNbrjT.jpg', 'myapp/storage/app/public/biensphoto/jkkOgyGwNlBTaElihunipIlgEUiFGQg3ODdXqaMl.jpg', 1, '932', '2022-08-19 11:11:35', '2022-08-19 11:11:35'),
(77, 87, 8, 9, '1', '1', '2', 'Bel appartement 4pièces à Cocody II plateaux 7eme tranche cité arcade', '90000000', '90.000.000 Fcfa à débattre', 'avec une cuisine encastrée ouverte\r\nun salon et une salle à manger\r\nun balcon\r\n3 chambres autonomes.', 'myapp/storage/app/public/biensphoto/DaZbY0DzsLb4lk10IAUqk8zAcjx7rW5fLHcNvGlH.jpg', 'myapp/storage/app/public/biensphoto/inmNNXTqmCx5rJur1UUoSHfa94iC5SplZvxennZR.jpg', 'myapp/storage/app/public/biensphoto/KmWdpoyMpusA9NJjKRULKJJbzlnWLGXZB3fZBLAX.jpg', 'myapp/storage/app/public/biensphoto/C3GG3Xlsl9TdcPSGIQ69EW2rccbAIfGTmS4J6R4q.jpg', 'myapp/storage/app/public/biensphoto/NGWG7OZ7NeqmoiWY3pnC0DsFQnA9ygBnO0W6t2ci.jpg', 'myapp/storage/app/public/biensphoto/Rpw6rZd3T2N11kE8Tjloq2Qru8D1UTiFMHMTGTvn.jpg', 'myapp/storage/app/public/biensphoto/Ycc5lAP6rGx630nkSQhQXIF15ZhZ58Y8kADzwh3S.jpg', 'myapp/storage/app/public/biensphoto/WlG5lAkVVdF9lSCDJrjLXxF3VnGNhhCnQYF9b8wc.jpg', 0, '1410', '2022-08-19 11:21:02', '2022-08-19 11:21:02'),
(78, 6, 14, 8, '1', '1', '2', 'Villa Duplex 4 pièces à la Rivera Faya', '400000', '400.000 Fcfa/ mois', 'Derrière Jules verne \r\nTrès accessible', 'myapp/storage/app/public/biensphoto/k0Jikmv0INXRn0q82fPy7gdxftVTPPVg1MgsHQxc.jpg', 'myapp/storage/app/public/biensphoto/AcXit6tdHkEuTNzvouLeo6pt01JHq6zXZ4AfDxdD.jpg', 'myapp/storage/app/public/biensphoto/DD2BBSVPAWrY86Rb4S2QGqWFTu4qiWpFlpItkdJn.jpg', 'myapp/storage/app/public/biensphoto/uBdnmRhXYHTzpq1Xx4mPcm2FZpwSApF2ruLCaEkI.jpg', 'myapp/storage/app/public/biensphoto/QRZlNIVgRPLZvtciPe0jzHAUbVt5ONPdZRpFAzKk.jpg', 'myapp/storage/app/public/biensphoto/QRZlNIVgRPLZvtciPe0jzHAUbVt5ONPdZRpFAzKk.jpg', 'myapp/storage/app/public/biensphoto/tCKVgnXgoFXluDhhiJJ2dcCELjICSjd8NAU6rS6n.jpg', 'myapp/storage/app/public/biensphoto/wto7NouhnBPj0OYJJiymZ4tpTkLC4u8T0VbPzf0z.jpg', 1, '3301', '2022-08-19 11:26:05', '2022-08-19 11:26:05'),
(80, 34, 12, 9, '1', '17', '51', '20 lots de 500m2', '22000000', '10 MILLIONS  au premier  versement et le sur 5mois.', '1 ha de 20 lots de terrain  à  Agboville à  seulement  22 MILLIONS.', 'myapp/storage/app/public/biensphoto/ecJwGN8c8p7vbhJHNrePqiTSSlPssHckxIUE1R2M.jpg', 'myapp/storage/app/public/biensphoto/vxP9rTUOolAjdEkicOTEZWwTdz74l0EGgehj96oj.jpg', 'myapp/storage/app/public/biensphoto/rc0LJtug7er1REziDdeHhnMaU1xUc4EyQJkLedUo.jpg', 'myapp/storage/app/public/biensphoto/YaBiCIe3mTThyNB0Rlyj4DU1y68BvEGIbeZVeWfW.jpg', 'myapp/storage/app/public/biensphoto/jcofGzhqDtTI828vIy3bHrWxYUD9DZBfwJdV19Kn.jpg', 'myapp/storage/app/public/biensphoto/hdvFPdFgHoolNPBW6z3EQSss7ukG3t6ThPGLDa3i.jpg', 'myapp/storage/app/public/biensphoto/9nBdciVCsm9AxvxeevyPur1K67sRrHPGKhCbkf6M.jpg', 'myapp/storage/app/public/biensphoto/GiLRhrL1fdA9sKZt2ItHGh31Li6BfYN4SZrd1Rd3.jpg', 1, '2285', '2022-08-20 09:10:06', '2022-08-20 09:10:06'),
(81, 34, 12, 9, '1', '4', '27', '500m2 à  Jacqueville AVAGOU', '5000000', 'paiement est cash 5.000.000Fcfa', 'Jacqueville AVAGOU site déjà lotis et à  50m de la plage.', 'myapp/storage/app/public/biensphoto/PSJS9r31tuWoLCo1hvLCm4EMh3Eja8uJBT6k1IRi.jpg', 'myapp/storage/app/public/biensphoto/POsxPpJJRezzKTSTqDbnUahLStK1o252AOiUMLDS.jpg', 'myapp/storage/app/public/biensphoto/BzeawWLOV5m56tNotyjENXcAEIJJdPeZd0HoMk8Q.jpg', 'myapp/storage/app/public/biensphoto/uvkhoRf4ZOi9rSVWSr5QlURdn9tWUrhgJf0V0kU3.jpg', 'myapp/storage/app/public/biensphoto/C5AHNU3wX8peOB9zTFfcofZNgF1m0HO2n2nRzg4L.jpg', 'myapp/storage/app/public/biensphoto/WiwmWuDhOy9bFRXPvrYuhStRzxPF8qVHgdBPs0QY.jpg', 'myapp/storage/app/public/biensphoto/FAJrrfcHK0HKLxhOEAUFcSZQ5klJI8hkoo12d579.jpg', 'myapp/storage/app/public/biensphoto/ywulLmwimzMit8yh77NOx9jd3rTjneSHcFXj8plT.jpg', 1, '4263', '2022-08-20 09:37:51', '2022-08-20 09:37:51'),
(82, 17, 7, 9, '1', '42', '65', 'Une maison', '22000000', 'Payer cash par virement bancaire où espèce', '3 chambre salon,2 douches, une cuisine équipée et parking', 'myapp/storage/app/public/biensphoto/wQ0XsfjwH5PS3EB24z8pdxIVJuQxlWHcNgeR82gn.jpg', 'myapp/storage/app/public/biensphoto/eAtLtOC67xBLWHhwkknktYeFrpBu67xvSGClugdL.jpg', 'myapp/storage/app/public/biensphoto/0lDVG5FJXhnULvHPFYXGuC6u4Z5pEGpzI5fPoeSI.jpg', 'myapp/storage/app/public/biensphoto/MVksOM5texyrAPGkZEqmoCeILgrUB4e2SIvCMwkz.jpg', 'myapp/storage/app/public/biensphoto/Dm1IMSDBsbLpX1FT3dvOndoAL2PGMdW5GGUbvpKX.jpg', 'myapp/storage/app/public/biensphoto/rZW76h8S8sA5Zt2sp59gecuK2cdhASZLQdvGaVFP.jpg', 'myapp/storage/app/public/biensphoto/6daidBbkdrWXtGT19T3HDOlL1OxXgaQky4egeYlt.jpg', 'myapp/storage/app/public/biensphoto/ZubSPVrnqCO50D10a1r7hp8n4rmB9r3HjHemHlG3.jpg', 1, '4965', '2022-08-20 12:49:39', '2022-08-20 12:49:39'),
(83, 23, 8, 8, '1', '1', '23', '3pièces a la rivera palmeraie', '250000', '250 000f/mois - 5 mois d\'avance', 'Chambre salon cuisine douche', 'myapp/storage/app/public/biensphoto/KUcKwjSiSGMhJZlExnEFbbaG9kTUkXNHTOGfu1NG.jpg', 'myapp/storage/app/public/biensphoto/mqS8VcSKTVrlZU3oPgnnQ55NhaydtG1MsooUh7HZ.jpg', 'myapp/storage/app/public/biensphoto/8ht8GFcgaFto4eIGVVlvT8xhj9KY6NaWu54HFI7p.jpg', 'myapp/storage/app/public/biensphoto/vB7Dem8gqroCcY8OU0rwMaoBHNteKdLYauA8YlEy.jpg', 'myapp/storage/app/public/biensphoto/fZshRJXBkjGFxOYIQePHPYJCHSSzPX8QCCbOys85.jpg', 'myapp/storage/app/public/biensphoto/w5vDuZC8x6ZjGkm1fyWjyDbxifs6j3ryrqohGF97.jpg', 'myapp/storage/app/public/biensphoto/Mwc2pEmkK1R6IJLMdY0XhsAIcZzXA0mD7vJqP7Kk.jpg', 'myapp/storage/app/public/biensphoto/OsxUEBiy1ZE8YjYkgma66VCmiZMRHfz9Pu7x4C9H.jpg', 1, '4660', '2022-08-20 14:28:33', '2022-08-20 14:28:33'),
(84, 6, 8, 8, '1', '1', '2', 'Appartement duplex 3 pièces à Cocody II plateaux les oscars', '450000', '450000 Fcfa/mois', 'non meublé, avec cuisine, buanderie, arrière cour, garage pour 2 véhicules, situé au rez-de-chaussée d\'un immeuble, aux 2 Plateaux, les oscars. Loyer : 450.000\r\nRéf : précis immo', 'myapp/storage/app/public/biensphoto/7XfwAOowqoen1kMqVlemz7hfUn8aG3U8XLAuDW3E.jpg', 'myapp/storage/app/public/biensphoto/QpIYR0Bw2mGwZNs3oeoXfiZ5SDxj3CVwchUTzIN6.jpg', 'myapp/storage/app/public/biensphoto/4SvSo3X3ZQIuhiAkUSEua1ZpXrFzdXwNFv6Ahx3E.jpg', 'myapp/storage/app/public/biensphoto/DqE6pZiCHh31xLdhPABpA1zkC44ihyhDxfJnkyWz.jpg', 'myapp/storage/app/public/biensphoto/zSeymsyx7j3HsK6uaD3JEsETwSwiaVHnOmj7Qjkd.jpg', 'myapp/storage/app/public/biensphoto/c0dxHyRYcjpXMYX6FTuWumMd11WI001eR28daf7w.jpg', 'myapp/storage/app/public/biensphoto/Wdw5RloYn4OJIxRCwqdcWZb9kSi7UfUfk0KwXHv9.jpg', 'myapp/storage/app/public/biensphoto/NA0TZXgS8DSE6q4WUfBnr3eoIs7f5aWgxp1XMp7P.jpg', 1, '1727', '2022-08-20 19:40:31', '2022-08-20 19:40:31'),
(85, 6, 11, 8, '1', '1', '2', 'Coquette Villa 5pièces à Cocody Angré 8eme tranches', '800000', '800.000 Fcfa/mois - conditions 5 mois', '5 pièces plus Une dépendance grand cour avec jardin  \r\nLoyer mensuel  : 800 mille\r\nCondition 5mois', 'myapp/storage/app/public/biensphoto/FjzuuPMIkvsGsIdU1sJzLD3d0O8SlAwrtDpRvAxw.jpg', 'myapp/storage/app/public/biensphoto/SLnozMOMFhRloAw0gojJD4NwF4pADc0FnoIjuwhh.jpg', 'myapp/storage/app/public/biensphoto/q20MYR9BDNqD6lJFa5WBhX34DXJrM8dMzb2nmVBp.jpg', 'myapp/storage/app/public/biensphoto/lnD11IkdUov3rorU9zpIoUIrxxAYmfc3KTOjaEd9.jpg', 'myapp/storage/app/public/biensphoto/wnRgU7ZaAogaqSPZ2Fl81xFiSdPUc1uZmtYjDx4t.jpg', 'myapp/storage/app/public/biensphoto/HiBaCkhsuphXQHQLMqNDVI59jMJlkbv8xuA7lS1C.jpg', 'myapp/storage/app/public/biensphoto/YOB8hHg1oSY0UoCBtxSd9GavPRjLO5LYk1sybCjR.jpg', 'myapp/storage/app/public/biensphoto/V9HWd1gq62k9yitfwZsGRbD11l0jWOwtoV56c3lO.jpg', 1, '4790', '2022-08-20 19:54:16', '2022-08-20 19:54:16'),
(86, 66, 7, 9, '1', '39', '63', '2 villas de 3chambres Salon ;une chambre salon;un studio américain situé non loin de l\'université', '45000000', 'Prix ko et cash', 'Villas avec garage et chambre salon avec une grande terrasse et le studio', 'myapp/storage/app/public/biensphoto/DVSgiEnpcYc7dGnmvqu0WMSHcVUsTTei8UqhJlVT.jpg', 'myapp/storage/app/public/biensphoto/N6WF5Npx9aihZP451BTeYr98fP084ZKEGgnhIxwt.jpg', 'myapp/storage/app/public/biensphoto/0yryk4r173HqrcsiMWynAZDcQjf6Ghews6AnoOww.jpg', 'myapp/storage/app/public/biensphoto/0DrAuucnB3XEKvU5UZ3MNOBetvxeZ3JBdQz7Cj1m.jpg', 'myapp/storage/app/public/biensphoto/qHFWSnthCvpTyxpUhjPyUpgIjhnsgtnN4yqAPLgA.jpg', 'myapp/storage/app/public/biensphoto/TERrBuAIE7bwCW0pziVTTVDqSefFnBNfhbt1t5OA.jpg', 'myapp/storage/app/public/biensphoto/5YFLI3qcDOlVsdEPO0TuUvBVXw0uVK0YS7RsnrbR.jpg', 'myapp/storage/app/public/biensphoto/9FRwxyBRyF5C9rEqNlsLKZPtqFuAAnD6ftneqybm.jpg', 1, '3793', '2022-08-21 10:08:57', '2022-08-21 10:08:57'),
(87, 67, 7, 9, '1', '6', '20', 'Villas 3 pièces à Bouaké', '6500000', '6000000f vous pouvez payer 4.500.000f et payer le reste par échelonnement.', '*Bonjour !  Opportunités disponible*\r\n\r\n un promoteur en difficulté brade 5 maisons de  10millions à 6millions.\r\nNB: Il reste 4 maisons à 6 millions\r\n\r\n possibilité de payer 4millions et le reste après.\r\n\r\nLieu : Bouaké sur la route de Beoumi la nouvelle autoroute passe à côté de la cité !', 'myapp/storage/app/public/biensphoto/GZ9UCl0QahpL41Qay9xIDGGIIGcDZ3gtoqAAJ3JG.jpg', 'myapp/storage/app/public/biensphoto/hDjZ2svtv5NhQIHDLWG3eGjVfq9Y6WJppPABEK2H.jpg', 'myapp/storage/app/public/biensphoto/WQ8JhJtm9IQeOFpNaTBO9fQqJ73WWHJ8yro2ZUwg.jpg', 'myapp/storage/app/public/biensphoto/4gDcYMFSUcXNai3SVq64uuNZPT040hXxB7JxbhPS.jpg', 'myapp/storage/app/public/biensphoto/BwGTHXECPTMK0Wt0tGhDS8NtrKTlMpWHWlek2TUM.jpg', 'myapp/storage/app/public/biensphoto/ESrqzyyDY4SEjODMshNEYI6svLFFKOLVQLtj9PnZ.jpg', 'myapp/storage/app/public/biensphoto/xvk0OPE2NjhRtkOzfn0y6T7TDUtrVQYwAoJRKQmD.jpg', 'myapp/storage/app/public/biensphoto/nZpdQmpIBawAS2mR0I1qgb727s6ExJI3BFPYB0XW.jpg', 1, '1786', '2022-08-22 10:52:08', '2022-08-22 10:52:08');
INSERT INTO `biens` (`idbiens`, `gerants_idgerant`, `typesbiens_idtypes`, `typesoperations_idtypesoperations`, `pays`, `villes`, `quartier`, `libele`, `prix`, `resume`, `descript`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `statut`, `codebiens`, `created_at`, `updated_at`) VALUES
(88, 43, 8, 8, '1', '1', '2', 'Appartement de 2 pièces à Angré CHU', '160000', '160.000F/mois - 5 mois', 'Chambre staffé et lumineux\r\nDouche et WC centrés\r\nCuisine moderne\r\nSalon staffé, lumineux avec balcon\r\nParking interne', 'myapp/storage/app/public/biensphoto/5C2Tl40M8zJMbjaEQO8KvEM35tC9qQX9XxnJTqaH.jpg', 'myapp/storage/app/public/biensphoto/85kwkiXOAKWD3UzbDsfAqPYZWj9k1dqhFFqGX1Iu.jpg', 'myapp/storage/app/public/biensphoto/743yQkikmjtDoqMGxsCveH3EAFEWSsiMf6NVCLKl.jpg', 'myapp/storage/app/public/biensphoto/njJkK6Q44tc9VH3ZeIEH6ob86qRbrTI8UKVYtzaN.jpg', 'myapp/storage/app/public/biensphoto/pEv6mg4FylK4vp4HLfB1CZorUGT0M1PF9YbLFJm6.jpg', 'myapp/storage/app/public/biensphoto/pRcRqjIrRaOnXQCYD3ypajyemdNltZIWo8V6ucak.jpg', 'myapp/storage/app/public/biensphoto/Y8rGeefVyQfnnoMi5bOvrAllqGbLrYd8KDiLGJBC.jpg', 'myapp/storage/app/public/biensphoto/I9HzujC31NDHSUuxeAzNH310ZVEVjNxyfsiEpEfa.jpg', 1, '2698', '2022-08-22 17:22:45', '2022-08-22 17:22:45'),
(89, 72, 8, 8, '1', '1', '2', '3 PIÈCES', '350000', '350.000F cfa / MOIS \r\n2 mois de caution - 2 mois d’avance - 1 mois d’honoraire agence', '2 chambres- 2 salles de bain - 1 salon - 1 balcon - 1 cuisine \r\nDu 1er au 4ème étages', 'myapp/storage/app/public/biensphoto/yG1yJwry8WJwX1TQihYq4xJ8rFoQWnFKZnmjtoJx.jpg', 'myapp/storage/app/public/biensphoto/wvksBZrnmOA1vtHXPcR6jBfBvEADjryin6d5BGBL.jpg', 'myapp/storage/app/public/biensphoto/0jwsX3dCLsAxIS1bBeHLy2nMof4XkHr3LKbmJDen.jpg', 'myapp/storage/app/public/biensphoto/K2rSmeIUAz1Ra2eAJjsIojPCvx1cFsCM1MGZXIUm.jpg', 'myapp/storage/app/public/biensphoto/5foqNGjf6EKogk5dk42bfjbSV9xO1NPAKiY1f483.jpg', 'myapp/storage/app/public/biensphoto/i3ARV2yuIfsIDBkctnlY6Z9uucKc8LSk1Mq5Cuev.jpg', 'myapp/storage/app/public/biensphoto/1oCQi3wh6mhLaZjvZnaCvF8r42ey7RkAmdxVdmfV.jpg', 'myapp/storage/app/public/biensphoto/Ekmi5N6IYWbaQBNZTCdnkA2CL3OnuUGuvBUrY3KO.jpg', 1, '1845', '2022-08-22 18:15:56', '2022-08-22 18:15:56'),
(90, 72, 8, 8, '1', '1', '2', '2 Plateaux las palmas.  appartement de 4 pièces', '600000', '600.000F CFA / Mois \r\n2 Avance \r\n2 Cautions \r\n1 honoraire agence', 'Bel appartement de 4 pièces situé au cœur des 2 plateaux à proximité du carrefour duncan disponible dans un beau bâtiment avec ascenseur,parking interne ,sécurité 24h/7j', 'myapp/storage/app/public/biensphoto/hByftggvo9ixU8jbumZBfDP1Nu2fA72v2hBXxW9Y.jpg', 'myapp/storage/app/public/biensphoto/amt5bCivyRqdu57gTZCEBiUqFo6sVwAUkQD2g7aV.jpg', 'myapp/storage/app/public/biensphoto/p9bqdAdsrykTo0ni1XPpGF7EWpiV0h9cIZlgh1RZ.jpg', 'myapp/storage/app/public/biensphoto/ooqc148TOlLKVgut0ogRlsHKChAI0wpR7NEFvqxR.jpg', 'myapp/storage/app/public/biensphoto/wqINeDm13k66JgWnupT2DKbBBXParWycVKJpLP8T.jpg', 'myapp/storage/app/public/biensphoto/mV3PkBrWpKQlQZ8gftdgQ1DTWWxjGXdD1OplZUjf.jpg', 'myapp/storage/app/public/biensphoto/xMu6mIWqgXGxBqmuavlgvzCvOl5KSuxD9P9RNr3I.jpg', 'myapp/storage/app/public/biensphoto/DVPP4pzZlqvWtJOaIycFVdEHy1EgeAqyFcXy3SGx.jpg', 0, '1224', '2022-08-22 18:23:53', '2022-08-22 18:23:53'),
(91, 87, 12, 9, '1', '1', '2', 'Terrain 700m2 à Marcory non loin de la pharmacie Ebathe', '650000000', '650.000.000 Fcfa(650 millions)', 'Nb: très accessible à l\'angle.\r\nTu vois tu prends.\r\n==L\'immobilier l\'investissement le plus sûr==', 'myapp/storage/app/public/biensphoto/lDntNCKcbg0FxHwZB6R1p34lfFIYqdyHcNTaem3Q.jpg', 'myapp/storage/app/public/biensphoto/vK3GG24Po9yxsxcrGDbmsX0M5NEvy39UJamCxcQL.jpg', 'myapp/storage/app/public/biensphoto/7QeQwphF0ZsI9JGdpGmltwtfO60oRN1fdmX9k1Tj.jpg', 'myapp/storage/app/public/biensphoto/lP8kB1KvBLsXvasUEAFTdd2HYmIy875kfUpYZ0cs.jpg', 'myapp/storage/app/public/biensphoto/aArEDbVDfxRSQmoxPc8cObP2f9jSPRc2sgbrCiEx.jpg', 'myapp/storage/app/public/biensphoto/NfRXWKjswJfLGc1rsLaxKvfaZmhJ9mH75OygVsTO.jpg', 'myapp/storage/app/public/biensphoto/d555hmZzqABOnY8ZyEdAKQjqTYa0NuKiRo3hFdrx.jpg', 'myapp/storage/app/public/biensphoto/sB8JlzMoMMruI6eKWM7H7XKtxTeurvjNurYmMGqm.jpg', 0, '3208', '2022-08-23 00:24:28', '2022-08-23 00:24:28'),
(92, 6, 14, 8, '1', '1', '2', 'Merveilleuse Villa Duplex à Cocody angré 8eme tranche', '500000', '500.000 Fcfa/mois- 5 mois conditions', '4 pièces', 'myapp/storage/app/public/biensphoto/A21T1lE5ERTSncDHxVJ3z7nMAAAk20jXENEcyy1F.jpg', 'myapp/storage/app/public/biensphoto/FyysfdlwLFH5HGLEOZSFmB7acoidEBpmcuskJGaF.jpg', 'myapp/storage/app/public/biensphoto/uUOvTW61i6fkKyPyXpCFeJk8bq6RAhHe2WtxKutz.jpg', 'myapp/storage/app/public/biensphoto/9gi2UAfAc2gowZLTHNTb4JMZgl1aJ0jnVvCvkH3N.jpg', 'myapp/storage/app/public/biensphoto/mcR8YubYF0Hro1T13twrh46cGVWplsecsJxmDO80.jpg', 'myapp/storage/app/public/biensphoto/hBTem0ZTsMYJTc3RQ1k3p5FvaSg6WDbxaemX8FtA.jpg', 'myapp/storage/app/public/biensphoto/iVMiRxOA13U8IlpfCMvlEUGHhjXcGHYQieiQjneI.jpg', 'myapp/storage/app/public/biensphoto/mzS122V0YUX5gfsHMuCu9aKKV5wIFDtmCmroEuhL.jpg', 1, '4379', '2022-08-23 00:47:39', '2022-08-23 00:47:39'),
(93, 6, 14, 8, '1', '1', '2', 'Duplex 7 pièces à Cocody Angré château', '1500000', '1.500.000 Fcfa à débattre \r\n1.000.000 Fcfa K.O', 'après fin goudron du château avec :\r\n5 chambres,2 salons, une piscine, une grande cour, salle de réunion,2 cuisines, un préau.', 'myapp/storage/app/public/biensphoto/SZoMqEqbtmNzeR1UQcuDT01fUfrbJobdnyBMtxFH.jpg', 'myapp/storage/app/public/biensphoto/8Kpp9HLwvLAL3wu4aPqTcCdzO2HIfsbbIBygiwiA.jpg', 'myapp/storage/app/public/biensphoto/NAXVGYX1ovWjj1RrXKWYJqurv4rOGdwFJAkeUgwP.jpg', 'myapp/storage/app/public/biensphoto/7BEtxM5OYfCK1chZsET4p99004LpXaEfRsnsqMUG.jpg', 'myapp/storage/app/public/biensphoto/LsnutBzqv2qUEUf3EsPBaJT5palvCwxyZIq5x3h4.jpg', 'myapp/storage/app/public/biensphoto/TcNv6WoVcKAWigWSgpASL5W4DEIWqRatGsBSevW8.jpg', 'myapp/storage/app/public/biensphoto/Y0h5fqosRSCEFgwlkR0R5Y9w8nXxoVYRG8clprI2.jpg', 'myapp/storage/app/public/biensphoto/K08vhGOb61Mteu3iiC6HDlMY4CKhDMJN1LowhibT.jpg', 1, '2747', '2022-08-23 00:54:35', '2022-08-23 00:54:35'),
(94, 87, 12, 9, '1', '1', '2', 'Terrain 1,5 hect à Bingerville marchou très belle vue sur Port-Bouët', '120000', '120.000/m2 - Négociable', '1,5 HECTARE PLEIN PIEDS DANS L\'EAU ENTIÈREMENT CLÔTURÉ AVEC ACD ET À 100 MÈTRE DU GOUDRON\r\nOCCASION EN OR\r\nDOSSIER TRÈS BIEN MAÎTRISÉ', 'myapp/storage/app/public/biensphoto/ttOTpCIVVvRJNo6ZEqqO6qK8FXGXWHJZnwhcEAB1.jpg', 'myapp/storage/app/public/biensphoto/aAGuKfDXKKD0RYoaMFsQpA7PKfvfAwPA4SClCBDz.jpg', 'myapp/storage/app/public/biensphoto/srWw57stF9nUJ72k3YwMVGPrz9pX3tB1mFxeq0rg.jpg', 'myapp/storage/app/public/biensphoto/xnhjyHElbfiyaFOj6XQ2XdPhnZv9RV8SoCBklpit.jpg', 'myapp/storage/app/public/biensphoto/kfhvI0Llc6gRIrAZSInqIbb9Xp6b8ywLEeuHgjsf.jpg', 'myapp/storage/app/public/biensphoto/kcsDXfQD6sMMET8F4u9A67AtzdrUPIJDunuMXah4.jpg', 'myapp/storage/app/public/biensphoto/BqpFYWCRcUK7pBoZ9cjwkk3jLqXhgboGClmketAk.jpg', 'myapp/storage/app/public/biensphoto/b2w3HlBmpDjidjG7eNtFKFlF6TOqAWwsJTdVi8Xd.jpg', 0, '2313', '2022-08-23 01:02:31', '2022-08-23 01:02:31'),
(95, 6, 8, 8, '1', '1', '2', 'Superbe appartement 3pièces à Cocody Golf en face de l\'ambassade des USA', '600000', '600000 Fcfa / mois - contrat long durée. ( 1 an minimum )', '3 pièces entièrement meublé au 2 em étage composer de ; un grand séjour 2 belles chambres lumineuse dont la principal autonome avec des grands placard , très  propre.\r\ndeux balcon , une belle vue\r\nUne vaste cuisine .\r\nBien situé a deux minute du 3eme pont et ambassade .', 'myapp/storage/app/public/biensphoto/GpmOtsccFO08h9676SBFPyhUwfiPkShIObsctUU4.jpg', 'myapp/storage/app/public/biensphoto/9OH2eqsUZHtTXSvYxpnAKB2ttuHx5B2X4TJOt84f.jpg', 'myapp/storage/app/public/biensphoto/eNsWtKbuiHNL8FRHEkgS7cpJy5KLY26Xqj69V5DX.jpg', 'myapp/storage/app/public/biensphoto/1yLi3EGtIw6bVjfrnHWrJdCZL6FEkLMPJDASgt1t.jpg', 'myapp/storage/app/public/biensphoto/HRmXJd8tKqpqGdAt3CTVgw0kx29pBeZaLSDLyrRE.jpg', 'myapp/storage/app/public/biensphoto/HRmXJd8tKqpqGdAt3CTVgw0kx29pBeZaLSDLyrRE.jpg', 'myapp/storage/app/public/biensphoto/G7trj7mcfFW9JBDoPIKyc4Ip7JMN142Obvsq0WRA.jpg', 'myapp/storage/app/public/biensphoto/G7trj7mcfFW9JBDoPIKyc4Ip7JMN142Obvsq0WRA.jpg', 1, '1742', '2022-08-23 01:09:21', '2022-08-23 01:09:21'),
(96, 87, 12, 9, '1', '46', '64', 'Terrain 600m2 à l\'ile boulet un', '8000000', '8.000.000 Fcfa/lot', 'Un site paradisiaque\r\nDocuments approbation disponible\r\n2 lots de 600m2 chacun disponibles à l\'île boulet', 'myapp/storage/app/public/biensphoto/7SIRXZvTKWzm846UIVKwHqgYJzfICXYQyC66Xh0g.jpg', 'myapp/storage/app/public/biensphoto/o5TrkRuKsthO9QpxPaRUEOgzVmNNS7H3NnAI3fie.jpg', 'myapp/storage/app/public/biensphoto/NEKdNUKOxFMamd7MgEuw1rYvnvgYRXTSd8vvlpSZ.jpg', 'myapp/storage/app/public/biensphoto/iZLlXMGmJ1XIFofpWUWiRLxQN7bW9tPMqP0QvwZI.jpg', 'myapp/storage/app/public/biensphoto/byxwbs6LelOp3mdRUxUdLQt5qHOdcnp5892mjrJF.jpg', 'myapp/storage/app/public/biensphoto/RW9SJswsBKGxpdYixCzy7Sye3LfnaWCaOUWjiohJ.jpg', 'myapp/storage/app/public/biensphoto/0bW1bRTlR70kkn5tuBql8S5SvnnqNM2nTvZLVc90.jpg', 'myapp/storage/app/public/biensphoto/j8FmB9UdpDoyk850yZPzlNfCBUZOH8952KgQvTOX.jpg', 0, '3528', '2022-08-23 01:20:48', '2022-08-23 01:20:48'),
(97, 33, 14, 9, '1', '3', '16', 'Duplex VVIP à Grand Bassam', '130000000', '130.000..000 FCFA à revoir', 'duplex VVIP \r\n5 pieces et un studio annexe dans la cour.\r\nsuperficie: 300 m2\r\nsuperficie habitable: 146,60 m2\r\ncuisine: 16 m2\r\ngrand salon modifiable: 32,47 m2\r\nchambre + Dwc: 16,20 m2\r\nchambre + Dwc: 16,20 m2\r\nchambre principale + dressing + Dwc: 32,60 m2\r\nstudio externe: 14,60 m2\r\ndocument: titre foncier, extrait topo...', 'myapp/storage/app/public/biensphoto/Rjy8W6FBBIYfSi30BswFEwfMqBmjyXNEbq2LeiKe.jpg', 'myapp/storage/app/public/biensphoto/0I3nc11aMnJuV1Vc7FtvXM6CIbXKEeJ7V4wxP58d.jpg', 'myapp/storage/app/public/biensphoto/FAvZrQcfrWbcp6MCe3SZqqLJBwrsDS86Ow1f0gzP.jpg', 'myapp/storage/app/public/biensphoto/S1w2CKNsK9Iyvdx5HohtdmgVpVK0m6RZpr6oLvwb.jpg', 'myapp/storage/app/public/biensphoto/sMuf6Ax4RorbNUryuhtwSIuywzmBGKo3bao6Xz3U.jpg', 'myapp/storage/app/public/biensphoto/vKSS1qWTNr4nME3ajRG67wmMYM5njvzFErD1A5rY.jpg', 'myapp/storage/app/public/biensphoto/ZqTfuoPfunQKI8yPMRPtHvElDv5fx3yTrmlIbTJM.jpg', 'myapp/storage/app/public/biensphoto/C71I25T9GLAl8XUyMsbTepgWP489dkVUTxhDVa7X.jpg', 0, '318', '2022-08-23 07:45:01', '2022-08-23 07:45:01'),
(98, 6, 8, 8, '1', '1', '15', 'Appartement 4 pièces à Cocody nouveau chu', '350000', '350.000 Fcfa/mois', 'Appartement 4 pièces comprenant :\r\nUn salon spacieux et aéré \r\nUn balcon terrasse. \r\nUne cuisine spacieuse et aéré. \r\nToilette visiteur \r\n3 chambres autonomes avec placard. \r\n\r\n1er étage.', 'myapp/storage/app/public/biensphoto/hTfRJYQUQhESWRcX8CYRu5O5MgcXHdJCZ56pWxIy.jpg', 'myapp/storage/app/public/biensphoto/NnAUhyoxtjkfEGsDcDZzY5c6kx4Op5ZgFFDtCYwu.jpg', 'myapp/storage/app/public/biensphoto/JUxnyIsJBflj8sUL24IsAmYv8bs9h0iSqTSyY7Ql.jpg', 'myapp/storage/app/public/biensphoto/GnmcF1mIieW3iX1ULsYn2MfX7MPo1JaekiNPoHLw.jpg', 'myapp/storage/app/public/biensphoto/G9rLw9mJFp2DAkkp7OQqJnrUon0b5IdLZqRcPuJG.jpg', 'myapp/storage/app/public/biensphoto/TSq0OqfuinOKLt42SCqlyFQWJQ2SGtWTwbNhgCYn.jpg', 'myapp/storage/app/public/biensphoto/1E2KCU4jeP822JazYKQWcDYXdMcJQsXvSC3TX4lE.jpg', 'myapp/storage/app/public/biensphoto/voZPmJyaXsls3Wela2mnZ6w8SSo8ZE2grj3NP6ae.jpg', 1, '833', '2022-08-23 09:11:54', '2022-08-23 09:11:54'),
(99, 33, 14, 9, '1', '3', '26', 'Duplex à Bassam Mokey ville', '95000000', '95.000.000 à revoir', 'Duplex \r\n4 pièces\r\n1 garage\r\nSuperficie : 200m2\r\nDocument : ACD', 'myapp/storage/app/public/biensphoto/Bvu0rYG5cXmIYG0XvAGTYDlr52TW3EmzgULOtFGQ.jpg', 'myapp/storage/app/public/biensphoto/huvljr98V2VrE5m2hSvy9WFyx0UU68G3GCr5suK4.jpg', 'myapp/storage/app/public/biensphoto/7ZfGfFNf0LnCnWkULjyFsejDlJ0jxTEU60YLpsU9.jpg', 'myapp/storage/app/public/biensphoto/HwDLRjaN3SLFnhNtzArKhJ7WwjLJGdeRwlEHnYOr.jpg', 'myapp/storage/app/public/biensphoto/jp6b0jn4JMfnnFlMXP9huL3TVByA89Z0gaMahxoh.jpg', 'myapp/storage/app/public/biensphoto/pcUQfSSRfw0XZC1TGY3ite6k6M9rgtIF4Qpv1Ryq.jpg', 'myapp/storage/app/public/biensphoto/DC24QRrT7lIkm567fcRaTvuFKVemKhQoc4KKnQab.jpg', 'myapp/storage/app/public/biensphoto/40AsZYyyfwT30Wal5cVsjJ5fvLaZXLk2xY2shprD.jpg', 0, '4166', '2022-08-23 10:54:07', '2022-08-23 10:54:07'),
(100, 43, 8, 8, '1', '1', '2', 'Appartement de 3 pièces à Angré CHU', '220000', '220.000 F/mois - 5 mois', 'APPARTEMENT DE TRÈS BON STANDING DE 3 PIÈCES AU 1er ÉTAGE\r\n\r\nCHAMBRE PRINCIPALE AUTONOME\r\nSALON LUMINEUX AVEC BAIE VITRÉE\r\nCUISINE MODERNE\r\nBALCON\r\nIMMEUBLE PROPRE\r\nASCENSEUR EN CONSTRUCTION \r\n\r\nLOYER: 220 mille\r\nCONDITION : 5 mois', 'myapp/storage/app/public/biensphoto/TzRPvBf34OtlhSTECrLpYTOYJETrwwK6nGma6j6G.jpg', 'myapp/storage/app/public/biensphoto/GIJp5Dqgzfs2CocdGHGkZCH8pdeomwfPbh5DeFIC.jpg', 'myapp/storage/app/public/biensphoto/Rkq7TIhA5bir6Lv6XodGJu3MWpAngIGf2zgfUpOa.jpg', 'myapp/storage/app/public/biensphoto/I4F0tXR9Ugd0hCtzBObr8L72ZRXM5Q7fAXn6F4jw.jpg', 'myapp/storage/app/public/biensphoto/GsNOaEOcMmSzEPR2gn4PtGkqvNd15rqwSRRKRlOr.jpg', 'myapp/storage/app/public/biensphoto/kkGM0SFwawU1eekl2WWFMsIuksbXuosjSa6pGHo9.jpg', 'myapp/storage/app/public/biensphoto/momodbPlEyd5lGDBDgjeLvGqH15nBSj5b2rof9pj.jpg', 'myapp/storage/app/public/biensphoto/gfWQAKAXsraFq1gdUCrZ7Pj6Fw2VtNAVYVraRJag.jpg', 1, '3004', '2022-08-23 12:25:10', '2022-08-23 12:25:10'),
(101, 74, 12, 9, '1', '1', '21', 'Lot de 600 m2 en vente à Angré château', '75000000', '75.000.000', 'La SCI OIKODOMEO met en vente un lot de 600 m² à Angré château. \r\nDocument: ACD', 'myapp/storage/app/public/biensphoto/uyhViNMEfBv22bfStI0UtOnxVNFvlFub16nvbPN6.jpg', 'myapp/storage/app/public/biensphoto/uH0N6Kme3aEFpbg75OauJ0rAVdFIYwBtTd4CsTvH.jpg', 'myapp/storage/app/public/biensphoto/ykDJyf5XzFhwSookqtZntUANEUTP7OdU7mf573vX.jpg', 'myapp/storage/app/public/biensphoto/u0UUcvBl7mByHMBKn6lrqZI7X29n3qzyGay6yjT4.jpg', 'myapp/storage/app/public/biensphoto/r18p5uFOvccjyqYP42vM5aWco3MBRaBG1vlKKAXI.jpg', 'myapp/storage/app/public/biensphoto/y2wqpi5REushrseQZLvVEl2ujdaG6gn4AIHtXF2O.mp4', 'myapp/storage/app/public/biensphoto/pRNgiHHkTsOxrAqlweqWA8UuRBrYvQax2CW3UeVK.jpg', 'myapp/storage/app/public/biensphoto/bQdFzJUkwswVeckxGrf8iKvUZrhYIGU3Ai9bD8Y4.jpg', 0, '437', '2022-08-23 12:25:24', '2022-08-23 12:25:24'),
(102, 74, 8, 8, '1', '1', '23', 'Résidence meublée de 2 pièces à Riviera Abatta nouveau goudron', '35000', '35.000/jour', 'Nous vous mettons à disposition une résidence meublée de 2 pièces dans la zone de Cocody Riviera Abatta.\r\nCommodités:\r\n- WiFi \r\n-Une cuisine entièrement équipée \r\n-Chauffe eau \r\n-Toilettes visiteurs\r\n- Petite terrasse accessible depuis la chambre', 'myapp/storage/app/public/biensphoto/nSAYY6mOdYy16ciiCUsi1h2FSC2TFYDIqEkDaZDC.jpg', 'myapp/storage/app/public/biensphoto/fKpwCk53DDNisPb4pk59KuY5VKslPYAyPyFsTsPX.jpg', 'myapp/storage/app/public/biensphoto/JzBNcVcn5RNfJdT7qMmqOL9hcGziRSqG3pcHzhCc.jpg', 'myapp/storage/app/public/biensphoto/IzhjGOyzxudfrZoHrqRfMLHR7enG8cYnfZXLeJ6n.jpg', 'myapp/storage/app/public/biensphoto/FYGcza0PEoxLINLM3wjHpoR1eLHOkwqaz87RKh3g.jpg', 'myapp/storage/app/public/biensphoto/7NxNrfogMg76SdCgwQiQpwoLhP9t7JVaNWhDMLFa.jpg', 'myapp/storage/app/public/biensphoto/SGL5OlkpZVo9fSGUhD4ZMSoHVgyjSlidxZyQSXjz.jpg', 'myapp/storage/app/public/biensphoto/Z0uRQhSyx3myKKeFy2DAqTvHM4pluzcIkZReVo6H.jpg', 0, '2794', '2022-08-23 12:40:37', '2022-08-23 12:40:37'),
(103, 34, 7, 9, '1', '8', '11', 'Maison Basse à BINGERVILLE', '45000000', 'Les prêts Bancaires  sont admis.  Apport initial  de 20%', 'villa basse 4pieces, superficie de 200m2 à 400m2. Dans une très  belle CITÉ.', 'myapp/storage/app/public/biensphoto/4KodMM2Dlm9ncl0y3sSPA18YLOOQgrpxx1S2oRae.jpg', 'myapp/storage/app/public/biensphoto/Zr1TXlpf82KAB2xpW5BumSDAZtsi4tpMPaBl5F85.jpg', 'myapp/storage/app/public/biensphoto/lK0uu2KoiRujR3tYLnhIcA1nKGGa8uNQEqh2Puvb.jpg', 'myapp/storage/app/public/biensphoto/Ih3MB9rXE3nShzVSmBpCNChpZTTb4kVaaHJciaOC.jpg', 'myapp/storage/app/public/biensphoto/XYBplrTeq08WjlHRveq86SvJCBwUmuLalkfKJlWd.jpg', 'myapp/storage/app/public/biensphoto/iMQE0X5ZXKJboSinPYtfdFDYRlgpmu0aqPMfdqTH.jpg', 'myapp/storage/app/public/biensphoto/xPXht5JSYhIyt6mabtNHXIoXbQmDH6p4fl2UWeRJ.jpg', 'myapp/storage/app/public/biensphoto/pDD92BLvfNTcXGEVvFj0yBFPVxjZMmeNovJaoYpP.jpg', 0, '1149', '2022-08-23 13:19:58', '2022-08-23 13:19:58'),
(104, 74, 12, 9, '1', '2', '119', 'Deux lots de 500 et 400 m² en vente à bonzi', '17000000', '17.000000', 'Nous mettons en vente deux lots de 500 et 400 m² à Bonzi en bordure de route. \r\nDocument: ACD\r\nNB: Ces lots sont à vendre ensemble toutefois nous restons ouvert à des propositions d\'achat séparé.', 'myapp/storage/app/public/biensphoto/WCCkfZ6lox2TnB3qpfMRp3w54gIXjF2k4HQmIY5g.jpg', 'myapp/storage/app/public/biensphoto/YFOqMl1Fe5DkV0XBNWuTlc7f7VjbbaOKCj1o6LHt.jpg', 'myapp/storage/app/public/biensphoto/o4ppAghEmbrrrdNOQ4ChmbiLSBU0JByTeh1a4mFs.jpg', 'myapp/storage/app/public/biensphoto/NuyWBKd4oxnJGaAhflqOk28LXgmewCxoIRFVxXqm.jpg', 'myapp/storage/app/public/biensphoto/6F9zvimQsYSVnR1Btx2vyYwac7Ogfpc1s9TSmERu.jpg', 'myapp/storage/app/public/biensphoto/bGmNmsbLX9zU89aOteMO5pNwOmxAfppfWncXWSyc.mp4', 'myapp/storage/app/public/biensphoto/MmOZzIAmXAeuQkMQ11Mq6r1Gk7kTlntc1JjsY53X.jpg', 'myapp/storage/app/public/biensphoto/b8JNOe0WB4EMSddYodvcN5nXJ8dN5FFOmZ0BNVnQ.jpg', 0, '517', '2022-08-23 13:25:33', '2022-08-23 13:25:33'),
(105, 74, 12, 9, '1', '2', '30', 'Trois de 844 m² en vente près de la basilique', '100000000', '100.000.000 Fcfa', 'Nous mettons en vente lots collés de 844 m² avec ACD près la Basilique. \r\nNB: ces lots sont pratiquement collés à la basilique.', 'myapp/storage/app/public/biensphoto/5c8upMhde0ySxamPmmM3FGerlbnGEqcG5BrLdGfl.jpg', 'myapp/storage/app/public/biensphoto/kPvt5VRIq5zuSf4oFK3ziXU2pm3zKC9CTRZ80TZM.jpg', 'myapp/storage/app/public/biensphoto/f6E5puQ4i6mI8u0m2Ulk2j256AJbWHg65y6T5hQE.jpg', 'myapp/storage/app/public/biensphoto/GJDPOJ2y1Q9bKPKMSp2kS0QDzh46AsvErNLVUVMH.jpg', 'myapp/storage/app/public/biensphoto/9DnXW5dtH9Ml8vEV3hGK1njaR9i60zA0ezx2EMzC.jpg', 'myapp/storage/app/public/biensphoto/mXMtUl6957fqo9yJ3gnJcyuWJlZrQdVybrZJ4zgT.jpg', 'myapp/storage/app/public/biensphoto/9TaIt5voC5WJKhiaKY0katTNDW8eVEaCu3AQSx2p.jpg', 'myapp/storage/app/public/biensphoto/62aDQkSw0PclTkTmM1p8IWlwZRAd8M6iUbgh9gL6.jpg', 0, '3622', '2022-08-23 14:03:30', '2022-08-23 14:03:30'),
(106, 74, 12, 9, '1', '2', '40', 'Deux lots collés de 650 m² à  Morofé Nklouadjo', '8499999.5', '8.500.000/ lot', 'La SCI OIKODOMEO met en vente deux lots collés de 650 m²/ lot à Morofé Nklouadjo', 'myapp/storage/app/public/biensphoto/8zCVd9JZyHY72gLgcVMiGJunr9c3TYCl2OIPFY2v.jpg', 'myapp/storage/app/public/biensphoto/xvgEx4V0WPxOmeHFk0mS1m099cXNgu5D2PJA35am.jpg', 'myapp/storage/app/public/biensphoto/QOwQ6pRtQasPQBPNHnxVEJgMFTddS4N9Df5xYMFr.jpg', 'myapp/storage/app/public/biensphoto/L9bYCPI9WeeYXi3jVb0yljVddsiVboYNN7ZMCDYF.jpg', 'myapp/storage/app/public/biensphoto/MPxSljo5xH3utacwsESZOhSXUFMeHjfw4JT8YEPR.jpg', 'myapp/storage/app/public/biensphoto/AUUUj7953KRiOK6CJyaRuLH53Hd3v5O9uzUIiSxp.jpg', 'myapp/storage/app/public/biensphoto/sL8bNCQHiOvTCQ8AidSo9SGo0S2QWam6DGcIFWYV.jpg', 'myapp/storage/app/public/biensphoto/uctF4UNxhTMWjLrm0rBBY98sIet0OBxdfVMewKgY.jpg', 0, '3439', '2022-08-23 14:15:35', '2022-08-23 14:15:35'),
(107, 74, 12, 9, '1', '2', '18', 'Des lots de 600 m² en vente à Abakro extension 2', '1499999.5', '1.500.000 Fcfa', 'Nous mettons en vente des lots de 600 m² à Abakro extension 2.\r\n• Site approuvé', 'myapp/storage/app/public/biensphoto/ucRY5gVeELF6W1NMRZuJbucMG2FLfkINbYsuBOPp.jpg', 'myapp/storage/app/public/biensphoto/LjJuLWHmjmCo7736uDcRkpwMuEgYKVL9eDggexiq.jpg', 'myapp/storage/app/public/biensphoto/XI20VO96kXF5XuugThpd0uFGx2z88QmDS8uDOzKS.jpg', 'myapp/storage/app/public/biensphoto/g5PpMmVGkGxxuCOx8IlItypqzibhiQKQYMOhI2Ja.jpg', 'myapp/storage/app/public/biensphoto/kViGa4L1NyTlftbloX1l6iKYr8PtPxIaCLbhRwgT.jpg', 'myapp/storage/app/public/biensphoto/DYFSMF3lRX6naqeizr6EKhaftpfTT5qXTegR9D9K.jpg', 'myapp/storage/app/public/biensphoto/YLDWZblC6WkXIv6VHy7va7uxlSUP0obEqAlj2pAF.jpg', 'myapp/storage/app/public/biensphoto/mQCjWICViT8V8qbCfgIOlVXXZW3P8QbUdYZ02h95.mp4', 0, '4443', '2022-08-23 14:30:17', '2022-08-23 14:30:17'),
(108, 74, 12, 9, '1', '2', '12', 'Des lots de 600 m² en vente à Sahabo', '1500000', '1500000/ lot', 'Nous mettons en vente des lots de 600 m² à Sahabo( route de bouaflé)\r\nDocument: Certificat Foncier', 'myapp/storage/app/public/biensphoto/Bgv2JHaWLeCXWZHzcDNqhdG5yWWwZiS30kIc215I.jpg', 'myapp/storage/app/public/biensphoto/3SwOSxsciTW6ZUa0ntTJf9z9LGcXdzW7kotVnXvh.jpg', 'myapp/storage/app/public/biensphoto/oaOmDEygOWyrxp2ifDZnNrSjqEuMtgPEWkyOcU79.jpg', 'myapp/storage/app/public/biensphoto/D712NkCTwPuXzEI9SEvIEZA31eorGeULsNQ1nHEQ.jpg', 'myapp/storage/app/public/biensphoto/gK1du78KRYYVcK7N4esgk9mPJEvR8EA5ZifPbmKK.jpg', 'myapp/storage/app/public/biensphoto/cBXcI42EwFLvmbGPprJrZwKRbTeWIDDGkbLVyVJR.jpg', 'myapp/storage/app/public/biensphoto/o4KQnjHYFvq3yPGrQ6eduol1yCF8xqcTxgaKbALm.mp4', 'myapp/storage/app/public/biensphoto/MV5GQLDB4VZMiJFqTFcu29ZIEBSOGe4Wls5S6DRd.jpg', 0, '4559', '2022-08-23 14:47:10', '2022-08-23 14:47:10'),
(109, 77, 12, 9, '1', '2', '35', 'Vente de terrain à Yamoussoukro zone industriellle', '8000000', '8000000 FCFA', 'Phoenix immobilier met en vente des lots sur un site viabilisé à Yamoussoukro zone industrielle.\r\nLot compris entre 700 et 1000 me avec ACD global. \r\nAttestation de cession disponible.', 'myapp/storage/app/public/biensphoto/IzlHQ6UatCRnz0829epxdSWHnIJiC6rg3hYCphpz.jpg', 'myapp/storage/app/public/biensphoto/VxEcWJnqJtsE0ndczWZu5zUkvmAPx4OoOMIbrsPZ.jpg', 'myapp/storage/app/public/biensphoto/fZhEBhMLYsjYGdj5wVKr8SeQ5usMtiBPEK4mpBf3.jpg', 'myapp/storage/app/public/biensphoto/ntDXyP8eTNiWiDj2Ad7UxskHFBAQsbzJfCwSJqDo.jpg', 'myapp/storage/app/public/biensphoto/L6nega2n1qbOLJy5K6hSmBMkMvDDO9AUpu4jFwI0.jpg', 'myapp/storage/app/public/biensphoto/Rt6qzsYX6CXRV2rxBKJwhiV9bMhciBPrR9oCnDlW.jpg', 'myapp/storage/app/public/biensphoto/USJJMJ870RzjzdB6OzRuuyMky5lRx9KpgSEjgqVJ.jpg', 'myapp/storage/app/public/biensphoto/XyAfC1kwyXdjAaxJL0zOwBrnUvslimbwAIslbA0G.jpg', 1, '4832', '2022-08-23 14:55:33', '2022-08-23 14:55:33'),
(110, 74, 12, 9, '1', '8', '86', 'Lots de 400 et 500 m² en vente à Akouai Agban Bingerville', '10000000', '10.000.000 / lot', 'Nous mettons en vente des lots de 400 et 500 m² à Akouai Agban Bingerville.\r\n• Site approuvé', 'myapp/storage/app/public/biensphoto/YRuc5zagLPjIQylJiJwbYs7svCZKm6ZimS7M2HAW.jpg', 'myapp/storage/app/public/biensphoto/V2qZJs8XRZoiZcjSNdpHb0Uv7SU4BgkIDPNK8X2b.jpg', 'myapp/storage/app/public/biensphoto/TwfLsDFgPll9FWqaNso5poAjNfT00fE70ybbpwh7.jpg', 'myapp/storage/app/public/biensphoto/IR8ygV8cM3iiPecjvJxPnf1BPbLuqkTN7RbEnagq.jpg', 'myapp/storage/app/public/biensphoto/9awnT3FgMj4PIRvyEvKsuHm15OyA4YxjoHSAdU8G.jpg', 'myapp/storage/app/public/biensphoto/ShfNRhMRBb91c69kVYdyzmoykbf7BXxPw9nr4lyj.jpg', 'myapp/storage/app/public/biensphoto/Kn9wAT695UvfGQQCxQ6x3yaUVaXtftxQtfCu33DH.jpg', 'myapp/storage/app/public/biensphoto/iUju3sj6BamDSUJc1foXqVv3ImNB2CilHttJWTB9.jpg', 0, '3729', '2022-08-23 14:58:25', '2022-08-23 14:58:25'),
(111, 74, 12, 9, '1', '3', '26', 'Lots de 500 m² en vente à Bassam', '25000000', '25.000.000/ lot', 'Nous mettons vente des lots de 500 m² à BASSAM.\r\n• Site approuvé et ACD en cours', 'myapp/storage/app/public/biensphoto/mf9yF7YGL9VBBbZMal0DqdKyVUuK54pZ9GqysLSu.jpg', 'myapp/storage/app/public/biensphoto/ORIUcRkjnSzT3sIb0M1YOLH7IAfhJzjcAFX6jHep.jpg', 'myapp/storage/app/public/biensphoto/2Y3yCaTkjASyP0SzViXgNld9vq97JxBJOAxDimRy.jpg', 'myapp/storage/app/public/biensphoto/fvVA7k7xAWwVt8infTOTNuECH3rQwheDaYKZ4xIs.jpg', 'myapp/storage/app/public/biensphoto/4DEKWbX8f03DqzcVmFFUSDaU57A5FEosDDQWh6dh.jpg', 'myapp/storage/app/public/biensphoto/1u2P6rbY7HU7YlA0yAkFhInsZBLoalh2HlTKijDO.jpg', 'myapp/storage/app/public/biensphoto/z8FedErRd6ZV2etz25ZGqq4FX7EOdfAb4p0vA8dg.mp4', 'myapp/storage/app/public/biensphoto/LQH9OEexeidHV6UzYCSxKxNHlF0ramKN5SGMPG8k.jpg', 0, '430', '2022-08-23 15:05:53', '2022-08-23 15:05:53'),
(112, 74, 12, 9, '1', '7', '25', 'Lots de 500 m² en vente à ASSINIE PK18', '17000000', '17.000000', 'Nous mettons en vente des lots de 500 m² à ASSINIE PK18 \r\n• Site approuvé', 'myapp/storage/app/public/biensphoto/TkPEb4hsmmLasxHEexhuVL8PWqbdElXtQlv1DPHZ.jpg', 'myapp/storage/app/public/biensphoto/IL4vCBcGmbm4iZ9hlNYlfVes1J82Fgf6gWS67GeN.jpg', 'myapp/storage/app/public/biensphoto/bNlulsXWODkhPZqbAC99CMV7QG7QGaK5ZBkU1VHr.jpg', 'myapp/storage/app/public/biensphoto/kNJsWgtIKegqHCLgKHEJLLYIB6klVtB3FgkOCRrp.jpg', 'myapp/storage/app/public/biensphoto/td6QDmCAJXDzyrT7oyNkQ22KPZdDBTsR2qNJnDaU.jpg', 'myapp/storage/app/public/biensphoto/aUXIDWHi6Gti8qWGCjGOwZFpKhqvzg6o0TryFG0C.jpg', 'myapp/storage/app/public/biensphoto/cTTp0Btrzk6kcu8qO9ca6bM4zMqDMiOwqIHBWijS.mp4', 'myapp/storage/app/public/biensphoto/x510CZMtefw8wZv0Kb9xdPePqKpNdiCJGFIpYurP.jpg', 0, '3857', '2022-08-23 15:18:10', '2022-08-23 15:18:10'),
(113, 34, 8, 8, '1', '1', '2', 'Angré Gestoci bel Appartement', '275000', '275.000f/mois - 5mois d\'avance', '2chambre, une cuisine, salon , douche.', 'myapp/storage/app/public/biensphoto/Mlnx5Wp9c01TZXsZkZlwCVwSCE7EXLBbmXOVu6Xa.jpg', 'myapp/storage/app/public/biensphoto/GVbVj8XGyD1hMfw8AWGqD0Yt9rNcq5o84XGQOs7j.jpg', 'myapp/storage/app/public/biensphoto/88Tcw6piv5BzmmnfF17jaJJa79gnBghMzzODGKD4.jpg', 'myapp/storage/app/public/biensphoto/BYK95Cs2subozqoCv6zGOClREOTh3mSbrZPQovIg.jpg', 'myapp/storage/app/public/biensphoto/CnuDCMi3K45S60UwZgKc7LiyXKAN4zYG5p4XHFG0.jpg', 'myapp/storage/app/public/biensphoto/RbKxjxRvBCdhC2J6foDQ3OgOafYB56VI6M6KmdG1.jpg', 'myapp/storage/app/public/biensphoto/f5P1x6eP9o0kdCT8v9CLwfM83HsEeinoRaNNeXcp.jpg', 'myapp/storage/app/public/biensphoto/VhWSONp3SsXv1puAPS8jEDUxfcHx4OQRYo2IvMOd.jpg', 1, '579', '2022-08-23 15:43:20', '2022-08-23 15:43:20'),
(114, 77, 12, 9, '1', '1', '172', 'Vente d\'un terrain avec fondation d\'un duplex', '120000000', '120000000', '*** Djorogobité\r\n1 lot de 600 m2 à l\'angle de 2 rues\r\nTitre : ACD\r\nRez-de-chaussée d\'un duplex (Permis de Construction)\r\nPrix : 120 millions FCFA', 'myapp/storage/app/public/biensphoto/zj4QAVsg3G4uQYMk5hbumisoIwaGoGIMMTmFlLaR.jpg', 'myapp/storage/app/public/biensphoto/Cl44kDH64mMZ1satFrgyIUIZ5NXEeBqUWKC7jlls.jpg', 'myapp/storage/app/public/biensphoto/SNJq0YM8M0ujjhdwXCizYE6usgv9oakDqOcNApp1.jpg', 'myapp/storage/app/public/biensphoto/C0vFBpGvgwDGgxrbv3mYsauemvYBi7rod6b55FMr.jpg', 'myapp/storage/app/public/biensphoto/8DRNBeBKbyeB2o7taESCNWITKbV0fwDGUxQQThfw.jpg', 'myapp/storage/app/public/biensphoto/45jH9JbV29d2A5l8iTAc8KeMFCkuaIo9duWd71OJ.jpg', 'myapp/storage/app/public/biensphoto/NRm7a3zsl68RL1w82y6tcFjJJ2riQJaSv1lOX6JA.jpg', 'myapp/storage/app/public/biensphoto/Iuiu6Mn7ue1CeajgjvITobTrAZFVKQ1xurofDvfi.jpg', 1, '1572', '2022-08-23 15:43:48', '2022-08-23 15:43:48'),
(115, 87, 12, 9, '1', '46', '144', 'Terrains de 500m2 à Grand-Bassam Mondoukou', '27000000', '27.000.000 Fcfa/ lot', 'Plusieurs lots de 500 m2 disponible.\r\n\r\nDocuments : ACD\r\nCoût par lot de 500 m2 : 27 millions.\r\n\r\nZone : Grand Bassam, mondoukou; en bordure de voie.. très bien situé. \r\n\r\nSite prêt à être exploiter. \r\nEau et électricité déjà disponible.', 'myapp/storage/app/public/biensphoto/ZlzlhQWgpxd2xvucwCqktTYschAfMSzR1Vbw8i4Q.jpg', 'myapp/storage/app/public/biensphoto/G5b3tgbSo9ymgZK6dZkYYmmsxMuQRYUOBB41AZKj.jpg', 'myapp/storage/app/public/biensphoto/9G9H5u9UF8qGmWUuaTJp3P2Fs61e8X0cUh7QQ1mx.jpg', 'myapp/storage/app/public/biensphoto/uRdpHhKl6vAYcBtEy3AYDWFVJJVHfSkzh6MDiXRw.jpg', 'myapp/storage/app/public/biensphoto/ZBf1dF09wThP1fUqjQzngEfHyePmtyGstG2IBwHN.jpg', 'myapp/storage/app/public/biensphoto/ZBf1dF09wThP1fUqjQzngEfHyePmtyGstG2IBwHN.jpg', 'myapp/storage/app/public/biensphoto/3tfIy0GQzgPOBMNUDLw3ty5trJS3m0zlThluCuZS.jpg', 'myapp/storage/app/public/biensphoto/Q3peraSB5ifL0qMXS8U2j8YwjToPclo5ILpGaOpR.jpg', 0, '3767', '2022-08-23 16:31:15', '2022-08-23 16:31:15'),
(116, 77, 14, 9, '1', '8', '85', 'Vente de trois duplex en bande à Bingerville à proximité de la cité Ital', '85000000', '85000000', 'À proximité de la cité Ital en vente 3 villa duplex de 5pces sur 220 m2 chacun\r\nDoc: ACD\r\nPrix: 85 millions négociable\r\nNB: route Eloka\r\nEn fonction du logiciel on avait pas d\'autres choix que Eloka.', 'myapp/storage/app/public/biensphoto/1EgDRPTL5HWuoLyfee9Rwknub5xKgUQcxiHILsPy.jpg', 'myapp/storage/app/public/biensphoto/nvKuak5jWyh0ER3hwmsidLKB7WqNr7gH76kaqmzW.jpg', 'myapp/storage/app/public/biensphoto/lIkP8w5AQJFGQYE6nPz7scDIIxQWZFsUDxeIEmIn.jpg', 'myapp/storage/app/public/biensphoto/n6weqhOhCecd4OtNgbHhoCZCsCugrKy8iMXeLA3q.jpg', 'myapp/storage/app/public/biensphoto/QVLZtX6evKpGLzbydxKRbfWkctb9R0xXvYHM0gtn.jpg', 'myapp/storage/app/public/biensphoto/jt29W9TY3KtoksEpuwDwxsZkQpJZvnRHAmY25sT9.jpg', 'myapp/storage/app/public/biensphoto/61zWmqfyPzLYBgqwLlwAEhDhWvZbNsk0qpPtOiBj.jpg', 'myapp/storage/app/public/biensphoto/hUNcbPPQiQeFN4O2XVtZrj4QABMFTJOrZPvCrB3k.jpg', 1, '251', '2022-08-23 16:42:38', '2022-08-23 16:42:38'),
(117, 79, 12, 9, '1', '8', '86', '18 Lots de 500m2 coller à  BINGERVILLE  - ADJIN Palmeraie 1et extension', '9000000', '500m2 / 9 000 000 fcfa', '18 Lots collés de 500m2 disponibles actuellement. \r\n500m2/9M\r\nDOCUMENTS : CERTIFICAT FONCIER/ Attestation COUTUMIÈRE', 'myapp/storage/app/public/biensphoto/dyO65hInT4PxXnPpyhxQaaYWioCWnd21ltgU0nAT.jpg', 'myapp/storage/app/public/biensphoto/VcGNFF7G86ggzpuIOgxmDvFO8Jw47wRBR19js5wB.jpg', 'myapp/storage/app/public/biensphoto/tiWmYk3eXeVTOiP615WDRHcpUDjysZJllMFPR91M.jpg', 'myapp/storage/app/public/biensphoto/HenxTbMeGc9JQ6JVDoXWwjSFXwh3aK3rWEhRZJkY.jpg', 'myapp/storage/app/public/biensphoto/LDtUjg3bQolU9ti3CfPyUZAhNB8TNEVYod8yOgGn.jpg', 'myapp/storage/app/public/biensphoto/7pBK0bPg5RR5aj0PXcnnwAMBLEFzLk4wsPHxci8t.jpg', 'myapp/storage/app/public/biensphoto/xTHdHi11I1PYDeTkLNZc0XQMkKYJyPmt7BTtLDha.jpg', 'myapp/storage/app/public/biensphoto/oiP4BO9rYk5zSn8rSuSHoPatCbkeg2YAs44y5vkm.jpg', 1, '2279', '2022-08-24 11:53:18', '2022-08-24 11:53:18'),
(118, 19, 12, 9, '1', '3', '26', 'Terrain disponible à Grand-Bassam Mondoukou', '28000000', '28000000', 'Opportunité Immobilière\r\n\r\nPlusieurs lots de 500 m² disponibles à bassam - mondoukou zone en bordure de voie.\r\n Document : ACD\r\nCoût par lot de 500 m²\r\nSite prêt à être exploité : eau et électricité déjà disponibles.', 'myapp/storage/app/public/biensphoto/TGzPontCi5I8YEng7ZHYVPwajb0sxLDvpxyBYXVC.jpg', 'myapp/storage/app/public/biensphoto/O6Jtz2rcxxw7LBkpHvz50ZBDjBYrF5aXIDC2S29X.jpg', 'myapp/storage/app/public/biensphoto/MsLRORUaRX0uicxCE8hDpLsi0M082IcQbViARxLG.jpg', 'myapp/storage/app/public/biensphoto/ulcWs3Ddx2vvqZEoyCe6YlLnO8JLC6QDoVKg53t5.jpg', 'myapp/storage/app/public/biensphoto/bDSD5ohp0JUvrtJTTvV24IruxHMylbzF2JVCQT15.jpg', 'myapp/storage/app/public/biensphoto/eF0cT0WVGa0bIX15YFNHSXv9bXCNBQoG89eeRqYg.jpg', 'myapp/storage/app/public/biensphoto/2fAC5TgsM8VeRG8uPbbrboY91IloDjXsS6G3ZCSd.jpg', 'myapp/storage/app/public/biensphoto/U4HDty6VwhqPJENSn6tYyYSo2A3wH99LKOua9xQ6.jpg', 1, '364', '2022-08-24 22:14:11', '2022-08-24 22:14:11'),
(119, 84, 12, 9, '1', '4', '27', '20 lots disponibles', '2500000', 'offre spéciale sur projet futurist à Jacqueville, approbation déjà disponible, mais chantier en cours, les lettres seront disponibles dans un délai de 12 mois.\r\nLes lots seront livrés décapés\r\nCoût 2.500.000f pour un lot valeur après travaux 25 à 35 millions \r\nDépêchez-vous plus que 20 lots disponibles', 'Ce site abritera la ville nouvelle, avec une cité administrative, une cité résidentielle et des logements sociaux, un stade et pleins d\'autres infrastructures.', 'myapp/storage/app/public/biensphoto/XMNv4x1hubITduWN3Ptb1Wg4C90X8YBKHUFwqt6P.png', 'myapp/storage/app/public/biensphoto/DZWG3M46eQTND5yOQx1h2FzO5UeyFSOzF0A6FSdS.png', 'myapp/storage/app/public/biensphoto/kWsHHRtOxm8ef6L1y9yAdtn63mhULTEGPpr9MwAe.png', 'myapp/storage/app/public/biensphoto/BcGJzFeW6DcOTlSGHHnO0n1htgYgStVh6pgQr6A6.png', 'myapp/storage/app/public/biensphoto/usPJ7MTBYuhuCGisw8x0LnHDT46gmcXzfF6D6Jn9.png', 'myapp/storage/app/public/biensphoto/riLewfBRN8GJSrLWj2WQs12rVE7sPpv9GlYXNquA.png', 'myapp/storage/app/public/biensphoto/HNFB58T6mkzCFviVYsbQTbPssOiG6uUjoiQCiPAJ.png', 'myapp/storage/app/public/biensphoto/8vQi06rhr8sSrRGfNntYoe7IsHY6LNniR2XoZWXn.png', 1, '3881', '2022-08-25 09:45:59', '2022-08-25 09:45:59'),
(120, 87, 12, 9, '1', '8', '192', 'Terrain à Bingerville 750M2', '150000000', '150.000.000 Fcfa', '750m2 sur les documents mais en réalité 1000 ACD', 'myapp/storage/app/public/biensphoto/TLWodleAleYeEBc9kFdPUrvA3sF25YcjTyuyKJJ0.jpg', 'myapp/storage/app/public/biensphoto/EEBipbFT9Fn9ioQ4hlhzbNsv97S9TA29CjWh15Hd.jpg', 'myapp/storage/app/public/biensphoto/2K5j379RMa8geSNIYHjRxzxy3d3Ph6D7fmjg4vTN.jpg', 'myapp/storage/app/public/biensphoto/GOpBXLTVVX1gkzpbAwWxOzFhmascdhpLspuGIZyS.jpg', 'myapp/storage/app/public/biensphoto/eAZEJBBlnyRmBrGRVseDztaasYltUTdeOX7gqavl.jpg', 'myapp/storage/app/public/biensphoto/eAZEJBBlnyRmBrGRVseDztaasYltUTdeOX7gqavl.jpg', 'myapp/storage/app/public/biensphoto/6e45Ps44EI13YXM9tnxJ65D7yE5VJzQN7cC78fYt.jpg', 'myapp/storage/app/public/biensphoto/6e45Ps44EI13YXM9tnxJ65D7yE5VJzQN7cC78fYt.jpg', 0, '485', '2022-08-25 10:40:40', '2022-08-25 10:40:40'),
(121, 39, 12, 9, '1', '1', '170', 'Terrain à vendre', '600000000', 'Un terrain de 2200 M2 avec acd avec des bâtiments dessus inachevé au prix de 600millions à débattre', 'Un terrain de 2200 M2 avec acd avec des bâtiments dessus inachevé au prix de 600millions à débattre', 'myapp/storage/app/public/biensphoto/vbKOFV8VA4sGrkhiw5tspyUaIxM688jUuHAFUuLr.jpg', 'myapp/storage/app/public/biensphoto/62suJCmgZC6whNpJmgSy4FWlZ9BIDakzQtqRiPTM.jpg', 'myapp/storage/app/public/biensphoto/5nZBoru2uxeUvbnmUomZ8A6s5AknngYYoWk6hvSv.jpg', 'myapp/storage/app/public/biensphoto/rqWHGwV5BiAM58bnnJ2HlJZBQ9HQ3572WJHmSebC.jpg', 'myapp/storage/app/public/biensphoto/DEu0Tuk0Wu3sh3IHVy0TMvvTJC4Qnq5C2IxcCxSa.jpg', 'myapp/storage/app/public/biensphoto/dhyYCkC8CvaXRmOP9FeeL2rCxdiNGcjRKMehQPES.jpg', 'myapp/storage/app/public/biensphoto/vZ4PjiaMpA84Ji0JzegQL2JPp5VN71qTOGVfZEfE.jpg', 'myapp/storage/app/public/biensphoto/oRpiakKqjr1pgCPDjSFpgN3ocYrLvHpflNVXTXzr.jpg', 0, '2177', '2022-08-25 15:00:56', '2022-08-25 15:00:56'),
(122, 39, 7, 8, '1', '1', '166', 'Location villa 4pieces +3dep avec garage, loyer 600millex5 ,zone Angré cité star 5 en bordure de voie', '600000', '600000/5 mois', 'Location villa 4pieces +3dep avec garage, loyer 600millex5 ,zone Angré cité star 5 en bordure de voie', 'myapp/storage/app/public/biensphoto/2NcRY0GLi4Ho0AOlSCWStIIaRXWXBsrUC8YBaJvs.jpg', 'myapp/storage/app/public/biensphoto/h74ePQV5vNQejBSTgBYTgwrdjEj4gOO5bhlRNMvX.jpg', 'myapp/storage/app/public/biensphoto/D1zk9Xc8JHmb5iqsbhD5pqF3dIVmaQ0LQcg1Lj3c.jpg', 'myapp/storage/app/public/biensphoto/QwKk3OAjKOEih1TMgqRwKvwnqyjls72TD2twRYo3.jpg', 'myapp/storage/app/public/biensphoto/0hg8xXlOEuIpUWGCo52QSDv0agZdpRpEtrbUoJrr.jpg', 'myapp/storage/app/public/biensphoto/rXJNVBgmHdTXtRgqL3VzXukCUH2j3pgptVtf8hUL.jpg', 'myapp/storage/app/public/biensphoto/an3VAvNipWsc2ucwyozFlFt6d0fB2zpNfKMjliit.jpg', 'myapp/storage/app/public/biensphoto/UaZortmFxbAzvnm2lJn5to6giQp1xvCMFxk9xqXS.jpg', 0, '34', '2022-08-25 15:19:58', '2022-08-25 15:19:58'),
(123, 39, 8, 8, '1', '1', '166', 'Angré nouveau CHU 3 pièces', '300000', '300000/ 5 mois', 'Angré nouveau CHU 3 pièces', 'myapp/storage/app/public/biensphoto/51KWzmcZMNhpGJ1wf9pMPxsKlDJNmIcS2DArfYI7.jpg', 'myapp/storage/app/public/biensphoto/TFevhwuG8NM7hS88FNu1S6nc0T80aZ97kBVSfAcJ.jpg', 'myapp/storage/app/public/biensphoto/mSnZI2dhu2KyxWLtIpkD3DMWCOzCJM7uXIaP9zEq.jpg', 'myapp/storage/app/public/biensphoto/czz5MUJ4guaoEnOhyMPysqDvYE3ep9pjXxXwoSBq.jpg', 'myapp/storage/app/public/biensphoto/SYAzEzXWAdFKGGAS8fmrOEparbZvDWUfb2QIedmk.jpg', 'myapp/storage/app/public/biensphoto/07yclPDDxQkbTDT3H6UTniCA8ZcfRuL8WPJiuLtA.jpg', 'myapp/storage/app/public/biensphoto/icIa9CuKe5quekPlGIZGaNqPs3GpwdYnTlSXJXpR.jpg', 'myapp/storage/app/public/biensphoto/H9MmEEfkeGk5MfCOgikNqadDfjVBM4V9kMYqrvXY.jpg', 0, '358', '2022-08-25 15:45:06', '2022-08-25 15:45:06'),
(124, 79, 8, 8, '1', '1', '7', '3 pieces de Maison baillée à  Yopougon', '110000', '110 000f/mois', 'Besoin urgent de Maison baillée 3 pièces pour gendarme \r\nZone : YOPOUGON \r\nTaux de bail : 110 000f', 'myapp/storage/app/public/biensphoto/8vYE3etE2zF5tC70HRmpYQWwvfVepDlasrNlhwmB.jpg', 'myapp/storage/app/public/biensphoto/G7jKw4FVHNPxQ4ihzSvtZ2Frpzq4JUiu3GpfLkbq.jpg', 'myapp/storage/app/public/biensphoto/nGiiPxdxZMDRLmWamSl10wu7KRwcSjlcs7dr6eqQ.jpg', 'myapp/storage/app/public/biensphoto/6hMvt0RIUdyOOseC4e0AYm0vOsmj0fhyZqPALEoR.jpg', 'myapp/storage/app/public/biensphoto/lyyJKi7wPo7QUR2lumB6SVGDTm0Sy5sPMs3qb4o8.jpg', 'myapp/storage/app/public/biensphoto/e1Yl7y8psEGrlfTfxYlRH6gwDM609S0M9FhbCe1x.jpg', 'myapp/storage/app/public/biensphoto/nUiHTsKEyRg3SpQ3RL8PqMTncZdcVyrLUgzeAeON.jpg', 'myapp/storage/app/public/biensphoto/hFVYmCBRjyBn0WBHcxrPU6hOa1QzWvjX6s6c0ISo.jpg', 1, '1818', '2022-08-25 16:34:52', '2022-08-25 16:34:52'),
(125, 87, 11, 9, '1', '1', '2', '54 Villas duplex 3 | 4 | 5 pièces à Angré 12e tranches', '14000000', '14.000.000  à  35.000.000 Fcfa', 'Villa basse de 3 pièces :\r\nSuperficie :150m2\r\nPrix :14 millions\r\nDocuments acd global \r\nVilla duplex 4 pièces :\r\nSuperficie :200m2\r\nPrix :30 millions\r\nDocuments : acd global\r\nVilla duplex 5 pièces\r\nSuperficie :250m2\r\nPrix :35 millions\r\nDocuments : acd global\r\nNb: \r\nNombre de maison disponibles :\r\n-26 duplex de 4 pièces \r\n-10 duplex de 5 pièces \r\n-18 villa de 3 pièces \r\nD\'autre villa sont en cours de construction. \r\n\r\n2-Conditions d\'acquisition \r\nFrais de souscription 250.000f chez l\'opérateur \r\n-Paiement chez le notaire appuyé par une facture délivré par l\'agence.\r\n-attribution de lot (numéro de maison)\r\n-finition des travaux et remise de clé', 'myapp/storage/app/public/biensphoto/VZCzBKQHFc3FqNeMz4r2OZAs9N7Mn6pQy60U8gy7.jpg', 'myapp/storage/app/public/biensphoto/LdJfO6bbJYy2kNaELFHccVFobwrwnBif149pwejh.jpg', 'myapp/storage/app/public/biensphoto/MZLCEsk21016ph6lYVEPanMV5DP8jLX8hgsKNT23.jpg', 'myapp/storage/app/public/biensphoto/QFie4Afhg7m2A2WxhEvCDlI3xemEEdcECRxu8Zw7.jpg', 'myapp/storage/app/public/biensphoto/yuv37N97ywrjwa56efx08SysSUwUks8LPjfW0qOn.jpg', 'myapp/storage/app/public/biensphoto/CVLNK1B1E9hUusjItjFT5Rk4W99CHDZJBl7vES4Q.jpg', 'myapp/storage/app/public/biensphoto/uP6SulDImcWZ6B8xXADTbUW4COrTtuIKUoTgyQq9.jpg', 'myapp/storage/app/public/biensphoto/I73R5DkHCr3QMTl0BjuOAnu4QtcyosHA2XdSUxxg.jpg', 0, '441', '2022-08-25 16:46:24', '2022-08-25 16:46:24'),
(126, 85, 7, 9, '1', '1', '23', 'ACD', '500000000', 'Coût : 500 millions à débattre', 'Une maison de 5pieces, sur une superficie de 500m2, un garage', 'myapp/storage/app/public/biensphoto/TJ6wmQKNtwi1GN23fmccrfgR6YOFDr0AiGqFKsz8.jpg', 'myapp/storage/app/public/biensphoto/hGQPj36mohzVn6EbGshdjh3jsxTNfZcq2DVLIlrW.jpg', 'myapp/storage/app/public/biensphoto/VXCmRpx5CV2jQF35KmCGSiNSWg7d7geQgtfKLBV5.jpg', 'myapp/storage/app/public/biensphoto/9HqzMi9qwjBPT6cRWysJoNWzbjEhNbEKIIcMNsnr.jpg', 'myapp/storage/app/public/biensphoto/od4gRqSKK3R5NH6EkL0cibyKyeWiQeS3e9JiCXuC.jpg', 'myapp/storage/app/public/biensphoto/sL33ijAoHwcg60UfUq7tYn1eMrf2TP1lch8sJtKE.jpg', 'myapp/storage/app/public/biensphoto/O3oJGT1AUoupKZtqSnk0jYA3YIO2fjdD2PPQuxae.jpg', 'myapp/storage/app/public/biensphoto/nEQnBRy4Z2FNxvxizF8xashwVy0TChirhQ11ItBA.jpg', 0, '2521', '2022-08-26 13:31:17', '2022-08-26 13:31:17'),
(127, 34, 12, 9, '1', '3', '26', '1000m2 à  BASSAM MOTOBÉ', '22000000.2', 'Paiement cash de 2,2milion', 'Un site Agréable  à  BASSAM MOTOBÉ,  préfinancement  de lotissement sur 15mois.', 'myapp/storage/app/public/biensphoto/c7u6eBq2T6jL65JrbaTn1GFIorB0K3MjpAzLYCbJ.jpg', 'myapp/storage/app/public/biensphoto/XIEUKq9fnrjri9hokLnZkLgyOxw3g3UYy0enggM0.jpg', 'myapp/storage/app/public/biensphoto/9g9YIWYZmEVLIZlDNITqg8E0RRBMxeeFweto9GiT.jpg', 'myapp/storage/app/public/biensphoto/1hbjwySz0lmXHArt9Gq608LHU05QJaIkb55XX493.jpg', 'myapp/storage/app/public/biensphoto/C3T9C5kXgJIihBjA4RNVH717MyCky80tHhzgsIHS.jpg', 'myapp/storage/app/public/biensphoto/4DHbmy71pEElys4KhxeHcolh6yb6IV9LmA55Qg0Y.jpg', 'myapp/storage/app/public/biensphoto/ez4opS2w0MMfa7AAnSa03hIqhqxDNvyQtJiA7tmI.jpg', 'myapp/storage/app/public/biensphoto/d0e5VCjWJrft3CGmMOGQKfX146VFw4cSDqGQJSTv.jpg', 1, '2363', '2022-08-26 14:08:51', '2022-08-26 14:08:51'),
(128, 6, 11, 8, '1', '1', '176', 'Villa basse 5 pièces à Bonoumin', '500000', '500.000 Fcfa/mois', 'Riviera bonoumin cité presse en bordure de Grande voie \r\nVilla basse 5pieces et 2dependances avec garage très bon pour bureau\r\nLoyer 500mil \r\nCond 221\r\nNb:  il y a des travaux', 'myapp/storage/app/public/biensphoto/4z5iTpNMwjZIwztvUX82IfkxzPlhY89c98NOSy8r.jpg', 'myapp/storage/app/public/biensphoto/VAkOSdGUivfzVOCJ2QsycjymY25dehm63vMcDn3i.jpg', 'myapp/storage/app/public/biensphoto/OHJggrksRpuYkDR5RLkm5xKJTiKClf8xlgcmtg62.jpg', 'myapp/storage/app/public/biensphoto/Ly1KLq0YysUkmL9piBSiuI6799b2cD3c2Rmi3ZOY.jpg', 'myapp/storage/app/public/biensphoto/WdOqtWxPABeCT3ktuq5LYcgQWra88spXbNNpztTm.jpg', 'myapp/storage/app/public/biensphoto/ooNvFWQBbNnisyR0Hp2yO5spgXiqUyqnexVSEgOX.jpg', 'myapp/storage/app/public/biensphoto/G3Auvuy1qIZn8OPnjEO5o6VddxYH98TvQQQuMkI2.jpg', 'myapp/storage/app/public/biensphoto/NaHwc5GvnWsFn3vqn6oZbUnITs8orl4Kjx5zae9N.jpg', 1, '4578', '2022-08-27 23:07:54', '2022-08-27 23:07:54'),
(129, 87, 8, 9, '1', '1', '2', 'appartement de 4 pièces à Angré 7e tranche', '90000000', '90.000.000 Fcfa à débattre', 'Vente d\' un appartement de 4 pièces prêt habiter avec un ascenseur situé à la 7 ème tranche dans un beau  bâtiment. \r\nNB= visite possible à tout moment.', 'myapp/storage/app/public/biensphoto/FPZPTPwJivIE5vCYI3pbeG4JXkTbmwxRx9imqfvI.jpg', 'myapp/storage/app/public/biensphoto/FT64DT06abuqcH36fL6Selg6pzS1Za0GDCnxULoC.jpg', 'myapp/storage/app/public/biensphoto/TZwTURYDli0z7EtsR1fma8ehUewp7wQVLARSwzoL.jpg', 'myapp/storage/app/public/biensphoto/8famQNioqKrSPtDQBKi7syFl6wHfz3nKyvbmnEp5.jpg', 'myapp/storage/app/public/biensphoto/NjzAr3iLkDsG9itgxmJlsi4sI5piH4SgkgaCW2te.jpg', 'myapp/storage/app/public/biensphoto/c44kQsaiXRpJUVjCU45a7pfCIDeO6ZQ3h82Vfzn1.jpg', 'myapp/storage/app/public/biensphoto/S3X80lIXeL8qLTv5QfgKwUosNjSlytiMGJSA8pIX.jpg', 'myapp/storage/app/public/biensphoto/Vqaaskcf3qEVDtwy8ibBbCL0gJ7ZQvS3DBmw8EqQ.jpg', 0, '3204', '2022-08-27 23:15:09', '2022-08-27 23:15:09'),
(130, 21, 7, 8, '2', '65', '89', 'Maison au Plateau de 15 ans', '300000', '350.000 FCFA/mois - 3 mois de caution', '2 chambres, salon, cuisine, salle à manger, une douche interne, véranda, climatisation, chauffe eau, bâche à eau, surpresseur, guérite, toilette externe des visiteurs, parking.', 'myapp/storage/app/public/biensphoto/FtArY6IN82cE1zGsHcIhgQjPHV1aMghmrHCQeJEE.jpg', 'myapp/storage/app/public/biensphoto/J0kLjEhhYsiYb5cShulyf8h5HVSMI8yLltblBPoj.jpg', 'myapp/storage/app/public/biensphoto/U0cHOKqWQu7BCfgmfxCrYWfbltIVIr2x2v3jx7D4.jpg', 'myapp/storage/app/public/biensphoto/MJZR5oLRWjH2fkcRPw3A2FRl8N451LtAwKdIEA4e.jpg', 'myapp/storage/app/public/biensphoto/bxMshFx6w4cxkLITMY9bYPZKt3WVYVTtU0sxkBdf.jpg', 'myapp/storage/app/public/biensphoto/pkA4CJt78x7YpbuUdwILdRIxSRVBbFmktHs6ZXoG.jpg', 'myapp/storage/app/public/biensphoto/QXMxD3Cci0rVLfctxG4CDRvNq249emLeArZiB5ye.jpg', 'myapp/storage/app/public/biensphoto/YaA8r9pZCPVL90B0j998YjaF5z8z0oywc76sYf4Y.jpg', 1, '4236', '2022-08-28 02:40:18', '2022-08-28 02:40:18'),
(131, 89, 14, 9, '1', '1', '4', '1 cour située à  proximité  du VGE derrière  AZALAÏ composée d\'un R+1 de 6 pièces  avec salle d\'eau  et 1 pavillon de 5 pièces   1 grand garage  sur près  de 500 m2 Avec ACD  210 millions à débattre', '210000000', '1 cour située à  proximité  du VGE derrière  AZALAÏ composée d\'un R+1 de 6 pièces  avec salle d\'eau  et 1 pavillon de 5 pièces   1 grand garage  sur près  de 500 m2 Avec ACD  210 millions à débattre', 'COMMISSION 5/100 POUR LES APPORTEURS', 'myapp/storage/app/public/biensphoto/IRDx2fg5wXWMEADR4uO7IUF2Qn17KNhJuYcrINlC.jpg', 'myapp/storage/app/public/biensphoto/f3S6JB6gvn9tvMCFauuKyuvCcpjyYdzSus2dKfVu.jpg', 'myapp/storage/app/public/biensphoto/ho4dGGjfb0YHkepVFkUQZKfE1F6qEfhdQDaQdLMz.jpg', 'myapp/storage/app/public/biensphoto/Pc09hDdqs0aW01xMoiUgxg6Iess44pf5vILlsZOk.jpg', 'myapp/storage/app/public/biensphoto/WtPWSB8gU9UmUgrfnVOEzC4BOk2ZjZvsjOOTYubP.jpg', 'myapp/storage/app/public/biensphoto/fL60vuAvfAoLukOvBp9FvBIqROd3SCJNEr9pSOvG.jpg', 'myapp/storage/app/public/biensphoto/wt82QsK3lQ6vHXZGyxL2GAtU3e2HbhSGEf2U4YY3.jpg', 'myapp/storage/app/public/biensphoto/xdJrsD5LR70SGjrMpaF16B4cLO0KvSuwRbitKFXR.jpg', 0, '1565', '2022-08-30 19:07:12', '2022-08-30 19:07:12'),
(132, 34, 12, 9, '1', '15', '50', '500m2 à  Azaguié', '1775000', 'réservation de 500mille et le mois suivant  le paiement  du montant  restant.', 'Azaguié Beau site d\'environ 8ha pour tous vos projets  immobiliers.', 'myapp/storage/app/public/biensphoto/csRc3a8zQdPy5rJhN18jEo7KHAdRFLcvrDjcUv0l.jpg', 'myapp/storage/app/public/biensphoto/soDACKk3HpzebQ7SqagQn5uK2xHcsrnZAcGqDaUy.jpg', 'myapp/storage/app/public/biensphoto/udFRr5Stvt5jBEFlyXp64LJH2qh4qDj3kfx4V2vR.jpg', 'myapp/storage/app/public/biensphoto/6NtopEN0t4Svf8BXJolyoEbmLC64HWVxxLQVOZQz.jpg', 'myapp/storage/app/public/biensphoto/vTzO166tlIdvPMN7TgTzKiZUAvLvt53xMOsiL1Mx.jpg', 'myapp/storage/app/public/biensphoto/w9U6Ti8EZqmuScmNt6GYZMyrPXivoHxSeTkHEL8g.jpg', 'myapp/storage/app/public/biensphoto/NHjQa7LnRtDQLhSoXyZyneRQI6c8jGrcjgW8JFfP.jpg', 'myapp/storage/app/public/biensphoto/8a6hBh147O1b1I9nBBltiLhT0ycAWdoT5Muht6hw.jpg', 1, '2030', '2022-08-31 10:51:23', '2022-08-31 10:51:23'),
(133, 87, 12, 9, '1', '7', '195', 'Terrain à Assinie derrière la gare 1650m2', '260000000', '260.000.000 Fcfa', 'Belle opportunité', 'myapp/storage/app/public/biensphoto/KGXCkYlLR0QnefpfQk8RJLuWaXkdWKp0DbpTYqUn.jpg', 'myapp/storage/app/public/biensphoto/uOnbNaUhpzURdMy4xmQJ4aJS1bBXH6hNSq1uKAfI.jpg', 'myapp/storage/app/public/biensphoto/l8ytoHCT3yPAYYimxAQDoSAJIrsm28j1fbNR60M8.jpg', 'myapp/storage/app/public/biensphoto/QNHyemf3lnF09f1fiPBIBoPA53jVB2LN87FEcqCW.jpg', 'myapp/storage/app/public/biensphoto/YhZaZ480AjkvmPg8VTJXoSvkoYlt4QPNtigQb9fp.jpg', 'myapp/storage/app/public/biensphoto/fabibY9wrdT1CaQfeO0fAlnuFwIbSkgbgXyIOcEY.jpg', 'myapp/storage/app/public/biensphoto/gPG6Jkgt8hDDnHHhslV9EX8ZTUIZXynzhLaIdEEX.jpg', 'myapp/storage/app/public/biensphoto/gPG6Jkgt8hDDnHHhslV9EX8ZTUIZXynzhLaIdEEX.jpg', 0, '2586', '2022-08-31 11:43:32', '2022-08-31 11:43:32'),
(134, 85, 8, 8, '1', '1', '23', 'Appartement 4pièces à après barrage espace triangle', '40000000', '2mois avances, 2mois cautions, 1mois agences', '1 grand salon, 3 chambres, une douche WC invité.', 'myapp/storage/app/public/biensphoto/akA5FxLBupeAFvXqQ1XHG1kC4mXcymv1pHfIddCq.jpg', 'myapp/storage/app/public/biensphoto/NAUWErSjaFjudlTTJZ0jELz8QJY2PeNEMyPie5ZI.jpg', 'myapp/storage/app/public/biensphoto/A7bNgxKI3ppD9S2AcmKzp3UcgLPm7AKR1c751QIO.jpg', 'myapp/storage/app/public/biensphoto/UAg0PtGk7y2MpHixPgGbC7EN15tuEqq2jAGgUdFG.jpg', 'myapp/storage/app/public/biensphoto/vAcdd6YqjiHBAiMo7ARSd8Z6cMSmAVXj3bIStqGp.jpg', 'myapp/storage/app/public/biensphoto/HP0YiFPbrWB7HOuYIRZODZk4vXGkFiitBl3GcanQ.jpg', 'myapp/storage/app/public/biensphoto/sBe4cs3JvovFMYPGLG1yq2wISQSIfa3FKuTOq4k8.jpg', 'myapp/storage/app/public/biensphoto/an1OsMjQFcVlOlXE4ZOwUCUAsv0n4smxhPQHnqs3.jpg', 0, '2191', '2022-08-31 18:52:34', '2022-08-31 18:52:34'),
(135, 87, 11, 9, '1', '1', '2', 'Une belle villa duplex de 5 pièces à abata', '150000000', '150.000.000 Fcfa', 'Une villa duplex de 5 pièces avec un jardin garage de 3 véhicules superficie 385m2 avec ACD prix de vente 150millions très belle maison la voie d\'abata prêt habité', 'myapp/storage/app/public/biensphoto/TGXLINLFq5eIT6xki9xYTstvM6hXh5BdN2a9DIww.jpg', 'myapp/storage/app/public/biensphoto/4H15p0n1OiOfWW8Bov7tmv9730cAllv1OnG143uR.jpg', 'myapp/storage/app/public/biensphoto/us4LYkyZTzadJAXqvVvr3nX9k3XhKHadtsCVbz1q.jpg', 'myapp/storage/app/public/biensphoto/8lshIcc0vQAWHRaEuRUFATItwIDfpU4cAC76VpVi.jpg', 'myapp/storage/app/public/biensphoto/UwgXh0Abs9aHIPgJUdRojvBBF11CZgY6JPRhh9om.jpg', 'myapp/storage/app/public/biensphoto/UwgXh0Abs9aHIPgJUdRojvBBF11CZgY6JPRhh9om.jpg', 'myapp/storage/app/public/biensphoto/16WheQBMQogMll4vOGigu0DX9plswzCVjJPuSbR2.jpg', 'myapp/storage/app/public/biensphoto/16WheQBMQogMll4vOGigu0DX9plswzCVjJPuSbR2.jpg', 0, '4170', '2022-08-31 21:34:59', '2022-08-31 21:34:59'),
(136, 87, 12, 9, '1', '46', '196', 'Terrain à Grand Bassam 2400m2', '175000000', '175.000.000 Fcfa', '2400 m2 déjà clôturer, avec document disponible un acd , en bordure de voie , zone déjà habiter idéal pour tout .( immeuble , école , hôtel , résidence , clinique ect......)quartier situer entre l\'ancienne voie et l\'autoroute .( espoir) visite possible sur rdv .    Direct avec cabinet.\r\nprix 175  millions négociable /.', 'myapp/storage/app/public/biensphoto/jxNGUiyre0pZLZ5LqnE1XbwTgKdskLJPTP7KQ3cJ.jpg', 'myapp/storage/app/public/biensphoto/XpCCZoN0USokKXKS3sKEYkiioWYDaqVcS9gYJwJ1.jpg', 'myapp/storage/app/public/biensphoto/MKmx3e4uxFufqAYqyntW4JsJ8phaNYVzH9ZzQuDu.jpg', 'myapp/storage/app/public/biensphoto/lEMz3bfsd92tIU8r929vinnUPo3rUa2v4y5KxEXU.jpg', 'myapp/storage/app/public/biensphoto/4GfmtcCtR7G09jkOAgeezEIsnIyd7nWQXTtK2oYQ.jpg', 'myapp/storage/app/public/biensphoto/4GfmtcCtR7G09jkOAgeezEIsnIyd7nWQXTtK2oYQ.jpg', 'myapp/storage/app/public/biensphoto/m35uLZjgMPBGLpb86BVCqNZIxZWHHf99YQWhOHLL.jpg', 'myapp/storage/app/public/biensphoto/m35uLZjgMPBGLpb86BVCqNZIxZWHHf99YQWhOHLL.jpg', 0, '714', '2022-08-31 21:49:44', '2022-08-31 21:49:44');
INSERT INTO `biens` (`idbiens`, `gerants_idgerant`, `typesbiens_idtypes`, `typesoperations_idtypesoperations`, `pays`, `villes`, `quartier`, `libele`, `prix`, `resume`, `descript`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `statut`, `codebiens`, `created_at`, `updated_at`) VALUES
(137, 91, 14, 9, '1', '1', '172', 'Duplex de 4 pièces angré nouveau chu', '55000000', 'Paiement cash,  tout les documents sont chez le notaire', 'Duplex de 4 pièces dont un salon, une chambre en bas,  deux chambres en haut, une cuisine,  un garage', 'myapp/storage/app/public/biensphoto/m5cO0S6aRHnCtjDFz7ITIJ4E4uXxmByhQkHhQ0AG.jpg', 'myapp/storage/app/public/biensphoto/Qz4ZXScnRK9YPMWj8RHh5Sv2dCyxOAy92mTihg6N.jpg', 'myapp/storage/app/public/biensphoto/jWzku1ti0uyCHd59qBLAoaoiUCBvJdVW5C2Bxlrc.jpg', 'myapp/storage/app/public/biensphoto/8eE5YcjlooyZ4ZjrNDPs1zjz3XobXqSgQQ8GR1DL.jpg', 'myapp/storage/app/public/biensphoto/P3hEDOxHZTEJsjaaWOParFBdPIIlfo5yB5dcSVXd.jpg', 'myapp/storage/app/public/biensphoto/xoXtB5vPGxvAAoEERoAyt0eGsYC5X8D96WvzhmzH.jpg', 'myapp/storage/app/public/biensphoto/qM4deMXK5lVoicJULYcB5pnX0E4kex0kAInkJf1D.jpg', 'myapp/storage/app/public/biensphoto/1otNB5Lj73CZwYjWCsMAQUQR8OKI91gIyX6AdRlg.jpg', 0, '3776', '2022-09-02 16:22:47', '2022-09-02 16:22:47'),
(138, 87, 15, 9, '1', '1', '23', 'Immeuble R+3 à Cocody palmeraie Agitel', '350000000', '350.000.000 Fcfa - négociable', 'VENTE D\'İMMEUBLE  r+3 COCODY PALMERAİE AGİTEL \r\n -PRİX 350millions bien NÉGOCIABLE .\r\nRAPPORT MENSUEL 3millions. (663m2 avec reste de terrain)', 'myapp/storage/app/public/biensphoto/ToivRYN2SfvdHUx8YfQ7ZOowkqg0DnXuPJURq38F.jpg', 'myapp/storage/app/public/biensphoto/3bTz41j7oRr4WLrjXDOARzDgd5bFPhW7mBBWNGyS.jpg', 'myapp/storage/app/public/biensphoto/95cPR7XrEsGSNVUGDC4We5bvljykuggZG2vwbgc4.jpg', 'myapp/storage/app/public/biensphoto/kVw71Lg5HtwYNR5xBYybXmrUvgG0zWUJQl5OHH4y.jpg', 'myapp/storage/app/public/biensphoto/ZOApSppGtNvARMx2MRU0k04MWO40buRDft5ndcwf.jpg', 'myapp/storage/app/public/biensphoto/ZOApSppGtNvARMx2MRU0k04MWO40buRDft5ndcwf.jpg', 'myapp/storage/app/public/biensphoto/5F3s9YqUxkCo80aMM7TJ9XhV9alnDGIn22ylS03N.jpg', 'myapp/storage/app/public/biensphoto/5F3s9YqUxkCo80aMM7TJ9XhV9alnDGIn22ylS03N.jpg', 0, '3167', '2022-09-06 10:02:51', '2022-09-06 10:02:51'),
(139, 33, 7, 9, '1', '1', '3', 'Maisons basses vendus avec les meubles', '45000000', 'Maisons basses vendus avec les meubles\r\n45000000 et 40000000', 'Maisons basses vendus avec les meubles de haut qualité à Koumassi cité ADOHA.\r\n45000000 et 40000000', 'myapp/storage/app/public/biensphoto/L3CkyRJDaSeZac0W75l0XRxaQB8Vcw1eSLNJucbc.jpg', 'myapp/storage/app/public/biensphoto/AlCtl1e0fV8rePRPBxufcxElfLi69QFnWiBBxnYO.jpg', 'myapp/storage/app/public/biensphoto/HsSxj465gb0wypDEG77paYpmoozmnWzSsONSsFnE.jpg', 'myapp/storage/app/public/biensphoto/lBozurGikcL1hXAi86fJAoupkk5UrHKPWnzOOHNq.jpg', 'myapp/storage/app/public/biensphoto/gEVSx6xkJzrz0X2xHkqyqIfloLpEAgkUKvjdbhoS.jpg', 'myapp/storage/app/public/biensphoto/SUBYZupeCUIvfdjEJ3i1rgkg8nA4urTZaLNdjqSI.jpg', 'myapp/storage/app/public/biensphoto/TFHXiMrYrSeDavbse0U8WEROAwVCT3qVeKL9WfQd.jpg', 'myapp/storage/app/public/biensphoto/DVM7uFy2VWYwmG2iL7TxbfMfG0TVl2IlDDGOERjm.jpg', 0, '660', '2022-09-08 12:05:39', '2022-09-08 12:05:39');

-- --------------------------------------------------------

--
-- Structure de la table `bienssoumis`
--

CREATE TABLE `bienssoumis` (
  `idbienssoumis` int(11) NOT NULL,
  `nom` text NOT NULL,
  `tel` text NOT NULL,
  `mail` text NOT NULL,
  `pays` text NOT NULL,
  `ville` text NOT NULL,
  `quartier` text NOT NULL,
  `descrp` text NOT NULL,
  `statut` int(11) NOT NULL COMMENT '0 => new | 1 => accepte | 2 => refuse',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `biens_clients`
--

CREATE TABLE `biens_clients` (
  `idbiensclient` int(11) NOT NULL,
  `idclients` text NOT NULL,
  `idbiens` text NOT NULL,
  `idgerants` text NOT NULL,
  `daterdvprise` text NOT NULL,
  `datevisite` text NOT NULL COMMENT '48h + today',
  `datereport` text DEFAULT NULL COMMENT 'date de reportation du biens',
  `codevisites` text NOT NULL,
  `codeagent` int(11) DEFAULT 0,
  `statut` int(11) NOT NULL DEFAULT 0 COMMENT '0 => new | 1 => reporte | 2 => annule | 3 => effectue | 4 => solder',
  `recouvrement` int(11) NOT NULL DEFAULT 0 COMMENT '0=> non recouvert | 1 => recouvert',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `biens_clients`
--

INSERT INTO `biens_clients` (`idbiensclient`, `idclients`, `idbiens`, `idgerants`, `daterdvprise`, `datevisite`, `datereport`, `codevisites`, `codeagent`, `statut`, `recouvrement`, `created_at`, `updated_at`) VALUES
(12, '30', '28', '6', '15-08-2022 16:08', '16-08-2022 16:08', NULL, '2853', 0, 2, 0, '2022-08-15 16:09:09', '2022-08-15 16:09:09'),
(13, '16', '46', '6', '16-08-2022 21:08', '17-08-2022 21:08', NULL, '1529', 0, 2, 0, '2022-08-16 21:32:55', '2022-08-16 21:32:55'),
(14, '51', '28', '6', '17-08-2022 07:08', '18-08-2022 07:08', NULL, '8064', 0, 2, 0, '2022-08-17 07:39:44', '2022-08-17 07:39:44'),
(15, '60', '30', '6', '17-08-2022 14:08', '18-08-2022 14:08', NULL, '7180', 0, 2, 0, '2022-08-17 14:59:31', '2022-08-17 14:59:31'),
(16, '81', '26', '6', '18-08-2022 17:08', '19-08-2022 17:08', NULL, '484', 0, 2, 0, '2022-08-18 17:57:09', '2022-08-18 17:57:09'),
(17, '58', '59', '35', '18-08-2022 23:08', '19-08-2022 23:08', NULL, '6169', 0, 2, 0, '2022-08-18 23:23:36', '2022-08-18 23:23:36'),
(18, '60', '84', '6', '22-08-2022 08:08', '23-08-2022 08:08', NULL, '5466', 0, 2, 0, '2022-08-22 08:56:50', '2022-08-22 08:56:50'),
(19, '89', '78', '6', '22-08-2022 10:08', '23-08-2022 10:08', NULL, '1442', 0, 2, 0, '2022-08-22 10:33:02', '2022-08-22 10:33:02'),
(20, '104', '90', '72', '22-08-2022 19:08', '23-08-2022 19:08', NULL, '5601', 0, 2, 0, '2022-08-22 19:10:58', '2022-08-22 19:10:58'),
(21, '106', '87', '67', '22-08-2022 20:08', '23-08-2022 20:08', NULL, '8221', 0, 2, 0, '2022-08-22 20:59:44', '2022-08-22 20:59:44'),
(22, '103', '57', '6', '22-08-2022 22:08', '23-08-2022 22:08', NULL, '2285', 0, 2, 0, '2022-08-22 22:34:34', '2022-08-22 22:34:34'),
(23, '103', '28', '6', '22-08-2022 22:08', '23-08-2022 22:08', NULL, '9769', 0, 2, 0, '2022-08-22 22:40:51', '2022-08-22 22:40:51'),
(24, '109', '98', '6', '23-08-2022 11:08', '24-08-2022 11:08', NULL, '2068', 0, 3, 0, '2022-08-23 11:49:22', '2022-08-23 11:49:22'),
(25, '16', '55', '30', '01-09-2022 11:09', '02-09-2022 11:09', NULL, '2351', 0, 2, 0, '2022-09-01 11:30:56', '2022-09-01 11:30:56'),
(26, '130', '56', '19', '07-09-2022 10:09', '08-09-2022 10:09', NULL, '9237', 0, 3, 0, '2022-09-07 10:18:26', '2022-09-07 10:18:26');

-- --------------------------------------------------------

--
-- Structure de la table `campagne`
--

CREATE TABLE `campagne` (
  `idcampagne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `idclients` int(11) NOT NULL,
  `nom` text NOT NULL,
  `phone` text NOT NULL,
  `mail` text NOT NULL,
  `pass` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idclients`, `nom`, `phone`, `mail`, `pass`, `created_at`, `updated_at`) VALUES
(8, 'SEYO', '2250779084891', 'seyochristian15@gmail.com', '2304', '2022-08-12 10:20:50', '2022-08-12 10:20:50'),
(9, 'David Konan', '2250748829245', 'kdavidshalom@yahoo.fr', '4731', '2022-08-12 10:26:02', '2022-08-12 10:26:02'),
(10, 'SORO Sabine', '2250101411779', 'amatoullahisab@gmail.com', '0101', '2022-08-12 10:28:01', '2022-08-12 10:28:01'),
(11, 'Soro', '2250779348401', 'soromohamed703@gmail.com', '4626', '2022-08-12 10:28:26', '2022-08-12 10:28:26'),
(12, 'SORO CHONFOUNGO AIMÉ', '2250708789723', 'sochaime@gmail.com', '187', '2022-08-12 10:42:17', '2022-08-12 10:42:17'),
(13, 'KOUAME ALEXIS', '2250749415960', 'alexis_kouame@ymail.com', 'Alexis@1989', '2022-08-12 10:52:11', '2022-08-12 10:52:11'),
(14, 'Mardochée Tahi Alla', '2250789183393', 'tahimardoche05@gmail.com', '2608', '2022-08-12 10:55:41', '2022-08-12 10:55:41'),
(15, 'Koala Moussa', '2250707414892', 'm.koala89@gmail.com', '2970', '2022-08-12 11:03:41', '2022-08-12 11:03:41'),
(16, 'Sinan Souleymane', '2250748758465', 'skouamesinan@gmail.com', '3937', '2022-08-12 11:11:01', '2022-08-12 11:11:01'),
(17, 'BOGA Hugues Desmer', '2250749863474', 'boghug@gmail.com', '4732', '2022-08-12 11:15:40', '2022-08-12 11:15:40'),
(18, 'GOUA', '2250707250826', 'Saintgouab@yahoo.fr', '1054', '2022-08-12 11:23:03', '2022-08-12 11:23:03'),
(19, 'BONY', '2250777515806', 'bonydesire92@gmail.com', '1992', '2022-08-12 12:21:01', '2022-08-12 12:21:01'),
(20, 'KOUASSI OUSSENE OUATTARA', '2250545595916', 'Kouassiouattra1234@gmail.com', 'Dessin4559', '2022-08-12 12:38:55', '2022-08-12 12:38:55'),
(21, 'Gnapi Ulrich', '14693479203', 'ulrich.gnapi@gmail.com', '669', '2022-08-12 14:06:03', '2022-08-12 14:06:03'),
(22, 'Boni Muriel', '2250747169846', 'boni.aikiah@gmail.com', '2760', '2022-08-12 15:59:34', '2022-08-12 15:59:34'),
(23, 'Koffi', '2250576808121', 'davykoffi2@gmail.com', '1272', '2022-08-12 16:12:51', '2022-08-12 16:12:51'),
(24, 'N\'GUESSAN Okon Rodrigue', '2250707322993', 'okonrodrigue78@gmail.com', '4585', '2022-08-12 18:28:04', '2022-08-12 18:28:04'),
(25, 'KOUADIO Venceslas', '2250777911588', 'elevationvenceslas@gmail.com', 'Elev@tion1981', '2022-08-13 08:22:14', '2022-08-13 08:22:14'),
(26, 'YORO MONHI CHARLES', '2250757191564', 'monhicharlesyoro@gmail.com', '050594', '2022-08-13 14:08:04', '2022-08-13 14:08:04'),
(27, 'Emerald immobilier', '2250758303852', 'emerald.immo@gmail.com', '888', '2022-08-14 14:02:23', '2022-08-14 14:02:23'),
(28, 'Sodra construction service', '2250545710046', 'Sodraconstructionservice@gmail.com', 'Sodra2019', '2022-08-14 15:02:11', '2022-08-14 15:02:11'),
(29, 'Kouakou', '2250506821442', 'Valerykoffikiuakou@gmail.com', '4736', '2022-08-14 16:02:01', '2022-08-14 16:02:01'),
(30, 'Marie Laure', '2250708499531', 'ama.nguet@gmail.com', '1484', '2022-08-15 16:09:09', '2022-08-15 16:09:09'),
(31, 'Alexia Bell', '2250798656992', 'nicolealexia.bell@gmail.com', '582', '2022-08-16 21:06:45', '2022-08-16 21:06:45'),
(32, 'NIANGO', '2250707314140', 'yoannarmel024@yahoo.fr', '24111990', '2022-08-16 21:07:41', '2022-08-16 21:07:41'),
(33, 'Eddy MBERI MIYALOU', '242069554969', 'eddy.mberimiyalou@gmail.com', 'Le09081984@', '2022-08-16 21:09:14', '2022-08-16 21:09:14'),
(34, 'Abibata cisse', '2250748043564', 'cabibata54@gmail.com', '2820', '2022-08-16 21:10:25', '2022-08-16 21:10:25'),
(35, 'KEBE MOUSSA', '2250708999454', 'moussaa14@yahoo.fr', '1404', '2022-08-16 21:12:23', '2022-08-16 21:12:23'),
(36, 'Serge NOUME', '2250748100820', 'synoume@gmail.com', '3067', '2022-08-16 21:12:33', '2022-08-16 21:12:33'),
(37, 'Parfait delafoi', '2250709546568', 'parfaitkouakou83@gmail.com', '1991', '2022-08-16 21:17:04', '2022-08-16 21:17:04'),
(38, 'KONÉ SIMPETININ ABDOUL', '2250707982393', 'simpetinin3@gmail.com', '3005', '2022-08-16 21:25:32', '2022-08-16 21:25:32'),
(39, 'Noëlla Okoué', '2250748282045', 'noellagoussaky@gmail.com', '0411', '2022-08-16 21:26:12', '2022-08-16 21:26:12'),
(40, 'THIEN ABOU', '2250709757488', 'thienabou@gmail.com', '4875', '2022-08-16 21:31:14', '2022-08-16 21:31:14'),
(41, 'Milha', '2250707923333', 'milhaimmobilier@gmail.com', '400', '2022-08-16 21:31:30', '2022-08-16 21:31:30'),
(42, 'Khadidja SYLLA', '2250708405897', 'ksylla@hotmail.fr', '4987', '2022-08-16 21:36:04', '2022-08-16 21:36:04'),
(43, 'Serge-obed Okoué', '2250708138752', 'sergeobed@gmail.com', '4444', '2022-08-16 21:40:35', '2022-08-16 21:40:35'),
(44, 'SINDJALIM EDJADE HENRY', '2250708858764', 'edjadehenry@gmail.com', '034874', '2022-08-16 21:47:43', '2022-08-16 21:47:43'),
(45, 'Serge Gouety', '2250749089678', 'sergekrystel@gmail.com', '1111', '2022-08-16 21:47:49', '2022-08-16 21:47:49'),
(46, 'Soumahoro Sory', '2250748950109', 'soumahorosory@gmail.com', '4891', '2022-08-16 21:50:10', '2022-08-16 21:50:10'),
(47, 'Kouame Félix', '2250708911407', 'bonjourgille@gmail.com', '0544', '2022-08-16 22:56:15', '2022-08-16 22:56:15'),
(48, 'Ehu niamian Manuela ange frederique', '2250554857879', 'ehu.manuela@gmail.com', '4518', '2022-08-17 00:49:07', '2022-08-17 00:49:07'),
(49, 'Soro pelefere moumouni', '2250768496315', 'Peleferemoumouni@gmail.com', '1996', '2022-08-17 04:33:44', '2022-08-17 04:33:44'),
(50, 'BÉRENGER ASSI', '2250707030067', 'godstar.market@gmail.com', '1984', '2022-08-17 07:07:19', '2022-08-17 07:07:19'),
(51, 'Dion makado Florent', '2250757277653', 'dionmakadoflorent@gmail.com', '919', '2022-08-17 07:39:44', '2022-08-17 07:39:44'),
(52, 'ANO', '2250707416833', 'anomartinien@gmail.com', '1020', '2022-08-17 07:53:00', '2022-08-17 07:53:00'),
(53, 'Virgil SALLAH', '2250797310497', 'virgil_anks@yahoo.fr', 'BiniD@ng1', '2022-08-17 08:50:04', '2022-08-17 08:50:04'),
(54, 'Armel Koné', '2250709003308', 'armelkonek@gmail.com', '69', '2022-08-17 09:14:01', '2022-08-17 09:14:01'),
(55, 'Kouassi Marcel', '2250777386397', 'kouassimarcel@gmail.com', '1177', '2022-08-17 09:37:37', '2022-08-17 09:37:37'),
(56, 'Fadilath LIADY', '22996064664', 'lfadilath9@gmail.com', '208', '2022-08-17 09:39:07', '2022-08-17 09:39:07'),
(57, 'Coulibaly Amina', '2250546791387', 'coulibalyamina17@gmail.com', '2022', '2022-08-17 10:47:32', '2022-08-17 10:47:32'),
(58, 'N\'dri Marie Liliane', '2250103071094', 'ndrimarieliliane@gmail.com', '3190', '2022-08-17 11:16:15', '2022-08-17 11:16:15'),
(59, 'Ange KOFFI', '2250757142580', 'angekoffi280@gmail.com', '4754', '2022-08-17 12:36:49', '2022-08-17 12:36:49'),
(60, 'Immover', '2250767548728', 'immovere@gmail.com', '1363', '2022-08-17 14:59:31', '2022-08-17 14:59:31'),
(61, 'Agence NooRAch_Mr Salifou KONE', '2250143014307', 'echlonnos@gmail.com', 'immover1115145', '2022-08-17 15:44:34', '2022-08-17 15:44:34'),
(62, 'BOTI Lou Koablé Aimée-Claudia', '2250152596828.0708344251', 'aimeclo@live.fr', '392', '2022-08-17 16:11:54', '2022-08-17 16:11:54'),
(63, 'Touré Vacaba', '2250506357811', 'tvakous@yahoo.fr', '831', '2022-08-17 20:45:00', '2022-08-17 20:45:00'),
(64, 'kouakou oi Kouakou Norbert', '2250708634618', 'junioroikouakou@gmail.com', '593', '2022-08-17 21:05:35', '2022-08-17 21:05:35'),
(65, 'KOUDOU Franck Stéphane', '2250707037065', 'francoudou@yahoo.fr', '1978', '2022-08-17 22:33:10', '2022-08-17 22:33:10'),
(66, 'philippe aka', '2250768707135', 'ogustfilip@gmail.com', '4234', '2022-08-18 11:58:52', '2022-08-18 11:58:52'),
(67, 'Ye Abibatou', '2250504460110', 'abiblessing2008@gmail.com', '1015', '2022-08-18 12:01:30', '2022-08-18 12:01:30'),
(68, 'DJI', '2250707430277', 'supercoachci@gmail.com', '4265', '2022-08-18 12:07:59', '2022-08-18 12:07:59'),
(69, 'Brou Marius', '2250747257377', 'romainbrou225@gmail.com', '4540', '2022-08-18 12:08:43', '2022-08-18 12:08:43'),
(70, 'Aly fofana', '22370273101', 'sauronimmoblier1@gmail.com', 'Sauroncode', '2022-08-18 12:30:45', '2022-08-18 12:30:45'),
(71, 'KPEUKPA Fabrice Alphonse', '2250707166489', 'kpeukpa@gmail.com', 'alphonse80', '2022-08-18 12:50:04', '2022-08-18 12:50:04'),
(72, 'MEITE', '2250659650157', 'meitebakaramogo20@gmail.com', '1511', '2022-08-18 13:20:37', '2022-08-18 13:20:37'),
(73, 'WILLY BECO', '2250758141343', 'willybeco1226@gmail.com', '1226', '2022-08-18 13:25:48', '2022-08-18 13:25:48'),
(74, 'FRANCOISE', '2250150758989', 'somobat.immo@gmail.com', '3009', '2022-08-18 13:26:19', '2022-08-18 13:26:19'),
(75, 'Bonkoungou abdoul moumouni junior', '2250505934926', 'juniorbonkoungou1@gmail.com', '7519', '2022-08-18 14:11:48', '2022-08-18 14:11:48'),
(76, 'maurice babo', '2120602642839', 'rmhd6m@gmail.com', '4043', '2022-08-18 14:33:55', '2022-08-18 14:33:55'),
(77, 'Naomie Aboua Kouakou', '2250777296155', 'naomieaboua@gmail.com', '3325', '2022-08-18 16:10:24', '2022-08-18 16:10:24'),
(78, 'NAHI ANGE YANNICK MONHESSIA', '2250758900768', 'angeyannicknahi@gmail.com', '1840', '2022-08-18 17:01:13', '2022-08-18 17:01:13'),
(79, 'Kouakou', '2250504938998', 'kouakou89.kk@gmail.com', '1588', '2022-08-18 17:03:16', '2022-08-18 17:03:16'),
(80, 'Mea Sylvestre', '2250709967525', 'seneveallinone@gmail.com', '03350556', '2022-08-18 17:23:51', '2022-08-18 17:23:51'),
(81, 'Abdoul', '2257870853669', 'savadogoadama444@gmail.com', '3676', '2022-08-18 17:57:09', '2022-08-18 17:57:09'),
(82, 'mabea', '2250141954409', 'maxmabea@yahoo.fr', 'lavietous@', '2022-08-19 02:18:37', '2022-08-19 02:18:37'),
(83, 'NAEGO TOADELA Ezéchiel', '243813001393', 'ezechielnaego32@gmail.com', '3232', '2022-08-19 13:05:35', '2022-08-19 13:05:35'),
(84, 'KOUAKOU IBRAHIM KHALIL', '2250747674064', 'khalilkik2552@gmail.com', 'BASKETBALL2552@', '2022-08-19 14:59:01', '2022-08-19 14:59:01'),
(85, 'Kouadio Brice', '2250708650499', 'k.didier1981@gmail.com', '4126', '2022-08-20 07:53:05', '2022-08-20 07:53:05'),
(86, 'Anoma kouamé Guy Roger', '2250140147834', 'anomaguyro@gmail.com', '1072', '2022-08-20 08:19:04', '2022-08-20 08:19:04'),
(87, 'kangah Daniel', '2250758688557', 'Danielkangah5@gmail.com', '1212', '2022-08-20 20:50:58', '2022-08-20 20:50:58'),
(88, 'Kody', '2250799139771', 'jeankody17@gmail.com', 'Kodyjean49', '2022-08-20 22:20:27', '2022-08-20 22:20:27'),
(89, 'Touré', '2250747353680', 'touremohamed036@gmail.com', '2242', '2022-08-22 10:33:02', '2022-08-22 10:33:02'),
(90, 'Gilles SOBOH', '330754054505', 'prgilleskevin@gmail.com', '516', '2022-08-22 12:57:58', '2022-08-22 12:57:58'),
(91, 'RECORD GROUP SARL', '2250787370006', 'recordgroup.sarl@gmail.com', '1983', '2022-08-22 13:13:54', '2022-08-22 13:13:54'),
(92, 'ATRAIT IMMOBILIER & GRANDS TRAVAUX', '2250707190564', 'atraitimmobilier@gmail.com', 'assena2019', '2022-08-22 13:45:18', '2022-08-22 13:45:18'),
(93, 'Gwladys Zanou', '2250101516141', 'gladzan@gmail.com', '2492', '2022-08-22 14:58:17', '2022-08-22 14:58:17'),
(94, 'Adjoumani', '2250758946306', 'adjoumanipaulin6@gmail.com', '*Pass2022', '2022-08-22 15:53:04', '2022-08-22 15:53:04'),
(95, 'Bernadette OKOU', '12144389165', 'boayahbernadette@gmail.com', '1116', '2022-08-22 16:20:07', '2022-08-22 16:20:07'),
(96, 'AFFO Romaric', '2250747840848', 'Romaricaffo@gmail.com', 'affo2000', '2022-08-22 16:21:39', '2022-08-22 16:21:39'),
(97, 'Bagnon', '2250747978216', 'yvesromi@gmail.com', '3620', '2022-08-22 16:36:13', '2022-08-22 16:36:13'),
(98, 'KONE SIMPETININ ABDOUL', '2250707982393', 'simpetinin@gmail.com', 'Jesuisriche', '2022-08-22 16:40:51', '2022-08-22 16:40:51'),
(99, 'Oi Ngouan', '2250707733666', 'ngouan_2007@hotmail.com', '7504', '2022-08-22 17:05:42', '2022-08-22 17:05:42'),
(100, 'Shep maxime', '2250757183226', 'maximeshep99@gmail.com', '57183226', '2022-08-22 17:19:35', '2022-08-22 17:19:35'),
(101, 'KANO PARFAIT', '2250789737665', 'parfaitkano08@gmail.com', '0545972007', '2022-08-22 17:42:09', '2022-08-22 17:42:09'),
(102, 'Cynthia Blé', '2250748747306', 'infobusinesscenter225@gmail.com', 'Mondieujetaime', '2022-08-22 18:03:59', '2022-08-22 18:03:59'),
(103, 'Sonia', '2250757792932', 'amangouasonia@live.fr', '4455', '2022-08-22 18:50:51', '2022-08-22 18:50:51'),
(104, 'Oula', '2250798834059', 'deyekpa@gmail.com', '4227', '2022-08-22 19:10:58', '2022-08-22 19:10:58'),
(105, 'Godebo gokou Franck Olivier', '2250758138630', 'godebofranck1@gmail.com', '0758138630', '2022-08-22 20:05:08', '2022-08-22 20:05:08'),
(106, 'M.Yao', '2250759883216', 'israelyao91@gmail.com', '2131', '2022-08-22 20:59:44', '2022-08-22 20:59:44'),
(107, 'Djako Jonas', '2250708686206', 'jonasdjako@etds.info', 'Jonas007', '2022-08-22 21:28:14', '2022-08-22 21:28:14'),
(108, 'Loukou Dominique', '2250709996777', 'midelservices1135@gmail.com', '285', '2022-08-23 09:21:38', '2022-08-23 09:21:38'),
(109, 'Lohoues', '2250708656614', 'flohoues@hotmail.com', '940', '2022-08-23 11:49:22', '2022-08-23 11:49:22'),
(110, 'SCI OIKODOMEO', '2250702606428', 's.technique@sci-oikodomeo.fr', '1307', '2022-08-23 11:58:57', '2022-08-23 11:58:57'),
(111, 'Shalom Talingano', '2250103917330', 'talinganoshalom@gmail.com', '2880', '2022-08-23 12:15:59', '2022-08-23 12:15:59'),
(112, 'SONAN JOSEPH', '2250768312428', 'josephsonan@gmail.com', '1903', '2022-08-23 12:36:43', '2022-08-23 12:36:43'),
(113, 'Ahoua Ingrid Monique', '2250747414814', 'ahouaingrid@gmail.com', '2948', '2022-08-23 14:23:58', '2022-08-23 14:23:58'),
(114, 'melissa', '2250759483773', 'anne-melissa@hotmail.fr', '1721', '2022-08-23 15:59:34', '2022-08-23 15:59:34'),
(115, 'N\'guessan', '2250171747181', 'kpandjifranck@gmail.com', '1824', '2022-08-23 16:00:02', '2022-08-23 16:00:02'),
(116, 'KAMBIRE Pascal', '2250758588973', 'kambirepascal48@gmail.com', '4985', '2022-08-23 19:33:04', '2022-08-23 19:33:04'),
(117, 'Koné Katy', '2250707626647', 'katykone@gmail.com', '2236', '2022-08-23 20:26:48', '2022-08-23 20:26:48'),
(118, 'KOUDOU   JOEL', '2250757220020', 'dezajoel@gmail.com', '4364', '2022-08-24 10:01:21', '2022-08-24 10:01:21'),
(119, 'GONAHI', '2250747548266', 'gonahiravel@gmail.com', '2831', '2022-08-24 11:15:41', '2022-08-24 11:15:41'),
(120, 'KOUACHI DAH MARIE-SARRA', '2250101780285', 'jecoanne57@gmail.com', '1311', '2022-08-24 19:41:37', '2022-08-24 19:41:37'),
(121, 'Jean Bosco kouakou Konan', '2250757641549', 'jeanbosco2035@gmail.com', '1179', '2022-08-25 00:43:12', '2022-08-25 00:43:12'),
(122, 'Herman Gnangbé', '2250709771757', 'gnangbe2006@gmail.com', '4240', '2022-08-25 09:11:29', '2022-08-25 09:11:29'),
(123, 'ABIOLA GEORGES', '2250708198912', 'abiolageorgeolu@gmail.com', 'Abiola08', '2022-08-25 16:51:20', '2022-08-25 16:51:20'),
(124, 'LE GRAND', '2250545972007', 'rabbiconsulting9@gmail.com', '3625', '2022-08-25 20:58:58', '2022-08-25 20:58:58'),
(125, 'Acakpomego Jules', '2250173235386', 'acakpomegojules@gmail.com', '2894', '2022-08-26 21:13:17', '2022-08-26 21:13:17'),
(126, 'ATTOUMBRE Ange-Emmanuel', '2250777967455', 'attangelo1@gmail.com', '2522', '2022-09-01 15:58:13', '2022-09-01 15:58:13'),
(127, 'Kouassi Brou Guy', '2250749565440', 'Kouassibrouguy@gmail.com', '999', '2022-09-02 08:30:49', '2022-09-02 08:30:49'),
(128, 'Yapo', '2250708754138', 'anielladegrace15@gmail.com', '2424', '2022-09-06 15:24:44', '2022-09-06 15:24:44'),
(129, 'Wilfried KOUADIO', '2250708243705', 'willgodson33@gmail.com', '070805', '2022-09-06 22:32:20', '2022-09-06 22:32:20'),
(130, 'PDGE GROUP', '2250757401424', 'parikibel@gmail.com', '2949', '2022-09-07 09:00:19', '2022-09-07 09:00:19'),
(131, 'Laetitia', '2250747249654', 'Laeti.autoglass@gmail.com', '4139', '2022-09-08 02:30:05', '2022-09-08 02:30:05');

-- --------------------------------------------------------

--
-- Structure de la table `coupons`
--

CREATE TABLE `coupons` (
  `idcoup` int(11) NOT NULL,
  `coupons` text NOT NULL COMMENT 'coupons',
  `visite` int(11) NOT NULL,
  `clients` text NOT NULL COMMENT 'email clients',
  `stat` int(11) NOT NULL COMMENT '0= new | 1 = occupe',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `demandepay`
--

CREATE TABLE `demandepay` (
  `idpay` int(11) NOT NULL,
  `typops` varchar(200) DEFAULT NULL,
  `pays` varchar(200) DEFAULT NULL,
  `villes` varchar(200) DEFAULT NULL,
  `quartier` varchar(200) DEFAULT NULL,
  `typBiens` varchar(200) DEFAULT NULL,
  `whatsapp` varchar(200) DEFAULT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `descript` text DEFAULT NULL,
  `transid` text DEFAULT NULL,
  `statut` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `demandeID` int(11) NOT NULL,
  `codes` text NOT NULL,
  `opera` int(11) NOT NULL,
  `pays` int(11) NOT NULL,
  `villes` int(11) NOT NULL,
  `quartier` int(11) NOT NULL,
  `typesbiens` int(11) NOT NULL,
  `whatsap` text NOT NULL,
  `mail` text DEFAULT NULL,
  `more` text DEFAULT NULL,
  `stat` int(11) NOT NULL COMMENT '0 => New | 1 => trouver | 2 => annuler| 3 => publier',
  `pub` varchar(11) DEFAULT '0' COMMENT '0 => non publie | 1 => publie',
  `transid` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gerants`
--

CREATE TABLE `gerants` (
  `idgerant` int(11) NOT NULL,
  `nom` text NOT NULL,
  `mail` text NOT NULL,
  `phone` text NOT NULL,
  `pays` text NOT NULL,
  `villes` text NOT NULL,
  `pass` text NOT NULL,
  `identity` text DEFAULT NULL,
  `identityfile` text DEFAULT NULL,
  `profil` text DEFAULT NULL,
  `nagreement` text DEFAULT NULL,
  `statut` int(11) NOT NULL DEFAULT 0 COMMENT '0 = actif | 1 = inactif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gerants`
--

INSERT INTO `gerants` (`idgerant`, `nom`, `mail`, `phone`, `pays`, `villes`, `pass`, `identity`, `identityfile`, `profil`, `nagreement`, `statut`, `created_at`, `updated_at`) VALUES
(5, 'GERANT TEST', 'kalecoding@gmail.com', '07888892608', 'Côte d\'ivoire', 'Abidjan', '2223', NULL, NULL, NULL, NULL, 1, '2022-08-10 23:32:32', '2022-08-10 23:32:32'),
(6, 'RAD IMMOBILIER', 'yaoyannickroland95@gmail.com', '0749521853', 'Côte d\'Ivoire', 'ABIDJAN', '2681', NULL, NULL, NULL, NULL, 0, '2022-08-11 16:58:54', '2022-08-11 16:58:54'),
(13, 'Tongui', 'Jocelintongui@gmail.com', '0767548728', 'CI', 'Abidjan', '4278', 'personne physique', 'myapp/storage/app/public/Identity/GOfcn9zc4QJDBh3DOgxbrrjNVa5R4IxwiFL7dwWN.jpg', 'proprietaire', NULL, 1, '2022-08-16 15:11:29', '2022-08-16 15:11:29'),
(14, 'Tongui', 'madridjocelyn48@gmail.com', '0767548728', 'CI', 'Abidjan', '2887', 'personne physique', 'myapp/storage/app/public/Identity/9MdZ3igKmPpirfmpt6kjk0ZPXGye3agccmMS1Yio.jpg', 'proprietaire', NULL, 1, '2022-08-16 15:21:11', '2022-08-16 15:21:11'),
(15, 'Kouame n\'êtes Gervais kouassi', 'Willoboss48@gmail.com', '0767548728', 'CI', 'Abidjan', '2557', 'personne physique', 'myapp/storage/app/public/Identity/QX1uJ0YaR6FAgW6M7lz6aa7Z7zN13HFHycbQIi3V.jpg', 'demarcheur', NULL, 1, '2022-08-16 16:05:56', '2022-08-16 16:05:56'),
(17, 'Koala Moussa', 'm.koala89@gmail.com', '002250707414892', 'CI', 'Abidjan', '3182', 'personne physique', 'myapp/storage/app/public/Identity/vCZUwkcng5nX4Po6YWPYJHMFFIysGvLQW1IDksXc.jpg', 'proprietaire', NULL, 0, '2022-08-16 21:12:29', '2022-08-16 21:12:29'),
(18, 'Kore sylvanus leandre', 'Sylvanuskore@gmail.com', '0759984832', 'CI', 'Abidjan', '2969', 'personne physique', 'myapp/storage/app/public/Identity/ma21xFtNb2pRLITOssJhNrqCGYS3oNJ2zLt6taJN.jpg', 'demarcheur', NULL, 0, '2022-08-16 21:15:53', '2022-08-16 21:15:53'),
(19, 'EYOBOUA Méa Koffi Elie', 'e.meaelie@gmail.com', '0748415009', 'CI', 'Abidjan', '2311', 'personne physique', 'myapp/storage/app/public/Identity/H8aJwKNEmffIQnMAX9leQHbUtzdTvZaKQ6mvqxgw.jpg', 'demarcheur', NULL, 0, '2022-08-16 21:19:06', '2022-08-16 21:19:06'),
(20, 'KONÉ SIMPETININ ABDOUL', 'simpetinin3@gmail.com', '0707982393', 'CI', 'Abidjan', '2386', 'personne physique', 'myapp/storage/app/public/Identity/dUdh0hi9jd8gTMWoXcrZUmmWbQrz7ppl4dWegHiX.jpg', 'demarcheur', NULL, 0, '2022-08-16 21:29:27', '2022-08-16 21:29:27'),
(21, 'Eddy MBERI MIYALOU', 'eddy.mberimiyalou@gmail.com', '00242069554969', 'CI', 'Abidjan', '4111', 'personne physique', 'myapp/storage/app/public/Identity/wiQ6YEhbgDQ96NLLRjttbtJPJIbGyMm2Ob1lOjhc.jpg', 'agent immobilier', NULL, 0, '2022-08-16 21:31:23', '2022-08-16 21:31:23'),
(22, 'Okoué Serge-obed', 'sergeobed@gmail.com', '0708138752', 'CI', 'Abidjan', '4444', 'personne physique', 'myapp/storage/app/public/Identity/UC9VccUXcdiHgNvqaaH1Si5oxhsQDaaKwRDFcT5k.jpg', 'agent immobilier', NULL, 0, '2022-08-16 21:33:01', '2022-08-16 21:33:01'),
(23, 'Abibata cisse', 'Cabibata54@gmail.com', '0748043564', 'CI', 'Abidjan', '4196', 'personne physique', 'myapp/storage/app/public/Identity/7kq6LXEavMMRhWg5W2NV9XaZuqbdi3M7zbl46SUS.jpg', 'demarcheur', NULL, 0, '2022-08-16 21:33:22', '2022-08-16 21:33:22'),
(24, 'N\'GNAMIEN KONAN YANICK', 'ngnamienkonanyannick1994@gmail.com', '0747765545', 'CI', 'Abidjan', '2316', 'personne physique', 'myapp/storage/app/public/Identity/VmvottLkzeuWFx6LVYE9RnLg8pG23zw8iqg1c7ZT.png', 'agent immobilier', NULL, 0, '2022-08-16 21:34:43', '2022-08-16 21:34:43'),
(25, 'Noella Okoué Goussaky', 'noellagoussaky@gmail.com', '0748282045', 'CI', 'Abidjan', '3780', 'personne physique', 'myapp/storage/app/public/Identity/EbTbckq03WMZbXq5k3S7QETMqGGb1i4yrHL6HnWQ.jpg', 'agent immobilier', NULL, 0, '2022-08-16 21:36:21', '2022-08-16 21:36:21'),
(26, 'Kinda Adama', 'kindaadamo7@gmail.com', '0545256357', 'CI', 'Abidjan', '4227', 'personne physique', 'myapp/storage/app/public/Identity/UB6G0VU54Y99VWYjUSjigaMwwPFUJe9RQZdBhHYL.jpg', 'demarcheur', NULL, 1, '2022-08-16 21:37:00', '2022-08-16 21:37:00'),
(27, 'Kouassi Yao Bienvenu', 'legracieuxdivin@gmail.com', '0748769457', 'CI', 'Abidjan', '3278', 'personne physique', 'myapp/storage/app/public/Identity/NuQc4UOKuHQNA5k6M6BEr9uBWHSmImJLLCdieonB.jpg', 'agent immobilier', NULL, 0, '2022-08-16 21:42:28', '2022-08-16 21:42:28'),
(28, 'SERY lou Marthe', 'marthesery540@yahoo.fr', '0707088715', 'CI', 'Abidjan', '2418', 'personne physique', 'myapp/storage/app/public/Identity/yA1K8Zo8L804xM74g1hqTmDuljFESzZ4OCXvAxhU.jpg', 'proprietaire', NULL, 0, '2022-08-16 21:57:30', '2022-08-16 21:57:30'),
(29, 'SANOGO KARAMOKO BEN HISMAEL', 'sanogoben02@gmail.com', '0778545940', 'CI', 'Abidjan', '4418', 'personne physique', 'myapp/storage/app/public/Identity/PVqT3pyeSuRrTqZAgHukS66ugjdO9ldXV24tyfxt.jpg', 'agent immobilier', NULL, 0, '2022-08-16 22:29:12', '2022-08-16 22:29:12'),
(30, 'Sinan Souleymane', 'skouamesinan@gmail.com', '0556612676', 'CI', 'Abidjan', '4379', 'personne physique', 'myapp/storage/app/public/Identity/zdqoIiP7bXv7LpZSd0i4GkKA7k6uasmrDrMgwC5q.jpg', 'agence non agree', NULL, 0, '2022-08-16 22:34:36', '2022-08-16 22:34:36'),
(31, 'siaka', 'siakakone25@gmail.com', '0759686327', 'CI', 'Abidjan', '2569', 'personne physique', 'myapp/storage/app/public/Identity/gAzxyQxikLsGmFXqDVBNjRuTyESnXsiPP4Q5OB2M.pdf', 'demarcheur', NULL, 0, '2022-08-16 23:25:34', '2022-08-16 23:25:34'),
(32, 'ASSI BÉRENGER', 'godstar.market@gmail.com', '0707030067', 'CI', 'Abidjan', '2818', 'personne physique', 'myapp/storage/app/public/Identity/yizyQpCYVQscY4gqhJXmodcTjLAAw6gBq1aV5JWt.jpg', 'demarcheur', NULL, 0, '2022-08-17 07:12:55', '2022-08-17 07:12:55'),
(33, 'Soro Kparegue Mohamed', 'soromohamed703@gmail.com', '0779348401', 'CI', 'Abidjan', '2445', 'personne physique', 'myapp/storage/app/public/Identity/HmYStIPFRjjRaRJ7Uq4I5Xz66oSx9JN0VeMhZeyM.jpg', 'demarcheur', NULL, 0, '2022-08-17 07:16:09', '2022-08-17 07:16:09'),
(34, 'Koffi', 'davykoffi2@gmail.com', '0576808121', 'CI', 'Abidjan', '3115', 'personne physique', 'myapp/storage/app/public/Identity/ZCesLNJ54NQ6VhvC9C7GOODsxaR31LtstKEGXVb5.jpg', 'agent immobilier', NULL, 0, '2022-08-17 08:51:34', '2022-08-17 08:51:34'),
(35, 'N\'dri Marie Liliane', 'ndrimarieliliane@gmail.com', '0103071094', 'CI', 'Abidjan', '4024', 'personne physique', 'myapp/storage/app/public/Identity/O91IefImfXJTMPae1b193djyCWTjVwXn6aySPXi1.mp4', 'agence non agree', NULL, 0, '2022-08-17 09:13:35', '2022-08-17 09:13:35'),
(36, 'Kouassi Yao Brice Emmanuel', 'bricemanuelk@gmail.com', '0142217534', 'CI', 'Abidjan', '4786', 'personne physique', 'myapp/storage/app/public/Identity/mDDUZT8SDCDZIyUahbgSsSO2cdvELa8ZVtdzJEVG.jpg', 'demarcheur', NULL, 0, '2022-08-17 09:38:47', '2022-08-17 09:38:47'),
(37, 'Beda', 'starbeda1986@gmail.com', '0758108587', 'CI', 'Abidjan', '4259', 'personne physique', 'myapp/storage/app/public/Identity/E95J3mzLhe1IwQ4KRr5r31ChsH5UHnUE3X6S8KMd.jpg', 'demarcheur', NULL, 0, '2022-08-17 09:55:11', '2022-08-17 09:55:11'),
(38, 'Ange KOFFI', 'angekoffi280@gmail.com', '002250757142580', 'CI', 'Abidjan', '2765', 'personne physique', 'myapp/storage/app/public/Identity/KCvb2fHKwoOG7uFo0ZC6HQa46X4MvBtCbOcpKGKG.jpg', 'demarcheur', NULL, 0, '2022-08-17 12:47:01', '2022-08-17 12:47:01'),
(39, 'Kouadio Brice', 'k.didier1981@gmail.com', '0708650499', 'CI', 'Abidjan', '4370', 'personne physique', 'myapp/storage/app/public/Identity/4tzlxeLFiRFCV7nmoQFNukyEzZpDkimriyIW5DL0.jpg', 'demarcheur', NULL, 0, '2022-08-17 12:56:16', '2022-08-17 12:56:16'),
(40, 'THIEN ABOU', 'thienabou@gmail.com', '0709757488', 'CI', 'Abidjan', '3099', 'personne physique', 'myapp/storage/app/public/Identity/9SDh9JEhaeZ2Ve2O1rEsOQJY8PjC8q74NvOcEQ3M.jpg', 'proprietaire', NULL, 0, '2022-08-17 13:24:20', '2022-08-17 13:24:20'),
(41, 'SORO Chonfoungo Aimé', 'sochaime@gmail.com', '0708789723', 'CI', 'Abidjan', '3427', 'personne physique', 'myapp/storage/app/public/Identity/Ysks2p3194mKVCGmxQSXIvpHpTGtFtaL5eBxhwyA.pdf', 'agent immobilier', NULL, 0, '2022-08-17 16:43:34', '2022-08-17 16:43:34'),
(42, 'Parfait delafoi', 'parfaitkouakou83@gmail.com', '0709546568', 'CI', 'Abidjan', '3822', 'personne physique', 'myapp/storage/app/public/Identity/mRJTtI1CysS5d1HO6uOkdD35s1X9h25ZAiIVpc0C.jpg', 'demarcheur', NULL, 0, '2022-08-17 17:07:49', '2022-08-17 17:07:49'),
(43, 'BOGA Hugues Desmer', 'boghug@gmail.com', '0749863474', 'CI', 'Abidjan', '4291', 'personne physique', 'myapp/storage/app/public/Identity/V9UQbQucPcew07vDuFCl8j5JjgQCbUHjS0n7tlTw.jpg', 'agence non agree', NULL, 0, '2022-08-17 22:57:53', '2022-08-17 22:57:53'),
(44, 'Yahou Jean-christ', 'Jcyahou@gmail.com', '0778062828', 'CI', 'Abidjan', '3456', 'personne physique', 'myapp/storage/app/public/Identity/EzkBck03gtmyeCrgiFcyOWNrXwpvtk6SmoUGYEWg.jpg', 'proprietaire', NULL, 0, '2022-08-18 12:10:36', '2022-08-18 12:10:36'),
(45, 'Brou Marius', 'romainbrou225@gmail.com', '0747257377', 'CI', 'Abidjan', '4748', 'personne physique', 'myapp/storage/app/public/Identity/nGOhI4KPO1p3q6cvqGRQNChrdlhTo3HUC4SHuTEs.jpg', 'demarcheur', NULL, 0, '2022-08-18 12:12:21', '2022-08-18 12:12:21'),
(46, 'KOUAME', 'alexis_kouame@ymail.com', '2250749415960', 'CI', 'Abidjan', '4949', 'personne physique', 'myapp/storage/app/public/Identity/jOFuLNNrDSTZbEdIXsOb4HaDqVpPnI7MXhHsMnt6.jpg', 'agent immobilier', NULL, 0, '2022-08-18 12:12:36', '2022-08-18 12:12:36'),
(47, 'DJI', 'supercoachci@gmail.com', '2250707430277', 'CI', 'Abidjan', '3531', 'personne morale', 'myapp/storage/app/public/Identity/77PMjCxW8lMWyXwnzOEiAlETC1EUO5RMzIHa7UVU.pdf', 'agent immobilier', NULL, 0, '2022-08-18 12:18:38', '2022-08-18 12:18:38'),
(48, 'Sinan Souleymane', 's2ici.info@gmail.com', '0556612676', 'CI', 'Abidjan', '2026', 'personne physique', 'myapp/storage/app/public/Identity/kCAZkQNHVi3zdYOk9Az0QpmlsKc8HHOP70HgyUKP.jpg', 'agence non agree', NULL, 1, '2022-08-18 12:39:54', '2022-08-18 12:39:54'),
(49, 'N\'da koffi Romaric Ben', 'benkoffi473@gmail.com', '0576808121', 'CI', 'Abidjan', '3444', 'personne physique', 'myapp/storage/app/public/Identity/X6iIzz0Oj8JDYVE3AxAaXInZmJUaW4F8pXnhfLHw.jpg', 'demarcheur', NULL, 0, '2022-08-18 12:40:19', '2022-08-18 12:40:19'),
(50, 'Sinan Souleymane', 'skouamesinan@yahoo.fr', '0556612676', 'CI', 'Abidjan', '3848', 'personne physique', 'myapp/storage/app/public/Identity/ejgQdfamCJge3rh3MXRpbH5boVbUEaFFZjpO9T3V.jpg', 'agent immobilier', NULL, 1, '2022-08-18 12:48:25', '2022-08-18 12:48:25'),
(51, 'Aly fofana', 'Sauronimmblier1@gmail.com', '0022370273101', 'CI', 'Abidjan', '2784', 'personne morale', 'myapp/storage/app/public/Identity/TNWRxT3DAEIiwcNlJEmiIWgopB4WrZMOYSIvS23Z.jpg', 'agent immobilier', NULL, 0, '2022-08-18 12:48:53', '2022-08-18 12:48:53'),
(52, 'Mardochée Tahi Alla', 'tahimardoche05@gmail.com', '0789183393', 'CI', 'Abidjan', '4828', 'personne physique', 'myapp/storage/app/public/Identity/GajYsNk0V2JipPXlowmuHm8OAgpDj6yPQ9Jm4mZw.jpg', 'demarcheur', NULL, 0, '2022-08-18 13:08:11', '2022-08-18 13:08:11'),
(53, 'BAKARAMOGO MEITE', 'meitebakaramogo20@gmail.com', '0651421107', 'CI', 'Abidjan', '4992', 'personne physique', 'myapp/storage/app/public/Identity/U0LfIlJEnUCWdwRWfCygIKvryZ0c8zvkD0MeN5M8.txt', 'demarcheur', NULL, 0, '2022-08-18 13:22:50', '2022-08-18 13:22:50'),
(54, 'WILLY BECO', 'willybeco1226@gmail.com', '0758141343', 'CI', 'Abidjan', '4222', 'personne physique', 'myapp/storage/app/public/Identity/pVL2WJnng9opbdHk8aIH58CCqnmW07LW30PRbYAb.jpg', 'demarcheur', NULL, 0, '2022-08-18 13:31:01', '2022-08-18 13:31:01'),
(55, 'Toure Aboubakar', 'docteurtou80@gmail.com', '0708530487', 'CI', 'Abidjan', '2284', 'personne physique', 'myapp/storage/app/public/Identity/lsTd5JrLIR6c8MIJFaxs7JuO1zsvWhHKK3Fy4MF8.pdf', 'demarcheur', NULL, 0, '2022-08-18 13:37:34', '2022-08-18 13:37:34'),
(56, 'FRANCOISE', 'somobat.immo@gmail.com', '0150758989', 'CI', 'Abidjan', '3902', 'personne physique', 'myapp/storage/app/public/Identity/siObYBzKlYyt5NoS7HJoulof010u534hugqEboR8.jpg', 'agence non agree', NULL, 0, '2022-08-18 13:42:36', '2022-08-18 13:42:36'),
(57, 'Joyce kouadio', 'kouadiojoceline90@gmail.com', '0778450879', 'CI', 'Abidjan', '4606', 'personne physique', 'myapp/storage/app/public/Identity/tks9IVdR09Otm5M85YOeDPO1uazVAIafwXxYzMPR.jpg', 'agent immobilier', NULL, 0, '2022-08-18 16:07:47', '2022-08-18 16:07:47'),
(58, 'Bamba FATOUMATA', 'safinour063@gmail.com', '0758087095', 'CI', 'Abidjan', '4692', 'personne physique', 'myapp/storage/app/public/Identity/KSIReIerBAuUiwUkoyIw33ER58BJyveyxtzzeN01.jpg', 'agent immobilier', NULL, 0, '2022-08-18 18:08:50', '2022-08-18 18:08:50'),
(59, 'Abel Lionel', 'lionelabel8@gmail.com', '0141166558', 'CI', 'Abidjan', '3937', 'personne physique', 'myapp/storage/app/public/Identity/W9KiaNd3RY3SSwR8XZXM6hHNvFCBOQZr0CzobUUU.pdf', 'agent immobilier', NULL, 0, '2022-08-18 22:19:02', '2022-08-18 22:19:02'),
(60, 'mabea', 'maxmabea@yahoo.fr', '0141954409', 'CI', 'Abidjan', '3683', 'personne physique', 'myapp/storage/app/public/Identity/j6ay15eIXniMElCtKmJA1Y7JPvE4zhCr3xZ1fmB5.jpg', 'demarcheur', NULL, 0, '2022-08-19 02:23:48', '2022-08-19 02:23:48'),
(61, 'SANGARE', 'Ismaelsangare165@gmail.com', '0788387474', 'CI', 'Abidjan', '4174', 'personne physique', 'myapp/storage/app/public/Identity/nvgUL8d9nEvABBpffzmhg7NHk5k6ROuTQczxvGlP.jpg', 'demarcheur', NULL, 0, '2022-08-19 07:14:22', '2022-08-19 07:14:22'),
(62, 'Aka', 'Kgsimmobilier225@gmail.com', '0506821148', 'CI', 'Abidjan', '2208', 'personne physique', 'myapp/storage/app/public/Identity/yDrV0W6GAFIvq9YErz8vBmzWt7xsDVUzCmy7xI4F.jpg', 'agent immobilier', NULL, 0, '2022-08-19 07:51:19', '2022-08-19 07:51:19'),
(63, 'CAMARA GNINKITA', 'camaragninkita08@gmail.com', '0758843571', 'CI', 'Abidjan', '2058', 'personne physique', 'myapp/storage/app/public/Identity/vt17xQgeglJzspVdDdtMKUarewc1lJOypQF4jTz5.jpg', 'demarcheur', NULL, 0, '2022-08-19 12:25:20', '2022-08-19 12:25:20'),
(65, 'KOUABENA ALAIN BREDOU', 'alain.bredou@gmail.com', '0768287787', 'CI', 'Abidjan', '2800', 'personne physique', 'myapp/storage/app/public/Identity/ebeQtPaLTjIkunZ9Wa3Ro8Y2JioSX8DYkbT7v4KC.jpg', 'demarcheur', NULL, 0, '2022-08-20 19:24:31', '2022-08-20 19:24:31'),
(66, 'Touré Mamadou', 'toure7425@gmail.com', '0546682453', 'CI', 'Abidjan', '3034', 'personne physique', 'myapp/storage/app/public/Identity/r0sA6fFa0dH9zTMR2pq2duzfzqE0YzctKwk2Xc8e.jpg', 'agence non agree', NULL, 0, '2022-08-21 09:06:17', '2022-08-21 09:06:17'),
(67, 'KOUAME', 'kouamezechiel@gmail.com', '0556548150', 'CI', 'Abidjan', '4508', 'personne physique', 'myapp/storage/app/public/Identity/zBTRBZmNhNGLTM5ziodIFQuzPbuZFqO1BWqV4O3v.jpg', 'agent immobilier', NULL, 0, '2022-08-22 10:37:01', '2022-08-22 10:37:01'),
(68, 'DREAM OFFICE', 'dreamoffice1901@gmail.com', '2735985608', 'CI', 'Abidjan', '2698', 'personne morale', 'myapp/storage/app/public/Identity/MSTWHwYDKiMFKOqcawKFGhkA85aZHdsbXvqO0jON.jpg', 'agence non agree', NULL, 0, '2022-08-22 14:05:05', '2022-08-22 14:05:05'),
(70, 'Ouattara', 'ouattaramoumin58@gmail.com', '0151699610', 'CI', 'Abidjan', '2054', 'personne physique', 'myapp/storage/app/public/Identity/RlDdskWYXQMhUhep4iLDiRQiDx2tl6u0ugB5ggbg.jpg', 'demarcheur', NULL, 0, '2022-08-22 16:41:33', '2022-08-22 16:41:33'),
(71, 'Sci Oikodomeo', 'Commercial@oikodomeo.fr', '0702606428', 'CI', 'Abidjan', '4072', 'personne morale', 'myapp/storage/app/public/Identity/vmQXVjlPaPEIlVoH0mdyiCMHG0GBVnoCUsmj4HDp.pdf', 'agence non agree', NULL, 0, '2022-08-22 17:21:41', '2022-08-22 17:21:41'),
(72, 'B.C immobilier', 'infobusinesscenter225@gmail.com', '0748747306', 'CI', 'Abidjan', '3454', 'personne morale', 'myapp/storage/app/public/Identity/zn8FRiN2yntlhfwTtDronok5b0kgWCBuNupwSmgF.jpg', 'agence non agree', NULL, 0, '2022-08-22 18:07:54', '2022-08-22 18:07:54'),
(73, 'Djenzou Loukou Dominique', 'midelservices1135@gmail.com', '0709996777', 'CI', 'Abidjan', '2295', 'personne physique', 'myapp/storage/app/public/Identity/9YEiknt21OxY4LseGe8Y0Mi6LLVp1NDHo0tNlbNu.jpg', 'demarcheur', NULL, 0, '2022-08-23 09:26:17', '2022-08-23 09:26:17'),
(74, 'SCI OIKODOMEO', 's.technique@sci-oikodomeo.fr', '0702606428', 'CI', 'Abidjan', '2718', 'personne morale', 'myapp/storage/app/public/Identity/jF5RZO6RHPvYT2mGSrzTpXafcqxtdndL0J8tLshe.pdf', 'agence non agree', NULL, 0, '2022-08-23 09:58:32', '2022-08-23 09:58:32'),
(75, 'BOTI  Lou Koablé Aimée-Claudia', 'aimeclo@live.fr', '0708344251', 'CI', 'Abidjan', '3221', 'personne physique', 'myapp/storage/app/public/Identity/oFHDkhEKxxU1PxHd3XxPsUaT9y92zadgKfLFGEzv.jpg', 'agent immobilier', NULL, 0, '2022-08-23 11:37:33', '2022-08-23 11:37:33'),
(76, 'Kone Aboubacar', 'mkgroup743@gmail.com', '0546961866', 'CI', 'Abidjan', '2485', 'personne physique', 'myapp/storage/app/public/Identity/UDb0Qtu2BxirVxuCLq6QceuYKirq8SUZDtBxwKV2.jpg', 'agent immobilier', NULL, 0, '2022-08-23 12:12:22', '2022-08-23 12:12:22'),
(77, 'KOUAKOU Mariette', 'kouakoumariette@gmail.com', '0708638453', 'CI', 'Abidjan', '3729', 'personne morale', 'myapp/storage/app/public/Identity/OCTnFQVD9JwjMq13wcrnz6LNBWxF3M3CtizfRVzC.png', 'agence non agree', NULL, 0, '2022-08-23 12:25:23', '2022-08-23 12:25:23'),
(78, 'KOUASSI KOUADIO SIDOINE', 'kouadiosidoine.kouassi.7@gmail.com', '0749252853', 'CI', 'Abidjan', '4132', 'personne physique', 'myapp/storage/app/public/Identity/lLGbNbRuiKwFU6WpIpmGwjosrCdHLVrCPj1gxNwK.pdf', 'particulier', NULL, 0, '2022-08-23 16:40:50', '2022-08-23 16:40:50'),
(79, 'GONAHI', 'gonahiravel@gmail.com', '0747548266', 'CI', 'Abidjan', '4386', 'personne physique', 'myapp/storage/app/public/Identity/dmpMLfsbFDPYd9Nv70PMBBTdsGznsBtZvJxOvMwx.pdf', 'agent immobilier', NULL, 0, '2022-08-24 11:20:39', '2022-08-24 11:20:39'),
(80, 'KOSSONOU Fabrice', 'fabricekossonou@yahoo.fr', '0709310605', 'CI', 'Abidjan', '4712', 'personne physique', 'myapp/storage/app/public/Identity/0P9NNTBcP4V9AIe1rj5XsostnOIsc9DEAkOyHS70.jpg', 'demarcheur', NULL, 0, '2022-08-24 12:02:26', '2022-08-24 12:02:26'),
(81, 'Sioblo Marie Clotilde', 'mcnsioblo@gmail.com', '0707986142', 'CI', 'Abidjan', '2241', 'personne physique', 'myapp/storage/app/public/Identity/OMMSIAD4iDHqjasuz2n0Xmb33HlsFW1XALE8BS22.jpg', 'particulier', NULL, 0, '2022-08-24 13:52:46', '2022-08-24 13:52:46'),
(84, 'Herman Gnangbé', 'gnangbe2006@gmail.com', '0709771757', 'CI', 'Abidjan', '4415', 'personne morale', 'myapp/storage/app/public/Identity/8vCCvXgOYwOhshfFN8fKtALHbChr9MOwiVCjBdkN.png', 'agence non agree', NULL, 0, '2022-08-25 09:28:50', '2022-08-25 09:28:50'),
(85, 'ATIKPO', 'atikpojeanclaude6@gmail.com', '0594152702', 'CI', 'Abidjan', '2555', 'personne physique', 'myapp/storage/app/public/Identity/Nz1heoEAoQfnTUHMSBfHFKjufrRUesjPJKuCxbSw.jpg', 'particulier', NULL, 0, '2022-08-26 07:14:01', '2022-08-26 07:14:01'),
(86, 'ATCHIN KOBENAN', 'atchinkobenan@yahoo.fr', '0758364536', 'CI', 'Abidjan', '3251', 'personne physique', 'myapp/storage/app/public/Identity/m2301i6tbh6svSZyUz6fAxkC3TpMa8g6PTFNh0Or.jpg', 'particulier', NULL, 0, '2022-08-27 21:17:56', '2022-08-27 21:17:56'),
(87, 'Tan Gogbeu Hervé', 'gogbeuherve@gmail.com', '0759718977', 'CI', 'Abidjan', '4991', 'personne physique', 'myapp/storage/app/public/Identity/0i3YlkDmG9VxN7NaMlNhtwu68lA5EaI41YDKoGOa.pdf', 'agent immobilier', NULL, 0, '2022-08-29 11:51:40', '2022-08-29 11:51:40'),
(88, 'Gode Jean Serge', 'gjeanserge@gmail.com', '0777279274', 'CI', 'Abidjan', '3981', 'personne physique', 'myapp/storage/app/public/Identity/GnkuT8v7raWripAAAV87wBDCYCJ1cR9BgARfxFVO.jpg', 'demarcheur', NULL, 0, '2022-08-29 17:22:28', '2022-08-29 17:22:28'),
(89, 'SINDJALIM EDJADETCHAM', 'edjadehenry@gmail.com', '0708858764', 'CI', 'Abidjan', '4288', 'personne physique', 'myapp/storage/app/public/Identity/mpyw29PUKSc8cUBAXWeb4boGe3YqHGLr5qDhCj5S.jpg', 'demarcheur', NULL, 0, '2022-08-30 18:55:32', '2022-08-30 18:55:32'),
(90, 'N\'GOESSE', 'jeaneudesngoesse@gmail.com', '0759894619', 'CI', 'Abidjan', '4374', 'personne physique', 'myapp/storage/app/public/Identity/kqjow841H7jWn38AKslvmRrDwVw3ocAwmDCh7zFi.jpg', 'demarcheur', NULL, 0, '2022-08-30 23:43:18', '2022-08-30 23:43:18'),
(91, 'Sewon edwige tia', 'aweyimmobilier@gmail.com', '0709129613', 'CI', 'Abidjan', '2433', 'personne physique', 'myapp/storage/app/public/Identity/XFZbAVM6CwPM5hJ2PsfL65KRxLMYL2IF4sUJ3iC0.jpg', 'agent immobilier', NULL, 0, '2022-09-01 10:00:55', '2022-09-01 10:00:55'),
(92, 'Kraidi', 'ydiarkalex@gmail.com', '0505632365', 'CI', 'Abidjan', '2114', 'personne physique', 'myapp/storage/app/public/Identity/yzoAVJnTqVv5lgGnfmBxQaaxeTAKBJ56Srk90BvL.jpg', 'demarcheur', NULL, 0, '2022-09-01 13:30:09', '2022-09-01 13:30:09'),
(93, 'Kouadio Alfred', 'alfredkouadio083@gmail.com', '0141537903', 'CI', 'Abidjan', '4431', 'personne physique', 'myapp/storage/app/public/Identity/4YbtevUusvPXqEUdsLqE46eP9DEryzJUejiMg8zR.jpg', 'demarcheur', NULL, 0, '2022-09-06 09:12:47', '2022-09-06 09:12:47'),
(94, 'Bonkoungou payangde junior', 'juniorbonkoungou1@gmail.com', '0505934926', 'CI', 'Abidjan', '2778', 'personne physique', 'myapp/storage/app/public/Identity/bLBN2s73UdS6JoBFx80QIYtievMgGL1QLFJYWIs0.jpg', 'agent immobilier', NULL, 0, '2022-09-06 11:01:16', '2022-09-06 11:01:16');

-- --------------------------------------------------------

--
-- Structure de la table `lograpid`
--

CREATE TABLE `lograpid` (
  `idlograpid` int(11) NOT NULL,
  `biens_clientsID` text NOT NULL,
  `datevisite` text NOT NULL,
  `statut` text NOT NULL,
  `amount` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `marchands`
--

CREATE TABLE `marchands` (
  `idmarchand` int(11) NOT NULL,
  `nom` text NOT NULL,
  `phone` text NOT NULL,
  `mail` text NOT NULL,
  `pays` text NOT NULL,
  `ville` text NOT NULL,
  `pass` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `idpaiements` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `idpays` int(11) NOT NULL,
  `pays` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`idpays`, `pays`, `created_at`, `updated_at`) VALUES
(1, 'Côte d\'ivoire', '2022-02-26 07:52:50', '2022-02-26 07:52:50'),
(2, 'République du Congo', '2022-08-18 09:37:58', '2022-08-18 09:37:58'),
(3, 'Burkina Faso', '2022-08-18 10:42:43', '2022-08-18 10:42:43'),
(4, 'Cameroun', '2022-08-18 10:46:08', '2022-08-18 10:46:08'),
(5, 'Gabon', '2022-08-18 10:46:42', '2022-08-18 10:46:42'),
(6, 'Ghana', '2022-08-18 10:47:33', '2022-08-18 10:47:33');

-- --------------------------------------------------------

--
-- Structure de la table `quartiers`
--

CREATE TABLE `quartiers` (
  `idquartier` int(11) NOT NULL,
  `nom` text NOT NULL,
  `villesid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `quartiers`
--

INSERT INTO `quartiers` (`idquartier`, `nom`, `villesid`, `created_at`, `updated_at`) VALUES
(1, 'Abobo', 1, '2022-04-27 12:57:31', '2022-04-27 12:57:31'),
(2, 'Cocody', 1, '2022-05-31 12:57:46', '2022-05-31 12:57:46'),
(3, 'Koumassi', 1, '2022-05-31 12:58:06', '2022-05-31 12:58:06'),
(4, 'Marcory', 1, '2022-05-31 12:58:40', '2022-05-31 12:58:40'),
(5, 'Adjamé', 1, '2022-05-31 13:01:02', '2022-05-31 13:01:02'),
(6, 'Port-bouet', 1, '2022-05-31 13:01:30', '2022-05-31 13:01:30'),
(7, 'Yopougon', 1, '2022-05-31 13:01:42', '2022-05-31 13:01:42'),
(8, 'Treichville', 1, '2022-05-31 13:02:45', '2022-05-31 13:02:45'),
(9, 'Anyama', 1, '2022-05-31 13:03:15', '2022-05-31 13:03:15'),
(11, 'Bingerville', 1, '2022-05-31 13:04:35', '2022-05-31 13:04:35'),
(12, 'soubiakro', 2, '2022-08-11 15:41:09', '2022-08-11 15:41:09'),
(13, 'Cafop 1, Nouvelle CIE', 3, '2022-08-11 15:48:24', '2022-08-11 15:48:24'),
(14, 'Koumassi cité adoha', 1, '2022-08-12 00:20:47', '2022-08-12 00:20:47'),
(15, 'Angre nouveau chu gestoci', 1, '2022-08-12 09:36:16', '2022-08-12 09:36:16'),
(16, 'quartier Modeste Grand Bassam', 3, '2022-08-12 10:31:11', '2022-08-12 10:31:11'),
(17, 'jacqueville  derrière la société Sicor', 4, '2022-08-12 11:36:50', '2022-08-12 11:36:50'),
(18, 'agbakro', 2, '2022-08-12 12:54:13', '2022-08-12 12:54:13'),
(19, 'Toumodi', 5, '2022-08-12 13:50:01', '2022-08-12 13:50:01'),
(20, 'Bouaké', 6, '2022-08-12 13:59:48', '2022-08-12 13:59:48'),
(21, 'Angré Chateau', 1, '2022-08-12 14:09:05', '2022-08-12 14:09:05'),
(22, 'Point carre', 6, '2022-08-12 14:18:53', '2022-08-12 14:18:53'),
(23, 'Riviera palmeraie', 1, '2022-08-12 15:32:53', '2022-08-12 15:32:53'),
(24, 'Angré Château Cité Orange', 1, '2022-08-12 21:19:50', '2022-08-12 21:19:50'),
(25, 'Soumalekro', 7, '2022-08-13 11:48:27', '2022-08-13 11:48:27'),
(26, 'bassam', 3, '2022-08-13 12:14:53', '2022-08-13 12:14:53'),
(27, 'quartier Avagou', 4, '2022-08-15 10:43:19', '2022-08-15 10:43:19'),
(28, 'Baie des sirènes', 3, '2022-08-15 11:14:27', '2022-08-15 11:14:27'),
(29, 'Feh Kesse', 8, '2022-08-15 11:24:49', '2022-08-15 11:24:49'),
(30, 'Basilique', 2, '2022-08-16 11:39:53', '2022-08-16 11:39:53'),
(31, 'Cité Administrative', 2, '2022-08-16 11:45:51', '2022-08-16 11:45:51'),
(32, 'Dioulakro', 2, '2022-08-16 11:46:15', '2022-08-16 11:46:15'),
(33, 'Sopim', 2, '2022-08-16 11:47:51', '2022-08-16 11:47:51'),
(34, 'Cafop', 2, '2022-08-16 11:48:00', '2022-08-16 11:48:00'),
(35, 'Zone industriel', 2, '2022-08-16 11:49:00', '2022-08-16 11:49:00'),
(36, 'Quartier Résidensiel', 2, '2022-08-16 11:49:36', '2022-08-16 11:49:36'),
(37, 'quartier residentiel F.H.B', 2, '2022-08-16 11:50:05', '2022-08-16 11:50:05'),
(38, 'quartier N\'zuessi', 2, '2022-08-16 11:50:51', '2022-08-16 11:50:51'),
(39, 'quartier N\'gokro', 2, '2022-08-16 11:51:12', '2022-08-16 11:51:12'),
(40, 'quartier morofe', 2, '2022-08-16 11:53:04', '2022-08-16 11:53:04'),
(41, 'quartier kpangbassou', 2, '2022-08-16 11:53:32', '2022-08-16 11:53:32'),
(42, 'quartier kokreno', 2, '2022-08-16 11:53:49', '2022-08-16 11:53:49'),
(43, 'Attécoubé', 1, '2022-08-16 11:55:49', '2022-08-16 11:55:49'),
(44, 'danané', 64, '2022-08-16 12:08:24', '2022-08-16 12:08:24'),
(45, 'guiglo', 63, '2022-08-16 12:08:38', '2022-08-16 12:08:38'),
(46, 'tingréla', 62, '2022-08-16 12:09:00', '2022-08-16 12:09:00'),
(47, 'duékoué', 61, '2022-08-16 12:09:18', '2022-08-16 12:09:18'),
(48, 'abengourou', 9, '2022-08-16 12:09:34', '2022-08-16 12:09:34'),
(49, 'aboisso', 10, '2022-08-16 12:09:45', '2022-08-16 12:09:45'),
(50, 'adzopé', 15, '2022-08-16 12:09:58', '2022-08-16 12:09:58'),
(51, 'agboville', 17, '2022-08-16 12:10:13', '2022-08-16 12:10:13'),
(52, 'agnibilékrou', 18, '2022-08-16 12:10:35', '2022-08-16 12:10:35'),
(53, 'akouédo', 21, '2022-08-16 12:10:49', '2022-08-16 12:10:49'),
(54, 'afféry', 25, '2022-08-16 12:11:02', '2022-08-16 12:11:02'),
(55, 'babakro', 26, '2022-08-16 12:11:14', '2022-08-16 12:11:14'),
(56, 'bacanda', 27, '2022-08-16 12:11:29', '2022-08-16 12:11:29'),
(57, 'béoumi', 32, '2022-08-16 12:13:13', '2022-08-16 12:13:13'),
(58, 'akoupé', 33, '2022-08-16 12:13:26', '2022-08-16 12:13:26'),
(59, 'alépé', 34, '2022-08-16 12:13:48', '2022-08-16 12:13:48'),
(60, 'tabou', 36, '2022-08-16 12:14:20', '2022-08-16 12:14:20'),
(61, 'boundiali', 37, '2022-08-16 12:14:40', '2022-08-16 12:14:40'),
(62, 'daloa', 38, '2022-08-16 12:14:54', '2022-08-16 12:14:54'),
(63, 'san-pedro', 39, '2022-08-16 12:15:07', '2022-08-16 12:15:07'),
(64, 'grand-bassam', 46, '2022-08-16 12:15:26', '2022-08-16 12:15:26'),
(65, 'man', 42, '2022-08-16 12:15:44', '2022-08-16 12:15:44'),
(66, 'odiéné', 60, '2022-08-16 12:25:20', '2022-08-16 12:25:20'),
(67, 'dimbokro', 59, '2022-08-16 12:25:36', '2022-08-16 12:25:36'),
(68, 'ferkessedougou', 58, '2022-08-16 12:25:56', '2022-08-16 12:25:56'),
(69, 'oumé', 57, '2022-08-16 12:26:07', '2022-08-16 12:26:07'),
(70, 'séguéla', 56, '2022-08-16 12:26:37', '2022-08-16 12:26:37'),
(71, 'daoukro', 55, '2022-08-16 12:26:48', '2022-08-16 12:26:48'),
(72, 'vavoua', 54, '2022-08-16 12:27:15', '2022-08-16 12:27:15'),
(73, 'Zuénoula', 53, '2022-08-16 12:27:35', '2022-08-16 12:27:35'),
(74, 'tiassalé', 52, '2022-08-16 12:27:58', '2022-08-16 12:27:58'),
(75, 'lakota', 51, '2022-08-16 12:28:10', '2022-08-16 12:28:10'),
(76, 'katiola', 50, '2022-08-16 12:28:39', '2022-08-16 12:28:39'),
(77, 'issia', 48, '2022-08-16 12:28:47', '2022-08-16 12:28:47'),
(78, 'simfra', 49, '2022-08-16 12:29:13', '2022-08-16 12:29:13'),
(79, 'bouaflé', 47, '2022-08-16 12:29:40', '2022-08-16 12:29:40'),
(80, 'dabou', 45, '2022-08-16 12:32:04', '2022-08-16 12:32:04'),
(81, 'soubré', 44, '2022-08-16 12:32:25', '2022-08-16 12:32:25'),
(82, 'gagnoa', 43, '2022-08-16 12:32:48', '2022-08-16 12:32:48'),
(83, 'korhogo', 41, '2022-08-16 12:33:22', '2022-08-16 12:33:22'),
(84, 'divo', 40, '2022-08-16 12:33:39', '2022-08-16 12:33:39'),
(85, 'eloka', 8, '2022-08-16 13:35:23', '2022-08-16 13:35:23'),
(86, 'elokate', 8, '2022-08-16 13:35:54', '2022-08-16 13:35:54'),
(87, 'Brazzaville', 65, '2022-08-18 09:40:01', '2022-08-18 09:40:01'),
(88, 'Centre ville', 65, '2022-08-18 11:42:25', '2022-08-18 11:42:25'),
(89, 'Plateau de 15 ans', 65, '2022-08-18 11:42:51', '2022-08-18 11:42:51'),
(90, 'Batignolles', 65, '2022-08-18 11:43:13', '2022-08-18 11:43:13'),
(91, 'OCH', 65, '2022-08-18 11:43:24', '2022-08-18 11:43:24'),
(92, 'Moungali', 65, '2022-08-18 11:43:34', '2022-08-18 11:43:34'),
(93, 'Poto - Poto', 65, '2022-08-18 11:43:55', '2022-08-18 11:43:55'),
(94, 'Bacongo', 65, '2022-08-18 11:45:06', '2022-08-18 11:45:06'),
(95, 'Diata', 65, '2022-08-18 11:45:21', '2022-08-18 11:45:21'),
(96, 'La Glacière', 65, '2022-08-18 11:45:34', '2022-08-18 11:45:34'),
(97, 'Ouenzé', 65, '2022-08-18 11:45:46', '2022-08-18 11:45:46'),
(98, 'Kintélé', 65, '2022-08-18 11:45:59', '2022-08-18 11:45:59'),
(99, 'Mfilou', 65, '2022-08-18 11:46:10', '2022-08-18 11:46:10'),
(100, 'Nkombo', 65, '2022-08-18 11:46:25', '2022-08-18 11:46:25'),
(101, 'Talangaï', 65, '2022-08-18 11:46:36', '2022-08-18 11:46:36'),
(102, 'Mpila', 65, '2022-08-18 11:46:52', '2022-08-18 11:46:52'),
(103, 'La Poudrière', 65, '2022-08-18 11:47:02', '2022-08-18 11:47:02'),
(104, 'Moukondo', 65, '2022-08-18 11:47:11', '2022-08-18 11:47:11'),
(105, 'bonoua', 69, '2022-08-18 13:11:17', '2022-08-18 13:11:17'),
(106, 'Asecna', 65, '2022-08-18 15:38:25', '2022-08-18 15:38:25'),
(107, 'Bifouiti', 65, '2022-08-18 15:38:37', '2022-08-18 15:38:37'),
(108, 'Camp Clairon', 65, '2022-08-18 15:38:51', '2022-08-18 15:38:51'),
(109, 'Château d\'eau', 65, '2022-08-18 15:39:00', '2022-08-18 15:39:00'),
(110, 'Cité de 17', 65, '2022-08-18 15:39:09', '2022-08-18 15:39:09'),
(111, 'Camp de Flamboyants', 65, '2022-08-18 15:39:24', '2022-08-18 15:39:24'),
(112, 'La Base', 65, '2022-08-18 15:39:34', '2022-08-18 15:39:34'),
(113, 'Mafouta', 65, '2022-08-18 15:39:45', '2022-08-18 15:39:45'),
(114, 'Manianga', 65, '2022-08-18 15:39:57', '2022-08-18 15:39:57'),
(115, 'Makabandilou', 65, '2022-08-18 15:40:10', '2022-08-18 15:40:10'),
(116, 'Massengo', 65, '2022-08-18 15:40:20', '2022-08-18 15:40:20'),
(117, 'Makélékélé', 65, '2022-08-18 15:40:33', '2022-08-18 15:40:33'),
(118, 'OMS', 65, '2022-08-18 15:40:49', '2022-08-18 15:40:49'),
(119, 'Bonzi', 2, '2022-08-18 15:52:15', '2022-08-18 15:52:15'),
(120, 'Mikalou-Lycée', 65, '2022-08-22 13:07:26', '2022-08-22 13:07:26'),
(121, 'Abdoulayékro', 46, '2022-08-23 10:48:19', '2022-08-23 10:48:19'),
(122, 'Aboikro', 46, '2022-08-23 10:48:44', '2022-08-23 10:48:44'),
(123, 'Île Bouët', 46, '2022-08-23 10:49:25', '2022-08-23 10:49:25'),
(124, 'Île Vitré', 46, '2022-08-23 10:49:35', '2022-08-23 10:49:35'),
(125, 'Mohamé', 46, '2022-08-23 10:50:04', '2022-08-23 10:50:04'),
(126, 'Quartier France', 46, '2022-08-23 10:50:19', '2022-08-23 10:50:19'),
(127, 'Adihao', 46, '2022-08-23 10:50:35', '2022-08-23 10:50:35'),
(128, 'Adjékro', 46, '2022-08-23 10:50:46', '2022-08-23 10:50:46'),
(129, 'Akroaba Akoudjekoa', 46, '2022-08-23 10:50:55', '2022-08-23 10:50:55'),
(130, 'Allowéuré', 46, '2022-08-23 10:51:04', '2022-08-23 10:51:04'),
(131, 'Amicoukro', 46, '2022-08-23 10:51:14', '2022-08-23 10:51:14'),
(132, 'Bato', 46, '2022-08-23 10:51:23', '2022-08-23 10:51:23'),
(133, 'Bongo', 46, '2022-08-23 10:51:31', '2022-08-23 10:51:31'),
(134, 'Bongo Deux', 46, '2022-08-23 10:51:44', '2022-08-23 10:51:44'),
(135, 'Bongo-Village', 46, '2022-08-23 10:51:52', '2022-08-23 10:51:52'),
(136, 'Ekressinville', 46, '2022-08-23 10:56:41', '2022-08-23 10:56:41'),
(137, 'Elomoudjé', 46, '2022-08-23 10:57:02', '2022-08-23 10:57:02'),
(138, 'Galoua', 46, '2022-08-23 10:57:10', '2022-08-23 10:57:10'),
(139, 'Ingarako', 46, '2022-08-23 10:57:22', '2022-08-23 10:57:22'),
(140, 'Kladikro', 46, '2022-08-23 10:57:31', '2022-08-23 10:57:31'),
(141, 'Kodjoboué', 46, '2022-08-23 10:57:41', '2022-08-23 10:57:41'),
(142, 'Kouanoukro', 46, '2022-08-23 10:57:51', '2022-08-23 10:57:51'),
(143, 'Larabia', 46, '2022-08-23 10:57:59', '2022-08-23 10:57:59'),
(144, 'Mondoukou', 46, '2022-08-23 10:58:09', '2022-08-23 10:58:09'),
(145, 'Moossou', 46, '2022-08-23 10:58:18', '2022-08-23 10:58:18'),
(146, 'Niaoua', 46, '2022-08-23 10:58:30', '2022-08-23 10:58:30'),
(147, 'Onioneouango', 46, '2022-08-23 10:58:40', '2022-08-23 10:58:40'),
(148, 'Ono', 46, '2022-08-23 10:58:47', '2022-08-23 10:58:47'),
(149, 'Ono Salci', 46, '2022-08-23 10:58:55', '2022-08-23 10:58:55'),
(150, 'Petit Paris', 46, '2022-08-23 10:59:03', '2022-08-23 10:59:03'),
(151, 'Quartier Phare', 46, '2022-08-23 10:59:11', '2022-08-23 10:59:11'),
(152, 'Rosier', 46, '2022-08-23 10:59:19', '2022-08-23 10:59:19'),
(153, 'Samo', 46, '2022-08-23 10:59:29', '2022-08-23 10:59:29'),
(154, 'Valhamba', 46, '2022-08-23 10:59:38', '2022-08-23 10:59:38'),
(155, 'Tchantchévè', 46, '2022-08-23 10:59:45', '2022-08-23 10:59:45'),
(156, 'Village Padre Pio', 46, '2022-08-23 11:00:04', '2022-08-23 11:00:04'),
(157, 'Vitré Deux', 46, '2022-08-23 11:00:12', '2022-08-23 11:00:12'),
(158, 'Vitré Un', 46, '2022-08-23 11:00:19', '2022-08-23 11:00:19'),
(159, 'Wehou', 46, '2022-08-23 11:00:31', '2022-08-23 11:00:31'),
(160, 'Yaou', 46, '2022-08-23 11:00:37', '2022-08-23 11:00:37'),
(161, '8e et 9e tranche', 1, '2022-08-23 11:04:02', '2022-08-23 11:04:02'),
(162, 'Lycée Technique', 1, '2022-08-23 11:04:11', '2022-08-23 11:04:11'),
(163, 'Aghien', 1, '2022-08-23 11:04:20', '2022-08-23 11:04:20'),
(164, 'Ambassade', 1, '2022-08-23 11:04:39', '2022-08-23 11:04:39'),
(165, 'Blockauss', 1, '2022-08-23 11:04:48', '2022-08-23 11:04:48'),
(166, 'Angré', 1, '2022-08-23 11:04:54', '2022-08-23 11:04:54'),
(167, 'Bonoumin', 1, '2022-08-23 11:05:09', '2022-08-23 11:05:09'),
(168, 'Caféier', 1, '2022-08-23 11:05:21', '2022-08-23 11:05:21'),
(169, 'Camp Militaire', 1, '2022-08-23 11:05:28', '2022-08-23 11:05:28'),
(170, 'Deux Plateaux', 1, '2022-08-23 11:05:41', '2022-08-23 11:05:41'),
(171, 'Djibi', 1, '2022-08-23 11:05:49', '2022-08-23 11:05:49'),
(172, 'Djorogobité', 1, '2022-08-23 11:05:55', '2022-08-23 11:05:55'),
(173, 'Gendarmerie Agban', 1, '2022-08-23 11:06:06', '2022-08-23 11:06:06'),
(174, 'Genie 2000', 1, '2022-08-23 11:06:14', '2022-08-23 11:06:14'),
(175, 'Vieux Cocody', 1, '2022-08-23 11:06:20', '2022-08-23 11:06:20'),
(176, 'Riviéra Bonoumin', 1, '2022-08-23 11:06:27', '2022-08-23 11:06:27'),
(177, 'RTI', 1, '2022-08-23 11:06:32', '2022-08-23 11:06:32'),
(178, 'Quartier résidentiel', 6, '2022-08-23 13:13:25', '2022-08-23 13:13:25'),
(179, 'Quartier belle-ville 2', 6, '2022-08-23 13:14:18', '2022-08-23 13:14:18'),
(180, 'Quartier Ahougnassou', 6, '2022-08-23 13:14:31', '2022-08-23 13:14:31'),
(181, 'Quartier Cité de l\'air', 6, '2022-08-23 13:14:44', '2022-08-23 13:14:44'),
(182, 'Quartier Kennedy', 6, '2022-08-23 13:14:57', '2022-08-23 13:14:57'),
(183, 'assekro', 6, '2022-08-23 13:15:58', '2022-08-23 13:15:58'),
(184, 'broukro', 6, '2022-08-23 13:16:36', '2022-08-23 13:16:36'),
(185, 'kouakro', 6, '2022-08-23 13:16:54', '2022-08-23 13:16:54'),
(186, 'belleville 1', 6, '2022-08-23 13:18:05', '2022-08-23 13:18:05'),
(187, 'attienkro', 6, '2022-08-23 13:18:42', '2022-08-23 13:18:42'),
(188, 'kanakro', 6, '2022-08-23 13:19:07', '2022-08-23 13:19:07'),
(189, 'Quartier colonial matrala', 4, '2022-08-23 13:44:41', '2022-08-23 13:44:41'),
(190, 'drogbakro', 4, '2022-08-23 13:45:00', '2022-08-23 13:45:00'),
(191, 'Campus I & II', 4, '2022-08-23 13:45:38', '2022-08-23 13:45:38'),
(192, 'Lycée Mami feitei', 8, '2022-08-25 10:37:07', '2022-08-25 10:37:07'),
(193, 'azaguié', 71, '2022-08-31 11:26:19', '2022-08-31 11:26:19'),
(194, 'M\'bromé', 71, '2022-08-31 11:26:48', '2022-08-31 11:26:48'),
(195, 'Gare assinie', 7, '2022-08-31 11:38:05', '2022-08-31 11:38:05'),
(196, 'mokéville château', 46, '2022-08-31 21:43:17', '2022-08-31 21:43:17');

-- --------------------------------------------------------

--
-- Structure de la table `soumissions`
--

CREATE TABLE `soumissions` (
  `idsoumis` int(11) NOT NULL,
  `demndcodes` text NOT NULL COMMENT 'code de la demande',
  `proprio` text NOT NULL COMMENT 'tel proprio ou demarcheur ou agence',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `idtrans` int(11) NOT NULL,
  `nom` text DEFAULT NULL,
  `phone` text NOT NULL,
  `mail` text NOT NULL,
  `marchand` text NOT NULL,
  `debut` text NOT NULL,
  `fin` text NOT NULL,
  `codebiens` text NOT NULL,
  `codeagent` text NOT NULL,
  `amount` text NOT NULL,
  `transid` text NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 0,
  `passclts` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `triumphk`
--

CREATE TABLE `triumphk` (
  `idtriumphk` int(11) NOT NULL,
  `biens_clientsID` text NOT NULL,
  `datevisite` text NOT NULL,
  `statut` text NOT NULL,
  `amount` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typesbiens`
--

CREATE TABLE `typesbiens` (
  `idtypes` int(11) NOT NULL COMMENT 'Types de biens',
  `types` text NOT NULL,
  `icons` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typesbiens`
--

INSERT INTO `typesbiens` (`idtypes`, `types`, `icons`, `created_at`, `updated_at`) VALUES
(7, 'Maisons basses', 'fi-real-estate-house', '2022-02-26 01:09:47', '2022-02-26 01:09:47'),
(8, 'Appartements', 'fi-apartment', '2022-02-26 01:10:01', '2022-02-26 01:10:01'),
(9, 'Magasins', 'fi-shop', '2022-03-08 20:24:26', '2022-03-08 20:24:26'),
(10, 'Bureau', 'fi-building', '2022-03-08 20:25:01', '2022-03-08 20:25:01'),
(11, 'Villa', 'fi-house-chosen', '2022-03-08 20:25:39', '2022-03-08 20:25:39'),
(12, 'Terrains', 'fi-billboard-house', '2022-03-08 20:26:12', '2022-03-08 20:26:12'),
(13, 'studio', 'icon', '2022-08-16 17:52:58', '2022-08-16 17:52:58'),
(14, 'Duplex', 'icon', '2022-08-16 17:53:10', '2022-08-16 17:53:10'),
(15, 'Immeuble', 'icone', '2022-09-06 09:49:00', '2022-09-06 09:49:00');

-- --------------------------------------------------------

--
-- Structure de la table `typesoperations`
--

CREATE TABLE `typesoperations` (
  `idtypesoperations` int(11) NOT NULL,
  `operation` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typesoperations`
--

INSERT INTO `typesoperations` (`idtypesoperations`, `operation`, `created_at`, `updated_at`) VALUES
(8, 'Location', '2022-02-26 12:27:51', '2022-02-26 12:27:51'),
(9, 'Achats', '2022-03-01 11:16:30', '2022-03-01 11:16:30');

-- --------------------------------------------------------

--
-- Structure de la table `verifgerant`
--

CREATE TABLE `verifgerant` (
  `verifgerantid` int(11) NOT NULL,
  `nom` text DEFAULT NULL,
  `mail` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `pays` text DEFAULT NULL,
  `villes` text DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `identity` text DEFAULT NULL,
  `identityfile` text DEFAULT NULL,
  `profil` text DEFAULT NULL,
  `nagreement` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `verifgerant`
--

INSERT INTO `verifgerant` (`verifgerantid`, `nom`, `mail`, `phone`, `pays`, `villes`, `pass`, `identity`, `identityfile`, `profil`, `nagreement`, `created_at`, `updated_at`) VALUES
(8, 'kouame', 'teknolojange@gmail.com', '0788892608', 'CI', 'Abidjan', '3249', 'personne physique', 'myapp/storage/app/public/Identity/tsTvfpbXX29NqhEbzLOoz1EcekYIVNPbBqKPiJ8E.jpg', 'particulier', NULL, '2022-08-24 17:50:26', '2022-08-24 17:50:26'),
(9, 'M', 'teknolojange@gmail.com', '0788892608', 'CI', 'Abidjan', '4762', 'personne physique', 'myapp/storage/app/public/Identity/QLKeiOZz37MG1fOaJhHazJO5sLv3a7aT0eaNSzfL.jpg', 'particulier', NULL, '2022-08-24 17:56:26', '2022-08-24 17:56:26'),
(10, 'Herman Gnangbé', 'gnangbe2006@gmail.com', '0709771757', 'CI', 'Abidjan', '4415', 'personne morale', 'myapp/storage/app/public/Identity/8vCCvXgOYwOhshfFN8fKtALHbChr9MOwiVCjBdkN.png', 'agence non agree', NULL, '2022-08-25 09:18:12', '2022-08-25 09:18:12'),
(11, 'Herman Gnangbé', 'gnangbe2006@gmail.com', '0709771757', 'CI', 'Abidjan', '2925', 'personne morale', 'myapp/storage/app/public/Identity/6XUBZ4lozq4ZpX8xn7u9Tr8yBF7e66wEBXdz9Fey.png', 'agence non agree', NULL, '2022-08-25 09:18:23', '2022-08-25 09:18:23'),
(12, 'Herman Gnangbé', 'gnangbe2006@gmail.com', '0709771757', 'CI', 'Abidjan', '4567', 'personne morale', 'myapp/storage/app/public/Identity/w7z50jJloPBKuCi230QO9MUeE4FmPIZMk6FZjjii.png', 'agence non agree', NULL, '2022-08-25 09:20:00', '2022-08-25 09:20:00'),
(13, 'Tan Gogbeu Hervé', 'gogbeuherve@gmail.com', '0584413315', 'CI', 'Abidjan', '3570', 'personne physique', 'myapp/storage/app/public/Identity/YhXKQa9pYkbri1C47VKDt8cmDsHZuOBwtA6TdZre.pdf', 'agent immobilier', NULL, '2022-08-25 15:27:22', '2022-08-25 15:27:22'),
(14, 'Tan Gogbeu Hervé', 'gogbeuherve@gmail.com', '0584413315', 'CI', 'Abidjan', '2762', 'personne physique', 'myapp/storage/app/public/Identity/amigqvIdGDiCsRtRgztxFZh1O0oz50SfYPGZpS7A.pdf', 'agent immobilier', NULL, '2022-08-25 15:29:39', '2022-08-25 15:29:39'),
(15, 'Yabré Sita', 'yabresita127@gmail.com', '0595685945', 'CI', 'Abidjan', '3622', 'personne physique', 'myapp/storage/app/public/Identity/5BOD7wuNr8CFOP86ZdmkhkwQx8YNkYQ6mdFXt6dC.jpg', 'demarcheur', NULL, '2022-08-25 20:23:28', '2022-08-25 20:23:28'),
(16, 'ATIKPO', 'atikpojeanclaude6@gmail.com', '0594152702', 'CI', 'Abidjan', '2555', 'personne physique', 'myapp/storage/app/public/Identity/Nz1heoEAoQfnTUHMSBfHFKjufrRUesjPJKuCxbSw.jpg', 'particulier', NULL, '2022-08-26 07:07:30', '2022-08-26 07:07:30'),
(17, 'ATIKPO', 'atikpojeanclaude6@gmail.com', '0594152702', 'CI', 'Abidjan', '3458', 'personne physique', 'myapp/storage/app/public/Identity/cCBDd6VVGUFzzMZMZ5hqtUXS6ZCV3Xa4DIhcNz2m.jpg', 'particulier', NULL, '2022-08-26 07:10:55', '2022-08-26 07:10:55'),
(18, 'ATIKPO', 'atikpojeanclaude6@gmail.com', '0594152702', 'CI', 'Abidjan', '4151', 'personne physique', 'myapp/storage/app/public/Identity/wRffXwCiekeKYAVgmWDDzEv9ZqWao66KyNWAg921.jpg', 'agent immobilier', NULL, '2022-08-26 07:12:51', '2022-08-26 07:12:51'),
(19, 'Yabré Sita', 'yabresita127@gmail.com', '0595685945', 'CI', 'Abidjan', '2330', 'personne physique', 'myapp/storage/app/public/Identity/Qg9QolghCS27j0eFuoCXYpzHwOdlrdx2jqc0jR7b.jpg', 'demarcheur', NULL, '2022-08-26 12:35:34', '2022-08-26 12:35:34'),
(20, 'Kodjo', 'liademariane@gmail.com', '002250172098185', 'CI', 'Abidjan', '2916', 'personne physique', 'myapp/storage/app/public/Identity/bXMrAGMNTvmJ6qJH0Ii3H4cKQ8LOZSdUEUvwEfnR.jpg', 'agent immobilier', NULL, '2022-08-26 22:00:06', '2022-08-26 22:00:06'),
(21, 'Kodjo', 'liademariane@gmail.com', '002250172098185', 'CI', 'Abidjan', '2653', 'personne physique', 'myapp/storage/app/public/Identity/tpbfJ9KbolYLPk3M6faPaxNo3ObljbBXsDF5eCSo.jpg', 'agent immobilier', NULL, '2022-08-26 22:00:21', '2022-08-26 22:00:21'),
(22, 'Kodjo', 'liademariane@gmail.com', '002250172098185', 'CI', 'Abidjan', '4788', 'personne physique', 'myapp/storage/app/public/Identity/vDLUuVdvBQsQKC5PnyZfjSpDUIuWV0h8jTvIB7hR.jpg', 'agent immobilier', NULL, '2022-08-26 22:02:13', '2022-08-26 22:02:13'),
(23, 'Kodjo mariane', 'liademariane@gmail.com', '002250172098185', 'CI', 'Abidjan', '4906', 'personne physique', 'myapp/storage/app/public/Identity/tL8NhkHId8C1LYaKUwZ6NQXBuPZ2q3RFb9vzyOgG.jpg', 'agent immobilier', NULL, '2022-08-26 22:05:11', '2022-08-26 22:05:11'),
(24, 'ATCHIN KOBENAN', 'atchinkobenan@yahoo.fr', '0758364536', 'CI', 'Abidjan', '3251', 'personne physique', 'myapp/storage/app/public/Identity/m2301i6tbh6svSZyUz6fAxkC3TpMa8g6PTFNh0Or.jpg', 'particulier', NULL, '2022-08-27 21:16:06', '2022-08-27 21:16:06'),
(25, 'Tan Gogbeu Hervé', 'gogbeuherve@gmail.com', '0759718977', 'CI', 'Abidjan', '4991', 'personne physique', 'myapp/storage/app/public/Identity/0i3YlkDmG9VxN7NaMlNhtwu68lA5EaI41YDKoGOa.pdf', 'agent immobilier', NULL, '2022-08-28 19:50:39', '2022-08-28 19:50:39'),
(26, 'N\'GOESSE', 'jeaneudesngoesse@gmail.com', '0759894619', 'CI', 'Abidjan', '2035', 'personne physique', 'myapp/storage/app/public/Identity/XttI4IBCDegW6U4yHhgLEMTs8MkprCSWZa2pWdcl.jpg', 'demarcheur', NULL, '2022-08-29 15:07:21', '2022-08-29 15:07:21'),
(27, 'N\'GOESSE', 'jeaneudesngoesse@gmail.com', '0759894619', 'CI', 'Abidjan', '4374', 'personne physique', 'myapp/storage/app/public/Identity/kqjow841H7jWn38AKslvmRrDwVw3ocAwmDCh7zFi.jpg', 'demarcheur', NULL, '2022-08-29 15:08:05', '2022-08-29 15:08:05'),
(28, 'N\'Goesse', 'jeaneudesngoesse@gmail.com', '0759894619', 'CI', 'Abidjan', '2288', 'personne physique', 'myapp/storage/app/public/Identity/8NVWA9jbXK0pUybeGIZKlXVo5LgJgucYhU0UPYfW.jpg', 'demarcheur', NULL, '2022-08-29 15:20:16', '2022-08-29 15:20:16'),
(29, 'Gode Jean Serge', 'gjeanserge@gmail.com', '0777279274', 'CI', 'Abidjan', '3981', 'personne physique', 'myapp/storage/app/public/Identity/GnkuT8v7raWripAAAV87wBDCYCJ1cR9BgARfxFVO.jpg', 'demarcheur', NULL, '2022-08-29 17:17:01', '2022-08-29 17:17:01'),
(30, 'Gode Jean Serge', 'gjeanserge@gmail.com', '0777279274', 'CI', 'Abidjan', '2663', 'personne physique', 'myapp/storage/app/public/Identity/J7RyPSLh6zG7yoGvRbYm8OKEjflsqwRmeumEzalk.jpg', 'demarcheur', NULL, '2022-08-29 17:17:30', '2022-08-29 17:17:30'),
(31, 'SINDJALIM EDJADETCHAM', 'edjadehenry@gmail.com', '0708858764', 'CI', 'Abidjan', '4288', 'personne physique', 'myapp/storage/app/public/Identity/mpyw29PUKSc8cUBAXWeb4boGe3YqHGLr5qDhCj5S.jpg', 'demarcheur', NULL, '2022-08-30 18:51:00', '2022-08-30 18:51:00'),
(32, 'SINDJALIM EDJADETCHAM', 'edjadehenry@gmail.com', '0708858764', 'CI', 'Abidjan', '2282', 'personne physique', 'myapp/storage/app/public/Identity/hfTmZFAbumJRQNmqDhXg03ujxf53fiH1sDqHDRfN.jpg', 'demarcheur', NULL, '2022-08-30 18:51:25', '2022-08-30 18:51:25'),
(33, 'Sewon edwige tia', 'aweyimmobilier@gmail.com', '0709129613', 'CI', 'Abidjan', '2433', 'personne physique', 'myapp/storage/app/public/Identity/XFZbAVM6CwPM5hJ2PsfL65KRxLMYL2IF4sUJ3iC0.jpg', 'agent immobilier', NULL, '2022-09-01 09:52:45', '2022-09-01 09:52:45'),
(34, 'Kraidi', 'ydiarkalex@gmail.com', '0505632365', 'CI', 'Abidjan', '2114', 'personne physique', 'myapp/storage/app/public/Identity/yzoAVJnTqVv5lgGnfmBxQaaxeTAKBJ56Srk90BvL.jpg', 'demarcheur', NULL, '2022-09-01 13:21:24', '2022-09-01 13:21:24'),
(35, 'Koala Moussa', 'm.koala98@gmail.com', '0707414892', 'CI', 'Abidjan', '3415', 'personne physique', 'myapp/storage/app/public/Identity/z745s2MMx3mmaNIi87YxWRX9Zrr3t663coAt0owe.jpg', 'demarcheur', NULL, '2022-09-03 20:43:46', '2022-09-03 20:43:46'),
(36, 'Kouadio Alfred', 'alfredkouadio083@gmail.com', '0141537903', 'CI', 'Abidjan', '4431', 'personne physique', 'myapp/storage/app/public/Identity/4YbtevUusvPXqEUdsLqE46eP9DEryzJUejiMg8zR.jpg', 'demarcheur', NULL, '2022-09-05 16:50:33', '2022-09-05 16:50:33'),
(37, 'Kouadio Alfred', 'alfredkouadio083@gmail.com', '0141537903', 'CI', 'Abidjan', '2670', 'personne physique', 'myapp/storage/app/public/Identity/Ufb45DyEbcuSuuc3u0LoBFUAF0JoVOQaCTICi4TM.jpg', 'demarcheur', NULL, '2022-09-05 16:52:13', '2022-09-05 16:52:13'),
(38, 'Bonkoungou payangde junior', 'juniorbonkoungou1@gmail.com', '0505934926', 'CI', 'Abidjan', '2778', 'personne physique', 'myapp/storage/app/public/Identity/bLBN2s73UdS6JoBFx80QIYtievMgGL1QLFJYWIs0.jpg', 'agent immobilier', NULL, '2022-09-06 10:56:06', '2022-09-06 10:56:06'),
(39, 'Bonkoungou payangde abdoul moumouni', 'juniorbonkoungou1@gmail.com', '0505934926', 'CI', 'Abidjan', '2290', 'personne physique', 'myapp/storage/app/public/Identity/QRnSlKbsxruueZIomI1TLXCMWInq9NdayDH1LJlG.jpg', 'particulier', NULL, '2022-09-06 11:00:27', '2022-09-06 11:00:27'),
(40, 'KOUADIO Wilfried', 'willgodson33@gmail.com', '0708243705', 'CI', 'Abidjan', '3116', 'personne physique', 'myapp/storage/app/public/Identity/a3L4dxiU2aU1nlB4MxuiwpgrxTlV2k275DITnUg6.jpg', 'demarcheur', NULL, '2022-09-06 13:39:59', '2022-09-06 13:39:59');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `idvilles` int(11) NOT NULL,
  `pays_idpays` int(11) NOT NULL,
  `ville` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`idvilles`, `pays_idpays`, `ville`, `created_at`, `updated_at`) VALUES
(1, 1, 'Abidjan', '2022-04-27 12:57:12', '2022-04-27 12:57:12'),
(2, 1, 'Yamoussokro', '2022-08-11 15:31:04', '2022-08-11 15:31:04'),
(3, 1, 'BASSAM', '2022-08-11 15:45:30', '2022-08-11 15:45:30'),
(4, 1, 'Jacqueville', '2022-08-12 11:26:07', '2022-08-12 11:26:07'),
(5, 1, 'Toumodi', '2022-08-12 13:49:14', '2022-08-12 13:49:14'),
(6, 1, 'Bouaké', '2022-08-12 13:59:01', '2022-08-12 13:59:01'),
(7, 1, 'Assinie', '2022-08-13 11:46:55', '2022-08-13 11:46:55'),
(8, 1, 'Bingerville', '2022-08-15 11:22:59', '2022-08-15 11:22:59'),
(9, 1, 'Abengourou', '2022-08-16 09:16:21', '2022-08-16 09:16:21'),
(10, 1, 'Aboisso', '2022-08-16 09:16:45', '2022-08-16 09:16:45'),
(15, 1, 'Adzopé', '2022-08-16 09:19:57', '2022-08-16 09:19:57'),
(17, 1, 'Agboville', '2022-08-16 09:20:30', '2022-08-16 09:20:30'),
(18, 1, 'Agnibilékrou', '2022-08-16 09:20:48', '2022-08-16 09:20:48'),
(21, 1, 'Akouédo', '2022-08-16 09:21:31', '2022-08-16 09:21:31'),
(25, 1, 'Afféry', '2022-08-16 09:59:42', '2022-08-16 09:59:42'),
(26, 1, 'Babakro', '2022-08-16 10:53:15', '2022-08-16 10:53:15'),
(27, 1, 'Bacanda', '2022-08-16 10:59:03', '2022-08-16 10:59:03'),
(28, 1, 'Bacon', '2022-08-16 11:01:04', '2022-08-16 11:01:04'),
(32, 1, 'Béoumi', '2022-08-16 11:04:18', '2022-08-16 11:04:18'),
(33, 1, 'Akoupé', '2022-08-16 11:08:52', '2022-08-16 11:08:52'),
(34, 1, 'Alépé', '2022-08-16 11:09:12', '2022-08-16 11:09:12'),
(35, 1, 'Anyama', '2022-08-16 11:09:39', '2022-08-16 11:09:39'),
(36, 1, 'Tabou', '2022-08-16 11:10:46', '2022-08-16 11:10:46'),
(37, 1, 'Boundiali', '2022-08-16 11:12:41', '2022-08-16 11:12:41'),
(38, 1, 'Daloa', '2022-08-16 11:19:11', '2022-08-16 11:19:11'),
(39, 1, 'San-Pédro', '2022-08-16 11:19:20', '2022-08-16 11:19:20'),
(40, 1, 'Divo', '2022-08-16 11:19:28', '2022-08-16 11:19:28'),
(41, 1, 'Korhogo', '2022-08-16 11:21:45', '2022-08-16 11:21:45'),
(42, 1, 'Man', '2022-08-16 11:25:37', '2022-08-16 11:25:37'),
(43, 1, 'Gagnoa', '2022-08-16 11:25:47', '2022-08-16 11:25:47'),
(44, 1, 'Soubré', '2022-08-16 11:26:00', '2022-08-16 11:26:00'),
(45, 1, 'Dabou', '2022-08-16 11:26:19', '2022-08-16 11:26:19'),
(46, 1, 'Grand-Bassam', '2022-08-16 11:26:29', '2022-08-16 11:26:29'),
(47, 1, 'Bouaflé', '2022-08-16 11:26:40', '2022-08-16 11:26:40'),
(48, 1, 'Issia', '2022-08-16 11:26:52', '2022-08-16 11:26:52'),
(49, 1, 'Sinfra', '2022-08-16 11:27:03', '2022-08-16 11:27:03'),
(50, 1, 'Katiola', '2022-08-16 11:27:18', '2022-08-16 11:27:18'),
(51, 1, 'Lakota', '2022-08-16 11:27:41', '2022-08-16 11:27:41'),
(52, 1, 'Tiassalé', '2022-08-16 11:28:06', '2022-08-16 11:28:06'),
(53, 1, 'Zuénoula', '2022-08-16 11:28:14', '2022-08-16 11:28:14'),
(54, 1, 'Vavoua', '2022-08-16 11:28:23', '2022-08-16 11:28:23'),
(55, 1, 'Daoukro', '2022-08-16 11:28:37', '2022-08-16 11:28:37'),
(56, 1, 'Séguéla', '2022-08-16 11:29:55', '2022-08-16 11:29:55'),
(57, 1, 'Oumé', '2022-08-16 11:30:07', '2022-08-16 11:30:07'),
(58, 1, 'Ferkessedougou', '2022-08-16 11:30:17', '2022-08-16 11:30:17'),
(59, 1, 'Dimbokro', '2022-08-16 11:30:25', '2022-08-16 11:30:25'),
(60, 1, 'Odienné', '2022-08-16 11:30:41', '2022-08-16 11:30:41'),
(61, 1, 'Duékoué', '2022-08-16 11:30:55', '2022-08-16 11:30:55'),
(62, 1, 'Tingréla', '2022-08-16 11:31:11', '2022-08-16 11:31:11'),
(63, 1, 'Guiglo', '2022-08-16 11:31:21', '2022-08-16 11:31:21'),
(64, 1, 'Danané', '2022-08-16 11:34:26', '2022-08-16 11:34:26'),
(65, 2, 'Brazzaville', '2022-08-18 09:39:07', '2022-08-18 09:39:07'),
(66, 3, 'Ouagadougou', '2022-08-18 10:45:52', '2022-08-18 10:45:52'),
(67, 4, 'Yaoundé', '2022-08-18 10:46:19', '2022-08-18 10:46:19'),
(68, 5, 'Libreville', '2022-08-18 10:46:56', '2022-08-18 10:46:56'),
(69, 1, 'Bonoua', '2022-08-18 13:10:44', '2022-08-18 13:10:44'),
(70, 1, 'sassandra', '2022-08-23 13:39:12', '2022-08-23 13:39:12'),
(71, 1, 'Azaguié', '2022-08-31 11:25:57', '2022-08-31 11:25:57');

-- --------------------------------------------------------

--
-- Structure de la table `visites_marchands`
--

CREATE TABLE `visites_marchands` (
  `idvisitemarcds` int(11) NOT NULL,
  `biens_clientsID` text NOT NULL,
  `datevisite` text NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 0 COMMENT '0 => new | 1 => solder',
  `amount` text NOT NULL,
  `marchdID` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idadmin`);

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`idagents`);

--
-- Index pour la table `alerte`
--
ALTER TABLE `alerte`
  ADD PRIMARY KEY (`alerteid`);

--
-- Index pour la table `alertebiens`
--
ALTER TABLE `alertebiens`
  ADD PRIMARY KEY (`alertebiensid`);

--
-- Index pour la table `biens`
--
ALTER TABLE `biens`
  ADD PRIMARY KEY (`idbiens`,`gerants_idgerant`,`typesbiens_idtypes`,`typesoperations_idtypesoperations`),
  ADD KEY `fk_biens_gerants1_idx` (`gerants_idgerant`),
  ADD KEY `fk_biens_typesbiens1_idx` (`typesbiens_idtypes`),
  ADD KEY `fk_biens_typesoperations1_idx` (`typesoperations_idtypesoperations`);

--
-- Index pour la table `bienssoumis`
--
ALTER TABLE `bienssoumis`
  ADD PRIMARY KEY (`idbienssoumis`);

--
-- Index pour la table `biens_clients`
--
ALTER TABLE `biens_clients`
  ADD PRIMARY KEY (`idbiensclient`);

--
-- Index pour la table `campagne`
--
ALTER TABLE `campagne`
  ADD PRIMARY KEY (`idcampagne`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idclients`);

--
-- Index pour la table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`idcoup`);

--
-- Index pour la table `demandepay`
--
ALTER TABLE `demandepay`
  ADD PRIMARY KEY (`idpay`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`demandeID`);

--
-- Index pour la table `gerants`
--
ALTER TABLE `gerants`
  ADD PRIMARY KEY (`idgerant`);

--
-- Index pour la table `lograpid`
--
ALTER TABLE `lograpid`
  ADD PRIMARY KEY (`idlograpid`);

--
-- Index pour la table `marchands`
--
ALTER TABLE `marchands`
  ADD PRIMARY KEY (`idmarchand`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`idpaiements`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`idpays`);

--
-- Index pour la table `quartiers`
--
ALTER TABLE `quartiers`
  ADD PRIMARY KEY (`idquartier`);

--
-- Index pour la table `soumissions`
--
ALTER TABLE `soumissions`
  ADD PRIMARY KEY (`idsoumis`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`idtrans`);

--
-- Index pour la table `triumphk`
--
ALTER TABLE `triumphk`
  ADD PRIMARY KEY (`idtriumphk`);

--
-- Index pour la table `typesbiens`
--
ALTER TABLE `typesbiens`
  ADD PRIMARY KEY (`idtypes`);

--
-- Index pour la table `typesoperations`
--
ALTER TABLE `typesoperations`
  ADD PRIMARY KEY (`idtypesoperations`);

--
-- Index pour la table `verifgerant`
--
ALTER TABLE `verifgerant`
  ADD PRIMARY KEY (`verifgerantid`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`idvilles`,`pays_idpays`),
  ADD KEY `fk_villes_pays_idx` (`pays_idpays`);

--
-- Index pour la table `visites_marchands`
--
ALTER TABLE `visites_marchands`
  ADD PRIMARY KEY (`idvisitemarcds`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `agents`
--
ALTER TABLE `agents`
  MODIFY `idagents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `alerte`
--
ALTER TABLE `alerte`
  MODIFY `alerteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `alertebiens`
--
ALTER TABLE `alertebiens`
  MODIFY `alertebiensid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `biens`
--
ALTER TABLE `biens`
  MODIFY `idbiens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT pour la table `bienssoumis`
--
ALTER TABLE `bienssoumis`
  MODIFY `idbienssoumis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `biens_clients`
--
ALTER TABLE `biens_clients`
  MODIFY `idbiensclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `campagne`
--
ALTER TABLE `campagne`
  MODIFY `idcampagne` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `idclients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT pour la table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `idcoup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `demandepay`
--
ALTER TABLE `demandepay`
  MODIFY `idpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `demandeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `gerants`
--
ALTER TABLE `gerants`
  MODIFY `idgerant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pour la table `lograpid`
--
ALTER TABLE `lograpid`
  MODIFY `idlograpid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `marchands`
--
ALTER TABLE `marchands`
  MODIFY `idmarchand` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `idpaiements` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `idpays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `quartiers`
--
ALTER TABLE `quartiers`
  MODIFY `idquartier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT pour la table `soumissions`
--
ALTER TABLE `soumissions`
  MODIFY `idsoumis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `triumphk`
--
ALTER TABLE `triumphk`
  MODIFY `idtriumphk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typesbiens`
--
ALTER TABLE `typesbiens`
  MODIFY `idtypes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Types de biens', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `typesoperations`
--
ALTER TABLE `typesoperations`
  MODIFY `idtypesoperations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `verifgerant`
--
ALTER TABLE `verifgerant`
  MODIFY `verifgerantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `idvilles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `visites_marchands`
--
ALTER TABLE `visites_marchands`
  MODIFY `idvisitemarcds` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `biens`
--
ALTER TABLE `biens`
  ADD CONSTRAINT `fk_biens_gerants1` FOREIGN KEY (`gerants_idgerant`) REFERENCES `gerants` (`idgerant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_biens_typesbiens1` FOREIGN KEY (`typesbiens_idtypes`) REFERENCES `typesbiens` (`idtypes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_biens_typesoperations1` FOREIGN KEY (`typesoperations_idtypesoperations`) REFERENCES `typesoperations` (`idtypesoperations`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `fk_villes_pays` FOREIGN KEY (`pays_idpays`) REFERENCES `pays` (`idpays`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
