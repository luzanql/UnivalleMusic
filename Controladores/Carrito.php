<?php
session_start();
include_once '../AccesoDatos/Session.php';

$opcion = $_GET['opcion'];
$codigo = $_GET['codigo'];
//$opcion=1;

switch ($opcion) {
    case 1:      
		$sessionActual = new Session();
		$carrito = $sessionActual->carrito;
                $carrito[] = $codigo;
		$sessionActual->carrito = $carrito;
                echo "Cancion ".$codigo." agregada al carrito";
    
    break;
  

    case 2:
    
        $sessionActual = new Session();
        $carrito=$sessionActual->carrito;
        for($index=0;$index<count($carrito);$index++){
            if($carrito[$index]===$codigo){
                unset($sessionActual->carrito[$index]);
            }
            
        }
        // se supone que quita el elemento cancion de el array carrito
        echo "Cancion ".$codigo." eliminada del carrito";
        break;



  
         
}
     
?>
