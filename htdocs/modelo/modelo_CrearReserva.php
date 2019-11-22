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
    $sql="SELECT c.id_cabina, a.id_asiento, E.ID_EQUIPO, C.DESCRIPCION as descripcion, A.CANT_ASIENTOS
	FROM ASIENTO AS A 
		JOIN EQUIPO AS E ON E.ID_EQUIPO = A.COD_EQUIPO
        JOIN CABINA AS C ON C.ID_CABINA = A.COD_CABINA
        JOIN VUELO AS V ON V.COD_EQUIPO = E.ID_EQUIPO
       WHERE V.ID_VUELO = $vueloId;";
    $result=mysqli_query($conn,$sql);
    $tipo_cabina = "";

    if(mysqli_num_rows($result) > 0){
        while ($row=mysqli_fetch_assoc($result)){
            $tipo_cabina .= "<option value='".$row['id_asiento']."' id='".$row['id_cabina']."'>".$row['descripcion']." / ".$row['CANT_ASIENTOS']." libres </option>";
        }
    }else {
        $tipo_cabina="<option>NO HAY DATOS</option>";
    }

    return $tipo_cabina;
}

function getCosto($vueloId){

    $conn = getConexion();
    $sql="select costo 
	from vuelo  
    where id_vuelo = $vueloId;";
    $result=mysqli_query($conn,$sql);
    $costo = "";

    if($row = mysqli_fetch_array($result))
    {
        $costo = $row['costo'];

    } else{
        $costo = "Sin costo";
    }

    return $costo;


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
