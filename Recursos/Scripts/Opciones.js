$(function(){
  var url="../Controladores/Login.php?opcion=4";
   alert("usuario");
    $("#comprar").hide();
    $("#logoCarrito").hide();
$.ajax({
            type: "POST",
            url: url,            
            success: function( msg ) {
               
                if(msg=='1'){
                   
                }else{
                     $("#comprar").show();
                    $("#logoCarrito").show();
                }
            }
        }
    )
              
 
 
})