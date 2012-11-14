<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <link rel="stylesheet" href="../themes/male.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>



    </head>        
    <div data-role="page" id="mensaje" data-theme= "a"  align= "center" >
        <div data-role="header" data-theme= "b" data-transition="slidedowm" > <h3>Nuevo Usuario</h3></div>
        <div data-role="content" align= "center" data-theme = "a">
            <h4>Usuario creado con exito! Puedes empezar a hacer uso de la aplicación </h4>
        </div>
        <?php
        include('../Controladores/ControladorUsuario.php');
        include('../Controladores/ControladorNacionalidad.php');

        //
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $nacionalidad = $_POST["nacionalidad"];
        $user = $_POST["user"];
        $pass = $_POST["password"];

        $controladorNacionalidad = new ControladorNAcionalidad();
        $existeNacionalidad = $controladorNacionalidad->existeNacionalidad($nacionalidad);

        if (!$existeNacionalidad) {

            $controladorNacionalidad->createNacionalidad($nacionalidad);
        }

        $codigo_nacionalidad = $controladorNacionalidad->obtenerCodigoNAcionalidad($nacionalidad);

        $controladorUsuario = new ControladorUsuario();
        $controladorUsuario->createUsuario($nombre, $apellido, $email, $codigo_nacionalidad, $user, $pass);
        ?>
        <div data-role="controlgroup" data-type="horizontal" data-mini="true">
            <a href="../Vista/index.html"  data-role="button">Volver</a>
        </div>

    </div>


