<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$name = $data["name"];
$surname = $data["surname"];
$age = $data["age"];
$link = $data["link"];
$userId = $data["userId"];
$userData = $data["userData"];

$sql = "INSERT INTO `Users` (`id`, `name`, `surname`, `age`, `link`, `userId`, `userData`) VALUES (NULL, '".$name."', '".$surname."', '".$age."', '".$link."', '".$userId."', '".$userData."');";
$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



