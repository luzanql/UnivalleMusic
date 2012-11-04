<?php
require_once'../AccesoDatos/DaoCancion.php';
require_once'../Logica/ArtistasXAlbum.php';

class ControladorArtistasxAlbum{

    private $daoArtistasxAlbum;

    function ControladorCancion() 
    {
        $this->$daoArtistasxAlbum = new DaoArtistasxAlbum();   
    }
    
    function createControladorArtistaxalbum($codigo_Album, $codigo_Artista)
    {
        $artistaxAlbum = new ArtistaXAlbum();
        $artistaxAlbum->setCodigoAlbum($codigoAlbum);
        $artistaxAlbum->setCodigoArtista($codigoArtista);
        $this->daoArtistasxAlbum->createArtistaXAlbum($codigoAlbum, $codigoArtista);
    }

  
  
    
    
    
    
    
   
}
?>
