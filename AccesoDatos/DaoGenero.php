<?php

include('conexion.php');
include('../Logica/Genero.php');

class DaoGenero {

    private $conexion;
    private $genero;
    private $codigo;

    function DaoGenero() {
        $this->conexion = new Conexion();
    }

    function getGeneros() {
        $this->conexion->conectar();
        $sql = "SELECT nombre FROM Genero";
        //ejecutando la consulta
        $respuesta = mysql_query($sql);
        return $row = mysql_fetch_object($respuesta);
    }
    
    function createGenero(Genero $g){
   
        $this->genero=$g;
        $nombre=$g->getNombre();
        $this->conexion->conectar();
        $sql="INSERT INTO Genero VALUES ("+$nombre+")";
        $ejecutar=  mysql_query($sql);
        $this->conexion->cerrar();
        
    }
    
    function deleteGenero($codigo){
        $this->codigo=$codigo;
        $sql="DELETE Genero WHERE codigo='"+$this->codigo+"'";
        $ejecutar=  mysql_query($sql);
        $this->conexion->cerrar();
        
    }
    
    
}
?>
