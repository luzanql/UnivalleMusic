<?php

session_start();
include_once '../AccesoDatos/Session.php';
include_once '../Controladores/ControladorListaReproduccion.php';

$opcion = $_GET['opcion'];

//$opcion=1;

switch ($opcion) {
    //obtener datos de las listas del usuario
    case 1:
        $controladorListaReproduccion=new ControladorListaReproduccion();
        $listas=$controladorListaReproduccion->obtenerListasReproduccionPorUsuario();
        $tabla=array();
            
            
            for ($index = 0; $index < count($listas); $index++) {
                $codigo=$listas[$index][0];
                $nombre=$listas[$index][1];
                $fila=array();
                $fila[]=$codigo;
                $fila[]=$nombre;
                $tabla[]=$fila;
                
                }
               echo json_encode($tabla);
               break;
           
     

   

    
}
?>
