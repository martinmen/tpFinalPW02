<?php

include("../header.php");
include("../controlador/controlador_medico.php");

// if($_SESSION["email"]) {
//   $email =  $_SESSION["email"];
// }

?>
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Centro Médico</h4>
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
            <form method="get" action='vista_medico.php?fecha=".$turno["fecha"]."'>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Fecha</label>
                            <input class="form-control mr-sm-3" type="date" name="fecha" placeholder="Fecha desde" id="datepickerDesde">
                        </div>
                    </div>
                    <div class="col-2">
                        <INPUT type="submit" name="accion" style="display: none">
                        <button name="submit" class="btn btn-rounded btn-fw col-12" style="margin-top: 32px; background-color: #444e5e; border-color: #444e5e">
                            <a style="color:white!important">Filtrar</a>
                        </button>
                    </div>
                </div>

            </form>
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Centro</th>
                    <th>Turno</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Nivel vuelo</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($turnos as $turno){
                    echo "<tr>
                              <td>".$turno['Centro_Medico']."</td>
                              <td>".$turno['Turno']."</td>                               
                              <td>".$turno['Fecha']."</td>
                              <td>".$turno['usuario']."</td>
                              <td>".$turno['Nivel_vuelo']."</td>   
                              <td><a style='color: #2a3b57; font-weight: bold;' href='../vista/vista_modificar_nivel_vuelo.php?cod_usuario=".$turno["cod_usuario"]."&turno=".$turno['Turno']."'>Modificar</a></td>                         
                              </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include("../footer.php");
?>