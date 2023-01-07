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
$data2 = $data["data2"];
$data3 = $data["data3"];
$inviaAvvisoA = $data["inviaAvvisoA"];

$dateQuery = $date ? "`data` = '".$date."'," : "`data` = NULL ,";

$sql = "UPDATE `Docs` SET `numero` = '".$numero."', 
                                `ramo` = '".$ramo."', 
                                `sottotipoDoc` = '".$sottotipoDoc."', 
                                `targa` = '".$targa."', 
                                ".$dateQuery."
                                `frazionamento` = '".$frazionamento."', 
                                `premioAnnuale` = '".$premioAnnuale."', 
                                `premioRata` = '".$premioRata."', 
                                `fattura` = '".$fattura."', 
                                `fileName` = '".$fileName."', 
                                `data2` = '".$data2."', 
                                `data3` = '".$data3."', 
                                `inviaAvvisoA` = '".$inviaAvvisoA."', 
                                `note` =  '".$note."' WHERE `Docs`.`id` = ".$id.";";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



