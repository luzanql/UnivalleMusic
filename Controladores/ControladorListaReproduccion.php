<?php
include_once '../AccesoDatos/DaoListaReproduccion.php';
include_once '../Logica/ListaReproduccion.php';
include_once '../AccesoDatos/Session.php';

class ControladorListaReproduccion {

    private $daoListaReproduccion;

    function __construct() {
        $this->daoListaReproduccion = new DaoListaReproduccion();
    }

    function obtenerListasReproduccionPorUsuario() {
       //Modificar con sesion
        $sessionActual = Session::getInstance();
        $idUsuario = $sessionActual->usuario;
       //-----------
        return $this->daoListaReproduccion->getListasReproduccionPorUsuario($idUsuario);
    }
    
    function createListaReproduccion($nombre){
        $listaReproduccion = new ListaReproduccion();
        $listaReproduccion->setNombre($nombre);
        //Modificar cuando se implement la sesion
        $sessionActual = Session::getInstance();
        $idUsuario = $sessionActual->usuario;
        $listaReproduccion->setIdUsuario($idUsuario);
        //--------------------
        $listaReproduccion->setIdUsuario($idUsuario);
        $this->daoListaReproduccion->createListaReproduccion($listaReproduccion);
    }
    
    function deleteListaReproduccion($codigo){
        $this->daoListaReproduccion->deleteListaReproduccion($codigo);
    }

}
?>