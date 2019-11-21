<?php
require_once("../Conexion.php");

function getVuelosFiltrados($tipo_vuelo, $fdesde, $fhasta, $duracion, $esdesde, $eshasta){

    $conn = getConexion();
    $vuelos = Array();

    $sql = "SELECT v.fecha, v.duracion, t.descripcion, q.modelo, e.descripcion, v.id_vuelo FROM vuelo v, estado e,tipo_vuelo t,equipo q";

    if($tipo_vuelo != null || $fdesde != null || $fhasta != null || $duracion != null || $esdesde != null || $eshasta != null){
        $sql .= "WHERE t.id_tipo_vuelo";
    }

    if($tipo_vuelo != null){
        $sql .= " t.descripcion = ".$tipo_vuelo;
    }



}


function getVuelosConFecha($fdesde, $fhasta){
    $conn= getConexion();
    $vuelos = Array();

    if($fdesde == null && $fhasta == null){
        $sql="SELECT v.fecha, v.duracion, t.descripcion as tipo_vuelo, q.modelo, e.descripcion, v.id_vuelo FROM vuelo v, estado e,tipo_vuelo t,equipo q";
        $result=mysqli_query($conn,$sql);
    }else {
        $sql = "SELECT v.fecha, v.duracion, t.descripcion as tipo_vuelo, q.modelo, e.descripcion, v.id_vuelo FROM vuelo v, estado e,tipo_vuelo t,equipo q WHERE v.cod_estado = e.id_estado AND v.cod_tipo_vuelo=t.id_tipo_vuelo AND v.cod_equipo = q.id_equipo AND v.fecha between '$fdesde' and '$fhasta'";
        $result=mysqli_query($conn,$sql);
    }

    if(mysqli_num_rows($result)> 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $vuelo = Array();
            $vuelo['fecha'] = $row["fecha"];
            $vuelo['duracion'] = $row["duracion"];
            $vuelo['tipo_vuelo'] = $row["tipo_vuelo"];
            $vuelo['modelo'] = $row["modelo"];
            $vuelo['descripcion'] = $row["descripcion"];
            $vuelo['id'] = $row["id_vuelo"];
            $vuelos[] = $vuelo;

        }
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