<?php
require_once'../AccesoDatos/DaoUsuario.php';
//require_once'../Controladores/ControladorNacionalidad.php';
require_once'../Logica/Usuario.php';

class ControladorUsuario{

    private $daousuario;

    function ControladorUsuario() {
        $this->daousuario = new DaoUsuario();
    }

  
    
    function createUsuario($nombre,$apellido,$email,$nacionalidad,$usuario,$pass){
        $miusuario=new Usuario();
        $miusuario->setApellido($apellido);
        $miusuario->setCodigo_Perfil(2);
        $miusuario->setContrasena($pass);
        $miusuario->setEmail($email);
        $miusuario->setNombre($nombre);
        $miusuario->setUsuario($usuario);
        $miusuario->setCodigo_nacionalidad($nacionalidad);
        
        $this->daousuario->createUsuario($miusuario);
    }
    
    function obtenerUsuario($usu){
        $usuario=$this->daousuario->obtenerUsuario($usu);
        $miUsuario=new Usuario();
        
        $nombre=$usuario["nombre"];
        $apellido=$usuario["apellido"];
        $email=$usuario["email"];
        $codigo_nacionalidad=$usuario["codigo_nacionalidad"];
        $perfil=$usuario["codigo_Perfil"];
        $nombre_usuario=$usuario["usuario"];
        $estado=$usuario["estado"];
        
        $miUsuario->setApellido($apellido);
        $miUsuario->setCodigo_Perfil($perfil);
        $miUsuario->setCodigo_nacionalidad($codigo_nacionalidad);
        $miUsuario->setEmail($email);
        $miUsuario->setEstado($estado);
        $miUsuario->setNombre($nombre);
        $miUsuario->setUsuario($nombre_usuario);
        
        
        return $miUsuario;
        
        
    }
    
    function darDeBaja($usu){
        return $this->daousuario->darDeBaja($usu);
    }
    
    function activarCuenta($usu){
        $this->daousuario->activarCuenta($usu);
    }
    
    function existeUsuario($usu) {
        return $this->daousuario->existeUsuario($usu);
    }
    
    function updateUsuario($codigo,$nombre,$apellido,$nacionalidad,$pasw,$email){
        $controladorNacionalidad=new ControladorNacionalidad();
        $usuario=new Usuario();
        $usuario->setApellido($apellido);
        $usuario->setCodigo_nacionalidad($controladorNacionalidad->obtenerCodigoNacionalidad($nacionalidad));
        $usuario->setContrasena($pasw);
        $usuario->setEmail($email);
        $usuario->setNombre($nombre);
        $usuario->setUsuario($codigo);
        $daoUsuario=new DaoUsuario();
        $daoUsuario->updateUsuario($usuario);
        
    }
}
?>
