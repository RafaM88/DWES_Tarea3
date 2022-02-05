drop table if exists usuarios CASCADE;

create table usuarios(
usuario varchar(10) not null,
clave varchar(60),
constraint pk_usuarios primary key (usuario),

);

drop type if exists operacion CASCADE;
drop table if exists operaciones CASCADE;
create type operacion as enum ('gasto','ingreso');
create table operaciones(
id serial,
fecha date,
importe decimal(10,2) not null,
operacion operacion,
concepto varchar(20),
usuario varchar(10),
constraint fk_usuario_operacion foreign key (usuario) references usuarios(usuario),
constraint pk_id primary key (id)
);