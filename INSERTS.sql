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
(2, 'Orbital/Circuito 1'),
(3, 'Orbital/Circuito 2'),
(4, 'Tour');


INSERT INTO `estacion` (`id_estacion`, `nombre`, cod_tipo_vuelo) VALUES
(1, 'Estacion Espacial Internacional',2),
(2, 'Orbitel Hotel', 2),
(3, 'Luna', 2),
(4, 'Marte', 2),
(5, 'Ganimedes', 3),
(6, 'Europa',3),
(7, 'Io',3),
(8, 'Encendalo',3),
(9, 'Titan',3),
(10, 'Buenos Aires',1),
(11, 'Ankara',1),
(12, 'Shangai',1);

INSERT INTO `trayecto` (id_trayecto, `cod_estacion_origen`, `cod_estacion_destino`) VALUES 
-- SubOrbitales
(1,10,11), -- BA - Ankara
(2,10,12), -- BA - Shangai
(3,11,10), -- Ankara - BA
(4,11,12), -- Ankara - Shangai
(5,12,10), -- Shangai - BA
(6,12,11), -- Shangai - Ankara
-- Cod_Tipo_Vuelo:2 Orbitales/Circuito 1
(7,1,2), -- EEI - Orbital Hotel
(8,1,3), -- EEI - Luna
(9,1,4), -- EEI - Marte
--
(10,2,1), -- Orbital Hotel - EEI 
(11,2,3), -- Orbital Hotel - Luna
(12,2,4), -- Orbital Hotel - Marte
--
(13,3,1), -- Luna - EEI 
(14,3,2), -- Luna -  Orbital Hotel
(15,3,4), -- Luna - Marte
--
(16,4,1), -- Marte - EEI 
(17,4,2), -- Marte -  Orbital Hotel
(18,4,3), -- Marte - Luna

--  Cod_Tipo_Vuelo:3 Orbital/Circuit2 Cod_Tipo_Vuelo:4 Tour
(19,1,3), -- EEI - Luna ----------Ida-------------
(20,1,5), -- EEI - Ganimedes
(21,1,6), -- EEI - Europa
(22,1,7), -- EEI - IO
(23,1,8), -- EEI - Encendalo
(24,1,9), -- EEI - Titan
--
(25,3,1), -- Luna - EII ------Vuelta----------
(26,3,5), -- Luna - Ganimedes ----------Ida-------------
(27,3,6), -- Luna - Europa
(28,3,7), -- Luna - IO
(29,3,8), -- Luna - Encendalo
(30,3,9), -- Luna - Titan
--
(31,5,1), -- Ganimedes - EII
(32,5,3), -- Ganimedes - Lunas -----------Vuelta------------------
(33,5,6), -- Ganimedes - Europa  ----------Ida-------------
(34,5,7), -- Ganimedes - IO
(35,5,8), -- Ganimedes - Encendalo
(36,5,9), -- Ganimedes - Titan
--
(37,6,1), -- Europa - EII
(38,6,3), -- Europa - Lunas
(39,6,5), -- Europa - Ganimedes ------------Vuelta--------------
(40,6,7), -- Europa - IO ----------Ida-------------
(41,6,8), -- Europa - Encendalo
(42,6,9), -- Europa - Titan
--
(43,7,1), -- IO - EII
(44,7,3), -- IO - Lunas
(45,7,5), -- IO - Ganimedes
(46,7,6), -- IO - Europa -----------Vuelta-----------------
(47,7,8), -- IO - Encendalo ----------Ida-------------
(48,7,9), -- IO - Titan
--
(49,8,1), -- Encendalo - EII
(50,8,3), -- Encendalo - Lunas
(51,8,5), -- Encendalo - Ganimedes
(52,8,6), -- Encendalo - Europa
(53,8,7), -- Encendalo - IO -----------Vuelta------------------
(54,8,9), -- Encendalo - Titan ----------Ida-------------
--
(55,9,1), -- Titan - EII
(56,9,3), -- Titan - Lunas
(57,9,5), -- Titan - Ganimedes
(58,9,6), -- Titan - Europa
(59,9,7), -- Titan - IO
(60,9,8), -- Titan - Encendalo -----------Vuelta------------------
-- Partidas Orbitales IDA y VUELTA
(61,10,1), -- BA - EEI ----------Ida-------------
(62,11,1), -- Ankara - EEI ----------Ida-------------
(63,1,10), -- EEI - BA ----------Vuelta-------------
(64,1,11); -- EEI - Ankara ----------Vuelta-------------


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


INSERT INTO `ASIENTO` (id_asiento, cod_equipo, cod_cabina, cant_asientos ) values
-- general: 1 , familiar: 2, suite: 3 

-- EQUIPO 12
(1,12,1,200),
(2,12,2,75),
(3,12,3,25),

-- eQUIPO 13
(4,13,1,200),
(5,13,2,75),
(6,13,3,25),
-- eQUIPO 14
(7,14,1,200),
(8,14,2,75),
(9,14,3,25),
-- eQUIPO 25
(10,25,1,100),
(11,25,2,18),
(12,25,3,2),
-- eQUIPO 26
(13,26,1,100),
(14,26,2,18),
(15,26,3,2),
-- eQUIPO 27
(16,27,1,100),
(17,27,2,18),
(18,27,3,2),
-- eQUIPO 28
(19,28,1,100),
(20,28,2,18),
(21,28,3,2),
-- eQUIPO 29
(22,29,1,100),
(23,29,2,18),
(24,29,3,2),
-- eQUIPO 7
(25,7,1,0),
(26,7,2,50),
(27,7,3,10),
-- eQUIPO 16
(28,16,1,0),
(29,16,2,70),
(30,16,3,10),

-- eQUIPO 45
(31,45,1,50),
(32,45,2,50),
(33,45,3,0),
-- eQUIPO 1
(34,1,1,200),
(35,1,2,75),
(36,1,3,25),
-- eQUIPO 30
(37,30,1,300),
(38,30,2,10),
(39,30,3,40),
-- eQUIPO 41
(40,41,1,150),
(41,41,2,25),
(42,41,3,25),
-- eQUIPO 22
(43,22,1,110),
(44,22,2,0),
(45,22,3,0),

-- eQUIPO 10
(46,10,1,0),
(47,10,2,50),
(48,10,3,10),

-- eQUIPO 32
(49,32,1,300),
(50,32,2,10),
(51,32,3,40),

-- eQUIPO 5
(52,5,1,200),
(53,5,2,75),
(54,5,3,25);



INSERT INTO VUELO (id_vuelo, duracion, fecha, cod_equipo, cod_tipo_vuelo, cod_trayecto, costo)
			-- VUELOS SUBORBITALES
		   VALUES -- DIA LUNES 
		   		  (1 , 8 , '2019-12-09 08:00:00', 12, 1,1,100.00), -- CALANDRIA // BA-AK
		   		  (2 , 8 , '2019-12-09 16:00:00', 13, 1,1,100.00), -- CALANDRIA // BA-AK
		   		  (3 , 8 , '2019-12-09 00:00:00', 14, 1,3,100.00), -- CALANDRIA // AK-BS
		   		  (4 , 8 , '2019-12-09 12:00:00', 25, 1,1,100.00), -- COLIBRI // BA-AK
		   		  (5 , 8 , '2019-12-09 20:00:00', 26, 1,3,100.00), -- COLIBRI // AK-BS
		   		  -- DIA MA'RTES'
		   		  (6 , 8 , '2019-12-10 08:00:00', 15, 1,1,100.00), -- CALANDRIA // BA-AK
		   		  (7 , 8 , '2019-12-10 16:00:00', 27, 1,3,100.00), -- COLIBRI // AK-BS
		   		  (8 , 8 , '2019-12-10 00:00:00', 28, 1,3,100.00), -- COLIBRI //AK-BS
		   		  (9 , 8 , '2019-12-10 12:00:00', 29, 1,1,100.00), -- COLIBRI // BA-AK
		   		  (10, 8 , '2019-12-10 20:00:00', 12, 1,1,100.00), -- CALANDRIA // BA-AK
		   		  -- DIA MI'ERCOLES'
		   		  (11, 8 , '2019-12-11 08:00:00', 13, 1,3,100.00), -- CALANDRIA // AK-BA
		   		  (12, 8 , '2019-12-11 16:00:00', 14, 1,1,100.00), -- CALANDRIA // BA-AK
		   		  (13, 8 , '2019-12-11 00:00:00', 15, 1,3,100.00), -- CALANDRIA // AK-BA
		   		  (14, 8 , '2019-12-11 12:00:00', 25, 1,1,100.00), -- COLIBRI // BA-AK
		   		  (15, 8 , '2019-12-11 20:00:00', 26, 1,1,100.00), -- COLIBRI // BA-AK
		   		  -- DIA JU'EVES'
		   		  (16, 8 , '2019-12-12 08:00:00', 27, 1,3,100.00), -- COLIBRI // AK-BA
		   		  (17, 8 , '2019-12-12 16:00:00', 28, 1,1,100.00), -- COLIBRI // BA-AK
		   		  (18, 8 , '2019-12-12 00:00:00', 29, 1,3,100.00), -- COLIBRI // AK-BA
		   		  (19, 8 , '2019-12-12 12:00:00', 12, 1,1,100.00), -- CALANDRIA // BA-AK
		   		  (20, 8 , '2019-12-12 20:00:00', 13, 1,1,100.00), -- CALANDRIA // BA-AK
		   		  -- DIA VI'ERNES'
		   		  (21, 8 , '2019-12-13 08:00:00', 14, 1,1,100.00), -- CALANDRIA // BA-AK
		   		  (22, 8 , '2019-12-13 16:00:00', 25, 1,3,100.00), -- COLIBRI // AK-BS
		   		  (23, 8 , '2019-12-13 00:00:00', 26, 1,3,100.00), -- COLIBRI //AK-BS
		   		  (24, 8 , '2019-12-13 12:00:00', 27, 1,1,100.00), -- COLIBRI // BA-AK
		   		  (25, 8 , '2019-12-13 20:00:00', 15, 1,1,100.00), -- CALANDRIA // BA-AK
		   		  -- DIA SA'BADO'
		   		  (26, 8 , '2019-12-14 02:00:00', 12, 1,1,150.00), -- CALANDRIA // BA-AK
		   		  (27, 8 , '2019-12-14 10:00:00', 13, 1,1,150.00), -- CALANDRIA // BA-AK
		   		  (28, 8 , '2019-12-14 18:00:00', 14, 1,1,150.00), -- CALANDRIA // BA-AK
		   		  (29, 8 , '2019-12-14 00:00:00', 15, 1,1,150.00), -- CALANDRIA // BA-AK
		   		  (30, 8 , '2019-12-14 00:00:00', 25, 1,3,150.00), -- COLIBRI // AK-BA
		   		  (31, 8 , '2019-12-14 08:00:00', 26, 1,3,150.00), -- COLIBRI // AK-BA
		   		  (32, 8 , '2019-12-14 16:00:00', 27, 1,3,150.00), -- COLIBRI // AK-BA
		   		  (33, 8 , '2019-12-14 00:00:00', 28, 1,3,150.00), -- COLIBRI // AK-BA
		   		  -- DIA DO'MINGO'
		   		  (34, 8 , '2019-12-15 00:00:00', 12, 1,3,150.00), -- CALANDRIA // AK-BA
		   		  (35, 8 , '2019-12-15 08:00:00', 13, 1,3,150.00), -- CALANDRIA // AK-BA
		   		  (36, 8 , '2019-12-15 08:30:00', 14, 1,3,150.00), -- CALANDRIA // AK-BA
		   		  (37, 8 , '2019-12-15 16:00:00', 15, 1,3,150.00), -- CALANDRIA // AK-BA
		   		  (38, 8 , '2019-12-15 00:00:00', 12, 1,3,150.00), -- CALANDRIA // AK-BA
		   		  (39, 8 , '2019-12-15 00:00:00', 25, 1,1,150.00), -- COLIBRI // BA-AK
		   		  (40, 8 , '2019-12-15 08:00:00', 26, 1,1,150.00), -- COLIBRI // BA-AK
		   		  (41, 8 , '2019-12-15 08:30:00', 27, 1,1,150.00), -- COLIBRI // BA-AK
		   		  (42, 8 , '2019-12-15 16:00:00', 28, 1,1,150.00), -- COLIBRI // BA-AK
		   		  (43, 8 , '2019-12-15 00:00:00', 29, 1,1,150.00), -- COLIBRI // BA-AK
			-- VUELOS ORBIT'ALES/CIRCUITO 1'
				  (44, 4 , '2019-12-16 00:00:00', 7, 2,61,400.00), -- AGILUCHO //BA-EEI
		   		  (45, 1 , '2019-12-16 04:00:00', 7, 2,7,100.00), -- AGILUCHO // EEI-OH
		   		  (46, 16, '2019-12-16 05:00:00', 7, 2,11,1600.00), -- AGILUCHO // OH-LUNA
		   		  (47, 26, '2019-12-16 21:00:00', 7, 2,15,2600.00), -- AGILUCHO // LUNA-MARTE
		   		  -- VUELTA' BajaAceleracion '
		   		  (48, 26, '2019-12-17 23:00:00', 7, 2,18,2600.00), -- AGILUCHO // MARTE-LUNA
		   		  (49, 16, '2019-12-19 01:00:00', 7, 2,14,1600.00), -- AGILUCHO // LUNA-OH
		   		  (50, 1 , '2019-12-19 02:00:00', 7, 2,10,100.00), -- AGILUCHO // OH-EEI
		   		  (51, 4 , '2019-12-19 06:00:00', 7, 2,63,400.00), -- AGILUCHO // EEI-BA

		   		  -- IDA Ba'jaAceleracion'
		   		  (52, 4 , '2019-12-20 00:00:00', 16, 2,61,400.00), -- CANARIO //BA-EEI
		   		  (53, 1 , '2019-12-20 04:00:00', 16, 2,7,100.00), -- CANARIO // EEI-OH
		   		  (54, 16, '2019-12-20 05:00:00', 16, 2,11,1600.00), -- CANARIO // OH-LUNA
		   		  (55, 26, '2019-12-20 21:00:00', 16, 2,15,2600.00), -- CANARIO // LUNA-MARTE
		   		  -- VUELTA' BajaAceleracion '
		   		  (56, 26, '2019-12-21 23:00:00', 16, 2,18,2600.00), -- CANARIO // MARTE-LUNA
		   		  (57, 16, '2019-12-23 01:00:00', 16, 2,14,1600.00), -- CANARIO // LUNA-OH
		   		  (58, 1 , '2019-12-23 02:00:00', 16, 2,10,100.00), -- CANARIO // OH-EEI
		   		  (59, 4 , '2019-12-23 06:00:00', 16, 2,63,400.00), -- CANARIO // EEI-BA

		   		  -- IDA Ba'jaAceleracion'
		   		  (60, 4 , '2019-12-24 00:00:00', 45, 2,61,400.00), -- ZORZAL //BA-EEI
		   		  (61, 1 , '2019-12-24 04:00:00', 45, 2,7,100.00), -- ZORZAL // EEI-OH
		   		  (62, 16, '2019-12-24 05:00:00', 45, 2,11,1600.00), -- ZORZAL // OH-LUNA
		   		  (63, 26, '2019-12-24 21:00:00', 45, 2,15,2600.00), -- ZORZAL // LUNA-MARTE
		   		  -- VUELTA' BajaAceleracion '
		   		  (65, 26, '2019-12-25 23:00:00', 45, 2,18,2600.00), -- ZORZAL // MARTE-LUNA
		   		  (66, 16, '2019-12-27 01:00:00', 45, 2,14,1600.00), -- ZORZAL // LUNA-OH
		   		  (67, 1 , '2019-12-27 02:00:00', 45, 2,10,100.00), -- ZORZAL // OH-EEI
		   		  (68, 4 , '2019-12-27 06:00:00', 45, 2,63,400.00), -- ZORZAL // EEI-BA

		   		  -- IDA AL'TA ACELERACION '
		   		  (69, 3 , '2019-12-16 00:00:00', 1, 2,62,600.00), -- AGUILA //AK-EEI
		   		  (70, 1 , '2019-12-16 03:00:00', 1, 2,7,200.00), -- AGUILA // EEI-OH
		   		  (71, 9 , '2019-12-16 04:00:00', 1, 2,11,1800.00), -- AGUILA // OH-LUNA
		   		  (72, 22, '2019-12-16 13:00:00', 1, 2,15,4400.00), -- AGUILA // LUNA-MARTE
		   		  -- VUELTA' ALTA ACELERACION  '
		   		  (73, 22, '2019-12-17 11:00:00', 1, 2,18,4400.00), -- AGUILA // MARTE-LUNA
		   		  (74, 9 , '2019-12-18 09:00:00', 1, 2,14,1800.00), -- AGUILA // LUNA-OH
		   		  (75, 1 , '2019-12-18 18:00:00', 1, 2,10,200.00), -- AGUILA // OH-EEI
		   		  (76, 3 , '2019-12-18 19:00:00', 1, 2,64,600.00), -- AGUILA // EEI-AK
		   		  -- IDA AL'TA ACELERACION '
		   		  (77, 3 , '2019-12-20 00:00:00', 30, 2,62,600.00), -- CONDOR //AK-EEI
		   		  (78, 1 , '2019-12-20 03:00:00', 30, 2,7,200.00), -- CONDOR // EEI-OH
		   		  (79, 9 , '2019-12-20 04:00:00', 30, 2,11,1800.00), -- CONDOR // OH-LUNA
		   		  (80, 22, '2019-12-20 13:00:00', 30, 2,15,4400.00), -- CONDOR // LUNA-MARTE
		   		  -- VUELTA' ALTA ACELERACION  '
		   		  (81, 22, '2019-12-21 11:00:00', 30, 2,18,4400.00), -- CONDOR // MARTE-LUNA
		   		  (82, 9 , '2019-12-22 09:00:00', 30, 2,14,1800.00), -- CONDOR // LUNA-OH
		   		  (83, 1 , '2019-12-22 18:00:00', 30, 2,10,200.00), -- CONDOR // OH-EEI
		   		  (84, 3 , '2019-12-22 19:00:00', 30, 2,64,600.00), -- CONDOR // EEI-AK

		   		  -- IDA AL'TA ACELERACION '
		   		  (85, 3 , '2019-12-24 00:00:00', 41, 2,62,600.00), -- HALCON //AK-EEI
		   		  (86, 1 , '2019-12-24 03:00:00', 41, 2,7,200.00), -- HALCON // EEI-OH
		   		  (87, 9 , '2019-12-24 04:00:00', 41, 2,11,1800.00), -- HALCON // OH-LUNA
		   		  (88, 22, '2019-12-24 13:00:00', 41, 2,15,4400.00), -- HALCON // LUNA-MARTE
		   		  -- VUELTA' ALTA ACELERACION  '
		   		  (89, 22, '2019-12-25 11:00:00', 41, 2,18,4400.00), -- HALCON // MARTE-LUNA
		   		  (90, 9 , '2019-12-26 09:00:00', 41, 2,14,1800.00), -- HALCON // LUNA-OH
		   		  (91, 1 , '2019-12-26 18:00:00', 41, 2,10,200.00), -- HALCON // OH-EEI
		   		  (92, 3 , '2019-12-26 19:00:00', 41, 2,64,600.00), -- HALCON // EEI-AK
				-- VUELOS O'RBITALES/CIRCUITO 2'
                  -- IDA Ba'jaAceleracion'
		   		  (93, 4 , '2019-12-16 00:00:00', 22, 3,61,400.00), -- CARANCHO //BA-EEI
		   		  (94, 14, '2019-12-16 04:00:00', 22, 3,19,1400.00), -- CARANCHO // EEI-LUNA
		   		  (95, 48, '2019-12-16 18:00:00', 22, 3,26,4800.00), -- CARANCHO // LUNA-GANIMEDES
		   		  (96, 50, '2019-12-18 18:00:00', 22, 3,33,5000.00), -- CARANCHO // GANIMEDES-EUROPA
		   		  (97, 51, '2019-12-20 20:00:00', 22, 3,40,5100.00), -- CARANCHO // EUROPA-IO
		   		  (98, 70, '2019-12-22 21:00:00', 22, 3,47,7000.00), -- CARANCHO // IO-ENCENDALO
		   		  (99, 77, '2019-12-24 23:00:00', 22, 3,54,7700.00), -- CARANCHO // ENCENDALO-TITAN

		   		  -- VUELTA' BajaAceleracion'
		   		  (100, 77, '2019-12-28 03:00:00', 22, 3,60,7700.00), -- CARANCHO // TITAN-ENCENDALO
		   		  (101, 70, '2019-12-31 08:00:00', 22, 3,53,7000.00), -- CARANCHO // ENCENDALO-IO
		   		  (102, 51, '2019-01-02 10:00:00', 22, 3,46,5100.00), -- CARANCHO // IO-EUROPA
		   		  (103, 50, '2019-01-04 13:00:00', 22, 3,39,5000.00), -- CARANCHO // EUROPA-GANIMEDES
		   		  (104, 48, '2019-01-06 05:00:00', 22, 3,32,4800.00), -- CARANCHO // GANIMEDES-LUNA
		   		  (105, 14, '2019-01-08 05:00:00', 22, 3,25,1400.00), -- CARANCHO // LUNA-EEI
		   		  (106, 4 , '2019-01-08 19:00:00', 22, 3,63,400.00), -- CARANCHO // EEI-BA

		   		  -- IDA Ba'jaAceleracion'
		   		  (107, 4 , '2019-12-20 00:00:00', 10, 3,61,400.00), -- AGUILUCHO //BA-EEI
		   		  (108, 14, '2019-12-20 04:00:00', 10, 3,19,1400.00), -- AGUILUCHO // EEI-LUNA
		   		  (109, 48, '2019-12-20 18:00:00', 10, 3,26,4800.00), -- AGUILUCHO // LUNA-GANIMEDES
		   		  (110, 50,' 2019-12-22 18:00:00', 10, 3,33,5000.00), -- AGUILUCHO // GANIMEDES-EUROPA
		   		  (111, 51,' 2019-12-24 20:00:00', 10, 3,40,5100.00), -- AGUILUCHO // EUROPA-IO
		   		  (112, 70,' 2019-12-26 21:00:00', 10, 3,47,7000.00), -- AGUILUCHO // IO-ENCENDALO
		   		  (113, 77,' 2019-12-28 23:00:00', 10, 3,54,7700.00), -- AGUILUCHO // ENCENDALO-TITAN

		   		  -- VUELTA' BajaAceleracion'
		   		  (114, 77,' 2019-01-01 03:00:00', 10, 3,60,7700.00), -- AGUILUCHO // TITAN-ENCENDALO
		   		  (115, 70,' 2019-01-04 08:00:00', 10, 3,53,7000.00), -- AGUILUCHO // ENCENDALO-IO
		   		  (116, 51,' 2019-01-06 10:00:00', 10, 3,46,5100.00), -- AGUILUCHO // IO-EUROPA
		   		  (117, 50,' 2019-01-08 13:00:00', 10, 3,39,5000.00), -- AGUILUCHO // EUROPA-GANIMEDES
		   		  (118, 48,' 2019-01-10 05:00:00', 10, 3,32,4800.00), -- AGUILUCHO // GANIMEDES-LUNA
		   		  (119, 14,' 2019-01-12 05:00:00', 10, 3,25,1400.00), -- AGUILUCHO // LUNA-EEI
		   		  (120, 4 ,' 2019-01-12 19:00:00', 10, 3,63,400.00), -- AGUILUCHO // EEI-BA

		   		 
		   		  -- IDA AL'TA ACELERACION '
		   		  (121, 3 ,' 2019-12-16 00:00:00', 32, 3,62,600.00), -- CONDOR //AK-EEI
		   		  (122, 10,' 2019-12-16 03:00:00', 32, 3,19,2000.00), -- CONDOR // EEI-LUNA
		   		  (123, 32,' 2019-12-16 13:00:00', 32, 3,26,6400.00), -- CONDOR // LUNA-GANIMEDES
		   		  (124, 33,' 2019-12-17 21:00:00', 32, 3,33,6600.00), -- CONDOR // GANIMEDES-EUROPA
		   		  (125, 35,' 2019-12-19 06:00:00', 32, 3,40,7000.00), -- CONDOR //	EUROPA-IO
		   		  (126, 50,' 2019-12-21 14:00:00', 32, 3,47,10000.00), -- CONDOR // IO- ENCENDALO
		   		  (127, 52,' 2019-12-22 05:00:00', 32, 3,54,10400.00), -- CONDOR // ENCENDALO-TITAN

		   		  -- VUELTA' ALTA ACELERACION'
		   		  (128, 52,' 2019-12-24 09:00:00', 32, 3, 60,10400.00), -- CONDOR // TITAN-ENCENDALO
		   		  (129, 50,' 2019-12-26 13:00:00', 32, 3, 53,10000.00), -- CONDOR // ENCENDALO-IO
		   		  (130, 35,' 2019-12-27 15:00:00', 32, 3, 46,7000.00), -- CONDOR // IO-EUROPA
		   		  (131, 33,' 2019-12-29 02:00:00', 32, 3, 39,6600.00), -- CONDOR // EUROPA-GANIMEDES
		   		  (132, 32,' 2019-12-30 11:00:00', 32, 3, 32,6400.00), -- CONDOR // GANIMEDES-LUNA
		   		  (133, 10,' 2019-12-31 17:00:00', 32, 3, 25,2000.00), -- CONDOR // LUNA- EEI
		   		  (134, 3 ,' 2019-01-01 03:00:00', 32, 3, 64,600.00), -- CONDOR // EEI-AK

		   		  -- IDA AL'TA ACELERACION '
		   		  (135, 3 ,' 2019-12-20 00:00:00', 5, 3,62,600.00), -- AGUILA //AK-EEI
		   		  (136, 10,' 2019-12-20 03:00:00', 5, 3,19,2000.00), -- AGUILA // EEI-LUNA
		   		  (137, 32,' 2019-12-20 13:00:00', 5, 3,26,6400.00), -- AGUILA // LUNA-GANIMEDES
		   		  (138, 33,' 2019-12-21 21:00:00', 5, 3,33,6600.00), -- AGUILA // GANIMEDES-EUROPA
		   		  (139, 35,' 2019-12-23 06:00:00', 5, 3,40,7000.00), -- AGUILA //	EUROPA-IO
		   		  (140, 50,' 2019-12-25 14:00:00', 5, 3,47,10000.00), -- AGUILA // IO- ENCENDALO
		   		  (141, 52,' 2019-12-26 05:00:00', 5, 3,54,10400.00), -- AGUILA // ENCENDALO-TITAN

		   		  -- VUELTA' ALTA ACELERACION'
		   		  (142, 52,' 2019-12-28 09:00:00', 5, 3, 60,10400.00), -- AGUILA // TITAN-ENCENDALO
		   		  (143, 50,' 2019-12-30 13:00:00', 5, 3, 53,10000.00), -- AGUILA // ENCENDALO-IO
		   		  (144, 35,' 2019-12-31 15:00:00', 5, 3, 46,7000.00), -- AGUILA // IO-EUROPA
		   		  (145, 33,' 2019-01-02 02:00:00', 5, 3, 39,6600.00), -- AGUILA // EUROPA-GANIMEDES
		   		  (146, 32,' 2019-01-03 11:00:00', 5, 3, 32,6400.00), -- AGUILA // GANIMEDES-LUNA
		   		  (147, 10,' 2019-01-04 17:00:00', 5, 3, 25,2000.00), -- AGUILA // LUNA- EEI
		   		  (148, 3 ,' 2019-01-05 03:00:00', 5, 3, 64,600.00); -- AGUILA // EEI-AK

                  
                  
                  
                  
insert into `estado_reserva`(id_estado_reserva,descripcion)
values 
(1,'pendiente de pago'),
(2,'pagada'),
(3,'check-in'),
(4,'vencida');


        
--  insert into `vuelo_trayecto` (cod_vuelo, cod_trayecto) values 
-- (1,2);

insert into `reserva`(id_reserva,cod_usuario, cod_vuelo, importe, cod_estado_reserva, cod_codigo_reserva, fecha_alta_reserva, fecha_baja_reserva, fecha_modificacion_reserva)
			values(1,2, 1, 15000.00, 2, '9DICJA', now(), null, null); 


