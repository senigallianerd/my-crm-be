<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$nome = $data["nome"];
$cognome = $data["cognome"];
$note = $data["note"];
$azienda = $data["azienda"];
$collaboratore = $data["collaboratore"];
$collaboratore1 = $data["collaboratore1"];
$tipoContatto = $data["tipoContatto"];
$cellulare = $data["cellulare"];
$telCasa = $data["telCasa"];
$telUfficio = $data["telUfficio"];
$fax = $data["fax"];
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
$datiRaw = $data["datiRaw"];

$CAP = is_array($CAP) ? $CAP[0] : $CAP; 

if(!$cognome)
    return;

$sql = "INSERT INTO `Users` (`id`, `nome`, `cognome`, `note`, `azienda`, `collaboratore`, `collaboratore1`, `tipoContatto`, `cellulare`, `telCasa`, `telUfficio`, `fax`, `email`, `secondaEmail`, `PEC`, `indirizzoResidenza`, `occupazione`, `dataNascita`, `codiceFiscale`, `cartaIdentita`, `dataScadenzaCartaIdentita`,  `partitaIva`, `sdi`, `iban`, `hobby`,`CAP`,`comune`,`provincia`,`civico`,`datiAggiuntivi`,`datiRaw`) 
                            VALUES 
                            (NULL, 
                            '".addslashes($nome)."', 
                            '".addslashes($cognome)."', 
                            '".addslashes($note)."', 
                            '".addslashes($azienda)."', 
                            '".addslashes($collaboratore)."', 
                            '".addslashes($collaboratore1)."', 
                            '".addslashes($tipoContatto)."', 
                            '".addslashes($cellulare)."', 
                            '".addslashes($telCasa)."', 
                            '".addslashes($telUfficio)."', 
                            '".addslashes($fax)."', 
                            '".addslashes($email)."', 
                            '".addslashes($secondaEmail)."', 
                            '".addslashes($PEC)."', 
                            '".addslashes($indirizzoResidenza)."', 
                            '".addslashes($occupazione)."', 
                            '".addslashes($dataNascita)."', 
                            '".addslashes($codiceFiscale)."', 
                            '".addslashes($cartaIdentita)."', 
                            '".addslashes($dataScadenzaCartaIdentita)."', 
                            '".addslashes($partitaIva)."', 
                            '".addslashes($sdi)."', 
                            '".addslashes($iban)."', 
                            '".addslashes($hobby)."', 
                            '".addslashes($CAP)."', 
                            '".addslashes($comune)."', 
                            '".addslashes($provincia)."', 
                            '".addslashes($civico)."', 
                            '".addslashes($datiAggiuntivi)."', 
                            '".addslashes($datiRaw)."');";

$result = $con->query($sql);

echo json_encode($result); 

$con->close();

?>



