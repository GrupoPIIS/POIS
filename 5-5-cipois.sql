-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2015 a las 23:35:08
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cipois`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
`id_cat` int(11) NOT NULL,
  `nombre_cat` varchar(50) NOT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nombre_cat`, `imagen`, `creada`) VALUES
(0, 'default', NULL, '2015-04-04 17:10:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE IF NOT EXISTS `estadisticas` (
  `id_poi` int(11) NOT NULL,
  `num_visitas` int(11) NOT NULL,
  `actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extras_poi`
--

CREATE TABLE IF NOT EXISTS `extras_poi` (
  `id_poi` int(11) NOT NULL,
  `slogan` varchar(200) DEFAULT NULL,
  `telefono1` varchar(30) DEFAULT NULL,
  `telefono2` varchar(30) DEFAULT NULL,
  `direccion_local` varchar(200) DEFAULT NULL,
  `horario` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `id_poi_id_cat`
--

CREATE TABLE IF NOT EXISTS `id_poi_id_cat` (
  `id_poi` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL DEFAULT '0',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `id_poi_id_cat`
--

INSERT INTO `id_poi_id_cat` (`id_poi`, `id_cat`, `creado`) VALUES
(1, 0, '2015-04-26 17:16:40'),
(2, 0, '2015-04-26 17:18:07'),
(3, 0, '2015-04-26 17:20:05'),
(4, 0, '2015-04-26 17:21:37'),
(5, 0, '2015-04-28 17:02:56'),
(6, 0, '2015-04-28 17:03:52'),
(7, 0, '2015-04-28 19:10:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `id_poi` int(11) NOT NULL,
  `tipo_recurso` varchar(30) NOT NULL,
  `nombre_recurso` varchar(60) NOT NULL,
  `ruta_recurso` varchar(1000) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pois`
--

CREATE TABLE IF NOT EXISTS `pois` (
`id_poi` int(11) NOT NULL,
  `lng` double NOT NULL,
  `lat` double NOT NULL,
  `nombre_poi` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `txt_rep` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pois`
--

INSERT INTO `pois` (`id_poi`, `lng`, `lat`, `nombre_poi`, `txt_rep`, `direccion`, `id_usuario`, `creado`) VALUES
(1, 1.1665455, 37.9900462, 'UCAM', 'Universidad Católica de San Antonio', 'Ctra- Guadalupe-La Ñora ', 0, '2015-04-26 17:16:40'),
(2, -1.1701612, 37.9960367, 'Guadalupe', 'Un pueblo particular', 'Guadalupe de maciascoque', 0, '2015-04-26 17:18:07'),
(3, -1.1819736, 37.9956097, 'Centro Comercial La Noria', 'Un centro comercial Outlet para comprar cosas', 'salida autovía', 0, '2015-04-26 17:22:12'),
(4, -1.4430708, 38.0725085, 'Yéchar', 'Pueblo fuera del radio de búsqueda', 'es una prueba', 0, '2015-04-26 17:21:37'),
(5, -1.1833137, 37.9831119, 'UCAM', 'UCAM Universidad', 'La Ñora', 2, '2015-04-28 17:02:56'),
(6, -1.203656, 37.988304, 'Javalí Viejo', 'Pueblo Javalí Viejo', 'Pueblo Javalí Viejo', 2, '2015-04-28 17:03:52'),
(7, -1.203656, 37.988304, 'Ejemplo', 'Ejemplo', 'Ejemplo', 2, '2015-04-28 19:10:51');

--
-- Disparadores `pois`
--
DELIMITER //
CREATE TRIGGER `default_category` AFTER INSERT ON `pois`
 FOR EACH ROW INSERT INTO id_poi_id_cat SET id_cat = 0, id_poi = (SELECT max(id_poi) FROM pois)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE IF NOT EXISTS `redes_sociales` (
`id_red` int(11) NOT NULL,
  `nombre_red` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `icono_red` varchar(1000) COLLATE latin1_general_ci DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `redes_sociales`
--

INSERT INTO `redes_sociales` (`id_red`, `nombre_red`, `icono_red`, `creacion`) VALUES
(1, 'Facebook', 'facebook.png', '2015-05-05 23:29:29'),
(2, 'Tuenti', 'tuenti.png', '2015-05-05 23:29:40'),
(3, 'LinkedIn', 'linkedin.png', '2015-05-05 23:31:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rrss_poi`
--

CREATE TABLE IF NOT EXISTS `rrss_poi` (
  `id_poi` int(11) NOT NULL,
  `id_rrss` int(11) NOT NULL,
  `enlace` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(10) NOT NULL,
  `rol` int(2) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `cif` varchar(15) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `nombre`, `empresa`, `direccion`, `tel`, `cif`, `mail`, `password`, `creado`) VALUES
(1, 0, 'admin', 'empresa de admin', 'direccion de admin', '000000000', '000', 'dadcuentadeprueba@gmail.com', 'admin', '2015-04-05 16:12:08'),
(2, 1, 'Alicia', 'La de Alicia', 'la mia', '22222', '2222', 'aliciasm91@gmail.com', 'alicia', '2015-04-11 17:40:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`id_cat`), ADD UNIQUE KEY `nombre_cat` (`nombre_cat`), ADD UNIQUE KEY `nombre_cat_2` (`nombre_cat`), ADD UNIQUE KEY `nombre_cat_3` (`nombre_cat`);

--
-- Indices de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
 ADD PRIMARY KEY (`id_poi`);

--
-- Indices de la tabla `extras_poi`
--
ALTER TABLE `extras_poi`
 ADD PRIMARY KEY (`id_poi`);

--
-- Indices de la tabla `id_poi_id_cat`
--
ALTER TABLE `id_poi_id_cat`
 ADD PRIMARY KEY (`id_poi`,`id_cat`), ADD KEY `id_cat_poi_cat` (`id_cat`);

--
-- Indices de la tabla `multimedia`
--
ALTER TABLE `multimedia`
 ADD PRIMARY KEY (`id_poi`,`nombre_recurso`);

--
-- Indices de la tabla `pois`
--
ALTER TABLE `pois`
 ADD PRIMARY KEY (`id_poi`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
 ADD PRIMARY KEY (`id_red`), ADD UNIQUE KEY `nombre_red` (`nombre_red`);

--
-- Indices de la tabla `rrss_poi`
--
ALTER TABLE `rrss_poi`
 ADD PRIMARY KEY (`id_poi`,`id_rrss`), ADD KEY `red_rrss` (`id_rrss`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pois`
--
ALTER TABLE `pois`
MODIFY `id_poi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
MODIFY `id_red` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `id_poi_id_cat`
--
ALTER TABLE `id_poi_id_cat`
ADD CONSTRAINT `id_cat_cat` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rrss_poi`
--
ALTER TABLE `rrss_poi`
ADD CONSTRAINT `id_red_res` FOREIGN KEY (`id_rrss`) REFERENCES `redes_sociales` (`id_red`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
