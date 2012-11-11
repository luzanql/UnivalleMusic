DELETE SCHEMA univallemusic;
CREATE SCHEMA univallemusic;
USE univallemusic;

CREATE TABLE perfil
(
	codigo INTEGER AUTO_INCREMENT,
	nombre VARCHAR(30) NOT NULL,
	PRIMARY KEY (codigo)
) 
;

INSERT INTO perfil VALUES (1,'Administrador');
INSERT INTO perfil VALUES(2,'Suscriptor UnivalleMusic');

CREATE TABLE album
(
	codigo INTEGER AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo)
) 
;

INSERT INTO album VALUES (001,'Se Morir');
INSERT INTO album VALUES (002,'Lo Mejor que hay en mi Vida');
INSERT INTO album VALUES (003,'El Carpintero');
INSERT INTO album VALUES (004,'Canción Rota');
INSERT INTO album VALUES (005,'Dia tras Dia');
INSERT INTO album VALUES (006,'Para Amarte Mejor');
INSERT INTO album VALUES (007,'El Rock de Mi Pueblo');
INSERT INTO album VALUES (008,'Dos Voces');
INSERT INTO album VALUES (009,'Enojado');
INSERT INTO album VALUES (010,'Volver a Empezar');
INSERT INTO album VALUES (011,'20 Años');
INSERT INTO album VALUES (012,'Cada Dia');
INSERT INTO album VALUES (013,'Soy Feliz');
INSERT INTO album VALUES (014,'Viajero Frecuente');
INSERT INTO album VALUES (015,'Rompecabezas');
INSERT INTO album VALUES (016,'Un Poco Mas');
INSERT INTO album VALUES (017,'Real');
INSERT INTO album VALUES (018,'El Negocio');
INSERT INTO album VALUES (019,'Camaleon');
INSERT INTO album VALUES (020,'Mundo Nuevo');
INSERT INTO album VALUES (021,'Debut');
INSERT INTO album VALUES (022,'Cabas');
INSERT INTO album VALUES (023,'Contacto');
INSERT INTO album VALUES (024,'Amores Dificiles');
INSERT INTO album VALUES (025,'Fiajate Bien');
INSERT INTO album VALUES (026,'Un Dia Normal');
INSERT INTO album VALUES (027,'Mi Sangre');
INSERT INTO album VALUES (028,'La Vida es Un Ratico');
INSERT INTO album VALUES (029,'Parce');
INSERT INTO album VALUES (030,'La Vida es Gratis');
INSERT INTO album VALUES (031,'El Condor Fenix');
INSERT INTO album VALUES (032,'Sale el Sol');
INSERT INTO album VALUES (033,'Live From Paris');
INSERT INTO album VALUES (034,'Pies Descalzos');
INSERT INTO album VALUES (035,'¿Donde estan los Ladrones?');
INSERT INTO album VALUES (036,'Al Pasito');
INSERT INTO album VALUES (037,'Querer es Poder');
INSERT INTO album VALUES (038,'Preparate');
INSERT INTO album VALUES (039,'Sutil y Contundente');
INSERT INTO album VALUES (040,'Cielo de Tambores');
INSERT INTO album VALUES (041,'12 Años');
INSERT INTO album VALUES (042,'Bueno y mas');
INSERT INTO album VALUES (043,'Extremo');
INSERT INTO album VALUES (044,'Como en un Baile');
INSERT INTO album VALUES (045,'No me Compares');
INSERT INTO album VALUES (046,'El Tren de los Momentos');
INSERT INTO album VALUES (047,'El Alma al Aire');



CREATE TABLE artista
(
	codigo INTEGER AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo)
) 
;

INSERT INTO artista VALUES (001, 'Andres Cepeda');
INSERT INTO artista VALUES (002, 'Carlos Vives');
INSERT INTO artista VALUES (003, 'Alejandro Lerner');
INSERT INTO artista VALUES (004, 'Ricardo Montaner');
INSERT INTO artista VALUES (005, 'Lucas Arnau');
INSERT INTO artista VALUES (006, 'J Balvin');
INSERT INTO artista VALUES (007, 'Jose Gaviria');
INSERT INTO artista VALUES (008, 'Veronica Orozco');
INSERT INTO artista VALUES (009, 'Andres Cabas');
INSERT INTO artista VALUES (010, 'Juanes');
INSERT INTO artista VALUES (011, 'Julio Nava');
INSERT INTO artista VALUES (012, 'Shakira');
INSERT INTO artista VALUES (013, 'Grupo Niche');
INSERT INTO artista VALUES (014, 'Guayacan');
INSERT INTO artista VALUES (015, 'Alejandro Saenz');
INSERT INTO artista VALUES (016, 'Andrea Echeverry');
INSERT INTO artista VALUES (017, 'Aterciopelados');
INSERT INTO artista VALUES (018, 'Jimmy Saa');
INSERT INTO artista VALUES (019, 'Fonseca');
INSERT INTO artista VALUES (020, 'Soraya');
INSERT INTO artista VALUES (021, 'Alejandro Fernadez');
INSERT INTO artista VALUES (022, 'Carlos Baute');
INSERT INTO artista VALUES (023, 'Luis Fonsi');
INSERT INTO artista VALUES (024, 'Noel Schajris');
INSERT INTO artista VALUES (025, 'Diego Torres');
INSERT INTO artista VALUES (026, 'Ricardo Arjona');
INSERT INTO artista VALUES (027, 'Axel');
INSERT INTO artista VALUES (028, 'Cristian Castro');
INSERT INTO artista VALUES (029, 'Vicentico');
INSERT INTO artista VALUES (030, 'Calle 13');
INSERT INTO artista VALUES (031, 'Don Omar');
INSERT INTO artista VALUES (032, 'Justin Timberlake');
INSERT INTO artista VALUES (033, 'Michael Jackson');
INSERT INTO artista VALUES (034, 'Nelly Furtado');
INSERT INTO artista VALUES (035, 'Paulina Rubio');
INSERT INTO artista VALUES (036, 'Madonna');
INSERT INTO artista VALUES (037, 'Lady Gaga');
INSERT INTO artista VALUES (038, 'Beyonce');
INSERT INTO artista VALUES (039, 'Criss Brown');
INSERT INTO artista VALUES (040, 'Britney Spears');
INSERT INTO artista VALUES (041, 'Cristina Aguilera');
INSERT INTO artista VALUES (042, 'Belinda');



CREATE TABLE nacionalidad
(
	codigo INTEGER AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo)
) 
;

INSERT INTO nacionalidad VALUES (1,"Aleman");
INSERT INTO nacionalidad VALUES (2,"Arabe");
INSERT INTO nacionalidad VALUES (3,"Argentino");
INSERT INTO nacionalidad VALUES (4,"Australiano");
INSERT INTO nacionalidad VALUES (5,"Boliviano");
INSERT INTO nacionalidad VALUES (6,"Brasilero");
INSERT INTO nacionalidad VALUES (7,"Canadiense");
INSERT INTO nacionalidad VALUES (8,"Chileno");
INSERT INTO nacionalidad VALUES (9,"Chino");
INSERT INTO nacionalidad VALUES (10,"Colombiano");
INSERT INTO nacionalidad VALUES (11,"Coreano");
INSERT INTO nacionalidad VALUES (12,"Cubano");
INSERT INTO nacionalidad VALUES (13,"Costarricense");
INSERT INTO nacionalidad VALUES (14,"Ecuatoriano");
INSERT INTO nacionalidad VALUES (15,"Espanol");
INSERT INTO nacionalidad VALUES (16,"Estadounidense");
INSERT INTO nacionalidad VALUES (17,"Frances");
INSERT INTO nacionalidad VALUES (18,"Griego");
INSERT INTO nacionalidad VALUES (19,"Guatemalteco");
INSERT INTO nacionalidad VALUES (20,"Holandes");
INSERT INTO nacionalidad VALUES (21,"Indones");
INSERT INTO nacionalidad VALUES (22,"Ingles");
INSERT INTO nacionalidad VALUES (23,"Italiano");
INSERT INTO nacionalidad VALUES (24,"Japones");
INSERT INTO nacionalidad VALUES (25,"Mexicano");
INSERT INTO nacionalidad VALUES (26,"Panameno");
INSERT INTO nacionalidad VALUES (27,"Peruano");
INSERT INTO nacionalidad VALUES (28,"Polaco");
INSERT INTO nacionalidad VALUES (29,"Portugues");
INSERT INTO nacionalidad VALUES (30,"Puertorriqueno");
INSERT INTO nacionalidad VALUES (31,"Dominicano");
INSERT INTO nacionalidad VALUES (32,"Ruso");
INSERT INTO nacionalidad VALUES (33,"Sueco");
INSERT INTO nacionalidad VALUES (34,"Suizo");
INSERT INTO nacionalidad VALUES (35,"Ucraniano");
INSERT INTO nacionalidad VALUES (36,"Uruguayo");
INSERT INTO nacionalidad VALUES (37,"Venezolano");

CREATE TABLE genero
(
	codigo INTEGER AUTO_INCREMENT,
	Nombre VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo)
) 
;

INSERT INTO genero VALUES (001,"Acid");
INSERT INTO genero VALUES (002,"Acid Jazz");
INSERT INTO genero VALUES (003,"Ambient");
INSERT INTO genero VALUES (004,"Acid-Rock");
INSERT INTO genero VALUES (005,"Blues");
INSERT INTO genero VALUES (006,"Cool-Jazz");
INSERT INTO genero VALUES (007,"Country");
INSERT INTO genero VALUES (008,"Dance");
INSERT INTO genero VALUES (009,"Disco");
INSERT INTO genero VALUES (010,"ElectroAcustica");
INSERT INTO genero VALUES (011,"Etno-Rock");
INSERT INTO genero VALUES (012,"Hip-Hop");
INSERT INTO genero VALUES (013,"Jazz");
INSERT INTO genero VALUES (014,"Electronica");
INSERT INTO genero VALUES (015,"Pop");
INSERT INTO genero VALUES (016,"Pop-Rock");
INSERT INTO genero VALUES (017,"Punk");
INSERT INTO genero VALUES (018,"Rap");
INSERT INTO genero VALUES (019,"Reggae");
INSERT INTO genero VALUES (020,"Rock");
INSERT INTO genero VALUES (021,"Rock and Roll");
INSERT INTO genero VALUES (022,"Ska");
INSERT INTO genero VALUES (023,"Tango");
INSERT INTO genero VALUES (024,"Tecno");
INSERT INTO genero VALUES (025,"Trance");
INSERT INTO genero VALUES (026,"Bachata");
INSERT INTO genero VALUES (027,"Bolero");
INSERT INTO genero VALUES (028,"Heavy Metal");
INSERT INTO genero VALUES (029,"Folk");
INSERT INTO genero VALUES (030,"Salsa");
INSERT INTO genero VALUES (031,"Merengue");
INSERT INTO genero VALUES (032,"Reggaeton");
INSERT INTO genero VALUES (033,"Timba Cubana");
INSERT INTO genero VALUES (034,"Clasica");
INSERT INTO genero VALUES (035,"Ranchera");
INSERT INTO genero VALUES (036,"Tropical");
INSERT INTO genero VALUES (037,"Vallenato");
INSERT INTO genero VALUES (038,"Gospel");
INSERT INTO genero VALUES (039,"Flamenco");


CREATE TABLE artistasxalbum
(
	codigo_Album INTEGER NOT NULL,
	codigo_Artista INTEGER NOT NULL,
	PRIMARY KEY (codigo_Album, codigo_Artista),
	FOREIGN KEY (codigo_Album) REFERENCES Album (codigo) ON DELETE CASCADE,
	FOREIGN KEY (codigo_Artista) REFERENCES Artista (codigo) ON DELETE CASCADE
) 
;

CREATE TABLE cancion
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

CREATE TABLE artistasxcancion
(
	codigo_Cancion VARCHAR(50) NOT NULL,
	codigo_Artista INTEGER NOT NULL,
	PRIMARY KEY (codigo_Cancion, codigo_Artista),
	FOREIGN KEY (codigo_Cancion) REFERENCES Cancion(codigo) ON DELETE CASCADE,
	FOREIGN KEY (codigo_Artista) REFERENCES Artista(codigo) ON DELETE CASCADE
) 
;


CREATE TABLE usuario
(
	usuario VARCHAR(50),
	contrasena VARCHAR(50) NOT NULL,
	codigo_Perfil INTEGER NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	apellido VARCHAR(50) NOT NULL,
	email VARCHAR(50),
	codigo_nacionalidad INTEGER NOT NULL,
	estado VARCHAR(10) NOT NULL DEFAULT 'Activo',
	PRIMARY KEY (usuario),
	FOREIGN KEY (codigo_Perfil) REFERENCES Perfil(codigo) ON DELETE CASCADE,
	FOREIGN KEY (codigo_Nacionalidad) REFERENCES Nacionalidad (codigo) ON DELETE CASCADE
) 
;

INSERT INTO usuario VALUES ('admin',MD5('admin'),1,'Admin','Admin','admin@univallemusic.com',10,DEFAULT);

CREATE TABLE cancionesdescargadas
(
	codigo_Cancion VARCHAR(50) NOT NULL,
	codigo_Usuario INTEGER NOT NULL,
	fecha_Descarga TIMESTAMP NOT NULL,
	FOREIGN KEY (codigo_Cancion) REFERENCEs Cancion (codigo) ON DELETE CASCADE
) 
;

CREATE TABLE cancionesxusuario
(
	codigo_Usuario VARCHAR(50) NOT NULL,
	codigo_Cancion VARCHAR(50) NOT NULL,
	fecha TIMESTAMP,
	PRIMARY KEY (codigo_Usuario, codigo_Cancion),
	FOREIGN KEY (codigo_Cancion) REFERENCES Cancion (codigo) ON DELETE CASCADE,
	FOREIGN KEY (codigo_Usuario) REFERENCES Usuario(usuario) ON DELETE CASCADE
);

CREATE TABLE listareproduccion
(
	codigo INTEGER AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	id_Usuario VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo),
	FOREIGN KEY (id_Usuario) REFERENCES Usuario (usuario) ON DELETE CASCADE
	
) 
;

CREATE TABLE cancionesxlistareproduccion
(
	codigo_Cancion VARCHAR(50) NOT NULL,
	codigo_Lista INTEGER NOT NULL,
	PRIMARY KEY (codigo_Cancion, codigo_Lista),
	FOREIGN KEY (codigo_Cancion) REFERENCES Cancion (codigo) ON DELETE CASCADE,
	FOREIGN KEY (codigo_Lista) REFERENCES ListaReproduccion (codigo) ON DELETE CASCADE

) 
;

SHOW TABLES;