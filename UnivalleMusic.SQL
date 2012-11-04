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