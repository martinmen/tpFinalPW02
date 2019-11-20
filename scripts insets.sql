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

insert into `estado_usuario` (id_estado_usuario, descripcion) values
(1,'pendiente'),
(2, 'confirmado');

INSERT INTO `usuario` (id_usuario,`nombre`, `apellido`, `cod_tipo_doc`, `num_doc`, `email`, `contrasenia`, `cod_tipo_usuario`,`cod_estado_usuario`, `cod_nivel_vuelo`) VALUES
(1,'martin', '', 0, 0, 'mmendez@gmail.com', 123, 2,2, 0),
(2,'Mica', 'Vandoni', 1, 12345678, 'mica@gmail.com', 123, 2,2, 0),
(3,'Debora', 'Chamorro', 1, 35379016, 'debo@gmail.com', 123, 2,2, 0),
(4,'Juan', 'Perez', 1, 98745632, 'juan@gmail.com', 123, 2,2, 0);

INSERT INTO `tipo_vuelo` (`id_tipo_vuelo`, `descripcion`) VALUES
(1, 'Suborbitales'),
(2, 'Entre destinos/Orbitales'),
(3, 'Tour');


INSERT INTO `estacion` (`id_estacion`, `nombre`, cod_tipo_vuelo) VALUES
(1, 'Estacion Espacial Internacional',2),
(2, 'Orbitel Hotel', 2),
(3, 'Luna', 2),
(4, 'Marte', 2),
(5, 'Ganimedes', 2),
(6, 'Europa',2),
(7, 'Io',2),
(8, 'Encendalo',2),
(9, 'Titan',2),
(10, 'Buenos Aires',1),
(11, 'Ankara',1),
(12, 'Shangai',1);

INSERT INTO `trayecto` (id_trayecto, `cod_estacion_origen`, `cod_estacion_destino`) VALUES 
(1,1,2), -- EEI a Orbitel Hotel / 1hora
(2,1,3),  -- EEI a Luna / 17horas
(3,1,4), -- EEI a Marte / 43 horas 
(4,10,1), -- Bs As a EEI  / 4horas
(5,10,2), -- Bs as a Orbitel Hotel / 5hs
(6,10,3), -- Buenos Aires a Luna / 21hs 
(7,10,4), -- BA a Marte / 47 
(8,11,1),  -- AK a EEi / 4hs
(9,11,2), -- AK a Orbitael Hotel / 5hs
(10,11,3), -- AK a Luna / 21
(11,11,4),  -- AK a Marte / 47 
(12,2,21), 
(13,2,4), 
(14,2,5), 
(15,2,6), 
(16,2,7), 
(17,2,8), 
(18,2,9),
(19,3,1), 
(20,3,2),
(21,3,3), 
(22,3,4), 
(23,3,5), 
(24,3,6), 
(25,3,7), 
(26,3,8), 
(27,3,9),
(28,4,1),
(29,4,2),
(30,4,3),
(31,4,4),
(32,4,5),
(33,4,6),
(34,4,7),
(35,4,8),
(36,4,9),
(37,5,1),
(38,5,2),
(39,5,3),
(40,5,4),
(41,5,5),
(42,5,6),
(43,5,7),
(44,5,8),
(45,5,9),
(46,6,1),
(47,6,2),
(48,6,3),
(49,6,4),
(50,6,5),
(51,6,6),
(52,6,7),
(53,6,8),
(54,6,9),
(55,7,1),
(56,7,2),
(57,7,3),
(58,7,4),
(59,7,5),
(60,7,6),
(61,7,7),
(62,7,8),
(63,7,9),
(64,8,1),
(65,8,2),
(66,8,3),
(67,8,4),
(68,8,5),
(69,8,6),
(70,8,7),
(71,8,8),
(72,8,9),
(73,9,1),
(74,9,2),
(75,9,3),
(76,9,4),
(77,9,5),
(78,9,6),
(79,9,7),
(80,9,8),
(81,9,9); 

INSERT INTO `centro_medico` (`id_centro_medico`, `descripcion`, `turnos_diarios`) VALUES
(1, 'buenos aires', 300),
(2, 'shanghai', 210),
(3, 'Ankara', 200);


INSERT INTO `equipo` (id_equipo, `modelo`, `matricula`, `cod_tipo_equipo`, `capacidad_total`, `capacidad_cabinaF`, `capacidad_cabinaG`, `capacidad_cabinaS`) VALUES
(1,'Aguila', 'AA1', 'AA', 300, 75, 200, 25),
(2,'Aguila', 'AA1', 'AA', 300, 75, 200, 25),
(3,'Aguila', 'AA5', 'AA', 300, 75, 200, 25),
(4,'Aguila', 'AA9', 'AA', 300, 75, 200, 25),
(5,'Aguila', 'AA13', 'AA', 300, 75, 200, 25),
(6,'Aguila', 'AA17', 'AA', 300, 75, 200, 25),
(7,'Aguilucho', 'BA8', 'BA', 60, 50, 0, 10),
(8,'Aguilucho', 'BA9', 'BA', 60, 50, 0, 10),
(9,'Aguilucho', 'BA10', 'BA', 60, 50, 0, 10),
(10,'Aguilucho', 'BA11', 'BA', 60, 50, 0, 10),
(11,'Aguilucho', 'BA12', 'BA', 60, 50, 0, 10),
(12,'Calandria', 'O1', 'Orbital', 300, 75, 200, 25),
(13,'Calandria', 'O2', 'Orbital', 300, 75, 200, 25),
(14,'Calandria', 'O6', 'Orbital', 300, 75, 200, 25),
(15,'Calandria', 'O7', 'Orbital', 300, 75, 200, 25),
(16,'Canario', 'BA13', 'BA', 80, 70, 0, 10),
(17,'Canario', 'BA14', 'BA', 80, 70, 0, 10),
(18,'Canario', 'BA15', 'BA', 80, 70, 0, 10),
(19,'Canario', 'BA16', 'BA', 80, 70, 0, 10),
(20,'Canario', 'BA17', 'BA', 80, 70, 0, 10),
(21,'Carancho', 'BA4', 'BA', 110, 0, 110, 0),
(22,'Carancho', 'BA5', 'BA', 110, 0, 110, 0),
(23,'Carancho', 'BA6', 'BA', 110, 0, 110, 0),
(24,'Carancho', 'BA7', 'BA', 110, 0, 110, 0),
(25,'Colibri', 'O3', 'Orbital', 120, 18, 100, 2),
(26,'Colibri', 'O4', 'Orbital', 120, 18, 100, 2),
(27,'Colibri', 'O5', 'Orbital', 120, 18, 100, 2),
(28,'Colibri', 'O8', 'Orbital', 120, 18, 100, 2),
(29,'Colibri', 'O9', 'Orbital', 120, 18, 100, 2),
(30,'Condor', 'AA2', 'AA', 350, 10, 300, 40),
(31,'Condor', 'AA6', 'AA', 350, 10, 300, 40),
(32,'Condor', 'AA10', 'AA', 350, 10, 300, 40),
(33,'Condor', 'AA14', 'AA', 350, 10, 300, 40),
(34,'Condor', 'AA18', 'AA', 350, 10, 300, 40),
(35,'Guanaco', 'AA4', 'AA', 100, 0, 0, 100),
(36,'Guanaco', 'AA8', 'AA', 100, 0, 0, 100),
(37,'Guanaco', 'AA12', 'AA', 100, 0, 0, 100),
(38,'Guanaco', 'AA16', 'AA', 100, 0, 0, 100),
(39,'Halcon', 'AA3', 'AA', 200, 25, 150, 25),
(40,'Halcon', 'AA7', 'AA', 200, 25, 150, 25),
(41,'Halcon', 'AA11', 'AA', 200, 25, 150, 25),
(42,'Halcon', 'AA15', 'AA', 200, 25, 150, 25),
(43,'Halcon', 'AA19', 'AA', 200, 25, 150, 25),
(44,'Zorzal', 'BA1', 'BA', 100, 50, 50, 0),
(45,'Zorzal', 'BA2', 'BA', 100, 50, 50, 0),
(46,'Zorzal', 'BA3', 'BA', 100, 50, 50, 0);

INSERT INTO `ASIENTO` (cod_equipo, cod_cabina, cod_estado ) values
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

INSERT INTO `vuelo` (id_vuelo,`duracion`, `fecha`, `cod_equipo`, `cod_tipo_vuelo`,`cod_trayecto`,`cod_estado`) VALUES
(1,8, '2019-11-04', 1, 1,1,1),
(2,8, '2019-11-04', 3, 1,1,2),
(3,8, '2019-11-04', 2, 1,1,3),
(4,8, '2019-10-04', 4, 1,2,2),
(5,8, '2019-11-04', 5, 1,2,1);

insert into `estado_reserva`(id_estado_reserva,descripcion)
values 
(1,'pendiente de pago'),
(2,'pagada'),
(3,'check-in'),
(4,'vencida');


        
--  insert into `vuelo_trayecto` (cod_vuelo, cod_trayecto) values 
-- (1,2);

insert into `reserva`(id_reserva,cod_usuario, cod_cabina, cod_asiento, cod_vuelo, importe, cod_estado_reserva, cod_codigo_reserva, fecha_alta_reserva, fecha_baja_reserva, fecha_modificacion_reserva)
			values(1,2, 1, 5, 1, 15000.00, 2, '9DICJA', now(), null, null); 


