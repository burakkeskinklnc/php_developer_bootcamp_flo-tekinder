<?php
include "controller/mainclass.php";
$mainclass = new mainclass();
if (isset($_SESSION["user"])) {
    header("Location:http://localhost:90/proje/pages/dashboard.php");
} else {
}
if (isset($_POST['kullaniciAdi']) && isset($_POST['sifre'])) {

    $control = $mainclass->logincontrol($_POST['kullaniciAdi'], $_POST['sifre']);
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emlak Projesi - Giriş Yap</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/main.css">
</head>


<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Admin Giriş</h2>
                                <p class="text-white-50 mb-5">Lütfen Kullanıcı Adı ve Şifrenizi Yazınız!</p>
                                <form action="index.php" method="POST">
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="typeTextX" name="kullaniciAdi" class="form-control form-control-lg" autocomplete="off" required />
                                        <label class="form-label" for="typeTextX">Kullanıcı Adı</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" name="sifre" class="form-control form-control-lg" autocomplete="off" required />
                                        <label class="form-label" for="typePasswordX">Şifre</label>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Giriş Yap</button>
                                </form>
                                <?php


                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php
        if (isset($_POST['kullaniciAdi']) && isset($_POST['sifre'])) {
            if (count($control) > 0) {
                $_SESSION["user"] = $control[0]['adsoyad'];
                $_SESSION["pp"] = $control[0]['pp'];
        ?>
                Swal.fire({
                    title: 'Oturum Açma İşlemi Başarılı!',
                    text: 'Yönlendiriliyorsunuz...',
                    icon: 'success',
                    confirmButtonText: 'Tamam'
                })
            <?php
                header("Refresh: 1.6; url=http://localhost:90/proje/pages/dashboard.php");
            } else {
            ?>
                Swal.fire({
                    title: 'Hata!',
                    text: 'Kullanıcı adı/ parola yanlış',
                    icon: 'error',
                    confirmButtonText: 'Tamam'
                })
        <?php
            }
        }
        ?>
    </script>
</body>

</html>