<?php

require_once("Conexion.php");
include_once("login.php");

if( isset($_GET['pag']) && $_GET['pag'] == 'login.php') {
    include_once("login.php");
}

if(isset($_POST['submit'])){
    include("modelo/modelo_session.php");
    $email = $_POST["emailUsuario"];
    $pass = $_POST['passUsuario'];
    session_start();

    $rol = validaSession($email, $pass);

    if ($rol == 1){
        Header('location:vista/vistaAdmin.php');

    } else if($rol == 2){
        $_SESSION["rol"] = "cliente";

        Header('location:vista/vista_cliente.php');

    } else if($rol == 3){
        $_SESSION["rol"] = "interesado";
        Header('location:vista/vista_interesado.php');

    } else if($rol == 4){
        $_SESSION["rol"] = "medico";

        Header('location:vista/vista_medico.php');
    }

}



?>