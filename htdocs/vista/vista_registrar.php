<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css" <!-- End layout styles -->

</head>
<body class="body-registro">
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-12 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-img-left d-none d-md-flex">
                    <!-- Background image for card set in CSS! -->
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Registro</h5>
                    <form action='../controlador/controlador_registrar.php' method="post">
                        <div class="form-signin">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputName" name="nombre" class="form-control" placeholder="Ingrese nombre" required autofocus>
                                        <label for="inputUserame">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputApellido" name="apellido" class="form-control" placeholder="Ingrese apellido" required autofocus>
                                        <label for="inputApellido">Apellido</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="inputDoc" name="documento" class="form-control" placeholder="Ingrese su documento" required autofocus maxlength="8">
                                <label for="inputDoc">Documento</label>
                            </div>
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Ingrese Email" required>
                                <label for="inputEmail">Email</label>
                            </div>
                            <hr>
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="contraseña" class="form-control" placeholder="Ingrese contraseña" required>
                                <label for="inputPassword">Contraseña</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="inputConfirmPassword" name="contraseñaConfirmar" class="form-control" placeholder="Confirme contraseña" required>
                                <label for="inputConfirmPassword">Confirme contraseña</label>
                            </div>
                            <?php
                            if(isset($error)){
                                echo $error;
                            }

                            ?>
                            <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="Registrarse">
                            <a class="d-block text-center mt-2 small" href="../login.php">Ingresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../assets/js/demo/chart-area-demo.js"></script>
<script src="../assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>

