<?php

require_once 'conexion.php';
include_once '../AccesoDatos/DaoUsuario.php';
include_once '../AccesoDatos/DaoListaReproduccion.php';
include_once '../AccesoDatos/DaoNacionalidad.php';
include_once '../AccesoDatos/Session.php';
//require_once '../Controladores/ControladorUsuario.php';

$conexion = new Conexion();
$opcion = $_GET['opcion'];

//$opcion=1;

switch ($opcion) {
    case 1:
        $term = trim(strip_tags($_GET['term']));
        $conexion->Conectar();
        $sql = "SELECT Nombre FROM genero WHERE Nombre LIKE '%$term%'";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = $row ['Nombre'];
        }
        $conexion->cerrar();
        echo json_encode($filas);
        break;

    case 2:
        $term = trim(strip_tags($_GET['term']));
        $conexion->Conectar();
        $sql = "SELECT nombre FROM nacionalidad WHERE nombre LIKE '%$term%'";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = $row ["nombre"];
        }
        $conexion->cerrar();
        echo json_encode($filas);
        break;



    case 3:
        $term = trim(strip_tags($_GET['term']));
        $conexion->Conectar();
        $sql = "SELECT nombre FROM artista WHERE nombre LIKE '%$term%'";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = $row ["nombre"];
        }
        $conexion->cerrar();
        echo json_encode($filas);
        break;


    case 4:

        $term = trim(strip_tags($_GET['term']));
        $conexion->Conectar();
        $sql = "SELECT nombre FROM album WHERE nombre LIKE '%$term%'";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = $row ["nombre"];
        }
        $conexion->cerrar();
        echo json_encode($filas);
        break;
        
     case 5:
         $usuario=$_GET['usuario'];
         $daoUsuario = new DaoUsuario();
         $existe = $daoUsuario->existeUsuario($usuario);
         if($existe){
             echo "true";
             break;
         }else{
             echo "false";
             break;             
             }
             
      case 6:
         $usuario=$_GET['usuario'];
         $daoListaReproduccion = new DaoListaReproduccion();
         $resultado = $daoListaReproduccion->getCodigoNombreListasPorUsuario($usuario);
         echo $resultado;
         break;   
     
     //hecho por male
     case 7:
         $sessionActual = Session::getInstance();
         $idUsuario = $sessionActual->usuario;
         $usuario=$idUsuario;
         $daoUsuario=new DaoUsuario();
         $daoNacionalidad=new DaoNacionalidad();
         $usuarioFinal=$daoUsuario->obtenerUsuario($usuario);
         $nombre=$usuarioFinal['nombre'];
         $apellido=$usuarioFinal['apellido'];
         $nacionalidad=$daoNacionalidad->obtenerNombreNacionalidad($usuarioFinal['codigo_nacionalidad']);
         $email=$usuarioFinal['email'];
         $usuarioF=$usuarioFinal['usuario'];
         $passw=$usuarioFinal['contrasena'];
         echo $nombre.','.$apellido.','.$email.','.$nacionalidad.','.$usuarioF.','.$passw;
         
}
     
?>
