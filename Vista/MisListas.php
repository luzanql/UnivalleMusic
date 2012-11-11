<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mis Listas de Reproduccion</title>
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
                    <div class="ui-block-b" style=" margin:3%" >
                        
                        <?php
                        include_once '../Controladores/ControladorListaReproduccion.php';
                        $controlador = new ControladorListaReproduccion();
                        
                        if($_POST){
                            $nombre = $_POST['nombre'];
                            $controlador->createListaReproduccion($nombre);
                            echo "<h2>Se ha creado la Lista de Reproduccion: $nombre con exito!</h2>";
                            }
                        ?>
                                
                        <h1>Mis Listas</h1>
                        <table>
                            <tr>
                                <td>
                            <div data-role="controlgroup" data-type="horizontal" data-mini="true">
                                <a href="#CrearLista" data-rel="dialog" data-role="button" data-icon="plus" >Crear Lista</a>
                            </div>
                                </td>
                            </tr>

                        </table>
                        <table >
                            <tr>
                                <th>Nombre de la Lista </th>
                                
                            </tr>
                            <tr>
                                <td></td>                              
                            </tr>
                        </table>
                    </div>

                </div><!-- /grid-b -->

            </div><!-- /content -->

            <div data-role="footer" data-theme = "b" STYLE=" border-style:solid; border-color: #c73930;">
                <h6>UNIVERSIDAD DEL VALLE</h6>
                <h6>Aplicaciones en la Web y Redes Inhalambricas</h6>
            </div>


        </div><!-- /page -->

         <div data-role="page" id="CrearLista" data-theme= "a">
            <div data-role="header" data-theme= "b" data-transition="slidedowm" > <h3>Nuevo Lista Reproduccion</h3></div>
            <div data-role="content" align= "center" data-theme = "a">
                 <form name="formCrearLista" action="MisListas.php" method="post" enctype="multipart/form-data">
                                <label for="basic" data-mini="true">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" value="" data-mini="true"  required="" />
                                <input  data-role="button" value="Crear Lista" type="submit"/>                                    
                            </form>
            </div>
         </div>
        
        

    </body>
</html>
