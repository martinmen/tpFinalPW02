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
    $sql= "SELECT cm.descripcion as Centro_Medico, t.id_turno_medico as Turno, t.fecha_turno as Fecha, concat_ws(', ', u.apellido, u.nombre) as usuario, nv.descripcion as Nivel_vuelo, t.cod_usuario
		FROM turno as t 
		join centro_medico as cm on cm.id_centro_medico = t.cod_centro_medico
        join usuario as u on u.id_usuario = t.cod_usuario
        join nivel_vuelo as nv on nv.id_nivel_vuelo = u.cod_nivel_vuelo
        WHERE t.fecha_baja_turno is null;";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)> 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $turno = Array();
            $turno['Centro_Medico'] = $row["Centro_Medico"];
            $turno['Turno'] = $row["Turno"];
            $turno['Fecha'] = $row["Fecha"];
            $turno['usuario'] = $row["usuario"];
            $turno['Nivel_vuelo'] = $row["Nivel_vuelo"];
            $turno['cod_usuario'] = $row["cod_usuario"];
            $turnos[] = $turno;

        }

    }
    mysqli_close($conn);
    return $turnos;

}
function getUsuario($cod_usuario){
    $conn= getConexion();

    $sql= "SELECT u.id_usuario, u.nombre, u.apellido, u.num_doc, u.cod_nivel_vuelo 
		FROM usuario u
        where u.id_usuario = '$cod_usuario';";
    $result=mysqli_query($conn,$sql);

    $datos=[];

   if ($row = mysqli_fetch_array($result)) {

        $datos[0] = true;
        $datos[1] = $row["id_usuario"];
        $datos[2] = $row["nombre"];
        $datos[3] = $row["apellido"];
        $datos[4] = $row["num_doc"];
        $datos[5] = $row["cod_nivel_vuelo"];

    }

    mysqli_close($conn);
    return $datos;

}
function modificarNivelUsuario( $nivelNvo, $id_usuario){
    $conn= getConexion();

    $sql= "UPDATE usuario set cod_nivel_vuelo= '$nivelNvo' where id_usuario = '$id_usuario'";
    $result=mysqli_query($conn,$sql);
    if($result) {

        $sql1 = "UPDATE turno set fecha_modificacion_turno = now(), 
				fecha_baja_turno = now()
			WHERE cod_usuario = '$id_usuario';";
        $result1 = mysqli_query($conn, $sql1);
        if($result1){
            echo "<script>alert('Se ha cambiado el Nivel de Vuelo correctamente.'); window.location.href=\"../vista/vista_medico.php\";</script>";
        } else{
            echo "<script>alert('No se ha podido cambiar el Nivel de Vuelo.'); window.location.href=\"../vista/vista_medico.php\";</script>";
        }
    }

}





function getNiveles(){
    $conn= getConexion();
    $sql = "SELECT * from nivel_vuelo where id_nivel_vuelo = 1 || id_nivel_vuelo = 2";
    $result=mysqli_query($conn,$sql);
    $nivel = "";
    if(mysqli_num_rows($result)> 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            $nivel .= "<option value='".$row['id_nivel_vuelo']."'>". $row['descripcion'] . "</option>";


        }
    }
    mysqli_close($conn);
    return $nivel;


}
///teminar modificacion en la tabla
?>