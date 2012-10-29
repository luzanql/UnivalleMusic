<?php

include('conexion.php');
include('../Logica/Cancion.php');

class DaoCancion{

    private $conexion;
 
    
    function Daocancion() {
        $this->conexion = new Conexion();
    }

    function getCanciones() {
        $this->conexion->conectar();
        $sql = "SELECT * FROM Cancion";
        //ejecutando la consulta
        $respuesta = mysql_query($sql);
        return $row = mysql_fetch_object($respuesta);
    }
    
    function createCancion(Cancion $c){
   
        $cancion=$c;
        $titulo=$cancion->getTitulo();
        $codigo=$cancion->getCodigo();
        $album=$cancion->getAlbum();
        $genero=$cancion->getGenero();
        $this->conexion->conectar();
        $sql="INSERT INTO Cancion VALUES ( '"+$codigo+"','"+"'"+$titulo+"','"+$album+"','"+$genero+"')";
        $ejecutar=  mysql_query($sql);
        $this->conexion->cerrar();
        
    }
    
   
    
}
?>
