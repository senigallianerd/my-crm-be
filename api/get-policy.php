<?php

include "./conf/conf.php";

$userId =  isset($_GET['userId']) ? addSlashes($_GET['userId']) : false;
$policies = [];

if($userId>0)
    $sql = "SELECT * FROM Docs WHERE userId='".$userId."' ";
else
    $sql = "SELECT * FROM Docs,Users WHERE userId=Users.id"; 

$result = $con->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
  array_push($policies,$row);
 }
}

$con->close();

echo json_encode($policies);
?>


