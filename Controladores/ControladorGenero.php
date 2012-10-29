<?php

include('../AccesoDatos/DaoGenero.php');
include('../Logica/Genero.php');

class ControladorGenero {

    private $daoGenero;

    function ControladorGenero() {
        $this->daoGenero = new DaoGenero();
    }

    function obtenerGeneros() {
       return $this->daoGenero->getGeneros();
    }
    
    function createGenero($nombre){
        $genero=new Genero;
        $genero->setNombre($nombre);
        $this->daoGenero->createGenero($genero);
    }
    
    function deleteGenero($codigo){
        $this->daoGenero->deleteGenero($codigo);
    }

}
?>
