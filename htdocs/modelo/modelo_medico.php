<?php
require_once("../Conexion.php");

function getTurnosFecha($fecha){
    $conn= getConexion();
    $turnos = Array();
    if($fecha == null){
    $sql = "SELECT * from turno";
    $result = mysql_query($conn, $sql);
    }else {
        $sql = "SELECT * from turno where fecha_turno = '$fecha'";
        $result = mysqli_query($conn, $sql);
         $sql= "SELECT t.id_turno_medico as nro, u.apellido as usuario ,t.cod_usuario as cod_usuario ,cm.descripcion as centro, t.fecha_turno as fecha, n.descripcion as nivel FROM turno t, usuario u, centro_medico cm, nivel_vuelo n WHERE t.cod_usuario = u.id_usuario AND t.cod_centro_medico = cm.id_centro_medico AND u.cod_nivel_vuelo = n.id_nivel_vuelo AND t.fecha_turno = '$fecha'";
         $result=mysqli_query($conn,$sql );
    }

        
       
    
    if(mysqli_num_rows($result)> 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $turno = Array();
            $turno['centro'] = $row["centro"];
            $turno['nro'] = $row["nro"];
            $turno['fecha'] = $row["fecha"];
            $turno['usuario'] = $row["usuario"];
            $turno['cod_usuario'] = $row["cod_usuario"];
            $turno['nivel'] = $row["nivel"];
            $turnos[] = $turno;

        }
        // while ($row = mysqli_fetch_assoc($result)) {
        //     $turno = Array();
        //     $turno['nro'] = $row["id_turno_medico"];
        //     $turno['centro'] = $row["cod_centro_medico"];
        //     $turno['fecha'] = $row["fecha_turno"];
        //     $turno['usuario'] = $row["cod_usuario"];
        //     $turno['nivel'] = $row["cod_nivel_vuelo"];
        //     $turnos[] = $turno;

        // }
    }
    mysqli_close($conn);
    return $turnos;

}
function getTurnos(){
    $conn= getConexion();
    $turnos = Array();
    $sql= "SELECT t.id_turno_medico as nro, u.apellido as usuario , t.cod_usuario as cod_usuario, cm.descripcion as centro, t.fecha_turno as fecha, n.descripcion as nivel FROM turno t, usuario u, centro_medico cm, nivel_vuelo n WHERE t.cod_usuario = u.id_usuario AND t.cod_centro_medico = cm.id_centro_medico AND u.cod_nivel_vuelo = n.id_nivel_vuelo ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)> 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $turno = Array();
            $turno['centro'] = $row["centro"];
            $turno['nro'] = $row["nro"];
            $turno['fecha'] = $row["fecha"];
            $turno['usuario'] = $row["usuario"];
            $turno['cod_usuario'] = $row["cod_usuario"];
            $turno['nivel'] = $row["nivel"];
            $turnos[] = $turno;

        } 
        

    }
    mysqli_close($conn);
    return $turnos;

}
function getUsuario($cod_usuario){
    $conn= getConexion();
    $datos = Array();
    $sql= "SELECT u.id_usuario, u.nombre, u.apellido, u.num_doc, u.cod_nivel_vuelo FROM usuario u WHERE u.id_usuario = 3";
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
        echo $cod_usuario;}
    mysqli_close($conn);
    return $datos;

}
function modificarNivelUsuario( $nivelNvo, $codnvo){
    $conn= getConexion();
    $datos = Array();
    $sql= "UPDATE usuario set cod_nivel_vuelo= '$nivelNvo' where id_usuario = '$codnvo'";
    $result=mysqli_query($conn,$sql);
    return "Se ha modificado correctamente" ;
} 
function getNiveles(){
    $conn= getConexion();
    $niveles = Array();
    $sql = "SELECT * from nivel_vuelo";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)> 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            $nivel = Array();
            $nivel['nro'] = $row["id_nivel_vuelo"];
            $nivel['descripcion'] = $row["descripcion"];
          
            $niveles[] = $nivel;

        }
    }
    mysqli_close($conn);
    return $niveles;

}
///teminar modificacion en la tabla
?>