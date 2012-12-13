var divDescargar;
    
$(document).ready(function() {
    divDescargar= $("#descargar");
    divDescargar.hide();
});

function descargar(cancionDescarga){
    var url="../Controladores/Dowload.php?cancion="+cancionDescarga;
            
    $.ajax({
        type: "GET",
        url: url,
        success: function(data){
            if(data == true){
                alert('Este archivo no se puede descargar.');
            }else{
                window.location =""+url+"";
            }
        }
    });
    
}