<?php include_once '../Recursos/Scripts/Login.php'; ?>        
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi Perfil</title>
        <link rel="stylesheet" href="../themes/male.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
        <script src="../Recursos/Scripts/ManejaPerfil.js"></script>
        <script type="text/javascript" src="../Recursos/Scripts/Opciones.js"></script>
    </head>
    <body>

        <div data-role="page" data-theme= "a">

            <div data-role="header" data-theme ="b" style=" height: 167px;"><!--background-image: url(banner.png); -->
                <img src="../Recursos/Banner.png" style="width: 80%; height: 100%;"/>
                <div style="float:right;">
                    <a href="verCarrito.php" data-rel="dialog" id="logoCarrito">
                        <img src="../Recursos/carrito.jpeg" style=" width:50%; height: 50%; "  /></a>
                    <div >   
                        <?php
                        $usuarioActual = $_SESSION['usuario'];
                        echo "Usuario: " . $usuarioActual . "<br/>" .
                        "<a href='../Recursos/Scripts/Logout.php'>Cerrar Sesi&oacute;n</a>";
                        ?>
                    </div>
                </div >
            </div><!-- /header -->


            <div data-role="content" data-theme = "a">

                <div class="ui-grid-b">
                    <div class="ui-block-a" style="width:21%; margin:3%">
                        <div data-role="controlgroup"> 
                            <a href="../Vista/MiPerfil.php" data-role="button" id="perfil"  rel="external"> Mi Perfil </a> 
                            <a href="../Vista/MiColeccion.php" data-role="button" id="coleccion"  rel="external"> Mi Coleccion</a> 
                            <a href="../Vista/MisListas.php" data-role="button" id="listas"  rel="external"> Listas de Reproduccion</a> 
                            <a href="../Vista/ComprarMusica.php" data-role="button" id="comprarMusica"  rel="external"> Comprar Musica</a>
                            <a href="../Vista/Reportes.php" data-role="button" id="reportes"  rel="external"> Reportes </a>
                        </div>
                    </div>

                    <div class="ui-block-b" style=" width:27%; margin:3%" align="center">

                        <table align="right"> 
                            <tr>
                                <td>
                                    <h1>Mi Perfil</h1>
                                </td>
                                <td><h1>    </h1></td>
                                <td>
                                    <img src="../Recursos/user.png" align="right"  >
                                </td>

                            </tr>

                        </table>

                        <form name="formMiPerfil" action="" method="post" enctype="multipart/form-data">

                            <div data-role="fieldcontain" align="right">
                                <label for="basic" data-mini="true">Nombre:</label> <input type="text" name="nombre" id="nombre" value="" data-mini="true"   style="width:200px;height:30px;"  required=""  align="right"/>
                            </div>
                            <div data-role="fieldcontain" align="right">
                                <label for="basic" data-mini="true">Apellido:</label> <input type="text" name="apellido" id="apellido" value="" data-mini="true"   style="width:200px;height:30px;"  required=""    align="right"/>
                            </div> 
                            <div data-role="fieldcontain"  align="right">
                                <label for="basic" data-mini="true">E-mail:</label> <input type="email" name="e-mail" id="email" value="" data-mini="true"   style="width:200px;height:30px;"  required="" align="right"  />
                            </div> 
                            <div data-role="fieldcontain" align="right">
                                <label for="basic" data-mini="true">Nacionalidad:</label> <input type="text" name="nacionalidad" id="nacionalidad" value="" data-mini="true"   style="width:200px;height:30px;"  required="" align="right" />
                            </div> 
                            <div data-role="fieldcontain" align="right">
                                <label for="basic" data-mini="true">Usuario:</label> <input type="text" name="usuario" id="usuario" value="" data-mini="true"   style="width:200px;height:30px;"  required="" disabled="" align="right" />
                            </div> 

                            <div data-role="controlgroup" data-type="horizontal" data-mini="true" align="right">
                                <input  data-role="button" value="Darme De Baja" type="button" id="btnDarseBaja"/>
                                <input type="button" value="Modificar" id="btnModificar" />

                            </div>
                        </form >

                        <!--
                        <input type="submit" value="Descargar" id="btnDowload" />
                        -->

                                      
                    </div>

                </div>
            </div><!-- /content -->

            <div data-role="footer" data-theme = "b" STYLE=" border-style:solid; border-color: #c73930;">
                <h6>UNIVERSIDAD DEL VALLE</h6>
                <h6>Aplicaciones en la Web y Redes Inhalambricas</h6>
            </div>
        </div><!-- /page -->
        <script>       
            $( "#nacionalidad").autocomplete({
                source:  "../AccesoDatos/AutoCompletar.php?opcion=2", 
                minLength:2,
                select: function ( event, ui ) {}
            });
        </script>
    </body>
</html>
