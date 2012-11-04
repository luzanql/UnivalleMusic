<?php

require_once'../AccesoDatos/DaoAlbum.php';
require_once'../Logica/Album.php';

class ControladorAlbum {

    private $daoAlbum;

    function ControladorAlbum() {
        $this->daoAlbum = new DaoAlbum();
    }
    
    
    function createAlbum($nombre){
        $album=new Album();     
        $album->setNombre($nombre);
        $this->daoAlbum->createAlbum($album);
        
        
    }
    
    function existeAlbum($nombre){
        return $this->daoAlbum->existeAlbum($nombre);
    }
    
    function obtenerCodigoAlbum($nombre){
        
        return $this->daoAlbum->obtenerCodigoAlbum($nombre);
    }
    

}

?>
