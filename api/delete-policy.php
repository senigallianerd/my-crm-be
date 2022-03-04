<?php

include "./conf/conf.php";

$policyId = $_GET['policyId'];

$strSQL = "SELECT fileName FROM Docs WHERE id=".$policyId;
$result = $con->query($strSQL);
$row = $result->fetch_assoc();
$fileName = $row['fileName'];

$pathSource='uploads/'.$fileName;
$pathDestination='uploads/trash/'.$fileName;


$sql = "DELETE FROM Docs  WHERE id=".$policyId;
$result = $con->query($sql);

if (!copy($pathSource, $pathDestination)) {
    // errore nella copia
    echo json_encode($result);
}
else{
    // se tutto ok cancella file orig
    unlink($pathSource);
    echo json_encode($result);
}



$con->close();

?>