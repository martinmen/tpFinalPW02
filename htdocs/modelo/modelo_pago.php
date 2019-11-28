<?php
require_once ("../Conexion.php");



    function getImporteTotalDeReserva($codReserva)
    {
        $conn = getConexion();
        $sql = "select sum(importe) from reserva where cod_codigo_reserva = '$codReserva';";
        $result = mysqli_query($conn, $sql);

        $cliente1 = [];
        if ($row = mysqli_fetch_array($result)) {
            $cliente1 [0] = true;
            $cliente1 [1] = $row["nombre"];
        }
    }
        function actualizarEstadoReservasAPagada($codReserva)
        {
            $conn = getConexion();
            $sql = "UPDATE reserva SET cod_estado_reserva = 2 where = '$codReserva';";
            $result = mysqli_query($conn, $sql);

            $cliente1 = [];
            if ($row = mysqli_fetch_array($result)) {

            }

        }
