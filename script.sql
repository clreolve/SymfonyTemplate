CREATE TABLE "user" (
    "id" INT PRIMARY KEY,
    email VARCHAR(180) NOT NULL,
    roles json NOT NULL,
    nombre VARCHAR(128) NOT NULL,
    apellido VARCHAR(128) NOT NULL,
    tipo VARCHAR(128) NOT NULL,
    activo BOOLEAN NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE curso (
    "id" integer PRIMARY KEY,
    user_id integer,
    nombre varchar(256) NOT NULL,
    apellido varchar(256) NOT NULL,
    estado varchar(256) NOT NULL,
    activo boolean NOT NULL,
	
	CONSTRAINT fk_curso_user FOREIGN KEY (user_id) 
	REFERENCES "user"("id")
);