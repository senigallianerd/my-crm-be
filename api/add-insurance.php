<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
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
$userId = $data["userId"];
$fileName = $data["fileName"];

if($numero)
    $sql = "INSERT INTO `Insurances` (`id`, 
                                       `numero`, 
                                       `ramo`, 
                                       `compagnia`, 
                                       `targa`, 
                                       `scadenzaAnnuale`, 
                                       `frazionamento`, 
                                       `premioAnnuale`, 
                                       `premioRata`, 
                                       `fattura`, 
                                       `note`,
                                       `userId`,
                                       `fileName`) VALUES (NULL, 
                                        '".$numero."', 
                                        '".$ramo."', 
                                        '".$compagnia."', 
                                        '".$targa."', 
                                        '".$scadenzaAnnuale."', 
                                        '".$frazionamento."', 
                                        '".$premioAnnuale."', 
                                        '".$premioRata."', 
                                        '".$fattura."', 
                                        '".$note."', 
                                        '".$userId."', 
                                        '".$fileName."');";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



