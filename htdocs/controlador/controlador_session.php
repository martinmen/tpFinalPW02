<?php

include("../modelo/modelo_session.php");


$email = $_POST["emailUsuario"];
$pass = $_POST['passUsuario'];

$rol = validaSession($email, $pass);
session_start();
$_SESSION["email"] = $email;
if ($rol == 1){
    $_SESSION["rol"] = "administrador";

   include_once("../header.php");
    include_once("../controlador/controlador_admin.php");
    include_once("../vista/vistaAdmin.php");
    include_once("../footer.php");

}else if ($rol == 2){
    $_SESSION["rol"] = "cliente";

    

} else if($rol == 3){
    $_SESSION["rol"] = "interesado";
   

} else if($rol == 4) {
    $_SESSION["rol"] = "medico";


  
}




