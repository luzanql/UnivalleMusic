/* 
 * JHONATHAN
 */

$(function(){
    llenarTabla();
    $('#mensaje').hide();
    $('#mensajeEliminar').hide();
    $('td[name*=php]').unbind('click');
    
    //agregar cancion al carrito
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
       
       
        //muestra el valor a pagar 
   
    });
    
    /*elimina cancion del carrito
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
    });*/
    
   
    
    function llenarTabla(){
        var urlPhp="../Controladores/Carrito.php?opcion=7";
        var titulosTabla = "<tr><th>Titulo</th> <th>Artista</th> <th>Album</th> <th>Eliminar</th></tr>";
        $('#tablaVerCarrito').html("");
        $('#tablaVerCarrito').append(titulosTabla);
    
        $.ajax({
            type: 'POST',
            url: urlPhp,
            dataType: 'json',
            cache: false,
           success: function(result) {
            for(var i=0 ; i < result.length ; i++){
                var contenidoHtml = "";
                var unaFila = result[i];
                contenidoHtml += "<tr><td>"+ unaFila[1]+"</td><td>"+unaFila[2]+"</td> <td>"+unaFila[3]+"</td><td id='"+unaFila[0]+"'><a href='' onclick='eliminar(\""+unaFila[0]+"\")'><img src='../Recursos/cart_delete.png' style='width:50%; height: 50%;' /></a></td></tr>";
                $('#tablaVerCarrito').append(contenidoHtml);                
            }
        }     
         
        }
        );   
               var url="../Controladores/Carrito.php?opcion=4";        
        
        $.ajax({
            type: "POST",
            url: url,
            success: function( msg ) {
                var pesos=(msg * 1950);
                $('#apagar').text("$"+pesos);
            }});
    
    }
    
     function eliminar(codigoCancion){
        //  var codigoCancion = $(this).attr('id');
        var urlPhp="../Controladores/Carrito.php?opcion=2&codigo="+codigoCancion;
        $.ajax({
            type: "POST",
            url: urlPhp                                
        }).done(function( msg ) {
            $('#mensajeEliminar').text(msg);
            $('#mensajeEliminar').show();
        
        });
        
        llenarTabla();
               
    }
    
   
     

