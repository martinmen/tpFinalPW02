<?php
include_once ("../header.php");
include_once("../controlador/controlador_comprobante.php");
?>
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Check-in Online</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="separador"></div>
    </div>
</div>
<br>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="card-header py-3" >
            <form class="needs-validation"  accion="../controlador/controlador_comprobante.php" method="post">
                <div class="row" >
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Cliente</label>
                        <p type="text" class="form-control"><?php if(isset($cliente)){echo $cliente;} ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Código Reserva</label>
                        <p type="text" class="form-control"><?php if(isset($cod_reserva)){echo $cod_reserva;}  ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Fecha y Hora</label>
                        <p type="text" class="form-control"><?php echo $fechaHora ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="firstName">N° Vuelo</label>
                        <p type="text" class="form-control"><?php echo $vuelo ?></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="lastName">E-mail</label>
                        <p type="text" class="form-control"><?php echo $email ?></p>
                        <input name="id_reserva" style="display: none;" value="<?php echo $id_reserva?>">
                    </div>
                </div>
                <div class="separador"></div>
                <br>
                <div class="row" >
                    <div class="col-2 offset-3" id="aImprimir">
                        <img src="../assets/img/qr.png" width="200px">
                        <p style="display: none">Código de Autorización de Abordaje</p>
                    </div>
                    <div class="col-3 offset-1">
                        <label for="lastName" style="margin-top: 50px; text-align: center">Código de Autorización de Abordaje</label>
                        <p type="text" class="form-control" ><?php echo $codigoAbordaje ?></p>
                    </div>
                </div>
                <br>
                <div class="col-5 offset-3">
                    <button class="btn btn-success btn-block" type="submit" name="submit">Confirmar Check-In y Enviar Email</button>
                </div>
                <br>
                <div class="row">
                    <div class="col-3 offset-4">
                        <button class="btn btn-primary btn-block"><a href="javascript:crearPdf()" style="color:white!important">Imprimir Comprobante</a></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function crearPdf() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        source = $('#aImprimir')[0];

        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 0,
            left:10,
            width: 800
        };

        pdf.fromHTML(
            source,
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width,
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                pdf.save('comprobante-checkin.pdf');
            }, margins
        );
    }


</script>

<?php

include("../footer.php");
?>