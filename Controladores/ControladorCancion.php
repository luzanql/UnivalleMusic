<?php
require_once'../AccesoDatos/DaoCancion.php';
require_once'../Logica/Cancion.php';

class ControladorCancion{

    private $daocancion;

    function ControladorCancion() {
        $this->daocancion = new DaoCancion();
    }

  
    
    function createCancion($titulo,$codigo,$album,$genero){
        $cancion=new Cancion();
        $cancion->setCodigo($codigo);
        $cancion->setTitulo($titulo);
        $cancion->setAlbum($album);
        $cancion->setGenero($genero);
        $this->daocancion->createCancion($cancion);
    }
    
   
}
?>
