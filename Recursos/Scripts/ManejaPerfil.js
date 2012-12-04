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
                            
    $("#btnModificar").on('click',modificar);
        
     function modificar(){           
        if(camposVacios()){
            alert("Hay Campos Vacios")
        }else {
            //debo obtener los valores de los input y enviarlos a por la url hacia controladorPerfil.php opciom=1
            
          /* {
            var esta=validarEmail(email);
            if(esta=="false"){
                alert("El email es incorrecto")
            }
    else{
        alert("Se puede modificar");
    } 
        
           }*/
        var codigo=$("#usuario").val();
        var nombre=$("#nombre").val();
        var apellido=$("#apellido").val();
        var email=$("#email").val();
        var nacionalidad=$("#nacionalidad").val();
        var pasw=$("#password").val(); 
            var url="../Controladores/ControladorPerfil.php?opcion=1&codigo="+codigo+"&nombre="+nombre+"&apellido="+apellido+"&email="+email+"&nacionalidad="+nacionalidad+"&pasw="+pasw;
         $.ajax({
            type: "POST",
            url: url,
            success: function( msg ) {
                alert(msg);
            }
    

})

}}
    
     $("#btnDarseBaja").on('click',function(){
         var codigo=$("#usuario").val();
         var url1="../Controladores/ControladorPerfil.php?opcion=2&codigo="+codigo+"";
       $.ajax({
            type: "POST",
            url: url1,
            success: function( msg ) {
                alert(msg);
            }
    

});

        
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
    //esto como que no sirve :S
     function validarEmail(valor) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
   return "true";
  } else {
   return "false";
  }
}
 
    



        
        
})

