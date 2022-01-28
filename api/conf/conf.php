<?php

include "cors.php";

$servername = "localhost";
$username = "root";
$password = "aaa";
$dbname = "my_crm";
$con = mysqli_connect("$servername","$username","$password","$dbname") or die ("could not connect database");

?>
