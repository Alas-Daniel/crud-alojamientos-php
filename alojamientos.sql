-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql207.infinityfree.com
-- Tiempo de generación: 27-09-2025 a las 01:28:53
-- Versión del servidor: 11.4.7-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_40035463_alojamientos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alojamientos`
--

CREATE TABLE `alojamientos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alojamientos`
--

INSERT INTO `alojamientos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `activo`, `created_at`) VALUES
(1, 'Las Flores Resort & Surf Club', 'Resort frente al mar ubicado en Playa Las Flores, con suites con vista oceánica, piscina, ambiente tranquilo y cercano al rompiente para surf.', '40.00', 'https://res.cloudinary.com/drztldzvn/image/upload/v1758941004/489786566_mne5ra.jpg', 1, '2025-09-24 20:53:40'),
(2, 'Royal Decameron Salinitas', 'Resort todo incluido con acceso directo a playa, jardines tropicales, múltiples piscinas y amenidades orientadas al turismo familiar.', '50.00', 'https://res.cloudinary.com/drztldzvn/image/upload/v1758948826/decameron_wkx7et.jpg', 1, '2025-09-24 21:02:10'),
(3, 'Rustic Beachside Cabin', 'Cabaña frente a la playa, acceso directo al mar. Tiene varios dormitorios, cocina equipada, piscina privada, internet. Ideal para familias.\r\n', '35.00', 'https://res.cloudinary.com/drztldzvn/image/upload/v1758949130/531575344_lvxazz.jpg', 1, '2025-09-24 23:41:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('usuario','admin') NOT NULL DEFAULT 'usuario',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`, `created_at`) VALUES
(1, 'Daniel Alas', 'alas2020@gmail.com', '$2y$10$v9/3CfXt8r2CiM.pru.4ROGkSF8VTTNiIP7rKNzi18u4DqIaJ7.N.', 'admin', '2025-09-24 16:30:42'),
(2, 'Daniela Karmina', 'karminaconstante21@gmail.com', '$2y$10$zWayVSv4k8DXHQcOWKASk.sFe03zZTtIdKYseW6h9zLulQ7ssUmGm', 'usuario', '2025-09-27 04:42:13'),
(3, 'Josué Alas', 'josuealas@gmail.com', '$2y$10$u1KhXuMWYE0aQP0Nz967cOvkrTsRh90W9p29IhuCB06M.eQVpLBnG', 'usuario', '2025-09-27 05:02:07'),
(4, 'Juan Perez', 'juan.perez@gmail.com', '$2y$10$GwyBHxtr2CFjgNMXAXGQwOZ5Oz/60zySwhkWzavV3LFHs6nNX3ZcG', 'admin', '2025-09-27 05:20:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_alojamiento`
--

CREATE TABLE `usuario_alojamiento` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `alojamiento_id` int(11) NOT NULL,
  `fecha_seleccion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario_alojamiento`
--

INSERT INTO `usuario_alojamiento` (`id`, `usuario_id`, `alojamiento_id`, `fecha_seleccion`) VALUES
(25, 1, 1, '2025-09-24 22:16:58'),
(27, 1, 2, '2025-09-24 23:36:17'),
(30, 2, 1, '2025-09-27 04:42:33'),
(31, 2, 3, '2025-09-27 04:42:52'),
(32, 2, 2, '2025-09-27 04:42:55'),
(33, 3, 1, '2025-09-27 05:02:23'),
(34, 3, 3, '2025-09-27 05:02:27'),
(35, 3, 2, '2025-09-27 05:02:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alojamientos`
--
ALTER TABLE `alojamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuario_alojamiento`
--
ALTER TABLE `usuario_alojamiento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id` (`usuario_id`,`alojamiento_id`),
  ADD KEY `alojamiento_id` (`alojamiento_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alojamientos`
--
ALTER TABLE `alojamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario_alojamiento`
--
ALTER TABLE `usuario_alojamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_alojamiento`
--
ALTER TABLE `usuario_alojamiento`
  ADD CONSTRAINT `usuario_alojamiento_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_alojamiento_ibfk_2` FOREIGN KEY (`alojamiento_id`) REFERENCES `alojamientos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
