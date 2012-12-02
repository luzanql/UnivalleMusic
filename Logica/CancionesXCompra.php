<?php

class CancionesXListaReproduccion{
    
    Private $codigoCancion;
    Private $codigoLista;
    
  

    function setCodigoCancion($codigoCancion) {
        $this->codigoCancion = $codigoCancion;
    }

    public function setCodigoLista($codigoLista) {
        $this->codigoLista = $codigoLista;
    }

    public function getCodigoCancion() {
        return $this->codigoCancion;
    }

    public function getCodigoLista() {
        return $this->codigoLista;
    }



    
    
}
?>
