<div data-role="page" id="eliminarLista" data-theme= "a">
    <div data-role="header" data-theme= "b" data-transition="slidedowm" > <h3>Eliminar Lista Reproduccion</h3></div>
    <div data-role="content" align= "center" data-theme = "a">
      <!--  <h3>La lista se elimino satisfactoriamente</h3>-->
        <?php
        include_once '../Controladores/ControladorListaReproduccion.php';

        $lista = $_GET['lista'];
        $controladorLista = new ControladorListaReproduccion();
        if($lista=="Favoritas" || $lista=="Compartidas"){
            echo "Las Listas Favoritas y Compartidas NO se pueden eliminar";
        }else{
        $codigoLista = $controladorLista->obtenerCodigoLista($lista);
        $controladorLista->deleteListaReproduccion($codigoLista);
        echo "La lista se elimino satisfactoriamente";
        }
        ?>
    </div>
</div>
