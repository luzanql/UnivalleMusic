<?php

require_once 'conexion.php';
require_once '../Logica/ArtistasXAlbum.php';

class DaoArtistaxAlbum {

    private $conexion;    
   

    function DaoArtistaxAlbum() {
        $this->conexion = new Conexion();
    }
    
    
    
        
    function createArtistaXAlbum(ArtistaXAlbum $artistaXAlbum)
    {
        $this->conexion->Conectar();
        $artista=$artistaXAlbum->getCodigoArtista();
        $album=$artistaXAlbum->getsetCodigoAlbum();
        $sql="INSERT INTO artistasxalbum VALUES('".$album."','".$artista."');";
        $ejecutar= mysql_query($sql);
        $this->conexion->cerrar();            
    }
    
    function deleteArtistasXAlbum($codigo)
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
      // $row = mysql_affected_rows();
       //$row = mysql_fetch_array($ejecutar);
       
       $this->conexion->cerrar();
       if($row>=1){
        return true;
        }else
        return false;

}
        
    
    
    
}



?>
