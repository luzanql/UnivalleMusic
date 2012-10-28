<?php

class DaoGenero{
  include('conexion.php');
  
    function obtenerGeneros(){
        $conexion = new Conexion();
        $conexion->conectar();     
    }
    
    
    
}
?>
