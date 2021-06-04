<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$fileName = $data["fileName"];
$insuranceId = $data["insuranceId"];
$scadenzaAnnuale = $data["scadenzaAnnuale"];
$userId = $data["userId"];
$compagnia = $data["compagnia"];

$sql = "INSERT INTO `Insurances` (`id`, `compagnia`, `fileName`, `userId`, `scadenzaAnnuale`) VALUES 
(NULL, '".$compagnia."', '".$fileName."', '".$userId."', '".$scadenzaAnnuale."')";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



