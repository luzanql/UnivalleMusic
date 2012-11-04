<?php
require_once'../AccesoDatos/DaoCancion.php';
require_once'../Logica/Cancion.php';

class ControladorCancion{

    private $daocancion;

    function ControladorCancion() {
        $this->daocancion = new DaoCancion();
    }

  
    
    function createCancion($titulo,$album,$genero,$artista){
        $cancion=new Cancion();
        $cancion->setTitulo($titulo);
        $cancion->setAlbum($album);
        $cancion->setGenero($genero);
        $cancion->setArtista($artista);
        $this->daocancion->createCancion($cancion);
    }
    
    function obtenerCancion($nombre,$artista,$album){
        $cancion=$this->daocancion->obtenerCancion($nombre, $artista, $album);
        $miCancion=new Cancion();
        
        $titulo=$cancion ["titulo"];
        $artista=$cancion ["artista"];
        $album=$cancion ["album"];
        $codigo=$cancion ["codigo"];
        $genero=$cancion ["genero"];
        $miCancion->setTitulo($titulo);
        $miCancion->setAlbum($album);
        $miCancion->setArtista($artista);
        $miCancion->setCodigo($codigo);
        $miCancion->setGenero($genero);
        
        return $miCancion;
        
        
    }
    
    
    
    
   
}
?>
