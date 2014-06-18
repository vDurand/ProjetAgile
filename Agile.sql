-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2014 at 08:33 AM
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
  `CLI_IdClient` int(11) NOT NULL,
  `CLI_NbPts` varchar(45) DEFAULT NULL,
  `PER_Id` int(11) NOT NULL,
  PRIMARY KEY (`CLI_IdClient`,`PER_Id`),
  KEY `fk_Client_Personne1_idx` (`PER_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Commander`
--

CREATE TABLE IF NOT EXISTS `Commander` (
  `CLI_IdClient` int(11) NOT NULL,
  `PIZ_IdPizza` int(11) NOT NULL,
  PRIMARY KEY (`CLI_IdClient`,`PIZ_IdPizza`),
  KEY `fk_Client_has_Pizza_Pizza1_idx` (`PIZ_IdPizza`),
  KEY `fk_Client_has_Pizza_Client1_idx` (`CLI_IdClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `Employer`
--

CREATE TABLE IF NOT EXISTS `Employer` (
  `EMP_IdEmployer` int(11) NOT NULL,
  `PER_Id` int(11) NOT NULL,
  PRIMARY KEY (`EMP_IdEmployer`,`PER_Id`),
  KEY `fk_Employer_Personne1_idx` (`PER_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Ingredient`
--

CREATE TABLE IF NOT EXISTS `Ingredient` (
  `ING_IdIngredient` int(11) NOT NULL,
  `ING_Nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ING_IdIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Patron`
--

CREATE TABLE IF NOT EXISTS `Patron` (
  `PAT_IdPatron` int(11) NOT NULL,
  `PER_Id` int(11) NOT NULL,
  PRIMARY KEY (`PAT_IdPatron`,`PER_Id`),
  KEY `fk_Patron_Personne1_idx` (`PER_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Personne`
--

CREATE TABLE IF NOT EXISTS `Personne` (
  `PER_Id` int(11) NOT NULL,
  `PER_Nom` varchar(45) DEFAULT NULL,
  `PER_Prenom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PER_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Pizza`
--

CREATE TABLE IF NOT EXISTS `Pizza` (
  `PIZ_IdPizza` int(11) NOT NULL,
  `PIZ_Nom` varchar(45) DEFAULT NULL,
  `PIZ_Prix` float DEFAULT NULL,
  PRIMARY KEY (`PIZ_IdPizza`)
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
  ADD CONSTRAINT `fk_Client_has_Pizza_Client1` FOREIGN KEY (`CLI_IdClient`) REFERENCES `Client` (`CLI_IdClient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
-- Constraints for table `Patron`
--
ALTER TABLE `Patron`
  ADD CONSTRAINT `fk_Patron_Personne1` FOREIGN KEY (`PER_Id`) REFERENCES `Personne` (`PER_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
