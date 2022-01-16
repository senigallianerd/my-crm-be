<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$id = $data["id"];
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

$sql = "UPDATE `Users` SET 
                `nome` = '".addslashes($nome)."' ,
                `cognome` =  '".addslashes($cognome)."', 
                `note` = '".addslashes($note)."' , 
                `azienda` = '".addslashes($azienda)."' ,
                `collaboratore` = '".addslashes($collaboratore)."' ,
                `collaboratore1` = '".addslashes($collaboratore1)."' ,
                `tipoContatto` = '".addslashes($tipoContatto)."' ,
                `cellulare` = '".addslashes($cellulare)."' ,
                `telCasa` = '".addslashes($telCasa)."' ,
                `telUfficio` = '".addslashes($telUfficio)."' ,
                `fax` = '".addslashes($fax)."' ,
                `email` = '".addslashes($email)."' ,
                `secondaEmail` = '".addslashes($secondaEmail)."' ,
                `PEC` = '".addslashes($PEC)."' ,
                `indirizzoResidenza` = '".addslashes($indirizzoResidenza)."' ,
                `occupazione` = '".addslashes($occupazione)."' ,
                `dataNascita` = '".addslashes($dataNascita)."' ,
                `codiceFiscale` = '".addslashes($codiceFiscale)."' ,
                `cartaIdentita` = '".addslashes($cartaIdentita)."' ,
                `dataScadenzaCartaIdentita` = '".addslashes($dataScadenzaCartaIdentita)."' ,
                `partitaIva` = '".addslashes($partitaIva)."' ,
                `sdi` = '".addslashes($sdi)."' ,
                `iban` = '".addslashes($iban)."' ,
                `hobby` = '".addslashes($hobby)."',
                `CAP` = '".addslashes($CAP)."' ,
                `comune` = '".addslashes($comune)."' ,
                `provincia` = '".addslashes($provincia)."',
                `civico` = '".addslashes($civico)."' ,
                `datiAggiuntivi` = '".addslashes($datiAggiuntivi)."' ,
                `datiRaw` = '".addslashes($datiRaw)."' 
        WHERE `Users`.`id` = ".$id.";";

$result = $con->query($sql);

echo json_encode($result);

$con->close();

?>



