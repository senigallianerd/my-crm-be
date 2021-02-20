<?php

include "conf.php";

$id = $_GET['id'];

$sql = "SELECT * FROM Users  WHERE id=".$id;
$result = $con->query($sql);
$row = $result->fetch_assoc();
/*echo 'User ID: '.$row['id'];*/
echo json_encode($row);

$con->close();

?>
