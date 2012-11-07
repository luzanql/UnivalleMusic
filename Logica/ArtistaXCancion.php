<?php


class ArtistaXCancion
{
    Private $codigoCancion;
    Private $codigoArtista;
    
    
      function setCodigoCancion($codigoCancion) {
        $this->codigoCancion = $codigoCancion;
    }
    
        function setCodigoArtista($codigoArtista) {
        $this->codigoArtista = $codigoArtista;
    }
    
    function getCodigoCancion() {
        return $this->codigoCancion;
    }
    
    function getCodigoArtista() {
        return $this->codigoArtista;
    }
    
}


?>
