<?php
// required headers
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

echo json_encode($_POST);

/*$json = file_get_contents('php://input');
$decode = json_decode($json);
var_dump($decode);
echo $decode->b;
*/
//var_dump(json_decode($json, true));

?>