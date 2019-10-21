<?php
require_once ("../Conexion.php");

function crearReserva($nombre, $apellido, $email, $pass, $vuelo){


    $conn = getConexion();
    $usuarioOk = false;
    //Consultar si los usuarios a registrar en la reserva existen, o no. Si no existen, crearlos en la tabla usuarios, Para luego extraer
    //el ID para hacer la reserva
//$consultaIdUsuarios = "Select ID from Usuario U where  ''"
$id_usuario = "";
$id_vuelo= "";
$fecha_vuelo="";
/// Generar codigo de reserva
    $longitud = 6;
    function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
        //echo generarCodigo(6); // genera un código de 6 caracteres de longitud.
    }
    $codigo_reserva = generarCodigo($longitud);
    //Estado por defecto al crearla P = Pendiente de pago
    $estado = "P";

    $sql = "INSERT INTO reserva (id_usuario, id_vuelo, cod_reserva, estado, fecha_reserva )
                        values   ('$id_usuario', '$id_vuelo', '$codigo_reserva', '$estado', current_timestamp )";



    $result = mysqli_query($conn, $sql);

    if(!($result)){
        $usuarioOk = false;
    } else{
        $usuarioOk = true;
    }

    return $usuarioOk;
}
