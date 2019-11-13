<?php
include("../header.php");
include("../controlador/controlador_cliente.php");
if($_SESSION["email"]) {
  $email =  $_SESSION["email"];
}

?>
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Vuelos </h4>
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
            <form method="get" action="../controlador/controlador_cliente.php">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tipo de vuelo</label>
                            <select class="form-control" name="tipo_vuelo">
                                <option value="">Seleccione...</option>
                                <?php  echo $tipo_vuelo; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Fecha</label>
                            <div class="input-group">
                                <label class="col-2 labelInputGroup">Desde</label>
                                <input class="form-control col-4" type="date" name="fdesde" placeholder="Desde" id="datepickerDesde">
                                <label class="col-2 labelInputGroup">Hasta</label>
                                <input class="form-control col-4" type="date" name="fhasta" placeholder="Hasta" id="datepickerHasta">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Duración</label>
                            <select class="form-control" name="duracion" >
                                <option value="">Seleccione...</option>
                                <?php echo $duracion; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Estación</label>
                            <div class="input-group">
                                <label class="col-2 labelInputGroup">Origen</label>
                                <select class="form-control" name="origen">
                                    <option value="">Seleccione...</option>
                                    <?php echo $estacionOrigen;?>
                                </select>
                                <label class="col-2 labelInputGroup">Destino</label>
                                <select class="form-control" name="destino">
                                    <option value="">Seleccione...</option>
                                    <?php echo $estacionDestino;?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary col-2 offset-5" name="submit" type="submit">Buscar</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="separador"></div>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
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
<?php
include_once("../footer.php");
?>




