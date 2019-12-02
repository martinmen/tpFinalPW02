<?php
require_once("../Conexion.php");


function cantidadVendida(){
    $conn= getConexion();
// query de ejemplo para visualizar un grafico
    $sql="SELECT modelo, COUNT(*) as cantidad FROM equipo GROUP BY modelo";

    $cantidadVendida=mysqli_query($conn,$sql);

   return $cantidadVendida;

}

function cantidadCabina(){

    $conn= getConexion();
    $sql="SELECT c.descripcion as cabina, COUNT(*) as cantidad
        FROM cabina as c
            join reserva as r on r.cod_cabina = c.id_cabina
        WHERE r.cod_estado_reserva = 2
        GROUP BY c.id_cabina;";

    $result = mysqli_query($conn, $sql);
    $cabinas = Array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cabina = Array();
            $cabina['id_cabina'] = $row['cabina'];
            $cabina['descripcion'] = $row ['cantidad'];
            $cabinas[] = $cabina;
        }
    }else {
        echo "No se encontraron datos";
    }

    return $cabinas;
}

function facturacionMensual(){
    $conn = getConexion(); //SET lc_time_names = 'es_ES';
    $sql = "SELECT monthname(fecha_alta_reserva) as mes, SUM( importe) as suma
                FROM reserva
                GROUP BY mes;";

    $result = mysqli_query($conn, $sql);
    $facturacionesMes = Array();

    if(mysqli_num_rows($result)> 0){
        while($row = mysqli_fetch_assoc($result)){
            $facturacionMes = Array();
            $facturacionMes['mes'] = $row['mes'];
            $facturacionMes['suma'] = $row['suma'];
            $facturacionesMes[] = $facturacionMes;
        }
    }else {
        echo "No se encontraron datos";
    }

    return $facturacionesMes;
}

function facturacionCliente(){
    $conn = getConexion(); //SET lc_time_names = 'es_ES';
    $sql = "SELECT concat(u.apellido, ', ', u.nombre) as cliente, SUM(r.importe) as facturacion 
                FROM usuario as u
                    join reserva as r on r.cod_usuario = u.id_usuario
                WHERE u.cod_tipo_usuario = 2
                GROUP BY u.id_usuario;";

    $result = mysqli_query($conn, $sql);
    $facturacionesCliente = Array();

    if(mysqli_num_rows($result)> 0){
        while($row = mysqli_fetch_assoc($result)){
            $facturacionCliente = Array();
            $facturacionCliente['cliente'] = $row['cliente'];
            $facturacionCliente['facturacion'] = $row['facturacion'];
            $facturacionesCliente[] = $facturacionCliente;
        }
    }else {
        echo "No se encontraron datos";
    }

    return $facturacionesCliente;
}

function tasas(){
    $conn = getConexion();
    $sql = "SELECT r.cod_vuelo as vuelo, concat(e.modelo, ' ',e.matricula) as equipo, COUNT(r.cod_vuelo) as asientosUsados
                FROM reserva as r 
                    join vuelo as v on v.id_vuelo = r.cod_vuelo
                    join equipo as e on e.id_equipo = v.cod_equipo
                GROUP BY e.id_equipo;";

    $result = mysqli_query($conn, $sql);
    $tasas = Array();

    if(mysqli_num_rows($result)> 0){
        while($row = mysqli_fetch_assoc($result)){
            $tasa = Array();
            $tasa['vuelo'] = $row['vuelo'];
            $tasa['equipo'] = $row['equipo'];
            $tasa['asientosUsados'] = $row['asientosUsados'];
            $tasas[] = $tasa;
        }
    }else {
        echo "No se encontraron datos";
    }

    return $tasas;
}



function getCincoCabinasMasVendida(){
    $conn= getConexion();
    $sql="SELECT * FROM cabina ORDER BY cant_vendida asc limit 3";
    $consultaCabinaMasVendida=mysqli_query($conn,$sql); 
   return $consultaCabinaMasVendida;
}
