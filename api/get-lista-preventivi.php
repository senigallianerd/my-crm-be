<?php

include "./conf/conf.php";

$users = [];

$sql = "SELECT nome FROM Lista_Preventivi";
$result = $con->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
  array_push($users,$row);
 }
}

$con->close();
echo json_encode($users);

?>
