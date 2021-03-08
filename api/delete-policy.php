<?php

include "./conf/conf.php";

$policyId = $_GET['policyId'];

$sql = "DELETE FROM Policies  WHERE id=".$policyId;
$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>

