<!DOCTYPE html>
<html lang="tr">
<meta charset="UTF-8">

<head>
    <title>Odev4</title>
</head>
<style>
    table {

        border: 1px solid black;
        margin: auto;
        height: 35px;
        text-align: center;
        margin-top: 20px;
        font-size: 16px;
    }

    .baslik {
        border: 1px solid yellow;
        margin: auto;
        height: 35px;
        text-align: center;
        margin-top: 20px;
        color: white;
        background-color: blue;
        font-size: 20px;
    }
</style>
<?php
include("kontrol.class.php");
$kontrol = new Kontrol();
if (isset($_POST["tckimlik"]) && isset($_POST["adsoyad"])) {
    $kontrol->tcNo = $_POST["tckimlik"];
    $kontrol->adsoyad = $_POST["adsoyad"];
    $tcNoDurum = $kontrol->tcNoKontrol();
    $kontrol->tcNoDurum = $tcNoDurum;
    $kontrol->kayitEkle();
}
$liste = $kontrol->listele();
?>

<body style="text-align:center;">
    <h3 style="text-align:left;"><strong>FORM SAYFASI: </strong></h3>
    <form action="index.php" method="post">
        <h3><strong>Ad Soyad:</strong></h3>
        <input type="text" name="adsoyad">
        <br>
        <h3><strong>TC Kimlik Numarası:</strong></h3>
        <input type="number" required name="tckimlik" min="10000000000">
        <br><br>
        <button type="submit" required style="background-color:blue; color:white;">Doğrula ve Kaydet</button>
    </form>
    <br><br>
    <h3 style="text-align:left;"><strong>Veritabanı Tablosu: </strong></h3>
    <?php
    if ($liste->rowCount() > 0) {
        echo "
     <br>
     <table width='80%' border='1'> 
     <tr>
         <td class='baslik'><b>Id</b></td>
         <td class='baslik'><b>Adı Soyadı</b></td>
         <td class='baslik'><b>TC Kimlik Numarası</b></td>
         <td class='baslik'><b>Durum</b></td>
     </tr>
     ";

        foreach ($liste as $satir) {
            echo "<tr>
                    <td>" . $satir['id'] . "</td>
                    <td>" . $satir['adsoyad'] . "</td>
                    <td>" . $satir['tckimlik'] . "</td>
                    <td>" . $satir['durum'] . "</td>";
        }
        echo "<tr>";
        echo '<td colspan=4>Sistemde Toplam -' . $liste->rowCount() . '- kayıt var.</td>';
        echo "</tr>";
    } else {
        echo "<h2 style='text-align:center ;'><strong>VERİTABANINDA KAYIT BULUNAMADI <br>LÜTFEN YUKARIDAN YENİ KAYIT EKLEYİNİZ</strong></h2>";
    }


    echo "</table>";
    ?>
</body>

</html>