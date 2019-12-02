<?php
include_once ("../header.php");

$conn = getConexion();
$sql = "SELECT r.cod_vuelo as vuelo, concat(e.modelo, ' ',e.matricula) as equipo, COUNT(r.cod_vuelo) as asientosUsados
                FROM reserva as r 
                    join vuelo as v on v.id_vuelo = r.cod_vuelo
                    join equipo as e on e.id_equipo = v.cod_equipo
                GROUP BY e.id_equipo;";

$result = mysqli_query($conn, $sql);
?>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['VUELO , EQUIPO', 'TASA OCUPACIÓN'],
            <?php
                while ($file=mysqli_fetch_assoc($result)){
                    echo "['".$file["vuelo"].$file["equipo"]."',".$file["asientosUsados"]."],";
                }
            ?>

        ]);

        var options = {
            // title: 'Tasa de ocupación de viaje y equipo'
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
            <h4 class="page-title">Tasa</h4>
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
                            <th scope="col">Vuelo</th>
                            <th scope="col">Equipo</th>
                            <th scope="col">Asientos Usados</th>
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
                        foreach ($tasas as $tasa){
                            echo "<tr>
                                    <td scope='row'>".$tasa['vuelo']."</td>                             
                                    <td>".$tasa['equipo']."</td>
                                    <td>".$tasa['asientosUsados']."</td>
                                    </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <div id="piechart" style="width: 900px; height: 500px;"></div>
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
                pdf.save('tasa-vueloequipo.pdf');
            }, margins
        );
    }
</script>