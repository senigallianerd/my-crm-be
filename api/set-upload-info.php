<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$fileName = $data["fileName"];
$insuranceId = $data["insuranceId"];
$date = $data["data"];
$userId = $data["userId"];
$sottotipoDoc = $data["sottotipoDoc"];
$tipoDoc = $data["tipoDoc"];
$frazionamento = $data["frazionamento"];
$targa = $data["targa"];
$note = $data["note"];
$numero = $data["numero"];
$premioRata = $data["premioRata"];
$data2 = $data["data2"];
$data3 = $data["data3"];
$inviaAvvisoA = $data["inviaAvvisoA"];
$competenze = $data["competenze"];

$sql = "INSERT INTO `Docs` (`id`, `sottotipoDoc`, `fileName`, `userId`, `data`, `tipoDoc`, `frazionamento`, `targa`,`note`,`numero`,`premioRata`, `data2`, `data3`, `inviaAvvisoA`,`competenze`) VALUES 
(NULL, '".$sottotipoDoc."', '".$fileName."', '".$userId."', '".$date."', '".$tipoDoc."', '".$frazionamento."', '".$targa."' , '".$note."', '".$numero."', '".$premioRata."', '".$data2."', '".$data3."', '".$inviaAvvisoA."', '".$competenze."')";  


$result = $con->query($sql);

echo json_encode($result);


$con->close();

?>



