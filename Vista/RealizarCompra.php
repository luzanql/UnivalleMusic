<?php include_once '../Recursos/Scripts/Login.php'; ?>
<div data-role = "dialog" id = "realizarCompra" >
        <div data-role = "header" data-theme = "b" data-transition = "slidedowm" >
            <script type="text/javascript" src="../Recursos/Scripts/ManejaCompra.js"></script>
      

        
        <h3>Realizar Compra</h3>
            
    </div>
    <div data-role = "content" align = "center" data-theme = "a">
        <div data-role="fieldcontain"  align="center">
            <label for="basic" data-mini="true" style="font-weight:bold">Entidad Financiera</label> 
            <select name="select-choice-1" id="select-choice-1">
		<option value="Bancafe">Bancafe</option>
		<option value="BanCoomeva">BanCoomeva</option>
		<option value="Banco Caja Social">Banco Caja Social</option>
		<option value="Banco Av Villas">Banco Av Villas</option>
                <option value="Banco de Bogota">Banco de Bogota</option>
		<option value="Banco de Credito">Banco de Credito</option>
		<option value="Banco de Occidente">Banco de Occidente</option>
		<option value="Banco Popular">Banco Popular</option>
                <option value="Banco Colpatria">Banco Colpatria</option>
                <option value="Banco HSBC">Banco HSBC</option>
                <option value="Banco CityBank">Banco CityBank</option>
                <option value="Banco Davivienda">Banco Davivienda</option>
                <option value="Bancolombia">Bancolombia</option>
                <option value="Banco Pichincha">Banco Pichincha</option>
                <option value="Banco Sudameris">Banco Sudameris</option>
	</select>
        </div>
           <div data-role="controlgroup" data-type="horizontal" data-mini="true" >
                 <a href="MensajePago.php" data-rel="dialog"  id="pagarFinal">
                <input  data-role="button"  value="Pagar" type="button"/> </a>
                <a href=#realizarCompra  data-rel="back" >
                <input  data-role="button"  value="Cancelar" type="button"/> </a>
        </div>
    </div>
       

     
       

</div>




