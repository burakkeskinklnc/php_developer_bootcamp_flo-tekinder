<?php

$baglan = new PDO("mysql:host=localhost;dbname=odev;charset=utf8", "burak", "1234");
$baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['ekle'])) {
    $adsoyad = $_POST["adsoyad"];
    $telefon = $_POST["telefon"];
}

$ekle = $baglan->prepare("INSERT INTO odev3 SET adsoyad=?,telefon=?");
$insert = $ekle->execute(array($adsoyad, $telefon));
if ($insert) {
    header("Location:kayit.php");
} else {
    echo "KAYIT EKLENEMEDİ!";
}
$baglan = null;
