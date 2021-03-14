<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$id = $data["id"];
$type = $data["type"];
$description = $data["description"];

$sql = "UPDATE `Insurances` SET `type` = '".$type."' , `description` =  '".$description."' WHERE `Insurances`.`id` = ".$id.";";
$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



