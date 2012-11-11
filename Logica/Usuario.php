<?php
    
class Usuario
{
  
     private $codigo_Perfil;
     private $nombre;
     private $apellido;
     private $usuario;
     private $contrasena;
     private $email;
     private $codigo_nacionalidad;
     private $estado;
     
     
     function getEstado(){
         return $this->estado;
     }
     
     function setEstado($estado){
         
         $this->estado=$estado;
     }
     



     function getCodigo_Perfil() {
        return $this->codigo_Perfil;
    }

     function getNombre() {
        return $this->nombre;
    }

     function getApellido() {
        return $this->apellido;
    }

     function getUsuario() {
        return $this->usuario;
    }

    
    function setCodigo_Perfil($codigo_Perfil)
    {
        $this->codigo_Perfil=$codigo_Perfil;
    }
    
    function setNombre($nombre)
    {
        $this->nombre=$nombre;
    }
    
    function setApellido($apellido)
    {
        $this->apellido= $apellido;
    }
    
    function setUsuario($usuario)
    {
        $this->usuario=$usuario; 
    }
    
    function   getContrasena() {
        return $this->contrasena;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getCodigo_nacionalidad() {
        return $this->codigo_nacionalidad;
    }

     function setCodigo_nacionalidad($codigo_nacionalidad) 
    {
        $this->codigo_nacionalidad = $codigo_nacionalidad;
    }


     
}
	


?>
