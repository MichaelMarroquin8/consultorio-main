-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2022 a las 20:17:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `andercode_helpdesk2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_documento_detalle`
--

CREATE TABLE `td_documento_detalle` (
  `det_id` int(11) NOT NULL,
  `tickd_id` int(11) NOT NULL,
  `det_nom` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_documento_detalle`
--

INSERT INTO `td_documento_detalle` (`det_id`, `tickd_id`, `det_nom`, `est`) VALUES
(1, 58, '1024px-Unofficial_JavaScript_logo_2.svg.png', 1),
(2, 58, '1280px-PHP-logo.svg.png', 1),
(3, 59, '1.png', 1),
(4, 59, '12.png', 1),
(5, 60, '1024px-Unofficial_JavaScript_logo_2.svg.png', 1),
(6, 61, '1024px-Unofficial_JavaScript_logo_2.svg.png', 1),
(7, 63, '1200px-Visual_Studio_Code_1.18_icon.svg.png', 1),
(8, 63, '1200px-Xampp_logo.svg.png', 1),
(9, 63, '1280px-PHP-logo.svg.png', 1),
(10, 64, 'Gruas (2) (1).xlsx', 1),
(11, 64, 'Gruas (2).xlsx', 1),
(12, 66, '768px-Python-logo-notext.svg.png', 1),
(13, 66, '1024px-Unofficial_JavaScript_logo_2.svg.png', 1),
(14, 67, '768px-Python-logo-notext.svg.png', 1),
(15, 67, '1024px-Unofficial_JavaScript_logo_2.svg.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `td_documento_detalle`
--
ALTER TABLE `td_documento_detalle`
  ADD PRIMARY KEY (`det_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `td_documento_detalle`
--
ALTER TABLE `td_documento_detalle`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
