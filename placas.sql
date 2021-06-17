-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-06-2021 a las 22:45:04
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `placas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encontradas`
--

CREATE TABLE `encontradas` (
  `id` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `estado_pertenece` varchar(30) NOT NULL,
  `estado_encontrada` varchar(30) NOT NULL,
  `imagen` longblob NOT NULL,
  `fecha_encontrada` varchar(10) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `mensaje` varchar(190) NOT NULL,
  `recuperada` tinyint(1) NOT NULL,
  `fecha_recuperada` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encontradas`
--
ALTER TABLE `encontradas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encontradas`
--
ALTER TABLE `encontradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
