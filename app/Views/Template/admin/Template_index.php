<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/css/Utama.css">

    <link rel="stylesheet" href="<?= base_url() ?>/css/Admin/admin.css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>/Admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SITIKET</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url() ?>/Admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <?php if (session()->get('level') === '1') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/MySistemTiket/pesanan" aria-controls="collapseTwo">
                        <i class="fas fa-comments"></i>
                        <span>Konfirmasi Pesanan</span>
                    </a>
                </li>


                <div class="sidebar-heading">
                    Users
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTw" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-users"></i>
                        <span>User sitiket</span>
                    </a>
                    <div id="collapseTw" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url() ?>/Admin/dataUser">Admin dan Petugas</a>
                        </div>
                    </div>
                </li>


                <div class="sidebar-heading">
                    tranportasi
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-bus"></i>
                        <span>data rute tranportasi</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">


                            <?php foreach ($type as $data) : ?>
                                <!-- <a class="collapse-item" href="<?= base_url() ?>/Admin/pesawat/<?= $data['id_type_transportasi'] ?>"><?= $data['nama_type'] ?></a> -->
                                <a class="collapse-item" href="<?= base_url() ?>/Admin/pesawat/<?= $data['kode'] ?>"><?= $data['nama_type'] ?></a>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#arunika" aria-expanded="true" aria-controls="arunika">
                        <i class="fas fa-bus"></i>
                        <span>data type tranportasi</span>
                    </a>
                    <div id="arunika" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url() ?>/Admin/Transtype">type trasnportasi</a>
                            <a class="collapse-item" href="<?= base_url() ?>/Admin/detailharga">data trasnportasi</a>
                        </div>
                    </div>
                </li>

                <div class="sidebar-heading">
                    Laporan Bulanan
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/MySistemTiket/laporan" aria-controls="collapseTwo">
                        <i class="fas fa-paste"></i>
                        <span>Laporan Bulanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/Admin/aduan" aria-controls="collapseTwo">
                        <i class="fas fa-file-excel"></i>
                        <span>kurang puas</span>
                    </a>
                </li>

                <div class="sidebar-heading">
                    Profile
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/Admin/ProfilePengguna/<?= session()->get('slug') ?>" aria-controls="collapseTwo">
                        <i class="fas fa-users"></i>
                        <span>My Profile</span>
                    </a>
                </li>

            <?php elseif (session()->get('level') === '2') : ?>
                <div class="sidebar-heading">
                    Users
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#petugas" aria-expanded="true" aria-controls="petugas">
                        <i class="fas fa-users"></i>
                        <span>tambah petugas </span>
                    </a>
                    <div id="petugas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url() ?>/Admin/dataUser">tambah petugas</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/MySistemTiket/pesanan" aria-controls="collapseTwo">
                        <i class="fas fa-comments"></i>
                        <span>Konfirmasi Pesanan</span>
                    </a>
                </li>


                <div class="sidebar-heading">
                    tranportasi
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-bus"></i>
                        <span>data rute tranportasi</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">


                            <?php foreach ($type as $data) : ?>
                                <!-- <a class="collapse-item" href="<?= base_url() ?>/Admin/pesawat/<?= $data['id_type_transportasi'] ?>"><?= $data['nama_type'] ?></a> -->
                                <a class="collapse-item" href="<?= base_url() ?>/Admin/pesawat/<?= $data['kode'] ?>"><?= $data['nama_type'] ?></a>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#arunika" aria-expanded="true" aria-controls="arunika">
                        <i class="fas fa-bus"></i>
                        <span>data type tranportasi</span>
                    </a>
                    <div id="arunika" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url() ?>/Admin/Transtype">type trasnportasi</a>
                            <a class="collapse-item" href="<?= base_url() ?>/Admin/detailharga">data trasnportasi</a>
                        </div>
                    </div>
                </li>

                <div class="sidebar-heading">
                    Laporan Bulanan
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/MySistemTiket/laporan" aria-controls="collapseTwo">
                        <i class="fas fa-paste"></i>
                        <span>Laporan Bulanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/Admin/aduan" aria-controls="collapseTwo">
                        <i class="fas fa-file-excel"></i>
                        <span>kurang puas</span>
                    </a>
                </li>

                <div class="sidebar-heading">
                    Profile
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/Admin/ProfilePengguna/<?= session()->get('slug') ?>" aria-controls="collapseTwo">
                        <i class="fas fa-users"></i>
                        <span>My Profile</span>
                    </a>
                </li>

            <?php else : ?>
                <div class="sidebar-heading">
                    Profile
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/Admin/ProfilePengguna/<?= session()->get('slug') ?>" aria-controls="collapseTwo">
                        <i class="fas fa-users"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/MySistemTiket/pesanan" aria-controls="collapseTwo">
                        <i class="fas fa-comments"></i>
                        <span>Konfirmasi Pesanan</span>
                    </a>
                </li>

                <div class="sidebar-heading">
                    Laporan Bulanan
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/MySistemTiket/laporan" aria-controls="collapseTwo">
                        <i class="fas fa-paste"></i>
                        <span>Laporan Bulanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/Admin/aduan" aria-controls="collapseTwo">
                        <i class="fas fa-file-excel"></i>
                        <span>kurang puas</span>
                    </a>
                </li>
            <?php endif; ?>

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
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('username') ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url() ?>/img/users/<?= session()->get('gambar') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>/Admin/ProfilePengguna/<?= session()->get('slug') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>/MySistemTiket/laporan">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url() ?>/Auth/logout1" id="logout1">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?= $this->renderSection('content') ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/sbadmin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>/sbadmin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>/sbadmin/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>/sbadminjs/demo/chart-pie-demo.js"></script>
    <script src="<?= base_url() ?>/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/js/main.js"></script>

    <script>
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Earnings",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [0, <?= $pending['total_bayar'] ?>],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '$' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });


        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["pendapatan perbulan", "pendapatan perbulan", "pendapat pertahun"],
                datasets: [{
                    data: [0, <?= $jumlahUang ?>, <?= $pending['total_bayar'] ?>],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>

</body>

</html>