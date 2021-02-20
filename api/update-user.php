<?php

include "conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$id = $data["id"];
$name = $data["name"];
$surname = $data["surname"];
$age = $data["age"];

$sql = "UPDATE `Users` SET `name` = '".$name."' , `surname` =  '".$surname."', `age` = '".$age."' WHERE `Users`.`id` = ".$id.";";
$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



