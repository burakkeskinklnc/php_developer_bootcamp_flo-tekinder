<?php
include("function.php");
session_start();
if (isset($_POST["kekik"]) && isset($_POST["nane"]) && isset($_POST["feslegen"]) && isset($_POST["reyhan"])) {
    $_SESSION["kekik"] = $_POST["kekik"];
    $_SESSION["nane"] = $_POST["nane"];
    $_SESSION["feslegen"] = $_POST["feslegen"];
    $_SESSION["reyhan"] = $_POST["reyhan"];
    $kayittable = hazir();
}

if (isset($_POST["satisotsecim"]) && isset($_POST["satistazelik"]) && isset($_POST["satiskg"])) {
    $kayittable = true;
    $fatura = hesapla($_POST["satisotsecim"], $_POST["satistazelik"], $_POST["satiskg"], $_SESSION["kekik"], $_SESSION["nane"], $_SESSION["feslegen"], $_SESSION["reyhan"]);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ek Ödev2 - Aktar İşletmesi</title>
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
        <legend style="font-size:24px;"><strong>***Ot Master v1.0***:</strong></legend>
        <br><br>
        <?php
        echo ' 
    ';

        if ($kayittable == true) {
            echo '
        <fieldset name="table" style="width:70%;margin:0 auto;">
          <h1>Ürün Tablosu:</h1>
          <br>
          <table style="width:50%">
            <tr class="bg-blue">
                    <th>OT</th>
                    <th>Kodu</th>
                    <th>Tazelik Kaybının Fiyat Etkisi</th>
                    <th>KG Birim Fiyat</th>
            </tr>
            <tr>
                    <th>Kekik</th>
                    <th>1</th>
                    <th>-%10</th>
                    <th>' . $_SESSION["kekik"] . ' TL</th>
            </tr>
            <tr class="bg-gray">
                    <th>Nane</th>
                    <th>2</th>
                    <th>-%20</th>
                    <th>' . $_SESSION["nane"] . ' TL</th>
            </tr>
            <tr>
                    <th>Fesleğen</th>
                    <th>3</th>
                    <th>-%10</th>
                    <th>' . $_SESSION["feslegen"] . ' TL</th>
            </tr>
            <tr  class="bg-gray">
                    <th>Reyhan</th>
                    <th>4</th>
                    <th>-%25</th>
                    <th>' . $_SESSION["reyhan"] . ' TL</th>
            </tr>
        </table>
        <br> <br>
        ';
            echo '</fieldset>';
        } else {
            echo '
            
            <form method="post" action="index.php">
                <label for="name"><h3><strong>Kg başı Ot fiyatlarını giriniz:</strong></h3></label>
                <br><br>
                <fieldset name="urun" style="width:50%;margin:0 auto;">
                    <label for="name">Kekik birim fiyat (1 kg için):</label>
                    <input type="number" name="kekik" required min="1" max="1000" size="10"> TL
                    <br><br>
                    <label for="name">Nane birim fiyat (1 kg için):</label>
                    <input type="number" name="nane" required min="1" max="1000" size="10"> TL
                    <br><br>
                    <label for="name">Fesleğen birim fiyat (1 kg için):</label>
                    <input type="number" name="feslegen" required min="1" max="1000" size="10"> TL
                    <br><br>
                    <label for="name">Reyhan birim fiyat (1 kg için):</label>
                    <input type="number" name="reyhan" required min="1" max="1000" size="10"> TL
                </fieldset>
                <br><br>
                <input type="submit" value="Ürünleri Satışa Hazırla">
                </form>
            ';
        }

        ?>

        <br><br>
        <hr>
        <?php


        if ($kayittable == true) {
            echo '
            <br><br>
            <fieldset name="satis" style="width:70%;margin:0 auto;">
            <h2><strong>SATIŞ:</strong></h2>
            <br><br>
            <form method="post" action="index.php">
                <br><br>
                <label for="ot">Satın Alınacak Ot:</label>
             
                <select name="satisotsecim" id="ot">
                    <option value="kekik">Kekik</option>
                    <option value="nane">Nane</option>
                    <option value="feslegen">Fesleğen</option>
                    <option value="reyhan">Reyhan</option>
                </select>
                <label for="ot">Ürün Tazelik Durumu:</label>
         
                <select name="satistazelik" id="ot">
                    <option value="taze">Taze</option>
                    <option value="tazedegil">Taze Değil</option>
                </select>
             
                <br><br>
                <label for="name">Miktar(kg):</label>
                <input type="number" name="satiskg" required min="1" max="1000" size="5">
    
                <br><br>
                <input type="submit" value="Satış yap">
            </form>
            </fieldset>
        ';
        } else {
            echo '<h2>Lütfen ürünleri satışa hazır hale getirin.</h2><br><hr>';
        }
        if ($fatura['fatura'] == true) {
            echo '<br><br><h2><strong>FATURA:</strong></h2>';
            echo "<h3>Tür : " . $fatura['tur'] . "</h3>";
            echo "<h4>Miktar : " . $fatura['miktar'] . " kg </h4>";
            echo "<h4>Tazelik Kaybının Fiyata Etkisi : " . $fatura['tazelikkaybi'] . " TL </h4>";
            echo "<h4>Toplam : " . $fatura['toplam'] . " TL </h4>";
            echo "<h4>KDV : " . $fatura['kdv'] . " TL </h4>";
            echo "<h4>Genel Toplam : " . $fatura['genelToplam'] . " TL </h4>";
        } else {
            echo '<h2>Fatura kısmını görüntüleyebilmek için satış yaptığınızdan emin olun.</h2>';
        }

        echo ' ';
        echo ' </fieldset>';
        ?>
</body>