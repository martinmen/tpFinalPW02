<?php
require_once 'Conexion.php';
session_start();
if(!isset($_SESSION['administrador'])){
    header("Location: index.php");
}
?>


<?php
include('header.php');
include('vistaAdmin.php');
include('footer.php');
?>
