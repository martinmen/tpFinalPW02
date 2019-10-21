<?php
require_once ("../Conexion.php");

function registroUsuario($nombre, $apellido, $email, $pass, $documento){
    $conn = getConexion();
    $usuarioOk = false;

    $sql = "INSERT INTO usuario (nombre, apellido, email, contrasenia, tipo_usaurio, ndocumento)
                        values   ('$nombre', '$apellido', '$email', '$pass', 2, '$documento')";
    $result = mysqli_query($conn, $sql);

    if(!($result)){
        $usuarioOk = false;
    } else{
        $usuarioOk = true;
    }

    return $usuarioOk;
}
