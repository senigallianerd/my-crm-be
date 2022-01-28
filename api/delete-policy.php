<?php

include "./conf/conf.php";

$policyId = $_GET['policyId'];

$strSQL = "SELECT fileName FROM Docs WHERE id=".$policyId;
$result = $con->query($strSQL);
$row = $result->fetch_assoc();
$fileName = $row['fileName'];

$path='uploads/'.$fileName;

$sql = "DELETE FROM Docs  WHERE id=".$policyId;
$result = $con->query($sql);

if(unlink($path) && $result)
echo json_encode($result);

$con->close();

?>

