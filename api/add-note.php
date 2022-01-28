<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$titolo = $data["title"];
$testo = $data["text"];
$date = $data["date"];
$idUtente = $data["userId"];

if($data)
    $sql = "INSERT INTO `Note` (`id`, 
                                `titolo`, 
                                `testo`, 
                                `data`, 
                                `idUtente`) VALUES (NULL, 
                                        '".addslashes($titolo)."', 
                                        '".addslashes($testo)."', 
                                        '".addslashes($date)."', 
                                        '".$idUtente."');";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



