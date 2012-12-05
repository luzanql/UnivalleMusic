<?php

session_start();
include_once '../AccesoDatos/Session.php';
include_once '../AccesoDatos/DaoCancionXListaReproduccion.php';
include_once '../Logica/CancionesXListaReproduccion.php';
include_once '../AccesoDatos/DaoListaReproduccion.php';

$opcion = $_GET['opcion'];


switch ($opcion) {
    //Caso 1 agregar cancion a Lista de Reproduccion
    case 1:
        $codigoLista = $_GET['codigoLista'];
        $usuario = $_GET['usuario'];
        $cancion = $_GET['cancion'];
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
        $codigoLista = $_GET['codigoLista'];
        $usuario = $_GET['usuario'];
        $cancion = $_GET['cancion'];
        $daoCancionXListaReproduccion = new DaoCancionXListaReproduccion();
        $existe = $daoCancionXListaReproduccion->existeCancionXListaReproduccion($cancion, $codigoLista);
        if ($existe) {
            $daoCancionXListaReproduccion->deleteCancionXListaReproduccion($cancion, $codigoLista);
        }
        break;
        //obtener listas del usuario
        case 3:

             $sessionActual = new Session();
             $usuario = $sessionActual->usuario;

            $daoListaReproduccion=new DaoListaReproduccion();
            $listas=$daoListaReproduccion->getListasReproduccionPorUsuario($usuario);
            echo json_encode($listas);
}
?>
