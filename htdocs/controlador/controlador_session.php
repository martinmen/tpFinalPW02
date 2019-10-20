<?php

include("../modelo/modelo_session.module");
$email = $_POST["emailUsuario"];
$pass = $_POST['passUsuario'];

$rol = validaSession($email, $pass);
if ($rol == 1){
    include("../header.php");
    $_SESSION['administrador'] = $email;
    include("../vista/vistaAdmin.php");
    include("../footer.php");
}else if ($rol == 2){
    include("../header.php");
    $_SESSION['cliente'] = $email;
    include("../vista/vistaCliente.php");
    include("../footer.php");
} else if($rol == 3){
    include("../header.php");
    $_SESSION['interesado'] = $email;
    include("../interesadoHome.php");
    include("../footer.php");
} else if($rol == 0) {
    Header('location:../login.php');
//    $error = false;
}

