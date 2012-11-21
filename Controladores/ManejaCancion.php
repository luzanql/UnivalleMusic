<?php

include_once '../Controladores/ControladorCancion.php';

$opcion = $_GET['opcion'];
$cancion = $_GET['cancion'];

switch ($opcion) {
    //Caso 1 eliminar cancion
    case 1:
        $controladorCancion = new ControladorCancion();
        echo $controladorCancion->eliminarCancion($cancion);
        unlink ("../Recursos/Canciones/" . $cancion);
        break;
    case 2:
        $controladorCancion = new ControladorCancion();
        $cancion = $controladorCancion->obtenerCancionPorCodigo($cancion);
        $result = array();
        $result[] = $cancion->getCodigo();
        $result[] = $cancion->getTitulo();
        echo json_encode($result);
        break;
    }

?>
