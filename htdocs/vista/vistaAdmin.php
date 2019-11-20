
<?php
include("../header.php");
include("../controlador/controlador_admin.php");
?>
<body>
    <h1>Bienvenido Administrador</h1>

    
    <form class="form-control row" action="../controlador/controlador_imprimir.php" name="imprimirPdf">
        
             <div class="col-md-4">
                <select class="browser-default custom-select" name="reporte">
                    <option value="">Seleccione reporte...</option>
                    <option value="tasa">Tasa de ocupación por viaje y destino</option>
                    <option value="mensual">Facturación mensual</option>
                    <option value="cabina">Cabina mas vendida</option>
                    <option value="cliente">Facturación por Cliente</option>
                </select> 
            </div> </div>
           <div class="col">
                <input type="submit" class="btn btn-primary" id="crearPdf" value="Ver gráfico"/>
            </div>  
        
    </form>

    </body>  

 <script>
	  $(document).ready(function(){

		$('#CrearPdf').click(function(){
											$('#hidden_html').val($('#testing').html());
											$('#make_pdf').submit();
										});
		 
	  });
	  
	  </script>
