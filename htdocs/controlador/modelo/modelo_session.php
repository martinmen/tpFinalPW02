<?php
require_once("../Conexion.php");
function validaSession($email, $pass)
{
    $conn = getConexion();

    $sql = "SELECT * from usuario where email ='$email'";
    $result = mysqli_query($conn, $sql);
    $rol = 0;

    if ($row = mysqli_fetch_array($result)) {
        if ($row['contrasenia'] == $pass) {
            //Direccionamiento segun rol.
            /*Roles: Administrador = 1 - Cliente = 2 - Intesados = 3*/
            if ($row['tipo_usuario'] == 1) {
                $rol = 1;
            } elseif ($row['tipo_usuario'] == 2) {
                $rol = 2;
            } elseif ($row['tipo_usuariool'] == 3) {
                $rol = 3;
            }
        }
    } else {
        $rol = 0;
    }
    return $rol;
}