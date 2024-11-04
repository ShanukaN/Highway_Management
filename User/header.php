<?php session_start(); 
include "security.php";
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expressway</title>


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link rel="shotcut icon" href="images/lo.png" type="x-icon">

    <link rel="stylesheet" href="css/all.css">

    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed" onload="initClock()">
    <div class="wrapper">

        <!-- Preloader -->


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <button type="button" class="btn btn-primary " data-toggle="modal"
                        onclick="location.href='logout.php'">
                        Logout<i class="fas fa-sign-out-alt ml-2"></i>
                    </button>

                    <!-- Modal -->

                </li>



                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h5 class="modal-title" id="exampleModalLongTitle">Ready to Leave?</h5>
                        </center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <center>
                        <div class="modal-body ">
                            Select "Logout" bellow if you are ready to logout
                        </div>
                    </center>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="logout.php" method="POST">
                            <button type="submit" class="btn btn-primary" name="logout">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Sidebar Container -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4 navba">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="dist/img/aaa.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Expressway</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar ">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a class="d-block pl-3">Hi <?php echo $_SESSION['f_name']; ?> </a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-5 ">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="">
                            <a href="dashboard.php" class="nav-link  mb-2">
                                <iconify-icon icon="ant-design:home-filled" style="margin-right:5px;"></iconify-icon>
                                <p class="i">
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="">
                            <?php $id=$_SESSION['user_id'];

                                $res=mysqli_query($con,"SELECT account FROM `users` WHERE user_id=$id");  
                                while($row=mysqli_fetch_array($res))
                                {
                                $account=$row["account"];
                                if($account > 1000){ ?>
                            <a href="generate_qr.php" class="nav-link mb-2">
                                <iconify-icon icon="ion:qr-code-sharp" style="margin-right:5px;"></iconify-icon>
                                <p class="i">
                                    QR Code
                                </p>
                            </a>

                            <?php 
                                    }else{
                                ?>
                            <a href="dashboard.php" class="nav-link mb-2">
                                <iconify-icon icon="ion:qr-code-sharp" style="margin-right:5px;"></iconify-icon>
                                <p class="i">
                                    QR Code
                                </p>
                            </a>

                            <?php
                                    }
                                } 
                            ?>
                        </li>
                        <li class="">
                            <a href="vehicle.php" class="nav-link  mb-2">
                                <iconify-icon icon="fluent:vehicle-car-profile-ltr-16-filled" style="margin-right:5px;">
                                </iconify-icon>
                                <p class="i">
                                    Add Vehicle
                                </p>
                            </a>
                        </li>

                        <li class="">
                            <a href="search_interchanges.php" class="nav-link  mb-2">
                                <iconify-icon icon="gis:map-search" style="margin-right:5px;"></iconify-icon>
                                <p class="i">
                                    Interchanges
                                </p>
                            </a>
                        </li>

                        <li class="">
                            <a href="#" class="nav-link mb-2">
                                <iconify-icon icon="fa-solid:history" style="margin-right:5px;"></iconify-icon>
                                <p class="i">
                                    Account History
                                </p>
                            </a>
                        </li>

                        <li class="">
                            <a href="#" class="nav-link mb-2">
                                <iconify-icon icon="fa-solid:history" style="margin-right:5px;"></iconify-icon>
                                <p class="i">
                                    Chart
                                </p>
                            </a>
                        </li>

                        <li class="">
                            <a href="#" class="nav-link mb-2">
                                <iconify-icon icon="icon-park-solid:table-report" style="margin-right:5px;">
                                </iconify-icon>
                                <p class="i">
                                    Reports
                                </p>
                            </a>
                        </li>

                        <li class="">
                            <a href="account.php" class="nav-link  mb-2">
                                <iconify-icon icon="subway:usd" style="margin-right:5px;"></iconify-icon>
                                <p class="i">
                                    Account
                                </p>
                            </a>
                        </li>

                        <li class="">
                            <a href="profile.php" class="nav-link  mb-2">
                                <iconify-icon icon="pajamas:profile" style=" margin-right:5px;">
                                </iconify-icon>
                                <p class="i">
                                    profile
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">