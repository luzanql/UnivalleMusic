$(document).ready(function() {
       
    $('#content').click(function(){
        /*var info=$('#content').text();
        var datosCancion=info.split(",");
        var nombrecancion=datosCancion[0].split(":");
        var artistacancion=datosCancion[1].split(":")
        var titulo= nombrecancion[1];
        var artista=artistacancion[1];
        alert(titulo+"-"+artista);*/
        setTimeout(function() {
                        document.location.href="../Vista/ComprarMusica.php";
                    },1000);
       // var urlPhp="../Controladores/Carrito.php?opcion=1&codigo="+codigoCancion;
        //var url="../Controladores/Carrito.php?opcion=3&codigo="+codigoCancion;  
      
          /*  $.ajax({
            type: "POST",
            url: url,
            success: function( msg ) {
                if(msg=="true"){
                  
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
        });*/
            
    });

            


});




        
        


