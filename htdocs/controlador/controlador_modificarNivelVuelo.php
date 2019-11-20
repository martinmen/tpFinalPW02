<?php
include("../modelo/modelo_medico.php");


$cod_usuario = isset($_GET["cod_usuario"]);
$datos = getUsuario($cod_usuario);
$niveles = getNiveles();



$nivelNvo = isset($_POST["nivel"]);
$codnvo = isset($_POST["id_usuario"]);
$accion = isset($_POST["accion"]);
$mensaje = $cod_usuario;
if ($accion == "realizar_modificacion"){
    
    $mensaje = modificarNivelUsuario($nivelNvo, $codnvo);
}
?>