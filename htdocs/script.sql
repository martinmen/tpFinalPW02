use tpfinal;

drop table reserva;
drop table usuario;
drop table tipo_usuario;
drop table vuelo;

 create table tipo_usuario(
 id bigint(20)not null auto_increment,
 descripcion varchar (60),
 primary key(id)
 );
 create table tipo_documento(
id bigint(20) NOT NULL AUTO_INCREMENT,
descripcion varchar(60),
    primary key (id)
    );
    insert into tipo_documento(descripcion)values
     ("DNI"),
     ("Pasaporte"),
     ("Libreta Civica");
CREATE TABLE usuario (
  id bigint(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(60) DEFAULT NULL,
  apellido varchar(60) DEFAULT NULL,
  nro_documento varchar(60),
  email varchar(60),
  contrasenia varchar(255) DEFAULT NULL,
  tipo_usuario bigint,
  PRIMARY KEY (id),
  foreign key (tipo_usuario) references tipo_usuario(id)
);

create table equipo(
id bigint(20) NOT NULL AUTO_INCREMENT,
cant_general int,
cant_familiar int,
reservas_f_hechas int,
suit_cant int,
reservas_f_hechas int,
nombre varchar(60),

/*reservas_f_disponibles as cant_familiar - (reservas_f_hechas), */  
primary key (id)
);
create table tipo_vuelo(
id bigint(20) NOT NULL AUTO_INCREMENT,
descripcion varchar(60),
primary key (id)
);
create table estado(
id bigint(20) NOT NULL AUTO_INCREMENT,
descripcion varchar(60),
primary key (id)
);

create table vuelo(
  id bigint(20) NOT NULL AUTO_INCREMENT,
  duracion double,
  fecha date,
  equipo varchar(40),
  tipo_vuelo varchar(40),
primary key (id)
);
DROP TABLE RESERVA;
create table reserva(
/*id bigint(20) NOT NULL AUTO_INCREMENT,*/
id_usuario bigint(20),
id_vuelo bigint(20),
cod_reserva varchar(20),
id_estado bigint(20),
fecha_reserva date,

primary key (id_usuario, id_vuelo,cod_reserva),
constraint foreign key (id_usuario) references usuario(id),
constraint foreign key (id_vuelo) references vuelos(id)
/*constraint foreign key (id_estado) references usuario(id),*/

);
 
 INSERT INTO tipo_usuario(descripcion)
VALUES("Administrador"),
("Cliente");

insert into usuario(nombre, apellido, nro_documento, email,contrasenia,tipo_usuario)
values("micaela","vandoni","12345","mvandoni@gmail.com","123",1),
("leandro","tonello","12345","ltonello@gmail.com","123",1),
("martin","mendez","12345","mmendez@gmail.com","123",2),
("debora","chamorro","12345","dschamorro@gmail.com","123",2);

insert into vuelo(duracion, fecha,equipo,tipo_vuelo)values
(1.5,'2029-12-10', "equipo1","rapido"),
(2.5,'2029-12-09', "equipo2","alto"),
(5.0,'2019-10-08', "equipo3","bajo"),
(2.5,'2019-09-10', "equipo4","alto"),
(10.5,'2019-08-10', "equipo5","alto");

insert into reserva(id_usuario,id_vuelo ,cod_reserva,id_estado,fecha_reserva) values
(1,1,"XXXXX1",1,'2029-10-20'),
(2,1,"XXXXX1",1,'2029-10-20'),
(3,1,"XXXXX1",1,'2029-08-20'),
(1,2,"XXXXX2",1,'2019-09-20'),
(2,2,"XXXXX2",1,'2019-10-20');