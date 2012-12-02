<?php

require_once'../AccesoDatos/DaoCompra.php';
require_once'../Logica/Compra.php';
require_once '../AccesoDatos/Session.php';
date_default_timezone_set('America/Bogota');
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
        $compra->setFecha(date("Y-m-d H:i:s"));
        $compra->setIdUsuario($codigo_usuario);
        $codigo= $this->daoCompra->createCompra($compra);
        return $codigo;
        
        
    }
    
   
    
    function obtenerCodigoCompra($idUsuario,$valor,$fecha){
        
        return $this->daoCompra->obtenerCodigoCompra($idUsuario, $valor, $fecha);
    }
   
    

}

?>
