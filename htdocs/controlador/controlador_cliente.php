<?php

use http\Header;

include("../modelo/modelo_cliente.php");
$tipo_vuelo = getTiposDeVuelos();
$fecha_vuelo = getFechaDeVuelos();
$duracion = getDuraciones();
$estacionOrigen = getEstaciones();
$estacionDestino = getEstaciones();

if(isset($_GET["submit"])){
    $tipoVuelo = $_GET['tipo_vuelo'];
    $fdesde = $_GET['fdesde'];
    $fhasta = $_GET['fhasta'];
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    if($tipoVuelo != 0){
        if($origen == $destino){
            echo "<script>alert('El destino de la estación no puede ser igual a la de origen.');window.location.href=\"../vista/vista_cliente.php\"</script>";
        } else if(($origen == 10 || 11) && ($destino == 10 || 11)){
            echo "<script>alert('Si eligió Bs As o Ankara el destino no puede ser una estación de la Tierra');window.location.href=\"../vista/vista_cliente.php\"</script>";
        }
        $vuelos = getVuelosConFiltro($tipoVuelo, $fdesde, $fhasta, $origen, $destino);
        include("../vista/vista_cliente.php");
    }else{
        echo "<script>alert('Elija un tipo de vuelo');window.location.href=\"../vista/vista_cliente.php\"</script>";
    }

}else {
    $vuelos = getVuelos();

}
