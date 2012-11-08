<?php

require_once 'conexion.php';
require_once '../Logica/ArtistasXAlbum.php';

class DaoArtistaxAlbum {

    private $conexion;

    function DaoArtistaxAlbum() {
        $this->conexion = new Conexion();
    }

    function createArtistaXAlbum(ArtistaXAlbum $artistaXAlbum) {
        $this->conexion->Conectar();
        $artista = $artistaXAlbum->getCodigoArtista();
        $album = $artistaXAlbum->getsetCodigoAlbum();
        $sql = "INSERT INTO ArtistasXAlbum VALUES('$album','$artista');";
        $ejecutar = mysql_query($sql);
        $this->conexion->cerrar();
    }

    function deleteArtistasXAlbum($codigoArtista,$codigoAlbum) {
        $this->conexion->Conectar();
        $sql = "DELETE FROM ArtistasXAlbum WHERE codigo_Artista='$codigoArtista' AND codigo_Album='$codigoAlbum'";
        $ejecutar = mysql_query($sql);
        $this->conexion->cerrar();
    }

    function existeArtistasXAlbum($codigo_Album, $codigo_Artista) {
        $this->conexion->Conectar();
        $sql = "SELECT * FROM ArtistasXAlbum WHERE codigo_Album='$codigo_Album' AND codigo_Artista='codigo_Artista'";
        $ejecutar = mysql_query($sql);
        $row = mysql_fetch_array($ejecutar);

        $this->conexion->cerrar();
        if ($row >= 1) {
            return true;
        }else
            return false;
    }

}

?>
