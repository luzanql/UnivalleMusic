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
        $sql = "SELECT codigo,nombre FROM listareproduccion WHERE id_Usuario='$idUsuario'";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = $row;
        }
        $this->conexion->cerrar();
        return $filas;
    }
    
    function getCodigoNombreListasPorUsuario($idUsuario) {
        $this->conexion->Conectar();
        $sql = "SELECT codigo,nombre FROM listareproduccion WHERE id_Usuario='$idUsuario'";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $unaFila = array($row ["codigo"],$row ["nombre"]);
            $filas [] = $unaFila;
        }
        $this->conexion->cerrar();
        return json_encode($filas);        
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
        mysql_query($sql);
        $sql2="DELETE FROM cancionesxlistareproduccion WHERE codigo_Lista=$codigo";
        mysql_query($sql2);
        $this->conexion->cerrar();
        
        
    }
    
    function obtenerCodigoLista($nombre,$usuario){
        
         $this->conexion->Conectar();
        $sql = "SELECT codigo FROM listareproduccion WHERE nombre='".$nombre."' AND id_Usuario='".$usuario."'";
        $ejecutar = mysql_query($sql);
        $fila = array();
        $row = mysql_fetch_row($ejecutar);
        $this->conexion->cerrar();
       
        return $row[0];
        
    }
    
    
    function  existeLista($usuario,$lista){
         $this->conexion->Conectar();
        $sql = "SELECT codigo FROM listareproduccion WHERE nombre='$lista' AND id_Usuario='$usuario'";
        $ejecutar = mysql_query($sql);
        $row = mysql_fetch_array($ejecutar);
        $this->conexion->cerrar();
        if ($row >= 1) {
            return true;
        }else
            return false;
        
        
    }
    
    function getCodigoListaFavoritaPorUsuario($idUsuario) {
        $this->conexion->Conectar();
        $sql = "SELECT codigo FROM listareproduccion WHERE id_Usuario='$idUsuario' AND nombre='Favoritas'";
        $respuesta = mysql_query($sql);
        $row = mysql_fetch_array($respuesta);        
        $this->conexion->cerrar();
        return $row[0];        
        }

}
?>