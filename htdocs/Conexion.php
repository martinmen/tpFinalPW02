<?php

function getConexion(){
    $host = '127.0.0.1';
    $user = 'root';
    $pass = '';
    $db = 'tpfinal';
    $conexion = mysqli_connect($host, $user, $pass, $db);

    if(!$conexion){
        die('No se pudo conectar a la base de datos : '.mysqli_connect_error());
    }

    return $conexion;
}

 ?>