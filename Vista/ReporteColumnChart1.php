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
            google.setOnLoadCallback(drawChart);
            //      $array =array();
        
          var array;
////          var datos;
//            $.ajax({
//                type: "POST",
//                url: "../Controladores/ReportesGraficas.php?opcion=1",
//                dataType: 'json',
//                success: function(msg)
//                {
//                    var datos = new Array();
//                    datos[0] = new Array("Artista", "Numero Canciones");
//                    for(var i=0 ; i<msg.length ; i++)
//                       {                    
//                        datos[i+1] = new Array(''+msg[i][1],msg[i][0]);
//                        }
//        
//                    array = new Array([
//                    ['Year', 'Sales', 'Expenses'],
//                    ['2004',  1000,      400],
//                    ['2005',  1170,      460],
//                    ['2006',  660,       1120],
//                    ['2007',  1030,      540]
//                    ]);
//        //        alert(datos2);
//                   drawChart();
//        
//    }}); 

                function drawChart() {
//                array =  new Array(array);
//                array2 = new Array();
//                j = 0;
//                for(k = 0;j<array.length; k++)
//                {
//                    for(i = 0;i<2; i++)
//                    {
//                        array2[k][i] = array[j];
//                        j++;
//                    }
//                }
//                array2 = array;
//                alert(datos2);
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
        
                    array = new Array([
                    ['Year', 'Sales', 'Expenses'],
                    ['2004',  1000,      400],
                    ['2005',  1170,      460],
                    ['2006',  660,       1120],
                    ['2007',  1030,      540]
                    ]);
        //        alert(datos2);
//                   drawChart();
        
    }}); 

                var data = google.visualization.arrayToDataTable(array);
                var options = {
                    title: 'Company Performance',
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
