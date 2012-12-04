<?php


include_once '../Controladores/ControladorUsuario.php';

$opcion = $_GET['opcion'];

//$opcion=1;

switch ($opcion) {
    //modificar usuario
    case 1:
        $codigo = $_GET['codigo'];
        $nombre=$_GET['nombre'];
        $apellido=$_GET['apellido'];
        $nacionalidad=$_GET['nacionalidad'];
        $pasw=$_GET['pasw'];
        $email=$_GET['email'];
        $controladorUsuario=new ControladorUsuario();
        $controladorUsuario->updateUsuario($codigo, $nombre, $apellido, $nacionalidad, $pasw, $email);
        echo "Informacion modificada";
        break;
    //dar de baja
    case 2:
        $codigo = $_GET['codigo'];
        $controladorUsuario=new ControladorUsuario();
        $consulta=$controladorUsuario->darDeBaja($codigo);
        echo $consulta;
        break;
        
        
       
}
?>
