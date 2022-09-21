-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 août 2022 à 09:41
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lograpid`
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
(6, 2, 7, 8, '1', '1', '1', 'Studio americain à Abobo Ndotré', '1000000', '35.000 F/mois - 6 mois d\'avances', 'Une chambre, une cuisine, un salon, une douche, un parking', 'storage/biensphoto/DANSXey0ilxsVL8us5h258q01rlZU6i9UJoZefTH.jpg', 'storage/biensphoto/tpKbF1L6OSdWGhLotGGX2C5ifZJJmFZxdmZzG2S4.jpg', 'storage/biensphoto/FrJgvY1n6VvyF1EuB5h5IgrO5I5ZobcmZujIqdoM.jpg', 'storage/biensphoto/WmmQH1NtVuGrwxUlwr3QwLaz0vpR1UlIIUCtURQU.jpg', 'storage/biensphoto/9SmOeSw9CAvYXlTzandMB8fyyo82Rgep0UvKiJ9J.jpg', 'storage/biensphoto/Awdg7pTPV8opdESx48vUWd23wRsojqwhZdU1d7Xf.jpg', 'storage/biensphoto/fNbNrpUpmCoHCuVeQxKTKhNHKtLib3L1wytAPkCh.jpg', 'storage/biensphoto/qOlCpzy99TZNUIc9397RHBKkmjJVHg9jgM8T5ppD.jpg', 0, '1379', '2022-08-03 14:30:04', '2022-08-03 14:30:04'),
(7, 1, 7, 8, '1', '1', '1', 'Studio americain à Abobo Ndotré', '10000000', '35.000 F/mois - 6 mois d\'avances', 'Une chambre, une cuisine, un salon, une douche, un parking', 'storage/biensphoto/0qaB769dlXsUhElN9hYwgMCd6z1TWTGzzeQ7kUIn.jpg', 'storage/biensphoto/BLmwevBe5NjB9XyYkDHu0nM93HK7fI4eNLRENXH7.jpg', 'storage/biensphoto/pRyESOp64Bd7Ytd16yawNFfwXBnLASZA1VF18xSS.jpg', 'storage/biensphoto/IzbALrEXFbKzZ134deWSGsPOg8yKPWfds8Rs7JFC.jpg', 'storage/biensphoto/CyhK5Y8I6qSahUIiKKj3xdeh7ocXKDMWOg3BTc3J.jpg', 'storage/biensphoto/XZ192Gp1ln1TgdYZ63gg2vwGSUbJqpi3tgBUjaxH.jpg', 'storage/biensphoto/inR7BsBP3JsLEpxRaWFyRPnDbFdW5BXOn0ANqHB4.jpg', 'storage/biensphoto/wUqOLFOD5AHWgAkBptxhChdWm6RQ7O3A6XEs96hF.jpg', 0, '923', '2022-08-03 14:36:38', '2022-08-03 14:36:38');

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
(1, '1', '6', '2', '03/08/2022', '03/08/2022', NULL, '2345', 0, 2, 0, '2022-08-03 16:46:13', '2022-08-03 16:46:13');

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
(1, 'Lavie', '2250788892608', 'teknolojange@gmail.com', '2356', '2022-07-23 18:13:21', '2022-07-23 18:13:21'),
(2, 'Ngues', '2250788892608', 'teknolojang@gmail.com', '1995', '2022-07-24 18:11:33', '2022-07-24 18:11:33'),
(3, 'kouadio', '2250102205211', 'devdodo225@gmail.com', '2136', '2022-08-03 22:09:18', '2022-08-03 22:09:18');

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

--
-- Déchargement des données de la table `coupons`
--

INSERT INTO `coupons` (`idcoup`, `coupons`, `visite`, `clients`, `stat`, `created_at`, `updated_at`) VALUES
(3, '4398', 2345, 'teknolojange@gmail.com', 0, '2022-08-03 21:50:15', '2022-08-03 21:50:15');

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

--
-- Déchargement des données de la table `demandepay`
--

INSERT INTO `demandepay` (`idpay`, `typops`, `pays`, `villes`, `quartier`, `typBiens`, `whatsapp`, `mail`, `descript`, `transid`, `statut`, `created_at`, `updated_at`) VALUES
(9, '8', '1', '1', '1', '7', '0788892608', NULL, 'JE veux louer un bien', '20220802200622', 0, '2022-08-02 20:06:22', '2022-08-02 20:06:22'),
(10, '8', '1', '1', '1', '7', '0788892608', NULL, 'JE veux louer un bien', '20220802201726', 0, '2022-08-02 20:17:26', '2022-08-02 20:17:26'),
(11, '8', '1', '1', '2', '7', '0788892608', 'teknolojange@gmail.com', 'Je veux louer', '20220803122516', 0, '2022-08-03 12:25:16', '2022-08-03 12:25:16');

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

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`demandeID`, `codes`, `opera`, `pays`, `villes`, `quartier`, `typesbiens`, `whatsap`, `mail`, `more`, `stat`, `pub`, `transid`, `created_at`, `updated_at`) VALUES
(16, '1571', 8, 1, 1, 1, 7, '0788892608', NULL, 'JE veux louer un bien', 3, '0', '20220802201726', '2022-08-02 20:17:26', '2022-08-02 20:17:26'),
(17, '4101', 8, 1, 1, 2, 7, '0788892608', 'teknolojange@gmail.com', 'Je veux louer', 0, '0', '20220803122516', '2022-08-03 12:25:16', '2022-08-03 12:25:16');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gerants`
--

INSERT INTO `gerants` (`idgerant`, `nom`, `mail`, `phone`, `pays`, `villes`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'kouame ngues', 'teknolojang@mail.com', '0788892608', 'Côte d\'ivoire', 'Abidjan', '4067', '2022-04-27 12:56:57', '2022-04-27 12:56:57'),
(2, 'Tan', 'gogbeuherve@gmail.com', '0759718977', 'Côte d\'Ivoire', 'Abidjan', '2533', '2022-05-29 21:53:42', '2022-05-29 21:53:42');

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
(1, 'Côte d\'ivoire', '2022-02-26 07:52:50', '2022-02-26 07:52:50');

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
(11, 'Bingerville', 1, '2022-05-31 13:04:35', '2022-05-31 13:04:35');

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

--
-- Déchargement des données de la table `soumissions`
--

INSERT INTO `soumissions` (`idsoumis`, `demndcodes`, `proprio`, `created_at`, `updated_at`) VALUES
(1, '1051', '0788892608', '2022-05-22 11:38:11', '2022-05-22 11:38:11'),
(2, '4693', '0788892608', '2022-05-22 11:39:12', '2022-05-22 11:39:12'),
(3, '4693', '0102205211', '2022-05-22 13:32:24', '2022-05-22 13:32:24'),
(4, '1051', '788892607', '2022-05-22 18:22:07', '2022-05-22 18:22:07'),
(5, '1051', '0102205211', '2022-05-22 18:41:21', '2022-05-22 18:41:21'),
(6, '265', '0788892608', '2022-07-31 21:42:44', '2022-07-31 21:42:44'),
(7, '4667', '0102205211', '2022-08-02 20:10:55', '2022-08-02 20:10:55'),
(8, '4667', '0708532307', '2022-08-02 20:11:47', '2022-08-02 20:11:47'),
(9, '4667', '0789753455', '2022-08-02 20:12:11', '2022-08-02 20:12:11'),
(10, '1571', '0788892608', '2022-08-02 20:19:09', '2022-08-02 20:19:09'),
(11, '1571', '0102205211', '2022-08-02 23:07:24', '2022-08-02 23:07:24');

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

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`idtrans`, `nom`, `phone`, `mail`, `marchand`, `debut`, `fin`, `codebiens`, `codeagent`, `amount`, `transid`, `statut`, `passclts`, `created_at`, `updated_at`) VALUES
(1, 'Kouame', '2250788892608', 'teknolojange@gmail.com', '0', '23-07-2022 18:07', '24-07-2022 18:07', '3', '0', '2000', '20220723181321', 0, '2356', '2022-07-23 18:13:21', '2022-07-23 18:13:21'),
(2, 'Kouame', '2250788892608', 'teknolojange@gmail.com', '0', '24-07-2022 18:07', '25-07-2022 18:07', '3', '0', '2000', '20220724182310', 0, '2356', '2022-07-24 18:23:10', '2022-07-24 18:23:10'),
(3, 'Kouame', '2250788892608', 'teknolojange@gmail.com', '0', '24-07-2022 18:07', '25-07-2022 18:07', '3', '0', '2000', '20220724183149', 0, '2356', '2022-07-24 18:31:49', '2022-07-24 18:31:49'),
(4, 'kouame ngues', '2250788892608', 'teknolojange@gmail.com', '0', '01-08-2022 22:08', '02-08-2022 22:08', '5', '0', '2000', '20220801224521', 0, '2356', '2022-08-01 22:45:21', '2022-08-01 22:45:21'),
(5, 'kouadio', '2250102205211', 'devdodo225@gmail.com', '0', '03-08-2022 22:08', '04-08-2022 22:08', '7', '0', '150', '20220803220918', 0, '2136', '2022-08-03 22:09:18', '2022-08-03 22:09:18'),
(6, 'kouadio', '2250102205211', 'teknolojange@gmail.com', '0', '03-08-2022 22:08', '04-08-2022 22:08', '7', '0', '150', '20220803225206', 0, '2356', '2022-08-03 22:52:06', '2022-08-03 22:52:06'),
(7, 'Lavie', '2250788892608', 'teknolojange@gmail.com', '0', '04-08-2022 07:08', '05-08-2022 07:08', '6', '0', '150', '20220804071305', 0, '2356', '2022-08-04 07:13:05', '2022-08-04 07:13:05');

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
(12, 'Terrains', 'fi-billboard-house', '2022-03-08 20:26:12', '2022-03-08 20:26:12');

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
(1, 1, 'Abidjan', '2022-04-27 12:57:12', '2022-04-27 12:57:12');

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
  MODIFY `idagents` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `biens`
--
ALTER TABLE `biens`
  MODIFY `idbiens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `bienssoumis`
--
ALTER TABLE `bienssoumis`
  MODIFY `idbienssoumis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `biens_clients`
--
ALTER TABLE `biens_clients`
  MODIFY `idbiensclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `campagne`
--
ALTER TABLE `campagne`
  MODIFY `idcampagne` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `idclients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `idgerant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `idpays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `quartiers`
--
ALTER TABLE `quartiers`
  MODIFY `idquartier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `idtypes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Types de biens', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `typesoperations`
--
ALTER TABLE `typesoperations`
  MODIFY `idtypesoperations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `idvilles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
