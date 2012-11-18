<?php

require_once 'conexion.php';
require_once '../Logica/Album.php';

class DaoAlbum {

    private $conexion;

    function DaoAlbum() {
        $this->conexion = new Conexion();
    }

    function getAlbumes() {
        $this->conexion->Conectar();
        $sql = "SELECT * FROM album";
        //ejecutando la consulta
        $respuesta = mysql_query($sql);
        return $row = mysql_fetch_object($respuesta);
    }

    function createAlbum(Album $a) {
        $this->conexion->Conectar();
        $nombre = $a->getNombre();
        $consulta = "INSERT INTO album (nombre) VALUES('$nombre')";
        mysql_query($consulta);
        $this->conexion->cerrar();
    }

    function deleteGenero($codigo) {
        $this->conexion->Conectar();
        $sql = "DELETE FROM album WHERE codigo='$codigo'";
        $ejecutar = mysql_query($sql);
        $this->conexion->cerrar();
    }

    function existeAlbum($nombre) {
        $this->conexion->Conectar();
        $sql = "SELECT codigo FROM album WHERE nombre='$nombre'";
        $ejecutar = mysql_query($sql);
        $row = mysql_fetch_array($ejecutar);
        $this->conexion->cerrar();
        if ($row >= 1) {
            return true;
        }else
            return false;
    }

    function obtenerCodigoAlbum($nombre) {
        $this->conexion->Conectar();
        $sql = "SELECT codigo FROM album WHERE nombre='$nombre'";
        $ejecutar = mysql_query($sql);
        $fila = array();
        $row = mysql_fetch_array($ejecutar);
        //  $row = mysql_fetch_row($ejecutar);
        $fila [] = array
            ($row['codigo']);
        $this->conexion->cerrar();
        return $row['codigo'];
    }
      function obtenerNombreAlbum($codigo){
        $this->conexion->Conectar();
        $sql="SELECT nombre FROM album WHERE codigo='$codigo'";
        $ejecutar=mysql_query($sql);
        $row= mysql_fetch_row($ejecutar);
        $this->conexion->cerrar();
        return $row[0];
        
    }

}

?>
