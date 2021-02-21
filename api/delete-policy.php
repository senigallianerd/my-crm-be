<?php

include "conf.php";

$id = $_GET['id'];

$sql = "DELETE FROM Policies  WHERE id=".$id;
$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>

