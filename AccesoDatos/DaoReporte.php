<?php

require_once 'conexion.php';

    class DaoReporte {

    private $conexion;

    function DaoReporte() {
        $this->conexion = new Conexion();
    }

   

    function createNacionalidad() {
        $this->conexion->Conectar();
        $consulta = "SELECT c.nombre, ar.nombre FROM cancion as c, artista  as ar WHERE c.artista=ar.codigo;";
        mysql_query($consulta);
        $this->conexion->cerrar();
    }




    }

?>
