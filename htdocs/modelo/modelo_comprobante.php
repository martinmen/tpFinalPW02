<?php
require_once("../Conexion.php");

function getDatosReserva($id_reserva){
    $conn = getConexion();
    $sql= "SELECT concat(u.apellido, ', ', u.nombre) as cliente, r.cod_codigo_reserva, v.fecha, v.id_vuelo, u.email
		FROM reserva as r 
			join usuario as u on u.id_usuario = r.cod_usuario
            join vuelo as v on v.id_vuelo = r.cod_vuelo
		WHERE r.id_reserva = '$id_reserva';";
    $result = mysqli_query($conn, $sql);
    $dato = [];

        if($row = mysqli_fetch_array($result))
        {
                $dato[0] = true;
                $dato[1] = $row["cliente"];
                $dato[2] = $row["cod_codigo_reserva"];
                $dato[3] = $row["fecha"];
                $dato[4] = $row["id_vuelo"];
                $dato[5] = $row["email"];


        }


    mysqli_close($conn);

    return $dato;
}

function realizarCheckin($id_reserva){

    $conn = getConexion();
    $sql = "UPDATE reserva 
                SET cod_estado_reserva = 3
                WHERE id_reserva = '$id_reserva';";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('Check-In realizado con éxito, no olvide de entregar su comprobante enviado por email para abordar.');</script>";
    } else{
        echo "<script>alert('Hubo un error, pruebe de nuevo.');</script>";
    }


}