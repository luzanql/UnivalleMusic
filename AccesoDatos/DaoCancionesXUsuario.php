<?php

require_once 'conexion.php';

class DaoCancionesXUsuario {

    private $conexion;

    function DaoCancionesXUsuario() {
        $this->conexion = new Conexion();
    }

    function createCancionXUsuario(CancionesXUsuario $cancionXUsuario) {

        $this->conexion->Conectar();
        $usuario = $cancionXUsuario->getCodigoUsuario();
        $cancion = $cancionXUsuario->getCodigoCancion();

        $sql = "INSERT INTO cancionesxusuario (codigo_Usuario, codigo_Cancion, fecha) VALUES ('$usuario','$cancion',CURRENT_TIMESTAMP)";
        printf($sql);
        $ejecutar = mysql_query($sql);
        $this->conexion->cerrar();
    }

    function existeCancionXUsuario($codigo_usuario, $codigo_Cancion) {
        $this->conexion->Conectar();
        $sql = "SELECT * FROM cancionesxusuario WHERE codigo_Cancion='$codigo_Cancion' AND codigo_Usuario='$codigo_usuario'";
        $ejecutar = mysql_query($sql);
        $row = mysql_fetch_array($ejecutar);
        $this->conexion->cerrar();
        if ($row >= 1) {
            return true;
        }else
            return false;
    }

    function obtenerCancionesXUsuario($codigo_usuario) {
        $this->conexion->Conectar();
        $sql = "SELECT codigo_Cancion FROM cancionesxusuario WHERE codigo_Usuario='$codigo_usuario'";
        $ejecutar = mysql_query($sql);
        $filas = array();
        while($row = mysql_fetch_array($ejecutar)){
            $filas[] = $row[0];
        }
        $this->conexion->cerrar();
        return $filas;  
    }

}

?>
