<?php
use http\Header;

include("../modelo/modelo_sacarTurno.php");
$id_usuario = $_SESSION["id"];
$nombre = $_SESSION["nombre"];
$apellido = $_SESSION["apellido"];
$tipo_doc = $_SESSION["tipo_doc"];
$num_doc = $_SESSION["num_doc"];

$centro_medico = getCentrosMedicos();

if(isset($_POST["submit"])){
    $centro_medico = $_POST['centro_medico'];
    $fechaTurno = $_POST['fechaTurno'];
    $id_usuario = $_POST['id_usuario'];

    sacarTurno($id_usuario, $centro_medico, $fechaTurno );
}