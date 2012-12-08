<?php

require_once '../AccesoDatos/DaoReporte.php';


class ControladorReportes
{
    private $daoReportes;
    
     function ControladorReportes() 
    {
        $this->daoReporte = new DaoReporte();
    }
    
      function getArtistxSong() 
    {
       return $this->daoReporte->getArtistaxCancion();
    }

    
    
}
//createReportexCancion

?>
