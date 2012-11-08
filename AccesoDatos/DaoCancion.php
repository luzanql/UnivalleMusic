<?php

require_once 'conexion.php';
require_once '../Logica/Cancion.php';

class DaoCancion {

    private $conexion;

    function Daocancion() {
        $this->conexion = new Conexion();
    }

    function getCanciones() {
        $this->conexion->Conectar();
        $sql = "SELECT * FROM Cancion";
        //ejecutando la consulta
        $respuesta = mysql_query($sql);
        return $row = mysql_fetch_object($respuesta);
    }

    function createCancion(Cancion $c) {
        $this->conexion->Conectar();
        $cancion = $c;
        $codigo = $cancion->getCodigo();
        $titulo = $cancion->getTitulo();
        $artista = $cancion->getArtista();
        $album = $cancion->getAlbum();
        $genero = $cancion->getGenero();

        $consulta = "INSERT INTO Cancion (codigo,nombre, artista,codigo_Album,genero) VALUES('$codigo','$titulo','$artista','$album','$genero')";

        mysql_query($consulta);
        $this->conexion->cerrar();
    }

    function obtenerCancion($nombre, $artista, $album) {
        $this->conexion->Conectar();

        $consulta = "SELECT * FROM Cancion WHERE nombre='$nombre' AND artista='$artista' AND codigo_Album='$album'";
        $respuesta = mysql_query($consulta);
        $row = mysql_fetch_array($respuesta);
        $this->conexion->cerrar();
        return $row;
    }

    function obtenerCancionPorCodigo($codigo) {
        $this->conexion->Conectar();

        $consulta = "SELECT * FROM Cancion WHERE codigo='$codigo'";
        $respuesta = mysql_query($consulta);
        $row = mysql_fetch_array($respuesta);
        $this->conexion->cerrar();
        return $row;
    }

}

?>
