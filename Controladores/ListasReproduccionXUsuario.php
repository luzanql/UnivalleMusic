<?php

include_once '../AccesoDatos/DaoCancionXListaReproduccion.php';
include_once '../Logica/CancionesXListaReproduccion.php';

$opcion = $_GET['opcion'];
$codigoLista = $_GET['codigoLista'];
$usuario = $_GET['usuario'];
$cancion = $_GET['cancion'];

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
}
?>
