<?php
$enlace = "../Recursos/Canciones/Tone_Urbano.mp3";
header ("Content-Disposition: attachment; filename=$enlace ");
header ("Content-Type: application/force-download");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
echo $enlace;
?> 
?>
