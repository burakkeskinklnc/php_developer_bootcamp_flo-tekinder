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


if (isset($_POST['ilanBaslik']) && isset($_FILES['resim1'])) {
    $emlak = $mainclass->emlakDetayGetir($_POST['ilanId']);


    try {
        $hedef_dizin = "../uploads/";
        foreach ($emlak as $emlakVeri) {
            $hedef_dosya1 = $emlakVeri['resim1'];
            $hedef_dosya2 = $emlakVeri['resim2'];
            $hedef_dosya3 = $emlakVeri['resim3'];
        }

        if (isset($_FILES['resim1']) && $_FILES['resim1']['name'] !== "") {
            unlink($emlakVeri['resim1']);
            $dosyaYolu = $_FILES['resim1']['name'];
            $dosyaUzanti = pathinfo($dosyaYolu, PATHINFO_EXTENSION);
            $hedef_dosya1 = $hedef_dizin . $mainclass->randomString() . "." . $dosyaUzanti;
            move_uploaded_file($_FILES["resim1"]["tmp_name"], $hedef_dosya1);
        }

        if (isset($_FILES['resim2']) && $_FILES['resim2']['name'] !== "") {
            unlink($emlakVeri['resim2']);
            $dosyaYolu = $_FILES['resim2']['name'];
            $dosyaUzanti = pathinfo($dosyaYolu, PATHINFO_EXTENSION);
            $hedef_dosya2 = $hedef_dizin . $mainclass->randomString() . "." . $dosyaUzanti;
            move_uploaded_file($_FILES["resim2"]["tmp_name"], $hedef_dosya2);
        }

        if (isset($_FILES['resim3']) && $_FILES['resim3']['name'] !== "") {
            unlink($emlakVeri['resim3']);
            $dosyaYolu = $_FILES['resim3']['name'];
            $dosyaUzanti = pathinfo($dosyaYolu, PATHINFO_EXTENSION);
            $hedef_dosya3 = $hedef_dizin . $mainclass->randomString() . "." . $dosyaUzanti;
            move_uploaded_file($_FILES["resim3"]["tmp_name"], $hedef_dosya3);
        }

        $array = ([
            "id" => $_POST['ilanId'],
            "ilanBaslik" => $_POST['ilanBaslik'],
            "ilanAciklama" => $_POST['aciklama'],
            "emlakTuru" => $_POST['emlakTuru'],
            "emlakKategori" => $_POST['emlakKategori'],
            "emlakFiyat" => $_POST['emlakFiyat'],
            "olusturmaTarihi" => $_POST['olusturmaTarihi'],
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
        $mainclass->emlakGuncelle($array);
    } catch (error) {
        $response = array(
            "error" => "1",
            "text" => "İşlem gerçekleştirilemedi"
        );
    }
}


$json = json_encode($response, JSON_UNESCAPED_UNICODE);
echo $json;
