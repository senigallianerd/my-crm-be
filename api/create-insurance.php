<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$type = $data["type"];
$description = $data["description"];

if($type)
    $sql = "INSERT INTO `Insurances` (`id`, `type`, `description`) VALUES (NULL, '".$type."', '".$description."');";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



