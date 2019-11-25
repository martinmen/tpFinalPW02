<?php
include("../modelo/modelo_medico.php");



if(isset($_GET["fecha"])){
    
    $fecha = $_GET['fecha'];
    $turnos = getTurnosFecha($fecha);
} else {
    
    $turnos = getTurnos();
}

?>