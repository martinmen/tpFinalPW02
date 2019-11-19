<?php
include("../header.php");
if(!isset($_GET['submit'])){
    include("../controlador/controlador_cliente.php");
}
if(isset($_SESSION["email"])) {
  $email =  $_SESSION["email"];
} else{
    echo "<div class=\"card shadow mb-4\">
    <div class=\"card-header py-3\">
        <h6 style=\"font-weight: bold;\">Para poder reservar algún vuelo, debe iniciar sesión o registrarse.</h6>
    </div>
</div>";
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
                        if(isset($email)){
                            $reserva = "<a style='color: #2a3b57; font-weight: bold;' href='../vista/vista_CrearReserva.php?vuelo=".$vuelo['id']."'>Reservar</a>";
                        }
                        else{
                            $reserva = "";
                        }
                        echo "<tr>
                             <td>".$vuelo['id']."</td>                             
                             <td>".$vuelo['fecha']."</td>
                             <td>".$vuelo['duracion']."</td>
                             <td>".$vuelo['tipo_vuelo']."</td>
                             <td>".$vuelo['modelo']."</td>
                             <td>".$vuelo['descripcion']."</td>    
                             <td>".$reserva."</td>                         
                         </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>

        <?php

        $conexion = mysqli_connect("127.0.0.1","root","admin","tpfinal");
        $sql = "SELECT * FROM tipo_vuelo;";
        $resultado = mysqli_query($conexion, $sql);
        echo "<select name='tipo_vuelo' onchange='vistaSegunTipoDeVuelo(this.value)'>";
        while($fila = mysqli_fetch_assoc($resultado)){
            echo "<option value='"  . $fila["id"] . "'>" . $fila["descripcion"] . "</option>";
        }
        echo "</select><br />";
        echo "<select id='camposTipoVuelo'></select>";
        ?>

        <?php
        $tipo_vuelo = $_GET["tipo_vuelo"];
        $conexion = mysqli_connect("127.0.0.1","root","admin","tpfinal");
        $sql = "SELECT descripcion FROM tipo_vuelo WHERE id_tipo_vuelo = " . $tipo_vuelo;
        $resultado = mysqli_query($conexion, $sql);




//        while($fila = mysqli_fetch_assoc($resultado)){
//            echo "<option value='" . $fila["id"] . "'>" . $fila["ciudad_nombre"] . "</option>";
//        }
        ?>

    </div>
</div>
<script type="text/javascript">

    function getXMLHTTP(){
        var xmlhttp = false;
        try {
            xmlhttp = new XMLHttpRequest();
        }
        catch (e) {
            try{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch (e) {
                    xmlhttp = false;
                }
            }
        }
        return xmlhttp;
    }

    function vistaSegunTipoDeVuelo(  ){
        var strURL = "vista_cliente.php?tipo_vuelo="+tipo_vuelo;
        var req = getXMLHTTP();
        if(req){
            req.onreadystatechange = function (){
                if (req.readyState == 4){
                    if (req.status == 200){
                        document.getElementById('tipo_vuelo').innerHTML = req.responseText;
                    } else {
                        alert("Hay un problema cuando se usa XMLHTTP: "+ req.statusText);
                    }
                }
            }
            req.open("GET", strURL, true);
            req.send(null);
        }
    }

</script>
<?php
include_once("../footer.php");
?>




