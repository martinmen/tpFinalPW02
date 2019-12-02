<?php

include("../modelo/modelo_admin.php");

$meses = cantidadVendida();

if(isset( $_GET["reporte"])){
    $cabina = $_GET["reporte"];

    switch($cabina){
        case 'tasa':
            $tasas = tasas();
            include("../vista/vista_imprimirTasa.php");
            break;

        case 'mensual':
            $facturacionesMes = facturacionMensual();
            include("../vista/vista_imprimirMensual.php");
            break;

        case 'cabina':
            $cabinas = cantidadCabina();
            include("../vista/vista_imprimirCabina.php");
            break;

        case 'cliente':
            $facturacionesCliente = facturacionCliente();
            include("../vista/vista_imprimirCliente.php");
            break;

    }
}


$facturacionesMes = facturacionMensual();
$facturacionesCliente = facturacionCliente();
$cabinas = cantidadCabina();
$tasas = tasas();

