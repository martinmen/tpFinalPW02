<?php

use http\Header;

include("../modelo/modelo_cliente.php");
$tipo_vuelo = getTiposDeVuelos();
$duracion = getDuraciones();
$estacionOrigen = getEstaciones();
$estacionDestino = getEstaciones();

if(isset($_GET["submit"])){
    $fdesde = $_GET['fdesde'];
    $fhasta = $_GET['fhasta'];

    $vuelos = getVuelosConFecha($fdesde, $fhasta);
    include("../vista/vista_cliente.php");

}else {
    $vuelos = getVuelos();

}

//
//
//include_once ("../header.php");
//include("../vista/vista_cliente.php");
//include_once ("../footer.php");