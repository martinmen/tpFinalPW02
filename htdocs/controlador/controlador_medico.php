<?php
include("../modelo/modelo_medico.php");

if(!isset($_GET["submit"])){
    $fecha = $_GET['fecha'];
    if($fecha==null){
        $turnos = getTurnos();
    }else {  
        $turnos = getTurnosFecha($fecha);
    }
}else{
    $turnos = getTurnos();
}

include("../vista/vista_medico.php");
?>