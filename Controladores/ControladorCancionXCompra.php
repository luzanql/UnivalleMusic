<?php

require_once'../Logica/CancionesXCompra.php';
require_once '../AccesoDatos/DaoCancionXCompra.php';

class ControladorCancionXCompra{

    private $daoCancionXCompra;

    function ControladorCancionXCompra() 
    {
        $this->daoCancionXCompra=new DaoCancionXCompra();
    }
    
    function createCancionXCompra($cancion, $compra)
    {
        $cancionXCompra=new CancionesXCompra();   
        $cancionXCompra->setIdCancion($cancion);
        $cancionXCompra->setIdCompra($compra);
        return $this->daoCancionXCompra->createCancionXCompra($cancionXCompra);
    
    }
    
   
}
?>
