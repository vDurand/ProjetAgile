-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2014 at 11:50 AM
-- Server version: 5.6.12
-- PHP Version: 5.4.4-14+deb7u8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Agile`
--

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE IF NOT EXISTS `Client` (
  `CLI_IdClient` int(11) NOT NULL AUTO_INCREMENT,
  `CLI_NbPts` varchar(45) DEFAULT NULL,
  `PER_Id` int(11) NOT NULL,
  PRIMARY KEY (`CLI_IdClient`),
  KEY `fk_Client_Personne1_idx` (`PER_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`CLI_IdClient`, `CLI_NbPts`, `PER_Id`) VALUES
(1, '5', 3),
(2, '100', 4),
(3, '0', 5),
(4, NULL, 6),
(5, NULL, 7),
(6, NULL, 8),
(7, NULL, 9),
(8, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Commander`
--

CREATE TABLE IF NOT EXISTS `Commander` (
  `PIZ_IdPizza` int(11) NOT NULL,
  `COM_Quantite` int(11) DEFAULT NULL,
  `COM_Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`COM_Id`),
  KEY `fk_Client_has_Pizza_Pizza1_idx` (`PIZ_IdPizza`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Table structure for table `Composer`
--

CREATE TABLE IF NOT EXISTS `Composer` (
  `PIZ_IdPizza` int(11) NOT NULL,
  `ING_IdIngredient` int(11) NOT NULL,
  PRIMARY KEY (`PIZ_IdPizza`,`ING_IdIngredient`),
  KEY `fk_Pizza_has_Ingredient_Ingredient1_idx` (`ING_IdIngredient`),
  KEY `fk_Pizza_has_Ingredient_Pizza_idx` (`PIZ_IdPizza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Composer`
--

INSERT INTO `Composer` (`PIZ_IdPizza`, `ING_IdIngredient`) VALUES
(18, 1),
(21, 1),
(36, 1),
(16, 2),
(21, 2),
(35, 2),
(16, 3),
(35, 3),
(18, 4),
(21, 4),
(35, 4),
(36, 4),
(37, 4),
(35, 6),
(36, 13),
(37, 13),
(16, 14),
(18, 15),
(36, 15),
(36, 16),
(21, 17),
(16, 19),
(35, 19),
(37, 19),
(21, 20),
(37, 21),
(16, 29),
(18, 30),
(18, 31),
(18, 32);

-- --------------------------------------------------------

--
-- Table structure for table `Employer`
--

CREATE TABLE IF NOT EXISTS `Employer` (
  `EMP_IdEmployer` int(11) NOT NULL AUTO_INCREMENT,
  `PER_Id` int(11) NOT NULL,
  PRIMARY KEY (`EMP_IdEmployer`),
  KEY `fk_Employer_Personne1_idx` (`PER_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Employer`
--

INSERT INTO `Employer` (`EMP_IdEmployer`, `PER_Id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Ingredient`
--

CREATE TABLE IF NOT EXISTS `Ingredient` (
  `ING_IdIngredient` int(11) NOT NULL AUTO_INCREMENT,
  `ING_Nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ING_IdIngredient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `Ingredient`
--

INSERT INTO `Ingredient` (`ING_IdIngredient`, `ING_Nom`) VALUES
(1, 'Sauce tomate'),
(2, 'lardon'),
(3, 'oignons'),
(4, 'mozzarella'),
(5, 'chorizon'),
(6, 'champigons'),
(7, 'saumon'),
(8, 'poulet'),
(9, 'oeuf'),
(10, 'sauce tomate'),
(11, 'poivron'),
(12, 'curry'),
(13, 'chevre'),
(14, 'reblochon'),
(15, 'roquefort'),
(16, 'camembert'),
(17, 'boulette de boeuf'),
(18, 'saucisses pepperoni'),
(19, 'creme fraiche'),
(20, 'jambon cru'),
(21, 'miel'),
(29, 'pommes de terre'),
(30, 'thon'),
(31, 'fromage rape'),
(32, 'olives');

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

CREATE TABLE IF NOT EXISTS `Order` (
  `CLI_IdClient` int(11) NOT NULL,
  `COM_Id` int(11) NOT NULL,
  `ORD_Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ORD_Id`),
  KEY `fk_Client_has_Commander_Commander1_idx` (`COM_Id`),
  KEY `fk_Client_has_Commander_Client1_idx` (`CLI_IdClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `Patron`
--

CREATE TABLE IF NOT EXISTS `Patron` (
  `PAT_IdPatron` int(11) NOT NULL AUTO_INCREMENT,
  `PER_Id` int(11) NOT NULL,
  PRIMARY KEY (`PAT_IdPatron`),
  KEY `fk_Patron_Personne1_idx` (`PER_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Patron`
--

INSERT INTO `Patron` (`PAT_IdPatron`, `PER_Id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Personne`
--

CREATE TABLE IF NOT EXISTS `Personne` (
  `PER_Id` int(11) NOT NULL AUTO_INCREMENT,
  `PER_Nom` varchar(45) DEFAULT NULL,
  `PER_Prenom` varchar(45) DEFAULT NULL,
  `PER_Pseudo` varchar(45) DEFAULT NULL,
  `PER_Mdp` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PER_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Personne`
--

INSERT INTO `Personne` (`PER_Id`, `PER_Nom`, `PER_Prenom`, `PER_Pseudo`, `PER_Mdp`) VALUES
(1, 'Jeanpierre', 'Laurent', 'lolo', 'pizza'),
(2, 'toto', 'toto', 'toto', 'toto'),
(3, 'testNom', 'testPrenom', 'testPseudo', 'testMdp'),
(4, 'Buon', 'Ignasse', 'bubu', 'aqwzsxedc'),
(5, 'Lamb', 'Phil', 'phiphi', 'lamlam'),
(6, 'Valjean', 'Jean', NULL, NULL),
(7, 'Bobo', 'Larue', NULL, NULL),
(8, 'YOLO', 'OLOY', NULL, NULL),
(9, 'Lambert', '', NULL, NULL),
(10, 'Poppo', 'Lalla', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Pizza`
--

CREATE TABLE IF NOT EXISTS `Pizza` (
  `PIZ_IdPizza` int(11) NOT NULL AUTO_INCREMENT,
  `PIZ_Nom` varchar(45) DEFAULT NULL,
  `PIZ_Prix` float DEFAULT NULL,
  `PIZ_Valide` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`PIZ_IdPizza`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `Pizza`
--

INSERT INTO `Pizza` (`PIZ_IdPizza`, `PIZ_Nom`, `PIZ_Prix`, `PIZ_Valide`) VALUES
(12, 'PIZZA OBELIX', 13.99, 0),
(15, 'LARDON', 11, 0),
(16, 'SAVOYARDE', 12, 1),
(17, 'BOLOGNAISE', 10, 0),
(18, 'NEPTUNE', 12, 1),
(21, 'CALZONE', 8, 1),
(32, 'TEST', 45, 0),
(33, 'FEFEZ', 34, 0),
(35, 'CAMPAGNARDE', 12, 1),
(36, '4 FROMAGES', 9, 1),
(37, 'CHEVRE MIEL', 10, 1),
(38, 'TEST', 11, 1),
(39, 'YUE', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Pizzaiolo`
--

CREATE TABLE IF NOT EXISTS `Pizzaiolo` (
  `PIO_IdPizzaiolo` int(11) NOT NULL,
  `PER_Id` int(11) NOT NULL,
  PRIMARY KEY (`PIO_IdPizzaiolo`),
  KEY `fk_Pizzaiolo_Personne1_idx` (`PER_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `fk_Client_Personne1` FOREIGN KEY (`PER_Id`) REFERENCES `Personne` (`PER_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Commander`
--
ALTER TABLE `Commander`
  ADD CONSTRAINT `fk_Client_has_Pizza_Pizza1` FOREIGN KEY (`PIZ_IdPizza`) REFERENCES `Pizza` (`PIZ_IdPizza`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Composer`
--
ALTER TABLE `Composer`
  ADD CONSTRAINT `fk_Pizza_has_Ingredient_Pizza` FOREIGN KEY (`PIZ_IdPizza`) REFERENCES `Pizza` (`PIZ_IdPizza`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pizza_has_Ingredient_Ingredient1` FOREIGN KEY (`ING_IdIngredient`) REFERENCES `Ingredient` (`ING_IdIngredient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Employer`
--
ALTER TABLE `Employer`
  ADD CONSTRAINT `fk_Employer_Personne1` FOREIGN KEY (`PER_Id`) REFERENCES `Personne` (`PER_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `fk_Client_has_Commander_Client1` FOREIGN KEY (`CLI_IdClient`) REFERENCES `Client` (`CLI_IdClient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Client_has_Commander_Commander1` FOREIGN KEY (`COM_Id`) REFERENCES `Commander` (`COM_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Patron`
--
ALTER TABLE `Patron`
  ADD CONSTRAINT `fk_Patron_Personne1` FOREIGN KEY (`PER_Id`) REFERENCES `Personne` (`PER_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Pizzaiolo`
--
ALTER TABLE `Pizzaiolo`
  ADD CONSTRAINT `fk_Pizzaiolo_Personne1` FOREIGN KEY (`PER_Id`) REFERENCES `Personne` (`PER_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
