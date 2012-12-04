<?php

include'../AccesoDatos/DaoNacionalidad.php';
include'../Logica/Nacionalidad.php';

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
