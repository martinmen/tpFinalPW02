<?php
include_once ("../header.php");

$conn = getConexion(); //SET lc_time_names = 'es_ES';
$sql = "SELECT concat(u.apellido, ', ', u.nombre) as cliente, SUM(r.importe) as facturacion 
                FROM usuario as u
                    join reserva as r on r.cod_usuario = u.id_usuario
                WHERE u.cod_tipo_usuario = 2
                GROUP BY u.id_usuario;";

$result = mysqli_query($conn, $sql);
?>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['CLIENTE', 'FACTURACIÓN'],
               <?php
               while ($file=mysqli_fetch_assoc($result)){
                   echo "['".$file["cliente"]."',".$file["facturacion"]."],";
               }
               ?>

        ]);

        var options = {
            // title: 'Facturación por cliente'
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
            <h4 class="page-title">Facturación por Cliente</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="separador"></div>
    </div>
</div>
<br>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="card-header py-3" id="aImprimir">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped" id="testing">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Cliente</th>
                            <th scope="col">Total Facturado</th>
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
                        foreach ($facturacionesCliente as $facturacion){
                            echo "<tr>
                                    <td scope='row'>".$facturacion['cliente']."</td>                             
                                    <td>".$facturacion['facturacion']."</td>
                                    </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <div id="piechart" style="width: 100%; max-width:900px; height: 500px; "></div>

                </div>
            </div>
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
                pdf.save('facturacion-cliente.pdf');
            }, margins
        );
    }
</script>