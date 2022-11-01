<?php
//1.Örnek;
echo "Soru1: <br>
<p>Bir çiftlikte 5 ağıl var, her ağıl max. 30 koyun alabiliyor ve çiftlikte toplam 73 koyun var. İşlemler
yapıldıktan sonra çıktı şu şekilde olmalı: <br></p> ";
$agilsayisi = 5;
$kapasite = 150;
$toplamkoyun = 73;
$agilkapasitesi = 30;

$agil = array(
    $agil[4] = [],
    $agil[3] = [],
    $agil[2] = [],
    $agil[1] = [],
    $agil[0] = []
);

for ($j = 0; $j < $toplamkoyun; $j++) {
    for ($i = 0; $i < count($agil); $i++) {
        if (count($agil[$i]) < $agilkapasitesi) {
            array_push($agil[$i], $j);
            break;
        } else {
            continue;
        }
    }
}

$agil = array_reverse($agil);
echo "Toplam Ağıl: " . $agilsayisi . "<br>";
echo "Toplam Kapasite = " . $kapasite . "<br>";
echo "Toplam Koyun: " . $toplamkoyun . "<br>";
echo "<br>";
for ($i = count($agil) - 1; $i >= 0; $i--) {
    echo ($i + 1) . ". Ağıl: " . count($agil[$i]) . " Koyun" . "<br>";
}

echo "<br><br><br><br>";
echo "Soru2: <br>
<p>Bir çiftlikte 3 ağıl var, her ağıl max. 45 koyun alabiliyor ve çiftlikte toplam 147 koyun var. İşlemler
yapıldıktan sonra çıktı şu şekilde olmalı:</p>";
// 2.Örnek;


$agil_sayisi = 3;
$koyun_sayisi = 147;
$agil_kapasitesi = 45;
$agiller = [];
for ($j = 0; $j < $agil_sayisi; $j++) {
    $yeniAgil = [];
    array_push($agiller, $yeniAgil);
}
$kalan_koyun = $koyun_sayisi;
for ($i = 0; $i < $koyun_sayisi; $i++) {
    for ($j = 0; $j < $agil_sayisi; $j++) {
        if (count($agiller[$j]) < $agil_kapasitesi) {
            array_push($agiller[$j], $i);
            $kalan_koyun--;
            break;
        } else {
            continue;
        }
    }
}
$agiller = array_reverse($agiller);
echo "Toplam Ağıl: " . $agil_sayisi . "<br>";
echo "Toplam Kapasite: 150" . "<br>";
echo "Toplam Koyun: " . $koyun_sayisi . "<br>";
echo "<br>";
for ($i = count($agiller) - 1; $i >= 0; $i--) {
    echo ($i + 1) . ". Ağıl: " . count($agiller[$i]) . " Koyun" . "<br>";
}
echo "Dışarıda Kalan: " . $kalan_koyun . " Koyun";
?>