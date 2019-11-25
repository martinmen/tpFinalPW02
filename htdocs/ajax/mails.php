<?php

use mysql_xdevapi\Result;

if(isset($_GET['email'])){
    $email = $_GET["email"];
    $conexion = mysqli_connect("127.0.0.1", "root", "", "tpfinal");


    $sql = "SELECT * FROM usuario WHERE email = '" . $email."'";
    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado)){
      echo "Email existente, no es necesario completar los datos";
    } else{
        echo "No existe Email, complete los datos para continuar con la reserva";
    }


}




//if(isset($_GET['tipo_vuelo'])){
//    $tipo_vuelo = $_GET["tipo_vuelo"];
//    $conexion = mysqli_connect("127.0.0.1", "root", "admin", "tpfinal");
//    $sql = "SELECT id_estacion, nombre FROM estacion WHERE cod_tipo_vuelo = " . $tipo_vuelo;
//    $resultado = mysqli_query($conexion, $sql);
//    while ($fila = mysqli_fetch_assoc($resultado)) {
//        echo "<option value='" . $fila["id_estacion"] . "'>" . $fila["nombre"] . "</option>";
//    }
//
//}
