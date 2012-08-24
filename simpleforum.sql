-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-03-2012 a las 17:37:17
-- Versión del servidor: 5.5.21
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `simpleforum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foros`
--

CREATE TABLE IF NOT EXISTS `foros` (
  `id_foro` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `ultimo_mensaje` varchar(20) NOT NULL,
  `posts` int(4) NOT NULL,
  PRIMARY KEY (`id_foro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `foros`
--

INSERT INTO `foros` (`id_foro`, `nombre`, `descripcion`, `ultimo_mensaje`, `posts`) VALUES
(1, 'General', 'Lo mas general possible', 'jordi', 14),
(2, 'Songs', 'Musica Gratis', 'eee', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `tema_padre` int(4) NOT NULL,
  `id` int(4) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `fecha` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`tema_padre`, `id`, `mensaje`, `autor`, `fecha`) VALUES
(10, 1, 'sex n'' orgasm''s', 'jordi', '21/03'),
(5, 1, 'prueba', 'jordi', '21/03'),
(5, 2, 'Probando', 'jordi', '27/03'),
(5, 3, 'Probando', 'jordi', '27/03'),
(5, 4, 'prueba 2', 'jordi', '27/03'),
(10, 2, 'yea', 'jordi', '27/03'),
(5, 5, 'ffsf', 'jordi', '27/03'),
(5, 6, 'sfdsfsf', 'jordi', '27/03'),
(5, 7, 'zcxcxzczxc', 'jordi', '27/03'),
(5, 8, 'sfsdfsdf', 'jordi', '27/03'),
(5, 9, 'asdasd', 'jordi', '27/03'),
(5, 10, 'asdasdsd', 'jordi', '27/03'),
(5, 11, 'sadsad', 'jordi', '27/03'),
(5, 12, 'sadsad', 'jordi', '27/03'),
(5, 13, 'sadsad', 'jordi', '27/03'),
(5, 14, 'sdfdsfdsf', 'jordi', '27/03'),
(5, 15, 'sdfsdfds', 'jordi', '27/03'),
(5, 16, 'sdfsdfds', 'jordi', '27/03'),
(5, 17, 'zxcxzc', 'jordi', '27/03'),
(5, 18, 'zxcxzc', 'jordi', '27/03'),
(10, 3, 'vcxvcv', 'jordi', '27/03'),
(10, 4, 'xcvcv', 'jordi', '27/03'),
(10, 5, 'xcvcxvxcv', 'jordi', '27/03'),
(1, 1, 'DDDD', 'jordi', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
  `nombre` varchar(20) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `tema` varchar(20) NOT NULL,
  `permitir_visitantes` int(2) NOT NULL,
  `puntos_mensajes` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sistema`
--

INSERT INTO `sistema` (`nombre`, `titulo`, `tema`, `permitir_visitantes`, `puntos_mensajes`) VALUES
('SimpleForum', 'SF', 'orange_lite', 1, 'karma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE IF NOT EXISTS `temas` (
  `categoria_padre` int(4) NOT NULL,
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `autor` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`categoria_padre`, `id`, `nombre`, `autor`) VALUES
(1, 5, 'Test', 'jordi'),
(1, 10, 'Varchaaa', 'leeel'),
(2, 1, 'prueba ', 'jordi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `testit` int(11) NOT NULL,
  `testit2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`testit`, `testit2`) VALUES
(1212, 23332),
(1212, 22323233);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nick` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `mostrar_correo` int(1) NOT NULL,
  `grupo` varchar(15) NOT NULL,
  `mensajes` int(4) NOT NULL,
  `temas` int(4) NOT NULL,
  `puntos` int(4) NOT NULL,
  `firma` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nick`, `pass`, `correo`, `mostrar_correo`, `grupo`, `mensajes`, `temas`, `puntos`, `firma`) VALUES
(1, 'jordi', 'xxxxx', 'jordixboy@gmail.com', 1, 'Administrador', 2, 3, 2, 'im sexy');
