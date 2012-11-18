/* 
 * JHONATHAN
 */

$(function(){
    $('#mensaje').hide();
    $('#mensajeEliminaar').hide();
    $('td[name*=php]').click(function(){
       
        var codigoCancion = $(this).attr('name');
        var urlPhp="../Controladores/Carrito.php?opcion=1&codigo="+codigoCancion;
        var url="../Controladores/Carrito.php?opcion=3&codigo="+codigoCancion;
        
        
        
        
        $.ajax({
            type: "POST",
            url: url                              
        }).done(function( msg ) {
      
            if(msg=="false"){
                $.ajax({
                    type: "POST",
                    url: urlPhp                                
                }).done(function( msg ) {
                    $('#mensaje').text(msg);
                    $('#mensaje').show();
                    
        
                });
          
          
            }else {
                  $('#mensaje').text("La cancion YA fue agregada al carrito");
                    $('#mensaje').show(); 
                
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
