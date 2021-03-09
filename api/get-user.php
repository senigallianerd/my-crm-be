<?php

include "./conf/conf.php";

$id = $_GET['id'];
$name = $_GET['name'];
$surname = $_GET['surname'];
$multiple = false;

if($id)
    $sql = "SELECT * FROM Users WHERE id=".$id;
else{
    $multiple = true;
    $users = [];
    $sql = "SELECT * FROM Users WHERE name LIKE '".$name."%' OR surname LIKE '".$surname."%'";
}

$result = $con->query($sql);
if ($multiple) {
 while($row = $result->fetch_assoc()) {
  array_push($users,$row);
 }
 echo json_encode($users);
}
else{
    $row = $result->fetch_assoc();
    echo json_encode($row); 
}

$con->close();

?>