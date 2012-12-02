<?php

class CancionesXCompra {

    Private $idCompra;
    Private $idCancion;

    function getIdCompra() {
        return $this->idCompra;
    }

    public function setIdCompra($idCompra) {
        $this->idCompra = $idCompra;
    }

    public function getIdCancion() {
        return $this->idCancion;
    }

    public function setIdCancion($idCancion) {
        $this->idCancion = $idCancion;
    }

}

?>
