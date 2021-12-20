<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$titolo = $data["noteTitle"];
$testo = $data["noteText"];
$noteId = $data["noteId"];

$sql = "UPDATE `Note` SET `titolo`= '".$titolo."', `testo`= '".$testo."' WHERE `Note`.`id` = ".$noteId.";";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



