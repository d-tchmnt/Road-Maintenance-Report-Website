-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 25 Ιουν 2014 στις 12:19:24
-- Έκδοση διακομιστή: 5.6.12-log
-- Έκδοση PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `

--

CREATE TABLE IF NOT EXISTS `anafores` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `k_id` int(11) NOT NULL,
  `ea_id` int(11) DEFAULT NULL,
  `x_id` int(11) NOT NULL,
  `onoma_anaf` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geogr_thesi` varchar(150) CHARACTER SET utf8 NOT NULL,
  `perigr_xristi` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `epilithike` tinyint(1) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pic1` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pic2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic4` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`a_id`),
  KEY `FK_Anaferoun` (`x_id`) ,
  KEY `FK_Anikoun` (`k_id`) ,
  KEY `FK_einai` (`ea_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=447 ;

--
-- Άδειασμα δεδομένων του πίνακα `anafores`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `epil_anaf`
--

CREATE TABLE IF NOT EXISTS `epil_anaf` (
  `ea_id` int(11) NOT NULL AUTO_INCREMENT,
  `x_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `epil_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sxolio_diax` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ea_id`),
  KEY `FK_Epilyoun` (`x_id`) ,
  KEY `FK_einai2` (`a_id`) 
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=47 ;

--
-- Άδειασμα δεδομένων του πίνακα `epil_anaf`
--



-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `katigories_anaf`
--

CREATE TABLE IF NOT EXISTS `katigories_anaf` (
  `k_id` int(11) NOT NULL AUTO_INCREMENT,
  `onoma_kat` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`k_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Άδειασμα δεδομένων του πίνακα `katigories_anaf`
--


-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `xristes`
--

CREATE TABLE IF NOT EXISTS `xristes` (
  `x_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onoma` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epwnymo` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thlefwno` int(11) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`x_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=54 ;

--
-- Άδειασμα δεδομένων του πίνακα `xristes`
--




ALTER TABLE `anafores`
  ADD CONSTRAINT `FK_Anaferoun` FOREIGN KEY (`x_id`) REFERENCES `xristes` (`x_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Anikoun` FOREIGN KEY (`k_id`) REFERENCES `katigories_anaf` (`k_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_einai` FOREIGN KEY (`ea_id`) REFERENCES `epil_anaf` (`ea_id`) ON DELETE CASCADE;

--
-- Περιορισμοί για πίνακα `epil_anaf`
--
ALTER TABLE `epil_anaf`
  ADD CONSTRAINT `FK_einai2` FOREIGN KEY (`a_id`) REFERENCES `anafores` (`a_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Epilyoun` FOREIGN KEY (`x_id`) REFERENCES `xristes` (`x_id`) ON DELETE CASCADE;
  
  
INSERT INTO `xristes` (`x_id`, `email`, `password`, `onoma`, `epwnymo`, `thlefwno`, `admin`) VALUES
(39, 'katsinelos@ceid', '$1$Ge1.Xl/.$xyt0AzvBLN17mb4Gw/cpr0', '', '', 0, 1),
(40, 'gersimos@ceid', '$1$n80.k/..$8VvmEGzrM1fV93OYNIklo0', '', '', 0, 0),
(41, 'katsi@ceid', '$1$dz5.iF0.$XRkRNnLb9stjCg8vMUvm7.', '', '', 0, 0),
(42, 'nikolos@ceid', '$1$DQ1.QC1.$CMq01pb7gtU/Z2zkNA/Wn0', '', '', 0, 0),
(43, 'lo@ceid', '$1$Z41.uZ/.$04hcIIEmDbKNgKyY67YKs1', '', '', 0, 0),
(44, 'lol@ceid', '$1$U/5.NY2.$nxf6/3gBn58CDvLSIjpvt/', '', '', 0, 0),
(45, 'katsinelos@ceid1', '$1$fI1.6q4.$I6/8KKOfI5B530.EdLXps1', '', '', 0, 0),
(46, 'lolakos@ceid', '$1$VA2.4B3.$MiS9OU1NxWYi.L58KHHCD1', '', '', 0, 0),
(47, 'kats@ceid', '$1$5Y5.oc3.$AbG4enkiL3L.tlEGe9mft/', '', '', 0, 0),
(48, 'nikoss@ceid', '$1$kv..dl0.$377sylnMcpl0z1OpYyD67/', '', '', 0, 0),
(49, 'holli@ceid', '$1$iP/.DS5.$Z/HEZwinLKUXShnKZgiEe1', '', '', 0, 0),
(51, 'xara@ceid', '$1$PH4.sh3.$OjgyuVKALZ2ptb8KU/FeQ/', '', '', 0, 0),
(52, 'nickotinick@hotmail.com', '$1$jQ4.w25.$f.M8xPA4RyVHVVXWwPA5n.', 'Νίκο', 'οτινικ;', 0, 1),
(53, 'pao@mpaso.gr', '$1$n40.kB/.$2gI0ed3V7x2/G1t5G9As0.', '', '', 0, 0);


INSERT INTO `katigories_anaf` (`k_id`, `onoma_kat`) VALUES
(5, 'aek aek');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
