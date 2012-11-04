<?php

require_once 'conexion.php';
require_once '../Logica/ArtistasXAlbum.php';

class DaoArtistasxAlbum {

    private $conexion;    
   

    function DaoArtistasxAlbum() {
        $this->conexion = new Conexion();
    }
    
    
    
        
    function createArtistaXAlbum($codigoAlbum, $codigoArtista)
    {
        $this->conexion->Conectar();
        $sql="INSERT INTO artistasxalbum VALUES('".$codigoAlbum."','".$codigoArtista."');";
        $ejecutar= mysql_query($sql);
        $this->conexion->cerrar();            
    }
    
    function deleteArtistasXAlbum()
    {
        $this->conexion->Conectar();
        $sql="DELETE FROM artistasxalbum WHERE codigo'".$codigo."'";
        $ejecutar=mysql_query($sql);
        $this->conexion->cerrar();
    }
   
   
    function existeArtistasXAlbum($codigo_Album, $codigo_Artista)
    {
       $this->conexion->Conectar();
       $sql = "SELECT codigo FROM artistasxalbum WHERE codigo_Album='".$codigo_Album."' AND codigo_Artista='".$codigo_Artista."';";
       $ejecutar = mysql_query($sql);
       $row = mysql_fetch_array($ejecutar);
       $this->conexion->cerrar();
       if($row>=1){
        return true;
        }else
        return false;

}
        
    
    
    
}



?>
