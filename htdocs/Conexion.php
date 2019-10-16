<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '1234';
$db = 'tpfinal';
$conexion = mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_errno()){
    echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error(); } ?>