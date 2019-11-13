<?php
include_once ("../header.php");
//include_once("../controlador/controlador_medico.php");
?>
<h1> Centro Médico </h1>
<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Código usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Nivel vuelo</th>
                   
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $dato){
                        echo "<tr>
                          <td>".$dato['id_usuario']."</td>
                          <td>".$dato['nombre']."</td>                               
                          <td>".$dato['apellido']."</td>
                          <td>".$dato['num_doc']."</td>
                          <td><select name='nivel'>
                          <option value=''>".$dato['cod_nivel_vuelo']."
                          <option value='1'>4</option>
                          <option value='2'>1</option>
                          <option value='3'>2</option>
                          <option value='4'>3</option>
                          </select></td>                             
                          </tr>";
                     }
                ?>
                </tbody>
            </table>
            <div class="row">
        <div class="col-md-2 offset-4">
            <button type="button" class="btn btn-danger btn-rounded btn-fw" style="float:right;"><a style="color:white!important" href="">Cancelar</a></button>
        </div>
        <div class="col-md-2">
         
            <button name="submit" class="btn btn-success btn-rounded btn-fw" style="float:left"><a style="color:white!important" href="../controlador/controlador_modificarNivelVuelo.php">Modificar</a></button>
        </div>
    </div>
        </div>
<?php
include("../footer.php");
?>