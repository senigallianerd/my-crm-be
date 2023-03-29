<?php

include "./conf/conf.php";

$id = isset($_GET['id']) ? addSlashes($_GET['id']) : false;
$userId = isset($_GET['userId']) ? addSlashes($_GET['userId']) : false;
$type = isset($_GET['type']) ? addSlashes($_GET['type']) : false;
$description = isset($_GET['description']) ? addSlashes($_GET['description']) : false;
$multiple = false;

if($id)
    $sql = "SELECT * FROM Docs WHERE id=".$id;
else if($userId){
    $multiple = true;
    $insurances = [];
    $sql = "SELECT * FROM Docs WHERE userId=".$userId;
}
else{
    $multiple = true;
    $insurances = [];
    $sql = "SELECT * FROM Docs WHERE name LIKE '".$name."%' OR surname LIKE '".$surname."%'";
}

$result = $con->query($sql);
if ($multiple) {
 while($row = $result->fetch_assoc()) {
  array_push($insurances,$row);
 }
 echo json_encode($insurances);
}
else{
    $row = $result->fetch_assoc();
    echo json_encode($row); 
}

$con->close();

?>
