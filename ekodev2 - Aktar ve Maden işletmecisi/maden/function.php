<?php
error_reporting(0);
session_start();

function cevherFiyat($kod)
{
    $fiyat = 0;
    $cevherAdi = "";
    if ($kod === "DMR") {
        $fiyat = 1500;
        $cevherAdi = "Demir";
    }
    if ($kod === "KRM") {
        $fiyat = 5000;
        $cevherAdi = "Krom";
    }
    if ($kod === "BKR") {
        $fiyat = 3000;
        $cevherAdi = "Bakır";
    }
    if ($kod === "KMR") {
        $fiyat = 500;
        $cevherAdi = "Kömür";
    }
    $cevher = array(
        "cevher" => $cevherAdi,
        "fiyat" => $fiyat
    );
    return $cevher;
}

function taneEtkisi($kod)
{
    $etkisi = 0;
    $taneAdi = "Karpuz";
    if ($kod == 1) {
        $etkisi = 15;
        $taneAdi = "Erik";
    }
    if ($kod == 2) {
        $etkisi = 10;
        $taneAdi = "Portakal";
    }
    $tane = array(
        "etkisi" => $etkisi,
        "taneAdi" => $taneAdi
    );
    return $tane;
}

function temizlikEtkisi($temizlikOrani, $taneEtkisiFiyat)
{
    $fiyatDegisimTemizlik = $taneEtkisiFiyat - (($taneEtkisiFiyat * $temizlikOrani) / 100);

    return $fiyatDegisimTemizlik;
}
