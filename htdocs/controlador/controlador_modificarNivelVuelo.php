<?php
include("../modelo/modelo_medico.php");
$apellido = $_GET['usuario'];
if($apellido==null){
    echo "no existe usuario";
}else{
   $datos = getUsuario($apellido);}

include("../vista/modificar_nivel_vuelo.php");
?>