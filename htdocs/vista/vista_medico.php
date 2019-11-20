<?php

include("../header.php");
include("../controlador/controlador_medico.php");
if($_SESSION["email"]) {
  $email =  $_SESSION["email"];
}

?>
<h1> Centro Médico </h1>
<form class="form-inline" method="get" action='vista_medico.php?fecha=".$turno["fecha"]."'>
    Fecha:<input class="form-control mr-sm-3" type="date" name="fecha" placeholder="Fecha desde" id="datepickerDesde">
    <input  type="submit" value="Filtrar">
    
</form>
<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Centro</th>
                    <th>Turno</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Código</th>
                    <th>Nivel vuelo</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($turnos as $turno){
                        echo "<tr>
                          <td>".$turno['centro']."</td>
                          <td>".$turno['nro']."</td>                               
                          <td>".$turno['fecha']."</td>
                          <td>".$turno['usuario']."</td>
                          <td>".$turno['cod_usuario']."</td>
                          <td>".$turno['nivel']."</td>    
                          <td><a style='color: #2a3b57; font-weight: bold;' href='../vista/vista_modificar_nivel_vuelo.php?cod_usuario=".$turno["cod_usuario"]."'>Modificar</a></td>                         
                          </tr>";
                     }
                ?>
                </tbody>
            </table>
        <div class="col-md-2 offset-4">
            <button type="button" class="btn btn-danger btn-rounded btn-fw" style="float:right;"><a style="color:white!important" href="">Salir</a></button>
        </div>
        
        </div>
<?php
include("../footer.php");
?>