-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2022 a las 23:20:26
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myrentcar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `coche_ID` int(5) UNSIGNED NOT NULL,
  `mat_che` varchar(10) NOT NULL,
  `marca_che` varchar(20) NOT NULL,
  `mod_che` varchar(20) NOT NULL,
  `col_che` varchar(20) NOT NULL,
  `plaz_che` smallint(1) NOT NULL,
  `precio_che` int(3) NOT NULL,
  `taller_ID` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE `talleres` (
  `taller_ID` int(5) UNSIGNED NOT NULL,
  `nom_tal` varchar(20) NOT NULL,
  `email_tal` varchar(50) NOT NULL,
  `dir_tal` varchar(50) NOT NULL,
  `pob_tal` varchar(50) NOT NULL,
  `prov_tal` varchar(50) DEFAULT NULL,
  `cpos_tal` varchar(10) DEFAULT NULL,
  `tlf_tal` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`taller_ID`, `nom_tal`, `email_tal`, `dir_tal`, `pob_tal`, `prov_tal`, `cpos_tal`, `tlf_tal`) VALUES
(1, 'VALERO', 'valero@gmail.com', 'calle Nueva,1', 'Alcalá de guadaira', 'Sevilla', '41500', '659859685');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_ID` smallint(5) UNSIGNED NOT NULL,
  `nom_usu` varchar(20) NOT NULL,
  `pwd_usu` varchar(255) NOT NULL,
  `pass_usu` varchar(20) NOT NULL,
  `email_usu` varchar(50) NOT NULL,
  `ape_usu` varchar(25) NOT NULL,
  `dir_usu` varchar(50) NOT NULL,
  `pob_usu` varchar(50) NOT NULL,
  `prov_usu` varchar(50) DEFAULT NULL,
  `cpos_usu` varchar(10) DEFAULT NULL,
  `tlf_usu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_ID`, `nom_usu`, `pwd_usu`, `pass_usu`, `email_usu`, `ape_usu`, `dir_usu`, `pob_usu`, `prov_usu`, `cpos_usu`, `tlf_usu`) VALUES
(1, 'Juan', '$2y$10$3sxUPIz.Uvr2Zj.OpKE3Cuj/CYWOKxDIGg3Dl.oIteOrpd8o6/CUu', '123456', 'hola@hola.es', '', '', '', NULL, NULL, NULL),
(2, 'Luis', '$2y$10$qlKg9ZHVVdGhk435LSxTZ.prceKl405vfgzT7EmdDSExQUG0rYKCO', '123456', 'hola@hola.es', '', '', '', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`coche_ID`);

--
-- Indices de la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD PRIMARY KEY (`taller_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `coche_ID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
  MODIFY `taller_ID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
