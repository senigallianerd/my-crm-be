<?php

include "./conf/conf.php";

$userId = $_GET['userId'];
$policies = [];

if($userId>0)
    $sql = "SELECT * FROM Policies,Insurances WHERE userId='".$userId."' and Insurances.id = Policies.insuranceId";
else
    $sql = "SELECT * FROM Policies,Users WHERE Policies.userId = Users.id"; 

$result = $con->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
  array_push($policies,$row);
 }
}

$con->close();

echo json_encode($policies);
?>

