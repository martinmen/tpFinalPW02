<?php
require_once("../Conexion.php");

function getTiposDeVuelos()
{
    $con = getConexion();
    $sql = "SELECT descripcion, id_tipo_vuelo FROM tipo_vuelo";
    $result = mysqli_query($con, $sql);

    $tipo_vuelo = "";

    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $tipo_vuelo .= "<option value='".$row['id_tipo_vuelo']."'>".$row['descripcion']."</option>";
        }
    } else {
        $tipo_vuelo="<option>NO HAY DATOS</option>";
    }

    return $tipo_vuelo;
}

function getFechaDeVuelos(){

    $con = getConexion();
    $sql = "SELECT id_vuelo, fecha FROM vuelo";
    $result = mysqli_query($con, $sql);

    $fecha_vuelo = "";

    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $fecha_vuelo .= "<option value='".$row['id_vuelo']."'>".$row['fecha']."</option>";
        }
    } else {
        $fecha_vuelo="<option>NO HAY DATOS</option>";
    }

    return $fecha_vuelo;
}

function getDuraciones(){

    $con= getConexion();
    $sql="SELECT DISTINCT duracion, id_vuelo FROM vuelo";
    $result=mysqli_query($con,$sql);
    $duracion = "";

    if(mysqli_num_rows($result) > 0){
        while ($row=mysqli_fetch_assoc($result)){
            $duracion .= "<option value='".$row['id_vuelo']."'>".$row['duracion']."</option>";
        }
    }else {
        $duracion="<option>NO HAY DATOS</option>";
    }

    return $duracion;

}

function getEstaciones()
{

    $con = getConexion();
    $sql = "SELECT DISTINCT nombre, id_estacion FROM estacion ORDER BY nombre asc";
    $result = mysqli_query($con, $sql);
    $estacion = "";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $estacion .= "<option value='" . $row['id_estacion'] . "'>" . $row['nombre'] . "</option>";
        }
    }else {
        $duracion="<option>NO HAY DATOS</option>";
    }

    return $estacion;


}

function getVuelosConFiltro($tipoVuelo, $fdesde, $fhasta, $origen, $destino){

    $conn = getConexion();


    if($tipoVuelo){ //suborbitales
        $sql = "SELECT v.id_vuelo, v.fecha, v.duracion, tv.descripcion as tipo_vuelo, eo.nombre origen,  ed.nombre destino, eq.modelo, eq.matricula, eq.cod_tipo_equipo as tipo_aceleracion
                    FROM trayecto t JOIN estacion eo on t.cod_estacion_origen = eo.id_estacion
                                JOIN estacion ed on t.cod_estacion_destino = ed.id_estacion 
                                JOIN vuelo as v on v.cod_trayecto = t.id_trayecto
                                JOIN tipo_vuelo as tv on tv.id_tipo_vuelo = v.cod_tipo_vuelo
                                JOIN equipo as eq on eq.id_equipo = v.cod_equipo
                    WHERE v.cod_tipo_vuelo = '$tipoVuelo' ";
        if($tipoVuelo != 4 && $fdesde != null && $fhasta != null){
            $sql .= "AND v.fecha BETWEEN '" .$fdesde . "' AND '". $fhasta ."'";
        }
        if($tipoVuelo != 4 && $origen != null && $destino != null){
            $sql .= " AND eo.id_estacion = " .$origen. " AND ed.id_estacion = ".$destino;
        }

        $result=mysqli_query($conn,$sql);
        $vuelos = Array();

        if(mysqli_num_rows($result)> 0)
        {
            while ($row=mysqli_fetch_assoc($result))
            {
                $vuelo = Array();
                $vuelo['matricula'] = $row["matricula"];
                $vuelo['fecha'] = $row["fecha"];
                $vuelo['duracion'] = $row["duracion"];
                $vuelo['tipo_vuelo'] = $row["tipo_vuelo"];
                $vuelo['origen'] = $row["origen"];
                $vuelo['destino'] = $row["destino"];
                $vuelo['modelo'] = $row["modelo"];
                $vuelo['tipo_aceleracion'] = $row["tipo_aceleracion"];
                $vuelo['id'] = $row["id_vuelo"];
                $vuelos[] = $vuelo;
            }
        } else {
            echo "<script>alert('No se encontraron coincidencias.');window.location.href=\"../vista/vista_cliente.php\"</script>";
        }

    } else{
        echo "No se encontro coincidencias";
    }

    mysqli_close($conn);
    return $vuelos;
}

function getVuelos(){

    $conn = getConexion();
    $sql="SELECT v.id_vuelo, v.fecha, v.duracion, t.descripcion as tipo_vuelo, estO.nombre origen,  estD.nombre destino, q.modelo, q.matricula, q.cod_tipo_equipo as tipo_aceleracion
             FROM vuelo v 
                JOIN tipo_vuelo t on t.id_tipo_vuelo = v.cod_tipo_vuelo
                JOIN equipo q on q.id_equipo = v.cod_equipo
                JOIN trayecto tra on tra.id_trayecto = v.cod_trayecto
                JOIN estacion estO on estO.id_estacion = tra.cod_estacion_origen
                JOIN estacion estD on estD.id_estacion = tra.cod_estacion_destino;";
    $result=mysqli_query($conn,$sql);
    $vuelos = Array();

    if(mysqli_num_rows($result)> 0)
    {
        while ($row=mysqli_fetch_assoc($result))
        {
            $vuelo = Array();
            $vuelo['matricula'] = $row["matricula"];
            $vuelo['fecha'] = $row["fecha"];
            $vuelo['duracion'] = $row["duracion"];
            $vuelo['tipo_vuelo'] = $row["tipo_vuelo"];
            $vuelo['origen'] = $row["origen"];
            $vuelo['destino'] = $row["destino"];
            $vuelo['modelo'] = $row["modelo"];
            $vuelo['tipo_aceleracion'] = $row["tipo_aceleracion"];
            $vuelo['id'] = $row["id_vuelo"];
            $vuelos[] = $vuelo;
        }
    }
    else{
        echo "No se encontro coincidencias";
    }

    mysqli_close($conn);
    return $vuelos;

}

