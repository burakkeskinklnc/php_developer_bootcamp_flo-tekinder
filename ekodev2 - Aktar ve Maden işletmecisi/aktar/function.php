<?php
session_start();
$fiyat = 0;
$kekik = $_POST["kekik"];
$nane = $_POST["nane"];
$feslegen = $_POST["feslegen"];
$reyhan = $_POST["reyhan"];
$kayittable = false;


$satisotsecim = $_POST["satisotsecim"];
$satistazelik = $_POST["satistazelik"];
$satiskg = $_POST["satiskg"];


function hazir()
{
    $kayittable = true;
    return $kayittable;
}

function hesapla($satisotsecim, $satistazelik, $satiskg, $kekik, $nane, $feslegen, $reyhan)
{
    $toplam = 0;
    if ($satistazelik === "taze") {
        $tazelikKaybi = 0;
        if ($satisotsecim === "kekik") {
            $toplam = $satiskg * $kekik;
        }
        if ($satisotsecim === "nane") {
            $toplam = $satiskg * $nane;
        }
        if ($satisotsecim === "feslegen") {
            $toplam = $satiskg * $feslegen;
        }
        if ($satisotsecim === "reyhan") {
            $toplam = $satiskg * $reyhan;
        }
    } else {
        if ($satisotsecim === "kekik") {
            $tazelikKaybi = (($satiskg * $kekik) * 10 / 100);
            $toplam = ($satiskg * $kekik) - $tazelikKaybi;
        }
        if ($satisotsecim === "nane") {
            $tazelikKaybi = (($satiskg * $nane) * 20 / 100);
            $toplam = ($satiskg * $nane) - $tazelikKaybi;
        }
        if ($satisotsecim === "feslegen") {
            $tazelikKaybi = (($satiskg * $feslegen) * 10 / 100);
            $toplam = ($satiskg * $feslegen) - $tazelikKaybi;
        }
        if ($satisotsecim === "reyhan") {
            $tazelikKaybi = (($satiskg * $reyhan) * 25 / 100);
            $toplam = ($satiskg * $reyhan) - $tazelikKaybi;
        }
    }
    $kdv = $toplam * 18 / 100;
    $genelToplam = $toplam + $kdv;
    $fatura = array(
        "genelToplam" => $genelToplam,
        "kdv" => $kdv,
        "toplam" => $toplam,
        "tur" => $satisotsecim,
        "miktar" => $satiskg,
        "tazelikkaybi" => $tazelikKaybi,
        "satisdurum" => false,
        "fatura" => true
    );

    return $fatura;
}
