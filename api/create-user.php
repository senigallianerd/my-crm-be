<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$name = $data["name"];
$surname = $data["surname"];
$age = $data["age"];
$link = $data["link"];

$sql = "INSERT INTO `Users` (`id`, `name`, `surname`, `age`, `link`) VALUES (NULL, '".$name."', '".$surname."', '".$age."', '".$link."');";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



