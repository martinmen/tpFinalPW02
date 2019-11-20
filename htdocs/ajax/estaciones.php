<?php

if(isset($_GET['tipo_vuelo'])){
    $tipo_vuelo = $_GET["tipo_vuelo"];
    $conexion = mysqli_connect("127.0.0.1", "root", "admin", "tpfinal");

    if ($tipo_vuelo == 1){
        $sql = "SELECT id_estacion, nombre FROM estacion WHERE cod_tipo_vuelo = " . $tipo_vuelo;
        $resultado = mysqli_query($conexion, $sql);
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<option value='" . $fila["id_estacion"] . "'>" . $fila["nombre"] . "</option>";
        }
    }else if ( $tipo_vuelo == 2){
        $sql = "SELECT id_estacion, nombre FROM estacion WHERE cod_tipo_vuelo = " . $tipo_vuelo;
        $resultado = mysqli_query($conexion, $sql);
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<option value='" . $fila["id_estacion"] . "'>" . $fila["nombre"] . "</option>";
        }
    } else if ($tipo_vuelo == 3){
        $sql = "SELECT id_estacion, nombre FROM estacion WHERE cod_tipo_vuelo = " . $tipo_vuelo . " UNION SELECT id_estacion, nombre FROM estacion  where id_estacion = 1 ORDER BY ID_ESTACION ASC; ";
        $resultado = mysqli_query($conexion, $sql);
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<option value='" . $fila["id_estacion"] . "'>" . $fila["nombre"] . "</option>";
        }
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
