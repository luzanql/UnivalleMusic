<?php

session_start();
include_once '../AccesoDatos/Session.php';
include_once '../AccesoDatos/DaoCarrito.php';
$opcion = $_GET['opcion'];

//$opcion=1;

switch ($opcion) {
    case 1:
        $codigo = $_GET['codigo'];
        $sessionActual = new Session();
        $carrito = $sessionActual->carrito;
        $carrito[] = $codigo;
        $carrito = array_values($carrito);
        $sessionActual->carrito = $carrito;
        echo "Cancion " . $codigo . " agregada al carrito";

        break;


    case 2:
        $codigo = $_GET['codigo'];
        $sessionActual = new Session();
        $carrito = $sessionActual->carrito;
        for ($index = 0; $index < count($carrito); $index++) {
            if ($carrito[$index] === $codigo) {
                unset($carrito[$index]);
                $carrito = array_values($carrito);
            }
        }
        $sessionActual->carrito = $carrito;
        // se supone que quita el elemento cancion de el array carrito
        echo "Cancion " . $codigo . " eliminada del carrito";
        break;

    case 3:
        $codigo = $_GET['codigo'];
        $daoCarrito = new DaoCarrito();
        $canciones = $daoCarrito->getCancionesDelCarrito();
        for ($index = 0; $index < count($canciones); $index++) {
            if ($codigo == $canciones[$index]) {
                echo "true";
                break;
            } else {
                echo "false";
            }
        }
        break;

    case 4:
        $daoCarrito = new DaoCarrito();
        $canciones = $daoCarrito->getCancionesDelCarrito();
        echo "".count($canciones);
        break;
}
?>
