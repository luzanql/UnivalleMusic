<?php

class DaoListaReproduccion {
    
    private $conexion;
    
    function DaoListaReproduccion($con){
        $this->conexion = $con;
    }
    
    function create($lr){
        $sqr ="INSERT INTO ListaReproduccion(nombre) VALUES ()";
    }
    
}

?>
