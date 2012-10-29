<?php

require_once 'conexion.php';
require_once '../Logica/Cancion.php';

class DaoCancion{

   private $conexion;
 
    
    function Daocancion() {
        $this->conexion = new Conexion();
        
    }

    function getCanciones() {
        $this->conexion->Conectar();
        $sql = "SELECT * FROM Cancion";
        //ejecutando la consulta
        $respuesta = mysql_query($sql);
        return $row = mysql_fetch_object($respuesta);
    }
    
    function createCancion(Cancion $c){
        $this->conexion->Conectar();
        $cancion=$c;
        $titulo=$cancion->getTitulo();
        $codigo=$cancion->getCodigo();
        $album=$cancion->getAlbum();
        $genero=$cancion->getGenero();
        $consulta="INSERT INTO cancion VALUES('".$codigo."','".$titulo."','".$album."','".$genero."');";
        mysql_query($consulta);
        $this->conexion->cerrar();
 
        
    }
    
   
    
}
?>
