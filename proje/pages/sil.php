<?php
include "../controller/mainclass.php";
$mainclass = new mainclass();
if (isset($_SESSION["user"])) {
} else {
    header("Location:http://localhost:90/proje/index.php");
}
if (isset($_GET['id'])) {
    $emlak = $mainclass->emlakDetayGetir($_GET['id']);
    foreach ($emlak as $silinenresimler) {
        unlink($silinenresimler['resim1']);
        unlink($silinenresimler['resim2']);
        unlink($silinenresimler['resim3']);
    }
    $mainclass->emlakSil($_GET['id']);
}
