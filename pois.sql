-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2015 a las 00:07:29
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pois`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pois`
--

CREATE TABLE IF NOT EXISTS `pois` (
`id` int(10) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `loc` varchar(70) NOT NULL,
  `lema` varchar(200) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pois`
--

INSERT INTO `pois` (`id`, `nombre`, `loc`, `lema`, `desc`) VALUES
(1, 'los antonios', '34.333442, 0.23456', 'Los mejores bocatas', 'Es un restaurante de comida rápida destinado a llevar el arte del bocadillo a altas cotas de excelencia'),
(2, 'Las mulas', '34.5563, 0.368928', 'Tasca típica murciana', 'Taberna tradicional murciana con más de 100 años de experiencia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pois`
--
ALTER TABLE `pois`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pois`
--
ALTER TABLE `pois`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
