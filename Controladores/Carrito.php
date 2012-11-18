<?php


$opcion = $_GET['opcion'];
$codigo = $_GET['codigo'];
//$opcion=1;

switch ($opcion) {
    case 1:
      
		$sessionActual = new Session();
		$carrito = $sessionActual->carrito;
                $carrito[] = $codigo;
		$sessionActual->carrito = $carrito;
    
    break;
  

    case 2:
    
        $sessionActual = new Session();
        unset($sessionActual->carrito[$codigo]);// se supone que quita el elemento cancion de el array carrito
    
        break;



  
         
}
     
?>
