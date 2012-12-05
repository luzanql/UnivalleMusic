/* 
 * JHONATHAN
 */

$(function(){

    var usuarioLogueado = $('#usuarioLogueado').text();
    usuarioLogueado = usuarioLogueado.trim();
    usuarioLogueado = usuarioLogueado.replace("Usuario: ", "");
    var listaCanciones = $('li a');
    var cancionCurrent = "";
    var btnAgragarAListas = $('#btnAgragarAListas');
    var btnEliminarDeListas = $('#btnEliminarDeListas');
    var btnEliminarCancion = $('#btnEliminarCancion');
    var btnMeGusta = $('#btnMeGusta');
        
    listaCanciones.on('click',function(){
        cancionCurrent = $(this).attr('name');
        
        var accion = 0;
        if($(this).text()=="Agregar a Listas"){
            accion = 1;
        }else if($(this).text()=="Eliminar de Listas"){
            accion = 2;
        }else if($(this).text()=="Eliminar Cancion"){
            accion = 3;
        }else if($(this).text()=="Me Gusta"){
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
            return;
        }        
                        
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
    });
    
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
                //reidirije navegador
                setTimeout(function() {
                    document.location.href="../Vista/MiColeccion.php";
                },1000);
            }            
        });
    });
    
    //Cambia lista Reproduccion
    $('select').change(function(){
        var codListaSelecionada = $('select option:selected').val();
        var nombreListaSelecionada = $('select option:selected').text();
        var urlLista = "../Vista/MiColeccion.php";
        var listaActual = $('#tituloLista').text();
        
        if(codListaSelecionada != "ninguna"){
            if(nombreListaSelecionada != listaActual){
                if(codListaSelecionada == "miColeccion"){
                    setTimeout(function() {
                        document.location.href = urlLista;
                    },1000);
                }else{
                    urlLista += "?codLista="+codListaSelecionada;
                    urlLista += "&nombreLista="+nombreListaSelecionada;
                    setTimeout(function() {
                        document.location.href = urlLista;
                    },1000);
                }
            }
        }
    });
    
});