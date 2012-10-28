<?php

class DaoListaReproduccion {
    
    private $conexion;
    
    function DaoListaReproduccion(){
        $con = new Conexion();
        $this->conexion = $con;
    }
    
    function create(ListaReproduccion $lr){
        $nombre = $lr->getNombre();
        $usuario = $lr->getIdUsuario();
        $sqr_insert ="INSERT INTO ListaReproduccion(nombre,id_Usuario) VALUES ($nombre,$usuario)";
        
    }
    
}

?>
