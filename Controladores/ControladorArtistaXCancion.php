<?php

require_once'../Logica/ArtistaXCancion.php';
require_once'../Controladores/ControladorArtistaXCancion.php';
require_once '../AccesoDatos/DaoArtistaXCancion.php';

class ControladorArtistaXCancion{

    private $daoArtistaXCancion;

    function ControladorArtistaXCancion() 
    {
        $this->daoArtistaXCancion=new DaoArtistaXCancion(); 
    }
    
    function createArtistaXCancion($codigo_Cancion, $codigo_Artista)
    {
        $artistaxCancion = new ArtistaXCancion();
        $artistaxCancion->setCodigoArtista($codigo_Artista);
        $artistaxCancion->setCodigoCancion($codigo_Cancion);
        $this->daoArtistaXCancion->createArtistaXCancion($artistaxCancion);
    
    }
    function existeArtistaXCancion($artista,$cancion){
        return $this->daoArtistaXCancion->existeArtistasXCancion($artista, $cancion);
    } 


   
}
?>
