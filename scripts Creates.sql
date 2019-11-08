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
  `cod_cabina` int(11) NOT NULL,
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
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE `estacion` (
  `id_estacion` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estructura de tabla para la tabla `nivel_vuelo`
--
CREATE TABLE `nivel_vuelo` (
  `id_nivel_vuelo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estructura de tabla para la tabla `reserva`
--
create table estado_usuario (
  `id_estado_usuario` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table estado_reserva (
  `id_estado_reserva` int(11) NOT NULL ,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

drop table reserva;
CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_cabina` int(11) NOT NULL,
  `cod_asiento` int(11) NOT NULL,
  `cod_vuelo` int(11) NOT NULL,
  `cod_estado_reserva` int(11) NOT NULL,
  `cod_codigo_reserva` varchar(8) NOT NULL
);
--
-- Estructura de tabla para la tabla `tipo_documento`
--
CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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

CREATE TABLE `trayecto` (
  `id_trayecto` int(11) NOT NULL,
  `cod_estacion_origen` int(11) NOT NULL,
  `cod_estacion_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `turno` (
  `id_turno_medico` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_centro_medico` int(11) NOT NULL,
  `cod_nivel_vuelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cod_tipo_doc` int(11) NOT NULL,
  `num_doc` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contrasenia` int(11) NOT NULL,
  `cod_tipo_usuario` int(11) NOT NULL,
  `cod_estado_usuario` int(11) NOT NULL,
  `cod_nivel_vuelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `cod_vuelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `vuelo` (
  `id_vuelo` int(11) NOT NULL,
  `duracion` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cod_equipo` int(11) NOT NULL,
  `cod_tipo_vuelo` int(11) NOT NULL,
  `cod_trayecto` int(11) NOT NULL,
  `cod_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `vuelo_trayecto` (
  `id_escala` int(11) NOT NULL,
  `cod_vuelo` int(11) NOT NULL,
  `cod_trayecto` int(11) NOT NULL,
`cod_asiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`id_asiento`),
  ADD KEY `cod_equipo` (`cod_equipo`),
  ADD KEY `cod_cabina` (`cod_equipo`);

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
alter table estado_reserva 
  ADD PRIMARY KEY (`id_estado_reserva`);
  
  

/*ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `cod_cabina` (`cod_cabina`),
  ADD KEY `cod_vuelo` (`cod_vuelo`),
  ADD KEY `cod_usuario` (`cod_usuario`),
ADD KEY `cod_estado_reserva` (`cod_estado_reserva`);
*/
ALTER TABLE `reserva`
  ADD PRIMARY KEY (cod_codigo_reserva,cod_usuario),
  ADD KEY `cod_cabina` (`cod_cabina`),
  ADD KEY `cod_vuelo` (`cod_vuelo`);
 -- ADD KEY `cod_usuario` (`cod_usuario`),
-- ADD KEY `cod_estado_reserva` (`cod_estado_reserva`);

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


alter table estado_usuario
add primary key (id_estado_usuario);
--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`,`num_doc`),
  ADD KEY `cod_tipo_doc` (`cod_tipo_doc`),
  ADD KEY `cod_tipo_usuario` (`cod_tipo_usuario`),
ADD KEY `cod_estado_usuario` (`cod_estado_usuario`);

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

ALTER TABLE `estado_reserva`
  MODIFY `id_estado_reserva` int(4) NOT NULL AUTO_INCREMENT;


ALTER TABLE `cabina`
  MODIFY `id_cabina` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `centro_medico`
--
ALTER TABLE `centro_medico`
  MODIFY `id_centro_medico` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estacion`
--
ALTER TABLE `estacion`
  MODIFY `id_estacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  MODIFY `id_tipo_vuelo` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `estado_usuario`
  MODIFY `id_estado_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id_vuelo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vuelo_trayecto`
--
ALTER TABLE `vuelo_trayecto`
  MODIFY `id_escala` int(11) NOT NULL AUTO_INCREMENT;
  
  --
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `id_asiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`

--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`cod_cabina`) REFERENCES `cabina` (`id_cabina`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`cod_vuelo`) REFERENCES `vuelo` (`id_vuelo`),
  ADD CONSTRAINT `reserva_ibfk_4` FOREIGN KEY (`cod_estado_reserva`) REFERENCES `estado_reserva` (`id_estado_reserva`);



--
-- Filtros para la tabla `trayecto`
-- cod_usuario

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
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`),
 ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`cod_estado_usuario`) REFERENCES `estado_usuario` (`id_estado_usuario`);

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


-- Filtros para la tabla `asiento`
--
ALTER TABLE `asiento`
 /* ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`cod_tipo_vuelo`) REFERENCES `tipo_vuelo` (`id_tipo_vuelo`),*/
  ADD CONSTRAINT `asiento_ibfk_2` FOREIGN KEY (`cod_cabina`) REFERENCES `cabina` (`id_cabina`),
  ADD CONSTRAINT `asiento_ibfk_3` FOREIGN KEY (`cod_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `asiento_ibfk_4` FOREIGN KEY (`cod_equipo`) REFERENCES `equipo` (`id_equipo`);

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
