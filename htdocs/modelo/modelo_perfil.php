<?php
require_once("../Conexion.php");


function getReservas($email){
    $conn = getConexion();
    $sql= "select r.cod_codigo_reserva as cod_reserva, v.id_vuelo as vuelo, v.fecha as fechaVuelo,
           r.importe as importe, er.descripcion as estado_reserva, eq.matricula as matricula
            from reserva as r 
				 join vuelo as v on v.id_vuelo = r.cod_vuelo
                 join estado_reserva as er on er.id_estado_reserva = cod_estado_reserva 
                 join usuario as u on u.id_usuario = r.cod_usuario
                 join equipo as eq on eq.id_equipo = v.cod_equipo
                 where u.email = '$email'" ;
    $result = mysqli_query($conn, $sql);

    $reservas = Array();

    if(mysqli_num_rows($result)> 0){
        while ($row=mysqli_fetch_assoc($result))
        {
            $reserva = Array();
            $reserva['cod_reserva'] = $row["cod_reserva"];
            $reserva['vuelo'] = $row["vuelo"];
            $reserva['matricula'] = $row["matricula"];
            $reserva['fechaVuelo'] = $row["fechaVuelo"];
            $reserva['cabina'] = "";//$row["cabina"];
            $reserva['importe'] = $row["importe"];
            $reserva['estado_reserva'] = $row["estado_reserva"];
            $reservas[] = $reserva;

        }
    } else{
        echo "";
    }
    mysqli_close($conn);

    return $reservas;

}

function getTurnoMedico($email){

    $conn = getConexion();
    $sql="select t.id_turno_medico, t.fecha_turno, ce.descripcion, t.fecha_baja_turno
        from turno as t 
		join centro_medico as ce on ce.id_centro_medico = t.cod_centro_medico
        join usuario as u on u.id_usuario = t.cod_usuario
        where u.email = '$email';";
    $result=mysqli_query($conn,$sql);
//    $turno_medico = false;
    $turno_medico = [];

    if($row = mysqli_fetch_array($result))
    {
        $turno_medico[0] = true;
        $turno_medico[1] = $row['fecha_turno'];
        $turno_medico[2] = $row['descripcion'];
        $turno_medico[3] = $row['fecha_baja_turno'];
    } else{
        $turno_medico[0] = false;
    }

    mysqli_close($conn);
    return $turno_medico;
}

function bajaTurno($id_usuario){

    $conn = getConexion();
    $sql  = "DELETE FROM TURNO WHERE cod_usuario = '$id_usuario';";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('Su turno ha sido dado de baja correctamente.'); window.location.href=\"../vista/vista_perfil.php\";</script>";
        exit;
    } else{
        echo "<script>alert('No pudo darse de baja su turno, ponganse en contacto con soporte.'); window.location.href=\"../vista/vista_perfil.php\"</script>";
    }
}

function getNivelVuelo($id_usuario){
    $conn = getConexion();
    $sql  = "SELECT nv.id_nivel_vuelo, nv.descripcion 
                FROM usuario as u 
                join nivel_vuelo as nv on nv.id_nivel_vuelo = u.cod_nivel_vuelo
                WHERE u.id_usuario = '$id_usuario';";
    $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_array($result)){
        $nivel_vuelo = $row['descripcion'];
    }

    return $nivel_vuelo;

}




