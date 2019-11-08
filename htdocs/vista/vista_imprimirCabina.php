
 <script type="text/javascript" src="js/loader.js"></script>
	
 <!-- Categorias -->
<script type="text/javascript">


google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawChart);

function drawChart()
{
var data = google.visualization.arrayToDataTable([
['Nombre', 'Number'],
<?php
foreach($categoria as $row)
{
echo "['".$row["nombre"]."', ".$row["visitas"]."],";
}
?>
]);

var options = {

pieHole : 0.4,
chartArea:{left:100,top:70,width:'100%',height:'80%'}
};
var chart_area = document.getElementById('piechart');
var chart = new google.visualization.PieChart(chart_area);

google.visualization.events.addListener(chart, 'ready', function(){
chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
});
chart.draw(data, options);
}

</script>  
<!-- Productos -->
<script type="text/javascript">


google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawChart);

function drawChart()
{
var data = google.visualization.arrayToDataTable([
['Nombre', 'Number'],
<?php
foreach($producto as $row)
{
echo "['".$row["nombre"]."', ".$row["visitas"]."],";
}
?>
]);

var options = {

pieHole : 0.4,
chartArea:{left:100,top:70,width:'100%',height:'80%'}
};
var chart_area = document.getElementById('piechar');
var chart = new google.visualization.PieChart(chart_area);

google.visualization.events.addListener(chart, 'ready', function(){
chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
});
chart.draw(data, options);
}

</script>  

     <!-- Ganancias -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['table']});
google.charts.setOnLoadCallback(drawTable);

function drawTable() {
var data = new google.visualization.DataTable();
data.addColumn('string', 'Name');
data.addColumn('number', 'Salary');
data.addColumn('boolean', 'Full Time Employee');
data.addRows([
['Mike',  {v: 10000, f: '$10,000'}, true],
['Jim',   {v:8000,   f: '$8,000'},  false],
['Alice', {v: 12500, f: '$12,500'}, true],
['Bob',   {v: 7000,  f: '$7,000'},  true]

<?php
foreach($liquidaciones as $row)
{
echo "['".$row["nombre"]."', ".$row["debe"]."],";
}
?>
]);

var table = new google.visualization.Table(document.getElementById('table_div'));

table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
}
</script>


</head>
<body>
<div class="container" id="testing">  
<h3 class=" text-center ">Reportes</h3> 
<!-- Small Stats Blocks -->


<div id="table_div"></div>


<br />
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="text-center panel-title">Tasa de Ocupación por viaje y equipo</h3>
</div>
<div class="panel-body" align="center">
<div id="piechart" style="width: 100%; max-width:900px; height: 500px; "></div>
</div>
</div>

<br />
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="text-center panel-title">Facturación mensual</h3>
</div>
<div class="panel-body" align="center">
<div id="piechar" style="width: 100%; max-width:900px; height: 500px; "></div>
</div>
</div>
</div>

<div align="center">
<form method="post" id="make_pdf" target="_blank" action="CrearPdf.php">
<input type="hidden" name="hidden_html" id="hidden_html" />
<button type="button" name="create_pdf" id="create_pdf" class="btn btn-primary">Descargar</button>
</form>
<form action="Administrador.php">
<br> <button type="submit" class="btn btn-danger btn-xs">Regresar</button>
</form>
</div>









<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
<script src="scripts/extras.1.1.0.min.js"></script>
<script src="scripts/shards-dashboards.1.1.0.min.js"></script>
<script src="scripts/app/app-blog-overview.1.1.0.js"></script>


</body>
</html>

<script>
$(document).ready(function(){

$('#create_pdf').click(function(){
$('#hidden_html').val($('#testing').html());
$('#make_pdf').submit();
});

});

</script>

