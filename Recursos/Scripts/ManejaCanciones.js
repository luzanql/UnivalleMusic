/* 
 * JHONATHAN
 */

var usuarioLogueado = "";
var cancionCurrent = "";

$(function(){
    
    llenarListaReproductor("");

    usuarioLogueado = $('#usuarioLogueado').text();
    usuarioLogueado = usuarioLogueado.trim();
    usuarioLogueado = usuarioLogueado.replace("Usuario: ", "");
    usuarioLogueado = usuarioLogueado.trim();
    var listaCanciones = $('li a');    
    var btnAgragarAListas = $('#btnAgragarAListas');
    var btnEliminarDeListas = $('#btnEliminarDeListas');
    var btnEliminarCancion = $('#btnEliminarCancion');
            
    //Agrega canciones a las listas
    btnAgragarAListas.on('click',function(){
        var listasReproduccion = $('input:checked');
        listasReproduccion.each(function(){
            var codigoLista = $(this).attr('name');
            var urlPhp= "../Controladores/ListasReproduccionXUsuario.php?opcion=1&usuario="+usuarioLogueado+"&codigoLista="+codigoLista+"&cancion="+cancionCurrent;
            
            $.ajax({
                type: 'POST',
                url: urlPhp,
                cache: false,
                success: function(result) {
                    
                }
            });
        });        
    });
    
    //Elimina canciones de las listas
    btnEliminarDeListas.on('click',function(){
        var listasReproduccion = $('input:checked');
        listasReproduccion.each(function(){
            var codigoLista = $(this).attr('name');
            var urlPhp= "../Controladores/ListasReproduccionXUsuario.php?opcion=2&usuario="+usuarioLogueado+"&codigoLista="+codigoLista+"&cancion="+cancionCurrent;
            
            $.ajax({
                type: 'POST',
                url: urlPhp,
                cache: false,
                success: function(result) {
                    
                }
            });
        });        
    });
    
    //Elimina cancion
    btnEliminarCancion.on('click',function(){        
        
        var urlPhp= "../Controladores/ManejaCancion.php?opcion=1&cancion="+cancionCurrent;
        $.ajax({
            type: 'POST',
            url: urlPhp,
            cache: false,
            success: function(result) {
                llenarListaReproductor("");
            }            
        });
    });
    
    //Cambia lista Reproduccion
    $('select').change(function(){
        var codListaSelecionada = $('select option:selected').val();
        var nombreListaSelecionada = $('select option:selected').text();
        var listaActual = $('#tituloLista').text();
                
        if(codListaSelecionada != "ninguna"){
            
            if(nombreListaSelecionada != listaActual){
                
                if(codListaSelecionada == "miColeccion"){
                    $('#tituloLista').text(nombreListaSelecionada);
                    llenarListaReproductor("");
                }else{
                    $('#tituloLista').text(nombreListaSelecionada);
                    llenarListaReproductor(codListaSelecionada);
                }
            }
        }
    });
    
});

function llenarListasReproduccion(cancionElegida,accion){
    cancionCurrent = cancionElegida;
    var contenedorListasAgregar = $('#checkboxListasAgregar');
    var contenedorListasEliminar = $('#checkboxListasEliminar');
    var contenedorEliminarCancion = $('#contentEliminarCancion');
    var urlPhp= "../AccesoDatos/AutoCompletar.php?opcion=6&usuario="+usuarioLogueado;
    
    $.ajax({
        type: 'POST',
        url: urlPhp,
        dataType: 'json',
        cache: false,
        success: function(result) {
            var contenidoHtml = "";
            for(var i=0 ; i < result.length ; i++){
                var unaFila = result[i];
                contenidoHtml += "<label style=\"border: 2px solid #000; margin: 2px 2px 2px 2px; padding: 2px 2px 2px 2px;\" ><input type='checkbox' name='";
                contenidoHtml += unaFila[0];
                contenidoHtml += "'/>";
                contenidoHtml += unaFila[1];
                contenidoHtml += "</label>";
                
            }
            if(accion == 1){
                contenedorListasEliminar.html("");
                contenedorListasAgregar.html(contenidoHtml);
                contenidoHtml = "";
            }else if(accion == 2){
                contenedorListasAgregar.html("");
                contenedorListasEliminar.html(contenidoHtml);
                contenidoHtml = "";
            }else if(accion == 3){
                var urlPhp= "../Controladores/ManejaCancion.php?opcion=2&cancion="+cancionCurrent;
                $.ajax({
                    type: 'POST',
                    url: urlPhp,
                    cache: false,
                    dataType: 'json',
                    success: function(result) {
                        contenidoHtml = "Realmente desea Eliminar la cancion: "+result[1];
                        contenedorEliminarCancion.text(contenidoHtml);
                    }            
                }); 
            }
        }
    });
}

function llenarListaReproductor(lista){
    var liGingle = "<li rel=\"../Recursos/Canciones/Tone_Urbano.mp3\" ondblclick=\"reproducirDobleClick($(this));\"> <strong>Gingle</strong> <em>Univalle Music</em></li>";
    var urlListaPhp = "../Controladores/ControladorListaReproductor.php";
    if(lista != ""){
        urlListaPhp += "?codLista="+lista;
    }
    var contenedorCanciones = $("#olCanciones");
    $.ajax({
        type: 'POST',
        url: urlListaPhp,
        cache: false,
        dataType: 'json',
        success: function(result) {
            contenedorCanciones.html("");
            contenedorCanciones.append(liGingle);
            for(var i=0 ; i < result.length ; i++){
                var contenidoHtml = "";
                contenidoHtml = result[i];
                contenedorCanciones.append(contenidoHtml);
            }
        }            
    }); 
}

function meGusta(cancionCurrent,evento){
    //evento.text("No me gusta");
    var urlPhp= "../Controladores/ListasReproduccionXUsuario.php?opcion=3&usuario="+usuarioLogueado;
    var codidoListaFavorita = "";
    $.ajax({
        type: 'POST',
        url: urlPhp,
        cache: false,
        success: function(result) {
            codidoListaFavorita = result;
            var urlPhp1= "../Controladores/ListasReproduccionXUsuario.php?opcion=1&usuario="+usuarioLogueado+"&codigoLista="+codidoListaFavorita+"&cancion="+cancionCurrent;
            $.ajax({
                type: 'POST',
                url: urlPhp1,
                cache: false,
                success: function(result) {
                    alert('La cancion se agrego a la lista de reproduccion "Favoritas"');
                }
            });
        }
    });            
}