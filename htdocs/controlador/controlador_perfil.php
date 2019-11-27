<?php

use http\Header;

include("../modelo/modelo_perfil.php");
$email = $_SESSION["email"];

$id_usuario = $_SESSION["id"];
$nombre = $_SESSION["nombre"];
$apellido = $_SESSION["apellido"];
$tipo_doc = $_SESSION["tipo_doc"];
$num_doc = $_SESSION["num_doc"];
$nivel_vuelo = getNivelVuelo($id_usuario);
$turno_medico = getTurnoMedico($email);

if( $turno_medico[0] == true){
    $fecha_turno = $turno_medico[1];
    $centro_medico = $turno_medico[2];
    $tiene_turno_medico = $turno_medico[0];
    $fechaBaja_turno = $turno_medico[3];
    if($fechaBaja_turno != null){
        $turnoAtendido = true;
    } else {
        $turnoAtendido = false;
    }

} else {
    $fecha_turno = "";
    $centro_medico = "";
    $tiene_turno_medico = $turno_medico[0];
    $fechaBajaTurno = "";
}

if(isset($_POST["submit"])){
    $id_usuario = $_POST['id_usuario'];

    bajaTurno($id_usuario);
}

if(isset($_POST["cambiarContrasenia"])){
    $id_usuario = $_POST["id_usuario"];
    $passAnterior = $_POST["passAnterior"];
    $passNueva = $_POST["passNueva"];
    $passConfirmar = $_POST["passConfirmar"];

    cambiarContrasenia($id_usuario, $passAnterior, $passNueva, $passConfirmar);

}

$reservas = getReservas($email);

