<?php
require_once ("../Conexion.php");

function getTipoDocumentos(){

    $conn = getConexion();
    $sql="SELECT id_tipo_documento, descripcion FROM tipo_documento";
    $result=mysqli_query($conn,$sql);
    $tipo_doc = "";

    if(mysqli_num_rows($result) > 0){
        while ($row=mysqli_fetch_assoc($result)){
            $tipo_doc .= "<option value='".$row['id_tipo_documento']."'>".$row['descripcion']."</option>";
        }
    }else {
        $tipo_doc="<option>NO HAY DATOS</option>";
    }

    return $tipo_doc;
}

function getTipoDeCabinas($vueloId){
    $conn = getConexion();
    $sql="select concat('Familiar: ',e.capacidad_cabinaF) as descripcion from vuelo as v join equipo as e on v.cod_equipo = e.id_equipo where v.id_vuelo = $vueloId
            UNION ALL 
            select concat('General: ', e.capacidad_cabinaG) from vuelo as v join equipo as e on v.cod_equipo = e.id_equipo where v.id_vuelo = $vueloId
            UNION ALL 
            select concat('Suite: ', e.capacidad_cabinaS) from vuelo as v join equipo as e on v.cod_equipo = e.id_equipo where v.id_vuelo = $vueloId;";
    $result=mysqli_query($conn,$sql);
    $tipo_doc = "";

    if(mysqli_num_rows($result) > 0){
        while ($row=mysqli_fetch_assoc($result)){
            $tipo_doc .= "<option value=''>".$row['descripcion']."</option>";
        }
    }else {
        $tipo_doc="<option>NO HAY DATOS</option>";
    }

    return $tipo_doc;
}

//function crearReserva($nombre, $apellido, $email, $pass, $vuelo){
//
//
//    $conn = getConexion();
//    $usuarioOk = false;
//    //Consultar si los usuarios a registrar en la reserva existen, o no. Si no existen, crearlos en la tabla usuarios, Para luego extraer
//    //el ID para hacer la reserva
////$consultaIdUsuarios = "Select ID from Usuario U where  ''"
//$id_usuario = "";
//$id_vuelo= "";
//$fecha_vuelo="";
///// Generar codigo de reserva
//    $longitud = 6;
//    function generarCodigo($longitud) {
//        $key = '';
//        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
//        $max = strlen($pattern)-1;
//        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
//        return $key;
//        //echo generarCodigo(6); // genera un código de 6 caracteres de longitud.
//    }
//    $codigo_reserva = generarCodigo($longitud);
//    //Estado por defecto al crearla P = Pendiente de pago
//    $estado = "P";
//
//    $sql = "INSERT INTO reserva (id_usuario, id_vuelo, cod_reserva, estado, fecha_reserva )
//                        values   ('$id_usuario', '$id_vuelo', '$codigo_reserva', '$estado', current_timestamp )";



//    $result = mysqli_query($conn, $sql);
//
//    if(!($result)){
//        $usuarioOk = false;
//    } else{
//        $usuarioOk = true;
//    }
//
//    return $usuarioOk;
//}
