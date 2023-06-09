<?php
// require_once 'auth.php';

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect the user to the login page if not authenticated
    exit();
}
require_once 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

    <script>
        function formatRupiah(angka) {
            var bilangan = angka.toString().replace(/[^,\d]/g, '');
            var split = bilangan.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return 'Rp' + rupiah;
        }

        function hitungTotal() {
            var checkboxes = document.getElementsByName("biaya");
            var total = 0;

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    var biaya = parseInt(checkboxes[i].value);
                    total += biaya;
                }
            }

            var totalRupiah = formatRupiah(total);
            document.getElementById("total").innerHTML = "" + totalRupiah;
        }
    </script>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="assets/index3.html" class="brand-link">
                <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="assets/index.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="assets/index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="assets/index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Widgets
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="kelas1.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pasien Kelas I

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="kelas2.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pasien Kelas II

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="kelas3.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pasien Kelas III

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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pasien</h3>

                                    <div class="card-tools">

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Nama Pasien</th>
                                                <th style="text-align:center;">No. RM</th>
                                                <th style="text-align:center;">Tgl. Masuk</th>
                                                <th style="text-align:center;">Tgl. Keluar</th>
                                                <th style="text-align:center;">DX Medis</th>
                                                <th style="text-align:center;">ICD 10</th>
                                                <th style="text-align:center;">ICD 9</th>
                                                <th style="text-align:center;">Kelas BPJS</th>
                                                <th style="text-align:center;">Ruang</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                        <?php
                                        $nomr = $_GET["nomr"];
                                            // Assuming you have established a database connection
                                            $sql = mysqli_query($conn,"SELECT * FROM simrs2012.m_pasien a
                                            left join simrs2012.t_pendaftaran b ON simrs2012.a.NOMR = simrs2012.b.NOMR
                                            where simrs2012.a.NOMR='$nomr' group by TGLREG desc limit 1");
                                            $result = mysqli_fetch_array($sql);

                                            $nama = $result["NAMA"];
                                                    $nomr = $result["NOMR"];
                                                    $alamat = $result["ALAMAT"];
                                                    $tanggalreg = $result["TGLREG"];

                                            // Check if there are any rows returned from the query
                                            // print_r($result);
                                            ?>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $nama; ?></td>
                                                <td style="text-align:center;"><?php echo $nomr; ?></td>
                                                <td style="text-align:center;">05-06-2023</td>
                                                <td style="text-align:center;">06-06-2023</td>
                                                <td style="text-align:center;">-</td>
                                                <td style="text-align:center;">-</td>
                                                <td style="text-align:center;">-</td>
                                                <td style="text-align:center;">3</td>
                                                <td style="text-align:center;">Camar Atas</td>
                                            </tr>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <div class="card">

                                <!-- <div class="card-header">
                                    
                                    <h3 class="card-title">Detail Data Pasien</h3>
                                </div> -->

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No.</th>
                                                <th rowspan="2">Kegiatan</th>
                                                <th rowspan="2">Uraian Kegiatan</th>
                                                <th colspan="6" class="text-center">Hari</th>
                                                <th rowspan="2">Keterangan</th>
                                                <th rowspan="2">Biaya</th>

                                            </tr>

                                            <tr>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>6</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Nomor 1 -->
                                            <tr>
                                                <td rowspan="4">1</td>
                                                <td rowspan="2">a. Asesment awal Medis</td>
                                                <td>Dokter IGD</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a11" name="biaya" value="10000" onchange="hitungTotal()">
                                                        <label for="customCheckbox1a11" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a12" name="biaya" value="15000" onchange="hitungTotal()">
                                                        <label for="customCheckbox1a12" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a13" name="biaya" value="20000" onchange="hitungTotal()">
                                                        <label for="customCheckbox1a13" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a14" value="option1">
                                                        <label for="customCheckbox1a14" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a15" value="option1">
                                                        <label for="customCheckbox1a15" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a16" value="option1">
                                                        <label for="customCheckbox1a16" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td> -</td>



                                                <td>
                                                    <p id="total">Rp-</p>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>DPJP</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a21" value="option1">
                                                        <label for="customCheckbox1a21" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a22" value="option1">
                                                        <label for="customCheckbox1a22" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a23" value="option1">
                                                        <label for="customCheckbox1a23" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a24" value="option1">
                                                        <label for="customCheckbox1a24" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a25" value="option1">
                                                        <label for="customCheckbox1a25" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1a26" value="option1">
                                                        <label for="customCheckbox1a26" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td rowspan="2">b. Asesment awal Keperawatan</td>
                                                <td>IGD / Poli</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b11" value="option1">
                                                        <label for="customCheckbox1b11" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b12" value=" option1">
                                                        <label for="customCheckbox1b12" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b13" value="option1">
                                                        <label for="customCheckbox1b13" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b14" value="option1">
                                                        <label for="customCheckbox1b14" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b15" value="option1">
                                                        <label for="customCheckbox1b15" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b16" value="option1">
                                                        <label for="customCheckbox1b16" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td>Rp. -</td>
                                            </tr>
                                            <tr>

                                                <td>Rawat Inap</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b21" value="option1">
                                                        <label for="customCheckbox1b21" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b22" value="option1">
                                                        <label for="customCheckbox1b22" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b23" value="option1">
                                                        <label for="customCheckbox1b23" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b24" value="option1">
                                                        <label for="customCheckbox1b24" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b25" value="option1">
                                                        <label for="customCheckbox1b25" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1b26" value="option1">
                                                        <label for="customCheckbox1b26" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <!-- Nomor 2 -->
                                            <tr>
                                                <td rowspan="8">2</td>
                                                <td rowspan="8">Laboratorium</td>

                                            </tr>
                                            <tr>

                                                <td>Darah Lengkap</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2111" value="option1">
                                                        <label for="customCheckbox2111" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2112" value="option1">
                                                        <label for="customCheckbox2112" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2113" value="option1">
                                                        <label for="customCheckbox2113" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2114" value="option1">
                                                        <label for="customCheckbox2114" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2115" value="option1">
                                                        <label for="customCheckbox2115" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2116" value="option1">
                                                        <label for="customCheckbox2116" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>Urenium Kriatin</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2121" value="option1">
                                                        <label for="customCheckbox2121" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2122" value="option1">
                                                        <label for="customCheckbox2122" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2123" value="option1">
                                                        <label for="customCheckbox2123" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2124" value="option1">
                                                        <label for="customCheckbox2124" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2125" value="option1">
                                                        <label for="customCheckbox2125" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2126" value="option1">
                                                        <label for="customCheckbox2126" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>GDS</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2131" value="option1">
                                                        <label for="customCheckbox2131" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2132" value="option1">
                                                        <label for="customCheckbox2132" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2133" value="option1">
                                                        <label for="customCheckbox2133" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2134" value="option1">
                                                        <label for="customCheckbox2134" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2135" value="option1">
                                                        <label for="customCheckbox2135" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2136" value="option1">
                                                        <label for="customCheckbox2136" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>Elektrolit</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2141" value="option1">
                                                        <label for="customCheckbox2141" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2142" value="option1">
                                                        <label for="customCheckbox2142" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2143" value="option1">
                                                        <label for="customCheckbox2143" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2144" value="option1">
                                                        <label for="customCheckbox2144" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2145" value="option1">
                                                        <label for="customCheckbox2145" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2146" value="option1">
                                                        <label for="customCheckbox2146" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>Asam Urat</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2151" value="option1">
                                                        <label for="customCheckbox2151" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2152" value="option1">
                                                        <label for="customCheckbox2152" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2153" value="option1">
                                                        <label for="customCheckbox2153" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2154" value="option1">
                                                        <label for="customCheckbox2154" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2155" value="option1">
                                                        <label for="customCheckbox2155" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2156" value="option1">
                                                        <label for="customCheckbox2156" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>Profil Lipid</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2161" value="option1">
                                                        <label for="customCheckbox2161" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2162" value="option1">
                                                        <label for="customCheckbox2162" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2163" value="option1">
                                                        <label for="customCheckbox2163" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2164" value="option1">
                                                        <label for="customCheckbox2164" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2165" value="option1">
                                                        <label for="customCheckbox2165" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2166" value="option1">
                                                        <label for="customCheckbox2166" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>GDP</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2171" value="option1">
                                                        <label for="customCheckbox2171" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2172" value="option1">
                                                        <label for="customCheckbox2172" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2173" value="option1">
                                                        <label for="customCheckbox2173" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2174" value="option1">
                                                        <label for="customCheckbox2174" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2175" value="option1">
                                                        <label for="customCheckbox2175" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2176" value="option1">
                                                        <label for="customCheckbox2176" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>


                                            <!-- Nomor 3 -->
                                            <tr>
                                                <td rowspan="3">3</td>
                                                <td rowspan="3">Radiologi / Imaging</td>
                                                <td>RTO Thorax</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3111" value="option1">
                                                        <label for="customCheckbox3111" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3112" value="option1">
                                                        <label for="customCheckbox3112" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3113" value="option1">
                                                        <label for="customCheckbox3113" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3114" value="option1">
                                                        <label for="customCheckbox3114" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3115" value="option1">
                                                        <label for="customCheckbox3115" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3116" value="option1">
                                                        <label for="customCheckbox3116" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td> -</td>
                                                <td>Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>CT Scan Kepala</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3121" value="option1">
                                                        <label for="customCheckbox3121" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3122" value="option1">
                                                        <label for="customCheckbox3122" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3123" value="option1">
                                                        <label for="customCheckbox3123" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3124" value="option1">
                                                        <label for="customCheckbox3124" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3125" value="option1">
                                                        <label for="customCheckbox3125" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3126" value="option1">
                                                        <label for="customCheckbox3126" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>
                                            <tr>

                                                <td>EKG</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3131" value="option1">
                                                        <label for="customCheckbox3131" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3132" value="option1">
                                                        <label for="customCheckbox3132" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3133" value="option1">
                                                        <label for="customCheckbox3133" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3134" value="option1">
                                                        <label for="customCheckbox3134" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3135" value="option1">
                                                        <label for="customCheckbox3135" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3136" value="option1">
                                                        <label for="customCheckbox3136" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <!-- Nomor 4 -->
                                            <tr>
                                                <td>4</td>
                                                <td>Konsultasi</td>
                                                <td>DPJP</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox4111" value="option1">
                                                        <label for="customCheckbox4111" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox4112" value="option1">
                                                        <label for="customCheckbox4112" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox4113" value="option1">
                                                        <label for="customCheckbox4113" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox4114" value="option1">
                                                        <label for="customCheckbox4114" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox4115" value="option1">
                                                        <label for="customCheckbox4115" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox4116" value="option1">
                                                        <label for="customCheckbox4116" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td>Rp. -</td>
                                            </tr>

                                            <!-- Nomor 5 -->
                                            <tr>
                                                <td rowspan="4">5</td>
                                                <td rowspan="4">Asesmen Lanjutan</td>
                                                <td>a. Asesmen Medis</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5111" value="option1">
                                                        <label for="customCheckbox5111" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5112" value="option1">
                                                        <label for="customCheckbox5112" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5113" value="option1">
                                                        <label for="customCheckbox5113" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5114" value="option1">
                                                        <label for="customCheckbox5114" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5115" value="option1">
                                                        <label for="customCheckbox5115" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5116" value="option1">
                                                        <label for="customCheckbox5116" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td> -</td>
                                                <td>Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>b. Asesmen Keperawtan</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5121" value="option1">
                                                        <label for="customCheckbox5121" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5122" value="option1">
                                                        <label for="customCheckbox5122" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5123" value="option1">
                                                        <label for="customCheckbox5123" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5124" value="option1">
                                                        <label for="customCheckbox5124" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5125" value="option1">
                                                        <label for="customCheckbox5125" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5126" value="option1">
                                                        <label for="customCheckbox5126" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>
                                            <tr>

                                                <td>c. Asesment Gizi</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5131" value="option1">
                                                        <label for="customCheckbox5131" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5132" value="option1">
                                                        <label for="customCheckbox5132" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5133" value="option1">
                                                        <label for="customCheckbox5133" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5134" value="option1">
                                                        <label for="customCheckbox5134" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5135" value="option1">
                                                        <label for="customCheckbox5135" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5136" value="option1">
                                                        <label for="customCheckbox5136" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>
                                            <tr>

                                                <td>d. Asesment Farmasi</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5141" value="option1">
                                                        <label for="customCheckbox5141" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5142" value="option1">
                                                        <label for="customCheckbox5142" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5143" value="option1">
                                                        <label for="customCheckbox5143" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5144" value="option1">
                                                        <label for="customCheckbox5144" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5145" value="option1">
                                                        <label for="customCheckbox5145" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5146" value="option1">
                                                        <label for="customCheckbox5146" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>


                                            <!-- Nomor 6 -->
                                            <tr>
                                                <td rowspan="14">6</td>
                                                <td rowspan="6">a. Injeksi</td>
                                                <td>Inj. Piracetam</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6111" value="option1">
                                                        <label for="customCheckbox6111" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6112" value="option1">
                                                        <label for="customCheckbox6112" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6113" value="option1">
                                                        <label for="customCheckbox6113" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6114" value="option1">
                                                        <label for="customCheckbox6114" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6115" value="option1">
                                                        <label for="customCheckbox6115" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6116" value="option1">
                                                        <label for="customCheckbox6116" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td> -</td>
                                                <td>Rp. -</td>
                                            </tr>
                                            <tr>

                                                <td>Inj. Citicolin</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6121" value="option1">
                                                        <label for="customCheckbox6121" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6122" value="option1">
                                                        <label for="customCheckbox6122" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6123" value="option1">
                                                        <label for="customCheckbox6123" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6124" value="option1">
                                                        <label for="customCheckbox6124" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6125" value="option1">
                                                        <label for="customCheckbox6125" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6126" value="option1">
                                                        <label for="customCheckbox6126" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>
                                            <tr>

                                                <td>Inj. Mekobalamin</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6131" value="option1">
                                                        <label for="customCheckbox6131" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6132" value="option1">
                                                        <label for="customCheckbox6132" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6133" value="option1">
                                                        <label for="customCheckbox6133" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6134" value="option1">
                                                        <label for="customCheckbox6134" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6135" value="option1">
                                                        <label for="customCheckbox6135" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6136" value="option1">
                                                        <label for="customCheckbox6136" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>
                                            <tr>

                                                <td>Inj. Ranitidin</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6141" value="option1">
                                                        <label for="customCheckbox6141" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6142" value="option1">
                                                        <label for="customCheckbox6142" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6143" value="option1">
                                                        <label for="customCheckbox6143" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6144" value="option1">
                                                        <label for="customCheckbox6144" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6145" value="option1">
                                                        <label for="customCheckbox6145" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6146" value="option1">
                                                        <label for="customCheckbox6146" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>Inj. OMZ</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6151" value="option1">
                                                        <label for="customCheckbox6151" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6152" value="option1">
                                                        <label for="customCheckbox6152" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6153" value="option1">
                                                        <label for="customCheckbox6153" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6154" value="option1">
                                                        <label for="customCheckbox6154" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6155" value="option1">
                                                        <label for="customCheckbox6155" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6156" value="option1">
                                                        <label for="customCheckbox6156" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>Inj. Furosemid</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6161" value="option1">
                                                        <label for="customCheckbox6161" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6162" value="option1">
                                                        <label for="customCheckbox6162" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6163" value="option1">
                                                        <label for="customCheckbox6163" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6164" value="option1">
                                                        <label for="customCheckbox6164" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6165" value="option1">
                                                        <label for="customCheckbox6165" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6166" value="option1">
                                                        <label for="customCheckbox6166" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>



                                            <tr>

                                                <td rowspan="2">b. Infus</td>
                                                <td>Asering</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6211" value="option1">
                                                        <label for="customCheckbox6211" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6212" value="option1">
                                                        <label for="customCheckbox6212" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6213" value="option1">
                                                        <label for="customCheckbox6213" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6214" value="option1">
                                                        <label for="customCheckbox6214" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6215" value="option1">
                                                        <label for="customCheckbox6215" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6216" value="option1">
                                                        <label for="customCheckbox6216" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td>Rp. -</td>
                                            </tr>
                                            <tr>

                                                <td>Manitol</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6221" value="option1">
                                                        <label for="customCheckbox6221" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6222" value="option1">
                                                        <label for="customCheckbox6222" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6223" value="option1">
                                                        <label for="customCheckbox6223" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6224" value="option1">
                                                        <label for="customCheckbox6224" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6225" value="option1">
                                                        <label for="customCheckbox6225" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6226" value="option1">
                                                        <label for="customCheckbox6226" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td rowspan="5">c. Obat Oral</td>
                                                <td>Antiplatelet</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6311" value="option1">
                                                        <label for="customCheckbox6311" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6312" value="option1">
                                                        <label for="customCheckbox6312" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6313" value="option1">
                                                        <label for="customCheckbox6313" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6314" value="option1">
                                                        <label for="customCheckbox6314" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6315" value="option1">
                                                        <label for="customCheckbox6315" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6316" value="option1">
                                                        <label for="customCheckbox6316" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td>Rp. -</td>
                                            </tr>
                                            <tr>

                                                <td>Simvasatatin</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6321" value="option1">
                                                        <label for="customCheckbox6321" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6322" value="option1">
                                                        <label for="customCheckbox6322" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6323" value="option1">
                                                        <label for="customCheckbox6323" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6324" value="option1">
                                                        <label for="customCheckbox6324" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6325" value="option1">
                                                        <label for="customCheckbox6325" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6326" value="option1">
                                                        <label for="customCheckbox6326" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>Amlodipin/Candesartan</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6331" value="option1">
                                                        <label for="customCheckbox6331" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6332" value="option1">
                                                        <label for="customCheckbox6332" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6333" value="option1">
                                                        <label for="customCheckbox6333" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6334" value="option1">
                                                        <label for="customCheckbox6334" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6335" value="option1">
                                                        <label for="customCheckbox6335" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6336" value="option1">
                                                        <label for="customCheckbox6336" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>CPG</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6341" value="option1">
                                                        <label for="customCheckbox6341" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6342" value="option1">
                                                        <label for="customCheckbox6342" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6343" value="option1">
                                                        <label for="customCheckbox6343" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6344" value="option1">
                                                        <label for="customCheckbox6344" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6345" value="option1">
                                                        <label for="customCheckbox6345" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6346" value="option1">
                                                        <label for="customCheckbox6346" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td>Mecobalamin</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6351" value="option1">
                                                        <label for="customCheckbox6351" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6352" value="option1">
                                                        <label for="customCheckbox6352" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6353" value="option1">
                                                        <label for="customCheckbox6353" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6354" value="option1">
                                                        <label for="customCheckbox6354" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6355" value="option1">
                                                        <label for="customCheckbox6355" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6356" value="option1">
                                                        <label for="customCheckbox6356" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>-</td>
                                                <td> Rp. -</td>

                                            </tr>

                                            <tr>

                                                <td rowspan="1">d. Oksigenasi</td>
                                                <td>3 lpm</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6411" value="option1">
                                                        <label for="customCheckbox6411" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6412" value="option1">
                                                        <label for="customCheckbox6412" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6413" value="option1">
                                                        <label for="customCheckbox6413" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6414" value="option1">
                                                        <label for="customCheckbox6414" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6415" value="option1">
                                                        <label for="customCheckbox6415" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6416" value="option1">
                                                        <label for="customCheckbox6416" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td>Rp. -</td>
                                            </tr>

                                            <!-- Nomor 7 -->
                                            <tr>
                                                <td rowspan="14">7</td>
                                                <td rowspan="1">a. DPJP</td>
                                                <td>Asesmen Ulang</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7111" value="option1">
                                                        <label for="customCheckbox7111" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7112" value="option1">
                                                        <label for="customCheckbox7112" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7113" value="option1">
                                                        <label for="customCheckbox7113" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7114" value="option1">
                                                        <label for="customCheckbox7114" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7115" value="option1">
                                                        <label for="customCheckbox7115" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7116" value="option1">
                                                        <label for="customCheckbox7116" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td> -</td>
                                                <td>Rp. -</td>
                                            </tr>

                                            <tr>

                                                <td rowspan="2">b. Non DPJP</td>
                                                <td>DPJP Sekunder</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7211" value="option1">
                                                        <label for="customCheckbox7211" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7212" value="option1">
                                                        <label for="customCheckbox7212" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7213" value="option1">
                                                        <label for="customCheckbox7213" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7214" value="option1">
                                                        <label for="customCheckbox7214" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7215" value="option1">
                                                        <label for="customCheckbox7215" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7216" value="option1">
                                                        <label for="customCheckbox7216" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td> -</td>
                                                <td>Rp. -</td>
                                            </tr>

                                            <tr>


                                                <td>DU</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7221" value="option1">
                                                        <label for="customCheckbox7221" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7222" value="option1">
                                                        <label for="customCheckbox7222" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7223" value="option1">
                                                        <label for="customCheckbox7223" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7224" value="option1">
                                                        <label for="customCheckbox7224" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7225" value="option1">
                                                        <label for="customCheckbox7225" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7226" value="option1">
                                                        <label for="customCheckbox7226" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td> -</td>
                                                <td>Rp. -</td>
                                            </tr>

                                            <tr>

                                                <td>c. Keperawatan</td>

                                                <td>
                                                    -
                                                </td>

                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7311" value="option1">
                                                        <label for="customCheckbox7311" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7312" value="option1">
                                                        <label for="customCheckbox7312" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7313" value="option1">
                                                        <label for="customCheckbox7313" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7314" value="option1">
                                                        <label for="customCheckbox7314" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7315" value="option1">
                                                        <label for="customCheckbox7315" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7316" value="option1">
                                                        <label for="customCheckbox7316" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td> -</td>
                                                <td>Rp. -</td>
                                            </tr>

                                            <tr>

                                                <td>d. Fisioterapi</td>

                                                <td>
                                                    -
                                                </td>

                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7411" value="option1">
                                                        <label for="customCheckbox7411" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7412" value="option1">
                                                        <label for="customCheckbox7412" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7413" value="option1">
                                                        <label for="customCheckbox7413" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7414" value="option1">
                                                        <label for="customCheckbox7414" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7415" value="option1">
                                                        <label for="customCheckbox7415" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7416" value="option1">
                                                        <label for="customCheckbox7416" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td> -</td>
                                                <td>Rp. -</td>
                                            </tr>

                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <th colspan="9" class="text-center"></th>
                                                <th class="text-center">TOTAL BIAYA</th>
                                                <th class="text-center">Rp. 0</th>


                                            </tr>

                                            <tr>

                                                <th colspan="9" class="text-center"></th>
                                                <th class="text-center">BIAYA INA CBGS</th>
                                                <th class="text-center">Rp. 0</th>


                                            </tr>
                                        </tfoot>
                                    </table>
                                    <td>
                                        <!-- <input type=button value="Proses" onclick="proses()"> -->
                                        <button type="button" value="Proses" onclick="proses()" class="btn btn-block bg-gradient-primary btn-lg">SIMPAN</button>
                                    </td>
                                </div>

                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2023 <a href="https://adminlte.io">ITI RSUD Ajibarang</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/jszip/jszip.min.js"></script>
    <script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>