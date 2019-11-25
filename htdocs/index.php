<?php
include("login.php");
//Header('location:vista/vista_cliente.php');
require_once("Conexion.php");
include_once("login.php");

include("modelo/modelo_session.php");


//if( isset($_GET['pag']) && $_GET['pag'] == 'login.php') {
//    include_once("login.php");
//
//}

if(isset($_POST['submit'])){

    $email = $_POST["emailUsuario"];
    $pass = $_POST['passUsuario'];
    session_start();

    $rol = validaSession($email, $pass);

    if ($rol == 1){
        Header('location:vista/vistaAdmin.php');

    } else if($rol == 2){
        $_SESSION["rol"] = "cliente";

        Header('location:vista/vista_cliente.php');

    }

}



?>