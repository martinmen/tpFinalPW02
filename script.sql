-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2019 a las 16:26:41
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9
 drop database tpfinal;
 create database tpfinal;
use tpfinal;
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
-- Estructura de tabla para la tabla `asiento`
--


CREATE TABLE `asiento` (
  `id_asiento` int(11) NOT NULL,
  `cod_equipo` int(11) NOT NULL,
  `cod_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabina`
--

CREATE TABLE `cabina` (
  `id_cabina` int(4) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cabina`
--

/*INSERT INTO `cabina` (`id_cabina`, `descripcion`) VALUES
(1, 'general'),
(2, 'familiar'),
(3, 'suite');*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_medico`
--

CREATE TABLE `centro_medico` (
  `id_centro_medico` int(4) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `turnos_diarios` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `centro_medico`
--

/*INSERT INTO `centro_medico` (`id_centro_medico`, `descripcion`, `turnos_diarios`) VALUES
(1, 'buenos aires', 300),
(2, 'shanghai', 210),
(3, 'Ankara', 200);*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `cod_tipo_equipo` varchar(100) NOT NULL,
  `capacidad_total` int(4) NOT NULL,
  `capacidad_cabinaF` int(4) NOT NULL,
  `capacidad_cabinaG` int(4) NOT NULL,
  `capacidad_cabinaS` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

/*INSERT INTO `equipo` (`id_equipo`, `modelo`, `matricula`, `cod_tipo_equipo`, `capacidad_total`, `capacidad_cabinaF`, `capacidad_cabinaG`, `capacidad_cabinaS`) VALUES
(1, 'Aguila', 'AA1', 'AA', 300, 75, 200, 25),
(2, 'Aguila', 'AA1', 'AA', 300, 75, 200, 25),
(3, 'Aguila', 'AA5', 'AA', 300, 75, 200, 25),
(4, 'Aguila', 'AA9', 'AA', 300, 75, 200, 25),
(5, 'Aguila', 'AA13', 'AA', 300, 75, 200, 25),
(6, 'Aguila', 'AA17', 'AA', 300, 75, 200, 25),
(7, 'Aguilucho', 'BA8', 'BA', 60, 50, 0, 10),
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
(46, 'Zorzal', 'BA3', 'BA', 100, 50, 50, 0);*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE `estacion` (
  `id_estacion` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estacion`
--

/*INSERT INTO `estacion` (`id_estacion`, `nombre`) VALUES
(1, 'Estacion Espacial Internacional'),
(2, 'Orbitel Hotel'),
(3, 'Luna'),
(4, 'Marte'),
(5, 'Ganimedes'),
(6, 'Europa'),
(7, 'Io'),
(8, 'Encendalo'),
(9, 'Titan');*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

/*INSERT INTO `estado` (`id_estado`, `descripcion`) VALUES
(1, 'En proceso'),
(2, 'En espera'),
(3, 'Realizado');*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_vuelo`
--

CREATE TABLE `nivel_vuelo` (
  `id_nivel_vuelo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_cabina` int(11) NOT NULL,
  `cod_asiento` int(11) NOT NULL,
  `cod_vuelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

/*INSERT INTO `reserva` (`id_reserva`, `cod_usuario`, `cod_cabina`, `cod_asiento`, `cod_vuelo`) VALUES
(1, 0, 2, 20, 12),
(13, 0, 2, 20, 12),
(14, 0, 3, 20, 12),
(15, 0, 3, 20, 12),
(16, 0, 2, 20, 12);*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

/*INSERT INTO `tipo_documento` (`id_tipo_documento`, `descripcion`) VALUES
(1, 'DNI'),
(2, 'Pasaporte'),
(3, 'Libreta Civica');*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

/*INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Administrador');*/

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

/*INSERT INTO `tipo_vuelo` (`id_tipo_vuelo`, `descripcion`) VALUES
(1, 'Suborbitales'),
(2, 'Tour'),
(3, 'Entre destinos');*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trayecto`
--

CREATE TABLE `trayecto` (
  `id_trayecto` int(11) NOT NULL,
  `cod_estacion_origen` int(11) NOT NULL,
  `cod_estacion_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id_turno_medico` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_centro_medico` int(11) NOT NULL,
  `cod_nivel_vuelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cod_tipo_doc` int(11) NOT NULL,
  `num_doc` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contrasenia` int(11) NOT NULL,
  `cod_tipo_usuario` int(11) NOT NULL,
  `cod_nivel_vuelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

/*INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `cod_tipo_doc`, `num_doc`, `email`, `contrasenia`, `cod_tipo_usuario`, `cod_nivel_vuelo`) VALUES
(1, 'martin', '', 0, 0, 'mmendez@gmail.com', 123, 2, 0),
(22, 'Mica', 'Vandoni', 1, 12345678, 'mica@gmail.com', 123, 2, 0),
(23, 'Mica', 'Vandoni', 1, 12345678, 'mica@gmail.com', 123, 2, 0),
(24, 'Debora', 'Chamorro', 1, 35379016, 'debo@gmail.com', 123, 2, 0),
(25, 'Juan', 'Perez', 1, 98745632, 'juan@gmail.com', 123, 2, 0),
(26, 'Juan', 'Perez', 1, 98745632, 'juan@gmail.com', 123, 2, 0);*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `cod_vuelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `id_vuelo` int(11) NOT NULL,
  `duracion` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cod_equipo` int(11) NOT NULL,
  `cod_tipo_vuelo` int(11) NOT NULL,
  `cod_trayecto` int(11) NOT NULL,
  `cod_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vuelo`
--

/*INSERT INTO `vuelo` (`id_vuelo`, `duracion`, `fecha`, `cod_equipo`, `cod_tipo_vuelo`, `cod_trayecto`,`cod_estado`) VALUES
(11, 8, '2019-11-04', 1, 1, 0, 1),
(12, 8, '2019-11-04', 3, 1, 0, 2),
(13, 8, '2019-11-04', 2, 1, 0, 3),
(14, 8, '2019-10-04', 4, 1, 0, 2),
(15, 8, '2019-11-04', 5, 1, 0, 1);*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo_trayecto`
--

CREATE TABLE `vuelo_trayecto` (
  `id_escala` int(11) NOT NULL,
  `cod_vuelo` int(11) NOT NULL,
  `cod_trayecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`id_asiento`),
  ADD KEY `cod_equipo` (`cod_equipo`);

--
-- Indices de la tabla `cabina`
--
ALTER TABLE `cabina`
  ADD PRIMARY KEY (`id_cabina`);

--
-- Indices de la tabla `centro_medico`
--
ALTER TABLE `centro_medico`
  ADD PRIMARY KEY (`id_centro_medico`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD PRIMARY KEY (`id_estacion`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `nivel_vuelo`
--
ALTER TABLE `nivel_vuelo`
  ADD PRIMARY KEY (`id_nivel_vuelo`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `cod_cabina` (`cod_cabina`),
  ADD KEY `cod_vuelo` (`cod_vuelo`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`) USING BTREE;

--
-- Indices de la tabla `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  ADD PRIMARY KEY (`id_tipo_vuelo`);

--
-- Indices de la tabla `trayecto`
-- Indices de la tabla `trayecto`
--
ALTER TABLE `trayecto`
  ADD PRIMARY KEY (`id_trayecto`),
  ADD KEY `cod_estacion_origen` (`cod_estacion_origen`),
  ADD KEY `cod_estacion_destino` (`cod_estacion_destino`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id_turno_medico`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_centro_medico` (`cod_centro_medico`),
  ADD KEY `cod_nivel_vuelo` (`cod_nivel_vuelo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`,`num_doc`),
  ADD KEY `cod_tipo_doc` (`cod_tipo_doc`),
  ADD KEY `cod_tipo_usuario` (`cod_tipo_usuario`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `cod_vuelo` (`cod_vuelo`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`id_vuelo`),
  ADD KEY `cod_estado` (`cod_estado`),
  ADD KEY `cod_tipo_vuelo` (`cod_tipo_vuelo`),
  ADD KEY `cod_equipo` (`cod_equipo`),
  ADD KEY `cod_trayecto` (`cod_trayecto`);

--
-- Indices de la tabla `vuelo_trayecto`
--
ALTER TABLE `vuelo_trayecto`
  ADD PRIMARY KEY (`id_escala`),
  ADD KEY `cod_vuelo` (`cod_vuelo`),
  ADD KEY `cod_trayecto` (`cod_trayecto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabina`
--
ALTER TABLE `cabina`
  MODIFY `id_cabina` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `centro_medico`
--
ALTER TABLE `centro_medico`
  MODIFY `id_centro_medico` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `estacion`
--
ALTER TABLE `estacion`
  MODIFY `id_estacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  MODIFY `id_tipo_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `trayecto`
--
ALTER TABLE `trayecto`
  MODIFY `id_trayecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id_turno_medico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `vuelo_trayecto`
--
ALTER TABLE `vuelo_trayecto`
  MODIFY `id_escala` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`

--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`id_usuario`);
  
  ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`cod_cabina`) REFERENCES `cabina` (`id_cabina`);
  
  ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`cod_vuelo`) REFERENCES `vuelo` (`id_vuelo`);

--
-- Filtros para la tabla `trayecto`
-- cod_usuario
ALTER TABLE `trayecto`
  ADD CONSTRAINT `trayecto_ibfk_2` FOREIGN KEY (`cod_estacion_origen`) REFERENCES `estacion` (`id_estacion`),
  ADD CONSTRAINT `trayecto_ibfk_3` FOREIGN KEY (`cod_estacion_destino`) REFERENCES `estacion` (`id_estacion`);

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`cod_nivel_vuelo`) REFERENCES `nivel_vuelo` (`id_nivel_vuelo`),
  ADD CONSTRAINT `turno_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `turno_ibfk_3` FOREIGN KEY (`cod_centro_medico`) REFERENCES `centro_medico` (`id_centro_medico`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`cod_vuelo`) REFERENCES `vuelo` (`id_vuelo`);

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
 /* ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`cod_tipo_vuelo`) REFERENCES `tipo_vuelo` (`id_tipo_vuelo`),*/
  ADD CONSTRAINT `vuelo_ibfk_2` FOREIGN KEY (`cod_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `vuelo_ibfk_3` FOREIGN KEY (`cod_trayecto`) REFERENCES `trayecto` (`id_trayecto`),
  ADD CONSTRAINT `vuelo_ibfk_4` FOREIGN KEY (`cod_equipo`) REFERENCES `equipo` (`id_equipo`);

--
-- Filtros para la tabla `vuelo_trayecto`
--
ALTER TABLE `vuelo_trayecto`
  ADD CONSTRAINT `vuelo_trayecto_ibfk_1` FOREIGN KEY (`cod_vuelo`) REFERENCES `vuelo` (`id_vuelo`),
  ADD CONSTRAINT `vuelo_trayecto_ibfk_2` FOREIGN KEY (`cod_trayecto`) REFERENCES `trayecto` (`id_trayecto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
