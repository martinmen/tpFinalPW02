use tpfinal;
select * from usuario;     select * from asiento;
SELECT c.id_cabina, a.id_asiento, E.ID_EQUIPO, C.DESCRIPCION as descripcion, A.CANT_ASIENTOS
	FROM ASIENTO AS A 
		JOIN EQUIPO AS E ON E.ID_EQUIPO = A.COD_EQUIPO
        JOIN CABINA AS C ON C.ID_CABINA = A.COD_CABINA
        JOIN VUELO AS V ON V.COD_EQUIPO = E.ID_EQUIPO
       WHERE V.ID_VUELO = 46;
-- Disponibilidad de asientos en el vuelo por cabina
    -- dipobibilidad de asientos Generales (diferencia entre la capacidad del equipo asignado en el vuelo y la cantidad de reservas realizadas en la tabla reserva(por tipo cabina y cod_vuelo)
			-- disponibilidad asientos General
     select v.id_vuelo as vuelo,/* v.cod_equipo equipo,*/ asi.cod_cabina,  ((select e.capacidad_cabinaG as capacidad_equipo from vuelo v join equipo e on v.cod_equipo = e.id_equipo and id_vuelo = 1) - 
             (select count(*) as reservas_g from reserva r where r.cod_cabina = 1 and cod_vuelo= 48)) as 'disponibles general',
			-- disponibilidad asientos Familiar
                          ((select e.capacidad_cabinaF as capacidad_equipo from vuelo v join equipo e on v.cod_equipo = e.id_equipo and id_vuelo = 1)-
								 (select count(*) as reservas_f from reserva r where r.cod_cabina = 2 and cod_vuelo= 48)) as 'disponibles familiar',
			-- disponibilidad asientos Suit
             ((select e.capacidad_cabinaS as capacidad_equipo from vuelo v join equipo e on v.cod_equipo = e.id_equipo and id_vuelo = 1)-
					(select count(*) as reservas_s from reserva r where r.cod_cabina = 3 and cod_vuelo= 48))as 'disponibles suit'
                    from vuelo v join equipo equi join asiento asi  where id_vuelo = 48
                    and equi.id_equipo = v.cod_equipo
                    and equi.id_equipo = asi.cod_equipo
                    order by asi.cod_cabina; -- variable id_vuelo de la lista getTipoDeCaginas
                    -- ------------------------------------------------------------
    
select v.id_vuelo as vuelo, v.cod_equipo equipo, asi.cod_cabina, ((select e.capacidad_cabinaG as capacidad_equipo from vuelo v join equipo e on v.cod_equipo = e.id_equipo and id_vuelo = 1) - 
																(select count(*) as reservas_g from reserva r where r.cod_cabina = 1 and cod_vuelo= 48)) as 'disponibles general'
		from vuelo v join equipo equi join asiento asi 
			where id_vuelo = 48
            and asi.cod_cabina = 1
			and equi.id_equipo = v.cod_equipo
			and equi.id_equipo = asi.cod_equipo
							union
            -- disponibilidad asientos Familiar
	 select v.id_vuelo as vuelo, v.cod_equipo equipo, asi.cod_cabina,((select e.capacidad_cabinaF as capacidad_equipo from vuelo v join equipo e on v.cod_equipo = e.id_equipo and id_vuelo = 1)-
																	(select count(*) as reservas_f from reserva r where r.cod_cabina = 2 and cod_vuelo= 48)) as 'disponibles familiar'
	from vuelo v join equipo equi join asiento asi		
			where id_vuelo = 48
            and asi.cod_cabina = 2
			and equi.id_equipo = v.cod_equipo
			and equi.id_equipo = asi.cod_equipo
							union
            	-- disponibilidad asientos Suit
 select v.id_vuelo as vuelo, v.cod_equipo equipo, asi.cod_cabina,((select e.capacidad_cabinaS as capacidad_equipo from vuelo v join equipo e on v.cod_equipo = e.id_equipo and id_vuelo = 1)-
																(select count(*) as reservas_s from reserva r where r.cod_cabina = 3 and cod_vuelo= 48))as 'disponibles suit'
	from vuelo v join equipo equi join asiento asi 	
			where id_vuelo = 48
            and asi.cod_cabina = 3
			and equi.id_equipo = v.cod_equipo
			and equi.id_equipo = asi.cod_equipo        
                    
                    -- ---------------------------------------------------------
                select * from reserva ;    
	insert into reserva (cod_usuario, cod_cabina, cod_asiento, cod_vuelo, cod_codigo_reserva ) 
    values (c_usuario ,c_cabina,c_vuelo,c_codigo_r);
    
    	insert into reserva (cod_usuario, cod_cabina, cod_vuelo,cod_estado_reserva, cod_codigo_reserva ) 
    values (1,1,48,2,"xxxx");
-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------
-- Lista trayectos
select eo.nombre origen,  ed.nombre destino
from trayecto t join estacion eo on t.cod_estacion_origen = eo.id_estacion
join estacion ed on t.cod_estacion_destino = ed.id_estacion;

-- lista tipo vuelos
select tp.descripcion tipo_vuelo from tipo_vuelo tp;

-- filtro vuelos
 select * from vuelo where vuelo.cod_tipo_vuelo = tipoVuelo and vuelo.fecha = fecha;

-- validar mail de usuario a registrar si devuelve es porq existe entonces hay tirar error de mail existente
-- si no devuelve se inseta nuevo usuario
select * from usuario u where u.email = 'emailingresado';
-- insert de usuario en reserva
insert into usuario (nombre, apellido,cod_tipo_doc,num_doc,email,cod_tipo_usuario) values();

-- una vez el usuario confirmacion de registracion se le asigna la contrasenia y el estadode usuario a confirmado
update usuario 
	SET contrasenia = 'variable',
		cod_estado_usaurio = 2
 where usuario.email = "usuario a confirmar";
  
/* validar antes de ingresar una reserva que no esxita un usuario y cod de reserva repetido
si trae resultado es porque existe entonces sedebe mostrar un error
 si no trae restados se ejecuta el insert de la tabla reservas
 **/
select * 
from reserva r 
where r.cod_codigo_reserva = 'reserva1' and r.cod_usuario = 1; 


insert into reserva (cod_usuario, cod_cabina, cod_asiento, cod_vuelo, cod_codigo_reserva ) 
    values (c_usuario ,c_cabina,c_asiento,c_vuelo,c_codigo_r);
------------------------------------------



-- CONSULTA PARA MOSTRAR LOS TURNOS
SELECT cm.descripcion as Centro_Medico, t.id_turno_medico as Turno, t.fecha_turno as Fecha, concat_ws(', ', u.apellido, u.nombre) as usuario, nv.descripcion as Nivel_vuelo
		FROM turno as t 
		join centro_medico as cm on cm.id_centro_medico = t.cod_centro_medico
        join usuario as u on u.id_usuario = t.cod_usuario
        join nivel_vuelo as nv on nv.id_nivel_vuelo = u.cod_nivel_vuelo;

-- CONSULTA PARA MOSTRAR DATOS DEL USUARIO A CAMBIAR NIVEL_VUELO
SELECT u.id_usuario, u.nombre, u.apellido, u.num_doc, u.cod_nivel_vuelo 
		FROM usuario u
        where u.id_usuario = $cod_usuario;



SELECT cm.descripcion as Centro_Medico, t.id_turno_medico as Turno, t.fecha_turno as Fecha, concat_ws(', ', u.apellido, u.nombre) as usuario, nv.descripcion as Nivel_vuelo, t.cod_usuario
		FROM turno as t 
		join centro_medico as cm on cm.id_centro_medico = t.cod_centro_medico
        join usuario as u on u.id_usuario = t.cod_usuario
        join nivel_vuelo as nv on nv.id_nivel_vuelo = u.cod_nivel_vuelo
        WHERE t.fecha_baja_turno is null;

SELECT nv.id_nivel_vuelo, nv.descripcion 
                FROM usuario as u 
                join nivel_vuelo as nv on nv.id_nivel_vuelo = u.cod_nivel_vuelo
                WHERE u.id_usuario = 2;

-- CANTIDAD DE CABINAS COMPRADAS
SELECT c.descripcion as CABINA, COUNT(*) as CANTIDAD
	FROM cabina as c
		join reserva as r on r.cod_cabina = c.id_cabina
	WHERE r.cod_estado_reserva = 2
    GROUP BY c.id_cabina;

SET lc_time_names = 'es_ES';
SELECT monthname(fecha_alta_reserva) as mes, SUM( importe) as FACTURACION
	FROM reserva
    GROUP BY mes;

SELECT concat(u.apellido, ', ', u.nombre) as Cliente, SUM(r.importe) as facturacion 
	FROM usuario as u
		join reserva as r on r.cod_usuario = u.id_usuario
    WHERE u.cod_tipo_usuario = 2
    GROUP BY u.id_usuario;

-- TASA DE OCUPACION POR VIAJE Y EQUIPO
SELECT r.cod_vuelo, concat(e.modelo, ' ',e.matricula) as equipo, COUNT(r.cod_vuelo) as asientosUsados
	FROM reserva as r 
		join vuelo as v on v.id_vuelo = r.cod_vuelo
        join equipo as e on e.id_equipo = v.cod_equipo
	GROUP BY e.id_equipo;
        
        
        
        
        
        
        
        
        
select * from reserva;
select * from vuelo;
select * from nivel_vuelo;
select * from usuario;
select * from estado_usuario;
select * from estado_reserva;
select * from turno; -- sacar de esta tabla cod_nivel_vuelo
select * from cabina;        
        
        
        
        
SELECT u.cod_tipo_usuario, u.id_usuario, u.nombre, u.apellido, u.cod_tipo_doc, u.num_doc, u.email
            from usuario as u join nivel_vuelo as nv on nv.id_nivel_vuelo = u.cod_nivel_vuelo  where email ='mica@gmail.com' and contrasenia = '123';