<?php
//include("controlador/controlador_session.php");
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Guacho Rocket - Login</title>
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon-96x96.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css" <!-- End layout styles -->

</head>
<body>
<div class="container-scroller">
    <div class="container-fluid">
        <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6" style="background-color: white!important;">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Bienvenido a <b>GuachoRocket!</b></h3>

                        </div>
                        <form class="col-md-12" action='index.php' method="POST">
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Ingrese Email" name="emailUsuario" required autofocus>
                                <label for="inputEmail">Email</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" name="passUsuario" placeholder="Ingrese contraseña" required>
                                <label for="inputPassword">Contraseña</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Recordar contraseña</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" name="submit" type="submit" value="Iniciar Sesión">Ingresar</button>
                            <a class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" href="vista/vista_registrar.php" value="Registrarme">Registrar</a>
                        </form>
                    </div>
                    <br>
                    <div class="separador"></div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <a class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold btnInvitado" href="vista/vista_cliente.php">Ingresar como invitado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



