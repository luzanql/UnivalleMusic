<?php
include('conexion.php');

class DaoGenero{
  
    function getGeneros(){
        $conexion = new Conexion();
        $conexion->conectar();  
        $sql="'SELECT nombre FROM Genero'"; 
        //ejecutando la consulta
        $respuesta = mysql_query($sql);
        return $row = mysql_fetch_object($rs);
    }
        
}
?>
