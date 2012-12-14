<?php

include_once '../Recursos/Scripts/Login.php';
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
include('../Controladores/ControladorCancion.php');
include('../Controladores/ControladorArtista.php');
include('../Controladores/ControladorAlbum.php');
include('../Controladores/ControladorGenero.php');
include('../Controladores/ControladorArtistaxAlbum.php');
include('../Controladores/ControladorArtistaXCancion.php');
include('../Controladores/ControladorCancionesXUsuario.php');

$titulo = $_POST["titulo"];
$album = $_POST["album"];
$genero = $_POST["genero"];
$artista = $_POST["artista"];

if ($_FILES["track_file"]["name"] == "") {
    die("Debe elegir un archivo.<br/>
                                    <a href=\"AgregarCancion.php\" data-role=\"button\"> Volver</a>
                                    </div></div><!-- /grid-b --></div><!-- /content -->
                                    <div data-role=\"footer\" data-theme = \"b\" STYLE=\" border-style:solid; border-color: #c73930;\">
                                    <h6>UNIVERSIDAD DEL VALLE</h6>
                                    <h6>Aplicaciones en la Web y Redes Inhalambricas</h6>
                                    </div>
                                    </div><!-- /page -->
                                    </body>
                                    </html>");
}

if ($_FILES["track_file"]["error"] > 0) {
    echo "Upload File: " . ini_get('upload_max_filesize') . "<br/>";
    echo "Error: " . $_FILES["track_file"]["error"] . "<br />";
} else {
    $file_name = $_FILES["track_file"]["name"];
    $extensionArchivo = substr($file_name, -4);
    $extensionArchivo = str_replace(".", "", $extensionArchivo);
    $extensionArchivo = strtolower($extensionArchivo);

    //$extensionesValidas = array("mp3", "wav", "wma", "cda", "ogg", "ogm", "aac", "ac3", "mid", "midi", "flac");
    $extensionesValidas = array("mp3", "ogg");
    $archivoValido = false;
    for ($i = 0; $i < sizeof($extensionesValidas); $i++) {
        if ($extensionArchivo == $extensionesValidas[$i]) {
            $archivoValido = true;
            break;
        }
    }

    if (!$archivoValido) {
        die("El archivo no tiene una extension de archivo valida.<br/>
                                    <a href=\"AgregarCancion.php\" data-role=\"button\"> Volver</a>
                                    </div></div><!-- /grid-b --></div><!-- /content -->
                                    <div data-role=\"footer\" data-theme = \"b\" STYLE=\" border-style:solid; border-color: #c73930;\">
                                    <h6>UNIVERSIDAD DEL VALLE</h6>
                                    <h6>Aplicaciones en la Web y Redes Inhalambricas</h6>
                                    </div>
                                    </div><!-- /page -->
                                    </body>
                                    </html>");
    }

    $source = $_FILES["track_file"]["tmp_name"];
    $nombreCancion = explode("\\", $source); //Para windows
    //$nombreCancion = explode("/", $source); //Para Linux
    $nombreCancion = $nombreCancion[sizeof($nombreCancion) - 1];
    $nombreCancion = str_replace("tmp", $extensionArchivo, $nombreCancion);
    //$nombreCancion = $nombreCancion . "." . $extensionArchivo; //Para Linux

    echo "Cancion: " . $titulo . "<br />";
    echo "Tipo Archivo: " . $extensionArchivo . "<br />";
    echo "Tamano: " . (($_FILES["track_file"]["size"] / 1024) / 1024) . " MB<br />";
}

$controladorAlbum = new ControladorAlbum();
$controladorArtista = new ControladorArtista();
$controladorGenero = new ControladorGenero();
$controladorCancion = new ControladorCancion();
$controladorArtistaXAlbum = new ControladorArtistaxAlbum();
$controladorArtistaXCancion = new ControladorArtistaXCancion();
$controladorCancionesXUsuario = new ControladorCancionesXUsuario();

$existeGenero = $controladorGenero->existeGenero(strtolower(trim($genero)));
if (!$existeGenero) {
    $controladorGenero->createGenero($genero);
    $codigoGenero = $controladorGenero->obtenerGenero(strtolower(trim($genero)));
} else {
    $codigoGenero = $controladorGenero->obtenerGenero(strtolower(trim($genero)));
}

$existeArtista = $controladorArtista->existeArtista(strtolower(trim($artista)));
$existeAlbum = $controladorAlbum->existeAlbum(strtolower(trim($album)));
$existeArtistaXAlbum = $controladorArtistaXAlbum->existeArtistaXAlbum(strtolower(trim($artista)), strtolower(trim($album)));

if (!$existeAlbum) {
    $controladorAlbum->createAlbum(strtolower(trim($album)));
}
if (!$existeArtista) {
    $controladorArtista->createArtista(strtolower(trim($artista)));
}
$codigoAlbum = $controladorAlbum->obtenerCodigoAlbum(strtolower(trim($album)));
$codigoArtista = $controladorArtista->obtenerCodigoArtista(strtolower(trim($artista)));

$controladorCancion->createCancion($nombreCancion, $titulo, $codigoAlbum, $codigoGenero, $codigoArtista);
$cancion = $controladorCancion->obtenerCancion($titulo, $codigoArtista, $codigoAlbum);
$codigo_Cancion = $cancion->getCodigo();

if (!$existeArtistaXAlbum) {
    $controladorArtistaXAlbum->createArtistaxalbum($codigoAlbum, $codigoArtista);
}

$controladorArtistaXCancion->createArtistaXCancion($codigo_Cancion, $codigoArtista);

$controladorCancionesXUsuario->createCancionesXUsuario($codigo_Cancion);

copy($source, "../Recursos/Canciones/" . $nombreCancion);

printf("<audio controls=\"controls\">
                            <source src=\"../Recursos/Canciones/$nombreCancion\" type=\"audio/mpeg\">
                                Your browser does not support the audio element.
                                </audio>");
header("Location: ../Vista/MiColeccion.php");
?>