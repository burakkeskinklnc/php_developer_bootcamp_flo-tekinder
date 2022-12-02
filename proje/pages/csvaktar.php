<?php
include "../controller/mainclass.php";
$mainclass = new mainclass();
$emlaklar = $mainclass->emlakBilgisiGetir();
//$json = json_decode($emlaklar, true);

touch("emlak.csv");
$dosya = fopen("emlak.csv", "wbt");

foreach ($emlaklar as $i) {
    $newArrayElement = array(
        $i[0],
        $i[1],
        $i[2],
        $i[3],
        $i[4],
        $i[5],
        $i[6],
        $i[7],
        $i[8],
        $i[9],
        $i[10],
        $i[11],
        $i[12],
        $i[13],
        $i[14],
        $i[15],
        $i[16],
        $i[17],
    );

    fputcsv($dosya, $newArrayElement);
}


fclose($dosya);


header("Content-length: " . filesize("emlak.csv"));
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="emlak.csv"');
readfile("emlak.csv");
