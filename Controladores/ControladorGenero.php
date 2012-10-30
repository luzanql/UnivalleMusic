<?php

require_once '../AccesoDatos/DaoGenero.php';
require_once '../Logica/Genero.php';

class ControladorGenero {

    private $daoGenero;

    function ControladorGenero() {
        $this->daoGenero = new DaoGenero();
    }

    function obtenerGeneros() {
       return $this->daoGenero->getNombreGeneros();
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
