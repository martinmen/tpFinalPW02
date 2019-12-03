<?php
use mysql_xdevapi\Session;

include("../modelo/modelo_CrearReserva.php");

if (isset($_GET['vuelo']) && isset($_GET['matricula'])) {

    $tipo_doc = getTipoDocumentos();
    $vueloId = $_GET["vuelo"];
    $matricula = $_GET["matricula"];
    $tipo_cabina = getTipoDeCabinas($vueloId);
    $costo = getCosto($vueloId);

    if ($vueloId != null) {
        $_SESSION["idVuelo"] = $vueloId;
    }
}

if (isset($_POST["submit"])) {
    session_start();
    $vueloId = $_SESSION["idVuelo"];
    //ENVIAR MAIL DE REGISTRO
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    function generate_string($input, $strength = 16){
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    include("../PHPMailer/sendemail.php");
    $passRandom = generate_string($permitted_chars, 20);
    $mail_username = "guachorocket@gmail.com";
    $mail_userpassword = "guachorocket123";
    $mail_addAddress = "$email";
    $template = "../PHPMailer/email_template.html";

    $mail_setFromEmail= $mail_username;
    $mail_setFromName= "Guacho Rocket - Vuelos";
    $txt_message = "Bienvenido $apellido, $nombres. \n Ingrese a nuestra web con su correo y la siguiente contraseña <b>$passRandom</b>, y cambiela por una nueva.";
    $mail_subject= "Confirmacion de registro en GuachoRocket";

    sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);

    //FIN DE ENVIAR MAIL DE REGISTRO


    $contador = $_POST['counter'];
// el contador indica cuantos usuarios se van a tomar para la reserva.
// Dependiendo la cnatidad entra en el if correspondiente. y se hacen las validaciones correspondiente
    if ($contador == "") {
        if ($_POST['email']) {
            $email0 = $_POST['email'];
            $cliente0 = getDatosUsuario($email0);
            //se comprueba por mail si existe.
            // Si no existe (false), toma los datos enviados por post
            if ($cliente0 [0] == false) {
                $cliente0["nombre"] = $_POST['nombre'];
                $cliente0["apellido"] = $_POST['apellido'];
                $cliente0["tipoDoc"] = $_POST['tipo_doc'];
                $cliente0["nroDoc"] = $_POST['nro_doc'];
                $cliente0["email"] = $_POST['email'];
                $cliente0["tipoCabina"] = $_POST['tipo_cabina'];
                //hacer un insert de usuario
                usuarioNuevoEnReserva($cliente0);
            }
            //si existe(true) se pasa el mail del mismo y en el metodo crearReserva se obtienen los datos necesarios para la bd
            // insert en reserva
            $importe0 = $_POST['importe'];
            $codigoAlfaReserva = "CCC111";
            $cabina = $_POST['tipo_cabina'];
            if (crearReserva($cliente0['email'], $codigoAlfaReserva, $importe0, $cabina, $vueloId) == true) {
                $contador = "";
                rediregirAPago($codigoAlfaReserva);
            } else {
                $contador = "";
              //  ErrorRedirigirAReserva($vueloId,$matricula);
            }
        }
    }
    //se comprueba por mail si existe.
    // Si no existe (false), toma los datos enviados por post
    else if ($contador == 2) {
        if ($_POST['email'] && $_POST['email1']) {
            $email0 = $_POST['email'];
            $email1 = $_POST['email1'];
            $cliente0 = getDatosUsuario($email0);
            $cliente1 = getDatosUsuario($email1);
            //se comprueba por mail si existe.
            // Si no existe (false), toma los datos enviados por post
            if ($cliente0 [0] == false) {
                $cliente0["nombre"] = $_POST['nombre'];
                $cliente0["apellido"] = $_POST['apellido'];
                $cliente0["tipoDoc"] = $_POST['tipo_doc'];
                $cliente0["nroDoc"] = $_POST['nro_doc'];
                $cliente0["email"] = $_POST['email'];
                //hacer un insert de usuario
                usuarioNuevoEnReserva($cliente0);
            }
            if ($cliente1 [0] == false) {
                $cliente1["nombre"] = $_POST['nombre1'];
                $cliente1["apellido"] = $_POST['apellido1'];
                $cliente1["tipoDoc"] = $_POST['tipo_doc1'];
                $cliente1["nroDoc"] = $_POST['nro_doc1'];
                $cliente1["email"] = $_POST['email1'];
                //hacer un insert de usuario
                usuarioNuevoEnReserva($cliente1);
            }
            /// se hacen los insert en reserva
            $importe0 = $_POST['importe'];
            $importe1 = $_POST['importe1'];
            $codigoAlfaReserva = "CCC111";
            $cabina0 = $_POST['tipo_cabina'];
            $cabina1 = $_POST['tipo_cabina1'];
            if (crearReserva($cliente0['email'], $codigoAlfaReserva, $importe0, $cabina0, $vueloId) == true &&
                crearReserva($cliente1['email'], $codigoAlfaReserva, $importe1, $cabina1, $vueloId) == true
            ) {
                $contador = "";
                rediregirAPago($codigoAlfaReserva);
            } else {
                $contador = "";
             //  ErrorRedirigirAReserva($vueloId,$matricula);
            }
        }
    } else if ($contador == 3) {
        if ($_POST['email'] && $_POST['email1'] && $_POST['email2']) {
            $email0 = $_POST['email'];
            $email1 = $_POST['email1'];
            $email2 = $_POST['email2'];
            $cliente0 = getDatosUsuario($email0);
            $cliente1 = getDatosUsuario($email1);
            $cliente2 = getDatosUsuario($email2);
            //se comprueba por mail si existe.
            // Si no existe (false), toma los datos enviados por post
            if ($cliente0 [0] == false) {
                $cliente0["nombre"] = $_POST['nombre'];
                $cliente0["apellido"] = $_POST['apellido'];
                $cliente0["tipoDoc"] = $_POST['tipo_doc'];
                $cliente0["nroDoc"] = $_POST['nro_doc'];
                $cliente0["email"] = $_POST['email'];
                //hacer un insert de usuario
                usuarioNuevoEnReserva($cliente0);
            }
            if ($cliente1 [0] == false) {
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
            /// se hacen los insert en reserva
            $importe0 = $_POST['importe'];
            $importe1 = $_POST['importe1'];
            $importe2 = $_POST['importe2'];
            $cabina0 = $_POST['tipo_cabina'];
            $cabina1 = $_POST['tipo_cabina1'];
            $cabina2 = $_POST['tipo_cabina2'];
            // $importeTotal = $importe0+$importe1+$importe2;
            $codigoAlfaReserva = "CCC222";

            if (crearReserva($cliente0['email'], $codigoAlfaReserva, $importe0, $cabina0, $vueloId) == true &&
                crearReserva($cliente1['email'], $codigoAlfaReserva, $importe1, $cabina1, $vueloId) == true &&
                crearReserva($cliente2['email'], $codigoAlfaReserva, $importe2, $cabina2, $vueloId) == true) {
                $contador = "";
                //se toma el codigo de la reserva  y se redirige al pago de la misma
                rediregirAPago($codigoAlfaReserva);
            } else {
                $contador = "";
               // ErrorRedirigirAReserva($vueloId,$matricula);
            }
            // FORMA DINAMICA FALTA DESARROLLAR
            /* $arrayClientes = [$cliente0,$cliente1,$cliente2];
             crearReserva($arrayClientes);*/
            //getenarar codigo alfa
        }
    }
    $contador = "";//se limpia variable contador
}
