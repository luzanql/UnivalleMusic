<?php include_once '../Recursos/Scripts/Login.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Subir Cancion</title>
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
                <img src="../Recursos/Banner.png" style="width: 80%; height: 100%;"/>
                <div style="float:right;">
                    <img src="../Recursos/carrito.jpeg" style=" width:50%; height: 50%; "  />

                    <div style="padding: 1%">                        
                        <?php
                        echo "Usuario:" . $_SESSION['usuario'];
                        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
                        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado                             
                        ?>
                    </div>
                </div >


            </div><!-- /header -->

            <div data-role="content" data-theme = "a">	
                <div class="ui-grid-b">
                    <div class="ui-block-a" style="width:21%; margin:3%">

                        <div data-role="controlgroup"> 
                            <a href="../Vista/MiPerfil.php" data-role="button"> Mi Perfil </a> 
                            <a href="../Vista/MiColeccion.php" data-role="button"> Mi Coleccion</a> 
                            <a href="../Vista/MisListas.php" data-role="button"> Listas de Reproduccion</a> 
                            <a href="../Vista/ComprarMusica.php" data-role="button"> Comprar Musica</a>
                            <a href="../Vista/Reportes.php" data-role="button"> Reportes </a>
                        </div>

                    </div>

                    <div class="ui-block-b" style="width:25%;margin:3%">
                        <h3>Subir Canción</h3>
                        <h5>Ficha de la Canción</h5>
                        <div id="FichaCancion">
                            <form name="formSubirCancion" action="resultadoSubirCancion.php" method="post" data-ajax="false" enctype="multipart/form-data">
                                <label for="basic" data-mini="true">T&iacute;tulo:</label> <input type="text" name="titulo" id="titulo" value="" data-mini="true"  required="" />
                                <label for="basic" data-mini="true">Artista:</label><input type="text" name="artista" id="artista" value=""  data-mini="true"  required=""/>
                                <label for="basic" data-mini="true">&Aacute;lbum:</label><input type="text" name="album" id="album" value=""  data-mini="true" required=""/>
                                <label for="basic" data-mini="true">G&eacute;nero:</label><input type="text" name="genero" id="genero" value=""  data-mini="true" required=""/>

                                <input type="file" id="track" class="radius_3" name="track_file" /><!--Campo de examinar-->
                                <input  data-role="button" value="Subir" type="submit"/> 

                            </form>
                            <script>
                                  
                                $( "#artista").autocomplete({
                                    source:  "../AccesoDatos/AutoCompletar.php?opcion=3", 
                                    minLength:2,
                                    select: function ( event, ui ) {}
                                });
                                  
                                $( "#album" ).autocomplete({
                                    source:  "../AccesoDatos/AutoCompletar.php?opcion=4", 
                                    minLength:2,
                                    select: function ( event, ui ) {}
                                });
                                  
                                $( "#genero" ).autocomplete({
                                    source:  "../AccesoDatos/AutoCompletar.php?opcion=1", 
                                    minLength:2,
                                    select: function ( event, ui ) {}
                                });
                                    
                            </script>
                        </div>
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
