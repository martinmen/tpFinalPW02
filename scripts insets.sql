use tpfinal;


INSERT INTO `cabina` (`id_cabina`, `descripcion`) VALUES
(1, 'general'),
(2, 'familiar'),
(3, 'suite');
INSERT INTO `estado` (`id_estado`, `descripcion`) VALUES
(1, 'Libre'),
(2, 'reserva'),
(3, 'confirmado');
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
INSERT INTO `trayecto` (`cod_estacion_origen`, `cod_estacion_destino`) VALUES 
(1,1),
(1,2), 
(1,3), 
(1,4), 
(1,5), 
(1,6), 
(1,7), 
(1,8), 
(1,9),
(2,1),
(2,2),  
(2,3), 
(2,4), 
(2,5), 
(2,6), 
(2,7), 
(2,8), 
(2,9),
(3,1), 
(3,2),
(3,3), 
(3,4), 
(3,5), 
(3,6), 
(3,7), 
(3,8), 
(3,9),
(4,1),
(4,2),
(4,3),
(4,4),
(4,5),
(4,6),
(4,7),
(4,8),
(4,9),
(5,1),
(5,2),
(5,3),
(5,4),
(5,5),
(5,6),
(5,7),
(5,8),
(5,9),
(6,1),
(6,2),
(6,3),
(6,4),
(6,5),
(6,6),
(6,7),
(6,8),
(6,9),
(7,1),
(7,2),
(7,3),
(7,4),
(7,5),
(7,6),
(7,7),
(7,8),
(7,9),
(8,1),
(8,2),
(8,3),
(8,4),
(8,5),
(8,6),
(8,7),
(8,8),
(8,9),
(9,1),
(9,2),
(9,3),
(9,4),
(9,5),
(9,6),
(9,7),
(9,8),
(9,9); 

INSERT INTO `centro_medico` (`id_centro_medico`, `descripcion`, `turnos_diarios`) VALUES
(1, 'buenos aires', 300),
(2, 'shanghai', 210),
(3, 'Ankara', 200);

insert into estado_usuario (descripcion) values
('pendiente'),
('confirmado');
select * from estado_usuario;


INSERT INTO `usuario` (`nombre`, `apellido`, `cod_tipo_doc`, `num_doc`, `email`, `contrasenia`, `cod_tipo_usuario`,`cod_estado_usuario`, `cod_nivel_vuelo`) VALUES
('martin', '', 0, 0, 'mmendez@gmail.com', 123, 2,2, 0),
('Mica', 'Vandoni', 1, 12345678, 'mica@gmail.com', 123, 2,2, 0),
('Debora', 'Chamorro', 1, 35379016, 'debo@gmail.com', 123, 2,2, 0),
('Juan', 'Perez', 1, 98745632, 'juan@gmail.com', 123, 2,2, 0);

INSERT INTO `equipo` (`modelo`, `matricula`, `cod_tipo_equipo`, `capacidad_total`, `capacidad_cabinaF`, `capacidad_cabinaG`, `capacidad_cabinaS`) VALUES
('Aguila', 'AA1', 'AA', 300, 75, 200, 25),
('Aguila', 'AA1', 'AA', 300, 75, 200, 25),
('Aguila', 'AA5', 'AA', 300, 75, 200, 25),
('Aguila', 'AA9', 'AA', 300, 75, 200, 25),
('Aguila', 'AA13', 'AA', 300, 75, 200, 25),
('Aguila', 'AA17', 'AA', 300, 75, 200, 25),
('Aguilucho', 'BA8', 'BA', 60, 50, 0, 10),
('Aguilucho', 'BA9', 'BA', 60, 50, 0, 10),
('Aguilucho', 'BA10', 'BA', 60, 50, 0, 10),
('Aguilucho', 'BA11', 'BA', 60, 50, 0, 10),
('Aguilucho', 'BA12', 'BA', 60, 50, 0, 10),
('Calandria', 'O1', 'Orbital', 300, 75, 200, 25),
('Calandria', 'O2', 'Orbital', 300, 75, 200, 25),
('Calandria', 'O6', 'Orbital', 300, 75, 200, 25),
('Calandria', 'O7', 'Orbital', 300, 75, 200, 25),
('Canario', 'BA13', 'BA', 80, 70, 0, 10),
('Canario', 'BA14', 'BA', 80, 70, 0, 10),
('Canario', 'BA15', 'BA', 80, 70, 0, 10),
('Canario', 'BA16', 'BA', 80, 70, 0, 10),
('Canario', 'BA17', 'BA', 80, 70, 0, 10),
('Carancho', 'BA4', 'BA', 110, 0, 110, 0),
('Carancho', 'BA5', 'BA', 110, 0, 110, 0),
('Carancho', 'BA6', 'BA', 110, 0, 110, 0),
('Carancho', 'BA7', 'BA', 110, 0, 110, 0),
('Colibri', 'O3', 'Orbital', 120, 18, 100, 2),
('Colibri', 'O4', 'Orbital', 120, 18, 100, 2),
('Colibri', 'O5', 'Orbital', 120, 18, 100, 2),
('Colibri', 'O8', 'Orbital', 120, 18, 100, 2),
('Colibri', 'O9', 'Orbital', 120, 18, 100, 2),
('Condor', 'AA2', 'AA', 350, 10, 300, 40),
('Condor', 'AA6', 'AA', 350, 10, 300, 40),
('Condor', 'AA10', 'AA', 350, 10, 300, 40),
('Condor', 'AA14', 'AA', 350, 10, 300, 40),
('Condor', 'AA18', 'AA', 350, 10, 300, 40),
('Guanaco', 'AA4', 'AA', 100, 0, 0, 100),
('Guanaco', 'AA8', 'AA', 100, 0, 0, 100),
('Guanaco', 'AA12', 'AA', 100, 0, 0, 100),
('Guanaco', 'AA16', 'AA', 100, 0, 0, 100),
('Halcon', 'AA3', 'AA', 200, 25, 150, 25),
('Halcon', 'AA7', 'AA', 200, 25, 150, 25),
('Halcon', 'AA11', 'AA', 200, 25, 150, 25),
('Halcon', 'AA15', 'AA', 200, 25, 150, 25),
('Halcon', 'AA19', 'AA', 200, 25, 150, 25),
('Zorzal', 'BA1', 'BA', 100, 50, 50, 0),
('Zorzal', 'BA2', 'BA', 100, 50, 50, 0),
('Zorzal', 'BA3', 'BA', 100, 50, 50, 0);
INSERT INTO ASIENTO (cod_equipo, cod_cabina, cod_estado ) values
(1,1,1),
(1,1,1),
(1,1,1),
(1,1,1),
(1,1,1),
(2,1,1),
(2,1,1),
(2,1,1),
(2,1,2),
(2,1,2),
(2,1,2);

INSERT INTO `vuelo` (`duracion`, `fecha`, `cod_equipo`, `cod_tipo_vuelo`,`cod_trayecto`,`cod_estado`) VALUES
(8, '2019-11-04', 1, 1,1,1),
(8, '2019-11-04', 3, 1,1,2),
(8, '2019-11-04', 2, 1,1,3),
(8, '2019-10-04', 4, 1,2,2),
(8, '2019-11-04', 5, 1,2,1);

insert into estado_reserva(descripcion)
values 
('pendiente de pago'),
('pagada'),
('check-in');
select * from reserva;
INSERT INTO `reserva` (`cod_usuario`,`cod_asiento`,`cod_cabina`,`cod_estado_reserva`,`cod_vuelo`,`cod_codigo_reserva`) VALUES
(1,2,1,1,1,'reserva4'),
(2,2,1,1,1,'reserva1'),
(3,3,1,1,1,'reserva1'),
(4,3,1,1,2,'reserva2'),
(1,2,1,2,2,'reserva2');

insert into vuelo_trayecto (cod_vuelo, cod_trayecto) values 
(1,2);




