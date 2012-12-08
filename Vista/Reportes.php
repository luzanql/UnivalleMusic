<?php include_once '../Recursos/Scripts/Login.php'; ?>
        
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reportes</title>
        <link rel="stylesheet" href="../themes/male.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
        <script src="../Recursos/Scripts/ManejaPerfil.js"></script>
    </head>
    <body>
         
        <div data-role="page" data-theme= "a">

            <div data-role="header" data-theme ="b" style=" height: 167px;"><!--background-image: url(banner.png); -->
                <img src="../Recursos/Banner.png" style="width: 80%; height: 100%;"/>
                <div style="float:right;">
                    <a href="verCarrito.php" data-rel="dialog" >
                        <img src="../Recursos/carrito.jpeg" style=" width:50%; height: 50%; "  /></a>
                    <div >   
                        <?php echo "Usuario:" . $_SESSION['usuario'] ?>
                    </div>
                </div >
            </div><!-- /header -->


            <div data-role="content" data-theme = "a">	
                <div class="ui-grid-b">
                    <div class="ui-block-a" style="width:250px; margin:3%">
                        <div data-role="controlgroup"> 
                            <a href="../Vista/MiPerfil.php" data-role="button"> Mi Perfil </a> 
                            <a href="../Vista/MiColeccion.php" data-role="button"> Mi Coleccion</a> 
                            <a href="../Vista/MisListas.php" data-role="button"> Listas de Reproduccion</a> 
                            <a href="../Vista/ComprarMusica.php" data-role="button"> Comprar Musica</a>
                        </div>
                    </div>
                   
                    <div class="ui-block-b" style=" margin:3%" align="center">               
                        <table align="right"> 
                            <tr>
                                <td>
                                    <h1>Reportes</h1>
                                </td>
                                <td><h1>    </h1></td>
                                <td>
                                    <img src="../Recursos/reportes.png" align="right"  >
                                </td>

                            </tr>

                        </table>
                              </div>
                        <div data-role="content">
                            <a data-role="button" data-theme="b" href="#page1">
                                Reporte PDF
                            <a data-role="button" data-theme="b" href="#page1">
                                Reportes Graficos
                            </a>
                        </div>
                     
              
                    
                  
                    
                </div>



            </div><!-- /content -->

            <div data-role="footer" data-theme = "b" STYLE=" border-style:solid; border-color: #c73930;">
                <h6>UNIVERSIDAD DEL VALLE</h6>
                <h6>Aplicaciones en la Web y Redes Inhalambricas</h6>
            </div>


        </div><!-- /page -->

    </body>
    
     
              
 
</html>