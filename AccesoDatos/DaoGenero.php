<?php
include('conexion.php');

class DaoGenero{
  
    function DaoGenero(){
        $this->conexion = new Conexion();
        $conexion->conectar();  
        $sql="'SELECT nombre FROM Genero'"; 
        //ejecutando la consulta
        $respuesta = mysql_query($sql);
        return $row = mysql_fetch_object($respuesta);
    }
        
}
?>
