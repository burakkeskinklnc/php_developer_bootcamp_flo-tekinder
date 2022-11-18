<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Kayıt Sayfası</title>
</head>

<body>
    <div style="text-align:center ;">
        <a style="margin-right:10px;" href="index.html">Anasayfa</a>
        <a style="margin-right:10px;" href="liste.php">Kayıt Listesi</a>
        <a style="margin-right:10px;" href="kayit.php">Yeni Kayıt</a>
    </div>
    <br>
    <hr>
    <h3><strong>FORM SAYFASI: </strong></h3>
    <form action="ekle.php" method="POST" style="text-align:center ;">

        <strong>Adınız Soyadınız: </strong>
        <br><br>
        <input type="text" name="adsoyad" value="" size="30">
        <br><br>
        <strong>Telefon numaranız: </strong>
        <br><br>
        <input type="text" name="telefon" value="" size="30">
        <br><br>
        <input type="submit" value="Bilgileri Kaydet" name="ekle" style="background-color:blue; color:white;">

    </form>


</body>

</html>