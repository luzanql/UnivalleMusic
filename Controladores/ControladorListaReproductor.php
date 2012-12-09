<?php
session_start();
include_once '../AccesoDatos/Session.php';
include_once '../Controladores/ControladorCancionesXUsuario.php';
include_once '../Controladores/ControladorCancion.php';
include_once '../Controladores/ControladorArtista.php';
include_once '../Controladores/ControladorCancionXListaReproduccion.php';

$canciones = array();

$session = new Session();

$usuarioActual = $session->usuario;;

$controladorCancionesXUsuario = new ControladorCancionesXUsuario();
$controladorArtista = new ControladorArtista();

if (isset($_GET['codLista'])) {
    $codLista = $_GET['codLista'];
    $controladorCancionXListaReproduccion = new ControladorCancionXListaReproduccion();
    $codigosCanciones = $controladorCancionXListaReproduccion->obtenerCancionesDeListaReproduccion($codLista);
} else {
    $codigosCanciones = $controladorCancionesXUsuario->obtenerCancionesXUsuario($usuarioActual);
}
if ($codigosCanciones > 0) {
    foreach ($codigosCanciones as $unCodigoCancion) {

        $daoCanciones = new DaoCancion();
        $unaCancion = $daoCanciones->obtenerCancionPorCodigo($unCodigoCancion);
        $artista = $controladorArtista->obtenerNombreArtista($unaCancion['artista']);
        $canciones[] = '<li rel="../Recursos/Canciones/' . $unaCancion['codigo'] . '" ondblclick="reproducirDobleClick($(this));">
                                            <strong>' . $unaCancion['nombre'] . '</strong>
                                            <em>' . $artista . '</em><a href="#agregarAListas" style="color: blue;" name="' . $unCodigoCancion .
        '" data-rel="popup" data-position-to="window" data-transition="pop" onclick=\'llenarListasReproduccion("'.$unCodigoCancion.'",1);\'>Agregar a Listas</a>
                                            <a style="color: blue;" data-mini="true" name="' . $unCodigoCancion . '" onclick=\'meGusta("'.$unCodigoCancion.'",$(this));\'>Me Gusta</a>                                            
                                            <a href="#eliminarDeListas" name="' . $unCodigoCancion .
        '" data-rel="popup" data-position-to="window" data-transition="pop" onclick=\'llenarListasReproduccion("'.$unCodigoCancion.'",2);\'>Eliminar de Listas</a>
                                            <a href="#eliminarCancion" name="' . $unCodigoCancion .
        '" data-rel="popup" data-position-to="window" data-transition="pop" onclick=\'llenarListasReproduccion("'.$unCodigoCancion.'",3);\'>Eliminar Cancion</a>                                            
                                                </li>';
    }
}
echo json_encode($canciones);
?>