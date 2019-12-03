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
    $sql = "SELECT c.id_cabina, a.id_asiento, E.ID_EQUIPO, C.DESCRIPCION as descripcion, A.CANT_ASIENTOS
	FROM ASIENTO AS A 
		JOIN EQUIPO AS E ON E.ID_EQUIPO = A.COD_EQUIPO
        JOIN CABINA AS C ON C.ID_CABINA = A.COD_CABINA
        JOIN VUELO AS V ON V.COD_EQUIPO = E.ID_EQUIPO
       WHERE V.ID_VUELO = $vueloId;";
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
    $sql1 = "INSERT INTO usuario (nombre, apellido,cod_tipo_doc,num_doc,email,cod_tipo_usuario, cod_nivel_vuelo,cod_estado_usuario)
                    values   ('$cliente[nombre]','$cliente[apellido]',2,'$cliente[nroDoc]','$cliente[email]',2,3,1);";
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

