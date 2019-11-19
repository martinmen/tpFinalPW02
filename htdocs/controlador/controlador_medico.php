<?php
include("../modelo/modelo_medico.php");

if(!isset($_GET["submit"])){
    $fecha = $_GET['fecha'];
    if(isset($fecha)){
        echo "fecha vacia";
        $turnos = getTurnos();
    }else {  
        $turnos = getTurnosFecha($fecha);
    }
}else{
    $turnos = getTurnos();
}

?>