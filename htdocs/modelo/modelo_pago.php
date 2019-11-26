<?php
require_once ("../Conexion.php");

function getDatosUsuario($email)
{
    $conn = getConexion();
    $sql = "select * from usuario where email = '$email';";
    $result = mysqli_query($conn, $sql);

    $cliente1 = [];
    if($row = mysqli_fetch_array($result))
        {
      $cliente1 [0] = true;
      $cliente1 [1] = $row["nombre"];
      $cliente1 [2] = $row["apellido"];
      $cliente1 [3] = $row["email"];

        } else{
            $cliente1[0] = false;
        }
    return $cliente1;

    }
