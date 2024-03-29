<?php
session_start();

if(isset($_SESSION["email"])){
    $email = $_SESSION["email"];
}
if(isset($_SESSION["rol"])){
    $rol = $_SESSION["rol"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Guacho Rocket - Vuelos</title>
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon-96x96.png">

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- <link rel="shortcut icon" href="assets/img/saturno.jpg" /> -->

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--    Reportes Js-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
    <script type="text/javascript" src="../reportesPDF/js/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-rocket"></i>
            </div>
            <div class="sidebar-brand-text mx-2">Guacho<sup>Rocket</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link">
                <span>Bienvenidos</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menú
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <?php
        if(isset($rol)){
            if($rol == 2){
                echo "<li class='nav-item'>
                        <a class='nav-link' 
                            href='"; if($rol == 1){
                                        $vista = '../vista/vista_admin.php';
                                    } else if($_SESSION["rol"] == 2){
                                        $vista = '../vista/vista_cliente.php';
                                    }
                                    echo $vista;
                            echo "'> 
                                  <i class='fas fa-plane-departure'></i>
                                  <span>Viajes</span></a>
                    </li>";

            }
        }
        ?>
        <?php
        if(isset($rol)){
            if($rol== 1) {
                echo "<li class=\"nav-item\" >
                    <a class=\"nav-link\" href='../vista/vista_admin.php'>
                        <i class=\"far fa-file-alt\"></i>
                        <span>Reportes</span>
                    </a>                               
                </li>";
            }
        }
        ?>
        <?php
        if(isset($rol)){
            if($rol== 3) {
                echo "<li class=\"nav-item\" >
                    <a class=\"nav-link\" href='vista_medico.php'>
                        <i class=\"far fa-file-alt\"></i>
                        <span>Centro Médico</span>
                    </a>                               
                </li>";
            }
        }
        ?>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                    </li>


                    <!-- Nav Item - Perfil -->
                    <?php
                    if(isset($rol)) {
                        echo "
                        <div class=\"topbar-divider d-none d-sm-block\"></div>
                        <li class=\"nav-item dropdown no-arrow\">
                            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"userDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                <span class=\"\"></span>
                                
                                    <img class=\"img-md rounded-circle\" src=\"../assets/img/face4.jpg\" width='50px'>
                            </a>
                            <!-- Dropdown - Perfil -->
                            
                            <div class=\"dropdown-menu dropdown-menu-right shadow animated--grow-in\" aria-labelledby=\"userDropdown\">
                                <a class=\"dropdown-item\" href='vista_perfil.php' >
                                    <i class=\"fas fa-user fa-sm fa-fw mr-2 text-gray-400\"></i>
                                    Perfil
                                </a>
                                <div class=\"dropdown-divider\"></div>
                                <a class=\"dropdown-item\" href=\"../CerrarSession.php\"><i class=\"fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400\"></i>
                                    Cerrar sesión</a>
                            </div>
                        </li>";
                    } else{
                        echo "<ul class=\"navbar-nav\">
                                <li class=\"nav-item font-weight-semibold d-none d-lg-block\"><a class='btn btnIngresar' href='../login.php'>Ingresar</a></li>
                                <div class=\"topbar-divider d-none d-sm-block\"></div>
                                <li class=\"nav-item font-weight-semibold d-none d-lg-block\"><a class='btn btnRegistrar' href='vista_registrar.php'>Registrarse</a></li>
                              </ul>";
                    }
                    ?>

                </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
