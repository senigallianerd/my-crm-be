<?php

include "conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$name = $data["name"];
$surname = $data["surname"];
$age = $data["age"];

$sql = "INSERT INTO `Users` (`id`, `name`, `surname`, `age`) VALUES (NULL, '".$name."', '".$surname."', '".$age."');";
$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



