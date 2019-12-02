<?php
require_once ("../Conexion.php");

function registroUsuario($nombre, $apellido, $tipodocumento, $documento, $email, $pass){
    $conn = getConexion();
    $error = false;

    $sql = "SELECT * from usuario where email = '$email';";
    $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_array($result)){
        echo "<script>alert('El email ya está en uso'); window.location.href=\"../vista/vista_registrar.php\";</script>";
    } else{
        $sql2 = "INSERT INTO usuario (nombre, apellido, cod_tipo_doc, num_doc, email, contrasenia, cod_tipo_usuario, cod_estado_usuario, cod_nivel_vuelo)    
                        values   ('$nombre', '$apellido', '$tipodocumento', '$documento', '$email', '$pass',2, 2, 3)";
        $result2 = mysqli_query($conn, $sql2);

        if($result2) {
            echo "<script>alert('Se ha registrado correctamente, puede ingresar.'); window.location.href=\"../vista/vista_registrar.php\";</script>";
        }
    }

    return $error;
}

function getTipoDocumentos(){

    $conn = getConexion();
    $sql="SELECT id_tipo_documento, descripcion FROM tipo_documento";
    $result=mysqli_query($conn,$sql);
    $tipo_doc = "";

    if(mysqli_num_rows($result) > 0){
        while ($row=mysqli_fetch_assoc($result)){
            $tipo_doc .= "<option value='".$row['id_tipo_documento']."'>".$row['descripcion']."</option>";
        }
    }else {
        $tipo_doc="<option>NO HAY DATOS</option>";
    }

    return $tipo_doc;
}
