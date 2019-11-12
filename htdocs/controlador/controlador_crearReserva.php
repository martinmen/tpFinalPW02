<?php

include ("../modelo/modelo_CrearReserva.php");

$tipo_doc = getTipoDocumentos();
$vueloId = $_GET["vuelo"];
//$tipo_cabina = getTipoDeCabinas($vueloId);
$importe= 5000;

if(isset($_POST["submit"])){
    $nombres = $_POST['nombres'];
    $apellido = $_POST['apellido'];
    $tipo_doc = $_POST['tipo_doc'];
    $nro_doc = $_POST['nro_doc'];
    $email = $_POST['email'];

    if($_POST['nombres1'] && $_POST['apellido1'] && $_POST['tipo_doc1'] && $_POST['nro_doc1'] && $_POST['email1']){
        $nombres1 = $_POST['nombres1'];
        $apellido1 = $_POST['apellido1'];
        $tipo_doc1 = $_POST['tipo_doc1'];
        $nro_doc1 = $_POST['nro_doc1'];
        $email = $_POST['email1'];

//        $reserva = addReserva();

    }
}