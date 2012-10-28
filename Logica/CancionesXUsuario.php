<?php


class CancionesXUsuario{
    
    
    Private $codigoUsuario;
    Private $codigoCancion;
    

    function setCodigoUsuario($codigoUsuario) {
        $this->codigoUsuario = $codigoUsuario;
    }

    public function setCodigoCancion($codigoCancion) {
        $this->codigoCancion = $codigoCancion;
    }


    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

    public function getCodigoCancion() {
        return $this->codigoCancion;
    }


}


?>
