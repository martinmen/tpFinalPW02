<?php
require_once ("../Conexion.php");



    function getImporteTotalDeReserva($codReserva)
    {
        $conn = getConexion();
        $sql = "select sum(importe) as importeTotal from reserva where cod_codigo_reserva = '$codReserva';";
        $result = mysqli_query($conn, $sql);

        $cliente1 = [];
        if ($row = mysqli_fetch_array($result)) {
            $cliente1 [0] = true;
            $cliente1 [1] = $row["importeTotal"];
        }
        return $cliente1;
    }

function validarDatosTarjetaPago($titularTarjeta,$numeroTarjeta,$expiracionMesTarjeta,
                                 $expiracionAnioTarjeta,$codigoTarjeta){
        return true;

}

function actualizarEstadoReservasAPagada($codReserva,$usuario)
        {
          $importe = getImporteTotalDeReserva($codReserva);
          $importe = number_format($importe[1],2,".","");
            $conn = getConexion();
            $sql = "UPDATE reserva SET cod_estado_reserva = 2 where cod_codigo_reserva = '$codReserva';";
            $result = mysqli_query($conn, $sql);
            $sql2 ="insert into factura (cod_usuario,cod_reserva,cod_metodo_pago,importe_total,fecha_alta_factura)
                    value($usuario,'$codReserva',1,$importe, now());";
            $result2 = mysqli_query($conn, $sql2);
            if($result==true && $result2 == true)
            {irAComprobante($usuario,$codReserva);
                return true;
            }else{false;}
        }


function irAComprobante($usuario,$reserva)
{
    echo "<script>; window.location.href='../vista/vista_comprobante.php?reserva=$reserva'; </script>";
}