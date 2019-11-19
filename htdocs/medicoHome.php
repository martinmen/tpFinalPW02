<?php
require_once 'Conexion.php';
session_start();
if(!isset($_SESSION['medico'])){
    header("Location: index.php");
}
?>


<?php
include('header.php');
include('vista/vista_medico.php');
include('footer.php');
?>
