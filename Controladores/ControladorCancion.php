<?php
require_once'../AccesoDatos/DaoCancion.php';
require_once'../Logica/Cancion.php';

class ControladorCancion{

    private $daocancion;

    function ControladorCancion() {
        $this->daocancion = new DaoCancion();
    }  
    
    function createCancion($codigo,$titulo,$album,$genero,$artista){
        $cancion=new Cancion();
        $cancion->setCodigo($codigo);
        $cancion->setTitulo($titulo);
        $cancion->setAlbum($album);
        $cancion->setGenero($genero);
        $cancion->setArtista($artista);
        $this->daocancion->createCancion($cancion);
    }
    
    function obtenerCancion($nombre,$artista,$album){
        $cancion=$this->daocancion->obtenerCancion($nombre, $artista, $album);
        $miCancion=new Cancion();
        
        $titulo=$cancion ["nombre"];
        $artista=$cancion ["artista"];
        $album=$cancion ["codigo_Album"];
        $codigo=$cancion ["codigo"];
        $genero=$cancion ["genero"];
        $miCancion->setTitulo($titulo);
        $miCancion->setAlbum($album);
        $miCancion->setArtista($artista);
        $miCancion->setCodigo($codigo);
        $miCancion->setGenero($genero);
        
        return $miCancion;
        
        
    }
    
      function obtenerCancionPorCodigo($codigo){
        $cancion=$this->daocancion->obtenerCancionPorCodigo($codigo);
        $miCancion=new Cancion();
        
        $titulo=$cancion ["nombre"];
        $artista=$cancion ["artista"];
        $album=$cancion ["codigo_Album"];
        $codigo=$cancion ["codigo"];
        $genero=$cancion ["genero"];
        $miCancion->setTitulo($titulo);
        $miCancion->setAlbum($album);
        $miCancion->setArtista($artista);
        $miCancion->setCodigo($codigo);
        $miCancion->setGenero($genero);
        
        return $miCancion;       
    }
    
    function eliminarCancion($codigo) {
        return $this->daocancion->eliminarCancion($codigo);
    }
}
?>
