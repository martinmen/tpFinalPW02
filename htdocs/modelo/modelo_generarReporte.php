<?php 
require_once("../Conexion.php");
$conn= getConexion();
$sql="SELECT descripcion, cant_vendida FROM cabina";
$cantidadVendida=mysqli_query($conn,$sql);
?>