<?php
include_once ("../header.php");
include_once("../controlador/controlador_crearReserva.php");
?>
<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function () {
        var counter = 1;
        $('#addCard').on("click", function(){
            //Crear elemento div
            var div1 = $(document.createElement('div'));
            div1.addClass('card-body newCard');
            div1.attr('id',counter);

            var first = document.getElementById('docTypes');
            var docType = first.innerHTML;

            //Añadir divs al principal
            var card = '<span class="close" style="float:right;">X</span><br>'+
                '<div class="row">' +
                '<div class="col-md-6">' +
                '<div class="form-group">' +
                '<label>Nombres</label>' +
                '<input type="text" class="form-control" name="nombres'+counter+'" placeholder="Ingrese Nombres">' +
                '</div>' +
                '</div>' +
                '<div class="col-md-6">' +
                '<div class="form-group">' +
                '<label>Apellido</label>' +
                '<input type="text" class="form-control" name="apellido'+counter+'" placeholder="Ingrese Apellido">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-md-6">' +
                '<div class="form-group">' +
                '<label>Tipo Documento</label>' +
                '<select class="form-control" name="tipo_doc'+counter+'">' + docType +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-6">' +
                '<div class="form-group">' +
                '<label>Nro. Documento</label>' +
                '<input type="text" class="form-control" name="nro_doc'+ counter +'" placeholder="Ingrese Nro. Documento">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-md-6">' +
                '<div class="form-group">' +
                '<label>Email</label>' +
                '<input type="email" class="form-control" name="email'+ counter +'" placeholder="aaa@aaa.com">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '                <div class="col-md-6 offset-3">' +
                '                    <div class="separador"></div>' +
                '                </div>' +
                '            </div>' +
                '            <p class="card-description vuelo-disabled">Vuelo: <?php echo $vueloId;?></p>' +
                '            <div class="row">' +
                '                <div class="col-md-6">' +
                '                    <div class="form-group">' +
                '                        <label>Tipo de Cabina</label>' +
                '                        <select class="form-control" name="tipo_cabina">' +
                '                            <option value="">Seleccione...</option>' +
                '                            <?php ; ?>' +
                '                        </select>' +
                '                    </div>' +
                '                </div>' +
                '                <div class="col-6">' +
                '                    <div class="form-group">' +
                '                        <label>Importe</label>' +
                '                        <p class="form-control" name="importe" > $<?php echo $importe?></p>' +
                '                    </div>' +
                '                </div>' +
                '            </div>';
            counter++;
            // $(div1).append(div2);
            $(div1).append(card);
            //Añado el card
            $('.card').append('<br>',div1);

            if(counter > 2){
                $('#addCard').css('display', 'none');
            }
        });


        //Elimino el card
        $("#form").delegate(".close", "click", function (event) {
            $(this).closest('.newCard').remove();
            counter -= 1
            if(counter < 3){
                $('#addCard').css('display', 'inline');
            }
        });

    });
</script>
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Reserva</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="separador"></div>
    </div>
</div>
<br>
<form class="form-sample" method="post" action="../controlador/controlador_crearReserva.php" id="form">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control" name="nombres" placeholder="Ingrese Nombres">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Ingrese Apellido">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo Documento</label>
                        <select class="form-control" name="tipo_doc" id="docTypes">
                            <option value="">Seleccione...</option>
                            <?php  echo $tipo_doc; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nro. Documento</label>
                        <input type="text" class="form-control" name="nro_doc" placeholder="Ingrese Nro. Documento">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="aaa@aaa.com">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="separador"></div>
                </div>
            </div>
            <p class="card-description vuelo-disabled">Vuelo: <?php echo $vueloId;?></p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo de Cabina</label>
                        <select class="form-control" name="tipo_cabina">
                            <option value="">Seleccione...</option>
                            <?php ; ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Importe</label>
                        <p class="form-control" name="importe" > $<?php echo $importe?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 offset-md-10">
            <input type="button" class="btn btn-primary" id="addCard" style="float:right"  value="Agregar Usuario" data-toggle="tooltip" data-placement="top" title="Puede agregar otro usuario a su reserva"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 offset-4">
            <button type="button" class="btn btn-danger btn-rounded btn-fw" style="float:right;"><a style="color:white!important" onclick="confimarCancelacion()">Cancelar</a></button>
        </div>
        <div class="col-md-2">
<!--            <button name="submit" type="submit" class="btn btn-success btn-rounded btn-fw" style="float:left">Ir al pago</button>-->
            <button name="submit" class="btn btn-success btn-rounded btn-fw" style="float:left"><a style="color:white!important" href="vista_pago.php">Ir al pago</a></button>
        </div>
    </div>
</form>
<script>
    function confimarCancelacion(){
        var ask = confirm("¿Seguro quiere cancelar la reserva?");
        if (ask) {
            window.location.href="../vista/vista_cliente.php";
        }
    }
</script>

<?php
include("../footer.php");
?>