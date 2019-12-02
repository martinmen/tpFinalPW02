<?php
include_once ("../header.php");
include_once("../controlador/controlador_perfil.php");

//$email = $_SESSION["email"];
//$rol = $_SESSION["rol"];
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
                <?php
                if($_SESSION['rol'] != 3){
                    echo "<div class=\"row\">
                    <div class=\"col-4\">
                        <div class=\"form-group\">
                            <label>Nivel de Vuelo</label>
                            <p class=\"form-control\">"; echo $nivel_vuelo . "</p>
                        </div>
                    </div>
                </div>";
                }
                ?>
                <div class="row">
                    <div class="col-4 offset-9">
                        <div class="form-group">
                            <a id="cambiarContrasenia" onclick='cambiarContrasenia()' class="btn btn-rounded btn-fw col-8" style="margin-top: 32px;background-color: #444e5e; border-color: #444e5e; color:white!important; cursor:pointer;">Cambiar contraseña
                            </a>
                        </div>
                    </div>
                </div>
                <div id="contraseniaHidden" style="display:none">
                    <div class="row">
                        <div class="col-4">
                            <label type="text" for="passAnterior">Contraseña Anterior</label>
                            <input class="form-control" name="passAnterior">
                        </div>
                        <div class="col-4">
                            <label type="text" for="passNueva">Contraseña Nueva</label>
                            <input class="form-control" name="passNueva">
                        </div>
                        <div class="col-4">
                            <label type="text" for="passConfirmar">Confirmar Contraseña</label>
                            <input class="form-control" name="passConfirmar">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2 offset-4">
                            <INPUT type="submit" name="cambiarContrasenia" style="display: none">
                            <button name="cambiarContrasenia" class="btn btn-success btn-rounded btn-fw" >Confirmar</button>
                        </div>
                        <div class="col-2">
                            <a onclick='cancelarCambioContrasenia()' class="btn btn-danger btn-rounded btn-fw" style="color:white!important; cursor:pointer;">Cancelar</a>
                        </div>
                    </div>
                </div>
                <br>
                <?php
                    if($_SESSION['rol'] != 3){
                        echo "<h5 style=\"border-bottom: 1px solid\">Mi turno médico</h5>
                                <br>
                                <div class=\"row\">
                                    <div class=\"col-6\">
                                        <div class=\"form-group\">";
                                        if($tiene_turno_medico == true){
                                            if($turnoAtendido == true){
                                                echo "<p class='turnoConfirmado'><b>Su turno fue confirmado, ya tiene un Nivel de Vuelo.</b></p>";
                                            }else
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
                                            echo "<p style='color:red'>Usted no tiene ningún <b>turno médico</b> asignado. </p>
                                                  <p style='color:red'>Saque uno para tener un Nivel de Vuelo.</p>
                                        <a class='form-control btn btn-success btn-rounded btn-fw col-4' href=\"vista_sacarTurno.php\">Sacar Turno</a>";
                                        };
                                    echo "</div>
                                </div>
                        </div>
                        <h5 style='border-bottom: 1px solid'>Mis reservas</h5>
                        <br>
                        <table class=\"table table-striped\">
                            <thead>
                                <tr>
                                    <th>Cód. Reserva</th>
                                    <th>Vuelo</th>
                                    <th>Fecha/Hora</th>
                                    <th>Cabina</th>
                                    <th>Importe</th>
                                    <th>Estado de Reserva</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>";
                            foreach ($reservas as $reserva){
                                echo '<tr>      
                                        <td>'.$reserva['cod_reserva'].'</td>                             
                                     <td style="display: none">'.$reserva['vuelo']."</td>
                                     <td>".$reserva['matricula']."</td>
                                     <td>".$reserva['fechaVuelo']."</td>
                                     <td>".$reserva['cabina']."</td>
                                     <td>".$reserva['importe']."</td>    
                                     <td>".$reserva['estado_reserva']."</td> ";
                                     if($reserva['estado_reserva'] == 'Paga'){
                                         echo "<td><a style='color: #2a3b57; font-weight: bold;' href='vista_comprobante.php?id_reserva=".$reserva['id_reserva']."'>Realizar Check-in Online</a></td>";
                                     };
                                     echo "
                                 </tr>";
                                }
                            echo "</tbody>
                                </table>";


                    }
                ?>

            </form>
        </div>
    </div>
</div>
<script>
    function cambiarContrasenia(){

        document.getElementById('contraseniaHidden').style.display = 'block';
        document.getElementById('cambiarContrasenia').style.display = 'none';

    }

    function cancelarCambioContrasenia(){
        document.getElementById('contraseniaHidden').style.display = 'none';
        document.getElementById('cambiarContrasenia').style.display = 'block';
    }


</script>





<?php
include("../footer.php");
?>
