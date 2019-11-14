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
        Header('location:vista/vista_admin.php');

    }else if ($rol == 2){
        Header('location:vista/vista_cliente.php');

    } else if($rol == 3){

    }

}



?>