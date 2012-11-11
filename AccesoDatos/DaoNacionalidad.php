<?php

require_once 'conexion.php';
require_once '../Logica/Nacionalidad.php';

class DaoNacionalidad {

    private $conexion;

    function DaoNacionalidad() {
        $this->conexion = new Conexion();
    }

   

    function createNacionalidad(Nacionalidad $n) {
        $this->conexion->Conectar();
        $nombre = $n->getNombre();
        $consulta = "INSERT INTO nacionalidad (nombre) VALUES('$nombre')";
        mysql_query($consulta);
        $this->conexion->cerrar();
    }

   
    function existeNacionalidad($nombre) {
        $this->conexion->Conectar();
        $sql = "SELECT codigo FROM nacionalidad WHERE nombre='$nombre'";
        $ejecutar = mysql_query($sql);
        $row = mysql_fetch_array($ejecutar);
        $this->conexion->cerrar();
        if ($row >= 1) {
            return true;
        }else
            return false;
    }

    function obtenerCodigoNacionalidad($nombre) {
        $this->conexion->Conectar();
        $sql = "SELECT codigo FROM nacionalidad WHERE nombre='$nombre'";
        $ejecutar = mysql_query($sql);
        $fila = array();
        $row = mysql_fetch_array($ejecutar);
        //  $row = mysql_fetch_row($ejecutar);
        $fila [] = array
            ($row['codigo']);
        $this->conexion->cerrar();
        return $row['codigo'];
    }

}

?>
