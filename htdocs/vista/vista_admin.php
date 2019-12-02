<?php
include("../header.php");
include("../controlador/controlador_admin.php");
?>
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Reportes Administrativos </h4>
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
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <form method="get" action="../controlador/controlador_admin.php" name="imprimirPdf">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Facturación Mensual</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="testing">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Mes</th>
                                    <th>Total facturado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($facturacionesMes as $facturacionMes){
                                    echo "<tr>
                                        <td scope='row'>".$facturacionMes['mes']."</td>                             
                                        <td>".$facturacionMes['suma']."</td>
                                        </tr>";
                                }
                                ?>

                                </tbody>
                            </table>
                            <input type="hidden" name="reporte" value="mensual">
                            <button type="submit" class="btn btn-lg btn-block btn-success" id="crearPdf">Ver Detalle</button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <form action="../controlador/controlador_admin.php" name="imprimirPdf">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Facturacion por Cliente</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="testing">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Total Facturado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($facturacionesCliente as $facturacionCliente){
                                    echo "<tr>
                                    <td scope='row'>".$facturacionCliente['cliente']."</td>                             
                                    <td>".$facturacionCliente['facturacion']."</td>
                                    </tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                            <input type="hidden" name="reporte" value="cliente">
                            <button type="submit" class="btn btn-lg btn-block btn-success" id="crearPdf">Ver Detalle</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <form action="../controlador/controlador_admin.php" name="imprimirPdf">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Cabina más vendida (%)</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="testing">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tipo Cabina</th>
                                    <th scope="col">Cantidad vendida</th>
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
                                    <td scope='row'>".$cabina['id_cabina']."</td>                             
                                    <td>".$cabina['descripcion']."</td>
                                    </tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                            <input type="hidden" name="reporte" value="cabina">
                            <button type="submit" class="btn btn-lg btn-block btn-success" id="crearPdf">Ver Detalle</button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <form action="../controlador/controlador_admin.php" name="imprimirPdf">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Tasas</h4>
                        </div>
                        <div class="card-body">
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
                            <input type="hidden" name="reporte" value="tasa">
                            <button type="submit" class="btn btn-lg btn-block btn-success" id="crearPdf">Ver Detalle</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        $('#CrearPdf').click(function(){
            $('#hidden_html').val($('#testing').html());
            $('#make_pdf').submit();
        });

    });
</script>







<?php
include_once("../footer.php");
?>
