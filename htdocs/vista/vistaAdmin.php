
<html> 
<head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/loader.js"></script>
	
     
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
  </head>

  
	
	
	
    </head>
<body>
    <h1>Bienvenido Administrador</h1>
    <form class="form-control row" action="../controlador/controlador_imprimir.php" name="imprimirPdf">
        
            <div class="col-md-4">
                <select class="form-control" name="reporte">
                    <option value="">Seleccione...</option>
                    <option value="tasa">Tasa de ocupación por viaje y destino</option>
                    <option value="mensual">Facturación mensual</option>
                    <option value="cabina">Cabina mas vendida</option>
                    <option value="cliente">Facturación por Cliente</option>
                </select> 
            </div>
            <div class="col">
                <input type="submit" class="btn btn-primary" id="crearPdf" value="Crear Reporte"/>
            </div>  
        </div>
    </form>
   
   <br>

    <table class="table">
        <thead>
        <tr>
            <th>Nro Vuelo</th>
            <th>Fecha</th>
            <th>Duración</th>
            <th>Tipo Vuelo</th>
            <th>Equipo</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
            $vuelos = getVuelos();
            while ($row=mysqli_fetch_assoc($vuelos))
            {
                echo "<tr>";
                echo "<td>".$row['id_vuelo']."</td>";
                echo "<td>".$row['fecha']."</td>";
                echo "<td>".$row['duracion']."</td>";
                echo "<td>".$row['cod_tipo_vuelo']."</td>";
                echo "<td>".$row['cod_equipo']."</td>";
                echo "<td><a href=\"delete&&id= a><td>";
                echo "</tr>";
            
            }
        ?>

        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>
            <th>id_cabina</th>
            <th>descripcion</th>
            <th>Cantidad vendida</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
            $cabinas = getCincoCabinasMasVendida();
            while ($row=mysqli_fetch_assoc($cabinas))
            {
                echo "<tr>";
                echo "<td>".$row['id_cabina']."</td>";
                echo "<td>".$row['descripcion']."</td>";
                echo "<td>".$row['cant_vendida']."</td>";
                echo "</tr>";
            
            }
        ?>

        </tbody>
    </table>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
 
</body>
 </html>
 <script>
	  $(document).ready(function(){

		$('#CrearPdf').click(function(){
											$('#hidden_html').val($('#testing').html());
											$('#make_pdf').submit();
										});
		 
	  });
	  
	  </script>