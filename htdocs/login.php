<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Bienvenido!</h3>
                        </div>
                        <form class="form-control " action='ValidarSession.php' method='POST'>
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
                            <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" value="Iniciar Sesión">Ingresar</button>
                            <input class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="button" value="Registrarme" onClick="window.location = 'registro.php';">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



