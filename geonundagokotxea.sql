-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-11-2014 a las 23:55:01
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `geonundagokotxea`
--
CREATE DATABASE IF NOT EXISTS `geonundagokotxea` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `geonundagokotxea`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kokalekua`
--

CREATE TABLE IF NOT EXISTS `kokalekua` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kokalekua`
--

INSERT INTO `kokalekua` (`id`, `user_id`, `latitude`, `longitude`, `timeStamp`) VALUES
(25, 2147483647, '43.3264723', '-3.0095973', '2014-11-15 17:21:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `kokalekua`
--
ALTER TABLE `kokalekua`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `kokalekua`
--
ALTER TABLE `kokalekua`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
