<?php

include_once '../Controladores/ControladorCancion.php';

$opcion = "";
$cancion = "";
$usuario = "";

if (isset($_GET['opcion'])) {
    $opcion = $_GET['opcion'];
}

if (isset($_GET['cancion'])) {
    $cancion = $_GET['cancion'];
}

if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];
}

switch ($opcion) {
    //Caso 1 eliminar cancion
    case 1:
        $controladorCancion = new ControladorCancion();
        echo $controladorCancion->eliminarCancion($cancion);
        unlink ("../Recursos/Canciones/" . $cancion);
        break;
    //Caso 2: Obtiene codigo y titulo cancion
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
