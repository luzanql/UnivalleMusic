<?php

require_once'../AccesoDatos/DaoNacionalidad.php';
require_once'../Logica/Nacionalidad.php';

class ControladorNAcionalidad {

    private $daoNacionalidad;

    function ControladorNAcionalidad() {
        $this->daoNacionalidad = new DaoNacionalidad();
    }
    
    
    function createNacionalidad($nombre){
        $nacionalidad=new Nacionalidad();     
        $nacionalidad->setNombre($nombre);
        $this->daoNacionalidad->createNacionalidad($nacionalidad);      
        
    }
    
    function existeNacionalidad($nombre){
        return $this->daoNacionalidad->existeNacionalidad($nombre);
    }
    
    function obtenerCodigoNAcionalidad($nombre){
        
        return $this->daoNacionalidad->obtenerCodigoNacionalidad($nombre);
    }
    

}

?>
