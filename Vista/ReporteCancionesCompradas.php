<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <link rel="stylesheet" href="../themes/male.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
        <script type="text/javascript">
            google.load("visualization", "1", {packages:["corechart"]});
            google.setOnLoadCallback(onLoad);
     
       function onLoad(){
           
             var content = document.getElementById('content');
             
             $.ajax({
                            type: "POST",
                            url: "../Controladores/ReportesGraficas.php?opcion=2",
                            dataType: 'json',
                            success: function(msg)
                            {
                                var datos = new Array();
                                datos[0] = new Array("Nombre Cancion - Artista", "Nro Compras");
                                for(var i=1 ; i<msg.length ; i++)
                                   {                    
                                    datos[i] = new Array(''+msg[i][0]+" - "+msg[i][1],msg[i][2]);
                                   }
                        
                        //  alert(datos);
                          drawChart(datos);

                 }})
             }
             
                    function drawChart(array2) {
//                           var array_split = array2.split(",");
                           
                           var arrayString = new String(array2);
                           var array_split = arrayString.split(",");
//                           alert(array[0]);
                           var array = new Array();
                           var k = 0;
                         //  alert(array_split.length);
                            for (var i=0; k<array_split.length; i++)
                            {   array[i]=new Array();
                                for (var j=0; j<2 ; j++){
//                                    alert(i+" - "+j+" - "+k+" - " +array_split[k]);
                                    var num = array_split[k];
                                    if(j>0 && i>0){
                                        array[i][j] =parseInt(num);
                                    }else{
                                        array[i][j] = num;
                                    } 
                                    
                                    k++;
                                }
                            }

                var data = google.visualization.arrayToDataTable(array);
                var options = {
                    title: 'Canciones Mas Compradas',
                    hAxis: {title: 'Cancion-Artista', titleTextStyle: {color: 'red'}}
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
       
       
        </script>
    </head>
    <body>
        <div id="chart_div" style="width: 900px; height: 500px;"></div>
    </body>
</html>
