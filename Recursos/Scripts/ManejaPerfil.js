$(document).ready(function() {
    llenarDatos();
    $("#btnDarseBaja").on('click',darseBaja);
    $("#btnModificar").on('click',modificar);
        
    function llenarDatos(){
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
        
        });
    }
                            
   
    function modificar(){           
        if(camposVacios()){
            alert("Hay Campos Vacios")
        }else {
            var codigo=$("#usuario").val();
            var nombre=$("#nombre").val();
            var apellido=$("#apellido").val();
            var email=$("#email").val();
            var nacionalidad=$("#nacionalidad").val();
            var url="../Controladores/ControladorPerfil.php?opcion=1&codigo="+codigo+"&nombre="+nombre+"&apellido="+apellido+"&email="+email+"&nacionalidad="+nacionalidad;
            $.ajax({
                type: "POST",
                url: url,
                success: function( msg ) {
                    alert(msg);
                     
                    llenarDatos();
                }
    

            })

        }
        llenarDatos();
    }
    
     
     function darseBaja(){
    $("#btnDarseBaja").on('click',function(){
        var codigo=$("#usuario").val();
        var url1="../Controladores/ControladorPerfil.php?opcion=2&codigo="+codigo+"";
        $.ajax({
            type: "POST",
            url: url1,
                success: function( msg ) {
                    alert(msg);
                   setTimeout(function() {
                        document.location.href="../Vista/index.html";
                    },1000);
            
   

        
    }});})}
                             
    function camposVacios(){
        var nombre=$("#nombre").val();
        var apellido=$("#apellido").val();
        var email=$("#email").val();
        var nacionalidad=$("#nacionalidad").val();
        
        if(nombre==""|| apellido==""|| email==""|| nacionalidad==""){
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

