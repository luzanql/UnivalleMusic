<?php

require_once'../Logica/ArtistasXAlbum.php';
require_once '../Controladores/ControladorArtistaxAlbum.php';
require_once '../AccesoDatos/DaoArtistaxAlbum.php';

class ControladorArtistaxAlbum{

    private $daoArtistasxAlbum;

    function ControladorArtistaxAlbum() 
    {
        $this->daoArtistasxAlbum=new DaoArtistaxAlbum();
    }
    
    function createArtistaxalbum($codigo_Album, $codigo_Artista)
    {
        $artistaxAlbum = new ArtistaXAlbum();
        $artistaxAlbum->setCodigoAlbum($codigo_Album);
        $artistaxAlbum->setCodigoArtista($codigo_Artista);
        $this->daoArtistasxAlbum->createArtistaXAlbum($artistaxAlbum);
    
    }
    function existeArtistaXAlbum($artista,$album){
        return $this->daoArtistasxAlbum->existeArtistasXAlbum($album, $artista);
    } 

  
  
    
    
    
    
    
   
}
?>
