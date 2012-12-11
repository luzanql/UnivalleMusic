/* 
 * JHONATHAN
 */

var usuarioLogueado = "";
var cancionCurrent = "";

$(function(){
    
    $("#buscar").autocomplete({
        source:  "../AccesoDatos/AutoCompletar.php?opcion=8", 
        minLength: 2,
        select: function() {
            buscarCanciones();
        }        
    });
    
    var listaActual = $('#tituloLista').text();
    var codLista = $('#tituloLista').attr('name');
    llenarListaReproductor(codLista,"");

    usuarioLogueado = $('#usuarioLogueado').text();
    usuarioLogueado = usuarioLogueado.trim();
    usuarioLogueado = usuarioLogueado.replace("Usuario: ", "");
    usuarioLogueado = usuarioLogueado.trim();
     
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
                llenarListaReproductor("","");
            }            
        });
    });
    
    //Cambia lista Reproduccion
    $('#listasReprocuccion').change(function(){
        var codListaSelecionada = $('#listasReprocuccion option:selected').val();
        var nombreListaSelecionada = $('#listasReprocuccion option:selected').text();
        var listaActual = $('#tituloLista').text();
                
        if(codListaSelecionada != "ninguna"){
            
            if(nombreListaSelecionada != listaActual){
                
                if(codListaSelecionada == "miColeccion"){
                    $('#tituloLista').text(nombreListaSelecionada);
                    $('#tituloLista').attr('name',"");
                    llenarListaReproductor("","");
                }else{
                    $('#tituloLista').text(nombreListaSelecionada);
                    $('#tituloLista').attr('name',codListaSelecionada);
                    llenarListaReproductor(codListaSelecionada,"");
                }
            }
        }
    });
    
    //Cambia orden lista Reproduccion
    $('#ordenarListasReprocuccion').change(function(){
        var ordenSeleccionado = $('#ordenarListasReprocuccion option:selected').text();
        var codListaActual = $('#tituloLista').attr('name');
        
        if(ordenSeleccionado != "Ordenar por:"){            
            if(ordenSeleccionado == "Titulo Cancion"){
                llenarListaReproductor(codListaActual, "1");
            }else if(ordenSeleccionado == "Artista"){
                llenarListaReproductor(codListaActual, "2");
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

function llenarListaReproductor(lista,orden){
    iTotalCanciones = 1;
    //var liGingle = "<li rel=\"../Recursos/Canciones/Tone_Urbano.mp3\" ondblclick=\"reproducirDobleClick($(this));\"> <strong>Gingle</strong> <em>Univalle Music</em></li>";
    var urlListaPhp = "../Controladores/ControladorListaReproductor.php";
    if(lista != "" && orden != ""){
        urlListaPhp += "?codLista="+lista;
        urlListaPhp += "&orden="+orden;
    }else if(orden != "" && lista == ""){
        urlListaPhp += "?orden="+orden;
    }else if(orden == "" && lista != ""){
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
            //contenedorCanciones.append(liGingle);
            for(var i=0 ; i < result.length ; i++){
                var contenidoHtml = "";
                contenidoHtml = result[i];
                contenedorCanciones.append(contenidoHtml);
                iTotalCanciones++;
            }
        }            
    }); 
}

function meGusta(cancionCurrent,evento){
    var accion = evento.text();
    var urlPhp= "../Controladores/ListasReproduccionXUsuario.php?opcion=3&usuario="+usuarioLogueado;
    var codigoListaFavorita = "";
    $.ajax({
        type: 'POST',
        url: urlPhp,
        cache: false,
        success: function(result) {
            codigoListaFavorita = result;
            if(accion == "Me gusta"){
                var urlPhp1= "../Controladores/ListasReproduccionXUsuario.php?opcion=1&usuario="+usuarioLogueado+"&codigoLista="+codigoListaFavorita+"&cancion="+cancionCurrent;
                $.ajax({
                    type: 'POST',
                    url: urlPhp1,
                    cache: false,
                    success: function(result) {
                        alert('La cancion se agrego a la lista de reproduccion "Favoritas"');
                        evento.text("Ya no me gusta");
                        var codLista = $('#tituloLista').attr('name');
                        llenarListaReproductor(codLista,"");
                    }
                });
            }else if(accion == "Ya no me gusta"){
                var urlPhp1= "../Controladores/ListasReproduccionXUsuario.php?opcion=2&usuario="+usuarioLogueado+"&codigoLista="+codigoListaFavorita+"&cancion="+cancionCurrent;
                $.ajax({
                    type: 'POST',
                    url: urlPhp1,
                    cache: false,
                    success: function(result) {
                        alert('La cancion se elimino de la lista de reproduccion "Favoritas"');
                        evento.text("Me gusta");
                        var codLista = $('#tituloLista').attr('name');
                        llenarListaReproductor(codLista,"");
                    }
                });
            }
        }
    });            
}

function buscarCanciones(){
    var valBuscar = $('#buscar').val();
    var listaCanciones = $('li strong');
    listaCanciones.each(function(){
        $(this).parent().show();
        if($(this).text() != valBuscar){
            $(this).parent().hide();
        }
    });
}