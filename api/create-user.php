<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$nome = $data["nome"];
$cognome = $data["cognome"];
$note = $data["note"];
$azienda = $data["azienda"];
$collaboratore = $data["collaboratore"];
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
$partitaIva = $data["partitaIva"];
$sdi = $data["sdi"];
$iban = $data["iban"];
$hobby = $data["hobby"];

if(!$nome || !$cognome)
    return;

$sql = "INSERT INTO `Users` (`id`, `nome`, `cognome`, `note`, `azienda`, `collaboratore`, `cellulare`, `telCasa`, `telUfficio`, `email`, `secondaEmail`, 
                            `PEC`, `indirizzoResidenza`, `occupazione`, `dataNascita`, `codiceFiscale`, `cartaIdentita`, `partitaIva`, `sdi`, `iban`, `hobby`) 
                            VALUES 
                            (NULL, 
                            '".$nome."', 
                            '".$cognome."', 
                            '".$note."', 
                            '".$azienda."', 
                            '".$collaboratore."', 
                            '".$cellulare."', 
                            '".$telCasa."', 
                            '".$telUfficio."', 
                            '".$email."', 
                            '".$secondaEmail."', 
                            '".$PEC."', 
                            '".$indirizzoResidenza."', 
                            '".$occupazione."', 
                            '".$dataNascita."', 
                            '".$codiceFiscale."', 
                            '".$cartaIdentita."', 
                            '".$partitaIva."', 
                            '".$sdi."', 
                            '".$iban."', 
                            '".$hobby."');";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



