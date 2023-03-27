DROP TABLE IF EXISTS curso;
DROP TABLE IF EXISTS usuario;

CREATE TABLE usuario (
    id_usuario SERIAL PRIMARY KEY,
    email VARCHAR(180) UNIQUE,
    roles json,
    nombre VARCHAR(128),
    apellido VARCHAR(128),
    tipo VARCHAR(128),
    activo BOOLEAN,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE curso (
    id_curso SERIAL PRIMARY KEY,
    usuario_id integer,
    nombre varchar(256),
    apellido varchar(256),
    estado varchar(256),
    activo boolean,
	
	CONSTRAINT fk_curso_user FOREIGN KEY (usuario_id) 
	REFERENCES usuario(id_usuario)
);


INSERT INTO public.usuario (email, roles, nombre, apellido, tipo, activo, password) VALUES 
('admin@correo.com', '["ROLE_ADMINISTRADOR"]', 'Claudio', 'Olvera', 'ADMINISTRADOR', true, '$2y$13$Eko1Ak9r9sfA8H2R5wMw7OHkn1i3tH.6EzbL1KrGJvPlOIwpVO4ou');
INSERT INTO public.usuario (email, roles, nombre, apellido, tipo, activo, password) VALUES 
('guardia1@correo.com', '["ROLE_GUARDIA"]', 'Andres', 'Fernandez', 'GUARDIA', true, '$2y$13$TuZzRW1KQeSs6RIoYp0jL.B1E2gIzvgOneYviHKwDcZxvxIekVYRK');
INSERT INTO public.usuario (email, roles, nombre, apellido, tipo, activo, password) VALUES 
('guardia2@correo.com', '["ROLE_GUARDIA"]', 'Carlos', 'Ramirez', 'GUARDIA', true, '$2y$13$5BIKd0ANm/pT/QqZzwa7ROD2ppwKO7yrfNSH1H4FtA14Ugbld18pO');
INSERT INTO public.usuario (email, roles, nombre, apellido, tipo, activo, password) VALUES 
('residente1@correo.com', '["ROLE_RESIDENTE"]', 'Jesus', 'Andrea', 'RESIDENTE', true, '$2y$13$TuZzRW1KQeSs6RIoYp0jL.B1E2gIzvgOneYviHKwDcZxvxIekVYRK');
INSERT INTO public.usuario (email, roles, nombre, apellido, tipo, activo, password) VALUES 
('residente2@correo.com', '["ROLE_RESIDENTE"]', 'Diego', 'Maradona', 'RESIDENTE', true, '$2y$13$5BIKd0ANm/pT/QqZzwa7ROD2ppwKO7yrfNSH1H4FtA14Ugbld18pO');
