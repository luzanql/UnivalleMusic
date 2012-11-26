$(document).ready(function() {
    var urlPhp="../AccesoDatos/AutoCompletar.php?opcion=7";
    $.ajax({
        type: "POST",
        url: urlPhp                                
    }).done(function( msg ) {
        var datos=msg.split(",");
                                
        $("#nombre").val(datos[0]);
        $("#apellido").val(datos[1]);
        $("#email").val(datos[2]);
        $("#nacionalidad").val(datos[3]);
        $("#usuario").val(datos[4]);
        $("#password").val(datos[5]);
    });
                            
    $("#btnModificar").on('click',function(){
        
               var email=$("#email").val();                  
        if(camposVacios()){
            alert("Hay Campos Vacios")
        }else 
           
            esta=validarEmail(email);
            if(esta=="true"){
                alert("El email es correcto")
            }
    else{
        alert("Se puede modificar");
    } 
        
    });
    
     $("#btnDarseBaja").on('click',function(){
       alert("me puedo dar de baja"); 
        
    });
                             
    function camposVacios(){
        var nombre=$("#nombre").val();
        var apellido=$("#apellido").val();
        var email=$("#email").val();
        var nacionalidad=$("#nacionalidad").val();
        var password=$("#password").val();
         if(nombre==""|| apellido==""|| email==""|| nacionalidad==""|| password==""){
             return true;
         }else 
             return false;
                               
    }
    
     function validarEmail(valor) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
   return "true";
  } else {
   return "false";
  }
}
 
    



        
        
})

