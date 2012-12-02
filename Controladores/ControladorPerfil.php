<?php


include_once '../Controladores/ControladorUsuario.php';

$opcion = $_GET['opcion'];

//$opcion=1;

switch ($opcion) {
    //modificar usuario
    case 1:
        $codigo = $_GET['codigo'];
        $controladorUsuario=new ControladorUsuario();
        $controladorUsuario->updateUsuario($codigo, $nombre, $apellido, $nacionalidad, $pasw, $email);

        break;
        
       
}
?>
