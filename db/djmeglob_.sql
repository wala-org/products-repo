-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-06-2014 a las 16:47:01
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ugift`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busqueda`
--

CREATE TABLE IF NOT EXISTS `busqueda` (
  `id_busqueda` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_agasajado` varchar(30) NOT NULL,
  PRIMARY KEY (`id_busqueda`),
  KEY `id_busqueda` (`id_busqueda`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `busqueda`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busqueda_opcion`
--

CREATE TABLE IF NOT EXISTS `busqueda_opcion` (
  `id_busqueda` int(11) NOT NULL,
  `id_opcion` int(11) NOT NULL,
  KEY `id_busqueda` (`id_busqueda`),
  KEY `id_opcion` (`id_opcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `busqueda_opcion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_tipos`
--

CREATE TABLE IF NOT EXISTS `grupo_tipos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `grupo_tipos`
--

INSERT INTO `grupo_tipos` (`id_grupo`, `nombre`, `descripcion`) VALUES
(1, 'tipos de personalidad', 'los tipos de personalidad relacionados al metodo MBTI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE IF NOT EXISTS `opciones` (
  `id_opcion` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pregunta` int(11) NOT NULL,
  `p_sig` int(11) DEFAULT NULL,
  `valor` int(11) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_opcion`),
  KEY `id_opcion` (`id_opcion`),
  KEY `fk_pregunta` (`fk_pregunta`),
  KEY `p_sig` (`p_sig`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id_opcion`, `fk_pregunta`, `p_sig`, `valor`, `texto`, `imagen`) VALUES
(1, 1, 2, 1, 'Suele ser reservado en lo que piensa y siente', 'introvert.png'),
(2, 1, 2, 2, 'Le cuenta todo a todo el mundo', 'extrovert.png'),
(3, 2, 3, 1, 'Le gusta pensar en ideas nuevas y tiene buena imaginacion', 'intuitive.png'),
(4, 2, 3, 2, 'Prefiere soluciones conocidas, concretas y aterrizadas', 'sensory.jpg'),
(5, 3, 4, 1, 'Decide conforme a su valoracion subjetiva de las cosas', 'emotional.png'),
(6, 3, 4, 2, 'Prefiere decidir de acuerdo a las evidencias y hechos comprobables', 'rational.png'),
(7, 4, NULL, 1, 'Prefiere tener las opciones abiertas para ir adaptandose al contexto', 'perceptive.jpg'),
(8, 4, NULL, 2, 'Es alguien que suele planificar anticipadamente y se ajusta a los compromisos asumidos', 'evaluator.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(100) NOT NULL,
  `id_tipouser` int(11) NOT NULL,
  PRIMARY KEY (`id_pregunta`),
  KEY `id_tipouser` (`id_tipouser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `pregunta`, `id_tipouser`) VALUES
(1, 'Introvertido-Extrovertido', 9),
(2, 'Intuitivo-Sensorial', 9),
(3, 'Emocional-Racional', 9),
(4, 'Perceptivo-Evaluador', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `link` varchar(250) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `link`, `imagen`) VALUES
(1, 'Set de Jardinería Biodegradable ', 228, 'http://www.tiendagreengift.com.ar/jardineria-urbana/set-de-jardineria-biodegradable/', '1.jpg'),
(2, 'Maceta textil ideal para balcones', 596, '', '2.jpg'),
(3, 'Minihuertas aromáticas', 200, '', '3.jpg'),
(4, 'Experiencias deportivas', 250, '', '4.jpg'),
(5, 'box accion', 200, '', '5.png'),
(6, 'box adrenalina', 200, '', '6.png'),
(7, 'box sabores del mundo', 100, '', '7.png'),
(8, 'anotador curita', 50, '', '8.jpg'),
(9, 'taza oink', 100, '', '9.jpg'),
(10, 'robot usb', 95, '', '10.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `id_tipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `id_grupo`, `nombre`) VALUES
(5, 1, 'I'),
(6, 1, 'E'),
(7, 1, 'N'),
(8, 1, 'S'),
(9, 1, 'F'),
(10, 1, 'T'),
(11, 1, 'P'),
(12, 1, 'J');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_producto`
--

CREATE TABLE IF NOT EXISTS `tipos_producto` (
  `id_producto` int(11) NOT NULL,
  `id_tipo` int(11) unsigned NOT NULL,
  KEY `id_producto` (`id_producto`),
  KEY `id_tipo` (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tipos_producto`
--

INSERT INTO `tipos_producto` (`id_producto`, `id_tipo`) VALUES
(1, 5),
(1, 8),
(1, 9),
(1, 11),
(2, 5),
(2, 8),
(2, 9),
(2, 11),
(3, 5),
(3, 8),
(3, 9),
(3, 12),
(4, 6),
(4, 7),
(4, 10),
(4, 12),
(5, 6),
(5, 8),
(5, 10),
(5, 12),
(6, 5),
(6, 8),
(6, 9),
(6, 11),
(7, 6),
(7, 7),
(7, 9),
(7, 11),
(8, 5),
(8, 7),
(8, 9),
(8, 11),
(9, 6),
(9, 8),
(9, 9),
(9, 12),
(10, 5),
(10, 7),
(10, 9),
(10, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipouser`
--

CREATE TABLE IF NOT EXISTS `tipouser` (
  `id_tipouser` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `edad_hasta` tinyint(3) NOT NULL,
  `edad_desde` tinyint(3) NOT NULL,
  PRIMARY KEY (`id_tipouser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `tipouser`
--

INSERT INTO `tipouser` (`id_tipouser`, `nombre`, `sexo`, `edad_hasta`, `edad_desde`) VALUES
(1, 'niño', 1, 5, 0),
(2, 'niña', 0, 5, 0),
(3, 'adolecente varon', 1, 18, 15),
(4, 'adolecente mujer', 0, 18, 15),
(5, 'nene grande', 1, 10, 5),
(6, 'nena grande', 0, 10, 5),
(7, 'varoncito', 1, 15, 10),
(8, 'mujercita', 0, 15, 10),
(9, 'adulto joven', 1, 30, 18),
(10, 'adulta joven', 0, 30, 18),
(11, 'adulto', 1, 50, 30),
(12, 'adulta', 0, 50, 30),
(13, 'anciano', 1, 100, 50),
(14, 'anciana', 0, 100, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipouser_producto`
--

CREATE TABLE IF NOT EXISTS `tipouser_producto` (
  `id_tipouser` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  KEY `id_tipouser` (`id_tipouser`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tipouser_producto`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_opcion`
--

CREATE TABLE IF NOT EXISTS `tipo_opcion` (
  `id_opcion` int(11) NOT NULL,
  `id_tipo` int(11) unsigned NOT NULL,
  KEY `id_opcion` (`id_opcion`),
  KEY `id_tipo` (`id_tipo`),
  KEY `id_tipo_2` (`id_tipo`),
  KEY `id_tipo_3` (`id_tipo`),
  KEY `id_tipo_4` (`id_tipo`),
  KEY `id_opcion_2` (`id_opcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tipo_opcion`
--

INSERT INTO `tipo_opcion` (`id_opcion`, `id_tipo`) VALUES
(1, 5),
(2, 6),
(3, 7),
(4, 8),
(5, 9),
(6, 10),
(7, 11),
(8, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nivel` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usuario`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `busqueda`
--
ALTER TABLE `busqueda`
  ADD CONSTRAINT `busqueda_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `busqueda_opcion`
--
ALTER TABLE `busqueda_opcion`
  ADD CONSTRAINT `busqueda_opcion_ibfk_1` FOREIGN KEY (`id_busqueda`) REFERENCES `busqueda` (`id_busqueda`) ON UPDATE CASCADE,
  ADD CONSTRAINT `busqueda_opcion_ibfk_2` FOREIGN KEY (`id_opcion`) REFERENCES `busqueda_opcion` (`id_opcion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`fk_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `opciones_ibfk_2` FOREIGN KEY (`p_sig`) REFERENCES `pregunta` (`id_pregunta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`id_tipouser`) REFERENCES `tipouser` (`id_tipouser`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipos_producto`
--
ALTER TABLE `tipos_producto`
  ADD CONSTRAINT `tipos_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipos_producto_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipos` (`id_tipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipouser_producto`
--
ALTER TABLE `tipouser_producto`
  ADD CONSTRAINT `tipouser_producto_ibfk_1` FOREIGN KEY (`id_tipouser`) REFERENCES `tipouser` (`id_tipouser`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipouser_producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tipos_producto` (`id_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_opcion`
--
ALTER TABLE `tipo_opcion`
  ADD CONSTRAINT `tipo_opcion_ibfk_1` FOREIGN KEY (`id_opcion`) REFERENCES `opciones` (`id_opcion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_opcion_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipos` (`id_tipo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
