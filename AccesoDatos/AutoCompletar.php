<?php

require_once 'conexion.php';

$conexion = new Conexion();
$opcion = $_GET['opcion'];

//$opcion=1;

switch ($opcion) {
    case 1:
        $term = trim(strip_tags($_GET['term']));
        $conexion->Conectar();
        $sql = "SELECT Nombre FROM Genero WHERE Nombre LIKE '%$term%'";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = $row ['Nombre'];
        }
        $conexion->cerrar();
        echo json_encode($filas);
        break;

    case 2:
        $term = trim(strip_tags($_GET['term']));
        $conexion->Conectar();
        $sql = "SELECT nombre FROM Nacionalidad WHERE nombre LIKE '%$term%'";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = $row ["nombre"];
        }
        $conexion->cerrar();
        echo json_encode($filas);
        break;



    case 3:
        $term = trim(strip_tags($_GET['term']));
        $conexion->Conectar();
        $sql = "SELECT nombre FROM Artista WHERE nombre LIKE '%$term%'";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = $row ["nombre"];
        }
        $conexion->cerrar();
        echo json_encode($filas);
        break;


    case 4:

        $term = trim(strip_tags($_GET['term']));
        $conexion->Conectar();
        $sql = "SELECT nombre FROM Album WHERE nombre LIKE '%$term%'";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = $row ["nombre"];
        }
        $conexion->cerrar();
        echo json_encode($filas);
}
     
?>
