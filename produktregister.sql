-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Skapad: 01 dec 2014 kl 10:56
-- Serverversion: 5.6.11
-- PHP-version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `login`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `produktregister`
--

CREATE TABLE IF NOT EXISTS `produktregister` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `namn` varchar(15) NOT NULL,
  `marke` varchar(15) NOT NULL,
  `typ` varchar(15) NOT NULL,
  `pris` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `produktregister`
--

INSERT INTO `produktregister` (`id`, `namn`, `marke`, `typ`, `pris`) VALUES
(2, 'koolabyxor', 'diesel', 'byxor', 999);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
