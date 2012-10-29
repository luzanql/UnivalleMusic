<?php

require_once 'conexion.php';
require_once '../Logica/Cancion.php';

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
        //$this->conexion->conectar();
        $server = "localhost";
        $usuario = "root";
        $password = "maleja";
        $basedatos = "univallemusic";
        $conexion = mysql_connect($server, $usuario, $password);
        $bool = mysql_select_db($basedatos, $conexion);
   
        
        $sql="INSERT INTO cancion VALUES ( '".$codigo."','".$titulo."','".$album."','".$genero."')";
       
        $ejecutar=  mysql_query($sql);
         echo $sql;
        $this->conexion->cerrar();
        
    }
    
   
    
}
?>
