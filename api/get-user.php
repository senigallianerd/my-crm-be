<?php

include "./conf/conf.php";

$id = $_GET['id'];

$sql = "SELECT * FROM Users  WHERE id=".$id;
$result = $con->query($sql);
$row = $result->fetch_assoc();

echo json_encode($row);

$con->close();

?>
