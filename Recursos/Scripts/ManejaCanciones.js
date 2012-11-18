/* 
 * JHONATHAN
 */

$(function(){
    
    var usuarioLogueado = $('#usuarioLogueado').text();
    usuarioLogueado = usuarioLogueado.trim();
    var listaCanciones = $('li a');
    
    var btnAgragarAListas = $('#agragarAListas');
        
    listaCanciones.on('click',function(){
        cancionCambiarLista = $(this).attr('name');
                
        var contenedorListas = $('#checkboxListas');
        var urlPhp= "../AccesoDatos/AutoCompletar.php?opcion=6&usuario="+usuarioLogueado;
    
        $.ajax({
            type: 'POST',
            url: urlPhp,
            dataType: 'json',
            cache: false,
            success: function(result) {
                var contenidoHtml = "";
                contenidoHtml += "<label><input type='checkbox' name='Favoritas' />Favoritas</label>";
                for(var i=0 ; i < result.length ; i++){
                    var unaFila = result[i];
                    contenidoHtml += "<label><input type='checkbox' name='";
                    contenidoHtml += unaFila[0];
                    contenidoHtml += "'/>";
                    contenidoHtml += unaFila[1];
                    contenidoHtml += "</label>";                    
                }
                contenedorListas.html(contenidoHtml);
                contenidoHtml = "";
            }
        });
    });
        
    btnAgragarAListas.on('click',function(){
        var listasReproduccion = $('input:checked');
        alert(listasReproduccion.attr('name'));
    });    
    
});