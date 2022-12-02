<?php
include "../controller/mainclass.php";
$mainclass = new mainclass();
if (isset($_SESSION["user"])) {
} else {
    header("Location:http://localhost:90/proje/index.php");
}
if (isset($_GET['sehirId'])) {
    $ilceler = $mainclass->ilceGetir($_GET['sehirId']);
}

$response = array(
    "error" => "0",
    "response" => $ilceler
);

$json = json_encode($response, JSON_UNESCAPED_UNICODE);
echo $json;
