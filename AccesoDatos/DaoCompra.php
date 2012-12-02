<?php

require_once 'conexion.php';
require_once '../Logica/Compra.php';

class DaoCompra {

    private $conexion;

    function DaoCompra() {
        $this->conexion = new Conexion();
    }

    function getCompras() {
        $this->conexion->Conectar();
        $sql = "SELECT * FROM compra";
        //ejecutando la consulta
        $respuesta = mysql_query($sql);
        return $row = mysql_fetch_object($respuesta);
    }

    function createCompra(Compra $a) {
        $this->conexion->Conectar();
        $fecha = $a->getFecha();
        $usuario=$a->getIdUsuario();
        $valor=$a->getValor();
        $consulta = "INSERT INTO compra (idUsuario,fecha,valor) VALUES('$usuario','$fecha','$valor')";
        mysql_query($consulta);
        $this->conexion->cerrar();
    }
    
    function obtenerCodigoCompra($idUsuario,$fecha,$valor){
        $this->conexion->Conectar();
        $consulta = "SELECT * FROM compra WHERE idUsuario='$idUsuario' AND fecha='$fecha' AND valor='$valor'";
        $respuesta=mysql_query($consulta);
        $this->conexion->cerrar();
        $row = mysql_fetch_array($respuesta);
        return $row['idCompra'];
    }

   

    

    

}

?>
