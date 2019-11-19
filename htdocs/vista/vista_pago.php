<?php
include_once ("../header.php");
include_once("../controlador/controlador_pago.php");
?>
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Pago</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="separador"></div>
    </div>
</div>
<br>
<form class="form-sample" method="post" action="" id="form">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <p class="totalPagar">TOTAL A PAGAR POR SU RESERVA: $99999</p>
            </div>
            <br>
            <div class="row">
                <div class="col-3" style="border-right: 1px solid grey;">
                    <div class="row">
                        <div class="col-12">
                            <h5>Tarjetas de crédito</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <img src="../assets/img/visaIcono.png" width="50px" height="50px">
                        </div>
                        <div class="col-3">
                            <img src="../assets/img/mastercardIcono.png" width="50px" height="50px">
                        </div>
                        <div class="col-3">
                            <img src="../assets/img/amexIcono.png" width="50px" height="50px">
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-12">
                            <h5>Tarjetas de débito</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <img src="../assets/img/santanderLogo.png" height="20px">
                        </div>
                        <div class="col-3">
                            <img src="../assets/img/bancomerLogo.png" height="30px">
                        </div>
                        <div class="col-3">
                            <img src="../assets/img/hsbcLogo.png" height="20px">
                        </div>
                        <div class="col-3">
                            <img src="../assets/img/provinciaLogo.png" height="50px">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Nombre del titular</label>
                        <input type="text" name="titularTarjeta" class="form-control" placeholder="Como aparece en la tarjeta">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Número de tarjeta</label>
                        <input type="number" name="numeroTarjeta" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Fecha de expiración</label>
                        <div class="input-group">
                            <input type="number" name="expiracionMesTarjeta" class="form-control col-3" placeholder="Mes">
                            <span class="col-2"></span>
                            <input type="number" name="expiracionAnioTarjeta" class="form-control col-3" placeholder="Año">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Código de seguridad</label>
                        <div class="input-group">
                            <input type="number" name="codigoTarjeta" class="form-control col-3" placeholder="3 dígitos">
                            <span class="col-2"></span>
                            <img src="../assets/img/codigoTarjetaLogo.png" height="40px" style="margin-top: -3px;">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4 offset-4" style="border-right: 1px solid grey">
                    <div class="row">
                        <div class="col-2">
                            <img src="../assets/img/escudoSeguroLogo.png" width="50px">
                        </div>
                        <div class="col-10">
                            <p style="color:grey; font-size: 12px">Tus pagos se realizan de forma segura con encriptación de 256 bits</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-rounded btn-fw" style="float:right;"><a style="color:white!important" onclick="confimarCancelacion()">Cancelar</a></button>
                </div>
                <div class="col-md-2">
                    <!--            <button name="submit" type="submit" class="btn btn-success btn-rounded btn-fw" style="float:left">Ir al pago</button>-->
                    <button name="submit" class="btn btn-success btn-rounded btn-fw" style="float:left"><a style="color:white!important" href="vista_pago.php">Confimar Pago</a></button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function confimarCancelacion(){
        var ask = confirm("¿Seguro quiere cancelar el pago?");
        if (ask) {
            window.location.href ="../vista/vista_cliente.php";
        }
    }
</script>





<?php
include("../footer.php");
?>