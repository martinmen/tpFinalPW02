-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2019 a las 21:52:36
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpfinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabinas`
--

CREATE TABLE `cabinas` (
  `id_cabina` int(4) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cabinas`
--

INSERT INTO `cabinas` (`id_cabina`, `descripcion`) VALUES
(1, 'general'),
(2, 'familiar'),
(3, 'suite');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros_medicos`
--

CREATE TABLE `centros_medicos` (
  `id_centro` int(4) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `centros_medicos`
--

INSERT INTO `centros_medicos` (`id_centro`, `descripcion`) VALUES
(1, 'buenos aires'),
(2, 'shanghai'),
(3, 'Ankara'),
(4, 'buenos aires'),
(5, 'shanghai'),
(6, 'Ankara');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` bigint(20) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `capacidad_total` int(4) NOT NULL,
  `capacidad_cabinaF` int(4) NOT NULL,
  `capacidad_cabinaG` int(4) NOT NULL,
  `capacidad_cabinaS` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `modelo`, `matricula`, `tipo`, `capacidad_total`, `capacidad_cabinaF`, `capacidad_cabinaG`, `capacidad_cabinaS`) VALUES
(1, 'Aguila', 'AA1', 'AA', 300, 75, 200, 25),
(2, 'Aguila', 'AA1', 'AA', 300, 75, 200, 25),
(3, 'Aguila', 'AA5', 'AA', 300, 75, 200, 25),
(4, 'Aguila', 'AA9', 'AA', 300, 75, 200, 25),
(5, 'Aguila', 'AA13', 'AA', 300, 75, 200, 25),
(6, 'Aguila', 'AA17', 'AA', 300, 75, 200, 25),
(7, 'Aguilucho', 'BA8', 'BA', 60, 0, 0, 0),
(8, 'Aguilucho', 'BA9', 'BA', 60, 50, 0, 10),
(9, 'Aguilucho', 'BA10', 'BA', 60, 50, 0, 10),
(10, 'Aguilucho', 'BA11', 'BA', 60, 50, 0, 10),
(11, 'Aguilucho', 'BA12', 'BA', 60, 50, 0, 10),
(12, 'Calandria', 'O1', 'Orbital', 300, 75, 200, 25),
(13, 'Calandria', 'O2', 'Orbital', 300, 75, 200, 25),
(14, 'Calandria', 'O6', 'Orbital', 300, 75, 200, 25),
(15, 'Calandria', 'O7', 'Orbital', 300, 75, 200, 25),
(16, 'Canario', 'BA13', 'BA', 80, 70, 0, 10),
(17, 'Canario', 'BA14', 'BA', 80, 70, 0, 10),
(18, 'Canario', 'BA15', 'BA', 80, 70, 0, 10),
(19, 'Canario', 'BA16', 'BA', 80, 70, 0, 10),
(20, 'Canario', 'BA17', 'BA', 80, 70, 0, 10),
(21, 'Carancho', 'BA4', 'BA', 110, 0, 110, 0),
(22, 'Carancho', 'BA5', 'BA', 110, 0, 110, 0),
(23, 'Carancho', 'BA6', 'BA', 110, 0, 110, 0),
(24, 'Carancho', 'BA7', 'BA', 110, 0, 110, 0),
(25, 'Colibri', 'O3', 'Orbital', 120, 18, 100, 2),
(26, 'Colibri', 'O4', 'Orbital', 120, 18, 100, 2),
(27, 'Colibri', 'O5', 'Orbital', 120, 18, 100, 2),
(28, 'Colibri', 'O8', 'Orbital', 120, 18, 100, 2),
(29, 'Colibri', 'O9', 'Orbital', 120, 18, 100, 2),
(30, 'Condor', 'AA2', 'AA', 350, 10, 300, 40),
(31, 'Condor', 'AA6', 'AA', 350, 10, 300, 40),
(32, 'Condor', 'AA10', 'AA', 350, 10, 300, 40),
(33, 'Condor', 'AA14', 'AA', 350, 10, 300, 40),
(34, 'Condor', 'AA18', 'AA', 350, 10, 300, 40),
(35, 'Guanaco', 'AA4', 'AA', 100, 0, 0, 100),
(36, 'Guanaco', 'AA8', 'AA', 100, 0, 0, 100),
(37, 'Guanaco', 'AA12', 'AA', 100, 0, 0, 100),
(38, 'Guanaco', 'AA16', 'AA', 100, 0, 0, 100),
(39, 'Halcon', 'AA3', 'AA', 200, 25, 150, 25),
(40, 'Halcon', 'AA7', 'AA', 200, 25, 150, 25),
(41, 'Halcon', 'AA11', 'AA', 200, 25, 150, 25),
(42, 'Halcon', 'AA15', 'AA', 200, 25, 150, 25),
(43, 'Halcon', 'AA19', 'AA', 200, 25, 150, 25),
(44, 'Zorzal', 'BA1', 'BA', 100, 50, 50, 0),
(45, 'Zorzal', 'BA2', 'BA', 100, 50, 50, 0),
(46, 'Zorzal', 'BA3', 'BA', 100, 50, 50, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` bigint(20) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origen`
--

CREATE TABLE `origen` (
  `id_origen` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `origen`
--

INSERT INTO `origen` (`id_origen`, `descripcion`) VALUES
('AK', 'Ankara'),
('BA', 'Buenos aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` bigint(20) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `descripcion`) VALUES
(1, 'DNI'),
(2, 'Pasaporte'),
(3, 'Libreta Civica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` bigint(20) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Administrador'),
(4, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vuelo`
--

CREATE TABLE `tipo_vuelo` (
  `id_tipo_vuelo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_vuelo`
--

INSERT INTO `tipo_vuelo` (`id_tipo_vuelo`, `descripcion`) VALUES
(1, 'suborbitales'),
(2, 'tour'),
(3, 'entre_destinos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `nro_documento` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `contrasenia` varchar(255) DEFAULT NULL,
  `tipo_usuario` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `nro_documento`, `email`, `contrasenia`, `tipo_usuario`) VALUES
(1, 'micaela', 'vandoni', '12345', 'mvandoni@gmail.com', '123', 1),
(2, 'leandro', 'tonello', '12345', 'ltonello@gmail.com', '123', 1),
(3, 'martin', 'mendez', '12345', 'mmendez@gmail.com', '123', 2),
(4, 'debora', 'chamorro', '12345', 'dschamorro@gmail.com', '123', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id` bigint(20) NOT NULL,
  `duracion` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `equipo` varchar(40) DEFAULT NULL,
  `tipo_vuelo` varchar(40) DEFAULT NULL,
  `origen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `duracion`, `fecha`, `equipo`, `tipo_vuelo`, `origen`) VALUES
(11, 8, '2019-11-04', 'Calandria', '1', 'BA'),
(12, 8, '2019-11-04', 'Calandria', '1', 'BA'),
(13, 8, '2019-11-04', 'Calandria', '1', 'BA'),
(14, 8, '2019-10-04', 'Colibri', '1', 'AK'),
(15, 8, '2019-11-04', 'Colibri', '1', 'AK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabinas`
--
ALTER TABLE `cabinas`
  ADD PRIMARY KEY (`id_cabina`);

--
-- Indices de la tabla `centros_medicos`
--
ALTER TABLE `centros_medicos`
  ADD PRIMARY KEY (`id_centro`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `origen`
--
ALTER TABLE `origen`
  ADD PRIMARY KEY (`id_origen`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  ADD PRIMARY KEY (`id_tipo_vuelo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabinas`
--
ALTER TABLE `cabinas`
  MODIFY `id_cabina` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `centros_medicos`
--
ALTER TABLE `centros_medicos`
  MODIFY `id_centro` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  MODIFY `id_tipo_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
