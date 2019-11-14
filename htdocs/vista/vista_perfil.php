<?php
include_once ("../header.php");
include_once("../controlador/controlador_perfil.php");

//$email = $_SESSION["email"];
?>

<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Perfil</h4>
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
            <form method="post" action="../controlador/controlador_perfil.php">
                <h5 style="border-bottom: 1px solid">Mis datos</h5>
                <br>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Nombres</label>
                            <p class="form-control"><?php echo $nombre;  ?></p>
                            <input style="display: none" name="id_usuario" value="<?php echo $id_usuario?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Apellido</label>
                            <p class="form-control"><?php echo $apellido;  ?></p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Nro. documento</label>
                            <p class="form-control"><?php echo $num_doc;  ?></p>
                        </div>
                    </div>
                </div>
                <br>
                <h5 style="border-bottom: 1px solid">Mi turno médico</h5>
                <br>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <?php
                            if($tiene_turno_medico == true){
                                echo "<p class='turnoAsignado'><b>Ya tiene turno asignado.</b></p> <div class=\"row\">
                                        <div class=\"col-4\">
                                            <div class=\"form-group\">
                                                <label>Se atiende en</label>
                                                <p class=\"form-control\">" . $centro_medico ."</p>
                                            </div>
                                        </div>
                                        <div class=\"col-4\">
                                            <div class=\"form-group\">
                                                <label>El día</label>
                                                <p class=\"form-control\">" . $fecha_turno ."</p>
                                            </div>
                                        </div>
                                        <div class='col-4'>
                                            <div class='form-group'>
                                                <label style='color:white'>asd</label>
                                                <button type='submit' name='submit' class='form-control btn btn-danger btn-rounded btn-fw'>Cancelar turno</button>  
                                            </div>  
                                        </div>
                                    </div>";
                            } else{
                                echo "<p style='color:red'>Usted no tiene ningún <b>turno médico</b> asignado.</p>
                                        <a class='form-control btn btn-success btn-rounded btn-fw col-4' href=\"vista_sacarTurno.php\">Sacar Turno</a>";
                            }

                            ?>
                        </div>
                    </div>
                </div>


                <h5 style="border-bottom: 1px solid">Mis reservas</h5>
                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Cód. Reserva</th>
                        <th>Vuelo</th>
                        <th>Fecha</th>
                        <th>Cabina</th>
                        <th>Asiento</th>
                        <th>Importe</th>
                        <th>Estado de Reserva</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($reservas as $reserva){
                            echo "<tr>
                                 <td>".$reserva['cod_reserva']."</td>                             
                                 <td>".$reserva['vuelo']."</td>
                                 <td>".$reserva['fechaVuelo']."</td>
                                 <td>".$reserva['cabina']."</td>
                                 <td>".$reserva['asiento']."</td>
                                 <td>".$reserva['importe']."</td>    
                                 <td><a style='color: #2a3b57; font-weight: bold;'>".$reserva['estado_reserva']."</a></td>                         
                             </tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>






<?php
include("../footer.php");
?>
