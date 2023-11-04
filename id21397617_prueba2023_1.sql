-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-11-2023 a las 03:20:39
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id21397617_prueba2023_1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresarguiaenvio`
--

CREATE TABLE `ingresarguiaenvio` (
  `IDG` int(10) NOT NULL,
  `guiaPaquete` varchar(13) NOT NULL,
  `Paqueteria` varchar(13) NOT NULL,
  `telefono` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ingresarguiaenvio`
--

INSERT INTO `ingresarguiaenvio` (`IDG`, `guiaPaquete`, `Paqueteria`, `telefono`) VALUES
(1, 'GT54875125', 'CargoExpreso', 0),
(2, 'GTX502', '1', 0),
(3, 'FOX2023', 'FedEx', 0),
(4, 'GZGT01', 'CPX', 53449438);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroclientes`
--

CREATE TABLE `registroclientes` (
  `IDCliente` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `direccioncliente` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `registroclientes`
--

INSERT INTO `registroclientes` (`IDCliente`, `Nombre`, `Telefono`, `direccioncliente`) VALUES
(1, 'MJ', '53893090', ''),
(2, 'KT', '30768391', ''),
(3, 'EP', '22554979', ''),
(4, 'AP', '58800025', ''),
(9, 'q', '112324', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroventas`
--

CREATE TABLE `registroventas` (
  `IDVenta` int(11) NOT NULL,
  `FechaVenta` date NOT NULL,
  `NombreArticulo` varchar(55) NOT NULL,
  `Precio` decimal(5,2) NOT NULL,
  `IDCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `registroventas`
--

INSERT INTO `registroventas` (`IDVenta`, `FechaVenta`, `NombreArticulo`, `Precio`, `IDCliente`) VALUES
(1, '2023-10-14', 'Batman Lego', 100.00, 1),
(2, '2023-10-14', 'superman', 150.00, 2),
(4, '2023-11-03', 'chapulin', 25.75, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportediario`
--

CREATE TABLE `reportediario` (
  `IDReporte` int(11) NOT NULL,
  `FechaReporte` date NOT NULL,
  `VentasTotales` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(252) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `contrasena`, `rol`) VALUES
(3, 'kevin', '$2y$10$1VoAqMOOZks8RYT67c/tFedP8LmiQWhzZW4tK3eGHVGRjNXeoojlm', 'administrador'),
(6, 'admin', '$2y$10$c9DIvWxVMOP5xqqI9oYfFOje6nEINxFrIlGQCteQIFSqevWK/r2Za', 'administrador'),
(8, 'fernando', '$2y$10$zs8D.kLEXPGvKgI/OOagbOc/I0yRSE/Ij1XpR8qvCvzh8AKKxcM26', 'administrador'),
(11, 'pedro.marmol', '$2y$10$cUiAl9TeoTWwasNfUB6Y9uarxpaDG7cwFK9J0MInmrPemqNfCzPnO', 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificarguia`
--

CREATE TABLE `verificarguia` (
  `IDVerificacion` int(11) NOT NULL,
  `FechaVerificacion` date NOT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `IDGuia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingresarguiaenvio`
--
ALTER TABLE `ingresarguiaenvio`
  ADD PRIMARY KEY (`IDG`);

--
-- Indices de la tabla `registroclientes`
--
ALTER TABLE `registroclientes`
  ADD PRIMARY KEY (`IDCliente`);

--
-- Indices de la tabla `registroventas`
--
ALTER TABLE `registroventas`
  ADD PRIMARY KEY (`IDVenta`),
  ADD UNIQUE KEY `IDCliente` (`IDCliente`) USING BTREE;

--
-- Indices de la tabla `reportediario`
--
ALTER TABLE `reportediario`
  ADD PRIMARY KEY (`IDReporte`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `verificarguia`
--
ALTER TABLE `verificarguia`
  ADD PRIMARY KEY (`IDVerificacion`),
  ADD KEY `IDGuia` (`IDGuia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingresarguiaenvio`
--
ALTER TABLE `ingresarguiaenvio`
  MODIFY `IDG` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registroclientes`
--
ALTER TABLE `registroclientes`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `registroventas`
--
ALTER TABLE `registroventas`
  MODIFY `IDVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingresarguiaenvio`
--
ALTER TABLE `ingresarguiaenvio`
  ADD CONSTRAINT `ingresarguiaenvio_ibfk_1` FOREIGN KEY (`IDG`) REFERENCES `registroclientes` (`IDCliente`);

--
-- Filtros para la tabla `registroventas`
--
ALTER TABLE `registroventas`
  ADD CONSTRAINT `registroventas_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `registroclientes` (`IDCliente`);

--
-- Filtros para la tabla `verificarguia`
--
ALTER TABLE `verificarguia`
  ADD CONSTRAINT `verificarguia_ibfk_1` FOREIGN KEY (`IDGuia`) REFERENCES `ingresarguiaenvio` (`IDG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
