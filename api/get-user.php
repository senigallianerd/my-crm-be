<?php

include "./conf/conf.php";

$id = $_GET['id'];
$nome = $_GET['nome'];
$cognome = addslashes($_GET['cognome']);
$multiple = false;

if($id)
    $sql = "SELECT * FROM Users WHERE id=".$id;
else{
    $multiple = true;
    $users = [];
    $sql = "SELECT * FROM Users WHERE nome LIKE '".$nome."%' AND cognome LIKE '".$cognome."%'";
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
