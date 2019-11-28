<?php


use mysql_xdevapi\Session;

include ("../modelo/modelo_CrearReserva.php");

if(isset($_GET['vuelo']) &&isset( $_GET['matricula'] )){

$tipo_doc = getTipoDocumentos();
$vueloId = $_GET["vuelo"];
$matricula = $_GET["matricula"];
$tipo_cabina = getTipoDeCabinas($vueloId);
$costo= getCosto($vueloId);

if($vueloId!= null){
    $_SESSION["idVuelo"] = $vueloId;
}
}
//////////////////////////////////////////////////////////////////////////////

if(isset($_POST["submit"])) {
    session_start();
    $vueloId = $_SESSION["idVuelo"];

    $contador = $_POST['counter'];


    if ($contador == "") {
        if ($_POST['email']) {
            $email0 = $_POST['email'];
            $cliente0 = getDatosUsuario($email0);
            if ($cliente0 [0] == false) {
                $cliente0["nombre"] = $_POST['nombre'];
                $cliente0["apellido"] = $_POST['apellido'];
                $cliente0["tipoDoc"] = $_POST['tipo_doc'];
                $cliente0["nroDoc"] = $_POST['nro_doc'];
                $cliente0["email"] = $_POST['email'];
                $cliente0["tipoCabina"] = $_POST['tipo_cabina'];
                //hacer un insert de usuario
                $importe0 = $_POST['importe'];
                $importeTotal = $importe0;
                $codigoAlfaReserva = "CCC111";
                crearReserva($cliente0, $codigoAlfaReserva, $importe0, $_POST['tipo_cabina'], $vueloId);
                rediregirAPago($codigoAlfaReserva);
            }
            elseif ($cliente0 [0] == true) {
                // insert en reserva
                $importe0 = $_POST['importe'];
                $importeTotal = $importe0;
                $codigoAlfaReserva = "CCC111";
                crearReserva($cliente0['email'], $codigoAlfaReserva, $importe0, $_POST['tipo_cabina'], $vueloId);
                rediregirAPago($codigoAlfaReserva);
            }

        }

    } else if ($contador == 2) {
        if ($_POST['email'] && $_POST['email1']) {
            $email0 = $_POST['email'];
            $email1 = $_POST['email1'];
            $cliente0 = getDatosUsuario($email0);
            $cliente1 = getDatosUsuario($email1);


            if ($cliente0 [0] == false) {
                $cliente0["nombre"] = $_POST['nombre'];
                $cliente0["apellido"] = $_POST['apellido'];
                $cliente0["tipoDoc"] = $_POST['tipo_doc'];
                $cliente0["nroDoc"] = $_POST['nro_doc'];
                $cliente0["email"] = $_POST['email'];
             //hacer un insert de usuario
                usuarioNuevoEnReserva($cliente0);
            }if ($cliente1 [0] == false) {
                $cliente1["nombre"] = $_POST['nombre1'];
                $cliente1["apellido"] = $_POST['apellido1'];
                $cliente1["tipoDoc"] = $_POST['tipo_doc1'];
                $cliente1["nroDoc"] = $_POST['nro_doc1'];
                $cliente1["email"] = $_POST['email1'];
                //hacer un insert de usuario
                usuarioNuevoEnReserva($cliente1);
                }
            $importe0 = $_POST['importe'];
            $importe1 = $_POST['importe1'];
            $importeTotal = $importe0+$importe1;

            /// se hacen los insert en reserva
            $codigoAlfaReserfa = "CCC111";
            crearReserva($cliente0['email'],$codigoAlfaReserfa,$importe0,$_POST['tipo_cabina'],$vueloId);
            crearReserva($cliente1['email'],$codigoAlfaReserfa,$importe1,$_POST['tipo_cabina1'],$vueloId);


        }
    }else if ($contador == 3){
        if ($_POST['email'] && $_POST['email1'] && $_POST['email2']) {
            $email0 = $_POST['email'];
            $email1 = $_POST['email1'];
            $email2 = $_POST['email2'];
            $cliente0 = getDatosUsuario($email0);
            $cliente1 = getDatosUsuario($email1);
            $cliente2 = getDatosUsuario($email2);


            if ($cliente0 [0] == false) {
                $cliente0["nombre"] = $_POST['nombre'];
                $cliente0["apellido"] = $_POST['apellido'];
                $cliente0["tipoDoc"] = $_POST['tipo_doc'];
                $cliente0["nroDoc"] = $_POST['nro_doc'];
                $cliente0["email"] = $_POST['email'];
                //hacer un insert de usuario
                usuarioNuevoEnReserva($cliente0);
            }if ($cliente1 [0] == false) {
                $cliente1["nombre"] = $_POST['nombre1'];
                $cliente1["apellido"] = $_POST['apellido1'];
                $cliente1["tipoDoc"] = $_POST['tipo_doc1'];
                $cliente1["nroDoc"] = $_POST['nro_doc1'];
                $cliente1["email"] = $_POST['email1'];
                //hacer un insert de usuario
                usuarioNuevoEnReserva($cliente1);
            }
            if ($cliente2 [0] == false) {
                $cliente2["nombre"] = $_POST['nombre2'];
                $cliente2["apellido"] = $_POST['apellido2'];
                $cliente2["tipoDoc"] = $_POST['tipo_doc2'];
                $cliente2["nroDoc"] = $_POST['nro_doc2'];
                $cliente2["email"] = $_POST['email2'];
                //hacer un insert de usuario
                usuarioNuevoEnReserva($cliente2);
            }
            $importe0 = $_POST['importe'];
            $importe1 = $_POST['importe1'];
            $importe2 = $_POST['importe2'];
            $importeTotal = $importe0+$importe1+$importe2;

            $codigoAlfaReserva = "CCC222";

            /// se hacen los insert en reserva
            crearReserva($cliente0['email'],$codigoAlfaReserva,$importe0,$_POST['tipo_cabina'],$vueloId);
            crearReserva($cliente1['email'],$codigoAlfaReserva,$importe1,$_POST['tipo_cabina1'],$vueloId);
            crearReserva($cliente2['email'],$codigoAlfaReserva,$importe2,$_POST['tipo_cabina2'],$vueloId);

            rediregirAPago($codigoAlfaReserva);

            ///
            /// FORMA DINAMICA FALTA DESARROLLAR
            /* $arrayClientes = [$cliente0,$cliente1,$cliente2];
             crearReserva($arrayClientes);*/
            //getenarar codigo alfa
        }
    //    window.location.href=\"../vista/vista_pago.php?reserva=".$idReserva['id'].";</script>";


    }

//$contador = "";
}






/*
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
*/