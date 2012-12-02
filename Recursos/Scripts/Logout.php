<?php
session_start();
if (isset($_SESSION['usuario'])){
    unset($_SESSION['usuario']);
    unset($_SESSION['nombreUsuario']);
    unset($_SESSION['perfil']);
    unset($_SESSION['carrito']);
    
    header("Location: ../../Vista/index.html");
}  else {
    header("Location: ../../Vista/index.html");
}
?>
