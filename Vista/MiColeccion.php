<?php session_start(); ?>
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
    </head>
    <body>

        <div data-role="page" data-theme= "a">

            <div data-role="header" data-theme ="b" style=" height: 167px;"><!--background-image: url(banner.png); -->
                <img src="../Recursos/Banner.png" style="width: 80%; height: 100%;"/>
                <div style="float:right;">
                    <div style="float:top;">
                        <img src="../Recursos/carrito.jpeg" style=" width:100%; height: 80%; "  />
                    </div>
                    <div id="usuarioLogueado" style="float:button; color: white;">
                        <?php echo $_SESSION['usuario'] ?>
                    </div>
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
                        if (isset($_GET['nombreLista'])) {
                            $nombreLista = $_GET['nombreLista'];
                            echo "<h1>" . $nombreLista . "</h1>";
                        } else {
                            echo "<h1>Mi Colecci&oacute;n</h1>";
                        }
                        ?>                                               
                        <table>
                            <tr>
                                <td>
                                    <div data-role="controlgroup" data-type="horizontal" data-mini="true">
                                        <a href="../Vista/AgregarCancion.html" data-role="button" data-icon="plus" >Subir Cancion</a>
                                    </div>
                                </td>
                                <td>
                                    <fieldset data-role="controlgroup" data-type="horizontal">
                                        <select name="ordenar" id="ordenarPor" data-mini="true" >
                                            <option value="pop">Ordenar Por</option>
                                            <option value="titulo">T&iacute;tulo</option>
                                            <option value="album">&Aacute;lbum</option>
                                            <option value="artista">Artista</option>
                                        </select>
                                    </fieldset>
                                </td>

                            </tr>

                        </table>

                        <script type="text/javascript" src="../Recursos/Scripts/reproductor.js"></script>
                        <script type="text/javascript" src="../Recursos/Scripts/ManejaCanciones.js"></script>
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

                                    <li rel="../Recursos/Canciones/Tone_Urbano.mp3">
                                        <strong>Gingle</strong>
                                        <em>Univalle Music</em>
                                        <a href="#agregarAListas" name="Tone_Urbano.mp3" data-rel="popup" data-position-to="window" data-transition="pop">Agregar a Listas</a>
                                    </li>

                                    <?php
                                    include_once '../AccesoDatos/Session.php';
                                    include_once '../Controladores/ControladorCancionesXUsuario.php';
                                    include_once '../Controladores/ControladorCancion.php';
                                    include_once '../Controladores/ControladorArtista.php';

                                    $session = new Session();

                                    $usuarioActual = $session->usuario;

                                    $controladorCancionesXUsuario = new ControladorCancionesXUsuario();
                                    $controladorArtista = new ControladorArtista();

                                    $codigosCanciones = $controladorCancionesXUsuario->obtenerCancionesXUsuario($usuarioActual);

                                    if ($codigosCanciones > 0) {
                                        foreach ($codigosCanciones as $unCodigoCancion) {

                                            $daoCanciones = new DaoCancion();
                                            $unaCancion = $daoCanciones->obtenerCancionPorCodigo($unCodigoCancion);
                                            $artista = $controladorArtista->obtenerNombreArtista($unaCancion['artista']);
                                            echo '<li rel="../Recursos/Canciones/' . $unaCancion['codigo'] . '">
                                            <strong>' . $unaCancion['nombre'] . '</strong>
                                            <em>' . $artista . '</em><a href="#agregarAListas" name="'.$unCodigoCancion.
                                                    '" data-rel="popup" data-position-to="window" data-transition="pop">Agregar a Listas</a>
                                            </li>';
                                        }
                                    }
                                    ?>

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
                    <fieldset id="checkboxListas" data-role="controlgroup">
                        <label><input type="checkbox" name="checkbox-0" /> Favoritas </label>
                    </fieldset>
                </div>

                <a data-role="button" data-rel="back" data-inline="true" data-mini="true">Cancel</a>	
            </div>


        </div><!-- /page -->


    </body>
</html>
