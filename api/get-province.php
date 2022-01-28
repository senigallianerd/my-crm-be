<?php

include "./conf/conf.php";

$province = [];

$sql = "SELECT * FROM Province ORDER BY sigla ASC";
$result = $con->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
  array_push($province,$row);
 }
}

$con->close();
echo json_encode($province);

?>
