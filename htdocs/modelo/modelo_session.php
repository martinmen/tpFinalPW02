<?php
//require_once ("../Conexion.php");

function validaSession($email, $pass)
{
    $conn = getConexion();

    $sql = "SELECT * from usuario where email ='$email' and contrasenia = '$pass';";
    $result = mysqli_query($conn, $sql);
    $rol = 0;

    if ($row = mysqli_fetch_array($result)) {

        //Direccionamiento segun rol.
        /*Roles: Administrador = 1 - Cliente = 2 - Intesados = 3*/
        $_SESSION["rol"] = $row['cod_tipo_usuario'];
        $rol =  $_SESSION["rol"];
        $_SESSION["id"]= $row['id_usuario'];
        $_SESSION["nombre"] = $row['nombre'];
        $_SESSION["apellido"] = $row['apellido'];
        $_SESSION["tipo_doc"] = $row['cod_tipo_doc'];
        $_SESSION["num_doc"]= $row['num_doc'];
        $_SESSION["email"] = $email;
    } else {
        echo "<script>alert('El email y/o contraseña no son correcto'); ;</script>";
        $rol = 0;
        exit;
    }
    mysqli_close($conn);
    return $rol;
}
