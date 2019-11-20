<?php

use http\Header;

include("../modelo/modelo_perfil.php");
$email = $_SESSION["email"];

$id_usuario = $_SESSION["id"];
$nombre = $_SESSION["nombre"];
$apellido = $_SESSION["apellido"];
$tipo_doc = $_SESSION["tipo_doc"];
$num_doc = $_SESSION["num_doc"];

$turno_medico = getTurnoMedico($email);

if( $turno_medico[0] == true){
    $fecha_turno = $turno_medico[1];
    $centro_medico = $turno_medico[2];
    $tiene_turno_medico = $turno_medico[0];
} else {
    $fecha_turno = "";
    $centro_medico = "";
    $tiene_turno_medico = $turno_medico[0];
}

if(isset($_POST["submit"])){
    $id_usuario = $_POST['id_usuario'];

    bajaTurno($id_usuario);

}


$reservas = getReservas($email);

