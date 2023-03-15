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

CREATE TABLE tipoincidente (
    id_tipoincidente SERIAL PRIMARY KEY,
    nombre varchar(256) NOT NULL
);

CREATE TABLE incidente (
    id_incidente SERIAL PRIMARY KEY,
    descripcion varchar(20000) NOT NULL,
    solucion varchar(20000),
    estado varchar(256) NOT NULL,
    costo float,
    lugar varchar(256),
    usuario_id integer,
    tipoincidente_id integer,
	fecha date,
	
	CONSTRAINT fk_curso_user FOREIGN KEY (usuario_id) 
	REFERENCES usuario(id_usuario),

    CONSTRAINT fk_curso_tipoincidente FOREIGN KEY (tipoincidente_id) 
	REFERENCES tipoincidente(id_tipoincidente)
);