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

            var first2 = document.getElementById('docTypes2');
            var docType2 = first2.innerHTML;

            //Añadir divs al principal
            var card = '<span class="close" style="float:right;">X</span><br>'+
                '<p name="contador" style= display:none>'+counter +
                '</p>' +
                '<div class="row">' +

                '   <div class="col-md-6">' +
                '       <div class="form-group">' +
                '           <label>Email</label>' +
                '           <input type="email" class="form-control" name="email'+ counter +'" placeholder="aaa@aaa.com" onBlur=\'validaEmail'+counter+'(this.value);\'>' +
                '       </div>' +
                '   </div>' +
                '</div>' +
                '<div class="row">' +
                '   <div class="col-6">' +
                '       <p id="okEmail'+counter+'">' +
                '   </div>' +
                '</div> ' +
                '<div id="datosCompletar'+counter+'" style="display:none!important">' +
                '   <div class="row">' +
                '       <div class="col-md-6">' +
                '           <div class="form-group">' +
                '               <label>Nombres</label>' +
                '               <input type="text" class="form-control" name="nombre'+counter+'" placeholder="Ingrese Nombres" id="nombre'+counter+'">' +
                '           </div>' +
                '       </div>' +
                '       <div class="col-md-6">' +
                '           <div class="form-group">' +
                '               <label>Apellido</label>' +
                '               <input type="text" class="form-control" name="apellido'+counter+'" placeholder="Ingrese Apellido" id="apellido'+counter+'">' +
                '           </div>' +
                '       </div>' +
                '   </div>' +
                '   <div class="row">' +
                '       <div class="col-md-6">' +
                '           <div class="form-group">' +
                '               <label>Tipo Documento</label>' +
                '               <select class="form-control" name="tipo_doc'+counter+'">' + docType +
                '               </select>' +
                '           </div>' +
                '       </div>' +
                '       <div class="col-md-6">' +
                '           <div class="form-group">' +
                '               <label>Nro. Documento</label>' +
                '               <input type="text" class="form-control" name="nro_doc'+ counter +'" placeholder="Ingrese Nro. Documento" id="numDoc'+counter+'">' +
                '           </div>' +
                '       </div>' +
                '   </div>' +
                '</div>   ' +
                '<div class="row">' +
                '   <div class="col-md-6 offset-3">' +
                '       <div class="separador"></div>' +
                '   </div>' +
                '</div>' +
                '<p class="card-description vuelo-disabled">Vuelo: <?php echo $matricula;?></p>' +
                '<div class="row">' +
                '   <div class="col-md-6">' +
                '       <div class="form-group">' +
                '           <label>Tipo de Cabina</label>' +
                '           <select class="form-control" name="tipo_cabina'+counter+'" id="cabina'+counter+'" onchange="calcularImporte'+counter+'()">' + docType2 +
                '           </select>' +
                '       </div>' +
                '   </div>' +
                '   <div class="col-6">' +
                '       <div class="form-group">' +
                '           <label>Importe</label>' +
                '           <input class="form-control" name="importe'+counter+'" id="importe'+counter+'">' +
                '       </div>' +
                '   </div>' +
                '</div>';
            counter++;
            // $(div1).append(div2);
            $(div1).append(card);
            //Añado el card
            $('.card').append('<br>',div1);
            document.getElementById('hola').innerHTML = counter;
            $('#hola').val(counter);
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
                        <label>Email</label>
                        <input type="email" id="email" class="form-control" name="email" onBlur='validaEmail(this.value);' placeholder="aaa@aaa.com">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p id="okEmail" > </p>
                </div>
            </div>
            <div id="datosCompletar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombres" id="nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" class="form-control" name="apellido" placeholder="Ingrese Apellido" id="apellido">
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
                            <input type="text" class="form-control" name="nro_doc" placeholder="Ingrese Nro. Documento" id="numDoc">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="separador"></div>
                </div>
            </div>
            <p class="card-description vuelo-disabled" name="matricula" >Vuelo: <?php echo $matricula;?></p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo de Cabina</label>
                        <select class="form-control" name="tipo_cabina" id="docTypes2" onchange="calcularImporte()">
                            <option value="">Seleccione...</option>
                            <?php echo $tipo_cabina ; ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Importe</label>
                        <input class="form-control" name="importe" id="importe">
                    </div>
                </div>
            </div>
            <div class="row">
                <p style="visibility: hidden;" id="costo"> <?php echo $costo?></p>
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
          <button name="submit" type="submit" class="btn btn-success btn-rounded btn-fw" style="float:left">Ir al pago</button>
        <!--   <button name="submit" class="btn btn-success btn-rounded btn-fw" style="float:left"><a style="color:white!important" href="vista_pago.php">Ir al pago</a></button>
-->
            <input type="text" id="hola"  name="counter" style="display: none">
        </div>
    </div>
</form>

<script>

    window.onload=function () {
        document.getElementById("datosCompletar").style.display = "none";

    }

    function confimarCancelacion(){
        var ask = confirm("¿Seguro quiere cancelar la reserva?");
        if (ask) {

            window.location.href="../vista/vista_cliente.php";
        }
    }

    function calcularImporte(){
        var selectCabina = document.getElementById('docTypes2');
        var cabina = selectCabina.options[selectCabina.selectedIndex].id;
        var costoText = document.getElementById('costo').innerHTML;

        var costo = parseFloat(costoText);

        if(cabina == 2){
            document.getElementById('importe').value = (costo + (costo*0.25)).toString() + ".00";
        } else if (cabina == 3){
            document.getElementById('importe').value = (costo + (costo*0.50)).toString()+ ".00";
        } else
            document.getElementById('importe').value = (costo).toString()+ ".00";
    }

    function calcularImporte1(){
        var selectCabina1 = document.getElementById('cabina1');
        var cabina1 = selectCabina1.options[selectCabina1.selectedIndex].id;
        var costoText = document.getElementById('costo').innerHTML;

        var costo = parseFloat(costoText);

        if(cabina1 == 2){
            document.getElementById('importe1').value = (costo + (costo*0.25)).toString() + ".00";
        } else if (cabina1 == 3){
            document.getElementById('importe1').value = (costo + (costo*0.50)).toString()+ ".00";
        } else
            document.getElementById('importe1').value = (costo).toString()+ ".00";
    }

    function calcularImporte2(){
        var selectCabina2 = document.getElementById('cabina2');
        var cabina2 = selectCabina2.options[selectCabina2.selectedIndex].id;

        var costoText = document.getElementById('costo').innerHTML;

        var costo = parseFloat(costoText);

        if(cabina2 == 2){
            document.getElementById('importe2').value = (costo + (costo*0.25)).toString() + ".00";
        } else if (cabina2 == 3){
            document.getElementById('importe2').value = (costo + (costo*0.50)).toString()+ ".00";
        } else
            document.getElementById('importe2').value = (costo).toString()+ ".00";
    }

    function getXMLHTTP() {
        var xmlhttp=false;
        try{
            xmlhttp=new XMLHttpRequest();
        }
        catch(e)	{
            try{
                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e){
                try{
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e){
                    xmlhttp=false;
                }
            }
        }
        return xmlhttp;
    }

    function validaEmail(email) {
        var strURL="../ajax/mails.php?email="+email;
        var req = getXMLHTTP();
        if (req) {
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {
                        document.getElementById('okEmail').innerHTML = req.responseText;
                        if(req.responseText == "Email existente, no es necesario completar los datos"){

                            document.getElementById("datosCompletar").style.display = "none";
                            document.getElementById('okEmail').style.color = "green";


                        }else {
                            document.getElementById("datosCompletar").style.display = "block";
                            document.getElementById('okEmail').style.color = "red";
                        }
                        //alert("Ok: "+ req.responseText);
                    } else {
                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                    }
                }
            }
            req.open("GET", strURL, true);
            req.send(null);
        }

    }

    function validaEmail1(email1) {
        var strURL="../ajax/mails.php?email="+email1;
        var req = getXMLHTTP();
        if (req) {
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {
                        document.getElementById('okEmail1').innerHTML = req.responseText;
                        if(req.responseText == "Email existente, no es necesario completar los datos"){

                            document.getElementById("datosCompletar1").style.display = "none";
                            document.getElementById('okEmail1').style.color = "green";


                        }else {
                            document.getElementById("datosCompletar1").style.display = "block";
                            document.getElementById('okEmail1').style.color = "red";
                        }
                        //alert("Ok: "+ req.responseText);
                    } else {
                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                    }
                }
            }
            req.open("GET", strURL, true);
            req.send(null);
        }

    }

    function validaEmail2(email2) {
        var strURL="../ajax/mails.php?email="+email2;
        var req = getXMLHTTP();
        if (req) {
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {
                        document.getElementById('okEmail2').innerHTML = req.responseText;
                        if(req.responseText == "Email existente, no es necesario completar los datos"){

                            document.getElementById("datosCompletar2").style.display = "none";
                            document.getElementById('okEmail2').style.color = "green";


                        }else {
                            document.getElementById("datosCompletar2").style.display = "block";
                            document.getElementById('okEmail2').style.color = "red";
                        }
                        //alert("Ok: "+ req.responseText);
                    } else {
                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                    }
                }
            }
            req.open("GET", strURL, true);
            req.send(null);
        }

    }


</script>

<?php
include("../footer.php");
?>