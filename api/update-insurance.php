<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$id = $data["id"];
$numero = $data["numero"];
$ramo = $data["ramo"];
$compagnia = $data["compagnia"];
$targa = $data["targa"];
$scadenzaAnnuale = $data["scadenzaAnnuale"];
$frazionamento = $data["frazionamento"];
$premioAnnuale =$data["premioAnnuale"];
$premioRata = $data["premioRata"];
$fattura = $data["fattura"];
$note = $data["note"];
$fileName = $data["fileName"];

$sql = "UPDATE `Insurances` SET `numero` = '".$numero."', 
                                `ramo` = '".$ramo."', 
                                `compagnia` = '".$compagnia."', 
                                `targa` = '".$targa."', 
                                `scadenzaAnnuale` = '".$scadenzaAnnuale."', 
                                `frazionamento` = '".$frazionamento."', 
                                `premioAnnuale` = '".$premioAnnuale."', 
                                `premioRata` = '".$premioRata."', 
                                `fattura` = '".$fattura."', 
                                `fileName` = '".$fileName."', 
                                `note` =  '".$note."' WHERE `Insurances`.`id` = ".$id.";";
$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



