<?php
include_once '../Recursos/Scripts/downloadFile.php';

if (isset($_GET['cancion'])) {
    $cancion = $_GET['cancion'];
    $enlace = "../Recursos/Canciones/" . $cancion;
    downloadFile($enlace);    
}
?>
