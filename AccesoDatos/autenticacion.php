<?php

include_once ('conexion.php');

$conexion = new Conexion();
$conexion->Conectar();
session_start(); 

//generando la consulta sobre el usuario y su contrasena
$sqr ="SELECT usuario, contrasena, nombre, apellido, codigo_Perfil FROM Usuario WHERE usuario = '".$_POST["usuario"]."' and contrasena='".$_POST["password"]."'"; 
//ejecutando la consulta
$rs = mysql_query($sqr);
$row = mysql_fetch_object($rs); 
//verificando si hay un usuario con ese password mediante numrows
$nr = mysql_num_rows($rs);
if($nr == 1){
	 //usuario y contraseña válidos 
	 //se define una sesion y se guarda el dato 
	 //session_start();
         
         $_SESSION["autenticado"] = "si";
	 $_SESSION["usuario"] = $_POST['usuario'];
         $_SESSION["id_user"] = $row->usuario;
	 $_SESSION["nombreusr"] = $row->nombre." ".$row->apellido;
         $_SESSION["perfil"] = $row->codigo_Perfil;
         
         if ($_SESSION["perfil"] == 2)
         {
         header ("Location: ../Vista/principalAdmin.html");    
         }
	 
} else if($nr <= 0) {
	 //si no existe se va a ... y pone el valor de error a SI
	 header ("Location: ../Vista/index.html"); 
                    } 

?>
