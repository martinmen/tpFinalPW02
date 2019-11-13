<?php
include("../modelo/modelo_perfil.php");
$email = $_GET['id'];
$usuario = getDatosUsuario($email);

$nombre = $usuario[1];
$apellido = $usuario[2];
$num_doc = $usuario[3];

$reservas = getReservas($email);
