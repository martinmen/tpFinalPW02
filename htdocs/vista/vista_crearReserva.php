<?php
include_once ("../header.php");
include("../controlador/controlador_crearReserva.php");
?>
<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function () {
        var counter = 1;
        var cantCard = 0;


        //Crear elemento div
        var div1 = $(document.createElement('div')).addClass('card shadow mb-4');
        var div2 = $(document.createElement('div')).addClass('card-body');

        //Añadir divs al principal
        var card = 'Vuelo: <?php echo $x;?>'+counter;

        $(div1).append(div2);
        $(div2).append(card);
        //$(div2).append('Vuelo: '+'--- <div class="row"><div class="col-md-6">\n' +
        //    '                    <div class="form-group">\n' +
        //    '                        <label>Nombres</label>\n' +
        //    '                        <input type="text" class="form-control" name="nombres'+ counter +'" placeholder="Ingrese Nombres">\n' +
        //    '                    </div>\n' +
        //    '                </div>\n' +
        //    '                <div class="col-md-6">\n' +
        //    '                    <div class="form-group">\n' +
        //    '                        <label>Apellido</label>\n' +
        //    '                        <input type="text" class="form-control" name="apellido'+ counter +'" placeholder="Ingrese Apellido">\n' +
        //    '                    </div>\n' +
        //    '                </div>\n' +
        //    '            </div>\n' +
        //    '            <div class="row">\n' +
        //    '                <div class="col-md-6">\n' +
        //    '                    <div class="form-group">\n' +
        //    '                        <label>Tipo Documento</label>\n' +
        //    '                        <select class="form-control" name="tipo_doc'+ counter +'">\n' +
        //    '                            <option value="">Seleccione...</option>\n' +
        //    '                            <?php //?>// + \n'+
        //    '                        </select>\n' +
        //    '                    </div>\n' +
        //    '                </div>\n' +
        //    '                <div class="col-md-6">\n' +
        //    '                    <div class="form-group">\n' +
        //    '                        <label>Nro. Documento</label>\n' +
        //    '                        <input type="text" class="form-control" name="nro_doc'+ counter +'" placeholder="Ingrese Nro. Documento">\n' +
        //    '                    </div>\n' +
        //    '                </div>\n' +
        //    '            </div>\n' +
        //    '            <div class="row">\n' +
        //    '                <div class="col-md-6">\n' +
        //    '                    <div class="form-group">\n' +
        //    '                        <label>Email</label>\n' +
        //    '                        <input type="email" class="form-control" name="email'+ counter +'" placeholder="aaa@aaa.com">\n' +
        //    '                    </div>\n' +
        //    '                </div>\n' +
        //    '            </div>');


        $('#addCard').click(function(){
            if(cantCard <= 3) {
                cantCard = cantCard +1;
                //Añado el card
                var cards = document.getElementById('Cards');
                $(cards).append(div1);
            }
        });


        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });

    });

    function calculateRow(row) {
        var price = +row.find('input[name^="price"]').val();

    }

    function calculateGrandTotal() {
        var grandTotal = 0;
        $("table.order-list").find('input[name^="price"]').each(function () {
            grandTotal += +$(this).val();
        });
        $("#grandtotal").text(grandTotal.toFixed(2));
    }
</script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Datos de usuarios para nueva reserva</h1>
</div>
<form class="form-sample" method="post" action="../controlador/controlador_crearReserva.php">
    <div class="card shadow mb-4">
        <div class="card-body">
            <p class="card-description">Vuelo: ----</p>
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
                        <select class="form-control" name="tipo_doc">
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
        </div>
    </div>
</form>
<div id="Cards"></div>
<input type="button" class="btn btn-primary" style="float:right" id="addCard" value="Agregar Usuario" />
<?php
include("../footer.php");
?>