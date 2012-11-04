<?php
require_once '../AccesoDatos/DaoListaReproduccion.php';
require_once '../Logica/ListaReproduccion.php';

class ControladorListaReproduccion {

    private $daoListaReproduccion;

    function ControladorListaReproduccion() {
        $this->daoListaReproduccion = new DaoListaReproduccion();
    }

    function obtenerListasReproduccion() {
       //Modificar con sesion
        $idUsuario = 1;
       //-----------
        return $this->daoListaReproduccion->getListasReproduccionPorUsuario($idUsuario);
    }
    
    function createListaReproduccion($nombre){
        $listaReproduccion = new ListaReproduccion();
        $listaReproduccion->setNombre($nombre);
        //Modificar cuando se implement la sesion
        $idUsuario = 1;
        //--------------------
        $listaReproduccion->setIdUsuario($idUsuario);
        $this->daoListaReproduccion->createListaReproduccion($listaReproduccion);
    }
    
    function deleteListaReproduccion($codigo){
        $this->daoListaReproduccion->deleteListaReproduccion($codigo);
    }

}
?>