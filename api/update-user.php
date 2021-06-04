<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$id = $data["id"];
$nome = $data["nome"];
$cognome = $data["cognome"];
$note = $data["note"];
$azienda = $data["azienda"];
$collaboratore = $data["collaboratore"];
$tipoContatto = $data["tipoContatto"];
$cellulare = $data["cellulare"];
$telCasa = $data["telCasa"];
$telUfficio = $data["telUfficio"];
$email = $data["email"];
$secondaEmail = $data["secondaEmail"];
$PEC = $data["PEC"];
$indirizzoResidenza = $data["indirizzoResidenza"];
$occupazione = $data["occupazione"];
$dataNascita = $data["dataNascita"];
$codiceFiscale = $data["codiceFiscale"];
$cartaIdentita = $data["cartaIdentita"];
$dataScadenzaCartaIdentita = $data["dataScadenzaCartaIdentita"];
$partitaIva = $data["partitaIva"];
$sdi = $data["sdi"];
$iban = $data["iban"];
$hobby = $data["hobby"];


$sql = "UPDATE `Users` SET 
                `nome` = '".$nome."' ,
                `cognome` =  '".$cognome."', 
                `note` = '".$note."' , 
                `azienda` = '".$azienda."' ,
                `collaboratore` = '".$collaboratore."' ,
                `tipoContatto` = '".$tipoContatto."' ,
                `cellulare` = '".$cellulare."' ,
                `telCasa` = '".$telCasa."' ,
                `telUfficio` = '".$telUfficio."' ,
                `email` = '".$email."' ,
                `secondaEmail` = '".$secondaEmail."' ,
                `PEC` = '".$PEC."' ,
                `indirizzoResidenza` = '".$indirizzoResidenza."' ,
                `occupazione` = '".$occupazione."' ,
                `dataNascita` = '".$dataNascita."' ,
                `codiceFiscale` = '".$codiceFiscale."' ,
                `cartaIdentita` = '".$cartaIdentita."' ,
                `dataScadenzaCartaIdentita` = '".$dataScadenzaCartaIdentita."' ,
                `partitaIva` = '".$partitaIva."' ,
                `sdi` = '".$sdi."' ,
                `iban` = '".$iban."' ,
                `hobby` = '".$hobby."' 
                WHERE `Users`.`id` = ".$id.";";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



