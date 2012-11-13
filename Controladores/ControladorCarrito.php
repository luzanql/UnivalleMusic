<?php
include_once '../AccesoDatos/DaoCarrito.php';
include_once '../AccesoDatos/Session.php';

class ControladorCarrito {

    private $daoCarrito;

    function __construct() {
        $this->daoCarrito = new DaoCarrito();
    }
    
    function addCancion(Cancion $cancion){
        $sessionActual = Session::getInstance();
        $idUsuario = $sessionActual->usuario;
        $cancion = $this->daoCarrito->addCancion($cancion,$idUsuario );
    }

	function obtenerListaCancionesCarrito() {
        return $this->daoCarrito->getListaCancionesCarrito();
    }
    
    function deleteCancion(Cancion $cancion){
        $this->daoCarrito->deleteCancion($cancion);
    }
	
}
?>
    
    
    
}



?>
