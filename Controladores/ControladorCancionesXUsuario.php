<?php

require_once'../Logica/CancionesXUsuario.php';
require_once '../AccesoDatos/DaoCancionesXUsuario.php';
require_once '../AccesoDatos/Session.php';

class ControladorCancionesXUsuario{

    private $daoCancionesXUsuario;

    function ControladorCancionesXUsuario() 
    {
        $this->daoCancionesXUsuario=new DaoCancionesXUsuario();
    }
    
    function createCancionesXUsuario($codigo_cancion)
    {
        $sessionActual = new Session();
        $codigo_usuario = $sessionActual->usuario;
        $cancionXUsuario = new CancionesXUsuario();
        $cancionXUsuario->setCodigoCancion($codigo_cancion);
        $cancionXUsuario->setCodigoUsuario($codigo_usuario);
        $this->daoCancionesXUsuario->createCancionXUsuario($cancionXUsuario);
    
    }
    function existeCancionXUsuario($cancion,$usuario){
        return $this->daoCancionesXUsuario->existeCancionXUsuario($usuario, $cancion);
    } 
    
    function obtenerCancionesXUsuario($usuario){
        return $this->daoCancionesXUsuario->obtenerCancionesXUsuario($usuario);        
    }
    
    function eliminarCancionXUsuario($codigo, $usuario){
        return $this->daoCancionesXUsuario->eliminarCancionXUsuario($codigo, $usuario);
    }
}
?>
