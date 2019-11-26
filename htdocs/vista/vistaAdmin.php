
<?php
include("../header.php");
include("../controlador/controlador_admin.php");
?>
<body>
    <h1>Bienvenido Administrador</h1>
<br>
<br>
<div class="container">
<!-- primero -->
  <div class="card-deck mb-3 text-center">
    <div class="card mb-6 shadow-sm">
        <form action="../controlador/controlador_imprimir.php" name="imprimirPdf">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Facturación mensual</h4>
            </div>
            <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Mes</th>
                    <th scope="col">Total facturado</th>
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
                    foreach ($meses as $mes){
                        echo "<tr>
                        <td scope='row'>".$mes['modelo']."</td>                             
                        <td>".$mes['cantidad']."</td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
                <input type="hidden" name="reporte" value="mensual">
                <button type="submit" class="btn btn-lg btn-block btn-outline-primary" id="crearPdf">Ver Detalle</button>
            </div>
        </form>
    </div>
    <div class="card mb-6 shadow-sm">
      <form action="../controlador/controlador_imprimir.php" name="imprimirPdf">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Facturacion por Cliente</h4>
      </div>
      <div class="card-body">
      <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Total facturado</th>
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
                    foreach ($meses as $mes){
                        echo "<tr>
                        <td scope='row'>".$mes['modelo']."</td>                             
                        <td>".$mes['cantidad']."</td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
            <input type="hidden" name="reporte" value="cliente">
            <button type="submit" class="btn btn-lg btn-block btn-outline-primary" id="crearPdf">Ver Detalle</button>
      </div>
      </form>
    </div>
  </div>
  <!-- sdo -->
  <div class="card-deck mb-3 text-center">
    <div class="card mb-6 shadow-sm">
      <form action="../controlador/controlador_imprimir.php" name="imprimirPdf">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Cabina más vendida (%)</h4>
        </div>
        <div class="card-body">
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
                    foreach ($meses as $mes){
                        echo "<tr>
                        <td scope='row'>".$mes['modelo']."</td>                             
                        <td>".$mes['cantidad']."</td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
            <input type="hidden" name="reporte" value="cabina">
            <button type="submit" class="btn btn-lg btn-block btn-outline-primary" id="crearPdf">Ver Detalle</button>           
        </div>
      </form>
    </div>
    <div class="card mb-6 shadow-sm">
      <form action="../controlador/controlador_imprimir.php" name="imprimirPdf">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Tasas</h4>
        </div>
        <div class="card-body">
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Mes</th>
                    <th scope="col">Total facturado</th>
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
                    foreach ($meses as $mes){
                        echo "<tr>
                        <td scope='row'>".$mes['modelo']."</td>                             
                        <td>".$mes['cantidad']."</td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
            <input type="hidden" name="reporte" value="tasa">
            <button type="submit" class="btn btn-lg btn-block btn-outline-primary" id="crearPdf">Ver Detalle</button>
           
        </div>
      </form>
    </div>
  </div>
</div>
<!-- fin cards -->
    </body>  

 <script>
	  $(document).ready(function(){

		$('#CrearPdf').click(function(){
											$('#hidden_html').val($('#testing').html());
											$('#make_pdf').submit();
										});
		 
	  });
	  </script>
