<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$username = $data["username"];
$password = $data["password"];

$sql = "SELECT * FROM Admins  WHERE username='".$username."' and password='".$password."'";

$result = $con->query($sql);
$row = $result->fetch_assoc();

echo json_encode($row);

$con->close();

?>
