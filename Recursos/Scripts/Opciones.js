<?php
session_start();
if (isset($_SESSION['usuario'])){
    $usuarioCurrent = $_SESSION['usuario'];
    if($usuarioCurrent == ""){
        header("Location: ../Vista/index.html");
    }
}  else {
    header("Location: ../Vista/index.html");
}
?>
