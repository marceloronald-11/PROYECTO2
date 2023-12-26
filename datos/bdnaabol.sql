-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-12-2023 a las 13:55:40
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdnaabol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `codalum` int NOT NULL AUTO_INCREMENT,
  `coddep` int DEFAULT '0',
  `nombrealum` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `telfalum` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `emailalum` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `observalum` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fotoalum` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cialum` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nareas` int DEFAULT '0',
  `ndoc` int DEFAULT '0',
  PRIMARY KEY (`codalum`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`codalum`, `coddep`, `nombrealum`, `telfalum`, `emailalum`, `observalum`, `fotoalum`, `cialum`, `nareas`, `ndoc`) VALUES
(3, 1, 'GREGORIO ROBLES', '71945878', 'raul.webnet@hotmail.com', NULL, NULL, '4545454', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `codarea` int NOT NULL AUTO_INCREMENT,
  `detarea` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codarea`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`codarea`, `detarea`) VALUES
(1, 'ATC'),
(2, 'CNS'),
(3, 'METEOROLOGIA (MET)'),
(4, 'CARTOGRAFIA AERONAUTICA(MAP)'),
(5, 'PANS/OPS'),
(6, 'AIS'),
(7, 'OPERACIONES(OPS)'),
(8, 'SMS'),
(9, 'FAU'),
(10, 'SAT'),
(11, 'SSEI'),
(12, 'MNT'),
(13, 'AVI'),
(14, 'AVSEC/FAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areaalumno`
--

DROP TABLE IF EXISTS `areaalumno`;
CREATE TABLE IF NOT EXISTS `areaalumno` (
  `codaa` int NOT NULL AUTO_INCREMENT,
  `codalum` int DEFAULT '0',
  `codarea` int DEFAULT '0',
  `detarea2` varchar(50) DEFAULT NULL,
  `ncursos` int DEFAULT '0',
  PRIMARY KEY (`codaa`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areaalumno`
--

INSERT INTO `areaalumno` (`codaa`, `codalum`, `codarea`, `detarea2`, `ncursos`) VALUES
(1, 3, 1, 'ATC', 0),
(2, 3, 2, 'CNS', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codnu`
--

DROP TABLE IF EXISTS `codnu`;
CREATE TABLE IF NOT EXISTS `codnu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `norden` int NOT NULL,
  `nrecibo` int NOT NULL,
  `codmov` int NOT NULL,
  `nlote` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `codnu`
--

INSERT INTO `codnu` (`id`, `norden`, `nrecibo`, `codmov`, `nlote`) VALUES
(1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoalumno`
--

DROP TABLE IF EXISTS `cursoalumno`;
CREATE TABLE IF NOT EXISTS `cursoalumno` (
  `codcurr` int NOT NULL AUTO_INCREMENT,
  `codaa` int DEFAULT '0',
  `codalum` int DEFAULT '0',
  `codarea` int DEFAULT '0',
  `codigocurr` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fechacurr` date DEFAULT '0000-00-00',
  PRIMARY KEY (`codcurr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `coddep` int NOT NULL AUTO_INCREMENT,
  `descripdepto` varchar(15) NOT NULL,
  PRIMARY KEY (`coddep`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`coddep`, `descripdepto`) VALUES
(1, 'LA PAZ'),
(2, 'SANTA CRUZ'),
(3, 'COCHABAMBA'),
(4, 'ORURO'),
(5, 'POTOSI'),
(7, 'SUCRE'),
(8, 'TARIJA'),
(9, 'BENI'),
(10, 'PANDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
  `coddoc` int NOT NULL AUTO_INCREMENT,
  `codalum` int DEFAULT NULL,
  `detdoc` varchar(100) DEFAULT NULL,
  `fotodoc` char(50) DEFAULT NULL,
  PRIMARY KEY (`coddoc`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `codgru` int NOT NULL AUTO_INCREMENT,
  `detgrupo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codgru`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`codgru`, `detgrupo`) VALUES
(1, 'MAQUINAS DE COSTURA INDUSTRIAL '),
(2, 'MAQUINAS DE CORTE TEXTIL'),
(3, 'BORDADORAS COMPUTARIZADAS '),
(4, 'PLANCHAS INDUSTRIALES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `codper` int NOT NULL AUTO_INCREMENT,
  `nombreper` varchar(70) DEFAULT NULL,
  `emailper` varchar(100) DEFAULT NULL,
  `celper` varchar(50) DEFAULT NULL,
  `direccper` varchar(150) DEFAULT NULL,
  `observper` varchar(300) DEFAULT NULL,
  `fotoper` varchar(100) DEFAULT NULL,
  `ciper` varchar(30) DEFAULT NULL,
  `qrfotoper` varchar(300) DEFAULT NULL,
  `coddep` int DEFAULT NULL,
  `codarea` int DEFAULT NULL,
  `codcargo` int DEFAULT NULL,
  PRIMARY KEY (`codper`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`codper`, `nombreper`, `emailper`, `celper`, `direccper`, `observper`, `fotoper`, `ciper`, `qrfotoper`, `coddep`, `codarea`, `codcargo`) VALUES
(1, 'MARCELO RONALD CHOQUE ZAMBRANA', 'marceloronald111@gmail.com', '69853791', 'CALLE 5', 'nada', '#', '2343233', NULL, NULL, 3, 3),
(2, 'PEDRO PARAMO', 'raul.webnet@hotmail.com', '77766269', 'PJE COBIJA # 18 ZONA NORTE', 'cccc', NULL, '45454545', NULL, NULL, 0, 0),
(6, 'BRITA MENDEZ ZAMORANO', 'raul.webnet@hotmail.com', '+59177766269', 'calle Beni y Pando', 'cc', NULL, '1202555', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) DEFAULT NULL,
  `nomb_usu` varchar(50) DEFAULT NULL,
  `pass_usu` varchar(100) DEFAULT NULL,
  `id_area` varchar(20) DEFAULT NULL,
  `codper` int DEFAULT NULL,
  `coddep` int DEFAULT '1',
  `nombredepto` varchar(15) DEFAULT NULL,
  `nomb_suc` varchar(60) DEFAULT NULL,
  `foto_usu` varchar(100) DEFAULT NULL,
  `codsuc` int DEFAULT '0',
  `codtisuc` int DEFAULT NULL,
  `qrfotousu` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_usu`),
  KEY `id_area` (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `usuario`, `nomb_usu`, `pass_usu`, `id_area`, `codper`, `coddep`, `nombredepto`, `nomb_suc`, `foto_usu`, `codsuc`, `codtisuc`, `qrfotousu`) VALUES
(16, 'admin', 'MARCELO RONALS CHOQUE ZAMBRANA', 'admin', 'admin', 1, 1, NULL, NULL, '#', 1, NULL, NULL),
(27, 'pedro', 'PEDRO PARAMO', 'pedro', 'usua', 2, 1, NULL, NULL, NULL, 0, NULL, NULL),
(28, 'brita', 'BRITA MENDEZ ZAMORANO', 'brita', 'usua', 6, 1, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasgrafi`
--

DROP TABLE IF EXISTS `ventasgrafi`;
CREATE TABLE IF NOT EXISTS `ventasgrafi` (
  `codgrav` int NOT NULL AUTO_INCREMENT,
  `mess` varchar(15) NOT NULL,
  `impoventa` double(10,2) NOT NULL,
  `impocompra` double(10,2) NOT NULL,
  PRIMARY KEY (`codgrav`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventasgrafi`
--

INSERT INTO `ventasgrafi` (`codgrav`, `mess`, `impoventa`, `impocompra`) VALUES
(1, 'ENERO', 1300.50, 300.00),
(2, 'FEBRERO', 1200.00, 9000.00),
(3, 'MARZO', 1500.10, 5000.00),
(4, 'ABRIL', 350.55, 100.00),
(5, 'MAYO', 450.60, 800.00),
(6, 'JUNIO', 500.00, 900.00),
(7, 'JULIO', 650.35, 1000.00),
(8, 'AGOSTO', 980.30, 680.00),
(9, 'SEPTIEMBRE', 560.90, 590.00),
(10, 'OCTUBRE', 1700.90, 750.00),
(11, 'NOVIEMBRE', 200.30, 900.00),
(12, 'DICIEMBRE', 2000.60, 1401.00);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
