<?php

class ArtistaXAlbum 
{
    Private $codigoAlbum;
    Private $codigoArtista;
    
    
      function setCodigoAlbum($codigoAlbum) {
        $this->codigoAlbum = $codigoAlbum;
    }
    
        function setCodigoArtista($codigoArtista) {
        $this->codigoArtista = $codigoArtista;
    }
    
    function getsetCodigoAlbum() {
        return $this->codigoAlbum;
    }
    
    function getCodigoArtista() {
        return $this->codigoArtista;
    }
    
}



?>
