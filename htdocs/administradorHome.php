<?php
require_once 'Conexion.php';
session_start();
if(!isset($_SESSION['administrador'])){
    header("../index.php");
}
?>


<?php
include('header.php');
include('vista/vistaAdmin.php');
include('footer.php');
?>
