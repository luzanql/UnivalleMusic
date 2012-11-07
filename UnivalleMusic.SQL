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

INSERT INTO Album VALUES (001,'Se Morir');
INSERT INTO Album VALUES (002,'Lo Mejor que hay en mi Vida');
INSERT INTO Album VALUES (003,'El Carpintero');
INSERT INTO Album VALUES (004,'Canción Rota');
INSERT INTO Album VALUES (005,'Dia tras Dia');
INSERT INTO Album VALUES (006,'Para Amarte Mejor');
INSERT INTO Album VALUES (007,'El Rock de Mi Pueblo');
INSERT INTO Album VALUES (008,'Dos Voces');
INSERT INTO Album VALUES (009,'Enojado');
INSERT INTO Album VALUES (010,'Volver a Empezar');
INSERT INTO Album VALUES (011,'20 Años');
INSERT INTO Album VALUES (012,'Cada Dia');
INSERT INTO Album VALUES (013,'Soy Feliz');
INSERT INTO Album VALUES (014,'Viajero Frecuente');
INSERT INTO Album VALUES (015,'Rompecabezas');
INSERT INTO Album VALUES (016,'Un Poco Mas');
INSERT INTO Album VALUES (017,'Real');
INSERT INTO Album VALUES (018,'El Negocio');
INSERT INTO Album VALUES (019,'Camaleon');
INSERT INTO Album VALUES (020,'Mundo Nuevo');
INSERT INTO Album VALUES (021,'Debut');
INSERT INTO Album VALUES (022,'Cabas');
INSERT INTO Album VALUES (023,'Contacto');
INSERT INTO Album VALUES (024,'Amores Dificiles');
INSERT INTO Album VALUES (025,'Fiajate Bien');
INSERT INTO Album VALUES (026,'Un Dia Normal');
INSERT INTO Album VALUES (027,'Mi Sangre');
INSERT INTO Album VALUES (028,'La Vida es Un Ratico');
INSERT INTO Album VALUES (029,'Parce');
INSERT INTO Album VALUES (030,'La Vida es Gratis');
INSERT INTO Album VALUES (031,'El Condor Fenix');
INSERT INTO Album VALUES (032,'Sale el Sol');
INSERT INTO Album VALUES (033,'Live From Paris');
INSERT INTO Album VALUES (034,'Pies Descalzos');
INSERT INTO Album VALUES (035,'¿Donde estan los Ladrones?');
INSERT INTO Album VALUES (036,'Al Pasito');
INSERT INTO Album VALUES (037,'Querer es Poder');
INSERT INTO Album VALUES (038,'Preparate');
INSERT INTO Album VALUES (039,'Sutil y Contundente');
INSERT INTO Album VALUES (040,'Cielo de Tambores');
INSERT INTO Album VALUES (041,'12 Años');
INSERT INTO Album VALUES (042,'Bueno y mas');
INSERT INTO Album VALUES (043,'Extremo');
INSERT INTO Album VALUES (044,'Como en un Baile');
INSERT INTO Album VALUES (045,'No me Compares');
INSERT INTO Album VALUES (046,'El Tren de los Momentos');
INSERT INTO Album VALUES (047,'El Alma al Aire');



CREATE TABLE Artista
(
	codigo INTEGER AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	PRIMARY KEY (codigo)
) 
;

INSERT INTO Artista VALUES (001, 'Andres Cepeda');
INSERT INTO Artista VALUES (002, 'Carlos Vives');
INSERT INTO Artista VALUES (003, 'Alejandro Lerner');
INSERT INTO Artista VALUES (004, 'Ricardo Montaner');
INSERT INTO Artista VALUES (005, 'Lucas Arnau');
INSERT INTO Artista VALUES (006, 'J Balvin');
INSERT INTO Artista VALUES (007, 'Jose Gaviria');
INSERT INTO Artista VALUES (008, 'Veronica Orozco');
INSERT INTO Artista VALUES (009, 'Andres Cabas');
INSERT INTO Artista VALUES (010, 'Juanes');
INSERT INTO Artista VALUES (011, 'Julio Nava');
INSERT INTO Artista VALUES (012, 'Shakira');
INSERT INTO Artista VALUES (013, 'Grupo Niche');
INSERT INTO Artista VALUES (014, 'Guayacan');
INSERT INTO Artista VALUES (015, 'Alejandro Saenz');
INSERT INTO Artista VALUES (016, 'Andrea Echeverry');
INSERT INTO Artista VALUES (017, 'Aterciopelados');
INSERT INTO Artista VALUES (018, 'Jimmy Saa');
INSERT INTO Artista VALUES (019, 'Fonseca');
INSERT INTO Artista VALUES (020, 'Soraya');
INSERT INTO Artista VALUES (021, 'Alejandro Fernadez');
INSERT INTO Artista VALUES (022, 'Carlos Baute');
INSERT INTO Artista VALUES (023, 'Luis Fonsi');
INSERT INTO Artista VALUES (024, 'Noel Schajris');
INSERT INTO Artista VALUES (025, 'Diego Torres');
INSERT INTO Artista VALUES (026, 'Ricardo Arjona');
INSERT INTO Artista VALUES (027, 'Axel');
INSERT INTO Artista VALUES (028, 'Cristian Castro');
INSERT INTO Artista VALUES (029, 'Vicentico');
INSERT INTO Artista VALUES (030, 'Calle 13');
INSERT INTO Artista VALUES (031, 'Don Omar');
INSERT INTO Artista VALUES (032, 'Justin Timberlake');
INSERT INTO Artista VALUES (033, 'Michael Jackson');
INSERT INTO Artista VALUES (034, 'Nelly Furtado');
INSERT INTO Artista VALUES (035, 'Paulina Rubio');
INSERT INTO Artista VALUES (036, 'Madonna');
INSERT INTO Artista VALUES (037, 'Lady Gaga');
INSERT INTO Artista VALUES (038, 'Beyonce');
INSERT INTO Artista VALUES (039, 'Criss Brown');
INSERT INTO Artista VALUES (040, 'Britney Spears');
INSERT INTO Artista VALUES (041, 'Cristina Aguilera');
INSERT INTO Artista VALUES (042, 'Belinda');



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

INSERT INTO Genero VALUES (001,"Acid");
INSERT INTO Genero VALUES (002,"Acid Jazz");
INSERT INTO Genero VALUES (003,"Ambient");
INSERT INTO Genero VALUES (004,"Acid-Rock");
INSERT INTO Genero VALUES (005,"Blues");
INSERT INTO Genero VALUES (006,"Cool-Jazz");
INSERT INTO Genero VALUES (007,"Country");
INSERT INTO Genero VALUES (008,"Dance");
INSERT INTO Genero VALUES (009,"Disco");
INSERT INTO Genero VALUES (010,"ElectroAcustica");
INSERT INTO Genero VALUES (011,"Etno-Rock");
INSERT INTO Genero VALUES (012,"Hip-Hop");
INSERT INTO Genero VALUES (013,"Jazz");
INSERT INTO Genero VALUES (014,"Electronica");
INSERT INTO Genero VALUES (015,"Pop");
INSERT INTO Genero VALUES (016,"Pop-Rock");
INSERT INTO Genero VALUES (017,"Punk");
INSERT INTO Genero VALUES (018,"Rap");
INSERT INTO Genero VALUES (019,"Reggae");
INSERT INTO Genero VALUES (020,"Rock");
INSERT INTO Genero VALUES (021,"Rock and Roll");
INSERT INTO Genero VALUES (022,"Ska");
INSERT INTO Genero VALUES (023,"Tango");
INSERT INTO Genero VALUES (024,"Tecno");
INSERT INTO Genero VALUES (025,"Trance");
INSERT INTO Genero VALUES (026,"Bachata");
INSERT INTO Genero VALUES (027,"Bolero");
INSERT INTO Genero VALUES (028,"Heavy Metal");
INSERT INTO Genero VALUES (029,"Folk");
INSERT INTO Genero VALUES (030,"Salsa");
INSERT INTO Genero VALUES (031,"Merengue");
INSERT INTO Genero VALUES (032,"Reggaeton");
INSERT INTO Genero VALUES (033,"Timba Cubana");
INSERT INTO Genero VALUES (034,"Clasica");
INSERT INTO Genero VALUES (035,"Ranchera");
INSERT INTO Genero VALUES (036,"Tropical");
INSERT INTO Genero VALUES (037,"Vallenato");
INSERT INTO Genero VALUES (038,"Gospel");
INSERT INTO Genero VALUES (039,"Flamenco");


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