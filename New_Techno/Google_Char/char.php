<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>Google Charts Tutorial</title>
 
        <!-- load Google AJAX API -->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            //load the Google Visualization API and the chart
            google.load('visualization', '1', {'packages':['columnchart','piechart']});
 
            //set callback
            google.setOnLoadCallback (createChart);
 
            //callback function
            function createChart() {
 
                //create data table object
                var dataTable = new google.visualization.DataTable();
 
                //define columns
                dataTable.addColumn('string','Quarters 2009');
                dataTable.addColumn('number', 'Earnings');
 
                //define rows of data
                dataTable.addRows([['Q1',308], ['Q2',257],['Q3',375],['Q4', 123]]);
 
                //instantiate our chart objects
                var chart = new google.visualization.ColumnChart (document.getElementById('chart'));
                var secondChart = new google.visualization.PieChart (document.getElementById('Chart2'));
 
                //define options for visualization
                var options = {width: 400, height: 240, is3D: true, title: 'Company Earnings'};
 
                //draw our chart
                chart.draw(dataTable, options);
                secondChart.draw(dataTable, options);
 
            }
        </script>
 
    </head>
 
    <body>
 <h1>hh</h1>
        <!--Divs for our charts -->
        <div id="chart"></div>
        <div id="Chart2"></div>
 
 
    </body>
</html>