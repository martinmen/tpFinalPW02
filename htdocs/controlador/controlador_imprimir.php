<?php
include_once ("../header.php");
include("../modelo/modelo_imprimirReporte.php");

$cabina = $_GET["reporte"];
switch($cabina){
    case 'tasa':
    include("../vista/vista_imprimirTasa.php");
    break;

    case 'mensual':
    include("../vista/vista_imprimirMensual.php");
    break;

    case 'cabina':
        include("../vista/vista_imprimirCabina.php");
    break;

    case 'cliente':
    include("../vista/vista_imprimirCliente.php");
    break;
    
}
include_once ("../footer.php");
?>