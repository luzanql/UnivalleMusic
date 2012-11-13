<div data-role = "page" id = "verCarrito" >
    <div data-role = "header" data-theme = "b" data-transition = "slidedowm" > <h3>Carrito de Compras</h3></div>
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
            $controladorCarrito = new ControladorCarrito();
            $listaCanciones = array();
            $listaCanciones = $controladorCarrito->obtenerListaCancionesCarrito();
            for ($index = 0; $index < count($listaCanciones); $index++) {
                echo "<tr><td>" . $listaCanciones[$index][0] . "</td>
                    <td>" . $listaCanciones[$index][1] . "</td>
                    <td>" . $listaCanciones[$index][2] . "</td>
                    <td>" . $listaCanciones[$index][3] . "</td>                  
                    <td><a href='ComprarMusica.php?codigo=" . $listaCanciones[$index][0] . "'><img src='../Recursos/cart_delete.png' style='width:50%; height: 50%;' /></a></td></tr>";
            }
            ?>
            </table>
        <div data-role="controlgroup" data-type="horizontal" data-mini="true" >
             <input  data-role="button" value="Realizar Compra" type="button"/> 
             </div>


    </div>
</div>

