<?php session_start(); ?>
    
<div data-role = "dialog" id = "realizarCompra" >
    
    <div data-role = "header" data-theme = "b" data-transition = "slidedowm" >
        <script type="text/javascript" src="../Recursos/Scripts/ManejaCompra.js"></script>
        <h3>Realizar Compra</h3>
            
    </div>
    <div data-role = "content" align = "center" data-theme = "a">
        <div data-role="fieldcontain"  align="right">
            <label for="basic" data-mini="true">Entidad Financiera</label> <input type="banco" name="banco" id="banco" value="" data-mini="true"   style="width:200px;height:30px;"/>
        </div>
            
    </div>
</div>
<script>
    $( "#banco").autocomplete({
        source:  "../AccesoDatos/AutoCompletar.php?opcion=8", 
        minLength:2,
        select: function ( event, ui ) {}
    });
    
</script>




