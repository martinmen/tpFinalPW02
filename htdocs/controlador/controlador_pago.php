<?php

include ("../modelo/modelo_pago.php");


if(isset($_GET['reserva'])) {

    $codReserva = $_GET["reserva"];
    $ImporteTotal = getImporteTotalDeReserva($codReserva);

}

    if(isset($_POST["submit"])){

}













