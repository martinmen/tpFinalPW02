<?php
include("../modelo/modelo_medico.php");

if(isset($_GET["cod_usuario"])){
    $cod_usuario = $_GET["cod_usuario"];
}
$datos = getUsuario($cod_usuario);

if($datos[0] == true){
    $id_usuario = $datos[1];
    $nombre = $datos[2];
    $apellido = $datos[3];
    $num_doc = $datos[4];
    $cod_nivel_vuelo = $datos[5];
}

$nivel = getNiveles();

if(isset($_POST["accion"])){
    if (($_POST["accion"])== "realizar_modificacion"){

        $nivelNvo = $_POST["nivel"];
        $usuario = $_POST["id_usuario"];
        modificarNivelUsuario($nivelNvo, $usuario);
    }
}


?>