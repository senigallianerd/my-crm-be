<?php

include "./conf/conf.php";

$comuni = [];

$prov = $_GET['prov'];

$sql = "SELECT comune FROM Comuni,Province WHERE sigla='".$prov."' AND Comuni.cod_provincia = Province.cod_provincia";

$result = $con->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
  array_push($comuni,$row);
 }
}

$con->close();
echo json_encode($comuni);

?>
