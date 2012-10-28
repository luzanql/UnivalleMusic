<?php

class Album
{
    Private $codigo;
    Private $nombre;
    
    
      function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    
        function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    function getCodigo() {
        return $this->codigo;
    }
    
    function getNombre() {
        return $this->nombre;
    }
    
}

?>
