<?php
include_once ("../header.php");//
$conn = getConexion(); //SET lc_time_names = 'es_ES';
$sql = "SELECT monthname(fecha_alta_reserva) as mes, SUM( importe) as suma
                FROM reserva
                GROUP BY mes;";

$result = mysqli_query($conn, $sql);
//?>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['MES', 'FACTURACIÓN'],
            <?php
            while ($file=mysqli_fetch_assoc($result)){
                echo "['".$file["mes"]."',".$file["suma"]."],";
            }
            ?>

        ]);

        var options = {
            // title: 'Facturación Mensual'
        };

        var chart_area =document.getElementById('piechart');
        var chart = new google.visualization.PieChart(chart_area);

        google.visualization.events.addListener(chart, 'ready', function(){
            chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" style="margin-left: 100px">';
        });

        chart.draw(data, options);
    }
</script>
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Facturación Mensual</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="separador"></div>
    </div>
</div>
<br>
<div class="card shadow mb-4" >
    <div class="card-body" >
        <form action="../reportesPDF/create_pdf.php" method="POST" >
            <div class="card-header py-3" id="aImprimir">
                <table class="table table-striped"  id="testing">
                    <thead>
                    <tr>
                        <th>Mes</th>
                        <th>Total Facturado</th>
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
                    foreach ($facturacionesMes as $facturacion){
                        echo "<tr>
                                <td scope='row'>".$facturacion['mes']."</td>                             
                                <td>".$facturacion['suma']."</td>
                            </tr>";
                    }
                    ?>

                    </tbody>
                </table>
                <div id="piechart"  style="width: 900px; max-width:900px; height: 500px;"></div><!---->
            </div>
            <br>
            <div class="row">
                <div class="col-2 offset-4">
                    <button class="btn btn-primary"><a href="javascript:crearPdf()" style="color:white!important">Generar PDF</a></button>
                </div>
                <div class="col-2">
                    <a class="btn btn-danger" href="../vista/vista_admin.php" role="button">Regresar</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function crearPdf() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        source = $('#aImprimir')[0];

        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 0,
            left:10,
            width: 10
        };

        pdf.fromHTML(
            source,
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width,
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                pdf.save('facturacion-mensual.pdf');
            }, margins
        );
    }
</script>
