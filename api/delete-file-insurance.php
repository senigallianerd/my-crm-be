<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$id = $data["id"];
$fileName = $data["fileName"];


$sql = "UPDATE `Insurances` SET `fileName` = '' WHERE `Insurances`.`id` = ".$id.";";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



