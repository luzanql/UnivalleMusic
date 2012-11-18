<?php
include_once '../AccesoDatos/DaoCarrito.php';
include_once '../AccesoDatos/Session.php';

class ControladorCarrito {

    private $daoCarrito;
   

    function __construct() {
        $this->daoCarrito = new DaoCarrito();
    }

    function addCancion($codigo) {
 
        $this->daoCarrito->addCancion($codigo);
    }

// este metodo trae las canciones subidas por el administrador
    function obtenerListaCancionesALaVenta() {
        return $this->daoCarrito->getListaCancionesALaVenta();
    }

    function deleteCancion(Cancion $cancion) {
        $this->daoCarrito->deleteCancion($cancion);
    }

    // metodo que retorna el arreglo carrito[] donde estan las canciones q se han agregado al carrito
    function obtenerCancionesDelCarrito() {
        return $this->daoCarrito->getCancionesDelCarrito();
    }

}
?>
