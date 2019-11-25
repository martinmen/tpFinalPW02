<?php
require_once ("../Conexion.php");

function registroUsuario($nombre, $apellido, $email, $pass, $documento){
    $conn = getConexion();
    $error = false;

    $sql = "SELECT * from usuario where email = '$email';";
    $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_array($result)){
        $error = true;
    } else{
        $sql2 = "INSERT INTO usuario (nombre, apellido, email, contrasenia, tipo_usaurio, ndocumento)
                        values   ('$nombre', '$apellido', '$email', '$pass', 2, '$documento')";
        $result2 = mysqli_query($conn, $sql2);

        if($result2) {
            $error = false;
        }
    }

    return $error;
}
