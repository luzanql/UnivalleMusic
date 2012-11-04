<?php
require_once'../AccesoDatos/DaoArtista.php';
require_once'../Logica/Artista.php';

class ControladorArtista {

    private $daoArtista;

    function ControladorArtista() {
        $this->daoArtista=new DaoArtista();
    }
    
    
    function createArtista($nombre){
        $artista=new Artista();    
        $artista->setNombre($nombre);
        $this->daoArtista->createArtista($artista);        
        
    }
    
    function existeArtista($nombre){
        
        return $this->daoArtista->existeArtista($nombre);
    }
    
    function obtenerCodigoArtista($nombre){
        
        return $this->daoArtista->obtenerCodigoArtista($nombre);
    }
    

}

?>
