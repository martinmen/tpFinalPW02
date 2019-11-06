<?php

include("../modelo/modelo_session.module");

$email = $_POST["emailUsuario"];
$pass = $_POST['passUsuario'];

$rol = validaSession($email, $pass);
if ($rol == 1){
    include_once("../header.php");
    $_SESSION['administrador'] = $email;
    include_once("../controlador/controlador_admin.php");
    include_once("../vista/vista_admin.php");
    include_once("../footer.php");
}else if ($rol == 2){
    include_once("../header.php");
    $_SESSION['cliente'] = $email;
    include_once("../controlador/controlador_cliente.php");
    include_once("../vista/vista_cliente.php");
    include_once("../footer.php");
} else if($rol == 3){
    include_once("../header.php");
    $_SESSION['interesado'] = $email;
    include_once("../interesadoHome.php");
    include_once("../footer.php");
} else if($rol == 0) {
    Header('location:../login.php');
//    $error = false;
}

