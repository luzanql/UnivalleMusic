
$(document).ready(function() {

    $("#btnIngresar").click( function(){
        
        var pasw=$("#contrasena").val();
        var usuario=$("#usuario").val();
    
        //verificar si esta activo
        var url="../Controladores/Login.php?opcion=1&usuario="+usuario;
        //verificar psw y usuario correctos
        var url1="../Controladores/Login.php?opcion=2&usuario="+usuario+"&pasw="+pasw;
        
        $.ajax({
            type: "POST",
            url: url1,            
            success: function( msg ) {
               
                // pasw y usuario correctos
                if(msg=="true"){
                    //verifico si esta activo
                    $.ajax({
                        type: "POST",
                        url: url,
                        success: function( msg ) {
                            
                            
                            //si esta activo
                            
                            
                            if(msg=="true"){                                
                                //hace login
                                var url2="../Controladores/Login.php?opcion=3&usuario="+usuario;
                                $.ajax({
                                    type: "POST",
                                    url: url2,
                                    success: function( msg ) {
                                        //alert("Entro: "+msg);
                                        setTimeout(function() {
                                            document.location.href="../Vista/MiColeccion.php";
                                        },1000);
                                         
                                    }
                                });
                            //fin hace login
                            }
                            //si no esta activo lo reactiva
                            else{
                                var url3="../Controladores/ControladorPerfil.php?opcion=3&codigo="+usuario;
                                $.ajax({
                                    type: "POST",
                                    url: url3,
                                    success: function( msg ) {
                                        alert(msg);
                                        setTimeout(function() {
                                            document.location.href="../Vista/MiColeccion.php";
                                        },1000);
                                         
                                    }
                                });
                               // alert("TU CUENTA FUE ACTIVADA");
                               
                            // $('#mensaje').text("El usuario NO esta activo");                   
                            }
                        }
                    });
                }
                //usuario opasww incorrectos
                else{
                    
                    $('#mensaje').text("El usuario o la contraseña NO son correctos");
                   
                }
            }
        });
        
          
    
    });
});