<?php
include_once ("../header.php");
include_once("../controlador/controlador_modificarNivelVuelo.php");
?>
<h1> Centro Médico </h1>
<div class="table-responsive">
    <form ACTION="vista_modificar_nivel_vuelo.php" METHOD="post">
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
                          <td><select id='nivel' name='nivel'>";
                          foreach ($niveles as $nivel){
                        echo "<option value='1'>".$nivel['descripcion']."</option>";}
                         echo "</select></td>                             
                          </tr>";
                     }
                ?>
                </tbody>
    </table>
            <?php 
            echo $mensaje;
            ?>
        <div class="col-md-2 offset-4">
            <button type="button" class="btn btn-danger btn-rounded btn-fw" style="float:right;"><a style="color:white!important" href="">Cancelar</a></button>
        </div>
        <div class="col-md-2">
            <INPUT TYPE="hidden" NAME="accion" VALUE="realizar_modificacion">
            <button name="submit" class="btn btn-success btn-rounded btn-fw" style="float:left"><a style="color:white!important">Modificar</a></button>
        </div>
    </form>
</div>
        
<?php
include("../footer.php");
?>