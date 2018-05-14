<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

$data = json_encode($_POST);
//echo $data;
$panielli = $_POST["panielli"];
$peso = $_POST["peso"];
$idro = $_POST["idro"];
$salepl = $_POST["salepl"];
$liev = $_POST["liev"];
$frigo = $_POST["frigo"];
$gradi = $_POST["gradi"];
$grassipl = $_POST["grassipl"];
$pdrp = $_POST["pdrp"];
$pdrt = $_POST["pdrt"];
$teglia = $_POST["teglia"];

$coeff = $idro * ($salepl + $grassipl) + 1000 * ($idro + 100);
if ($pdrt == 1) {
    $coeffPdr = 1 / 300;
} elseif ($pdrt == 2) {
    $coeffPdr = 0.005;
} else {
    $coeffPdr = 0.01;
}

$inTeglia = 0;
if($teglia == "on") { 
	$inTeglia = 1;
}
$gradiNormalizzati = $gradi * (1 - 0.25 * $inTeglia);
$oreNormalizzate = ($liev - 9 * $frigo / 10);
$h = 2250 * (1 + $salepl / 200) * (1 + $grassipl /300) / ((4.2 * $idro - 80 - .0305 * $idro * $idro) * pow($gradiNormalizzati, 2.5) * pow($oreNormalizzate, 1.2)); 
$limitePdr = (100000 * $h * 100 / (100000 * $h + $coeff * $coeffPdr));



if($pdrp > $limitePdr) {
    $res["h"] = $h;
    $res["Errore"] = "Il limite per la Pdr è ".round($limitePdr, 2)."%";
}
else {
    $pesoTot = $peso * $panielli;
    $pdrRes = $pesoTot * $pdrp / 100;
    $farinaRes = 100000 * ($pesoTot - $pdrRes) / $coeff;
    $acquaRes = ((1000 * $idro * ($pesoTot - $pdrRes) / $coeff));
    $saleRes = ($salepl * $idro * ($pesoTot - $pdrRes) / $coeff);
    $grassiRes = ($grassipl * $idro * ($pesoTot - $pdrRes) / $coeff);
    $lievitoRes = $farinaRes * $h - $coeffPdr * $pdrRes;

    $res["Farina"] = round($farinaRes, 0);
    $res["Acqua"] = round($acquaRes, 0);
    $res["Sale"] = round($saleRes, 0);
    $res["Olio"] = round($grassiRes, 0);
    $res["Lievito"] = round($lievitoRes, 2);
    $res["Pdr"] = round($pdrRes, 0);
}
echo json_encode($res);
?>