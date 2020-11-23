-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2018 at 09:06 AM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaire_materiels`
--

-- --------------------------------------------------------

--
-- Table structure for table `affectations`
--

DROP TABLE IF EXISTS `affectations`;
CREATE TABLE IF NOT EXISTS `affectations` (
  `niveau1` varchar(100) NOT NULL,
  `niveau2` varchar(100) DEFAULT NULL,
  `niveau3` varchar(100) DEFAULT NULL,
  `idAffectation` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idAffectation`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `affectations`
--

INSERT INTO `affectations` (`niveau1`, `niveau2`, `niveau3`, `idAffectation`) VALUES
('Délégation', '', '', 1),
('Délégation', 'Secrétariat', '', 2),
('Délégation', 'Bureau d\'order', '', 3),
('Délégation', 'Bureau des équipements et de la maintenance', '', 4),
('Délégation', 'Commission médicale', '', 5),
('Délégation', 'Unité de coordination ', '', 6),
('Délégation', 'Cellule provinciale d\'informatique', '', 7),
('Délégation', 'UMP El Bourouj', '', 8),
('Délégation', 'UMHP Settat', '', 9),
('Délégation', 'SRES', '', 10),
('Délégation', 'SRES', 'CDTMR Settat', 11),
('Délégation', 'SRES', 'CDTMR Ben Ahmed', 12),
('Délégation', 'SRES', 'Ain Baida', 13),
('Délégation', 'SRES', 'Ain Blal', 14),
('Délégation', 'SRES', 'Ain Dorbane', 15),
('Délégation', 'SRES', 'Ain Rbah', 16),
('Délégation', 'SRES', 'Ait Hachem', 17),
('Délégation', 'SRES', 'Atlas', 18),
('Délégation', 'SRES', 'Bir Jmouha', 19),
('Délégation', 'SRES', 'Bir M\'rah', 20),
('Délégation', 'SRES', 'Bni Khloug', 21),
('Délégation', 'SRES', 'Bni Yagrine', 22),
('Délégation', 'SRES', 'Bouguargouh', 23),
('Délégation', 'SRES', 'Chraouka', 24),
('Délégation', 'SRES', 'Dakhla', 25),
('Délégation', 'SRES', 'Dar Chaffai', 26),
('Délégation', 'SRES', 'dechra', 27),
('Délégation', 'SRES', 'El Borouj', 28),
('Délégation', 'SRES', 'El Gaada', 29),
('Délégation', 'SRES', 'El Kassam', 30),
('Délégation', 'SRES', 'El Khair', 31),
('Délégation', 'SRES', 'Gdana', 32),
('Délégation', 'SRES', 'Gnazra', 33),
('Délégation', 'SRES', 'Guisser', 34),
('Délégation', 'SRES', 'Haddada', 35),
('Délégation', 'SRES', 'Khemisset', 36),
('Délégation', 'SRES', 'Laatoucha', 37),
('Délégation', 'SRES', 'Laazayze', 38),
('Délégation', 'SRES', 'Labna', 39),
('Délégation', 'SRES', 'Laghzaouna', 40),
('Délégation', 'SRES', 'Lahlaf', 41),
('Délégation', 'SRES', 'Laqraqra', 42),
('Délégation', 'SRES', 'Lissouf', 43),
('Délégation', 'SRES', 'loukarfa ', 44),
('Délégation', 'SRES', 'Mechraa B. Abbou', 45),
('Délégation', 'SRES', 'Melgou', 46),
('Délégation', 'SRES', 'Meskoura', 47),
('Délégation', 'SRES', 'M\'garto', 48),
('Délégation', 'SRES', 'Mimouna', 49),
('Délégation', 'SRES', 'Mnasra', 50),
('Délégation', 'SRES', 'Mrizigue', 51),
('Délégation', 'SRES', 'Mzoura', 52),
('Délégation', 'SRES', 'Nkhila', 53),
('Délégation', 'SRES', 'N\'khila', 54),
('Délégation', 'SRES', 'O.S.Abdellah Od.', 55),
('Délégation', 'SRES', 'Od AAFIF', 56),
('Délégation', 'SRES', 'Od AYAD', 57),
('Délégation', 'SRES', 'Od AZZOUZ', 58),
('Délégation', 'SRES', 'Od BOUALI', 59),
('Délégation', 'SRES', 'Od BOUZIRI', 60),
('Délégation', 'SRES', 'Od GHALEM', 61),
('Délégation', 'SRES', 'Od MOUSSA HARRAR', 62),
('Délégation', 'SRES', 'Od NACER', 63),
('Délégation', 'SRES', 'Od NJIMA', 64),
('Délégation', 'SRES', 'Od SALEM', 65),
('Délégation', 'SRES', 'Od SI MOUSSA', 66),
('Délégation', 'SRES', 'Od ZIRG', 67),
('Délégation', 'SRES', 'Od. SI MASSAOUD', 68),
('Délégation', 'SRES', 'OULAD AMER', 69),
('Délégation', 'SRES', 'Oulad Chbana', 70),
('Délégation', 'SRES', 'Oulad Fares', 71),
('Délégation', 'SRES', 'Oulad Freiha', 72),
('Délégation', 'SRES', 'Oulad Said', 73),
('Délégation', 'SRES', 'Oulad Sghir', 74),
('Délégation', 'SRES', 'Ouled Hajjaj', 75),
('Délégation', 'SRES', 'Ouled Hammou', 76),
('Délégation', 'SRES', 'Ouled M\'hammed', 77),
('Délégation', 'SRES', 'P.A.M', 78),
('Délégation', 'SRES', 'Ras El Ain', 79),
('Délégation', 'SRES', 'Rima', 80),
('Délégation', 'SRES', 'Sgamna', 81),
('Délégation', 'SRES', 'Sidi Abdelkerim (CSU)', 82),
('Délégation', 'SRES', 'Sidi Belkacem', 83),
('Délégation', 'SRES', 'Sidi Dahbi', 84),
('Délégation', 'SRES', 'Sidi El Aidi', 85),
('Délégation', 'SRES', 'Sidi Hajjaj', 86),
('Délégation', 'SRES', 'Sidi Sbaa', 87),
('Délégation', 'SRES', 'Smaala', 88),
('Délégation', 'SRES', 'Souakka', 89),
('Délégation', 'SRES', 'Tlet Loulad', 90),
('Délégation', 'SRES', 'Tnine Toualet', 91),
('Délégation', 'SRES', 'Zaoua NEZZAGHIA', 92),
('Délégation', 'SRES', 'ZAOUIA TARHIA', 93),
('Délégation', 'SRES', 'Zmamra', 94),
('Délégation', 'SRES', 'LSP', 95),
('Délégation', 'SAE', '', 96),
('Délégation', 'SAE', 'Unité sous-ordonnancement', 97),
('Délégation', 'SAE', 'Unité RH', 98),
('Délégation', 'SAE', 'Parc-Auto', 99),
('Délégation', 'SAE', 'Unité contentieux', 100),
('Délégation', 'Centre d\'apparaillage et d\'orthopédie de Settat', '', 101),
('Délégation', 'Centre de référence de la santé scolaire et universitaire Atlas', '', 102),
('CHP Hassan II', '', '', 103),
('CHP Hassan II', 'Administration', '', 104),
('CHP Hassan II', 'Le service des urgences (SU)', 'Réanimation', 105),
('CHP Hassan II', 'Le service des urgences (SU)', 'Urgence SMUR', 106),
('CHP Hassan II', 'Le service de la pharmacie hospitalière (SPH)', '', 107),
('CHP Hassan II', 'Le service de chirurgie (SC)', 'Chirurgie AB', 108),
('CHP Hassan II', 'Le service de chirurgie (SC)', 'Bolc opératoire', 109),
('CHP Hassan II', 'Le service mère-enfant (SME)', 'Maternité', 110),
('CHP Hassan II', 'Le service mère-enfant (SME)', 'Pédiatrie + Néonatologie', 111),
('CHP Hassan II', 'Le service de médcine (SM)', '', 112),
('CHP Hassan II', 'Médico-technique', '', 113),
('CHP Hassan II', 'Médico-technique', 'Radio', 114),
('CHP Hassan II', 'Médico-technique', 'Laboratoire', 115),
('CHP Hassan II', 'Centre de diagnostique', '', 116),
('CHP Hassan II', 'Centre de Stérilisation', '', 117),
('CHP Hassan II', 'Centre d\'hémodialyse Settat', '', 118),
('HL Ben Ahmed', '', '', 119),
('HL Ben Ahmed', 'Administration', '', 120),
('HL Ben Ahmed', 'Le service d\'accueil et d\'admission (SAA)', '', 121),
('HL Ben Ahmed', 'Le service mère-enfant (SME)', '', 122),
('HL Ben Ahmed', 'Le service de médcine (SM)', '', 123),
('HL Ben Ahmed', 'Le service de chirurgie (SC) (y compris le bloc opératoire) ', '', 124),
('HL Ben Ahmed', 'Le service d\'imagerie médicale (SIM)', '', 125),
('HL Ben Ahmed', 'Le service de biologie médicale (SBM)', '', 126),
('HL Ben Ahmed', 'Le service de la pharmacie hospitalière (SPH)', '', 127),
('HL Ben Ahmed', 'Le service des urgences (SU)', '', 128),
('HL Ben Ahmed', 'Centre d\'hémodialyse Ben Ahmed', '', 129);

-- --------------------------------------------------------

--
-- Table structure for table `affectation_materiels`
--

DROP TABLE IF EXISTS `affectation_materiels`;
CREATE TABLE IF NOT EXISTS `affectation_materiels` (
  `idAffectation` int(11) NOT NULL,
  `idMateriel` int(11) NOT NULL,
  `dateAffectation` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `familles`
--

DROP TABLE IF EXISTS `familles`;
CREATE TABLE IF NOT EXISTS `familles` (
  `idFamille` int(11) NOT NULL AUTO_INCREMENT,
  `famille` varchar(50) NOT NULL,
  PRIMARY KEY (`idFamille`),
  UNIQUE KEY `famille` (`famille`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `familles`
--

INSERT INTO `familles` (`idFamille`, `famille`) VALUES
(6, 'Materiel de bureau'),
(7, 'Materiel informatique'),
(4, 'Medico-hospitalier'),
(3, 'Medico-technique'),
(5, 'Technique');

-- --------------------------------------------------------

--
-- Table structure for table `familles_sousfamilles`
--

DROP TABLE IF EXISTS `familles_sousfamilles`;
CREATE TABLE IF NOT EXISTS `familles_sousfamilles` (
  `idFamille` int(11) NOT NULL,
  `idSousFamille` int(11) NOT NULL,
  KEY `idFamille` (`idFamille`),
  KEY `idSousFamille` (`idSousFamille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `familles_sousfamilles`
--

INSERT INTO `familles_sousfamilles` (`idFamille`, `idSousFamille`) VALUES
(7, 4),
(7, 1),
(3, 2),
(6, 5),
(4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `idFournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nomFournisseur` varchar(50) NOT NULL,
  `contactFournisseur` varchar(50) NOT NULL,
  `adresseFournisseur` varchar(255) NOT NULL,
  PRIMARY KEY (`idFournisseur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`idFournisseur`, `nomFournisseur`, `contactFournisseur`, `adresseFournisseur`) VALUES
(1, 'A', '0525134565', 'SETTAT'),
(2, 'testo', 'testo@gmail.com', '0606000000'),
(3, 'fournisseur1', 'fournisseur1@gmail.com', 'fournisseur1 adresse'),
(4, 'fournisseur2', 'fournisseur2@gmail.com', 'fournisseur 2 adresse'),
(5, 'testoooo', 'testoooo', 'testoooo'),
(6, 'toto', 'toto', 'toto');

-- --------------------------------------------------------

--
-- Table structure for table `livraisons`
--

DROP TABLE IF EXISTS `livraisons`;
CREATE TABLE IF NOT EXISTS `livraisons` (
  `idLivraison` int(11) NOT NULL AUTO_INCREMENT,
  `idFournisseur` int(11) NOT NULL,
  `IdTypeLivraison` varchar(10) NOT NULL,
  `dateLivraison` date NOT NULL,
  `quantiteLivree` int(11) NOT NULL,
  `prixUnitaire` double DEFAULT NULL,
  `numeroMB` varchar(255) DEFAULT NULL,
  `numeroAO` varchar(255) DEFAULT NULL,
  `numeroLOT` varchar(255) DEFAULT NULL,
  `numeroBL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idLivraison`),
  KEY `idFournisseur` (`idFournisseur`),
  KEY `IdTypeLivraison` (`IdTypeLivraison`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livraisons`
--

INSERT INTO `livraisons` (`idLivraison`, `idFournisseur`, `IdTypeLivraison`, `dateLivraison`, `quantiteLivree`, `prixUnitaire`, `numeroMB`, `numeroAO`, `numeroLOT`, `numeroBL`) VALUES
(21, 1, 'D', '2018-05-30', 1, 4550, '125gg', '115mn', '121', '121'),
(22, 2, 'BD', '2018-05-28', 1, 5000, '65sssj5', 'xx-10', '121fd', '121'),
(65, 2, 'M', '2018-07-28', 2, 4550, '2122', 'fh', 'fggh', 'gh'),
(88, 2, 'BD', '2018-05-29', 2, 4550, '65sssj5', 'xx-10', 'hhhh5', '123'),
(91, 1, 'BD', '2018-07-30', 1, 4550, '125gg', '1155', '121fdk', '65'),
(92, 1, 'BD', '2018-07-30', 1, 4550, '125gg', '1155', '121fdk', '65'),
(93, 1, 'BD', '2018-07-30', 1, 4550, '125gg', '1155', '121fdk', '65'),
(110, 3, 'BD', '2018-10-10', 1, NULL, 'NULL', 'NULL', 'NULL', 'NULL'),
(111, 3, 'BD', '2018-09-09', 1, NULL, 'NULL', 'NULL', 'NULL', 'NULL'),
(112, 3, 'BD', '2018-05-29', 1, NULL, 'NULL', 'NULL', 'NULL', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `magasins`
--

DROP TABLE IF EXISTS `magasins`;
CREATE TABLE IF NOT EXISTS `magasins` (
  `conteur` int(11) NOT NULL AUTO_INCREMENT,
  `idMagasin` varchar(10) NOT NULL,
  `nomMagasin` varchar(100) NOT NULL,
  PRIMARY KEY (`idMagasin`),
  UNIQUE KEY `idMagasin` (`idMagasin`),
  UNIQUE KEY `conteur` (`conteur`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `magasins`
--

INSERT INTO `magasins` (`conteur`, `idMagasin`, `nomMagasin`) VALUES
(1, 'MA', 'magasin d\'ATLAS'),
(2, 'MB', 'Magasin de BETOUAR'),
(3, 'MD_1', 'Magasin_1 de la délégation'),
(4, 'MD_2', 'Magasin_2 de la délégation'),
(5, 'MD_3', 'Magasin_3 de la délégation'),
(6, 'MD_4', 'Magasin_4 de la délégation'),
(7, 'MD_5', 'Magasin_5 de la délégation'),
(8, 'MD_6', 'Magasin_6 de la délégation'),
(9, 'MD_7', 'Magasin_7 de la délégation'),
(10, 'MP', 'Magasin provisoire de la délégation'),
(11, 'MSZ', 'Magasin de SID ZAKANI'),
(15, 'T_15', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `marques`
--

DROP TABLE IF EXISTS `marques`;
CREATE TABLE IF NOT EXISTS `marques` (
  `idMarque` int(11) NOT NULL AUTO_INCREMENT,
  `Marque` varchar(100) NOT NULL,
  PRIMARY KEY (`idMarque`),
  UNIQUE KEY `Marque` (`Marque`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marques`
--

INSERT INTO `marques` (`idMarque`, `Marque`) VALUES
(5, ' Asus'),
(4, ' Samsung'),
(6, 'Acer'),
(7, 'Alienware'),
(3, 'Apple'),
(2, 'Dell'),
(10, 'hp'),
(9, 'lenovo'),
(11, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `materiels`
--

DROP TABLE IF EXISTS `materiels`;
CREATE TABLE IF NOT EXISTS `materiels` (
  `idMateriel` int(60) NOT NULL AUTO_INCREMENT,
  `idMagasin` varchar(10) DEFAULT NULL,
  `idModele` int(11) NOT NULL,
  `idLivraison` int(11) NOT NULL,
  `idSousFamille` int(11) NOT NULL,
  `numeroInventaire` varchar(80) NOT NULL,
  `numeroDeSerie` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `etat` enum('stocké','affecté') NOT NULL,
  `essaiMiseService` enum('oui','non') NOT NULL,
  PRIMARY KEY (`idMateriel`),
  UNIQUE KEY `numeroInventaire` (`numeroInventaire`),
  UNIQUE KEY `numeroDeSerie` (`numeroDeSerie`),
  KEY `idLivraison` (`idLivraison`),
  KEY `idMagasin` (`idMagasin`),
  KEY `idSousFamille` (`idSousFamille`),
  KEY `idModele` (`idModele`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materiels`
--

INSERT INTO `materiels` (`idMateriel`, `idMagasin`, `idModele`, `idLivraison`, `idSousFamille`, `numeroInventaire`, `numeroDeSerie`, `designation`, `etat`, `essaiMiseService`) VALUES
(14, 'MD_2', 20, 21, 4, 'MI2018', 'xxx-xxl-d5', 'laptop', 'stocké', 'non'),
(33, 'MD_5', 46, 65, 4, 'MI201833', 'tetsttt213', 'laptop', 'stocké', 'oui'),
(53, NULL, 8, 110, 4, 'MI/2018/Oct/53', 'cccccc', 'cccccc', 'stocké', 'non'),
(54, NULL, 32, 111, 4, 'MI-2018-09-54', 'xxx-xx-x', 'xxx-xx-x', 'stocké', 'non'),
(55, NULL, 9, 112, 4, 'MI-2018-05-55', 'ccc', 'ccc', 'stocké', 'non');

-- --------------------------------------------------------

--
-- Table structure for table `modeles`
--

DROP TABLE IF EXISTS `modeles`;
CREATE TABLE IF NOT EXISTS `modeles` (
  `idModele` int(11) NOT NULL AUTO_INCREMENT,
  `idMarque` int(11) NOT NULL,
  `modele` varchar(255) NOT NULL,
  PRIMARY KEY (`idModele`),
  KEY `idMarque` (`idMarque`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modeles`
--

INSERT INTO `modeles` (`idModele`, `idMarque`, `modele`) VALUES
(8, 5, ' X556UQ\r\n'),
(9, 5, ' N705UN\r\n'),
(10, 5, 'S510UF\r\n'),
(11, 5, 'UX561UD\r\n'),
(15, 5, 'UX550VD\r\n'),
(16, 2, 'E4300'),
(17, 2, 'E4200 '),
(18, 2, 'E5400a'),
(19, 2, 'E5500a '),
(20, 2, 'E5500'),
(21, 2, 'E6540'),
(22, 2, 'E6530'),
(23, 2, 'E6410 '),
(24, 2, 'E6230'),
(25, 11, ' SVE14A1S1E/B'),
(26, 11, 'VPCZ23S9E/X'),
(27, 11, 'VGN-SR39VN/H'),
(28, 11, 'PCG-R600MP'),
(29, 11, 'VGN-N31S/W'),
(30, 11, 'SVF1532S2EB'),
(31, 11, 'S510UR-BQ271T'),
(32, 4, 'NP300E7A-S01FR'),
(33, 4, 'NP300E7A-S01FR'),
(34, 4, 'R730'),
(35, 4, 'XE700T1C'),
(36, 4, 'XE700T1C-A04PL'),
(37, 6, 'A515-51G-37Z4'),
(38, 6, 'GX-781'),
(39, 6, ' 5750ZG-B966G1'),
(40, 6, ' V3-771G-73638G1'),
(41, 6, '5920G-3A2G16MN'),
(44, 9, 'G50-30'),
(45, 9, ' E40-70'),
(46, 9, ' G50-80'),
(47, 9, '310-20IAP'),
(48, 9, '510S'),
(49, 10, '210-4122sf '),
(50, 10, 'N3060 '),
(51, 10, '22-B031NF'),
(52, 10, ' N3060'),
(53, 10, '15-cc013nk '),
(59, 7, 'M15x'),
(60, 7, 'M17x-9541'),
(61, 7, 'M14x-9625'),
(62, 7, 'Area-51'),
(63, 7, 'AW2518H'),
(65, 5, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `sousfamilles`
--

DROP TABLE IF EXISTS `sousfamilles`;
CREATE TABLE IF NOT EXISTS `sousfamilles` (
  `idSousFamille` int(11) NOT NULL AUTO_INCREMENT,
  `sousFamille` varchar(50) NOT NULL,
  PRIMARY KEY (`idSousFamille`),
  UNIQUE KEY `sousFamille` (`sousFamille`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sousfamilles`
--

INSERT INTO `sousfamilles` (`idSousFamille`, `sousFamille`) VALUES
(1, 'aa'),
(5, 'bureau'),
(4, 'info1'),
(8, 'stito'),
(2, 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `typelivraisons`
--

DROP TABLE IF EXISTS `typelivraisons`;
CREATE TABLE IF NOT EXISTS `typelivraisons` (
  `IdTypeLivraison` varchar(10) NOT NULL,
  `typeLivraison` varchar(20) NOT NULL,
  PRIMARY KEY (`IdTypeLivraison`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typelivraisons`
--

INSERT INTO `typelivraisons` (`IdTypeLivraison`, `typeLivraison`) VALUES
('BD', 'Bon de commande'),
('D', 'Don'),
('M', 'Marché');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `PPR` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `profile` enum('observateur','utilisateur','administrateur','') NOT NULL,
  `adresseMail` varchar(100) NOT NULL,
  PRIMARY KEY (`PPR`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`PPR`, `nom`, `prenom`, `login`, `password`, `profile`, `adresseMail`) VALUES
(33, 'o', 'o', 'o', 'd95679752134a2d9eb61dbd7b91c4bcc', 'utilisateur', 'o@o'),
(35, 'uu', 'uu', 'uu', '6277e2a7446059985dc9bcf0a4ac1a8f', 'administrateur', 'uu@uu'),
(36, 'fu', 'fu', 'fufufu', '8fa14cdd754f91cc6554c9e71929cce7', 'utilisateur', 'f@f'),
(37, 'm', 'm', 'm', '6f8f57715090da2632453988d9a1501b', 'administrateur', 'm@m'),
(41, 'ta', 'ta', 'ta', 'fec8f2a3f2e808ccb17c4d278b4fa469', 'administrateur', 'ta@ta'),
(42, 'ay', 'ay', 'ay', '42d74a038852aaee074a9245c49e9c8d', 'administrateur', 'ay@ay'),
(43, 'cv', 'cv', 'cvcv', 'a90ef8453f5027475b90ccf7cffe1680', 'administrateur', 'cv@cv'),
(44, 'trr', 'trr', 'trrr', '2666d26ddf470e7509bb3c6db717d29c', 'utilisateur', 'trrr@trrr'),
(45, 'utilisateur', 'utilisateur', 'utilisateur', '09b2e4630977790db15226f8e6596f63', 'utilisateur', 'tt@hh.tt'),
(47, 'EL MOUHI', 'MERYEM', 'ELMOUHI', 'fbc61a372f570c6013cbbdacc2d12a6c', 'utilisateur', 'meryamelmouhi@gmail.com'),
(48, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrateur', 'admin@admin.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `familles_sousfamilles`
--
ALTER TABLE `familles_sousfamilles`
  ADD CONSTRAINT `familles_sousfamilles_ibfk_1` FOREIGN KEY (`idFamille`) REFERENCES `familles` (`idFamille`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `familles_sousfamilles_ibfk_2` FOREIGN KEY (`idSousFamille`) REFERENCES `sousfamilles` (`idSousFamille`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `livraisons`
--
ALTER TABLE `livraisons`
  ADD CONSTRAINT `livraisons_ibfk_1` FOREIGN KEY (`idFournisseur`) REFERENCES `fournisseurs` (`idFournisseur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livraisons_ibfk_2` FOREIGN KEY (`IdTypeLivraison`) REFERENCES `typelivraisons` (`IdTypeLivraison`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materiels`
--
ALTER TABLE `materiels`
  ADD CONSTRAINT `materiels_ibfk_10` FOREIGN KEY (`idModele`) REFERENCES `modeles` (`idModele`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materiels_ibfk_4` FOREIGN KEY (`idLivraison`) REFERENCES `livraisons` (`idLivraison`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materiels_ibfk_7` FOREIGN KEY (`idMagasin`) REFERENCES `magasins` (`idMagasin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materiels_ibfk_9` FOREIGN KEY (`idSousFamille`) REFERENCES `sousfamilles` (`idSousFamille`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modeles`
--
ALTER TABLE `modeles`
  ADD CONSTRAINT `modeles_ibfk_1` FOREIGN KEY (`idMarque`) REFERENCES `marques` (`idMarque`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
