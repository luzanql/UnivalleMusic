<?php

require_once 'conexion.php';

    

    class DaoReporte {

    private $conexion;

    function DaoReporte() {
        $this->conexion = new Conexion();
    }

    
    function getArtistaxCancion() 
    {
        $this->conexion->Conectar();
        $consulta = "SELECT song.nombre as cancion, ar.nombre as artista, alb.nombre as album FROM cancion as song, artista  as ar,
                     album as alb WHERE song.artista=ar.codigo &&  song.codigo_Album=alb.codigo;";
       $respuesta = mysql_query($consulta);
        $filas = array();
          while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = array($row ["cancion"], $row ["artista"], $row["album"]);
        } // las consultas deben quedar en formtato de matriz
//        print_r($filas);

        $this->conexion->cerrar();
        return $filas;
    }
    
    
    //retorna el numero de canciones por artista
    function getNCancionesXArtista() 
    {
        $this->conexion->Conectar();
        $consulta = "SELECT ar.nombre as artista, COUNT(song.nombre) AS canciones
            FROM cancion as song, artista  as ar 
            WHERE song.artista=ar.codigo
            GROUP BY ar.codigo;";
       $respuesta = mysql_query($consulta);
        $filas = array();
          while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = array($row ["canciones"], $row ["artista"]);
        } // las consultas deben quedar en formtato de matriz
//        print_r($filas);

        $this->conexion->cerrar();
        return $filas;
    }
    
    // retorna las 5 canciones mas escuchadas
    function getNCancionesCompradas()
    {
        $this->conexion->Conectar();
        $consulta = "SELECT song.nombre as nombreCancion, art.nombre as artista, COUNT(cxc.idCancion) as nroCompras FROM cancionesxcompra as cxc, cancion as song,
                    artista as art 
                    WHERE cxc.idCancion=song.codigo && song.artista = art.codigo 
                    GROUP BY cxc.idCancion ORDER BY nroCompras limit 5;";
        $respuesta = mysql_query($consulta);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = array($row ["nombreCancion"], $row['artista'], $row ["nroCompras"]);
        } // las consultas deben quedar en formtato de matriz
//        print_r($filas);

        $this->conexion->cerrar();
        return $filas;
    }
        
        
        
    




    }

?>
