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
    <body>

        <div data-role="page" data-theme= "a">

            <div data-role="header" data-theme ="b" style=" height: 167px;"><!--background-image: url(banner.png); -->
                <img src="../Recursos/Banner.png" style="width: 100%; height: 100%;"/>
                <div style="float:right; "><!--style="width:20%; height:100%; float:right; "-->
                    <a href="#verCarrito" data-rel="popup" data-role="button" data-icon="plus" >
					<img src="../Recursos/carrito.jpeg" style=" width:50%; height: 50%; "  /></a>
					
                </div>
            </div><!-- /header -->

            <div data-role="content" data-theme = "a">	
                <div class="ui-grid-b">
                    <div class="ui-block-a" style="width:250px; margin:3%">

                        <div data-role="controlgroup"> 
                            <a href="index.html" data-role="button"> Mi Perfil </a> 
                            <a href="../Vista/MiColeccion.php" data-role="button"> Mi Coleccion</a> 
                            <a href="../Vista/MisListas.php" data-role="button"> Listas de Reproduccion</a> 
                            <a href="index.html" data-role="button"> Comprar Musica</a>
                        </div>
                    </div>
                    <div class="ui-block-b" style="width:250px; margin:3%">
					
						<?php
							include_once '../Controladores/ControladorCarrito.php';
							include_once '../Controladores/ControladorCancion.php';
							$controladorCarrito = new ControladorCarrito();
							$controladorCancion = new ControladorCancion();
							
							if($_GET){
								$codigo = $_GET['codigo'];
								$cancion = $controladorCancion->obtenerCancionPorCodigo($codigo);
								$controladorCarrito->addCancion($cancion);
								$sessionActual = Session::getInstance();
								$carrito = $sessionActual->carrito;
								echo "<h4>Se ha agregado la cancion \"".$cancion->getTitulo()." al carrito de compras.</h4>";
								//print_r($carrito);
							}
                                                ?>
					
                        <p>Comprar M&uacute;sica</p>
                      
                        <table border="3" width="200%" bordercolor="gray">
                            <tr>
                                <th width="30%">Codigo</th>
                                <th width="30%">Titulo </th>
                                <th width="20%">&Aacute;rtista</th>
                                <th width="40%">&Aacute;lbum</th>
								<th width="40%">Agregar</th>
                            </tr>
                            <?php
								include_once '../Controladores/ControladorCarrito.php';
								$controladorCarrito=new ControladorCarrito();
								$listaCanciones = array();
								$listaCanciones = $controladorCarrito->obtenerListaCancionesCarrito();
								for ($index = 0; $index < count($listaCanciones); $index++) {
										echo "<tr><td>".$listaCanciones[$index][0]."</td>
										<td>".$listaCanciones[$index][1]."</td>
										<td>".$listaCanciones[$index][2]."</td>
										<td>".$listaCanciones[$index][3]."</td>
										<td><a href='ComprarMusica.php?codigo=".$listaCanciones[$index][0]."'><img src='../Recursos/carrito.jpeg' style='width:50%; height: 50%;' /></a></td></tr>";
										
								}
							?>
                        </table>
                    </div>

                </div><!-- /grid-b -->
				
            </div><!-- /content -->

            <div data-role="footer" data-theme = "b" STYLE=" border-style:solid; border-color: #c73930;">
                <h6>UNIVERSIDAD DEL VALLE</h6>
                <h6>Aplicaciones en la Web y Redes Inhalambricas</h6>
            </div>
			
			<!--  Aqui se muestra el carrito de compras -->
		
					<div data-role="popup" id="verCarrito" >
						<div data-role="header" data-theme= "b" data-transition="slidedowm" > <h3>Carrito de Compras</h3></div>
						<div data-role="content" align= "center" data-theme = "a">
							<table border="3" width="100%" bordercolor="gray">
										<tr>
											<th width="30%">Codigo</th>
											<th width="30%">Titulo </th>
											<th width="20%">&Aacute;rtista</th>
											<th width="40%">&Aacute;lbum</th>
											<th width="40%">Agregar</th>
										</tr>
										<?php
											include_once '../Controladores/ControladorCarrito.php';
											$controladorCarrito=new ControladorCarrito();
											$listaCanciones = array();
											$listaCanciones = $controladorCarrito->obtenerListaCancionesCarrito();
											for ($index = 0; $index < count($listaCanciones); $index++) {
													echo "<tr><td>".$listaCanciones[$index][0]."</td>
													<td>".$listaCanciones[$index][1]."</td>
													<td>".$listaCanciones[$index][2]."</td>
													<td>".$listaCanciones[$index][3]."</td>
													<td><a href='ComprarMusica.php?codigo=".$listaCanciones[$index][0]."'><img src='../Recursos/carrito.jpeg' style='width:50%; height: 50%;' /></a></td></tr>";
													
											}
										?>
							
							
						</div>
					 </div>

        </div><!-- /page -->

    </body>
</html>
