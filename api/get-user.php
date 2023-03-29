<?php

include "./conf/conf.php";

$id = $_GET['id'];
$inputValue = isset($_GET['inputValue']) ? addSlashes($_GET['inputValue']) : false;
$multiple = false;

if($id)
    $sql = "SELECT * FROM Users WHERE id=".$id;
else{
    $multiple = true;
    $users = [];
    $sql = "SELECT * FROM Users WHERE (CONCAT(cognome, ' ', nome) LIKE '%".$inputValue."%' || CONCAT(nome, ' ', cognome) LIKE '%".$inputValue."%') and cognome!= ''";
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
