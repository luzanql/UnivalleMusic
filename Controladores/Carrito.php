<?php
session_start();
include_once '../AccesoDatos/Session.php';
include_once '../AccesoDatos/DaoCarrito.php';
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
                unset($carrito[$index]);
            }
            
        }
        $sessionActual->carrito=$carrito;
        // se supone que quita el elemento cancion de el array carrito
        echo "Cancion ".$codigo." eliminada del carrito";
        break;
        
        case 3:
            
            $daoCarrito= new DaoCarrito();
            $existe="false";
            $canciones=$daoCarrito->getCancionesDelCarrito();
            for($index=0;$index<count($canciones); $index++){
                if($codigo==$canciones[$index]){
                    echo $existe="true";
                    break;
                }else{
                    echo $existe;
                }
            }



  
         
}
     
?>
