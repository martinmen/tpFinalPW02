<?php
require_once("../Conexion.php");
function getTurnosFecha($fecha){
    $conn= getConexion();
    $turnos = Array();

    if($fecha == null){
    
       // $turnos=getTurnos();
    }else {
        $sql= "SELECT t.id_turno_medico as nro, u.apellido as usuario , cm.descripcion as centro, t.fecha_turno as fecha, n.descripcion as nivel FROM turno t, usuario u, centro_medico cm, nivel_vuelo n WHERE t.cod_usuario = u.id_usuario AND t.cod_centro_medico = cm.id_centro_medico AND u.cod_nivel_vuelo = n.id_nivel_vuelo AND t.fecha_turno = '$fecha'";
        $result=mysqli_query($conn,$sql );
    }
    if(mysqli_num_rows($result)> 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $turno = Array();
            $turno['centro'] = $row["centro"];
            $turno['nro'] = $row["nro"];
            $turno['fecha'] = $row["fecha"];
            $turno['usuario'] = $row["usuario"];
            $turno['nivel'] = $row["nivel"];
            $turnos[] = $turno;

        }
    }
    mysqli_close($conn);
    return $turnos;

}
function getTurnos(){
    $conn= getConexion();
    $turnos = Array();
    $sql= "SELECT t.id_turno_medico as nro, u.apellido as usuario , cm.descripcion as centro, t.fecha_turno as fecha, n.descripcion as nivel FROM turno t, usuario u, centro_medico cm, nivel_vuelo n WHERE t.cod_usuario = u.id_usuario AND t.cod_centro_medico = cm.id_centro_medico AND u.cod_nivel_vuelo = n.id_nivel_vuelo ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)> 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $turno = Array();
            $turno['centro'] = $row["centro"];
            $turno['nro'] = $row["nro"];
            $turno['fecha'] = $row["fecha"];
            $turno['usuario'] = $row["usuario"];
            $turno['nivel'] = $row["nivel"];
            $turnos[] = $turno;

        }
    }
    mysqli_close($conn);
    return $turnos;

}
function getUsuario($apellido){
    $conn= getConexion();
    $datos = Array();
    $sql= "SELECT u.id_usuario, u.nombre, u.apellido, u.num_doc, u.cod_nivel_vuelo FROM usuario u WHERE u.apellido = '$apellido'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)> 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dato = Array();
            $dato['id_usuario'] = $row["id_usuario"];
            $dato['nombre'] = $row["nombre"];
            $dato['apellido'] = $row["apellido"];
            $dato['num_doc'] = $row["num_doc"];
            $dato['cod_nivel_vuelo'] = $row["cod_nivel_vuelo"];
            $datos[] = $dato;

        }
    }else {
        echo "No existe el usuario " ;
        echo $apellido;}
    mysqli_close($conn);
    return $datos;

}
function modificarNivelUsuario(){
    $conn= getConexion();
    $datos = Array();
    $sql= " UPDATE usuario SET cod_nivel_vuelo = $nivelNvo WHERE id_usuario = $id_usuario";
    $result=mysqli_query($conn,$sql);
}
///terminar modificacion en la tabla
?>