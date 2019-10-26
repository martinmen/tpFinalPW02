
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TP FINAL</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- <link rel="shortcut icon" href="assets/img/saturno.jpg" /> -->

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">VUELOS</h1>


</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form class="form-inline" method="get" action="../vista/vistaCliente.php">
            <select class="form-control" name="tipo_vuelo">
                <option value="">Tipo</option>
                <?php
                require_once("../Conexion.php");
                $con= getConexion();
                $sql="SELECT DISTINCT descripcion, id_tipo_vuelo FROM tipo_vuelo";
                $result=mysqli_query($con,$sql);

                while ($row=mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $row['id_tipo_vuelo']?>">
                        <?php echo $row['descripcion'] ?>
                    </option>
                <?php } ?>
            </select>
            <!--            <input class="form-control mr-sm-3" name="busca" type="search" placeholder="Cabina" aria-label="Search">-->
            Desde:<input class="form-control mr-sm-3" type="date" name="fdesde" placeholder="Fecha desde" id="datepickerDesde">
            Hasta:<input class="form-control mr-sm-3" type="date" name="fhasta" placeholder="Fecha hasta" id="datepickerHasta">
            <!--            <input class="form-control mr-sm-3" name="busca" type="search" placeholder="Cabina" aria-label="Search">-->
            <select class="form-control" name="origen">
                <option value="">Origen</option>
                <?php

                $con= getConexion();
                $sql="SELECT DISTINCT descripcion, id_origen FROM origen";
                $result=mysqli_query($con,$sql);

                while ($row=mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $row['id_origen']?>">
                        <?php echo $row['descripcion'] ?>
                    </option>
                <?php } ?>
            </select>
            <select class="form-control" name="destino">
                <option value="">Destino</option>
                <?php

                $con= getConexion();
                $sql="SELECT DISTINCT descripcion, id_destino FROM destino";
                $result=mysqli_query($con,$sql);

                while ($row=mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $row['id_destino']?>">
                        <?php echo $row['descripcion'] ?>
                    </option>
                <?php } ?>
            </select>


            <button class="btn btn-primary " type="submit" >Buscar</button>
        </form>


    </div>

<!--    <div class="card-header py-3">
        <div class="container">
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">Fecha desde</span>
                    </span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker1').datetimepicker();
                    });
                </script>
            </div>
        </div>
    </div>-->

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nro Vuelo</th>
                    <th>Fecha</th>
                    <th>Duración</th>
                    <th>Tipo Vuelo</th>
                    <th>Equipo</th>

                    <th>Origen</th>
                    <th>accion</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $conn=mysqli_connect("localhost","root", "1234","tpfinal");
                $sql="SELECT * FROM vuelos ";
                $result=mysqli_query($conn,$sql);

              /*  if($fdesde == "" && $fhasta == "" && $origen == ""){
                    $sql="SELECT * FROM vuelos";
                    $result=mysqli_query($conn,$sql);
                }else {
                    // $sql = "SELECT * FROM vuelos WHERE fecha between '$fdesde' and  '$fhasta'";
                    // $result=mysqli_query($conn,$sql );*/

                    //WHERE ((origen = '$origen') AND (fecha between '$fdesde' and  '$fhasta')) OR (origen = '$origen') OR (fecha between '$fdesde' and  '$fhasta')";

                $criterio="";
    if(isset( $_GET['tipo_vuelo']))
    {
        if($criterio ==""){
            $tipo_vuelo = $_GET['tipo_vuelo'];
            $criterio = "where tipo_vuelo = '$tipo_vuelo'";
        }
    }
    echo "212123";
    if(isset($_GET['fdesde']))
                    {
                        $fdesde = $_GET['fdesde'];
                        if($criterio ==""){

                            $criterio . "where fdesde = '$fdesde'";
                        }else{

                            $criterio . " and  fdesde = '$fdesde'";
                        }
                    }

    if(isset($_GET['fhasta']))
                    {
                        $fhasta = $_GET['fhasta'];
                        if($criterio ==""){

                            $criterio . "where fhasta = '$fhasta'";
                        }else{

                            $criterio . " and  fhasta = '$fhasta'";
                        }
                    }

                    if(isset($_GET['origen']))
                    {   $origen = $_GET['origen'];
                        if($criterio ==""){

                            $criterio . "where origen = '$origen'";
                        }else{

                            $criterio . " and  origen = '$origen'";
                        }
                    }

                    if(isset($_GET['destino']))
                    {   $destino = $_GET['destino'];
                        if($criterio ==""){

                            $criterio . "where origen = '$destino'";
                        }else{

                            $criterio . " and  origen = '$destino'";
                        }
                    }

                $sql = $sql. $criterio;
                    echo  $sql;

                    $result=mysqli_query($conn,$sql );
                    if($result)
                    {echo "Resultado busqueda";}else{echo "No se encontro coincidencias";}

                while ($row=mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['fecha']."</td>";
                    echo "<td>".$row['duracion']."</td>";
                    echo "<td>".$row['tipo_vuelo']."</td>";
                    echo "<td>".$row['equipo']."</td>";
                    echo "<td>".$row['origen']."</td>";
                    echo "<td><a href='../vista/vistaCrearReserva.php?vuelo=".$row['id']."'>Reservar</a></td>";
                 //   echo "<td><a href='pepeito.php?vuelo=".$row['id']."'>REservar</a></td>";
                   // href="../vista/vistaCrearReserva.php"
                    //  echo "<td><a href=\"delete&&id= a><td>";
                    echo "</tr>";
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>





