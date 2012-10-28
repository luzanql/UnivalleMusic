<?php

class CancionesDescargadas {

    Private $codigoCancion;
    Private $codigoUsuario;

    function setCodigoCancion($codigoCancion) {
        $this->codigoCancion = $codigoCancion;
    }

    function setCodigoUsuario($codigoUsuario) {
        $this->codigoUsuario = $codigoUsuario;
    }

    function getCodigoCancion() {
        return $this->codigoCancion;
    }

    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

}

?>
	