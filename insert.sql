INSERT INTO `cabina` (`id_cabina`, `descripcion`) VALUES
(1, 'general'),
(2, 'familiar'),
(3, 'suite');
INSERT INTO `estado` (`id_estado`, `descripcion`) VALUES
(1, 'En proceso'),
(2, 'En espera'),
(3, 'Realizado');
INSERT INTO `tipo_documento` (`id_tipo_documento`, `descripcion`) VALUES
(1, 'DNI'),
(2, 'Pasaporte'),
(3, 'Libreta Civica');

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Administrador');

INSERT INTO `tipo_vuelo` (`id_tipo_vuelo`, `descripcion`) VALUES
(1, 'Suborbitales'),
(2, 'Tour'),
(3, 'Entre destinos');
INSERT INTO `estacion` (`id_estacion`, `nombre`) VALUES
(1, 'Estacion Espacial Internacional'),
(2, 'Orbitel Hotel'),
(3, 'Luna'),
(4, 'Marte'),
(5, 'Ganimedes'),
(6, 'Europa'),
(7, 'Io'),
(8, 'Encendalo'),
(9, 'Titan');

INSERT INTO `centro_medico` (`id_centro_medico`, `descripcion`, `turnos_diarios`) VALUES
(1, 'buenos aires', 300),
(2, 'shanghai', 210),
(3, 'Ankara', 200);

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `cod_tipo_doc`, `num_doc`, `email`, `contrasenia`, `cod_tipo_usuario`, `cod_nivel_vuelo`) VALUES
(1, 'martin', '', 0, 0, 'mmendez@gmail.com', 123, 2, 0),
(22, 'Mica', 'Vandoni', 1, 12345678, 'mica@gmail.com', 123, 2, 0),
(23, 'Mica', 'Vandoni', 1, 12345678, 'mica@gmail.com', 123, 2, 0),
(24, 'Debora', 'Chamorro', 1, 35379016, 'debo@gmail.com', 123, 2, 0),
(25, 'Juan', 'Perez', 1, 98745632, 'juan@gmail.com', 123, 2, 0),
(26, 'Juan', 'Perez', 1, 98745632, 'juan@gmail.com', 123, 2, 0);

INSERT INTO `equipo` (`id_equipo`, `modelo`, `matricula`, `cod_tipo_equipo`, `capacidad_total`, `capacidad_cabinaF`, `capacidad_cabinaG`, `capacidad_cabinaS`) VALUES
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
(46, 'Zorzal', 'BA3', 'BA', 100, 50, 50, 0);

INSERT INTO trayecto(cod_estacion_origen,cod_estacion_destino)
		values (1, 2),
			   (1,3),
               (2,4),
               (2,5),
               (3,6),
               (3,7);

INSERT INTO `vuelo` (`id_vuelo`, `duracion`, `fecha`, `cod_equipo`, `cod_tipo_vuelo`, `cod_trayecto`,`cod_estado`) VALUES
(11, 8, '2019-11-04', 1, 1, 1, 1),
(12, 8, '2019-11-04', 3, 1, 2, 2),
(13, 8, '2019-11-04', 2, 1, 4, 3),
(14, 8, '2019-10-04', 4, 1, 3, 2),
(15, 8, '2019-11-04', 5, 1, 2, 1);





INSERT INTO `reserva` ( `cod_usuario`, `cod_cabina`, `cod_asiento`, `cod_vuelo`) VALUES
(1, 2, 20, 12),
(24, 2, 20, 12),
(1, 3, 20, 12),
(22, 3, 20, 12),
(23, 2, 20, 12);




