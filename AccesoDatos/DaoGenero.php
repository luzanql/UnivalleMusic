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
        $sql = "SELECT Nombre FROM genero";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] =
                    $row ["Nombre"];
        }

        $this->conexion->cerrar();
        return $filas;
    }

    function createGenero(Genero $g) {
        $this->conexion->Conectar();
        $nombre = $g->getNombre();
        $sql = "INSERT INTO genero(Nombre) VALUES ('$nombre')";
        $ejecutar = mysql_query($sql);
        $this->conexion->cerrar();
    }

    function deleteGenero($codigo) {
        $this->conexion->Conectar();
        $sql = "DELETE FROM genero WHERE codigo='$codigo'";
        $ejecutar = mysql_query($sql);
        $this->conexion->cerrar();
    }

    function existeGenero($nombre) {
        $this->conexion->Conectar();
        $sql = "SELECT codigo FROM genero WHERE Nombre='$nombre'";
        $ejecutar = mysql_query($sql);
        $row = mysql_fetch_array($ejecutar);
        $this->conexion->cerrar();
        if ($row >= 1) {
            return true;
        } else {
            return false;
        }
    }

    function obtenerGenero($nombre) {
        $this->conexion->Conectar();
        $sql = "SELECT codigo FROM genero WHERE Nombre='$nombre'";
        $ejecutar = mysql_query($sql);
        $row = mysql_fetch_array($ejecutar);
        $this->conexion->cerrar();
        return $row[0];
    }

}

?>
