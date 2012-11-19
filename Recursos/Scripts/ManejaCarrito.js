/* 
 * JHONATHAN
 */

$(function(){
    $('#mensaje').hide();
    $('#mensajeEliminaar').hide();
    
    $('td[name*=php]').on('click',function(){
        alert("dio click");
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
                    var total = $('#total').text();
                    total++;
                    $('#total').text(total);
                    alert(total);
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
    
    
    
});
