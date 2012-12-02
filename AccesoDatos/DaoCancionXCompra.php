<?php

require_once 'conexion.php';

class DaoCancionXListaReproduccion {

    private $conexion;

    function DaoCancionXListaReproduccion() {
        $this->conexion = new Conexion();
    }

    function createCancionXListaReproduccion(CancionesXListaReproduccion $cancionxlistareproduccion) {
        $this->conexion->Conectar();
        $cancion = $cancionxlistareproduccion->getCodigoCancion();
        $artista = $cancionxlistareproduccion->getCodigoLista();
        $sql = "INSERT INTO cancionesxlistareproduccion VALUES ('".$cancion."','".$artista."')";
        $ejecutar = mysql_query($sql);
        $this->conexion->cerrar();
    }

    function existeCancionXListaReproduccion($cancion, $lista) {
        $this->conexion->Conectar();
        $sql = "SELECT * FROM cancionesxlistareproduccion WHERE codigo_Cancion='".$cancion."' AND codigo_Lista='".$lista."'";
        $ejecutar = mysql_query($sql);
        $row = mysql_fetch_array($ejecutar);
        $this->conexion->cerrar();
        if ($row >= 1) {
            return true;
        }else
            return false;
    }
    
    function deleteCancionXListaReproduccion($cancion,$lista){
        $this->conexion->Conectar();
        $sql = "DELETE FROM cancionesxlistareproduccion WHERE codigo_Cancion='".$cancion."' AND codigo_Lista='".$lista."'";
        $ejecutar = mysql_query($sql);
        $row = mysql_fetch_array($ejecutar);
        $this->conexion->cerrar();
        
    }

}

?>
