<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$fileName = $data["fileName"];
$insuranceId = $data["insuranceId"];
$expirationDate = $data["expirationDate"];
$userId = $data["userId"];

$sql = "INSERT INTO `Policies` (`id`, `insuranceId`, `fileName`, `userId`, `expirationDate`) VALUES (NULL, '".$insuranceId."', '".$fileName."', '".$userId."', '".$expirationDate."')";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



