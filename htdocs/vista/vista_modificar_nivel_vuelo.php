<?php
include_once ("../header.php");
include_once("../controlador/controlador_modificarNivelVuelo.php");

$turno = $_GET['turno'];

?>
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Turno N°<?php echo $turno;  ?> </h4>
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
        <form action="vista_modificar_nivel_vuelo.php" method='post'>
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
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Nivel de vuelo</label>
                            <select class="form-control" id='nivel' name='nivel'>
                                <option value="0">Seleccione...</option>
                                <?php echo $nivel;  ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-4">
                        <INPUT type="hidden" name="accion" value="realizar_modificacion">
                        <button name="submit" class="btn btn-success btn-rounded btn-fw col-12" style="margin-top: 32px;">
                            <a style="color:white!important">Cambiar Nivel de Vuelo</a>
                        </button>

                    </div>
                </div>
                <br>
                <br>
                <div class="col-2 offset-4">
                    <button type="button" class="btn btn-danger btn-rounded btn-fw" style="float:right;">
                        <a style="color:white!important" href="vista_medico.php">Cancelar</a>
                    </button>
                </div>

            </form>

    </div>
</div>
        
<?php
include("../footer.php");
?>