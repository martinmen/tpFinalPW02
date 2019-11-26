<?php

include ("../modelo/modelo_pago.php");


if(isset($_POST["submit"])){
$contador = $_POST['counter'];
}

if( $contador == "")
    {
    if($_POST['email'])
    { $email0 = $_POST['email'];
        $cliente0 =  getDatosUsuario($email0);
      if($cliente0 [0]== false){
          if($_POST['nombre'] && $_POST['apellido']){
              $nombre0 = $_POST['nombre'];
              $apellido0 = $_POST['apellido'];
              $tipo_doc0 = $_POST['tipo_doc'];
              $nro_doc0 = $_POST['nro_doc'];
              //hacer un insert de usuario

              // insert en reserva una vez validado el pago
          }

      } else
              {
                  echo" inserto en reserva este cliente";
              }




     }

    }else if($contador == 1)
             if($_POST['nombre1'] && $_POST['apellido1'] && $_POST['email1']) {

                 $nombre1 = $_POST['nombre1'];
                 $apellido1 = $_POST['apellido1'];
                 $email1 = $_POST['email1'];
             }else if($contador == 2){

                 $nombre2 = $_POST['nombre2'];
                 $apellid2 = $_POST['apellido2'];
                 $email2 = $_POST['email2'];
             }







