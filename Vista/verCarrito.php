<?php session_start();?>
<div data-role = "dialog" id = "verCarrito" >
    <div id="mensajeEliminar" style="color: dodgerblue"></div>
    <div data-role = "header" data-theme = "b" data-transition = "slidedowm" >
        <script type="text/javascript" src="../Recursos/Scripts/ManejaCarrito.js"></script>
        <h3>Carrito de Compras</h3>
    </div>
    <div data-role = "content" align = "center" data-theme = "a">
        <table border = "3" width = "100%" bordercolor = "gray">
            <tr>
                <th width = "30%">Codigo</th>
                <th width = "30%">Titulo </th>
                <th width = "20%">&Aacute;rtista</th>
                <th width = "40%">&Aacute;lbum</th>
                <th width = "40%">Eliminar</th>
            </tr>
            
             <?php
            include_once '../Controladores/ControladorCarrito.php';
            include_once '../Controladores/ControladorCancion.php';
            include_once '../Controladores/ControladorArtista.php';
            include_once '../Controladores/ControladorAlbum.php';
            $controladorCarrito = new ControladorCarrito();
            $controladorCancion=new ControladorCancion();
            $controladorArtista=new ControladorArtista();
            $controladorAlbum=new ControladorAlbum();
            
            $listaCanciones = $controladorCarrito->obtenerCancionesDelCarrito();
            for ($index = 0; $index < count($listaCanciones); $index++) {
                $codigo=$listaCanciones[$index];
                $cancion=$controladorCancion->obtenerCancionPorCodigo($codigo);
                $titulo=$cancion->getTitulo();
                $artista=$controladorArtista->obtenerNombreArtista($cancion->getArtista());
                $album=$controladorAlbum->obtenerNombreAlbum($cancion->getAlbum());
                echo "<tr><td>".$codigo."</td>
                    <td>".$titulo."</td>
                    <td>".$artista."</td>
                    <td>".$album."</td>                  
                    <td id='".$listaCanciones[$index]."'><img src='../Recursos/cart_delete.png' style='width:50%; height: 50%;' /></td></tr>";                       
            }
             
            
            ?>
           
        </table>
        <div id="total">0</div>
        <div data-role="controlgroup" data-type="horizontal" data-mini="true" >
            <input  data-role="button" value="Realizar Compra" type="button"/> 
        </div>


    </div>
</div>

