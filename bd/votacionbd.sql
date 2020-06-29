-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2020 a las 23:32:59
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `votacionbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion`
--

CREATE TABLE `votacion` (
  `id_votacion` int(11) NOT NULL,
  `votacion_nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `votacion_votos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `votacion`
--

INSERT INTO `votacion` (`id_votacion`, `votacion_nombre`, `votacion_votos`) VALUES
(1, 'Kathryn Stefany Lozano Chávez', 1),
(2, 'Francis Darbin Villacorta Rocha', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votantes`
--

CREATE TABLE `votantes` (
  `id_votante` int(11) NOT NULL,
  `votante_dni` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `votante_nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `votante_opcion` tinyint(4) NOT NULL,
  `votante_estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `votantes`
--

INSERT INTO `votantes` (`id_votante`, `votante_dni`, `votante_nombre`, `votante_opcion`, `votante_estado`) VALUES
(1, '73670320', 'Jesús Enrique Muñoz Sias', 0, 0),
(2, '72760459', 'Francis Darbin Villacorta Rocha', 0, 0),
(3, '72195723', 'César José Roberto Ruiz Reategui', 0, 0),
(4, '71255262', 'Christian Enrique Del Castillo Acosta', 0, 0),
(5, '71100367', 'Erick Enrique Alván Flores', 0, 0),
(6, '73469313', 'Diana Carolina Paredes Rojas ', 0, 0),
(7, '70812410', 'Adriana Ivette Rios Escobedo', 0, 0),
(8, '70462082', 'Graciela Toribia Cárdenas Pinedo', 0, 0),
(9, '71073302', 'Rickert Darbin Villacorta Rocha', 0, 0),
(10, '71237781', 'Marcelo Bernuy Zumaeta', 0, 0),
(11, '70432518', 'Anthony Del Aguila Flores ', 0, 0),
(12, '70779556', 'Antoni Linderdt Del Aguila Paredes', 0, 0),
(13, '71100940', 'Luis Daniel Freitas Leon', 0, 0),
(14, '74808908', 'Marleni Garcia Macedo', 0, 0),
(15, '71625781', 'Oriana Garcia Ruiz', 0, 0),
(16, '72252710', 'Kathryn Stefany Lozano Chávez', 0, 0),
(17, '70558414', 'Hans José Maúrtua Guerra', 0, 0),
(18, '70763507', 'Laleska Mozombite Paitamala', 0, 0),
(19, '72955714', 'Roxana Angela Rengifo Navarro', 0, 0),
(20, '73003084', 'Antoinette Rodríguez Rios', 0, 0),
(21, '77356425', 'Angelo Tapullima Del Aguila', 0, 0),
(22, '75764978', 'Jhosephi Jampier Vasquez Ascate', 0, 0),
(23, '72855503', 'Miguel Roldan Zegarra Donayre ', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `votacion`
--
ALTER TABLE `votacion`
  ADD PRIMARY KEY (`id_votacion`);

--
-- Indices de la tabla `votantes`
--
ALTER TABLE `votantes`
  ADD PRIMARY KEY (`id_votante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `votacion`
--
ALTER TABLE `votacion`
  MODIFY `id_votacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `votantes`
--
ALTER TABLE `votantes`
  MODIFY `id_votante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
