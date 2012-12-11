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
        $sessionActual = new Session();
        $idUsuario = $sessionActual->usuario;
       //-----------
        return $this->daoListaReproduccion->getListasReproduccionPorUsuario($idUsuario);
    }
    
    function createListaReproduccion($nombre){
     
        $listaReproduccion = new ListaReproduccion();
        $listaReproduccion->setNombre($nombre);
        //Modificar cuando se implement la sesion
        $sessionActual = new Session();
        $idUsuario = $sessionActual->usuario;
        $listaReproduccion->setIdUsuario($idUsuario);
        //--------------------
        $listaReproduccion->setIdUsuario($idUsuario);
        $this->daoListaReproduccion->createListaReproduccion($listaReproduccion);
    }
    
     function createListaReproduccionFavoritas($user){
        $listaReproduccion = new ListaReproduccion();
        $nombre="Favoritas";
        $listaReproduccion->setNombre($nombre);
        //Modificar cuando se implement la sesion
         $idUsuario = $user;
        $listaReproduccion->setIdUsuario($idUsuario);
        $this->daoListaReproduccion->createListaReproduccion($listaReproduccion);
    }
    
     function createListaReproduccionCompartidas($user){
        $listaReproduccion = new ListaReproduccion();
        $nombre="Compartidas";
        $listaReproduccion->setNombre($nombre);
        //Modificar cuando se implement la sesion
         $idUsuario = $user;
        $listaReproduccion->setIdUsuario($idUsuario);
        $this->daoListaReproduccion->createListaReproduccion($listaReproduccion);
    }
    
    function deleteListaReproduccion($codigo){
        $this->daoListaReproduccion->deleteListaReproduccion($codigo);
    }
    
    
    function obtenerCodigoLista($nombre){
        session_start();
        $sessionActual = new Session();
        $idUsuario = $sessionActual->usuario;
        return $this->daoListaReproduccion->obtenerCodigoLista($nombre, $idUsuario);
    }
    
    function existeLista($lista){
      
        $sessionActual = new Session();
        $usuario = $sessionActual->usuario;
        return $this->daoListaReproduccion->existeLista($usuario, $lista);
    }
    
    function getCodigoNombreListasPorUsuario($idUsuario){
        return json_decode($this->daoListaReproduccion->getCodigoNombreListasPorUsuario($idUsuario));
    }
    
    function getCodigoListaFavoritaPorUsuario($idUsuario){
        return $this->daoListaReproduccion->getCodigoListaFavoritaPorUsuario($idUsuario);
    }

}
?>