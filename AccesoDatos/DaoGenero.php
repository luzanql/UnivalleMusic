<?php

require_once 'conexion.php';
require_once '../Logica/Genero.php';

class DaoGenero {

    private $conexion;
     
    function DaoGenero() {
        $this->conexion = new Conexion();
    }


    function getNombreGeneros() {
        $this->conexion->Conectar();
        $sql = "SELECT nombre FROM Genero";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] =
                $row ["nombre"];
}
    
        $this->conexion->cerrar();
        return $filas;
    }
    
    function createGenero(Genero $g){
        $this->conexion->Conectar();
        $nombre=$g->getNombre();
        $sql="INSERT INTO Genero VALUES ('".$nombre."')";
        $ejecutar= mysql_query($sql);
        $this->conexion->cerrar();
        
    }
    
    function deleteGenero($codigo){
        $this->conexion->Conectar();
        $sql="DELETE FROM Genero WHERE codigo='".$codigo."'";
        $ejecutar=mysql_query($sql);
        $this->conexion->cerrar();
        
    }
    
    
    function existeGenero($nombre){
        $this->conexion->Conectar();
        $sql="SELECT codigo FROM Genero WHERE nombre='".$nombre."'";
        $ejecutar=mysql_query($sql);
        $row=  mysql_fetch_array($ejecutar);
        $this->conexion->cerrar();
        if($row>=1){
            return true;
        }else 
        return false;
        
    }
    
    function obtenerGenero($nombre){
        $this->conexion->Conectar();
        $sql="SELECT codigo FROM Genero WHERE nombre='$nombre'";
        $ejecutar=mysql_query($sql);
        $row=  mysql_fetch_array($ejecutar);
        $this->conexion->cerrar();
        return $row[0];    
        
    }
    
    
}
?>
