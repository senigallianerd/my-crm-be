<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$id = $data["id"];
$numero = $data["numero"];
$ramo = $data["ramo"];
$sottotipoDoc = $data["sottotipoDoc"];
$targa = $data["targa"];
$date = $data["singleDate"];
$frazionamento = $data["frazionamento"];
$premioAnnuale =$data["premioAnnuale"];
$premioRata = $data["premioRata"];
$fattura = $data["fattura"];
$note = $data["noteDoc"];
$fileName = $data["fileName"];

$sql = "UPDATE `Docs` SET `numero` = '".$numero."', 
                                `ramo` = '".$ramo."', 
                                `sottotipoDoc` = '".$sottotipoDoc."', 
                                `targa` = '".$targa."', 
                                `data` = '".$date."', 
                                `frazionamento` = '".$frazionamento."', 
                                `premioAnnuale` = '".$premioAnnuale."', 
                                `premioRata` = '".$premioRata."', 
                                `fattura` = '".$fattura."', 
                                `fileName` = '".$fileName."', 
                                `note` =  '".$note."' WHERE `Docs`.`id` = ".$id.";";
$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



