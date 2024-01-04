-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2024 at 05:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universidad_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clases`
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
-- Table structure for table `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `clase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `alumno_id`, `clase_id`) VALUES
(1, 1, 5),
(2, 2, 2),
(3, 1, 13),
(4, 1, 6),
(5, 2, 8),
(6, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Admin'),
(2, 'Maestro'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(50) DEFAULT NULL,
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
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `correo`, `password`, `direccion`, `fecha_nac`, `clase_id`, `rol_id`, `estatus`) VALUES
(1, '0301198100068', 'Raysell Concepcion', 'admin@admin', 'admin', 'Rep.Dom, santo Domingo, Santo Domingo Este', '1999-07-22', NULL, 1, 1),
(2, '0303199006421', 'Carlos Romero', 'alumno2@alumno', 'alumno', 'San Pedro Sula, Cortes, Honduras', '1990-05-13', NULL, 3, 1),
(3, '1234567890', 'Diego Huarsaya', 'admin1@admin', 'admin1', 'Lima, Perú', '2001-06-25', 12, 2, 0),
(4, '0987654321', 'Harold Carazas', 'maestro@maestro', 'maestro', 'Londres, Inglaterra', '2003-08-17', NULL, 1, 0),
(5, '0504199512345', 'Jorge Sosa', 'admin2@admin', 'admin2', 'La Paz, Bolivia', '1995-12-24', NULL, 2, 1),
(6, '4555555', 'Erika salm', 'Erika30@gmail.com', '1234', 'Aut. san isidro', '2023-11-28', 5, 1, 1),
(7, '23423543', 'Maria Virginia', 'maria21@maestra', '2345', 'Aut. san isidro', '2023-12-29', 4, 2, 1),
(8, '12313212', 'Nelson Familia', 'Nelson@maestra', 'maestro', 'Aut. san isidro', '2023-12-30', NULL, 2, 0),
(9, '4555555678', 'Raysell', 'raysell22@gmail.com', '12345', 'Aut. san isidro', '2023-12-30', NULL, 3, 1),
(10, '324454532', 'manuel', 'manuel@maestro', '1234', 'Aut. san isidro', '2024-01-01', 1, 2, 1),
(11, '3324324234', 'Juan Manuel', 'juan@maestro', 'maestro', 'Aut. san isidro', '2024-01-01', 10, 2, 1),
(12, '565656565', 'Vincent Berihuete ', 'vincent@gmail.com', 'maestro', 'Aut. san rafael leonidas trujillo', '2023-12-19', 7, 2, 0),
(13, '4545677', 'Erick Gonzalez', 'Erick@gmail.com', 'alumno', 'Aut. san rafael leonidas trujillo', '2023-12-22', NULL, 3, 1),
(14, '909090909', 'genesis', 'genesis@gmail.com', 'maestro', 'la cabra para la loma ', '2023-12-09', 1, 2, 1),
(15, '454677876543', 'admin4', 'admin4@admin.com', 'maestro', 'Pedro Brand', '2024-01-03', 6, 2, 1),
(215, '12321334324', 'Josmeilyn caceres aquino', 'Josme@gmai.com', '1234', 'calle Gustavo nuñez de caceres', '2024-01-18', NULL, 3, 1),
(216, '565765783421', 'wendoly sosa lara', 'wendoly@gmaol.com', 'alumno', 'Santo Domingo Este', '2024-02-09', NULL, 3, 1),
(217, '123454653245', 'Luis Miguel Contreras', 'Luis@gmail.com', 'maestro', 'Aut. san isidro, Santo Domingo Este', '2024-02-10', 12, 2, 1),
(218, '40215522266', 'Eloise Concepcion', 'Eloise22@gmail.com', 'alumno', 'Santo Domingo Este, Rep. Dom.', '2024-04-20', NULL, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `clase_id` (`clase_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `clase_id` (`clase_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
