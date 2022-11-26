<?php
session_start();
include("baglan.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ek Ödev 1- İkinci Hafta Sepet örneği</title>
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

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST["adet"])) {
        $adet = (int)$_GET['adet'] + (int)$_POST['adet'];
        $query = $baglan->prepare("update urunlerliste set adet = ? where id = ?");
        $query->execute(array($adet, $id));
    }
}

if (isset($_GET['islem'])) {
    if ($_GET['islem'] === "sil") {
        $id = $_GET['id'];
        $query = $baglan->prepare("update urunlerliste set adet = 0 where id = ?");
        $query->execute(array($id));
    }
}

if (isset($_POST['sepetiSifirla'])) {
    $query = $baglan->prepare("update urunlerliste set adet = 0");
    $query->execute();
}


?>

<body>


    <fieldset>
        <legend>Ürünler:</legend>
        <table style="width:80%">
            <tr>
                <th>Ürün Adı</th>
                <th>Ürün Fiyatı</th>
                <th>Adet</th>
                <th>Ürün Sepete Ekle</th>
            </tr>
            <?php
            $urunler = $baglan->query("SELECT * FROM urunlerliste", (PDO::FETCH_ASSOC));
            foreach ($urunler as $urun) {
                echo "<tr>
                    <td>" . $urun['urunadi'] . "</td>
                    <td>" . $urun['fiyat'] . " TL</td>
                    
                    <form action='index.php?id=$urun[id]&adet=$urun[adet]' method='post'>
                    <td>  <input type='number' min='0' max='100' name= 'adet'></td>
                    <td><input type='submit' value='Ürünü Sepete Ekle'>
                 </form></td>
                    </tr>
                    ";
            }

            ?>

        </table>

    </fieldset>
    <br>
    <hr>
    <h2 class="sepet"><b>Sepetiniz: </b></h2>


    <?php


    echo "<table border='1' width='80%'>
      <tr>
      <td><strong>Ürün Adı</strong></td>
      <td><strong>Adet</strong></td>
      <td><strong>Toplam</strong></td>
      <td><strong>Ürün Sil</strong></td>
      </tr>";
    $toplam = 0;
    $geneltoplam = 0;
    $urunler2 = $baglan->query("SELECT * FROM urunlerliste", (PDO::FETCH_ASSOC));

    foreach ($urunler2 as $urun) {

        $toplam = $urun['adet'] * $urun['fiyat'];
        echo "<tr>
                <td>" . $urun['urunadi'] . "</td>
                <td>" . $urun['adet'] . "</td>
                <td>" . $toplam . " TL</td>
                <td><a href='index.php?islem=sil&id=$urun[id]' onclick=\"if (!confirm('Ürünü Silmek İstediğinize Emin misiniz?')) return false;\">Sil</a></td></td>
                </tr>
                ";
        $geneltoplam = $geneltoplam + $toplam;
    }


    echo "
    <tr>
    <td colspan=2>Genel Toplam</td>
    <td>" . $geneltoplam . " TL</td>
    <td>    <form method='post' action='index.php'>
    <input type='submit' name='sepetiSifirla' value='Sepeti sıfırla'></td>
    </tr>";
    echo "</table>";

    ?>

</body>

</html>