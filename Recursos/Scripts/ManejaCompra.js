$(document).ready(function() {

    var url="../Controladores/Carrito.php?opcion=4";        
        
    $.ajax({
        type: "POST",
        url: url,
        success: function( msg ) {
            var pesos=(msg * 1950);
            if(pesos<=0){
                $("#mensajeConfirmacion").text("Lo sentimos, el valor de su transaccion es inferior al monto minimo establecido");

            } else {
       
               
                var url1="../Controladores/Carrito.php?opcion=5";
                $.ajax({
                    type: "POST",
                    url: url1,
                    success: function( msg ) {}
                })
                 $("#mensajeConfirmacion").text("El pago se realizo satisfactoriamente");
        }
                
    }
    });

});




        
        


