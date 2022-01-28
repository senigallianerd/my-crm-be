<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$numero = $data["numero"];
$ramo = $data["ramo"];
$sottotipoDoc = $data["sottotipoDoc"];
$tipoDoc = $data["tipoDoc"];
$targa = $data["targa"];
$data = $data["data"];
$frazionamento = $data["frazionamento"];
$premioAnnuale =$data["premioAnnuale"];
$premioRata = $data["premioRata"];
$fattura = $data["fattura"];
$note = $data["note"];
$userId = $data["userId"];
$fileName = $data["fileName"];

if($numero)
    $sql = "INSERT INTO `Docs` (`id`, 
                                       `numero`, 
                                       `ramo`, 
                                       `sottotipoDoc`, 
                                       `tipoDoc`, 
                                       `targa`, 
                                       `data`, 
                                       `frazionamento`, 
                                       `premioAnnuale`, 
                                       `premioRata`, 
                                       `fattura`, 
                                       `note`,
                                       `userId`,
                                       `fileName`) VALUES (NULL, 
                                        '".$numero."', 
                                        '".$ramo."', 
                                        '".$sottotipoDoc."', 
                                        '".$tipoDoc."', 
                                        '".$targa."', 
                                        '".$data."', 
                                        '".$frazionamento."', 
                                        '".$premioAnnuale."', 
                                        '".$premioRata."', 
                                        '".$fattura."', 
                                        '".$note."', 
                                        '".$userId."', , 
                                        '".$fileName."');";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



