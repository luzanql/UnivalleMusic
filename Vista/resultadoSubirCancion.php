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
                            <a href="index.html" data-role="button"> Mi Coleccion</a> 
                            <a href="index.html" data-role="button"> Listas de Reproduccion</a> 
                            <a href="index.html" data-role="button"> Comprar Musica</a>
                        </div>
                    </div>
                    <div class="ui-block-b" style="margin:3%">

                        <?php    
                        include('../Controladores/ControladorCancion.php');
                        //
                        $titulo=$_POST["titulo"];
                        $album=$_POST["album"];
                        $genero=$_POST["genero"];
                        $codigo='001';
                        
                        $controlador=new ControladorCancion();
                        $controlador->createCancion($titulo, $codigo, $album, $genero);
                     
                        //
                        if ($_FILES["track_file"]["error"] > 0) {
                            echo "Upload File: " . ini_get('upload_max_filesize') . "<br/>";
                            echo "Error: " . $_FILES["track_file"]["error"] . "<br />";
                        } else {
                            $file_name = $_FILES["track_file"]["name"];
                            $source = $_FILES["track_file"]["tmp_name"];
                            echo "Upload: " . $file_name . "<br />";
                            echo "Type: " . $_FILES["track_file"]["type"] . "<br />";
                            echo "Size: " . ($_FILES["track_file"]["size"] / 1024) . " Kb<br />";
                            echo "Stored in: " . $source;
                            /*
                              copy($source, "canciones/".$file_name);
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
                        }
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