
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Vuelos</h4>
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
            <form class="form-inline" method="get" action="../controlador/controlador_cliente.php">
                <select class="form-control" name="tipo_vuelo">
                    <option value="">Seleccione...</option>
                    <?php  echo $tipo_vuelo; ?>
                </select>

                Desde:<input class="form-control mr-sm-3" type="date" name="fdesde" placeholder="Fecha desde" id="datepickerDesde">
                Hasta:<input class="form-control mr-sm-3" type="date" name="fhasta" placeholder="Fecha hasta" id="datepickerHasta">
                Duración<select class="form-control" name="duracion" >
                    <option value="">Seleccione...</option>
                    <?php echo $duracion; ?>
                </select>

                <select class="form-control" name="origen">
                    <option value="">Seleccione...</option>
                    <?php echo $estacionOrigen;?>
                </select>
                <select class="form-control" name="destino">
                    <option value="">Seleccione...</option>
                    <?php echo $estacionDestino;?>
                </select>
                <button class="btn btn-primary" name="submit" type="submit" >Buscar</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nro Vuelo</th>
                    <th>Fecha</th>
                    <th>Duración</th>
                    <th>Tipo Vuelo</th>
                    <th>Equipo</th>

                    <th>Estado</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($vuelos as $vuelo){
                        echo "<tr>
                             <td>".$vuelo['id']."</td>                             
                             <td>".$vuelo['fecha']."</td>
                             <td>".$vuelo['duracion']."</td>
                             <td>".$vuelo['tipo_vuelo']."</td>
                             <td>".$vuelo['modelo']."</td>
                             <td>".$vuelo['descripcion']."</td>    
                             <td><a style='color: #2a3b57; font-weight: bold;' href='../vista/vista_CrearReserva.php?vuelo=".$vuelo['id']."'>Reservar</a></td>                         
                         </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>





