/* 
 * JHONATHAN
 */

$(function(){
    $('#mensaje').hide();
    $('#mensajeEliminar').hide();
    $('td[name*=php]').unbind('click');
    
    $('td[name*=php]').on('click',function(){
        $('td[name*=php]').bind('click');
        var codigoCancion = $(this).attr('name');
        var urlPhp="../Controladores/Carrito.php?opcion=1&codigo="+codigoCancion;
        var url="../Controladores/Carrito.php?opcion=3&codigo="+codigoCancion;        
        
        $.ajax({
            type: "POST",
            url: url,
            success: function( msg ) {
                if(msg=="true"){
                    $('#mensaje').text("LA cancion YA se agrego al carrito");
                    $('#mensaje').show();
                   
                }else{
                    $.ajax({
                        type: "POST",
                        url: urlPhp,
                        success: function( msg ) {
                            $('#mensaje').text(msg);
                            $('#mensaje').show();
                        }        
                    });
                
                }
            }        
        });
    });
       
    
    
    $('td[id*=php]').click(function(){
       
        var codigoCancion = $(this).attr('id');
        var urlPhp="../Controladores/Carrito.php?opcion=2&codigo="+codigoCancion;
        $.ajax({
            type: "POST",
            url: urlPhp                                
        }).done(function( msg ) {
            $('#mensajeEliminar').text(msg);
            $('#mensajeEliminar').show();
        
        });
    });
    
      var url="../Controladores/Carrito.php?opcion=4";        
        
        $.ajax({
            type: "POST",
            url: url,
            success: function( msg ) {
                var pesos=(msg * 1950);
                $('#apagar').text("$"+pesos);
            }});
    
    
    
});
