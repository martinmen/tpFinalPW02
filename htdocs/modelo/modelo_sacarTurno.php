<?php
require_once("../Conexion.php");

function getCentrosMedicos(){

    $con = getConexion();
    $sql = "SELECT DISTINCT descripcion, id_centro_medico FROM centro_medico";
    $result = mysqli_query($con, $sql);

    $centro_medico = "";

    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $centro_medico .= "<option value='".$row['id_centro_medico']."'>".$row['descripcion']."</option>";
        }
    } else {
        $centro_medico="<option>NO HAY DATOS</option>";
    }

    return $centro_medico;
}

function sacarTurno($id_usuario, $centro_medico, $fechaTurno ){

    $con = getConexion();

    $sql = "SELECT COUNT(cod_centro_medico) as cantTurnosXFecha from turno where fecha_turno = '$fechaTurno';";
    $result = mysqli_query($con, $sql);
    $cantTurnosXFecha = 0;

    if($row = mysqli_fetch_array($result)){
        $cantTurnosXFecha = $row['cantTurnosXFecha'];
    }

    $sql1 = "SELECT turnos_diarios from centro_medico where id_centro_medico = '$centro_medico';";
    $result1 = mysqli_query($con, $sql1);
    $turnosDiarios = 0;

    if($row = mysqli_fetch_array($result1)){
       $turnosDiarios = $row['turnos_diarios'];
    }

    if($cantTurnosXFecha <  $turnosDiarios){
        $sql3 = "INSERT INTO turno (cod_usuario, cod_centro_medico, fecha_turno)
                        values   ('$id_usuario', '$centro_medico', '$fechaTurno')";
        $result3 = mysqli_query($con, $sql3);
        if($result3){
            echo "<script>alert('Su turno se ha tomado correctamente'); window.location.href=\"../vista/vista_perfil.php\";</script>";
            exit;
        } else{
            echo "<script>alert('No hay turnos disponibles para la fecha seleccionada'); window.location.href=\"../vista/vista_perfil.php\"</script>";
        }

    }

}