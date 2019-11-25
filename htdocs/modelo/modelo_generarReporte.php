<?php 
require_once("../Conexion.php");
$conn= getConexion();
// query de ejemplo para visualizar un grafico
$sql="SELECT modelo, COUNT(*) as cantidad FROM equipo GROUP BY modelo";

$cantidadVendida=mysqli_query($conn,$sql);
// querys a desarrollar
// function getCabinaVendidas(){
    
// }
// function getTasas(){
    
// }
// function getFacturacionMensual(){
    
// }
// function getFacturacionCliente(cliente){
    
// }
?>