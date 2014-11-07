-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2014 at 03:24 pm
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `JAG_REPO`
--

-- --------------------------------------------------------

--
-- Table structure for table `nivel_instruccion`
--

CREATE TABLE IF NOT EXISTS `nivel_instruccion` (
  `codigo` tinyint(1) unsigned NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nivel_instruccion`
--

INSERT INTO `nivel_instruccion` (`codigo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(0, 'N/S', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(1, 'Inicial', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(2, 'Primaria', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(3, 'Diversificada', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(4, 'Tecnico Medio', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(5, 'Tecnico Superior', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(6, 'Universitario', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(7, 'Post-grado', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(8, 'Doctorado', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;