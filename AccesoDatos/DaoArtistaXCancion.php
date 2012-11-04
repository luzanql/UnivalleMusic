<?php

require_once 'conexion.php';


class DaoArtistaXCancion {
     private $conexion;
     
      function DaoArtistaXCancion() {
        $this->conexion = new Conexion();
    }
    
    function createArtistaXCancion(ArtistaXCancion $artistaXCancion){
        
        $this->conexion->Conectar();
        $artista=$artistaXCancion->getCodigoArtista();
        $cancion=$artistaXCancion->getCodigoCancion();
        $sql="INSERT INTO ArtistaXCancion VALUES ('".$cancion."','".$artista."')";
        $ejecutar= mysql_query($sql);
        $this->conexion->cerrar();
    }
    
       function existeArtistasXCancion($codigo_Artista, $codigo_Cancion)
    {
       $this->conexion->Conectar();
       $sql = "SELECT * FROM artistasxcancion WHERE codigo_Cancion='".$codigo_Cancion."' AND codigo_Artista='".$codigo_Artista."';";
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
