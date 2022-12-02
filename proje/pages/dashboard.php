<?php
include "../controller/mainclass.php";
$mainclass = new mainclass();
$emlaklar = $mainclass->emlakBilgisiGetir();

if (isset($_SESSION["user"])) {
} else {
    header("Location:http://localhost:90/proje/index.php");
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

    <title>Emlak v1 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/thirdparty/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/thirdparty/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-text mx-3">Emlak <sup>v1</sup></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Emlak Listesi</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="yenikayit.php">
                    <i class="fas fa-plus"></i>
                    <span>Yeni İlan</span></a>
            </li>
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




                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user']; ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo $_SESSION['pp']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Çıkış Yap
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Emlak Listesi</h1>
                        <a href="csvaktar.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> CSV olarak Kaydet</a>
                    </div>

                    <body id="page-top">

                        <!-- Page Wrapper -->
                        <div id="wrapper">

                            <!-- Content Wrapper -->
                            <div id="content-wrapper" class="d-flex flex-column">

                                <!-- Main Content -->
                                <div id="content">


                                    <!-- Begin Page Content -->
                                    <div class="container-fluid">
                                        <!-- DataTales Example -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Emlak Listesi</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="emlakDataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>İlan ID</th>
                                                                <th>İlan Fotoğrafı</th>
                                                                <th>İlan Adı</th>
                                                                <th>Açıklama</th>
                                                                <th>Fiyat</th>
                                                                <th>Adres</th>
                                                                <th>Emlak Bilgisi</th>
                                                                <th>İşlemler</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($emlaklar as $emlak) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $emlak['id']; ?></td>
                                                                    <td><?php echo "<img src='" . $emlak['resim1'] . "' style='width:100px; margin-left:auto;margin-right:auto;display:block;' />"; ?></td>
                                                                    <td><?php echo $emlak['ilanBaslik']; ?></td>
                                                                    <td><?php echo $emlak['ilanAciklama']; ?></td>
                                                                    <td><?php echo $emlak['emlakFiyat'] . " ₺"; ?></td>
                                                                    <td><?php echo $emlak['ilAdi'] . "-" . $emlak['ilceAdi'];
                                                                        echo "<br>Emlak Kategori: " . $emlak['emlakKategori']; ?></td>
                                                                    <td><?php echo "Emlak Türü: " . $emlak['emlakTuru'] . "<br>Mt<sup>2</sup>: " . $emlak['metrekare'] . "<br>Oda :  " . $emlak['odaSayisi'] . "<br>Bina Yaşı : " . $emlak['binaYasi'] . "<br>Bulunduğu Kat : " . $emlak['bulunduguKat'] . "<br>İlan Oluşturulma Tarihi: " .  date("d-m-Y", strtotime($emlak['olusturmaTarihi']));; ?></td>
                                                                    <td>
                                                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                                            <button type='button' data-id='<?php echo $emlak['id']; ?>' class="btn btn-danger btn-icon emlakSil"><i class="fa fa-times"></i></button>
                                                                            <a href='ilandetay.php?id=<?php echo $emlak['id']; ?>' class="btn btn-success btn-icon "><i class="fa fa-eye"></i></a>
                                                                            <a href='duzenle.php?id=<?php echo $emlak['id']; ?>' class="btn btn-info btn-icon "><i class="fa fa-edit"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.container-fluid -->

                                </div>
                                <!-- End of Main Content -->

                            </div>
                            <!-- End of Content Wrapper -->

                        </div>
                        <!-- End of Page Wrapper -->

                        <!-- Scroll to Top Button-->
                        <a class="scroll-to-top rounded" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>
                        <!-- Logout Modal-->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Oturum Kapatılacaktır</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Çıkış yapmak istediğinize emin misiniz?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hayır</button>
                                        <a class="btn btn-primary" href="../logout.php">Çıkış Yap</a>
                                    </div>
                                </div>
                            </div>
                        </div>





                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Burak Keskinkılınç - 2022</span>
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

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../assets/thirdparty/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/thirdparty/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../assets/thirdparty/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../assets/thirdparty/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../assets/thirdparty/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../assets/thirdparty/js/demo/chart-area-demo.js"></script>
        <script src="../assets/thirdparty/js/demo/chart-pie-demo.js"></script>

        <!-- Page level plugins -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="../assets/thirdparty/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="../assets/js/main.js"></script>

</body>

</html>