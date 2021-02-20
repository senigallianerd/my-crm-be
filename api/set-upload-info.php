<?php

include "conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$fileName = $data["fileName"];
$type = $data["type"];
$expirationDate = $data["expirationDate"];
$userId = $data["userId"];

$sql = "INSERT INTO `Policies` (`id`, `type`, `fileName`, `userId`, `expirationDate`) VALUES (NULL, '".$type."', '".$fileName."', '".$userId."', '".$expirationDate."')";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



