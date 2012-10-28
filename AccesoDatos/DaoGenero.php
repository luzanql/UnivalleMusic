<?php
include('conexion.php');

class DaoGenero {

    
    private $conexion;
    function DaoGenero(){
        $this->conexion = new Conexion();
    }
    function getGeneros() {
        
        $this->conexion->conectar();
        $sql = "SELECT nombre FROM Genero";
        //ejecutando la consulta
        $respuesta = mysql_query($sql);
        return $row = mysql_fetch_object($respuesta);
    }

}
?>
