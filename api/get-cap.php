<?php

include "./conf/conf.php";

$cap = [];

$comune = $_GET['comune'];

$sql = "SELECT cap FROM CAP WHERE comune='".$comune."'";

$result = $con->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
  array_push($cap,$row);
 }
}

$con->close();
echo json_encode($cap);

?>
