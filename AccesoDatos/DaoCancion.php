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
        $artista=$cancion->getArtista();
        $album=$cancion->getAlbum();
        $genero=$cancion->getGenero();
        
        
        $consulta="INSERT INTO cancion (artista,titulo,album,genero) VALUES('".$artista."','".$titulo."','".$album."','".$genero."');";
        mysql_query($consulta);
        $this->conexion->cerrar();
 
        
    }
    
    
    function obtenerCancion($nombre,$artista,$album){
        $this->conexion->Conectar();
            
        
        $consulta="SELECT * FROM cancion WHERE nombre='".$nombre."',artista='".$artista."', codigo_Album='".$album."')";
        $consulta=mysql_query($consulta);
        $row= mysql_fetch_row($consulta);
        $this->conexion->cerrar();
        return $row;
        
    }
    
   
    
}
?>
