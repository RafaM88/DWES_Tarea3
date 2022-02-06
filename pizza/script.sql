drop table if exists usuarios cascade;

create table usuarios(
    usuario varchar (20),
	nombre varchar(20),
    apellidos varchar(30),
	clave char(60),
	constraint usuario_uq unique (usuario),
	constraint usuario_pk primary key(usuario)
);

drop table if exists ingredientes cascade;
    drop type tipo_ingrediente cascade;
	create type tipo_ingrediente as enum('salsa','carne','pescado','verdura','queso');
	
    create table ingredientes(
    ingrediente varchar(25),
    tipo tipo_ingrediente,
    precio numeric(10,2),
	constraint ingrediente_uq unique (ingrediente),
	constraint ingrediente_pk primary key(ingrediente)
);

insert into ingredientes (ingrediente,tipo,precio) values 
('gambas','pescado',3.50),
('jamón york','carne',2),
('aceitunas negras','verdura',2.50),
('Pepperoni','carne',2.75),
('salsa de Tomate','salsa',1.50),
('Bacon','carne',2.25),
('Roquefort','queso',3),
('salsa barbacoa','salsa',1.75),
('anchoas','pescado',2.20),
('jamón serrano','carne',3),
('cheddar','queso',2),
('orégano','verdura',0.5),
('mozzarella','queso',2.50),
('nata','salsa',2.50),
('salsa boloñesa','salsa',3),
('carne picada','carne',4),
('champiñones','verdura',2.25),
('tomate natural','verdura',1.75),
('pimientos','verdura',1.25);
drop table if exists pizzas cascade;

create table pizzas(
	nombre varchar(20),
	ingredientes varchar(20)[],
	precio numeric(4,2),
	constraint uq_nombre unique (nombre),
	constraint pk_nombre primary key(nombre)
	
);


insert into pizzas(nombre,ingredientes,precio) values ('pizza margarita','{salsa de tomate,mozarella,orégano}',4.50),
('pizza roquefort','{salsa de tomate,Roquefort,jamón york,orégano}',7),
('pizza boloñesa','{salsa de tomate,carne picada,salsa boloñesa, mozzarella,orégano}',11.50),
('pizza marinera','{salsa de tomate,anchoas,gambas,mozzarella,orégano}',10.20),
('pizza carbonara','{nata,bacon,champiñones,mozzarella,orégano}',10),
('pizza andaluza','{salsa de tomate,jamón serrano,tomate natural,pimientos,mozzarella,orégano}',10.5);

drop table if exists tamanio;
create table tamanio(
	nombre varchar(20),
	descripcion varchar(50),
	incremento integer,
	constraint pk_size primary key (nombre)
);

insert into tamanio(nombre,descripcion,incremento) values
	('SOLITARIO','Para un comensal',-2),
	('DUO','Para 2 comensales',-1),
	('ESTÁNDAR','Para 4 comensales',0),
	('BIG','Para 6 comensales',1),
	('MONSTER','Para 10 comensales',3);

drop table if exists pedido_usuario;
create table pedido_usuario(
	id integer,
	pizza varchar(20) default 'pizza a medida',
	ingredientes varchar(20)[],
	tamaño integer,
	precio numeric(5,2),
	cantidad integer
);