<?php
include("../modelo/modelo_comprobante.php");

if(isset( $_GET['id_reserva'])){
    $id_reserva = $_GET['id_reserva'];
    $dato = getDatosReserva($id_reserva);

    if($dato[0] == true){
        $cliente = $dato[1];
        $cod_reserva = $dato[2];
        $fechaHora = $dato[3];
        $vuelo = $dato[4];
        $email = $dato[5];
    }
}


$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 8){
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
$codigoAbordaje = generate_string($permitted_chars, 8);

if(isset($_POST['submit'])){
    $id_reserva = $_POST['id_reserva'];
    realizarCheckin($id_reserva);

    //ENVIAR CORREO
    include("../PHPMailer/sendemail.php");
    $mail_username = "guachorocket@gmail.com";
    $mail_userpassword = "guachorocket123";
    $mail_addAddress = "$email";
    $template = "../PHPMailer/email_template.html";

    $mail_setFromEmail= $mail_username;
    $mail_setFromName= "Guacho Rocket - Vuelos";
    $txt_message = "Gracias $cliente por viajar con Guacho-Rocket. /n Su Código de Autorización de Abordaje: /n $codigoAbordaje. /n 
                    Para la siguiente compra: <b>Código de Reserva: $cod_reserva /n Fecha y Hora: $fechaHora /n Vuelo: $vuelo. /n /n Hasta la próxima! </b>";
    $mail_subject= "Comprobante Check-In en GuachoRocket";

    sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);
    echo "<script>window.location.href = '../vista/vista_perfil.php';</script>";
}


