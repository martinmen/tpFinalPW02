<?php
require_once("../Conexion.php");

function getTipoDocumentos()
{
    $conn = getConexion();
    $sql = "SELECT id_tipo_documento, descripcion FROM tipo_documento";
    $result = mysqli_query($conn, $sql);
    $tipo_doc = "";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tipo_doc .= "<option value='" . $row['id_tipo_documento'] . "'>" . $row['descripcion'] . "</option>";
        }
    } else {
        $tipo_doc = "<option>NO HAY DATOS</option>";
    }

    return $tipo_doc;
}

function getTipoDeCabinas($vueloId)
{
    $conn = getConexion();
    $sql = "select asi.id_asiento, v.id_vuelo as vuelo, v.cod_equipo equipo, asi.cod_cabina as id_cabina, c.descripcion, ((select e.capacidad_cabinaG as capacidad_equipo from vuelo v join equipo e on v.cod_equipo = e.id_equipo and id_vuelo = '$vueloId') - 
																  (select count(*) as reservas_g from reserva r where r.cod_cabina = 1 and cod_vuelo= '$vueloId')) as CANT_ASIENTOS
																		from vuelo v join equipo equi join asiento asi join cabina c
																			where id_vuelo = '$vueloId'
																			   and asi.cod_cabina = 1
																			   and equi.id_equipo = v.cod_equipo
																			   and equi.id_equipo = asi.cod_equipo
                                                                               and c.id_cabina = 1
union
-- disponibilidad asientos Familiar
select asi.id_asiento, v.id_vuelo as vuelo, v.cod_equipo equipo, asi.cod_cabina as id_cabina, c.descripcion,((select e.capacidad_cabinaF as capacidad_equipo from vuelo v join equipo e on v.cod_equipo = e.id_equipo and id_vuelo ='$vueloId')-
																 (select count(*) as reservas_f from reserva r where r.cod_cabina = 2 and cod_vuelo= '$vueloId')) as CANT_ASIENTOS
																		from vuelo v join equipo equi join asiento asi join cabina c                    
																			where id_vuelo = '$vueloId'
																				and asi.cod_cabina = 2
																			   and equi.id_equipo = v.cod_equipo
																			   and equi.id_equipo = asi.cod_equipo
                                                                               and c.id_cabina = 2
union
-- disponibilidad asientos Suit
select asi.id_asiento, v.id_vuelo as vuelo, v.cod_equipo equipo, asi.cod_cabina as id_cabina, c.descripcion,((select e.capacidad_cabinaS as capacidad_equipo from vuelo v join equipo e on v.cod_equipo = e.id_equipo and id_vuelo = '$vueloId')-
                                                                  (select count(*) as reservas_s from reserva r where r.cod_cabina = 3 and cod_vuelo= '$vueloId'))as CANT_ASIENTOS
																		from vuelo v join equipo equi join asiento asi join cabina c    
																			where id_vuelo = '$vueloId'
																				and asi.cod_cabina = 3
																			   and equi.id_equipo = v.cod_equipo
																			   and equi.id_equipo = asi.cod_equipo 
                                                                               and c.id_cabina = 3; ";
    $result = mysqli_query($conn, $sql);
    $tipo_cabina = "";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tipo_cabina .= "<option value='" . $row['id_asiento'] . "' id='" . $row['id_cabina'] . "'>" . $row['descripcion'] . " / " . $row['CANT_ASIENTOS'] . " libres </option>";
        }
    } else {
        $tipo_cabina = "<option>NO HAY DATOS</option>";
    }

    return $tipo_cabina;
}

function getCosto($vueloId)
{
    $conn = getConexion();
    $sql = "select costo 
	from vuelo  
    where id_vuelo = $vueloId;";
    $result = mysqli_query($conn, $sql);
    $costo = "";
    if ($row = mysqli_fetch_array($result)) {
        $costo = $row['costo'];

    } else {
        $costo = "Sin costo";
    }
    return $costo;
}

function getDatosUsuario($email)
{
    $conn = getConexion();
    $sql = "select * from usuario where email = '$email';";
    $result = mysqli_query($conn, $sql);
    $cliente1 = [];
    if ($row = mysqli_fetch_array($result)) {
        $cliente1 [0] = true;
        $cliente1 ["id"] = $row["id_usuario"];
        $cliente1 ["nombre"] = $row["nombre"];
        $cliente1 ["apellido"] = $row["apellido"];
        $cliente1 ["tipoDoc"] = $row['cod_tipo_doc'];
        $cliente1 ["nroDoc"] = $row['num_doc'];
        $cliente1 ["email"] = $row["email"];
    } else {
        $cliente1[0] = false;
    }
    return $cliente1;

}

function usuarioNuevoEnReserva($cliente = array())
{
    $conn = getConexion();
    $sql1 = "INSERT INTO usuario (nombre, apellido,cod_tipo_doc,num_doc,email, contrasenia, cod_tipo_usuario, cod_nivel_vuelo,cod_estado_usuario)
                    values   ('$cliente[nombre]','$cliente[apellido]',2,'$cliente[nroDoc]','$cliente[email]','$cliente[passRandom]',2,3,1);";
    $result1 = mysqli_query($conn, $sql1);
    // envio de email de confirmacion de usuario
    if ($result1) {
       // echo "<script>alert('Usuario creado correctamente'); window.location.href=\"../vista/vista_pago.php\";</script>";
        return true;
    } else {
       // echo "<script>alert('Error');window.location.href=\"../vista/vista_crearReserva.php\";</script>";
        return false;
    }

}

function getIdUsuario($email)
{
    $conn = getConexion();
    $sql = "select id_usuario from usuario where email = '$email';";
    $result = mysqli_query($conn, $sql);

    $cliente1 = [];
    if ($row = mysqli_fetch_array($result)) {
        $cliente1 ["id"] = $row["id_usuario"];
    }
    return $cliente1;

}

function getTipoCabina($codigoCabina)
{
    $conn = getConexion();
    $sql = "select cod_cabina from asiento a where id_asiento = '$codigoCabina';";
    $result = mysqli_query($conn, $sql);

    $idTipoCabina = [];
    if ($row = mysqli_fetch_array($result)) {
        $idTipoCabina ["id"] = $row["cod_cabina"];
    }
    return $idTipoCabina;
}

//function crearReserva($cliente =array(), $codigoReserva ,$importe,$idAsiento,$codVuelo){
function crearReserva($cliente, $codigoReserva, $importe, $idAsiento, $codVuelo)
{
    //  $idCliente =getIdUsuario($cliente['email']);
    $idCliente = getIdUsuario($cliente);
    $idTipoCabina = getTipoCabina($idAsiento);
    $conn = getConexion();
    $sql1 = "INSERT INTO reserva (cod_usuario,cod_cabina,cod_vuelo,importe,cod_estado_reserva,cod_codigo_reserva,fecha_alta_reserva,fecha_baja_reserva,fecha_modificacion_reserva)
             values   ($idCliente[id],$idTipoCabina[id],$codVuelo,$importe,1,'$codigoReserva',now(),null,null);";
    $result1 = mysqli_query($conn, $sql1);
    // envio de email de confirmacion de usuario
    if ($result1) {
        // echo "<script>alert('Reservas realizadas correctamente. Ir a pago');</script>";
        return true;
    } else {
        echo "<script> alert('Error al intentar reservar');</script>";
        return false;
    }
}

function rediregirAPago($codigoAlfaReserva)
{
    echo "<script>; 
window.location.href='../vista/vista_pago.php?reserva=$codigoAlfaReserva';
                 
                    </script>";
}

function ErrorRedirigirAReserva($idVuelo,$matricula)
{
    echo "<script>; 
window.location.href='../vista/vista_pago.php?vuelo=$idVuelo&matricula=$matricula';
                 
                    </script>";
}

