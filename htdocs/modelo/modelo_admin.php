<?php
require_once("../Conexion.php");

function getVuelos(){
    $conn= getConexion();

    $sql="SELECT * FROM vuelo";
    $result=mysqli_query($conn,$sql);

    $vuelos = Array();

    if(mysqli_num_rows($result)> 0){
        while ($row=mysqli_fetch_assoc($result))
        {
            $vuelo = Array();
            $vuelo['id'] = $row["id_vuelo"];
            $vuelo['fecha'] = $row["fecha"];
            $vuelo['duracion'] = $row["duracion"];
            $vuelo['tipo_vuelo'] = $row["cod_tipo_vuelo"];
            $vuelo['equipo'] = $row["cod_equipo"];
            $vuelos[] = $vuelo;

        }
    }
    mysqli_close($conn);
    return $vuelos;

}