<?php include_once '../Recursos/Scripts/Login.php'; ?>
<div data-role = "page" id = "verCarrito" >
    
    <div data-role = "header" data-theme = "b" data-transition = "slidedowm" >
        <script type="text/javascript" src="../Recursos/Scripts/ManejaCarrito.js"></script>
    
        <h3>Carrito de Compras</h3>
    </div>
    <div data-role = "content" align = "center" data-theme = "a">
        <div id="mensajeEliminar" style="color: dodgerblue"></div>
        <table border = "3" width = "100%" bordercolor = "gray" id="tablaVerCarrito">
           <!--<tr>
                <th width = "30%">Titulo </th>
                <th width = "20%">&Aacute;rtista</th>
                <th width = "40%">&Aacute;lbum</th>
                <th width = "40%">Eliminar</th>
            </tr>-->
            
            
        </table>
        Total a Pagar:
      <div id="apagar" style="color: red"></div>
        
        
        <div data-role="controlgroup" data-type="horizontal" data-mini="true" >
            <a href="RealizarCompra.php" data-rel="dialog" >
                <input  data-role="button"  value="Realizar Compra" type="button"/> </a>
        </div>


    </div>
</div>