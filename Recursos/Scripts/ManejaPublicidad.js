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
    $('#content').hover(function(){
    $('#content').animate({
         'border-bottom-width': "20",
         'font-size': '25pt',
         'color':'red'
         
      });
      /* $('#publicidad').animate({
          'height': '300%'
      })*/
  })
  
   $('#content').mouseleave(function(){
        $('#content').animate({
         //'border-bottom-width': "20"
         'font-size': '15pt',
          'color':'white'
         
      });
    /*   $('#publicidad').animate({
          'height': '200%'
      })*/
      
     
  });
  

            


});




        
        


