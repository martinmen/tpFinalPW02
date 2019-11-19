<?php
include("../modelo/modelo_medico.php");
$apellido = $_GET['usuario'];
$datos = getUsuario($apellido);
$nivelNvo = $_POST['nivel'];
//$nivelSeleccionado = modificarNivelUsuario();
$niveles = getNiveles();
if ($_POST['accion'] == "modificacion_nivel"){
    $mensaje= modificarNivelUsuario($nivelNvo);
}
?>