/* 
 * JHONATHAN
 */

$(function(){
    llenarTabla();
    
    
    function llenarTabla(){
        var urlPhp="../Controladores/Listas.php?opcion=1";
        var titulosTabla = "<tr><th>Nombre Listas</th> <th>Opcion</th></tr>";
        $('#tablaMisListas').html("");
        $('#tablaMisListas').append(titulosTabla);
    
        $.ajax({
            type: 'POST',
            url: urlPhp,
            dataType: 'json',
            cache: false,
            success: function(result) {
                //alert(result[0][);
                for(var i=0 ; i <result.length; i++){
                    var contenidoHtml = "";
                    var unaFila = result[i];
                    contenidoHtml += "<tr><td><a href='../Vista/MiColeccion.php?nombreLista=" + unaFila[1]+ "&codLista=" +unaFila[0]+ "'>" +unaFila[1] +"</a></td>"
                    contenidoHtml +="<td><a  href='../Vista/EliminarLista.php?lista="+unaFila[1]+"' data-rel='dialog'  data-role='button' data-icon='delete' >Eliminar</a></td></tr>";
                    alert("termino de pegar html");
                    $('#tablaMisListas').append(contenidoHtml);                
                }
            }     
         
        }
        );   
             
    
    };

})
    
    
   
     

