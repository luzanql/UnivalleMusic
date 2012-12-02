<?php

require_once'../Logica/CancionesXListaReproduccion.php';
require_once '../AccesoDatos/DaoCancionXListaReproduccion.php';

class ControladorCancionXListaReproduccion{

    private $daoCancionXListaReproduccion;

    function ControladorCancionXListaReproduccion() 
    {
        $this->daoCancionXListaReproduccion=new DaoCancionXListaReproduccion();
    }
    
    function createCancionXListaReproduccion($cancion, $lista)
    {
        $cancionXlista=new CancionesXListaReproduccion();
        $cancionXlista->setCodigoCancion($cancion);
        $cancionXlista->setCodigoLista($lista);
        $this->daoCancionXListaReproduccion->createCancionXListaReproduccion($cancionXlista);
    
    }
    
    function existeCancionXListaReproduccion($cancion,$lista){
        return $this->daoCancionXListaReproduccion->existeCancionXListaReproduccion($cancion, $lista);
    } 
    
    function deleteCancionXListaReproduccion($cancion,$lista){        
        $this->daoCancionXListaReproduccion->deleteCancionXListaReproduccion($cancion, $lista);
    }
    
    function obtenerCancionesDeListaReproduccion($lista){        
        return $this->daoCancionXListaReproduccion->obtenerCancionesDeListaReproduccion($lista);
    }


   
}
?>
