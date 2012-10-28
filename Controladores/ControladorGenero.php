<?php

include('../AccesoDatos/DaoGenero.php');

class ControladorGenero {

    private $daoGenero;

    function ControladorGenero() {
        $this->daoGenero = new DaoGenero();
    }

    function obtenerGeneros() {

        $this->daoGenero->getGeneros();
    }

}
?>
