<?php session_start();?>
<div data-role = "dialog" id = "verCarrito" >
    <div data-role = "header" data-theme = "b" data-transition = "slidedowm" >
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
            $controladorCarrito = new ControladorCarrito();
            $listaCanciones = $controladorCarrito->obtenerCancionesDelCarrito();
            echo $listaCanciones[3];
              for ($index = 0; $index < count($listaCanciones); $index++) {
                echo "<tr><td>n</td>
                    <td>n</td>
                    <td>n</td>
                    <td>n</td>                  
                    <td><a href=><img src='../Recursos/cart_delete.png' style='width:50%; height: 50%;' /></a></td></tr>";                          
            }
             
            
            ?>
           
        </table>
        <div data-role="controlgroup" data-type="horizontal" data-mini="true" >
            <input  data-role="button" value="Realizar Compra" type="button"/> 
        </div>


    </div>
</div>

