-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2021 a las 03:39:20
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria-v2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(255) NOT NULL,
  `id_dueño_mascota` int(255) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `id_fecha` int(255) NOT NULL,
  `id_teléfono` int(255) NOT NULL,
  `id_mascota` int(255) NOT NULL,
  `nota` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `id_dueño_mascota`, `id_usuario`, `id_fecha`, `id_teléfono`, `id_mascota`, `nota`) VALUES
(1, 1, 2, 2, 2, 2, '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo_electronico`
--

CREATE TABLE `correo_electronico` (
  `id_correo_electronico` int(255) NOT NULL,
  `correo_electronico` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `correo_electronico`
--

INSERT INTO `correo_electronico` (`id_correo_electronico`, `correo_electronico`) VALUES
(1, 'prueba@gmail.com'),
(2, 'seguimiento@hotmail.com'),
(3, 'alan.argandolfo@gmail.com'),
(4, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirección`
--

CREATE TABLE `dirección` (
  `id_dirección` int(255) NOT NULL,
  `dirección` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dirección`
--

INSERT INTO `dirección` (`id_dirección`, `dirección`) VALUES
(1, 'felix hoyos 2665'),
(2, 'brasil 7569'),
(3, 'felix hoyos'),
(5, 'manuel montt 7788');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dueño_mascota`
--

CREATE TABLE `dueño_mascota` (
  `id_dueño_mascota` int(255) NOT NULL,
  `id_dirección` int(255) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `apellido` varchar(1000) NOT NULL,
  `edad` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dueño_mascota`
--

INSERT INTO `dueño_mascota` (`id_dueño_mascota`, `id_dirección`, `nombre`, `apellido`, `edad`) VALUES
(1, 2, 'pedro', 'araya', 26),
(2, 1, 'Manuel', 'riquelme', 32),
(5, 1, 'manuel', 'aguirre', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emergencia`
--

CREATE TABLE `emergencia` (
  `id_emergencia` int(255) NOT NULL,
  `id_dueño_mascota` int(255) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `id_fecha` int(255) NOT NULL,
  `id_teléfono` int(255) NOT NULL,
  `id_mascota` int(255) NOT NULL,
  `nota` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `emergencia`
--

INSERT INTO `emergencia` (`id_emergencia`, `id_dueño_mascota`, `id_usuario`, `id_fecha`, `id_teléfono`, `id_mascota`, `nota`) VALUES
(1, 2, 2, 1, 2, 1, 'atropello');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id_fecha` int(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id_fecha`, `fecha`) VALUES
(1, '2021-06-15'),
(2, '2021-06-24'),
(3, '2021-06-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_mascota`
--

CREATE TABLE `ficha_mascota` (
  `id_ficha_mascota` int(255) NOT NULL,
  `id_mascota` int(255) NOT NULL,
  `detalle_rutinario` varchar(1000) NOT NULL,
  `detalle_no_rutinario` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ficha_mascota`
--

INSERT INTO `ficha_mascota` (`id_ficha_mascota`, `id_mascota`, `detalle_rutinario`, `detalle_no_rutinario`) VALUES
(1, 1, 'vacunas al día', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumental_veterinario`
--

CREATE TABLE `instrumental_veterinario` (
  `id_instrumental_veterinario` int(255) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `cantidad` int(255) NOT NULL,
  `nota` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `instrumental_veterinario`
--

INSERT INTO `instrumental_veterinario` (`id_instrumental_veterinario`, `nombre`, `cantidad`, `nota`) VALUES
(1, 'Tijera', 3, NULL),
(2, 'pinza', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `id_insumo` int(255) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `cantidad` int(255) NOT NULL,
  `nota` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`id_insumo`, `nombre`, `cantidad`, `nota`) VALUES
(1, 'Paño', 16, NULL),
(2, 'jeringa desechable', 10, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id_mascota` int(255) NOT NULL,
  `id_dueño_mascota` int(255) NOT NULL,
  `raza` varchar(1000) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `especie` varchar(1000) NOT NULL,
  `edad` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `id_dueño_mascota`, `raza`, `nombre`, `especie`, `edad`) VALUES
(1, 1, 'no definida', 'lobo', 'perro', 1),
(2, 2, 'no definida', 'pelusa', 'gato', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teléfono`
--

CREATE TABLE `teléfono` (
  `id_teléfono` int(255) NOT NULL,
  `teléfono` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `teléfono`
--

INSERT INTO `teléfono` (`id_teléfono`, `teléfono`) VALUES
(1, 977176836),
(2, 944568724),
(3, 948824465),
(4, 977176837),
(5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(255) NOT NULL,
  `id_dirección` int(255) NOT NULL,
  `id_teléfono` int(255) NOT NULL,
  `id_correo_electronico` int(255) NOT NULL,
  `usuario` varchar(1000) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `apellido` varchar(1000) NOT NULL,
  `rut` varchar(1000) NOT NULL,
  `especialidad` varchar(1000) NOT NULL,
  `edad` int(255) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_dirección`, `id_teléfono`, `id_correo_electronico`, `usuario`, `nombre`, `apellido`, `rut`, `especialidad`, `edad`, `password`) VALUES
(1, 2, 1, 2, 'Administrador', 'alan', 'araya', '18826974-5', 'programador', 26, '202cb962ac59075b964b07152d234b70'),
(2, 2, 1, 1, 'Veterinario', 'joaquin', 'urrutia', '16658948-5', 'veterinario', 35, '202cb962ac59075b964b07152d234b70'),
(4, 3, 3, 3, 'Asistente', 'alan', 'gandolfo', '18826974-5', 'informatico', 26, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `id_visita` int(255) NOT NULL,
  `id_dueño_mascota` int(255) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `id_fecha` int(255) NOT NULL,
  `id_teléfono` int(255) NOT NULL,
  `id_mascota` int(255) NOT NULL,
  `id_dirección` int(255) NOT NULL,
  `nota` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`id_visita`, `id_dueño_mascota`, `id_usuario`, `id_fecha`, `id_teléfono`, `id_mascota`, `id_dirección`, `nota`) VALUES
(1, 2, 2, 1, 2, 2, 2, '-');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_dueño_mascota` (`id_dueño_mascota`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_fecha` (`id_fecha`),
  ADD KEY `id_teléfono` (`id_teléfono`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `correo_electronico`
--
ALTER TABLE `correo_electronico`
  ADD PRIMARY KEY (`id_correo_electronico`);

--
-- Indices de la tabla `dirección`
--
ALTER TABLE `dirección`
  ADD PRIMARY KEY (`id_dirección`);

--
-- Indices de la tabla `dueño_mascota`
--
ALTER TABLE `dueño_mascota`
  ADD PRIMARY KEY (`id_dueño_mascota`),
  ADD KEY `id_dirección` (`id_dirección`);

--
-- Indices de la tabla `emergencia`
--
ALTER TABLE `emergencia`
  ADD PRIMARY KEY (`id_emergencia`),
  ADD KEY `id_dueño_mascota` (`id_dueño_mascota`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_fecha` (`id_fecha`),
  ADD KEY `id_teléfono` (`id_teléfono`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id_fecha`);

--
-- Indices de la tabla `ficha_mascota`
--
ALTER TABLE `ficha_mascota`
  ADD PRIMARY KEY (`id_ficha_mascota`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `instrumental_veterinario`
--
ALTER TABLE `instrumental_veterinario`
  ADD PRIMARY KEY (`id_instrumental_veterinario`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`id_insumo`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `id_dueño_mascota` (`id_dueño_mascota`);

--
-- Indices de la tabla `teléfono`
--
ALTER TABLE `teléfono`
  ADD PRIMARY KEY (`id_teléfono`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_dirección` (`id_dirección`),
  ADD KEY `id_teléfono` (`id_teléfono`),
  ADD KEY `id_correo_electronico` (`id_correo_electronico`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id_visita`),
  ADD KEY `id_dueño_mascota` (`id_dueño_mascota`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_fecha` (`id_fecha`),
  ADD KEY `id_teléfono` (`id_teléfono`),
  ADD KEY `id_dirección` (`id_dirección`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `correo_electronico`
--
ALTER TABLE `correo_electronico`
  MODIFY `id_correo_electronico` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `dirección`
--
ALTER TABLE `dirección`
  MODIFY `id_dirección` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dueño_mascota`
--
ALTER TABLE `dueño_mascota`
  MODIFY `id_dueño_mascota` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `emergencia`
--
ALTER TABLE `emergencia`
  MODIFY `id_emergencia` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `id_fecha` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ficha_mascota`
--
ALTER TABLE `ficha_mascota`
  MODIFY `id_ficha_mascota` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `instrumental_veterinario`
--
ALTER TABLE `instrumental_veterinario`
  MODIFY `id_instrumental_veterinario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `id_insumo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `teléfono`
--
ALTER TABLE `teléfono`
  MODIFY `id_teléfono` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `id_visita` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_dueño_mascota`) REFERENCES `dueño_mascota` (`id_dueño_mascota`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`id_fecha`) REFERENCES `fecha` (`id_fecha`),
  ADD CONSTRAINT `cita_ibfk_4` FOREIGN KEY (`id_teléfono`) REFERENCES `teléfono` (`id_teléfono`),
  ADD CONSTRAINT `cita_ibfk_5` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`);

--
-- Filtros para la tabla `dueño_mascota`
--
ALTER TABLE `dueño_mascota`
  ADD CONSTRAINT `dueño_mascota_ibfk_1` FOREIGN KEY (`id_dirección`) REFERENCES `dirección` (`id_dirección`);

--
-- Filtros para la tabla `emergencia`
--
ALTER TABLE `emergencia`
  ADD CONSTRAINT `emergencia_ibfk_1` FOREIGN KEY (`id_dueño_mascota`) REFERENCES `dueño_mascota` (`id_dueño_mascota`),
  ADD CONSTRAINT `emergencia_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `emergencia_ibfk_3` FOREIGN KEY (`id_fecha`) REFERENCES `fecha` (`id_fecha`),
  ADD CONSTRAINT `emergencia_ibfk_4` FOREIGN KEY (`id_teléfono`) REFERENCES `teléfono` (`id_teléfono`),
  ADD CONSTRAINT `emergencia_ibfk_5` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`);

--
-- Filtros para la tabla `ficha_mascota`
--
ALTER TABLE `ficha_mascota`
  ADD CONSTRAINT `ficha_mascota_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`id_dueño_mascota`) REFERENCES `dueño_mascota` (`id_dueño_mascota`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_dirección`) REFERENCES `dirección` (`id_dirección`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_teléfono`) REFERENCES `teléfono` (`id_teléfono`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_correo_electronico`) REFERENCES `correo_electronico` (`id_correo_electronico`);

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`id_dueño_mascota`) REFERENCES `dueño_mascota` (`id_dueño_mascota`),
  ADD CONSTRAINT `visita_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `visita_ibfk_3` FOREIGN KEY (`id_fecha`) REFERENCES `fecha` (`id_fecha`),
  ADD CONSTRAINT `visita_ibfk_4` FOREIGN KEY (`id_teléfono`) REFERENCES `teléfono` (`id_teléfono`),
  ADD CONSTRAINT `visita_ibfk_5` FOREIGN KEY (`id_dirección`) REFERENCES `dirección` (`id_dirección`),
  ADD CONSTRAINT `visita_ibfk_6` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
