<?php
require_once 'Conexion.php';







/*if(empty($usuario) || empty($pass)){
   // header("index.php");

    exit();
}*/

$usuario = $_POST["emailUsuario"];
$pass = $_POST['passUsuario'];

$sql = "SELECT * from usuario where nombre ='$usuario'";
$result = mysqli_query($conexion,$sql);

if($row = mysqli_fetch_array($result)) {
    if ($row['password'] == $pass) {
        session_start();

//Direccionamiento segun rol.
        /*Roles
        Administrador = 1
        Cliente = 2
        Intesados = 3
        */
        if ($row['rol'] == 1) {

            $_SESSION['administrador'] = $usuario;
            header("Location:administradorHome.php");
        } elseif ($row['rol'] == 2) {
            $_SESSION['cliente'] = $usuario;
            header("Location:clienteHome.php");
        } elseif ($row['rol'] == 3) {
            $_SESSION['interesado'] = $usuario;
            header("Location:interesadoHome.php");
        }
    } else {
        header("Location:index.php");
        exit();
    }
}else{
    header("Location:index.php");
    exit();
}

