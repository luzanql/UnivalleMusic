<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Subir Cancion Resultado</title>
        <link rel="stylesheet" href="../themes/male.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    </head>
    <body>
        <div data-role="page" data-theme= "a">

            <div data-role="header" data-theme ="b" style=" height: 167px;"><!--background-image: url(banner.png); -->
                <img src="../Recursos/Banner.png" width="80%" height="100%">
                <div style="float:right; "><!--style="width:20%; height:100%; float:right; "-->
                    <img src="../Recursos/carrito.jpeg" style=" width:50%; height: 50%; "  />
                </div>
            </div><!-- /header -->

            <div data-role="content" data-theme = "a">	
                <div class="ui-grid-b">
                    <div class="ui-block-a" style="width:250px; margin:3%">

                        <div data-role="controlgroup"> 
                            <a href="index.html" data-role="button"> Mi Perfil </a> 
                            <a href="../Vista/MiColeccion.php" data-role="button"> Mi Coleccion</a> 
                            <a href="../Vista/MisListas.php" data-role="button"> Listas de Reproduccion</a> 
                            <a href="index.html" data-role="button"> Comprar Musica</a>
                        </div>
                    </div>
                    <div class="ui-block-b" style="margin:3%">

                        <?php
                        include('../Controladores/ControladorCancion.php');
                        include('../Controladores/ControladorArtista.php');
                        include('../Controladores/ControladorAlbum.php');
                        include('../Controladores/ControladorGenero.php');
                        include('../Controladores/ControladorArtistaxAlbum.php');
                        include('../Controladores/ControladorArtistaXCancion.php');
                        include('../Controladores/ControladorCancionesXUsuario.php');
                        //
                        $titulo = $_POST["titulo"];
                        $album = $_POST["album"];
                        $genero = $_POST["genero"];
                        $artista = $_POST["artista"];
                        
                        if ($_FILES["track_file"]["name"]=="" ){
                              die("Debe elegir un archivo.<br/>
                                    <a href=\"AgregarCancion.html\" data-role=\"button\"> Volver</a>
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
                                    <a href=\"AgregarCancion.html\" data-role=\"button\"> Volver</a>
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
                            $nombreCancion = explode("\\", $source);
                            $nombreCancion = $nombreCancion[sizeof($nombreCancion) - 1];
                            $nombreCancion = str_replace("tmp", $extensionArchivo, $nombreCancion);

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
                        /*

                          //--------------Leer Directorios----------
                          $dir = "canciones/";

                          // Open a known directory, and proceed to read its contents
                          if (is_dir($dir)) {
                          if ($dh = opendir($dir)) {
                          while (($file = readdir($dh)) !== false) {
                          echo "filename: $file - filetype: " . filetype($dir . $file) . "<br/>";
                          }
                          closedir($dh);
                          }
                          }
                          //--------------Fin Leer Directorios---------- */
                        ?>
                    </div>

                </div><!-- /grid-b -->

            </div><!-- /content -->

            <div data-role="footer" data-theme = "b" STYLE=" border-style:solid; border-color: #c73930;">
                <h6>UNIVERSIDAD DEL VALLE</h6>
                <h6>Aplicaciones en la Web y Redes Inhalambricas</h6>
            </div>


        </div><!-- /page -->
    </body>
</html>