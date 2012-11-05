DROP SCHEMA UnivalleMusic;
CREATE SCHEMA UnivalleMusic;
USE UnivalleMusic;

CREATE TABLE Perfil
(
	codigo INTEGER AUTO_INCREMENT,
	nombre VARCHAR(30) NOT NULL,
	PRIMARY KEY (codigo)
) 
;

INSERT INTO Perfil VALUES (1,'Administrador');
INSERT INTO Perfil VALUES(2,'Suscriptor UnivalleMusic');

CREATE TABLE Album
(
	codigo INTEGER AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo)
) 
;

CREATE TABLE Artista
(
	codigo INTEGER AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo)
) 
;

CREATE TABLE Nacionalidad
(
	codigo INTEGER AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo)
) 
;

INSERT INTO Nacionalidad VALUES (1,"Aleman");
INSERT INTO Nacionalidad VALUES (2,"Arabe");
INSERT INTO Nacionalidad VALUES (3,"Argentino");
INSERT INTO Nacionalidad VALUES (4,"Australiano");
INSERT INTO Nacionalidad VALUES (5,"Boliviano");
INSERT INTO Nacionalidad VALUES (6,"Brasilero");
INSERT INTO Nacionalidad VALUES (7,"Canadiense");
INSERT INTO Nacionalidad VALUES (8,"Chileno");
INSERT INTO Nacionalidad VALUES (9,"Chino");
INSERT INTO Nacionalidad VALUES (10,"Colombiano");
INSERT INTO Nacionalidad VALUES (11,"Coreano");
INSERT INTO Nacionalidad VALUES (12,"Cubano");
INSERT INTO Nacionalidad VALUES (13,"Costarricense");
INSERT INTO Nacionalidad VALUES (14,"Ecuatoriano");
INSERT INTO Nacionalidad VALUES (15,"Espanol");
INSERT INTO Nacionalidad VALUES (16,"Estadounidense");
INSERT INTO Nacionalidad VALUES (17,"Frances");
INSERT INTO Nacionalidad VALUES (18,"Griego");
INSERT INTO Nacionalidad VALUES (19,"Guatemalteco");
INSERT INTO Nacionalidad VALUES (20,"Holandes");
INSERT INTO Nacionalidad VALUES (21,"Indones");
INSERT INTO Nacionalidad VALUES (22,"Ingles");
INSERT INTO Nacionalidad VALUES (23,"Italiano");
INSERT INTO Nacionalidad VALUES (24,"Japones");
INSERT INTO Nacionalidad VALUES (25,"Mexicano");
INSERT INTO Nacionalidad VALUES (26,"Panameno");
INSERT INTO Nacionalidad VALUES (27,"Peruano");
INSERT INTO Nacionalidad VALUES (28,"Polaco");
INSERT INTO Nacionalidad VALUES (29,"Portugues");
INSERT INTO Nacionalidad VALUES (30,"Puertorriqueno");
INSERT INTO Nacionalidad VALUES (31,"Dominicano");
INSERT INTO Nacionalidad VALUES (32,"Ruso");
INSERT INTO Nacionalidad VALUES (33,"Sueco");
INSERT INTO Nacionalidad VALUES (34,"Suizo");
INSERT INTO Nacionalidad VALUES (35,"Ucraniano");
INSERT INTO Nacionalidad VALUES (36,"Uruguayo");
INSERT INTO Nacionalidad VALUES (37,"Venezolano");

CREATE TABLE Genero
(
	codigo INTEGER AUTO_INCREMENT,
	Nombre VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo)
) 
;


CREATE TABLE ArtistasXAlbum
(
	codigo_Album INTEGER NOT NULL,
	codigo_Artista INTEGER NOT NULL,
	PRIMARY KEY (codigo_Album, codigo_Artista),
	FOREIGN KEY (codigo_Album) REFERENCES Album (codigo) ON DELETE CASCADE,
	FOREIGN KEY (codigo_Artista) REFERENCES Artista (codigo) ON DELETE CASCADE
) 
;

CREATE TABLE Cancion
(
	codigo VARCHAR(50) NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	artista INTEGER NOT NULL,
	codigo_Album INTEGER NOT NULL,
	genero INTEGER,
	PRIMARY KEY (codigo),
	FOREIGN KEY (genero) REFERENCES Genero (codigo) ON DELETE CASCADE,
	FOREIGN KEY (artista) REFERENCES Artista (codigo) ON DELETE CASCADE,
	FOREIGN KEY (codigo_Album) REFERENCES Album (codigo) ON DELETE CASCADE
) 
;

CREATE TABLE ArtistasXCancion
(
	codigo_Cancion VARCHAR(50) NOT NULL,
	codigo_Artista INTEGER NOT NULL,
	PRIMARY KEY (codigo_Cancion, codigo_Artista),
	FOREIGN KEY (codigo_Cancion) REFERENCES Cancion(codigo) ON DELETE CASCADE,
	FOREIGN KEY (codigo_Artista) REFERENCES Artista(codigo) ON DELETE CASCADE
) 
;


CREATE TABLE Usuario
(
	usuario VARCHAR(50),
	contrasena VARCHAR(50) NOT NULL,
	codigo_Perfil INTEGER NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	apellido VARCHAR(50) NOT NULL,
	email VARCHAR(50),
	codigo_nacionalidad INTEGER NOT NULL,
	PRIMARY KEY (usuario),
	FOREIGN KEY (codigo_Perfil) REFERENCES Perfil(codigo) ON DELETE CASCADE,
	FOREIGN KEY (codigo_Nacionalidad) REFERENCES Nacionalidad (codigo) ON DELETE CASCADE
) 
;

INSERT INTO Usuario VALUES ('admin',MD5('admin'),1,'Admin','Admin','admin@univallemusic.com',10);

CREATE TABLE CancionesDescargadas
(
	codigo_Cancion VARCHAR(50) NOT NULL,
	codigo_Usuario INTEGER NOT NULL,
	fecha_Descarga TIMESTAMP NOT NULL,
	FOREIGN KEY (codigo_Cancion) REFERENCEs Cancion (codigo) ON DELETE CASCADE
) 
;

CREATE TABLE CancionesXUsuario
(
	codigo_Usuario VARCHAR(50) NOT NULL,
	codigo_Cancion VARCHAR(50) NOT NULL,
	fecha TIMESTAMP,
	PRIMARY KEY (codigo_Usuario, codigo_Cancion),
	FOREIGN KEY (codigo_Cancion) REFERENCES Cancion (codigo) ON DELETE CASCADE,
	FOREIGN KEY (codigo_Usuario) REFERENCES Usuario(usuario) ON DELETE CASCADE
);

CREATE TABLE ListaReproduccion
(
	codigo INTEGER AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	id_Usuario VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo),
	FOREIGN KEY (id_Usuario) REFERENCES Usuario (usuario) ON DELETE CASCADE
	
) 
;

CREATE TABLE CancionesXListareproduccion
(
	codigo_Cancion VARCHAR(50) NOT NULL,
	codigo_Lista INTEGER NOT NULL,
	PRIMARY KEY (codigo_Cancion, codigo_Lista),
	FOREIGN KEY (codigo_Cancion) REFERENCES Cancion (codigo) ON DELETE CASCADE,
	FOREIGN KEY (codigo_Lista) REFERENCES ListaReproduccion (codigo) ON DELETE CASCADE

) 
;

SHOW TABLES;