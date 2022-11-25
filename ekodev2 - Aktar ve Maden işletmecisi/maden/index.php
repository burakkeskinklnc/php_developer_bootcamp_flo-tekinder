<?php
include("function.php");
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ek Ödev2 - Maden İşletmesi</title>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        margin: auto;
        height: 40px;
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
    }

    input[type=submit] {
        padding: 10px;
        margin-top: 5px;
        background-color: blue;
        color: white;
        text-align: center;

    }

    form {
        margin: 0 auto;
        width: 90%;
    }

    .bg-gray {
        background-color: gray;
    }

    .bg-blue {
        background-color: #03b6fc;
    }
</style>

<body style="text-align:center;margin:0 auto;padding:25px;">

    <fieldset name="main" style="width:70%;height:auto;margin:0 auto;">
        <legend style="font-size:24px;"><strong>***Cevher v1.0***:</strong></legend>
        <br><br>
        <fieldset name="table" style="width:70%;margin:0 auto;">
            <h3><strong>Cevher Değer Tablosu:</strong></h3>
            <br>
            <table style="width:50%">
                <tr class="bg-blue">
                    <th>Cevher</th>
                    <th>Kodu</th>
                    <th>Fiyat</th>
                </tr>
                <tr>
                    <th>Demir</th>
                    <th>DMR</th>
                    <th>1500</th>
                </tr>
                <tr class="bg-gray">
                    <th>Krom</th>
                    <th>KRM</th>
                    <th>5000</th>
                </tr>
                <tr>
                    <th>Bakır</th>
                    <th>BKR</th>
                    <th>3000</th>
                </tr>
                <tr class="bg-gray">
                    <th>Kömür</th>
                    <th>KMR</th>
                    <th>500</th>
                </tr>
            </table>
            <br> <br>

            <table style="width:50%">
                <tr class="bg-blue">
                    <th>Tane</th>
                    <th>Kodu</th>
                    <th>Etkisi(%)</th>
                </tr>
                <tr>
                    <th>Erik</th>
                    <th>1</th>
                    <th>-15</th>
                </tr>
                <tr class="bg-gray">
                    <th>Portakal</th>
                    <th>2</th>
                    <th>-10</th>
                </tr>
                <tr>
                    <th>Karpuz</th>
                    <th>3</th>
                    <th>0</th>
                </tr>
            </table>
        </fieldset>
        <?php
        echo '
            
            <form method="post" action="index.php">
                <label for="name"><h3><strong>Müşterinin Bilgileri:</strong></h3></label>
                <br><br>
                <fieldset name="urun" style="width:50%;margin:0 auto;">
                    <label for="musteriAdi">Müşterinin Adı :</label>
                    <input type="text" name="musteriAdi" required size="10"> 
                    <br><br>
                    <label for="musteriSoyadi">Müşterinin Soyadı :</label>
                    <input type="tetx" name="musteriSoyadi" required size="10">
                    <br><br>
                    <label for="cevherKod">Cevherin Kodu:</label>
                    <input type="text" name="cevherKod" required  size="10">
                    <br><br>
                    <label for="cevherTane">Cevherin Tane Büyüklüğü:</label>
                    <input type="number" name="cevherTane" required min="1" max="3" size="10">
                    <br><br>
                    <label for="temizlik">Temizlik Oranı:</label>
                    <input type="number" name="temizlik" required min="1" max="100" size="10"> 
                    <br><br>
                    <label for="miktar">Miktar (ton):</label>
                    <input type="number" name="miktar" required min="1" size="10">
                </fieldset>
                <br><br>
                <input type="submit" value="Hesapla">
                </form>
            ';
        ?>
        <br><br>
        <hr>
        <?php

        if (
            isset($_POST['musteriAdi']) &&
            isset($_POST['musteriSoyadi']) &&
            isset($_POST['cevherKod']) &&
            isset($_POST['cevherTane']) &&
            isset($_POST['temizlik']) &&
            isset($_POST['miktar'])
        ) {
            $cevher = cevherFiyat($_POST['cevherKod']);
            $tane = taneEtkisi($_POST['cevherTane']);
            $fiyat = $cevher['fiyat'] - (($cevher['fiyat']  * $tane['etkisi']) / 100);
            $temizlikEtkisi = temizlikEtkisi($_POST['temizlik'], $fiyat);
            $birimFiyat = $fiyat - $temizlikEtkisi;
            $toplam = $birimFiyat * $_POST['miktar'];
            $kdv = $toplam * 8 / 100;
            $genelToplam = $toplam + $kdv;
            echo '<br><br><h2><strong>FATURA:</strong></h2>';
            echo "<h3>Alıcı : " . $_POST['musteriAdi'] . " " .  $_POST['musteriSoyadi'] . "</h3>";
            echo "<h3>Cevher Türü : " . $cevher['cevher'] . "</h3>";
            echo "<h3>Normal Birim Fiyat : " . $cevher['fiyat'] . " TON/TL</h3>";
            echo "<h3>Tane : " . $tane['taneAdi'] . " (-%" . $tane['etkisi'] . ")</h3>";
            echo "<h3> " . $tane['taneAdi'] . " Fiyat :  " . $fiyat . " TON/TL</h3>";
            echo "<h3>Temizlik : %" . $_POST['temizlik'] . ", Etkisi : -" . $temizlikEtkisi . " TL</h3>";
            echo "<h3>Temizlik Etkisi Sonrası</h3>";
            echo "<h3>Birim fiyat : " . $birimFiyat . " TON/TL</h3>";
            echo "<h3>Toplam : " . $toplam . " TL</h3>";
            echo "<h3>KDV (%8) : " . $kdv . " TL</h3>";
            echo "<h3>Genel Toplam : " . $genelToplam . " TL</h3>";
            echo "<h3>Mega Madencilik, 2022 </h3>";
        } else {
            echo '<h2>Fatura kısmını görüntüleyebilmek için satış yaptığınızdan emin olun.</h2>';
        }

        echo ' ';
        echo ' </fieldset>';
        ?>
</body>