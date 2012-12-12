$(function(){
    var url="../Controladores/Login.php?opcion=4";
  
    $("#comprarMusica").hide();
    $("#logoCarrito").hide();
    $("#reportes").hide();
    $.ajax({
        type: "POST",
        url: url,            
        success: function( msg ) {
               
            if(msg=='1'){
                $("#reportes").show();
                
            }else{
                $("#comprarMusica").show();
                $("#logoCarrito").show();
            }
        }
    }
    )
              
 
 
})