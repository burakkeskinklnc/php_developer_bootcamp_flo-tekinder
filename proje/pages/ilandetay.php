<?php
include "../controller/mainclass.php";
$mainclass = new mainclass();
if (isset($_SESSION["user"])) {
} else {
    header("Location:http://localhost:90/proje/index.php");
}
if (isset($_GET['id'])) {
    $emlak = $mainclass->emlakDetayGetir($_GET['id']);
}
$iller = $mainclass->ilGetir();

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
    <style>
        .object-fit_cover {
            -o-object-fit: cover;
            object-fit: cover;
        }

        .carousel-item>img {
            width: 100%;
            height: auto;
            max-height: 600px;
        }
    </style>
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
                    <i class="fa fa-plus"></i>
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
                                    Çıkış yap
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
                        <h1 class="h3 mb-0 text-gray-800">İlan Detay Sayfası</h1>
                    </div>

                    <?php foreach ($emlak as $emlakVeri) { ?>
                        <div class="col-xl-12 col-lg-12 col-md-9">
                            <form class="user" name="yeniEkle" onSubmit="return false;" enctype="multipart/form-data">
                                <div class="card o-hidden border-0 shadow-lg my-5">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">İlan Detay Sayfası</h1>
                                        </div>



                                        <div class="row">
                                            <div class="center mb-5" style="margin:auto;width:80%;">
                                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="<?php echo $emlakVeri['resim1']; ?>" alt="First slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="<?php echo $emlakVeri['resim2']; ?>" alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="<?php echo $emlakVeri['resim3']; ?>" alt="Third slide">
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="card-body p-0 col-xl-6">

                                                <!-- Nested Row within Card Body -->
                                                <div class="row">
                                                    <div class="col-lg-12">


                                                        <div class="form-group">
                                                            <label for="ilanBaslik">İlan Başlığı</label>
                                                            <input type="text" class="form-control" name="ilanBaslik" id="ilanBaslik" disabled="disabled" value="<?php echo $emlakVeri['ilanBaslik']; ?>" placeholder="">
                                                        </div>
                                                        <input type="hidden" name="olusturmaTarihi" value="<?php echo date('d-m-Y'); ?>">
                                                        <div class="form-group">
                                                            <label for="aciklama">İlan Açıklama</label>
                                                            <textarea style="resize: none;" rows="13" cols="20" class="form-control" id="aciklama" name="aciklama" placeholder="İlan Açıklamasını buraya yazınız.." minlength="10" maxlength="300" disabled="disabled"><?php echo $emlakVeri['ilanAciklama']; ?></textarea>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 ">
                                                                <div class="form-group">
                                                                    <label for="emlakFiyat">Emlak Fiyat</label>
                                                                    <input type="number" disabled="disabled" class="form-control" id="emlakFiyat" name="emlakFiyat" required value="<?php echo $emlakVeri['emlakFiyat']; ?>" placeholder="Emlak Fiyat Bilgisini buraya yazınız..">
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6 ">
                                                                <div class="form-group">
                                                                    <label for="metrekare">Metrekare</label>
                                                                    <input type="number" disabled="disabled" class="form-control" id="metrekare" name="metrekare" value="<?php echo $emlakVeri['metrekare']; ?>" required placeholder="Metrekare Bilgisini buraya yazınız..">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 ">
                                                                <div class="form-group">
                                                                    <label for="binaYasi">Bina Yaşı</label>
                                                                    <input type="number" disabled="disabled" class="form-control" id="binaYasi" name="binaYasi" value="<?php echo $emlakVeri['binaYasi']; ?>" placeholder="Bina Yaşı Bilgisini buraya yazınız..">
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6 ">
                                                                <div class="form-group">
                                                                    <label for="bulunduguKat">Bulunduğu Kat</label>
                                                                    <input type="number" disabled="disabled" class="form-control" id="bulunduguKat" value="<?php echo $emlakVeri['bulunduguKat']; ?>" name="bulunduguKat" placeholder="Bulunduğu Kat Bilgisini buraya yazınız..">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-body p-0 col-xl-6">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-1">
                                                        <div class="form-group ml-3">
                                                            <label for="il">İl: </label>
                                                            <select name="il" id="il" class="form-control" onchange="ilceGetir();" disabled="disabled" required>
                                                                <option value="">Seçiniz</option>
                                                                <?php foreach ($iller as $il) { ?>
                                                                    <option value="<?php echo $il['id']; ?>" <?php echo ($emlakVeri['il'] == $il['id'] ? "selected" : ""); ?>><?php echo $il['sehiradi']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-1">
                                                        <div class="form-group ml-3">
                                                            <label for="ilce">İlçe: </label>
                                                            <input type="hidden" id="ilceId" value="<?php echo $emlakVeri['ilce']; ?>">
                                                            <select name="ilce" id="ilce" class="form-control" disabled="disabled" required>
                                                                <option value="">Seçiniz</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-1">
                                                        <div class="form-group ml-3">
                                                            <label for="emlakTuru">Emlak Türü: </label>
                                                            <select name="emlakTuru" id="emlakTuru" disabled="disabled" class="form-control" required>
                                                                <option value="">Seçiniz</option>
                                                                <option value="Satılık" <?php echo ($emlakVeri['emlakTuru'] === "Satılık" ? "selected" : ""); ?>>Satılık</option>
                                                                <option value="Kiralık" <?php echo ($emlakVeri['emlakTuru'] === "Kiralık" ? "selected" : ""); ?>>Kiralık</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-1">
                                                        <div class="form-group ml-3">
                                                            <label for="emlakKategori">Emlak Kategorisi: </label>
                                                            <select name="emlakKategori" disabled="disabled" id="emlakKategori" class="form-control" required>
                                                                <option value="">Seçiniz</option>
                                                                <option value="Konut" <?php echo ($emlakVeri['emlakKategori'] === "Konut" ? "selected" : ""); ?>>Konut</option>
                                                                <option value="Villa" <?php echo ($emlakVeri['emlakKategori'] === "Villa" ? "selected" : ""); ?>>Villa</option>
                                                                <option value="Arsa" <?php echo ($emlakVeri['emlakKategori'] === "Arsa" ? "selected" : ""); ?>>Arsa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-1">
                                                        <div class="form-group ml-3">
                                                            <label for="odaSayisi">Oda Sayısı: </label>
                                                            <select name="odaSayisi" id="odaSayisi" disabled="disabled" class="form-control" required>
                                                                <option value="">Seçiniz</option>
                                                                <option value="1+0" <?php echo ($emlakVeri['odaSayisi'] === "1+0" ? "selected" : ""); ?>>1+0</option>
                                                                <option value="1+1" <?php echo ($emlakVeri['odaSayisi'] === "1+1" ? "selected" : ""); ?>>1+1</option>
                                                                <option value="2+1" <?php echo ($emlakVeri['odaSayisi'] === "2+1" ? "selected" : ""); ?>>2+1</option>
                                                                <option value="3+0" <?php echo ($emlakVeri['odaSayisi'] === "3+0" ? "selected" : ""); ?>>3+0</option>
                                                                <option value="3+1" <?php echo ($emlakVeri['odaSayisi'] === "3+1" ? "selected" : ""); ?>>3+1</option>
                                                                <option value="4+1" <?php echo ($emlakVeri['odaSayisi'] === "4+1" ? "selected" : ""); ?>>4+1</option>
                                                                <option value="4+2" <?php echo ($emlakVeri['odaSayisi'] === "4+2" ? "selected" : ""); ?>>4+2</option>
                                                                <option value="5+1" <?php echo ($emlakVeri['odaSayisi'] === "5+1" ? "selected" : ""); ?>>5+1</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <div class="row">
                                                <div class="ml-4">
                                                    <button class="btn btn-primary" type="submit" onclick="location.href='dashboard.php';"><i class="fa fa-arrow-left"></i> Emlak Listesine dön</button>
                                                </div>

                                                <div class="col-lg-6 mb-1">
                                                    <div class="ml-3">
                                                        <button class="btn btn-warning h-100" type="submit" onclick="location.href='duzenle.php?id=<?php echo $emlakVeri['id']; ?>';"><i class="fa fa-edit"></i> Bu ilanı düzenle</button>
                                                    </div>
                                                </div>


                                            </div>
                                            </div>
                                        </div>

                                    </div>
                            </form>


                        </div>
                        <!-- /.container-fluid -->


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

                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../assets/js/main.js"></script>

</body>

</html>