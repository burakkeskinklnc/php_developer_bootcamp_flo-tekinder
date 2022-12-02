<?php
include "../controller/mainclass.php";
$mainclass = new mainclass();

if (isset($_SESSION["user"])) {
} else {
    header("Location:http://localhost:90/proje/index.php");
}

$response = array(
    "error" => "0",
    "text" => "İşlem Başarılı"
);
if (isset($_POST['ilanBaslik'])) {
   
    try {
        $hedef_dizin = "../uploads/";
        if (isset($_FILES['resim1'])) {
            $dosyaYolu = $_FILES['resim1']['name'];
            $dosyaUzanti = pathinfo($dosyaYolu, PATHINFO_EXTENSION);
            $hedef_dosya1 = $hedef_dizin . $mainclass->randomString() . "." . $dosyaUzanti;
            move_uploaded_file($_FILES["resim1"]["tmp_name"], $hedef_dosya1);
        }

        if (isset($_FILES['resim2'])) {
            $dosyaYolu = $_FILES['resim2']['name'];
            $dosyaUzanti = pathinfo($dosyaYolu, PATHINFO_EXTENSION);
            $hedef_dosya2 = $hedef_dizin . $mainclass->randomString() . "." . $dosyaUzanti;
            move_uploaded_file($_FILES["resim2"]["tmp_name"], $hedef_dosya2);
        }

        if (isset($_FILES['resim3'])) {
            $dosyaYolu = $_FILES['resim3']['name'];
            $dosyaUzanti = pathinfo($dosyaYolu, PATHINFO_EXTENSION);
            $hedef_dosya3 = $hedef_dizin . $mainclass->randomString() . "." . $dosyaUzanti;
            move_uploaded_file($_FILES["resim3"]["tmp_name"], $hedef_dosya3);
        }

        $array = ([
            "ilanBaslik" => $_POST['ilanBaslik'],
            "ilanAciklama" => $_POST['aciklama'],
            "emlakTuru" => $_POST['emlakTuru'],
            "emlakFiyat" => $_POST['emlakFiyat'],
            "olusturmaTarihi" => $_POST['olusturmaTarihi'],
            "emlakKategori" => $_POST['emlakKategori'],
            "il" => $_POST['il'],
            "ilce" => $_POST['ilce'],
            "metrekare" => $_POST['metrekare'],
            "odaSayisi" => $_POST['odaSayisi'],
            "binaYasi" => $_POST['binaYasi'],
            "bulunduguKat" => $_POST['bulunduguKat'],
            "resim1" => $hedef_dosya1,
            "resim2" => $hedef_dosya2,
            "resim3" => $hedef_dosya3,
        ]);

        $mainclass->emlakEkle($array);
    } catch (error) {
        $response = array(
            "error" => "1",
            "text" => "İşlem gerçekleştirilemedi"
        );
    }
}


$json = json_encode($response, JSON_UNESCAPED_UNICODE);
echo $json;
