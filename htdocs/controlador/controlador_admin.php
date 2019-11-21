<?php

include("../modelo/modelo_admin.php");
include("../modelo/modelo_cliente.php");
include("../modelo/modelo_generarReporte.php");
$vuelos = getVuelos();
//        DE PRUEBA
$meses = $cantidadVendida;
//          FALTAN QUERYS
// $meses = getFacturacionMensual();
// $facClientes = getFacturacionCliente(cliente);
// $cabinas = getCabinaVendidas();
// $tasas = getTasas();

