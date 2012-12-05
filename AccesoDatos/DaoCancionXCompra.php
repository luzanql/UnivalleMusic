<?php

require_once 'conexion.php';
require_once '../Logica/CancionesXCompra.php';

class DaoCancionXCompra{

    private $conexion;

    function DaoCancionXCompra() {
        $this->conexion = new Conexion();
    }

    function createCancionXCompra(CancionesXCompra $cancionxcompra) {
        $this->conexion->Conectar();
        $cancion = $cancionxcompra->getIdCancion();
        $compra = $cancionxcompra->getIdCompra();
        $sql = "INSERT INTO cancionesxcompra VALUES ('".$compra."','".$cancion."')";
        echo($sql);
        $ejecutar = mysql_query($sql);
        $this->conexion->cerrar();
        return $sql;
    }

   
  
}

?>
