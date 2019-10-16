<?php

require_once 'Conexion.php';
session_start();
//Si tiene session iniciada no muestra el login y te manda al home correspondiente.
if(isset($_SESSION['administrador'])){
    header("Location: administradorHome.php");}

include_once("header.php");
include_once("login.php");
   // if( isset($_GET['pag']) && $_GET['pag'] == 'login') {
     //   include("login.php");
   // }


include_once ("footer.php");
?>