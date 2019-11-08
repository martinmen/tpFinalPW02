<?php
include("../modelo/modelo_registrar.php");

$error = false;
$a= "";

if(isset($_POST["submit"])){
    $pass = $_POST["contraseña"];
    $passConfirm = $_POST["contraseñaConfirmar"];

    if($passConfirm == $pass){
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $pass = $_POST["contraseña"];
        $documento = $_POST["documento"];

        $usuarioOk = registroUsuario($nombre, $apellido, $email, $pass, $documento);
        if ( $usuarioOk == true){
            Header('location:../login.php');
        } else {
            Header('location: ../vista/vista_registrar.php');
        }
    } else{
        $error=true;
    }
}





