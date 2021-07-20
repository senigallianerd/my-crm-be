<?php

include "./conf/conf.php";

$comuni = [];

$sql = "SELECT sigla,comune FROM Comuni,Province WHERE Comuni.cod_provincia = Province.id";
$result = $con->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
  array_push($comuni,$row);
 }
}

$con->close();
echo json_encode($comuni);

?>
