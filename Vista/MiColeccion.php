<?php include_once '../Recursos/Scripts/Login.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi Coleccion</title>
        <link rel="stylesheet" href="../themes/male.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

        <link rel="stylesheet" type="text/css" href="../themes/reproductor.css">
        <script type="text/javascript" src="../Recursos/Scripts/reproductor.js"></script>
        <script type="text/javascript" src="../Recursos/Scripts/ManejaCanciones.js"></script>
    </head>
    <body onunload="pausarCancion();">

        <div data-role="page" data-theme= "a">

            <div data-role="header" data-theme ="b" style=" height: 167px;"><!--background-image: url(banner.png); -->
                <img src="../Recursos/Banner.png" style="width: 80%; height: 100%;"/>
                <div style="float:right;">
                    <a href="verCarrito.php" data-rel="dialog" >
                        <img src="../Recursos/carrito.jpeg" style=" width:50%; height: 50%; "  /></a>
                    <div id="usuarioLogueado">   
                        <?php
                        $usuarioActual = $_SESSION['usuario'];
                        echo "Usuario: " . $usuarioActual . "<br/>";
                        ?>                        
                    </div>
                    <div><a href='../Recursos/Scripts/Logout.php'>Cerrar Sesi&oacute;n</a></div>
                </div >
            </div><!-- /header -->           


            <div data-role="content" data-theme = "a">	
                <div class="ui-grid-b">
                    <div class="ui-block-a" style="width:250px; margin:3%">

                        <div data-role="controlgroup"> 
                            <a href="../Vista/MiPerfil.php" data-role="button"> Mi Perfil </a> 
                            <a href="../Vista/MiColeccion.php" data-role="button"> Mi Coleccion</a> 
                            <a href="../Vista/MisListas.php" data-role="button"> Listas de Reproduccion</a> 
                            <a href="../Vista/ComprarMusica.php" data-role="button"> Comprar Musica</a>
                        </div>
                    </div>
                    <div class="ui-block-b" style=" margin:3%" >

                        <?php
                        if (isset($_GET['nombreLista']) && isset($_GET['codLista'])) {
                            $nombreLista = $_GET['nombreLista'];
                            echo "<h1 id='tituloLista' name='".$_GET['codLista']."'>" . $nombreLista . "</h1>";
                        } else {
                            echo "<h1 id='tituloLista' name=''>Mi Colecci&oacute;n</h1>";
                        }
                        ?>                                               
                        <table>
                            <tr>
                                <td>
                                    <div data-role="controlgroup" data-type="horizontal" data-mini="true">
                                        <a href="../Vista/AgregarCancion.php" data-role="button" data-icon="plus" >Subir Cancion</a>
                                    </div>
                                </td>
                                <td>
                                    <fieldset data-role="controlgroup" data-type="horizontal">
                                        <select name="mostrarListasReprocuccion" id="listasReprocuccion" data-mini="true" >
                                            <option value="ninguna">Lista de Reproducci&oacute;n</option>
                                            <option value="miColeccion">Mi Colecci&oacute;n</option>
                                            <?php
                                            include_once '../Controladores/ControladorListaReproduccion.php';
                                            $controladorListaReproduccion = new ControladorListaReproduccion();
                                            $listasPorUsuario = $controladorListaReproduccion->getCodigoNombreListasPorUsuario($usuarioActual);
                                            if ($listasPorUsuario > 0) {
                                                foreach ($listasPorUsuario as $unaLista) {
                                                    echo "<option value='" . $unaLista[0] . "'>" . $unaLista[1] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </fieldset>                                    
                                </td>
                                <td>
                                    <fieldset data-role="controlgroup" data-type="horizontal">
                                        <select name="mostrarListasReprocuccion" id="ordenarListasReprocuccion" data-mini="true" >
                                            <option>Ordenar por:</option>
                                            <option>Titulo Cancion</option>
                                            <option>Artista</option>
                                        </select>
                                    </fieldset>                                    
                                </td>

                            </tr>

                        </table>


                        <div id="divReproductor">
                            <div id="divInfo">
                                <div id="divLogo" style="width: 15%;">
                                    <img src="../Recursos/logo UM.png" align="left" width="100%">
                                </div>
                                <div id="divInfoCancion">
                                    <label id="lblCancion"><strong>Nombre: </strong><span>-</span></label>
                                    <label id="lblArtista"><strong>Artista: </strong><span>-</span></label>
                                    <label id="lblDuracion"><strong>Duraci&oacute;n: </strong><span>-</span></label>
                                    <label id="lblEstado"><strong>Transcurrido: </strong><span>-</span></label>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div id="divControles">
                                <input type="image" src="../Recursos/ImgReproductor/reproducir.png" id="btnReproducir" title="Reproducir" >
                                <input type="image" src="../Recursos/ImgReproductor/pausar.png" id="btnPausar" title="Pausar/Continuar">
                                <input type="image" src="../Recursos/ImgReproductor/anterior.png" id="btnAnterior" title="Anterior">
                                <input type="image" src="../Recursos/ImgReproductor/siguiente.png" id="btnSiguiente" title="Siguiente">
                                <input type="image" src="../Recursos/ImgReproductor/subir-volumen.png" id="btnSubirVolumen" title="Subir volumen">
                                <input type="image" src="../Recursos/ImgReproductor/bajar-volumen.png" id="btnBajarVolumen" title="Bajar volumen">
                                <input type="image" src="../Recursos/ImgReproductor/silencio.png" id="btnSilencio" title="Poner/Quitar silencio">
                                <input type="image" src="../Recursos/ImgReproductor/repetir.png" id="btnRepetir" title="Repetir la lista al finalizar"> 
                            </div>
                            <div id="divProgreso">
                                <div id="divBarra"></div>
                            </div>
                            <div id="divLista">
                                <ol id="olCanciones">
                                    
                                </ol>
                            </div>				
                        </div>
                    </div>

                </div><!-- /grid-b -->

            </div><!-- /content -->

            <div data-role="footer" data-theme = "b" STYLE=" border-style:solid; border-color: #c73930;">
                <h6>UNIVERSIDAD DEL VALLE</h6>
                <h6>Aplicaciones en la Web y Redes Inhalambricas</h6>
            </div>

            <div data-role="popup" id="agregarAListas" data-overlay-theme="b" >
                <h3>Agregar a las Listas de Reproduccion:</h3>
                <div data-role="fieldcontain" style="width: 80%;">
                    <fieldset id="checkboxListasAgregar" data-theme="a" data-type="vertical" data-role="controlgroup">

                    </fieldset>
                </div>
                <a data-role="button"
                   data-rel="back"
                   id="btnAgragarAListas"
                   data-inline="true"
                   data-mini="true">Agregar Canciones a Listas...</a>
                <a data-role="button" data-rel="back" data-inline="true" data-mini="true">Cancel</a>	
            </div>

            <div data-role="popup" id="eliminarDeListas" data-overlay-theme="b" >
                <h3>Eliminar de las  Listas de Reproduccion:</h3>
                <div data-role="fieldcontain" style="width: 80%;">
                    <fieldset id="checkboxListasEliminar" data-theme="a" data-type="vertical" data-role="controlgroup">

                    </fieldset>
                </div>
                <a data-role="button"
                   data-rel="back"
                   id="btnEliminarDeListas"
                   data-inline="true"
                   data-mini="true">Eliminar Canciones de Listas...</a>
                <a data-role="button" data-rel="back" data-inline="true" data-mini="true">Cancel</a>	
            </div>

            <div data-role="popup" id="eliminarCancion" data-overlay-theme="b" >
                <h3>Eliminar Cancion de la Coleccion:</h3>
                <div id="contentEliminarCancion" data-role="fieldcontain" style="width: 80%;">

                </div>
                <a data-role="button"
                   data-rel="back"
                   id="btnEliminarCancion"
                   data-inline="true"
                   data-mini="true">Eliminar Canci&oacute;n</a>
                <a data-role="button" data-rel="back" data-inline="true" data-mini="true">Cancel</a>	
            </div>


        </div><!-- /page -->


    </body>
</html>
