<?php

include_once ('conexion.php');

$conexion = new Conexion();
$conexion->Conectar();

//generando la consulta sobre el usuario y su contrasena
$sqr = "SELECT usuario, contrasena, nombre, apellido, codigo_Perfil FROM Usuario WHERE usuario = '" . $_POST["usuario"] . "' and contrasena='" . md5($_POST["password"]) . "'";
//ejecutando la consulta
$rs = mysql_query($sqr);
$row = mysql_fetch_array($rs);
//verificando si hay un usuario con ese password mediante numrows
$nr = mysql_num_rows($rs);
if ($nr == 1) {
    //usuario y contraseña válidos 
    //se define una sesion y se guarda el dato 
    //session_start();

    $_SESSION["autenticado"] = "si";
    $_SESSION["usuario"] = $row['usuario'];
    $_SESSION["nombreusr"] = $row['nombre'] . " " . $row['apellido'];
    $_SESSION["perfil"] = $row['codigo_Perfil'];

    printf($_SESSION["perfil"]);
    if ($_SESSION["perfil"] == 1) {
        header ("Location: ../Vista/principalAdmin.html",false);
        exit;
    } else {
        header("Location: ../Vista/PrincipalUsuario.html");
        exit;
    }
} else if ($nr <= 0) {
    //si no existe se va a ... y pone el valor de error a SI
    header("Location: ../Vista/index.html");
    exit;
}
?>
