<?php
// include 'auth.php';

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect the user to the login page if not authenticated
    exit();
}

if (isset($_SESSION['pesan'])) {
    echo "<script>toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')</script>";
    unset($_SESSION['pesan']);
}
require_once 'db_connection.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SINAPS</title>

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
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">

    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">

    <link rel='icon' href='img/Logo.png'>

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
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="logout.php" class="btn btn-outline-danger">Sign Out</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SINAPS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="assets/dist/img/user4.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <?php

                        // Check if the user is logged in and the username session variable is set
                        if (isset($_SESSION['username'])) {
                            // Display the username
                            echo '<a href="#" class="d-block white-text">' . $_SESSION['username'] . '</a>';
                        } else {
                            // User is not logged in
                            echo '<a href="#" class="d-block white-text">Guest</a>';
                        }
                        ?>
                    </div>
                </div>



                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input required class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
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

                        <!-- <li class="nav-item">
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
                        </li> -->

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
                            <a href="cendraatas.php" class="nav-link">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>
                                    Cendrawasih Atas

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="cendrabawah.php" class="nav-link">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>
                                    Cendrawasih Bawah

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="kenariatas.php" class="nav-link">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>
                                    Kenari Atas

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="camarbawah.php" class="nav-link">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>
                                    Camar Bawah

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
                            <!-- <h1>DataTables</h1> -->
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <div class="card">
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                        <i class="fas fa-plus-circle"></i>
                                        Tambah Pasien
                                    </button>
                                    <!-- <button type="button" class="btn btn-success toastrDefaultSuccess">
                                        Launch Success Toast
                                    </button> -->

                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">

                                    <table id="example3" class="table table-bordered table-hover">

                                        <thead>

                                            <tr>
                                                <th>Nama Pasien</th>
                                                <th>NO. RM</th>
                                                <th>Masuk RS</th>
                                                <th>Ruangan</th>
                                                <th>Kelas BPJS</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Assuming you have established a database connection
                                            $sql = "SELECT NOMR, nama_pasien, masuk_rs, ruangan, kelas_bpjs FROM simrs.t_clinicalpathway WHERE ruangan = 'Cendrawasih Atas'";
                                            $result = mysqli_query($conn, $sql);

                                            // Check if there are any rows returned from the query
                                            if (mysqli_num_rows($result) > 0) {
                                                // Loop through each row of the result set
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $nama_pasien = $row["nama_pasien"];
                                                    $nomr = $row["NOMR"];
                                                    $masuk_rs = $row["masuk_rs"];
                                                    $ruangan = $row['ruangan'];
                                                    $kelas_bpjs = $row["kelas_bpjs"];
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $nama_pasien; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $nomr; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $masuk_rs; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ruangan; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $kelas_bpjs; ?>
                                                        </td>
                                                        <td>

                                                            <a href="<?php
                                                                        if ($kelas_bpjs == 'Kelas 1') {
                                                                            echo 'detailkelas1.php';
                                                                        } elseif ($kelas_bpjs == 'Kelas 2') {
                                                                            echo 'detailkelas2.php';
                                                                        } elseif ($kelas_bpjs == 'Kelas 3') {
                                                                            echo 'detailkelas3.php';
                                                                        }
                                                                        ?>?nomr=<?php echo $nomr ?>">



                                                                <button type="button" class="btn btn-block bg-gradient-primary btn-sm">Detail</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                // No rows found in the result set
                                                echo "<tr><td colspan='4'>No data found.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">


                                                <form method="post" action="controller/insert_data.php">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Tambah Pasien</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="nama_pasien">Nama Pasien</label>
                                                            <input required type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Masukan Nama Pasien">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="nomr">Nomor Rekam Medis</label>
                                                            <input required type="text" class="form-control" id="nomr" name="nomr" placeholder="Masukan No. RM">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Masuk RS</label>
                                                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                                                <input required type="date" class="form-control datetimepicker-input" name="masuk_rs" data-target="#reservationdatetime" />
                                                                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                                    <!-- <div class="input-group-text"><i class="fa fa-calendar"></i></div> -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleSelectBorder">Ruangan</label>
                                                            <select required class="custom-select form-control-border" name="ruangan" id="exampleSelectBorder">
                                                                <option>Pilih Ruangan</option>
                                                                <option>Cendrawasih Atas</option>
                                                                <option>Cendrawasih Bawah</option>
                                                                <option>Kenari Atas</option>
                                                                <option>Camar Bawah</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleSelectBorder">Kelas BPJS</label>
                                                            <select required class="custom-select form-control-border" name="kelas_bpjs" id="exampleSelectBorder">
                                                                <option>Pilih Kelas</option>
                                                                <option>Kelas 1</option>
                                                                <option>Kelas 2</option>
                                                                <option>Kelas 3</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                        <button type="submit" class="btn btn-primary" name="submit">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

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
            <strong>Copyright &copy; 2023 <a href="https://adminlte.io">ITI RSUD Ajibarang</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
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
    <!-- SweetAlert2 -->
    <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="assets/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->

    <!-- dropzonejs -->
    <script src="assets/plugins/dropzone/min/dropzone.min.js"></script>

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
            $('#example3').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                order: [
                    [1, 'desc']
                ] // Set the default ordering for the second column in ascending order

            });
            // $('.toastrDefaultSuccess').click(function () {
            //     toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            // });
            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });



            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
        });

        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>
</body>

</html>