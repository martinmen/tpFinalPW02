<?php
require_once("../Conexion.php");

function getDatosUsuario($email){

    $conn = getConexion();
    $sql="SELECT * from usuario where email ='$email'";
    $result=mysqli_query($conn,$sql);
    $usuario = [];

    if($row = mysqli_fetch_array($result))
    {
        $usuario[0] = $row['id_usuario'];
        $usuario[1] = $row['nombre'];
        $usuario[2] = $row['apellido'];
        $usuario[3] = $row['num_doc'];
    }

    mysqli_close($conn);
    return $usuario;

}

function getReservas($email){
    $conn = getConexion();
    $sql= "select r.cod_codigo_reserva as cod_reserva, v.id_vuelo as vuelo, v.fecha as fechaVuelo, c.descripcion as cabina, a.id_asiento as asiento, 
           r.importe as importe, er.descripcion as estado_reserva
            from reserva as r join vuelo as v on v.id_vuelo = r.cod_vuelo
                 join cabina as c on c.id_cabina = r.cod_cabina
                 join asiento as a on a.id_asiento = r.cod_asiento
                 join estado_reserva as er on er.id_estado_reserva = cod_estado_reserva 
                 join usuario as u on u.id_usuario = r.cod_usuario where u.email = '$email'" ;
    $result = mysqli_query($conn, $sql);

    $reservas = Array();

    if(mysqli_num_rows($result)> 0){
        while ($row=mysqli_fetch_assoc($result))
        {
            $reserva = Array();
            $reserva['cod_reserva'] = $row["cod_reserva"];
            $reserva['vuelo'] = $row["vuelo"];
            $reserva['fechaVuelo'] = $row["fechaVuelo"];
            $reserva['cabina'] = $row["cabina"];
            $reserva['asiento'] = $row["asiento"];
            $reserva['importe'] = $row["importe"];
            $reserva['estado_reserva'] = $row["estado_reserva"];
            $reservas[] = $reserva;

        }
    } else{
        echo "SIN DATOS";
    }
    mysqli_close($conn);

    return $reservas;

}
