<?php

require_once 'conexion.php';
require_once '../Logica/Genero.php';

class DaoGenero {

    private $conexion;
    private $codigo;

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
        $sql="INSERT INTO Genero VALUES ('.$nombre.')";
        $ejecutar= mysql_query($sql);
        $this->conexion->cerrar();
        
    }
    
    function deleteGenero($codigo){
        $this->conexion->Conectar();
        $sql="DELETE Genero WHERE codigo='".$codigo."'";
        $ejecutar=mysql_query($sql);
        $this->conexion->cerrar();
        
    }
    
    
}
?>
