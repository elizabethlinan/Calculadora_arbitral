-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2024 a las 06:38:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calculadora_arbitral`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculos`
--

CREATE TABLE `calculos` (
  `id` int(11) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `gastos_administrativos` decimal(10,2) DEFAULT NULL,
  `arbitro_unico` decimal(10,2) DEFAULT NULL,
  `honorarios_tribunal` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calculos`
--

INSERT INTO `calculos` (`id`, `monto`, `gastos_administrativos`, `arbitro_unico`, `honorarios_tribunal`, `total`, `fecha`) VALUES
(1, 500.00, 2000.00, 0.00, 0.00, 2360.00, '2024-09-05 05:33:41'),
(2, 50.00, 2000.00, 0.00, 0.00, 2360.00, '2024-09-05 05:34:14'),
(3, 50.00, 2000.00, 0.00, 0.00, 2360.00, '2024-09-05 05:34:55'),
(4, 50.00, 2000.00, 0.00, 0.00, 2360.00, '2024-09-05 05:35:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculos_arbitrales`
--

CREATE TABLE `calculos_arbitrales` (
  `id` int(11) NOT NULL,
  `moneda` varchar(10) NOT NULL,
  `monto` decimal(15,2) NOT NULL,
  `gastos_administrativos` decimal(15,2) NOT NULL,
  `igv_gastos_administrativos` decimal(15,2) NOT NULL,
  `total_gastos_administrativos` decimal(15,2) NOT NULL,
  `arbitro_unico` decimal(15,2) NOT NULL,
  `igv_arbitro_unico` decimal(15,2) NOT NULL,
  `total_arbitro_unico` decimal(15,2) NOT NULL,
  `honorarios_tribunal` decimal(15,2) NOT NULL,
  `igv_honorarios_tribunal` decimal(15,2) NOT NULL,
  `total_honorarios_tribunal` decimal(15,2) NOT NULL,
  `fecha_calculo` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calculos`
--
ALTER TABLE `calculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calculos_arbitrales`
--
ALTER TABLE `calculos_arbitrales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calculos`
--
ALTER TABLE `calculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `calculos_arbitrales`
--
ALTER TABLE `calculos_arbitrales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
