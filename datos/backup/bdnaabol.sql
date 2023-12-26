-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-11-2023 a las 15:11:07
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
  PRIMARY KEY (`codalum`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`codalum`, `coddep`, `nombrealum`, `telfalum`, `emailalum`, `observalum`, `fotoalum`, `cialum`, `nareas`) VALUES
(1, 1, 'JUAN ROBERTO', '71945878', 'raul.webnet@hotmail.com', NULL, NULL, '3071254', 2),
(3, 3, 'MARIA LINARES VERA', '71945879', 'raul.webnet@hotmail.com', NULL, NULL, '4071525', 0);

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
(1, 1, 1, 'ATC', 1),
(2, 1, 11, 'SSEI', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `codar` int NOT NULL AUTO_INCREMENT,
  `codgru` int DEFAULT '0',
  `codmar` int DEFAULT '0',
  `codti` int DEFAULT '0',
  `codcla` int DEFAULT NULL,
  `codpv` int DEFAULT NULL,
  `codigo` varchar(15) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `serie` varchar(50) DEFAULT NULL,
  `procedencia` varchar(30) DEFAULT NULL,
  `dimension` varchar(10) DEFAULT NULL,
  `descripar` varchar(100) DEFAULT NULL,
  `fechaing` date DEFAULT NULL,
  `saldo` int DEFAULT '0',
  `umed` char(4) DEFAULT NULL,
  `pneto` double(10,2) DEFAULT '0.00',
  `pvp` double(10,2) DEFAULT '0.00',
  `stockmin` int DEFAULT '0',
  `fechavence` date DEFAULT NULL,
  `fotoar` varchar(100) DEFAULT NULL,
  `observar` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `coddep` int DEFAULT '0',
  `codsuc` int DEFAULT NULL,
  `cantpedidos` int DEFAULT '0',
  `qr` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codar`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codar`, `codgru`, `codmar`, `codti`, `codcla`, `codpv`, `codigo`, `marca`, `modelo`, `serie`, `procedencia`, `dimension`, `descripar`, `fechaing`, `saldo`, `umed`, `pneto`, `pvp`, `stockmin`, `fechavence`, `fotoar`, `observar`, `coddep`, `codsuc`, `cantpedidos`, `qr`) VALUES
(5, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, '123456', NULL, NULL, 'MAQUINA INDUSTRIAL', NULL, 3, NULL, 1580.00, 1520.00, 4, NULL, '../fotos/2023-10-1814-24-11.jpg', NULL, 0, NULL, 0, '../php/MOI5.png'),
(8, 4, 2, 2, NULL, NULL, NULL, NULL, NULL, '555555', NULL, NULL, 'MAQUINA COLLARETA', NULL, 9, NULL, 1290.00, 1233.00, 2, NULL, NULL, NULL, 0, NULL, 0, '../php/MOI8.png'),
(10, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, '31212', NULL, NULL, 'MAQUINA OVERLOCK', NULL, 0, NULL, 1275.00, 1200.00, 2, NULL, NULL, NULL, 0, NULL, 0, '../php/MOI10.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulossuc`
--

DROP TABLE IF EXISTS `articulossuc`;
CREATE TABLE IF NOT EXISTS `articulossuc` (
  `codarsuc` int NOT NULL AUTO_INCREMENT,
  `codar` int DEFAULT '0',
  `saldosuc` int DEFAULT '0',
  `codsuc` int DEFAULT '0',
  PRIMARY KEY (`codarsuc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

DROP TABLE IF EXISTS `clasificacion`;
CREATE TABLE IF NOT EXISTS `clasificacion` (
  `codcla` int NOT NULL AUTO_INCREMENT,
  `descripcla` char(30) NOT NULL,
  `prefijo` varchar(5) DEFAULT NULL,
  `nro` int DEFAULT '0',
  PRIMARY KEY (`codcla`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`codcla`, `descripcla`, `prefijo`, `nro`) VALUES
(1, 'HILOS', 'HN', 2),
(2, 'VARIOS', 'VA4', 0),
(3, '', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `codcli` int NOT NULL AUTO_INCREMENT,
  `codzo` int DEFAULT NULL,
  `nombrecli` varchar(70) DEFAULT NULL,
  `nomsalon` varchar(100) DEFAULT NULL,
  `propietaria` char(3) DEFAULT NULL,
  `sexo` char(2) DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `feingcli` date DEFAULT NULL,
  `direcccli` varchar(150) DEFAULT NULL,
  `telfcli` varchar(50) DEFAULT NULL,
  `emailcli` varchar(100) DEFAULT NULL,
  `observcli` varchar(300) DEFAULT NULL,
  `fotocli` varchar(100) DEFAULT NULL,
  `cicli` int DEFAULT '0',
  `nitcli` char(30) DEFAULT NULL,
  `habilcli` char(2) DEFAULT NULL,
  `nrosolicitudes` int DEFAULT '0',
  `nrodoc` int DEFAULT '0',
  `nropedidos` int DEFAULT '0',
  `nrovisitas` int DEFAULT '0',
  `categoriacli` char(3) DEFAULT NULL,
  `saldocli` double(10,2) DEFAULT '0.00',
  `mapacli` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`codcli`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`codcli`, `codzo`, `nombrecli`, `nomsalon`, `propietaria`, `sexo`, `fechanac`, `feingcli`, `direcccli`, `telfcli`, `emailcli`, `observcli`, `fotocli`, `cicli`, `nitcli`, `habilcli`, `nrosolicitudes`, `nrodoc`, `nropedidos`, `nrovisitas`, `categoriacli`, `saldocli`, `mapacli`) VALUES
(1, 1, 'RAMIRO VELASCO SOTO', NULL, NULL, NULL, NULL, '2021-09-14', 'PJE COBIJA # 18 ZONA NORTE', '77766269', 'raul.webnet@hotmail.com', 'CC', '../fotos/2021-09-1412-19-32.jpg', 3071525, NULL, NULL, 0, 0, 0, 0, NULL, 0.00, NULL),
(2, 2, 'MARTHA ISABEL ROJAS', NULL, NULL, NULL, NULL, '2021-09-14', 'CALLE 3 DE MAYO Y PIZARRRO', '77758987', 'oscarIN@hotmail.com', 'NINGUNA', '../fotos/2021-09-1412-19-39.jpg', 3071526, NULL, NULL, 0, 0, 0, 0, NULL, 0.00, NULL),
(3, 2, 'MARITE ROJAS VERA', NULL, NULL, NULL, NULL, '2021-09-14', 'PJE COBIJA # 18 ZONA NORTE', '77766269', 'raul.webnet@hotmail.com', 'CC', '../fotos/2021-09-1412-36-08.jpg', 202020, NULL, NULL, 0, 0, 0, 0, NULL, 0.00, NULL),
(4, 0, '', NULL, NULL, NULL, NULL, '2023-11-15', '', '', '', '', NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, 0.00, NULL);

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
(1, 14, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

DROP TABLE IF EXISTS `creditos`;
CREATE TABLE IF NOT EXISTS `creditos` (
  `codcre` int NOT NULL AUTO_INCREMENT,
  `id_usu` int DEFAULT NULL,
  `totalcr` double(10,2) DEFAULT NULL,
  `saldocr` double(10,2) DEFAULT NULL,
  `fechacre` date DEFAULT NULL,
  `norden` int DEFAULT '0',
  `estado` char(12) DEFAULT NULL,
  `observcre` varchar(300) DEFAULT NULL,
  `codcli` int DEFAULT NULL,
  `nombreclii` varchar(100) DEFAULT NULL,
  `codsuc` int DEFAULT NULL,
  `coddep` int DEFAULT NULL,
  PRIMARY KEY (`codcre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditospagos`
--

DROP TABLE IF EXISTS `creditospagos`;
CREATE TABLE IF NOT EXISTS `creditospagos` (
  `codpag` int NOT NULL AUTO_INCREMENT,
  `codcre` int DEFAULT NULL,
  `nordencre` int DEFAULT NULL,
  `importepg` double(10,2) DEFAULT NULL,
  `fechapg` date DEFAULT NULL,
  `id_usu` int DEFAULT NULL,
  PRIMARY KEY (`codpag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotaspagos`
--

DROP TABLE IF EXISTS `cuotaspagos`;
CREATE TABLE IF NOT EXISTS `cuotaspagos` (
  `codpag` int NOT NULL AUTO_INCREMENT,
  `codsoli` int DEFAULT NULL,
  `codplan` int DEFAULT NULL,
  `codcli` int DEFAULT NULL,
  `fechapag` date DEFAULT NULL,
  `fechaact` date DEFAULT NULL,
  `cuotapag` double(10,2) DEFAULT NULL,
  `id_usu` int DEFAULT NULL,
  `observpag` longtext,
  PRIMARY KEY (`codpag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `codcurso` int NOT NULL AUTO_INCREMENT,
  `detcurso` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codcurso`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`codcurso`, `detcurso`) VALUES
(1, 'A1-001'),
(2, 'A2-100'),
(3, 'A2-200'),
(4, 'A1-FAE'),
(5, 'A2-AVB'),
(6, 'A3-OCF'),
(7, 'B1-SA'),
(8, 'A2-500'),
(9, 'A4-504');

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
  `codigocurr` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fechacurr` date DEFAULT '0000-00-00',
  PRIMARY KEY (`codcurr`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursoalumno`
--

INSERT INTO `cursoalumno` (`codcurr`, `codaa`, `codalum`, `codarea`, `codigocurr`, `fechacurr`) VALUES
(1, 1, 1, 1, 'GR-567', '2023-11-16'),
(3, 2, 1, 11, 'DER-90', '2023-11-17'),
(4, 2, 1, 11, 'NHT89', '2023-11-18');

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
  `codcli` int DEFAULT NULL,
  `detdoc` varchar(100) DEFAULT NULL,
  `fotodoc` char(50) DEFAULT NULL,
  PRIMARY KEY (`coddoc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
CREATE TABLE IF NOT EXISTS `laboratorio` (
  `codlab` int NOT NULL AUTO_INCREMENT,
  `nombrelab` varchar(70) DEFAULT NULL,
  `direccionlab` varchar(150) DEFAULT NULL,
  `telflab` varchar(50) DEFAULT NULL,
  `emaillab` varchar(100) DEFAULT NULL,
  `observlab` varchar(300) DEFAULT NULL,
  `fotopv` varchar(100) DEFAULT NULL,
  `cipv` varchar(30) DEFAULT NULL,
  `deudapv` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`codlab`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`codlab`, `nombrelab`, `direccionlab`, `telflab`, `emaillab`, `observlab`, `fotopv`, `cipv`, `deudapv`) VALUES
(1, 'VITA', 'CALLE 343', '34343433434', '', '', '', '', 0.00),
(2, 'ALCOS', 'CALLE OBRAJES', '233232', 'raul@hotmail.com', 'cc', '', '', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

DROP TABLE IF EXISTS `lotes`;
CREATE TABLE IF NOT EXISTS `lotes` (
  `codlot` int NOT NULL AUTO_INCREMENT,
  `codme` int DEFAULT NULL,
  `norden` int DEFAULT NULL,
  `nlotee` bigint DEFAULT '0',
  `fechalot` date DEFAULT NULL,
  `fechaven` date DEFAULT NULL,
  `cantlot` int DEFAULT NULL,
  `preciolot` double(10,2) DEFAULT NULL,
  `cdlot` char(2) DEFAULT NULL,
  `id_usu` int DEFAULT NULL,
  PRIMARY KEY (`codlot`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`codlot`, `codme`, `norden`, `nlotee`, `fechalot`, `fechaven`, `cantlot`, `preciolot`, `cdlot`, `id_usu`) VALUES
(1, 5, 1, 1697778440, '2023-10-20', '2023-10-20', 0, 2000.00, 'SI', 16),
(2, 5, 3, 1698174988, '2023-10-24', '2023-10-24', 0, 34.00, 'SI', 16),
(3, 8, 4, 1698175158, '2023-10-24', '2023-10-24', 0, 4566.00, 'SI', 16),
(4, 5, 5, 1698175784, '2023-10-24', '2023-10-24', 1, 4500.00, 'SI', 16),
(5, 5, 7, 1698236112, '2023-10-25', '2023-10-25', 10, 1580.00, 'SI', 16),
(6, 8, 9, 1698236673, '2023-10-25', '2023-10-25', 9, 1290.00, 'SI', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `codmar` int NOT NULL AUTO_INCREMENT,
  `detmarca` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codmar`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`codmar`, `detmarca`) VALUES
(1, 'SURIBA'),
(2, 'TAKING'),
(3, 'CONSEW '),
(4, 'SILVER STAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimdet`
--

DROP TABLE IF EXISTS `movimdet`;
CREATE TABLE IF NOT EXISTS `movimdet` (
  `codt` int NOT NULL AUTO_INCREMENT,
  `codar` int DEFAULT '0',
  `codpv` int DEFAULT '0',
  `descripdt` varchar(150) DEFAULT NULL,
  `codigo` varchar(15) DEFAULT NULL,
  `nlotee` bigint DEFAULT '0',
  `umed` char(4) DEFAULT NULL,
  `cant` int DEFAULT NULL,
  `precio` double(10,2) DEFAULT NULL,
  `pvp` double(10,2) DEFAULT '0.00',
  `subtot` double(10,2) DEFAULT NULL,
  `tipo` char(2) DEFAULT NULL,
  `tpago` char(3) DEFAULT NULL,
  `norden` int DEFAULT NULL,
  `fechadt` date DEFAULT NULL,
  `fechavenc` date DEFAULT NULL,
  `coddep` int DEFAULT NULL,
  `id_usu` int DEFAULT '0',
  `tmm` varchar(40) DEFAULT NULL,
  `codsuc` int DEFAULT '0',
  `codsucx` int DEFAULT '0',
  `codlot` int DEFAULT '0',
  PRIMARY KEY (`codt`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimdet`
--

INSERT INTO `movimdet` (`codt`, `codar`, `codpv`, `descripdt`, `codigo`, `nlotee`, `umed`, `cant`, `precio`, `pvp`, `subtot`, `tipo`, `tpago`, `norden`, `fechadt`, `fechavenc`, `coddep`, `id_usu`, `tmm`, `codsuc`, `codsucx`, `codlot`) VALUES
(1, 5, 0, 'MAQUINA INDUSTRIAL', '', 1698174988, '', 1, 34.00, 0.00, 34.00, 'I', 'CT', 3, '2023-10-24', '2023-10-24', 1, 16, 'Compras', 1, 1, 2),
(2, 8, 1, 'MAQUINA COLLARETA', '', 1698175158, '', 1, 4566.00, 0.00, 4566.00, 'I', 'CT', 4, '2023-10-24', '2023-10-24', 1, 16, 'Compras', 1, 1, 3),
(3, 5, 1, 'MAQUINA INDUSTRIAL', '', 1698175784, '', 1, 4500.00, 0.00, 4500.00, 'I', 'CT', 5, '2023-10-24', '2023-10-24', 1, 16, 'Compras', 1, 1, 4),
(4, 5, 0, 'MAQUINA INDUSTRIAL', NULL, 0, '', 1, 2000.00, 1520.00, 1520.00, 'E', 'CT', 6, '2023-10-25', NULL, 1, 16, 'Ventas', 1, 1, 0),
(5, 5, 1, 'MAQUINA INDUSTRIAL', '', 1698236112, '', 10, 1580.00, 0.00, 15800.00, 'I', 'CT', 7, '2023-10-25', '2023-10-25', 1, 16, 'Compras', 1, 1, 5),
(6, 5, 0, 'MAQUINA INDUSTRIAL', NULL, 0, '', 1, 2000.00, 1580.00, 1580.00, 'E', 'CT', 8, '2023-10-25', NULL, 1, 16, 'Ventas', 1, 1, 0),
(7, 8, 0, 'MAQUINA COLLARETA', NULL, 0, '', 1, 4566.00, 1290.00, 1290.00, 'E', 'CT', 8, '2023-10-25', NULL, 1, 16, 'Ventas', 1, 1, 0),
(8, 8, 1, 'MAQUINA COLLARETA', '', 1698236673, '', 10, 1290.00, 0.00, 12900.00, 'I', 'CT', 9, '2023-10-25', '2023-10-25', 1, 16, 'Compras', 1, 1, 6),
(9, 5, 0, 'MAQUINA INDUSTRIAL', NULL, 0, '', 1, 2000.00, 1580.00, 1580.00, 'E', 'CT', 10, '2023-10-25', NULL, 1, 16, 'Ventas', 1, 1, 0),
(10, 8, 0, 'MAQUINA COLLARETA', NULL, 0, '', 1, 1290.00, 1290.00, 1290.00, 'E', 'CT', 10, '2023-10-25', NULL, 1, 16, 'Ventas', 1, 1, 0),
(11, 5, 0, 'MAQUINA INDUSTRIAL', NULL, 0, '', 1, 2000.00, 1580.00, 1580.00, 'E', 'CT', 11, '2023-10-25', NULL, 1, 16, 'Ventas', 1, 1, 0),
(12, 5, 0, 'MAQUINA INDUSTRIAL', NULL, 0, '', 1, 2000.00, 1520.00, 1520.00, 'E', 'CT', 12, '2023-10-25', NULL, 1, 16, 'Ventas', 1, 1, 0),
(13, 5, 0, 'MAQUINA INDUSTRIAL', NULL, 0, '', 2, 2000.00, 1580.00, 3160.00, 'E', 'CT', 13, '2023-10-25', NULL, 1, 16, 'Ventas', 1, 1, 0),
(14, 5, 0, 'MAQUINA INDUSTRIAL', NULL, 0, '', 1, 2000.00, 1520.00, 3040.00, 'E', 'CT', 14, '2023-10-25', NULL, 1, 16, 'Ventas', 1, 1, 0),
(15, 5, 0, 'MAQUINA INDUSTRIAL', NULL, 0, '', 1, 34.00, 1520.00, 3040.00, 'E', 'CT', 14, '2023-10-25', NULL, 1, 16, 'Ventas', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimdet1`
--

DROP TABLE IF EXISTS `movimdet1`;
CREATE TABLE IF NOT EXISTS `movimdet1` (
  `codmv` int NOT NULL AUTO_INCREMENT,
  `codme` int DEFAULT NULL,
  `detmenu` varchar(80) DEFAULT NULL,
  `cant` int DEFAULT NULL,
  `preciodt` double(10,2) DEFAULT NULL,
  `subtot` double(10,2) DEFAULT NULL,
  `fechadt` date DEFAULT NULL,
  `norden` int DEFAULT NULL,
  `codsuc` int DEFAULT NULL,
  `id_usu` int DEFAULT NULL,
  PRIMARY KEY (`codmv`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimtot`
--

DROP TABLE IF EXISTS `movimtot`;
CREATE TABLE IF NOT EXISTS `movimtot` (
  `codto` int NOT NULL AUTO_INCREMENT,
  `id_usu` int DEFAULT NULL,
  `fechato` date DEFAULT NULL,
  `tipo` char(2) DEFAULT NULL,
  `norden` int DEFAULT NULL,
  `totimporte` double(10,2) DEFAULT NULL,
  `descuento` double(10,2) DEFAULT '0.00',
  `imprimio` char(2) DEFAULT NULL,
  `afavor` varchar(50) DEFAULT NULL,
  `nit` varchar(40) DEFAULT NULL,
  `itm` int DEFAULT NULL,
  `coddep` int DEFAULT NULL,
  `tpago` char(3) DEFAULT NULL,
  `codsuc` int DEFAULT NULL,
  `codsucx` int DEFAULT '0',
  `codcli` int DEFAULT NULL,
  `tipodoc` char(4) DEFAULT NULL COMMENT 'fac,rec, etc',
  `tmm` varchar(40) DEFAULT NULL,
  `observ` longtext,
  `aceptado` char(3) DEFAULT 'NO',
  PRIMARY KEY (`codto`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimtot`
--

INSERT INTO `movimtot` (`codto`, `id_usu`, `fechato`, `tipo`, `norden`, `totimporte`, `descuento`, `imprimio`, `afavor`, `nit`, `itm`, `coddep`, `tpago`, `codsuc`, `codsucx`, `codcli`, `tipodoc`, `tmm`, `observ`, `aceptado`) VALUES
(1, 16, '2023-10-20', 'I', 1, 20000.00, 0.00, 'NO', 'marcelo ronald', NULL, 1, 1, 'CT', 1, 0, 0, 'REC', 'Compras', NULL, 'NO'),
(2, 16, '2023-10-20', 'E', 2, 3040.00, 0.00, 'NO', 'grego', NULL, 1, 1, NULL, 1, 0, 0, 'REC', 'Ventas', NULL, 'NO'),
(3, 16, '2023-10-24', 'I', 3, 34.00, 0.00, 'NO', 'marcelo ronald', NULL, 1, 1, 'CT', 1, 0, 0, 'REC', 'Compras', NULL, 'NO'),
(4, 16, '2023-10-24', 'I', 4, 4566.00, 0.00, 'NO', 'marcelo ronald', NULL, 1, 1, 'CT', 1, 0, 0, 'REC', 'Compras', NULL, 'NO'),
(5, 16, '2023-10-24', 'I', 5, 4500.00, 0.00, 'NO', 'marcelo ronald', NULL, 1, 1, 'CT', 1, 1, 0, 'REC', 'Compras', NULL, 'NO'),
(6, 16, '2023-10-25', 'E', 6, 1520.00, 0.00, 'NO', 'freddy', NULL, 1, 1, NULL, 1, 0, 0, 'REC', 'Ventas', NULL, 'NO'),
(7, 16, '2023-10-25', 'I', 7, 15800.00, 0.00, 'NO', 'marcelo ronald', NULL, 1, 1, 'CT', 1, 1, 0, 'REC', 'Compras', NULL, 'NO'),
(8, 16, '2023-10-25', 'E', 8, 2870.00, 0.00, 'NO', 'freee', NULL, 2, 1, NULL, 1, 0, 0, 'REC', 'Ventas', NULL, 'NO'),
(9, 16, '2023-10-25', 'I', 9, 12900.00, 0.00, 'NO', 'marcelo ronald', NULL, 1, 1, 'CT', 1, 1, 0, 'REC', 'Compras', NULL, 'NO'),
(10, 16, '2023-10-25', 'E', 10, 2870.00, 0.00, 'NO', 'vera', NULL, 2, 1, NULL, 1, 0, 0, 'REC', 'Ventas', NULL, 'NO'),
(11, 16, '2023-10-25', 'E', 11, 1580.00, 0.00, 'NO', 'rene', NULL, 1, 1, NULL, 1, 0, 0, 'REC', 'Ventas', NULL, 'NO'),
(12, 16, '2023-10-25', 'E', 12, 1520.00, 0.00, 'NO', 'marcelo ronald', '124587', 1, 1, NULL, 1, 0, 0, 'REC', 'Ventas', NULL, 'NO'),
(13, 16, '2023-10-25', 'E', 13, 3160.00, 0.00, 'NO', 'hery rodriguez', '1243456', 1, 1, NULL, 1, 0, 0, 'REC', 'Ventas', NULL, 'NO'),
(14, 16, '2023-10-25', 'E', 14, 3040.00, 0.00, 'NO', 'herry 2', '2020202', 1, 1, NULL, 1, 0, 0, 'REC', 'Ventas', NULL, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimtot1`
--

DROP TABLE IF EXISTS `movimtot1`;
CREATE TABLE IF NOT EXISTS `movimtot1` (
  `codmt` int NOT NULL AUTO_INCREMENT,
  `fechato` date DEFAULT NULL,
  `fechadespa` date DEFAULT NULL,
  `clientenom` varchar(100) DEFAULT NULL,
  `importetot` double(10,2) DEFAULT NULL,
  `items` int DEFAULT NULL,
  `norden` int DEFAULT NULL,
  `codsuc` int DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `id_usu` int DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `direccionmv` varchar(100) DEFAULT NULL,
  `celmv` varchar(20) DEFAULT NULL,
  `correoped` varchar(100) DEFAULT NULL,
  `refermv` varchar(5) DEFAULT NULL,
  `unixi` bigint DEFAULT NULL COMMENT 'enviado el pedido ',
  `unixf` bigint DEFAULT NULL COMMENT 'cancelando a caja',
  `qrfoto` varchar(250) DEFAULT NULL,
  `observt` longtext,
  `pagado` char(3) DEFAULT NULL,
  `despacho` char(3) DEFAULT NULL,
  `almacen` char(3) DEFAULT NULL,
  `codzo` int DEFAULT NULL,
  `codcho` int DEFAULT NULL,
  `codvehi` int DEFAULT NULL,
  PRIMARY KEY (`codmt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numcla`
--

DROP TABLE IF EXISTS `numcla`;
CREATE TABLE IF NOT EXISTS `numcla` (
  `codnum` int NOT NULL AUTO_INCREMENT,
  `codcla` int DEFAULT '0',
  `contador` int DEFAULT '0',
  PRIMARY KEY (`codnum`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `numcla`
--

INSERT INTO `numcla` (`codnum`, `codcla`, `contador`) VALUES
(1, 1, 6),
(2, 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`codper`, `nombreper`, `emailper`, `celper`, `direccper`, `observper`, `fotoper`, `ciper`, `qrfotoper`, `coddep`, `codarea`, `codcargo`) VALUES
(1, 'MARCELO RONALD CHOQUE ZAMBRANA', 'marceloronald1111@gmail.com', '63061083', 'CALLE 5', 'nada', '#', '2343233', NULL, NULL, 3, 3),
(2, 'PEDRO PARAMO', 'raul.webnet@hotmail.com', '77766269', 'PJE COBIJA # 18 ZONA NORTE', 'cccc', NULL, '45454545', NULL, NULL, 0, 0),
(3, 'MARIA LAGOS SOTO', 'raul.webnet@hotmail.com', '77766269', 'PJE COBIJA # 18 ZONA NORTE', 'CC', NULL, '3145878', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planpagos`
--

DROP TABLE IF EXISTS `planpagos`;
CREATE TABLE IF NOT EXISTS `planpagos` (
  `codplan` int NOT NULL AUTO_INCREMENT,
  `codsoli` int DEFAULT NULL,
  `codcli` int DEFAULT NULL,
  `codigo` varchar(15) DEFAULT NULL,
  `fechaplan` date DEFAULT NULL,
  `capital` double(10,2) DEFAULT NULL,
  `interes` double(10,2) DEFAULT NULL,
  `cargos` double(10,2) DEFAULT NULL,
  `garantia` double(10,2) DEFAULT NULL,
  `cuota` double(10,2) DEFAULT NULL,
  `saldo` double(10,2) DEFAULT NULL,
  `pagado` char(3) DEFAULT NULL,
  PRIMARY KEY (`codplan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `codpv` int NOT NULL AUTO_INCREMENT,
  `nombrepv` varchar(70) DEFAULT NULL,
  `direccpv` varchar(150) DEFAULT NULL,
  `telfpv` varchar(50) DEFAULT NULL,
  `emailpv` varchar(100) DEFAULT NULL,
  `observpv` varchar(300) DEFAULT NULL,
  `fotopv` varchar(100) DEFAULT NULL,
  `cipv` varchar(30) DEFAULT NULL,
  `deudapv` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`codpv`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`codpv`, `nombrepv`, `direccpv`, `telfpv`, `emailpv`, `observpv`, `fotopv`, `cipv`, `deudapv`) VALUES
(1, 'HILADERIA HILBO', 'CALLE 13 SOPOCACHI vv', '2458803', 'carlos@hotmail.com', 'SI COMENTARIOS ee', '../fotos/2017-08-1104-34-42.jpg', '583756 LP', 0.00),
(4, 'POLAR SA.', 'CALLE 23 ACHUMANI', '2457787', 'alcos@gmail.com', 'ninguna cc', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

DROP TABLE IF EXISTS `recibos`;
CREATE TABLE IF NOT EXISTS `recibos` (
  `codrec` int NOT NULL AUTO_INCREMENT,
  `recdel` int NOT NULL,
  `recal` int NOT NULL,
  `recactual` int NOT NULL,
  `cdrec` char(2) NOT NULL,
  PRIMARY KEY (`codrec`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recibos`
--

INSERT INTO `recibos` (`codrec`, `recdel`, `recal`, `recactual`, `cdrec`) VALUES
(1, 200, 2000, 235, 'X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldos`
--

DROP TABLE IF EXISTS `saldos`;
CREATE TABLE IF NOT EXISTS `saldos` (
  `codsal` int NOT NULL AUTO_INCREMENT,
  `codar` int DEFAULT '0',
  `descripar` varchar(100) DEFAULT NULL,
  `saldo` int DEFAULT '0',
  `pvp` double(10,2) DEFAULT '0.00',
  `importetot` double(10,2) DEFAULT '0.00',
  `codsuc` int DEFAULT NULL,
  PRIMARY KEY (`codsal`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `saldos`
--

INSERT INTO `saldos` (`codsal`, `codar`, `descripar`, `saldo`, `pvp`, `importetot`, `codsuc`) VALUES
(1, 3, 'HILO BOBINA COLOR ROJO', 81, 18.00, 1458.00, 1),
(2, 3, 'HILO BOBINA COLOR ROJO', 81, 18.00, 1458.00, 1),
(3, 6, 'HILO NARANJA DOBLE', 0, 124.00, 0.00, 1),
(4, 6, 'HILO NARANJA DOBLE', 0, 124.00, 0.00, 1),
(5, 3, 'HILO BOBINA COLOR ROJO', 4, 18.00, 72.00, 2),
(6, 3, 'HILO BOBINA COLOR ROJO', 4, 18.00, 72.00, 2),
(7, 0, 'HILO NARANJA DOBLE', 0, 124.00, 0.00, 0),
(8, 0, 'HILO NARANJA DOBLE', 0, 124.00, 0.00, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servcliente`
--

DROP TABLE IF EXISTS `servcliente`;
CREATE TABLE IF NOT EXISTS `servcliente` (
  `codsc` int NOT NULL AUTO_INCREMENT,
  `codser` int DEFAULT NULL,
  `codcli` int DEFAULT NULL,
  `solicito` date DEFAULT NULL,
  `idusu` int DEFAULT NULL,
  `aprobo` char(2) DEFAULT NULL,
  `observserr` longtext,
  PRIMARY KEY (`codsc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE IF NOT EXISTS `solicitudes` (
  `codsoli` int NOT NULL AUTO_INCREMENT,
  `codcli` int DEFAULT NULL,
  `nombresolicita` varchar(100) DEFAULT NULL,
  `montosolicita` double(10,2) DEFAULT NULL,
  `montoaprobado` double(10,2) DEFAULT '0.00',
  `cuantopaga` double(10,2) DEFAULT NULL,
  `cadatiempo` varchar(100) DEFAULT NULL,
  `invertira` varchar(100) DEFAULT NULL,
  `croquis1` varchar(150) DEFAULT NULL,
  `croquis2` varchar(150) DEFAULT NULL,
  `actividad` varchar(100) DEFAULT NULL,
  `actividadnego` varchar(100) DEFAULT NULL,
  `nit` varchar(15) DEFAULT NULL,
  `nomnegocio` varchar(50) DEFAULT NULL,
  `diasatencion` int DEFAULT NULL,
  `empezo` varchar(60) DEFAULT NULL,
  `direccionnego` varchar(100) DEFAULT NULL,
  `optnegocio` char(3) DEFAULT NULL,
  `optactividad` char(4) DEFAULT NULL,
  `optsalario` char(3) DEFAULT NULL,
  `dirempleo` varchar(150) DEFAULT NULL,
  `optgarantia` char(3) DEFAULT NULL,
  `optogarantia` char(3) DEFAULT NULL,
  `nombre211` varchar(100) DEFAULT NULL,
  `ci211` varchar(30) DEFAULT NULL,
  `cel211` varchar(30) DEFAULT NULL,
  `direccion211` varchar(150) DEFAULT NULL,
  `parentesco211` varchar(40) DEFAULT NULL,
  `actividad211` varchar(100) DEFAULT NULL,
  `croquisdom211` varchar(150) DEFAULT NULL,
  `croquisnego211` varchar(150) DEFAULT NULL,
  `nit211` varchar(15) DEFAULT NULL,
  `nomnego211` varchar(50) DEFAULT NULL,
  `dirnego211` varchar(100) DEFAULT NULL,
  `datencion211` int DEFAULT NULL,
  `empezo211` varchar(60) DEFAULT NULL,
  `negoes211` char(4) DEFAULT NULL,
  `lugar211` char(4) DEFAULT NULL,
  `asalariado211` char(4) DEFAULT NULL,
  `dirempleo211` varchar(100) DEFAULT NULL,
  `nombre212` varchar(100) DEFAULT NULL,
  `ci212` varchar(30) DEFAULT NULL,
  `cel212` varchar(30) DEFAULT NULL,
  `direccion212` varchar(150) DEFAULT NULL,
  `parentesco212` varchar(40) DEFAULT NULL,
  `actividad212` varchar(100) DEFAULT NULL,
  `croquisdom212` varchar(150) DEFAULT NULL,
  `croquisnego212` varchar(150) DEFAULT NULL,
  `nit212` varchar(15) DEFAULT NULL,
  `nomnego212` varchar(50) DEFAULT NULL,
  `dirnego212` varchar(100) DEFAULT NULL,
  `datencion212` int DEFAULT NULL,
  `empezo212` varchar(60) DEFAULT NULL,
  `negoes212` char(4) DEFAULT NULL,
  `lugar212` char(4) DEFAULT NULL,
  `asalariado212` char(4) DEFAULT NULL,
  `dirempleo212` varchar(100) DEFAULT NULL,
  `aprobado` char(3) DEFAULT NULL,
  `supervisor` varchar(100) DEFAULT NULL,
  `saldosoli` double(10,2) DEFAULT '0.00',
  PRIMARY KEY (`codsoli`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `codsuc` int NOT NULL AUTO_INCREMENT,
  `codtisuc` int DEFAULT NULL,
  `nombresuc` varchar(30) DEFAULT NULL,
  `direccsuc` varchar(100) DEFAULT NULL,
  `fotomapsuc` varchar(100) DEFAULT NULL,
  `coddep` int NOT NULL DEFAULT '0',
  `estadosuc` char(2) DEFAULT NULL,
  PRIMARY KEY (`codsuc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`codsuc`, `codtisuc`, `nombresuc`, `direccsuc`, `fotomapsuc`, `coddep`, `estadosuc`) VALUES
(1, 1, 'CENTRAL', 'CALLE PERIMETRAL No19 BARRIO GERMAN BUSH', '', 2, 'SI'),
(2, 2, 'ZONA NORTE', 'CALLE BILBAO Y SUCRE', '', 1, 'SI'),
(3, NULL, 'SATELITE I', 'CALLE 6 CIUDAD SATELITE', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
CREATE TABLE IF NOT EXISTS `supervisor` (
  `codspv` int NOT NULL AUTO_INCREMENT,
  `codigospv` char(3) DEFAULT NULL,
  `detsupervisor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codspv`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `supervisor`
--

INSERT INTO `supervisor` (`codspv`, `codigospv`, `detsupervisor`) VALUES
(1, '1', 'EDDY CALLEJAS M.'),
(2, '2', 'CESAR HUANACO T.'),
(3, '3', 'PABLO LIMACHI'),
(4, '4', 'PAULINO CORONEL CHOQUE'),
(5, '5', 'MMM.NNN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `codti` int NOT NULL AUTO_INCREMENT,
  `codmar` int DEFAULT '0',
  `dettipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codti`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`codti`, `codmar`, `dettipo`) VALUES
(1, 1, 'CERRADORA'),
(2, 1, 'OVERCLOCK'),
(5, 0, 'GILLOTINA ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ufv_registro`
--

DROP TABLE IF EXISTS `ufv_registro`;
CREATE TABLE IF NOT EXISTS `ufv_registro` (
  `codufv` int NOT NULL AUTO_INCREMENT,
  `fechaufv` date NOT NULL,
  `importeufv` double(10,5) NOT NULL,
  PRIMARY KEY (`codufv`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ufv_registro`
--

INSERT INTO `ufv_registro` (`codufv`, `fechaufv`, `importeufv`) VALUES
(1, '2019-10-01', 2.45673),
(3, '2019-10-26', 2.56788),
(4, '2019-10-27', 2.56788),
(5, '2019-10-28', 2.56788),
(6, '2019-10-29', 2.56788),
(7, '2019-11-01', 2.56788),
(8, '2019-11-02', 2.56788),
(9, '2019-11-03', 2.56788),
(10, '2019-11-07', 2.56788),
(11, '2019-11-08', 2.56788),
(12, '2019-11-12', 2.56788),
(13, '2019-11-13', 2.56788),
(14, '2019-11-16', 2.56788),
(15, '2019-11-17', 2.56788),
(16, '2019-11-18', 2.56788),
(17, '2019-11-19', 2.56788),
(18, '2019-11-21', 2.56788),
(19, '2019-11-22', 2.56788),
(20, '2019-11-23', 2.56788),
(21, '2019-12-02', 2.56788),
(22, '2019-12-12', 2.56788),
(23, '2019-12-13', 2.56788),
(24, '2019-12-16', 2.56788),
(25, '2019-12-18', 2.56788),
(26, '2019-12-23', 2.56788),
(27, '2020-01-03', 2.56788),
(28, '2020-01-05', 2.56788),
(29, '2020-01-06', 2.56788),
(30, '2020-01-07', 2.56788),
(31, '2020-01-08', 2.56788),
(32, '2020-01-09', 2.56788),
(33, '2020-01-11', 2.56788),
(34, '2020-01-13', 2.56788),
(35, '2020-01-14', 2.56788),
(36, '2020-01-15', 2.56788),
(37, '2020-01-18', 2.56788),
(38, '2020-01-28', 2.56788),
(39, '2020-02-07', 2.56788),
(40, '2020-02-16', 2.56788),
(41, '2020-02-17', 2.56788),
(42, '2020-02-18', 2.56788),
(43, '2020-02-19', 2.56788),
(44, '2020-02-23', 2.56788),
(45, '2020-02-24', 2.56788),
(46, '2020-02-25', 2.56788),
(47, '2020-02-26', 2.56788),
(48, '2020-02-27', 2.56788),
(49, '2020-02-28', 2.56788),
(50, '2020-02-29', 2.56788),
(51, '2020-03-01', 2.56788),
(52, '2020-03-02', 2.56788),
(53, '2020-03-03', 2.56788),
(54, '2020-03-04', 2.56788),
(55, '2020-03-05', 2.56788),
(56, '2020-03-06', 2.56788),
(57, '2020-03-09', 2.56788),
(58, '2020-03-16', 2.56788),
(59, '2020-03-17', 2.56788),
(60, '2020-03-19', 2.56788),
(61, '2020-03-20', 2.56788),
(62, '2020-03-21', 2.56788),
(63, '2020-03-22', 2.56788),
(64, '2020-05-03', 2.56788),
(65, '2020-06-21', 2.56788),
(66, '2020-06-23', 2.56788),
(67, '2020-12-28', 2.56788),
(68, '2021-03-03', 2.56788),
(69, '2021-03-05', 2.56788);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `usuario`, `nomb_usu`, `pass_usu`, `id_area`, `codper`, `coddep`, `nombredepto`, `nomb_suc`, `foto_usu`, `codsuc`, `codtisuc`, `qrfotousu`) VALUES
(16, 'admin', 'MARCELO ronald choque zambrana', 'admin', 'admin', 1, 1, NULL, NULL, '../fotos/2021-03-0516-40-10.jpg', 1, NULL, NULL),
(23, 'pedro', 'PEDRO PARAMO', 'pedro', 'sucursal', 2, 1, NULL, NULL, NULL, 2, NULL, NULL),
(24, 'maria', 'MARIA LAGOS SOTO', 'maria', 'sucursal', 3, 1, NULL, NULL, NULL, 3, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

DROP TABLE IF EXISTS `zonas`;
CREATE TABLE IF NOT EXISTS `zonas` (
  `codzo` int NOT NULL AUTO_INCREMENT,
  `detzona` varchar(100) DEFAULT NULL,
  `nrozona` int DEFAULT '0',
  PRIMARY KEY (`codzo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`codzo`, `detzona`, `nrozona`) VALUES
(1, 'CENTRAL', 0),
(2, 'SUR', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
