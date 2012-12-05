<?php

include_once '../AccesoDatos/DaoNacionalidad.php';
include_once '../Logica/Nacionalidad.php';

class ControladorNacionalidad {

    private $daoNacionalidad;

    function ControladorNacionalidad() {
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
    
    function obtenerCodigoNacionalidad($nombre){
        
        return $this->daoNacionalidad->obtenerCodigoNacionalidad($nombre);
    }
    

}

?>
