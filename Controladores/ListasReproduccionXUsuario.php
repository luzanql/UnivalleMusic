<?php

include_once '../AccesoDatos/DaoCancionXListaReproduccion.php';
include_once '../Logica/CancionesXListaReproduccion.php';
include_once '../AccesoDatos/DaoListaReproduccion.php';

$opcion = "";
$codigoLista = "";
$usuario = "";
$cancion = "";

if(isset($_GET['opcion'])){
    $opcion = $_GET['opcion'];
}

if(isset($_GET['codigoLista'])){
    $codigoLista = $_GET['codigoLista'];
}

if(isset($_GET['cancion'])){
    $cancion = $_GET['cancion'];
}

if(isset($_GET['usuario'])){
    $usuario = $_GET['usuario'];
}

switch ($opcion) {
    //Caso 1 agregar cancion a Lista de Reproduccion
    case 1:
        $daoCancionXListaReproduccion = new DaoCancionXListaReproduccion();
        $existe = $daoCancionXListaReproduccion->existeCancionXListaReproduccion($cancion, $codigoLista);
        if (!$existe) {
            $cancionXLista = new CancionesXListaReproduccion();
            $cancionXLista->setCodigoCancion($cancion);
            $cancionXLista->setCodigoLista($codigoLista);
            $daoCancionXListaReproduccion->createCancionXListaReproduccion($cancionXLista);
        }
        break;
    //Caso 2 eliminar cancion de la lista de reproduccion
    case 2:
        $daoCancionXListaReproduccion = new DaoCancionXListaReproduccion();
        $existe = $daoCancionXListaReproduccion->existeCancionXListaReproduccion($cancion, $codigoLista);
        if ($existe) {
            $daoCancionXListaReproduccion->deleteCancionXListaReproduccion($cancion, $codigoLista);
        }
        break;
    //Caso 3: Agergar cancion a Favoritas
    case 3:
        $daoListaReproduccion= new DaoListaReproduccion();
        $codigoCancion = $daoListaReproduccion->getCodigoListaFavoritaPorUsuario($usuario);
        echo $codigoCancion;
        break;
}
?>
