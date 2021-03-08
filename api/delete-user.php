<?php

include "./conf/conf.php";

$id = $_GET['id'];

$sql = "DELETE FROM Users  WHERE id=".$id;
$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>

