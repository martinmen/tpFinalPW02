<?php
include("../modelo/modelo_registrar.php");

$error = "";
$a= "";
$tipoDoc = getTipoDocumentos();

if(isset($_POST["submit"])){
    $pass = $_POST["contraseña"];
    $passConfirm = $_POST["contraseñaConfirmar"];

    if($passConfirm == $pass){
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $pass = $_POST["contraseña"];
        $documento = $_POST["documento"];
        $tipodocumento = $_POST["tipodocumento"];



        $error = registroUsuario($nombre, $apellido, $tipodocumento, $documento, $email, $pass);
//        if ( $error == true){
//            $error= "<p style='color:red; font-weight: bold;'>El email ya se encuentra registrado.</p>";
//            include("../vista/vista_registrar.php");
//        } else {
//            $error= "<p style='color:yellowgreen; font-weight: bold;'>Se ha registrado correctamente. Puede ingresar.</p>";
//            include("../vista/vista_registrar.php");
//        }
    } else{

        echo "<script>alert('Las contraseñas no coinciden.'); window.location.href=\"../vista/vista_registrar.php\";</script>";
    }
}





