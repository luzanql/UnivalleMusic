<?php
session_start(); 
include('conexion.php');

//generando la consulta sobre el usuario y su contrasena
$qr = "SELECT id_Usuario, contrasena, nombre, apellido, codigo_Perfil ";
$qr .= "FROM Usuario WHERE id_Usuario = '" . $_POST["usuario"] . "' and contrasena='". $_POST["password"] . "' "; 
//ejecutando la consulta
$rs = mysql_query($qr);
$row = mysql_fetch_object($rs); 
//verificando si hay un usuario con ese password mediante numrows
$nr = mysql_num_rows($rs);
if($nr == 1){
	 //usuario y contraseña válidos 
	 //se define una sesion y se guarda el dato 
	 //session_start();
	 $_SESSION["autenticado"] = "si";
	 $_SESSION["usuario"] = $_POST['usuario'];
         $_SESSION["id_user"] = $row->id_Usuario;
	 $_SESSION["nombreusr"] = $row->nombre . " " . $row->apellido;
	 header ("Location: conexion.php");
} else if($nr <= 0) {
	 //si no existe se va a login.php y pone el valor de error a SI
	 header("Location: ../Vista/subir_cancion.html");
} 



?>
