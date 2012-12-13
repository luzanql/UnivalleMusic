<?php

session_start();
include_once '../AccesoDatos/Session.php';
include_once '../Controladores/ControladorCancionesXUsuario.php';
include_once '../Controladores/ControladorCancion.php';
include_once '../Controladores/ControladorArtista.php';
include_once '../Controladores/ControladorCancionXListaReproduccion.php';
include_once '../Controladores/ControladorListaReproduccion.php';

function cmpTitulo($a, $b) {
    return strcmp($a[1], $b[1]);
}

function cmpArtista($a, $b) {
    return strcmp($a[2], $b[2]);
}

function estaEnLaLista($cancion,$lista){
    foreach ($lista as $unaCan){
        if ($cancion == $unaCan){
            return "Ya no me gusta";
        }
    }
    return "Me gusta";
}

$canciones = array();

$session = new Session();

$usuarioActual = $session->usuario;

$controladorCancionXListaReproduccion = new ControladorCancionXListaReproduccion();
$controladorCancionesXUsuario = new ControladorCancionesXUsuario();
$controladorArtista = new ControladorArtista();

if (isset($_GET['codLista'])) {
    $codLista = $_GET['codLista'];
    $codigosCanciones = $controladorCancionXListaReproduccion->obtenerCancionesDeListaReproduccion($codLista);
} else {
    $codigosCanciones = $controladorCancionesXUsuario->obtenerCancionesXUsuario($usuarioActual);
}
if ($codigosCanciones > 0) {
    $listaCanciones = array();
    foreach ($codigosCanciones as $unCodigoCancion) {

        $daoCanciones = new DaoCancion();
        $unaCancion = $daoCanciones->obtenerCancionPorCodigo($unCodigoCancion);
        $artista = $controladorArtista->obtenerNombreArtista($unaCancion['artista']);
        $listaCanciones[] = array($unCodigoCancion, $unaCancion['nombre'], $artista);
    }

    if (isset($_GET['orden'])) {
        $opcion = $_GET['orden'];
        if($opcion == 1){
            usort($listaCanciones, 'cmpTitulo');
        }else if($opcion == 2){
            usort($listaCanciones, 'cmpArtista');
        }
    }
    
    $controladorListaReproduccion = new ControladorListaReproduccion();
    $codListaFavorita = $controladorListaReproduccion->getCodigoListaFavoritaPorUsuario($usuarioActual);
    $cancionesFavoritas = $controladorCancionXListaReproduccion->obtenerCancionesDeListaReproduccion($codListaFavorita);
    
    foreach ($listaCanciones as $unaCancionOrdenada) {

        $daoCanciones = new DaoCancion();
        $unaCancion = $daoCanciones->obtenerCancionPorCodigo($unCodigoCancion);
        $artista = $controladorArtista->obtenerNombreArtista($unaCancion['artista']);
        $canciones[] = '<li rel="../Recursos/Canciones/' . $unaCancionOrdenada[0] . '" ondblclick="reproducirDobleClick($(this));">
                                            <strong>' . $unaCancionOrdenada[1] . '</strong>
                                            <em>' . $unaCancionOrdenada[2] . '</em><a href="#agregarAListas" style="color: blue;" name="' . $unaCancionOrdenada[0] .
                '" data-rel="popup" data-position-to="window" data-transition="pop" onclick=\'llenarListasReproduccion("' . $unaCancionOrdenada[0] . '",1);\'>Agregar a Listas</a>
                                            <a style="color: blue;" data-mini="true" name="' . $unaCancionOrdenada[0] . '" onclick=\'meGusta("' . $unaCancionOrdenada[0] . '",$(this));\'>'.  estaEnLaLista($unaCancionOrdenada[0], $cancionesFavoritas).'</a>
                                                <a style="color: green;" data-mini="true" name="' . $unaCancionOrdenada[0] . '" onclick=\'descargar("' . $unaCancionOrdenada[0] . '");\'>Descargar</a>
                                            <a href="#eliminarDeListas" name="' . $unaCancionOrdenada[0] .
                '" data-rel="popup" data-position-to="window" data-transition="pop" onclick=\'llenarListasReproduccion("' . $unaCancionOrdenada[0] . '",2);\'>Eliminar de Listas</a>
                                            <a href="#eliminarCancion" name="' . $unaCancionOrdenada[0] .
                '" data-rel="popup" data-position-to="window" data-transition="pop" onclick=\'llenarListasReproduccion("' . $unaCancionOrdenada[0] . '",3);\'>Eliminar Cancion</a>                                            
                                                </li>';
    }
}
echo json_encode($canciones);
?>