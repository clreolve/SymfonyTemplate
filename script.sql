CREATE TABLE usuario (
    id_usuario SERIAL PRIMARY KEY,
    email VARCHAR(180) NOT NULL,
    roles json NOT NULL,
    nombre VARCHAR(128) NOT NULL,
    apellido VARCHAR(128) NOT NULL,
    tipo VARCHAR(128) NOT NULL,
    activo BOOLEAN NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE curso (
    id_curso SERIAL PRIMARY KEY,
    usuario_id integer,
    nombre varchar(256) NOT NULL,
    apellido varchar(256) NOT NULL,
    estado varchar(256) NOT NULL,
    activo boolean NOT NULL,
	
	CONSTRAINT fk_curso_user FOREIGN KEY (usuario_id) 
	REFERENCES usuario(id_usuario)
);