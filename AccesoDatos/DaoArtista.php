<?php
require_once 'conexion.php';
require_once '../Logica/Artista.php';

class DaoArtista {
     private $conexion;
     
      function DaoArtista() {
        $this->conexion = new Conexion();
    }
    
    function createArtista(Artista $a){
        
        $this->conexion->Conectar();
        $nombre=$a->getNombre();
        $sql="INSERT INTO artista (nombre) VALUES ('$nombre')";
        $ejecutar= mysql_query($sql);
        $this->conexion->cerrar();
    }
    
    function editArtista($codigo, $nombre)
    {
     $this->conexion->Conectar(); 
     $sql="update artista set nombre='".$nombre."' WHERE codigo='".$codigo."'";
     $ejecutar= mysql_query($sql);
     $this->conexion->cerrar();
     
    }
    
    function eliminarArtista($codigo)
    {
    $this->conexion->Conectar();
    $sql="DELETE FROM artista WHERE codigo='".$codigo."'";
    $ejecutar=mysql_query($sql);
    $this->conexion->cerrar();    
    }
    
    function existeArtista($nombre)
    {
        $this->conexion->Conectar();
        $sql="SELECT codigo FROM artista WHERE nombre='$nombre'";
        $ejecutar=mysql_query($sql);
        $row=  mysql_fetch_array($ejecutar);
        $this->conexion->cerrar();
        if($row>=1){
            return true;
        }else 
        return false;
        
    }
    
    function obtenerCodigoArtista($nombre){
        $this->conexion->Conectar();
        $sql="SELECT codigo FROM artista WHERE nombre='$nombre'";
        $ejecutar=mysql_query($sql);
        $row= mysql_fetch_row($ejecutar);
        $this->conexion->cerrar();
        return $row[0];
        
    }
}

?>
