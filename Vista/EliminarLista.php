<div data-role="page" id="eliminarLista" data-theme= "a">
            <div data-role="header" data-theme= "b" data-transition="slidedowm" > <h3>Eliminar Lista Reproduccion</h3></div>
            <div data-role="content" align= "center" data-theme = "a">
                <h3>La lista se elimino satisfactoriamente</h3>
<?php
                include_once '../Controladores/ControladorListaReproduccion.php';
                
                $lista=$_GET['lista'];
                $controladorLista=new ControladorListaReproduccion();
                $codigo=$controladorLista->obtenerCodigoLista($lista);
                $controladorLista->deleteListaReproduccion($codigo);
                        die( $codigo);
                
                ?>
    
                
                
            </div>
         </div>
