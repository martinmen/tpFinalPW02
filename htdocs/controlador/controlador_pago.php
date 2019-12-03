<?php

include ("../modelo/modelo_pago.php");


if(isset($_GET['reserva'])) {

    $codReserva = $_GET["reserva"];
    $ImporteTotal = getImporteTotalDeReserva($codReserva);
    $ImporteTotal = number_format($ImporteTotal[1],2);
    if ($codReserva != null) {
        $_SESSION["codReserva"] = $codReserva;
    }
}

if(isset($_POST["submit"])){
    session_start();
    $vueloId = $_SESSION["idVuelo"];
    $codReserva = $_SESSION["codReserva"];
    $usuarioId = $_SESSION["id"];
    $titularTarjeta = $_POST['titularTarjeta'];
    $numeroTarjeta = $_POST['numeroTarjeta'];
    $expiracionMesTarjeta = $_POST['expiracionMesTarjeta'];
    $expiracionAnioTarjeta = $_POST['expiracionAnioTarjeta'];
    $codigoTarjeta = $_POST['codigoTarjeta'];

     $respuestaOk =validarDatosTarjetaPago($titularTarjeta,$numeroTarjeta,$expiracionMesTarjeta,$expiracionAnioTarjeta,$codigoTarjeta);

    if($respuestaOk== true){

        actualizarEstadoReservasAPagada($codReserva,$usuarioId);
    }else{
        echo "error de pago Redirigir";
    }
}

if(isset($_POST["cancelar"])){

    $codreserva = $_POST["codreserva"];

    $cancelarReserva = cancelarReserva($codreserva);

}














