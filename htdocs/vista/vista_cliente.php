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
<script type="text/javascript">

    function getXMLHTTP() {
        var xmlhttp=false;
        try{
            xmlhttp=new XMLHttpRequest();
        }
        catch(e)	{
            try{
                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e){
                try{
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e){
                    xmlhttp=false;
                }
            }
        }
        return xmlhttp;
    }


    function tipoDeVuelo(tipo_vuelo) {
        var strURL="../ajax/estaciones.php?tipo_vuelo="+tipo_vuelo;
        var req = getXMLHTTP();
        if (req) {
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {
                        document.getElementById('origen').innerHTML =req.responseText ;
                        document.getElementById('destino').innerHTML =req.responseText ;
                    } else {
                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                    }
                }
            }
            req.open("GET", strURL, true);
            req.send(null);
        }



        var x = document.getElementById('tipo_vuelo').value;

        if(x == 0){ //seleccione...
            document.getElementById('fecha').style.display = 'none';
            document.getElementById('estacion').style.display = 'none';
        }
        else if(x == 1){ //Suborbitales
            document.getElementById('fecha').style.display = 'block';
            document.getElementById('estacion').style.display = 'block';
        } else if (x == 2){ //Orbital/Cirucito 1
            document.getElementById('fecha').style.display = 'block';
            document.getElementById('estacion').style.display = 'block';

        } else if(x == 3){
            //Orbital/Cirucito 2
            document.getElementById('fecha').style.display = 'block';
            document.getElementById('estacion').style.display = 'block';
        }
        else { // Tour
            document.getElementById('estacion').style.display = 'none';
        }
    }

</script>

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
                            <select class="form-control" name="tipo_vuelo" id='tipo_vuelo' onchange='tipoDeVuelo(this.value)' >
                                <option value="0">Seleccione...</option>
                                <?php  echo $tipo_vuelo; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6" id="fecha">
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
                    <div class="col-6" id="estacion">
                        <div class="form-group">
                            <label>Estación</label>
                            <div class="input-group">
                                <label class="col-2 labelInputGroup">Origen</label>
                                <select class="form-control" name="origen" id="origen">
                                    <option value="">Seleccione...</option>
                                    <?php echo $estacionOrigen;?>
                                </select>
                                <label class="col-2 labelInputGroup">Destino</label>
                                <select class="form-control" name="destino" id="destino">
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
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Equipo</th>
                    <th>Tipo Aceleracion</th>
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
                             <td>".$vuelo['matricula']."</td>                             
                             <td>".$vuelo['fecha']."</td>
                             <td>".$vuelo['duracion']."</td>
                             <td>".$vuelo['tipo_vuelo']."</td>
                             <td>".$vuelo['origen']."</td>
                             <td>".$vuelo['destino']."</td>
                             <td>".$vuelo['modelo']."</td>
                             <td>".$vuelo['tipo_aceleracion']."</td>    
                             <td>".$reserva."</td>                         
                         </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>




    </div>
</div>
<script type="text/javascript">
    window.onload=function() {
        document.getElementById('fecha').style.display = 'none';
        document.getElementById('estacion').style.display = 'none';
    }


</script>




<?php
include_once("../footer.php");
?>




