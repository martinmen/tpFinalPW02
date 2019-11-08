<?php
require_once 'Conexion.php';
session_start();
if(!isset($_SESSION['cliente'])){
    header("Location: index.php");
}
?>


<?php
include('header.php');
include('vista/vista_cliente.php');
include('footer.php');
?>
