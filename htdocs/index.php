<?php

use FontLib\Header;

include("login.php");
//Header('location:vista/vista_cliente.php');
require_once("Conexion.php");
include_once("login.php");

include("modelo/modelo_session.php");


if(isset($_POST['submit'])){

    $email = $_POST["emailUsuario"];
    $pass = $_POST['passUsuario'];
    session_start();

    $rol = validaSession($email, $pass);

    if ($rol == 1){
        $_SESSION["rol"] = "1"; //administrador
        Header('location:vista/vista_admin.php');

    } else if($rol == 2){
        $_SESSION["rol"] = "2";//cliente
        Header('location:vista/vista_cliente.php');
    } else if($rol == 3){
        $_SESSION["rol"] = "3";//medico
        Header('location:vista/vista_medico.php');
    }

}



?>