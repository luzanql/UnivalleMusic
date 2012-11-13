<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuevo Usuario </title>
        <link rel="stylesheet" href="../themes/male.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    </head>
    <body>
        <div data-role="page" data-theme= "a">

            <div data-role="header" data-theme ="b" style=" height: 167px;"><!--background-image: url(banner.png); -->

            </div><!-- /header -->

            <div data-role="content" data-theme = "a">	


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


                die("Tu cuenta fue creada exitosamente!!. Puede empezar a utilizar la aplicación.<br/>
                                    <a href=\"index.html\" data-role=\"button\"> OK</a>
                                    ");
                ?>


            </div>

        </div>
    </body>
</html>