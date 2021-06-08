<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$fileName = $data["fileName"];
$insuranceId = $data["insuranceId"];
$date = $data["data"];
$userId = $data["userId"];
$sottotipoDoc = $data["sottotipoDoc"];
$tipoDoc = $data["tipoDoc"];

$sql = "INSERT INTO `Docs` (`id`, `sottotipoDoc`, `fileName`, `userId`, `data`, `tipoDoc`) VALUES 
(NULL, '".$sottotipoDoc."', '".$fileName."', '".$userId."', '".$date."', '".$tipoDoc."')";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



