/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    
    var divAgregarAListas = $('#agregarAListas');
    var usuarioLogueado = $('#usuarioLogueado').text();
    var listaCanciones = $('li a');
    var cancionCambiarLista = "";
    
    listaCanciones.on('click',function(){
        cancionCambiarLista = $(this).attr('name');        
    });
    
        
    
});