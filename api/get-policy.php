<?php

include "./conf/conf.php";

$userId = $_GET['userId'];
$policies = [];

if($userId>0)
    $sql = "SELECT * FROM Insurances WHERE userId='".$userId."' ";
else
    $sql = "SELECT * FROM Insurances,Users WHERE userId=Users.id"; 

$result = $con->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
  array_push($policies,$row);
 }
}

$con->close();

echo json_encode($policies);
?>


