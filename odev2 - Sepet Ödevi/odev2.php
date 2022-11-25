<?php
session_start();
$urunler = array(
    array("urunadi" => "Ülker Çikolatalı Gofret 40 gr.", "fiyat" => 10),
    array("urunadi" => "Eti Damak Kare Çikolata 60 gr.", "fiyat" => 20),
    array("urunadi" => "Nestle Bitter Çikolata 50 gr.", "fiyat" => 20),
);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İkinci Hafta Sepet örneği</title>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        margin: auto;
        height: 35px;
        text-align: center;
        margin-top: 20px;
    }

    input[type=submit] {
        margin-left: 82%;
        padding: 10px;
        margin-top: 5px;
        background-color: blue;
        color: white;
        text-align: center;

    }

    .sepet {
        text-indent: 100px;
    }
</style>

<body>

    <form method="post" action="odev2.php">
        <fieldset>
            <legend>Ürünler:</legend>
            <table style="width:80%">
                <tr>
                    <th>Ürün Adı</th>
                    <th>Ürün Fiyatı</th>
                    <th>Adet</th>
                </tr>
                <?php
                foreach ($urunler as $urunleer) {
                    echo "<tr>
                    <td>" . $urunleer['urunadi'] . "</td>
                    <td>" . $urunleer['fiyat'] . " TL</td>
                    <td> <input type='number' min='0' max='100' name= 'adetler[]'></td>
                    </tr>
                    ";
                }

                ?>

            </table>
            <input type="submit" value="Ürünleri Sepete Ekle">
            <input type="submit" name="sepetiSifirla" value="Sepeti sıfırla">
        </fieldset>
    </form>
    <br>
    <hr>
    <h2 class="sepet"><b>Sepetiniz: </b></h2>


    <?php
    if (isset($_POST['sepetiSifirla'])) {
        session_destroy();
        header("location:odev2.php");
    }


    if (isset($_POST['adetler'])) {
        $urunadeti = $_POST['adetler'];
    }

    if (isset($_SESSION["urun1"]) == true && isset($urunadeti[0]) && $urunadeti[0] !== "" && $urunadeti[0] > 0) {
        $_SESSION["urun1"] = $_SESSION["urun1"] + $urunadeti[0];
    } else if (isset($_SESSION["urun1"]) == false && isset($urunadeti[0]) && $urunadeti[0] !== "" && $urunadeti[0] > 0) {
        $_SESSION["urun1"] = $urunadeti[0];
    }


    if (isset($_SESSION["urun2"])  == true && isset($urunadeti[1]) && $urunadeti[1] !== "" && $urunadeti[1] > 0) {
        $_SESSION["urun2"] = $_SESSION["urun2"] + $urunadeti[1];
    } else if (isset($_SESSION["urun2"])  == false && isset($urunadeti[1]) && $urunadeti[1] !== "" && $urunadeti[1] > 0) {
        $_SESSION["urun2"] = $urunadeti[1];
    }


    if (isset($_SESSION["urun3"])  == true && isset($urunadeti[2]) && $urunadeti[2] !== "" && $urunadeti[2] > 0) {
        $_SESSION["urun3"] = $_SESSION["urun3"] + $urunadeti[2];
    } else if (isset($_SESSION["urun3"])  == false && isset($urunadeti[2]) && $urunadeti[2] !== "" && $urunadeti[2] > 0) {
        $_SESSION["urun3"] = $urunadeti[2];
    }

    echo "<table border='1' width='80%'>
      <tr>
      <td>Ürün Adı</td>
      <td>Adet</td>
      <td>Toplam</td>
      </tr>";
    $toplam = 0;
    $geneltoplam = 0;
    $i = 1;
    foreach ($urunler as $urunleer) {
        $adet = 0;
        if (isset($_SESSION["urun" . $i])) {
            $adet = $_SESSION["urun" . $i];
        }
        $toplam = $adet * $urunleer['fiyat'];


        echo "<tr>
            <td>" . $urunleer['urunadi'] . "</td>
            <td>" . $adet . "</td>
            <td>" . $toplam . " TL</td>
            </tr>
            ";
        $geneltoplam = $geneltoplam + $toplam;
        $i++;
    }

    echo "
    <tr>
    <td colspan=2>Genel Toplam</td>
    <td>" . $geneltoplam . " TL</td>
    </tr>";
    echo "</table>";

    ?>

</body>

</html>