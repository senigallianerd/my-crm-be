<?php

include "./conf/conf.php";

$id = $_GET['id'];
$type = $_GET['type'];
$description = $_GET['description'];
$multiple = false;

if($id)
    $sql = "SELECT * FROM Insurances WHERE id=".$id;
else{
    $multiple = true;
    $insurances = [];
    $sql = "SELECT * FROM Insurances WHERE name LIKE '".$name."%' OR surname LIKE '".$surname."%'";
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
