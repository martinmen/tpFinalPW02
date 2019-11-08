
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
 */
select * 
from reserva r 
where r.cod_codigo_reserva = 'reserva1' and r.cod_usuario = 1; 


insert into reserva (cod_usuario, cod_cabina, cod_asiento, cod_vuelo, cod_codigo_reserva ) 
    values (c_usuario ,c_cabina,c_asiento,c_vuelo,c_codigo_r);

select * from reserva;




