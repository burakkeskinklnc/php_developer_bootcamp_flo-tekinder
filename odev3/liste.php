<html>
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
</style>

</html>

<?php
error_reporting(0);

$baglan = new PDO("mysql:host=localhost;dbname=odev;charset=utf8", "burak", "1234");
$baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$satir = $baglan->query("SELECT * FROM odev3", (PDO::FETCH_ASSOC));
echo "<h3><strong>LİSTE SAYFASI: </strong></h3>";
echo "<br><br>";
echo "<table style='width:80%'>";
echo "<tr>";
echo "<th>" . "Adı Soyadı" . "</th>";
echo "<th>" . "Telefon Numarası" . "</th>";
echo "<th>" . "İşlem" . "</th>";

echo "</tr>";

foreach ($satir as $satirlar) {
    //echo $satirlar["adsoyad"] . " - " . $satirlar["telefon"] . "<br>";
    echo "<tr>
    <td>" . $satirlar["adsoyad"] . "</td>
    <td>" . $satirlar["telefon"] . "</td>
    <td><a href='liste.php?islem=sil&sirano=" . $satirlar["id"] . "'>Sil</a></td>
    </tr>
    ";
}

echo "<td colspan=3>";
echo 'Sistemde Toplam -' . $satir->rowCount() . '- kayıt var.';
echo "</td>";

echo "</table>";
if ($satirlar == null) {
    echo "<h2 style='text-align:center ;'><strong>VERİTABANINDA KAYIT BULUNAMADI <br>LÜTFEN YENİ KAYIT SAYFASINDAN KAYIT EKLEYİNİZ</strong></h2>";
}
$islem = $_GET["islem"];
$sirano = $_GET["sirano"];
if ($islem == "sil") {
    $sorgu = $baglan->query("delete from odev3 where id = " . $sirano);
    header("Location:liste.php");
    if ($sorgu) {
        echo "Silme işlemi başarılı.";
    } else {
        echo "Silme işlemi başarılı değil.";
    }
}
echo "<br><br>";
$baglan=null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ödev3</title>
</head>

<body>
    <div style="text-align:center ;">
        <a style="margin-right:10px;" href="index.html">Anasayfa</a>
        <a style="margin-right:10px;" href="liste.php">Kayıt Listesi</a>
        <a style="margin-right:10px;" href="kayit.php">Yeni Kayıt</a>
    </div>
</body>

</html>