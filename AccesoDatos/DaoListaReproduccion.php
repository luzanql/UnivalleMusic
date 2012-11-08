<?php

include_once 'conexion.php';
include_once '../Logica/ListaReproduccion.php';

class DaoListaReproduccion {

    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function getListasReproduccionPorUsuario($idUsuario) {
        $this->conexion->Conectar();
        $sql = "SELECT nombre FROM listareproduccion WHERE id_Usuario='$idUsuario'";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = $row ["nombre"];
        }
        $this->conexion->cerrar();
        return $filas;
    }

    function createListaReproduccion(ListaReproduccion $lr) {
        $this->conexion->Conectar();
        $nombre = $lr->getNombre();
        $idUsuario = $lr->getIdUsuario();
        $sql = "INSERT INTO listareproduccion(nombre,id_Usuario) VALUES ('$nombre','$idUsuario')";
        $ejecutar = mysql_query($sql);
        if (!$ejecutar) {
            die('Consulta no válida: ' . mysql_error());
        }
        $this->conexion->cerrar();
    }

    function deleteListaReproduccion($codigo) {
        $this->conexion->Conectar();
        $sql = "DELETE FROM listareproduccion WHERE codigo=$codigo";
        $ejecutar = mysql_query($sql);
        $this->conexion->cerrar();
    }

}

?>