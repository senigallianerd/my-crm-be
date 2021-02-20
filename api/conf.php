<?php

header('Access-Control-Allow-Origin: http://localhost:4200', false);
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With, Authorization'");

$servername = "localhost";
$username = "root";
$password = "aaa";
$dbname = "my_crm";
$con = mysqli_connect("$servername","$username","$password","$dbname") or die ("could not connect database");

?>
