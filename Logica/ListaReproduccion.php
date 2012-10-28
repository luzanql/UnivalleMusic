<?php
   class ListaReproduccion{
       
       private $codigo;
       private $nombre;
       private $idUsuario;
       
       public function getCodigo() {
           return $this->codigo;
       }

       public function setCodigo($codigo) {
           $this->codigo = $codigo;
       }

       public function getNombre() {
           return $this->nombre;
       }

       public function setNombre($nombre) {
           $this->nombre = $nombre;
       }

       public function getIdUsuario() {
           return $this->idUsuario;
       }

       public function setIdUsuario($idUsuario) {
           $this->idUsuario = $idUsuario;
       }


   }
?>
