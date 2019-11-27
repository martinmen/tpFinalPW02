<?php

include ("../modelo/modelo_CrearReserva.php");



$tipo_doc = getTipoDocumentos();
$vueloId = $_GET["vuelo"];
$matricula = $_GET["matricula"];
$tipo_cabina = getTipoDeCabinas($vueloId);
$costo= getCosto($vueloId);

if(isset($_POST["submit"])){
    $nombres = $_POST['nombres'];
    $apellido = $_POST['apellido'];
    $tipo_doc = $_POST['tipo_doc'];
    $nro_doc = $_POST['nro_doc'];
    $email = $_POST['email'];

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

    if($_POST['nombres1'] && $_POST['apellido1'] && $_POST['tipo_doc1'] && $_POST['nro_doc1'] && $_POST['email1']){
        $nombres1 = $_POST['nombres1'];
        $apellido1 = $_POST['apellido1'];
        $tipo_doc1 = $_POST['tipo_doc1'];
        $nro_doc1 = $_POST['nro_doc1'];
        $email = $_POST['email1'];

//        $reserva = addReserva();

    }
}


