<?php include_once '../Recursos/Scripts/Login.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comprar Musica</title>
        <link rel="stylesheet" href="../themes/male.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
        <script type="text/javascript" src="../Recursos/Scripts/ManejaCarrito.js"></script>
        <script type="text/javascript" src="../Recursos/Scripts/ManejaCompra.js"></script>
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
                        echo "Usuario: " . $usuarioActual."<br/>".
                                        "<a href='../Recursos/Scripts/Logout.php'>Cerrar Sesi&oacute;n</a>";
                                ?>
                    </div>
                </div >
            </div><!-- /header -->

            <div data-role="content" data-theme = "a">	
                <div class="ui-grid-b">
                    <div class="ui-block-a" style="width:21%; margin:3%">

                         <div data-role="controlgroup"> 
                            <a href="../Vista/MiPerfil.php" data-role="button" id="perfil" rel="external"> Mi Perfil </a> 
                            <a href="../Vista/MiColeccion.php" data-role="button" id="coleccion" rel="external"> Mi Coleccion</a> 
                            <a href="../Vista/MisListas.php" data-role="button" id="listas" rel="external"> Listas de Reproduccion</a> 
                            <a href="../Vista/ComprarMusica.php" data-role="button" id="comprarMusica" rel="external"> Comprar Musica</a>
                            <a href="../Vista/Reportes.php" data-role="button" id="reportes" rel="external"> Reportes </a>
                        </div>
                    </div>
                    <div class="ui-block-b" style="width:25%; margin:3%;">

                        <?php
                        include_once '../Controladores/ControladorCarrito.php';
                        include_once '../Controladores/ControladorCancion.php';
                        $controladorCarrito = new ControladorCarrito();
                        $controladorCancion = new ControladorCancion();
                       
                        
                        ?>
                        <div id="mensaje" style="color: dodgerblue"></div>

                        <p>Comprar M&uacute;sica</p>
                        <div style="overflow: auto; height: 250px; width: 250%;">
                            <table border="3" bordercolor="gray" id="opciones" >
                            <tr >
                                <th width="30%">Titulo </th>
                                <th width="20%">&Aacute;rtista</th>
                                <th width="40%">&Aacute;lbum</th>
                                <th width="40%">Agregar</th>
                            </tr>
                            <?php
                            include_once '../Controladores/ControladorCarrito.php';
                       
                           // $controladorCarrito = new ControladorCarrito();
                            $listaCanciones = $controladorCarrito->obtenerListaCancionesALaVenta();
                            for ($index = 0; $index < count($listaCanciones); $index++) {
                                echo "<tr>
					<td>" . $listaCanciones[$index][1] . "</td>
					<td>" . $listaCanciones[$index][2] . "</td>
					<td>" . $listaCanciones[$index][3] . "</td>
					<td name='".$listaCanciones[$index][0]."'><img src='../Recursos/carrito.jpeg' style='width:80%; height: 50%;' /></td></tr>";
                            }
                            ?>
                        </table>
                           </div>
                    </div>

                </div><!-- /grid-b -->

            </div><!-- /content -->

            <div data-role="footer" data-theme = "b" STYLE=" border-style:solid; border-color: #c73930;">
                <h6>UNIVERSIDAD DEL VALLE</h6>
                <h6>Aplicaciones en la Web y Redes Inhalambricas</h6>
            </div>


        </div><!-- /page -->

    </body>
</html>
