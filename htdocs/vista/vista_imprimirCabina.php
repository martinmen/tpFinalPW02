<?php 
include("../modelo/modelo_generarReporte.php");

?>
<!DOCTYPE html> 
<html> 
  <head>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script type="text/javascript" src="js/loader.js"></script> 
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['CABINAS', 'CANT. VENDIDAS'],
            <?php 
          while ($file=mysqli_fetch_assoc($cantidadVendida)){
              echo "['".$file["modelo"]."',".$file["cantidad"]."],";
          }
          ?>
        
          ]);

          var options = {
            title: 'Cabinas mas vendidas'
          };
          var chart_area =document.getElementById('piechart');
          var chart = new google.visualization.PieChart(chart_area);

          
          google.visualization.events.addListener(chart, 'ready', function(){
          chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
          chart.draw(data, options);
          }
        </script>
  </head>	
	
    
  <body>

    <div class="container" id="testing">  
                <h3 align="center">Reporte - Cabina más vendida</h3>  
                <br />
                <table class="table" id="testing">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Tipo Cabina</th>
                    <th scope="col">%</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // foreach ($meses as $mes){
                    //     echo "<tr>
                    //     <td scope="row">".$mes['mes']."</td>                             
                    //     <td>".$mes['total']."</td>
                    //     </tr>";
                    // }
                    foreach ($cabinas as $cabina){
                        echo "<tr>
                        <td scope='row'>".$cabina['modelo']."</td>                             
                        <td>".$cabina['cantidad']."</td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
      <div class="panel panel-default">
        
        <div class="panel-body" align="center">
        <div id="piechart" style="width: 100%; max-width:900px; height: 500px; "></div>
        </div>
      </div>
    </div>

      <form method="post" id="make_pdf" action="../controlador/create_pdf.php">
          <input type="hidden" name="hidden_html" id="hidden_html" />
          <button type="button" name="create_pdf" id="create_pdf" class="btn btn-primary">Crear PDF</button>
      </form>
      <form action="vistaAdmin.php">
          <br> <button type="submit" class="btn btn-danger">Regresar</button>
      </form>

  </body>
  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
  <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
  <script src="scripts/extras.1.1.0.min.js"></script>
  <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
  <script src="scripts/app/app-blog-overview.1.1.0.js"></script>
	
</html>
<script>
	  $(document).ready(function(){
    $('#create_pdf').click(function(){
      $('#hidden_html').val($('#testing').html());
      $('#make_pdf').submit();
    });
    });	  
</script>