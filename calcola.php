<?php
// required headers
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

$data = json_encode($_POST);

echo $data."\n";

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

$coeff = $idro * ($salepl + $grassipl) + 1000 * ($idro + 100);
if ($prdt = 1) {
    $coeffPdr = 0.00333;
} elseif ($prdt = 2) {
    $coeffPdr = 0.005;
} else {
    $coeffPdr = 0.01;
}

$inTeglia = 0;
$gradiNormalizzati = $gradi * (1 - 0.25 * $inTeglia);
$oreNormalizzate = ($liev - 9 * $frigo / 10);
$h = 2250 * (1 + $salepl / 200) * (1 + $grassipl /300) / ((4.2 * $idro - 80 - .0305 * $idro * $idro) * pow($gradiNormalizzati, 2.5) * pow($oreNormalizzate, 1.2)); 




$pesoTot = $peso * $panielli;
$pdrRes = $pesoTot * $pdrp / 100;
$farinaRes = 100000 * ($pesoTot - $pdrRes) / $coeff;
$acquaRes = ((1000 * $idro * ($pesoTot - $pdrRes) / $coeff));
$saleRes = ($salepl * $idro * ($pesoTot - $pdrRes) / $coeff);
$grassiRes = ($grassipl * $idro * ($pesoTot - $pdrRes) / $coeff);
$lievitoRes = $farinaRes * $h - $coeffPdr * $pdrRes;



echo "Farina: ".$farinaRes."\n";
echo "Acqua: ".$acquaRes."\n";
echo "Sale: ".$saleRes."\n";
echo "Olio: ".$grassiRes."\n";
echo "Lievito: ".$lievitoRes."\n";
echo "Pasta di riporto: ".$pdrRes."\n";


?>