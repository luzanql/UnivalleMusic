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
                            url: "../Controladores/ReportesGraficas.php?opcion=1",
                            dataType: 'json',
                            success: function(msg)
                            {
                                var datos = new Array();
                                datos[0] = new Array("Artista", "Numero Canciones");
                                for(var i=0 ; i<msg.length ; i++)
                                   {                    
                                    datos[i+1] = new Array(''+msg[i][1],msg[i][0]);
                                   }
                  
                                var array = new Array();
                                array[0] = new Array('Year', 'Sales', 'Expenses');
                                array[1] = new Array('2004',  1000,      400);
                                array[2] = new Array('2005',  1170,      460);
                                array[3] = new Array('2006',  660,       1120);
                                array[4] = new Array('2007',  1030,      540);
        
                                  
                          alert(datos);
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
                           alert(array_split.length);
                            for (var i=0; k<array_split.length; i++)
                            {   array[i]=new Array();
                                for (var j=0; j<2 ; j++){
//                                    alert(i+" - "+j+" - "+k+" - " +array_split[k]);
                                    var num = array_split[k];
                                    if(j>0){
                                        array[i][j] =parseInt(num);
                                    }else{
                                        array[i][j] = num;
                                    } 
                                    
                                    k++;
                                }
                            }
//                            
                            
//                            var array = new Array();
//                                array[0] = new Array('Year', 'Nro Canciones');
//                                array[1] = new Array('2004',  1000);
//                                array[2] = new Array('2005',  1170);
//                                array[3] = new Array('2006',  660);
//                                array[4] = new Array('2007',  1030);
        
//                            var array2 = new Array();
//                            var j = 0;
//                            for(var k = 0;j<array.length; k++)
//                            {
//                                for(var i = 0;i<3; i++)
//                                {
//                                    array2[k][i] = array[j];
//                                    j++;
//                                }
//                              }
                var data = google.visualization.arrayToDataTable(array);
                var options = {
                    title: 'Cantidad de canciones por Artista',
                    hAxis: {title: 'Artista', titleTextStyle: {color: 'red'}}
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
