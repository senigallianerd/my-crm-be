<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
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
$CAP = $data["CAP"];
$comune = $data["comune"];
$provincia = $data["provincia"];
$civico = $data["civico"];
$datiAggiuntivi = $data["datiAggiuntivi"];
$vecchioCRM = $data["vecchioCRM"];

$CAP = is_array($CAP) ? $CAP[0] : $CAP; 

if(!$nome || !$cognome)
    return;

$sql = "INSERT INTO `Users` (`id`, `nome`, `cognome`, `note`, `azienda`, `collaboratore`, `tipoContatto`, `cellulare`, `telCasa`, `telUfficio`, `email`, `secondaEmail`, 
                            `PEC`, `indirizzoResidenza`, `occupazione`, `dataNascita`, `codiceFiscale`, `cartaIdentita`, `dataScadenzaCartaIdentita`,  `partitaIva`, `sdi`, `iban`, `hobby`,`CAP`,`comune`,`provincia`,`civico`,`datiAggiuntivi`,`vecchioCRM`) 
                            VALUES 
                            (NULL, 
                            '".$nome."', 
                            '".$cognome."', 
                            '".$note."', 
                            '".$azienda."', 
                            '".$collaboratore."', 
                            '".$tipoContatto."', 
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
                            '".$dataScadenzaCartaIdentita."', 
                            '".$partitaIva."', 
                            '".$sdi."', 
                            '".$iban."', 
                            '".$hobby."', 
                            '".$CAP."', 
                            '".$comune."', 
                            '".$provincia."', 
                            '".$civico."', 
                            '".$datiAggiuntivi."', 
                            '".$vecchioCRM."');";



$result = $con->query($sql);

echo json_encode($result); 

$con->close();

?>



