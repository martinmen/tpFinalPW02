<?php
require_once 'Conexion.php';
session_start();
if(!isset($_SESSION['administrador'])){
    header("../index.php");
}
?>


<?php
include('header.php');
include('vista/vista_admin.php');
include('footer.php');
?>
