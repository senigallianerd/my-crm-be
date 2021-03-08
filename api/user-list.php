<?php

include "./conf/conf.php";

$users = [];

$sql = "SELECT e.id,e.name, e.surname, e.age, e.link, m.surname as linkSurname FROM Users e LEFT JOIN Users m ON m.id = e.userId ORDER BY e.id";
$result = $con->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
  array_push($users,$row);
 }
}

$con->close();
echo json_encode($users);

?>
