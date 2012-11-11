<?php

include_once ('conexion.php');
include_once ('Session.php');

$conexion = new Conexion();
$conexion->Conectar();

//generando la consulta sobre el usuario y su contrasena
$sqr = "SELECT usuario, contrasena, nombre, apellido, codigo_Perfil FROM usuario WHERE usuario = '" . $_POST["usuario"] . "' and contrasena='" . md5($_POST["password"]) . "'";
//ejecutando la consulta
$rs = mysql_query($sqr);
$row = mysql_fetch_array($rs);
//verificando si hay un usuario con ese password mediante numrows
$nr = mysql_num_rows($rs);
if ($nr == 1) {

    $sessionActual = Session::getInstance();

    $sessionActual->usuario = $row['usuario'];
    $sessionActual->nombreUsuario = $row['nombre'];
    $sessionActual->perfil = $row['codigo_Perfil'];

    if ($sessionActual->perfil == 1) {
        header("Location: ../Vista/MisListas.php", false);
    } else {
        header("Location: ../Vista/agregarCancion.html");
    }
} else if ($nr <= 0) {
//si no existe se va a ... y pone el valor de error a SI
    header("Location: ../Vista/index.html");
}

//usuario y contraseña válidos 
//se define una sesion y se guarda el dato 
/*
  session_start();

  $_SESSION['autenticado'] = "si";
  $_SESSION['usuario'] = $row['usuario'];
  $_SESSION['nombreusr'] = $row['nombre'] . " " . $row['apellido'];
  $_SESSION['perfil'] = $row['codigo_Perfil'];

  printf($_SESSION['perfil']);
  if ($_SESSION["perfil"] == 1) {
  header("Location: ../Vista/MisListas.php", false);
  } else {
  header("Location: ../Vista/PrincipalUsuario.html");
  }
  } else if ($nr <= 0) {
  //si no existe se va a ... y pone el valor de error a SI
  header("Location: ../Vista/index.html");
  } */
?>
