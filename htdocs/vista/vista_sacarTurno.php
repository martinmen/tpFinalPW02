<?php
include_once ("../header.php");
include_once("../controlador/controlador_sacarTurno.php");

?>
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Turno Médico</h4>
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
            <form method="post" action="../controlador/controlador_sacarTurno.php">
                <p><b><?php  echo $apellido. ", " . $nombre;  ?></b></p>
                <input style="display: none" name="id_usuario" value="<?php echo $id_usuario ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Centro Médico</label>
                            <select class="form-control" name="centro_medico">
                                <option value="">Seleccione...</option>
                                <?php  echo $centro_medico; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Fecha</label>
                            <input class="form-control" type="date" name="fechaTurno"  id="datepickerfechaTurno">
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-3 offset-3">
                        <?php
                            echo "<a class='btn btn-danger btn-rounded btn-fw col-12' href='vista_perfil.php'>Cancelar</a>"
                        ?>
                    </div>
                    <div class="col-3">
                        <button type='submit' class='form-control btn btn-success btn-rounded btn-fw' name="submit">Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include("../footer.php");
?>