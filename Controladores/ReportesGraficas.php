<?php

include_once ("../Controladores/ControladorReportes.php");

$opcion = $_GET['opcion'];

switch ($opcion)
{
    //Grafico 1 Canciones x Artista
       case 1:
      
           $controladorReportes=new ControladorReportes();
           $tabla= $controladorReportes->getNCancionesXArtista();
           //echo 'hola';
           echo json_encode($tabla);
//           print_r($tabla);
            break;   
        
        case 2: //grafico 5b canciones mas escucha\da
            $controladorReportes = new ControladorReportes();
            $tabla = $controladorReportes ->getNCancionesCompradas();
           echo json_encode($tabla);
//           print_r($tabla);
            break;  }


?>
