<?php

require_once'../AccesoDatos/DaoCompra.php';
require_once'../Logica/Compra.php';
require_once '../AccesoDatos/Session.php';

class ControladorCompra {

    private $daoCompra;

    function ControladorCompra() {
        $this->daoCompra = new DaoCompra();
    }
    
    
    function createCompra($valor){
        $sessionActual = new Session();
        $codigo_usuario = $sessionActual->usuario;
        $compra=new Compra();
        $compra->setValor($valor);
        $compra->setFecha(date("d-m-Y"));
        $compra->setIdUsuario($codigo_usuario);
        $this->daoCompra->createCompra($compra);
        
        
    }
    
   
    
    function obtenerCodigoCompra($idUsuario,$valor,$fecha){
        
        return $this->daoCompra->obtenerCodigoCompra($idUsuario, $valor, $fecha);
    }
   
    

}

?>
