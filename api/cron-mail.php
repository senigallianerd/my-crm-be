<?php

include "./conf/conf.php";

$data = json_decode(file_get_contents('php://input'), true);
$active = $data["active"];

if(!$active){
$sql = "INSERT INTO `Users` (`id`, `nome`, `cognome`, `note`, `azienda`, `collaboratore`, `cellulare`, `telCasa`, `telUfficio`, `email`, `secondaEmail`, `PEC`, `indirizzoResidenza`, `occupazione`, `dataNascita`, `codiceFiscale`, `cartaIdentita`, `dataScadenzaCartaIdentita`, `partitaIva`, `sdi`, `iban`, `hobby`, `tipoContatto`, `CAP`, `comune`, `provincia`, `civico`, `datiAggiuntivi`, `datiRaw`) VALUES (NULL, 'TEST', 'TEST', 'aaaaaa', 'aaa', 'aaaa', 'aa', 'aaa', 'ss', 'sss', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL);";
}
else{
$sql = "INSERT INTO `Users` (`id`, `nome`, `cognome`, `note`, `azienda`, `collaboratore`, `cellulare`, `telCasa`, `telUfficio`, `email`, `secondaEmail`, `PEC`, `indirizzoResidenza`, `occupazione`, `dataNascita`, `codiceFiscale`, `cartaIdentita`, `dataScadenzaCartaIdentita`, `partitaIva`, `sdi`, `iban`, `hobby`, `tipoContatto`, `CAP`, `comune`, `provincia`, `civico`, `datiAggiuntivi`, `datiRaw`) VALUES (NULL, 'TEST111', 'TEST111', 'aaaaaa', 'aaa', 'aaaa', 'aa', 'aaa', 'ss', 'sss', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL);";
}

$result = $con->query($sql);

echo json_encode($result); 

$con->close();

?>



