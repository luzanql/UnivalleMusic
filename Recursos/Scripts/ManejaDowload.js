
$(document).ready(function() {

    $("#btnDowload").click( function(){
        alert("dio clic");
    url="../Controladores/Dowload.php";
                                $.ajax({
                                    type: "POST",
                                    url: url,
                                    success: function( msg ) {   
                                        alert(msg);
                                    }
                                });
                           
    
    });
});