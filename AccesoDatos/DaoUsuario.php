<?php

require_once 'conexion.php';
require_once '../Logica/Usuario.php';

class DaoUsuario {

    private $conexion;

    function DaoUsuario() {
        $this->conexion = new Conexion();
    }

    function getUsuarios() {
        $this->conexion->Conectar();
        $sql = "SELECT * FROM usuario";
        //ejecutando la consulta
        $respuesta = mysql_query($sql);
        return $row = mysql_fetch_object($respuesta);
    }

    function createUsuario(Usuario $usu) {
        $this->conexion->Conectar();
        $usuario = $usu;
        $nombre=$usuario->getNombre(); 
        $apellido = $usuario->getApellido();
        $email=$usuario->getEmail();
        $perfil=$usuario->getCodigo_Perfil();
        $nacionalidad=$usuario->getCodigo_nacionalidad();
        $nombreusuario=$usuario->getUsuario();
        $contraseña=$usuario->getContrasena();
        //MD5('admin')
        
        $consulta = "INSERT INTO usuario (usuario,contrasena, codigo_Perfil,nombre,apellido,email,codigo_nacionalidad,estado) VALUES('$nombreusuario',MD5('$contraseña'),'$perfil','$nombre','$apellido','$email','$nacionalidad',DEFAULT)";
         mysql_query($consulta);
        $this->conexion->cerrar();
    }

    function obtenerUsuario($nombreUsuario) {
        $this->conexion->Conectar();

        $consulta = "SELECT * FROM usuario WHERE usuario='$nombreUsuario'";
        $respuesta = mysql_query($consulta);
        $row = mysql_fetch_array($respuesta);
        $this->conexion->cerrar();
        return $row;
    }
    
    function updateUsuario(Usuario $usuario){
        $this->conexion->Conectar();
        $codigo=$usuario->getUsuario();
        $nombre=$usuario->getNombre();
        $apellido=$usuario->getApellido();
        $nacionalidad=$usuario->getCodigo_nacionalidad();
        $email=$usuario->getEmail();
       
        $consulta = "UPDATE usuario  SET nombre='$nombre', apellido='$apellido',codigo_nacionalidad='$nacionalidad', email='$email' WHERE usuario='$codigo'" ;
        $respuesta = mysql_query($consulta);
   
        $this->conexion->cerrar();
        
        
    }
    
    function darDeBaja($usuario){
        
        $this->conexion->Conectar();
        $consulta = "UPDATE usuario  SET estado='Inactivo' WHERE usuario='$usuario' ";
        $respuesta = mysql_query($consulta);
        $consulta;
        //$row = mysql_fetch_array($respuesta);
       
        $this->conexion->cerrar();
        
    }
    
    
    function activarCuenta($usuario){
        $this->conexion->Conectar();
        $consulta = "UPDATE usuario WHERE usario='$usuario' SET estado='Activo' ";
        $respuesta = mysql_query($consulta);
        $row = mysql_fetch_array($respuesta);
        $this->conexion->cerrar();
        
    }
    
    function existeUsuario($usu){
        $this->conexion->Conectar();
        $consulta = "SELECT * FROM usuario WHERE usuario='$usu'";
        $respuesta = mysql_query($consulta);
        $row = mysql_fetch_array($respuesta);
        $this->conexion->cerrar();
         if ($row >= 1) {
            return true;
        } else {
            return false;
        }
        
    }
    
    function contraseñaDeUsuario($usuario,$contrasena){
        $this->conexion->Conectar();
        $consulta = "SELECT * FROM usuario WHERE contrasena= MD5('$contrasena') AND usuario='$usuario'";
        $respuesta = mysql_query($consulta);
        $row = mysql_fetch_array($respuesta);
        $this->conexion->cerrar();
         if ($row >= 1) {
            return true;
        } else {
            return false;
        }
    }
        
    function usuarioEstaActivo ($usuario){
        $this->conexion->Conectar();
        $consulta = "SELECT * FROM usuario WHERE usuario='$usuario'";
        $respuesta = mysql_query($consulta);
        $row = mysql_fetch_array($respuesta);
        $this->conexion->cerrar();
         if ($row['estado']=='Activo') {            
            return true;
        } else {
            return false;
        }
        
        
    }

  
}

?>
