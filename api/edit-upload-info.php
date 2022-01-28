<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$docId = $data["docId"];
$fileName = $data["fileName"];

$sql = "UPDATE `Docs` SET `fileName`= '".$fileName."' WHERE `Docs`.`id` = ".$docId.";";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>

