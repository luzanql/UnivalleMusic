<?php

include_once '../Controladores/ControladorUsuario.php';
include_once '../AccesoDatos/Session.php';

$opcion = $_GET['opcion'];

//$opcion=1;

switch ($opcion) {
    //esta activo
    case 1:
        $usuario = $_GET['usuario'];
        $controladorUsuario = new ControladorUsuario();
        if ($controladorUsuario->usuarioEstaActivo($usuario) == true) {
            echo "true";
        } else {
            echo "false";
        }
        break;

//contraseña correcta
    case 2:
        $usuario = $_GET['usuario'];
        $contrasena = $_GET['pasw'];
        $controladorUsuario = new ControladorUsuario();
        if ($controladorUsuario->contrasenaDeUsuario($usuario, $contrasena)) {
            echo "true";
        } else {
            echo "false";
        }
        break;

//Login
    case 3:
        /*
         * debes hacer casi lo mismo del caso 2 pero debes obtener el registro completo para 
         * que obtengas todo lo q se necesita  SI AnMoOmRbre codPerfil y el estado exacto amor
         * eso lo entendist
         * ahora si vamos  al js
         */
        $usuario = $_GET['usuario'];
        $controladorUsuario=new ControladorUsuario();
        $row=$controladorUsuario->obtenerUsuario($usuario);
        $sessionActual = Session::getInstance();
        $sessionActual->usuario = $row->getUsuario();
        $sessionActual->nombreUsuario = $row->getNombre();
        $sessionActual->perfil = $row->getCodigo_Perfil();
        $sessionActual->estado = $row->getEstado();
        $sessionActual->carrito = array();
        break;
    //obtener estado
    case 4:
        $sessionActual = Session::getInstance();
        echo $sessionActual->perfil; 
}
?>
