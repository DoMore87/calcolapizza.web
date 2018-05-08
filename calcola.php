<?php
// required headers
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

$data = json_encode($_POST);

echo $data;
$panielli = $_POST["panielli"];
$peso = $_POST["peso"];
$idro = $_POST["idro"];
$salepl = $_POST["salepl"];
$liev = $_POST["liev"];
$frigo = $_POST["frigo"];
$gradi = $_POST["gradi"];
$grassipl = $_POST["grassipl"];
$prdp = $_POST["prdp"];
$prdt = $_POST["prdt"];
$teglia = $_POST["teglia"];



?>