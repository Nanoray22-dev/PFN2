-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_university`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `nombre`) VALUES
(1, 'Español'),
(2, 'Algebra'),
(3, 'Contabilidad 1'),
(4, 'Ecuaciones Diferenciales'),
(5, 'PHP'),
(6, 'Laravel'),
(7, 'Programación de Bases de Datos'),
(8, 'React'),
(9, 'JavaScript'),
(10, 'HTML CSS'),
(11, 'Bootstrap Tailwindcss'),
(12, 'MVC POO'),
(13, 'Git Github'),
(14, 'Valores');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Admin'),
(2, 'Maestro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `clase_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `password`, `direccion`, `fecha_nac`, `clase_id`, `rol_id`, `estatus`) VALUES
(1, 'Raysell Concepciop', 'admin@admin', 'admin', 'Santo Domingo, Santo Domingo Este, Rep. Dom', '1999-07-22', NULL, 1, 1),
(2, 'Carlos Romero', 'maestro@maestro', 'alumno', 'San Pedro Sula, Olanchito, Honduras', '1990-05-13', NULL, 2, 1),
(3, 'Jorge Sosa', 'maestro@maestro', 'maestro', 'La Paz, Bolivia', '2001-06-25', 2, 0),
(4, 'Diego Huarsaya', 'admin@admin', 'admin', 'Guatemala, ciudad de Guatemala', '2003-08-17', NULL, 1, 1);


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `clase_id` (`clase_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;



--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripciones`
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;