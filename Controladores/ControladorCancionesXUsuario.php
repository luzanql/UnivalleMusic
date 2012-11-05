<?php

require_once'../Logica/CancionesXUsuario.php';
require_once '../AccesoDatos/DaoCancionesXUsuario.php';

class ControladorCancionesXUsuario{

    private $daoCancionesXUsuario;

    function ControladorCancionesXUsuario() 
    {
        $this->daoCancionesXUsuario=new DaoCancionesXUsuario();
    }
    
    function createCancionesXUsuario($codigo_cancion)
    {
        $codigo_usuario=$_SESSION['usuario'];
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
    
   
}
?>
